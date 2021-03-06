<?php
ob_start(); //Inicia o cache para a sessão
session_start(); //Inicia a sessão da página(login)
if(isset($_SESSION['loginUser']) && (isset($_SESSION['senhaUser'])) && (isset($_SESSION['status']))) {
	header("Location: index.php?acao=negado");
	exit; //Oculta todo o código abaixo quando existe erro
}
?>
<?php
include_once('conect/conect.php');
            $select = "SELECT * FROM tb_cliente";

            try{
              $resultado = $conect->prepare($select);
                $resultado->execute();
                //CONTA REGISTRO
                $contar = $resultado->rowCount();
                if($contar > 0){
                  while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                    $VERIFICARRR = $show->status_cliente;
                
                  }
                }else{
                  echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com o id(parametro) informado :( </div>';
                }
            }catch(PDOException $e){
                echo "<b>ERRO DE PDO NO SELECT: </b>".$e->getMessage();
            }
        ?>
      
    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Gestor Estoque</title>

  <!-- Favicons -->
  <link href="img/icon.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  

</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
     
     
      <form class="form-login" method="post">
        <h2 class="form-login-heading">Entrar no sistema (Cliente)</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="email" placeholder="Digite seu email..." autofocus>
          <br>
          <input type="password" name="senha" class="form-control" placeholder="Digite sua senha...">
        
          <input type="hidden" name="status" value="1">

          <button class="btn btn-theme btn-block"name="login" type="submit"><i class="fa fa-lock"></i> Entrar</button>   
  
      </form>

      <?php
							include_once('conect/conect.php');
							if (isset($_GET['acao'])) {
								if (!isset($_POST['login'])){
									$acao = $_GET['acao'];
									if ($acao == 'negado') {
						            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Erro ao Acessar o sistema!</strong> Efetue o login ;(</div>';
						          }elseif ($acao == 'sair') {
						            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Volte sempre!</strong> esperamos o seu login ;(</div>';
						          }
								}
							}
								if (isset($_POST['login'])){
				    				$login = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
						        $senha = base64_encode(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));
						        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
						        $select = "SELECT * FROM admin WHERE email=:emailLogin AND senha=:senhaLogin AND status=:status";

						        try {
						          $resultLogin = $conect->prepare($select);
						          $resultLogin->bindParam(':emailLogin',$login, PDO::PARAM_STR);
						          $resultLogin->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
						          $resultLogin->bindParam(':status',$status, PDO::PARAM_INT);
						          $resultLogin->execute();

						          $verificar = $resultLogin->rowCount();
						          if ($verificar = 1) {
						          	$login = $_POST['email'];
						            $senha = trim(strip_tags(base64_encode($_POST['senha'])));
                       
						          	$status = $_POST['status'];
						            //CRIANDO A SESSÃO DE LOGIN E SENHA
						            $_SESSION['loginUser'] = $login;
						            $_SESSION['senhaUser'] = $senha;
						            $_SESSION['status'] = $status;

    echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Logado com sucesso!</strong> Redirecionando para o sistema </div>';


                       header("Refresh: 3, home.php?acao=bemvindo");

    



                                    
						          } 





                 elseif( $VERIFICARRR   == 0) {
   
             header("Refresh: 1, 403.php");
						          }
						        } catch (PDOException $e){
						          echo "ERRO DE LOGIN DO PDO : ".$e->getMessage();
						        }
						      }

							?>


<hr>


<div class="login-social-link centered">
          
          <div class="registration">
            <a class="" href="novoperfil.php"> 
           Criar um conta
              </a>
          </div>
          
        </div> 



    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/images.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
