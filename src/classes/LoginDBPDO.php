<?php
/**
 * API Extrato Eletronico
 * API Extrato Eletronico v21.0A
 * @package API Extrato Eletronico
 * @see https://extratouserede.simatef.com.br
 * @author Ricardo Ferreira <rnhc1000@gmail.com>
 * @copyright 2020 - 2021 Ricardo Ferreira
 * @license Todos os direitos reservados a Sotech Pagamentos Eletronicos
 * @return True se conectado no DB, false caso contrário
 */

declare(strict_types=1);

namespace Rferreira\Misc\classes;
use DateTime;

class LoginDBPDO implements LoginDBPDOInterface
{
	private $usuario;
	private $senha;
	private $ativo;
	private $ultimoAcesso;
	private $enderecoIP;
	private $idUsuario;
	private $conn;

	public function __construct($arrayDados)
	{
		$this->conn = new ConectarDB();
		$this->setUsuario($arrayDados['usuario']);
		$this->setSenha($arrayDados['senha']);
		$this->setRemoteIP($arrayDados['REMOTE_ADDR']);
	}


	public function verificarLogado(): bool
	{
		if (!isset($_SESSION["logado"])) {
			header("Location: ../index.php");
			exit();
		}
		return true;
	}

	public function realizarLogin()
	{
		if (!$this->validarUsuario()) {
			return false;
		} else {
			session_start();
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
			$user_id = preg_replace("/[^0-9]+/", "", $this->getIdUsuario());
			$_SESSION['user_id'] = $user_id;
			$username = $this->getUsuario();
			$_SESSION['usuario'] = $username;
			$_SESSION['login_string'] = hash('SHA512',  $username . $user_browser);
			$_SESSION["logado"] = true;

			if ($this->verificarUsuarioAtivo()) {
				return true;
			} else {
				header("Location: ../interface/cadastrarSenha.php");
				exit();
			}
		}
	}

	public function validarUsuario()
	{
		
		$sqlValidaUsuario = "SELECT usuario 
							FROM usuario
							WHERE usuario = '" . $this->getUsuario() . "' 
		";
		echo $sqlValidaUsuario . "<br>";
		//$p_sql = Conexao::getInstance()->prepare($sqlValidaUsuario);
		$usuarioCadastrado = $this->getConn()->conexao->query($sqlValidaUsuario);
		if (!$usuarioCadastrado->num_rows) {
			echo "Não consegui achar usuario" . "<br>";
			return false;
		} else {
			echo "Achei o  usuario" . "<br>";
			$row = mysqli_fetch_assoc($usuarioCadastrado);
			if (!($row['usuario'] === $this->getUsuario())) {
				echo $row['usuario'];
				return false;
			} else {
				echo "Usuario ->>"  . $row['usuario'] . "<br>";
				$pwdPeppered = false;
				$check = false;
				$pwdHashed = false;
				$pepper = new GetPepPwd();
				$pep = $pepper->getPepper();
				$pwd = $this->getSenha();
				$pwdPeppered = new SetPepPwd($pwd, $pep);
				$senhaApimentada = $pwdPeppered->getSenhaPeppered();
				echo $senhaApimentada . "<br>";
				print_r($pwdPeppered);
				if (!$pwdPeppered) {
					return false;
				}
				$senhaValida = false;
				$sqlPwdHashed = "SELECT senha FROM usuario WHERE usuario = '" . $this->getUsuario() . "'";
				echo "<br>" . $sqlPwdHashed . "<br>";
				$sqlHashedPwd = $this->getConn()->conexao->query($sqlPwdHashed);
				if (!$sqlHashedPwd->num_rows) {
					echo "<br>" . "Não achei a senha no BD";
					return false;
				} else {
					echo "<br>" . "Achei a senha no BD";
					$row = mysqli_fetch_assoc($sqlHashedPwd);
					$hashSQL = $row['senha'];
					echo "<br>" . $hashSQL;
					echo "<br>" . $senhaApimentada;
					if ((password_verify($senhaApimentada, $hashSQL))) {
						$sqlControleAcesso = "SELECT idUsuario, enderecoIP FROM usuario WHERE usuario = '" . $this->getUsuario() . "'";
						echo $sqlControleAcesso . "<br>";
						$dadosUsuarioValido = $this->getConn()->conexao->query($sqlControleAcesso);
						if (!$dadosUsuarioValido->num_rows) {
							echo "Não achei os dados do usuario no BD" . "<br>";
							return false;
						} else {
							$row = mysqli_fetch_assoc($dadosUsuarioValido);
							$this->setIdUsuario($row['idUsuario']);
							$this->setEnderecoIP($row['enderecoIP']);
							$data = new DateTime();
							$ts = $data->format('Y-m-d H:i:s');
							$who = $this->getIdUsuario();
							$ipRemoto = $this->getRemoteIP();
							$auditaAcesso = "update usuario set ultimoAcesso='$ts' where idUsuario=$who";
							$dt = $this->getConn()->conexao->query($auditaAcesso);
							$auditaAcesso = "update usuario set enderecoIP ='$ipRemoto' where idUsuario=$who";
							$ipx = $this->getConn()->conexao->query($auditaAcesso);
							return true;
						}
					}
					echo "<br>" . "Senha Errada!" . "<br>";
					return false;
				}
			}
		}
	} // fim da função

	public function cadastrarSenha($senha)
	{
	}

	public function validarSenha($senha)
	{
		$pwdPeppered = false;
		$check = false;
		$pwdHashed = false;
		$pepper = new GetPepPwd();
		$pep = $pepper->getPepper();
		$pwd = $this->getSenha();
		$pwdPeppered = new SetPepPwd($pwd, $pep);
		$senhaApimentada = $pwdPeppered->getSenhaPeppered();
		if (!$pwdPeppered) {
			return false;
		}
		$senhaValida = false;
		$sqlPwdHashed = "SELECT senha FROM usuario WHERE usuario = '" . $this->getUsuario() . "'";
		$sqlHashedPwd = $this->getConn()->conexao->query($sqlPwdHashed);
		if (!$sqlHashedPwd->num_rows) {
			return false;
		} else {
			$row = mysqli_fetch_assoc($sqlHashedPwd);
			$hashSQL = $row['senha'];
			if (password_verify($senhaApimentada, $hashSQL)) {
				$sqlControleAcesso = "SELECT id, enderecoIP FROM usuario WHERE usuario = '" . $this->getUsuario() . "'";
				echo $sqlControleAcesso . "<br>";
				$dadosUsuarioValido = $this->getConn()->conexao->query($sqlControleAcesso);
				if (!$dadosUsuarioValido->num_rows) {
					return false;
				} else {
					$row = mysqli_fetch_assoc($dadosUsuarioValido);
					$this->setIdUsuario($row['idUsuario']);
					$this->setEnderecoIP($row['enderecoIP']);
					$data = new DateTime();
					$ts = $data->format('Y-m-d H:i:s');
					$who = $this->getIdUsuario();
					$ipRemoto = $this->getRemoteIP();
					$auditaAcesso = "update usuario set ultimoAcesso='$ts' where idUsuario=$who";
					$dt = $this->getConn()->conexao->query($auditaAcesso);
					$auditaAcesso = "update usuario set enderecoIP ='$ipRemoto' where idUsuario=$who";
					$ipx = $this->getConn()->conexao->query($auditaAcesso);
					return true;
				}
			}
			return false;
		}
	}



	public function verificarUsuarioAtivo()
	{
		$sqlVerificaAtivo =
			"SELECT * FROM usuario WHERE usuario = '" . $this->getUsuario() . "'";
		$resultVerificaAtivo = $this->getConn()->conexao->query($sqlVerificaAtivo);
		$row = mysqli_fetch_assoc($resultVerificaAtivo);
		if ($row['ativo']) {
			return true;
		} else {
			return false;
		}
	}



	public function realizarLogoff()
	{
		session_start();
		session_destroy();
		header("Location: ../index.php");
	}

	function getUsuario()
	{
		return $this->usuario;
	}

	function getSenha()
	{
		return $this->senha;
	}

	function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	function setSenha($senha)
	{
		$this->senha = $senha;
	}
	function getConn()
	{
		return $this->conn;
	}

	function setConn($conn)
	{
		$this->conn = $conn;
	}
	function getIdUsuario()
	{
		return $this->idUsuario;
	}

	function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	function setEnderecoIP($enderecoIP)
	{
		$this->enderecoIP = $enderecoIP;
	}

	public function setRemoteIP($remoteIP)
	{
		$this->remoteIP = $remoteIP;
	}

	public function getRemoteIP()
	{
		return $this->remoteIP;
	}


	public function setPwdHashed($pwdHashed)
	{
		$this->pwdHashed = $pwdHashed;
	}

	public function getPwdHashed()
	{
		return $this->pwdHashed;
	}
}
