<?php

require_once "conexion.php";

$nombre = $_POST["nombre"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$imagen = $_FILES["imagen"];

function insertar_registro($conn, $nombre, $rut, $email, $telefono, $imagen)
{
    $sql = "INSERT INTO asistentes (nombre, rut, email, telefono, imagen)
    VALUES ('$nombre', '$rut', $email, '$telefono', '".$imagen['name']."')";

    $resultado = mysqli_query($conn, $sql);
}

function subir_archivo($imagen)
{
    $archivo_nombre = $imagen["name"];
    $directorio = "Imagenes/";
    $archivo_destino = $directorio . basename($archivo_nombre);

    if (move_uploaded_file($imagen["tmp_name"], $archivo_destino)){
        echo "El archivo $archivo_nombre ha sido subido correctamente";
        return $archivo_destino;
    }else{
        echo "Ocurrió un error al subir el archivo";
        return "";
    }
}

insertar_registro(
    $conn,
    $nombre,
    $rut,
    $email,
    $telefono,
    $imagen,
);

subir_archivo(
    $imagen
);