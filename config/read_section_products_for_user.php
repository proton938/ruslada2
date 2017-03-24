

<?php
					
$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM section_products');
$readbuf = $buf->fetchAll();
 
$j = 0;

echo '<table style = "width: 100%">';

foreach ($readbuf as $mass)											
	{		
		$image = substr($mass['image'], 0);
		$j++;
		
		if ($j == 1)
			{
				echo '<tr>';
			}
			
			echo '<td style = "position: relative; vertical-align: top; width: 25%;">
					<img src = "../images/kuadrat.png" style =  "position: relative; width: 100%;">
					<img style = "position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" 
					onmouseover = "this.style.opacity = \'0.5\'"
					onmouseout = "this.style.opacity = \'1.0\'"
					onclick = "";
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
 
