<?php
session_start();
class SignUp extends DbConn
{
    private $name;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($name, $email, $password, $confirmPassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }
    //Hash the password
    private function passwordHash($password)
    {
        $hash = md5($password);
        return $hash;
    }
    // check if the inputs are empty
    public function isInputEmpty()
    {
        $valid = true;
        if (empty($this->name) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
            $valid = false;
        }
        return $valid;
    }
    //check if the email is valid
    private function isEmailValid()
    {
        $valid = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
        return $valid;
    }
    //check if passwords are matching
    private function isPasswordMatched()
    {
        $valid = true;
        if ($this->password !== $this->confirmPassword) {
            $valid = false;
        }
        return $valid;
    }

    //check email if exists
    private function checkEmail()
    {
        $valid = true;
        $dbConnection = $this->connect();
        $email = $this->email;
        $sql = "SELECT * FROM users where email = '$email'";

        if ($result = mysqli_query($dbConnection, $sql)) {
            $count = mysqli_num_rows($result);

            if ($count > 0) {
                $valid = false;
            }
        }
        return $valid;
    }
    // overall input validation

    public function formValidation()
    {
        $res = array();
        if (!$this->isInputEmpty()) {
            $res = array("msg" => "some fields are required!!", 'valid' => false);
        } else if (!$this->isEmailValid()) {
            $res = array("msg" => "Enter the valid email address!!", 'valid' => false);
        } else if (!$this->isPasswordMatched()) {
            $res = array("msg" => "Password should match!!", 'valid' => false);
        } else if (!$this->checkEmail()) {
            $res = array("msg" => "Email already exists!!", 'valid' => false);
        } else {
            $res = array('valid' => true);
        }
        return $res;
    }

    //store register data into table
    public function storeData()
    {
        $dbConnection = $this->connect();
        $name = $this->name;
        $email = $this->email;
        $password = $this->passwordHash($this->password);
        $createdAt = date("Y-m-d h:i:sa");
        $sql = "INSERT INTO users(name,email,password,created_at) VALUES('$name','$email','$password','$createdAt')";
        $result = mysqli_query($dbConnection, $sql);
        if (!$result) {
            $arr = array('msg' => 'failed', 'data' => $dbConnection->error);
            // echo ('Query Failed!! please try again later ' . $dbConnection->error);
            // exit();
        } else {
            $arr = array('msg' => 'success', 'data' => 'Data has been inserted successfully!!');
        }
        return $arr;
    }
}
