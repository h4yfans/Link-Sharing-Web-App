$(document).ready(function () {
    var postID = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //handle
    $('.vote').click(function (e) {
        // e.preventDefault();
        if (AuthCheck) {
            postID = e.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
            console.log(postID);

            $.ajax({
                url: 'vote',
                type: 'POST',
                data: {
                    class: $(this).attr('class'),
                    postId: postID
                },
                success: function (data) {
                    console.log(data);
                }
            });



        } else {
            $('#myModal').modal('show');
        }
    });

});