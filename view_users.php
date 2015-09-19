<?php 
session_start();
require_once 'connectdb.php';

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
        <h1>Admin Panel</h1>
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
          <h1 align="center">All the Users</h1>  
  
            <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
  
  
         <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
         <thead>  
  
		        <tr>  
		  
		            <th>User Id</th>  
		            <th>User Name</th>  
		            <th>User E-mail</th>  
		            <th>User Phone</th>  
		            <th>Delete User</th>  
		        </tr>  
        </thead>  
  
        <?php   
        $view_users_query="select * from users";//select query for viewing users.  
        $run=mysqli_query($connection,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row[10];  
            $user_name=$row[7];  
            $user_email=$row[2];  
            $user_phone=$row[3];  
  
  
  
        ?>  
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $user_name;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_phone;  ?></td>  
            <td><a href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
  
        <?php } ?>  
  
    </table>  
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