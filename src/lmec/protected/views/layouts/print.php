<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen2_.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen2_view_print.css" media="print" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style type="text/css" media="print">
	<!--
.print {
	visibility: hidden;
}

-->
</style>
	
</head>


<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="../../images/header.png"> 
		    <b align="left">Laboratorio de Mantenimiento de Equipos de Cómputo<b><br>
			<b align="left">REPORTE DE ENTRADA DE EQUIPO<b>
		</div>
	</div><!-- header -->



	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
	
	<p align="center">Periférico Norte, Tablaje 13615, Junto al local FUTV, Apartado Postal 172, CP 97119 <br>
             Mérida Yucatán, México Tel. y Fax (999) 942-31-40 al 49 ext. 1062
         </p>
	<!--
	
	<p ><strong>Facultad de Matem&aacute;ticas, UADY 
	  Anillo Perif&eacute;rico Norte
	  Tablaje Cat. 13615
	  Colonia Chuburn&aacute; Hidalgo Inn
	  M&eacute;rida, Yucat&aacute;n
	  (999) 942 31 40 al 49 </strong> </p>
	</div>   --><!-- footer -->
</div><!-- page -->

</body>

</html>