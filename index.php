<?php

// Lampirkan dbconfig  
require_once "dbconfig.php";

// Cek status login user  
if (!$user->isLoggedIn()) {
    header("location: login.php"); //Redirect ke halaman login  
}

// Ambil data user saat ini  
$currentUser = $user->getUser();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Home OpulentGoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-family: 'Centaur'; font-size: 20px;">OpulentGoods</div>
            <div class="info">
                <h2>&nbsp;<center> Welcome back, <?php echo $currentUser['name']?>!</center></h2>
            </div>

            <div class="panel-body">
                <a href="add.php" class="btn btn-large btn-default">
                    <i class="glyphicon glyphicon-plus"></i>
                    &nbsp; Add new items</a>
                <br /><br />

                <table class='table table-bordered table-responsive'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th colspan="2">
                            <center>Actions</center>
                        </th>
                    </tr>

                    <?php

                    $query = "SELECT * FROM barang";
                    $records_per_page = 5;
                    $newquery = $brg->paging($query, $records_per_page);
                    $brg->viewData($newquery);

                    ?>

                    <tr>
                        <td colspan="7" align="center">
                            <div class="pagination-wrap">
                                <?php $brg->paginglink($query, $records_per_page); ?>
                            </div>
                        </td>
                    </tr>

                </table>
                <a href="logout.php" class="btn btn-large btn-default">
                    <i class="glyphicon"></i>
                    Logout</a>

                <br /><br />

            </div>
            <!--End: Panel-body-->

        </div>
        <!--End: Panel-->

    </div>

    <!--Bootstrap-->

    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>