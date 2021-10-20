<?php

/*Classe*/

class funcoes
{
	public static $retornoDecimal;
	public static $retornoHoras;
	
	static function data_padrao($data)
	{
		if($data == "" || $data == '0000-00-00 00:00:00' || $data=='0000-00-00')
		{
			$data_formatada = "";
		}
		else
		{
			$array_data = split("[/.-]",$data);
			if(strlen($array_data[0])==4)
			{
				$array_data[0] = substr($array_data[0],2,2);
			}
			$data_formatada = date("d/m/y",mktime(0,0,0,$array_data[1],$array_data[2],$array_data[0]));
		}
		return $data_formatada;
	}
	
	static function qtdeDias($dataIni,$dataFim)
	{
		$Dv = $dataIni;
       	$DvE = explode('-',$Dv);
       	$DvA = $DvE[0];
        $DvM = $DvE[1];
        $DvD = $DvE[2];
       	$dataIni = $DvM.'/'.$DvD.'/'.$DvA;
		
		$Dv2 = $dataFim;
       	$DvE2 = explode('-',$Dv2);
       	$DvA2 = $DvE2[0];
        $DvM2 = $DvE2[1];
        $DvD2 = $DvE2[2];
       	$dataFim = $DvM2.'/'.$DvD2.'/'.$DvA2;
		
		//$datainicio=strtotime("01/10/2004")
		$dataIni = strtotime($dataIni);
		
		$dataFim = strtotime($dataFim);
		//print $dataFim;
		$intervalo = ($dataFim-$dataIni)/86400; //transformação do timestamp em dias
		return number_format($intervalo,0,',','.');
		print $intervalo;
		
	}
	
	static function qtdeHoras($dataIni,$horaIni,$dataFim,$horaFim)
	{
		$dIni = explode('-',$dataIni);
		 $diaIni = $dIni[2];
		
		 $mesIni = $dIni[1];
		
		 $anoIni = $dIni[0];
		
		 $hIni = explode(':',$horaIni);
		 $horaIni = $hIni[0];
		 $minIni = $hIni[1];
		
		 $mktIni = mktime(0,0,0,$mesIni,$diaIni,$anoIni);
		 $mktIniH = ($horaIni*60)+$minIni;
		 
		
		
		$dFim = explode('-',$dataFim);
		$diaFim = $dFim[2];
		$mesFim = $dFim[1];
		$anoFim = $dFim[0];
		
		$hFim = explode(':',$horaFim);
		$horaFim = $hFim[0];
		 $minFim = $hFim[1];
		

		
		 $mktFim = mktime(0,0,0,$mesFim,$diaFim,$anoFim);
		  $mktFimH = ($horaFim*60)+$minFim;
		
		  $intervaloD = (($mktFim-$mktIni))/3600;
		
		  $intervaloH = ($mktFimH-$mktIniH)/60;
		  
		  
		  $inter = $intervaloD + $intervaloH;
		
		  $int = $inter *60;
		  
		  while($int>=60) 
		  {
		  	$h++;
			$int -= 60;
		
			
		  }
		  
		  $min = $int;
		  
		  $retHora = sprintf('%02d',$h).':'.sprintf('%02d',$min);
		 
		 $intervalo = $inter; 
		  
		self::$retornoDecimal = $intervalo;
		self::$retornoHoras = $retHora;
		
		return $retHora;
		
		
	}
	
	static function horaDif($horaIni,$horaFim)
	{
		$arrayHoraIni = explode(':',$horaIni);
		$arrayHoraFim = explode(':',$horaFim);
		$hIni = $arrayHoraIni[0];
		$mIni = $arrayHoraIni[1];
		$sIni = $arrayHoraIni[2];
		
		$hFim = $arrayHoraFim[0];
		$mFim = $arrayHoraFim[1];
		$sFim = $arrayHoraFim[2];
		
		
		$mktIni = mktime($hIni,$mIni,$sIni,0,0,0);
		$mktFim = mktime($hFim,$mFim,$sFim,0,0,0);
		
		$mktDif = $mktFim - $mktIni;
		
		return number_format($mktDif/6000,2,':','.');	
	}
	
	static function somaHora($hora,$valor)
	{
		$arrayHora = explode(':',$hora);
		$h = $arrayHora[0];
		$m = $arrayHora[1];
		$s = $arrayHora[2];
		
		$mktSoma = mktime($h,$m+$valor,$s,0,0,0);
		
		return date('H:i:s',$mktSoma);
		
	}
}
?>