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
 * @return Senha Peppered;
 */
declare(strict_types=1);

namespace Rferreira\Misc\classes;

final class SetPepPwd {
     private string $pwd;
     private string $pep;
     private string $senhaPeppered; 

    public function __construct($pwd, $pep) {
        $this->setSenhaPeppered($pwd, $pep);        
    }
    
    public function setSenhaPeppered($pwd, $pep) {
        $this->senhaPeppered = hash_hmac("sha512", $pwd, $pep);
    }
    
    public function getSenhaPeppered():string {
        return $this->senhaPeppered;
    }
    
}
