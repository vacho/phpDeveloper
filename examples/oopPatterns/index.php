<?php
declare(strict_types=1);

require_once 'src/Management/Employees.php';
require_once 'src/People/Person.php';
require_once 'src/People/Position.php';

use App\Management\Employees;
use App\People\Person;
use App\People\Position;

// Create people.
$osvi = new Person('1', 'Osvaldo', 'Villarroel', 'M', 'ovillarroel@gmail.com', '67408154');
$aidee = new Person('2', 'Aidee', 'Tapia', 'F', 'atapia@gmail.com', '7377823');
$oscar = new Person('3', 'Oscar', 'Villarroel Tapia', 'M', 'osvillarroel@gmail.com', '58796555');
$xavi = new Person('4', 'Xavier', 'Villarroel Tapia', 'M', 'xvillarroel@gmail.com', '69842222');

$manager = new Position('Manager', '10.000');
$sales = new Position('Sales', '5.000');
$secretary = new Position('Secretary', '6.500');

$employees = new Employees();
$employees->add($osvi, $manager);
$employees->add($aidee, $sales);

// Show all employees data.
$employees->show();

$employees->changePosition($aidee, $manager);
//var_dump($employees);
// Show all employees data.
$employees->show();


$employees->changePosition($aidee, $secretary);
// Show all employees data.
$employees->show();
