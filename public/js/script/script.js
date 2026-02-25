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

$(document).ready(function () {
    $("#modalEditStatus").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditStatus").attr("action", `/statuses/${id}`);
    });
});

// Delete Department
$(document).on("click", ".deleteStatus", function () {
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
            $("#formDeleteStatus").attr("action", `/statuses/${id}`);
            $("#formDeleteStatus").submit();
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