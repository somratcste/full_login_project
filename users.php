<?php 
session_start();
require_once 'connectdb.php';
if(!isset($_SESSION['userid']))
{
 header("Location: index.php");
}

$sql = "SELECT * FROM users WHERE UId = ".$_SESSION['userid'];
$result = $connection->query($sql);
$userid = $_SESSION['userid'];
 
while($row=mysqli_fetch_array($result))//while look to fetch the result and store in a array $row.  
{  
   
?>  
    
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome <?php echo $row['UserName']; ?>To My Website .</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">

    <div class="row">
      <div class="header">
        <h1>User Panel</h1>
      </div>
    </div>

    <div class="row">
      <div class="menu">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="logout.php">logout</a></li>
        </ul>

      </div>
      
    </div>

    <div class="row">
         <div class="table-scrol">  
          <h1 align="center">Users Information</h1>  
  
            <h2>Welcome <?php echo $row['UserName']; ?> </h2>


        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
  
  
         <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
         <thead class="table_header">  
  
            <tr>  
      
                <th>User</th>  
                <th>User Info</th>    
            </tr>  
        </thead>  
      <tbody class="table_information">
        <tr>
          <td data-title="ID">User ID : </td>
          <td data-title="Name"><?php echo $row[10] ?></td>
        <tr>
          <td data-title="ID">First Name : </td>
          <td data-title="Name"><?php echo $row[0] ?></td>
        </tr>
        <tr>
          <td data-title="ID">Last Name : </td>
          <td data-title="Name"><?php echo $row[1] ?></td>
         </tr>
        <tr>
          <td data-title="ID">Age : </td>
          <td data-title="Name"><?php echo $row[5] ?></td>
         </tr>
        <tr>
          <td data-title="ID">Gender : </td>
          <td data-title="Name"><?php echo $row[6] ?></td>
        </tr>
        <tr>
          <td data-title="ID">Hello : </td>
          <td data-title="Name"><?php echo $row[3] ?></td>
        </tr>
        <tr>
          <td data-title="ID">Email : </td>
          <td data-title="Name"><?php echo $row[2] ?></td>
        </tr>
        <tr>
          <td data-title="ID">Address : </td>
          <td data-title="Name"><?php echo $row[4] ?></td>
        </tr>
        <tr>
          <td data-title="ID">Memship Type : </td>
          <td data-title="Name"><?php echo $row[9] ?></td>
        </tr>
      
        </tbody>
      </table>  
    </div>  

<?php } 
?> 

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