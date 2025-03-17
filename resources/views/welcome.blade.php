<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center min-h-screen gap-3">
        <a href="/login">
            <x-primary-button>Login</x-primary-button>
        </a>
        <a href="/register">
            <x-secondary-button>Register</x-secondary-button>
        </a>
    </div>

</body>

</html>
