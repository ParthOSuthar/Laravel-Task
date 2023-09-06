<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
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
                text-align: center;
            }
            .table input
            {
                position: relative;
                border : none;
                width: 100%;
                padding: 10px 10px;
                border-bottom: 1px solid #45f3ff;
                font-size: 1em;
                background-color: #28292d;
                letter-spacing: 0.05em;
                color: whitesmoke;
            }
            .table select ,label{
                position: relative;
                border : none;
                padding: 10px auto;
                margin: 20px 5px 10px 0px;
                border-bottom: 1px solid #45f3ff;
                font-size: 1em;
                background-color: #28292d;
                letter-spacing: 0.05em;
                color: whitesmoke;
            }
            h1{
                color: whitesmoke;
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
                top: -50%;
                left: -50%;
                width: 400px;
                height: 700px;
                transform-origin: bottom right;
                background: linear-gradient(0deg,transparent,#45f3ff,#45f3ff);
                animation: animate 6s linear infinite;
            }
            .container::after
            {
                content: "";
                z-index: -1;
                position: absolute;
                top: -50%;
                left: -50%;
                width: 400px;
                height: 700px;
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
                <form class="form", method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <th colspan="2">
                            <h1>Registration Form</h1>
                        </th>
                        <tr class="tr">
                            <td colspan="2">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" name="first_name" id="first_name" >
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" name="last_name" id="last_name" >
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="E-mail" name="email" id="email" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" class="form-control @error('state') is-invalid @enderror " placeholder="State" name="state" id="state">
                                @if ($errors->has('state'))
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <label for="access_type">Select Access Type : </label>
                                <select name="access_type"  id="access_type">
                                @foreach ($access_type as $access)
                                    <option value="{{ $access->id }}">{{ $access->access_type }}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" class="form-control @error('user_name') is-invalid @enderror " placeholder="User Name" name="user_name" id="user_name">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" name="password" id="password" >
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="btn">
                                    <button type="submit" name="register" >Register</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                    <p class="login">
                        Already have an account ? <a href="{{ route('user.login') }}">Login here</a>
                    </p>

            </div>
            </div>
        </main>
    </body>
</html>
