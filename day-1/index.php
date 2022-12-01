<?php

$elves = file_get_contents( 'day1.txt' );

$elves = explode( "\n\n", $elves );

$highest_calories = 0;

foreach ( $elves as $elf ) {
  $elf_snacks = explode( "\n", $elf );
  $elf_calories = array_sum( $elf_snacks );
  if ( $elf_calories > $highest_calories ) {
    $highest_calories = $elf_calories;
  }
}

echo "Highest calories being held by one elf: $highest_calories \n";

/// --- ///

$all_elf_calories = array();

foreach ( $elves as $elf ) {
  $elf_snacks = explode( "\n", $elf );
  $all_elf_calories[] = array_sum( $elf_snacks );
}

arsort( $all_elf_calories );

$sum_of_three_highest_elf_calories = array_sum( array_slice( $all_elf_calories, 0, 3 ) );

echo "Sum of three highest-calories-holding elves: $sum_of_three_highest_elf_calories \n";
