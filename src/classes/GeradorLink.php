<?php declare(strict_types=1);

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

namespace Rferreira\Misc\classes;

use Rferreira\Misc\classes\ConectarDataBase;
use PDOException;
use PDOStatement;
use DateTime;
use DateTimeZone;

ini_set('display_errors', 1);

final class GeradorLink 
{

    public object $conectaDB;

    public function __construct($dados)
    { 
        $this->setRazaoSocial($dados['nome']);
        $this->setCnpj($dados['cnpj']);
        $this->setValorTransacao($dados['valorTransacao']);
        $this->setTipoTransacao($dados['tipoTransacao']);
        $this->setQtdParcelas($dados['numeroParcelas']);
        $this->setTipoEnvio($dados['tipoEnvio']);
        $this->setContatoEnvio($dados['contatoEnvio']);
        $this->setContatoEstabelecimento($dados['contatoEstabelecimento']);
        $this->setNumeroPedido($dados['numeroPedido']);
        $this->setTaxaDeEntrega($dados['taxaDeEntrega']);
        $this->setTimeZone('America/Sao_Paulo');
        $this->setDataLink(date('Y-m-d H:i:s'));
        $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''), new DateTimeZone('America/Sao_Paulo'));
        $caracteresARemover = array(".", "/", "-", " ", ":");
        $this->setCodigoLink(str_replace($caracteresARemover, "", $now->format('Y.m.d H:i:s:u')));
        $this->setDataGeracaoLink(date('d.m.Y H:i:s'));
        $this->setDataTransacao(date('Y.m.d'));
        $this->setHoraTransacao(date('H:i:s'));
        $this->setLinkCurto('https://bitly.simatefPAY');
        $this->setQtdTransacao(0);
        $this->setStatusTransacao("Aguardando Pagamento");
        $this->setSituacaoLink("Pendente");
        $this->setUserAgentCliente("Mozilla X11 Chrome Safari");
        $this->setEnderecoIPCliente("127.0.0.1");
        $this->setPortaIPCliente("65536");
        $this->setLatitudeCliente("00.00.00.00");
        $this->setLongitudeCliente("00.00.00.00");
        $this->setHostnameCliente("Endereco IP Reverso do Cliente");
        $this->setCidadeCliente("Salvador");
        $this->setEstadoCliente("Bahia");
        $this->setPaisCliente("Brasil");
        $this->setCepCliente("00000-000");
        $this->setIspCliente("AS 0.0.0.0 - Provedor Internet do Cliente");
        $this->setTimeZoneCliente("America/Sao_Paulo");
        $this->setLinkOK(1);
        $this->setVidaUtilURL(864000);
        $this->setURLPortadorCartao("https://pay.simatef.com.br/...");
        $this->setNomePortadorCartao("Cliente simatefPAG");
        $this->setCpfPortadorCartao("000.000.000-00");
        $this->setFonePortadorCartao("XX-YYYY-ZZZZ");
        $this->setRedeAdquirente("simatefPAY");
        $this->setBandeiraCartao("-");
        $this->setDadosLink($dadosLink = array(
            'nome'=>$this->getRazaoSocial(),
            'cnpj'=>$this->getCnpj(),
            'valorTransacao'=>$this->getValorTransacao(),
            'tipoTransacao'=>$this->getTipoTransacao(),
            'tipoEnvio'=>$this->getTipoEnvio(),
            'numeroParcelas'=>$this->getQtdParcelas(),
            'contatoEstabelecimento'=>$this->getContatoEstabelecimento(),
            'contatoEnvio'=>$this->getContatoEnvio(),
            'codigoLink'=>$this->getCodigoLink(),
            'dataGeracaoLink'=>$this->getDataGeracaoLink(),
            'numeroPedido'=>$this->getNumeroPedido(),
            'taxaDeEntrega'=>$this->getTaxaDeEntrega(),
            'urlLifeTime'=>$this->getVidaUtilURL()
        ));
    }

    public function gerarLink() :string
    {
        $time = 'America/Sao_Paulo';
        $this->setTimeZone($time);
        $str = http_build_query($this->getDadosLink());
        $strfinal = urldecode($str);
        $link = "http://localhost:8757/simatefPAG/index.php?" . $strfinal . "";
        $hashLink = hash('sha256', $link);
        $this->setHashLink($hashLink);
        $this->setLink($link);
        return $link;
    }

    public function persistirLink(): int
    {
        $dadosQuery = array(
            'codigo' => $this->getCodigoLink(),                     'cnpjEstabelecimento' => $this->getCnpj(),
            'dataGerado' => $this->getDataLink(),                   'contatoEnvio' => $this->getContatoEnvio(),
            'valor' => $this->getValorTransacao(),                  'qtdProcessado' => $this->getQtdTransacao(),
            'statusTransacao' => $this->getStatusTransacao(),       'statusLink' => $this->getSituacaoLink(),         
            'link' => $this->getLink(),                             'contatoEstabelecimento' => $this->getContatoEstabelecimento(),  
            'enderecoIPCliente' => $this->getEnderecoIPCliente(),   'dataProcessado' => $this->getDataLink(),          
            'tipoTransacao' => $this->getTipoTransacao(),           'numeroParcelas' => $this->getQtdParcelas(),   
            'linkCurto' => $this->getLinkCurto(),                   'userAgent' => $this->getUserAgentCliente(),            
            'portaRemota' => $this->getPortaIPCliente(),            'horaTransacao' => $this->getHoraTransacao(),   
            'dataTransacao' => $this->getDataTransacao(),           'numeroPedido' => $this->getNumeroPedido(),            
            'latitudeCliente' => $this->getLatitudeCliente(),       'longitudeCliente' => $this->getLongitudeCliente(),
            'hostnameCliente' => $this->getHostnameCliente(),       'cidadeCliente' => $this->getCidadeCliente(),          
            'estadoCliente' => $this->getEstadoCliente(),           'paisCliente' => $this->getPaisCliente(),
            'cepCliente' => $this->getCepCliente(),                 'ispCliente' => $this->getIspCliente(),                 
            'timeZoneCliente' => $this->getTimeZoneCliente(),       'hashLink' => $this->getHashLink(), 
            'linkOK' => $this->getLinkOK(),                         'taxaDeEntrega' => $this->getTaxaDeEntrega(),        
            'urlLifeTime' => $this->getVidaUtilURL(),               'urlPortadorCartao' => $this->getURLPortadorCartao(), 
            'nomePortadorCartao' => $this->getNomePortadorCartao(), 'cpfPortadorCartao' => $this->getCpfPortadorCartao(),   
            'fonePortadorCartao' => $this->getFonePortadorCartao(), 'redeAdquirente' => $this->getRedeAdquirente(), 
            'bandeiraCartao' => $this->getBandeiraCartao()
        ); 
        echo "</br>" . "DadosQuery";
        echo "<hr>";
        print_r($dadosQuery);
        echo "<hr>";

        $sqlLink="INSERT INTO link ( 
            codigo,             cnpjEstabelecimento,    dataGerado,         contatoEnvio, 
            valor,              qtdProcessado,          statusTransacao,    statusLink, 
            link,               contatoEstabelecimento, enderecoIPCliente,  dataProcessado, 
            tipoTransacao,      numeroParcelas,         linkCurto,          userAgent, 
            portaRemota,        horaTransacao,          dataTransacao,      numeroPedido,
            latitudeCliente,    longitudeCliente,       hostnameCliente,    cidadeCliente,
            estadoCliente,      paisCliente,            cepCliente,         ispCliente, 
            timeZoneCliente,    hashLink,               linkOK,             taxaDeEntrega,       
            urlLifeTime,        urlPortadorCartao,      nomePortadorCartao, cpfPortadorCartao, 
            fonePortadorCartao, redeAdquirente,         bandeiraCartao
            ) 
            VALUES (
            :codigo,             :cnpjEstabelecimento,    :dataGerado,         :contatoEnvio,
            :valor,              :qtdProcessado,          :statusTransacao,    :statusLink, 
            :link,               :contatoEstabelecimento, :enderecoIPCliente,  :dataProcessado, 
            :tipoTransacao,      :numeroParcelas,         :linkCurto,          :userAgent, 
            :portaRemota,        :horaTransacao,          :dataTransacao,      :numeroPedido,
            :latitudeCliente,    :longitudeCliente,       :hostnameCliente,    :cidadeCliente,
            :estadoCliente,      :paisCliente,            :cepCliente,         :ispCliente, 
            :timeZoneCliente,    :hashLink,               :linkOK,             :taxaDeEntrega, 
            :urlLifeTime,        :urlPortadorCartao,      :nomePortadorCartao, :cpfPortadorCartao, 
            :fonePortadorCartao, :redeAdquirente,         :bandeiraCartao
            )";


        try {
            $conectaDB = ConectarDataBase::conectarDatabase();
            $preparaSQL=$conectaDB->prepare($sqlLink);
            try {
                $conectaDB->beginTransaction();
                $preparaSQL->execute($dadosQuery);
                $preparaSQL->debugDumpParams();
                $lastId = $conectaDB->lastInsertID();
                $conectaDB->commit();
                return $lastId;
            } catch (PDOException $e) {
                $conectaDB->rollback();
                print "Erro na Query Insert!: " . $e->getMessage() . "</br>";
                $info = $conectaDB->errorInfo();
                echo $info[0] == $conectaDB->code;
                return 0;
            }
        } catch (PDOException $e) {
            print "Erro no Prepare !: " . $e->getMessage() . "</br>";
            $info = $conectaDB->errorInfo();
            echo $info[0] == $conectaDB->code;
            return 0;
        };
    }    
    
    public function getValorTransacao()
    {
        return $this->valorTransacao;
    }

    public function getTipoTransacao()
    {
        return $this->tipoTransacao;
    }

    public function getQtdParcelas()
    {
        return $this->numeroParcelas;
    }

    public function getTipoEnvio()
    {
        return $this->tipoEnvio;
    }

    public function setValorTransacao($valorTransacao)
    {
        $this->valorTransacao = $valorTransacao;
    }

    public function setTipoTransacao($tipoTransacao)
    {
        $this->tipoTransacao = $tipoTransacao;
    }

    public function setQtdParcelas($numeroParcelas)
    {
        $this->numeroParcelas = $numeroParcelas;
    }

    public function setTipoEnvio($tipoEnvio)
    {
        $this->tipoEnvio = $tipoEnvio;
    }

    public function getDadosLink()
    {
        return $this->dadosLink;
    }

    public function setDadosLink($dadosLink)
    {
        $this->dadosLink = $dadosLink;
    }

    public function getQtdTransacao()
    {
        return $this->qtdProcessado;
    }

    public function setQtdTransacao($qtdProcessado)
    {
        $this->qtdProcessado = $qtdProcessado;
    }

    public function getSituacaoLink()
    {
        return $this->situacaoLink;
    }

    public function setSituacaoLink($situacaoLink)
    {
        $this->situacaoLink = $situacaoLink;
    }

    public function getStatusTransacao()
    {
        return $this->statusTransacao;
    }

    public function setStatusTransacao($statusTransacao)
    {
        $this->statusTransacao = $statusTransacao;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
    }

    public function getLinkCurto()
    {
        return $this->linkCurto;
    }

    public function setLinkCurto($linkCurto)
    {
        $this->linkCurto = $linkCurto;
    }

    public function setHashLink($hashLink)
    {
        $this->hashLink = $hashLink;
    }

    public function getHashLink()
    {
        return $this->hashLink;
    }

    public function setDataGeracaoLink($dataGeracaoLink)
    {
        $this->dataGeracaoLink = $dataGeracaoLink;
    }

    public function getDataGeracaoLink()
    {
        return $this->dataGeracaoLink;
    }

    public function setDataTransacao($dataTransacao)
    {
        $this->dataTransacao = $dataTransacao;
    }

    public function getDataTransacao()
    {
        return $this->dataTransacao;
    }

    public function setHoraTransacao($horaTransacao)
    {
        $this->horaTransacao = $horaTransacao;
    }

    public function getHoraTransacao()
    {
        return $this->horaTransacao;
    }

    public function setNumeroPedido($numeroPedido)
    {
        $this->numeroPedido = $numeroPedido;
    }

    public function getNumeroPedido()
    {
        return $this->numeroPedido;
    }

    public function getContatoEnvio()
    {
        return $this->contatoEnvio;
    }

    public function setContatoEnvio($contatoEnvio)
    {
        $this->contatoEnvio = $contatoEnvio;
    }
    public function getContatoEstabelecimento()
    {
        return $this->contatoEstabelecimento;
    }

    public function setContatoEstabelecimento($contatoEstabelecimento)
    {
        $this->contatoEstabelecimento = $contatoEstabelecimento;
    }

    public function getCodigoLink()
    {
        return $this->codigoLink;
    }

    public function setCodigoLink($codigoLink)
    {
        $this->codigoLink = $codigoLink;
    }

    public function getLinkOK()
    {
        return $this->linkOK;
    }

    public function setLinkOK($linkOK)
    {
        $this->linkOK = $linkOK;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conectaDB)
    {
        $this->conn = $conectaDB;
    }

    public function getDataLink()
    {
        return $this->dataLink;
    }

    public function setDataLink($dataLink)
    {
        $this->dataLink = $dataLink;
    }

    public function setEnderecoIPCliente($enderecoIPCliente)
    {
        $this->enderecoIPCliente = $enderecoIPCliente;
    }

    public function getEnderecoIPCliente()
    {
        return $this->enderecoIPCliente;
    }

    public function setPortaIPCliente($portaIPCliente)
    {
        $this->portaIPCliente = $portaIPCliente;
    }

    public function getPortaIPCliente()
    {
        return $this->portaIPCliente;
    }

    public function setLatitudeCliente($latitudeCliente)
    {
        $this->latitudeCliente = $latitudeCliente;
    }

    public function getLatitudeCliente()
    {
        return $this->latitudeCliente;
    }

    public function setLongitudeCliente($longitudeCliente)
    {
        $this->longitudeCliente = $longitudeCliente;
    }

    public function getLongitudeCliente()
    {
        return $this->longitudeCliente;
    }

    public function setHostnameCliente($hostnameCliente)
    {
        $this->hostnameCliente = $hostnameCliente;
    }

    public function getHostnameCliente()
    {
        return $this->hostnameCliente;
    }

    public function setCidadeCliente($cidadeCliente)
    {
        $this->cidadeCliente = $cidadeCliente;
    }

    public function getCidadeCliente()
    {
        return $this->cidadeCliente;
    }

    public function setEstadoCliente($estadoCliente)
    {
        $this->estadoCliente = $estadoCliente;
    }

    public function getEstadoCliente()
    {
        return $this->estadoCliente;
    }

    public function setPaisCliente($paisCliente)
    {
        $this->paisCliente = $paisCliente;
    }

    public function getPaisCliente()
    {
        return $this->paisCliente;
    }

    public function setCepCliente($cepCliente)
    {
        $this->cepCliente = $cepCliente;
    }

    public function getCepCliente()
    {
        return $this->cepCliente;
    }

    public function setIspCliente($ispCliente)
    {
        $this->ispCliente = $ispCliente;
    }

    public function getIspCliente()
    {
        return $this->ispCliente;
    }

    public function setTimeZoneCliente($timeZoneCliente)
    {
        $this->timeZoneCliente = $timeZoneCliente;
    }

    public function getTimeZoneCliente()
    {
        return $this->timeZoneCliente;
    }

    public function setUserAgentCliente($userAgentCliente)
    {
        $this->userAgentCliente = $userAgentCliente;
    }

    public function getUserAgentCliente()
    {
        return $this->userAgentCliente;
    }

    public function setTaxaDeEntrega($taxaDeEntrega)
    {
        $this->taxaDeEntrega = $taxaDeEntrega;
    }

    public function getTaxaDeEntrega()
    {
        return $this->taxaDeEntrega;
    }

    public function setVidaUtilURL($vidaUtilURL)
    {
        $this->vidaUtilURL = $vidaUtilURL;
    }

    public function getVidaUtilURL()
    {
        return $this->vidaUtilURL;
    }

    public function setNomePortadorCartao($nomePortadorCartao)
    {
        $this->nomePortadorCartao = $nomePortadorCartao;
    }

    public function getNomePortadorCartao()
    {
        return $this->nomePortadorCartao;
    }

    public function setCpfPortadorCartao($cpfPortadorCartao)
    {
        $this->cpfPortadorCartao = $cpfPortadorCartao;
    }

    public function getCpfPortadorCartao()
    {
        return $this->cpfPortadorCartao;
    }

    public function setFonePortadorCartao($fonePortadorCartao)
    {
        $this->fonePortadorCartao = $fonePortadorCartao;
    }

    public function getFonePortadorCartao()
    {
        return $this->fonePortadorCartao;
    }

    public function setURLPortadorCartao($urlPortadorCartao)
    {
        $this->urlPortadorCartao = $urlPortadorCartao;
    }

    public function getURLPortadorCartao()
    {
        return $this->urlPortadorCartao;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    public function setRedeAdquirente($redeAdquirente)
    {
        $this->redeAdquirente = $redeAdquirente;
    }

    public function getRedeAdquirente()
    {
        return $this->redeAdquirente;
    }

    public function setBandeiraCartao($bandeiraCartao)
    {
        $this->bandeiraCartao = $bandeiraCartao;
    }

    public function getBandeiraCartao()
    {
        return $this->bandeiraCartao;
    }
}
