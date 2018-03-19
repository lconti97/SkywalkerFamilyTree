<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 3/18/2018
 * Time: 10:46 PM
 */

include_once '../Common/global.php';

// get the identifier for the page we want to load
$action = $_SERVER['REQUEST_METHOD'];

$loginController = new LoginController();
$loginController->route($action);

class LoginController
{
    // route us to the appropriate class method for this action
    public function route($action)
    {
        switch ($action) {
            case 'POST':
                $this->post();
                break;
        }
    }

    public function post() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === 'password') {
            $_SESSION['username'] = $username;
            header('Location: '.BASE_URL.'/Home/');
        } else {
            header("HTTP/1.1 401 Unauthorized", false);
            exit();
        }
    }
}