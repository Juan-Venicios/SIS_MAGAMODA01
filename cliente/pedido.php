<body>
    <section style="background: #;" id="container">
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section  id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i>Realizar Pedido</h3>
                <div class="row mt">
                    <div class="col-lg-12 mt">
                        <div class="row">  
                            <div>
                                <div class="row">
                                    <div class="col-lg-12 detailed">
                                        <form action="" method="post" id="form_NovoPerfil">
                                            <h4 class="mb">Dados do Pedido</h4>
                                            <div class="col-lg-6" style="margin-left: 25%; ">
                                                <div class="form-group">
                                                    <label class="control-label">Nome do Modelo</label>
                                                    <select name="modelo_pedido" class="form-control">
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
                                                        <option value="<?php echo $show ->nome_modelo;?>"><?php echo $show ->nome_modelo;?></option>
                                                        <?php
                                                                    }
                                                                }else{
                                                                    echo '<div class="alert alert-danger" role="alert">Não há dados!</div>';
                                                                }
                                                            }catch(PDOException $e){
                                                                echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Tipo de gola</label>
                                                            <select name="gola" id="gola" class="form-control" required="">
                                                                <option value="" disabled="" selected="">GOLA</option>
                                                                <option value="GOLA POLO">GOLA POLO</option>
                                                                <option value="GOLA ALTA">GOLA ALTA</option>
                                                                <option value="GOLA V">GOLA V</option>
                                                                <option value="GOLA CARECA">GOLA CARECA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Tipo de Manga</label>
                                                            <select name="manga" id="manga" class="form-control" required="">
                                                                <option value="" disabled="" selected="">Manga</option>
                                                                <option value="MANGA LONGA">MANGA LONGA</option>
                                                                <option value="MANGA CURTA">MANGA CURTA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label class="control-label">Nome que ficarar na camisa</label>
                                                            <input  value="" type="text"  name="nome_cam" id="nome_cam" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Nº da Camisa</label>
                                                            <input  value="" type="text"  name="num_cam" id="num_cam"  class="form-control">
                                                        </div>
                                                    </div>                                            
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group vis">
                                                                <label class="control-label">QUANTIDADE</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="control-label">PP</label>
                                                            <input  value="" type="text"  name="ptamPP" id="ptamPP" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="control-label">P</label>
                                                            <input  value="" type="text"  name="ptamP" id="ptamP"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="control-label">M</label>
                                                            <input  value="" type="text"  name="ptamM" id="ptamM"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="control-label">G</label>
                                                            <input  value="" type="text"  name="ptamG" id="ptamG"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="control-label">GG</label>
                                                            <input  value="" type="text"  name="ptamGG" id="ptamGG"  class="form-control">
                                                        </div>
                                                    </div>                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Forma de Pagamento</label>
                                                            <select name="fpag" id="fpag" class="form-control" required="">
                                                                <option value="" disabled="" selected="">Pagamento</option>
                                                                <option value="Em Mãos">Em Mãos</option>
                                                                <option value="Nubank">Nubank</option>
                                                                <option value="Visa">Visa</option>
                                                                <option value="Itaucard">Itaucard</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Parcelas</label>
                                                            <select name="parcelas" id="parcelas" class="form-control" required="">
                                                                <option value="" disabled="" selected="">PARCELAS</option>
                                                                <option value="À VISTA">À VISTA</option>
                                                                <option value="PARCELADO EM 2X">PARCELADO EM 2X</option>
                                                                <option value="PARCELADO EM 3X">PARCELADO EM 3X</option>
                                                                <option value="PARCELADO EM 4X">PARCELADO EM 4X</option>
                                                                <option value="PARCELADO EM 5X">PARCELADO EM 5X</option>
                                                                <option value="PARCELADO EM 6X">PARCELADO EM 6X</option>
                                                                <option value="PARCELADO EM 7X">PARCELADO EM 7X</option>
                                                                <option value="PARCELADO EM 8X">PARCELADO EM 8X</option>
                                                                <option value="PARCELADO EM 9X">PARCELADO EM 9X</option>
                                                                <option value="PARCELADO EM 10X">PARCELADO EM 10X</option>
                                                                <option value="PARCELADO EM 11X">PARCELADO EM 11X</option>
                                                                <option value="PARCELADO EM 12X">PARCELADO EM 12X</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Efetuar</button>
                                        </form>
                                        <?php
                                            include_once('conect/conect.php');
                                            if (isset($_POST['botao'])) {
                                                $modelo_pedido = $_POST['modelo_pedido'];
                                                $nome_pedido = $_POST['nome_pedido'];
                                                $select = "SELECT * FROM tb_modelo WHERE codigo_modelo=:modelo_pedido";
                                                try{
                                                    $resultado = $conect->prepare($select);
                                                    $resultado->bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_STR);
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
                                                        exit;
                                                    }
                                                }catch(PDOException $e){
                                                    echo "<b>Erro de Select do PDO</b>".$e->
                                                    getMessage();
                                                }
                                                $nome_pedido = $_POST['nome_pedido'];
                                                $modelo_pedido= $_POST['modelo_pedido'];
                                                $ptamPP = $_POST['ptamPP'];
                                                $ptamP = $_POST['ptamP'];
                                                $ptamM = $_POST['ptamM'];
                                                $ptamG = $_POST['ptamG'];
                                                $ptamGG = $_POST['ptamGG'];
                                                $data_pedido= date('d/m/Y');
                                                $data_entrega= date('d/m/Y', strtotime('+7 days,0 month,0 Year'));
                                                $qtd_total =  $ptamPP+$ptamP+$ptamM+$ptamG+$ptamGG;
                                                $preco_pedido = $preco_modelo;
                                                $preco_total = $qtd_total*$preco_pedido;
                                                $cadastro = "INSERT INTO tb_pedido_cliente (modelo_pedido,nome_pedido,ptamPP,ptamP,ptamM,ptamG,ptamGG,qtd_total,data_pedido,data_entrega,preco_pedido,preco_total)
                                                VALUES (:modelo_pedido,:nome_pedido,:ptamPP,:ptamP,:ptamM,:ptamG,:ptamGG,:qtd_total,:data_pedido,:data_entrega,:preco_pedido,:preco_total)";
                                                try{
                                                    $result = $conect->prepare($cadastro);
                                                    $result->bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_STR);
                                                    $result->bindParam(':nome_pedido',$nome_pedido,PDO::PARAM_STR);
                                                    $result->bindParam(':ptamPP',$ptamPP,PDO::PARAM_INT);
                                                    $result->bindParam(':ptamP',$ptamP,PDO::PARAM_INT);
                                                    $result->bindParam(':ptamM',$ptamM,PDO::PARAM_INT);
                                                    $result->bindParam(':ptamG',$ptamG,PDO::PARAM_INT); 
                                                    $result->bindParam(':ptamGG',$ptamGG,PDO::PARAM_INT);
                                                    $result->bindParam(':qtd_total',$qtd_total,PDO::PARAM_INT);
                                                    $result->bindParam(':data_pedido',$data_pedido,PDO::PARAM_STR);
                                                    $result->bindParam(':data_entrega',$data_entrega,PDO::PARAM_STR);
                                                    $result->bindParam(':preco_pedido',$preco_pedido,PDO::PARAM_INT);
                                                    $result->bindParam(':preco_total',$preco_total,PDO::PARAM_INT); 
                                                    if ($ptamPP > $tamPP || $ptamP > $tamP || $ptamM > $tamM || $ptamG > $tamG || $ptamGG > $tamGG) {
                                                        echo '<div class="alert alert-danger"><strong>Aviso! Quantidade Indisponível :( </div>';
                                                        exit;
                                                    }else {
                                                        $result-> execute();
                                                        $contar = $result-> rowCount();
                                                        if($contar>0){
                                                            $select = "SELECT * FROM tb_modelo WHERE codigo_modelo=:modelo_pedido";
                                                            $uptamPP = $tamPP-$ptamPP;
                                                            $uptamP = $tamP-$ptamP;
                                                            $uptamM = $tamM-$ptamM;
                                                            $uptamG = $tamG-$ptamG;
                                                            $uptamGG = $tamGG-$ptamGG;
                                                            $total_modelo= $uptamPP+$uptamP+$uptamM+$uptamG+$uptamGG;
                                                            $update = "UPDATE tb_modelo SET tamPP=:tamPP,tamP=:tamP,tamM=:tamM,tamG=:tamG,tamGG=:tamGG,total_modelo=:total_modelo WHERE id_modelo=:id_modelo";
                                                            try{
                                                                $result = $conect->prepare($update);
                                                                $result-> bindParam(':id_modelo',$id_modelo,PDO::PARAM_INT);
                                                                $result->bindParam(':tamPP',$uptamPP,PDO::PARAM_INT);
                                                                $result->bindParam(':tamP',$uptamP,PDO::PARAM_INT);
                                                                $result->bindParam(':tamM',$uptamM,PDO::PARAM_INT);
                                                                $result->bindParam(':tamG',$uptamG,PDO::PARAM_INT);
                                                                $result->bindParam(':tamGG',$uptamGG,PDO::PARAM_INT);
                                                                $result->bindParam(':total_modelo',$total_modelo,PDO::PARAM_INT);
                                                                if ($uptamPP < 0 || $uptamP < 0 || $uptamM < 0 || $uptamG < 0 || $uptamGG < 0) {
                                                                    header("Refresh: 4, home.php?acao=pedidoTAB");
                                                                    exit;
                                                                }else{
                                                                    $result-> execute();
                                                                    $contar = $result-> rowCount(); 
                                                                    if($contar > 0){
                                                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>';
                                                                        header("Refresh: 4, home.php?acao=pedidoTAB");
                                                                    }else{ 
                                                                        echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                                                        exit;
                                                                    }
                                                                }
                                                            }catch(PDOException $e){
                                                            echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                                            }
                                                        }else{
                                                        }
                                                    }
                                                }catch(PDOException $e){
                                                    echo "<b>ERRO DE PDO= </b>".$e->getMessage();
                                                }
                                                //$mensagem = "Upload feito com sucesso!";
                                                //var_dump($_FILES);
                                                /*$select = "SELECT * FROM tb_cost WHERE nome_cost=:nome_pedido";
                                                $updispon_cost = $_POST['dispon_cost'];
                                                $update = "UPDATE tb_cost SET dispon_cost=:dispon_cost WHERE nome_cost=:nome_pedido";
                                                try{
                                                    $result = $conect->prepare($update);
                                                    $result-> bindParam(':id_cost',$id_cost,PDO::PARAM_INT);
                                                    $result->bindParam(':dispon_cost',$updispon_cost,PDO::PARAM_STR);
                                                    $result-> execute();
                                                    $contar = $result-> rowCount();
                                                    if($contar > 0){
                                                        header("Refresh: 4, home.php?acao=pedidoTAB");
                                                    }else{
                                                        header("Location: home.php");
                                                    }
                                                }catch(PDOException $e){
                                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                                }*/                                  
                                            }
                                        ?>
                                    </div>
                                <!-- /col-lg-8 -->
                                </div>
                            </div>
                        </div>
                    <!-- /row -->
                    </div>
                </section>
            <!-- /wrapper -->
        </section>
 




