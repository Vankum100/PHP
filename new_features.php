<?php


//Scalar type declaration
declare(strict_types = 1);
// strict mode ensures that argument passed to getMoney() must be of type int

function getMoney(int $value){
    var_dump($value);
}
getMoney(500);
//getMoney('100');
//getMoney(true);

// return type declaration
function sum(float $num1, float $num2): float{
    return $num1 + $num2;
}
 $result = sum(2.5, 5);
 var_dump($result);

// The Null Coalesce operator
$firstName = null;
$lastName = null;
$middleName = null;

echo $firstName ?? $lastName ?? $middleName ?? 'John Doe Ivanovich';

// The spaceship Operator -- useful for sorting
//echo 'abx' <=> 'abc'; //1
//echo 'abc' <=> 'abx'; // -1
//echo 'abc' <=> 'abc'; //0

$scores = [80,30,90,70];
usort($scores, function($score1, $score2){
    return $score1 <=> $score2; // returns array in asc order
});

var_dump($scores);

// anonymous class = class with no name 
$printer = new class {
    public function print(){
        echo 'printing....';
    }
};

class Document
{
    public function setPrinter($printer){
        $this->printer = $printer;
    }
    public function print(){
        $this->printer->print();
    }
}

$pdf = new Document();
$pdf->setPrinter($printer);
$pdf->print();

// Filtered Unserialization
class Car
{
    public function setColor($color){
        $this->color = $color;
    }
}

class Motorcycle
{
    public function setBrand($brand){
        $this->brand = $brand;
    }
}

$car = new Car();
$car->setColor('black');
$motorcycle = new Motorcycle();
$motorcycle->setBrand('Honda');

$serialized = serialize([$car, $motorcycle]);

var_dump($serialized);
// let us filter out the classes we want to unserialize
var_dump(unserialize($serialized, ['allowed_classes' =>['car']]));

// grouping Use Statements
// grouping classes , functions and variables in same namespace

//use APP\{student, teacher};
//use function \Marvel\Heroes\{A,B,C,D};
//use const \Warner\Heroes\{E,F,G,H};

///---- Session Start Options -----////

?>