<?php

/**
 * API Extrato Eletronico
 * API Extrato Eletronico v21.0A
 * @package API Extrato Eletronico
 * @see https://extratouserede.simatef.com.br
 * @author Ricardo Ferreira <rnhc1000@gmail.com>
 * @copyright 2020 - 2021 Ricardo Ferreira
 * @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
 */

declare(strict_types=1);

require_once '../vendor/autoload.php';
use Rferreira\Misc\classes\ConectarDataBase;
use Rferreira\Misc\classes\GeradorSenhaSegura;
use Rferreira\Misc\classes\PersistirCredenciaisSistema;

if (!isset($_SESSION)) {
    session_start();
}

if (is_null($_POST['nUsuario'] || $_POST['nSenha'])) {
    unset($_SESSION['nUsuario']);
    unset($_SESSION['nSenha']);
    unset($_SESSION['nConfirmaSenha']);
    header('location: cadastrarSenha.php');
}
$usuario        = $_POST['nUsuario'];
$senhaInicial   = $_POST['nSenha'];
$senhaConfirmar = $_POST['nConfirmaSenha'];

/*echo $usuario . "<br>";
echo $senhaInicial . "<br>";
echo $senhaConfirmar . "<br>";
*/
$retorno = "";
if ($senhaInicial !== $senhaConfirmar) {
    $retorno = false;
    echo "<script> alert('Senhas Diferentes'); location.href='cadastrarSenha.php';</script>";
} else {
    $retorno = true;
    $senhaConfirmada = new GeradorSenhaSegura($senhaInicial);
    $senhaAPimentada = $senhaConfirmada->gerarSenhaApimentada();
    $senhaHashed = $senhaConfirmada->calculaHash($senhaAPimentada);
    $verificaSenha = $senhaConfirmada->passwordVerify($senhaAPimentada, $senhaHashed);
    if (!$verificaSenha) {
        echo "Deu ruim....";
        exit();
    } else {
        // echo "Senhas iguais...";
        $senha = $senhaHashed;
        $ativo =  1;
        $dataHora=date('Y-m-d H:i:s');
        echo $dataHora . "<br>";
        $acesso=DateTime::createFromFormat('Y-m-d H:i:s', $dataHora);
        $ultimoAcesso=$acesso->format('Y-m-d H:i:s');
        $enderecoIP = "177.177.177.177";
        $now = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $dataCriacao = $now->format('Y-m-d H:i:s');
        $testaDB = false;        
        $dadosUsuario = [
            'usuario' => $usuario,
            'senha'=> $senhaHashed ,
            'ativo' => $ativo,
            'ultimoacesso' => $ultimoAcesso,
            'enderecoIP' => $enderecoIP,
            'criacao' => $dataCriacao,
        // $usuario, $senhaHashed, $ativo, $ultimoAcesso, $enderecoIP, $dataCriacao
        ];
        // echo "<hr>";
        // var_dump($dadosUsuario);
        // $sql = "INSERT INTO usuario (
        //     usuario,
        //     senha,
        //     ativo,
        //     ultimoacesso,
        //     enderecoIP,
        //     criacao
        //     ) VALUES (      
        //     :usuario,
        //     :senha,
        //     :ativo,
        //     :ultimoacesso,
        //     :enderecoIP,
        //     :criacao
        //     )";
        // echo "<hr>";
        // echo $sql;
        // echo "<hr>";
        // $testaDB = ConectarDataBase::conectarDatabase(); 
        // $preparaSQL=$testaDB->prepare($sql);
        // var_dump($preparaSQL);
        // echo "<hr>";
        // echo "Testando insert...";
        // echo "<hr>";
        // $preparaSQL->execute($dadosUsuario );
        // // $preparaSQL->execute([$usuario,$senhaHashed, $ativo, $ultimoAcesso, $enderecoIP, $dataCriacao] );
        // $lastId=$testaDB->lastInsertID();
        // echo "<br>" . $lastId;
        $testaDB = ConectarDataBase::conectarDatabase();
        $sqlCountId = "select count(id) as ultimoId from usuario";
        $contagemId = $testaDB->query($sqlCountId);
        while ($row = $contagemId->fetch()) {
            $numeroId=$row['ultimoId'] . "<br>";
        };
        $persisteCredenciais = new PersistirCredenciaisSistema();
        $retorno = $persisteCredenciais->inserirCredenciais($dadosUsuario);
        if ($retorno > $numeroId) {
            echo "Sucesso na inserção" . "<br>";
            var_dump($retorno);

        } else {
            echo "Erro ao inserir registro no banco";
        }
        echo "Ultimo ID -> " . $retorno;

        // $selectSQL = "SELECT * from usuario";


    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid blue;
        }
    </style>
</head>

<body>

    <h2>Credenciais</h2>

    <table style="width:100%">
        <tr>
            <th style="text-align:center">Senha Original</th>
            <th style="text-align:center">Senha Apimentada</th>
        </tr>
        <tr>
            <td style="text-align:center"><?php echo $senhaInicial; ?></td>
            <td style="text-align:center"><?php echo $senhaAPimentada; ?></td>
        </tr>
        <tr>
            <th style="text-align:center">Usuario</th>
            <th style="text-align:center">Senha a Ser Armazenada</th>

        </tr>
        <tr>
            <td style="text-align:center"><?php echo $usuario; ?></td>
            <td style="text-align:center"><?php echo $senhaHashed; ?></td>
        </tr>
        <tr>
            <th style="text-align:center">Senha Digitada</th>
            <th style="text-align:center">Senha Armazenada</th>

        </tr>
        <tr>
            <td style="text-align:center"><?php echo $senhaInicial ?></td>
            <td style="text-align:center"><?php echo $senhaHashed; ?></td>
        </tr>


    </table>

</body>

</html>