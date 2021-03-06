<?php
/**
 * purpose   : program to implement resp api methods get,post,put,delete
 * @author   : harikrishna
 * @version  : 1.0
 * @since    : 21-02-2019
 ***********************************************************************************/
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');
require(APPPATH . '/libraries/Format.php');
use Restserver\Libraries\REST_Controller;
class Product extends REST_Controller{
    function __construct(){
        parent::__construct();
    }
    /**
     * function to handl the http request called default as it is a index function 
     * 
     * @return void
     */
    // public function index()
    // {
    //     //checks the request of http
    //     if ($_SERVER["REQUEST_METHOD"] == "get") {
    //         $this->find_all();
    //     } elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    //         $this->editUser();
    //     } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $this->addUser();
    //     } elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    //         $this->deleteUser();
    //     }
    // }
    /**
     * function to print all data from database using get restapi
     */
    public function find_all_get(){
        $data = json_encode($this->ProductModel->findall());
        // print_r($data);
    
    }
    /**
     * function to print return particular data from database using get restapi
     */
    public function find_get($id){
        echo json_encode($this->ProductModel->find($id),JSON_PRETTY_PRINT);
    }
    /**
     * function to create data into database using post restapi
     */
    public function create_post(){
        $prod = array(
        $this->post('id'),
        $this->post('name'),
        $this->post('salary'),
        $this->post('desg'));
        $d = $this->ProductModel->insert($prod);
            
    }
    /**
     * function to update the details in database using put restapi
     */
    public function update_put(){
        $prod = array(        
        $this->put('name'),
        $this->put('salary'),
        $this->put('desg')); 
        print_r($prod);
         $this->ProductModel->update($this->put('id'),$prod);
    }
    /**
     * function to delete data from database using delete restapi
     */
    public function delete_delete($id){
        $this->ProductModel->delete($id);
    }
}
?>