<?php
require_once 'env.php';

function conex()
{
    $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}";
    $usuario_bd = $_ENV['DB_USER'];
    $pass_bd = $_ENV['DB_PASS'];
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    try {
        $conexion = new PDO($dsn, $usuario_bd, $pass_bd, $options);
        return $conexion;
    } catch (PDOException $e) {
        throw $e;
    }
}

function getAll()
{
    try {
        $conexion = conex();
        $stm = $conexion->prepare("SELECT * FROM contactos");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error de la base de datos: $e";
    } catch (Exception $e) {
        echo "Error inesperado: $e";
    }
}

function getByID(string $id = '')
{
    try {
        $conexion = conex();
        $stm = $conexion->prepare("SELECT * FROM contactos WHERE id = :id");
        $stm->bindParam(':id', $id, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        return null;
    } catch (Exception $e) {
        return null;
    }
}

function searchContact(string $search = '')
{
    $search = "%$search%";
    try {
        $conexion = conex();
        $stm = $conexion->prepare("SELECT * FROM contactos WHERE nombre LIKE :search OR email LIKE :search OR id LIKE :search OR direccion LIKE :search");
        $stm->bindParam(':search', $search, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error de la base de datos: $e";
    } catch (Exception $e) {
        echo "Error inesperado: $e";
    }
}

function addContact(string $name = '', string $email = '', string $tel = '', string $dir = '')
{
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $tel = htmlspecialchars($tel);
    $dir = htmlspecialchars($dir);
    try {
        $conexion = conex();
        $stm = $conexion->prepare("INSERT INTO contactos (nombre, telefono, email, direccion) VALUES (:name, :tel, :email, :dir)");
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->bindParam(':dir', $dir, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            header('location: ./index.php');
        } else {
            echo 'Error al insertar el nuevo contacto';
        }
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error de la base de datos: $e";
    } catch (Exception $e) {
        echo "Error inesperado: $e";
    }
}

function editContact(string $id, string $name = '', string $email = '', string $tel = '', string $dir = '')
{
    $id = htmlspecialchars($id);
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $tel = htmlspecialchars($tel);
    $dir = htmlspecialchars($dir);
    try {
        $conexion = conex();
        $stm = $conexion->prepare("UPDATE contactos SET nombre = :name, telefono = :tel, email = :email, direccion = :dir WHERE id = :id");
        $stm->bindParam(':id', $id, PDO::PARAM_STR);
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->bindParam(':dir', $dir, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            header('location: ./index.php');
        } else {
            echo 'Error al editar el contacto';
        }
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error de la base de datos: $e";
    } catch (Exception $e) {
        echo "Error inesperado: $e";
    }
}

function delContact(string $id)
{
    $id = htmlspecialchars($id);
    try {
        $conexion = conex();
        $stm = $conexion->prepare("DELETE FROM contactos WHERE id = :id");
        $stm->bindParam(':id', $id, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            header('location: ./index.php');
        } else {
            echo 'Error al eliminar el contacto';
        }
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error de la base de datos: $e";
    } catch (Exception $e) {
        echo "Error inesperado: $e";
    }
}
