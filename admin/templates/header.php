<?php 
$url_base = "http://localhost/pagina-empresa/admin/";

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones/servicios">Servicios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones//portafolio">Portafolio</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones//entradas">Entradas</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones//equipo">Equipo</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones//configuraciones">Configuraciones</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>../../proyectos/pagina_empresa/admin/secciones//usuarios">Usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>login.php">Cerrar sesión</a>
        </div>
    </nav>
  </header>
  <main class="container">
    <br>
