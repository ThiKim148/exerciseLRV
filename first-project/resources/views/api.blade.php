<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="tables">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @isset($data)
            @foreach($data as $title)
            <tr>
                <td>{{$title['title']}}</td>
                <td>{{$title['body']}}</td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
</body>
</html>