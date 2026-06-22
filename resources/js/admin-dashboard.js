const PANEL_TITLES = {
    dashboard: "Dashboard Utama",
    produk: "Manajemen Produk & E-Commerce",
    order: "Manajemen Pesanan",
    agro: "Manajemen Agroeduwisata",
    katalog: "Manajemen Katalog Desa",
    testimoni: "Manajemen Testimoni",
    user: "Manajemen User & Settings",
};

const PANEL_DESCRIPTIONS = {
    dashboard: "Pantau ringkasan produk, katalog, pengguna, pesanan, dan statistik penjualan.",
    produk: "Kelola produk e-commerce, stok, harga, gambar, dan status produk unggulan.",
    order: "Pantau pesanan customer, pembayaran, pengiriman, dan status proses order.",
    agro: "Kelola konten agroeduwisata dan tahapan aktivitas wisata desa.",
    katalog: "Kelola katalog desa, kategori dokumen, gambar, dan tautan akses.",
    testimoni: "Kelola testimoni pengunjung dan rating yang tampil di website.",
    user: "Kelola akun admin, super admin, role akses, dan kredensial pengguna sistem.",
};

let salesChartInstance = null;

function isAdminDashboard() {
    return document.body.classList.contains("admin-dashboard");
}

function storageKey() {
    return document.getElementById("panel-user") ? "activeSuperAdminPanel" : "activeAdminPanel";
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");
    if (!sidebar) return;

    const isClosed = sidebar.classList.contains("-translate-x-full");
    sidebar.classList.toggle("-translate-x-full", !isClosed);
    if (overlay) overlay.classList.toggle("hidden", !isClosed);
}

function chartConfig() {
    const config = document.getElementById("admin-sales-chart-data");
    if (!config) return { labels: [], values: [], colors: [] };

    try {
        return JSON.parse(config.textContent || "{}");
    } catch (error) {
        console.warn("Gagal membaca konfigurasi chart admin.", error);
        return { labels: [], values: [], colors: [] };
    }
}

function initAdminSalesChart() {
    const canvas = document.getElementById("salesChart");
    if (!canvas || typeof Chart === "undefined") return;

    if (salesChartInstance) {
        salesChartInstance.resize();
        salesChartInstance.update();
        return;
    }

    const { labels = [], values = [], colors = [] } = chartConfig();
    const chartLabels = labels.map(() => "");
    const pointColors = labels.map((label, index) => colors[index] || "#004D40");

    salesChartInstance = new Chart(canvas, {
        type: "line",
        data: {
            labels: chartLabels,
            datasets: [{
                label: "Total Produk Terjual",
                data: values,
                backgroundColor: "rgba(0, 77, 64, 0.10)",
                borderColor: "#004D40",
                borderWidth: 3,
                pointBackgroundColor: pointColors,
                pointBorderColor: pointColors,
                pointBorderWidth: 2,
                pointHoverBackgroundColor: "#FFFFFF",
                pointHoverBorderColor: pointColors,
                pointRadius: 6,
                pointHoverRadius: 8,
                fill: true,
                tension: 0.35,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        display: false,
                        autoSkip: false,
                        maxRotation: 0,
                        minRotation: 0,
                        padding: 8,
                        font: { size: 11, family: "Public Sans" },
                    },
                },
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(0, 77, 64, 0.08)" },
                    ticks: { stepSize: 1, precision: 0 },
                },
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "rgba(0, 77, 64, 0.92)",
                    titleFont: { family: "Public Sans", size: 14 },
                    bodyFont: { family: "Public Sans", size: 13, weight: "bold" },
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        title(items) {
                            return labels[items[0].dataIndex] || "";
                        },
                        label(item) {
                            return `Terjual: ${item.parsed.y} Terjual`;
                        },
                    },
                },
            },
        },
    });
}

window.initChart = initAdminSalesChart;

window.tampilkanPanel = function (panelId, clickedElement = null) {
    document.querySelectorAll(".crud-panel").forEach((panel) => {
        panel.style.display = "none";
        panel.classList.add("hidden");
    });

    let activePanelId = panelId;
    let target = document.getElementById(`panel-${activePanelId}`);

    if (!target) {
        activePanelId = "dashboard";
        target = document.getElementById("panel-dashboard");
    }

    if (target) {
        target.classList.remove("hidden");
        target.style.display = "block";
        localStorage.setItem(storageKey(), activePanelId);

        const pageHeader = document.getElementById("admin-page-header");
        if (pageHeader) pageHeader.classList.toggle("hidden", activePanelId !== "dashboard");

        const title = document.getElementById("page-title");
        const description = document.getElementById("page-description");
        if (title) title.innerText = PANEL_TITLES[activePanelId] || "Dashboard";
        if (description) description.innerText = PANEL_DESCRIPTIONS[activePanelId] || PANEL_DESCRIPTIONS.dashboard;

        if (activePanelId === "dashboard") setTimeout(initAdminSalesChart, 0);
    }

    document.querySelectorAll(".menu-link").forEach((link) => {
        const isActive = clickedElement
            ? link === clickedElement
            : (link.getAttribute("onclick") || "").includes(activePanelId);

        link.classList.toggle("is-active", isActive);
    });

    const sidebar = document.getElementById("sidebar");
    if (window.innerWidth < 768 && sidebar && !sidebar.classList.contains("-translate-x-full")) {
        toggleSidebar();
    }
};

function bootAdminDashboard() {
    if (!isAdminDashboard()) return;

    document.getElementById("mobileMenuBtn")?.addEventListener("click", toggleSidebar);
    document.getElementById("closeSidebarBtn")?.addEventListener("click", toggleSidebar);
    document.getElementById("sidebarOverlay")?.addEventListener("click", toggleSidebar);

    const params = new URLSearchParams(window.location.search);
    const panelFromUrl = params.get("panel");
    const availablePanels = Object.keys(PANEL_TITLES);
    const activePanel = availablePanels.includes(panelFromUrl)
        ? panelFromUrl
        : (localStorage.getItem(storageKey()) || "dashboard");

    window.tampilkanPanel(activePanel);

    if (params.has("panel")) {
        params.delete("panel");
        const queryString = params.toString();
        window.history.replaceState({}, document.title, window.location.pathname + (queryString ? `?${queryString}` : ""));
    }
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootAdminDashboard);
} else {
    bootAdminDashboard();
}