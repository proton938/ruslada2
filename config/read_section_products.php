

<?php

$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM section_products');
$readbuf = $buf->fetchAll();


$count_section = count($readbuf);

$id_prod = 0;



echo '<table style = "width: 100%;">';

foreach ($readbuf as $mass)

	{
		$id_prod++;
		
		echo '	<script>
		
					function product_button_down_'.$id_prod.'()
						{
							for (x = 1; x <= '.$count_section.'; x++)
								{
									document.getElementById("product_button" + x).className = "product_button";
									document.getElementById("prod_screen_" + x).style.opacity = "1";
								}
							document.getElementById("product_button'.$id_prod.'").className = "product_button_down"; 
							document.getElementById("prod_screen_'.$id_prod.'").style.opacity = "0.5";
							document.getElementById("navigation_chain_prod").innerHTML = "'.$mass['name_section'].'" + "/";
							document.getElementById("name_product").value = "'.$mass['name_section'].'";
							read_base_2();
							read_company_active();
						}
						
				</script>
		
				<tr>
					<td id = "product_button'.$id_prod.'" 
						class = "product_button" 
						onclick = "product_button_down_'.$id_prod.'()"> 						
						<center>
						<div style = "position: relative; width: 90%;">
							<img src = "../images/kuadrat.png" style =  "position: relative; width: 100%;">
							<img 	id = "prod_screen_'.$id_prod.'"
									class = "thin_down"
									style = "position: absolute; width: 100%; height: 100%; top: 0px; left: 0px;"  src = "';
																															if ($mass['image'] != '')     // если адрес изображения записан выводим
																																{
																																	echo $mass['image'];
																																}
																															else                          // ...если нет выводим пустышку
																																{
																																	echo '../images/for_admin/dummy.jpg';
																																}
																															echo '" >
						</div>
						'.$mass['name_section'].'
						</center>
					</td>
				</tr>';
	}
	
echo '</table>';

?>