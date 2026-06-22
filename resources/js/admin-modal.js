function lockAdminScroll() {
    document.documentElement.classList.add("admin-modal-open");
    document.body.classList.add("admin-modal-open");
    document.documentElement.style.overflow = "hidden";
    document.body.style.overflow = "hidden";
}

function unlockAdminScroll() {
    document.documentElement.classList.remove("admin-modal-open");
    document.body.classList.remove("admin-modal-open");
    document.documentElement.style.overflow = "";
    document.body.style.overflow = "";
}


window.kunciScrollAdminModal = lockAdminScroll;
window.bukaScrollAdminModal = unlockAdminScroll;

window.openModal = function (id) {
    const modal = document.getElementById(id);
    if (!modal) return;

    if (!modal.dataset.moved) {
        document.body.insertBefore(modal, document.body.firstChild);
        modal.dataset.moved = "true";
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");
    lockAdminScroll();

    setTimeout(() => window.syncAdminCustomSelects && window.syncAdminCustomSelects(modal), 0);
};

window.closeModal = function (id) {
    const modal = document.getElementById(id);
    if (!modal) return;

    modal.classList.add("hidden");
    modal.classList.remove("flex");
    unlockAdminScroll();
};

document.addEventListener("keydown", (event) => {
    if (!document.body.classList.contains("admin-dashboard") || event.key !== "Escape") return;

    document.querySelectorAll('[role="dialog"]').forEach((modal) => {
        if (modal.classList.contains("hidden")) return;
        if (modal.id && modal.id.startsWith("modal-detail-order-")) return;
        window.closeModal(modal.id);
    });
});