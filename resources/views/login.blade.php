<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { width: 300px; margin: auto; }
        input { display: block; width: 100%; margin-bottom: 10px; padding: 8px; }
        button { padding: 8px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Login</h2>
    @if (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

</body>
</html>