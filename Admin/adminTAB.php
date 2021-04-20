<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Registros de login</h3>
        <form  action="" method="post">
        <table class="table table-striped" id="minhaTabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Acesso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('conect/conect.php');
                    $select = "SELECT * FROM admin";
                    try{
                        $result = $conect->prepare($select);
                        $result-> execute();
                        $contar = $result-> rowCount();
                        if($contar>0){
                            while($show = $result ->FETCH(PDO::FETCH_OBJ)){
                                $id= $show->id;
                ?>
                <tr>
                    <td><?php echo $show->nome; ?></td>
                    <td><?php echo $show->email; ?></td>
                    <td><?php echo $show->cpf; ?></td>
                    <td><?php echo $show->fone; ?></td>
                    <td>
                        <?php 
                            if ($show->status == '0') {
                                echo '<input type="hidden" name="status_admin" value="1">';

                                echo '<button type="submit" class="btn btn-danger" name="botao" ><i></i>Negado</button>';
                                $id = $show->id;
                                include_once('conect/conect.php');
                                if(isset($_POST['botao'])){
                                    $upstatus = trim(strip_tags($_POST['status_admin']));
                                    $update = "UPDATE admin SET status=:status WHERE id='$id'";
                                    try{
                                        $result = $conect->prepare($update);
                                        $result-> bindParam(':status',$upstatus,PDO::PARAM_INT);
                                        $result-> execute();
                                        $contar = $result-> rowCount();
                                        if($contar > 0){
                                            header("Location: home.php?acao=adminTAB");
                                        }else{ 
                                            header("Location: home.php?acao=adminTAB");
                                        }
                                    }catch(PDOException $e){
                                        echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                    }
                                }                            
                            }
                            if($show->status == '1'){
                                echo '<form  action="" method="post">
                                <input type="hidden" name="status_admi" value="0">
                                <button type="submit" class="btn btn-success" name="botao2" ><i></i>Concedido</button>
                                </form>';
                                if(isset($_POST['botao2'])){
                                    $upstatus = trim(strip_tags($_POST['status_admi']));
                                    $update = "UPDATE admin SET status=:status WHERE id='$id'";
                                    try{
                                        $result = $conect->prepare($update);
                                        $result-> bindParam(':status',$upstatus,PDO::PARAM_INT);
                                        $result-> execute();
                                        $contar = $result-> rowCount();
                                        if($contar > 0){
                                            header("Location: home.php?acao=adminTAB");
                                        }else{ 
                                            header("Location: home.php?acao=adminTAB");
                                        }
                                    }catch(PDOException $e){
                                        echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                    }
                                }
                            }
                        ?>
                    </td>
                </tr>            
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
        </form>
    </section>
</section>
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/jQueryMasked.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/util.validate.js"></script>










