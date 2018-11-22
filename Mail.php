<?php

header("Content-Type: text/plain");


class vMail
{
	protected $toMail;
	protected $subject = '[Contato do Site] Seu site';
	protected $fromMail;
	protected $message;
	protected $data_post;
	protected $headers;

	function __construct(){

	}
	public function post($array){

		$this->data_post = $array;
		
		if(!isset($_POST) || empty($_POST) || is_null($_POST)){

			exit('Impossivel completar a ação');

		}else{

			$keys = array_keys($_POST);

			$msg ='';

			foreach($_POST as $keys => $values){

				$msg .= "".$keys . ": " .$values ."\n";
			}
		}

		$this->message($msg);

	}
	public function subject(){
		
		$this->subject = '[Contato Site]'. $this->subject;
	}
	public function from($from){
		
		return $this->from = $from;
	}
	public function to($to){

		return $this->to = $to;
	}
	private function message($message){
		
		return $this->message = $message;
	}
	private function set_headers(){

		$this->headers = "MIME-Version: 1.1\r\n";
		$this->headers .= "Content-type: text/plain; charset=iso-8859-1\n";
		$this->headers .= "Content-type: text/plain; charset=utf-8\n";

		$this->headers .= "From:".$this->from."\r\n";
		$this->headers .= "Return-Path:".$this->from."\r\n";

		return $this->headers;
	}

	public function send(){

		$this->set_headers();
		
		$send = mail($this->to, $this->subject, $this->message, $this->headers);

		if(!$send){

			die('Mensagem não pode ser enviada, entre em contato com o administrador.');
		}else{

			exit('Mensagem Enviada com Sucesso!!');
		}
	}
}



$mail = new vMail();
$mail->post($_POST);
$mail->from('contato@seudominio.com.br');
$mail->to('contato@seudominio.com.br');
$mail->send();
