<?php

/**
 * Day 2, Part 2
 * https://adventofcode.com/2022/day/2
 */

echo "Calculating... 🪨 📄 ✂️ \n";

// Read the text file of rock paper scissors rounds.
$rounds = file_get_contents( __DIR__ . '/input.txt' );
$rounds = explode( "\n", $rounds );

// Establish symbol definitions.
$choices = array(
  'A' => 'rock',
  'B' => 'paper',
  'C' => 'scissors',
);

$outcomes = array(
  'X' => 'lose',
  'Y' => 'draw',
  'Z' => 'win',
);

// Establish points.
$choice_points = array(
  'rock'     => 1,
  'paper'    => 2,
  'scissors' => 3,
);

$outcome_points = array(
  'lose' => 0,
  'draw' => 3,
  'win'  => 6,
);

// Establish game logic.
$logic = array(
  'rock' => array(
    'lose' => 'scissors',
    'draw' => 'rock',
    'win'  => 'paper',
  ),
  'paper' => array(
    'lose' => 'rock',
    'draw' => 'paper',
    'win'  => 'scissors',
  ),
  'scissors' => array(
    'lose' => 'paper',
    'draw' => 'scissors',
    'win'  => 'rock',
  ),
);

// Calculate total points.
$total_score = 0;

// Determine what play to make for each round.
foreach ( $rounds as $round ) {
  if ( empty( $round ) ) {
    continue;
  }

  $round = explode( " ", $round );
  $opponent_choice = $choices[ $round[0] ];
  $desired_outcome = $outcomes[ $round[1] ];

  $my_choice = $logic[ $opponent_choice ][ $desired_outcome ];

  $total_score += $choice_points[ $my_choice ] + $outcome_points[ $desired_outcome ];
}

// ANSWER:
echo "Final score: $total_score \n";
