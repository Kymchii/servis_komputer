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
        <div class="card text-center">
            <div class="card-header">
                    <h3 class="d-flex justify-content-center">Detail</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Merk: {{$komputer->merk}}</h5>
                <p class="card-text">Kelangkapan: {{$komputer->kelengkapan}}</p>
                <a href="{{route('komputer.index')}}" class="btn btn-primary">Kembali</a>
                <a href="{{route('komputer.edit', $komputer->id_komputer)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</body>