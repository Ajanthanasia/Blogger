$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".ajax_dislike2").click(function () {
        var url = $("#url_dis").val();
        var id = $(this).data('post_id');

        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (res) {
                $("#ajax_dislike2_" + res.id).text(res.dislikes);
                $("#ajax_like_count_" + res.id).text(res.likes);
                $("#ajax_post_id").text(res.id);
                $("#ajax_msg").text(res.msg);
                // console.log(res.status);
                // console.log(res.id);
            }

        });
    });

});
