<?php

namespace App\DAO;

use Exception;
use \PDO;
use PDOException;

abstract class DAO extends PDO
{
    protected $conexao;
    public function __construct()
    {
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_LOWER,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            $dsn = "mysql:dbname=" . $_ENV['db']['database'] . ";unix_socket=" . $_ENV['db']['instanceUnixSocket'];

            $this->conexao = new PDO(
                $dsn,
                $_ENV['db']['user'],
                $_ENV['db']['pass'],
                $options
            );
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro ao tentar conectar ao MySQL", 0, $e);
        }
    }
}
