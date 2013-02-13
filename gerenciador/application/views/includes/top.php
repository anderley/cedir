<!DOCTYPE html>
<html>
    <head>
        <title>Ger&ecirc;nciador de Conte&uacute;do - Cedir</title>
        <?php
            $meta = array(array('name' => 'robots', 'content' => 'no-cache'),
                        array('name' => 'description', 'content' => 'Gerenciador de Conteúdo'),
                        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
                    );

            echo meta($meta); 
            echo link_tag('css/bootstrap.min.css');
            echo link_tag('css/estilos.css');
        ?>
    </head>

    <body>
        <div class="top">
            <h4>Ger&ecirc;ciador de Conteudo - Cedir</h4>
        </div>
        <div class="container-fluid">
            <div class="span4 well well-mini">
                <ul class="nav nav-list">
                    <li class="nav-header">SITE</li>
                    <li>
                        <ul class="nav nav-list">
                            <li class=""><a href="#">Atendimento</a></li>
                            <li class=""><a href="banner.html">Banners</a></li>
                            <li class=""><a href="cliente.html">Clientes</a></li>
                            <li class=""><a href="#">Coment&aacute;rios</a></li>
                            <li class="<?php echo ((isset($menu_departamento)) ? "active" : ""); ?>"><a href="<?php echo base_url(); ?>index.php/departamentos">Departamentos</a></li>
                            <li class="<?php echo ((isset($menu_marca)) ? "active" : ""); ?>"><a href="<?php echo base_url(); ?>index.php/marcas">Marcas</a></li>
                            <li class=""><a href="pedido.html">Pedidos</a></li>
                            <li class=""><a href="#">Produtos</a></li>
                            <li class=""><a href="promocao.html">Promo&ccedil;&otilde;es</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="nav-header">GER&Ecirc;NCIADOR</li>
                    <li>
                        <ul class="nav nav-list">
                            <li><a href="log.html">Log Acesso</a></li>
                            <li><a href="usuario.html">Usu&aacute;rios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>