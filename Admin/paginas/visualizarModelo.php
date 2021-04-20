<body>
    <?php
        include_once('conect/conect.php');
        if(!isset($_GET['vismodelo'])){
            /*Header é uma função de redirecionamento*/
            header("Location: home.php");
            /*Oculta todos os dados da página depois da linha do erro*/
            exit;
        }
        $id = $_GET['vismodelo'];
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
    <section style="background: #;" id="container">
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Visualizar Modelo</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">
                            <div class="col-lg-12 detailed">
                                <form action="" method="post" enctype="multipart/form-data" id="form_NovoPerfil">   
                                    <h4 class="mb">DADOS DO MODELO</h4>
                                    <div class="col-lg-6" style="margin-left: 25%; ">
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
                                                <div class="form-group">
                                                    abel class="control-label vis"> Imagem do Modelo: </label>                                         
                                                </div>
                                                    <div class="form-group">
                                                    <img src="img/<?php echo $img_modelo;?>" style="width: 75%;">
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
                                        <a type="link" href="home.php?acao=modeloTAB" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Voltar à Tabela</a>
                                        </div>
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
 

    


