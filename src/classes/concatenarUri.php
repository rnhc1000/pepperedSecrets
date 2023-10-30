<?php
namespace Rferreira\Misc\classes;
use Rferreira\Misc\classes\ConectarDataBase;
use Exception;
/*$uri = "https://rl7-sandbox-api.useredecloud.com.br/partner/v1/organizations/requests/";
$requestID="05a595bd-301e-4b39-acbd-847ed1a4ade9";
$endPointRequestID="/features/merchant-statement";

$requestIdEndPoint=$requestID . $endPointRequestID;

echo "requestIdEndPoint Concatenado" . "<hr>";
echo $requestIdEndPoint;


$preparaJson = array(
    'uri' => $uri,
    'requestIdEndPoint'   => $requestIdEndPoint
);
echo "<hr>";
$dadosJson = json_encode($preparaJson);
$uriEncoded = http_build_query($preparaJson);
echo "<br>" . "Uri Encoded" . "<hr>";
echo $uriEncoded;
echo "<hr>";
echo "https://rl7-sandbox-api.useredecloud.com.br/partner/v1/organizations/requests/05a595bd-301e-4b39-acbd-847ed1a4ade9/features/merchant-statement";
echo "<pre>" . $uriEncoded ."<pre>";
*/
echo "Resposta Recebida da Rede - JSON" . "<br>";
$jsonA = '{
"requestId": "ee04b45a-02f4-4988-83bd-3f84b22e8c9f",
"status": "PENDENTE",
"createdDate": "2019-10-08 22:45:34",
"requestCompanyNumber": 13818724,
"companyNumbers": [
  18447058,
  18469558,
  18526187
]
}';
var_dump($jsonA);
echo "<hr>";
$jsonB = json_decode($jsonA, true);
print_r($jsonB);
echo "<hr>";
$len = count($jsonB['companyNumbers']);

for ($i = 0; $i < $len; $i++) {
    echo $jsonB['companyNumbers'][$i] . "<br>";
}

echo "<hr>";

foreach ($jsonB['companyNumbers'] as $chave => $valor) {
    echo "{$chave} => {$valor}";
}
echo "<hr>";

print_r($jsonB['companyNumbers']);

echo "<hr>";

$jsonC = json_encode($jsonB['companyNumbers']);

print_r($jsonC);

/*
INSERT INTO `estabelecimento`(
    `cnpjMatriz`, `idMatriz`, `filiais`, `razaoSocial`, `email`, 
    `tipoEstabelecimento`, `telefone`, `ativo`, `clientIdAPI`, `secretCodeAPI`, 
    `requestCompanyNumber`, `companyNumbers`,
    `matrizPV`, `requestID`, `acessoApiRede`, `parceiroRede`, `acessoExtratoLiberado`, 
    `dataSolicitacaoExtrato`, `dataAprovacaoAcessoExtrato`, `statusAcessoExtrato`, `tipoAcessoExtrato`, `permissaoAcessoExtrato`, 
    `geracaoAcessoExtrato`, `servicoLiberado`, 
    `codeToken`, `accessToken`, `geracaoAccessToken`, `firstAccessToken`, `timeoutAccessToken`, 
    `tokenType`, `contaAccessToken`, `refreshToken`,  `timeoutRefreshToken`, `geracaoRefreshToken`, 
    `firstRequestRefreshToken`, `contaRefreshToken`, `clientIdBase64`,  `escopoAPI`, `stateAPI`
     ) 
     VALUES 
     ('08.865.229/0002-18','8','1','Sotech Serviços em Informática','suporte@sotech.com.br',
     'Serviços Financeiros','(71)-3041-3333','1','63b6cbd4-4ff3-4ff4-b768-462f16486afc','GsOdkkPLFT',
     '22523510', '[33678421,33678480,33678197,33678219,36559148]',
     '22523510','00000000-0000-0000-0000-000000000000','2022-04-07 19:39:30','','0',
     '2022-04-07 19:39:30','2022-04-07 19:39:30','Pendente','Parcial','Leitura',
     '2021-07-16 20:30:30','',
     '00000000-0000-0000-0000-000000000000','e812416d-1245-4215-bfe8-877240cacf04','2022-04-07 19:39:30', '1', '1439',
     'bearer', '43', 'ab38007a-c7ba-4f6c-898e-20559d7bfbc8', '86400', '2022-04-07 19:39:30',
     '1','17','NjNiNmNiZDQtNGZmMy00ZmY0LWI3NjgtNDYyZjE2NDg2YWZjOkdzT2Rra1BMRlQ=', 'merchant-statement feature_merchant_statement', 'STC-0002-18')
     */

//class Database {
//$link = null ;

//function getLink() {
//if ( self :: $link ) {
//     return self :: $link ;
// }
$credenciaisDB = "../configApp/secureAccess/conectaDB.ini";
try {
    if (!file_exists($credenciaisDB)) {
        throw new Exception("Credenciais Não Encontradas");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
} finally {
    echo  "<hr>". "Credenciais Válidas!!!" ;
}
echo "<hr>";
$parse = parse_ini_file($credenciaisDB, true);
//$driverDB = $parse["conexaoDB"];
//
//foreach ($parse["conexaoDB"] as $chave=>$valor){
//    $driverDB[]="${chave}=>${valor},";
//}
//var_dump($driverDB);
//$dsn=$driverDB . ":";
echo "<br>" . $dsn;
$driver = $parse["conexaoDB"]["db_driver"];
$dsn = "${driver}:";
$user = $parse["conexaoDB"]["db_user"];
$password = $parse["conexaoDB"]["db_password"];
//$options = $parse["db_options"];
//$attributes = $parse["db_attributes"];

foreach ($parse["dsn"] as $chave => $valor) {
    $dsn .= "${chave}=${valor}";
    echo $dsn . "<br>";
}

echo "<hr>" . $dsn;
echo "<hr>" . "${user}:" . "${password}";
echo "<hr>";

foreach ($parse["db_options"] as $chave => $valor) {
    $options .= "${chave}=${valor}";
}
echo "Opcoes-> " . $options;
echo "<hr>";
$i=0;
foreach ($parse["db_attributes"] as $chave => $valor) {
    $attributes[$i] ="${chave}=${valor};";
    //$tst = constant ( "PDO::{$chave}" ) . constant ( "PDO::{$valor}" );
    //echo $tst . "<br>";
}
//self :: $link = new PDO ( $dsn, $user, $password, $options ) ;
var_dump($attributes);
echo "<hr>";

$cdb->ConectarDataBase::conectarDatabase();

var_dump($cdb);

var_dump($tst);

class TesteNULO {

    static private $testeNulo = null;

    public function TesteNulo() {

        if (self::$testeNulo) {
            return true;
        } else {
            return false;
        }

    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }

}

$testarNulo = new TesteNULO();
echo "<hr>";
var_dump($testarNulo);
echo $resultado=$testarNulo->TesteNulo();
var_dump($resultado);
echo "<hr>";



//self::$link = new \PDO($dsn, $user, $password, $options);

//foreach ($attributes as $chave => $valor) {
   /* self::$link->setAttribute(
        constant("PDO::{$chave}"),
        constant("PDO::{$valor}")
    );
//}
    
            
    //return self :: $link ;
        
    //}

/*

    select   to_date(sysdate,'DD/MM/YYYY') "Data",
         Initcap(sys_context('USERENV', 'DB_NAME')) "Instância",
         ddf.tablespace_name "Tablespace",
         ddf.file_name "Datafile",
         round(ddf.bytes/(1073741824),2) "Total(GB)",
         round((ddf.bytes - sum(nvl(dfs.bytes,0)))/(1073741824),2) "Used(GB)",
         round(sum(nvl(dfs.bytes,0))/(1073741824),2) "Free(GB)"
from     sys.dba_free_space dfs left join sys.dba_data_files ddf
on       dfs.file_id = ddf.file_id
group by ddf.tablespace_name, 
         ddf.file_name, 
         ddf.bytes
order by ddf.tablespace_name, 
         ddf.file_name;
*/