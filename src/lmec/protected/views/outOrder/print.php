<div id="header">
		<div id="logo"><img src="../../images/header.png"> 
		    <b align="left">Laboratorio de Mantenimiento de Equipos de Cómputo<b><br>
			<b align="left">REPORTE DE SALIDA DE EQUIPO<b>
		</div>
</div><!-- header -->

<div>
	<table align="center" class="table1">
		<tr>
			<td>CLIENTE: <?php echo CHtml::encode($model->order->customer->name); ?></td> 
			<td>ORDEN: <?php echo CHtml::encode($model->order->folio); ?></td>
		</tr>
		<tr>
			<td>CONTACTO: <?php echo CHtml::encode($model->contact->name); ?></td>
			<td>FECHA: <?php echo CHtml::encode(date('Y-m-d', strtotime($model->date_hour))); ?></td>
		</tr>
		<tr>
			<td colspan="2">No. CLIENTE: <?php echo CHtml::encode( $model->order->clientNumber ); ?></td>
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
				<td class="description">Concepto del trabajo realizado:</td>
				<td class="prices"></td>
				<td class="prices"></td>
			</tr>
			<tr class="tr1">
				<td class="ths2"> 1 </td>
				<td class="ths">Servicio: <?php echo CHtml::encode($model->lastService->service->name);?></td>
				<td class="ths_3"><?php echo CHtml::encode($model->lastService->price); ?></td>
				<td class="ths_3"><?php echo CHtml::encode($model->lastService->price); ?></td>
			</tr>
			<tr class="tr1">
				<td class="ths2"> </td>
				<td class="ths"> 
					<p>
						Equipo: <?php echo CHtml::encode($model->order->modelo->EquipmentType->type);?><br>
						Modelo: <?php echo CHtml::encode($model->order->modelo->name);?><br>
						<?php if($model->order->stock_number!=null){
							echo 'No. de inventario: ';
							echo CHtml::encode($model->order->stock_number);
						} ?><br> 
						<?php if($model->order->serial_number!=null){
							echo 'No de serie: ';
							echo CHtml::encode($model->order->serial_number);
						} ?><br>
						<?php if(!empty($model->order->accessories)): ?>
						Accesorios:
							<?php 
								$accesories = CHtml::listData($model->order->accessories,'id','name');
								echo CHtml::encode(implode(', ',$accesories));
							?>
						<?php endif; ?>
					</p>
				</td>
				<td class="ths_3"></td>
				<td class="ths_3"></td>
			</tr>
			<?php if($model->order->spareParts != null){ ?>
			<tr class="tr1">
				<td class="ths2">
					<?php for ($i = 1; $i <= count($model->order->spareParts); $i++) {
									echo CHtml::encode("1").'<br>';
									//echo count($model->order->spareParts);
								} ?>
				</td>
				<td class="ths">
					Refacciones: 
						<?php foreach ($model->order->spareParts as $spare) { ?>
									<li><?php echo CHtml::encode($spare->name).' N/S:'.CHtml::encode($spare->serial_number); ?> </li>
								<?php } ?>
				</td>
				<td class="ths_3">
					<?php foreach ($model->order->spareParts as $spare) { ?>
									<?php echo CHtml::encode($spare->price); ?><br>
								<?php } ?>
				</td>
				<td class="ths_3">
					<?php foreach ($model->order->spareParts as $spare) { ?>
									<?php echo CHtml::encode($spare->price); ?><br>
								<?php } ?>
				</td>
			</tr>
			<tr class="tr1">
				<td class="ths2"></td>
				<td class="ths">
					Trabajo Realizado: 
						<?php foreach ($model->order->works as $works) { ?>
									<li><?php echo CHtml::encode($works->description); ?> </li>
								<?php } ?>
				</td>
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<?php } ?>
			<?php if($model->observation != null){ ?>
			<tr class="tr1">
				<td class="ths"></td>
				<td class="ths">
					Observación: <?php echo CHtml::encode($model->observation); ?>
				</td>
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<?php } ?>
			<tr class="tr1">
				<td class="ths"></td>
				<td class="ths"><b>Subtotal</b> </td>
				<td class="ths"></td>
				<td class="ths_3"><?php echo '<b>'.CHtml::encode($model->total_price).'</b>'; ?></td>
			</tr>
			<?php if($model->order->advance_payment != null){ ?>
			<tr class="tr1">
				<td class="ths"></td>
				<td class="ths">Anticipo </td>
				<td class="ths"></td>
				<td class="ths_3"><?php echo CHtml::encode($model->order->advance_payment); ?></td>
			</tr>
			<?php } ?>
			<tr class="tr2">
				<td class="ths"></td>
				<td class="ths"></td>	  
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<tr class="tr1">
				<th colspan="2"></th>
				<td class= "td_u"><b>Total:</b></td>
				<td class= "tdu"><?php echo '<b>'.CHtml::encode($model->getDebit()).'</b>'; ?></td>
			</tr>
		</table>
	</div>
	
	<br><br><br>
	
	<table class ="table_4">
		<tr>
			<td>Nombre: <u><?php  echo CHtml::encode($model->name_receive_equipment);?></u>
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
	<p align="right">F-FMAT-CTIC-04/REV:01</p>
</div>