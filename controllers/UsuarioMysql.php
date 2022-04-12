<?php
class UsuarioMysql{

    private int $id;
    private string $nome;
    private $nascimento;
    

    // setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setNasc(string $nasc)
    {
        $this->nascimento = $nasc;
    }

    // getters
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getNasc()
    {
        return $this->nascimento;
    }


}