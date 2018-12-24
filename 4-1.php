<?php

$sequence = file_get_contents('4.txt');
$sequence = explode(PHP_EOL, $sequence);

$sleep = [];

asort($sequence);

$start = '';
$guard = '';

foreach($sequence as $line) {
  switch(substr($line, 19)) {
    case 'falls asleep':
      $start = (int)substr($line, 15, 2);
      break;
    case 'wakes up':
      $end = (int)substr($line, 15, 2);
      for($s = $start; $s < $end; $s++) {
        $sleep[$guard][$s] += 1;
      }
      $sleep[$guard]['total'] += ($end - $start);
      $start = '';
      break;
    default:
      $guard = substr($line, 19);
      break;
  }
}

$highest = 0;
$guard = [];

foreach($sleep as $key => $temp_guard) {
  if($temp_guard['total'] > $highest) {
    $highest = $temp_guard['total'];
    $guard['id'] = $key;
    $guard['stats'] = $temp_guard;
  }
}

ksort($guard['stats']);

print_r($guard);