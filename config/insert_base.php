<head>

<script src = "../js/scripts.js"></script>
<script src = "../js/jquery-3.1.1.js"></script>

</head>


<div id = "procedure"></div>



<?php	



 $db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');

 
if (isset($_POST['load_pastry']))                                     					// добавить товар

	{
		$name_product = $_POST['copy_name_product'];		                            // считываем название продукции
		
		if ($name_product != '')
			{
				$name_company = $_POST['copy_name_company'];		                            // считываем название производителя
						
				if ($name_company != '')			
					{						
						$name = $_POST['name_tovar'];		                            				// считываем наименование товара
																								  
						$weight = $_POST['weight'];                                  					// считываем вес

						$timelimit = $_POST['timelimit'];                             					// считываем cрок хранения

						$newprod = $_POST['newprod'];                                                   // считываем значение новинка

						$action = $_POST['action'];                                                     // считываем значение акции

													   
					   if (is_uploaded_file($_FILES['load_img'] ['tmp_name']))                  // если изображение выбрано ...

						{	
							 $path = '../images/';									
							 $ship_img = $path.basename($_FILES['load_img'] ['name']);
							 
								
							 // загружаем фото товара	
							 
							 move_uploaded_file($_FILES['load_img'] ['tmp_name'], $ship_img); 
							 
							 echo '<div id = "name_img" style = "display: none;">'.$ship_img.'</div>';	                   // процедура вызова уменьшителя изображения
							 echo '<script>var i = document.getElementById("name_img").innerHTML;
								   $("#procedure").load("image_size.php", "i="+i);</script>';
								   

							 echo '<div style = "color: red; font-family: arial; font-size: 20;">
								   <center>
										Продукт загружен в базу
								   </center></div>';									 
																																									
								 $db->query('INSERT INTO '.$name_product.' (	name_product,
																				name_company,
																				image, 
																				name_tovar,                                    
																				weight, 
																				timelimit,
																				newprod,
																				action
																			   ) 
																					VALUES ("'.$name_product.'",
																							"'.$name_company.'",
																							"'.$ship_img.'",
																							"'.$name.'", 
																							"'.$weight.'",
																							"'.$timelimit.'",
																							"'.$newprod.'",
																							"'.$action.'")');
						 
						}
					else
						{
							$db->query('INSERT INTO '.$name_product.' (	name_product,
																				name_company,
																				image, 
																				name_tovar,                                    
																				weight, 
																				timelimit,
																				newprod,
																				action
																			   ) 
																					VALUES ("'.$name_product.'",
																							"'.$name_company.'",
																							"'.$ship_img.'",
																							"'.$name.'", 
																							"'.$weight.'",
																							"'.$timelimit.'",
																							"'.$newprod.'",
																							"'.$action.'")');
						}		
				
					}
				else
					{
						echo   '<div style = "color: red; font-family: arial; font-size: 20;">
								<center>Не выбран производитель</center>
								</div>';
					}
			}
		else
			{
				echo	'<div style = "color: red; font-family: arial; font-size: 20;">
						<center>Не выбран раздел продукции</center>
						</div>';
			}			
	}






