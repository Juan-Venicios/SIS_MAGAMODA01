
  <body>
    <section id="main-content">
      <section style="" class="wrapper">
        <div class="row mt">
        


<div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4>E-mail</h4>
                  <h6>contato@magalhaesmoda.com.br</h6>

                  <h4>Telefone</h4>
                  <h6>(88) 9-9669-4533</h6>
                
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3>MAGALHÃES</h3>
               
                <p>Sistema de Controle de Produção voltado para uma melhor visualização e controle da produção da marca Magalhães.  
Criado em: 2014</p>
                <br>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="img/logo-magalhaes.png" class="img-circle"></p>
                
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->





          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">



                      <div class="col-md-6 detailed">
                         <h4>AVISO PARA OS USUÁRIOS</h4>
 <?php
        
      

            $select = "SELECT * FROM admin WHERE id=:id";

            try{
              $resultado = $conect->prepare($select);
                $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                $resultado->execute();
                //CONTA REGISTRO
                $contar = $resultado->rowCount();
            
                  while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                    $id = $show->id;
                    $nome = $show->nome;
                    $avatar = $show->avatar;
                   
                  }
            }catch(PDOException $e){
                echo "<b>ERRO DE PDO NO SELECT: </b>".$e->getMessage();
            }
        ?>



                         <form action="" method="post" enctype="multipart/form-data">
                         <textarea name="lembrar" style="margin-top: 5%;" rows="3" class="form-control" placeholder="O que você precisa lembrar?"></textarea>

                             <input type="hidden" name="nome" value="<?php echo $nome; ?>">

                             <input   type="hidden" name="avatar" value="<?php echo $avatar; ?>">

                             <input   type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="grey-style">
                          <div class="pull-right">
                            <button  type="submit" name="BotaoLembrar"  class="btn btn-sm btn-theme03" >Publicar</button>
                          </div>
                        </div>

                         
                         </form>
                       

<?php
                   include_once('conect/conect.php');
                  if (isset($_POST['BotaoLembrar'])) {
      $nome = $_POST['nome'];
      $lembrar = $_POST['lembrar'];
       $idIdentidade = $_POST['id'];
     



        if(!empty($_FILES['avatar']['name'])){
              $formatosPermitidos = array("png","jpeg","jpg","gif");
              $extensao = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
              if(in_array($extensao, $formatosPermitidos)):
                $pasta = "imapens/";
                $temporario = $_FILES['avatar']['tmp_name'];
                $novoNome = uniqid().".{$extensao}";

                if (move_uploaded_file($temporario, $pasta.$novoNome)) {
                  //Upload da Imagem
                }else{
                  $mensagem = "Erro, não foi possivel fazer o upload do arquivo!";
                }
              else:
                echo  "Formato inválido";
              endif;
            }else{
              $novoNome = $avatar;
            }

              $cadastro = "INSERT INTO mensagem (lembrar,nome,avatar,idIdentidade) VALUES (:lembrar,:nome,:avatar,:idIdentidade)";

                    try{
                      $result = $conect->prepare($cadastro);
                        $result->bindParam(':avatar',$novoNome,PDO::PARAM_STR);
                        $result->bindParam(':nome',$nome,PDO::PARAM_STR);
                        $result->bindParam(':lembrar',$lembrar,PDO::PARAM_STR);
                         $result->bindParam(':idIdentidade',$idIdentidade,PDO::PARAM_STR);
                        $result->execute();

                        $contar = $result->rowCount();
                        if($contar>0){
                        echo '<div class="alert alert-success" role="alert">
                   Mensagem adicionadado
                  </div>';
                      header("Refresh: 1, home.php?acao=principal");
                       
                      }else{
                        echo '<div class="alert alert-danger" role="alert">
                    Dados não atualizados!
                  </div>';
                      }
                  }catch(PDOException $e){
                      echo "<b>ERRO DE PDO= </b>".$e->getMessage();
                  }

            
            //var_dump($_FILES);
          }
        ?>
                


                  





           
                      
                          </ul>
                          
                  
                        <!-- /row -->


                      
                      </div>
                      <!-- /col-md-6 -->




                      <div class="col-md-6 detailed">
                        <h4>Estoque de Modelos</h4>
                        <div class="row centered mt mb">

                         <div class="col-sm-3">
                            <h1><i class="fa fa-female" aria-hidden="true"></i></h1>
                            <h3>
                              

                  <?php 
                  include_once('conect/conect.php');
                  $select = "SELECT * FROM tb_modelo WHERE total_modelo>='0'";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        echo $contar;
                                        }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                  ?>




                            </h3>
                            <h6>Modelos Disponíveis</h6>
                          </div>

                        <div class="col-sm-3">
                            <h1><i class="fa fa-scissors" aria-hidden="true"></i></h1>
                            <h3>

                  <?php 
                  include_once('conect/conect.php');
                  $select = "SELECT * FROM tb_modelo WHERE total_modelo<='0'";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        echo $contar;
                                        }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                  ?>


                            </h3>
                            <h6>Modelos em Produção</h6>
                          </div>



                          <div class="col-sm-3">
                            <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                            <h3>
                             
                  <?php 
                  include_once('conect/conect.php');
                  $select = "SELECT * FROM tb_costureira";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        echo $contar;
                                        }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                  ?>




                            </h3>
                            <h6>Costureiras Disponpiveis</h6>
                          </div>
                          <div class="col-sm-3">
                            <h1><i class="fa fa-user-times" aria-hidden="true"></i></h1>
                            <h3>
                              

                  <?php 
                  include_once('conect/conect.php');
                  $select = "SELECT * FROM tb_costureira";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        echo $contar;
                                        }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                  ?>


                            </h3>
                            <h6>Costureiras Ocupadas</h6>
                          </div>

                        </div>
                        <!-- /row -->
                      
                   





                        <?php
include_once('conect/conect.php');
            if(isset($_POST['botaoalerta'])){
              $msmalerta = trim(strip_tags($_POST['msmalerta']));
                $idUsuario = $_POST['id'];
            
              $alerta = "INSERT INTO alerta (msmalerta,idUsuario) VALUES (:msmalerta, :idUsuario)";

                    try{
                       $result = $conect->prepare($alerta);
                        $result->bindParam(':msmalerta',$msmalerta,PDO::PARAM_STR);
                        $result->bindParam(':idUsuario',$idUsuario,PDO::PARAM_STR);
                        $result->execute();

                        $contar = $result->rowCount();
                        if($contar>0){
                          echo '<div class="alert alert-success" role="alert">Aviso adicionadado!</div>';
                           header("Refresh: 1, home.php?acao=principal");
                       
                        }else{
                          echo '<div class="alert alert-danger" role="alert">Ocorreu algum erro!</div>';
                        }
                    }catch(PDOException $e){
                        echo "<b>ERRO DE PDO= </b>".$e->getMessage();
                    }
            }
          ?>








                      </div>
                      <!-- /col-md-6 -->





    <div class="row centered">            
       

      </div>


                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  
                 
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>


          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
  

<!-- ADMIN LTE 3-->



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="_cdn/script.js"></script>