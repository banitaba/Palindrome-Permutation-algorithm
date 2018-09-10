# Palindrome Permutation algorithm
# TACOCAT and Algorithm Time complexity !!!
# Published on September 9, 2018

Hossein Banitaba
Full Stack Software Developer 

What is the Time Complexity?
In computer science, the time complexity is the computational complexity that describes the amount of time it takes to run an algorithm. Time complexity is commonly estimated by counting the number of elementary operations performed by the algorithm, supposing that each elementary operation takes a fixed amount of time to perform.

The above definition is actually what is written on the text books but I plan to describe the same concept with a very simple example of Palindrome Permutation algorithm in PHP.

A String is called Palindrome if it reads the same backwards as well as forwards. For example, the String can be read the same backwards as well as forwards like "tacocat". 

Now, a Permutation of a String S is some String K where S and K contain the same set of characters, however, these characters need not necessarily have the same positions. For Example, consider the String . Here, the Strings :

1-acb
2-bca
3-bac
4-cab
5-cba
are all permutations of it.

Now suppose that, given a String S consisting of lowercase English alphabets, you need to find out whether any permutation of this given String is a Palindrome. If yes, print "YES" (Without quotes) else, print "NO" without quotes.

like "tacocat" which is palindrome so the below strings are all Palindrome Permutation of "tacocat" whether those are palindrome or not:

1-accoatt
2-aaccott
3-aaocctt
4-actotca

It is clear that a Palindrome string can have number of even occurrence of any characters. but it only can have odd number of occurrence of a specific characters one time in the middle. so we can have the below algorithm to find whether a string is Palindrome Permutation or not.

<?php
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
The above algorithm is not efficient enough because it has 2 nested loop which makes the Time complexity to O(n^2) means that if the string length would be n then the algorithm should be repeated nxn times.

If you see the below algorithm. It has two loops but not nested so it repeates maximum n+n times which is very less specially if the n would be a big value.

<?php
function canBeTurnedIntoAPalindrome($drome){
  if($drome==null) {
      return true;
  }    
  $numberOfOddChars = 0;
  for($i = 0; $i<strlen($drome); $i++)
  {
    $c = $drome[$i];
    if(isset($chrCounts[$c])) {
       $chrCounts[$c]++;
    } else {
        $chrCounts[$c]=1;    
    }
  }
  foreach($chrCounts as $chrCount  ) {
    if ( $chrCount & 1 ) {
        //odd
        $numberOfOddChars++;
    }  
  }
  if($numberOfOddChars<=1) {
      return true;
  } else {
      return false;
  }
  
}

$a='';
if(canBeTurnedIntoAPalindrome($a)){
	echo 'yes';
} else {
	echo 'no';
}

Much more efficient with a better Time complexity. That's all!
