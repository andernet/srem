<?php 
namespace App\Models;
use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'reservas';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['equipamento', 'professor', 'data_retirada', 'data_devolucao'];
}