<!DOCTYPE html>
<html>
    <head>
        <title>Cedir - Centro de Distribui&ccedil;&atilde;o Ribeir&atilde;opretano</title>
        <?php
            $meta = array(array('name' => 'robots', 'content' => 'no-cache'),
                        array('name' => 'description', 'content' => 'Cedir - Centro de Distribuição Ribeirãopretano'),
                        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
                    );

            echo meta($meta);
            echo link_tag('css/styles.css');
        ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
    </head>
    <body>
        <div id="pagina">
            <div id="top">
                <a href="index.html">
                    <img class="logo" src="<?php echo base_url(); ?>imagens/logo.png" />
                </a>
                <ul>
                    <li><a href="login.html">login</a></li>
                    <li><a href="cadastro.html">cadastrar</a></li>
                    <li><a href="minhaConta.html">meus pedidos</a></li>
                    <li><a href="faleConosco.html">atendimento</a></li>
                </ul>
                <p>Seja bem-vindo! Fa&ccedil;a seu login ou cadastre-se</p>
                <form action="#" method="get">
                    <input type="text" name="procurar" placeHolder="Digite o que procura aqui...">
                    <input type="button" src="<?php echo base_url(); ?>imagens/btn-procurar.png"/>
                </form>
                <span>compre pelo telefone&nbsp;&nbsp;<label>(16) 3628-2939</label></span>
                <a class="carrinho" href="meuCarrinho.html"><label>R$ <b>0,00</b></label></a>
            </div>