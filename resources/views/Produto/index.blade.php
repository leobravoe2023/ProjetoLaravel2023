<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        {{-- <?php $mensage = ["Mensagem a ser exibida", "success"] ?> --}}
        @if ( isset($message) )
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                {{$message[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        @endif
        <a href="#" class="btn btn-primary">Voltar</a>
        <a href="{{ route('produto.create') }}" class="btn btn-primary">Criar Produto</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                {{-- Array e elemento atual --}}
                @foreach ($produtos as $produto)
                    <tr>
                        <th scope="row">{{ $produto->id }}</th>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>
                            <a href="{{ route('produto.show', $produto->id) }}" class="btn btn-primary">Mostrar</a>
                            <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-secondary">Editar</a>
                            <a href="#" 
                               class="btn btn-danger btnRemover" 
                               data-bs-toggle="modal" 
                               data-bs-target="#id-modal-destroy" 
                               value="{{route("produto.destroy", $produto->id)}}">
                               Remover
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                    <form id="id-form-modal-botao-remover" method="post" action="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Buscando na minha página os elementos que possuem a classe btnRemover
        let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
        let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        //console.log(arrayBotaoRemover);
        // Adiciono um evento de click em cada um dos elementos dentro do array
        arrayBotaoRemover.forEach(element => {
            element.addEventListener('click', function(){
                // Modifico o atributo action de dentro do form, colocando a rota que estava escondida dentro do botão
                // que chamou essa função
                formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
            });
        });
    </script>
</body>

</html>
