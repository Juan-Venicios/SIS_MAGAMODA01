<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['obspedido'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['obspedido'];
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



   <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Observações do Pedido</h3>

<a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=obsCad&id=<?php echo $id_pedido?>"> <i class="fa fa-plus-square-o" 
       ></i>  Novo</a>
        

    
                          
    <table class="table table-striped" id="minhaTabela">
                                  <thead>
                                    <tr>
                                      <th>Observação</th>
                                       <th>Deletar</th>
                                      <th>Editar</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>

                                  <?php
                                   include_once('conect/conect.php'); 

                                $select = "SELECT * FROM tb_observacao WHERE id_pedidoobs=$id_pedido";
                                try{
                                    $result = $conect->prepare($select);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                            ?>
                            <tr>
                                <td><?php echo $show->obs; ?></td>
                               
                                <td><a href="paginas/delete/deleteObs.php?deletar=<?php echo $show->id_obs?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>

                                <td><a href="home.php?acao=obs&upobs=<?php echo $show->id_obs;?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>

                            </tr>
                                    
                            <?php
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                            ?>
  

                                    </tr>
                     
                                    </tbody>
     </table>

</div>

      </section>
    </section>











