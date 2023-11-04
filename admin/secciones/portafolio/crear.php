<?php 

include("../../bd.php");

if($_POST){
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $subtitulo = (isset($_POST['subtitulo']))?$_POST['subtitulo']:"";

    $imagen = (isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";

    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $cliente = (isset($_POST['cliente']))?$_POST['cliente']:"";
    $categoria = (isset($_POST['categoria']))?$_POST['categoria']:"";
    $url = (isset($_POST['url']))?$_POST['url']:"";

    // Subir imágen al servidor

    // $fecha_imagen = new DateTime("");
    // $nombre_archivo_imagen = ($imagen!="") ? $fecha_imagen->getTimestamp()."_".$imagen:"imagen.jpg";
    // $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    // if($tmp_imagen!=""){
    //     move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen);

    // }

    $fecha_imagen = new DateTime("");
    $nombre_archivo_imagen = ($imagen!="") ? $imagen:"imagen.jpg";
    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen);

    }



    $sentencia = $conn->prepare("INSERT INTO `portafolio` 
    (`id`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) 
    VALUES (NULL, :titulo, :subtitulo, :imagen, :descripcion, :cliente, :categoria, :url);");

    $sentencia->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $sentencia->bindParam(":subtitulo", $subtitulo, PDO::PARAM_STR);
    $sentencia->bindParam(":imagen", $imagen, PDO::PARAM_STR);
    $sentencia->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $sentencia->bindParam(":cliente", $cliente, PDO::PARAM_STR);
    $sentencia->bindParam(":categoria", $categoria, PDO::PARAM_STR);
    $sentencia->bindParam(":url", $url, PDO::PARAM_STR);

    $sentencia->execute();

}

include('../../templates/header.php'); ?>

<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>

            <div class="mb-3">
              <label for="subtitulo" class="form-label">Subtitulo: </label>
              <input type="text"
                class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo">
            </div>



            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen: </label>
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
              <div id="fileHelpId" class="form-text">Help text</div>
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción: </label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
              <label for="cliente" class="form-label">Cliente: </label>
              <input type="text"
                class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">
            </div>

            <div class="mb-3">
              <label for="categoria" class="form-label">Categoría: </label>
              <input type="text"
                class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria">
            </div>

            <div class="mb-3">
              <label for="url" class="form-label">URL: </label>
              <input type="text"
                class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>







<?php include('../../templates/footer.php'); ?>