
<?php

// уменьшитель изображений

if (isset($_REQUEST['i'])) { $filename = $_REQUEST['i']; }

$extension = substr($filename, -4);


// устанавливаем тип загружаемого изображения
header('Content-type: image/jpeg, image/png');

// определяем размеры
list($width, $height) = getimagesize($filename);

// загрузка
$thumb = imagecreatetruecolor(500, 375);

if ($extension == '.jpg')
	{
		$source = imagecreatefromjpeg($filename);
	
		// замена размеров
		imagecopyresized($thumb, $source, 0, 0, 0, 0, 500, 375, $width, $height);

		// вывод в файл
		imagejpeg($thumb, $filename);
	}


if ($extension == '.png')
	{
		$source = imageCreateFromPng($filename);
		
		// замена размеров
		imagecopyresized($thumb, $source, 0, 0, 0, 0, 500, 375, $width, $height);

		// вывод в файл
		imagepng($thumb, $filename);
	}
	

?>
