<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository
{

    function create($detail)
    {
        $user = new User($detail);
        $user->save();
        return $user;
    }

    function update($id, $detail)
    {
        $user = User::find($id);
        $user->update($detail);
        $user->save();
        return $user;
    }
}
