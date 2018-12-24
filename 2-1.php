<?php

$sequence = file_get_contents('2.txt');
$sequence = explode(PHP_EOL, $sequence);

$occurs = [];
$occurs[2] = 0;
$occurs[3] = 0;

foreach($sequence as $line) {
  $count = count_chars($line, 1);
  $twos = array_keys($count, '2');
  $threes = array_keys($count, '3');

  if(count($twos) > 0) {
    $occurs[2]++;
  }
  if(count($threes) > 0) {
    $occurs[3]++;
  }
}

echo $occurs[2] * $occurs[3];