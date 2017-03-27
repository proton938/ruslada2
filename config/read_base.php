<?php

if (isset($_REQUEST['name_product'])) { $name_product = $_REQUEST['name_product'];}  // считываем название продукции

if (isset($_REQUEST['name_company'])) { $name_company = $_REQUEST['name_company'];}  // считываем название производителя	                            		
  

if ($name_company != '')

	{
		if ($name_product != '')

			{					
				$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
				 
				$buf = $db->query('SELECT * FROM '.$name_product);
				$readbuf = $buf->fetchAll();
				
				
				
				// открываем процедуру выравнивания таблицы
				$cnt = 0;
				
				foreach ($readbuf as $mass)	
					{
						if ($name_company == $mass['name_company'])    					
							{
								$cnt++;
							}
					}					
				
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
				
				 
				$j = 0;

				foreach ($readbuf as $mass)											
					{
						
						/** 	сверяем имя компании, прописанной в атрибутах товара с выбранным в панели производителем
								если значения совпадают выводим товар в браузер, чтобы на экране были товары только выбранного производителя  	**/
						
						if ($name_company == $mass['name_company'])    					
							{
								$image = substr($mass['image'], 0);
								$j++;
								if ($j == 1)
									{
										echo '<tr style = "vertical-align: top;">';
									}
									
									echo '<td style = "position: relative; vertical-align: top; width: 25%;">
											<div class = "tovar" style = "width: 100%;">
											<img src = "../images/rectangle.png" style =  "position: relative; width: 100%;">
											<img style = "position: absolute; top: 0px; left: 0px; width: 100%;" src = "';
									
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
											<p class = "name_tovar">
												'.$mass['name_tovar'].'
											</p>
											<p>
												Вес упаковки: '.$mass['weight'].' кг <br>
												Срок годности: '.$mass['timelimit'].' суток          <br><br>
											</p>
											
											<p>
												';
											if ($mass['newprod'] == 'on')
												{
													echo 'Новинка <br>';
												}
											if ($mass['action'] == 'on')
												{
													echo 'Акция<br>';
												}
												
									echo	'</p>
											
											<br>
											</div>
										</td>';
									
								if ($j == 4)
									{
										echo '</tr>';
										$j = 0;
									}
							}
					}

				echo '</table>';
			}
	}

 
?>
 
