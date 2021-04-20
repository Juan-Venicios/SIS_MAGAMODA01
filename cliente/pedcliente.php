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
                  <div  >
                    <div class="row">
                      <div class="col-lg-12 detailed">
                       

    
      <form action="" method="post" id="form_NovoPerfil">
       
       <h4 class="mb">DADOS DO COLABORADOR</h4>

                      <div class="col-lg-6" style="margin-left: 25%; ">

  
  
                       <div class="form-group">
                            <label class="control-label">Modelo</label>
                            <input  value="" type="email" name="modelo_pedido" id="modelo_pedido" class="form-control" required="">
                       </div>
                       
                       <div class="rom">
                       <div class="col-lg-6">
                       <div class="form-group">
                           <div class="form-group">
                            <label class="control-label">Tamanho</label>
                            <input  value="" type="email" name="tamanho_pedido" id="tamanho_pedido" class="form-control" required="">
                       </div>
                       <div class="form-group">
                            <label class="control-label">Quantidade</label>
                            <input  value="" type="email" name="quantidade_pedido" id="quantidade_pedido" class="form-control" required="">
                       </div>
                       </div>
                        
                       </div>
                       <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label">Preço</label>
                            <input  value="" type="email" name="preco_pedido" id="preco_pedido" class="form-control" required="">
                       </div>
                       <div class="form-group">
                            <label class="control-label">preco_total</label>
                            <input  value="" type="email" name="preco_total" id="preco_total" class="form-control" required="">
                       </div>
                       </div>
</div>                     
</div>
 <button type="submit" class="btn btn-theme " style="margin-left: 26.4%;" name="botao" ><i></i>Cadastrar</button>
            

                 



</div>

      </form>

      <?php
                        include_once('conect/conect.php'); 
                        if(isset($_POST['botao'])){
                            $imagem_pedido = trim(strip_tags($_POST['imagem_pedido']));
                            $modelo_pedido = trim(strip_tags($_POST['modelo_pedido']));
                            $tamanho_pedido = trim(strip_tags($_POST['tamanho_pedido']));
                            $quantidade_pedido = trim(strip_tags($_POST['quantidade_pedido']));
                            $valor_cost = trim(strip_tags($_POST['valor_cost']));
                            $total_cost = trim(strip_tags($_POST['total_cost']));
                          
                            $cadastro = "INSERT INTO tb_costureira (modelo_cost,tamanho_cost,uf_cost,qtd_cost,valor_cost,total_cost)
                             VALUES (:modelo_cost,:tamanho_cost,:uf_cost,:qtd_cost,:bairro_cost,:valor_cost,:total_cost)";
                            try{
                                $result = $conect->prepare($cadastro);
                                $result-> bindParam(':modelo_cost',$modelo_cost,PDO::PARAM_STR);
                                $result-> bindParam(':uf_cost',$uf_cost,PDO::PARAM_STR);
                                $result-> bindParam(':tamanho_cost',$tamanho_cost,PDO::PARAM_STR);
                                $result-> bindParam(':qtd_cost',$qtd_cost,PDO::PARAM_STR);
                                $result-> bindParam(':valor_cost',$valor_cost,PDO::PARAM_STR);
                                $result-> bindParam(':total_cost',$total_cost,PDO::PARAM_STR);
    
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
                 </div>
                    <!-- /row -->
                  </div>
                 


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



