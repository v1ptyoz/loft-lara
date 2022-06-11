<h2>Заказ №{{$id}} создан. Ожидайте звонка оператора</h2>

<script>
    setTimeout(() => {
        document.location.href="/";
    }, 3000)
</script>

<a href={{route("index")}}>Вернуться на главную страницу</a>
