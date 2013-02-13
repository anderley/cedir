<div class="span11">
	<ul class="breadcrumb">
		<li>SITE <span class="diverder">/</span></li>
		<li>Departamento <span class="diverder">/</span></li>
		<li>Itens</li>
	</ul>
    
    <!-- begin:mensagem -->
	<?php echo (isset($mensagem) ? $mensagem : ""); ?>
	<!-- end:mensagem -->
	
	<div class="well well-mini">
		<div class="container-fluid">
			<div class="clearfix" style="margin: 15px 0;">
				<a class="btn pull-right" href="<?php echo base_url(); ?>index.php/departamentos"><i class="icon-arrow-left"></i> Voltar</a>
				<form class="form-inline" action="<?php echo base_url(); ?>index.php/departamento_itens/buscar" method="post">
					<input type="hidden" name="depto_id" value="<?php echo $d->id; ?>">
					<label><strong>Pesquisar:</strong></label>
					<input class="input-xlarge"  type="text" name="buscar" placeHolder="Item no departamento...">
					<button class="btn" type="submit" title="Adicionar Item"><i class="icon-search"></i></button>
				</form>
				<form class="form-inline" action="<?php echo base_url(); ?>index.php/departamento_itens/salvar<?php echo (isset($d_item) ? '/' . $d_item->id: ''); ?>" method="post">
					<fieldset>
						<legend>Itens <small>>> <em><?php echo $d->descricao; ?></em></small></legend>
						<input type="hidden" name="depto_id" value="<?php echo $d->id; ?>">
						<label>Item</label>
						<input class="input-xlarge"  type="text" name="descricao" placeHolder="Item" value="<?php echo (isset($d_item) ? $d_item->descricao: ''); ?>">
						<button class="btn" type="submit" title="Adicionar Item"><i class="icon-plus"></i></button>
					</fieldset>
				</form>
				<table class="table table-hover table-condensed">
					<thead>
						<th>Id</th>
						<th>Descri&ccedil;&atilde;o</th>
						<th>Status</th>
						<th>A&ccedil;&otilde;es</th>
						<th>Selecionar</th>
					</thead>
					<tbody>
						<?php 
							if (isset($d_itens)):
								foreach ($d_itens as $i): 
						?>
							<tr>
		                        <td><?php echo $i->id; ?></td>
		                        <td><?php echo $i->descricao; ?></td>
		                        <td>
		                        	<?php if ($i->indic_habilitado == 'S'): ?>
			                        	<span class="label label-success">Ativo</span>
			                        <?php else: ?>
			                        	<span class="label label-warning">Desabilitado</span>
			                        <?php endif; ?>
		                        </td>
		                        <td>
		                            <div class="btn-group">
		                                <a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/departamento_itens/editar/<?php echo $d->id . '/' . $i->id; ?>" title="Editar"><i class="icon-pencil"></i></a>
										<?php if ($d->indic_habilitado == 'S'): ?>
											<a id="depto_item_status_<?php echo $i->id; ?>" class="btn btn-mini" href="#<?php echo $i->id; ?>" title="Ativar/Desativar"><i class="icon-off"></i></a>
										<?php endif; ?>
		                            </div>
		                        </td>
		                        <td><input type="checkbox" name="sel_ids[]" value="<?php echo $i->id; ?>"></td>
		                    </tr>
						<?php 
								endforeach;
							endif;
						?>
					</tbody>
				</table>
				<div class="row">
					<span class="pull-right">
						<a id="marcar" href="#">Marcar Todos</a> / <a id="desmarcar" href="#">Desmarcar Todos</a>
					</span>
				</div>
				<div class="row" style="margin-top: 15px;">
					<button id="removeDeptoItens" class="btn pull-right" type="button" title="Remover Selecionado(s)"><i class="icon-trash"></i> Remover</button>
				</div>
			</div>
		</div>
	</div>
</div>
