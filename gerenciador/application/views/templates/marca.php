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
