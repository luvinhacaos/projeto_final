<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ab1b762991.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="resources/css/app.css">
    <title>Votação</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light m-2 d-flex justify-content-between navbar-dark bg-dark">
        @guest
            <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket" class="ms-5"></i></a>              
        @endguest

        <span class="d-flex">
            <a href="/officio/index" class="navbar-brand ms-5"><i class="fa-solid fa-house-user"></i></a>              
        </span>
        @auth              
            <a href="/logout" class="navbar-brand"><i class="fa-solid fa-door-open"></i></a>              
        @endauth          
    </nav>

    <div class="container">
        <div class="jumbotron mb-5">
            <h1>@yield('cabecalho')</h1>
        </div>

                
        @if(isset($mensagemSucesso))
            
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>

        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('conteudo')
    </div>   
    <div>
        <footer>
            @yield('rodape')
        </footer>
    </div>
</body>
</html>