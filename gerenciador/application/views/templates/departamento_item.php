<?php foreach($depto->itens->get() as $i): ?>
	<tr>
		<td><?php echo $i->id; ?></td>
		<td><?php echo $i->descricao; ?></td>
		<td>
			<?php if($i->indic_habilitado == 'S'): ?>
				<span class="label label-success">Ativo</span>
			<?php else: ?>
				<span class="label label-warning">Desativado</span>
			<?php endif; ?>
		</td>
		<td>
			<div class="btn-group">
				<a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/departamento_itens/editar/<?php echo $depto->id . '/' . $i->id; ?>" title="Editar"><i class="icon-pencil"></i></a>
			</div>
		</td>
		<td><input type="checkbox" name="sel_ids[]" value="<?php echo $i->id; ?>"></td>
	</tr>
<?php endforeach; ?>
