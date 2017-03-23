	var t;																			/* верхний слайдер */
	var step = 0;
	function move_slide()
		{
			step++;
			if (step == 1)
				{
					document.getElementById('baner_1').style.left = '-25%';
					document.getElementById('baner_1').style.opacity = '0';
					document.getElementById('baner_1').style.width = '30%';
					document.getElementById('baner_1').style.zIndex = '0';
					
					document.getElementById('baner_2').style.left = '25%';
					document.getElementById('baner_2').style.opacity = '1';
					document.getElementById('baner_2').style.width = '50%';
					document.getElementById('baner_2').style.zIndex = '2';
					
					document.getElementById('baner_3').style.left = '75%';
					document.getElementById('baner_3').style.zIndex = '1';
				}
			if (step == 2)
				{
					document.getElementById('baner_1').style.left = '75%';
					document.getElementById('baner_1').style.zIndex = '1';

					document.getElementById('baner_2').style.left = '-25%';
					document.getElementById('baner_2').style.opacity = '0';
					document.getElementById('baner_2').style.width = '30%';
					document.getElementById('baner_2').style.zIndex = '0';
					
					document.getElementById('baner_3').style.left = '25%';
					document.getElementById('baner_3').style.opacity = '1';
					document.getElementById('baner_3').style.width = '50%';
					document.getElementById('baner_3').style.zIndex = '2';
				}
			if (step == 3)
				{
					document.getElementById('baner_1').style.left = '25%';
					document.getElementById('baner_1').style.opacity = '1';
					document.getElementById('baner_1').style.width = '50%';
					document.getElementById('baner_1').style.zIndex = '2';
					
					document.getElementById('baner_2').style.left = '75%';
					document.getElementById('baner_2').style.zIndex = '1';
					
					document.getElementById('baner_3').style.left = '-25%';
					document.getElementById('baner_3').style.opacity = '0';
					document.getElementById('baner_3').style.width = '30%';
					document.getElementById('baner_3').style.zIndex = '0';
					
					step = 0;					
				}
								
			t = setTimeout('move_slide()', 3000);
		}
	setTimeout('move_slide()', 2000);
	
	
	

	


	function load_general_catalog()																/* генеральная страница каталога */
			{
				$('#catalog').load('../load/general_catalog.html');
				$('#navigation_logo_creator').load('../load/dummy.txt');
				document.getElementById('navigation_produkciya').innerHTML = '';
				setTimeout('baner_opacity()', 4000);
			}
			
			
			
		

	function load_pastry()
			{
				$('#catalog').load('../load/pastry.html');
				document.getElementById('navigation_produkciya').innerHTML = '<a>производитель</a>';
			}
			
	function load_konfet()
			{
				$('#catalog').load('../load/konfet.html');
				document.getElementById('navigation_produkciya').innerHTML = '<a>производитель</a>';
			}
			
			
			
			
			
	function load_creators_pastry()                                                      /* раздел произаодителей печенье */
			{
				$('#catalog').load('../load/creators_pastry.html');
				$('#navigation_logo_creator').load('../load/navigation_pastry.html');
				document.getElementById('navigation_produkciya').innerHTML = '';
			}
			
	function load_creators_konfet()														/* раздел произаодителей конфет */
			{
				$('#catalog').load('../load/creators_konfet.html');
				$('#navigation_logo_creator').load('../load/navigation_konfet.html');
				document.getElementById('navigation_produkciya').innerHTML = '';
			}
		



		
		
		
		



		function read_base()																/* считываем базу - элементы управления */
			{
				read_section_products();
				read_company();
				read_company_active();
			}
			
		function read_base_2()																/* считываем базу - продукция */
			{
				var name_company = document.getElementById('name_company_active').value;
				
				var navigate_company = document.getElementById("navigation_chain_comp").innerHTML;
				var cnt = navigate_company.length - 2;
				navigate_company = navigate_company.substr(0, cnt);
				
				if (name_company != navigate_company)
					{
						var name_product = document.getElementById('name_product').value;
						if (name_company != '')
							{
								document.getElementById("navigation_chain_comp").innerHTML = name_company + "/";
								$('#products').load('../config/read_base.php', "name_product="+name_product+"&name_company="+name_company);
							}
					}
			}
			
			
			
			
		
		function read_section_products()													/* считываем список продукции */
			{
				$('#section_products').load('../config/read_section_products.php');
			}
			
		function read_company()																/* считываем выбор компании */
			{
				$('#company').load('../config/read_company.php');
			}
		
		function read_company_active()																/* считываем компании включенные в раздел продукции  */
			{
				var name_product_active = document.getElementById('name_product').value; 
				
				var navigate_product = document.getElementById("navigation_chain_prod").innerHTML;
				var cnt = navigate_product.length - 2;
				navigate_product = navigate_product.substr(0, cnt);
				
				if (name_product_active != navigate_product)
					{
						$('#section_creator').load('../config/read_company_active.php', "name_product_active="+name_product_active);
					}
			}

		
		
			
		function buttons_down()
			{
				document.getElementById('button_load_tovar').className = 'base_button';
				document.getElementById('button_section_creator').className = 'base_button';
				document.getElementById('button_section_products').className = 'base_button';
			}
			
			
						
			
			
		function load_tovar()													/* открываем панель для загрузки товара */
			{
				$('#open_panel').load('load_image.html');
				document.getElementById('prod_fon').style.top = '480px';
				buttons_down();
				document.getElementById('button_load_tovar').className = 'base_button_down';
			}	
			
		function close_load_tovar()													/* закрываем панель для загрузки товара */
			{
				$('#open_panel').load('../load/dummy.txt');
				read_base_2();
				document.getElementById('prod_fon').style.top = '250px';
				buttons_down();
			}
			
			
		function copy_product_company()
			{
				var copy_name_product = document.getElementById('name_product').value;
				document.getElementById('copy_name_product').value = copy_name_product;	
				
				var name_company = document.getElementById('name_company').value;
				document.getElementById('copy_name_company').value = name_company;
			}
			
			
			
			
			
			
		function section_creator()													/* открываем панель создания раздела производителя */
			{
				$('#open_panel').load('section_creator.html');
				document.getElementById('prod_fon').style.top = '480px';
				buttons_down();
				document.getElementById('button_section_creator').className = 'base_button_down';
			}
			
		function close_section_creator()													/* закрываем панель создания раздела производителя */
			{
				$('#open_panel').load('../load/dummy.txt');
				read_base_2();
				read_company();
				document.getElementById('prod_fon').style.top = '250px';
				buttons_down();
			}
			
			
			
			
			
			
		function section_products()													/* открываем панель создания раздела производителя */
			{
				$('#open_panel').load('section_products.html');
				document.getElementById('prod_fon').style.top = '480px';
				buttons_down();
				document.getElementById('button_section_products').className = 'base_button_down';
			}
			
		function close_section_products()													/* закрываем панель создания раздела производителя */
			{
				$('#open_panel').load('../load/dummy.txt');
				read_base_2();
				read_section_products();
				document.getElementById('prod_fon').style.top = '250px';
				buttons_down();
			}

		
		
		

