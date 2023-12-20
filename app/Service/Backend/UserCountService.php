<?php

namespace App\Service\Backend;

use App\Models\User;

class UserCountService
{
    public function userCount()
    {
        return ['user_count' => User::count()];
            
    }
}
