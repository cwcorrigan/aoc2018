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
$answer = [];

foreach($sleep as $key => $stats) {
  foreach($stats as $minute => $stat) {
    if(!is_numeric($minute)) {
      continue;
    }

    if($stat > $highest) {
      $highest = $stat;
      $answer['id'] = $key;
      $answer['minute'] = $minute;
    }
  }
}

$answer['solution'] = filter_var($answer['id'], FILTER_SANITIZE_NUMBER_INT) * $answer['minute'];

foreach($answer as $key => $value) {
  echo $key . ': ' . $value . PHP_EOL;
}