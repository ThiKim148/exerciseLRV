@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
                <p>{{ $errors}}</p>
            @endforeach
        </ul>
    </div>
@endif