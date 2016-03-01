<?php

namespace App\Http\Traits;

trait ConnectionTrait
{

    public function connectA()
    {

        \Config::set('database.connections.mysql.host', session('addressA'));
        \Config::set('database.connections.mysql.database', session('databaseA'));
        \Config::set('database.connections.mysql.username', session('usernameA'));
        \Config::set('database.connections.mysql.password', session('passwordA'));
        \DB::reconnect();
        return;
    }

    public function connectB()
    {

        \Config::set('database.connections.mysql.host', session('addressB'));
        \Config::set('database.connections.mysql.database', session('databaseB'));
        \Config::set('database.connections.mysql.username', session('usernameB'));
        \Config::set('database.connections.mysql.password', session('passwordB'));
        \DB::reconnect();
        return;
    }

}