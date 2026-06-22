window.adminSetPasswordFieldVisibility = function (field, visible) {
    const passwordInput = field ? field.querySelector('input[type="password"], input[type="text"]') : null;
    const toggleButton = field ? field.querySelector(".admin-password-toggle") : null;
    const icon = toggleButton ? (toggleButton.querySelector("i") || toggleButton.querySelector("svg")) : null;
    
    if (!passwordInput) {
        return false;
    }

    passwordInput.type = visible ? "text" : "password";

    if (icon) {
        if (icon.tagName.toLowerCase() === 'svg') {
            icon.setAttribute('data-icon', visible ? 'eye-slash' : 'eye');
            icon.classList.toggle("fa-eye", !visible);
            icon.classList.toggle("fa-eye-slash", visible);
            
            const path = icon.querySelector('path');
            if (path) {
                path.classList.toggle("fa-eye", !visible);
                path.classList.toggle("fa-eye-slash", visible);
            }
        } else {
            icon.classList.toggle("fa-eye", !visible);
            icon.classList.toggle("fa-eye-slash", visible);
        }
    }

    if (toggleButton) {
        toggleButton.setAttribute("aria-label", visible ? "Sembunyikan password" : "Tampilkan password");
    }

    return false;
};

window.adminTogglePasswordField = function (button) {
    const field = button ? button.closest(".admin-password-field") : null;
    const passwordInput = field ? field.querySelector('input[type="password"], input[type="text"]') : null;
    
    if (!passwordInput) {
        return false;
    }

    const nextVisibility = passwordInput.type === "password";
    return window.adminSetPasswordFieldVisibility(field, nextVisibility);
};

window.openEditModalUser = function (id, name, email, role) {
    window.openModal?.("modal-edit-user");

    const form = document.getElementById("form-edit-user");
    const nameInput = document.getElementById("edit-user-name");
    const emailInput = document.getElementById("edit-user-email");
    const roleInput = document.getElementById("edit-user-role");
    const passwordInput = document.getElementById("edit-user-password");

    if (form) form.action = `/admin/user/${id}`;
    if (nameInput) nameInput.value = name;
    if (emailInput) emailInput.value = email;
    if (roleInput) roleInput.value = role;
    if (passwordInput) passwordInput.value = "";

    const passwordField = passwordInput?.closest(".admin-password-field");
    window.adminSetPasswordFieldVisibility(passwordField, false);
};
