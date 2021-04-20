<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['modelo'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['modelo'];
                        $select = "SELECT * FROM tb_modelo WHERE id_modelo=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_modelo = $show->id_modelo;
                                    $nome_modelo = $show->nome_modelo;
                                    $img_modelo = $show->img_modelo;
                                    $codigo_modelo = $show->codigo_modelo;
                                    $desc_modelo = $show->desc_modelo;
                                    $tamPP = $show->tamPP;
                                    $tamP = $show->tamP;
                                    $tamM = $show->tamM;
                                    $tamG = $show->tamG;
                                    $tamGG = $show->tamGG;
                                    $preco_modelo = $show->preco_modelo;
                                    $total_modelo = $show->total_modelo;
                                }
                            }else{
                                echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id(parametro)
                                informado :( </div>';
                            }
                        }catch(PDOException $e){
                            echo "<b>Erro de Select do PDO</b>".$e->
                            getMessage();
                        }
    ?>



  <section style="background: #;" id="container">
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


   

    <section  id="main-content">
      <section class="wrapper site-min-height">

        <h3><i class="fa fa-angle-right"></i>Atualizar Modelo</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO MODELO</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

                      <div class="rom">
                      <div class="col-lg-6">
                       <div class="form-group ">
                              <label class="control-label">Nome</label>                    
                              <input  type="text"  value="<?php echo $nome_modelo; ?>" lenght="10"  name="nome_modelo" id="nome_modelo" class="form-control">                     
                        </div>
                        

                        
                       <div class="form-group">
                            <label class="control-label">Código</label>
                            <input type="text" value="<?php echo $codigo_modelo; ?>" name="codigo_modelo" id="codigo_modelo" class="form-control">
                       </div>
                       </div>
                       <div class="col-lg-6">
                       <div class="form-group">

                             <label class="control-label"> Imagem do Modelo </label>                           
                              <input type="file"   name="img_modelo" id="img_modelo" id="exampleInputFile" class="file-pos">               
                        </div>
                        <div class="form-group">
                        <img src="img/<?php echo $img_modelo;?>" style="width: 30%;">
                        </div>
                        </div>
                        </div>
                       <div class="col-lg-12">
                       <div class="form-group">
                              <label class="control-label">Descrição</label>
                              <textarea name="desc_modelo" value="<?php echo $desc_modelo; ?>" id="desc_modelo" style="margin-top: 5%;" rows="3" class="form-control" placeholder="Descrição do Modelo"></textarea>
                       </div>
                       </div>
                        
                       <div class="form-group">
                            <label class="control-label">Quantidades por Tamanhos</label>
                       </div>
                           
                <div class="row">
                          <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">PP</label>
                              <input  value="<?php echo $tamPP; ?>" type="number"  name="tamPP" id="tamPP" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">P</label>
                              <input  value="<?php echo $tamP; ?>" type="number"  name="tamP" id="tamP" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">M</label>
                              <input  value="<?php echo $tamM; ?>" type="number"  name="tamM" id="tamM" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">G</label>
                              <input  value="<?php echo $tamG; ?>" type="number"  name="tamG" id="tamG" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">GG</label>
                              <input  value="<?php echo $tamGG; ?>" type="number"  name="tamGG" id="tamGG" class="form-control">
                          </div>
                </div>     
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">Preço</label>
                              <input  value="<?php echo $preco_modelo; ?>" type="text"  name="preco_modelo" id="preco_modelo" class="form-control">
                          </div>
                </div>                       
                </div>
 </div>
</div>              
 <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Editar</button>
            </div>
</div>

      </form>
      <?php
        include_once('conect/conect.php');
        if(!isset($_GET['modelo'])) {
          header("Location: home.php");
          exit;
        }
        $id = $_GET['modelo'];
        if (isset($_POST['botao'])){
          $nome_modelo=$_POST['nome_modelo'];
          $codigo_modelo=$_POST['codigo_modelo'];
          $desc_modelo=$_POST['desc_modelo'];
          $tamPP=$_POST['tamPP'];
          $tamP=$_POST['tamP'];
          $tamM=$_POST['tamM'];
          $tamG=$_POST['tamG'];
          $tamGG=$_POST['tamGG'];
          $preco_modelo=$_POST['preco_modelo'];
          $total_modelo=$tamPP+$tamP+$tamM+$tamG+$tamGG;
          if(!empty($_FILES['img_modelo']['name'])){
            $formatosPermitidos = array("png","jpg","jpeg","gif");
            $extensao = pathinfo($_FILES['img_modelo']['name'], PATHINFO_EXTENSION);
            if(in_array($extensao, $formatosPermitidos)) {
              //echo "Formato {$extensao} válido";
              $pasta = "img/"; //endereço da pasta upload
              $temporario = $_FILES['img_modelo']['tmp_name'];
              $novoNome = uniqid().".{$extensao}";                       
              if(move_uploaded_file($temporario, $pasta.$novoNome)){
                /*echo "Arquivo enviado!";*/                            
              } else{
                echo "Arquivo não enviado";
              }
            }else{
              echo "Formato {$extensao} inválido";
            }
          }else{
            $novoNome = $img_modelo;
          }
          $update = "UPDATE tb_modelo SET nome_modelo=:nome_modelo,img_modelo=:img_modelo,codigo_modelo=:codigo_modelo,desc_modelo=:desc_modelo,tamPP=:tamPP,tamP=:tamP,tamM=:tamM,tamG=:tamG,tamGG=:tamGG,preco_modelo=:preco_modelo,total_modelo=:total_modelo WHERE id_modelo=:id";
          try{
            $result = $conect->prepare($update);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->bindParam(':nome_modelo',$nome_modelo,PDO::PARAM_STR);
            $result->bindParam(':codigo_modelo',$codigo_modelo,PDO::PARAM_STR);
            $result->bindParam(':desc_modelo',$desc_modelo,PDO::PARAM_STR);
            $result->bindParam(':tamPP',$tamPP,PDO::PARAM_STR);
            $result->bindParam(':tamP',$tamP,PDO::PARAM_STR);
            $result->bindParam(':tamM',$tamM,PDO::PARAM_STR);
            $result->bindParam(':tamG',$tamG,PDO::PARAM_STR);
            $result->bindParam(':tamGG',$tamGG,PDO::PARAM_STR);
            $result->bindParam(':preco_modelo',$preco_modelo,PDO::PARAM_STR);
            $result->bindParam(':total_modelo',$total_modelo,PDO::PARAM_STR);
            $result->bindParam(':img_modelo', $novoNome ,PDO::PARAM_STR);
            $result->execute();
            $contar = $result->rowCount();
            if ($contar>0) {
              echo '<div class="alert alert-success" role="alert">Dados Cadastrados com sucesso!</div>';
              header("Refresh: 4, home.php?acao=modeloTAB"); 
            }else{
              echo '<div class="alert alert-danger" role="alert">Dados Não Cadastrados!</div>';          
            }
          }
          catch(PDOException $e){
            echo "<b>ERRO DE PDO= </b>".$e->getMessage();
          }
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
 




