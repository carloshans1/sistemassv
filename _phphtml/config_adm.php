<?php
  session_start();
  //if (!empty($_SESSION['verifylogin']) && $_SESSION['verifylogin'] == false) {
  //  header("Location: ../_php/acesso/logout.php"); exit; // Redireciona o visitante
  //}
?>


<!DOCTYPE html>

<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?php include("../_php/head2.php") ?>
    <title>Cadastro de Usuário</title>
    <link rel="icon" href="img/sedect.png">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media
queries -->     <!-- WARNING: Respond.js doesn't work if you view the page via
file:// -->     <!--[if lt IE 9]>       <script
src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->   

   <body style="background-color: #a897a4" >
 
       <?php include("../_php/navbar2.php"); 
             
        ?>

      <div class="container">
      
      <div class="page-header">
        <h1>Cadastro de Usuário</h1>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <form method="post" action="../_php/tb_usuario.php" id="formsetor" >

                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" required="required">
                  </div>

                  <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required="required" >
                  </div>           

                  <div class="form-group">
                    <label for="nivel">Nível de Acesso</label>
                    <select class="selectpicker form-control" name="nivel" id="nivel" required="required" > 
                            <option value="1">1 - Funcionário Comum</option>
                            <option value="2">2 - Diretor de Departamento</option>
                            <option value="3">3 - Diretor Geral</option>
                            <option value="4">4 - Administrador do Sistema</option>                                        
                    </select>
                  </div>



      </div>

      <div class="row">
         <div class="col-sm-6">
      
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required="required">
                  </div>

                  <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="text" class="form-control" name="senha" id="senha" required="required">
                  </div>

                  <div class="form-group">
                    <label for="ativo">Status da Conta</label>
                    <select class="selectpicker form-control" name="ativo" id="ativo" required="required" > 
                            <option value="1">1 - Conta Ativada</option>
                            <option value="0">0 - Conta Desativada</option>
                                   
                    </select>
                  </div>

                   <button type="submit" class="btn btn-primary pull-right"> Cadastrar</button>

                  <?php 

                  $success = isset($_GET['success']) ? $_GET['success'] : 2;
                  if ($success == 0){
                    print "<script> alert('O arquivo não pode ser gravado.');</script>\n";
                  } 
                  else if ($success == 1) {
                    print "<script> alert('O arquivo foi gravado com sucesso.');</script>\n";
                  }

                  ?>
                  
               
                </form>

              </div>
          
        </div>

      </div>

    </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
    <script src="js.js"></script>

  </body>


</html>
