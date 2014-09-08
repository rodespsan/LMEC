
<div>

<table align = "center" class = "table1">
     <tr>
         <td>CLIENTE:  
         <?php echo CHtml::encode($model->customer->name);?>
	     </td> 
	     <td>ENTRADA: 
	     <?php $number=CHtml::encode( $model->id );
		 echo    str_pad($number, 5, "0", STR_PAD_LEFT);  ; ?> 
	     </td>
	 </tr>
	 <tr> <td> CONTACTO:
	         <?php
                 
 var_dump($model->customer);
		          foreach($model->customer->contacts as $Contact){
		           echo CHtml::encode($Contact->name);
		          }
                          
                          
		       ?>   
		  </td>
	           <td>FECHA: 
			     <?php 
                     if ($model->date_hour!='') {
                      $model->date_hour=date('d-m-Y',strtotime($model->date_hour));
                     } 
                     echo CHtml::encode($model->date_hour);
			       ?>
			   </td>
	 </tr>
	 <td>No. CLIENTE: 
	     <?php echo CHtml::encode( $model->customer->id ); ?>
	 </td>
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
			      <p>Concepto de entrada<br>
				     Equipo: <?php echo CHtml::encode($model->modelo->EquipmentType->type);?> <br>
				     Modelo:<?php echo CHtml::encode($model->modelo->name);?><br>
					  <?php  if($model->stock_number!=null){
					           echo 'No. de inventario: ';
					           echo CHtml::encode($model->stock_number);
							
							}
							
					    ?><br> 
					 
					 
					 
					 
					 <?php  if($model->serial_number!=null){
					           echo 'No de serie: ';
					           echo CHtml::encode($model->serial_number);
							
							}
							
					    ?>
					 
					 <br>
				     Accesorios:
	
				 </p>
		 </td>
		 <td class="prices"> </td>
		 <td class="prices"></td>
     </tr>
	  <?php
			 foreach($model->accessories as $accesory){
		             echo'<tr class=tr3>
			             <td class="ths"></td>
				         <td class="ths"></td>
				         <td  class="ths">';
		                 echo CHtml::encode($accesory->name);				
		                 echo'</td>
						 <td class="ths"></td>
						 <td class="ths"></td>
	                     </tr>';
		      }
	  ?>

	 <tr class=tr1>
	 	<?php
	          global $price;
                  
                  $servicePrice = '';
                  $serviceCant='';
                  $serviceCode='';
                  $serviceName='';
                  
			   $price=0.0;
			   foreach($model->ServiceOrders as $Service){
			         $price+=$Service->price;
                                 $servicePrice = $Service->price;
                                 $serviceCant = $Service->cant;
                                 $serviceCode = $Service->code;
                                 $serviceName = $Service->name;
                                 
			    }
                            
	   ?>
	 <td class="ths2" > <?php echo CHtml::encode($serviceCant);?></td>
	 
    <td class="ths2"> <?php echo CHtml::encode($serviceCode);?></td>
    <td class="ths"> 
	                 <?php  echo 'Servicio:',CHtml::encode($serviceName);?>
	</td>
	 
	 <td class="ths_3" > <?php  echo CHtml::encode($servicePrice); ?> </td>
		 <?php ?>

		 <td class="ths_3"> <?php echo CHtml::encode( sprintf( "%.2f", $servicePrice * $serviceCant) );?> </td>
	 
	 </tr>
	 
	 
	 
	 
				 
		     
	<tr class="tr1">
	                 <td class="ths4"> </td>
		             <td class="ths4"> </td>
		             <td  class="ths3">
                          Falla:<?php
		                           foreach($model->failureDescriptions as $FailureDescription){
				                     echo CHtml::encode($FailureDescription->description);				  
				                    }
                                ?>						 
		             </td>
		            <td class="ths"></td>
		            <td class="ths"></td>
	</tr>
	 <tr class="tr2">
	     <td  class="ths" colspan="3"></td>	  
		 <td class="ths2">
		 <td class="ths2">
		
		 
	 </tr>
	       <tr class="tr1">
           <th colspan="3" ></th>
           <td class= "td_u">Total:</td>
	 
     <td class= "tdu"> <?php echo Chtml::encode($price); ?></td>



	 </tr>
	 
  </table>

</div>
  <br><br><br>
<table class ="table_4">
     <tr>
         <td> Nombre:<u> <?php  echo CHtml::encode($model->name_deliverer_equipment);?> </u>
		 <div class="div4"></div> 
		</td>
	     <td>Firma: <div class="div2"></div>  </td>
     </tr>
      <br>
</table>
<br>
 
<table class="table4">
       <tr> 
          <td><div class="div3"> </div> </td> 
       </tr>
	   
     <tr>
         <td><form>
                   <input  class="input1" type='button' onclick='window.print();' value='Imprimir' />
		     </form>
             <form>
                   <input  class="input1" type='button' onclick='window.close();' value='Cerrar' />
			 </form>
         </td>
     </tr>

   
</table>

</div>