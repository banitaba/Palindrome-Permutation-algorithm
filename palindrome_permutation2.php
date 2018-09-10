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
