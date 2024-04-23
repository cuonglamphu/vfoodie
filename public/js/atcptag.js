$(document).ready(function() {
    var tagsUrl = $('body').data('tags-url'); // Lấy URL

    $.ajax({
        url: tagsUrl,
        type: "GET",
        success: function(data) {
            console.log(data);
            // Xử lý dữ liệu
        },
        error: function(error) {
            console.log(error);
        }
    });
});
