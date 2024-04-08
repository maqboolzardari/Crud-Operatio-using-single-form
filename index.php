<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operatoin</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>
<body>
    <div class="containner">
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2 class="text-primary">Karachi Members List</h2>
                                </div>
                                <div class="col-md-2">
                                    <form action="addupdate.php" method="post">
                                        <button type="submit" class="btn btn-primary float-right" name="form-detail" value="0">
                                            Add Member
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-stripted">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Mobile</td>
                                                <td>Designation</td>
                                                <td>Sallary</td>
                                                <td colspan="2">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                try{
                                                    $query = "SELECT * FROM members WHERE is_deleted = 0 order by meb_name";

                                                    $statement = $connect->prepare($query);

                                                    $statement->execute();

                                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                                    if($result){
                                                        foreach($result as $row){
                                                            ?>
                                                                <tr>
                                                                    <td><?= $row->meb_id ?></td>
                                                                    <td><?= $row->meb_name ?></td>
                                                                    <td><?= $row->meb_mobile ?></td>
                                                                    <td><?= $row->meb_desig ?></td>
                                                                    <td><?= $row->meb_sallary ?></td>
                                                                    <td colspan="2">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <form action="addupdate.php" method="post">
                                                                                    <button type="submit" class="btn btn-primary btn-sm" name="form-detail" value="<?= $row->meb_id ?>">
                                                                                        Edit
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <form action="operation.php" method="post">
                                                                                    <button type="submit" class="btn btn-danger btn-sm" name="delete_member" value="<?= $row->meb_id ?>">
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                            <tr>
                                                                <td colspan="5" class="h6 text-center">No Record Found</td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }catch(PDOException $ex){
                                                    echo $ex->getMessage();
                                                }
                                            ?> 
                                        </tbody>
                                    </table>
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