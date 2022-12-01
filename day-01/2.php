<?php

/**
 * Day 1, Part 2
 * https://adventofcode.com/2022/day/1
 */

// Read the text file of elf calories.
$elves = file_get_contents( 'day1.txt' );

// Split it into an array of elves by looking for two newlines.
$elves = explode( "\n\n", $elves );

// Walk through the array, creating a new array for each elf with an element for
// each of the elf's snacks. Calculate each elf's total snack calories and
// create a new array that's just the sums.
$all_elf_calories = array();

foreach ( $elves as $elf ) {
  $elf_snacks = explode( "\n", $elf );
  $all_elf_calories[] = array_sum( $elf_snacks );
}

// Sort the array in descending order; this puts the highest numbers at the top.
arsort( $all_elf_calories );

// Sum up the first three elements in the array.
$sum_of_three_highest_elf_calories = array_sum( array_slice( $all_elf_calories, 0, 3 ) );

// ANSWER:
echo "Sum of three highest-calories-holding elves: $sum_of_three_highest_elf_calories \n";
