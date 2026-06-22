function lockOrderModalScroll() {
    if (window.kunciScrollAdminModal) {
        window.kunciScrollAdminModal();
        return;
    }

    document.documentElement.classList.add("admin-modal-open");
    document.body.classList.add("admin-modal-open");
    document.documentElement.style.overflow = "hidden";
    document.body.style.overflow = "hidden";
}

function unlockOrderModalScroll() {
    if (window.bukaScrollAdminModal) {
        window.bukaScrollAdminModal();
        return;
    }

    document.documentElement.classList.remove("admin-modal-open");
    document.body.classList.remove("admin-modal-open");
    document.documentElement.style.overflow = "";
    document.body.style.overflow = "";
}

window.bukaModalDetailOrder = function (id) {
    const modal = document.getElementById(`modal-detail-order-${id}`);
    if (!modal) return;

    if (!modal.dataset.moved) {
        document.body.appendChild(modal);
        modal.dataset.moved = "true";
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");

    const body = modal.querySelector(".admin-order-detail-body");
    if (body) body.scrollTop = 0;

    lockOrderModalScroll();
};

window.tutupModalDetailOrder = function (id) {
    const modal = document.getElementById(`modal-detail-order-${id}`);
    if (!modal) return;

    modal.classList.add("hidden");
    modal.classList.remove("flex");
    unlockOrderModalScroll();
};

document.addEventListener("keydown", (event) => {
    if (!document.body.classList.contains("admin-dashboard") || event.key !== "Escape") return;

    let hasOpenModal = false;
    document.querySelectorAll('[id^="modal-detail-order-"]').forEach((modal) => {
        if (modal.classList.contains("hidden")) return;
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        hasOpenModal = true;
    });

    if (hasOpenModal) unlockOrderModalScroll();
});