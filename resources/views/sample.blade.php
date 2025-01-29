<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($comments as $comment)
            <ul>
                <h5>{{$comment->user->name}}</h5>
                <li>{{$comment->content}}</li>
                <p>{{$comment->post_id}}</p>
            </ul>
        @endforeach
    </div>
</body>
</html>
