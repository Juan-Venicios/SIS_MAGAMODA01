<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['id'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['id'];
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

<body>
  <section style="background: #;" id="container">
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


   

    <section  id="main-content">
      <section class="wrapper site-min-height">

        <h3><i class="fa fa-angle-right"></i>Informe sua Observação</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" id="form_NovoPerfil">
       
       <h4 class="mb">OBSERVAÇÃO</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

  
  
                       <div class="form-group">
                              <label class="control-label">Observação</label>
                              <textarea name="obs" id="obs" style="margin-top: 5%;" rows="10" class="form-control" placeholder="Digite sua Observação"></textarea>
                       </div>
  </div>
</div>                                          
 <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
            </div>

                 



</div>

      </form>
      <?php
                        include_once('conect/conect.php'); 
                        if(isset($_POST['botao'])){
                            $id_pedidoobs = $id_pedido;
                            $obs = trim(strip_tags($_POST['obs']));


                            $cadastro = "INSERT INTO tb_observacao (id_pedidoobs,obs)
                             VALUES (:id_pedidoobs,:obs)";
                            try{
                                $result = $conect->prepare($cadastro);
                                $result-> bindParam(':id_pedidoobs',$id_pedidoobs,PDO::PARAM_STR);
                                $result-> bindParam(':obs',$obs,PDO::PARAM_STR);
                                $result-> execute();
                                $contar = $result-> rowCount();
                                if($contar > 0){
                                    echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                    header("Location: home.php?acao=obsTAB");
                                }else{ 
                                    echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
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
 




