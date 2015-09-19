<?php 
session_start();
require_once 'connectdb.php';

 $username = $password = $info = "";
 $usernameErr = $passwordErr = "";

 if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {  
     $usernameErr = "specify your username";  
     $valid=false;  
      }  
   else {  
     $username = test_input($_POST["username"]);  
   }  
      if (empty($_POST["password"])) {  
     $passwordErr = "specify your password";  
     $valid=false;  
      }  
   else {  
     $password = test_input($_POST["password"]);  
   }
}

if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql = "SELECT * FROM admin WHERE admin_name LIKE '{$username}' AND admin_pass LIKE '{$password}' LIMIT 1";
  $result = $connection->query($sql);
  if($result->num_rows > 0) {
    echo "<script>window.open('view_users.php','_self')</script>";
  }
  else {
    echo"<script>alert('Admin Details are incorrect..!')</script>";
  } 
}


 
?>  






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome To My Website .</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">

    <div class="row">
      <div class="header">
        <h1>Admin Panel </h1>
      </div>
    </div>

    <div class="row">
      <div class="menu">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="index.php">Home</a></li>
          <li role="presentation" class="active"><a href="login.php">Login</a></li>
          <li role="presentation" class="active"><a href="sign_up.php">Register</a></li>
          <li role="presentation" class="active"><a href="admin.php">Admin</a></li>
        </ul>

      </div>
      
    </div>

    <div class="row">
              <div class="col-md-6">
                
              </div>
              <div class="col-md-6">
                 <div class="form">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <h2 class="header_four">Please login First</h2>
                      <label for="exampleInputUsername">User Name</label>
                      <input type="name" class="form-control" id="exampleInputUsername" placeholder="user name" name="username">
                      <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$usernameErr;?></i></font></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                      <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$passwordErr;?></i></font></span>
                    </div>
                    <button type="submit" class="btn btn-default sign_up_button" name  = "submit">Submit</button> </br>
                  </form>
               </div>
             </div>
      
        </div>
          <div class="row footer">
                      <div class="col-md-6 footer_left">
                        &copy; || 2015
                      </div>
                      <div class="col-md-6 footer_right">
                        Developed by Nazmul Hossain .
                      </div>
            </div>
</div> 


</div>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4df14df26c87e5bd"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'light',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 
    }   
  });
</script>
</body>
</html>