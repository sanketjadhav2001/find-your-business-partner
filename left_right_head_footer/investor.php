<?php
  require("header.php");
  require("left_panel.php");
?>  
<?php
   $connection = mysqli_connect("localhost","root","","coding_master");
   $query="SELECT * FROM investor_profile";
   $query_run=mysqli_query($connection , $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .edit
            {
                background-color:green;
                color:white;
            }
            .delete
            {
                background-color:red;
                color:white;
            }

        </style>
    </head>    
 <body>          
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Investors</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Investor List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Email Id</th>
                                            <th>Frist Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th>Invested Amount</th>
                                            <th>Experties</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run)>0)
                                        {
                                            while($row=mysqli_fetch_assoc($query_run))
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['email_id'];?> </td>
                                                    <td><?php echo $row['Fname'];?> </td>
                                                    <td><?php echo $row['Lname'];?> </td>
                                                    <td><?php echo $row['gender'];?> </td>
                                                    <td><?php echo $row['phone'];?> </td>
                                                    <td><?php echo $row['age'];?> </td>
                                                    <td><?php echo $row['invest_amount'];?> </td>
                                                    <td><?php echo $row['experties'];?> </td>
                                                    <td>
                                                        <button type="submit" class="edit">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="delete">Delete</button>
                                                    </td>
                                                </tr>
                                                <?php    
                                            }
                                        }
                                        else
                                        {
                                                 echo "NO Record Found";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

