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
            }
            form h1 {
                text-align: center;
            }

            .login a{
                color: #45f3ff;
                text-decoration: none;
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
                <form class="form", method="post" action="{{ route('user.update',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1>Update Data</h1>
                    <label for="first_name">First Name :</label>
                    <input type="text" name="first_name" id="first_name" value="{{ $data->first_name }}"><br><br>
                    <label for="last_name">Last Name :</label>
                    <input type="text" name="last_name" id="last_name" value="{{ $data->last_name }}"><br><br>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="{{ $data->email }}" Readonly><br><br>
                    <label for="state">State :</label>
                    <input type="text" name="state" id="state" value="{{ $data->state }}"><br><br>
                    <label for="user_name">User Name :</label>
                    <input type="text" name="user_name" id="user_name" value="{{ $data->user_name }}"><br><br>
                    <label for="profileimage">Profile Image :</label>
                    <input type="file" name="profileimage" id="profileimage" value="{{ $data->profileimage }}"><br><br>
                    {{-- <input type="submit" name="update" value="Update Data"> --}}
                    <button type="submit" name="update" >Update Data</button>
                </form>
            </div>

            </div>
            </div>
        </main>
    </body>
</html>
