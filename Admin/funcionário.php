<body>
    <section style="background: #;" id="container">
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Cadastro de Costureiras(os)</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">
                            <div class="col-lg-12 detailed">
                                <form action="" method="post" id="form_NovoPerfil">
                                    <h4 class="mb">DADOS DO COLABORADOR</h4>
                                    <div class="col-lg-6" style="margin-left: 25%; ">
                                        <div class="rom">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome</label>                    
                                                    <input  value="" type="text" name="nome_cost" id="nome_cost" class="form-control" required="">                     
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Endereço</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rom">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">UF:</label>
                                                    <select name="uf_cost" id="uf_cost" class="form-control" required="">
                                                        <option value="" disabled="" selected="">Estado</option>
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
                                                    <label class="control-label">Cidade</label>
                                                    <input  value="" type="text" name="cidade_cost" id="cidade_cost" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">Bairro</label>
                                                    <input  value="" type="text" name="bairro_cost" id="bairro_cost" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">CEP</label>
                                                    <input  value="" type="text" name="cep_cost" id="cep_cost" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rom">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="control-label">Rua/Nº</label>
                                                    <input  value="" type="text" name="rua_cost" id="rua_cost" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rom">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                    <input  value="" type="email" name="email_cost" id="email_cost" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Senha</label>
                                                    <input  value="" type="password" name="senha_cost" id="senha_cost" id="addr1" class="form-control" required="">
                                                    <span class="lnr lnr-eye" style="color: #000000; background: none; position: absolute; top: 35px; right: 25px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                    <input  value="" type="text" name="telefone_cost" id="telefone_cost" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">CPF</label>
                                                    <input  value="" type="text" name="cpf_cost" id="cpf_cost" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="dispon_cost" value="1">
                                    </div>      
                                    <div class="rom">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-theme " style="margin-left: 27%;" name="botao" ><i></i>Cadastrar</button>
                                        </div>
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
                                        $status = trim(strip_tags($_POST['status']));
                                        $dispon_cost = trim(strip_tags($_POST['dispon_cost']));
                                        $cadastro = "INSERT INTO tb_costureira (nome_cost,rua_cost,uf_cost,cidade_cost,bairro_cost,cep_cost,email_cost,senha_cost,cpf_cost,telefone_cost,status,dispon_cost)
                                        VALUES (:nome_cost,:rua_cost,:uf_cost,:cidade_cost,:bairro_cost,:cep_cost,:email_cost,:senha_cost,:cpf_cost,:telefone_cost,:status,:dispon_cost)";
                                        try{
                                            $result = $conect->prepare($cadastro);
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
                                            $result->bindParam(':status',$status,PDO::PARAM_INT);
                                            $result->bindParam(':dispon_cost',$dispon_cost,PDO::PARAM_INT);
                                            $result-> execute();
                                            $contar = $result-> rowCount();
                                            if($contar > 0){
                                                echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                                header("Location: home.php?acao=funcionarioTAB");
                                            }else{ 
                                                echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                            }
                                        }catch(PDOException $e){
                                            echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                        }//var_dump($_FILES);
                                    }
                                ?>
                            </div>
                        <!-- /col-lg-8 -->
                        </div>
                    </div>
                <!-- /row -->
                </div>
            </section>
        <!-- /wrapper -->
        </section>
    </section>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/jQueryMasked.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/util.validate.js"></script>
    <script>
        jQuery(function($){
            $("#cep_cost").mask('99999-999');
            $("#cpf_cost").mask('999.999.999-99');
            $("#telefone_cost").mask('(99) 99999-9999');
        });
    </script>
    <script>
        let btn = document.querySelector('.lnr-eye');
        btn.addEventListener('click', function() {
            let input = document.querySelector('#senha_cost');
            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
        });
    </script>
    <script>
        $(function(){
            $("#form_NovoPerfil").validate({
                rules: {
                    nome_cost:{
                        required: true
                    },
                    uf_cost:{
                        required: true
                    },
                    cidade_cost:{
                        required: true
                    },
                    bairro_cost:{
                        required: true
                    },
                    cep_cost:{
                        required: true
                    },
                    rua_cost:{
                        required: true
                    },
                    email_cost:{
                        required: true
                    },
                    telefone_cost:{
                        required: true
                    },
                    cpf_cost:{
                        required: true,
                        cpf:'both'
                    },
                    senha_cost:{
                        required: true
                    },
                },
                messages: {
                    nome_cost: {
                        required: "Digite seu nome!"
                    },
                    uf_cost: {
                        required: "Informe seu Estado!"
                    },
                    cidade_cost: {
                        required: "Digite sua cidade!"
                    },
                    bairro_cost: {
                        required: "Digite seu bairro!"
                    },
                    cep_cost: {
                        required: "Digite seu CEP!"
                    },
                    rua_cost: {
                        required: "Digite sua rua e Nº!"
                    },
                    email_cost: {
                        required: "Digite seu e-mail!"
                    },
                    telefone_cost: {
                        required: "Digite seu telefone!"
                    },
                    cpf_cost: {
                        required: "Digite um CPF valido!",
                        cpf_cost:"Por favor digite um CPF valido!"
                    },
                    senha_cost: {
                        required: "Digite sua senha!"
                    },
                }
            });
        });
    </script>



