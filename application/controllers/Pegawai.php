<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    
    function __construct(){
        parent::__construct();

    }

    public function index(){
        $ip = $_SERVER['HTTP_HOST'];;

        $arrayData = array(
            "ip" => $ip,
        );
        $this->load->view('v_pegawai', $arrayData);
    }
    
    public function list_pegawai(){
        header('Content-Type: application/json');
        $query = $this->db->get('pegawai');
        if ($query){
            $response = array(
                "data" => $query->result(),
                "message" => "OK",
            );
        }else{
            $response = array(
                "data" => array(),
                "message" => "Table Empty"
            );
        }

        echo json_encode($response);
    }

    public function add_pegawai(){
        header('Content-Type: application/json');
        $input = file_get_contents("php://input");
        if (!empty($input) && isset($input)){
            $json = json_decode($input);
            if (!empty($json->pegawai_name)){
                $data = array(
                    'name' => $json->pegawai_name,
                );
                $query = $this->db->insert('pegawai', $data);
                if ($query){
                    $response = array(
                        "data" => array(),
                        "message" => "Success Adding new Pegawai",
                    );
                }else{
                    $response = array(
                        "data" => array(),
                        "message" => "Failed Adding new Pegawai",
                    );
                }

            }else{
                $response = array(
                    "data" => array(),
                    "message" => "Pegawai Name Cannot be null",
                );
            }
        }else{
            $response = array(
                "data" => array(),
                "message" => "Body cannot be empty",
            );
        }
        echo json_encode($response);
    }
    
}
