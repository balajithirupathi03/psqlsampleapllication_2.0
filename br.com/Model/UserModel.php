<?php
//echo 'create table india.userdetails (UserId var,Name varchar,Gender varchar(1),MailId varchar,ContactNumber longint,Products array,Category varchar(1),Passsword varchar)';
//echo 'create table india.productdeatails (productid int serial primarykey,productname varchar,price int,productcount int,sellerid int)';
require_once 'Core/Sesstion.php';
require_once 'Config/UploadFilePathConfig.php';

class UserModel extends DataBaseAccessor
{
    public function getSchemaList()
    {
        $fields = ['s.nspname as schema'];
        $tableName = 'pg_catalog.pg_namespace s where nspname not in (\'information_schema\', \'pg_catalog\', \'public\') and nspname not like \'pg_toast%\' and nspname not like \'pg_temp_%\'';
        $schemaList = $this->select($fields, $tableName);
        return  pg_fetch_all($schemaList);
    }

    public function logout()
    {
        unset($_SESSION['userId']);
    }

    public function insertDetails($formValues)
    {
        unset($formValues['CreateAccount']);
        $tableName = $formValues['country'] . '.' . 'userdetails';
        unset($formValues['country']);
        $formValues['passsword'] = hash('sha256', $formValues['passsword'] . 'blaze2rage.com');
        $feilds = array_keys($formValues);
        $values = array_values($formValues);
        $this->insert($tableName, $feilds, $values);
        return true;
    }

    public function checkMailIdIsAvailaple($LoginMailId)
    {
        $feilds = ['userId', 'accounttype'];
        $tableName = '.userdetails';
        $whereFeild = 'mailid';
        $whereValue = '\'' . $LoginMailId . '\'';
        $schemaList = $this->getSchemaList();
        foreach ($schemaList as $schema) {
            $psqlData = $this->selectUsingCondition($feilds, $schema['schema'] . $tableName, $whereFeild, $whereValue);
            $tableDatas = pg_num_rows($psqlData);
            $userDeata = pg_fetch_array($psqlData);
            if ($tableDatas > 0) {
                $userDeata['schema'] = $schema['schema'];
                return ($userDeata);
            }
        }
        return false;
    }

    public function setSesstionData($userId)
    {
        $_SESSION["userid"] = $userId['userid'];
        $_SESSION["accounttype"] = $userId['accounttype'];
        $_SESSION["schema"] = $userId['schema'];
    }

    public function getSellePageData()
    {
        $fields = ['*'];
        $tableName = $_SESSION['schema'] . '.' . 'productdeatails';
        $whereFeild = 'sellerid';
        $whereValue = $_SESSION['userid'];
        return $this->selectUsingCondition($fields, $tableName, $whereFeild, $whereValue);
    }

    public function getBuyerPageData()
    {
        $fields = ['*'];
        $tableName = $_SESSION['schema'] . '.' . 'productdeatails';
        return $this->select($fields, $tableName);
    }

    public function insertSellingFormData($formData)
    {
        unset($formData['SellProduct']);
        $formData['sellerid']=$_SESSION['userid'];
        $tableName = $_SESSION['schema'] . '.' . 'productdeatails';
        $feilds = array_keys($formData);
        $values = array_values($formData);
        $this->insert($tableName, $feilds, $values);
        return True;
    }
}
