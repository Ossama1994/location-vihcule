<?php


    class Admin extends  Controller
{
        public function __construct()
        {
         $this->postModel = $this->model('cars');
         $this->userModel = $this->model('users');

        }

       public function index()
       {
        $vihcle = $this->postModel->getVihcle();
        $total = $this->postModel->countvihcles();

        $data = [
                'vihcle' => $vihcle,
                'total' =>$total
                ];
          $this->view('Admin/index', $data);
       }
       
    //     public function getAllvihcle(){
           
    //         $vihcle = $this->postModel->getVihcle();
    //         $data = [
    //         'vihcle' => $vihcle
    //                 ];
    //         $this->view('reservation/getAllvihcle', $data);
    //    }

    public function add()
    {
       if($_SERVER['REQUEST_METHOD']=='POST')
       
       {
          // Sanitize POST Array
          $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

          $data = [
             'Price' => trim($_POST['Price']),
             'name' => trim($_POST['name']),
             'class' => trim($_POST['class']),
             'fuel' => trim($_POST['fuel']),
             'passengers' => trim($_POST['passengers']),
             'image' => trim($_POST['image']),
             
             'Price_err' => '',
             'name_err' => '',
             'class_err' => '',
             'fuel_err' => '',
             'passengers_err' => '',
             'image_err'=> ''
          ];

          // Validate
          if( empty($data['Price']) )
          {
             $data['Price_err'] = 'Please enter the Price';
          }
          if( empty($data['name']) )
          {
             $data['name_err'] = 'Please enter the name';
          }
          if( empty($data['class']) )
          {
            $data['class_err'] = 'Please enter the class';
          }
            if( empty($data['fuel']) )
            {
                $data['fuel_err'] = 'Please enter the fuel';
            }
             if( empty($data['passengers']) )
             {
                $data['passengers_err'] = 'Please enter the number of passengers';
             }
             if( empty($data['image']) )
             {
                $data['image_err'] = 'Please enter the image';
             }
         }

          // Make sure no errors
          if ( empty($data['Price_err']) && empty($data['name_err']) && empty($data['class_err'])  && empty($data['fuel_err']) && empty($data['passengers_err']) && empty($data['image_err'])){
             // Validated
             if( $this->postModel->addVihcle($data) ){
               //  flash('post_message', 'Post Added');
                redirect('Admin');
             } else{
                die('Something went wrong');
             }
          } else {
             // Load the view
             $this->view('Admin', $data);
          }

           
         }

         public function update(){
            
            $regis_num = $_GET['regis_num'];
            $vihcle = $this->postModel->getVihclebynum($regis_num);
            $data = [
               'vihcle' => $vihcle
            ];
            $this->view('Admin/update',$data);
         }

         public function edit($code)
         {    
            
            if($_SERVER['REQUEST_METHOD']=='POST'){
               // Sanitize POST Array
               $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
               $data = [
                  'regis_num' => $code,
                  'name' => trim($_POST['name']),
                  'Price' => trim($_POST['Prcie']),
                  'class' => trim($_POST['class']),
                  'fuel' => trim($_POST['fuel']),
                  'passengers' => trim($_POST['passengers'])
                  
               ];
         
                  if( $this->postModel->edit($data) === true){
                     flash('cart_message', 'car Updated');
                     redirect('Admin/index');
                  } else{
                     die('Something went wrong');
                  }
                  // Load the view
                  
            } else{
               // Get existing post from model
               $post = $this->postModel->edit($code);
         
               //Check for owner
               $this->view('Admin/update', $data);
            }
         
         }
         public function delete($code){
            
            if( $this->postModel->delete($code) === true){
               flash('cart_message', 'car Updated');
               redirect('Admin/index');
            } else{
               die('Something went wrong');
            }
         }

        

}