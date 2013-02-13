<?php if (isset($msg)): ?>
	<div class="alert <?php echo $msg['class']; ?>">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo ascii_to_entities($msg['mensagem']); ?>
	</div>
<?php endif; ?>
