<?php
    require 'connect.php';

    $id = $_POST['form-detail'];
    // var_dump($id);
    // die();

    $result = null;
    $buttonText = $id == 0 ? 'Save' : 'Update';

    if($id == 0 && ($id != null && $id != '')){
        $name = '';
        $mobile = '';
        $desig = '';
        $sallary = '';
    }else{
        if($id > 0){
            $getbyOnesql = "SELECT * FROM members WHERE meb_id = :id AND is_deleted = 0;";
            $statement = $connect->prepare($getbyOnesql);

            $statement->execute([':id' => $id]);

            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            $name = $result[0]->meb_name;
            $mobile = $result[0]->meb_mobile;
            $desig = $result[0]->meb_desig;
            $sallary = $result[0]->meb_sallary;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Added & Update Members</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="text-primary">Added Members Details</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="index.php" class="btn btn-primary float-right">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="operation.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6 form-group" >
                                            <label class="h6">Name:</label>
                                            <input type="text" name="name" class="form-control" value="<?= $name ?>">
                                        </div>
                                        <div class="col-md-6 form-group" >
                                            <label class="h6">Mobile:</label>
                                            <input type="text" name="mobile" class="form-control" value="<?= $mobile ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group" >
                                            <label class="h6">Designation:</label>
                                            <input type="text" name="desig" class="form-control" value="<?= $desig ?>">
                                        </div>
                                        <div class="col-md-6 form-group" >
                                            <label class="h6">Sallary:</label>
                                            <input type="text" name="sallary" class="form-control" value="<?= $sallary ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" >
                                            <button type="submit" value="<?= $id ?>" name="addupdate" class="btn btn-primary float-right">
                                                <?= $buttonText ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

<script src="dist/js/bootstrap.min.css"></script>
</body>
</html>