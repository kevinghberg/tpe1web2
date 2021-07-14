<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGDK-Home</title>
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <img src="IMAGENES/logo.jpg" alt="" height="50px">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler bg-light " type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-light  "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 "
                            href="index">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2"
                            href="ventas">VENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 "
                            href="marcas">MARCAS</a>
                    </li>




                   
                    <li class="nav-item">
                    <a class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 "
                        href="listaUsuarios">USUARIOS</a>
                    </li>
                    




                    {if isset($username) && $username}
                        <a class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 justify content right"
                            href="logout">LOGOUT
                        </a>
                        <p
                            class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 ">
                            {$username}</p>
                    {else}
                        <a href="login"
                            class="nav-link text-warning font-weight-bolder border border-warning rounded border-left-0 border-top-0 mx-1 my-1 shadow-lg p-2 justify content right ">
                            LOGIN
                        </a>
                    {/if}





                </ul>
            </div>
        </nav>
    </header>
    


