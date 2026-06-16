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
    badges.forEach((badge) => {
        badge.textContent = count;
        badge.hidden = count <= 0;
    });
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

    const seenOrderId = Number(localStorage.getItem(storageKey) || 0);
    const safeSeenOrderId = seenOrderId > latestOrderId ? 0 : seenOrderId;

    if (!latestOrderId) {
        setBadgeCount(badges, 0);
    } else if (newOrderId > 0 && orderIds.includes(newOrderId)) {
        setBadgeCount(badges, Math.max(1, orderIds.filter((id) => id > safeSeenOrderId).length));
    } else if (safeSeenOrderId > 0) {
        setBadgeCount(badges, orderIds.filter((id) => id > safeSeenOrderId).length);
    } else {
        setBadgeCount(badges, orderIds.length);
    }

    triggers.forEach((trigger) => {
        trigger.addEventListener("click", () => {
            if (latestOrderId) {
                localStorage.setItem(storageKey, String(latestOrderId));
            }

            setBadgeCount(badges, 0);
        });
    });
}

document.addEventListener("DOMContentLoaded", initOrderNotification);
