

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
                                      <th>Endereço</th>
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
                                <td><?php echo $show->endereco_cost; ?></td>
                                <td><?php echo $show->telefone_cost; ?></td>
                               
                                <td><a href="paginas/delete/deleteCost.php?deletar=<?php echo $show->id_cost?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>

                                <td><a href="home.php?acao=viscostureira&viscostureira=<?php echo $show->id_cost;?>" class="btn btn-info"><i class="fa fa-sign-out"></i></a></td>

                                <td><a href="home.php?acao=costureira&costureira=<?php echo $show->id_cost;?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>

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
  

                                    </tr>
                     
                                    </tbody>
     </table>

</div>

      </section>
    </section>











