<?php

namespace Tcoders\TokenLogin\Models;

use App\Models\User as BaseModel;

class User extends BaseModel
{
    protected $connection = 'auth_db';
}
