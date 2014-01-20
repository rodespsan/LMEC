<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id', // muestra el atributo "titulo"
        'Servicio', // muestra el atributo 'nombre' de la relación 'categoria' declararada en el modelo
		'Precio'
		'Acciones'
        array( // muestra el atributo 'fecha_creacion' usando una expresión para procesar el valor de éste
            
        ),
        array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
        ),
    ),
 ));
?>