<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['upobs'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['upobs'];
                        $select = "SELECT * FROM tb_observacao WHERE id_obs=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_obs = $show->id_obs;
                                    $obs = $show->obs;
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
                       <div class="form-group">
                              <label class="control-label">Observação</label>
                              <textarea value="<?php echo $obs; ?>" name="obs" id="obs" style="margin-top: 5%;" class="form-control"></textarea>
                       </div>
</div>         
<div class="rom">
<div class="col-lg-12">
 <button type="submit" class="btn btn-theme " style="margin-left: 27%;" name="botao" ><i></i>Editar</button>
            </div>
</div>

      </form>
      <?php
        include_once('conect/conect.php');
        if(isset($_POST['botao'])){
                                $nome_cost = trim(strip_tags($_POST['nome_cost']));
                                $uf_cost = trim(strip_tags($_POST['uf_cost']));
                                $cidade_cost = trim(strip_tags($_POST['cidade_cost']));
                                $bairro_cost = trim(strip_tags($_POST['bairro_cost']));
                                $cep_cost = trim(strip_tags($_POST['cep_cost']));
                                $rua_cost = trim(strip_tags($_POST['rua_cost']));
                                $email_cost = trim(strip_tags($_POST['email_cost']));
                                $senha_cost = trim(strip_tags(base64_encode($_POST['senha_cost'])));
                                $cpf_cost = trim(strip_tags($_POST['cpf_cost']));
                                $telefone_cost = trim(strip_tags($_POST['telefone_cost']));
                                $update = "UPDATE tb_costureira SET nome_cost=:nome_cost,rua_cost=:rua_cost,uf_cost=:uf_cost,cidade_cost=:cidade_cost,bairro_cost=:bairro_cost,cep_cost=:cep_cost,email_cost=:email_cost,senha_cost=:senha_cost,cpf_cost=:cpf_cost,telefone_cost=:telefone_cost WHERE id_cost=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                    $result-> bindParam(':nome_cost',$nome_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':uf_cost',$uf_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':cidade_cost',$cidade_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':bairro_cost',$bairro_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':cep_cost',$cep_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':rua_cost',$rua_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':email_cost',$email_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':senha_cost',$senha_cost,PDO::PARAM_STR);
                                    $result-> bindParam(':cpf_cost',$cpf_cost,PDO::PARAM_STR);
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
 <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>


<script type="text/javascript" src="lib/bootstrap/js/jQueryMasked.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/util.validate.js"></script>



    <script>
    jQuery(function($){
      $("#cep_cost").mask('99999-999');
      $("#cpf_cost").mask('999.999.999-99');
      $("#telefone_cost").mask('(99) 99999-9999');
    });
    </script>




