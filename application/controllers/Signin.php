<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Signin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login');
    }
    /**
     * function to check all the fields of registration and
     * to throw a message if empty
     */
    public function add()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $message = '';
        $validation_error = '';
        if (empty($request['fname'])) {
            $error[] = 'Name is Required';
        } else {
            $data[':name'] = $request['fname'];
        }
        if (empty($request['email'])) {
            $error[] = 'Email is Required';
        } else {
            if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Invalid Email Format';
            } else {
                $data[':email'] = $request['email'];
            }
        }
        if (!($request['password'] == $request['cpassword'])) {
            $error[] = 'password should be same';
        }
        if (empty($request['password'])) {
            $error[] = 'Password is Required';
        } else {
            $data[':password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        }
        if (empty($error)) {
            $data = $this->login->insert_form($request);
            if ($data) {
                $message = 'Registration Sucessful';
            }
            //  $this->fetchdata();
        } else {
            $validation_error = implode(", ", $error);
        }
        $output = array(
            'error' => $validation_error,
            'message' => $message,
        );
        echo json_encode($output);
    }
    /**
     * function to verify enterd data is stored in database
     */
    public function verify()
    {
        $request = json_decode(file_get_contents('php://input'));
        $email = $request->email;
        $text = '';
        if ($email != '') {
            $sel = $this->db->query("SELECT  count(*) as all from registration where email = '$email' ")->row();
            $text = "Available";
            if ($sel['all'] > 0) {
                $text = "Not available";
            }
        }
        echo $text;
    }
    /**
     * function to fetch the data from database table
     */
    public function fetchdata()
    {
        // $data['fetchdata']=$this->ektreemodel->get_users();
        // $this->load->view('fetchangulardata',$data);
        $result = $this->db->get('registration')->result();
        $arr_data = array();
        $i = 0;
        foreach ($result as $row) {
            $arr_data[$i]['firstname'] = $row->firstname;
            $arr_data[$i]['lastname'] = $row->lastname;
            $i++;
        }
        echo json_encode($arr_data);
    }
    /**
     * function to logout the page
     */
    public function logout()
    {
        session_start();
        session_destroy();
        header("location:index.php");
    }
    /**
     * function to login the page
     * and validating the fields
     */
    public function login()
    {
        session_start();
        $form_data = json_decode(file_get_contents("php://input"));
        $validation_error = '';
        if (empty($form_data->email)) {
            $errr[] = 'Email is Required';
        } else {
            if (!filter_var($form_data->email, FILTER_VALIDATE_EMAIL)) {
                $errr[] = 'Invalid Email Format';
            } else {
                $data[':email'] = $form_data->email;
            }
        }
        if (empty($form_data->password)) {
            $errr[] = 'Password is Required';
        }
        if (empty($errr)) {
            $data = $this->login->find($form_data);
            if ($data) {
                $message = "login Success";
            }
        } else {
            $validation_error = implode(", ", $errr);
        }
        $output = array(
            'errr' => $validation_error,
        );
        echo json_encode($output);
    }
}
