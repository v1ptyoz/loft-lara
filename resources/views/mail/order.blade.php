<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
<p>Получен новый заказ №{{$order->id}}</p>
<p>Состав: </p>
<ol>
    @foreach($order->items as $item)
        <li>
        Товар: {{$item->name}}<br>
        Цена: {{$item->price}}
        </li>
    @endforeach
</ol>
<hr>
<p>Заказчик: {{$order->user->name}}</p>
<p>Email: {{$order->user->email}}</p>
</body>
</html>
