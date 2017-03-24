 <?php

 
 
 if (isset($_POST['create_section_company']))                                                // создаем раздел компании
	{
		$company = $_POST['name_company'];
		echo $company;
		
		 $db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
		 
		 if (is_uploaded_file($_FILES['load_img'] ['tmp_name']))                  // если изображение выбрано ...

		{	
		 $path = '../images/';									
		 $ship_img = $path.basename($_FILES['load_img'] ['name']);
		 
			
		 // загружаем фото товара	
		 
		 move_uploaded_file($_FILES['load_img'] ['tmp_name'], $ship_img);
		 
		 }
		 
 
		$db->query('INSERT INTO company (  	image, 
											name_company)
														VALUES
															(
																"'.$ship_img.'",
																"'.$company.'"
															)');
	}
	
	
	
	
	

 if (isset($_POST['create_section_product']))                                                // создаем раздел продукции
	{
		$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
		
		 if (is_uploaded_file($_FILES['load_img'] ['tmp_name']))                  // если изображение выбрано ...

		{	
		 $path = '../images/';									
		 $ship_img = $path.basename($_FILES['load_img'] ['name']);
		 
			
		 // загружаем фото товара	
		 
		 move_uploaded_file($_FILES['load_img'] ['tmp_name'], $ship_img);
		 
		 }
		
		$product = $_POST['name_product'];
		echo $product;
			
		$db->query('CREATE TABLE '.$product.' (	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,      
												name_product,
												name_company,
												image, 
												name_tovar,                                    
												weight, 
												timelimit,
												newprod,
												action
												)');
									
									
		$db->query('INSERT INTO section_products ( 	image, 
													name_section
																)
																VALUES
																	(
																		"'.$ship_img.'",
																		"'.$product.'"
																	)');
	}
	
	

	
	
$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db'); 
 
 
$db->query('CREATE TABLE section_products (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
											image, 
											name_section
											)');
											
											
											
$db->query('CREATE TABLE company ( 	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
									image, 
									name_company
									)');
									
 

									
?>
									
 
 
 