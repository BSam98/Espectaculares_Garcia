<?php 

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_Administrador_Model extends Model{
    
       /* public function obtenerUsuario($data){
                $Usuario = $this->db->table('Usuarios');
                $Usuario->where($data);
                return $Usuario->get()->getResultArray();
        }*/
        protected $table = 'Usuarios';
        protected $primaryKey = 'idUsuario';
        protected $returnType = 'array';
        protected $allowedFields = ['CorreoE','Usuario', 'Contraseña', 'idRango'];

        function consulta($datos){
                $db= \Config\Database::Connect();
                $query = $db->query(
                        "SELECT * FROM Rangos"
                );
            
                $datos = $query->getResultObject();
            
                return $datos;
        }

        function modulos(){
                $db = \Config\Database::connect();
                $builder = $db->table('Modulos');
                $builder-> select(
                        'idModulo,
                        modulo'
                    );
                $query = $builder->get();
                $datos = $query->getResultObject();
                return $datos; 
        }

        function seleccionarPriv($rango){
                $db = \Config\Database::connect();
                $builder = $db->table('Privilegios');
                $builder-> select(
                        'privilegio_Modulo,
                        rango_Id'
                );
                $builder->where('rango_Id',$rango);
                $query = $builder->get();
                $datos = $query->getResultObject();
                return $datos;     
        }

        function subMenu($id){
                $db = \Config\Database::connect();
                $builder = $db->table('SubModulos');
                $builder-> select(
                                'idSubM, 
                                idmoduloPrin,
                                privilegio_Modulo, 
                                rango_Id, 
                                subModulo'
                                );
                $builder->join(
                        'Privilegios',
                        'SubModulos.idmoduloPrin = Privilegios.privilegio_Modulo',
                        'join'
                        );
                $builder->where('idmoduloPrin',$id);
                $query = $builder->get();
                $datos = $query->getResultObject();
                return $datos; 
        }

        

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