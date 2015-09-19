<?php
session_start();
require_once 'connectdb.php';

$fname = $lname = $username = $password = $gender = $email = @$mtype = $address = $age = $phone = $info = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST['fname']);
  $lname = test_input($_POST['lname']);
  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);
  $gender = test_input($_POST['gender']);
  $email = test_input($_POST['email']);
  @$mtype = test_input($_POST['mtype']);
  $address = test_input($_POST['address']);
  $age = test_input($_POST['age']);
  $phone = test_input($_POST['phone']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fnameErr = $lnameErr = $usernameErr = $passwordErr = $genderErr = $emailErr= $mtypeErr = $addressErr = $ageErr = $phoneErr = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $valid = true;  
      if(empty($_POST["fname"])) {  
     $fnameErr = "Missing Firstname";  
     $valid =false;  
      }  
   else {  
     $fname = test_input($_POST["fname"]);  
           // check if name only contains letters and whitespace  
   if (!preg_match("/^[a-zA-Z ]*$/",$fname))  
    {  
    $fnameErr = "Only letters and white space allowed";  
    $valid=false;  
       }  
   } 

   if(empty($_POST['lname'])) {
    $lnameErr = "Missing Lastname";
    $valid = false;
   }
   else {
    $lname = test_input($_POST["lname"]);
    if(!preg_match("/^[a-zA-Z]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
      $valid = false;
    }
   }

   if(empty($_POST['email'])) {
    $emailErr = "Missing Email";
    $valid = false;
   }
   else {
    $email = test_input($_POST["email"]);
    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
      $emailErr = "Invalid Email Format";
      $valid = false;
    }
   }

    if(empty($_POST['gender']) or $_POST['gender'] == 'NULL') { 
      $genderErr = "Specify your gender";
      $valid = false;
    }  
    else {
      $gender = test_input($_POST["gender"]);
    }

   if (!isset($_POST["mtype"])) {  
     $mtypeErr = "specify your membership type";  
     $valid=false;  
      }  
   else {  
     $mtype = test_input($_POST["mtype"]);  
   }

   if (empty($_POST["age"])) {  
   }  
   else {  
     $age = test_input($_POST["age"]);  
      if (preg_match("/^[a-zA-Z ]*$/",$age))  
    {  
    $ageErr = "Invalid age";  
    $valid=false;  
       }  
       }  

    if (empty($_POST["address"])) {  
    $addressErr = "specify Address ";  
    $valid=false;  
      }  
   else {  
     $address = test_input($_POST["address"]);  
   } 

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

   if (empty($_POST["phone"])) { 
      $phoneErr = "Missing Phone Number"; 
   }  
   else {  
     $phone = test_input($_POST["phone"]);  
      if (!preg_match("/^[0-9]*$/",$phone))  
    {  
    $phoneErr = "Invalid phone number";  
    $valid=false;  
       }  
       } 
}


if(@$valid==true) {
 @$fname=$_POST['fname'];  
 @$lname=$_POST['lname'];  
 @$email=$_POST['email'];  
 @$phone=$_POST['phone'];  
 @$address=$_POST['address'];  
 @$age=$_POST['age'];  
 @$gender=$_POST['gender'];  
 @$username=$_POST['username'];  
 @$password=$_POST['password'];  
 @$mtype=$_POST['mtype'];
 


     $result = "INSERT INTO users(FirstName,LastName,Email,CPhone,Address,Age,Gender,UserName,Password,Mtype) VALUES('$fname','$lname','$email','$phone','$address','$age','$gender','$username','$password','$mtype')";
    $result = $connection->query($result);
    if(!$result)
    $info =  "insert failed : $result<br>".$connection->error."<br><br>";
     else
      $info = "Registration Successful <br> $fname .$lname";
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
        <h1>Please Registration Here </h1>
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
              <?php 
                  if(!empty($info)) {
                ?>
                 <span class="error"><font color="red"><i><br><br><?php echo $info; ?></i></font></span>
                 <?php
                  }
                  ?>
            </div>
            <div class="col-md-6">
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
               <div class="form">
          
                  <div class="form-group">
                    <h2 class="header_four">Create Your Account</h2>

                    <label for="exampleInputFirstname">First Name *</label>
                    <input type="name" class="form-control" id="exampleInputFirstname" placeholder="First name" name="fname" value="<?php echo htmlspecialchars($fname);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$fnameErr;?></i></font></span>  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputLastname">Last Name</label>
                    <input type="name" class="form-control" id="exampleInputLasstname" placeholder="Last name" name="lname" value="<?php echo htmlspecialchars($lname);?>"> 
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$lnameErr;?></i></font></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputUsername">User Name</label>
                    <input type="name" class="form-control" id="exampleInputUsername" placeholder="user name" name="username" value="<?php echo htmlspecialchars($username);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$usernameErr;?></i></font></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo htmlspecialchars($fname);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$passwordErr;?></i></font></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="name" class="form-control" id="exampleInputEmail" placeholder="email" name="email" value="<?php echo htmlspecialchars($fname);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$emailErr;?></i></font></span>  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputAge">Age</label>
                    <input type="name" class="form-control" id="exampleInputEmail" placeholder="age" name="age" value="<?php echo htmlspecialchars($fname);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$ageErr;?></i></font></span>
                  </div>

                    
                   <div class="form-group">
                    <label for="name">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Address" name="address" value="<?php echo htmlspecialchars($fname);?>"></textarea>
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$addressErr;?></i></font></span> 
                   </div>


              

                  <div class="form-group">
                  <label for="exampleInputGender">Gender</label>
                    <select class="form-control" name="gender">
                      <option value="NULL">-- Please select your gender --</option> 
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                   </select>           
                  <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$genderErr;?></i></font></span>
                  </div>

                  <div class="form-group">
                       <label for="exampleInputRadio">Membership</label>
                        <label class="radio-inline">
                          <input name="mtype" type="radio" <?php if(isset($mtype) && $mtype =="ordinary") echo "checked"; ?> value = "ordinary"  > ordinary
                        </label>
                        <label class="radio-inline">
                          <input name="mtype" type="radio" <?php if(isset($mtype) && $mtype =="premium") echo "checked"; ?> value = "premium"  > Premium
                        </label>
                        <label class="radio-inline">
                          <input name="mtype" type="radio" <?php if(isset($mtype) && $mtype =="free") echo "checked"; ?> value = "free"  > Free
                        </label>
                        <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$mtypeErr;?></i></font></span> 
                  </div

                  
                  <div class="form-group">
                    <label for="exampleInputPhone">Phone Number </label>
                    <input type="name" class="form-control" id="exampleInputPhone" placeholder="Your phone number" name="phone" value="<?php echo htmlspecialchars($phone);?>">
                    <span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$phoneErr;?></i></font></span>
                  </div>

                </div>

                
              <button type="submit" class="btn btn-default sign_up_button" name = "submit" >Submit</button>

             
              </form>
             
           
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


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4df14df26c87e5bd"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'light',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 5
    }   
  });
</script>
</body>
</html>