<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['costureira'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['costureira'];
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

        <h3><i class="fa fa-angle-right"></i>Atualizar Dados da(o) Costureira(o)</h3>
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
                              <input  type="text"  value="<?php echo $nome_cost; ?>" lenght="10"  name="nome_cost" id="nome_cost" class="form-control">                     
                        </div>
                        
                       <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <input type="text" value="<?php echo $endereco_cost; ?>" name="endereco_cost" id="endereco_cost" class="form-control">
                       </div>
                       
                       <div class="form-group">
                              <label class="control-label">E-mail</label>
                              <input name="email_cost" value="<?php echo $email_cost; ?>" id="email_cost" type="email" class="form-control">
                       </div>
                        
                       <div class="form-group">
                            <label class="control-label">Senha</label>
                            <input type="text" value="<?php echo base64_decode($senha_cost); ?>" name="senha_cost" id="senha_cost" class="form-control">
                       </div>

                       <div class="form-group">
                            <label class="control-label">Telefone</label>
                            <input type="text" value="<?php echo $telefone_cost; ?>" name="telefone_cost" id="telefone_cost" class="form-control">
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
                                $nome_cost = trim(strip_tags($_POST['nome_cost']));
                                $endereco_cost = trim(strip_tags($_POST['endereco_cost']));
                                $email_cost = trim(strip_tags($_POST['email_cost']));
                                $senha_cost = trim(strip_tags(base64_encode($_POST['senha_cost'])));
                                $telefone_cost = trim(strip_tags($_POST['telefone_cost']));
                                $update = "UPDATE tb_costureira SET nome_cost=:nome_cost,endereco_cost=:endereco_cost,email_cost=:email_cost,senha_cost=:senha_cost,telefone_cost=:telefone_cost WHERE id_cost=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                    $result-> bindParam(':nome_cost',$nome_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':endereco_cost',$endereco_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':email_cost',$email_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':senha_cost',$senha_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':telefone_cost',$telefone_cost,PDO::PARAM_STR);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar > 0){
                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                        header("Location: home.php?acao=funcionarioTAB");
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
 




