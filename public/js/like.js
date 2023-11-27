function like(photo_id){
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url:`/island/like/${photo_id}`,
        type:"POST",
    })
    .done(function (data,status,xhr){
        console.log(photo_id);
        $('#like-count-' + photo_id).text(data.likes_count + 'いいね');
    })
    .fail(function (xhr,status,error){
        console.error("Error:",error);
    });
}

$(document).ready(function() {
    $('button.like').on('click',function() {
        var photo_id = $(this).attr('data-photo-id');
        console.log('Clocked element:' , $(this));
        console.log('Clicked photo ID:' , photo_id);
        like(photo_id);
    });
});

