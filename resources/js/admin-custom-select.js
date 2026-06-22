function closeAdminCustomSelects(except = null) {
    document.querySelectorAll('.admin-custom-select.is-open').forEach((wrapper) => {
        if (wrapper === except) return;
        wrapper.classList.remove('is-open');
        const button = wrapper.querySelector('.admin-custom-select__button');
        const menu = wrapper.querySelector('.admin-custom-select__menu');
        if (button) button.setAttribute('aria-expanded', 'false');
        if (menu) menu.hidden = true;
    });
}

function selectedOptionText(select) {
    const option = select.options[select.selectedIndex];
    return option ? option.textContent.trim() : '';
}

function buildAdminCustomSelect(select) {
    if (select.dataset.adminCustomSelectReady === 'true') return;

    select.dataset.adminCustomSelectReady = 'true';
    select.classList.add('admin-native-select');

    const wrapper = document.createElement('div');
    wrapper.className = 'admin-custom-select';
    wrapper.dataset.selectName = select.name || '';

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'admin-custom-select__button';
    button.setAttribute('aria-haspopup', 'listbox');
    button.setAttribute('aria-expanded', 'false');

    const text = document.createElement('span');
    text.className = 'admin-custom-select__text';

    const icon = document.createElement('i');
    icon.className = 'fas fa-chevron-down admin-custom-select__icon';
    icon.setAttribute('aria-hidden', 'true');

    const menu = document.createElement('div');
    menu.className = 'admin-custom-select__menu';
    menu.setAttribute('role', 'listbox');
    menu.hidden = true;

    button.append(text, icon);
    select.parentNode.insertBefore(wrapper, select);
    wrapper.append(select, button, menu);

    function syncLabel() {
        const label = selectedOptionText(select) || 'Pilih data';
        text.textContent = label;
        text.title = label;
        wrapper.dataset.value = select.value || '';
    }

    function renderOptions() {
        menu.innerHTML = '';

        Array.from(select.options).forEach((option) => {
            const item = document.createElement('button');
            item.type = 'button';
            item.className = 'admin-custom-select__option';
            item.setAttribute('role', 'option');
            item.dataset.value = option.value;
            item.textContent = option.textContent.trim();
            item.title = option.textContent.trim();

            if (option.disabled) {
                item.disabled = true;
                item.classList.add('is-disabled');
            }

            if (option.value === select.value) {
                item.classList.add('is-selected');
                item.setAttribute('aria-selected', 'true');
            } else {
                item.setAttribute('aria-selected', 'false');
            }

            item.addEventListener('click', () => {
                if (option.disabled) return;
                select.value = option.value;
                syncLabel();
                closeAdminCustomSelects();
                select.dispatchEvent(new Event('change', { bubbles: true }));
            });

            menu.appendChild(item);
        });
    }

    button.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();

        const willOpen = !wrapper.classList.contains('is-open');
        closeAdminCustomSelects(wrapper);

        if (!willOpen) {
            wrapper.classList.remove('is-open');
            button.setAttribute('aria-expanded', 'false');
            menu.hidden = true;
            return;
        }

        renderOptions();
        wrapper.classList.add('is-open');
        button.setAttribute('aria-expanded', 'true');
        menu.hidden = false;
    });

    select.addEventListener('change', syncLabel);
    syncLabel();
}

function initAdminCustomSelects(root = document) {
    if (!document.body.classList.contains('admin-dashboard')) return;

    root.querySelectorAll('select:not([data-admin-custom-skip])').forEach((select) => {
        buildAdminCustomSelect(select);
    });
}

window.syncAdminCustomSelects = function syncAdminCustomSelects(root = document) {
    initAdminCustomSelects(root);

    document.querySelectorAll('.admin-custom-select').forEach((wrapper) => {
        const select = wrapper.querySelector('select');
        const text = wrapper.querySelector('.admin-custom-select__text');
        if (!select || !text) return;

        const label = selectedOptionText(select) || 'Pilih data';
        text.textContent = label;
        text.title = label;
        wrapper.dataset.value = select.value || '';
    });
};

document.addEventListener('click', () => closeAdminCustomSelects());
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closeAdminCustomSelects();
});
document.addEventListener('DOMContentLoaded', () => initAdminCustomSelects());
