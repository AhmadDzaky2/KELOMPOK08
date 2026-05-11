<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Register</h2>

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit">Register</button>
    </form>

    <p>Sudah punya akun? <a href="{{ url('/login') }}">Login</a></p>
</div>

</body>
</html>