<body>
    <section style="background: #;" id="container">    
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Cadastro de Clientes</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">
                            <div class="col-lg-12 detailed">
                                <form action="" method="post" id="form_NovoPerfil">
                                    <h4 class="mb">DADOS DO CLIENTE</h4>
                                    <div class="col-lg-6" style="margin-left: 25%; ">
                                        <div class="rom">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome</label>                    
                                                    <input  value="" type="text" name="nome_cliente" id="nome_cliente" class="form-control" required="">                     
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
                                                    <select name="uf_cliente" id="uf_cliente" class="form-control" required="">
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
                                                    <input  value="" type="text" name="cidade_cliente" id="cidade_cliente" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">Bairro</label>
                                                    <input  value="" type="text" name="bairro_cliente" id="bairro_cliente" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">CEP</label>
                                                    <input  value="" type="text" name="cep_cliente" id="cep_cliente" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rom">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="control-label">Rua/Nº</label>
                                                    <input  value="" type="text" name="rua_cliente" id="rua_cliente" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rom">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                    <input  value="" type="email" name="email_cliente" id="email_cliente" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Senha</label>
                                                    <input  value="" type="password" name="senha_cliente" id="senha_cliente" id="addr1" class="form-control" required="">
                                                    <span class="lnr lnr-eye" style="color: #000000; background: none; position: absolute; top: 35px; right: 25px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                    <input  value="" type="text" name="telefone_cliente" id="telefone_cliente" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">CPF</label>
                                                    <input  value="" type="text" name="cpf_cliente" id="cpf_cliente" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                            <input type="hidden" name="status_cliente" value="1">
                                        </div>
                                        </div>                                          
                                            <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
                                        </div>
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
                                        $senha_cliente =     trim(strip_tags(base64_encode($_POST['senha_cliente'])));
                                        $cpf_cliente = trim(strip_tags($_POST['cpf_cliente']));
                                        $telefone_cliente = trim(strip_tags($_POST['telefone_cliente']));
                                        $status = trim(strip_tags($_POST['status_cliente']));
                                        $cadastro = "INSERT INTO tb_cliente (nome_cliente,uf_cliente,cidade_cliente,bairro_cliente,cep_cliente,rua_cliente,email_cliente,senha_cliente,cpf_cliente,telefone_cliente,status_cliente)
                                        VALUES (:nome_cliente,:uf_cliente,:cidade_cliente,:bairro_cliente,:cep_cliente,:rua_cliente,:email_cliente,:senha_cliente,:cpf_cliente,:telefone_cliente,:status_cliente)";
                                        try{
                                            $result = $conect->prepare($cadastro);
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
                                            $result->bindParam(':status_cliente',$status,PDO::PARAM_INT);
                                            $result-> execute();
                                            $contar = $result-> rowCount();
                                            if($contar > 0){
                                                echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                                header("Location: home.php?acao=clienteTAB");
                                            }else{ 
                                                echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                            }
                                        }catch(PDOException $e){
                                            echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /col-lg-8 -->
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </section>
        </section>
        <!-- /wrapper -->
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
            $("#cep_cliente").mask('99999-999');
            $("#cpf_cliente").mask('999.999.999-99');
            $("#telefone_cliente").mask('(99) 99999-9999');
        });
    </script>
    <script>
        let btn = document.querySelector('.lnr-eye');
        btn.addEventListener('click', function() {
            let input = document.querySelector('#senha_cliente');
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
                    nome_cliente:{
                        required: true
                    },
                    uf_cliente:{
                        required: true
                    },
                    cidade_cliente:{
                        required: true
                    },
                    bairro_cliente:{
                        required: true
                    },
                    cep_cliente:{
                        required: true
                    },
                    rua_cliente:{
                        required: true
                    },
                    email_cliente:{
                        required: true
                    },
                    telefone_cliente:{
                        required: true
                    },
                    cpf_cliente:{
                        required: true,
                        cpf:'both'
                    },
                    senha_cliente:{
                        required: true
                    },
                },
                messages: {
                    nome_cliente: {
                        required: "Digite seu nome!"
                    },
                    uf_cliente: {
                        required: "Informe seu Estado!"
                    },
                    cidade_cliente: {
                        required: "Digite sua cidade!"
                    },
                    bairro_cliente: {
                        required: "Digite seu bairro!"
                    },
                    cep_cliente: {
                        required: "Digite seu CEP!"
                    },
                    rua_cliente: {
                        required: "Digite sua rua e Nº!"
                    },
                    email_cliente: {
                        required: "Digite seu e-mail!"
                    },
                    telefone_cliente: {
                        required: "Digite seu telefone!"
                    },
                    cpf_cliente: {
                        required: "Digite um CPF valido!",
                    cpf_cliente:"Por favor digite um CPF valido!"
                    },
                    senha_cliente: {
                        required: "Digite sua senha!"
                    },        
                }
            });
        });
    </script>



