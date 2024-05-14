<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Edit Data</h1>

        <form action="{{route('komputer.update', $komputer->id_komputer)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">ID:</label>
                <input type="number" class="form-control" id="id" value="{{old('id_komputer', $komputer->id_komputer)}}" name="id_komputer" readonly>
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Merk:</label>
                <select class="form-select" name="merk" >
                    <option value="{{old('merk', $komputer->merk)}}">{{old('merk', $komputer->merk)}}</option>
                    <option value="asus">Asus</option>
                    <option value="acer">Acer</option>
                    <option value="del">Del</option>
                    <option value="lain">Lainnya</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Kelengkapan:</label>
                <input type="text" class="form-control" value="{{old('kelengkapan', $komputer->kelengkapan)}}" id="email" name="kelengkapan">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            {{-- {{ $user->links() }} --}}
    </div>
</body>