<?php
    include 'includes/students.php';
    //when it comes to making tag, in actual project use a code, not a tag name
    if( isset($_POST['tag']) && $_POST['tag']!='' ){
        $tag=$_POST['tag'];
        $response=array("tag"=>$tag, "success"=>0, "error"=>0);
        $dbStudent = new Student;
        if ($tag=="addstudent"){
            $name=$_POST['name'];
            $course=$_POST['course'];
            $location=$_POST['location'];
            $result = $dbStudent->addStudent($name,$course,$location);
            if($result){
                $response["success"]=1;
                $response["msg"]="Record Inserted";
                echo json_encode($response);
            }
            else{
                $response["error"]=1;
                 $response["msg"]="error";
            }
            //end of add student
        }
        else if ($tag=="updatestudent"){
            $name=$_POST['name'];
            $course=$_POST['course'];
            $location=$_POST['location'];
            $id=$_POST['id'];
            $result = $dbStudent->updateStudent($id,$name,$location,$course);
            if($result){
                $response["success"]=1;
                $response["msg"]="Record Inserted";
                echo json_encode($response);
            }
            else{
                $response["error"]=1;
                 $response["msg"]="error";
            }
            //end of add student
        }
        else if ($tag=="deletestudent"){
 
            $id=$_POST['id'];
            $result = $dbStudent->deleteStudent($id);
            if($result){
                $response["success"]=1;
                $response["msg"]="Record deleted";
                echo json_encode($response);
            }
            else{
                $response["error"]=1;
                 $response["msg"]="error";
            }
            //end of add student
        }
        else if($tag=='getstudent'){
        
            $id=$_POST['id'];
            // $result = $dbStudent->updateStudent($id);
            $result = $dbStudent->getStudent($id);
            if($result){
                $response["success"]=1;
                $response["msg"]="Record deleted";
                echo json_encode($result);
            }
            else{
                $response["error"]=1;
                 $response["msg"]="error";
            }
            //end of add student
        }
        else if($tag=="getstudents"){
            $result=$dbStudent->getStudents();
    
            if($result){
                $response["success"]=1;
                $response["msg"]="Record Fetched";
                echo json_encode($result);
            }
            else{
                $response["error"]=1;
                $respone["msg"]="Error Fetching";
                echo json_encode($response);
            }
        }
        
    }
    
    else{
        echo "invalid tag keyeword";
    }
?>
© 2019 GitHub, Inc.