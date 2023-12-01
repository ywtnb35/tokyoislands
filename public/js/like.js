// function like(photo_id){
//     $.ajax({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         url:`/island/like/${photo_id}`,
//         type:"POST",
//     })
//     .done(function (data,status,xhr){
//         console.log(photo_id);
//         $('#like-count-' + photo_id).text(data.likes_count + 'いいね');
//     })
//     .fail(function (xhr,status,error){
//         console.error("Error:",error);
//     });
// }

// $(document).ready(function() {
//     $('button.like').on('click',function() {
//         var photo_id = $(this).attr('data-photo-id');
//         console.log('Clocked element:' , $(this));
//         console.log('Clicked photo ID:' , photo_id);
//         like(photo_id);
//     });
// });


// $(document).ready(function() {
//     $('button.like').on('click', function() {
//         var button = $(this);
//         var photo_id = $(this).data('photo-id');
//         var isLiked = $(this).hasClass('liked');
//         var url = `/island/${isLiked ? 'unlike' : 'like'}/${photo_id}`;
//         var method = 'POST'; // 両方のリクエストでPOSTを使用

//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             url: url,
//             type: method,
//             success: function(data) {
//                 $('#like-count-' + photo_id).text(data.likes_count + 'いいね');
//                 button.toggleClass('liked');
//             },
//             error: function(xhr, status, error) {
//                 console.error("Error:", error);
//             }
//         });
//     });
// });


$(document).ready(function() {
    $('.like-button').click(function() {
        var photoId = $(this).find('.like').data('photo-id');
        var $this = $(this);

        $.ajax({
            url: '/island/like/' + photoId,
            type: 'POST',
            data: { _token: $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
            console.log("Photo ID: " + photoId + ", Likes Count: " + response.likesCount);
            $('#like-count-' + photoId).text(response.likesCount + '件'); // ここを修正
            $this.toggleClass('liked');
            }
        });
    });
});



