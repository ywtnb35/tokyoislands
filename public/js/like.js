$(document).ready(function() {
    $('.like-button').click(function() {
        var photoId = $(this).find('.like').data('photo-id');
        var $this = $(this);
        
        if($(this).find('.liked').hasClass('liked')){
            $.ajax({
                url: '/island/unlike/' + photoId,
                type: 'POST',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                console.log("Photo ID: " + photoId + ", Likes Count: " + response.likesCount);
                $('#like-count-' + photoId).text(response.likesCount + '件'); 
                $this.find('.like').toggleClass('liked');
                $('.like-count[data-photo-id="' + photoId + '"]').text(response.likesCount + '件');
                }
            });
        }else{
            $.ajax({
                url: '/island/like/' + photoId,
                type: 'POST',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                console.log("Photo ID: " + photoId + ", Likes Count: " + response.likesCount);
                $('#like-count-' + photoId).text(response.likesCount + '件'); 
                $this.find('.like').toggleClass('liked');
                $('.like-count[data-photo-id="' + photoId + '"]').text(response.likesCount + '件');
                }
            });
        }
    });
});

