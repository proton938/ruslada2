<?php
 
$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM pastry');
$readbuf = $buf->fetchAll();
 
$j = 0;

echo '<table>';

foreach ($readbuf as $mass)
	{
		$image = substr($mass['image'], 0);
		$j++;
		if ($j == 1)
			{
				echo '<tr>';
			}
			
			echo '<td style = "vertical-align: top;">
					<div class = "tovar" style = "width: 100%;">
					<img width = "100%" src = "';
			
			if ($image != '')                             // если ячейка изображения не пустая - выводим содержимое
				{
					echo $image;
				}
			else                                          // если пустая - выводим изображение п умолчанию
				{
					echo '../images/for_admin/dummy.jpg';
				}
					
			echo '" 
						onmouseover = "this.style.opacity = \'0.5\'"
						onmouseout = "this.style.opacity = \'1\'"
						onclick = "in_tovar'.$mass['id'].'()"
						style = "border-bottom: solid 2px #dddddd;">
					<a class = "name_tovar">
						Печенье: '.$mass['name_tovar'].'
					</a>
					<br>
					<a>
						Вес упаковки: '.$mass['weight'].' кг <br>
						Срок годности: '.$mass['timelimit'].' суток          <br><br>
					</a>
					
					<a>
						';
					if ($mass['newprod'] == 'on')
						{
							echo 'Новинка <br>';
						}
					if ($mass['action'] == 'on')
						{
							echo 'Акция<br>';
						}
						
			echo	'</a>
					
					<br>
					</div>
				</td>';
			
		if ($j == 4)
			{
				echo '</tr>';
				$j = 0;
			}
	}

echo '</table>';	
 
?>
 