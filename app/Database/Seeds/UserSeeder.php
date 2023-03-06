<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        $userModel = new \App\Models\UserModel;

        $user = [
            'firstname' => 'Prisco',
            'lastname' => 'Cleyton Pinheiro',
            'email' => 'priscocleyton@gmail.com',
            'mobile' => '39218093123'

        ];

        $userModel->protect(false)->insert($user);
        
        dd($userModel->errors());

    }
}
