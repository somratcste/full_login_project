<?php 
session_start();
require_once 'connectdb.php';
if(isset($_SESSION['user'])!="")
{
 
}
$username = $password = "" ;
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

if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE UserName ='$username'";
  $result = $connection->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

 if($row['Password']==$password)
 {
  $_SESSION['userid'] = $row['UId'];
  header("Location: users.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
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
        <h1>Users Login Here </h1>
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
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-default sign_up_button" name = "submit">Submit</button> </br>
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