<?php
require 'autoload.php';

session_start();

if (!array_key_exists("username", $_SESSION)) {
    if ($_GET["controller"] !== 'user' || $_GET["action"] !== 'connect') {
        header('Location: index.php?controller=user&action=connect');
    }
}

if (!array_key_exists("controller", $_GET) || !array_key_exists("action", $_GET)) {
    header('Location: index.php?controller=moto&action=list');
}

    $actionFind = null;

    if ($_GET["controller"] == 'user') {
        $controller = new UserController();
        if ($_GET["action"] == 'connect') {
            $actionFind = true;
            $controller->connect();
        }
    }

    if ($_GET["controller"] == 'default') {
        $controller = new DefaultController();
        if ($_GET["action"] == 'not-found') {
            $actionFind = true;
            $controller->notFound();
        }
    }

    if ($_GET["controller"] == "moto") {
        $controller = new MotoController();
        if ($_GET["action"] == 'list') {
            $actionFind = true;
            $controller->list();
        }

        if ($_GET["action"] == "detail" &&
            array_key_exists("id", $_GET)) {
            $actionFind = true;
            $controller->detail($_GET["id"]);
        }

        if ($_GET['action'] == 'delete' && array_key_exists("id", $_GET)) {
            $actionFind = true;
            $controller->delete($_GET["id"]);
        }

        if ($_GET["action"] == 'add') {
            $actionFind = true;
            $controller->ajout();
        }
        if (is_null($actionFind)) {
            header("Location: index.php?controller=default&action=not-found");
        }
    }
