<?php

namespace App\DAO;

use App\Model\ContaModel;

class ContaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM Conta";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM Conta WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\ContaModel");
    }

    public function selectByCorrentista(int $id_correntista)
    {
        $sql = "SELECT * FROM Conta WHERE id_correntista = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_correntista);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectByNumero(int $numero)
    {
        $sql = "SELECT * FROM Conta WHERE numero = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $numero);

        $stmt->execute();

        return $stmt->fetchObject("App\\Model\\ContaModel");
    }

    public function insert(ContaModel $model)
    {
        $sql = "INSERT INTO Conta (numero, tipo, senha, id_correntista) VALUES (?, ?, sha1(?), ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->numero);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id_correntista);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(ContaModel $model)
    {
        $sql = "UPDATE Conta SET tipo = ?, senha = sha1(?), id_correntista = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->senha);
        $stmt->bindValue(3, $model->id_correntista);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Conta WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    public function deleteByIdCorrentista(int $id_correntista)
    {
        $sql = "DELETE FROM Conta WHERE id_correntista = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_correntista);

        $stmt->execute();
    }
}