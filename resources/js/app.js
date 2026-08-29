import Alpine from "alpinejs";

// Define Alpine Cart Store
Alpine.store("cart", {
    items: JSON.parse(localStorage.getItem("cn_cart") || "[]"),
    isOpen: false,
    customerNote: "",
    toastMessage: "",
    showToastNotification: false,
    toastTimeout: null,

    save() {
        localStorage.setItem("cn_cart", JSON.stringify(this.items));
    },

    get totalCount() {
        return this.items.reduce((sum, item) => sum + Number(item.qty), 0);
    },

    get totalItems() {
        return this.items.length;
    },

    get totalPrice() {
        return this.items.reduce(
            (sum, item) => sum + Number(item.price) * Number(item.qty),
            0,
        );
    },

    addItem(product, qty = null) {
        if (!product) return;
        const minQty =
            product.min_order && parseInt(product.min_order) > 0
                ? parseInt(product.min_order)
                : 1;
        const quantityToAdd =
            qty !== null ? Number(qty) : minQty > 1 ? minQty : 1;

        const existing = this.items.find((item) => item.id === product.id);
        if (existing) {
            existing.qty += qty !== null ? Number(qty) : 1;
        } else {
            this.items.push({
                id: product.id,
                name: product.name,
                price: Number(product.price),
                image: product.image,
                package_category: product.package_category,
                tier: product.tier,
                min_order: minQty,
                qty: quantityToAdd,
            });
        }
        this.save();
        this.showToast(
            '"' + product.name + '" berhasil ditambahkan ke keranjang!',
        );
    },

    updateQty(id, delta) {
        const item = this.items.find((i) => i.id === id);
        if (!item) return;
        item.qty = Number(item.qty) + delta;
        if (item.qty <= 0) {
            this.removeItem(id);
        } else {
            this.save();
        }
    },

    removeItem(id) {
        this.items = this.items.filter((i) => i.id !== id);
        this.save();
    },

    clearCart() {
        if (confirm("Apakah Anda yakin ingin mengosongkan keranjang?")) {
            this.items = [];
            this.save();
        }
    },

    toggle() {
        this.isOpen = !this.isOpen;
        if (this.isOpen) {
            document.body.classList.add("overflow-hidden");
        } else {
            document.body.classList.remove("overflow-hidden");
        }
    },

    open() {
        this.isOpen = true;
        document.body.classList.add("overflow-hidden");
    },

    close() {
        this.isOpen = false;
        document.body.classList.remove("overflow-hidden");
    },

    formatPrice(num) {
        return new Intl.NumberFormat("id-ID").format(num || 0);
    },

    get checkoutWhatsAppUrl() {
        const phone = "628561155113";
        if (this.items.length === 0) return "#";

        let text =
            "Halo *Catering Nusantara*, saya ingin memesan menu catering berikut:\n\n";
        text += "🛒 *RINCIAN PESANAN:*\n";
        text += "================================\n";

        this.items.forEach((item, index) => {
            const subtotal = Number(item.price) * Number(item.qty);
            text += `${index + 1}. *${item.name}*\n`;
            if (item.package_category)
                text += `   • Kategori: ${item.package_category}\n`;
            text += `   • Jumlah: ${item.qty} porsi\n`;
            text += `   • Harga: Rp ${this.formatPrice(item.price)} / pax\n`;
            text += `   • Subtotal: Rp ${this.formatPrice(subtotal)}\n\n`;
        });

        text += "================================\n";
        text += `📦 *Total Menu:* ${this.totalItems} menu (${this.totalCount} porsi)\n`;
        text += `💰 *TOTAL ESTIMASI: Rp ${this.formatPrice(this.totalPrice)}*\n`;

        if (this.customerNote && this.customerNote.trim() !== "") {
            text += `\n📝 *Catatan Khusus:*\n${this.customerNote.trim()}\n`;
        }

        text +=
            "\nMohon informasi ketersediaan menu dan tata cara pembayarannya. Terima kasih! 🙏";

        return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
    },

    showToast(msg) {
        this.toastMessage = msg;
        this.showToastNotification = true;
        if (this.toastTimeout) clearTimeout(this.toastTimeout);
        this.toastTimeout = setTimeout(() => {
            this.showToastNotification = false;
        }, 3000);
    },
});

window.Alpine = Alpine;
Alpine.start();
