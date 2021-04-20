<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Modelos cadastrados</h3>
        <a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=modeloCad"> <i class="fa fa-plus-square-o" 
        ></i>  Novo</a>                        
        <table class="table table-striped" id="minhaTabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>IMG Modelo</th>
                    <th>Código</th>
                    <th>Qtd PP</th>
                    <th>Qtd P</th>
                    <th>Qtd M</th>
                    <th>Qtd G</th>
                    <th>Qtd GG</th>
                    <th>Total</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('conect/conect.php'); 
                    $select = "SELECT * FROM tb_modelo";
                    try{
                        $result = $conect->prepare($select);
                        $result-> execute();
                        $contar = $result-> rowCount();
                        if($contar>0){
                            while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                ?>
                <tr>
                    <td><?php echo $show->nome_modelo; ?></td>
                    <td><img src="../img/<?php echo $show->img_modelo; ?>"width="75" height="75"></td>
                    <td><?php echo $show->codigo_modelo; ?></td>
                    <td><?php echo $show->tamPP; ?></td>
                    <td><?php echo $show->tamP; ?></td>
                    <td><?php echo $show->tamM; ?></td>
                    <td><?php echo $show->tamG; ?></td>
                    <td><?php echo $show->tamGG; ?></td>
                    <td><?php echo $show->total_modelo; ?></td>
                    <td><button  type="button" data-target="#modalVis<?php echo $show->id_modelo; ?>" data-toggle="modal" id class="btn btn-info"><i class="fa fa-sign-out"></i></button></td>
                </tr>
                <!-- ModalVisualizar -->
                <div class="modal fade" id="modalVis<?php echo $show->id_modelo; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVisTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="modalVisTitle">Visualizar Dados do Modelo</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                include_once('conect/conect.php');
                                $id = $show->id_modelo;
                                $select = "SELECT * FROM tb_modelo WHERE id_modelo=:id";
                                try{
                                    $resultado = $conect->prepare($select);
                                    $resultado->bindParam(':id',$id,PDO::PARAM_INT);
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
                            ?>
                            <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 detailed">
                                            <h4 class="mb">DADOS DO MODELO</h4>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Nome:</b></label>                    
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $nome_modelo; ?></label>                     
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Código:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $codigo_modelo; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Descrição:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $desc_modelo; ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"> Imagem do Modelo: </label>                                         
                                                    </div>
                                                        <div class="form-group">
                                                        <img src="../img/<?php echo $img_modelo;?>" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <br></br>
                                                        <label class="control-label"><b>Quantidades por Tamanhos:</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label">Tamanho PP:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $tamPP; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label">Tamanho P:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $tamP; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label">Tamanho M:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $tamM; ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label">Tamanho G:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $tamG; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label">Tamanho GG:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $tamGG; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label">Total:</label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $total_modelo; ?></label>
                                                    </div>
                                                </div>
                                                <div class="rom">
                                                    <div class="col-lg-12">
                                                        <div class="form-group vis">
                                                            <label class="control-label"><b>Preço:</b></label>
                                                            <label class="form-control"style="border: solid; border-radius: 5px;">R$<?php echo $preco_modelo; ?>,00</label>
                                                        </div> 
                                                    </div>
                                                </div>             
                                            </div>
                                        </div>
                                    </div>
                                <!-- /col-lg-8 -->         
                                </div>  
                                <div class="modal-footer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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










