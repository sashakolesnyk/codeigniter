<?php
date_default_timezone_set('Europe/Kiev');
$now = date("Y-m-d H:i:s");

$size = count($result);
echo '<h1>ИСТОРИЯ Курсов валют ПриватБанка ИЗ БАЗЫ ДАННЫХ</h1><br><hr><br>';
echo '<p>Наличный курс ПриватБанка (в отделениях):</p>';


echo '<style>
   table { 
    width: 800px; /* Ширина таблицы */
    border: 4px double black; /* Рамка вокруг таблицы */
    border-collapse: collapse; /* Отображать только одинарные линии */
	text-align: center;
   }
   th { 
    text-align: center; /* Выравнивание по левому краю */
    background: #ccc; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
  </style>
';echo 'Сегодня: '.$now; echo '<br>
		<table>
			<tr>
				<th>Дата</th>
				<th>Валюта (за 1 ед.)</th>
				<th>Банк покупает у вас по (грн)</th>
				<th>Банк продает вам по (грн)</th>
			</tr>
			'; 
			
			for ($i = 0; $i < $size; $i++)
			{
				$arr = json_decode($result[$i]['json'], true);
				
				$timestamp = strtotime($result[$i]['dat']);
				$local_time = $timestamp + 10800;
				$right_time = date('Y-m-d H:i:s', $local_time);
				
				echo '
					<tr>
						<td>'; echo $right_time ;echo '</td>
						<td>'; echo $arr[0]['ccy'] ;echo '</td>
						<td>'; echo $arr[0]['buy'] ;echo '</td>
						<td>'; echo $arr[0]['sale'] ;echo '</td>
					</tr>
					<tr>
						<td>'; echo $right_time ;echo '</td>
						<td>'; echo $arr[1]['ccy'] ;echo '</td>
						<td>'; echo $arr[1]['buy'] ;echo '</td>
						<td>'; echo $arr[1]['sale'] ;echo '</td>
					</tr>';
			}
			
		 echo '
		</table>
';