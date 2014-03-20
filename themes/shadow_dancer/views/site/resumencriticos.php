<?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCSSFile($baseUrl . '/css/rescriticos.css');?>
    
<div class="span-23">

<p style="font-size: medium;">Resumen</p>

<div class="CSSTableGenerator" style="width:600px;height:450px;padding-bottom:70px;">
			<table >
				<tr> 
					<td>
						Tipo de Aseo
					</td>
					<td >
						Flota
					</td>
					<td>
						Límite de días
					</td>
					<td>
						Cantidad de AC Críticos
					</td>
					<td>
						Promedio de días Críticos
					</td>
				</tr>
				<?php
				foreach($arreglo as $value){
				 echo '<tr>
				 		<td>
							'.$value['tipo'].'
						</td>
						<td>
							'.$value['flota'].'
						</td>
						<td>
							'.$value['limite'].'
						</td>
						<td>
							'.$value['cantidad'].'
						</td>
						<td>
							'.$value['promedio'].'
						</td>
					</tr>';
				}
				?>
			</table>
		</div>
</div>