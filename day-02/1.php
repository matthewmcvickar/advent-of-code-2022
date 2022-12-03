<?php

/**
 * Day 2, Part 1
 * https://adventofcode.com/2022/day/2
 */

echo "Calculating... 🪨 📄 ✂️ \n";

// Read the text file of rock paper scissors rounds.
$rounds = file_get_contents( __DIR__ . '/input.txt' );
$rounds = explode( "\n", $rounds );

// Indicate how many points each choice is worth.
function get_choice_points( $round ) {
  // First, extract the choice from the string.
  $choice = substr( $round, 2 );

  switch ( $choice ) {
    case 'X': // rock
      return 1;
      break;
    case 'Y': // paper
      return 2;
      break;
    case 'Z': // scissors
      return 3;
      break;
  }
}

// Indicate how many points each outcome is worth.
function get_outcome_points( $outcome ) {
  if ( empty( $outcome ) ) {
    return 0;
  }

  switch ( $outcome ) {
    case 'lose':
      return 0;
      break;
    case 'draw':
      return 3;
      break;
    case 'win':
      return 6;
      break;
  }
}

// Indicate the outcome for different choice matchups.
function get_outcome( $round ) {
  if ( empty( $round ) ) {
    return 0;
  }

  switch ( $round ) {
                // THEM      vs.        ME
                // -----------------------
    case 'A X': // rock      vs.      rock
      return 'draw';
      break;
    case 'A Y': // rock      vs.     paper
      return 'win';
      break;
    case 'A Z': // rock      vs.  scissors
      return 'lose';
      break;
    case 'B X': // paper     vs.      rock
      return 'lose';
      break;
    case 'B Y': // paper     vs.     paper
      return 'draw';
      break;
    case 'B Z': // paper     vs.  scissors
      return 'win';
      break;
    case 'C X': // scissors  vs.      rock
      return 'win';
      break;
    case 'C Y': // scissors  vs.     paper
      return 'lose';
      break;
    case 'C Z': // scissors  vs.  scissors
      return 'draw';
      break;
    default:
      exit( "Round didn't match available outcomes." );
  }
}

// Score each round and figure out the total.
$total_score = 0;

foreach ( $rounds as $round ) {
  $total_score += get_choice_points( $round ) + get_outcome_points( get_outcome( $round ) );
}

// ANSWER:
echo "Final score: $total_score \n";
