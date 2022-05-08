<header>
    <h2>Подтверждение заказа</h2>
</header>

<main>
    <h3>Вы покупаете товар {{$item->name}} за {{$item->price}} руб.</h3>

    <p>Нажмите кнопку "Подтвердить", чтобы отправить заявку менеджеру.</p>
    <p>При необходимости, измените email для уведомлений в поле ниже</p>

    <form method="POST" action={{route("shop.confirm")}}>
        @csrf
        <input type="hidden" name="item" value={{$item->id}}>
        <input type="text" name="email" value={{Auth::user()->email}}>
        <input type="submit" value="Подвердить заказ">
    </form>
</main>
