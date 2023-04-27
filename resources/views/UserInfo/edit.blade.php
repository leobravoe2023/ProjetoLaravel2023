<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de UserInfo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("userinfo.update", $userInfo->Users_id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$userInfo->Users_id}}" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" value="{{$userInfo->profileImg}}" placeholder="Digite o caminho para a imagem.">
            </div>
            <div class="mb-3">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" aria-describedby="id-help-status" value="{{$userInfo->status}}" disabled>
                <div id="id-help-status" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div class="mb-3">
                <label for="id-input-dataNasc" class="form-label">Data de Nascimento</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" value="{{$userInfo->dataNasc}}" placeholder="Digite a data de nascimento.">
            </div>
            <div class="mb-3">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" value="{{$userInfo->genero}}" placeholder="Digite o gênero.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>