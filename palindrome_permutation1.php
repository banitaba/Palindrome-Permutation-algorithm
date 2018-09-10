<?php
/** 
 * This version is not fully efficient and
 *  Time complexity is also not good as
 *  it is O(n^2)
 *  in version 2 (palindrome_permutation2.php)
 *  is more efficient and has a better Time complexity 
*/
function canBeTurnedIntoAPalindrome($drome){
  // If we've found a letter that has no match, the center letter.
  $centerUsed = false;
  $center='';
  $c='';
  $count = 0;

  // TODO: Remove whitespace from the string.

  // Check each letter to see if there's an even number of it.
  for($i = 0; $i<strlen($drome); $i++)
  {
    $c = $drome[$i];
    $count = 0;

    for($j = 0; $j<strlen($drome); $j++){
      if ($drome[$j] == $c){
         $count++;
      }
    }
    // If there was an odd number of those entries
    // and the center is already used, then a palindrome
    // is impossible, so return false.
    if ($count % 2 == 1)
    {
      if ($centerUsed == true && $center != $c)
        return false;
      else
      {
        $centerUsed = true;
        $center = $c;   // This is so when we encounter it again it
                      // doesn't count it as another separate center.
      }
    }
  }
  // If we made it all the way through that loop without returning false, then
  return true;
}

$a='aaaaaabc';
if(canBeTurnedIntoAPalindrome($a)){
	echo 'yes';
} else {
	echo 'no';
}