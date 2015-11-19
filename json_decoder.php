<?php

$string = '{"foo": "bar", "cool": "attr"}';
$result = json_decode($string, true);



// Prints "bar"
echo $result["foo"];

// Prints "attr"
echo $result["cool"];

?>
