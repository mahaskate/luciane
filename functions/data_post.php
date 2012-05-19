	<meta charset="utf-8">
<?php 

/*
*--------------------------------------------------------------------
*
*FUNÇÃO FEITA POR DANIEL FARIA 23/11/11

*CALCULA O TEMPO PASSADO APÓS UMA POSTAGEM

*REGRAS:

*59 SEGUNDOS OU MENOS => POSTADO AGORA
*DE 1 MINUTO ATÉ 59 MINUTOS => HÁ X MINUTOS
*DE 1 HORA ATÉ 23 HORAS 59 MINUTOS E 99 SEGUNDOS => HÁ X HORAS E X MINUTOS (OBS.: HORAS REDONDAS ELE MOSTRARA SOMENTE A HORA EXEMPLO: HÁ 1 HORA ATRÁS)
*IGUAL OU SUPERIOR A 24 HORAS => HÁ X DIAS
*MAIS DE 29 DIAS => POSTADO EM X(DIA) DE X(MES)
*CASO SEJA POSTADO EM UM ANO DIFERENTE DO ANO ATUAL => EM X(DIA) DE X(MES) DE X(ANO)

*
* SINTAXE DE USO data_post($data);
* variavel "$data" deve estar no seguinte formato: (y-m-a h:i:s)
*
*

*----------------------------------------------------------------------
*/


    function data_post($datahora){

	$dataBanco = strtotime($datahora);

	$tempo = time()-$dataBanco;

        $timet = 3600*24;
        $dias = floor($tempo/$timet);
        $horas = floor($tempo/3600);
        $minutos = floor($tempo/60);
        $segundos = $tempo;
        if ($dias>0)
	{
		if($dias < 30)
		{
		        $tempo =$dias." dia".(($dias>1)?"s":"")." atrás";
		}
		else
		{
			$result = substr("$datahora",0,10);
			$result = explode("-",$result);

			$mes = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","novembro","Dezembro");
			
			$conta = $result[1] - 1;
			if($result[0]!=date("Y"))
			{
				$tempo = $result[2]." de ".$mes[$conta]." de ".$result[0];
			}
			else
			{
				$tempo = $result[2]." de ".$mes[$conta];
			}
		}
	}
        else if ($horas>0)
	{
		$m = explode(":",$datahora);

		$m = date("i")-$m[1];

            $tempo =$horas." hora".(($horas>1)?"s":"").(($m>0)?" e ".$m." minutos":"")." atrás";
	}
        else if ($minutos>0)
            $tempo =$minutos." minuto".(($minutos>1)?"s":"")." atrás";
        else
            $tempo ="agora";

        return $tempo;
    }
?>