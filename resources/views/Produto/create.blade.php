<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão --}}
        {{-- encaminhados --}}
        <form method="POST" action="{{route("produto.store")}}">
            @csrf
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite a nome. Ex: 'Pepperoni'.">
            </div>
            <div class="mb-3">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite a preço. Ex: '50.50'.">
            </div>
            <div class="mb-3">
                <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" id="id-select-Tipo_Produtos_id" class="form-select">
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes. Ex: 'Massa, molho de tomate, queijo, ...'.">
            </div>
            <div class="mb-3">
                <label for="id-input-urlImage" class="form-label">Url Image</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Digite a Url Image. Ex: '/img/Pizza/pizza-pepperoni'.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>