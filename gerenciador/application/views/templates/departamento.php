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
				<?php if($d->itens->get()->exists()): ?>
					<a class="btn btn-mini" href="<?php echo base_url(); ?>index.php/departamento_itens/exibir/<?php echo $d->id; ?>" title="Visualizar Itens"><i class="icon-list"></i></a>
				<?php endif;?>
            </div>
        </td>
        <td><input type="checkbox" name="sel_ids[]" value="<?php echo $d->id; ?>"></td>
    </tr>
<?php
        endforeach;
    endif;
?>
