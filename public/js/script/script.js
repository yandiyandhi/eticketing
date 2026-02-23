$(document).ready(function () {
    $("#modalEditDepartment").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditDepartment").attr("action", `/departments/${id}`);
    });
});
