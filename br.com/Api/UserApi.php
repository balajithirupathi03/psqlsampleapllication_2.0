<?php
class userApi{

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->post = $_POST;
    }

    function checkUserLoginAPI(){
            $userData = $this->userModel->checkMailIdIsAvailaple($this->post['loginMailId']);
            if ($userData) {
                $this->userModel->setSesstionData($userData); 
                http_response_code(200);
            } else {
                http_response_code(500);                
            }
    }

    function viewHomePageAPI(){
        $dataArray=[];
        if ($_SESSION['accounttype'] == 'b') {
            $buyerPageData = $this->userModel->getBuyerPageData();
            while ($data = pg_fetch_assoc($buyerPageData)) {
                array_push($dataArray, array($data));
            }
            echo (json_encode($dataArray));
            http_response_code(200);               
        } else if($_SESSION['accounttype'] == 's'){
            $sellerData = $this->userModel->getSellePageData();
            while ($data = pg_fetch_assoc($sellerData)) {
                unset($data['sellerid']);
                array_push($dataArray, array($data));
            }
            echo (json_encode($dataArray));          
            http_response_code(200);                
        }   else{
            http_response_code(502);                
        }
    }
}