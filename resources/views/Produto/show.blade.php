<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" value="{{$produto->id}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="id-input-nome" value="{{$produto->nome}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="id-input-preco" value="{{$produto->preco}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="id-select-Tipo_Produtos_id" value="{{$produto->descricao}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
            <input type="text" class="form-control" id="id-input-ingredientes" value="{{$produto->ingredientes}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-urlImage" class="form-label">Url Image</label>
            <input type="text" class="form-control" id="id-input-urlImage" value="{{$produto->urlImage}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-updated_at" class="form-label">Updated At</label>
            <input type="text" class="form-control" id="id-input-updated_at" value="{{$produto->updated_at}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-created_at" class="form-label">Created At</label>
            <input type="text" class="form-control" id="id-input-created_at" value="{{$produto->created_at}}" disabled>
        </div>
        <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>