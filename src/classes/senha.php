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
include_once 'classes/getPepPwd.php';
include_once 'classes/setPwdPep.php';
include_once 'classes/setPwdHash.php';
if(!isset($_SESSION)) { 
        session_start(); 
}

//if((!isset ($_SESSION['codigoLink']) == true)) {
//        unset($_SESSION['codigoLink']);
//        header('location: https://sotech.com.br');
//}
//$codigoLink=$_SESSION['codigoLink'];
$senha = "#cheiadecharme";
echo $senha;
$i = new GetPepperPwd();
$pep = $i->getPepper();
echo '<br>' . $pep;
$peppered= new SenhaPeppered($senha, $pep);
echo '<br>' . $peppereddd=$peppered->getSenhaPeppered();
$x = new SenhaHashed();
$y=$x->calculaHash($peppereddd);
echo '<hr>';
echo $y;

