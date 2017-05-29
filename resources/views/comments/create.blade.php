<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Fejk.pl</title>


</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Główna</a></li>
            <li><a href="/images/create">Dodaj</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <h2>Dodaj komentarz</h2>
    <form class="form-horizontal" action="/comments/store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="content">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" name="content">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="author">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Wyślij</button>
            </div>
        </div>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="hidden" value="{{$image_id}}" name="image_id" id="image_id">

    </form>
</div>
</body>
</html>
