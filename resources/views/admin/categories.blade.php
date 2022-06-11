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
    .category-list {
        list-style: none;
    }
    .category-item,
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
    .category-list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 224px;
    }
</style>

<header>
    <h2>Редактирование категорий</h2>
</header>
<section>
    <p>Создать категорию</p>
    <form method="POST" class="create-form" action={{route('category.create')}}>
        @csrf
        <input type="text" name="name" placeholder="Введите название категории" required>
        <textarea name="text" placeholder="Введите описание категории" required></textarea>
        <input type="submit" value="Создать">
    </form>
</section>
<main>
    <ul class="category-list">
        <li class="category-list-header">
            <p>Название</p>
            <p>Описание</p>
        </li>
        @foreach($categories as $category)
        <li class="category-item">
            <form class="edit-form" method="POST" action={{route('category.edit', ["id" => $category->id])}}>
                @csrf
                <input type="text" name="name" value={{$category->name}}>
                <textarea type="text" name="text">{{$category->text}}</textarea>
                <input type="submit" value="Сохранить">
            </form>
            <form method="POST" class="delete-form" action={{route('category.delete', ["id" => $category->id])}}>
                @csrf
                <input type="submit" value="Удалить">
            </form>
        </li>
        @endforeach
    </ul>
</main>
<a href={{route('admin.index')}}>Вернуться в админку</a>
