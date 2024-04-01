<?php

namespace App\Model;

use App\DAO\TransacaoDAO;
use Exception;

class TransacaoModel extends Model
{
    public $id, $data_transacao, $valor;
    public $id_remetente, $id_destinatario;

    public function getAll()
    {
        try {
            $dao = new TransacaoDAO();
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $dao = new TransacaoDAO();
            $this->rows = $dao->selectById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByDestinatario(int $id_destinatario)
    {
        try {
            $dao = new TransacaoDAO();
            $this->rows = $dao->selectByDestinatario($id_destinatario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getByRemetente(int $id_remetente)
    {
        try {
            $dao = new TransacaoDAO();
            $this->rows = $dao->selectByRemetente($id_remetente);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUltimaByDestinatario(int $id_destinatario)
    {
        try {
            $dao = new TransacaoDAO();

            $this->rows = $dao->selectUltimaByDestinatario($id_destinatario);
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function addTransacao()
    {
        try {
            $dao = new TransacaoDAO();
            return $dao->insert($this);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function removeByIdRemetente(int $id_remetente)
    {
        try {
            $dao = new TransacaoDAO();
            $dao->deleteByIdRemetente($id_remetente);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
