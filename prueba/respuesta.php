<?php
// $data = $_POST;
// echo "<pre>";
// print_r($data);
// echo "</pre>";

validarNombre($_POST['name']);
validarApellido($_POST['surname']);
validarCorreo($_POST['email']);
validarTelefono($_POST['tel']);

// Comprobación de campos:
function validarNombre($nombre)
{
    if (
        validar($nombre, 'nombre')
    ) {
    }
}
function validarApellido($apellido)
{
    if (
        validar($apellido, 'apellido')
    ) {
    }
}
function validarCorreo($correo)
{
    if (
        validar($correo, 'correo')
    ) {
    }
}
function validarTelefono($tel)
{
    if (
        validar($tel, 'telefono')
    ) {
    }
}

// Retorna false si no existe la variable
function validar($variable, $nombre)
{
    if (strlen($variable) < 1) {
        echo "Falta el $nombre <br/>";
        return false;
    }
    return true;
}
