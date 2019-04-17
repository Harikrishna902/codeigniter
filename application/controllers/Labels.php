<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
header("Access-Control-Request-Method: POST");
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin, Authorization
');
defined('BASEPATH') or exit('No direct script access allowed');
include '/var/www/html/codeigniter/application/services/labelService.php';
class labels extends CI_Controller
{
    private $serviceReference = "";
    /**
     * @description create an instance of service methods
     * constructor establish DB connection
     */
    public function __construct()
    {
        parent::__construct();
        $this->serviceReference = new labelService ();
    }

    /**
     * @method to add the labels
     */
    // public function addLabel(){
    //     $email= $_POST['email'];
    //     $label = $_POST['label'];

    //     $this->serviceReference->labelAdd($email,$label);
    // }

    public function addLabel(){
        $uid = $_POST['uid'];
        $label = $_POST['label'];
        $em = $this->doctrine->em;
        $labels = new Entity\Labels;

        
        $article2 = $em->find('Entity\Users', $uid);
        $labels->setLuid($article);

        $labels->setLabelname($label);

        $em->persist($labels);

        $em->flush();
    }

  /**
   * @method to fetch/display the labels
   */
  
    // public function getLabel()
    // {
    //     $email = $_POST['email'];
    //     $this->serviceReference->labelFetch($email);
    // }


    public function getLabel(){
        $em = $this->doctrine->em;
        $query = $em->createQuery('SELECT u.id,u.labelname FROM Entity\Labels u ');
        $results = $query->getResult();
        print json_encode($results);
    }

} 