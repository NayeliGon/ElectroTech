<?php

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>PRINCIPAL</title>
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    

   

    <style>
        #cerrarSesion {
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" >
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php" >
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">ElectroTech</div>
</a>
<hr class="sidebar-divider my-0" >
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="material-icons-outlined"></i>
        <img src="http://localhost/PROYECTOANALISISII/images/1.png" alt="Descripción de la imagen" width="150px" height="150px">

</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    ADMINISTRADOR
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
    <span class="material-icons">pattern</span>
        <span>Productos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="principal.php">
        <span class="material-icons">category</span>
        <span>  Cotizaciones</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="catalogo.php">
        <span class="material-icons">category</span>
        <span>  Catalogo</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="clientes.php">
        <span class="material-icons">category</span>
        <span>  Clientes</span>
    </a>
</li>

<hr class="sidebar-divider">
<div class="sidebar-heading">
    PERFIL
</div>

<li class="nav-item">
    <a class="nav-link" id="cerrarSesion">
    <span class="material-icons">logout</span>
        <span>Salir</span></a>
        
</li>
<script>
        const cerrarSesionBtn = document.getElementById('cerrarSesion');

        cerrarSesionBtn.addEventListener('click', function() {
            // Agrega aquí el código para cerrar la sesión del usuario, como redireccionar a una página de inicio de sesión.
            alert('Sesión cerrada'); // Esto es un ejemplo; reemplázalo con tu lógica de cierre de sesión real.
            window.location.href = '../../index.html';
        });
    </script>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0"></button>
</div>
</ul>
<!-- EMPIEZA EL NAVBAR -->
       <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group" style="text-align: center;">
                  
                        </div>
                    </form>


                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="material-icons">account_circle</span>
                            </a>
                        </li>
                    </ul>

                </nav>


