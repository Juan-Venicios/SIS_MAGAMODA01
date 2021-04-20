<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Costureiras(os) Cadastradas(os)</h3>
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
                    $select = "SELECT * FROM tb_costureira WHERE dispon_cost=1";
                    try{
                        $result = $conect->prepare($select);
                        $result-> execute();
                        $contar = $result-> rowCount();
                        if($contar>0){
                            while($show = $result ->FETCH(PDO::FETCH_OBJ)){                
                ?>
                <tr>
                    <td><?php echo $show->nome_cost; ?></td>
                    <td><?php echo $show->email_cost; ?></td>
                    <td><?php echo $show->uf_cost; ?></td>
                    <td><?php echo $show->cidade_cost; ?></td>
                    <td><?php echo $show->bairro_cost; ?></td>
                    <td><?php echo $show->cep_cost; ?></td>
                    <td><?php echo $show->rua_cost; ?></td>
                    <td><?php echo $show->cpf_cost; ?></td>
                    <td><?php echo $show->telefone_cost; ?></td>                    
                    <td><a href="paginas/delete/deleteCost.php?deletar=<?php echo $show->id_cost; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>
                    <td><button  type="button" data-target="#modalVis<?php echo $show->id_cost; ?>" data-toggle="modal" id class="btn btn-info"><i class="fa fa-sign-out"></i></button></td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditar" data-whatever="<?php echo $show->id_cost; ?>" data-whatevernome="<?php echo $show->nome_cost; ?>" data-whateveremail="<?php echo $show->email_cost; ?>" data-whateveruf="<?php echo $show->uf_cost; ?>" data-whatevercidade="<?php echo $show->cidade_cost; ?>" data-whateverbairro="<?php echo $show->bairro_cost; ?>" data-whatevercep="<?php echo $show->cep_cost; ?>" data-whateverrua="<?php echo $show->rua_cost; ?>" data-whatevercpf="<?php echo $show->cpf_cost; ?>" data-whateverfone="<?php echo $show->telefone_cost; ?>" data-whateversenha="<?php echo base64_decode($show->senha_cost); ?>"><i class="fa fa-pencil"></i></button></td>
                </tr> 
                <!-- ModalVisualizar -->
                <div class="modal fade" id="modalVis<?php echo $show->id_cost; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVisTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="modalVisTitle">Visualizar Dados da(o) Costureira(o)</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                include_once('conect/conect.php');
                                $id = $show->id_cost;
                                $select = "SELECT * FROM tb_costureira WHERE id_cost=:id";
                                try{
                                    $resultado = $conect->prepare($select);
                                    $resultado->bindParam(':id',$id,PDO::PARAM_INT);
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
                                                        <label class="form-control" style="border: solid; border-radius: 5px;"><?php echo $nome_cost; ?></label>                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>UF:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $uf_cost; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Cidade:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cidade_cost; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Bairro:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $bairro_cost; ?></label>
                                                    </div>
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>CEP:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cep_cost; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>E-mail:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $email_cost; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-12">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Senha:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo base64_decode($senha_cost); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rom">
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>Telefone:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $telefone_cost; ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group vis">
                                                        <label class="control-label"><b>CPF:</b></label>
                                                        <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $cpf_cost; ?></label>
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
                        <h3 class="modal-title" id="modalEditarTitle">Atualizar Dados da(o) Costureira(o)</h3>
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
                                                <input  type="text"  value="" lenght="10"  name="nome_cost" id="recipient-nome" class="form-control">
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
                                                <select name="uf_cost" id="uf_cost" class="form-control">
                                                    <option value="<?php echo $uf_cost; ?>" disabled="" selected="">Estado</option>
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
                                                <input type="text" value="" name="cidade_cost" id="recipient-cidade" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Bairro:</label>
                                                <input type="text" value="" name="bairro_cost" id="recipient-bairro" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">CEP:</label>
                                                <input type="text" value="" name="cep_cost" id="recipient-cep" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Rua:</label>
                                                <input type="text" value="" name="rua_cost" id="recipient-rua" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Telefone:</label>
                                                <input type="text" value="" name="telefone_cost" id="recipient-fone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">E-mail</label>
                                                <input name="email_cost" value="" type="email" id="recipient-email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rom">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">CPF:</label>
                                                <input type="text" value="" name="cpf_cost" id="recipient-cpf" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Senha</label>
                                                <input type="text" value="" name="senha_cost" id="recipient-senha" class="form-control">
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





