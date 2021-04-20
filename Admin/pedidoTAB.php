<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Pedidos realizados</h3>
        <a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=pedidoCad"> <i class="fa fa-plus-square-o" 
        ></i>  Novo</a>
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
                    <th>Deletar</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>OBS</th>                     
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('conect/conect.php');
                    $select = "SELECT * FROM tb_pedido";
                    try{
                        $result = $conect->prepare($select);
                        $result-> execute();
                        $contar = $result-> rowCount();
                        if($contar>0){
                            while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                                $id= $show->id_pedido;
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
                    <td>
                        <?php if ($show->ok_ent == '1') {
                            echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                        }?>
                    </td>
                    <td>
                        <?php if ($show->ok_dev == '1') {
                            echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
                        }?>
                    </td>
                    <td><a href="paginas/delete/deletePedido.php?deletar=<?php echo $show->id_pedido?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>
                    <td><a href="home.php?acao=vispedido&vispedido=<?php echo $show->id_pedido;?>" class="btn btn-info"><i class="fa fa-sign-out"></i></a></td>
                    <td><a href="home.php?acao=pedido&pedido=<?php echo $show->id_pedido;?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>
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
    </section>
</section>











