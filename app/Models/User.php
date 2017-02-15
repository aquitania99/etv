<?php

namespace Acme\FsTest\Models;

use Acme\FsTest\Data;
use Acme\FsTest\Traits\ConnectionTrait;
use Illuminate\Database\Capsule\Manager as DB;
use Acme\FsTest\Helpers\PasswordHandler;

class User
{
    use ConnectionTrait;

    public function getById($id)
    {
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();

        return $user && $user->id ? (array) $user : NULL;
    }

    public function update(Data\User $user)
    {
        $updateUser = DB::table('users')
            ->where('id','=',$user->id)
            ->update([
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'email' => $user->email,
                'password' => $user->password
            ]);
        is_null($updateUser) ? false : true;

        return $updateUser;
    }

    public function add(Data\User $user)
    {
        $before = DB::table('users')->max('id');
        DB::table('users')
            ->insert([
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'email' => $user->email,
                'password' => $user->password
            ]);

        $after = DB::table('users')->max('id');
        if( $after > $before ){
            return true;
        }
        else return 'Couldn\'t add the User data';
    }

    public function login(Data\User $user)
    {
        $userData = DB::table('users')
            ->select('*')
            ->where('email', '=', $user->email)
            ->first();

        if( !empty($userData) && PasswordHandler::verifyPassword($user->password, $userData->password ))
        {
            return $userData && $userData->id ? (array) $userData : NULL;
        }
        else return false;
    }
}