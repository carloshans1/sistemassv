<!-- 	
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 21/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo navbar Inicial - PHP
-->

    <!-- Pode utilizar-se tambem navbar navbar-default"-->
    <nav class="navbar navbar-inverse"> 
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger" ></span> Gerenciamento-Solicitações</a>
        </div>
        <!-- Início organização do NAV BAR -->        
        <ul class="nav navbar-nav">
          <!-- Opção iniciar do sistema (home) <li class="active">-->
          <li><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span> Início</a></li>
          <!-- dropdown para CONSULTA-->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"> </span> Cadastro<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="_phphtml/cadastro_setor.php">Setor</a></li>
              <li><a href="_phphtml/cadastro_funcionario.php">Funcionário</a></li>
              <li><a href="_phphtml/cadastro_solicitacao.php">Solicitação</a></li>
              <?php if ($_SESSION['user_nivel'] == 7):  ?>              
                <li><a href="_phphtml/cadastro_usuario.php" >Usuario</a></li>
              <?php endif;  ?>
              <?php if ($_SESSION['user_nivel'] < 7):  ?>
                <li class="disabled"><a href="#">Usuario</a></li>
              <?php endif;  ?>
            </ul>                             
          </li>
          <!-- dropdown para CONSULTA-->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-search"></span> Consulta<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="_phphtml/consulta_setor.php">Setor</a></li>
              <li><a href="_phphtml/consulta_funcionario.php">Funcionário</a></li>
              <li><a href="_phphtml/consulta_solicitacao.php">Solicitação</a></li>
              <?php if ($_SESSION['user_nivel'] == 7):  ?>              
                <li><a href="_phphtml/consulta_usuario.php" >Usuario</a></li>
              <?php endif;  ?>
              <?php if ($_SESSION['user_nivel'] < 7):  ?>
                <li class="disabled"><a href="#">Usuario</a></li>
              <?php endif;  ?>
            </ul>                             
          </li>
          <!-- RELATORIO-->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Relatório<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Teste1</a></li>
              <li><a href="#">Teste2</a></li>
              <li><a href="#">Teste3</a></li>
            </ul>                             
          </li>                    
          <!-- AJUDA-->
          <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Ajuda</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="_phphtml/alterar_senha.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_usuario'];?> </a></li>
          <li><a href="_php/acesso/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logoff </a></li>
        </ul>
      </div>
    </nav>      

