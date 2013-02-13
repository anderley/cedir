<div id="container">
    <div class="menu">
        <img src="<?php echo base_url(); ?>imagens/menu-titulo.png" />
    <div class="menu-links">
        <?php if(isset($departamentos)): ?>
            <ul>
                <?php foreach($departamentos as $d): ?>
                    <li><a href="departamento/<?php echo $d->id; ?>"><?php echo $d->descricao; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
    </div>
    <div class="banner">
        <img src="<?php echo base_url(); ?>imagens/banner1.png" />
        <div class="banner-controle">
            <ul>
                <li><a class="banner-ativo" href="#">&nbsp;</a></li>
                <li><a href="#">&nbsp;</a></li>
                <li><a href="#">&nbsp;</a></li>
                <li><a href="#">&nbsp;</a></li>
            </ul>
        </div>
    </div>
    <div class="destaque">
            <h5>Produtos em Destaque!</h5>
            <div class="cards">
                    <div class="card">
                            <a href="produto.html">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
                    <div class="card">
                            <a href="#">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
                    <div class="card">
                            <a href="#">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
                    <div class="card">
                            <a href="#">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
                    <div class="card">
                            <a href="#">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
                    <div class="card">
                            <a href="#">
                                    <p>
                                            <b>Smartphone Samsung Galaxy W</b><br />
                                            GT-I8150 c/ Android 2.3, Processador 1.4GHz, C&acirc;mera de 5MP, Wi-Fi, GPS-Black (Tim Desbloqueado)
                                    </p><br />
                                    <img src="<?php echo base_url(); ?>produtos/01.png" /><br />
                                    <span>R$ 139,90</span>
                            </a>
                            <input type="button" /><br />
                            <a href="#">+ Detalhes</a>
                    </div>
            </div>
    </div>
</div>