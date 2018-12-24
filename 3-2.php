<?php

$sequence = file_get_contents('3.txt');
$sequence = explode(PHP_EOL, $sequence);

$grid = [];
$uniq_id = 0;

foreach($sequence as $line) {
  $instruct = explode(' ', $line);

  $id = $instruct[0];
  $coords = explode(',', rtrim($instruct[2], ':'));
  $size = explode('x', $instruct[3]);

  $x_coord = $coords[0];
  $y_coord = $coords[1];

  $x_size = $size[0];
  $y_size = $size[1];

  $collision = FALSE;

  for($x = $x_coord; $x < ($x_coord+$x_size); $x++) {
    for($y = $y_coord; $y < ($y_coord+$y_size); $y++) {
      if($grid[$x][$y] === 'M') {
        $possible[$id] = FALSE;
        $collision = TRUE;
        continue;
      } else if (!empty($grid[$x][$y])) {
        $possible[$grid[$x][$y]] = FALSE;
        $grid[$x][$y] = 'M';
        $possible[$id] = FALSE;
        $collision = TRUE;
        $total++;
      } else {
        $grid[$x][$y] = $id;
      }
    }
  }

  if($collision === FALSE) {
    $possible[$id] = TRUE;
  }
}

foreach($possible as $id => $value) {
  if($value === TRUE) {
    echo $id . PHP_EOL;
  }
}