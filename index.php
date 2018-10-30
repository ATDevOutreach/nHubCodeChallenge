<?php
    session_start();
    ob_start();
    include_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Index</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php 

    if(isset($_POST['register'])){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];

        $response = false;
        if(!$phone || !$password ) {
            die('enter valid phone and password');
        }
        else {

            if(!$crud->validatePhone($phone)) {
                die('Invalid Phone Number');
            }
        
            $stmt = $crud->runQuery("SELECT * FROM users WHERE phone=:phone");
            $stmt->execute(array(":phone" => $phone));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($stmt->rowCount() > 0) {
                die('Attention!!! '.$phone." is Already Taken try another phone Number");
            
            } else {
              $response = $crud->register($phone, $password, $dob);

              if($response) {
                  $crud->redirect('user/');
              }
           
            }
        }
        
    }
    else if(isset($_POST['login'])) {
        
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $crud->login($phone, $password);     
        if ($role) {
         
           if ( $role == "user") {
             $crud->redirect('user/');
           }
           else  if ( $role == "admin") {
             $crud->redirect('admin/index.php');
           }
           else {
                 
           }
        }
          
    }

?>

<body>

  <div class="panel panel--static">
    <div class="panel__content left">
        <h1 class="panel__heading">Don't have an account?</h1>
        <p class="panel__copy">Ethical celiac hashtag taxidermy squid. Wayfarers distillery narwhal, kombucha jean shorts selvage meggings.</p>
        <button type="button" class="btn btn--secondary signup">Sign up</button>
    </div>
    <div class="panel__content right">
        <h1 class="panel__heading">Have an account?</h1>
        <p class="panel__copy">Ethical celiac hashtag taxidermy squid. Wayfarers distillery narwhal, kombucha jean shorts selvage meggings.</p>
        <button type="button" class="btn btn--secondary login">Log in</button>
    </div>
    
    <div class="panel panel--sliding">
        <div class="panel__content signup">
            <h1 class="panel__heading">Sign up</h1>
            <form id="signup" method="post">
                <input type="text" name="phone" placeholder="Phone Number" class="input input--name">
                <input type="password" name="password" placeholder="Password" class="input input--password">
                <input type="text" name="dob" placeholder="DOB" class="input input--name">
                <button class="btn btn--primary" name="register">Sign up</button>
            </form>
        </div>
            
            <div class="panel__content login">
                <h1 class="panel__heading">Log in</h1>
                <form id="login" method="post">
                    <input type="text" name="phone" placeholder="Phone" class="input input--name">
                    <input type="password" name="password" placeholder="Password" class="input input--password">
                    <button class="btn btn--primary" name="login">Log in</button>
                    <a href="/">Forgot password?</a>
                </form>
        </div>
    </div>    
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>


    <script  src="assets/js/index.js"></script>

</body>

</html>
