<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Entities\User;

class Users extends BaseController
{
    private $userModel;

    public function __construct() 
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User list',
            'path_pages' => ['Home','User','User list'],
            'users' => $this->userModel->findAll()
        ];

    
        return view('Users/index', $data);
    }

    public function test() {
        $data = [
            'data' => $this->userModel->findAll() 
        ];

        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }

    public function ram() {
        $data = [
            'data' => $this->userModel->findAll() 
        ];

        $json = '{"data":[{"id":"1","firstname":"John"}]}';
        return json_encode( $json );

        return json_encode( $json );
    }

    public function loadUsers() {

        $data = [
            'data' => $this->userModel->findAll() 
        ];

        $json = '{"data":[{"id":"1","firstname":"John"}]}';

        return json_encode( $data );
    }

    private function findUser(int $id = null) {
        if (!$id || !$user = $this->userModel->where('id', $id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Not found the user $id");
        }

        return $user;
    }

    public function updateUser() {
        if (!$this->request->isAJAX()) {
            exit('Error!') ;           
        }

        $post = $this->request->getPost();
        $user = $this->findUser($post['rowdata']['id']);

        $ram =  (object) $post['rowdata'];


        
        // if (!$user->hasChanged()) {
        //     //retornar mensagem que n houve mudanças
        // }
        // 
        // $user->fill($ram);

        $user->username = $post['rowdata']['username'];

        

        if (empty($post['rowdata']['password'] ) ) {
            unset($post['rowdata']['password']);
        }

        
        
        if ($this->userModel->protect(false)->save($user)) {
            echo '<pre>';
            print_r('salvo');
            echo '</pre>';
            exit;
            
        }
        
        
         
    }
    
    public function createUser() {
       
        if (!$this->request->isAJAX()) {
            exit('Error!') ;           
        }

        $post = $this->request->getPost();
        echo '<pre>';
        print_r($post);
        echo '</pre>';
        exit; 
        

        // $user = new User();



        // $data = [];

        
    }
}
