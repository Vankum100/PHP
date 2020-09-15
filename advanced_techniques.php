<?php
// anonymous function = nameless function ie lamdas
$hello = function (){
    echo "Hello";
};

echo $hello() . PHP_EOL;
// closure = anonymous function that can acces variables imported from outside scope without modifying original value
$counter = 0;
// we pass counter here ,, NOTE that (&$counter) will modify the value of counter since its passing by reference
$closure = function () use ($counter){
    return ++$counter;
};
//echo $closure();
//echo $counter;
// array_filter() , array_map() are built in anonymous functions

// Recursive Function
function factorial($n){
    if($n == 1){
        return 1;
    }
    return $n * factorial($n - 1);
}
echo factorial(5) . PHP_EOL;

// internationalization UTF-8

// DATE
$date = date('Y-m-d H:i:s');
var_dump($date);
// PSR1 and PSR2 ... PSR7 standards 

// heredoc
$number = 8;

$text = <<<DEMO
some of this text is "escaped" and that's  the number. it's $number
DEMO;

echo $text;