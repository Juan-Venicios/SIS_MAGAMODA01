<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['pedido'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['pedido'];
                        $select = "SELECT * FROM tb_pedido WHERE id_pedido=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_pedido = $show->id_pedido;
                                    $nome_pedido = $show->nome_pedido;
                                    $modelo_pedido = $show->modelo_pedido;
                                    $data_pedido = $show->data_pedido;
                                    $data_entrega = $show->data_entrega;
                                    $ptamPP = $show->ptamPP;
                                    $ptamP = $show->ptamP;
                                    $ptamM = $show->ptamM;
                                    $ptamG = $show->ptamG;
                                    $ptamGG = $show->ptamGG;
                                    $total_pedido = $show->total_pedido;
                                    $preco_unitario = $show->preco_unitario;
                                    $preco_total = $show->preco_total;
                                }
                            }else{
                                echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id(parametro)
                                informado :( </div>';
                            }
                        }catch(PDOException $e){
                            echo "<b>Erro de Select do PDO</b>".$e->
                            getMessage();
                        }
                        $select = "SELECT * FROM tb_modelo WHERE codigo_modelo=:modelo_pedido";
                 try{
                  $resultado = $conect->prepare($select);
                  $resultado->bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_INT);
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

        <h3><i class="fa fa-angle-right"></i>Atualizar Dados do Pedido</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO PEDIDO</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

                       <div class="form-group">
                              <label class="control-label">Nome da(o) Costureira(o)</label>                    


                              <select name="nome_pedido">
                              <?php
                                   include_once('conect/conect.php'); 

                                $select = "SELECT * FROM tb_costureira";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                                ?>
                               <option value="<?php echo $nome_pedido;?>"><?php echo $show ->nome_cost;?></option>
                               <?php
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                            ?>
                              </select>







                        </div>

                         <div class="form-group">
                            <label class="control-label">Código do Modelo</label>

                            <select name="modelo_pedido">
                              <?php
                                   include_once('conect/conect.php'); 

                                $select = "SELECT * FROM tb_modelo";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                                ?>
                               <option value="<?php echo $show ->codigo_modelo;?>"><?php echo $show ->codigo_modelo;?></option>
                               <?php
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                            ?>
                              </select>

                       </div>
                       <div class="row">
                          <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">PP</label>
                              <input  value="<?php echo $ptamPP; ?>" type="text"  name="ptamPP" id="ptamPP" class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">P</label>
                              <input  value="<?php echo $ptamP; ?>" type="text"  name="ptamP" id="ptamP"  class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">M</label>
                              <input  value="<?php echo $ptamM; ?>" type="text"  name="ptamM" id="ptamM"  class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">G</label>
                              <input  value="<?php echo $ptamG; ?>" type="text"  name="ptamG" id="ptamG"  class="form-control">
                          </div>
                </div>
                <div class="col-lg-2">
                               <div class="form-group">
                              <label class="control-label">GG</label>
                              <input  value="<?php echo $ptamGG; ?>" type="text"  name="ptamGG" id="ptamGG"  class="form-control">
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
        if(isset($_POST['botao'])){

                                $nome_pedido = trim(strip_tags($_POST['nome_pedido']));
                                $modelo_pedido = trim(strip_tags($_POST['modelo_pedido']));
                                $data_pedido = trim(strip_tags(date('d/m/Y')));
                                $data_entrega = trim(strip_tags(date('d/m/Y', strtotime('+7 days,0 month,0 Year'))));
                                $ptamPP = trim(strip_tags($_POST['ptamPP']));
                                $ptamP = trim(strip_tags($_POST['ptamP']));
                                $ptamM = trim(strip_tags($_POST['ptamM']));
                                $ptamG = trim(strip_tags($_POST['ptamG']));
                                $ptamGG = trim(strip_tags($_POST['ptamGG']));
                                $total_pedido = trim(strip_tags($ptamPP+$ptamP+$ptamM+$ptamG+$ptamGG));
                                $preco_unitario = trim(strip_tags($preco_modelo));
                                $preco_total = trim(strip_tags($total_pedido*$preco_unitario));
                                $update = "UPDATE tb_pedido SET nome_pedido=:nome_pedido,modelo_pedido=:modelo_pedido,data_pedido=:data_pedido,data_entrega=:data_entrega,ptamPP=:ptamPP,ptamP=:ptamP,ptamM=:ptamM,ptamG=:ptamG,ptamGG=:ptamGG,total_pedido=:total_pedido,preco_unitario=:preco_unitario,preco_total=:preco_total WHERE id_pedido=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                    $result-> bindParam(':nome_pedido',$nome_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':data_pedido',$data_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':data_entrega',$data_entrega,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamPP',$ptamPP,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamP',$ptamP,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamM',$ptamM,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamG',$ptamG,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamGG',$ptamGG,PDO::PARAM_STR);
                                    $result-> bindParam(':total_pedido',$total_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':preco_unitario',$preco_unitario,PDO::PARAM_STR);
                                    $result-> bindParam(':preco_total',$preco_total,PDO::PARAM_STR);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar > 0){
                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                        header("Location: home.php?acao=pedidoTAB");
                                    }else{ 
                                        echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                        header("Location: home.php?acao=pedidoTAB");
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
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
 




