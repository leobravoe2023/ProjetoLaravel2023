<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @if ( isset($message) )
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                {{$message[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        @endif
        <a href="{{route("userinfo.edit", $userInfo->Users_id)}}" class="btn btn-secondary">Editar</a>
        <a href="#" class="btn btn-danger" data-bs-target="#id-modal-destroy" data-bs-toggle="modal">Remover</a>
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$userInfo->Users_id}}" disabled>
            <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
        </div>
        <div class="mb-3">
            <label for="id-input-profileImg" class="form-label">Profile Img</label>
            <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" value="{{$userInfo->profileImg}}" placeholder="Digite o caminho para a imagem." disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-status" class="form-label">Status</label>
            <input type="text" class="form-control" id="id-input-status" aria-describedby="id-help-status" value="{{$userInfo->status}}" disabled>
            <div id="id-help-status" class="form-text">O status não é controlado pelo usuário.</div>
        </div>
        <div class="mb-3">
            <label for="id-input-dataNasc" class="form-label">Data de Nascimento</label>
            <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" value="{{$userInfo->dataNasc}}" placeholder="Digite a data de nascimento." disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-genero" class="form-label">Gênero</label>
            <input name="genero" type="text" class="form-control" id="id-input-genero" value="{{$userInfo->genero}}" placeholder="Digite o gênero." disabled>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="id-modal-destroy" tabindex="-1" aria-labelledby="id-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id-modal-label">Remoção de recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    <form id="id-form-modal-botao-remover" method="post" action="{{route("userinfo.destroy", $userInfo->Users_id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>