<?php

	
	include('../../utils/db.php');
	include('../../utils/finalStudentAPI.php');
        include('../../utils/error_handler.php');

        
	$id = (int)$_GET['id'] ;
	$result = fp_final_student_delete($id) ;
	
        if(!isset($_GET['id'])){
            fp_err_delete_fail("الطالب");
        }

	fp_db_close();
	
	if(!$result){
            fp_err_delete_fail("الطالب");
        }	
         else {
            fp_err_delete_succes("الطالب")  ;
        }

	
	?>