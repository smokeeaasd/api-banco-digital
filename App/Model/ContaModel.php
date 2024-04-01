<?php

namespace App\Model;

use App\DAO\ContaDAO;
use Exception;

class ContaModel extends Model
{
    public $id, $numero, $tipo, $senha, $id_correntista;

    public function getAll()
    {
        try {
            $dao = new ContaDAO();
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $dao = new ContaDAO();
            $this->rows = $dao->selectById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByCorrentista(int $id_correntista)
    {
        try {
            $dao = new ContaDAO();
            $this->rows = $dao->selectByCorrentista($id_correntista);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByNumero(int $numero)
    {
        try {
            $dao = new ContaDAO();
            $this->rows = $dao->selectByNumero($numero);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addConta()
    {
        try {
            $dao = new ContaDAO();

            return $dao->insert($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateConta()
    {
        try {
            $dao = new ContaDAO();

            $dao->update($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteConta(int $id)
    {
        try {
            $dao = new ContaDAO();

            $dao->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteContasByIdCorrentista(int $id_correntista)
    {
        try {
            $dao = new ContaDAO();

            $dao->deleteByIdCorrentista($id_correntista);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
