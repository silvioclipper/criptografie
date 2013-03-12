<?php 
function negate($im)
{
    if(function_exists('imagefilter'))
    {
        return imagefilter($im, IMG_FILTER_NEGATE);
    }

    for($x = 0; $x < imagesx($im); ++$x)
    {
        for($y = 0; $y < imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($index);
            $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);

            imagesetpixel($im, $x, $y, $color);
        }
    }

    return(true);
}


function generateChart($xData,$yData="",$graphName="",$graphFile="default.png"){
	
	unlink($graphFile);
	//Transform alfabetul in arrray
	$yData = str_split($yData);

	array_multisort($xData,$yData);
	//aproximez datele de intrare la 2 zecimale
	foreach ($xData as $key => $value) {
		$xData[$key] = number_format($value,2);
	}


	$DataSet = new pData;  
	$DataSet->AddPoint($xData,"Probabilitati");  
	$DataSet->AddPoint($yData,"Litere");  
	$DataSet->setAbsciseLabelSerie("Litere");
	$DataSet->AddAllSeries();
	$DataSet->SetSerieName("Probabilitatea","Probabilitati");
	//$Dataset->SetSerieName("Litere","Litere");  
	  $DataSet->setYAxisName("Probabilitate");
	  $DataSet->setXAxisName("Litere");
	// Initialise the graph  
	$Test = new pChart(700,230);  
	$Test->setFontProperties("Fonts/tahoma.ttf",10);  
	$Test->setGraphArea(50 ,50,680,200);  
	$Test->drawGraphArea(252,252,252);  
	$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);  
	$Test->drawGrid(4,TRUE,230,230,230,255);  

	  
	// Draw the line graph  
	$Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);  
	//$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);  
	// Write values on Serie1 & Serie2  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);     
 $Test->writeValues($DataSet->GetData(),$DataSet->GetDataDescription(),"Probabilitati");     
   
	  
	// Finish the graph  
	$Test->setFontProperties("Fonts/tahoma.ttf",8);  
	//$Test->drawLegend(45,35,$DataSet->GetDataDescription(),255,255,255);  
	$Test->setFontProperties("Fonts/tahoma.ttf",10);  
	$Test->drawTitle(60,22,$graphName,50,50,50,585);  
	
	//$graphFile = "tmp/".$graphFile.date("His").".png";
	$Test->Render($graphFile);
	return $graphFile;

}

function generateDigramsChart($diProb,$filename){
	unlink($filename);
	// Grab the dimensions of the pixel array
	$linii = count($diProb, 0);
	$coloane = count($diProb);
	$ratio = 20;
	for($i=0; $i<$linii; $i++){
		for($j=0; $j<$coloane; $j++){
			for($k=0; $k<=19; $k++){
				for($l=0; $l<=19; $l++){
						$matrix[20*$i+$k][20*$j+$l] = $diProb[$i][$j];
				}
			}
		}	
	}
	$width = count($matrix,0);
	$height = count($matrix);
	
	//file_put_contents("log",var_export($matrix,TRUE));
	// Create the image resource
	$img = imagecreatetruecolor($width, $height);

	// Set each pixel to its corresponding color stored in $pixelArray
	for ($y = 0; $y < $height; ++$y) {
	    for ($x = 0; $x < $width; ++$x) {
	    	$color = imagecolorallocate($img,$matrix[$y][$x],$matrix[$y][$x],$matrix[$y][$x]);
	        imagesetpixel($img, $x, $y, $color);
	    }
	}
	//$filename ="tmp/".$filename.date("His").".png";	// Dump the image to the browser
	//header('Content-Type: image/png');
	imagefilter($img,IMG_FILTER_GRAYSCALE);
	imagefilter($img,IMG_FILTER_NEGATE);
	//imagefilter($img,IMG_FILTER_CONTRAST,10);
	imagepng($img, $filename);
	// Clean up after ourselves
	imagedestroy($img);
	return $filename;
} 

function generateKey($alfabet){
	$alfabet = str_split($alfabet);
	shuffle($alfabet);
	unlink("tmp/key");
	file_put_contents("tmp/key",implode($alfabet));
  //echo $alfabet;
		return implode($alfabet);
}

function generateSP($mesaj,$alfabet){
	$isProb[] = 0;

	for ($i=0; $i<strlen($alfabet); $i++)
	    	       $isProb[$i] = substr_count($mesaj,$alfabet[$i]);
	 for ($i=0; $i<strlen($alfabet); $i++)
	 		$isProb[$i] = ($isProb[$i]/strlen($mesaj))*100;
	return $isProb;

}

function generateDP($mesaj,$alfabet){
	//echo array_sum($isProb);
	$idProb[][] = 0;
	for ($i=0; $i<strlen($alfabet); $i++)
	    for ($j=0; $j<strlen($alfabet); $j++)
	                $idProb[$i][$j] = substr_count($mesaj,$alfabet[$i].$alfabet[$j]);
	// for ($i=0; $i<strlen($alfabet); $i++)
	//     for ($j=0; $j<strlen($alfabet); $j++)
	//     		$idProb[$i][$j] = 1 - $idProb[$i][$j];

	return $idProb;
}

function generateCriptograma($mesaj,$key,$alfabet){

	$criptograma = "";

	for($i=0;$i<strlen($mesaj);$i++){
		//print_r(strpos($alfabet,$mesaj[$i]));
		$criptograma[$i] = $key[strpos($alfabet,$mesaj[$i])];
	
	}
	unlink("tmp/criptograma");
	file_put_contents('tmp/criptograma',implode($criptograma));
	return implode($criptograma);
}
function genTranspKey($key_length){
	$key = array();
	for($i=0;$i<$key_length; $i++){
		$key[$i]=$i;
	}
	shuffle($key);
	file_put_contents("tmp/transpKey",implode(' ',$key));
	return $key;
}

function genTranspCript($mesaj,$key){
	$cript = array();
	$keyLen = sizeof($key);

	for($i=0;$i<strlen($mesaj);$i+=$keyLen){
			$temp1 = substr($mesaj,$i,$keyLen);
			$temp2 = array();
			for($j=0;$j<$keyLen;$j++){
				$temp2[$j] = $temp1[$key[$j]];
			}
		$cript = array_merge($cript,$temp2);
		
	}
	file_put_contents('tmp/transCript',implode($cript));

	return implode($cript);
}	
