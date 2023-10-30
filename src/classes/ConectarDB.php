<?php
/**
 * @package simatefPAY - pagamento de cartões via URL.
 * @version 2.2.1.0
 * @see https://pay.simatef.com.br
 * @author Ricardo Ferreira <rnhc1000@gmail.com>
 * @author Luan Santana <lsantana@gmail.com>
 * @copyright 2018-2022 Ricardo Ferreira
 * @copyright 2018-2018 Luan Santana
 * @license Direitos Reservados a Sotech Pagamentos Eletronicos
 */
declare(strict_types=1);
namespace Rferreira\Misc\classes;
use PDO;
use PDOException;
use PDOStatement;

final class ConectarDB
{

    private const CONEXAODB = array(
        "hostDB"=>"172.21.0.4:",
        "portDB"=>3306,
        "nomeDB" => "testePDO",
        "userDB"=>"testepdo",
        "passDB"=>"ManagerMySQL"
    );

    public static $conectaDB;

    public function __construct()
    {   
        if (!isset(self::$conectaDB)){ 
            try {
                self::$conectaDB = new PDO(
                    "mysql:host=".self::CONEXAODB['hostDB'].";".
                    "port=".self::CONEXAODB['portDB'].";".
                    "dbname=".self::CONEXAODB['nomeDB'],
                    self::CONEXAODB['userDB'],
                    self::CONEXAODB['passDB']
                );
                $conectaDB=self::$conectaDB;
                $conectaDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conectaDB->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
                return self::$conectaDB;
            } catch (PDOException $e) {
                die("ERRO!: " . $e->getMessage());
            }        
        } else {
            return self::$conectaDB;
        }
    }
}