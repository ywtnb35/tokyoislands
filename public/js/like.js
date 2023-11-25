function like(photo_id){
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url:`/island/like/${photo_id}`,
        type:"POST",
    })
    .done(function (data){
        console.log('Success:',data);
        $('#like-count-' + photo_id).text(data.likes_count + 'いいね');
    })
    .fail(function (xhr,status,error){
        console.error("Error:",error);
    });
}

$(document).ready(function() {
    $('.like-button .like').on('click',function() {
        var photo_id = $(this).data('photo-id');
        like(photo_id);
    });
});