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
use Rferreira\Misc\classes\GeradorLink;

use function PHPSTORM_META\type;

if (!isset($_SESSION)) {
    session_start();
}

$url = "https://easypag.simatef.com.br";

$urlEncoded = base64_encode($url);
echo $urlEncoded;
echo "<br>";
$urlDecoded = base64_decode($urlEncoded);
echo $urlDecoded;
echo "<br>";
die();
$nome = "ricardo";
$nome=ucfirst($nome); // prtimeira letra maiúscula
echo $nome;
echo "<br>";
echo '1' + 2 * "007";

echo "<br>";
$a = 'a';
$b = 'y';
echo isset($c) ? $a.$c.$y : ($c ='t') . 'r';
echo "<br>";

echo '3' . (print '5') + 7;
echo "<br>";
$fooBar = 'baz';    
$varPrefix = 'foo';
echo "\$foobar -> " . $fooBar . "<br>";
// Outputs "baz"
echo ${$varPrefix . 'Bar'} . "<br>"; // Also outputs "baz"

class Test {

    public function __construct($x){
        $this->setTest($x);
    }
    public function testes($x) {
        $this->$x=self::getTest();
        if ($x == true) {
            return true;
        } else {;

            return false;
        }      
    }

    public function construct () {


    }

    public function setTest($x) {
        $this->x = $x;
    }

    public function getTest():bool{
        return $this->x;
    }
}

echo "Testando se o método existe na classe..." . "<br>";
$v = false;
$class = "Test";
$object = new $class($v);
$method = "getTest()";
$status = method_exists($class, 'construct');
var_dump($status);
echo "<br>";


$cl = new Test($v);
echo "<br>";
var_dump($cl->getTest());
echo "<br>";
$turingDate = new DateTime();
var_dump($turingDate);

die();

function doSomething(&$argument) 
    {
        $Result = $argument;
        $argument += 1;
        return $Result;	
    }
$n = 5;
$m = doSomething($n);
echo "n = " . $n . " and m = " . $m;
$n=25;
$a = $n == 25 ? 5 : 1;
echo "<br>" . $n;
echo "<br>" . $a;
$n = 18;
print "<br>" . 'What is her age?'. "<br>" . ' She is ' . $n . ' years old.';
$var = "YELLOW";
$var1 = $var[4];
echo $var1;

echo "<br>";
$Country1 = "INDIA";
$Country2 = "1";
$Country3 = "USA";
echo "$Country1" + "$Country2" . "$Country3";
echo "a" + "20";
echo "<br>";
echo "aaus" + "anr";
echo "<br>";
$name1= "Ajit";
$name2= "Rahul";
echo "$name1"."$name2";
echo "<br>";

Echo "Hello\n";
echo "Interview\n";
ECHO "Mania";

echo "<br>";

// <html>
// Hello Interview Mania
// </html>
$p=7;
function calc()
{
    echo $GLOBALS['p'];
    $GLOBALS['p']++;
}
echo "<br>";

calc();
calc();
calc();
echo "<br>";
class Teste {
static $n=7;
function calc1($n)
{
    echo self::$n;
    self::$n++;
}
}
$c= new Teste();
echo $c;
die();
echo $c->calc1(1);
echo "<hr>";
function calcx()
{
    static $p = 5;
    echo $p;
    $p++;
    echo $p . "<br>";
}
calcx();
calcx();

$p = 15;
$q = 35;
function calcy()
{

    $GLOBALS['q'] = $GLOBALS['p'] + $GLOBALS['q'];
    echo $GLOBALS['p'] . "<br>";
    echo $GLOBALS['q'] . "<br>";
} 
calcy();
echo "<br>" . $q;
$five = 5;
$six = 6;
echo "<br>" .  ($five / $six) * ($five / $six) * $six;
$p = 22;
$q = 5;
$r = 4;
echo "<br>" .$p % $q % $r;
$n1 = 14;
$n2 = 31;
$n3 = 11;
echo "<br>" . "$n1 = $n1 + $n2 + $n3";
echo "<br>" . $n1 = $n1 + $n2 + $n3;

die();

$number=[0,1,2,3,4,5,6,7];
// preg_match();
// preg_replace()
// preg_split()

$number = preg_grep("/[0-5]/", $number, PREG_GREP_INVERT);
var_dump($number);
echo "<hr>";
$seasons=['spring','summer','autumn','winter'];
var_dump($seasons);
echo "<br>";
$string = 'The quick Shaklespeare-\'s "Merchants"';
echo $string . "<br>";
$firstName="Ricardo";
$lastName="Ferreira";
echo  $firstName, ' '. $lastName . "<br>";


function startsWith($haystack, $needle) {
    $len = strlen($needle);
    echo $len . "<br>";
    echo substr($haystack, 0, $len) . "<br>";
    if (substr($haystack, 0) == $needle) {
        return true;
    } else {
        return false;
    }

}

var_dump(startsWith('agulha', 'agulha'));
echo "<br>";

$array=array('archi', 'euler', 'pitagoras');
array_push($array,'hypatia');
array_push($array,'fibonacci');
array_pop($array);
print_r($array);
echo "<br>";
echo array_pop($array);
echo "<br>";
print_r($array);
echo sizeof($array) . "<br>";
$arr = array(1, 2, 3, 4);
print_r($arr);
echo "<br>";

foreach ($arr as &$arr) {
    // $value = $value * 2;
    echo $arr ."<br>";
}

// print_r($arr);
echo "<hr>";
$array = array(1, 2);
foreach ($array as $value) {
    $value++;
}
print_r($array); // 1, 2 because we iterated over copy of value
echo "<br>";
foreach ($array as &$value) {
    $value++;
}
print_r($array); // 2, 3 because we iterated over references to actual values of array
echo "<br>";
$wishesarray=array(1,2);
foreach ($wishesarray as $id => $categoriy) {
    $categoriy++;
}

print_r($wishesarray); //It'll same as before..

echo "<br>";

foreach ($wishesarray as $id => &$categoriy) {
    $categoriy++;
}
print_r($wishesarray); //It'll have values all increased by one..
die();
echo "\$x <br>";
echo "Imprimindo \$x\$x <br>";
$x = 1;
$myText='The quick grey [squirrela]';
preg_match('#\[(.*?)\]#', $myText, $match);
print_r($match);
echo "<br>";
$kilometers=1;
for (;;){
    if ($kilometers > 5) {
        break;
    }else {
        echo "$kilometers kilometers -> " . $kilometers*0.62140 . "milhas. <br>";
        $kilometers+=1;
    }
}
$name="Cat";
$$name="Dog";
echo "<br> $name ";
echo "<br> $$name ";
echo "<br> $Cat ";
echo $Dog;
echo "<hr>";
$i=1;

while ($i <10) {
    echo $i++ . "<br>";
}
echo "<hr>";

if (1 == true) {
    echo '1';
}

if (1 === true) {
    echo '2';
}

if("php" == true) {
    echo '3';
}
if("php" === false) {
    echo '4';
}

$dates=['2022-05-08', '2022-10-18', '1957-10-18'];
echo "Latest Date -> " . max($dates) . "<br>";
echo "Earliest Date -> " . min($dates) . "<br>";

die();
print($x);
printf('$x');
echo "<br> $x";
$a[0] = "codecracker";
echo "<br> $a[0] <br>";
var_dump($a);
$arr = array('one' => 'fish', 'two' => 'fish', 'red' => 'fish', 'blue' => 'fish');
end($arr);
$last_key = key($arr);
echo $last_key;
echo "<hr>";
$transport = array('foot', 'bike', 'car', 'plane');
$mode = current($transport); // $mode = 'foot';
$mode = next($transport);    // $mode = 'bike';
$mode = current($transport); // $mode = 'bike';
$mode = prev($transport);    // $mode = 'foot';
$mode = end($transport);     // $mode = 'plane';
$mode = current($transport); // $mode = 'plane';

$arr = array(1,2,3,4,5);
var_dump(current($arr)); // bool(false)

$arr = array(array());
var_dump(current($arr)); // array(0) { }
echo "<hr>";
const PI = '3.15';
echo PI;

$services = array('http', 'ftp', 'ssh', 'telnet', 'imap',
'smtp', 'nicname', 'gopher', 'finger', 'pop3', 'www');

foreach ($services as $service) {
    $port = getservbyname($service, 'tcp');
    echo $service . ": " . $port . "<br />\n";
}
echo "<hr>";
$a = NULL;
if ($a) {
    echo "TRUE";
} else {
    echo "FALSE";
}
var_dump($a);

$b = isset($a);
echo "<br> $b <br>";
var_dump($b);
echo "<br>";


class MyClass {
    function __construct() {
        echo "Teste";
    }
}

$teste = new MyClass;
echo "<br>" . $teste . "<br>";
echo "76";
// /_  <=> '76 trombones'";_/

die();
class LeagueTable
{
    public function __construct(array $players)
    {
        $this->standings = [];
        foreach($players as $index => $p) {
            $this->standings[$p] = [
                'index'        => $index,
                'games_played' => 0,
                'score'        => 0
            ];
        }
    }

    public function recordResult(string $player, int $score) : void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank(int $rank) : string
    {

        return '';
    }
}
// $table = new LeagueTable;
$table = (new LeagueTable(array('Mike', 'Chris', 'Arnold')));
$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);

// foreach ($table as $x => $value) {
//         $x = $value . "<br>";
//    print_r($table);
   
// }
// [standings] => Array ( 
//     [Mike] => Array ( 
//         [index] => 0 
//         [games_played] => 2 
//         [score] => 5 ) 
//     [Chris] => Array ( 
//         [index] => 1 
//         [games_played] => 1 
//         [score] => 5 ) 
//     [Arnold] => Array ( 
//         [index] => 2 
//         [games_played] => 1 
//         [score] => 5 ) 
// ) 
var_export(array($table));
echo $table->playerRank(1);

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)){
    	return $object;
    }
    return array_map('objectToArray', (array) $object);
}
die();


function unique_names(array $array1, array $array2) : array
{
//   foreach($array2 as $value){
//     $array1[] = $value;
//   }
//   foreach($array2 as $value2){
//     $array3[] = $value2;
//   }
//   $joint=array_merge($array1, $array2);
//     $result = array_unique($array1);
//   return $result;

    foreach($array2 as $value){
      $array1[] = $value;
    }
    
    return $result = array_unique($array1);
  }

$testeArray = unique_names(['Ava', 'Emma', 'Olivia', 'Peter'], ['Peter', 'Ricardo','Olivia', 'Sophia', 'Emma']);
var_dump($testeArray);
function findRoots($a, $b, $c)
{
  $delta = ($b**2) - (4*$a*$c);
  $testaDelta= $delta<0 ? true : false;
  if ($testaDelta){
    return false;
  } else {
    $delta = sqrt($delta);
    $result[]=(-$b + $delta)/(2*$a);
    $result[]=(-$b - $delta)/(2*$a);
  }
  return $result;
}

echo "<hr>";
echo "Raizes da Equacao" . "<br>";
var_dump(findRoots(2,10,8));
die();
$name ="<div>Ricardo</div>";
echo $sanitizedName = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS) ."<br>";
$seedBagsNeeded =5;
var_dump($seedBagsNeeded);
echo "<hr>";
echo $filteredBagsNeeded = filter_var($seedBagsNeeded, FILTER_VALIDATE_INT) ."<br>";
echo "<hr>";
var_dump($filteredBagsNeeded);
echo "<hr>";

echo $filteredBagsNeeded+=1;
?>

<p><?php echo $sanitizedName; ?></p>
<!-- 
class TextInput
{
    function add($text) {
        $acumulador[] = $text;
        // $len = sizeof($acumulador);
        foreach ($acumulador as $value) {
            return $value;
        }
    }
    
    function getValue() {

        $resultado = 'a';
        
        return $resultado;
    }
}
$a = new TextInput();

echo $b = $a->add('1');
echo $b = $a->add('2');
echo "<hr>";

function groupByOwners(array $files)
{
    return array_flip($files);
}

$files = array
(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
var_dump(groupByOwners($files));
die();
class Problem
{
    public static function average($a, $b)
    {
        return ($a + $b) / 2;
    }
}

echo Problem::average(2, 1);
echo "<hr>";


$enderecoIpPortador = "189.89.13.14";
$localizacaoPortador =  json_decode((file_get_contents("https://ipinfo.io/$enderecoIpPortador?token=82279d01cc4f82")), true);
var_dump($localizacaoPortador);
echo "<br>";
var_dump($_SERVER);
echo "<br>";
// $enderecoIpPortadorCartao = $_SERVER['HTTP_X_FORWARDED_FOR'];
$enderecoIpPortadorCartao = getenv('REMOTE_ADDR');
echo "Endereco IP do Portador -> " . $enderecoIpPortadorCartao;
echo "<br>";

$a1=array("a"=>"red","b"=>"green");
$a2=array("a"=>"orange","burgundy");
$a3=(array_replace($a1,$a2));
var_dump($a3);

die();

// function groupByOwners(array $files) : array
// {
  
//   $retorno = array_flip($files);
// //   (
// //   "Randy" => array("Input.txt", "Output.txt"),
// //   "Stan" => "Code.py"
// // );
//    return $retorno;     
// }
// $files = array
// (
//     "Input.txt" => "Randy",
//     "Code.py" => "Stan",
//     "Output.txt" => "Randy"
// );


// print_r(groupByOwners($files));
die();
$request[] = TRUE;
var_dump($request);
echo "<hr>";
$result = "[30001] Estouro de tempo de espera por uma resposta";
if ($result === "[30001] Estouro de tempo de espera por uma resposta") {
    $result = '{ "mensagem" : "[30001] Estouro de tempo de espera por uma resposta"}';
    $responseAPI = json_decode($result, TRUE);
    print_r($responseAPI);
    echo "<hr>";

}
var_dump($responseAPI);

echo "<br>" . "Resposta Mensagem Se é Array -> " . is_array($responseAPI). "<br>";

$search_array=$responseAPI;

// returns false
echo "<hr>";

var_dump($msg = isset($search_array['mensagem']));
echo "<hr>";

// returns true
var_dump($msg=array_key_exists('mensagem',$search_array));

if($requisitaExtratoAPI = curl_init()) { 

    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_URL, $url);
    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_CUSTOMREQUEST, 'GET');
    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_RETURNTRANSFER, TRUE);
    $request[]= curl_setopt($requisitaExtratoAPI, CURLINFO_HEADER_OUT, TRUE);
    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_VERBOSE, TRUE);
    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_TIMEOUT, 30);
    $request[]= curl_setopt($requisitaExtratoAPI, CURLOPT_HTTPHEADER, array(
        "Accept: application/json",
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: pt-BR",
        "Accept-Charset: utf-8",      
        "Authorization: Bearer " . $clientIdBase64API,
        "Connection: Keep-Alive",
        "Content-Type: application/json")
    );
    var_dump($request);

    foreach ($request as $value) {
        echo $value . "<br>";
    }

    echo  "<br>" . "Se qualquer inicialização for zero " .  array_product($request);
}

$responseAcquirer = array(
    "administradora" => "Mastercard",
    "autorizacao" => "117280",
    "data" => "06/08/2022 02:41:00.000",
    // "mensagem" => "Transacao aprovada",
    "pagamento" => "A vista",
    "parcela" => 1,
    "produto" => array(
        0 => "Credito"
    ),
    "rede" => "Userede",
    "retorno" => 1,
    "tipoCartao" => "Credito",
    "transacao" => array(
        0 => "Cartao Vender"
    ),
    "valor" => 2,
    "vencimento" => "06/09/2022 02:41:00.000",
    "nsu" => "10247",
    "estado" => "9",
    "nsuRede" => "23926675",
    "redeCnpj" => "01.425.787/0001-01",
    "cupomTef1aVia" => array(
        0 => "--------- 32.620.841/0013-21 ---------",
        1 => "",
        2 => " REDE ",
        3 => " MASTERCARD D",
        4 => "COMPR:023926675 VALOR: 2,00",
        5 => "ESTAB:017008107 A FORMULA ",
        6 => "CNPJ/CPF:32.620.841/0013-21 ",
        7 => "CIDADE-UF:SALVADOR-BA ",
        8 => "05.08.22-23:41:40 TERM:PV478213/010247",
        9 => "CARTAO: xxxx.xxxx.xxxx.4792 ",
        10 => "AUTORIZACAO: 117280 ",
        11 => " RECONHECO E PAGAREI A DIVIDA ",
        12 => " AQUI REPRESENTADA ",
        13 => "",
        14 => "",
        15 => " ____________________________ ",
        16 => " ",
        17 => " ",
        18 => " ",
        19 => "----- VSPague 212552150000083992 -----",
        20 => " "
    ),
    "cupomTef2aVia" => array(
        0 => "--------- 32.620.841/0013-21 ---------",
        1 => "",
        2 => " REDE ",
        3 => " MASTERCARD D",
        4 => "COMPR:023926675 VALOR: 2,00",
        5 => "ESTAB:017008107 A FORMULA ",
        6 => "CNPJ/CPF:32.620.841/0013-21 ",
        7 => "CIDADE-UF:SALVADOR-BA ",
        8 => "05.08.22-23:41:40 TERM:PV478213/010247",
        9 => "CARTAO: xxxx.xxxx.xxxx.4792 ",
        10 => "AUTORIZACAO: 117280 ",
        11 => " RECONHECO E PAGAREI A DIVIDA ",
        12 => " AQUI REPRESENTADA ",
        13 => "",
        14 => "",
        15 => " ____________________________ ",
        16 => " ",
        17 => " ",
        18 => " ",
        19 => "----- VSPague 212552150000083992 -----",
        20 => " "
    ),
    "cupomResumido" => array()
);
echo "<br>" . "testando resposta adquirente" . is_array($responseAcquirer);
$search_array=$responseAcquirer;

// returns false
echo "<hr>";

var_dump($msg = isset($search_array['mensagem']));
echo "<hr>";

// returns true
var_dump($msg=array_key_exists('mensagem',$search_array));
// die();

$mensagensAdquirentes = [
    "AO AUTORIZADO",
    "AO AUTORIZADA",
    "NAO AUTORIZADO",
    "NAO AUTORIZADA",
    "Nao Autorizada",
    "Nao Autorizado",
    "Nao autorizada",
    "Nao autorizado",
    "Nao Aprovada",
    "Nao Aprovado",
    "Transacao Negada",
    "Transacao Negado",
    "Transacao Não Autorizada",
    "Transacao Não Aprovada",
    "ransacao Negada",
    "ransacao Negado",
    "ransacao Não Autorizada",
    "ransacao Não Aprovada",
    "ransacao Aprovada",
    "Transacao Aprovada",
    "Transacao aprovada",
    "TRANSACAO APROVADA",
    "TRANSACAO AUTORIZADA",
    "transacao aprovada",
    "transacao autorizada",
    "Transacao Autorizada",
    "AUTORIZADO",
    "AUTORIZADA",
    "Autorizada",
    "Autorizado",
    "APROVADA",
    "APROVADO",
    "Aprovada",
    "Aprovado",
    "Aprovada 1234567",
    "Aprovado 9876543",
    "[30001] Estouro de tempo de espera por uma resposta"
];
$validaArray = is_array($mensagensAdquirentes);
var_dump($validaArray);
echo "<hr>";
if ($validaArray) {

    foreach ($mensagensAdquirentes as $value) {
        $respostaAPI['mensagem'] = $value;



        // $respostaAPI = array(
        // 'mensagem' => 'Nao autorizada'
        // );
        switch ($respostaAPI['mensagem']) {

            // case (preg_match('/(\bTransacao)\([aA]provada\b)/',      $respostaAPI['mensagem']) ? true : false): //Userede
            // case (preg_match('/(\bTransacao)\([aA]provada\b)/',      $respostaAPI['mensagem']) ? true : false): //Userede
            case (preg_match('/(\b^[tT]ransacao)\ ([aA]provada\b)/',   $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^[tT]ransacao)\ ([aA]utorizada\b)/', $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^[aA]utorizad[oa]\b)/',              $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^[aA]provad[oa]\b)/',                $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^TRANSACAO)\ (APROVADA\b)/',         $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^TRANSACAO)\ (AUTORIZADA\b)/',       $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^AUTORIZAD[OA]\b)/',                 $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^APROVAD[OA]\b)/',                   $respostaAPI['mensagem']) ? true : false):

            //case (preg_match('/(\b[tTrRaAnNsSaAcCaAoO]\ [aA].*\b)/',               $respostaAPI['mensagem']) ? true : false): //Stone 
            // case (preg_match('/(\b^Transacao\ [aA]provad.*\b)/', $respostaAPI['mensagem']) ? true : false):
            // case (preg_match('/(\b[aA]provada\b)/' , $respostaAPI['mensagem']) ? true :false):
            // case (preg_match('/(\b^ransacao\ [aA].*\b)/',     $respostaAPI['mensagem']) ? true : false):  
            // case (preg_match('/(\b[aA]utorizad[oa]\b)/' , $respostaAPI['mensagem']) ? true :false):

            // case (preg_match('/(\b^TRANSACAO\ A.*\b)/',       $respostaAPI['mensagem']) ? true : false):  
            // case (preg_match('/(\b^[aA]provad[oa].*\b)/',     $respostaAPI['mensagem']) ? true : false):  
            // case (preg_match('/(\b^[aAuUtToOrRiIzZaAdDoOaA].*\b)/',   $respostaAPI['mensagem']) ? true : false):  
            // case (preg_match('/(\b^[aA]utorizad[oa].*\b)/',   $respostaAPI['mensagem']) ? true : false):
            // case (preg_match('/(\b*[rRaAnNsSaAcCaAoO]\ [aA].*\b)/',    $respostaAPI['mensagem']) ? true : false): //Stone 
            // case (preg_match('/(\b[aA].*\b)/',                       $respostaAPI['mensagem']) ? true : false): //Stone
            // case (preg_match('/(\bTransacao)\ ([aA]utorizada\b)/',   $respostaAPI['mensagem']) ? true : false): //Stone 
            // case (preg_match('/(\bTRANSACAO)\ (APROVADA\b[.]*)/',    $respostaAPI['mensagem']) ? true : false): //Userede
            // case (preg_match('/(\b^AUTORIZAD[OA]\b)/',               $respostaAPI['mensagem']) ? true : false):
            // case (preg_match('/(^AUTORIZAD[OA]\ [0-9]*)/',           $respostaAPI['mensagem']) ? true : false): //Cielo, mensagem + autorizacao
            // case (preg_match('/(^APROVAD[OA]\ [0-9]*)/',             $respostaAPI['mensagem']) ? true : false): //Cielo, mensagem + autorizacao
            // case (preg_match('/(\b^APROVAD[OA]\b)/',                 $respostaAPI['mensagem']) ? true : false): //Getnet
            // case (preg_match('/(\b^Aprovad[oOaA]\b)/',               $respostaAPI['mensagem']) ? true : false): //Stone
            // case (preg_match('/(\b^Aprovad[oOaA]\b)/',               $respostaAPI['mensagem']) ? true : false): //Stone
            // case (preg_match('/(\b^Autorizad[oOaA]\b)/',             $respostaAPI['mensagem']) ? true : false): //Stone
            // case (preg_match('/(\bTRANSACAO)\ (AUTORIZADA\b)/',      $respostaAPI['mensagem']) ? true : false): //Stone
            // case (preg_match('/(\bTRANSACAO)\ (APROVADA\b)/',        $respostaAPI['mensagem']) ? true : false):

            echo $respostaAPI['mensagem'] . " ----> Resultado Aprovada OK " . "<br>";
            break;

            // case (preg_match('/(\b^.*[aAoO]\ [aA].*\b)/',      $respostaAPI['mensagem']) ? true : false) : //Userede
            case (preg_match('/(\b^[nN].*\b)/',                 $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^[tT]ransacao)\ ([nN].*\b)/', $respostaAPI['mensagem']) ? true : false):
            case (preg_match('/(\b^[rRansacao)\ ([nN].*\b)/',   $respostaAPI['mensagem']) ? true : false):
            // case (preg_match('/(\b^AO\ AUTORIZAD[OA]\b)/',      $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(\b^NAO\ AUTORIZAD[OA]\b)/',     $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(\b^.*ao)\ ([aA]utorizada\b)/',  $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(\bNao)\ ([aA]utorizada\b)/',    $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(^NAO\ AUTORIZAD[OA]\ [0-9]*)/', $respostaAPI['mensagem']) ? true : false) : //Cielo, mensagem + autorizacao
            // case (preg_match('/(^NAO\ APROVAD[OA]\ [0-9]*)/',   $respostaAPI['mensagem']) ? true : false) : //Cielo, mensagem + autorizacao
            // case (preg_match('/(\b^NAO\ APROVAD[OA]\b)/',       $respostaAPI['mensagem']) ? true : false) : //Getnet
            // case (preg_match('/(\b^Nao\ Aprovad[oOaA]\b)/',     $respostaAPI['mensagem']) ? true : false) : //Stone
            // case (preg_match('/(\b^Nao\ [aA]utorizad[oa]\b)/',  $respostaAPI['mensagem']) ? true : false) : //Stone
            // case (preg_match('/(\bNAO)\ ([aA]provada\b[.]*)/',  $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(\bNAO)\ (APROVADA\b[.]*)/',     $respostaAPI['mensagem']) ? true : false) : //Userede
            // case (preg_match('/(\bNAO)\ (AUTORIZADA\b)/',       $respostaAPI['mensagem']) ? true : false) : //Stone
            // case (preg_match('/(\bNAO)\ (APROVADA\b)/',         $respostaAPI['mensagem']) ? true : false) :
            echo $respostaAPI['mensagem'] . " ----> Resultado Negada OK" . "<br>";
            break;

            // case "[30001] Estouro de tempo de espera por uma resposta":
            // case (preg_match('/(\b^\[30001\]\ Estouro\ de\ tempo\ de\ espera\.*\b)/', $respostaAPI['mensagem']) ? true : false):



            case (preg_match('/(\bEstouro\b)/', $respostaAPI['mensagem']) ? true : false):

                // echo "TO!!!" . "Estouro de tempo!!!" . "<br>";
                header("Location: ../interface/sistemaIndisponivel.php");
                exit();
            break;
    

            default:
                echo $respostaAPI['mensagem'] . " Deu ruim!!!" . "<br>";
            break;
        };
    }
}

$validaRespostaAPI = true;
//$respostaAPI = "string";
$respostaAPI = array(
    "nome" => "Ricardo",
    "profissao" => "Engenheiro"
);

$validaRespostaAPI = is_array($respostaAPI);
if ($validaRespostaAPI) {

    echo "Menu nome é " .  $respostaAPI['nome'] . "<br>";
} else {
    echo "Nao descobri o nome";
}

print_r($validaRespostaAPI);
echo "<hr>";

$statusTransacao = "Em Processamento da Transacao";
$linkOK = 1;

if ((($statusTransacao === "Aguardando Pagamento") || ($statusTransacao === "Em Processamento da Transacao")) &&  ($linkOK)) {
    echo "<hr>" . $statusTransacao . "<hr>";
}
//die();
$usuario = $_SESSION['nUsuario'];
$senhaInicial = $_SESSION['nSenha'];
$senhaHashed = $_SESSION['nConfirmaSenha'];
if (is_null($_SESSION['nUsuario'] || $_SESSION['nSenha'])) {
    unset($_SESSION['nUsuario']);
    unset($_SESSION['nSenha']);
    unset($_SESSION['nConfirmaSenha']);
    header('location: cadastrarSenha.php');
}

echo $usuario . "<br>";
echo $senhaInicial . "<br>";
echo $senhaHashed . "<br>";
// unset($_SESSION['nUsuario']);
// unset($_SESSION['nSenha']);
// unset($_SESSION['nConfirmaSenha']);
// die();

$senha = $senhaHashed;
$ativo =  1;
// $ultimoAcesso = new DateTime();
// $txs = $ultimoAcesso->format('Y-m-d H:i:s');
// $ts=$ultimoAcesso->createFromFormat('Y-m-d H:i:s', $txs);

$ligarCentral = array(
    "Ligar para a Central do Cartao",
    "Ligar para Autorizacao",
    "LIGAR PARA A CENTRAL DO CARTAO"
);

for ($i = 0; $i < count($ligarCentral); $i++) {

    switch ($ligarCentral[$i]) {
        case (preg_match('/(\b^.*iga[aA-zZ].*\b)/', $ligarCentral[$i]) ? true : false):
        case (preg_match('/(\b^.*IGA[aA-zZ].*\b)/', $ligarCentral[$i]) ? true : false):
            echo "<hr>";
            echo $ligarCentral[$i];
            echo "<hr>";
            break;

        default:
            echo $ligarCentral[$i] . "<br>";
            break;
    }
}

$contatoCentral = array(
    "Contate a Central do Cartao",
    "CONTATE A CENTRAL DO CARTAO"
);

for ($i = 0; $i < count($contatoCentral); $i++) {
    switch ($contatoCentral[$i]) {
        case (preg_match('/(\b^.*onta[aA-zZ].*\b)/', $contatoCentral[$i]) ? true : false):
        case (preg_match('/(\b^.*ONTA[aA-zZ].*\b)/', $contatoCentral[$i]) ? true : false):
            echo "<hr>";
            echo $contatoCentral[$i];
            echo "<hr>";
            break;

        default:
            break;
    }
}

$contatoCentral = array(
    "VALOR INVALIDO 'Valor' deve estar entre 10.00 e 9999999999.99",
    "ALOR INVALIDO 'Valor' deve estar entre 10.00 e 9999999999.99",
    "valor invalido 'Valor' deve estar entre 10.00 e 9999999999.99",
    "Valor Invalido 'Valor' deve estar entre 10.00 e 9999999999.99"
);

for ($i = 0; $i < count($contatoCentral); $i++) {
    switch ($contatoCentral[$i]) {
        case (preg_match('/(\b^.*ALOR\ INVALIDO.*\b)/', $contatoCentral[$i]) ? true : false):
        case (preg_match('/(\b^.*[vV]alor\ [iI]nvalido.*\b)/', $contatoCentral[$i]) ? true : false):
            echo "<hr>";
            echo $contatoCentral[$i];
            echo "<hr>";
            break;

        default:
            break;
    }
}


$dataHora = date('Y-m-d H:i:s');
echo $dataHora . "<br>";
$acesso = DateTime::createFromFormat('Y-m-d H:i:s', $dataHora);
$ultimoAcesso = $acesso->format('Y-m-d H:i:s');
$id = 1;
var_dump($acesso);
echo "<hr>";
$enderecoIP = "177.177.177.177";
$dataCriacao = "2022-06-04 16:01:50";
// $criacao=$dataCriacao->format('Y-m-d H:i:s');
// var_dump($ts);
// echo "<hr>";
// var_dump($txs);
// echo "<hr>";
var_dump($dataCriacao);
echo "<hr>";

// $ultimoAcesso=DateTime::ISO8601('NOW');
// $ultimoAcesso = DateTime::createFromFormat("Y-m-d H:i:s", );
// $ts = $ultimoAcesso->createFromFormat("d/m/Y H:i:s", 'NOW');

// ::createFromFormat("d/m/Y H:i:s", $ultimoAcesso);
// echo $ts;
// $data = DateTime::createFromFormat("d/m/Y", $data);
// $data = $data->format("Y-m-d");

// echo $ultimoAcesso . "<br>";
// echo $data;
//        -- ?,?,?,?,?,?
// :usuario,
// :senha.
// :ativo,
// :ultimoAcesso,
// :enderecoIP,
// :criacao




// $dbh=$testaDB->prepare($sql);
// var_dump($dbh);


$testaDB = false;
// try {


$dadosUsuario = [
    'usuario' => $usuario,
    'senha' => $senhaHashed,
    'ativo' => $ativo,
    'ultimoacesso' => $ultimoAcesso,
    'enderecoIP' => $enderecoIP,
    'criacao' => $dataCriacao,
    // $usuario, $senhaHashed, $ativo, $ultimoAcesso, $enderecoIP, $dataCriacao
];
echo "<hr>";
var_dump($dadosUsuario);
$sql = "INSERT INTO usuario (
                usuario,
                senha,
                ativo,
                ultimoacesso,
                enderecoIP,
                criacao
                ) VALUES (    
                    :usuario,
                    :senha,
                    :ativo,
                    :ultimoacesso,
                    :enderecoIP,
                    :criacao
                )";
echo "<hr>";

echo $sql;
echo "<hr>";
$testaDB = ConectarDataBase::conectarDatabase();
$preparaSQL = $testaDB->prepare($sql);
var_dump($preparaSQL);
echo "<hr>";
echo "Testando insert...";
echo "<hr>";
$preparaSQL->execute($dadosUsuario);

// $preparaSQL->execute([$usuario,$senhaHashed, $ativo, $ultimoAcesso, $enderecoIP, $dataCriacao] );
$lastId = $testaDB->lastInsertID($name);
echo "<br>" . $lastId;

$selectSQL = "SELECT * from usuario";

$retorno = $testaDB->query($selectSQL);
echo "<hr>";
// $contagem = $retorno->
var_dump($retorno);
echo "<hr>";

$selectSQL = "SELECT count(*) as total  from usuario"; // where usuario='perpcosta'";
$retorno = $testaDB->query($selectSQL);
while ($row = $retorno->fetch()) {
    echo "Total de usuarios -> " . $row['total'] . "<br>";
};
$selectSQL = "SELECT *  from usuario";
$retorno = $testaDB->query($selectSQL)->fetchAll();
//print_r($retorno);
// foreach ($retorno as $row) {
//     echo $row['usuario'] . " ";
//     echo $row['enderecoIP'] . "<br>";
// }
echo "<hr>";


$id = 19;
$selectSQL = "SELECT * from usuario where id=:id";
$preparaSQL = $testaDB->prepare($selectSQL);
$preparaSQL->execute(['id' => $id]);
$usuario = $preparaSQL->fetch();
echo "<br>" . $usuario['usuario'];
//var_dump($usuario);
echo "<hr>";
$selectSQL = "SELECT * from estabelecimento where cnpj=:cnpj";
$cnpj = "08.865.229/0001-09";
$preparaSQL = $testaDB->prepare($selectSQL);
$preparaSQL->execute(['cnpj' => $cnpj]);
$dadosPersistidos = $preparaSQL->fetchAll();
// var_dump($dadosEC);
foreach ($dadosPersistidos as $dadosRetornados) {
    $dadosEstabelecimento = array(
        'nome' => $dadosRetornados['nome'],
        'email' => $dadosRetornados['email'],
        'whatsapp' => $dadosRetornados['whatsapp'],
        'sms' => $dadosRetornados['sms'],
        'telefone' => $dadosRetornados['telefone']
    );
}

print_r($dadosEstabelecimento);
$n = $dadosEstabelecimento['nome'];
echo "<hr>";
echo  $n;

$sqlCountId = "select count(linkID) as ultimoId from link";
$contagemId = $testaDB->query($sqlCountId);
while ($row = $contagemId->fetch()) {
    $numeroId = $row['ultimoId'] . "<br>";
};
// var_dump($contagemId);
// $numeroId=$row['ultimoId'];
// echo "<hr>";
echo "<hr>" . "Ultimo ID -> " . $numeroId . "<hr>";

$dados = array(
    'nome' => 'Sotech Pagamentos Eletricos', 'cnpj' => '08.865.229/0001-09', 'valorTransacao' => '100',
    'tipoTransacao' => 'Crédito A Vista',  'numeroParcelas' => '6', 'tipoEnvio' => 'WhatsAPP',
    'contatoEnvio' => 'suporte@sotech.com.br', 'contatoEstabelecimento' => 'suporte@sotech.com.br', 'numeroPedido' => '1234567',
    'taxaDeEntrega' => 10.00
);

$insereLink = new GeradorLink($dados);

$link = $insereLink->gerarLink();

echo "<hr>";

echo $link;

$gravaDB = $insereLink->persistirLink();
echo "<hr>";
if ($gravaDB > $numeroId) {
    echo "Sucesso na inserção" . "<br>";
    var_dump($gravaDB);
} else {
    echo "Erro ao inserir registro no banco";
}


            // foreach ($dadosEC as $dadosEstabelecimento) {
            //     echo "<hr>";
            //     echo "Nome-> "  . $dadosEstabelecimento['nome'] . "<br>";
            //     echo "Email-> " . $dadosEstabelecimento['email'] . "<br>";
            //     echo "WhatsAPP-> " . $dadosEstabelecimento['whatsapp'] . "<br>";
            //     echo "SMS-> " . $dadosEstabelecimento['sms'] . "<br>";
            //     echo "Fone-> " . $dadosEstabelecimento['telefone'] . "<br>";

            // }

                //$testaDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // foreach ($dadosUsuario as $dados) {

                // var_dump($testaDB->lastInsertId());
                // $id = $testaDB->lastInsertId()
                // } 
                // echo "<hr>";
                // print_r($dbh);
                // echo "<hr>";

            // } catch (PDOException $e) {
            //     echo "deu algum erro...." . "<br>";
            //     print $e->getMessage();
            //     $info = $dbh->errorInfo();
            //     echo $info[0] == $dbh->code;
            // }

            // if ($testaDB) {

            //     echo "Conectou...." . "<br>";
            // } else {
            //     echo "Erro....";
            // }

            // $dbh->bindParam(':usuario', $usuario);
            // $dbh->bindParam(":senha", $senhaHashed);
            // $dbh->bindParam(":ativo", $ativo);
            // $dbh->bindParam(":ultimoAcesso", $ultimoAcesso);
            // $dbh->bindParam(":enderecoIP", $enderecoIP);
            // $dbh->bindParam(":criacao", $dataCriacao);
            // 'usuario' => $usuario,
            // 'senha'=> $senhaHashed ,
            // 'ativo' => $ativo,
            // 'ultimoAcesso' => $ultimoAcesso,
            // 'enderecoIP' => $enderecoIP,
            // 'criacao' => $dataCriacao
            //var_dump($dbh);
            // echo "<hr>";
            // echo "bindParam" . "<br>";

            //$dbh->execute([
            //':usuario' => $usuario,
            //':senha'=> $senhaHashed ,
            //':ativo' => $ativo,
            //':ultimoAcesso' => $ultimoAcesso,
            //':enderecoIP' => $enderecoIP,
            //':criacao' => $dataCriacao
            //]);




            // try {
            //     $id = $testaDB->lastInsertId();
    
            //     if ($id){
            //         echo 'O id ' . $id . '  Não foi inserido';

            //     } else {
            //         echo 'O id ' . $id . ' foi inserido';
            //     }
            // } catch (Exception $e) {
            //     echo $e->getMessage();
            // }


/*function atualizarStatusTransacao($codigoLink, $linkCurto){
        $sqlTableLink = "UPDATE usario SET linkCurto = '$linkCurto' WHERE codigo = '$codigoLink'";
        $result = $this->getCon()->getConexao()->query($sqlTableLink);
        if ($result === true) {
            $this->getCon()->desconectar();
            return true;
        } else {
            $this->getCon()->desconectar();
            return false;
        }

    }

    function getCon() {
        return $this->con;
    }

    function setCon($con) {
        $this->con = $con;
    }


/*
ORA-00020: maximum number of processes (25) exceeded
Enter user-name: / as sysdba
ERROR:
ORA-00020: maximum number of processes (25) exceeded
Enter user-name: / AS SYSDBA
ERROR:
ORA-00020: maximum number of processes (25) exceeded
SP2-0157: unable to CONNECT to ORACLE after 3 attempts, exiting SQL*Plus
[oracle@CentOS5 ~]$ sqlplus -prelim / AS SYSDBA
SQL*Plus: Release 11.2.0.2.0 Production on Sun Feb 20 07:09:01 2011
Copyright (c) 1982, 2010, Oracle.  All rights reserved.
SQL> SELECT COUNT(*) FROM V$PROCESS;
SELECT COUNT(*) FROM V$PROCESS
*
ERROR at line 1:
ORA-01012: not logged on
Process ID: 0
Session ID: 0 Serial number: 0
SQL> !ps aux | grep ORCL
*/


function testaNumber($number):int {
$number-=1;
$testaNumero = $number > 0 ? true : false;
//echo $number;

if ($testaNumero) {
$a=array();
for ($number; $number>0; $number--) {

	array_push($a,$number);
    
//echo $number;
};
print_r($a);
$n = sizeof($a);
$i=0;
$j=0;
foreach ($a as $value) {
  echo "<br>";
  echo "Testa se " . $value . " é  Multiplo de 3 ";

 if (($value%3)) {
   echo "<br> $value " ."  -> Não é Multiplo de 3 ";
 } else {
 	echo "<br>" . $value . " -> É multiplo de 3!!! " . "<br>";
    $b[$i] = $value;
    //$b=array();
    //    array_push($b, $value);
    $i++;
    echo "Contador Matriz B--> " . $i . "<br>";
  
 }

 if ($value%5) {
   echo "<br> $value " ."  -> Não é Multiplo de 5 ";
 } else {
 	echo "<br>" . $value . " -> É multiplo de 5!!! " . "<br>";
    $c[$j] = $value;
    //$b=array();
//    array_push($b, $value);
    $j++;
    echo "Contador Matriz C--> " . $j . " <br>";
  
 }
    
} //eoforeach
echo "<br> Matriz B -> ";
print_r($b);
echo "<br>" . "Divisiveis por 3 -> " . sizeof($b) . " números";
echo "<br>";
echo "Matriz C -> ";
print_r($c);
echo "<br> Divisiveis por 5 -> " . sizeof($c) . " números";
echo "<br>";

$r1 = array_merge($b, $c);
echo "<br> Tamanho Matriz R1 -> " . sizeof($r1) . " números";
echo "<br>";
echo "Numeros divisiveis por 3 e 5 <br> ";
print_r($r1);
echo "<br>";
$r2 = array_unique($r1);
echo "Retira Divisores Repetidos -> "; 
echo "<br> Tamanho Matriz R2 -> " . sizeof($r2) . " números";
echo "<br>";
print_r($r2);
echo "<br>";
$soma = array_sum($r2);
echo "Soma os divisores ->   ";
print_r($r2);
return $soma;
} else {

	return 0;
    //echo "Apenas numeros positvos e maior que zero";
}


}

echo testaNumber(11);

function solution($number){
    $isValid = is_numeric($number);
    if ($isValid) {
      $number-=1;
      $spanNumber=array();
      for ($number; $number>0; $number--) {
        array_push($spanNumber,$number);
      };
      $countThree=0;
      $countFive=0;
      foreach ($spanNumber as $value) {
        if ($value%3) {
          ;           
        } else {
          $multipleThree[$countThree] = $value;
           $countThree++;
          }
        if ($value%5) {
            ;           
        } else {
            $multipleFive[$countFive] = $value;
            $countFive++;
        }
      }
      
      $multiplesThreeAndFive = array_merge($multipleThree, $multipleFive);
      $multiplesThreeAndFive = array_unique($multiplesThreeAndFive);
      $sumMultiplesThreeAndFive = array_sum($multiplesThreeAndFive);
      
      return $sumMultiplesThreeAndFive;
      
    }
      return 0;
      
    } //eof
    
    echo solution(99);
?> -->