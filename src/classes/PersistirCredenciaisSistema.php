<?php
/*
* API Extrato Eletronico
* API Extrato Eletronico v21.0A
* @package API Extrato Eletronico
* @see https://extratouserede.simatef.com.br
* @author Ricardo Ferreira <rnhc1000@gmail.com>
* @copyright 2020 - 2021 Ricardo Ferreira
* @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
* @return Ultimo ID inserido no DB
* Parametros Recebidos 
* $dadosUsuario(
*   usuario =>$usuario,
*   senha => $senhaHashed,
*   ativo => $ativo,
*   ultimoAcesso => $ultimoAcesso,
*   enderecoIP => $enderecoIP,
*   criacao => $dataCriacao
* )
*/


namespace Rferreira\Misc\classes;

use Rferreira\Misc\classes\ConectarDataBase;
use PDOException;
use Exception;

final class PersistirCredenciaisSistema
{
    public function inserirCredenciais($dadosUsuario)
    {

        try {

            $sql = "INSERT into usuario (
                    usuario, senha, ativo, ultimoacesso, enderecoIP, criacao)
                VALUES (
                    :usuario,:senha,:ativo,:ultimoacesso,:enderecoIP,:criacao)";
            $conectaDB = ConectarDataBase::conectarDatabase();
            $preparaSQL = $conectaDB->prepare($sql);
            try {
                $conectaDB->beginTransaction();
                $preparaSQL->execute($dadosUsuario);
                $lastId = $conectaDB->lastInsertID();
                $conectaDB->commit();
                return $lastId;
                // if(!($preparaSQL->execute($dadosUsuario))) {
                //     echo "Erro na Inserção dos dados";
                //     return false;
                // } else {
                //     $lastId = $conectaDB->lastInsertID();
                //     return  $lastId;
                // }
            } catch (PDOException $e) {
                $conectaDB->rollback();
                // print "Erro na Query Insert!: " . $e->getMessage() . "</br>";
                $info = $conectaDB->errorInfo();
                echo $info[0] == $conectaDB->code;
                return $e->getMessage();
            }
        } catch (PDOException $e) {
            // print "Erro no Prepare!: " . $e->getMessage() . "</br>";
            $info = $conectaDB->errorInfo();
            echo $info[0] == $conectaDB->code;
            return $e->getMessage();
        }
    }
}
