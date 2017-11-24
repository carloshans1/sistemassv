<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_setor - php (inserir no banco de dados)
-->

    <?php
      try {
        require_once('db.php');

        $objDb = new db();
        $PDO = $objDb->conecta_mysql();

        $sql = "SELECT 
          depto, sigla, endereco, bairro, telefone, email, id_referencia, observacao  from tb_setor";
        $stmt = $PDO->query( $sql );
        echo json_encode($stmt->fetchAll(PDO::FETCH_OBJ));      
      }
      catch ( PDOException $e ) {
          echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();       
      }
    ?>
