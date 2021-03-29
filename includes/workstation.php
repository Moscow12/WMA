<script src="js/jsfunc.js"></script>

<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>

    <div class="addition-container">
        <form action="" method="post" class="form">
            <h3>Add Workstation <?= $_SESSION['User_ID']; ?></h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="workstation">Workstation</label>
                    <input type="text" class="form-control" required name="Workstation" id="Workstation"  placeholder="workstation name">
                </div>
                <div class="form-group col-md-6">
                    <label for="location">location</label>
                    <input type="text" class="form-control" required name="location"  id="location" placeholder="workstation location">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type='button' name='save' onclick="saveworkstation()" class='btn'>Save</button>
                </div>
            </div>
        </form>

    </div>
    
    <div class="list">
        <div>
            <h3>Station List</h3>
        </div>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Station Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $num = 1;
                 $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_working_station") or die(mysqli_error($conn));
                 if(mysqli_num_rows($sql_selectwork)>0){
                     while($row = mysqli_fetch_assoc($sql_selectwork)){
                        $Workstation_name = $row['Workstation_name'];
                        $Location =$row['Location'];
                        echo "<tr>
                             <td>$num</td>
                             <td>$Workstation_name</td>
                             <td>$Location</td>
                             <td></td>
                             </tr>";
                             $num++;
                     }
                     
                 }else{
                    echo "<tr><td colspan='4'>No result found</td></tr>";
                 }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- <script>

 function saveworkstation(){
        var Workstation = $("#Workstation").val();
        var location = $("#location").val()
        alert(location+' '+Workstation);
    }
</script> -->