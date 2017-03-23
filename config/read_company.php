<select id = "name_company" name = "name_company" class = "base_select" style = "float: right; width: 100%;">

<option selected = "selected" ></option>

<?php

$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');
 
$buf = $db->query('SELECT * FROM company');
$readbuf = $buf->fetchAll();

foreach ($readbuf as $mass)
	{
		echo '<option>'.$mass['name_company'].'</option>';
	}

?>


</select>