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
			<td>ENTRADA: <?php echo CHtml::encode($model->folio); ?></td>
		</tr>
		<tr>
			<td>CONTACTO: <?php echo CHtml::encode($model->contact->name); ?></td>
			<td>FECHA: <?php echo CHtml::encode(date('Y-m-d', strtotime($model->date_hour))); ?></td>
		</tr>
		<tr>
			<td colspan="2">No. CLIENTE: <?php echo CHtml::encode( $model->customer->id ); ?></td>
		</tr>
	</table>
	
	<div class="information">
		<table height="560px" cellspacing="0" cellpadding="0"   class= "table3" >
			<tr class ="tr1">
				<th class= "amount">CANT.</th>
				<th class="code">CÓDIGO</th>
				<th class="description">DESCRIPCIÓN</th>
				<th class="prices" >P.UNITARIO</th>
				<th class= "prices" >IMPORTE</th>
			</tr>
			<tr class="tr1">
				<td class='amount' > </td>
				<td class='code' class="tds"> </td>
				<td class="description"> 
					<p>
						Concepto de entrada<br>
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
				<td class="prices"></td>
				<td class="prices"></td>
			</tr>
			<tr class="tr1">
				<td class="ths2"> 1 </td>
				<td class="ths2"><?php echo CHtml::encode($model->serviceOrder->service->code);?></td>
				<td class="ths"><?php echo 'Servicio:',CHtml::encode($model->serviceOrder->service->name);?></td>
				<td class="ths_3"><?php echo CHtml::encode($model->serviceOrder->price); ?></td>
				<td class="ths_3"><?php echo CHtml::encode( $model->serviceOrder->price); ?></td>
			</tr>
			<tr class="tr1">
				<td class="ths4"></td>
				<td class="ths4"></td>
				<td class="ths3">
					Falla: <pre><?php foreach($model->failureDescriptions as $FailureDescription){
						echo CHtml::encode($FailureDescription->description);				  
					} ?></pre>
				</td>
				<td class="ths"></td>
				<td class="ths"></td>
			</tr>
			<tr class="tr2">
				<td class="ths" colspan="3"></td>	  
				<td class="ths2">
				<td class="ths2">
			</tr>
			<tr class="tr1">
				<th colspan="3"></th>
				<td class= "td_u">Total:</td>
				<td class= "tdu"><?php echo Chtml::encode($model->serviceOrder->price); ?></td>
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