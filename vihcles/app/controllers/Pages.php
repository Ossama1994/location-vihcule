<?php


    class Pages extends Controller
    {
        public function __construct()
        {
         $this->postModel = $this->model('cars');
    
        }

       public function index()
       {
        $vihcle = $this->postModel->getVihcle();

        $data = [
                'vihcle' => $vihcle,
                ];
          $this->view('pages/index', $data);
       }

      }
