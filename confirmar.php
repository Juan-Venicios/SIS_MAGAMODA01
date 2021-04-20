<?php
        include_once('conect/conect.php');
                        if(!isset($_GET['pedido'])){
                            /*Header é uma função de redirecionamento*/
                        header("Location: home.php");
                        /*Oculta todos os dados da página depois da linha do erro*/
                        exit;
                        }
                        $id = $_GET['pedido'];
                        $select = "SELECT * FROM tb_pedido WHERE id_pedido=:id";
                        try{
                            $resultado = $conect->prepare($select);
                            $resultado->bindParam(':id',$id,PDO::PARAM_INT);
                            $resultado->execute();
                            $contar = $resultado->rowCount();
                            if($contar > 0){
                                while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
                                    $id_pedido = $show->id_pedido;
                                    $nome_pedido = $show->nome_pedido;
                                    $modelo_pedido = $show->modelo_pedido;
                                    $data_pedido = $show->data_pedido;
                                    $data_entrega = $show->data_entrega;
                                    $ptamPP = $show->ptamPP;
                                    $ptamP = $show->ptamP;
                                    $ptamM = $show->ptamM;
                                    $ptamG = $show->ptamG;
                                    $ptamGG = $show->ptamGG;
                                    $total_pedido = $show->total_pedido;
                                    $preco_unitario = $show->preco_unitario;
                                    $preco_total = $show->preco_total;
                                    $ok_ent = 1;
                                    $ok_dev = $show->ok_dev;
                                }
                            }else{
                                echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id(parametro)
                                informado :( </div>';
                            }
                        }catch(PDOException $e){
                            echo "<b>Erro de Select do PDO</b>".$e->
                            getMessage();
                        }
                                  $update = "UPDATE tb_pedido SET nome_pedido=:nome_pedido,modelo_pedido=:modelo_pedido,data_pedido=:data_pedido,data_entrega=:data_entrega,ptamPP=:ptamPP,ptamP=:ptamP,ptamM=:ptamM,ptamG=:ptamG,ptamGG=:ptamGG,total_pedido=:total_pedido,preco_unitario=:preco_unitario,preco_total=:preco_total,ok_ent=:ok_ent,ok_dev=:ok_dev WHERE id_pedido=:id";
                                try{
                                    $result = $conect->prepare($update);
                                    $result-> bindParam(':id',$id,PDO::PARAM_INT);
                                    $result-> bindParam(':nome_pedido',$nome_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':modelo_pedido',$modelo_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':data_pedido',$data_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':data_entrega',$data_entrega,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamPP',$ptamPP,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamP',$ptamP,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamM',$ptamM,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamG',$ptamG,PDO::PARAM_STR);
                                    $result-> bindParam(':ptamGG',$ptamGG,PDO::PARAM_STR);
                                    $result-> bindParam(':total_pedido',$total_pedido,PDO::PARAM_STR);
                                    $result-> bindParam(':preco_unitario',$preco_unitario,PDO::PARAM_STR);
                                    $result-> bindParam(':preco_total',$preco_total,PDO::PARAM_STR);
                                    $result-> bindParam(':ok_ent',$ok_ent,PDO::PARAM_STR);
                                    $result-> bindParam(':ok_dev',$ok_dev,PDO::PARAM_STR);
                                    $result-> execute();
                                    $contar = $result-> rowCount();
                                    if($contar > 0){
                                        echo '<div class="alert alert-success" role="alert">Dados cadastrados com sucesso!</div>'; 
                                        header("Location: home.php?acao=pedidoTAB");
                                    }else{ 
                                        echo '<div class="alert alert-danger" role="alert">Dados não cadastrados!</div>';
                                        header("Location: home.php?acao=pedidoTAB");
                                    }
                                }catch(PDOException $e){
                                    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
                                }
                            }
						    ?>


