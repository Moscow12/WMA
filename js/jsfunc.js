

    function savedoctorinfos(instance) {
        var fieldName = $(instance).attr('name');
        var fieldValue = $(instance).val();
        alert(fieldValue);
        $.ajax({
            type: 'GET',
            url: 'clinicalautosave.php',
            data: 'fieldName=' + fieldName + '&fieldValue=' + fieldValue,
            cache: false,
            success: function (result) {

            }
        });
    }
    
    function saveworkstation(){
        var Workstation =document.getElementById('Workstation').value 
        var location = document.getElementById('location').value; 
        $.ajax({
            type: 'POST',
            url: 'includes/savedata.php',
            data: {Workstation:Workstation, location:location, saveworkstation:''},
            success: function (result){
                alert(result);
            }
        });
    }

    function adduser(){
        var Full_name =$("#Full_name").val();
        var Gender =$("#Gender").val();
        var Phone_number = $("#Phone_number").val();
        var role =$("#role").val();
        var username =$("#username").val()
        var Workstation_ID =$("#Workstation_ID").val();
        $.ajax({
            type: 'POST',
            url: 'includes/savedata.php',
            data: {Full_name:Full_name, Gender:Gender,Phone_number:Phone_number, role:role,username:username, Workstation_ID:Workstation_ID, saveusers:''},
            success: function (responce){
                //alert(responce);
                $("#responcedata").html(responce)
                $("#responcedata").fadeIn(3000);

            }
        });
    }

    function addcustomer(){
        var Customer_name =$("#Customer_name").val();
        var Phone_number =$("#Phone_number").val();
        var location = $("#location").val();
        $.ajax({
            type: 'POST',
            url: 'includes/savedata.php',
            data: {Customer_name:Customer_name,Phone_number:Phone_number, location:location,savecustomers:''},
            success: function (responce){
                //alert(responce);
                $("#responcedata").html(responce)
                $("#responcedata").fadeIn(3000);

            }
        });
    }

    function saveweightype(){
        var Type_of_measure =$("#Type_of_measure").val()
        var Description = $("#Description").val();
        $.ajax({
            type: 'POST',
            url: 'includes/savedata.php',
            data: {Type_of_measure:Type_of_measure, Description:Description,savemeasures:''},
            success: function (responce){
                $("#responcedata").html(responce)
                $("#responcedata").fadeIn(3000);

            }
        });
    }

    function addweightyp(Type_measure_ID, Customer_ID){
        $.ajax({
            type: 'POST',
            url: 'includes/savedata.php',
            data: {Type_measure_ID:Type_measure_ID, Customer_ID:Customer_ID,savemeasuretypecustomer:''},
            success: function (responce){
                $("#responcedata").html(responce)

            }
        });
    }

    function saveservice(Customer_measure_ID, Customer_ID){
        var measure_status =$("#measure_status").val();
        var test_date =$("#test_date").val();
        var Quantity =$("#Quantity").val();
        var Amount_required =$("#Amount_required").val();
        var remarks = $("#remarks").val();
        if(measure_status==''){
            alert("Please fill status")
            $("#measure_status").css("border", "2px solid red");
            
        }else   if(Amount_required==''){
            alert("Please fill Amount ")
            $("#Amount_required").css("border", "2px solid red");
            
        }else   if(Quantity==''){
            alert("Please fill Quantity ")
            $("#Quantity").css("border", "2px solid red");
            
        }else{
            
            $.ajax({
                type: 'POST',
                url: 'includes/savedata.php',
                data: {test_date:test_date,Amount_required:Amount_required,remarks:remarks, Customer_ID:Customer_ID, Customer_measure_ID:Customer_measure_ID, Quantity:Quantity, measure_status:measure_status,saveservice:''},
                success: function (responce){
                    $("#responcedata").html(responce)
                    $("#measure_status").val('');
                    $("#test_date").val('');
                    $("#Quantity").val('');
                    $("#Amount_required").val('');
                    $("#remarks").val('');
                }
            });
        }
    }

    function paycustomerbill(Measure_mantainance_ID, Bill_ID){
        
        var Amount_paid =$("#Amount_paid"+Measure_mantainance_ID).val();
        // var Bill_ID=$("#Bill_ID"+Measure_mantainance_ID).val();
        var Reference_number =$("#Reference_number"+Measure_mantainance_ID).val();
        if(Amount_paid==''){
            alert("Amount paid Required")
            $("#Amount_paid").css("border", "2px solid red");
            
        }else   if(Reference_number==''){
            alert("Please fill referance number ")
            $("#Reference_number").css("border", "2px solid red");
            
        }else{
            alert(Bill_ID)
            $.ajax({
                type: 'POST',
                url: 'includes/savedata.php',
                data: {Reference_number:Reference_number,Bill_ID:Bill_ID,Measure_mantainance_ID:Measure_mantainance_ID, Amount_paid:Amount_paid,paysarvice:''},
                success: function (responce){
                    $("#responcedata").html(responce)
                    $("#responcedata").fadeIn(3000);

                }
            });
        }
    }

    function filterreport(){
        var Employee_ID = $("#Employee_ID").val()
        var measure_status =$("#measure_status").val();
        var start_date=$("#start_date").val();
        var end_date = $("#end_date").val();   
        $.ajax({
            type: 'POST',
            url: 'includes/loaddata.php',
            data: {end_date:end_date,start_date:start_date,measure_status:measure_status, Employee_ID:Employee_ID,loaddatareport:''},
            success: function (responce){
                $("#responcedata").html(responce)

            }
        });
    }

    function filterreportexcel(){
        var Employee_ID = $("#Employee_ID").val()
        var measure_status =$("#measure_status").val();
        var start_date=$("#start_date").val();
        var end_date = $("#end_date").val(); 
        window.open('includes/Preview_Report_in_excel.php?start_date=' + start_date + '&end_date=' + end_date + '&measure_status=' + measure_status + '&Employee_ID=' + Employee_ID, '_blank');
    
    }