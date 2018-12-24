<?php

$sequence = file_get_contents('1.txt');

$sequence = explode(PHP_EOL, $sequence);

$total = 0;
$existing = [];
$running = TRUE;
$i = 0;

while($running) {
  $value = ltrim($sequence[$i], '+-');
  switch($sequence[$i][0]) {
    case '-':
      $total -= $value;
      break;
    case '+':
      $total += $value;
      break;
  }

  if(in_array($total, $existing)) {
    $running = FALSE;
  } else {
    $existing[] = $total;
    if(!isset($sequence[$i+1])) {
      $i = 0;
    } else {
      $i++;
    }
  }
}

echo $total;