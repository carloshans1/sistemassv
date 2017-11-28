<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastrar solicitações</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>
  <body id="corfundo">
    <header>
      <nav class="navbar navbar-inverse navbar-static-top marginBottom-0" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" target="_blank">NewWindow</a>
        </div>
          
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Active Link</a></li>
            <li><a href="#">Link</a></li>
           	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Dropdown Link 1</a></li>
                <li><a href="#">Dropdown Link 2</a></li>
                <li><a href="#">Dropdown Link 3</a></li>
                <li class="divider"></li>                
                <li class="dropdown dropdown-submenu">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
									<ul class="dropdown-menu">
										<li><a href="#">Dropdown Submenu Link 4.1</a></li>
										<li><a href="#">Dropdown Submenu Link 4.2</a></li>
										<li><a href="#">Dropdown Submenu Link 4.3</a></li>
										<li><a href="#">Dropdown Submenu Link 4.4</a></li>
									</ul>
								</li>

		            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
									<ul class="dropdown-menu">
										<li><a href="#">Dropdown Submenu Link 5.1</a></li>
										<li><a href="#">Dropdown Submenu Link 5.2</a></li>
										<li><a href="#">Dropdown Submenu Link 5.3</a></li>
										<li class="divider"></li>
										<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4</a>
											<ul class="dropdown-menu">
												<li><a href="#">Dropdown Submenu Link 5.4.1</a></li>
												<li><a href="#">Dropdown Submenu Link 5.4.2</a></li>
												<li class="divider"></li>
												<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4.3</a>
													<ul class="dropdown-menu">
														<li><a href="#">Dropdown Submenu Link 5.4.3.1</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.2</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.3</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.4</a></li>
													</ul>
												</li>
												<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4.4</a>
													<ul class="dropdown-menu">
														<li><a href="#">Dropdown Submenu Link 5.4.4.1</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.2</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.3</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.4</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>								
								</li>
	            </ul>                
            </li>

						<!--
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
								<li><a href="#">Dropdown Link 1</a></li>
								<li><a href="#">Dropdown Link 2</a></li>
								<li><a href="#">Dropdown Link 3</a></li>
								<li class="divider"></li>
								<li class="dropdown dropdown-submenu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
									<ul class="dropdown-menu">
										<li><a href="#">Dropdown Submenu Link 4.1</a></li>
										<li><a href="#">Dropdown Submenu Link 4.2</a></li>
										<li><a href="#">Dropdown Submenu Link 4.3</a></li>
										<li><a href="#">Dropdown Submenu Link 4.4</a></li>
									</ul>
								</li>
        				<li class="dropdown dropdown-submenu">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
									<ul class="dropdown-menu">
										<li><a href="#">Dropdown Submenu Link 5.1</a></li>
										<li><a href="#">Dropdown Submenu Link 5.2</a></li>
										<li><a href="#">Dropdown Submenu Link 5.3</a></li>
										<li class="divider"></li>
										<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4</a>
											<ul class="dropdown-menu">
												<li><a href="#">Dropdown Submenu Link 5.4.1</a></li>
												<li><a href="#">Dropdown Submenu Link 5.4.2</a></li>
												<li class="divider"></li>
												<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4.3</a>
													<ul class="dropdown-menu">
														<li><a href="#">Dropdown Submenu Link 5.4.3.1</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.2</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.3</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.3.4</a></li>
													</ul>
												</li>
												<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4.4</a>
													<ul class="dropdown-menu">
														<li><a href="#">Dropdown Submenu Link 5.4.4.1</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.2</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.3</a></li>
														<li><a href="#">Dropdown Submenu Link 5.4.4.4</a></li>
													</ul>
												</li>
											</ul>								
										</li>
									</ul>
								</li>
      				</ul>
         		</li>
         		-->
        	</ul>
       </div>	<!-- /.navbar-collapse -->
      </nav>
        
<!-- 
        <div class="jumbotron">
            <h1 class="page-header">Bootstrap 3.0.3<br>
            <small>Navbar - Click Dropdown - Sub - Sub - Sub - Sub ...</small></h1>
        </div>

        <div class="container">
        
            <div class="row">
               <h1>You Like It ?</h1>
               <br>
            </div>

        </div>    
-->

    </header>

    <?php include("../_php/dropdown_javascript.php") ?>
    
<!--    
    <script>
			(function($){
				$(document).ready(function(){
					$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
						event.preventDefault(); 
						event.stopPropagation(); 
						$(this).parent().siblings().removeClass('open');
						$(this).parent().toggleClass('open');
					});
				});
			})(jQuery);
    </script>
-->


  </body>
</html>



