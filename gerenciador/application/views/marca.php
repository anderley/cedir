<div class="span11">
    <ul class="breadcrumb">
        <li>SITE <span class="divider">/</span></li>
        <li>Marcas</li>
    </ul>
    
    <!-- begin:mensagem -->
	<?php echo (isset($mensagem) ? $mensagem : ""); ?>
	<!-- end:mensagem -->
	
    <div class="well well-mini">
        <div class="container-fluid">
            <div class="clearfix" style="margin:15px 0;">
                <a class="btn pull-right" href="<?php echo base_url(); ?>index.php/marcas/novo" title="Inserir Departamento"><i class="icon-plus"></i> Inserir</a>
                <form class="form-inline" action="<?php echo base_url(); ?>index.php/marcas/buscar" method="post">
                    <label><strong>Procurar:</strong></label>
                    <input class="input-xlarge" type="text" name="buscar" placeHolder="Marca...">
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
                        if (isset($marcas)):
                            foreach ($marcas as $m):
                    ?>
                        <tr>
                            <td><?php echo $m->id; ?></td>
                            <td><?php echo $m->descricao; ?></td>
                            <td>
                            	<?php if ($m->indic_habilitado == 'S'): ?>
	                            	<span class="label label-success">Ativo</span>
	                            <?php else: ?>
	                            	<span class="label label-warning">Desabilitado</span>
	                            <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/marcas/editar/<?php echo $m->id; ?>" title="Editar"><i class="icon-pencil"></i></a>
                                </div>
                            </td>
                            <td><input type="checkbox" name="sel_ids[]" value="<?php echo $m->id; ?>"></td>
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
					<span class="pull-right">
						<button id="marcaStatus" class="btn" type="button" title="Ativar/Desativar"><i class="icon-off"></i> Ativar/Desativar</button>
						<button id="removeMarcas" class="btn" type="button" title="Remover Selecionado(s)"><i class="icon-trash"></i> Remover</button>
					</span>
				</div>
            </div>
        </div>
    </div>
</div>
