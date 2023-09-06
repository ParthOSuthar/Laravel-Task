<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        main
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #1c1c1c;
        }
        .text-danger{
                color: red;
                font-size: 10px;
            }
        .table
        {
            position: relative;
            width: 300px;
            margin-top: 35px;
        }
        .table input
        {
            position: relative;
            border : none;
            width: 100%;
            padding: 20px 10px 10px;
            border-bottom: 1px solid #45f3ff;
            font-size: 1em;
            background-color: #28292d;
            letter-spacing: 0.05em;
        }
        .container
        {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 400px;
            height: fit-content;
            border-radius: 8px;
            overflow: hidden;
            scale: 1;
        }
        .container::before
        {
            content: "";
            z-index: -1;
            position: absolute;
            top: -60%;
            left: -30%;
            width: 250px;
            height: 350px;
            transform-origin: bottom right;
            background: linear-gradient(0deg,transparent,#45f3ff,#45f3ff);
            animation: animate 6s linear infinite;
        }
        .container::after
        {
            content: "";
            z-index: -1;
            position: absolute;
            top: -60%;
            left: -30%;
            width: 250px;
            height: 350px;
            transform-origin: bottom right;
            background: linear-gradient(0deg,transparent,#45f3ff,#45f3ff);
            animation: animate 6s linear infinite;
            animation-delay: -3s;
        }
        @keyframes animate
        {
            0%
            {
                transform: rotate(0deg);
            }
            100%
            {
                transform: rotate(360deg);
            }
        }
        .content{
            display: flex;
            align-items: center;
            flex-direction: column;
            height: fit-content;
            width: 400px;
            background: #28292d;
            scale: 0.985;
        }
        .form{
            color: whitesmoke;
        }
        input{
            width: 60%;
            color: whitesmoke;
        }
        .login{
            color: whitesmoke
        }
        .login a{
            color: #45f3ff;
            text-decoration: none;
        }
        .btn button{
            margin: 15px 75px;
            width: 50%;
            font-size: large;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="content">
                <form class="form" action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <table class="table">
                        <th colspan="2">
                            <h1>Login</h1>
                        </th>
                        <tr>
                            <td colspan="2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="E-mail" name="email" id="email" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" placeholder="Password" name="password" id="password" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="btn">
                                    <button type="submit" name="login">Login</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                    <p class="login">
                        Don't have an account ? <a href="{{ route('user.register') }}">Register here</a>
                      </p>

            </div>
        </div>
    </main>

</body>
</html>
