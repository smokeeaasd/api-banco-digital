<?php

namespace App\Controller;

use App\Model\CorrentistaModel;

use Exception;

class CorrentistaController extends Controller {
    public static function getCorrentistas(): void {
        try {
            $model = new CorrentistaModel();
            $model->getAll();
            parent::getResponseAsJSON($model->rows, 1);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCorrentistaById(): void {
        try {
            $id = parent::getIntFromUrl($_GET['id']);

            $model = new CorrentistaModel();

            $model->getById($id);

            parent::getResponseAsJSON($model->rows, 1);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCorrentistaByCPFandSenha(): void {
        try {
            $json = json_decode(file_get_contents("php://input"));

            $model = new CorrentistaModel();

            $model->getByCPFAndSenha($json->CPF, $json->Senha);

            if ($model->rows)
                parent::getResponseAsJSON($model->rows, 1);
            else
                parent::getResponseAsJSON([
                    'message' => "Não existe conta com as credenciais informadas"
                ], 2);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addCorrentista(): void {
        try {
            $json = json_decode(file_get_contents("php://input"));
            $cpf = $json->CPF;

            $model = new CorrentistaModel();

            $model->getByCPF($cpf);

            $temCorrentista = $model->rows;

            if (!$temCorrentista) {
                $model->nome = $json->Nome;
                $model->cpf = $json->CPF;
                $model->data_nasc = $json->data_nasc;
                $model->senha = $json->Senha;

                $last_id = $model->addCorrentista();

                $model->getById($last_id);

                Controller::wh_log(json_encode($model->rows, JSON_PRETTY_PRINT));
                parent::getResponseAsJSON($model->rows, 1);
            } else {
                parent::getResponseAsJSON([
                    'message' => 'CPF já cadastrado.'
                ], 2);
            }
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function updateCorrentista(): void {
        try {
            $model = new CorrentistaModel();

            $json = json_decode(file_get_contents("php://input"));

            $model->id = $json->Id;
            $model->nome = $json->Nome;
            $model->cpf = $json->CPF;
            $model->data_nasc = $json->data_nasc;
            $model->senha = $json->Senha;

            $model->updateCorrentista();

            parent::getResponseAsJSON(['message' => 'Atualizado!'], 1);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
}
