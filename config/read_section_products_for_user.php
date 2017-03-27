<!-- <div style = "width: 100px; height: 100px; background: red;"></div> -->

<?php
					
$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM section_products');
$readbuf = $buf->fetchAll();
 
$j = 0;

// открываем процедуру выравнивания таблицы
$cnt = count($readbuf);					
				
if ($cnt == 1)
	{
		echo '<table style = "width: 25%">';
	}
if ($cnt == 2)
	{
		echo '<table style = "width: 50%">';
	}
if ($cnt == 3)
	{
		echo '<table style = "width: 75%">';
	}
if ($cnt > 3)
	{
		echo '<table style = "width: 100%">';
	}
// закрываем процедуру выравнивания таблицы


foreach ($readbuf as $mass)											
	{		
		$image = substr($mass['image'], 0);
		$j++;
		
		echo '<script>
				function read_company_active_for_user_'.$mass['id'].'()													
					{
						var name_section = "'.$mass['name_section'].'";
						$("#catalog").load("../config/read_company_active_for_user.php", "name_section="+name_section);
						document.getElementById("navigation_produkciya").innerHTML = "";
					}
					
				function back_to_page_'.$mass['id'].'()													
					{
						read_company_active_for_user_'.$mass['id'].'();	
						document.getElementById("navigation_logo_creator").innerHTML = "<a onclick = \' read_company_active_for_user_'.$mass['id'].'() \'> '.$mass['name_section'].' /</a>";
					}
			  </script>';
		
		if ($j == 1)
			{
				echo '<tr>';
			}
			
			echo '<td style = "position: relative; vertical-align: top; width: 25%;">
					<img src = "../images/kuadrat.png" style =  "position: relative; width: 100%;">
					<img style = "position: absolute; left: 10%; top: 10%; width: 80%; height: 80%;" 
					onmouseover = "this.style.opacity = \'0.5\'"
					onmouseout = "this.style.opacity = \'1.0\'"
					onclick = "back_to_page_'.$mass['id'].'()";
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
			
		if ($j == 4)
			{
				echo '</tr>';
				$j = 0;
			}

	}

				echo '</table>';

?>
 
