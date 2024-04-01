<?php

namespace App\Model;

use App\Controller\Controller;
use App\DAO\ContaDAO;
use App\DAO\CorrentistaDAO;
use Exception;

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function getAll()
    {
        try {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByCPF(string $cpf)
    {
        try {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectByCPF($cpf);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByCPFAndSenha(string $cpf, string $senha)
    {
        try {
            $dao = new CorrentistaDAO();
            $this->rows = $dao->selectByCPFAndSenha($cpf, $senha);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addCorrentista()
    {
        try {
            $dao = new CorrentistaDAO();

            return $dao->insert($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateCorrentista()
    {
        try {
            $dao = new CorrentistaDAO();

            $dao->update($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCorrentista(int $id)
    {
        try {
            $dao = new CorrentistaDAO();

            $dao->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
