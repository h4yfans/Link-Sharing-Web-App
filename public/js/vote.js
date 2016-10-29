$(document).ready(function () {
    var postID = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //handle
    $('.vote').click(function (e) {
        e.preventDefault();

        if (AuthCheck) {
            //don't want to use jquery. idk why but i like parentnode :)
            postID = e.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
            // change links like status
            $.ajax({
                url: 'UpdateLike',
                type: 'POST',
                data: {
                    class: $(this).attr('class'),
                    postId: postID
                }
            });
            // display sum of votes
            $.ajax({
                url: 'UpdateLikeSum',
                type: 'POST',
                data: {
                    // class: $(this).attr('class'),
                    postId: postID
                },
                success: function( voteStatus ) {
                    $('.votes-' + postID).text(voteStatus.post + ' votes so far');
                }
            });

            /*var voted = $(this).hasClass('active');
            if(voted){
                $(this).removeClass('active')

            }else if(!voted){
                $(this).addClass('active')
            }*/

        } else {
            $('#myModal').modal('show');
        }
    });

});