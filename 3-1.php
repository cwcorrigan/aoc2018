<?php

$sequence = file_get_contents('3.txt');
$sequence = explode(PHP_EOL, $sequence);

$grid = [];
$total = 0;

foreach($sequence as $line) {
  $instruct = explode(' ', $line);

  $id = $instruct[0];
  $coords = explode(',', rtrim($instruct[2], ':'));
  $size = explode('x', $instruct[3]);

  $x_coord = $coords[0];
  $y_coord = $coords[1];

  $x_size = $size[0];
  $y_size = $size[1];

  for($x = $x_coord; $x < ($x_coord+$x_size); $x++) {
    for($y = $y_coord; $y < ($y_coord+$y_size); $y++) {
      if($grid[$x][$y] === 'M') {
        continue;
      } else if (!empty($grid[$x][$y])) {
        $grid[$x][$y] = 'M';
        $total++;
      } else {
        $grid[$x][$y] = $id;
      }
    }
  }
}

echo $total . PHP_EOL;