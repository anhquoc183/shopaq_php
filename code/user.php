<?php
include('layouts/header1.php');
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" cellspacing="0" id="tickets-table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $Statement_Users = "SELECT * FROM users";
                        $Query_Users =mysqli_query($conn, $Statement_Users);
                        $Stt= 1;
                        while ($Display_Users = mysqli_fetch_assoc($Query_Users)){
                            echo "<tr>";
                            echo '<td>'.$Stt.'</td>';
                            echo "<td>".$Display_Users['Name_User']."</td>";
                            echo "<td>".$Display_Users['Email_User']."</td>";
                            echo "<td>".$Display_Users['Password_User']."</td>";
                            echo "<td>".$Display_Users['Phone_User']."</td>";
                            echo "<td>".$Display_Users['Address_User']."</td>";
                            echo "</tr>";
                            $Stt++;
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div> 
    
<?php
include('layouts/footer1.php');
?>