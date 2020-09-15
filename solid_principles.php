<?php
// SRP- Single Responsibility 
//high Cohesion and Low Coupling
// Cohesion - degree to which the elts of a module are coupled together
// Coupling - degree of interdependence btn classes 

class CashPaymentMethod extends PaymentMethod implements IPaymentMethod, IMoneyPaymentMethod
{
    public function processPayment()
    {
      echo 'process cash payment' . PHP_EOL;  
    }
    public function pay($amount){
        echo 'amount payed' . $amount . PHP_EOL;
    }
    public function switchCurrency($currency)
    {
        echo 'switch to ' . $currency . PHP_EOL;
    }
}

class CreditCardPaymentMethod extends PaymentMethod
{
    public function processPayment()
    {
      echo 'process credit card payment' . PHP_EOL;  
    }
}


class PaymentNotifuication
{
    public function NotifyPayment(){
        // send user an email
    }
}

// Open Closed Principle
// opened for extension but closed for modification
abstract class PaymentMethod{
    abstract public function processPayment();
}

class Payment{
    public function processPayment($payments){
        foreach($payments as $payment){
            $payment->processPayment();
        }
    }
}

$payments = [];
array_push($payments, new  CashPaymentMethod());
array_push($payments, new  CreditCardPaymentMethod());
array_push($payments, new  CashPaymentMethod());

$payment = new Payment();
$payment->processPayment($payments);


// Liskov Substitution principle 
// subclasses must be substitutable by their base class
class GoldBarPaymentMethod extends PaymentMethod implements IPaymentMethod
{
    public function processPayment()
    {
      echo 'process gold bar payment' . PHP_EOL;  
    }
    public function pay($amount)
    {
        echo 'amount payed' . $amount . PHP_EOL; 
    }
}
interface IPaymentMethod
{
    public function pay($amount);

}

interface IMoneyPaymentMethod{
    public function switchCurrency($currency);
}

// Interface Segregation Principle
// Clients should not be forced to implement a method they donot need
// here we separate the transactions into four classes

class DepositTransaction{
    public function execute(){
        // do desposit transaction
    }
}
class PayBillTransaction{
    public function execute(){
        // do bill payment transaction
    }
}

class WithdrawTransaction{
    public function execute(){
        // do withdraw transaction
    }
}


// Dependency Inversion Principle
// High-level modules shoulidn't depend on low-level modules,
// but both should depend on abstractions
// Abstractions should not depend on details, 
// Details should depend on abstractions
// Dependency Injection -- A technique for implementing Dependency Inversion
// We INJECT the dependency into it dependent class
// function , constructor and setter  Injection 

interface ITransferMethod{
    public function execute();
}

class TransferPaymentMethod implements ITransferMethod{
    public function execute(){
        // do transfer transaction
        echo 'do normal transfer' . PHP_EOL;
    }
}

class BitcoinPaymentMethod implements ITransferMethod{
    public function execute(){
        // do transfer transaction
        echo 'do bitcoin transfer' . PHP_EOL;
    }
}


class Transaction {
    public function pay(ITransferMethod $paymentMethod){
        $paymentMethod->execute();
    }
}

$transferMoney = new TransferPaymentMethod();
$transaction = new Transaction();
$transaction->pay($transferMoney);

$transferBit = new BitcoinPaymentMethod();
$bit_transaction = new Transaction();
$bit_transaction->pay($transferBit);