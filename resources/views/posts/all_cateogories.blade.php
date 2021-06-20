<table border="1">
    <title>Category List</title>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>Status</th>
    </tr>

    @foreach ($cats as $cat)
    <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->status}}</td>
    </tr>
    @endforeach
</table>