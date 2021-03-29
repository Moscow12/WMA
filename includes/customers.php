<style>

    ._btn{
        padding:1rem 3rem;
        font-weight:bold;
    }
</style>

<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>



    <div class="list">
        <div>
            <h3>Customers List</h3>
        </div>
        <!-- index.php?id=add-customers -->
        <a href="#" data-toggle='modal' data-target='#myModal'><button class="_btn">Add New Customer</button></a>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Phone No:</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $num=1;
                    $sql_selectwork =mysqli_query($conn, "SELECT * FROM  tbl_customers ") or die(mysqli_error($conn));
                    if(mysqli_num_rows($sql_selectwork)>0){
                        while($row = mysqli_fetch_assoc($sql_selectwork)){
                            $Location =$row['Location'];
                            $Customer_name =$row['Customer_name'];
                            $Gender =$row['Gender'];
                            $Phone_Number =$row['Phone_Number'];
                            $Customer_ID = $row['Customer_ID'];
                            echo "<tr>
                                <td>$num</td>
                                <td><a href='index.php?id=customerservice&Customer_ID=$Customer_ID'><i class='fa fa-eye' aria-hidden='true'></i>
                                $Customer_name</a></td>
                                <td>$Phone_Number</td>
                                <td>$Location</td>
                                <td><button><i class='fa fa-trash' aria-hidden='true'></i></button> <button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>

                                </td>
                                
                            </tr>";
                            $num++;
                        }
                    }else{

                    }
                ?>
            </tbody>
        </table><p style="padding: 20px;" id="responcedata"></p>
    </div>
</div>


  <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD COSTOMERS</h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" class="form">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" required id="Customer_name" placeholder="full name">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="Phone_number" required class="form-control" placeholder="+255 567 567456">
                      
                        <label for="location">Address</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="location">
                        <br><br>
                        <button type="button" name='save' onclick="addcustomer()" class='btn'>ADD</button>
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