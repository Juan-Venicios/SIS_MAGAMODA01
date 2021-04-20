<body>
  <section style="background: #;" id="container">
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


   

    <section  id="main-content">
      <section class="wrapper site-min-height">

        <h3><i class="fa fa-angle-right"></i>Cadastrar Modelo</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO MODELO</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

  
  
                       <div class="form-group ">
                              <label class="control-label">Nome</label>                    
                              <input  value="" type="text" lenght="10"  name="nome_modelo" id="nome_modelo" class="form-control">                     
                        </div>

                        <div class="form-group">

                             <label class="control-label"> Imagem do Modelo </label>                           
                              <input  value="" type="file"   name="img_modelo" id="img_modelo" id="exampleInputFile" class="file-pos">               
                        </div>img_modelo

                        
                       <div class="form-group">
                            <label class="control-label">Código</label>
                            <input  value="" type="text" name="codigo_modelo" id="codigo_modelo" class="form-control">
                       </div>
                           
                       <div class="form-group">
                              <label class="control-label">Descrição</label>
                              <textarea name="desc_modelo" id="desc_modelo" style="margin-top: 5%;" rows="3" class="form-control" placeholder="Descrição do Modelo"></textarea>
                       </div>

  
                       <div class="form-group">
                            <label class="control-label">Quantidades por Tamanhos</label>
                       </div>
                           
                <div class="row">
                          <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">PP</label>
                              <input  value="" type="number"  name="tamPP" id="tamPP" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">P</label>
                              <input  value="" type="number"  name="tamP" id="tamP" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">M</label>
                              <input  value="" type="number"  name="tamM" id="tamM" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">G</label>
                              <input  value="" type="number"  name="tamG" id="tamG" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">GG</label>
                              <input  value="" type="number"  name="tamGG" id="tamGG" class="form-control">
                          </div>
                </div>     
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">Preço</label>
                              <input  value="" type="text"  name="preco_modelo" id="preco_modelo" class="form-control">
                          </div>
                </div>                       
                </div>
 </div>
</div>              
 <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
            </div>
</div>

      </form>
      <?php
							include_once('conect/conect.php');
						      if (isset($_POST['botao'])) {
			$nome_modelo = $_POST['nome_modelo'];
      $codigo_modelo = $_POST['codigo_modelo'];
      $desc_modelo = $_POST['desc_modelo'];
      $tamPP = $_POST['tamPP'];
      $tamP = $_POST['tamP'];
      $tamM = $_POST['tamM'];
      $tamG = $_POST['tamG'];
      $tamGG = $_POST['tamGG'];
      $preco_modelo = $_POST['preco_modelo'];
      $total_modelo = $tamPP+$tamP+$tamM+$tamG+$tamGG;

			$formatosPermitidos = array("png","jpeg","jpg","gif");
			$extensao = pathinfo($_FILES['img_modelo']['name'],PATHINFO_EXTENSION);
			if(in_array($extensao, $formatosPermitidos)):
				//echo "Existe a extenção .{$extensao}";
				$pasta = "img/";
				$temporario = $_FILES['img_modelo']['tmp_name'];
				$novoNome = uniqid().".{$extensao}";

				if (move_uploaded_file($temporario, $pasta.$novoNome)) {
							$cadastro = "INSERT INTO tb_modelo (nome_modelo,img_modelo,codigo_modelo,desc_modelo,tamPP,tamP,tamM,tamG,tamGG,preco_modelo,total_modelo)
               VALUES (:nome_modelo,:img_modelo,:codigo_modelo,:desc_modelo,:tamPP,:tamP,:tamM,:tamG,:tamGG,:preco_modelo,:total_modelo)";

				            try{
                      $result = $conect->prepare($cadastro);
                      $result->bindParam(':nome_modelo',$nome_modelo,PDO::PARAM_STR);
                        $result->bindParam(':img_modelo',$novoNome,PDO::PARAM_STR);
                        $result->bindParam(':codigo_modelo',$codigo_modelo,PDO::PARAM_STR);
                        $result->bindParam(':desc_modelo',$desc_modelo,PDO::PARAM_STR);
                        $result->bindParam(':tamPP',$tamPP,PDO::PARAM_INT);
                        $result->bindParam(':tamP',$tamP,PDO::PARAM_INT);
				                $result->bindParam(':tamM',$tamM,PDO::PARAM_INT);			              
                        $result->bindParam(':tamG',$tamG,PDO::PARAM_INT);
                        $result->bindParam(':tamGG',$tamGG,PDO::PARAM_INT);
                        $result->bindParam(':preco_modelo',$preco_modelo,PDO::PARAM_STR);
                        $result->bindParam(':total_modelo',$total_modelo,PDO::PARAM_INT);
				                $result->execute();

				                $contar = $result->rowCount();
				                if($contar>0){
				                	echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>CADASTRADO COM SUCESSO!</strong></div>';
				                	header("Location: home.php?acao=modeloAB");
				                }else{
				                	echo 'Dados não cadastrados!';
				           
				                }
				            }catch(PDOException $e){
				                echo "<b>ERRO DE PDO= </b>".$e->getMessage();
				            }
					//$mensagem = "Upload feito com sucesso!";
				}else{
					$mensagem = "Erro, não foi possivel fazer o upload do arquivo!";
				}
			else:
				echo  "Formato inválido";
			endif;
			//var_dump($_FILES);
		}
						    ?>


                      </div>
                      <!-- /col-lg-8 -->






                    
                  </div>
                  </div>
                 </div>
                    <!-- /row -->
                  </div>
                 


      </section>
      <!-- /wrapper -->
    </section>
 




