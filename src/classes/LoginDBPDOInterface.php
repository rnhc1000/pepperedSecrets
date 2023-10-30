<?php
/**
 * Pagamento de Contas via URL
 * 
 * @package simatefPAY - pagamento de cartões via URL.
 * @version 2.2.1.0
 * @see https://pay.simatef.com.br
 * @author Ricardo Ferreira <rnhc1000@gmail.com>
 * @author Luan Santana <lsantana@gmail.com>
 * @copyright 2018-2022 Ricardo Ferreira
 * @copyright 2018-2018 Luan Santana
 * @license Direitos Reservados a Sotech Pagamentos Eletronicos
 */

namespace Rferreira\Misc\classes;

interface LoginDBPDOInterface{
    public function realizarLogin();
    public function realizarLogoff();
    public function verificarLogado();
    public function validarUsuario();
    public function verificarUsuarioAtivo();
    public function cadastrarSenha($senha);
}
