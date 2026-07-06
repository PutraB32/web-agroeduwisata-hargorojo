window.scrollProduk = function (amount) {
    document
        .getElementById("produkUnggulanSlider")
        ?.scrollBy({ left: amount, behavior: "smooth" });
};


window.focusCustomerOrder = function (orderDomId) {
    if (!orderDomId) return;

    const order = document.getElementById(orderDomId);
    if (!order) return;

    order.scrollIntoView({ behavior: "smooth", block: "center" });
    order.classList.add("is-focused");

    setTimeout(() => {
        order.classList.remove("is-focused");
    }, 1800);
};
function removeStoredCart() {
    try {
        localStorage.removeItem("cart");
    } catch {
        // Keranjang tetap berjalan walaupun storage browser diblokir.
    }
}

window.printCustomerInvoice = function (invoiceId) {
    const invoice = document.getElementById(invoiceId);

    if (!invoice) {
        console.warn(`Invoice ${invoiceId} tidak ditemukan.`);
        return;
    }

    const previousTitle = document.title;
    const previousMount = document.querySelector(".customer-invoice-print__mount");
    previousMount?.remove();

    const printMount = document.createElement("div");
    printMount.className = "customer-invoice-print__mount";

    const printInvoice = invoice.cloneNode(true);
    printInvoice.removeAttribute("id");
    printInvoice.classList.add("is-printing");
    printMount.appendChild(printInvoice);
    document.body.appendChild(printMount);

    let cleaned = false;
    const cleanup = () => {
        if (cleaned) return;

        cleaned = true;
        printMount.remove();
        document.body.classList.remove("customer-invoice-printing");
        document.title = previousTitle;
        window.removeEventListener("afterprint", cleanup);
    };

    document.title = invoice.dataset.invoiceTitle || previousTitle;
    document.body.classList.add("customer-invoice-printing");
    window.addEventListener("afterprint", cleanup, { once: true });

    setTimeout(() => {
        window.print();
    }, 500);
};

window.cartApp = function (config = {}) {
    return {
        showToast: false,
        toastMessage: "",
        cartOpen: false,
        notifOpen: false,
        totalOrdersOpen: false,
        profileOpen: false,
        confirmDeleteOpen: false,
        productToDelete: null,
        checkoutLoading: false,
        csrfToken: config.csrfToken || "",
        routes: config.routes || {},
        checkoutForm: config.checkoutForm || {
            nama: "",
            no_telepon: "",
            alamat: "",
            metode_penerimaan: "cod_bayar_di_tempat",
        },
        cart: config.cart || [],

        subtotal() {
            return this.cart.reduce((total, item) => total + item.harga * item.qty, 0);
        },

        notify(message) {
            this.toastMessage = message;
            this.showToast = true;
            setTimeout(() => {
                this.showToast = false;
            }, 2500);
        },

        persistCart() {
            try {
                localStorage.setItem("cart", JSON.stringify(this.cart));
            } catch {
                // Keranjang tetap berjalan walaupun storage browser diblokir.
            }
        },

        openOrderHistoryFromNotification(orderDomId) {
            this.notifOpen = false;
            this.profileOpen = false;
            this.cartOpen = false;
            this.confirmDeleteOpen = false;

            window.setTimeout(() => {
                this.totalOrdersOpen = true;

                window.setTimeout(() => {
                    window.focusCustomerOrder(orderDomId);
                }, 40);
            }, 0);
        },

        async sendCartRequest(url, method, payload = {}) {
            const requestMethod = ["PUT", "PATCH", "DELETE"].includes(method) ? "POST" : method;
            const formData = new URLSearchParams();

            if (requestMethod !== method) formData.append("_method", method);

            Object.entries(payload).forEach(([key, value]) => {
                formData.append(key, value ?? "");
            });

            const response = await fetch(url, {
                method: requestMethod,
                credentials: "same-origin",
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": this.csrfToken,
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: formData,
            });
            const contentType = response.headers.get("content-type") || "";
            const data = contentType.includes("application/json") ? await response.json() : {};

            if (!response.ok) {
                if (data.redirect_url) window.location.href = data.redirect_url;
                throw new Error(data.message || "Permintaan gagal diproses.");
            }

            return data;
        },

        async addToCart(product) {
            try {
                const data = await this.sendCartRequest(this.routes.add, "POST", {
                    produk_id: product.id,
                    quantity: 1,
                });
                this.cart = Array.isArray(data.cart) ? data.cart : this.upsertLocalCart(product, 1);
                this.persistCart();
                this.notify(data.message || `${product.nama} berhasil ditambahkan ke keranjang`);
            } catch (error) {
                this.notify(error.message);
            }
        },

        upsertLocalCart(product, addQty) {
            const existing = this.cart.find((item) => item.id === product.id);
            existing ? (existing.qty += addQty) : this.cart.push({ ...product, qty: addQty });

            return this.cart;
        },

        async increaseQty(id) {
            const item = this.cart.find((item) => item.id === id);
            if (!item) return;

            await this.updateQty(id, item.qty + 1);
        },

        async decreaseQty(id) {
            const item = this.cart.find((item) => item.id === id);
            if (!item) return;

            item.qty > 1 ? await this.updateQty(id, item.qty - 1) : await this.removeItem(id);
        },

        async updateQty(id, quantity) {
            try {
                const data = await this.sendCartRequest(this.routes.update, "PUT", {
                    produk_id: id,
                    quantity,
                });
                this.cart = Array.isArray(data.cart)
                    ? data.cart
                    : this.cart.map((item) => (item.id === id ? { ...item, qty: quantity } : item));
                this.persistCart();
            } catch (error) {
                this.notify(error.message);
            }
        },

        async removeItem(id) {
            const item = this.cart.find((item) => item.id === id);

            try {
                const data = await this.sendCartRequest(this.routes.remove, "DELETE", { produk_id: id });
                this.cart = Array.isArray(data.cart) ? data.cart : this.cart.filter((item) => item.id !== id);
                this.persistCart();
                if (item) this.notify(`${item.nama} dihapus dari keranjang`);
            } catch (error) {
                this.notify(error.message);
            }
        },

        async checkout() {
            if (this.cart.length === 0) return this.notify("Keranjang belanja Anda kosong.");
            if (!this.checkoutForm.nama || !this.checkoutForm.no_telepon || !this.checkoutForm.alamat) {
                return this.notify("Lengkapi data pengiriman terlebih dahulu.");
            }

            this.checkoutLoading = true;

            try {
                const data = await this.sendCartRequest(this.routes.checkout, "POST", this.checkoutForm);

                if (data.snap_token && window.snap) return this.openMidtransPopup(data);

                this.cart = [];
                removeStoredCart();
                data.redirect_url
                    ? (window.location.href = data.redirect_url)
                    : this.notify(data.message || "Transaksi berhasil dibuat.");
            } catch (error) {
                this.notify(error.message);
            } finally {
                this.checkoutLoading = false;
            }
        },

        openMidtransPopup(data) {
            this.cart = [];
            this.cartOpen = false;
            this.checkoutLoading = false;
            removeStoredCart();

            window.snap.pay(data.snap_token, {
                onSuccess: () => this.finishMidtransCheckout(data, "Pembayaran berhasil. Status pesanan akan diperbarui."),
                onPending: () => this.finishMidtransCheckout(data, "Transaksi dibuat. Silakan selesaikan pembayaran."),
                onError: () => this.notify("Pembayaran gagal diproses. Silakan coba lagi."),
                onClose: () => this.notify("Pop-up pembayaran ditutup."),
            });
        },

        finishMidtransCheckout(data, message) {
            this.notify(message);

            setTimeout(() => {
                window.location.href = data.profile_orders_url || data.ecommerce_url || window.location.href;
            }, 900);
        },
    };
};
