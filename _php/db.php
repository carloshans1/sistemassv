<!-- 	
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 07/06/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo db - php (Faz conexao com o banco de dados)
 -->
<?php
	class db{
		private $host=  "10.171.2.18";
		private $usuario="root";
		private $password= "mcmoraisze";
		private $dbname="homolog";
		public function conecta_mysql() {
			try	{
				$conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->usuario, $this->password);
				 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch ( PDOException $e ) {
			    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();		    
			}
			$conn->exec("set names utf8");
			return $conn;
		}
	}
?>	








