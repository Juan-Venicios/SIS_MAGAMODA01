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

  
                       <div class="rom">
                       <div class="col-lg-12">
                       <div class="form-group">
                              <label class="control-label">Nome</label>                    
                              <input  value="" type="text" name="nome" id="nome" class="form-control" required="">                     
                       </div>
                       
                       </div>
                       </div>
                     
                       <div class="rom">
                       <div class="col-lg-12">
                       <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input  value="" type="email" name="email" id="email" class="form-control" required="">
                       </div>
                       </div>
                       </div>
                       <div class="rom">
                       <div class="col-lg-12">
                       <div class="form-group">
                            <label class="control-label">Mensagem</label>
                            <input  value="" type="text" name="mensagem" id="mensagem" class="form-control" required="">
                       </div>
                       </div>
                       </div>
                    
  </div>
</div>      
<div class="rom">
<div class="col-lg-12">
 <button type="submit" class="btn btn-theme " style="margin-left: 27%;" id="button" name="button" ><i></i>Cadastrar</button>
 </div>
</div>  
            </div>

                 



</div>

      </form>

      <?php
                        if(isset($_POST['button'])){
                            function requisicaoApi($params, $endpoint){
                                $url = "http://api.directcallsoft.com/{$endpoint}";
                                $data = http_build_query($params);
                                $ch =   curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_POST, true);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_HEADER, 0);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                $return = curl_exec($ch);
                                curl_close($ch);
                                // Converte os dados de JSON para ARRAY<
                                $dados = json_decode($return, true);
                                return $dados;
                                }
                                // CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
                                $client_id = "gamer.lol572002@gmail.com";
                                // CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
                                $client_secret = "XXXXXXX";
                                // Faz a requisicao do access_token
                                $req = requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
                                //Seta uma variavel com o access_token
                                $access_token = $req['access_token'];
                                // Enviadas via POST do nosso contato.html
                                $nome = $_POST['nome'];
                                $email = $_POST['email'];
                                $mensagem = $_POST['mensagem'];
                                // Monta a mensagem
                                $SMS = "Contato de: {$nome} - <{$email}> - {$mensagem}";
                                // Array com os parametros para o envio
                                $data = array(
                                    'origem'=>"Numero", // Seu numero que é origem
                                    'destino'=>"Numero", // E o numero de destino
                                    'tipo'=>"texto",
                                    'access_token'=>$access_token,
                                    'texto'=>$SMS
                                );
                                // realiza o envio
                                $req_sms = requisicaoApi($data, "sms/send");
                                // FIM                      
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

