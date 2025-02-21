<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/tinhTong.css') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <form action="tinhtong" method="post" class="containers">
        @csrf
    <label for="soA">Enter So A</label>
        <input name="soa" class="a" type="text" id="soA" placeholder="Nhập số A">

        <label for="soB">Enter So B</label>
        <input name="sob" class="b" type="text" id="soB" placeholder="Nhập số B">

        <button type="submit">Submit</button>

        <p id="result">
            @isset($tong)
            {{$tong}}
            @endisset
        </p>
    </form>
    </body>
</html>
