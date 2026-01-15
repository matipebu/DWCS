<?php
namespace Ejercicios\Actividad3_2\Model\Vo;
class ProductoVO
{
    private ?int $cod_producto;
    private ?string $denominacion;
    private ?string $descripcion;
    private ?int $precio;
    private ?int $cantidad;

    public function __construct(
        ?int $cod_producto = null,
        ?string $denominacion = null,
        ?string $descripcion = null,
        ?int $precio = null,
        ?string $cantidad = null
    ) {
        $this->cod_producto = $cod_producto;
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;

    }
    
    

    /**
     * Get the value of cod_producto
     */ 
    public function getCod_producto()
    {
        return $this->cod_producto;
    }

    /**
     * Set the value of cod_producto
     *
     * @return  self
     */ 
    public function setCod_producto($cod_producto)
    {
        $this->cod_producto = $cod_producto;

        return $this;
    }

    /**
     * Get the value of denominacion
     */ 
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set the value of denominacion
     *
     * @return  self
     */ 
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}

?>