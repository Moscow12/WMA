$(document).ready(() => {
    loadHomeContents();
})
function getMedicaldepartment(){
    $.ajax({
        type: "GET",
        url: "views/addmeasure.php",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            loaddepartment();
            loadregisterform();
        }
    });
}

function loadregisterform(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {loadregisterform:''},
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
        }
    });
}
function signout(){
    $.ajax({
        type: "POST",
        url: "process/logout.php",
        data: {logout:''},
        cache:false,
        success: (response) => {
            if(response=="1"){
                window.open("index.php");
            }
        }
    });
}
function loadHomeContents(){
    $.ajax({
        type: "GET",
        url: "views/home.html",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
        }
    });
}

function adddepartament(){
    var name_of_department = $("#name_of_department").val();
    var Title =$("#Title").val();
    var whychooseus = $("#whychooseus").val();
    var Precaution = $("#Precaution").val();
    var Inteligence= $("#Inteligence").val();
    var Specialization = $("#Specialization").val();
    var maelezoziada_kuhusu_dept = $("#Department_description").val();
    if(name_of_department==''){
        $("#name_of_department").css("border", "1px solid red");
        return  false;
    }
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {maelezoziadapppppppppp:maelezoziada_kuhusu_dept,name_of_department:name_of_department,Title:Title, whychooseus:whychooseus, Precaution:Precaution,Inteligence:Inteligence, Specialization:Specialization, adddepartament:'' },
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
        }
    });
}

function loaddepartment(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {loaddepartment:'' },
        cache:false,
        success: (response) => {
            $("#result").html(response);
        }
    });
}

function uploadimegese(Department_ID){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID, imageupload:'' },
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
            loadimages(Department_ID)
        }
    });
}

function submituploadedimage(Department_ID){
  

    var file_input= $("#imageupload").val();
    var fd = new FormData();
    var files = $('#imageupload')[0].files[0];
    fd.append('file',files);
    
    $.ajax({
        type:'POST',
        url:'./process/image_upload.php',
        data:fd,
        processData: false,
        contentType: false,
        success:function(responce){  
            if(responce=='Nothing')  {
                alert("Failed To upload image please try again");
            } else{          
                saveImages(responce, Department_ID);
            }             
        }
    });
}

function saveImages(responce, Department_ID){
    var image_description = $("#image_description").val();
    var image_title = $("#image_title").val();
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID,responce_image_path:responce,image_description:image_description, image_title:image_title,  imageuploaded:'' },
        cache:false,
        success: (response) => {
            uploadimegese(Department_ID);
            loadimages(Department_ID)
        }
    });
}

function loadimages(Department_ID){
    
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID, imagesection : 'Department', loadimagedepartment:'' },
        cache:false,
        success: (response) => {
            $("#imegeupdaloaded").html(response);
        }
    });
}

function managedoctorinfo(){
    $.ajax({
        type: "GET",
        url: "views/doctorspage.php",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            loaddoctors();
            loadregisterdoctorform();
        }
    });
}

function loadregisterdoctorform(){
    $.ajax({
        type: "POST",
        url: "./process/loadDocRequest.php",
        data: {loadregisterdoctorform:''},
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
        }
    });
}

function addDoctorInfo(){
    var file_input= $("#imageupload").val();
    var fd = new FormData();
    var files = $('#imageupload')[0].files[0];
    fd.append('file',files);
    
    $.ajax({
        type:'POST',
        url:'./process/image_upload.php',
        data:fd,
        processData: false,
        contentType: false,
        success:function(responce){  
            if(responce=='Nothing')  {
                alert("Failed To upload image please try again");
            } else{          
                savedoctorinfo(responce);
            }             
        }
    });
}

function savedoctorinfo(responce){
    var name_of_Doctor = $("#name_of_Doctor").val();
    var Title = $("#Title").val();
    var Doctor_description = $("#Doctor_description").val();
    var Speciality = $("#Speciality").val();
    var Education = $("#Education").val();
    var Experience = $("#Experience").val();
    var Address = $("#Address").val();
    var Phone_number = $("#Phone_number").val();
    var Email = $("#Email").val();
    if(name_of_Doctor==''){
        $("#name_of_Doctor").css("border", "1px solid red");
        return  false;
    }
    $.ajax({
        type: "POST",
        url: "./process/loadDocRequest.php",
        data: {name_of_Doctor:name_of_Doctor,responce_image_path:responce,Title:Title, Doctor_description:Doctor_description, Speciality:Speciality, Education:Education,Experience:Experience,Address:Address, Phone_number:Phone_number,Email:Email, savedoctorprfile:'' },
        cache:false,
        success: (response) => {
            loaddoctors();
        }
    });
}

function loaddoctors(){
    $.ajax({
        type: "POST",
        url: "./process/loadDocRequest.php",
        data: { doctorsregister:'' },
        cache:false,
        success: (response) => {
            $("#doctornames").html(response);
        }
    });
}
function previewdata(Employee_ID){
    $.ajax({
        type: "POST",
        url: "./process/loadDocRequest.php",
        data: {Employee_ID:Employee_ID, doctorsPreview:'' },
        cache:false,
        success: (response) => {
            $("#modalview").html(response);
            $('.ui.modal')
                .modal('show')
            ;
        }
    });
   
  
}

function readImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#Patient_Picture').attr('src', e.target.result).width('50%').height('50%');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
//========= service section code ============
function serviceSection(){
    $.ajax({
        type: "POST",
        url: "./views/servicepage.php",
        data: { sectionregister:'' },
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            loadserviceregister();
            loadserviceregistered();
        }
    });
}
function loadserviceregister(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: { sectionregister:'' },
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
            
        }
    });
}
function addService(){
    var name_of_Service = $("#name_of_Service").val();
    var Service_description = $("#Service_description").val();
    var Icon_name= $("#Icon_name").val();
    if(name_of_Service==''){
        $("#name_of_Service").css("border", "1px solid red");
        return  false;
    }
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {name_of_Service:name_of_Service,Service_description:Service_description,Icon_name:Icon_name, sectionsave:'' },
        cache:false,
        success: (response) => {
            if(response=='added'){
                $("#name_of_Service").val('');
                loadserviceregistered();
            }else{
                alert("Failed to save you info");
            }
        }
    });
}

function loadserviceregistered(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: { load_searvice:'' },
        cache:false,
        success: (response) => {
           $("#servicebody").html(response);
        }
    });
}


//===========End of service section ===================
//===========About section ============================

function aboutsection(){
    $.ajax({
        type: "POST",
        url: "./views/aboutpage.php",
        data: { aboutsection:'' },
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            registeraboutsection();
            loadaboutsection();
            
        }
    });
}

function registeraboutsection(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: { aboutsectionreg:'' },
        cache:false,
        success: (response) => {
           $("#aboutsectionregister").html(response);
        }
    });
}

function saveaboutphoto(){
    var file_input= $("#imageupload").val();
    var fd = new FormData();
    var files = $('#imageupload')[0].files[0];
    fd.append('file',files);
    
    $.ajax({
        type:'POST',
        url:'./process/image_upload.php',
        data:fd,
        processData: false,
        contentType: false,
        success:function(responce){  
            if(responce=='Nothing')  {
                alert("Failed To upload image please try again");
            } else{          
                saveaboutsection(responce);
            }             
        }
    });
}
function saveaboutsection(image_responce){
    var About_description = $("#About_description").val();
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {About_description:About_description,image_responce:image_responce, aboutsectionsave:'' },
        cache:false,
        success: (response) => {
            loadaboutsection()
        }
    });
}
function loadaboutsection(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {aboutsectionload:'' },
        cache:false,
        success: (response) => {
           $("#aboutbody").html(response);
        }
    });
}
//============= End of about section ==================

//============ Start post Events ======================
function postevents(){
    $.ajax({
        type: "POST",
        url: "./views/events.php",
        data: { aboutsection:'' },
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            registerEventssection();
            loadEventssection();
            
        }
    });
}


function registerEventssection(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: { Eventssectionreg:'' },
        cache:false,
        success: (response) => {
           $("#Eventssectionregister").html(response);
        }
    });
}
function addEvents(){
    var Events_description = $("#Event_discription").val();
    var Event_Title =$("#Event_Title").val();

    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Events_description:Events_description,Event_Title:Event_Title, Eventssave:'' },
        cache:false,
        success: (response) => {
            loadEventssection()
            registerEventssection();
        }
    });
}
function saveEventsphoto(){
    var file_input= $("#imageupload").val();
    var fd = new FormData();
    var files = $('#imageupload')[0].files[0];
    fd.append('file',files);
    
    $.ajax({
        type:'POST',
        url:'./process/image_upload.php',
        data:fd,
        processData: false,
        contentType: false,
        success:function(responce){  
            if(responce=='Nothing')  {
                alert("Failed To upload image please try again");
            } else{          
                saveEventssection(responce);
            }             
        }
    });
}
function saveEventssection(image_responce){
    var Events_description = $("#Event_discription").val();
    var Event_Title =$("#Event_Title").val();

    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Events_description:Events_description,image_responce:image_responce,Event_Title:Event_Title, Eventssectionsave:'' },
        cache:false,
        success: (response) => {
            loadEventssection()
        }
    });
}
function loadEventssection(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Eventssectionload:'' },
        cache:false,
        success: (response) => {
           $("#Eventsbody").html(response);
        }
    });
}


//============ End of post events =====================
function testpage(){
    $.ajax({
        type: "GET",
        url: "views/test.php",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
        }
    });
}

