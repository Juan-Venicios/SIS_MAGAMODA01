<body>
    <section style="background: #;" id="container">
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Cadastrar Modelo</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">
                            <div class="col-lg-12 detailed">
                                <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">
                                    <h4 class="mb">DADOS DO MODELO</h4>
                                    <div class="col-lg-6" style="margin-left: 25%; ">
                                        <div class="form-group ">
                                            <label class="control-label">Nome</label>                    
                                            <input style="text-transform: uppercase;"  value="" type="text" lenght="10"  name="nome_modelo" id="nome_modelo" class="form-control" required="">                     
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Código</label>
                                            <input style="text-transform: uppercase;" value="" type="text" name="codigo_modelo" id="codigo_modelo" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Descrição</label>
                                            <textarea name="desc_modelo" id="desc_modelo" rows="3" class="form-control" placeholder="Descrição do Modelo"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Quantidades por Tamanhos</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">PP</label>
                                                    <input  value="" type="number"  name="tamPP" id="tamPP" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">P</label>
                                                    <input  value="" type="number"  name="tamP" id="tamP" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">M</label>
                                                    <input  value="" type="number"  name="tamM" id="tamM" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">G</label>
                                                    <input  value="" type="number"  name="tamG" id="tamG" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">GG</label>
                                                    <input  value="" type="number"  name="tamGG" id="tamGG" class="form-control">
                                                </div>
                                            </div>     
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="control-label">Preço</label>
                                                    <input  value="" type="text"  name="preco_modelo" id="preco_modelo" class="form-control">
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>      
                                    <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
                                </form>
                                <?php
                                    include_once('conect/conect.php');
                                    if (isset($_POST['botao'])) {
                                        $nome_modelo = $_POST['nome_modelo'];
                                        $codigo_modelo = $_POST['codigo_modelo'];
                                        $desc_modelo = $_POST['desc_modelo'];
                                        $tamPP = $_POST['tamPP'];
                                        $tamP = $_POST['tamP'];
                                        $tamM = $_POST['tamM'];
                                        $tamG = $_POST['tamG'];
                                        $tamGG = $_POST['tamGG'];
                                        $preco_modelo = $_POST['preco_modelo'];
                                        $total_modelo = $tamPP+$tamP+$tamM+$tamG+$tamGG;
                                        $cadastro = "INSERT INTO tb_modelo (nome_modelo,codigo_modelo,desc_modelo,tamPP,tamP,tamM,tamG,tamGG,preco_modelo,total_modelo)
                                        VALUES (:nome_modelo,:codigo_modelo,:desc_modelo,:tamPP,:tamP,:tamM,:tamG,:tamGG,:preco_modelo,:total_modelo)";
                                        try{
                                            $result = $conect->prepare($cadastro);
                                            $result->bindParam(':nome_modelo',$nome_modelo,PDO::PARAM_STR);
                                            $result->bindParam(':codigo_modelo',$codigo_modelo,PDO::PARAM_STR);
                                            $result->bindParam(':desc_modelo',$desc_modelo,PDO::PARAM_STR);
                                            $result->bindParam(':tamPP',$tamPP,PDO::PARAM_INT);
                                            $result->bindParam(':tamP',$tamP,PDO::PARAM_INT);
                                            $result->bindParam(':tamM',$tamM,PDO::PARAM_INT);			              
                                            $result->bindParam(':tamG',$tamG,PDO::PARAM_INT);
                                            $result->bindParam(':tamGG',$tamGG,PDO::PARAM_INT);
                                            $result->bindParam(':preco_modelo',$preco_modelo,PDO::PARAM_STR);
                                            $result->bindParam(':total_modelo',$total_modelo,PDO::PARAM_INT);
                                            $result->execute();
                                            $contar = $result->rowCount();
                                            if($contar>0){
                                                echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>CADASTRADO COM SUCESSO!</strong></div>';
                                                header("Location: home.php?acao=modeloTAB");
                                            }else{
                                                echo 'Dados não cadastrados!';
                                            }
                                        }catch(PDOException $e){
                                            echo "<b>ERRO DE PDO= </b>".$e->getMessage();
                                        }
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
    $("#preco_modelo").mask('99.00');
    });
</script>
<script>
    $(function(){
        $("#form_NovoPerfil").validate({
            rules: {
                nome_modelo:{
                    required: true
                },
                codigo_modelo:{
                    required: true
                },
            },
            messages: {
                nome_modelo: {
                    required: "Digite o nome do modelo!"
                },
                codigo_modelo: {
                    required: "Digite o código do modelo!"
                },
            }
        });
    });
</script>
 




