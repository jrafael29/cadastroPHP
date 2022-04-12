<?php
require_once 'UsuarioMysql.php';
class UserController{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function listar()
    {
        $lista = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();

            foreach($dados as $usuario){
                $user = new UsuarioMysql();
                // transformando data do padrão americano no padrão brasileiro
                $dataOriginal = $usuario['nascimento'];
                $dataBRL = date('m-d-Y', strtotime($dataOriginal));

                $user->setId( $usuario['id'] );
                $user->setNome( $usuario['nome'] );
                $user->setNasc( $dataBRL );
    
                $lista[] = $user;
            }
        }
        return $lista;
    }

    public function listarPorId($id)
    {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
            $user = new UsuarioMysql;
            $user->setId($dados['id']);
            $user->setNome($dados['nome']);
            $user->setNasc($dados['nascimento']);

            return $user;
        }else{
            return false;
        }
    }

    public function adicionar(UsuarioMysql $u)
    {
        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome, nascimento) VALUES (:nome, :nascimento)');
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":nascimento", $u->getNasc());
        $sql->execute();
    }

    public function editar(UsuarioMysql $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, nascimento = :nascimento WHERE id = :id");
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":nascimento", $u->getNasc());
        $sql->bindValue(":id", $u->getId());
        $sql->execute();
    }


    public function deletar($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}