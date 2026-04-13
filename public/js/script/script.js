// Edit Department

$(document).ready(function () {
    $("#modalEditDepartment").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditDepartment").attr("action", `/departments/${id}`);
    });
});

// Delete Department
$(document).on("click", ".deleteDepartment", function () {
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
            $("#formDeleteDepartment").attr("action", `/departments/${id}`);
            $("#formDeleteDepartment").submit();
        }
    });
});

// Edit Divisi

$(document).ready(function () {
    $("#modalEditDivisi").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditDivisi").attr("action", `/divisi/${id}`);
    });
});

// Delete Divisi
$(document).on("click", ".deleteDivisi", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Divisi "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteDivisi").attr("action", `/divisi/${id}`);
            $("#formDeleteDivisi").submit();
        }
    });
});

// Delete Kantor
$(document).on("click", ".deleteKantor", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Kantor "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteKantor").attr("action", `/kantor/${id}`);
            $("#formDeleteKantor").submit();
        }
    });
});

$(document).ready(function () {
    $("#modalEditStatus").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditStatus").attr("action", `/statuses/${id}`);
    });
});

// Delete Status
$(document).on("click", ".deleteStatus", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Status "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteStatus").attr("action", `/statuses/${id}`);
            $("#formDeleteStatus").submit();
        }
    });
});

$(document).ready(function () {
    $("#modalEditKpi").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditKpi").attr("action", `/kpi/${id}`);
    });
});

$(document).on("click", ".deleteKpi", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `KPI "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteKpi").attr("action", `/kpi/${id}`);
            $("#formDeleteKpi").submit();
        }
    });
});

$(document).ready(function () {
    $("#modalEditCategory").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#task_name").val(name);

        $("#formEditCategory").attr("action", `/category/${id}`);
    });
});

$(document).on("click", ".deleteCategory", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `KPI "${name}" akan dihapus`,
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


// Request Ticketing Success
$(document).on("click", ".StatusRequestSuccess", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");
    console.log(id, name);
    Swal.fire({
        title: "Yakin ingin update?",
        text: `Status akan diupdate menjadi "${name}"`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, update",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formUpdateStatus").attr("action", `/user/update/status/success/${id}`);
            $("#formUpdateStatus").submit();
        }
    });
});

// Request Ticketing Cancel
$(document).on("click", ".StatusRequestCancel", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin update?",
        text: `Status akan diupdate menjadi "${name}"`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, update",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formUpdateStatus").attr("action", `/user/update/status/cancel/${id}`);
            $("#formUpdateStatus").submit();
        }
    });
});

// Delete Role
$(document).on("click", ".deleteRole", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Role "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteRole").attr("action", `/role/${id}`);
            $("#formDeleteRole").submit();
        }
    });
});