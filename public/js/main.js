$(document).ready(function () {
    getPosts();
    
    const post_id = $("#post-details").attr('data-post-id');
    getCommentsOfPosts(post_id);

    $("#comment-form-submit").submit(function(e) {
        e.preventDefault();
        const formData = $(this).serialize();
        const saveButton = $("#save-comment-button");
        // const post_id = $("#post-detail").attr("data-post-id");

        saveButton.html('Saving <i class="fa fa-spin fa-spinner fa-2x" aria-hidden="true"></i>');
        $.ajax({
            method: "POST",
            url: "/api/comments/" + post_id,
            data: formData,
            success: (result) => {
                $("#comment-input").val('');
                $("#comment-error-data").text('');
                $("#successMessage").removeClass('visually-hidden');
                saveButton.html("Save");
                getCommentsOfPosts(post_id);
            },
            error: (error) => {
                saveButton.html("Save");
                $("#successMessage").addClass('visually-hidden');
                if(error.status === 422){ 
                    const message = error.responseJSON.errors ? error.responseJSON.errors.comment ?  error.responseJSON.errors.comment[0] : '' : '';
                    $("#comment-error-data").text(message);
                }
            }
        });
    });
});


function getCommentsOfPosts(post_id) {
    $.ajax({
        method: "GET",
        url: "/api/comments/" + post_id,
        success: (result) => {
            $('#post-comments').html(result);
        },
        error: (error) => {
            alert("Sorry, Something went wrong!");
        }
    });
}
function getPosts() {
    $.ajax({
        method: "GET",
        url: "/api/posts",
        success: (result) => {
            $("#get-posts").html(result);
        },
        error: (error) => {
            alert("Sorry, Something went wrong!");
        }
    });
}