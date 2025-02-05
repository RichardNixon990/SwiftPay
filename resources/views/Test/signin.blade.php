<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <form action="{{ route('test.siswa.signin') }}" method="POST">
        @csrf
        <input type="text" name="nisn" placeholder="nisn">
        <input type="text" name="password" placeholder="password">
        <button type="submit">Login</button>
    </form>
</body>
</html>
