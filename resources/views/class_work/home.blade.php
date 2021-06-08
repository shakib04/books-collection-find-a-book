<h1>Users List</h1>

<table border="1">
    <tr>
        <td>id</td>
        <td>username</td>
        <td>password</td>
        <td>email</td>
        <td>details</td>
        <td>update</td>
        <td>delete</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['username']}}</td>
        <td>{{$user['password']}}</td>
        <td>{{$user['email']}}</td>
        <td><a href="/userDetails?id={{$user['id']}}">details</a> </td>
        <td><a href="">update</a> </td>
        <td><a href="/deleteUser/{{$user['id']}}">delete</a> </td>
    </tr>

    @endforeach
</table>
<?php
