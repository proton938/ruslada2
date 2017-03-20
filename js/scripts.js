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
		






		function read_base()													/* считываем базу */
			{
				$('#products').load('../config/read_base.php');
				read_section_products();
			}
		
		function read_section_products()													/* считываем список продукции */
			{
				$('#section_products').load('../config/read_section_products.php');
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
				read_base();
				document.getElementById('prod_fon').style.top = '200px';
				buttons_down();
			}
			
			
			
			
			
			
		function section_creator()													/* открываем панель создания раздела производителя */
			{
				$('#open_panel').load('section_creator.html');
				document.getElementById('prod_fon').style.top = '440px';
				buttons_down();
				document.getElementById('button_section_creator').className = 'base_button_down';
			}
			
		function close_section_creator()													/* закрываем панель создания раздела производителя */
			{
				$('#open_panel').load('../load/dummy.txt');
				read_base();
				document.getElementById('prod_fon').style.top = '200px';
				buttons_down();
			}
			
			
			
			
			
			
		function section_products()													/* открываем панель создания раздела производителя */
			{
				$('#open_panel').load('section_products.html');
				document.getElementById('prod_fon').style.top = '440px';
				buttons_down();
				document.getElementById('button_section_products').className = 'base_button_down';
			}
			
		function close_section_products()													/* закрываем панель создания раздела производителя */
			{
				$('#open_panel').load('../load/dummy.txt');
				read_base();
				document.getElementById('prod_fon').style.top = '200px';
				buttons_down();
			}

		
		
		

