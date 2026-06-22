function parseOrderIds(value) {
    try {
        const parsed = JSON.parse(value || "[]");

        return Array.isArray(parsed)
            ? parsed.map((id) => Number(id)).filter((id) => Number.isFinite(id))
            : [];
    } catch {
        return [];
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

function getSeenOrderId(storageKey) {
    try {
        return Number(localStorage.getItem(storageKey) || 0);
    } catch {
        return 0;
    }
}

function setSeenOrderId(storageKey, orderId) {
    try {
        localStorage.setItem(storageKey, String(orderId));
    } catch {
        // Badge tetap berjalan walaupun storage browser diblokir.
    }
}

function initOrderNotification() {
    const config = document.querySelector("[data-order-notification-config]");
    if (!config) return;

    const storageKey = config.dataset.storageKey;
    const orderIds = parseOrderIds(config.dataset.orderIds);
    const latestOrderId = orderIds.length ? Math.max(...orderIds) : 0;
    const newOrderId = Number(config.dataset.newOrderId || 0);
    const badges = document.querySelectorAll("[data-order-notification-badge]");
    const triggers = document.querySelectorAll(
        "[data-order-notification-trigger], [data-order-notification-link]",
    );

    if (!storageKey) return;

    const seenOrderId = getSeenOrderId(storageKey);
    const safeSeenOrderId = seenOrderId > latestOrderId ? 0 : seenOrderId;

    let unreadCount = 0;

    if (!latestOrderId) {
        unreadCount = 0;
    } else if (newOrderId > 0 && orderIds.includes(newOrderId)) {
        unreadCount = Math.max(
            1,
            orderIds.filter((id) => id > safeSeenOrderId && id >= newOrderId).length,
        );
    } else if (safeSeenOrderId > 0) {
        unreadCount = orderIds.filter((id) => id > safeSeenOrderId).length;
    } else {
        setSeenOrderId(storageKey, latestOrderId);
    }

    setBadgeCount(badges, unreadCount);

    triggers.forEach((trigger) => {
        trigger.addEventListener("click", () => {
            if (latestOrderId) {
                setSeenOrderId(storageKey, latestOrderId);
            }

            setBadgeCount(badges, 0);
        });
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initOrderNotification, { once: true });
} else {
    initOrderNotification();
}
