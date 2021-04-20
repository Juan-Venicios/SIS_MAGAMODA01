<body>
  <section style="background: #;" id="container">
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->


   

    <section  id="main-content">
      <section class="wrapper site-min-height">

        <h3><i class="fa fa-angle-right"></i>Cadastro de Costureiras(os)</h3>
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO COLABORADOR</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

  
  
                       <div class="form-group">
                              <label class="control-label">Nome</label>                    
                              <input  value="" type="text" name="nome_cost" id="nome_cost" class="form-control">                     
                       </div>
                       <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <input  value="" type="text" name="endereco_cost" id="endereco_cost" class="form-control">
                       </div>
                       <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input  value="" type="email" name="email_cost" id="email_cost" class="form-control">
                       </div>
                       <div class="form-group">
                            <label class="control-label">Senha</label>
                            <input  value="" type="text" name="senha_cost" id="senha_cost" class="form-control">
                       </div>
                       <div class="form-group">
                            <label class="control-label">Telefone</label>
                            <input  value="" type="text" name="telefone_cost" id="telefone_cost" class="form-control">
                       </div>
                       <input type="hidden" name="status" value="1">
                       <input type="hidden" name="dispon_cost" value="1">
  </div>
</div>                                          
 <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
            </div>

                 



</div>

      </form>

      <?php
                        include_once('conect/conect.php'); 
                        if(isset($_POST['botao'])){
                            $nome_cost = trim(strip_tags($_POST['nome_cost']));
                            $endereco_cost = trim(strip_tags($_POST['endereco_cost']));
                            $email_cost = trim(strip_tags($_POST['email_cost']));
                            $senha_cost =     trim(strip_tags(base64_encode($_POST['senha_cost'])));
                            $telefone_cost = trim(strip_tags($_POST['telefone_cost']));
                            $status = trim(strip_tags($_POST['status']));
                            $dispon_cost = trim(strip_tags($_POST['dispon_cost']));


                            $cadastro = "INSERT INTO tb_costureira (nome_cost,endereco_cost,email_cost,senha_cost,telefone_cost,status,dispon_cost)
                             VALUES (:nome_cost,:endereco_cost,:email_cost,:senha_cost,:telefone_cost,:status,:dispon_cost)";
                            try{
                                $result = $conect->prepare($cadastro);
                                $result-> bindParam(':nome_cost',$nome_cost,PDO::PARAM_STR);
                                $result-> bindParam(':endereco_cost',$endereco_cost,PDO::PARAM_STR);
                                $result-> bindParam(':email_cost',$email_cost,PDO::PARAM_STR);
                                $result-> bindParam(':senha_cost',$senha_cost,PDO::PARAM_STR);
                                $result-> bindParam(':telefone_cost',$telefone_cost,PDO::PARAM_STR);
                                $result->bindParam(':status',$status,PDO::PARAM_INT);
                                $result->bindParam(':dispon_cost',$dispon_cost,PDO::PARAM_INT);
                                $result-> execute();
                                $contar = $result-> rowCount();
                                if($contar > 0){
                                    echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                    header("Location: home.php?acao=funcionarioTAB");
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
 




