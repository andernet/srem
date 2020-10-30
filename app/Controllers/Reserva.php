<?php 
namespace App\Controllers;
use App\Models\ReservaModel;
use App\Models\UserModel;
use CodeIgniter\Controller;


class Reserva extends Controller
{
    function __construct()
     {
    //parent::__construct();
    //$this->load->database();
    }

    public function index(){
        $reservaModel = new ReservaModel();
        $data['reservas'] = $reservaModel->orderBy('id', 'DESC')->findAll();

        echo view('template/header.php');
        return view('reserva/reserva_view', $data);
        echo view('template/footer.php');
    }


    public function create(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'ASC')->findAll();
        echo view('template/header.php');
        echo view('reserva/add_reserva', $data);
        echo view('template/footer.php');
    }
     
    public function store() {
        $ReservaModel = new ReservaModel();
        $data = [
                'equipamento' => $this->request->getVar('equipamento'),
                'professor'  => $this->request->getVar('proferssor'),
                'data_retirada'  => $this->request->getVar('data_retirada'),
                'data_devolucao'  => $this->request->getVar('data_devolucao'),
        ];
        $ReservaModel->insert($data);
        echo view('template/header.php');
        return $this->response->redirect(site_url('/'));
        echo view('template/footer.php');
        }
    
        // show single user
        public function singleReserva($id = null){

            $userModel = new UserModel();
            $data['users'] = $userModel->orderBy('id', 'ASC')->findAll();
            
            $reservaModel = new ReservaModel();
            //dd($data['user_obj'] = $userModel->where('id', $id)->first());
            $data['reserva_obj'] = $reservaModel->where('id', $id)->first();
            //dd($data);
            
            echo view('template/header.php');
            return view('reserva/edit_reserva', $data);
            echo view('template/footer.php');
            
        }
    
        // update user data
        public function update(){
            $reservaModel = new ReservaModel();
            $id = $this->request->getVar('id');
            $data = [
        
                'equipamento' => $this->request->getVar('equipamento'),
                'professor'  => $this->request->getVar('proferssor'),
                'data_retirada'  => $this->request->getVar('data_retirada'),
                'data_devolucao'  => $this->request->getVar('data_devolucao'),
            ];
            $reservaModel->update($id, $data);
    
            echo view('template/header.php');
            return $this->response->redirect(site_url('/'));
            echo view('template/footer.php');
            
        }
     
        // delete user
        public function delete($id = null){
            $reservaModel = new ReservaModel();
            $data['reserva'] = $reservaModel->where('id', $id)->delete($id);
    
            echo view('template/header.php');
            return $this->response->redirect(site_url('/'));
            echo view('template/footer.php');
            
        }  



}