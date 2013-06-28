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

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Entrada Equipo', 'url'=>array('/order/create'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label'=>'Roles', 'url'=>array('/role/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label'=>'Usuarios', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label'=>'Servicios', 'url'=>array('/service/index'), 'visible'=>Yii::app()->user->checkAccess('*')),
				array('label'=>'Tipo de Servicio', 'url'=>array('/serviceType/index'), 'visible'=>Yii::app()->user->checkAccess('*')),
				array('label'=>'Modelos', 'url'=>array('/modelo/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label'=>'Tipo de Equipo', 'url'=>array('/equipmentType/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
                array('label'=>'Accesorios', 'url'=>array('/accesory/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Marcas', 'url' => array('/brand/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Trabajos', 'url' => array ('/work/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Refacciones', 'url' => array('/spareParts/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Dependencias', 'url' => array('/dependence/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Clientes', 'url' => array('/customer/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Tipo de cliente', 'url' => array('/customerType/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Contactos', 'url' => array('/contact/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label' => 'Proveedor', 'url' => array('/provider/index'), 'visible'=>Yii::app()->user->checkAccess('administrador')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink'=>CHtml::link('Inicio', array('/site/index')),
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>