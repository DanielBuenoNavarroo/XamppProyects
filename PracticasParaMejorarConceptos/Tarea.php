<?php
class Tarea
{
    private int $id;
    protected string $titulo;
    private string $descripcion;
    private string $estado;
    public function __construct(int $id, string $titulo, string $descripcion, string $estado)
    {
        $this->id = $id ?? null;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion ?? null;
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
