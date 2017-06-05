<?php
  //$fruit = array('banana','apple');
  $fruit = array("yellow" => array("a"=>1,"b"=>2)
  	             "red"    => 'apple',
  	             "green"  => 'lemon');

  foreach($fruit as $k => $v) {
  	echo $k;
    foreach($v as $k2 => $v2) {
      echo $k2;
      echo $v2;

    }
  }

  echo $fruit["yellow"];  //banana

  echo $fruit["yellow"]["a"];  //1

  $data['2017-06-05'][0]['game'] = 
  $data['2017-06-05'][0]['ht']
  $data['2017-06-05'][0]['at']

  echo '<table>';
  foreach($data as $k => $v) {
    echo $k;
    foreach($v as $k2 => $v2) {
    	echo $data[$k][$k2]['game'].',';
    }
  }
  echo '</table>';

a001
a002
a003
a002
a004

  $k = 'a001'.'boy';

  $p[$k] 

  $p[$id]['dep'][][][] = '寬爺';
  $p[$id]['sex'] = 'boy'
  $p[$id]['age'] = 18;



for() {
	$k = 'a001';
	$p[$k]++;  //$p['a001']++
}

echo $p['a002'];


?>