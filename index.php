<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Apoio: Mauricio - Estagiario de programação 
 * Data Criação: 22/07/2017
 * Data de Modificação: 22/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo index - php (controle de acesso ao sistema (login))
-->

<?php session_start(); // inicia session ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
		<meta charset="UTF-8">
    <title>Acesso ao Sistema</title>
    <link rel="stylesheet" href="_css/style.css">
    <link rel="stylesheet" href="_css/estilo.css">
	</head>
	<body>        
		<div class="login-wrap">
			<div class="login-html">
				<h3 style="text-align: center; margin-top: -60px;"> Sistema solicitações de serviços </h3><br/>
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
				<label for="tab-1" class="tab cursormousemao">Acesso</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up">
				<label for="tab-2" class="tab cursormousemao">Cadastrar</label>
				<div class="login-form">
					
					<div class="sign-in-htm">						
						<form method="post" action="_php/acesso/validacao.php" id="formacesso" autocomplete="off">
							<div class="group">
								<label for="usuario" class="label">Nome Usuario</label>
								<input type="text" name="usuario" id="usuario" class="input">
							</div>
							<div class="group">
								<label for="senha" class="label">Senha</label>
								<input type="password" name="senha" id="senha" class="input" data-type="password">
							</div>
							<div class="group">
	          		  <input type="submit" class="button" value="Login">
              </div>
						</form>

						<div class="hr" style="margin-top: 50px;"></div>
						<div class="foot-lnk">
							<div class="group">
								<label for="senhanova" class="label">Para alterar a senha deverá clicar no usuario após acessar o sistema</label>
							</div>
						</div>

            <!-- Verifica se o usuario preencheu corretamente os dados -->
            <div>
            	<?php if (!empty($_SESSION['erroacesso'])):  ?>              
              	<p id="sombraletraerro"> <?php echo $_SESSION['erroacesso']; ?> </p>    	
              <?php endif;  ?>
            </div>						
					</div>

					<div class="sign-up-htm">
						<form>
							<div class="group">
								<label for="usuario" class="label">Nome Usuario</label>
								<input id="usuario" name="usuario" type="text" class="input">
							</div>
							<div class="group">
								<label for="senha" class="label">Senha</label>
								<input id="senha" name="senha" type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="cosenha" class="label">Confirmar Senha</label>
								<input id="cosenha" name="cosenha" type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="email" class="label">Email</label>
								<input id="email" name="email" type="text" class="input">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Solicitar Acesso">
							</div>
						</form>
						<div class="hr"></div>
						<div class="foot-lnk">
							<p>Solicitar acesso ao administrador-sistema</p>
						</div>						
					</div>
				</div>			
			</div>			
		</div>
	</body>
</html>