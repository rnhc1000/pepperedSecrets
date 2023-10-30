<?php

/**
 * API Extrato Eletronico
 * API Extrato Eletronico v21.0A
 * @package API Extrato Eletronico
 * @see https://extratouserede.simatef.com.br
 * @author Ricardo Ferreira <rnhc1000@gmail.com>
 * @copyright 2020 - 2021 Ricardo Ferreira
 * @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
 * @return Senha Apimentada e Hash
 */

declare(strict_types=1);

namespace Rferreira\Misc\classes;
//use Rferreira\Misc\classes\GetTokenPwd;
//use Rferreira\Misc\classes\SetPepPwd;

final class GeradorSenhaSegura
{
    private string $senhaAProteger;
    private string $pimenta;
    private string $senhaComPimenta;
    private string $senhaHashed;



    public function __construct($senhaAProteger)
    {
        $this->setSenha($senhaAProteger);
    }

    public function gerarSenhaApimentada(): string
    {
        $pimenta = false;
        $pepper = new GetTokenPwd();
        $pimenta = $pepper->getChiliPepper();
        $senhaAProteger = $this->getSenha();
        $senhaComPimenta = new SetPepPwd($senhaAProteger, $pimenta);
        return $senhaComPimenta->getSenhaPeppered();
    }

    public function calculaHash($senhaComPimenta): string
    {
        $senhaHashed = password_hash($senhaComPimenta, PASSWORD_ARGON2ID);
        return $senhaHashed;
    }


    public function passwordVerify($senhaComPimenta, $senhaHashed) : bool
    {
        if (!(password_verify($senhaComPimenta, $senhaHashed))){
            echo "<br>" . "Deu ruim....";
            return false;
        } else {
            echo "<br>" . "Hahaha....";
            return true;
        }
    }

    public function setSenha($senhaAProteger)
    {
        $this->senhaAProteger = $senhaAProteger;
    }

    public function getSenha(): string
    {

        return $this->senhaAProteger;
    }


}
