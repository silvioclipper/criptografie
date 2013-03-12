<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Criptografie L1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		body { padding-top: 60px; padding-bottom: 40px; }
	</style>
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">
	


	<script src="http://code.jquery.com/jquery.min.js"></script>
	

	<style type="text/css" media="screen">
			.row{
				
				display: block;
			}
			.span9{
				border: 1px solid #ccc;
				margin: 5px;
				
				padding: 5px;
				width: 330px;
				display: inline-block;

			}
			.span9 span{
				bottom:5px;
			}		
	</style>
	
</head>
<body>

	</div>
	<div class="container">
		<center>
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h2>Criptografie -  Tema Laborator 1</h2>
			
		<div class="row" >
			<div class="span9">
				<div id="alfabet"></div>
				<span class="btn btn-primary" id="getAlfabet">Citeste alfabet</span>
			</div>
			<div class="span9">
				<div id="keySubst"></div>
				<span class="btn btn-primary" id="genKeySubst">Genereaza cheie Substitutie</span>
				<span class="btn btn-primary" id="getKeySubst">Citeste cheie Substitutie</span>
				
			</div>
			<div class="span9">
				<div id="keyTransp"></div>
				<span class="btn btn-primary" id="genKeyTransp">Genereaza cheie Transpozitie</span>
				<span class="btn btn-primary" id="getKeyTransp">Citeste cheie Transpozitie</span>
				
			</div>
			
		</div>
		<div class="row">
			<div class="span9">
				<div id="msg" style=" height: 170px;overflow-y:scroll;font-size: 10px;"></div>
				<span class="btn btn-primary" id="getMsg">Citeste Mesaj</span>
			</div>
			<div class="span9">
			
				<div id="criptSubst" style="height: 170px; overflow-y:scroll; font-size: 10px;"></div>
				<span class="btn btn-primary" id="getCriptSubst">Genereaza Criptograma Substitutie</span>
				
			</div>
			<div class="span9">
			
				<div id="criptTransp" style="height: 170px; overflow-y:scroll; font-size: 10px;"></div>
				<span class="btn btn-primary" id="getCriptTransp">Genereaza Criptograma Transpozitie</span>
				
			</div>
			
		</div>

		<div class="row">
			<div class="span9">
				
				<div id="msgChart"></div>
				<span class="btn btn-primary" id="getMsgChart">Afiseaza Grafic Mesaj</span>
			</div>
			<div class="span9">
				
				<div id="criptChartSubst" ></div>
				<span class="btn btn-primary" id="getCriptChartSubst">Genereaza grafic Criptograma Substitutie</span>
				
			</div>
			<div class="span9">
				
				<div id="criptChartTransp" ></div>
				<span class="btn btn-primary" id="getCriptChartTransp">Genereaza grafic Criptograma Transpozitite</span>
				
			</div>
			
		</div>
		<div class="row">
			<div class="span9">
				
				<div id="DigramMsg"></div>
				<span class="btn btn-primary" id="genDigramMsg">Digrame Mesaj</span>
			</div>
			<div class="span9">
				
				<div id="DigramCriptSubst" ></div>
				
				<span class="btn btn-primary" id="genDigramCriptSubst">Digrame Criptograma Substitutie</span>
			</div>
			
		

		<div class="span9">
				
				<div id="DigramCriptTransp" ></div>
				
				<span class="btn btn-primary" id="genDigramCriptTransp">Digrame Criptograma Transpozitie</span>
			</div>
			
		</div>

	</div>
	</center>
		<!-- Example row of columns -->
		
	</div> <!-- /container -->
	
	
	<!-- <span class="btn btn-primary" id="testBtn">Testeaza</span>
	<div class="alert" id="testmsg" style="height:300px;"> -->


	<script src="js.js"></script>	
	
</body>
</html>