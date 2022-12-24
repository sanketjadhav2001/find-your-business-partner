<?php
require("header.php");
require("left_panel.php");
require("DB.php");

if(isset($_POST['submit'])) // form submit save the data
{
  if($DB_object->save($_POST))
  {
    $message = "Save Successfuly";
  }
  else{
    $message = "Data not save";
  }
}
else
{
    $message = null;
}

?>
<div class="container">
                    <a>
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Blog</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                     <label for="image" >Upload Image</label>
                                                        <input name="image" class="form-control" type="file" id="file" require/> 
                                                        
                                                  
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="name_of_user" class="form-control" type="text" placeholder="Enter Name"require />
                                                        <label for="name_of_user">Enter name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="email_id" class="form-control" type="text" placeholder="Enter email" require/>
                                                        <label for="email_id">Enter email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="name_of_business" class="form-control"  type="text" placeholder="Enetr business name " require/>
                                                <label for="name_of_business">Enetr business name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                                                <label for="description">Description</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                                                <center><h6><?=$message?></h6></center>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>