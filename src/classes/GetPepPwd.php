<?php 
/**
* API Extrato Eletronico
* API Extrato Eletronico v21.0A
* @package API Extrato Eletronico
* @see https://extratouserede.simatef.com.br
* @author Ricardo Ferreira <rnhc1000@gmail.com>
* @copyright 2020 - 2021 Ricardo Ferreira
* @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
* @return Peeper a ser usado na senha
*/
declare(strict_types=1);

namespace Rferreira\Misc\classes;

class GetPepPwd {

    private string $pepper = "Do)uRCyj32BZl2?,L@A9;0i!wtb}wMu02eL-h!TCdWb&?Q3B]4@)UKu*5,9SBW)30^n|68BA>c&+tk,nFzYb!)Ih6)07Fkc6g&5Dp7ElA+YuWLAc@Y3nH#+%xmn2,&aU";

    public function setPepper($pepper){
        $this->pepper = $pepper;
    }

    public function getPepper(): string {
        return $this->pepper;
    }
}


