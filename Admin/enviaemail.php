<?php
    include_once('conect/conect.php');
    $select = "SELECT * FROM tb_costureira WHERE nome_cost=:nome_cost";
    try{
        $resultado = $conect->prepare($select);
        $resultado->bindParam(':nome_cost',$nome_cost,PDO::PARAM_STR);
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
        echo "<b>Erro de Select do PDO</b>".$e->
        getMessage();
    }
    // Destinatário
    $para = $email_cost;
    // Assunto do e-mail
    $assunto = "Novo Pedido";

    // Campos do formulário de contato
    $nome = $nome_cost;
    $email = $email_cost;
    $telefone = $telelefone_cost;
    $mensagem = 'Novo Pedido para Voçê';

    // Monta o corpo da mensagem com os campos
    $corpo = "<html><body>";
    $corpo .= "Nome: $nome ";
    $corpo .= "Email: $email Telefone: $telefone Mensagem: $mensagem";
    $corpo .= "</body></html>";

    // Cabeçalho do e-mail
    $email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

    //Verifica se os campos estão preenchidos para enviar então o email
    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        mail($para, $assunto, $corpo, $email_headers);
        echo '<div class="alert alert-success"><strong>Aviso!</strong> Mensagem enviada! </div>';
        header("Refresh: 4, home.php?acao=pedidoTAB");
    } else {
        echo '<div class="alert alert-danger"><strong>Aviso!</strong> ERRO ao enviar a Mensagem! </div>';
        header("Refresh: 4, home.php?acao=pedidoTAB");
    }
?>