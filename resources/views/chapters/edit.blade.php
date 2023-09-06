@extends('layouts.app')
@section('style')
<style>
    main
    {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #1c1c1c;
    }
    .table1
    {
        position: relative;
        width: 300px;
        margin-top: 35px;
        text-align: center;
    }
    .table1 input
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
    .table1 select ,label{
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
    .container1
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
    .content1{
        display: flex;
        align-items: center;
        flex-direction: column;
        height: fit-content;
        width: 400px;
        background: #28292d;
        scale: 0.985;
    }
    .form1{
        color: whitesmoke;
    }

    .login a{
        color: #45f3ff;
        text-decoration: none;
    }
    .btn1 button{
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
@endsection
@section('content1')
<main>
    <div class="container1">
        <button> <a href="{{ route('chapter.show') }}">←Back</a> </button>
    <div class="content1">
        <form class="form1", method="post" action="{{ route('chapter.update',$chapter->id)}}">
            @csrf
            @method('PUT')
            <table class="table1">
                <th colspan="2">
                    <h1>Update Chapter</h1>
                </th>

                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="ID" name="id" id="id" value="{{ $chapter->id }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                            <input type="text" placeholder="Chapter" name="chapter" id="chapter" value="{{ $chapter->chapter }}" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="btn1">
                            <button type="submit" name="update" >Update Data</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    </div>
    </div>
</main>
@endsection
