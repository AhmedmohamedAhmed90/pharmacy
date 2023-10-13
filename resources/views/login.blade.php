<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- CSRF Token -->
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>

    </form>
</body>
</html>