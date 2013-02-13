<div class="span11">
    <ul class="breadcrumb">
        <li>SITE <span class="divider">/</span></li>
        <li>Marcas <span class="divider">/</span></li>
	<?php if (isset($m)): ?>
		<li>Editar</li>
	<?php else: ?>
		<li>Inserir</li>
	<?php endif; ?>
    </ul>
    
    <!-- begin:mensagem -->
	<?php echo (isset($mensagem) ? $mensagem : ""); ?>
	<!-- end:mensagem -->
	
    <div class="well well-mini">
        <div class="container-fluid">
            <div class="clearfix" style="margin:15px 0;">
                <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/marcas/salvar" method="post">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo (isset($m) ? $m->id : ""); ?>">
                        <legend>Marca</legend>
                        <div class="control-group">
                            <label class="control-label" for="inputDepartamento">Marca</label>
                            <div class="controls">
                                <input id="inputMarca" type="text" name="descricao" placeholder="Marca" value="<?php echo (isset($m) ? $m->descricao : ""); ?>">
                            </div>
                        </div>
                    </fieldset>
		    <div class="pull-right">
			    <a class="btn" type="button" href="<?php echo base_url(); ?>index.php/marcas"><i class="icon-arrow-left"></i> Voltar</a>
			    <button class="btn" type="submit"><i class="icon-check"></i> Salvar</button>
		    </div>
                </form>
            </div>
        </div>
    </div>
</div>
