<?php

namespace App\DAO;

use App\Model\CorrentistaModel;
use PDO;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM Correntista";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM Correntista WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\CorrentistaModel");
    }

    public function selectByCPF(string $cpf)
    {
        $sql = "SELECT * FROM Correntista WHERE cpf = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\CorrentistaModel");
    }

    public function selectByCPFAndSenha(string $cpf, string $senha)
    {
        $sql = "SELECT * FROM Correntista WHERE cpf = ? AND senha = sha1(?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\CorrentistaModel");
    }

    public function insert(CorrentistaModel $model)
    {
        $sql = "INSERT INTO Correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, sha1(?))";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(CorrentistaModel $model)
    {
        $sql = "UPDATE Correntista SET nome = ?, cpf = ?, data_nasc = ?, senha = sha1(?) WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Correntista WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}