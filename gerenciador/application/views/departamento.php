<div class="span11">
    <ul class="breadcrumb">
        <li>SITE <span class="divider">/</span></li>
        <li>Departamentos</li>
    </ul>
    
    <!-- begin:mensagem -->
	<?php echo (isset($mensagem) ? $mensagem : ""); ?>
	<!-- end:mensagem -->
	
    <div class="well well-mini">
        <div class="container-fluid">
            <div class="clearfix" style="margin:15px 0;">
                <a class="btn pull-right" href="<?php echo base_url(); ?>index.php/departamentos/novo" title="Inserir Departamento"><i class="icon-plus"></i> Inserir</a>
                <form class="form-inline" action="<?php echo base_url(); ?>index.php/departamentos/buscar" method="post">
                    <label><strong>Procurar:</strong></label>
                    <input class="input-xlarge" type="text" name="buscar" placeHolder="Departamento...">
                    <button class="btn" type="submit" title="Pesquisar"><i class="icon-search"></i></button>
                </form>
                <table class="table table-hover table-condensed">
                    <thead>
                        <th>Cod.</th>
                        <th>Descri&ccedil;&atilde;o</th>
                        <th>Status</th>
                        <th>A&ccedil;&otilde;es</th>
                        <th>Selecionar</th>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($departamentos)):
                            foreach ($departamentos as $d):
                    ?>
                        <tr>
                            <td><?php echo $d->id; ?></td>
                            <td><?php echo $d->descricao; ?></td>
                            <td>
                            	<?php if ($d->indic_habilitado == 'S'): ?>
	                            	<span class="label label-success">Ativo</span>
	                            <?php else: ?>
	                            	<span class="label label-warning">Desabilitado</span>
	                            <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/departamentos/editar/<?php echo $d->id; ?>" title="Editar"><i class="icon-pencil"></i></a>
                                    <a id="depto_status_<?php echo $d->id; ?>" class="btn btn-mini" href="#<?php echo $d->id; ?>" title="Ativar/Desativar"><i class="icon-off"></i></a>
                                    <?php if ($d->itens->get()->exists()): ?>
										<a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/departamento_itens/exibir/<?php echo $d->id; ?>" title="Visualizar Itens"><i class="icon-list"></i></a>
									<?php endif; ?>
                                </div>
                            </td>
                            <td><input type="checkbox" name="sel_ids[]" value="<?php echo $d->id; ?>"></td>
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
					<button id="removeDeptos" class="btn pull-right" type="button" title="Remover Selecionado(s)"><i class="icon-trash"></i> Remover</button>
				</div>
            </div>
        </div>
    </div>
</div>
