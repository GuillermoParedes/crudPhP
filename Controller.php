<?php
/**
 * Created by PhpStorm.
 * User: Guillermo David
 * Date: 13/07/2015
 * Time: 05:35 AM
 */

function __autoload($classname)
{
//    include_once("models/$classname.php");
    include_once("php/models/$classname.php");
}

$users = new User("localhost", "root", "", "crud");

if(!isset($_POST['action']))
{
    print json_encode(0);
    return;
}

switch($_POST['action'])
{
    case 'get_users':
        echo $users->getUsers();
    break;

    case 'add_user';
        $user = new stdClass;
        $user = json_decode($_POST['user']);
        print $users->add($user);
    break;

    case 'delete_user';
        $user = new stdClass;
        $user = json_decode($_POST['user']);
        print $users->delete($user);
    break;

    case 'update_field_data';
        $user = new stdClass;
        $user = json_decode($_POST['user']);
        print $users->updateValue($user);
    break;
}

exit();