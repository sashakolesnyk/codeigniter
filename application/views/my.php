<?php
date_default_timezone_set('Europe/Kiev');
$now = date("Y-m-d H:i:s");
$arr = json_decode($result, true);
echo '<h1>Курсы валют ПриватБанка НА ДАННЫЙ МОМЕНТ</h1><br><hr><br>';
echo '<p>Наличный курс ПриватБанка (в отделениях):</p>';


echo 'Cейчас: '.$now.'<br><hr>';

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

		<table>
			<tr>
				<th>Дата (кэшируется)</th>
				<th>Валюта (за 1 ед.)</th>
				<th>Банк покупает у вас по (грн)</th>
				<th>Банк продает вам по (грн)</th>
			</tr>
			<tr>
				<td>';echo $now; echo '</td>
				<td>';echo $arr[0]['ccy']; echo '</td>
				<td>';echo $arr[0]['buy']; echo '</td>
				<td>';echo $arr[0]['sale']; echo '</td>
			</tr>
			<tr>
				<td>';echo $now; echo '</td>
				<td>';echo $arr[1]['ccy']; echo '</td>
				<td>';echo $arr[1]['buy']; echo '</td>
				<td>';echo $arr[1]['sale']; echo '</td>
			</tr>
		
		
		</table>
';