<body>


<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['vispedido'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['vispedido'];
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
                                    $ok_ent = $show->ok_ent;
                                    $ok_dev = $show->ok_dev;
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
                            $resultado->bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_STR);
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
                        $select = "SELECT * FROM tb_costureira WHERE nome_cost=:nome_pedido";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':nome_pedido',$nome_pedido,PDO::PARAM_STR);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_cost = $show->id_cost;
                                    $nome_cost = $show->nome_cost;
                                    $rua_cost = $show->rua_cost;
                                    $uf_cost = $show->uf_cost;
                                    $cidade_cost = $show->cidade_cost;
                                    $bairro_cost = $show->bairro_cost;
                                    $cep_cost = $show->cep_cost;
                                    $email_cost = $show->email_cost;
                                    $senha_cost = $show->senha_cost;
                                    $cpf_cost = $show->cpf_cost;
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
      <section class="wrapper">

        <h3><i class="fa fa-angle-right"></i>Visualizar Dados Do Pedido</h3>















        <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
        <button type="submit" class="btn btn-theme " style="margin-left:85%;" name="botao" >Confirmar Pedido</button>
        </form>


       <?php
        include_once('conect/conect.php');
        if(isset($_POST['botao'])){
          $upok_ent =1;
                                $update = "UPDATE tb_pedido SET ok_ent=:ok_ent WHERE id_pedido=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id_pedido,PDO::PARAM_INT);
                                    $result-> bindParam(':ok_ent',$upok_ent,PDO::PARAM_STR);
                                    
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar > 0){
                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                        header("Location: home.php?acao=pedidoTAB");
                                    }else{ 
                                        echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                        header("Location: home.php");
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                            }
						    ?>




        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row content-panel" style="margin-left: 0.5%;">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO PEDIDO</h4>

                      <table class="table table-striped">
       <thead>
                                    <tr>
                                      <th>Costureira</th>
                                      <th>Modelo</th>
                                      <th>Qtd PP</th>
                                      <th>Qtd P</th>
                                      <th>Qtd M</th>
                                      <th>Qtd G</th>
                                      <th>Qtd GG</th>
                                      <th>Total</th>
                                      <th>Data/Expedição</th>
                                      <th>Data/Entrega</th>
                                      <th>OK/ENT</th>
                                      <th>OK/DEV</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <tr>
                                      <td><?php echo $nome_pedido; ?></td>
                                      <td><?php echo $modelo_pedido?></td>
                                      <td><?php echo $ptamPP; ?></td>
                                      <td><?php echo $ptamP; ?></td>
                                      <td><?php echo $ptamM; ?></td>
                                      <td><?php echo $ptamG; ?></td>
                                      <td><?php echo $ptamGG; ?></td>
                                      <td><?php echo $total_pedido; ?></td>
                                      <td><?php echo $data_pedido; ?></td>
                                      <td><?php echo $data_entrega; ?></td>
                                      <td><?php if ($ok_ent == '1') {
	                                               echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                                      } ?></td>
                                      <td><?php if ($ok_dev == '1') {
	                                               echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                                      } ?></td>

                                    </tr>
                                    </tbody>

     </table>

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
    <section  id="main-content">
      <section class="wrapper">

        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row content-panel" style="margin-left: 0.5%;">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO Colaborador</h4>

                      <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Nome</th>
                                      <th>E-mail</th>
                                      <th>UF</th>
                                      <th>Cidade</th>
                                      <th>Bairro</th>
                                      <th>CEP</th>
                                      <th>Rua/Nº</th>
                                      <th>CPF</th>
                                      <th>Telefone</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>
                            <tr>
                                <td><?php echo $nome_cost; ?></td>
                                <td><?php echo $email_cost; ?></td>
                                <td><?php echo $uf_cost; ?></td>
                                <td><?php echo $cidade_cost; ?></td>
                                <td><?php echo $bairro_cost; ?></td>
                                <td><?php echo $cep_cost; ?></td>
                                <td><?php echo $rua_cost; ?></td>
                                <td><?php echo $cpf_cost; ?></td>
                                <td><?php echo $telefone_cost; ?></td>
                            </tr>
                     
                                    </tbody>
     </table>

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
    <section  id="main-content">
      <section class="wrapper">
        <div class="row mt">
         


          <div class="col-lg-12 mt">
            <div class="row content-panel" style="margin-left: 0.5%;">  
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO MODELO</h4>

                      <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Nome</th>
                                      <th>IMG Modelo</th>
                                      <th>Código</th>
                                      <th>Descrição</th>
                                      <th>Qtd PP</th>
                                      <th>Qtd P</th>
                                      <th>Qtd M</th>
                                      <th>Qtd G</th>
                                      <th>Qtd GG</th>
                                      <th>Total</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <tr>
                                      <td><?php echo $nome_modelo; ?></td>
                                      <td><img src="../img/<?php echo $img_modelo; ?>"width="75" height="75"></td>
                                      <td><?php echo $codigo_modelo; ?></td>
                                      <td><?php echo $desc_modelo; ?></td>
                                      <td><?php echo $tamPP; ?></td>
                                      <td><?php echo $tamP; ?></td>
                                      <td><?php echo $tamM; ?></td>
                                      <td><?php echo $tamG; ?></td>
                                      <td><?php echo $tamGG; ?></td>
                                      <td><?php echo $total_modelo; ?></td>
                                    </tr>
                                    </tbody>

     </table>
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
 




