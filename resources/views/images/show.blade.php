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

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@foreach ($images as $image)
    <center>
        <div class="col-sm-12" style="margin-top: 100px">
            <h2>{{ $image->title }}</h2>
            <h4>{{$image->content}}</h4>
            <a href=/images/{{$image->file }}>
                <img src="/images/{{$image->file }}" height="220"/>
            </a><br>
            <div class="btn-group" role="group">
                <a href="/comments/show/{{$image->id}}" class="btn btn-info" role="button">Komentarze</a>
                <a href="/images/edit/{{$image->id}}" class="btn btn-warning" role="button">Edytuj</a>
                <a href="/images/destroy/{{$image->id}}" class="btn btn-danger" role="button">Usuń</a>
            </div>
        </div>
    </center>

@endforeach
</body>
</html>
