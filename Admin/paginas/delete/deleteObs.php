<?php
include_once('../../conect/conect.php');
if(isset($_GET['deletar'])){
	$id = $_GET['deletar'];
	$delete = "DELETE FROM tb_observacao WHERE id_obs=:id";
	try{
		$result = $conect->prepare($delete);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		$result->execute();
		$contar=$result->rowCount();
		if ($contar>0) {
			//header função de redirecionamento
			header("Location:../../home.php?acao=obspedido");
		} else {
			header("Location:../../home.php?acao=obspedido");
		}
		
	}catch(PDOException $e){
		echo "<b>ERRO DE DELETE: </b>".$e->getMessage();
	}
}

