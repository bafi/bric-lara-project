<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of users</title>
</head>
<body>
<h2>List of users</h2>
    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach($users as $one)
            <tr>
                <td>{{ $one->id }}</td>
                <td>{{ $one->name }}</td>
                <td>{{ $one->email }}</td>
                <td>
                    <a href="{{ route('user.edit', $one->id) }}">Edit</a>
                    <form action="{{ route('user.destroy', $one->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<hr>
<form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="post" >
    @csrf
    @isset($user)
        @method('put')
    @endisset
    <input type="text" placeholder="name" name="name" value="@isset($user){{ $user->name }}@endisset">
    <input type="email" placeholder="email" name="email" value="@isset($user){{ $user->email }}@endisset">
    <input type="submit" value="@isset($user)Update @else Create @endisset">
</form>
</body>
</html>
