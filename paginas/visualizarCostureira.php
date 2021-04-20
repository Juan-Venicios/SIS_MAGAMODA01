<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['viscostureira'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['viscostureira'];
                        $select = "SELECT * FROM tb_costureira WHERE id_cost=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_cost = $show->id_cost;
                                    $nome_cost = $show->nome_cost;
                                    $endereco_cost = $show->endereco_cost;
                                    $email_cost = $show->email_cost;
                                    $senha_cost = $show->senha_cost;
                                    $telefone_cost = $show->telefone_cost;
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

        <h3><i class="fa fa-angle-right"></i>Visualizar Dados da(o) Costureira(o)</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO Colaborador</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">
                       <div class="form-group vis">
                              <label class="control-label"><b>Nome:</b></label>                    
                              <label class="control-label"><?php echo $nome_cost; ?></label>                     
                        </div>
                        

                        
                       <div class="form-group vis">
                            <label class="control-label"><b>Endereço:</b></label>
                            <label class="control-label"><?php echo $endereco_cost; ?></label>
                       </div>
                       
                       <div class="form-group vis">
                              <label class="control-label"><b>E-mail:</b></label>
                              <label class="control-label"><?php echo $email_cost; ?></label>
                       </div>
                          <div class="form-group vis">
                              <label class="control-label"><b>Senha:</b></label>
                              <label class="control-label"><?php echo base64_decode($senha_cost); ?></label>
                          </div>
                          <div class="form-group vis">
                              <label class="control-label"><b>Telefone:</b></label>
                              <label class="control-label"><?php echo $telefone_cost; ?></label>
                          </div>
                </div>
 </div>
</div>              
 <a type="link" href="home.php?acao=modeloTAB" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Voltar à Tabela</a>
            </div>
</div>

      </form>


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
 




