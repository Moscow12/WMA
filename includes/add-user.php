
<script src="js/jsfunc.js"></script>

<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>

    <div class="form-container">
        <h3>Add User</h3>
        <form action="" method="post" class="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="Full_name" placeholder="full name">
                    <label for="gender">Gender</label>
                    <select name="gender" id="Gender" class="form-control">
                        <option value="" disabled>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="Phone_number" class="form-control" placeholder="+255 567 000 000">
                    
                </div>

                <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="" disabled>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="normaluser">Normal User</option>
                        
                    </select>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="station">Workstation</label>
                    <select name="station" id="Workstation_ID" class="form-control">
                        <?php 
                        
                        $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_working_station") or die(mysqli_error($conn));
                        if(mysqli_num_rows($sql_selectwork)>0){
                            while($row = mysqli_fetch_assoc($sql_selectwork)){
                                $Workstation_name = $row['Workstation_name'];
                                $Workstation_ID =$row['Workstation_ID'];
                                
                                echo "<option value='$Workstation_ID'> $Workstation_name</option>";
                                    
                            }
                            
                        }
                        ?>
                    </select>
                </div>
            </div>
            
        </form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <button type="button" name='save' onclick="adduser()" class='btn'>ADD</button>
            </div>
        </div>
        <p style="padding: 20px;" id="responcedata"></p>
    </div>
    
</div>