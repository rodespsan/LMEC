<div id="header">
		<div id="logo"><img src="../../images/header.png"> 
		    <b align="left">Laboratorio de Mantenimiento de Equipos de Cómputo<b><br>
			<b align="left">REPORTE DE ENTRADA DE EQUIPO<b>
		</div>
</div><!-- header -->

<div>
	<table align="center" class="table1">
		<tr>
			<td>CLIENTE: <?php echo CHtml::encode($model->customer->name); ?></td> 
			<td>ORDEN: <?php echo CHtml::encode($model->folio); ?></td>
		</tr>
		<tr>
			<td>CONTACTO: <?php echo CHtml::encode($model->contact->name); ?></td>
			<td>FECHA: <?php echo CHtml::encode(date('Y-m-d', strtotime($model->date_hour))); ?></td>
		</tr>
		<tr>
			<td colspan="2">No. CLIENTE: <?php echo CHtml::encode( $model->clientNumber); ?></td>
		</tr>
	</table>
	
	<div class="information">
		<table height="560px" cellspacing="0" cellpadding="0"   class= "table3" >
			<tr class ="tr1">
				<th class= "amount">CANT.</th>
				<th class="description">DESCRIPCIÓN</th>
				<th class="prices" >P.UNITARIO</th>
				<th class= "prices" >IMPORTE</th>
			</tr>
			<tr class="tr1">
				<td class='amount'></td>
				<td class="description">Concepto de entrada:</td>
				<td class="prices"></td>
				<td class="prices"></td>
			</tr>
			<tr class="tr1">
				<td class="ths2"> 1 </td>
				<td class="ths"><?php echo 'Servicio:',CHtml::encode($model->serviceOrder->service->name);?></td>
				<td class="ths_3"><?php echo CHtml::encode($model->serviceOrder->price); ?></td>
				<td class="ths_3"><?php echo CHtml::encode( $model->serviceOrder->price); ?></td>
			</tr>
			<tr class="tr1">
				<td class="ths2"></td>
				<td class="ths"> 
					<p>
						Equipo: <?php echo CHtml::encode($model->modelo->EquipmentType->type);?><br>
						Modelo: <?php echo CHtml::encode($model->modelo->name);?><br>
						<?php if($model->stock_number!=null){
							echo 'No. de inventario: ';
							echo CHtml::encode($model->stock_number);
						} ?><br> 
						<?php if($model->serial_number!=null){
							echo 'No de serie: ';
							echo CHtml::encode($model->serial_number);
						} ?><br>
						<?php if(!empty($model->accessories)): ?>
						Accesorios:
							<?php 
								$accesories = CHtml::listData($model->accessories,'id','name');
								echo CHtml::encode(implode(', ',$accesories));
							?>
						<?php endif; ?>
						
					</p>
				</td>
				<td class="ths_3"></td>
				<td class="ths_3"></td>
			</tr>
			<tr class="tr1">
				<td class="ths"></td>
				<td class="ths"><?php 
						echo 'Falla: ' ?>
						<?php 
							echo CHtml::encode($model->failureDescription->description);
						?>
				</td>
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<tr class="tr2">
				<td class="ths"></td>
				<td class="ths"></td>	  
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<tr class="tr1">
				<th colspan="2"></th>
				<td class= "td_u"><b>Total:</b></td>
				<td class= "tdu"><?php echo '<b>'.Chtml::encode($model->serviceOrder->price).'</b>'; ?></td>
			</tr>
		</table>
	</div>
	
	<br><br><br>
	
	<table class ="table_4">
		<tr>
			<td>Nombre: <u><?php  echo CHtml::encode($model->name_deliverer_equipment);?></u>
				<div class="div4"></div> 
			</td>
			<td>Firma: <div class="div2"></div></td>
		</tr>
	</table>
	
	<br>
	
	<table class="table4">
		<tr> 
			<td><div class="div3"> </div></td> 
		</tr>
		<tr>
			<td>
				<form>
					<input  class="input1" type='button' onclick='window.print();' value='Imprimir' />
					<input  class="input1" type='button' onclick='window.close();' value='Cerrar' />
				</form>
			</td>
		</tr>
	</table>

</div>

<div class="clear"></div>

<div id="footer">
	<p align="center">
		Periférico Norte, Tablaje 13615, Junto al local FUTV, Apartado Postal 172, CP 97119 <br>
        Mérida Yucatán, México Tel. y Fax (999) 942-31-40 al 49 ext. 1062
    </p>
	<p align="right">F-FMAT-CTIC-03/REV:04</p>
</div>