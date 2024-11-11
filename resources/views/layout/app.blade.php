<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    
   <x-header logo="ToDo App" />


    <main class="flex flex-col items-center content-center">
        <div class="p-5 my-24 w-full">
            @yield('content')
        </div>
    </main>
</body>
</html>