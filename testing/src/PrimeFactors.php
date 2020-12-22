<?php 
namespace App;

class PrimeFactors
{
    public function generate($number): array
{
    for ( $i=2; $i <= $number; $i++ ){
        if ( $number % $i == 0 ){
            return array_merge( [$i], $this->generate( $number / $i ) );
        }
    }
    return [];
}
}
?>