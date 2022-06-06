<?php 

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_Administrador_Model extends Model{
    
       /* public function obtenerUsuario($data){
                $Usuario = $this->db->table('Usuarios');
                $Usuario->where($data);
                return $Usuario->get()->getResultArray();
        }*/
        /*protected $table = 'Usuarios';
        protected $primaryKey = 'idUsuario';
        protected $returnType = 'array';
        protected $allowedFields = ['CorreoE','Usuario', 'Contraseña', 'idRango'];*/

        function buscarUserAdm($username,$password){
                $db = \Config\Database::connect();
                $builder = $db->table('Usuarios');
                $builder-> select(
                    'idUsuario, Nombre, Apellidos, CorreoE, Usuario, Contraseña, idRango, idEvento'
                );
                $builder->where('Usuario', $username);
                $builder->where('Contraseña', $password);
                $query = $builder->get();
                $datos = $query->getResultArray();
                
                if($datos){
                    foreach($datos as $u){
                        $data = array('idUsuario'=> trim($u['idUsuario']),					   	
                                        'Nombre'=> trim($u['Nombre']),
                                        'Apellidos'=> trim($u['Apellidos']),	
                                        'CorreoE'=> trim($u['CorreoE']),
                                        'Usuario'=> trim($u['Usuario']),
                                        'Contraseña'=> trim($u['Contraseña']),
                                        'idRango'=> trim($u['idRango']),
                                        'idEvento'=> trim($u['idEvento']),
                                        'resultado'=> true
                                    );
                    }
                }else{
                    $data = array('idUsuario'=>'',					   	
                                    'Nombre'=>'',
                                    'Usuario'=>'',	
                                    'Contraseña'=>'',					 
                                    'resultado'=>false,
                                    'msg'=>'El usuario y/o la contraseña no existe, verifique sus datos por favor'
                                );
                }
                return $data;
        }

        function consultarPrivilegiosR($rango){
                $db = \Config\Database::connect();
                $query = $db->query("SELECT idModulo,modulo FROM Privilegios p, Modulos m WHERE rango_Id =".$rango." and idModulo = privilegio_Modulo ;");
               /* $query = $db->query("SELECT modulo, subModulo FROM Privilegios p, Modulos m, SubModulos sm 
                                WHERE rango_Id =".$rango." and idModulo = privilegio_Modulo and idModulo = idmoduloPrin
                                GROUP by modulo, subModulo;");*/
                $datos = $query->getResultObject();
                return $datos; 
        }

        function submenuP($id){
                $db = \Config\Database::connect();
                $query = $db->query("SELECT subModulo fROM SubModulos sm WHERE idmoduloPrin =".$id);
                $datos = $query->getResultObject();
                return $datos; 
        }






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