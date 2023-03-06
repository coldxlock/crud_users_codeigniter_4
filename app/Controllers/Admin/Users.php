<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Entities\User;
use stdClass;

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

    public function loadUsers() {

        $data = ['data' => $this->userModel->findAll() ];

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
            exit('Error! Access denied!') ;           
        }

        $post = $this->request->getPost();
        
        
        if (empty($post['rowdata']['password'])) {
            unset($post['rowdata']['password']);
        }

        $userArr =  $post['rowdata'];

        if (empty($post['rowdata']['password'] ) ) {
            unset($post['rowdata']['password']);
        }        
        
        if ($this->userModel->protect(false)->save($userArr)) {
            return json_encode(['status'=> true,'message' =>'Saved successfully!']);          
        }
                         
    }
    
    public function createUser() {
       
        if (!$this->request->isAJAX()) {
            exit('Error! Access denied!') ;             
        }

        $post = $this->request->getPost();

        if (!empty($post)) {
            $userArr =  $post['rowdata'];

            if ($this->userModel->protect(false)->save($userArr)) {
                return json_encode(['status'=> true,'message' =>'Saved successfully!']);          
            }
        }
               
    }

    public function deleteUser() {        
        try {
            if (!$this->request->isAJAX()) {
                exit('Error! Access denied!') ;           
            }
            $post = $this->request->getPost();
            if (!empty($post)) {
                // $user = $this->findUser($post['rowdata']['id']);
                $id = $post['rowdata']['id'];
                if ($this->userModel->delete($id)) {
                    return json_encode(['status'=> true,'message' =>'Record deleted successfully!']);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        

    }
}
