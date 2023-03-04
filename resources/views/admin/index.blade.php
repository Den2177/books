<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("public/css/app.css")}}">
    <title>Панель администратора</title>
</head>
<body>
<div class="wrapper">
    @include("header")
    <main class="main">
        <div class="popular">
            <div class="container">
                <div class="grid f1f3">
                    <div class="vertical g20 sidebars">
                        <form action="{{route('book.store')}}" class="card vertical form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <h3>Создать книгу</h3>
                            <input type="text" class="input" name="name" placeholder="Название">
                            <input type="text" class="input" name="description" placeholder="Описание">
                            <input type="file" class="input" name="image" placeholder="Изображение">
                            <label>
                                <input type="checkbox" class="input" name="isVisibleInMainPage">
                                <span>Показывать ли на главной странице</span>
                            </label>
                            <select name="author_id" class="input">
                                <option value="null">Выбрать автора</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                            <select name="genres[]" class="input" multiple>
                                <option value="">Выбрать жанры</option>
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                            <button class="btn">Создать</button>
                        </form>
                        <form action="{{route('genre.store')}}" class="card vertical form" method="POST">
                            @csrf
                            <h3>Создать Жанр</h3>
                            <input type="text" class="input" name="name" placeholder="Название">
                            <button class="btn">Создать</button>
                        </form>
                        <form action="{{route('author.store')}}" class="card vertical form" method="POST">
                            @csrf
                            <h3>Создать Автора</h3>
                            <input type="text" class="input" name="name" placeholder="Имя">
                            <input type="text" class="input" name="lastname" placeholder="Фамилия">
                            <input type="text" class="input" name="middlename" placeholder="Отчество">
                            <button class="btn">Создать</button>
                        </form>
                    </div>
                    <div class="vertical g20">
                        <div class="section">
                            <div class="header-block">
                                <h2>Книги</h2>
                            </div>
                            <div class="grid f3">
                                @foreach($books as $book)
                                    <div class="book-card vertical book">
                                        <div class="image">
                                            <img src="{{$book->image}}" alt="image">
                                        </div>
                                        <div class="card-padding vertical">
                                            <h3 class="book-title">{{$book->name}}</h3>
                                            <div class="author">
                                                {{$book->author->name}} {{$book->author->lastname}} {{$book->author->middlename}}
                                            </div>
                                            <button class="btn mt20">Перейти</button>
                                            <button onclick="openModal('/books/delete/', {{$book->id}})" class="btn red">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="section">
                            <div class="header-block">
                                <h2>Жанры</h2>
                            </div>
                            <div class="grid f3">
                                @foreach($genres as $genre)
                                    <div class="card">
                                        <h3>{{$genre->name}}</h3>
                                        <button onclick="openModal('/genres/delete/', {{$genre->id}})" class="btn red">
                                            Удалить
                                        </button>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="section">
                            <div class="header-block">
                                <h2>Авторы</h2>
                            </div>
                            <div class="grid f3">
                                @foreach($authors as $author)
                                    <div class="card">
                                        <h3>{{$author->name}} {{$author->lastname}} {{$author->middlename}}</h3>
                                        <button onclick="openModal('/authors/delete/', {{$author->id}})" class="btn red">
                                            Удалить
                                        </button>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include("footer")
</div>

</body>
</html>
