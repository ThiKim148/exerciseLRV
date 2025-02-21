<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <form action="{{url('signup')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="nameS" name="name">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="ageS" name="age">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" class="dateS" name="date">
        </div>
        <div class="form-group">
            <label>Web</label>
            <input type="url" class="webS" name="web">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="phoneS" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="addressS" name="address">
        </div>
        <div>
            @include ('block.error')
        </div>
        <button type="submit" class="btn">OK</button>
        <div class="display-infor">
            @if(isset($userSession))
            @foreach($userSession as $user)
            <p>Name: {{$user['name']}}</p>
            <p>Age: {{$user['age']}}</p>
            <p>Date: {{$user['date']}} </p>
            <p>Phone: {{$user['phone']}} </p>
            <p>Website: {{$user['web']}}</p>
            <p>Address: {{$user['address']}}</p>
            @endforeach
            @endif
        </div>
    </form>
</body>
</html>