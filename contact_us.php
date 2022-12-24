<?php
  require("header.php");
  require("left_panel.php");
?>  

<?php
   $connection = mysqli_connect("localhost","root","","coding_master");
   $query="SELECT * FROM contact";
   $query_run=mysqli_query($connection , $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
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
                        <h1 class="mt-4">Contact Us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact List</li>
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
                                            <th>Name</th>
                                            <th>Email ID</th>
                                            <th>Phone NO.</th>
                                            <th>Message</th>
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
                                                    <td><?php echo $row['name'];?> </td>
                                                    <td><?php echo $row['email_id'];?> </td>
                                                    <td><?php echo $row['phone'];?> </td> 
                                                    <td><?php echo $row['massage'];?> </td>
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>