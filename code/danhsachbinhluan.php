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
                            <th>STT</th>
                            <th>Người Dùng</th>
                            <th>Bình Luận</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $Statement_Product = "SELECT * FROM comment";
                                $Query_Product =mysqli_query($conn, $Statement_Product);
                            $Stt= 1;
                            while ($Display_Product = mysqli_fetch_assoc($Query_Product)){
                                echo "<tr>";
                                echo '<td>'.$Stt.'</td>';
                                $Statement_User = "SELECT * FROM users WHERE ID_User =".$Display_Product['ID_User'];
                                $Query_User =mysqli_query($conn, $Statement_User);
                                $Display_User = mysqli_fetch_assoc($Query_User);
                                echo "<td>".$Display_User['Name_User']."</td>";
                                echo "<td>".$Display_Product['Comment']."</td>";

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