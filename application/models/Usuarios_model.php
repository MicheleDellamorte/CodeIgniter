<?php
/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 26/11/2017
 * Time: 18:46
 */

class Usuarios_model extends CI_Model{

    public function listar(){
        $sql = "SELECT * FROM usuarios";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_usuarios_by_id($usuario_id){
        $query = $this->db->get_where('usuarios', array('usuario_id' => $usuario_id));
        return $query->row_array();
    }
    public function registro($contra_encript){
        $data = array(
            'usuario_nombre' => $this->input->post('nombre'),
            'usuario_clave' => $contra_encript,
        );

        return $this->db->insert('usuarios', $data);
    }

    public function rol($nombreusuario){
        $this->db->select('usuario_rol_id');
        $this->db->from('usuarios');
        $this->db->where('usuario_nombre', $nombreusuario );

        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->row(3)->usuario_rol_id;
        }else{
            return false;
        }
    }
    public function login($nombreusuario, $contraseña){
        $this->db->where('usuario_nombre', $nombreusuario );
        $this->db->where('usuario_clave', $contraseña);

        $result = $this->db->get('usuarios');

        if($result->num_rows() == 1){
            return $result->row(0)->usuario_id;
        }else{
            return false;
        }
    }

    public function usuario_delete($usuario_id){
        $this->db->where('usuario_id', $usuario_id);
        $this->db->delete('usuarios');
        return true;
    }

    public function update_usuario($contra_encript){
        $data = array(
            'usuario_nombre' => $this->input->post(''),
            'usuario_clave' => $contra_encript,
            'usuario_rol_id' => $this->input->post('rol'),
        );

        $this->db->where('usuario_id', $this->input->post('id'));
        return $this->db->update('usuarios',$data);
    }
    public function check_username_exists($nombreusuario){
        $query = $this->db->get_where('usuarios', array('usuario_nombre' => $nombreusuario));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function roles_create(){
        $data = array(
            'rol_nombre' => $this->input->post('nombre'),
            'rol_nivel' => $this->input->post('nivel'),
        );

        return $this->db->insert('roles', $data);
    }

    public function get_roles(){
        $this->db->order_by('rol_nombre');
        $query = $this->db->get('roles');
        return $query->result_array();
    }

}