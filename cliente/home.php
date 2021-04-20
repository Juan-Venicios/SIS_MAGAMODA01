<?php
	include_once('header.php');

    if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
		if ($acao == 'bemvindo'){
			
			include_once('principal.php');
			

		}	if ($acao == 'principal'){
			
			include_once('principal.php');
			

		}
		elseif ($acao == 'limpeza') {
	    include_once('paginas/limpeza.php');
		} elseif($acao == 'expediente'){
			include_once('paginas/expediente.php');
		} elseif($acao == 'processamentoDados'){
			include_once('paginas/processamentoDados.php');
		} elseif($acao == 'perfil'){
			include_once('profile.php');
		} elseif($acao == 'relatorio'){
			include_once('relatorio.php');
		} elseif($acao == 'configuracao'){
			include_once('paginas/configuracao.php');
		} elseif($acao == 'eletrico2'){
			include_once('paginas/eletrico2.php');
		}elseif($acao == 'modelo'){
			include_once('paginas/updateModelo.php');
		}elseif($acao == 'vismodelo'){
			include_once('paginas/visualizarModelo.php');
		}elseif($acao == 'vispedido'){
			include_once('paginas/visualizarPedido.php');
		}elseif($acao == 'expediente2'){
			include_once('paginas/expediente.php');
		}elseif($acao == 'limpeza2'){
			include_once('paginas/limpeza.php');
		} elseif($acao == 'funcionario'){
			include_once('funcionário.php');
		}elseif($acao == 'funcionarioTAB'){
			include_once('funcioTAB.php');
		}elseif($acao == 'modeloTAB'){
			include_once('modeloTAB.php');
		}elseif($acao == 'modeloCad'){
			include_once('modelo.php');
		}elseif($acao == 'costureira'){
			include_once('paginas/updateCostureira.php');
		}elseif($acao == 'pedido'){
			include_once('paginas/updatePedido.php');
		}elseif($acao == 'viscostureira'){
			include_once('paginas/visualizarCostureira.php');
		}elseif($acao == 'pedidoTAB'){
			include_once('pedidoTAB.php');
		}elseif($acao == 'obspedido'){
			include_once('obsTAB.php');
		}elseif($acao == 'obsCad'){
			include_once('obspedido.php');
		}elseif($acao == 'pedcliente'){
			include_once('pedcliente.php');
		}elseif($acao == 'pedidoCad'){
			include_once('pedido.php');
		}elseif($acao == 'processamentoDados2'){
			include_once('paginas/processamentoDados.php');
		};


        };
   include_once('rodape.php');
   
   if ($acao == 'bemvindo'){
	include_once('paginas/welcome.php');
   }

   
   
    ?>
	