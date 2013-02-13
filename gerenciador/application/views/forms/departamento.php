<div class="span11">
    <ul class="breadcrumb">
        <li>SITE <span class="divider">/</span></li>
        <li>Departamentos <span class="divider">/</span></li>
		<?php if (isset($d)): ?>
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/departamentos/salvar" method="post">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo (isset($d) ? $d->id : ""); ?>">
                        <legend>Departamento</legend>
                        <div class="control-group">
                            <label class="control-label" for="inputDepartamento">Departamento</label>
                            <div class="controls">
                                <input id="inputDepartamento" type="text" name="descricao" placeholder="Departamento" value="<?php echo (isset($d) ? $d->descricao : ""); ?>">
                            </div>
                        </div>
                    </fieldset>
		    <div class="pull-right">
			    <a class="btn" type="button" href="<?php echo base_url(); ?>index.php/departamentos"><i class="icon-arrow-left"></i> Voltar</a>
			    <button class="btn" type="submit"><i class="icon-check"></i> Salvar</button>
			    <?php if (isset($d)): ?>
			    	<a class="btn" href="<?php echo base_url(); ?>index.php/departamentos/itens/<?php echo $d->id; ?>"><i class="icon-plus"></i> Incluir Itens</a>
			    <?php endif; ?>
		    </div>
                </form>
            </div>
        </div>
    </div>
</div>
