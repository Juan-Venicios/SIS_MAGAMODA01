<body>
    <?php
        include_once('conect/conect.php');
        if(!isset($_GET['viscostureira'])){
            /*Header é uma função de redirecionamento*/
            header("Location: home.php");
            /*Oculta todos os dados da página depois da linha do erro*/
            exit;
        }
        $id = $_GET['viscostureira'];
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
    <section style="background: #;" id="container">
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Visualizar Dados da(o) Costureira(o)</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">
                            <div class="col-lg-12 detailed">
                                <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                                    <h4 class="mb">DADOS DO Colaborador</h4>
                                    <div class="col-lg-6" style="margin-left: 25%; ">
                                        <div class="rom">
                                            <div class="col-lg-12">
                                                <div class="form-group vis">
                                                    <label class="control-label"><b>Nome:</b></label>
                                                    <label class="form-control"style="border: solid; border-radius: 5px;"><?php echo $nome_cost; ?></label>                     
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
                                    <a type="link" href="home.php?acao=funcionarioTAB"class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Voltar à Tabela</a>
                                    </div>
                                </form>
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
 




