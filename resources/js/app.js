import "./bootstrap";
import "./ecommerce-cart";
import "./order-notification";
import "./admin-custom-select";
import "./admin-modal";
import "./admin-dashboard";
import "./admin-order";
import "./admin-user";
import "./admin-crud";
import "./admin-toast";
import "./auth";

// =====================================================
// ALPINE COUNTER — untuk komponen Alpine.js
// =====================================================
window.counter = function (target, speed = 40) {
    return {
        count: 0,
        target: target,
        started: false,
        init() {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting && !this.started) {
                            this.started = true;
                            let interval = setInterval(() => {
                                if (this.count < this.target) {
                                    this.count++;
                                } else {
                                    clearInterval(interval);
                                }
                            }, speed);
                        }
                    });
                },
                {
                    threshold: 0.5,
                },
            );
            observer.observe(this.$el);
        },
    };
};

// =====================================================
// HERO PARALLAX — background bergerak saat scroll
// (semua hero parallax digabung dalam satu listener)
// =====================================================
const PARALLAX_IDS = [
    "hero-bg",
    "hero-profil-bg",
    "hero-produk-bg",
    "hero-katalog-bg",
    "hero-agro-bg",
];

window.addEventListener(
    "scroll",
    () => {
        PARALLAX_IDS.forEach((id) => {
            const bg = document.getElementById(id);
            if (!bg) return;
            bg.style.transform = `translateY(${window.scrollY * 0.35}px) scale(1.10)`;
        });
    },
    { passive: true },
);

// =====================================================
// SCROLL REVEAL — elemen muncul saat masuk viewport
// =====================================================
const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                revealObserver.unobserve(entry.target); // hanya sekali
            }
        });
    },
    {
        threshold: 0.15,
    },
);

document.querySelectorAll(".reveal, .line-expand").forEach((el) => {
    revealObserver.observe(el);
});

// =====================================================
// CARD SLIDE + BADGE + OVERLAY + ICON REVEAL
// =====================================================
const cardObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Card utama
                entry.target.classList.add("visible");

                // Badge number di dalam card
                const badge = entry.target.querySelector(".badge-pop");
                if (badge) badge.classList.add("visible");

                // Overlay gambar
                const overlay = entry.target.querySelector(
                    ".img-reveal-overlay",
                );
                if (overlay) overlay.classList.add("visible");

                // Icon features
                entry.target
                    .querySelectorAll(".icon-bounce")
                    .forEach((icon) => {
                        icon.classList.add("visible");
                    });

                cardObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.15,
    },
);

document
    .querySelectorAll(".card-slide-left, .card-slide-right")
    .forEach((el) => {
        cardObserver.observe(el);
    });

// =====================================================
// CTA SECTION — reveal observer
// =====================================================
const ctaObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target
                    .querySelectorAll(".reveal, .stat-border-grow")
                    .forEach((el) => {
                        el.classList.add("visible");
                    });
                ctaObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.2,
    },
);

document.querySelectorAll(".cta-section").forEach((el) => {
    ctaObserver.observe(el);
});

// =====================================================
// PRODUCT CARD STAGGER REVEAL
// =====================================================
const productObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                productObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.1,
    },
);

document.querySelectorAll(".product-card").forEach((el) => {
    productObserver.observe(el);
});

// =====================================================
// CATEGORY MENU STAGGER
// =====================================================
const catObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".cat-item").forEach((el) => {
                    el.classList.add("visible");
                });
                catObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.2 },
);

document.querySelectorAll(".cat-menu").forEach((el) => {
    catObserver.observe(el);
});

// =====================================================
// KATALOG CARD REVEAL
// =====================================================
const katalogObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                katalogObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".katalog-card").forEach((el) => {
    katalogObserver.observe(el);
});

// =====================================================
// TESTIMONI CARD STAGGER REVEAL
// =====================================================
const testiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                testiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".testi-card").forEach((el) => {
    testiObserver.observe(el);
});

// =====================================================
// MAIN BOX + STAT CARDS REVEAL (untuk .box-scale-in)
// =====================================================
const statsBoxObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Main box
                entry.target.classList.add("visible");

                // Stat cards di dalam box
                entry.target.querySelectorAll(".stat-card").forEach((card) => {
                    card.classList.add("visible");
                });

                // Left content reveal items
                entry.target.querySelectorAll(".reveal").forEach((el) => {
                    el.classList.add("visible");
                });

                statsBoxObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.1 },
);

document.querySelectorAll(".box-scale-in").forEach((el) => {
    statsBoxObserver.observe(el);
});

// =====================================================
// PLAIN COUNT-UP — untuk angka statis (bukan Alpine)
// =====================================================
function animateCount(el, target, duration = 1500) {
    const isPercent = target.includes("%");
    const isPlus = target.includes("+");
    const isDot = target.includes(".");

    let numStr = target.replace(/[^0-9.]/g, "");
    let num = parseFloat(numStr);
    let startTime = null;

    function step(timestamp) {
        if (!startTime) startTime = timestamp;
        const progress = Math.min((timestamp - startTime) / duration, 1);
        const ease = 1 - Math.pow(1 - progress, 3);
        let current = Math.floor(ease * num);

        if (isDot) {
            current = (ease * num).toFixed(3).replace(".", ".");
            el.textContent = current + (isPlus ? "+" : "");
        } else {
            el.textContent =
                current.toLocaleString("id-ID") +
                (isPercent ? "%" : isPlus ? "+" : "");
        }

        if (progress < 1) requestAnimationFrame(step);
    }

    requestAnimationFrame(step);
}

const countObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const raw = el.dataset.count;
                animateCount(el, raw);
                countObserver.unobserve(el);
            }
        });
    },
    { threshold: 0.5 },
);

document.querySelectorAll("[data-count]").forEach((el) => {
    countObserver.observe(el);
});

// =====================================================
// TYPEWRITER — hapus cursor setelah animasi selesai
// =====================================================
const twEl = document.getElementById("typewriter-title");
if (twEl) {
    setTimeout(() => {
        twEl.style.width = "100%"; // kunci lebar sebelum animation: none
        twEl.style.borderColor = "transparent";
        twEl.style.animation = "none";
    }, 2800);
}

// =====================================================
// SEJARAH SECTION REVEAL
// =====================================================
const sejarahObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".slide-left").forEach((el) => {
                    el.classList.add("visible");
                });

                const img = entry.target.querySelector(".img-slide-right");
                if (img) img.classList.add("visible");

                const card = entry.target.querySelector(".float-card-pop");
                if (card) card.classList.add("visible");

                sejarahObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".sejarah-section").forEach((el) => {
    sejarahObserver.observe(el);
});

// =====================================================
// VISI MISI REVEAL
// =====================================================
const visiMisiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target
                    .querySelectorAll(".visi-card, .misi-card")
                    .forEach((el) => {
                        el.classList.add("visible");
                    });
                visiMisiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".visimisi-section").forEach((el) => {
    visiMisiObserver.observe(el);
});

// =====================================================
// FONDASI CARD STAGGER REVEAL
// =====================================================
const fondasiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                fondasiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".fondasi-card").forEach((el) => {
    fondasiObserver.observe(el);
});

// =====================================================
// LOKASI SECTION REVEAL
// =====================================================
const lokasiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Left content
                entry.target.querySelectorAll(".slide-left").forEach((el) => {
                    el.classList.add("visible");
                });

                // Map slide + glow
                const map = entry.target.querySelector(".map-slide");
                if (map) map.classList.add("visible");

                const glow = entry.target.querySelector(".map-glow");
                if (glow) glow.classList.add("visible");

                lokasiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".lokasi-section").forEach((el) => {
    lokasiObserver.observe(el);
});

// =====================================================
// GALERI SECTION REVEAL
// =====================================================
const galeriObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Large image
                const large = entry.target.querySelector(".galeri-large");
                if (large) large.classList.add("visible");

                // Small images stagger
                entry.target.querySelectorAll(".galeri-item").forEach((el) => {
                    el.classList.add("visible");
                });

                galeriObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".galeri-section").forEach((el) => {
    galeriObserver.observe(el);
});

// =====================================================
// PRODUCT ROW REVEAL
// =====================================================
const produkRowObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const content = entry.target.querySelector(
                    ".produk-content-left, .produk-content-right",
                );
                if (content) content.classList.add("visible");

                const img = entry.target.querySelector(".produk-img-reveal");
                if (img) img.classList.add("visible");

                produkRowObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".produk-row").forEach((el) => {
    produkRowObserver.observe(el);
});

// =====================================================
// KEUNGGULAN CARD STAGGER REVEAL
// =====================================================
const keunggulanObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                keunggulanObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".keunggulan-card").forEach((el) => {
    keunggulanObserver.observe(el);
});

// =====================================================
// DOM CONTENT LOADED — inisialisasi awal
// =====================================================
document.addEventListener("DOMContentLoaded", () => {
    // Berita utama dari kiri
    const beritaUtama = document.querySelector(".hero-slide-left");
    if (beritaUtama) {
        setTimeout(() => beritaUtama.classList.add("visible"), 50);
    }

    // Sidebar dari kanan
    const sidebar = document.querySelector(".sidebar-slide");
    if (sidebar) {
        setTimeout(() => sidebar.classList.add("visible"), 50);
    }

    // Sidebar items visible on load (berita/news layout)
    document.querySelectorAll(".sidebar-item").forEach((el) => {
        setTimeout(() => el.classList.add("visible"), 50);
    });
});

// =====================================================
// PENGUMUMAN SECTION REVEAL
// =====================================================
const pengumumanObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".reveal").forEach((el) => {
                    el.classList.add("visible");
                });
                entry.target
                    .querySelectorAll(".pengumuman-card")
                    .forEach((el) => {
                        el.classList.add("visible");
                    });
                pengumumanObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.1 },
);

document.querySelectorAll(".pengumuman-section").forEach((el) => {
    pengumumanObserver.observe(el);
});

// =====================================================
// ARTIKEL SECTION REVEAL
// =====================================================
const artikelObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".reveal").forEach((el) => {
                    el.classList.add("visible");
                });
                entry.target.querySelectorAll(".artikel-card").forEach((el) => {
                    el.classList.add("visible");
                });
                artikelObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.08 },
);

document.querySelectorAll(".artikel-section").forEach((el) => {
    artikelObserver.observe(el);
});

// =====================================================
// PERPUSTAKAAN CARD REVEAL
// =====================================================
const perpusObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".reveal").forEach((el) => {
                    el.classList.add("visible");
                });
                entry.target.querySelectorAll(".perpus-card").forEach((el) => {
                    el.classList.add("visible");
                });
                perpusObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.1 },
);

document.querySelectorAll(".perpus-section").forEach((el) => {
    perpusObserver.observe(el);
});

// =====================================================
// GALERI KATALOG REVEAL
// =====================================================
const galeriKatalogObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".reveal").forEach((el) => {
                    el.classList.add("visible");
                });

                const hero = entry.target.querySelector(".galeri-katalog-hero");
                if (hero) hero.classList.add("visible");

                entry.target
                    .querySelectorAll(".galeri-katalog-item")
                    .forEach((el) => {
                        el.classList.add("visible");
                    });

                galeriKatalogObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.1 },
);

document.querySelectorAll(".galeri-katalog-section").forEach((el) => {
    galeriKatalogObserver.observe(el);
});

// =====================================================
// TIMELINE LINE GROW
// =====================================================
const timelineLineObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const line = entry.target.querySelector(".timeline-line");
                if (line) line.classList.add("visible");
                timelineLineObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.05 },
);

document.querySelectorAll(".timeline-section").forEach((el) => {
    timelineLineObserver.observe(el);
});

// =====================================================
// TIMELINE ROW — trigger per row, bergantian kiri-kanan
// =====================================================
const rowObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const row = entry.target;

                const left = row.querySelector(".timeline-row-left");
                if (left) left.classList.add("visible");

                const right = row.querySelector(".timeline-row-right");
                if (right) {
                    setTimeout(() => right.classList.add("visible"), 250);
                }

                const dot = row.querySelector(".timeline-dot");
                if (dot) dot.classList.add("visible");

                rowObserver.unobserve(row);
            }
        });
    },
    {
        threshold: 0,
        rootMargin: "0px 0px -180px 0px",
    },
);

document.querySelectorAll(".timeline-row").forEach((el) => {
    rowObserver.observe(el);
});

// =====================================================
// QUOTE FADE + WORD BY WORD
// =====================================================
const quoteObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");

                const blockquote = entry.target.querySelector(".quote-blockquote");
                if (blockquote) {
                    const text = blockquote.textContent.trim();
                    const words = text.split(" ");

                    blockquote.innerHTML = words
                        .map((word) => `<span class="word-fade">${word}</span>`)
                        .join(" ");

                    blockquote
                        .querySelectorAll(".word-fade")
                        .forEach((span, index) => {
                            setTimeout(() => {
                                span.classList.add("visible");
                            }, 300 + index * 60);
                        });
                }

                quoteObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.3,
        rootMargin: "0px 0px -50px 0px",
    },
);

document.querySelectorAll(".quote-fade").forEach((el) => {
    quoteObserver.observe(el);
});

// =====================================================
// EDUKASI PERTANIAN REVEAL
// =====================================================
const edukasiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const left = entry.target.querySelector(".edukasi-left");
                if (left) left.classList.add("visible");

                const right = entry.target.querySelector(".edukasi-right");
                if (right) right.classList.add("visible");

                edukasiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".edukasi-section").forEach((el) => {
    edukasiObserver.observe(el);
});

// =====================================================
// WISATA ALAM CARDS REVEAL
// =====================================================
const wisataObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                wisataObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.15,
        rootMargin: "0px 0px -80px 0px",
    },
);

document
    .querySelectorAll(".wisata-card-left, .wisata-card-right, .wisata-card-full")
    .forEach((el) => {
        wisataObserver.observe(el);
    });

// =====================================================
// BUDAYA DESA — TIMELINE ITEM
// =====================================================
const budayaObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                budayaObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.15,
        rootMargin: "0px 0px -80px 0px",
    },
);

document.querySelectorAll(".budaya-item").forEach((el) => {
    budayaObserver.observe(el);
});

// =====================================================
// BUDAYA DESA — KOLASE
// =====================================================
const kolaseObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                kolaseObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 },
);

document.querySelectorAll(".kolase-hero, .kolase-item").forEach((el) => {
    kolaseObserver.observe(el);
});

// =====================================================
// BUDAYA DESA — NILAI CARD
// =====================================================
const nilaiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".nilai-card").forEach((el) => {
                    el.classList.add("visible");
                });
                nilaiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 },
);

document.querySelectorAll(".nilai-grid").forEach((el) => {
    nilaiObserver.observe(el);
});

// =====================================================
// MENGAPA TRADISIONAL REVEAL
// =====================================================
const tradisiObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll(".tradisi-card").forEach((el) => {
                    el.classList.add("visible");
                });

                const panel = entry.target.querySelector(".tradisi-quote-panel");
                if (panel) panel.classList.add("visible");

                tradisiObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.1 },
);

const tradisiFootnoteObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                tradisiFootnoteObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.4 },
);

document.querySelectorAll(".tradisi-section").forEach((el) => {
    tradisiObserver.observe(el);
});

document.querySelectorAll(".tradisi-footnote").forEach((el) => {
    tradisiFootnoteObserver.observe(el);
});
// =====================================================
// PUBLIC TESTIMONI MODAL
// =====================================================
function setupPublicTestimoniModal() {
    const modal = document.getElementById("modal-testimoni-public");
    if (!modal) return;

    const openButtons = document.querySelectorAll("[data-open-public-testimoni]");
    const closeButtons = modal.querySelectorAll("[data-close-public-testimoni]");
    const firstField = modal.querySelector("form input, form textarea, form select, form button");

    const lockPage = () => {
        document.documentElement.style.overflow = "hidden";
        document.body.style.overflow = "hidden";
    };

    const unlockPage = () => {
        document.documentElement.style.overflow = "";
        document.body.style.overflow = "";
    };

    const openModal = () => {
        if (modal.parentElement !== document.body) {
            document.body.appendChild(modal);
        }

        modal.classList.remove("hidden");
        modal.style.display = "flex";
        modal.style.alignItems = "center";
        modal.style.justifyContent = "center";
        modal.style.zIndex = "99999";
        modal.classList.add("flex");
        lockPage();
        firstField?.focus({ preventScroll: true });
    };

    const closeModal = () => {
        modal.classList.add("hidden");
        modal.style.display = "none";
        modal.classList.remove("flex");
        unlockPage();
    };

    openButtons.forEach((button) => {
        button.addEventListener("click", openModal);
    });

    closeButtons.forEach((button) => {
        button.addEventListener("click", closeModal);
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !modal.classList.contains("hidden")) {
            closeModal();
        }
    });
}

document.addEventListener("DOMContentLoaded", setupPublicTestimoniModal);
