<?php

namespace App\DAO;

use App\Model\ChavePixModel;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM Chave_Pix";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM Chave_Pix WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\ChavePixModel");
    }

    public function selectByConta(int $id_conta)
    {
        $sql = "SELECT * FROM Chave_Pix WHERE id_conta = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_conta);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\ChavePixModel");
    }

    public function selectByChave(string $chave)
    {
        $sql = "SELECT * FROM Chave_Pix WHERE chave = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $chave);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\ChavePixModel");
    }

    public function insert(ChavePixModel $model)
    {
        $sql = "INSERT INTO Chave_Pix (chave, tipo, id_conta) VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->chave);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->id_conta);

        $stmt->execute();
    }

    public function update(ChavePixModel $model)
    {
        $sql = "UPDATE Chave_Pix SET chave = ?, tipo = ?, id_conta = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->chave);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Chave_Pix WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    public function deleteByIdConta(int $id_conta)
    {
        $sql = "DELETE FROM Chave_Pix WHERE id_conta = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_conta);

        $stmt->execute();
    }
}
