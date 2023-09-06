<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data</title>
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
            .table
            {
                position: relative;
                width: 300px;
                margin-top: 35px;
                text-align: center;
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
            a{
                text-decoration: none;
                font-weight: bolder;
                color: black;
            }
        </style>
    </head>
    <body>
        <main>
            <div class="container">
                <button> <a href="{{ route('user.show') }}">←Back</a> </button>
            <div class="content">
                <form class="form", method="post" action="{{ route('user.update',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <th colspan="2">
                            <h1>Display Data</h1>
                        </th>

                        <tr>
                            <td colspan="2">
                                <input type="text" placeholder="ID" name="id" id="id" value="{{ $data->id }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                    <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ $data->first_name }}" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="{{ $data->last_name }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" placeholder="E-mail" name="email" id="email" value="{{ $data->email }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" placeholder="State" name="state" id="state" value="{{ $data->state }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" placeholder="User Name" name="user_name" id="user_name" value="{{ $data->user_name }}" readonly>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            </div>
            </div>
        </main>
    </body>
</html>
