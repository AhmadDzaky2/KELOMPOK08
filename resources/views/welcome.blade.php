<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #111, #333);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 72px;
            margin: 0 0 15px 0;
            font-weight: bold;
            letter-spacing: 2px;
        }

        p {
            font-size: 24px;
            margin: 0 0 35px 0;
            color: #dddddd;
        }

        .box {
            background: rgba(255, 255, 255, 0.12);
            padding: 30px 40px;
            border-radius: 18px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        /* Tombol */
        a {
            display: inline-block;
            margin: 8px;
            padding: 15px 35px;
            background: white;
            color: black;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 20px;
            transition: 0.3s;
        }

        a:hover {
            background: #dddddd;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Kelompok 8</h1>
        <p>Selamat datang di toko online kami</p>

        <div class="box">
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>

</body>
</html>