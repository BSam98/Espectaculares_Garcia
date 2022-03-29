<?php 

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_Administrador_Model extends Model{
    
       /* public function obtenerUsuario($data){
                $Usuario = $this->db->table('Usuarios');
                $Usuario->where($data);
                return $Usuario->get()->getResultArray();
        }*/

        function consulta($datos){
                $db= \Config\Database::Connect();
                $query = $db->query(
                        "SELECT * FROM Rangos"
                );
            
                $datos = $query->getResultObject();
            
                return $datos;
        }

        protected $table = 'Usuarios';
        protected $primaryKey = 'idUsuario';
        protected $returnType = 'array';
        protected $allowedFields = ['CorreoE','Usuario', 'Contraseña', 'idRango'];

        /*function check_user($data){
                $db = \Config\Database::connect();
                $builder = $db->table('Usuarios');

                $builder->where('Usuario',$data['Usuario']);
                $builder->where('Contraseña',$data['Contraseña']);
        
                $query = $builder->get();
            
                $datos = $query->getResultObject();
        
                return $datos;        
        

        }*/

}