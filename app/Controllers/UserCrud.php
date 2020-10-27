<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserCrud extends Controller
{
    function __construct()
     {
    //parent::__construct();
    }
    // show users list
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        echo view('template/header.php');
        return view('users/user_view', $data);
        echo view('template/footer.php');
    }

    // add user form
    public function create(){
        echo view('template/header.php');
        return view('users/add_user');
        echo view('template/footer.php');
        
    }
 
    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        echo view('template/header.php');
        return $this->response->redirect(site_url('/users-list'));
        echo view('template/footer.php');
        
    }

    // show single user
    public function singleUser($id = null){
        
        $userModel = new UserModel();
        //dd($data['user_obj'] = $userModel->where('id', $id)->first());
        $data['user_obj'] = $userModel->where('id', $id)->first();
        //dd($data);
        
        echo view('template/header.php');
        return view('users/edit_view', $data);
        echo view('template/footer.php');
        
    }

    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);

        echo view('template/header.php');
        return $this->response->redirect(site_url('/users-list'));
        echo view('template/footer.php');
        
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);

        echo view('template/header.php');
        return $this->response->redirect(site_url('/users-list'));
        echo view('template/footer.php');
        
    }    
}

