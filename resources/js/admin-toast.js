const TOAST_DELAY = 450;
const TOAST_GAP_DELAY = 650;
const TOAST_DURATION = 3200;

function escapeToastText(value) {
    const span = document.createElement("span");
    span.textContent = value ?? "";
    return span.innerHTML;
}

function getToastRegion() {
    return document.querySelector("[data-admin-toast-region]");
}

function getToastIcon(type) {
    if (type === "error") return "fa-triangle-exclamation";
    if (type === "warning") return "fa-circle-exclamation";
    return "fa-check";
}

function getToastTitle(type) {
    if (type === "error") return "Gagal";
    if (type === "warning") return "Perhatian";
    return "Berhasil";
}

function hideToast(toast) {
    toast.classList.remove("is-visible");
    toast.classList.add("is-leaving");

    setTimeout(() => {
        toast.remove();
    }, 260);
}

function showAdminToast(message, type = "success") {
    const region = getToastRegion();
    if (!region || !message) return;

    const toast = document.createElement("div");
    toast.className = `admin-toast admin-toast--${type}`;
    toast.setAttribute("role", type === "error" ? "alert" : "status");

    toast.innerHTML = `
        <span class="admin-toast__icon"><i class="fa-solid ${getToastIcon(type)}"></i></span>
        <span class="admin-toast__content">
            <strong>${getToastTitle(type)}</strong>
            <span>${escapeToastText(message)}</span>
        </span>
        <button type="button" class="admin-toast__close" aria-label="Tutup notifikasi">
            <i class="fa-solid fa-xmark"></i>
        </button>
    `;

    toast.querySelector(".admin-toast__close")?.addEventListener("click", () => {
        hideToast(toast);
    });

    region.appendChild(toast);

    requestAnimationFrame(() => {
        toast.classList.add("is-visible");
    });

    setTimeout(() => {
        if (toast.isConnected) hideToast(toast);
    }, TOAST_DURATION);
}

function readAdminToastPayloads() {
    return [...document.querySelectorAll("[data-admin-toast-payload]")]
        .flatMap((payload) => {
            try {
                const messages = JSON.parse(payload.textContent || "[]");
                return Array.isArray(messages) ? messages : [];
            } catch {
                return [];
            }
        })
        .filter((item) => item && item.message);
}

document.addEventListener("DOMContentLoaded", () => {
    if (!document.body.classList.contains("admin-dashboard")) return;

    window.showAdminToast = showAdminToast;

    readAdminToastPayloads().forEach((item, index) => {
        setTimeout(() => {
            showAdminToast(item.message, item.type || "success");
        }, TOAST_DELAY + index * TOAST_GAP_DELAY);
    });
});