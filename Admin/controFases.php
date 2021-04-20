<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Costureiras(os) Cadastradas(os)</h3>
        <a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=funcionario"> <i class="fa fa-plus-square-o" 
        ></i>  Novo</a>
        <table class="table table-striped" id="minhaTabela">
            <thead>
                <tr>
                    <th>Pedido</th>
                    <th>QTD</th>
                    <th>Cliente</th>
                    <th>Costureira</th>
                    <th>Impressão</th>
                    <th>Corte Mat</th>
                    <th>Sublimação</th>
                    <th>Costura</th>
                    <th>Revisão</th>
                    <th>Transporte</th>
                    <th>Data de Entrega</th>
                    <th>Prioridade</th>
                    <th>Liberação</th>                
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
                ?>
                <tr>
                    <td><?php echo $show->id_pedido; ?></td>
                    <td><?php echo $show->total_pedido; ?></td>
                    <td></td>
                    <td><?php echo $show->nome_pedido; ?></td>
                    <td></td>
                    <td></td>
                    <td style="background: #f70000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $show->data_entrega; ?></td>
                    <td></td>
                    <td><?php echo $show->data_pedido; ?></td>                    
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











