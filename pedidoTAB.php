

   <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Costureiras(os) Cadastradas(os)</h3>
        

    
                          
    <table class="table table-striped" id="minhaTabela">
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
                                      <th>Preço Total</th>
                                      <th>Data/Expedição</th>
                                      <th>Data/Entrega</th>
                                      <th>OK/ENT</th>
                                      <th>OK/DEV</th>
                                      <th>Ver</th>
                                      <th>OBS</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>
                                  <?php
                                   include_once('conect/conect.php'); 

                                $select = "SELECT * FROM tb_pedido WHERE nome_pedido='$nome_cost'";
                                try{
                                    $result = $conect->prepare($select);
                                    $result->bindParam(':id',$id_pedido,PDO::PARAM_INT);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar>0){
                                        while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                                        
                                ?>
                                    <tr>
                                      <td><?php echo $show->nome_pedido; ?></td>
                                      <td><?php echo $show->modelo_pedido?></td>
                                      <td><?php echo $show->ptamPP; ?></td>
                                      <td><?php echo $show->ptamP; ?></td>
                                      <td><?php echo $show->ptamM; ?></td>
                                      <td><?php echo $show->ptamG; ?></td>
                                      <td><?php echo $show->ptamGG; ?></td>
                                      <td><?php echo $show->total_pedido; ?></td>
                                      <td>R$<?php echo $show->preco_total; ?></td>
                                      <td><?php echo $show->data_pedido; ?></td>
                                      <td><?php echo $show->data_entrega; ?></td>
                                      <td><?php if ($show->ok_ent == '1') {
	                                               echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                                      } ?></td>
                                      <td><?php if ($show->ok_dev == '1') {
	                                               echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                                      } ?></td>

                                      <td><a href="home.php?acao=vispedido&vispedido=<?php echo $show->id_pedido;?>" class="btn btn-info"><i class="fa fa-sign-out"></i></a></td>

                                      <td><a href="home.php?acao=obspedido&obspedido=<?php echo $show->id_pedido;?>" class="btn btn-warning"><i class="fa fa-exclamation" aria-hidden="true"></i>
                                    
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
                                    </tbody>

     </table>

</div>

      </section>
    </section>