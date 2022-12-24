$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // event.preventDefault();
    $(".ajax_like").click(function () {
        var url = $("#url").val();
        // var id = $('.post_id').val();
        var id = $(this).data('post_id');

        console.log(id);
        $.ajax({
            // url:"http://127.0.0.1:8000/ajaxlike",
            url: url,
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (res) {
                $("#ajax_like_count_" + res.id).text(res.likes);
                $("#ajax_dislike2_" + res.id).text(res.dislikes);
                $("#ajax_post_id").text(res.id);
                $("#ajax_msg").text(res.msg);
                console.log(res.status);
                console.log(res.id);
                // document.getElementById("ajax_id").innerHTML = res.id;
            }

        });
    });
    // console.log(res.id);
    // const myJSON = '{"id":}';
    $(".ajax_dislike").click(function() {

        var url_dislike = $(this).data('url');
        var url = $("#" + url_dislike).val();

        var id = $(this).data('post_id');

        $.ajax({
            url:url,
            type:"DELETE",
            data:{
                id:id
            },
            dataType: "JSON",
            success: function (res) {
                $("#ajax_like_count_" + id).text(res.status);
                // $("#ajax_post_id").text(res.id);
                $("#ajax_msg").text(res.msg);
            }
        });
    });


});
