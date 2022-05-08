<style>
    header {
        text-align: center;
    }
    .table-header {
        font-weight: bold;
    }
    td {
        width: 200px;
    }
    .table-item ol {
        margin: 0;
        padding: 0;
    }
</style>
<header>
    <h2>Редактирование заказов</h2>
</header>

<table>
    <tr class="table-header">
        <td>Номер заказа</td>
        <td>Дата и время заказа</td>
        <td>Товары</td>
        <td>Пользователь</td>
        <td>Email</td>
        <td></td>
    </tr>
    @foreach($orders as $order)
        <tr class="table-item">
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                <ol>
                    @foreach($order->items as $item)
                        <li>{{$item->name}}</li>
                    @endforeach
                </ol>
            </td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->email}}</td>
            <td>
                <form method="POST" action={{route('order.delete', ["id" => $order->id])}}>
                    @csrf
                    <input type="submit" value="Удалить заказ">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<a href={{route('admin.index')}}>Вернуться в админку</a>
