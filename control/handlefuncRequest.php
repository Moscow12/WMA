<?php 

    declare(strict_types=1);
    include '../include/conn.php';
    
    class webdetails extends DBConfig{
       
        public function processQuery($sql,$error_msg){        
            $result =array();
            $Query= $this->connect()->query($sql)or die($this->connect()->errno.": ".$error_msg);
            while($data = $Query->fetch_assoc()){array_push($result,$data);}
            mysqli_free_result($Query);
            return json_encode($result);

        }

        public function fetchdepartmentdata($datarequest){

            $obj = json_decode($datarequest);
            $Department_ID = $obj->Department_ID;
            $status= $obj->status;
            $filter='  ';
            $filter.= (strtolower($Department_ID)=='all' || $Department_ID==NULL) ? "" : " WHERE  Department_ID='$Department_ID'";
            $filter.= (strtolower($status)=='all' || $status==NULL) ? "" : " AND dp_status='$status'";
            if($filter==''){
                $filter.=" WHERE  1";
            }

            $sql1 = "SELECT * FROM tbl_department $filter ";
            return $this->processQuery($sql1,"Failed to execute data 1");
        }

        public function fetchImageSectionData($imagedata){

            $obj = json_decode($imagedata);
            $section = $obj->section;
            $Section_ID = $obj->Section_ID;
            $filter=' WHERE ';
            $filter.= (strtolower($Section_ID)=='all' || $Section_ID==NULL) ? "" : "  Section_ID='$Section_ID'";
            $filter.= (strtolower($section)=='all' || $section==NULL) ? "" : " AND section='$section'";
            if($filter==''){
                $filter.="  1";
            }

            $sql2 = "SELECT * FROM tbl_images $filter ";
            return $this->processQuery($sql2,"Failed to execute data 2");
        }

        public function fetchDoctorsData($datarequest){
            $obj = json_decode($datarequest);
            $doctor_status = $obj->doctor_status;
            $Employee_ID = $obj->Employee_ID;
            $filter='WHERE';
            $filter.= (strtolower($Employee_ID)=='all' || $Employee_ID==NULL) ? "" : "  Employee_ID='$Employee_ID'";
            $filter.= (strtolower($doctor_status)=='all' || $doctor_status==NULL) ? "" : " AND doctor_status='$doctor_status'";
            if($filter=='WHERE'){
                $filter.="  1";
            }

            $sql3 = "SELECT * FROM tbl_employee $filter ";
            return $this->processQuery($sql3,"Failed to execute data 3");
        }

        public function fetchService($datarequest){
            $obj = json_decode($datarequest);
            $Service_ID = $obj->Service_ID;
            $filter='WHERE';
            $filter.= (strtolower($Service_ID)=='all' || $Service_ID==NULL) ? "" : "  Service_ID='$Service_ID'";
            if($filter=='WHERE'){
                $filter.="  1";
            }

            $sql4 = "SELECT * FROM tbl_service $filter ";
            return $this->processQuery($sql4,"Failed to execute data 4");
        }

        public function fetchAbout($datarequest){
            $obj = json_decode($datarequest);
            $About_ID = $obj->About_ID;
            $filter='WHERE';
            $filter.= (strtolower($About_ID)=='all' || $About_ID==NULL) ? "" : "  About_ID='$About_ID'";
            if($filter=='WHERE'){
                $filter.="  1";
            }

            $sql5 = "SELECT * FROM tbl_about_section $filter ";
            return $this->processQuery($sql5,"Failed to execute data 5");
        } 

        public function fetchEvents($datarequest){
            $obj = json_decode($datarequest);
            $Event_ID = $obj->Event_ID;
            $filter='WHERE';
            $filter.= (strtolower($Event_ID)=='all' || $Event_ID==NULL) ? "" : "  Event_ID='$Event_ID'";
            if($filter=='WHERE'){
                $filter.="  1";
            }

            $sql6 = "SELECT * FROM tbl_Events $filter ";
            return $this->processQuery($sql6,"Failed to execute data 6");
        } 
    }