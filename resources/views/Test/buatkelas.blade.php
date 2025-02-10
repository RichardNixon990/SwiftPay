<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>buat kelas</title>
</head>
<body>
    <form action="{{ $data != null ? route('test.class.update', $data) : route('test.class.store') }}" method="POST">
        @csrf
        <input type="text" name="kelas" placeholder="masukkan nama kelas" value="{{ $data != null ? $data->nama_kelas : '' }}">
        <input type="text" name="keahlian" placeholder="masukkan keahlian" value="{{ $data != null ? $data->keahlian : '' }}">
        <button type="submit">kirim</button>
        <hr>
        <table border="1">
            <thead>
                <th>Nama Kelas</th>
                <th>Keahlian</th>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                <tr>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->keahlian }}</td>
                    <td><a href="{{ route('test.class.edit', $k->id) }}">edit</a></td>
                    <td><a href="{{ route('test.class.delete', $k->id) }}">hapus</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</body>
</html>
