<option value="0">Seleccionar</option>
<?php foreach ($spareParts as $parts): ?>	
	<option value="<?php echo CHtml::encode($parts->id); ?>">
		<?php echo CHtml::encode(
			$parts->name
		);?>
	</option>
<?php endforeach ?> 