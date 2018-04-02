<!-- 	
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 21/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo navbar Inicial - PHP
-->

  <!-- Pode utilizar-se tambem navbar navbar-default"-->
  <nav class="navbar navbar-inverse navbar-static-top marginBottom-0" role="navigation">
    <!--<div class="container-fluid"> -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger" ></span> Gerenciamento-Solicitações</a>
    </div>

    <!-- Início organização do NAV BAR -->        
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- Opção iniciar do sistema (home) <li class="active">-->
        <li><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

        <!-- dropdown para CADASTRO 
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"> </span> Cadastro<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="_phphtml/cadastro_setor.php">Setor</a></li>
            <li><a href="_phphtml/cadastro_funcionario.php">Funcionário</a></li>
            <li><a href="_phphtml/cadastro_solicitacao.php">Solicitação</a></li>-->
            <!--<?php //if ($_SESSION['user_nivel'] == 7):  ?>              -->
              <!--<li><a href="_phphtml/cadastro_usuario.php" >Usuario</a></li>-->
            <!--<?php //endif;  ?>-->
            <!--<?php //if ($_SESSION['user_nivel'] < 7):  ?>-->
              <!--<li class="disabled"><a href="#">Usuario</a></li>-->
            <!--<?php //endif;  ?>-->
          <!--</ul>                             
        </li>-->


        <!-- dropdown para OPERAÇÃO - com Submenu-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Operação<b class="caret"></b></a>

          <ul class="dropdown-menu">
            <li><a href="_phphtml/ope_setor.php" class="glyphicon glyphicon-tags"> Setor</a></li>
            <li><a href="_phphtml/ope_funcionario.php" class=" glyphicon glyphicon-lock"> Funcionário</a></li> 
            <li class="divider"></li>
            <li class="dropdown dropdown-submenu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-edit" ></span> Solicitação</a>
            <!-- <span class="glyphicon glyphicon-cog"></span> Solicitação <b class="caret"></b></a> -->
              <ul class="dropdown-menu">
                <li><a href="_phphtml/ope_sol_aberta.php"><span class="glyphicon glyphicon-hand-right" style="color: green;"></span> Solicitações Abertas</a></li>
                <li><a href="_phphtml/ope_sol_concluido.php"><span class="glyphicon glyphicon-thumbs-up" style="color: blue;"></span> Solicitações Concluidas</a></li>
                <li><a href="_phphtml/ope_sol_cancelado.php"><span class="glyphicon glyphicon-thumbs-down" style="color: red; "></span> Solicitações Canceladas</a></li>
                <li><a href="_phphtml/ope_solicitacao.php"><span class="glyphicon glyphicon-cog" style="color: #D2691E;"></span> Todas Solicitações</a></li>
              </ul>
            </li> 
            
            <?php if ($_SESSION['user_nivel'] == 7):  ?>              
              <li><a href="_phphtml/ope_usuario.php" class="glyphicon glyphicon-user"> Usuario</a></li>
            <?php endif;  ?>

            <?php if ($_SESSION['user_nivel'] < 7):  ?>
              <li class="disabled"><a href="#" class="glyphicon glyphicon-user"> Usuario</a></li>
            <?php endif;  ?>
          </ul>                             
        </li>

        <!-- dropdown para RELATORIO com submenu -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Relatório<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Dropdown Link 1</a></li>
            <li><a href="#"> Dropdown Link 2</a></li>
            <li><a href="#"> Dropdown Link 3</a></li>
            <li class="divider"></li>                
            <li class="dropdown dropdown-submenu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown Link 4</a>
              <ul class="dropdown-menu">
                <li><a href="#"> Dropdown Submenu Link 4.1</a></li>
                <li><a href="#"> Dropdown Submenu Link 4.2</a></li>
                <li><a href="#"> Dropdown Submenu Link 4.3</a></li>
                <li><a href="#"> Dropdown Submenu Link 4.4</a></li>
              </ul>
            </li>

            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown Link 5</a>
              <ul class="dropdown-menu">
                <li><a href="#"> Dropdown Submenu Link 5.1</a></li>
                <li><a href="#"> Dropdown Submenu Link 5.2</a></li>
                <li><a href="#"> Dropdown Submenu Link 5.3</a></li>
                <li class="divider"></li>
                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown Submenu Link 5.4</a>
                  <ul class="dropdown-menu">
                    <li><a href="#"> Dropdown Submenu Link 5.4.1</a></li>
                    <li><a href="#"> Dropdown Submenu Link 5.4.2</a></li>
                    <li class="divider"></li>
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown Submenu Link 5.4.3</a>
                      <ul class="dropdown-menu">
                        <li><a href="#"> Dropdown Submenu Link 5.4.3.1</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.3.2</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.3.3</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.3.4</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Dropdown Submenu Link 5.4.4</a>
                      <ul class="dropdown-menu">
                        <li><a href="#"> Dropdown Submenu Link 5.4.4.1</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.4.2</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.4.3</a></li>
                        <li><a href="#"> Dropdown Submenu Link 5.4.4.4</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>               
            </li>
          </ul>   
        </li>

        <!-- AJUDA-->
        <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Ajuda</a></li>        

        <!-- Lateral direita do navbar (class= nav navbar-nav navbar-right) -->
          <li><a href="_phphtml/alterar_senha.php"><span class="glyphicon glyphicon-user" style="color: #008000;"></span> <?php echo $_SESSION['user_usuario'];?> </a></li>
          <li><a href="_php/acesso/logout.php"><span class="glyphicon glyphicon-log-in"> </span> Logoff</a></li>

      </ul>     
      
    </div>  <!-- /.navbar-collapse -->
  </nav>      
  
  <?php include("_php/dropdown_javascript.php") ?>
