<?php

/**
 * CLC 1
 * SecurityService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 12-20-2020
 * File that contains the functions required for validating database data and connections
 *
 */ 

namespace App\Services\Business;

use \PDO;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    public function login(UserModel $user){
        
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        
        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        $db = null;
        
        return $flag;
    }
}