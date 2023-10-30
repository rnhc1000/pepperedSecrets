<?php
/*
* API Extrato Eletronico
* API Extrato Eletronico v21.0A
* @package API Extrato Eletronico
* @see https://extratouserede.simatef.com.br
* @author Ricardo Ferreira <rnhc1000@gmail.com>
* @copyright 2020 - 2021 Ricardo Ferreira
* @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
* @return Pepper a ser usado na senha
*/

declare(strict_types=1);

namespace Rferreira\Misc\classes;

use Exception;

final class GetTokenPwd
{
    public function getChiliPepper(): string
    {
        $locationFile = "../../configApp/secureAccess/simatefPAY.ini";
        try {
            if (!file_exists($locationFile)) {
                throw new Exception("Pimenta Não foi Encontrada");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $pepperMint = (parse_ini_file($locationFile, false, INI_SCANNER_NORMAL));
        $chiliPepper = $pepperMint['pepper'];
        $chiliPepper = base64_decode(str_replace(['-', '_'], ['+', '/'], $chiliPepper));
        return $chiliPepper;
    }
}
