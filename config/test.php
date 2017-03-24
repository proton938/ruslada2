

<?php

$db = new PDO('sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'base.db');

$buf1 = $db->query('SELECT * FROM Слоеное');
$readbuf1 = $buf1->fetchAll();
 
$buf = $db->query('SELECT * FROM company');
$readbuf = $buf->fetchAll();

foreach ($readbuf as $mass)
	{
		foreach ($readbuf1 as $mass1)
			{
				if ($mass1['name_company'] == $mass['name_company'])
					{
						echo 'СОВПАДУХА!!! ';
					}
				else
					{
						echo $mass1['name_company'].' ';
					}
			}
			
		echo ' '.$mass['name_company'].'<br><br>';
	}