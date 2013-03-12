<?php 
// Standard inclusions     
include("pChart/pData.class");  
include("pChart/pChart.class");
include("functions.php");
ini_set("display_errors","1");


$alfabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
$mesaj = file_get_contents("text.txt");
$mesajChart = "tmp/graficMesaj.png";
$criptSubstChart = "tmp/graficCriptSubst.png";
$criptSubstTransp = "tmp/graficCriptTransp.png";
$digramaMesaj = "tmp/digramaMesaj.png";
$digramaCriptSubst = "tmp/digramaCript.png";
$digramaCriptTransp = "tmp/digramaCriptTransp.png";


str_replace("\n"," ",$mesaj);
str_replace("\r"," ",$mesaj);
$mesaj = preg_replace('!\s+!', ' ', $mesaj);

switch ($_POST['action']) {
	case 'getAlfabet':
		//$data =  json_encode($alfabet);
	 	echo $alfabet;
		# code...
	break;

	case "genKeySubst":
		echo generateKey($alfabet);
	break;
	case "getKeySubst":
		echo file_get_contents('key');
	break;

	case "genKeyTransp":
		echo implode(' ',genTranspKey($_POST['keyLength']));
	break;
	case "getKeyTransp":
		echo file_get_contents('transpKey');
	break;

	case "getMsg":
		echo $mesaj;

	case "getCriptSubst":

		$key = file_get_contents('key');
		$cript = generateCriptograma($mesaj,$key,$alfabet);
		echo $cript;
	break;

	case "getCriptTransp":

		$key = explode(" ",file_get_contents('transpKey'));
		$cript = genTranspCript($mesaj,$key);
		echo $cript;
	break;

	case "getMsgChart":
		$probMesaj = generateSP($mesaj,$alfabet);
		////unlink($mesajChart);
			


		echo generateChart($probMesaj,$alfabet,"Probabilitatea Mesaj",$mesajChart);
		

	break;

	case "getCriptChartSubst":
		$cript = file_get_contents('criptograma');
		$key = file_get_contents('key');
		//////unlink($criptChart);
		$probCript = generateSP($cript,$key);
		
		echo generateChart($probCript,$key,"Probabilitate Criptograma Substitutie",$criptSubstChart);
		

	break;

	case "getCriptChartTransp":
		$cript = file_get_contents('transCript');
		$key = file_get_contents('transpKey');
		//////unlink($criptChart);
		$probCript = generateSP($cript,$alfabet);
		
		echo generateChart($probCript,$alfabet,"Probabilitate Criptograma Transpozitie",$criptSubstTransp);
		

	break;


	case "genDigramMsg":
		
		////unlink($digramaMesaj);
		$probDigrameMesaj = generateDP($mesaj,$alfabet);
		echo generateDigramsChart($probDigrameMesaj,$digramaMesaj);
		

	break;

	case "genDigramCriptSubst":
		$cript = file_get_contents('criptograma');
		$key = file_get_contents('key');
		////unlink($digramaCript);
		
		$probDigrameCript = generateDP($cript,$key);
		echo generateDigramsChart($probDigrameCript,$digramaCriptSubst);
		
		

	break;
	case "genDigramCriptTransp":
		$cript = file_get_contents('transCript');
		$key = $alfabet;
		////unlink($digramaCript);
		
		$probDigrameCript = generateDP($cript,$key);
		
		echo generateDigramsChart($probDigrameCript,$digramaCriptTransp);
		
		

	break;
	
	

	case "test-functions":
		echo "Nimic de testa:p";
	break;

	default:
		echo "Oooops! S-a intamplat ceva nasol!";

	break;
}



 ?>
