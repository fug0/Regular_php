<meta charset="utf-8">
<?php
 
error_reporting(-1);
mb_internal_encoding('utf-8');

$text = 
"Дым табачный воздух выел.
Комната —
глава в крученыховском аде.
Вспомни —
за этим окном
впервые
руки твои, исступлённый, гладил.
Сегодня сидишь вот,
сердце в железе.
День ещё —
выгонишь,
может быть, изругав.
В мутной передней долго не влезет
сломанная дрожью рука в рукав.";

//разбиение по строкам
$regexp = "/[\n]/u";
$sentences = preg_split($regexp, $text);


//поиск максимальной длины строки
$maxStrLen = 0;
foreach ($sentences as $value) {
	if (mb_strlen($value) > $maxStrLen) {
			$maxStrLen = mb_strlen($value);
	}
}

//дополнение строк символами "1" до макс длины
for ($i=0; $i < count($sentences); $i++) { 
	$sentences[$i] = mb_substr($sentences[$i], 0, mb_strlen($sentences[$i])-1);
	$sentences[$i] .= str_repeat("1", ($maxStrLen - mb_strlen($sentences[$i])-1));;
}

//разделение каждой строки на массив по буквам
for ($i=0; $i < count($sentences); $i++) { 
	$sentences[$i] = preg_split("//u", $sentences[$i], -1, PREG_SPLIT_NO_EMPTY);
}

//вывод текста вертикально
echo "<pre>";
for ($i=0; $i < $maxStrLen-1; $i++) {
	$r = '';
	foreach ($sentences as $value) {
		if ($value[$i] == "1") {
			$value[$i] = " ";
		}
		$r .= "| " . $value[$i] . " ";
	}
	echo "$r|<br>";
}


