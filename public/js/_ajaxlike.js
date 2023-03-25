$(function () {

// お気に入りボタンを押したとき
    $(".likebtn").on('click', function () {
        var shop_id = $(this).data('shop-id');
        var likebtn = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/likes/'+shop_id,
            method: 'GET',
            data: {
                'shop_id': shop_id
            },
        })


            .done(function (data) {
                likebtn.toggleClass('liked');
            })
            .fail(function (data, xhr, err) {
                alert('いいね処理失敗');
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });

        return false;
    });

// マイページのお気に入りボタンを押したとき
    $(".deleteLike-btn").on('click', function () {
        var shop_id = $(this).data('shop-id');
        var delete_btn = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/likes/'+shop_id,
            method: 'GET',
            data: {
                'shop_id': shop_id
            },
        })

            .done(function (data) {
                delete_btn.parents(".liked-shop").fadeOut();
            })
            .fail(function (data, xhr, err) {
                alert('いいね処理失敗');
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });

        return false;
    });
});
