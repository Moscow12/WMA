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
    }