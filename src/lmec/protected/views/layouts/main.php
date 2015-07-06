<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div >
		<?php $this->widget('ext.widgets.XDropDownMenu.XDropDownMenu',array(
			'items'=>array(
				array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Inicio', 'url'=>array('/order/admin'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista','Tecnico'))),
				array('label'=>'Órdenes', 'url'=>array(''), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista','Tecnico')),
					'items'=>array(
						array('label'=>'Entrada Equipo', 'url'=>array('/order/index'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista'))),
						array('label'=>'Salida de Orden', 'url'=>array('/outOrder/index'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista'))),
						array('label'=>'Ver órdenes asignadas', 'url'=>array('/order/viewAssignedOrders'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista','Tecnico'))),
						array('label'=>'Buscar', 'url'=>array('/order/search'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista')))
					)
				),
				array('label'=>'Cuentas', 'url'=>array(''), 'visible'=>User::model()->hasRole(array('administrador')),
					'items'=>array(
						array('label'=>'Usuarios', 'url'=>array('/user/admin'), 'visible'=>User::model()->hasRole(array('administrador'))),
						array('label'=>'Roles', 'url'=>array('/role/index'), 'visible'=>User::model()->hasRole(array('administrador')))
					)
				),
				array('label'=>'Clientes', 'url'=>array(''), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista')),
					'items'=>array(
						array('label' => 'Clientes', 'url' => array('/customer/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Contactos', 'url' => array('/contact/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Dependencias', 'url' => array('/dependence/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Tipo de cliente', 'url' => array('/customerType/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Tipo de pago', 'url' => array('/paymentType/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista')))
					)
				),
				array('label'=>'Equipos', 'url'=>array(''), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista')),
					'items'=>array(
						array('label'=>'Modelos', 'url'=>array('/modelo/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Marcas', 'url' => array('/brand/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label'=>'Tipo de equipo', 'url'=>array('/equipmentType/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label'=>'Accesorios', 'url'=>array('/accesory/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Refacciones', 'url' => array('/spareParts/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label' => 'Proveedor', 'url' => array('/provider/admin'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista'))),
						array('label'=>'Actividad de Garantía', 'url'=>array('/activityGuarantee/index'), 'visible'=>User::model()->hasRole(array('administrador', 'Recepcionista')))
					)
				),
				array('label'=>'Servicios', 'url'=>array(''), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista','Tecnico')),
					'items'=>array(
						array('label'=>'Servicios', 'url'=>array('/service/index'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista'))),
						array('label'=>'Tipo de servicio', 'url'=>array('/serviceType/index'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista'))),
						array('label' => 'Trabajos', 'url' => array ('/work/index'), 'visible'=>User::model()->hasRole(array('administrador','Recepcionista','Tecnico')))
					)
				),
				array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
				
			),
		)); ?>
	</div><!-- mainmenu -->
	

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>