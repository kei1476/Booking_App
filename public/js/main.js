$(function () {
    $(".openbtn6").click(function () {
        $(this).toggleClass('active');
        $(".main-menu").toggleClass('open');
        $(".header-area").toggleClass('open');
        $("h1").toggleClass("hidden");
        $("footer").toggleClass("hidden");
    });

    var navPos = $(".header").offset().top;

    $(window).scroll(function () {
        $(window).scrollTop();
        if ($(window).scrollTop() > navPos) {
            $(".header").css("position", "fixed");
            $(".header-area").addClass("small");
        } else {
            $(".header").css("position", "static");
            $(".header-area").removeClass("small");
        }
    })

    // 予約ページの入力内容を反映し表示
    $("input[type='date']").change(function () {
        var date = $("input[type='date']").val();
        $('.show-bookdate').text(date);
    });

    $('#book-time').change(function () {
        var time = $('option:selected').val();
        $('.show-booktime').text(time);
    });

    $(".people").change(function () {
        var people = $('.people option:selected').val();
        $('.show-people').text(people + '人');
    });

    $(".course").change(function () {
        var courseName = $('.course option:selected').html();
        $('.show-course').text(courseName);
    });

    $(".book-delete-btn").click(function () {
        if (!confirm('削除してもよろしいですか？')) {
            return false;
        }
    });

    $(".detail-back-btn").hover(function () {
        $(".fa-chevron-left").css("transform","translateX(-3px)")
    }, function () {
        $(".fa-chevron-left").css("transform", "translateX(0px)")
    })

});


