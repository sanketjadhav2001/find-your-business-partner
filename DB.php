<?php

class DB
{
  private $connection ;

  function connect()
  {
    $this->connection = mysqli_connect( 'localhost' , 'root' , '' , 'coding_master' );
  }

  function save($user_data)
  {
    $this->connect();
    extract($user_data);
    $sql = "INSERT INTO blog VALUES( '$image' ,  '$email_id', '$name_of_user', '$name_of_business' , '$description' )";
    $result = mysqli_query($this->connection , $sql);
    if($result == true)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
}

$DB_object = new DB();

?>