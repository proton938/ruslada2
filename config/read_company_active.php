<?php
if (isset($_REQUEST['name_product_active'])) { $name_product_active = $_REQUEST['name_product_active'];}  // считываем название выбранной в панели продукции


$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');

$buf1 = $db->query('SELECT * FROM '.$name_product_active);					 // читаем таблицу выбранного раздела продукции
$readbuf1 = $buf1->fetchAll();
 
$buf = $db->query('SELECT * FROM company');									// читаем список производителей
$readbuf = $buf->fetchAll();




$count_company_active = 0;                               // процедура определения числа задействованных компаний для скрипта for (y = 1; y <= '.$count_company_active.'; y++)

foreach ($readbuf as $mass)
	{	
		$stk = 0;
		foreach ($readbuf1 as $mass1)
			{
				if ($mass['name_company'] == $mass1['name_company'])
					{
						$stk = 1;
					}
			}
		if ($stk != 0)
			{
				$count_company_active++;
			}
	}




$id_company = 0;

echo '<table style = "width: 100%;">';

foreach ($readbuf as $mass)
	{				
		$success_search = 0;
		
		foreach ($readbuf1 as $mass1)										// отслеживаем учястие компании в производстве данной продукции ...
			{
				if ($mass['name_company'] == $mass1['name_company'])
					{
						$success_search = 1;
					}
			}
		
		if ($success_search != 0)											// ... если учавствует выводим в список активных производителей в правой панели
					{	
						$id_company++;
			
						echo 	'	
								<script>
						
									function company_button_down_'.$id_company.'()
										{
											for (y = 1; y <= '.$count_company_active.'; y++)
												{
													document.getElementById("company_button" + y).className = "product_button";
													document.getElementById("company_screen_" + y).style.opacity = "1";
												}
											document.getElementById("company_button'.$id_company.'").className = "product_button_down"; 
											document.getElementById("company_screen_'.$id_company.'").style.opacity = "0.5";
											document.getElementById("name_company_active").value = "'.$mass['name_company'].'";
											var sel = document.getElementById("name_company");
											sel.value = "'.$mass['name_company'].'";
											read_base_2();
										}
										
								</script>';
				
																
						  echo	'<tr>
									<td id = "company_button'.$id_company.'" 
										class = "product_button" 
										onclick = "company_button_down_'.$id_company.'()"> 						
										<center>';	
									
										
								 echo	'<div style = "position: relative; width: 90%;">
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
	}
	
echo '</table>';

?>