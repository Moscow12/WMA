<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>
    <script src="js/jsfunc.js"></script>
    <!-- <div class="addition-container">
        <form action="" method="post" class="form">
            <h3>Add measures </h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="weigh">Weigh</label>
                    <input type="text" class="form-control" required name="weigh" id="Type_of_measure"  placeholder="weigh name">
                </div>
                <div class="form-group col-md-6">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" required name="Description"  id="Description" placeholder="Description weigh">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type='button' name='save' onclick="saveweightype()" class='btn'>Save</button>
                </div>
            </div>
        </form>
        
    </div> -->
    
    <div class="list">
    <a href="#" data-toggle='modal' data-target='#myModal'><button class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Weigh</button></a>

        <div>
            <h3>Weigh List</h3>
        </div>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Weigh Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $num = 1;
                $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_type_of_measure") or die(mysqli_error($conn));
                if(mysqli_num_rows($sql_selectwork)>0){
                    while($row = mysqli_fetch_assoc($sql_selectwork)){
                    $Type_of_measure = $row['Type_of_measure'];
                    $Description =$row['Description'];
                    $Type_measure_ID =$row['Type_measure_ID'];
                    echo "<tr>
                            <td>$num</td>
                            <td>$Type_of_measure</td>
                            <td>$Description</td>
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
        <p style="padding: 20px;" id="responcedata"></p>
    </div>
</div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD TYPE WEIGH</h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" class="form">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="weigh">Weigh</label>
                        <input type="text" class="form-control" required name="weigh" id="Type_of_measure"  placeholder="weigh name">
                        <label for="Description">Description</label>
                        <input type="text" class="form-control" required name="Description"  id="Description" placeholder="Description weigh">
                
                         <br><br>
                        <button type="button" name='save' onclick="saveweightype()" class='btn'>ADD</button>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>            
            </form>
        
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div> 
    
    <!-- Modal -->