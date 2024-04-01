<?php

namespace App\Model;

use App\DAO\ChavePixDAO;
use Exception;

class ChavePixModel extends Model
{
    public $id, $chave, $tipo, $id_conta;

    public function getAll()
    {
        try {
            $dao = new ChavePixDAO();
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $dao = new ChavePixDAO();
            $this->rows = $dao->selectById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByChave(string $chave)
    {
        try {
            $dao = new ChavePixDAO();
            $this->rows = $dao->selectByChave($chave);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByConta(int $id_conta)
    {
        try {
            $dao = new ChavePixDAO();
            $this->rows = $dao->selectByConta($id_conta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addChavePix()
    {
        try {
            $dao = new ChavePixDAO();

            $dao->insert($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateChavePix()
    {
        try {
            $dao = new ChavePixDAO();

            $dao->update($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteChavePix(int $id)
    {
        try {
            $dao = new ChavePixDAO();

            $dao->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteChavesPixByConta(int $id_conta)
    {
        try {
            $dao = new ChavePixDAO();

            $dao->deleteByIdConta($id_conta);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
