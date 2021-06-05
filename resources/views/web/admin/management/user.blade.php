<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List</h1>
    <table>
        <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Sandi</td>
        </tr>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->password }}</td>
        </tr>
        @endforeach
    </table>
    <form action="{{ route("user.auth.logout") }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>