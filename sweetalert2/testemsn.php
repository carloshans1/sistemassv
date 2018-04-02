<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 19/03/2018
 * https://sweetalert2.github.io/
 * https://sweetalert.js.org/guides/#advanced-examples
 -->

<!DOCTYPE html>
<html>
<head>
	<title>Teste MSN</title>
  <!-- SWEETALERT apoio para mensagem personalizadas -->
	<link href="sweetalert2.min.css" rel="stylesheet"/>
	<link href="animate.css" rel="stylesheet" type="text/css" />
  <script src="sweetalert2.min.js"></script>  
  <script src="sweetalert2.all.min.js"></script>  
  <script type="text/javascript"> 
  	function openmsn() {
	    //Mensagens personalizadas
	    swal({
			  type: 'success',
	      title: "Excluido!",
	      titleText: "",
	      text: "OK para continuar.",
		    customClass: 'swal-wide',
				width: 300
	    });		  		
  	};

  	function msnOpen() {
	    //Mensagens personalizadas
	    swal({
			  position: 'top-end',
			  type: 'question',
				title: 'Custom width, padding, background.',
				text: "Qual é o sentido da vida",
				width: 300,
				padding: 10,
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  url("#")
				  center left
				  no-repeat`,
				footer: '<a href>Rodapé</a>'		
	    });		  		
  	};

  	function msn3() {
	    //Mensagens personalizadas
			swal({
			  title: 'Custom animation with Animate.css',
			  animation: false,
			  customClass: 'animated tada'
			})
  	};

  	function mensagem4() {
			swal({
			  title: 'Error!',
			  text: 'Do you want to continue',
			  type: 'error',
			  confirmButtonText: 'Cool'
			}) 		
  	};

	</script>
</head>
<body>
	<button type="button" name="btteste1" value="enviar1" onclick="openmsn()" 	>Novo</button>
	<button type="button" name="btteste2" value="enviar2" onclick="msnOpen()" 	>Modelo 2</button>
	<button type="button" name="btteste3" value="enviar3" onclick="msn3()" 			>Modelo 3</button>
	<button type="button" name="btteste4" value="enviar4" onclick="mensagem4()" >Modelo 4</button>

	<script>
		function TestSweetAlert(){
			swal({
				title: 1 +' Issues for test',
				text: "A custom <span style='color:red;'>html</span> message.",
				html: true,
				type: "info",
				width: 300,
				customClass: 'swal-wide',
				showCancelButton: true,
				showConfirmButton:false
			});
		};
	</script>

	<style type="text/css">
		.swal-wide{
			background-color: #97FFFF;
			background-image: linear-gradient(to left,#E0FFFF,#FFFAFA);
			/*opacity:0.98;-moz-opacity: 0.98;filter: alpha(opacity=98);*/
		}	
	</style>

	<button id="testeSWAL" onclick="TestSweetAlert()"> Test SWAL </button>
</body>
</html>

