

   <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Funcionários</h3>

<a  style="margin-left:93%;" id="adicionarNOVO" type="button" class="btn btn-theme" href="home.php?acao=funcionario"> <i class="fa fa-plus-square-o" 
       ></i>  Novo</a>
        

    
                          
    <table class="table table-striped" id="minhaTabela">
                                  <thead>
                                    <tr>
                                      <th>Nome</th>
                                      <th>CPF</th>
                                      <th>RG</th>
                                       <th>Deletar</th>
                                       <th>Ver</th>
                                      <th>Editar</th>
                                      
                                    </tr>
                                  </thead>

                                  <tbody>

                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>

                                        <td><a href="" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o Registro')"><i class="fa fa-trash-o"></i></a></td>

                                        <td><button id="adicionarNOVO" type="button" class="btn btn-warning"  data-toggle="modal" data-target="#retirUpdate<?php echo $fetch['id']?>"> <i class="fa fa-sign-out"></i></button></td>

                                      <td><button class="btn btn-success" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id']?>"><i class="fa fa-pencil"></i></button></td>

                                    

  

                                    </tr>
                      
                                    </tbody>

     </table>

</div>

      </section>
    </section>











