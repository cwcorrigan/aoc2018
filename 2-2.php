<?php

$sequence = file_get_contents('2.txt');
$sequence = explode(PHP_EOL, $sequence);

$answer = [];

foreach($sequence as $line) {
  foreach($sequence as $line2) {
    if($line === $line2) {
      continue;
    }
    if(compareStrings($line, $line2, strlen($line))) {
      $answer[0] = $line;
      $answer[1] = $line2;
    };
  }
}

foreach($answer as $line) {
  echo $line . PHP_EOL;
}

function compareStrings($a, $b, $length) {
  $differences = 0;
  for($i = 0; $i < $length; $i++) {
    if($a[$i] != $b[$i]) {
      $differences++;
    }
  }

  if($differences === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}