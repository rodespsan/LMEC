<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id', // muestra el atributo "titulo"
        'Servicio', // muestra el atributo 'nombre' de la relaci�n 'categoria' declararada en el modelo
		'Precio'
		'Acciones'
        array( // muestra el atributo 'fecha_creacion' usando una expresi�n para procesar el valor de �ste
            
        ),
        array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
        ),
    ),
 ));
?>