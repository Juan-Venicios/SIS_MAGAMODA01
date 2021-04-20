<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> clientes Cadastradas</h3>
        <a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=funcionario"> <i class="fa fa-plus-square-o" 
        ></i>  Novo</a>
        <table class="table table-striped" id="minhaTabela">
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
                    <th>Deletar</th>
                    <th>Ver</th>
                    <th>Editar</th>           
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('conect/conect.php');
                    $select = "SELECT * FROM tb_cliente";
                    try{
                        $result = $conect->prepare($select);
                        $result-> execute();
                        $contar = $result-> rowCount();
                        if($contar>0){
                            while($show = $result ->FETCH(PDO::FETCH_OBJ)){                
                ?>
                <tr>
                    <td><?php echo $show->nome_cliente; ?></td>
                    <td><?php echo $show->email_cliente; ?></td>
                    <td><?php echo $show->uf_cliente; ?></td>
                    <td><?php echo $show->cidade_cliente; ?></td>
                    <td><?php echo $show->bairro_cliente; ?></td>
                    <td><?php echo $show->cep_cliente; ?></td>
                    <td><?php echo $show->rua_cliente; ?></td>
                    <td><?php echo $show->cpf_cliente; ?></td>
                    <td><?php echo $show->telefone_cliente  ; ?></td>                    
                    <td><a href="paginas/delete/deletecliente.php?deletar=<?php echo $show->id_cliente; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>
                    <td><button  type="button" data-target="#modalVis<?php echo $show->id_cliente; ?>" data-toggle="modal" id class="btn btn-info"><i class="fa fa-sign-out"></i></button></td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditar" data-whatever="<?php echo $show->id_cliente; ?>" data-whatevernome="<?php echo $show->nome_cliente; ?>" data-whateveremail="<?php echo $show->email_cliente; ?>" data-whateveruf="<?php echo $show->uf_cliente; ?>" data-whatevercidade="<?php echo $show->cidade_cliente; ?>" data-whateverbairro="<?php echo $show->bairro_cliente; ?>" data-whatevercep="<?php echo $show->cep_cliente; ?>" data-whateverrua="<?php echo $show->rua_cliente; ?>" data-whatevercpf="<?php echo $show->cpf_cliente; ?>" data-whateverfone="<?php echo $show->telefone_cliente; ?>" data-whateversenha="<?php echo base64_decode($show->senha_cliente); ?>"><i class="fa fa-pencil"></i></button></td>
                </tr> 
                <!-- ModalVisualizar -->
                <div class="modal fade" id="modalVis<?php echo $show->id_cliente; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVisTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="modalVisTitle">Visualizar Dados da(o) clienteureira(o)</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                include_once('conect/conect.php');
                                $id = $show->id_cliente;
                                $select = "SELECT * FROM tb_cliente WHERE id_cliente=:id";
                                try{
                                    $resultado = $conect->prepare($select);
                                    $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                                    $resultado->execute();
                                    $contar = $resultado->rowCount();
                                    if($contar > 0){
                                        while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                            $id_cliente = $show->id_cliente;
                                            $nome_cliente = $show->nome_cliente;
                                            $uf_cliente = $show->uf_cliente;
                                            $cidade_cliente = $show->cidade_cliente;
                                            $bairro_cliente = $show->bairro_cliente;
                                            $cep_cliente = $show->cep_cliente;
                                            $rua_cliente = $show->rua_cliente;
                                            $email_cliente = $show->email_cliente;
                                            $senha_cliente = $show->senha_cliente;
                                            $cpf_cliente = $show->cpf_cliente;
                                            $telefone_cliente = $show->telefone_cliente;
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id(parametro)
                                        informado :( </div>';
                                    }
                                }catch(PDOException $e){
                                    echo "<b>Erro de Select do PDO</b>".$e->getMessage();
                                }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 detailed">
                                            <h4 class="mb">DADOS DO COLABORADOR</h4>
                                            <div class="rom">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Nome:</b></label>
                                                        <label class="form-control" style="border: solid; border-radius: 5px;"><?php echo $nome_cliente; ?></label>                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>UF:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $uf_cliente; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Cidade:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cidade_cliente; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Bairro:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $bairro_cliente; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>CEP:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cep_cliente; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>E-mail:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $email_cliente; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Senha:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo base64_decode($senha_cliente); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Telefone:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $telefone_cliente; ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>CPF:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cpf_cliente; ?></label>
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
                        <h3 class="modal-title" id="modalEditarTitle">Atualizar Dados da(o) clienteureira(o)</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 detailed">
                                    <h4 class="mb">DADOS DO MODELO</h4>
                                    <div class="rom">
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label class="control-label">Nome</label>                 
                                                <input  type="text"  value="" lenght="10"  name="nome_cliente" id="recipient-nome" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Endereço:</label>     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">UF:</label>
                                                <select name="uf_cliente" id="uf_cliente" class="form-control">
                                                    <option value="<?php echo $uf_cliente; ?>" disabled="" selected="">Estado</option>
                                                    <option value="acre">AC</option>
                                                    <option value="alagoas">AL</option>
                                                    <option value="amapa">AP</option>
                                                    <option value="amazonas">AM</option>
                                                    <option value="bahia">BA</option>
                                                    <option value="ceara">CE</option>
                                                    <option value="df">DF</option>
                                                    <option value="es">ES</option>
                                                    <option value="goias">GO</option>
                                                    <option value="maranhao">MA</option>
                                                    <option value="matog">MT</option>
                                                    <option value="matogs">MS</option>
                                                    <option value="minasg">MG</option>
                                                    <option value="para">PA</option>
                                                    <option value="paraiba">PB</option>
                                                    <option value="parana">PR</option>
                                                    <option value="pernambuco">PE</option>
                                                    <option value="piaui">PI</option>
                                                    <option value="riodej">RJ</option>
                                                    <option value="riogdon">RN</option>
                                                    <option value="riogdos">RS</option>
                                                    <option value="rondonia">RO</option>
                                                    <option value="roraima">RR</option>
                                                    <option value="santac">SC</option>
                                                    <option value="saopaulo">SP</option>
                                                    <option value="sergipe">SE</option>
                                                    <option value="tocantins">TO</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Cidade:</label>
                                                <input type="text" value="" name="cidade_cliente" id="recipient-cidade" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Bairro:</label>
                                                <input type="text" value="" name="bairro_cliente" id="recipient-bairro" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">CEP:</label>
                                                <input type="text" value="" name="cep_cliente" id="recipient-cep" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Rua:</label>
                                                <input type="text" value="" name="rua_cliente" id="recipient-rua" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Telefone:</label>
                                                <input type="text" value="" name="telefone_cliente" id="recipient-fone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">E-mail</label>
                                                <input name="email_cliente" value="" type="email" id="recipient-email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">CPF:</label>
                                                <input type="text" value="" name="cpf_cliente" id="recipient-cpf" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Senha</label>
                                                <input type="text" value="" name="senha_cliente" id="recipient-senha" class="form-control">
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
                            $nome_cliente = trim(strip_tags($_POST['nome_cliente']));
                            $uf_cliente = trim(strip_tags($_POST['uf_cliente']));
                            $cidade_cliente = trim(strip_tags($_POST['cidade_cliente']));
                            $bairro_cliente = trim(strip_tags($_POST['bairro_cliente']));
                            $cep_cliente = trim(strip_tags($_POST['cep_cliente']));
                            $rua_cliente = trim(strip_tags($_POST['rua_cliente']));
                            $email_cliente = trim(strip_tags($_POST['email_cliente']));
                            $senha_cliente = trim(strip_tags(base64_encode($_POST['senha_cliente'])));
                            $cpf_cliente = trim(strip_tags($_POST['cpf_cliente']));
                            $telefone_cliente = trim(strip_tags($_POST['telefone_cliente']));
                            $update = "UPDATE tb_cliente SET nome_cliente=:nome_cliente,rua_cliente=:rua_cliente,uf_cliente=:uf_cliente,cidade_cliente=:cidade_cliente,bairro_cliente=:bairro_cliente,cep_cliente=:cep_cliente,email_cliente=:email_cliente,senha_cliente=:senha_cliente,cpf_cliente=:cpf_cliente,telefone_cliente=:telefone_cliente WHERE id_cliente=:id";
                            try{
                                $result = $conect->prepare($update);
                                $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                $result-> bindParam(':nome_cliente',$nome_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':uf_cliente',$uf_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':cidade_cliente',$cidade_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':bairro_cliente',$bairro_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':cep_cliente',$cep_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':rua_cliente',$rua_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':email_cliente',$email_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':senha_cliente',$senha_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':cpf_cliente',$cpf_cliente,PDO::PARAM_STR);
                                $result-> bindParam(':telefone_cliente',$telefone_cliente,PDO::PARAM_STR);
                                $result-> execute();
                                $contar = $result-> rowCount();
                                if($contar > 0){
                                    echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                    header("Location: home.php?acao=clienteTAB");
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
		var recipientemail = button.data('whateveremail')
        var recipientuf = button.data('whateveruf')
        var recipientcidade = button.data('whatevercidade')
        var recipientbairro = button.data('whateverbairro')
        var recipientcep = button.data('whatevercep')
        var recipientrua = button.data('whateverrua')
        var recipientcpf = button.data('whatevercpf')
        var recipientfone = button.data('whateverfone')
        var recipientsenha = button.data('whateversenha')
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('#id').val(recipient)
		modal.find('#recipient-nome').val(recipientnome)
		modal.find('#recipient-email').val(recipientemail)
        modal.find('#recipient-uf').val(recipientuf)
        modal.find('#recipient-cidade').val(recipientcidade)
        modal.find('#recipient-bairro').val(recipientbairro)
        modal.find('#recipient-cep').val(recipientcep)
        modal.find('#recipient-rua').val(recipientrua)
        modal.find('#recipient-cpf').val(recipientcpf)
        modal.find('#recipient-fone').val(recipientfone)
        modal.find('#recipient-senha').val(recipientsenha)
	})
</script><!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/jQueryMasked.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/util.validate.js"></script>
<script>
    jQuery(function($){
        $("#recipient-cep").mask('99999-999');
        $("#recipient-cpf").mask('999.999.999-99');
        $("#recipient-fone").mask('(99) 99999-9999');
    });
</script>











    