
<?php
class db
{
    function connection(){
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "todo_db";

        $connection = new mysqli($db_host,$db_user,$db_pass,$db_name);

        if($connection->connect_error)
            {
                die("Connection failed: " . $connection->connect_error);
            }

        return $connection;
    }

    function signup($connection,$tablename,$username,$password)
    {
        $sql= "INSERT INTO".$tablename."(username,password) VALUES('".$username."', '".$password."')";
        $result=$connection->query($sql);
        return $result;
    }

    function signin($connection,$tablename,$username,$password)
    {
        $sql="SELECT * FROM".$tablename."WHERE username='".$username."' AND password='".$password."'";
        $result=$connection->query($sql);
        return $result;
    }

    function addTask($connection, $tablename, $user_id, $title, $description)
    {
        $sql = "INSERT INTO ".$tablename." (user_id, title, description) VALUES ('".$user_id."', '".$title."', '".$description."')";
        $result = $connection->query($sql);
        return $result;
    }

    function getTasks($connection, $tablename, $user_id)
    {
        $sql = "SELECT * FROM ".$tablename." WHERE user_id='".$user_id."'ORDER BY id DESC";
        $result = $connection->query($sql);
        return $result;
    }

    function getTask($connection, $tablename, $id, $user_id)
    {
        $sql = "SELECT * FROM ".$tablename." WHERE id='".$id."' AND user_id='".$user_id."'";
        $result = $connection->query($sql);
        return $result;
    }

    function updateTask($connection, $tablename, $id, $user_id, $title, $description, $status)
    {
        $sql = "UPDATE ".$tablename." SET title='".$title."',description='".$description."',status='".$status."' WHERE id='".$id."' AND user_id='".$user_id."'";
        $result = $connection->query($sql);
        return $result;
    }

    function deleteTask($connection, $tablename, $id, $user_id)
    {
        $sql = "DELETE FROM ".$tablename." WHERE id='".$id."' AND user_id='".$user_id."'";
        $result = $connection->query($sql);
        return $result;

    }
}
?>