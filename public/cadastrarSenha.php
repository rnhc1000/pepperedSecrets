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

session_start();

use Rferreira\Misc\services\validarSenha;

if (!isset($_SESSION)) {
    session_start();
}
if (!filter_input(INPUT_POST, "senha")) {
    $erros['senha'] = 'Senha é obrigatório';
}

if (!filter_input(INPUT_POST, "confirmaSenha")) {
    $erros['confirmaSenha'] = 'Senha é obrigatório';
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="language" content="pt-BR" />
    <meta name="country" content="BRA" />
    <meta name="currency" content="R$" />
    <meta name="description" content="">
    <meta name="keywords" content="Senha Segura, Seguranca">
    <meta name="author" content="Ricardo Ferreira @rnhc1000">
    <title>Gerador de Credenciais do Sistema</title>
    <link href="../interface/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="../interface/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../interface/css/style.css" rel="stylesheet">
    <link href="../interface/css/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../interface/js/jquery.min.js"></script>
    <script type="text/javascript" src="../interface/js/popper.min.js"></script>
    <script type="text/javascript" src="../interface/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../interface/js/mdb.min.js"></script>
</head>

<body>
    <div class="container">
            <div class="col-md-4 bg-light">
                <form class="form-signin" onsubmit="return validarForm();"
                    method="post"
                    name="cadastrarSenha"
                    action="validarSenha.php">
                    <h4 class="form-signin-heading text-primary text-center">Secrets SafeGuard</h4>
                    <div class="form-group">
                        <small id="infoUsuario"
                        class="form-text text-danger">
                        *Informe um Nome de Usuario... Pode usar CPF, CNPJ, email,
                        Nomes Próprios, Nicknames, etc...</small>
                    </div>
                    <div class="form-group">
                        <input name="nUsuario"
                        type="text"
                        id="inputUsuario"
                        class="form-control"
                        placeholder="Digite o Usuario"
                        required
                        autofocus
                        maxlength="30">
                    </div>
                    <div class="form-group">
                        <small id="infoSenha"
                            class="form-text text-danger">
                            *Mínimo 8 dígitos;
                            Ao menos uma letra maiuscula;
                            uma minuscula,
                            um caractere especial.
                            Ex: (@,#,$,%,&,*).>
                    </small>
                    </div>
                    <div class="form-group">
                        <input name="nSenha"
                        type="password" id="inputSenha"
                        class="form-control"
                        placeholder="Digite sua Senha"
                        required
                        autofocus
                        maxlength="20">
                    </div>
                    <div class="form-group">
                        <input name="nConfirmaSenha"
                        type="password"
                        id="inputConfirmaSenha"
                        class="form-control"
                        placeholder="Digite Novamente Sua Senha"
                        required
                        maxlength="20">
                    </div>
                    <div class="text-right">
                        <input type="submit"
                        class="btn btn-outline-primary btn-sm"
                        id="btnSubmit"
                        value="Gerar Credenciais">
                    </div>
                </form>
            </div>
    </div>
    </div> <!-- /container -->

    <footer class="font-small blue">
            <div class="text-center font-weight-light">
                <a href="https://sotech.com.br/">
                    <strong>©2007-<?php echo date("Y"); ?> Sotech Pagamentos Eletronicos</strong>
                    <p>Todos os direitos reservados-v22.10</p>
                    <p>Uso Interno</p>
                </a>
            </div>
    </footer>
</body>
</html>


<script>
    function validarForm() {
        var btn = document.getElementsById("btnSubmit");
        btn.disabled = true;
        btn.addEventListener("input", function(event) {
            usuario = document.getElementById('inputUsuario').value;
            senha1 = document.getElementById('inputSenha').value;
            senha2 = document.getElementById('inputConfirmaSenha').value;
            if ((usuario === null || senha1 === null) || (senha2 === null)) {
                alert('Preencha todos os campos');
                return false;
            } else if (senha1 !== senha2) {
                console.log(senha1);
                alert('As Senhas são Diferentes!!!');
                return false;
            }
            btn.disabled = false;
            btn.className = "btn btn-sm btn-primary ctw";
            document.login.submit();
        });
    }
</script>

<script>
    var input = document.getElementById("inputSenha");
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("btnSubmit").click();
        }
    });
</script>

<script>
    var input = document.getElementById("inputConfirmaSenha");
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("btnSubmit").click();
        }
    });
</script>
