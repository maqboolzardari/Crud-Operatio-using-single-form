<?php
    require "connect.php";
    // Delete Operation

    if(isset($_POST['delete_member'])){
        $delId = $_POST['delete_member'];
        try{

            $query = "UPDATE members SET is_deleted = :delValue WHERE meb_id = :id;";
            $statement = $connect->prepare($query);
            $data  =[
                ':delValue' => 1,
                ':id' => $delId,
            ];

            $exec = $statement->execute($data);
            if($exec){
                header('Location: index.php');
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
            
        

    }






    //Insert & Update Operation
    if(isset($_POST['addupdate'])){
        $id = $_POST['addupdate'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $desig = $_POST['desig'];
        $sallary = $_POST['sallary'];

        $query = "";
        $data = [];

        if($id == 0){
            $query = "INSERT INTO members (meb_name , meb_mobile , meb_desig , meb_sallary , is_deleted , created_on) VALUES(:name, :mobile, :desig , :sallary, 0 , now());";        
            $data = [
                ':name' => $name,
                ':mobile' => $mobile,
                ':desig' => $desig,
                ':sallary' => $sallary,
                ];
        }else{
            $query = "UPDATE members SET meb_name = :name, meb_mobile = :mobile, meb_desig = :desig, meb_sallary = :sallary, updated_on = now() WHERE meb_id = :id;";
            $data = [
                ':name' => $name,
                ':mobile' => $mobile,
                ':desig' => $desig,
                ':sallary' => $sallary,
                ':id' => $id,
                ];
        }
        // var_dump($data);
        // die();

        $statement = $connect->prepare($query);
        $exe = $statement->execute($data);
        if($exe){
            header('Location: index.php');
            exit(0);
        }else{
            header('Location: index.php');
            exit(0);
        }

    }



?>