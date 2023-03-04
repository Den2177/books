<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("public/css/app.css")}}">
    <title>Главная страница</title>
</head>
<body>
<div class="wrapper">
    @include("header")
    <main class="main">
        <div class="popular">
            <div class="container">
                <div class="grid f1f3">
                    <div class="sidebars vertical g20">
                        <form action="{{route("books.index")}}" class="form card vertical">
                            <h3>Фильтры</h3>
                            <select name="authors[]" class="input" multiple>
                                <option disabled value="">Выбрать автора</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                            <select name="genres[]" class="input" multiple>
                                <option disabled value="">Выбрать жанр</option>
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                            <button class="btn" type="submit">Отфильтровать</button>
                        </form>
                    </div>
                    <div class="right-panel">
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
                        <div class="paginate-links flex-row g10 mt20">
                            @for($i = 0; $i < $links; $i++)
                                <a href="{{$books->url($i + 1)}}" class="paginate-link btn">{{$i + 1}}</a>
                            @endfor
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
