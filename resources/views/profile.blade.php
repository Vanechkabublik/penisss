<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
</head>
<body>
    <h1>Добро пожаловать, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <img src="{{ $user->avatar }}" alt="Аватар" width="100">
    <p>VK ID: {{ $user->vk_id }}</p>
    <a href="/logout">Выйти</a>
</body>
</html>
