<?php
if (isset($_REQUEST['name_product_active'])) { $name_product_active = $_REQUEST['name_product_active'];}  // считываем название выбранной в панели продукции

echo $name_product_active;


$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM company');
$readbuf = $buf->fetchAll();

$count_company = count($readbuf);

echo $count_company;

$id_company = 0;

echo '<table style = "width: 100%;">';

foreach ($readbuf as $mass)
	{
		$id_company++;
		
		echo 	'	
				<script>
		
					function company_button_down_'.$id_company.'()
						{
							for (y = 1; y <= '.$count_company.'; y++)
								{
									document.getElementById("company_button" + y).className = "product_button";
									document.getElementById("company_screen_" + y).style.opacity = "1";
								}
							document.getElementById("company_button'.$id_company.'").className = "product_button_down"; 
							document.getElementById("company_screen_'.$id_company.'").style.opacity = "0.5";
							document.getElementById("name_company_active").value = "'.$mass['name_company'].'";
							read_base_2();
						}
						
				</script>
				
				
					<tr>
					<td id = "company_button'.$id_company.'" 
						class = "product_button" 
						onclick = "company_button_down_'.$id_company.'()"> 						
						<center>
						<div style = "position: relative; width: 90%;">
							<img 	id = "company_screen_'.$id_company.'"
									class = "thin_down"
									style = "position: relative; width: 100%; top: 0px; left: 0px;"  src = "';
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
						'.$mass['name_company'].'
						</center>
					</td>
				</tr>';
	}
	
echo '</table>';

?>