
<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>

    <div class="form-container">
        <h3>Add Customer</h3>
        <form action="" method="post" class="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" required id="Customer_name" placeholder="full name">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="Phone_number" required class="form-control" placeholder="+255 567 567456">
                    
                </div>

                <div class="form-group col-md-6">
                    <label for="location">Address</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="location">
                    <br><br>
                    <button type="button" name='save' onclick="addcustomer()" class='btn'>ADD</button>
                </div>
            </div>
            
        </form>
        <p style="padding: 20px;" id="responcedata"></p>
    </div>
</div>