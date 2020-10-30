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

    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        echo view('template/header.php');
        return view('users/user_view', $data);
        echo view('template/footer.php');
    }

    public function create(){
        echo view('template/header.php');
        return view('users/add_user');
        echo view('template/footer.php');
        
    }
 
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

    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        echo view('template/header.php');
        return view('users/edit_view', $data);
        echo view('template/footer.php');
    }
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
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        echo view('template/header.php');
        return $this->response->redirect(site_url('/users-list'));
        echo view('template/footer.php');
        
    }    
}

