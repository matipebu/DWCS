<?php
namespace Ejercicios\Musica\Model\Vo;
class UsuarioVO{
    private ?int $id;
    private ?string $nombre;
    private ?string $email;
    private ?string $pass;

    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $email = null,
        ?string $pass = null,
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->pass = $pass;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = password_hash($pass,PASSWORD_DEFAULT);

        return $this;
    }
}


?>