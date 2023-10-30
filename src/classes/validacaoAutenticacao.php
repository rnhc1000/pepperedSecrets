<?php
/**
* API Extrato Eletronico
* API Extrato Eletronico v21.0A
* @package API Extrato Eletronico
* @see https://extratocielo.simatef.com.br
* @author Ricardo Ferreira <rnhc1000@gmail.com>
* @copyright 2020 - 2021 Ricardo Ferreira
* @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
*/

require_once '../classes/loginDB.php';

if(!isset($_SESSION)) { 
    session_start(); 
}

if (($usuario == null) || ($senha == null)){
    $retorno=false;
    unset($_SESSION['usuario']);
    header("Location: ../autenticaUsuario.php");
    exit();
} else {
    $retorno=true;
}

if($retorno === true) {
    $credenciaisUsuario = array('usuario' => $usuario, 'senha' => $senha);
    $efetuaValidacao = new ValidaCredenciaisAutenticacao($credenciaisUsuario);
    if ($efetuaValidacao->validarUsuario()) {
        $usuarioValido=true;
    } else {
        $usuarioValido=false;
    }
    if ($efetuaValidacao->validarSenha()) {
        $senhaOK= true;
    } else {
        $senhaOK=false;
    }

    if ($usuarioValido && $senhaOK) {
        $efetuaValidacao->auditarAcesso();
        $_SESSION['usuario'] = $usuario;
        header("Location: ../interface/inicializarTokensApiRede.php");
    } else {
        unset($_SESSION['usuario']);
        header("Location: ../autenticaUsuario.php");
    }
}
?>
