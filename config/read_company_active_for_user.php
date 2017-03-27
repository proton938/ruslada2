

<?php

if (isset($_REQUEST['name_section'])) { $name_section = $_REQUEST['name_section'];}  		// считываем название выбранной в панели продукции

					
$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM company');									// читаем список производителей
$readbuf = $buf->fetchAll();

$buf1 = $db->query('SELECT * FROM '.$name_section);					 // читаем таблицу выбранного раздела продукции
$readbuf1 = $buf1->fetchAll();
 
$j = 0;



// открываем процедуру выравнивания таблицы

$cnt = 0;
				
foreach ($readbuf as $mass)											
	{		
		$success_search = 0;
		
		foreach ($readbuf1 as $mass1)								
			{
				if ($mass['name_company'] == $mass1['name_company'])
					{
						$success_search = 1;
					}	
			}
		if ($success_search != 0)										
			{
				$cnt++;
			}
	}
		
		if ($cnt == 1)
			{
				echo '<table style = "width: 20%">';
			}
		if ($cnt == 2)
			{
				echo '<table style = "width: 40%">';
			}
		if ($cnt == 3)
			{
				echo '<table style = "width: 60%">';
			}
		if ($cnt == 4)
			{
				echo '<table style = "width: 80%">';
			}
		if ($cnt > 4)
			{
				echo '<table style = "width: 100%">';
			}

	

	
// закрываем процедуру выравнивания таблицы
				
								

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
			
			
		if ($success_search != 0)											// ... если учавствует выводим в список активных производителей
			{				
			
			echo '<script>
				function read_product_active_for_user_'.$mass['id'].'()													
					{
						var name_product = "'.$name_section.'";
						var name_company = "'.$mass['name_company'].'";
						$("#catalog").load("../config/read_base.php", "name_company="+name_company+"&name_product="+name_product);
						document.getElementById("navigation_produkciya").innerHTML = "<a>'.$mass['name_company'].'</a>";
					}
			  </script>';
			  
			  
				$image = substr($mass['image'], 0);
				$j++;
				
				if ($j == 1)
					{
						echo '<tr style = "vertical-align: center;">';
					}
					
					echo '<td style = "position: relative; width: 25%;">
							<img style = "width: 90%;" 
							onmouseover = "this.style.opacity = \'0.5\'"
							onmouseout = "this.style.opacity = \'1.0\'"
							onclick = "read_product_active_for_user_'.$mass['id'].'()";
							src = "';
					
					if ($image != '')                             // если ячейка изображения не пустая - выводим содержимое
						{
							echo $image;
						}
					else                                          // если пустая - выводим изображение п умолчанию
						{
							echo '../images/for_admin/dummy.jpg';
						}
							
					echo '" >

						</td>';
					
				if ($j == 5)
					{
						echo '</tr>';
						$j = 0;
					}
			}

	}

				echo '</table>';

?>