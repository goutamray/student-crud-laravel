$(document).ready(function () {
    $(".delete-btn").on("click", function (e) {
        if (!confirm("Are you sure?")) {
            e.preventDefault();
        }
    });
});
