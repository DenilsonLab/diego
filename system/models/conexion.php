<?php

class Conexion{

	static public function conectar(){
        #private $host;
        #private $dbname = 'ypsxdpcm_liga';
        #private $user = "ypsxdpcm_liga_user";
        #private $pass = 'wg%{8Eqgb2tp';
		//$link = new PDO("mysql:host=localhost;dbname=ypsxdpcm_liga","ypsxdpcm_liga_user","wg%{8Eqgb2tp");
		$link = new PDO("mysql:host=localhost;dbname=LIGA","root","");
		return $link;

	}

}