<?php


    class Reservation extends Controller
    {
        
       public function __construct()
       {
        $this->postModel = $this->model('cars');
       }



       public function check()
       {
        $vihcle = $this->postModel->getVihcle();
         if(isset($_POST['reserve']))
          $data = array(
              'locationfrom' => $_POST['locationfrom'],
              'datefrom' => $_POST['datefrom'],
              'locationto' => $_POST['locationto'],
              'dateto' => $_POST['dateto'],
              'vihcle' => $vihcle
          ); 
          $this->view('reservation/check',$data);  
       }

//         public function getAllvihcle(){
           
//             $vihcle = $this->postModel->getVihcle();
//             $data = [
//             'vihcle' => $vihcle
//                     ];
//             $this->view('reservation/getAllvihcle', $data);
//        }
//        public function getAllvihcledispo(){
           
//         $vihcle = $this->postModel->getVihcledispo();
//         $data = [
//         'vihcle' => $vihcle
//                 ];
//         $this->view('reservation/getAllvihcledispo', $data);
//    }


      }
