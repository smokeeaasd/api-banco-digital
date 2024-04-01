<?php

namespace App\Controller;

use Exception;

abstract class Controller
{
    public static function wh_log($log_msg)
    {
        $log_filename = "log";
        if (!file_exists($log_filename)) {
            // create directory/folder uploads.
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';
        // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
        file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
    }

    public static function getResponseAsJSON($data, int $type)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        $response = [
            'Type' => $type,
            'Data' => $data
        ];

        exit(json_encode($response, JSON_UNESCAPED_UNICODE));
    }

    public static function setResponseAsJSON($data, $request_status = true)
    {
        $response = array('response data' => $data, 'response_successful' => $request_status);

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($response));
    }

    public static function getExceptionAsJSON(Exception $e)
    {

        $exception = [
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'traceAsString' => $e->getTraceAsString(),
            'previous' => $e->getPrevious()
        ];

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        http_response_code(400);

        exit(json_encode($exception));
    }

    public static function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET')
            throw new Exception("O método de requisição deve ser GET");
    }

    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            throw new Exception("O método de requisição deve ser GET");
    }

    protected static function getIntFromUrl($var_get, $var_name = null)
    {
        self::isGet();

        if (!empty($var_get))
            return (int)$var_get;
        else
            throw new Exception("Variável $var_name não identificada");
    }

    protected static function getStringFromUrl($var_get, $var_name = null)
    {
        self::isGet();

        if (!empty($var_get))
            return (string)$var_get;
        else
            throw new Exception("Variável $var_name não identificada");
    }
}
