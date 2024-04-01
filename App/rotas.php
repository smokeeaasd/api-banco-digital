<?php

use App\Controller\ChavePixController;
use App\Controller\ContaController;
use App\Controller\CorrentistaController;
use App\Controller\TransacaoController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
	/**
	 * Rotas para Correntista
	 */
    case "/api/correntista":
        CorrentistaController::getCorrentistas();
    break;

    case "/api/correntista/by-id":
        CorrentistaController::getCorrentistaById();
    break;

    case "/api/correntista/new":
        CorrentistaController::addCorrentista();
    break;

    case "/api/correntista/update":
        CorrentistaController::updateCorrentista();
    break;

    case "/api/correntista/connect":
        CorrentistaController::getCorrentistaByCPFandSenha();
    break;

	/**
	 * Rotas para Conta
	 */
	case "/api/conta":
		ContaController::getContas();
	break;

	case "/api/conta/by-id":
		ContaController::getContaById();
	break;

	case "/api/conta/by-numero":
		ContaController::getContaByNumero();
	break;

	case "/api/conta/by-correntista":
		ContaController::getContaByCorrentista();
	break;

	case "/api/conta/new":
		ContaController::addConta();
	break;

	case "/api/conta/update":
		ContaController::updateConta();
	break;

	/**
	 * Rotas para ChavePix
	 */

	case "/api/chavepix":
		ChavePixController::getChavesPix();
	break;

	case "/api/chavepix/by-id":
		ChavePixController::getChavePixById();
	break;

	case "/api/chavepix/by-conta":
		ChavePixController::getChavesPixByConta();
	break;

	case "/api/chavepix/by-chave":
		ChavePixController::getChavePixByChave();
	break;

	case "/api/chavepix/new":
		ChavePixController::addChavePix();
	break;

	case "/api/chavepix/update":
		ChavePixController::updateChavePix();
	break;

	case "/api/chavepix/delete":
		ChavePixController::deleteChavePix();
	break;

	/**
	 * Rotas para Transacao
	 */
	case "/api/transacao":
		TransacaoController::getTransacoes();
	break;

	case "/api/transacao/by-id":
		TransacaoController::getTransacaoById();
	break;

	case "/api/transacao/by-remetente":
		TransacaoController::getTransacaoByRemetente();
	break;

	case "/api/transacao/by-destinatario":
		TransacaoController::getTransacaoByDestinatario();
	break;

	case "/api/transacao/new":
		TransacaoController::addTransacao();
	break;

	case "/api/transacao/ultima/by-destinatario":
		TransacaoController::ListenByIdDestinatario();
	break;

	case "/api/teste":
		include './Teste/conta.php';
	break;

    default:
        http_response_code(403);
    break;
}

?>