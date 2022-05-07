<style>
    textarea {
        resize: none;
    }
    header {
        text-align: center;
    }
    .create-form {
        display: flex;
        gap: 10px;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
    }
    .create-form input,
    .create-form textarea {
        width: 200px;
    }
    .create-form textarea {
        height: 100px;
    }
    .item-list {
        list-style: none;
    }
    .item-edit-form,
    .edit-form {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .edit-form {
        gap: 10px;
        margin-right: 20px;
    }
    .edit-form input {
        height: 22px;
    }
    .edit-form textarea {
        width: 300px;
        height: 22px;
    }
    .item-list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 224px;
    }
    .item-edit-form label {
        width: 100px;
        height: 100px;
    }
    .item-edit-form img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .file-label {
        cursor: pointer;
    }
    .file-label input {
        display: none;
    }
</style>

<header>
    <h2>Редактирование товаров</h2>
</header>
<section>
    <p>Создать товар</p>
    <form method="POST" class="create-form" enctype="multipart/form-data" action={{route('item.create')}}>
        @csrf
        <input type="text" name="name" placeholder="Введите название товара" required>
        <textarea name="text" placeholder="Введите описание товара" required></textarea>
        <select name="category">
            <option value="0">Без категории</option>
            @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <input type="text" name="price" placeholder="Введите цену">
        <input type="file" name="photo">
        <input type="submit" value="Создать">
    </form>
</section>
<main>
    <ul class="item-list">
        <li class="item-list-header">
            <p>Название</p>
            <p style="margin-left: 100px">Описание</p>
            <p style="margin-left: 243px">Цена</p>
            <p style="margin-left: 125px">Категория</p>
            <p style="margin-left: 45px">Изображение</p>
        </li>
        @foreach($items as $item)
            <li class="item-edit-form">
                <form class="edit-form" method="POST" enctype="multipart/form-data" action={{route('item.edit', ["id" => $item->id])}}>
                    @csrf
                    <input type="text" name="name" value={{$item->name}}>
                    <textarea type="text" name="text">{{$item->text}}</textarea>
                    <input type="text" name="price" value={{$item->price}}>
                    <select name="category">
                        @if (!$item->category)
                        <option value="0">Без категории</option>
                        @else
                        <option value={{$item->category->id}}>{{$item->category->name}}</option>
                        @endif
                        @foreach($categories as $category)
                            <option value={{$category->id}}>{{$category->name}}</option>
                        @endforeach
                        <option value="0">Без категории</option>
                    </select>
                    <label class="file-label" title="Сменить картинку">
                        <img alt="Image" src={{asset($item->photo)}}>
                        <input type="file" name="photo">
                    </label>
                    <input type="submit" value="Сохранить">
                </form>
                <form method="POST" class="delete-form" action={{route('item.delete', ["id" => $item->id])}}>
                    @csrf
                    <input type="submit" value="Удалить">
                </form>
            </li>
        @endforeach
    </ul>
</main>
