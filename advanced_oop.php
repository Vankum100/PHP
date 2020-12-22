<?php
// Inheritance and Abstract classes
// HAS-A and IS-A relationship
interface Newsletter
{
    public function subscribe($email);
}

class campaignMonitor implements Newsletter
{
    public function subscribe($email)
    {
        print('subscribing with Campaign Monitor'. PHP_EOL);
    }
}


class guardianPost implements Newsletter
{
    public function subscribe( $email)
    {
        print('subscribing with Guardian Post' .PHP_EOL);
    }
}


class NewsletterSubscriptionController
{
    public function store(Newsletter $newsletter)
    {
        
        $email = 'john@example.com';

        $newsletter->subscribe($email);
    }
}


$controller = new NewsletterSubscriptionController();

$controller->store(new CampaignMonitor());

$controller->store(new GuardianPost());
abstract class User {
    protected $name;
    protected $email;

    abstract public function setName($name);

    protected function setEmail($email){
        echo 'email is set' . PHP_EOL;
    }
    final protected function isWho(){
        echo 'Every User is a Person, so you can not override me '. PHP_EOL;
    }
}

class Administrator extends User{
   
    public function setName($name, $nickname = '')
    {
        echo 'Administartor name is '. $name  . ' and his nickname is '. $nickname . PHP_EOL;
    }

    public function setEmail($email){
        echo 'Administrator email is set' . PHP_EOL;
    }

    // can't override
    public function define(){
        $this->isWho();
    }
}

$admin = new Administrator();
$admin->setEmail('verify');
$admin->define();
$admin->setName('Mr. John Doe', 'Uncle Bob');

// static variables and Methods

// dynamic users
class DynamicUser{
    public $login;
}

$userA = new DynamicUser();
$userA->login  = 'true';

$userB = new DynamicUser();
$userB->login = 'false';

echo 'Dynamic User A login :' . $userA->login . PHP_EOL;
echo 'Dynamic User B login :' . $userB->login . PHP_EOL;

// static  users have class level access
class StaticUser{
    static $login;
    static function amILogin(){
        echo 'login ' . self::$login . PHP_EOL;
    }
}

$user_A = new StaticUser();
StaticUser::$login  = 'true';


$user_B = new StaticUser();
StaticUser::$login  = 'false';


echo 'Static User A login :' . StaticUser::$login . PHP_EOL; // false
echo 'Static User B login :' . StaticUser::$login . PHP_EOL; // false
$user_B::amILogin();

// Magic Metthods

class Example
{

    public function __construct()
    {
        echo 'created ' . PHP_EOL;

    }

    public function __destruct()
    {
        echo 'destroyed' . PHP_EOL;
    }

    public function __call($name, $arguments)
    {
        echo 'Sorry method ' . $name . ' does not exits ' . PHP_EOL;
    }
}

$construct = new Example();

// call(return message for non existing method) and callStatic( to set value to existing method)
$construct->helloMethod('world');

//__get() and __set() , getting and setting values to variables 
// that are accesible to the outside

// traits - a collection of methods

trait notification{
    public function notify(){
        echo 'notify merchant' . PHP_EOL; 
    }
}

trait verification{
    public function verify(){
        echo 'verify merchant ' . PHP_EOL; 
    }
}

trait NotificationVerifiaction{
    use notification, verification;
}

class CardMethod{
    use notification;
    use verification;
}

$method = new CardMethod();
$method->verify();
$method->notify();


class CashMethod{
    use NotificationVerifiaction;
    //use NotificationVerifiaction {notify as private};
    
}

$method2 = new CashMethod();
$method2->notify();
$method2->verify();

// NameSpaces -- default is  global namespace;

// autolaoding as well 