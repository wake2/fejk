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
@if(isset($comments))
    <center>
        <a href="/comments/create/{{$image_id}}" class="btn btn-info" role="button">Dodaj komentarz</a>
        <table class="table">
            <thead>
            <tr>
                <th>Autor</th>
                <th>Komentarz</th>
                <th>Data Dodania</th>
                <th>Operacje</th>

            </tr>
            </thead>
            <tbody>
    @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->author->name}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>    <div class="btn-group" role="group">
                            <a href="/comments/edit/{{$comment->id}}" class="btn btn-warning" role="button">Edytuj</a>
                            <a href="/comments/destroy/{{$comment->id}}" class="btn btn-danger" role="button">Usuń</a>
                        </div></td>
                </tr>
    @endforeach
            </tbody>
        </table>
    </center>
@endif

</body>
</html>
