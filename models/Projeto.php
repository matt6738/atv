<?php

class Projeto{

    private $id;
    private $nome;
    private $duracao;

    private $con;


    public function __contruct($id=null, $nome=null, $duracao=null)
    {
        $this->id= $id;
        $this->nome= $nome;
        $this->duracao= $duracao;

        $this->con = new PDO("");
    }

    public function all()
    {
        $sql = $this->con->prepare('SELECT * FROM VER_PROJETO');
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function create()
    {
        $sql = $this->con->prepare('INSERT INTO PROJETO (NOME, DURACAO) VALUES (?, ?)');
        $sql->execute([$this->nome, $this->duracao]);
    }

    public function read()
    {
        $sql = $this->con->prepare('SELECT * FROM VER_PROJETO WHERE ID=?');
        $sql->execute([$this->id]);
        $row = $sql->fetchObject();
        return $row;
    }

    public function update()
    {
        $sql = $this->con->prepare('UPDATE PROJETO SET NOME=?, DURACAO=? WHERE ID=?');
        $sql->execute([$this->nome, $this->duracao, $this->id]);
    }

    public function delete()
    {
        $sql = $this->con->prepare('DELETE FROM PROJETO WHERE ID=?');
        $sql->execute([$this->id]);
    }

}