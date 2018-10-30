<?php
require  __DIR__ .'/../vendor/autoload.php';
use  AfricasTalking\SDK\AfricasTalking;


// $username   = "nHub";
// $apikey     = "7300e00eeebe4e523b44f3535b79e2390b13382ac200d0dd19178e9b2be32530";

class crud {
    private $db;
    public $AT;

    function __construct($DB_con) {
        $this->db = $DB_con;
        // Set your app credentials
        // Initialize the SDK
       // $this->AT = new AfricasTalking("sandbox", "c492cc4ba5d9cab90811fc12bb2a21a914f37b756c32091cd5456451c7102249");
         $this->AT = new AfricasTalking("eddiebigs", "7300e00eeebe4e523b44f3535b79e2390b13382ac200d0dd19178e9b2be32530");
        // Get the SMS service
       
    }

    public function runQuery($sql) {
        $stmt = $this->db->prepare($sql);
        return $stmt;
    }

    public function redirect($url) {
       header("Location: $url");
    }

    public function is_logged_in() {
        if (isset($_SESSION['userSession'])) {
            return true;
        }
        else {
            return false;
        }
    }

    public function logout() {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

    public function register($phone, $pass, $status) {
        try {
            $role = "user";

            $newphone = substr($phone, 1);
            $newphone = '+234'.$newphone; 

            $stmt = $this->db->prepare("INSERT INTO users (phone, password, status, role) VALUES(:phone, :password, :status, :role)");

            $stmt->bindparam(":phone", $newphone);
            $stmt->bindparam(":status", $status);
            $stmt->bindparam(":role", $role);
            $stmt->bindparam(":password", $pass);
            $stmt->execute();
            $message    = "thank you for signing up with us we shall keep you posted";
            $this->sendMessage($newphone, $message);
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function sendMessage($phone, $message) {
        $recipients = $phone;    
        try {
            $sms = $this->AT->sms();
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message
            ]);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    public function login($phone, $upass) {
        $newphone = substr($phone, 1);
        $newphone = '+234'.$newphone; 

        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE phone=:phone");
            $stmt->execute(array(":phone" => $newphone));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                if ($userRow['password'] == $upass) {
                    $_SESSION['userSession'] = $userRow['phone'];
                    return  $userRow['role'];
                } else {
                    header("Location: login.php?error");
                    exit;
                }
            
            } else {
                header("Location: login.php?error");
                exit;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    function getSingleUser($phone) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE phone=:phone");
        $stmt->execute(array(":phone" => $phone));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
         
    }

    function makeCall($phone) {
        // Get the voice service
        $voice    = $this->AT->voice();
        // Set your Africa's Talking phone number in international format
        $from = "+2342485";
        // Set the numbers you want to call to in a comma-separated list
        $to = $phone;
    
        try {
            // Make the call
            $results = $voice->call([
                'from' => $from,
                'to'   => $to
            ]);
    
            //print_r($results); 
        } catch (Exception $e) {
          echo "Error: ".$e->getMessage();
        }
    }


    function validatePhone($phone) {
        if(is_array($phone) || is_bool($phone) || is_float($phone) || is_dir($phone) || (strlen((string)$phone) !=11)) {
            return false;
        }  
        else {
            return true;
        }

   }

}