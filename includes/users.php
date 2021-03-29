<div class="section_main">
    <a href="./index.php?id=main" class='back'> <b>< </b>Back</a>

    
    <div class="list">
        <div>
            <h3>Users List</h3>
        </div>
        <table class='table table-hover table-condensed'>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Phone No:</th>
                    <th>Working Station</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num=1;
                    $sql_selectwork =mysqli_query($conn, "SELECT * FROM tbl_Users u, tbl_working_station ws WHERE u.Workstation_ID=ws.Workstation_ID") or die(mysqli_error($conn));
                    if(mysqli_num_rows($sql_selectwork)>0){
                        while($row = mysqli_fetch_assoc($sql_selectwork)){
                            $Workstation_name =$row['Workstation_name'];
                            $Full_name =$row['Full_name'];
                            $Gender =$row['Gender'];
                            $Phone_number =$row['Phone_number'];
                            $role = $row['roles'];
                            $username = $row['username'];
                            echo "<tr>
                                <td>$num</td>
                                <td>$Full_name</td>
                                <td>$Gender</td>
                                <td>$Phone_number</td>
                                <td>$Workstation_name</td>
                                <td>$username</td>
                                <td>$role</td>
                                <td></td>
                            </tr>";
                        }
                    }else{

                    }
                ?>
            </tbody>
        </table>
    </div>
</div>