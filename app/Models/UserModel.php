<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $returnType       = 'object';
    
    protected $allowedFields    = [
        'firstname', 
        'lastname',
        'email', 
        'mobile', 
        'username', 
        'password'
    ];
    protected $useSoftDeletes       = true;
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at'; 
    protected $updatedField         = 'updated_at'; 
    protected $deletedField         = 'deleted_at'; 

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT );            
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        return $data;
    }

    public function findUserByID(int $id){
        return $this->where('id', $id)->first();
    }
   
}
