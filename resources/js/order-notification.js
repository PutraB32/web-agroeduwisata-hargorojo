function parseOrderUpdates(value) {
    try {
        const parsed = JSON.parse(value || "{}");
        return parsed && typeof parsed === 'object' && !Array.isArray(parsed) ? parsed : {};
    } catch {
        return {};
    }
}

function setBadgeCount(badges, count) {
    const safeCount = Number.isFinite(count) ? Math.max(0, count) : 0;

    badges.forEach((badge) => {
        const showZero = badge.dataset.showZero === "true";

        badge.textContent = safeCount;
        badge.hidden = safeCount <= 0 && !showZero;
    });
}

function getSeenUpdates(storageKey) {
    try {
        const parsed = JSON.parse(localStorage.getItem(storageKey + '_updates') || "{}");
        return parsed && typeof parsed === 'object' && !Array.isArray(parsed) ? parsed : {};
    } catch {
        return {};
    }
}

function setSeenUpdates(storageKey, updates) {
    try {
        localStorage.setItem(storageKey + '_updates', JSON.stringify(updates));
    } catch {
        // Badge tetap berjalan walaupun storage browser diblokir.
    }
}

function initOrderNotification() {
    const config = document.querySelector("[data-order-notification-config]");
    if (!config) return;

    const storageKey = config.dataset.storageKey;
    const currentUpdates = parseOrderUpdates(config.dataset.orderUpdates);
    const newOrderId = Number(config.dataset.newOrderId || 0);
    const badges = document.querySelectorAll("[data-order-notification-badge]");
    const triggers = document.querySelectorAll(
        "[data-order-notification-trigger], [data-order-notification-link]",
    );

    if (!storageKey) return;

    const seenUpdates = getSeenUpdates(storageKey);
    let unreadCount = 0;

    // Hitung jumlah order yang memiliki timestamp update LEBIH BARU dari yang pernah dilihat
    for (const [id, timestamp] of Object.entries(currentUpdates)) {
        if (!seenUpdates[id] || timestamp > seenUpdates[id] || (newOrderId > 0 && id == newOrderId)) {
            unreadCount++;
        }
    }

    setBadgeCount(badges, unreadCount);

    triggers.forEach((trigger) => {
        trigger.addEventListener("click", () => {
            // Gabungkan update yang baru dilihat dengan yang sudah ada di localStorage
            const newSeenUpdates = { ...getSeenUpdates(storageKey), ...currentUpdates };
            setSeenUpdates(storageKey, newSeenUpdates);
            setBadgeCount(badges, 0);
        });
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initOrderNotification, { once: true });
} else {
    initOrderNotification();
}