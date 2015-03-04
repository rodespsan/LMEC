
<div>
	<table align="center" class = tabla-sin-bordes2">
		<tr>
		<br>
			<td>CLIENTE: <?php echo CHtml::encode($model->order->customer->name); ?></td> 
			<td>FOLIO: <?php echo CHtml::encode($model->order->folio); ?> </td>
		</tr>
		<tr>
			<td>CONTACTO: <?php echo CHtml::encode($model->contact->name); ?> </td> 

			<td>FECHA: <?php 
				if ($model->date_hour!='') {
				$fecha2=date('Y-m-d',strtotime($model->date_hour)); //formato hora.minuntos.segundos h:i:s
				}
				else {
				$fecha2='';
				}
				echo CHtml::encode($fecha2);   ?>
			</td>
		</tr> </br>


		<tr><td>No. CLIENTE: <?php echo CHtml::encode($model->order->clientNumber); ?> </tr> </br>
		<tr><td></td></tr>
	<?php //} ?>	

	</table>

	<div class="informacion">
		<br>
		<div>
			<table height="560px" cellspacing="0" cellpadding="0"  class = 'tabla-con-bordes'  > 
						<tr>
							  <th><b>CANT.</b></th> 
							  <th><b>CÓDIGO</b></th>
							  <th class="descripcion"><b>DESCRIPCIÓN</b></th>
							  <th><b>P.UNITARIO</b></th>
							  <th width="130px"><b>IMPORTE</b></th>
						</tr>
						<tr> 
							<td class='cant'></td>  
							<td class='codigo'></td> 
							<td><strong>Concepto del trabajo realizado <br>
								Equipo:  </strong> <?php $equip = $model->order->modelo->EquipmentType->type." ".$model->order->modelo->Brand->name." ".$model->order->modelo->name;
								echo CHtml::encode($equip); ?> <br>
								<?php if($model->order->accessories != null){ ?>
								<strong>Accesorios: </strong> 
								<?php $accesories = CHtml::listData($model->order->accessories,'id','name'); ?>
								<?php echo CHtml::encode(implode(',',$accesories)); ?>
								<?php } ?>
							</td> 
							<td ></td> 
							<td></td>
						</tr>
						<tr>
							<td class='cant'>1</td>    
							<td class='codigo'><?php echo CHtml::encode($model->lastService->service->code); ?></td> 			  
							<td><strong>Servicio: </strong><?php echo CHtml::encode($model->lastService->service->name); ?></td>		  
							<td class='prices'><?php echo CHtml::encode($model->lastService->service->price); ?></td>            
							<td class='prices'><?php echo CHtml::encode($model->lastService->service->price); ?></td>
						</tr>
						<tr>
							<td class='cant'></td>   
							<td class='codigo'></td>  
							<td><strong>Trabajo realizado:  </strong>  
								
								<?php  $works = CHtml::listData($model->order->works,'id','description'); 
								//foreach ($model->order->works as $work) { ?>
									<?php echo CHtml::encode(implode(',',$works));
									//$work->name.": ".$work->description; ?>
								<?php //} ?>
								
							</td>   
							<td></td>   
							<td></td>
						</tr>
						<?php if($model->order->spareParts != null){ ?>
						<tr>
							<td class='cant'><br>
							<?php for ($i = 1; $i <= count($model->order->spareParts); $i++) {
									echo "1 <br>";
								} ?>
							</td>    
							<td class='codigo'><br>
								<?php foreach ($model->order->spareParts as $spare) { ?>
									<?php echo CHtml::encode($spare->category->code); ?> </br>
								<?php } ?>
							</td> 			  
							<td><strong>Refacciones: </strong> 
								
								<?php foreach ($model->order->spareParts as $spare) { ?>
									<li><?php echo CHtml::encode($spare->name); ?> </li>
								<?php } ?>
								
							</td>		  
							<td class='prices'><?php foreach ($model->order->spareParts as $spare) { ?>
									<?php echo CHtml::encode($spare->price); ?><br>
								<?php } ?>
							</td>            
							<td class='prices'><?php foreach ($model->order->spareParts as $spare) { ?>
									<?php echo CHtml::encode($spare->price); ?><br>
								<?php } ?>
							</td>
						</tr>
						<?php } 
						if($model->observation != null){
						?>
						<tr>
							<td class='cant'></td>   <td class='codigo'></td>  
							<td><strong>Observación:</strong>  <?php echo CHtml::encode($model->observation); ?></td>   
							<td></td>   
							<td></td>
						</tr>
						<?php } ?>
						<tr>
							<td class='prueba' colspan="4"> </td>
							<td id='borde' ><strong>TOTAL:</strong> <?php echo CHtml::encode($model->total_price); ?><br> 
							</td>
						</tr>
			</table>
		</div>
	</div>
	<table  class = "tabla-sin-bordes2">
		<tr>
			<td><strong> RECIBÍ EQUIPO: <u></strong></td> 
		</tr>
		<tr>
			<td><strong>NOMBRE: <u></strong> <?php echo CHtml::encode($model->name_receive_equipment); ?> </u></td> 
			<td><strong>FIRMA: ______________________ </strong> </td>
		</tr>

	</table>
	<br>  
	<table   class = 'tabla-con-bordes2'>
	  <td><p align = "right" > <input name="boton" type="button" id="boton" onclick="window.print();return true;" value="Imprimir" class = "print" ></p> </td>
          <td><p><a href='<?php echo Yii::app()->baseUrl; ?>/outOrder/<?php echo $_GET['id'] ?>'>Regresar</a></p></td>
	</table>
<div>