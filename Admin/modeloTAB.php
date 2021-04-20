<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Modelos cadastrados</h3>
        <a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=modeloCad"> <i class="fa fa-plus-square-o" 
        ></i>  Novo</a>                        
        <table class="table table-striped" id="minhaTabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Qtd PP</th>
                    <th>Qtd P</th>
                    <th>Qtd M</th>
                    <th>Qtd G</th>
                    <th>Qtd GG</th>
                    <th>Total</th>
                    <th>Deletar</th>
                    <th>Ver</th>
                    <th>Editar</th>
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
                    <td><?php echo $show->codigo_modelo; ?></td>
                    <td><?php echo $show->tamPP; ?></td>
                    <td><?php echo $show->tamP; ?></td>
                    <td><?php echo $show->tamM; ?></td>
                    <td><?php echo $show->tamG; ?></td>
                    <td><?php echo $show->tamGG; ?></td>
                    <td><?php echo $show->total_modelo; ?></td>
                    <td><a href="paginas/delete/deleteModelo.php?deletar=<?php echo $show->id_modelo?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>
                    <td><button  type="button" data-target="#modalVis<?php echo $show->id_modelo; ?>" data-toggle="modal" id class="btn btn-info"><i class="fa fa-sign-out"></i></button></td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditar" data-whatever="<?php echo $show->id_modelo; ?>" data-whatevernome="<?php echo $show->nome_modelo; ?>" data-whatevercod="<?php echo $show->codigo_modelo; ?>" data-whateverdesc="<?php echo $show->desc_modelo; ?>" data-whatevertampp="<?php echo $show->tamPP; ?>" data-whatevertamp="<?php echo $show->tamP; ?>" data-whatevertamm="<?php echo $show->tamM; ?>" data-whatevertamg="<?php echo $show->tamG; ?>" data-whatevertamgg="<?php echo $show->tamGG; ?>" data-whateverpreco="<?php echo $show->preco_modelo; ?>" data-whatevertotal="<?php echo $show->total_modelo; ?>"><i class="fa fa-pencil"></i></button></td>
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
                                            <div class="form-group vis">
                                                <br></br>
                                                <label class="control-label"><b>Quantidades por Tamanhos:</b></label>
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
        <!-- ModalEditar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalEditarTitle">Atualizar Dados do Modelo</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 detailed">
                                    <h4 class="mb">DADOS DO MODELO</h4>
                                    <div class="form-group ">
                                        <label class="control-label">Nome</label>                    
                                        <input  type="text" value="" name="nome_modelo" id="recipient-nome" class="form-control">                     
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Código</label>
                                        <input type="text" value="" name="codigo_modelo" id="recipient-cod" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Descrição</label>
                                        <textarea name="desc_modelo" value="" id="recipient-desc" style="margin-top: 5%;" rows="3" class="form-control" placeholder="Descrição do Modelo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Quantidades por Tamanhos</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">PP</label>
                                                <input  value="" type="number"  name="tamPP" id="recipient-tampp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">P</label>
                                                <input  value="" type="number"  name="tamP" id="recipient-tamp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">M</label>
                                                <input  value="" type="number"  name="tamM" id="recipient-tamm" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">G</label>
                                                <input  value="" type="number"  name="tamG" id="recipient-tamg" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">GG</label>
                                                <input  value="" type="number"  name="tamGG" id="recipient-tamgg" class="form-control">
                                            </div>
                                        </div>     
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Preço</label>
                                                <input  value="" type="text"  name="preco_modelo" id="recipient-preco" class="form-control">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        <!-- /col-lg-8 -->         
                        </div>  
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-theme " style="margin-left: 27%;" name="botao" ><i></i>Editar</button>
                        </div>
                    </form>
                    <?php
                        include_once('conect/conect.php');
                        if(isset($_POST['botao'])){
                         
                            $nome_modelo = trim(strip_tags($_POST['nome_modelo']));
                            $codigo_modelo = trim(strip_tags($_POST['codigo_modelo']));
                            $desc_modelo = trim(strip_tags($_POST['desc_modelo']));
                            $tamPP = trim(strip_tags($_POST['tamPP']));
                            $tamP = trim(strip_tags($_POST['tamP']));
                            $tamM = trim(strip_tags($_POST['tamM']));
                            $tamG = trim(strip_tags($_POST['tamG']));
                            $tamGG = trim(strip_tags($_POST['tamGG']));
                            $preco_modelo = trim(strip_tags($_POST['preco_modelo']));
                            $total_modelo = $tamPP+$tamP+$tamM+$tamG+$tamGG;
                            $update = "UPDATE tb_modelo SET nome_modelo=:nome_modelo,codigo_modelo=:codigo_modelo,
                            desc_modelo=:desc_modelo,tamPP=:tamPP,tamP=:tamP,tamM=:tamM,tamG=:tamG,tamGG=:tamGG
                            ,preco_modelo=:preco_modelo,total_modelo=:total_modelo WHERE id_modelo=:id";
                            try{
                                $result = $conect->prepare($update);
                                $result-> bindParam(':id',$id_modelo,PDO::PARAM_INT);
                                $result-> bindParam(':nome_modelo',$nome_modelo,PDO::PARAM_STR);
                                $result-> bindParam(':codigo_modelo',$codigo_modelo,PDO::PARAM_STR);
                                $result-> bindParam(':desc_modelo',$desc_modelo,PDO::PARAM_STR);
                                $result-> bindParam(':tamPP',$tamPP,PDO::PARAM_INT);
                                $result-> bindParam(':tamP',$tamP,PDO::PARAM_INT);
                                $result-> bindParam(':tamM',$tamM,PDO::PARAM_INT);
                                $result-> bindParam(':tamG',$tamG,PDO::PARAM_INT);
                                $result-> bindParam(':tamGG',$tamGG,PDO::PARAM_INT);
                                $result-> bindParam(':preco_modelo',$preco_modelo,PDO::PARAM_INT);
                                $result-> bindParam(':total_modelo',$total_modelo,PDO::PARAM_INT);
                                $result-> execute();
                                $contar = $result-> rowCount();
                                if($contar > 0){
                                    echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                    header("Location: home.php?acao=modeloTAB");
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
            </div>
        </div>
    </section>
</section>
<script src="lib/bootstrap/jquery.js"></script>
<script src="lib/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#modalEditar').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		var recipientnome = button.data('whatevernome')
        var recipientcod = button.data('whatevercod')
        var recipientdesc = button.data('whateverdesc')
        var recipienttampp = button.data('whatevertampp')
        var recipienttamp = button.data('whatevertamp')
        var recipienttamm = button.data('whatevertamm')
        var recipienttamg = button.data('whatevertamg')
        var recipienttamgg = button.data('whatevertamgg')
        var recipientpreco = button.data('whateverpreco')
        var recipienttotal = button.data('whatevertotal')
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('#id').val(recipient)
		modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-cod').val(recipientcod)
        modal.find('#recipient-desc').val(recipientdesc)
        modal.find('#recipient-tampp').val(recipienttampp)
        modal.find('#recipient-tamp').val(recipienttamp)
        modal.find('#recipient-tamm').val(recipienttamm)
        modal.find('#recipient-tamg').val(recipienttamg)
        modal.find('#recipient-tamgg').val(recipienttamgg)
        modal.find('#recipient-preco').val(recipientpreco)
        modal.find('#recipient-total').val(recipienttotal)
	})
</script><!--BACKSTRETCH-->










