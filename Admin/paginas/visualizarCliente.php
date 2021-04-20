<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['viscliente'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['viscliente'];

                           $select = "SELECT * FROM tb_cliente WHERE id_cliente=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_cliente = $show->id_cliente;
                                    $nome_cliente = $show->nome_cliente;
                                    $uf_cliente = $show->uf_cliente;
                                    $cidade_cliente = $show->cidade_cliente;
                                    $bairro_cliente = $show->bairro_cliente;
                                    $cep_cliente = $show->cep_cliente;
                                    $rua_cliente = $show->rua_cliente;
                                    $email_cliente = $show->email_cliente;
                                    $senha_cliente = $show->senha_cliente;
                                    $cpf_cliente = $show->cpf_cliente;
                                    $telefone_cliente = $show->telefone_cliente;
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

        <h3><i class="fa fa-angle-right"></i>Visualizar Dados do Cliente</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO CLIENTE</h4>

       <button  type="submit" name="botao" style="margin-left:26.4%;" id="adicionarNOVO" type="button" class="btn btn-theme">   Confirmar Login</button>


                      <div class="col-lg-6" style="margin-left: 25%; ">
                       <div class="rom">
                       <div class="col-lg-12">
                       <div class="form-group vis">
                              <label class="control-label"><b>Nome:</b></label>
                              <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $nome_cliente; ?></label>                     
                       </div>
                       </div>
                       </div>
                       <div class="rom">
                       <div class="col-lg-6">
                       <div class="form-group vis">
                            <label class="control-label"><b>UF:</b></label>
                            <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $uf_cliente; ?></label>
                       </div>
                       <div class="form-group vis">
                            <label class="control-label"><b>Cidade:</b></label>
                            <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cidade_cliente; ?></label>
                       </div>
                       </div>
                       </div>

                       <div class="rom">
                       <div class="col-lg-6">
                       <div class="form-group vis">
                            <label class="control-label"><b>Bairro:</b></label>
                            <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $bairro_cliente; ?></label>
                       </div>
                       <div class="form-group vis">
                            <label class="control-label"><b>CEP:</b></label>
                            <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cep_cliente; ?></label>
                       </div>
                       </div>
                       </div>
                       
                       <div class="rom">
                       <div class="col-lg-12">
                       <div class="form-group vis">
                              <label class="control-label"><b>E-mail:</b></label>
                              <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $email_cliente; ?></label>
                       </div>
                       </div>
                       </div>

                       <div class="rom">
                       <div class="col-lg-12">
                          <div class="form-group vis">
                              <label class="control-label"><b>Senha:</b></label>
                              <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo base64_decode($senha_cliente); ?></label>
                          </div>
                       </div>
                       </div>
                          <div class="rom">
                       <div class="col-lg-6">
                       <div class="form-group vis">
                              <label class="control-label"><b>Telefone:</b></label>
                              <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $telefone_cliente; ?></label>
                       </div>
                       </div>
                       <div class="col-lg-6">
                       <div class="form-group vis">
                            <label class="control-label"><b>CPF:</b></label>
                            <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cpf_cliente; ?></label>
                       </div>
                       </div>
                       </div>
                </div>
 </div>
</div>              
 <a type="link" href="home.php?acao=clienteTAB"class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Voltar à Tabela</a>
            </div>
</div>

      </form>
      <?php
        include_once('conect/conect.php');
        if(isset($_POST['botao'])){
                                $status_cliente = 1;
                                $update = "UPDATE tb_cliente SET status_cliente=:status_cliente WHERE id_cliente=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                    $result-> bindParam(':status_cliente',$status_cliente,PDO::PARAM_STR);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar > 0){
                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                        header("Location: home.php?acao=clienteTAB");
                                    }else{ 
                                        echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                        header("Location: home.php");
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
 




