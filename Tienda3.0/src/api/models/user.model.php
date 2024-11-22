<?php 
class Usuario {
    private int $id;
    private string $nombre;
    private string $email;
    private string $password;
    private int $rolId;
    private string $fechaRegistro;

    public function __construct(array $datos) {
        $this->id = $datos['id'];
        $this->nombre = $datos['nombre'];
        $this->email = $datos['email'];
        $this->password = $datos['password'];
        $this->rolId = $datos['rol_id'];
        $this->fechaRegistro = $datos['fecha_registro'];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRolId(): int {
        return $this->rolId;
    }

    public function getFechaRegistro(): string {
        return $this->fechaRegistro;
    }
}
