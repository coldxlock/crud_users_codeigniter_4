<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'firstname', 
        'lastname',
        'email', 
        'mobile', 
        'username', 
        'password'
    ];


    

   
}
