<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <section class="our-webcoderskull padding-lg">
    <div class="container d-flex flex-column align-itens-center" style="width:500px;">
        
        <div class="row heading">
            <h2>Editar Usuário</h2>
        </div>
        <form style="width:500px;" class="cnt-block equal-hight" method="post" action="{{ route('users.update', ['id' => $user['id']]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                <label for="name">Nome:</label>
                <input type="text" name="name" value="{{ $user['name'] }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                <label for="age">Idade:</label>
                <input type="number" name="age" value="{{ $user['age'] }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user['email'] }}" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    </section>
</body>
</html>