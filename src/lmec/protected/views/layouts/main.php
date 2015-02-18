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
				array('label'=>'Inicio', 'url'=>array('/order/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador','recepcionista','Tecnico')),
				array('label'=>'Ordenes', 'url'=>array(''), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista'),
					'items'=>array(
						array('label'=>'Entrada Equipo', 'url'=>array('/order/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label'=>'Salida de Orden', 'url'=>array('/outOrder/index'), 'visible'=>Yii::app()->user->checkAccess('administrador'))
				
					)
				),
				array('label'=>'Cuentas', 'url'=>array(''), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista'),
					'items'=>array(
						array('label'=>'Usuarios', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label'=>'Roles', 'url'=>array('/role/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista'))
					)
				),
				array('label'=>'Clientes', 'url'=>array(''), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista'),
					'items'=>array(
						array('label' => 'Clientes', 'url' => array('/customer/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Contactos', 'url' => array('/contact/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Dependencias', 'url' => array('/dependence/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Tipo de cliente', 'url' => array('/customerType/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Tipo de pago', 'url' => array('/paymentType/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador'))
					)
				),
				array('label'=>'Equipos', 'url'=>array(''), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista'),
					'items'=>array(
						array('label'=>'Modelos', 'url'=>array('/modelo/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Marcas', 'url' => array('/brand/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label'=>'Tipo de equipo', 'url'=>array('/equipmentType/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label'=>'Accesorios', 'url'=>array('/accesory/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Refacciones', 'url' => array('/spareParts/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label' => 'Proveedor', 'url' => array('/provider/admin'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
						array('label'=>'Actividad de Garantía', 'url'=>array('/activityGuarantee/index'), 'visible'=>Yii::app()->user->checkAccess('administrador'))
				)
				),
				array('label'=>'Servicios', 'url'=>array(''), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista','Tecnico'),
					'items'=>array(
						array('label'=>'Servicios', 'url'=>array('/service/index'), 'visible'=>Yii::app()->user->checkAccess('*')),
						array('label'=>'Tipo de servicio', 'url'=>array('/serviceType/index'), 'visible'=>Yii::app()->user->checkAccess('*')),
						array('label' => 'Trabajos', 'url' => array ('/work/index'), 'visible'=>Yii::app()->user->checkAccess('administrador','Recepcionista','Tecnico'))
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