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
//         // $('#like-count-' + photo_id).text(data.likes_count + 'いいね');
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



// function like(photo_id) {
//   $.ajax({
//     headers: {
//       "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
//     url: `island//like/${photo_id}`,
//     type: "POST",
//   })
//     .done(function (data, status, xhr) {
//       console.log(data);
//     })
//     .fail(function (xhr, status, error) {
//       console.log();
//     });
// }


document.addEventListener('DOMContentLoaded', function () {
    // すべてのいいねボタンを取得
    const likeButtons = document.querySelectorAll('.like-button .like');

    // 各いいねボタンに対してイベントリスナーを追加
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // 写真のIDを取得
            const photoId = this.dataset.photoId;

            // CSRFトークンを取得（Laravelの場合）
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Ajaxリクエストを送信
            fetch(`/island/like/${photoId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ photo_id: photoId })
            })
            .then(response => response.json())
            .then(data => {
                if(data.likes_count !== undefined) {
                    // いいねの数を更新
                    document.getElementById(`like-count-${photoId}`).textContent = `${data.likes_count}件`;
                } else {
                    // エラー処理
                    console.error('Error:', data);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});

