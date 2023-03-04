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
                <div class="grid f4">
                    <div class="book-card vertical book">
                        <div class="image">
                            <img src="{{asset("public/images/6508873.jpg")}}" alt="image">
                        </div>
                        <div class="card-padding vertical">
                            <h3>Название</h3>
                            <div class="author">
                                Александр сергеевич пушкин..
                            </div>
                            <button class="btn mt20">Перейти</button>
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
