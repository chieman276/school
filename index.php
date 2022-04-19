<?php
session_start();
use controllers\principalController;
use controllers\teacherController;

$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];


switch ($controller) {
    case 'principal':
        include_once './controllers/principalController.php';
        $objController = new principalController();
        break;
    case 'teacher':
        include_once './controllers/teacherController.php';
        $objController = new teacherController();
        break;
    case 'student':
        include_once './controllers/studentController.php';
        $objController = new studentController();
        break;
    default:
        break;
}

switch ($action) {
    case 'index':
        $objController->index();
        break;
    case 'add':
        $objController->add();
        break;
    case 'edit':
        $objController->edit();
        break;
    case 'delete':
        $objController->delete();
        break;
    case 'show':
        $objController->show();
        break;
    case 'search':
        $objController->search_name();
        break;
    default:
        $objController->index();
        break;
}
