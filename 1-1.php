<?php

$sequence = file_get_contents('1.txt');
$sequence = explode(PHP_EOL, $sequence);

$total = 0;

foreach($sequence as $step) {
  $value = ltrim($step, '+-');
  switch($step[0]) {
    case '-':
      $total -= $value;
      break;
    case '+':
      $total += $value;
      break;
  }
}

echo $total;