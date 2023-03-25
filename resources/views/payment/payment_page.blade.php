<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>決済ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="/pay" method="POST" class="text-center mt-5">
        {{ csrf_field() }}
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
            data-amount="{{$shop['price']}}" data-name="{{$shop['name']}}の予約" data-label="決済をする" data-description="{{$shop['course_name']}}先払い"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto"
            data-currency="JPY">
        </script>
        <input type="hidden" name="price" value="{{$shop['price']}}">
        <input type="hidden" name="book_id" value="{{$shop['book_id']}}">
    </form>
</body>

</html>
