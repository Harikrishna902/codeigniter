<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");

/*********************************************************************
 * @discription  Controller API
 *********************************************************************/
include '/var/www/html/codeigniter/application/services/registerService.php';
include '/var/www/html/codeigniter/application/services/loginService.php';
include '/var/www/html/codeigniter/application/services/forgotService.php';

class RegisterController extends CI_Controller
{
    /**
     * @var string $serviceReference serviceReference
     */
    public $serviceReference = "";
    public $loginservice = "";
    public $forgotservice= "";
    /**
     * constructor establish DB connection
     */
    public function __construct()
    {
        parent::__construct();
        $this->serviceReference = new registerService();
        $this->loginservice = new loginService();
        $this->forgotservice= new forgotService();
    }
    /**
     * @method registration() Adds data into the database
     * @return void
     */
    public function registration()
    {
        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["Lastname"];
        $email= $_POST["email"];
        $password = $_POST["password"];
        //$confirm = $_POST["confirm password"];
        $this->serviceReference->registration($FirstName,$LastName,$email,$password);
    }
    /**
     * @method login() login in to fundo logic
     * @return void
     */
    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $this->loginservice->login($email,$password);
    }
     
    /**
     * @method  for forgotpassword
     * @return void 
     */
    public function forgot(){
        $email=$_POST["email"];
        $this->forgotservice->forgot($email);

    }

}
