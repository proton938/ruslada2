<html>

<header>

<link rel = "stylesheet" href = "../css/for_admin.css">

<script src = "../js/scripts.js"></script>
<script src = "../js/jquery-3.1.1.js"></script>

</header>


<body style = "background: url('../images/for_admin/fon.jpg');" onload = "read_base()">
	
	<form method = "POST" enctype = "multipart/form-data" action = "../config/create_base.php" target = "create_base">
		<input type = "submit" style = "position: absolute; z-index: 5;" value = "-" />
	</form>
	
	<div style = "position: absolute; width: 100%; left: 0px; top: 0px;">
		<iframe name = "create_base" width = "0px" height = "0px"></iframe>
		<center>
	
		<div style = "position: fixed; top: 0px; padding-top: 20px; width: 100%; z-index: 2; background: url('../images/for_admin/fon.jpg');">

		
			<div style = " margin-top: 0px;" class = "brd_down center_template">
				<div style = "position: relative; width: 99.5%; background: #ddd; padding-top: 5px; padding-bottom: 10px;" class = "brd_up">
				
				
					<div class = "thin_down" style = "width: 98%; margin-top: 10px;">
						<table class = "thin_up" style = "width: 100%; padding-top: 5px; padding-bottom: 5px;">
							<tr>
								<td style = "padding: 5px;" class = "head_panel">
								<center>
									Система Управления Базой Данных <a style = "color: #B22222; margin-left: 10px;"> (Осторожно! Нажимать клавиши только при обдуманном действии!) </a>
								</center>
								</td>					
							</tr>
						</table>
					</div>
					
					
					<div class = "thin_down" style = "width: 98%; margin-top: 20px;">  
					
						<table cellspacing = "10px" width = "100%" class = "thin_up">                    <!-- верхняя основная панель -->
							<tr style = "vertical-align: top;">
								<td>
									<input id = "button_section_products" type = "button" class = "base_button" style = "float: left;"  value = "создать раздел продукции" onclick = "section_products()" />
									<input id = "button_section_creator" type = "button" class = "base_button" style = "float: left;"  value = "создать раздел производителя" onclick = "section_creator()" />
								</td>
								<td>
									<select name = "creator" id = "creator" class = "base_select" style = "float: right;">
										<option selected="selected" >список производителей</option>
										<option>Аскона</option>
										<option>Орматек</option>
										<option>Райтон</option>
										<option>Verda</option>
										<option>Serta</option>
									</select>
								</td>
								<td>
									<input id = "button_load_tovar" type = "button" class = "base_button" style = "float: right;" value = "загрузить товар" onclick = "load_tovar()" />
								</td>
							</tr>
						</table>
						
						<div id = "open_panel"></div>      <!-- открываемая панель -->
						
					</div>	
					
					
				</div>
			</div>
			
			<div id = "left_panel" class = "brd_down" style = "position: absolute; left: 5%; top: 100px; width: 10%; overflow: hidden; z-index: 5;">        <!-- левая панель -->	
				<div class = "brd_up" style = "width: 96%; height: 97%; background: #ddd; padding-bottom: 10px;">
				
					<div class = "thin_down"  style = "width: 80%; margin-top: 10px;">
						<table class = "thin_up" style = "width: 100%; padding-top: 5px; padding-bottom: 5px;">
							<tr>
								<td style = "padding: 5px;" class = "head_panel">
									<center>
									Список продукции
									</center>
								</td>					
							</tr>
						</table>
					</div>
					
					<div id = "section_products" class = "thin_down"  style = "width: 80%; margin-top: 10px;">
					</div>
					
				</div>
			</div>
			
			
		</div>
		
		
		<div id = "prod_fon" style = "position: relative; width: 100%; top: 200px;">
			<div id = "navigation_chain" class = "head_panel" style = "padding-bottom: 10px;">												<!-- навигационная цепочка -->
			</div>
			
			<div id = "products" style = " background: #fff;" class = "brd_down center_template"></div>    <!-- загрузка таблицы товаров -->        
			<div style = "height: 20px;">
			</div>
		</div>
		
		
		</center>
	</div>
</body>

</html>