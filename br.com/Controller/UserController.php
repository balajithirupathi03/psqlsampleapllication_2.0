<?php

class userController
{
    use Render;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userApi = new UserApi();
        $this->post = $_POST;
    }

    public function viewHomePage()
    {
        if ($_SESSION['accounttype'] == 'b') {
            $this->render('buyerPage', '');   
        } else if($_SESSION['accounttype'] == 's'){
            $this->render('sellerPage', '');
        }
        else{
            echo 'session Not Found';
            http_response_code(502);                
        }
    }

    public function login()
    {            
        $this->render('UserLoginForm', '');
    }

    public function createAccount()
    {
        if (isset($this->post['CreateAccount'])) {
            if ($this->userModel->checkMailIdIsAvailaple($this->post['mailid'])) {
                echo 'Account is availaple';
            } else {
                if ($this->userModel->insertDetails($this->post)) {
                    echo 'inserted';
                };
            }
        } else
            $this->render('UserRegisterationForm', '');
    }

    public function addProduct()
    {
        if (isset($this->post['SellProduct'])) {
            if ($this->userModel->insertSellingFormData($this->post)) {
                echo 'Product Posted Successfully...';
            }
        } else {
            $this->render('ProductSellForm', '');
        }
    }
}
