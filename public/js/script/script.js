$(document).ready(function () {
    $("#modalEditCategory").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditCategory").attr("action", `/category/${id}`);
    });
});

// Delete Category
$(document).on("click", ".deleteCategory", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Kategori "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteCategory").attr("action", `/category/${id}`);
            $("#formDeleteCategory").submit();
        }
    });
});

// select2
$("#modalTambahProduct, #modalEditProduct, #modalTambahRak, #modalUbahRak").on(
    "shown.bs.modal",
    function () {
        $(this)
            .find(".select2")
            .select2({
                dropdownParent: $(this),
                width: "100%",
            });
    },
);

// Edit Product
$("#modalEditProduct .select2").select2({
    dropdownParent: $("#modalEditProduct"),
    width: "100%",
});

$(document).ready(function () {
    $("#modalEditProduct").on("shown.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const modal = $(this);

        const categoryId = button.data("category");

        modal.find("#category_id").val(String(categoryId)).trigger("change");

        const kuantitasId = button.data("qty");

        modal.find("#kuantitas_id").val(String(kuantitasId)).trigger("change");

        modal.find("#product_name").val(button.data("name"));
        modal.find("#amount").val(button.data("amount"));

        $("#formEditProduct").attr("action", `/product/${button.data("id")}`);
    });
});

// Delete Product
$(document).on("click", ".deleteProduct", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Produk "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteProduct").attr("action", `/product/${id}`);
            $("#formDeleteProduct").submit();
        }
    });
});

// Close Alert
document.addEventListener("DOMContentLoaded", function () {
    const alerts = document.querySelectorAll(".alert-dismissible");

    alerts.forEach((alert) => {
        setTimeout(() => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        }, 2000);
    });
});

// Ubah Kuantitas
$(document).ready(function () {
    $("#modalUbahKuantitas").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#nama_kuantitas").val(name);

        $("#formUbahKuantitas").attr("action", `/kuantitas/${id}`);
    });
});

// Delete Kuantitas
$(document).on("click", ".deleteKuantitas", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Kuantitas "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteKuantitas").attr("action", `/kuantitas/${id}`);
            $("#formDeleteKuantitas").submit();
        }
    });
});

// Ubah Level
$(document).ready(function () {
    $("#modalUbahLevel").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#nama_level").val(name);

        $("#formUbahLevel").attr("action", `/level/${id}`);
    });
});

// Delete Level
$(document).on("click", ".deleteLevel", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Level "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteLevel").attr("action", `/level/${id}`);
            $("#formDeleteLevel").submit();
        }
    });
});

// Ubah Rak
$(document).ready(function () {
    $("#modalUbahRak").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const modal = $(this);

        const levelId = button.data("level");

        modal.find("#level_id").val(String(levelId)).trigger("change");

        const id = button.data("id");
        const kode = button.data("kode_rak");
        const name = button.data("name");
        const lokasi = button.data("lokasi");
        const keterangan = button.data("ket");

        modal.find("#nama_rak").val(name);
        modal.find("#lokasi").val(lokasi);
        modal.find("#keterangan").val(keterangan);

        $("#formUbahRak").attr("action", `/rak/${id}`);
    });
});

// Delete Rak
$(document).on("click", ".deleteRak", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Rak "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteRak").attr("action", `/rak/${id}`);
            $("#formDeleteRak").submit();
        }
    });
});
