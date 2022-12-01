<?php

/**
 * Day 1, Part 1
 * https://adventofcode.com/2022/day/1
 */

// Read the text file of elf calories.
$elves = file_get_contents( __DIR__ . '/input.txt' );

// Split it into an array of elves by looking for two newlines.
$elves = explode( "\n\n", $elves );

// Walk through the array, creating a new array for each elf with an element for
// each of the elf's snacks. Calculate each elf's total snack calories and
// set it as the highest calorie count if it's higher than the previously found
// calorie count.
$highest_calories = 0;

foreach ( $elves as $elf ) {
  $elf_snacks = explode( "\n", $elf );
  $elf_calories = array_sum( $elf_snacks );
  if ( $elf_calories > $highest_calories ) {
    $highest_calories = $elf_calories;
  }
}

// ANSWER:
echo "Highest calories being held by one elf: $highest_calories \n";
