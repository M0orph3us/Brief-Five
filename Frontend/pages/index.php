<?php
require './includes/header.php';
$test = new UsersRepository();
$data = [
    'firstname' => 'gael',
    'lastname' => 'moreau',
    'mail' => 'test@testtt.com',
    'password' => 'test'
];
// $test->create($data);
$test->readOne('0x11eee6399893e6568a1600ff64196eed');
// var_dump($test->readOne('0x11eee6399893e6568a1600ff64196eed'))
// $test->readAll();
// 
?>
<main>
</main>

<?php
require './includes/footer.php'
?>