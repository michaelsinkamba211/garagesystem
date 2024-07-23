 <?php

require_once('db.php');

function checkPOSTParametersOrDie($parameters) {
    foreach ($parameters as $parameter) {
        isset($_POST[$parameter]) || die("'$parameter' parameter must be set by POST method.");
    }
}

checkPOSTParametersOrDie(['username', 'password']);

$username = $_POST['username'];
$password = $_POST['password'];

$db = new DB(Car_parts_db.db);

$authenticated = $db->authenticateUser($username, $password);

if ($authenticated) {
    $response = "Hello $username, you have been successfully authenticated.";
} else {
    $response = 'Incorrect credentials or user does not exist.';
}

echo $response;
