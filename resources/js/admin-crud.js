function setValue(id, value) {
    const element = document.getElementById(id);
    if (!element) return;
    element.value = value ?? "";
    element.dispatchEvent(new Event("change", { bubbles: true }));
}

window.openEditModal = function (id, nama, harga, stok, deskripsi, manfaat, isUnggulan) {
    window.openModal?.("modal-edit-produk");
    const form = document.getElementById("form-edit");
    if (form) {
        form.reset();
        form.action = `/admin/produk/${id}`;
    }

    setValue("edit-nama", nama);
    setValue("edit-harga", harga);
    setValue("edit-stok", stok);
    setValue("edit-deskripsi", deskripsi);
    setValue("edit-manfaat", manfaat);

    const unggulan = document.getElementById("edit-unggulan");
    if (unggulan) unggulan.checked = Boolean(isUnggulan);
};

window.openEditModalAgro = function (id, parentId, judul, deskripsi) {
    window.openModal?.("modal-edit-agro");
    const form = document.getElementById("form-edit-agro");
    if (form) form.action = `/admin/agroeduwisata/${id}`;

    setValue("edit-agro-parent", parentId);
    setValue("edit-agro-judul", judul);
    setValue("edit-agro-deskripsi", deskripsi);
};

window.openEditModalKatalog = function (id, kategoriId, judul, deskripsi, url) {
    window.openModal?.("modal-edit-katalog");
    const form = document.getElementById("form-edit-katalog");
    if (form) form.action = `/admin/katalog/${id}`;

    setValue("edit-katalog-kategori", kategoriId);
    setValue("edit-katalog-judul", judul);
    setValue("edit-katalog-deskripsi", deskripsi);
    setValue("edit-katalog-url", url);
};

window.openEditModalTestimoni = function (id, nama, isi, rating) {
    window.openModal?.("modal-edit-testimoni");
    const form = document.getElementById("form-edit-testimoni");
    if (form) form.action = `/admin/testimoni/${id}`;

    setValue("edit-testimoni-nama", nama);
    setValue("edit-testimoni-isi", isi);
    setValue("edit-testimoni-rating", rating);
};

window.openEditKatKatalog = function (id, nama) {
    window.openModal?.("modal-edit-kat-katalog");
    const form = document.getElementById("form-edit-kat-katalog");
    if (form) form.action = `/admin/kategori-katalog/${id}`;

    setValue("edit-nama-katalog", nama);
};