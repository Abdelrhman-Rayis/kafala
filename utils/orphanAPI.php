<?php
	
	// SELSECT ALL
function fp_orphan_get($extra = ''){
	
	global $fp_handle ;
	$query = sprintf("SELECT * FROM `orphan` %s",$extra);
	$qresult = @mysql_query($query);
	
	if(!$qresult) return NULL ; 
	
	$rcount = mysql_num_rows($qresult);
	if($rcount == 0 )  return NULL ;
	
	$orphans = array();
	
	for($i = 0 ; $i < $rcount ; $i++)
		$orphans[@count($orphans)] = @mysql_fetch_object($qresult);
		
	@mysql_free_result($qresult);
	
	return $orphans ; 
	}
	
	// SELECT BY ID
function fp_orphan_get_by_id($id){
	$oid = (int)$id;
	if($oid == 0) return NULL ;
	
	$orphans = fp_orphan_get("WHERE `id` = ".$oid);
	if($orphans == NULL) return NULL ;
	$orphan = $orphans[0];
	return $orphan ;
	}
	// INSERT	
function fp_orphan_add($state , $warranty_organization , $first_name , $meddle_name , $last_name , $last_4th_name , $birth_date , $sex , $mother_first_name , $mother_middle_name , $mother_last_name , $mother_4th_name , $mother_Birth_date , $mother_state ,$father_dead_date , $father_dead_cause , $father_work , $residence_state , $city , $District , $section,$house_no , $phone1 , $phone2 , $studing_state ,$nonstuding_cause, $school_name , $level , $year , $quran_parts , $health_state , $ill_cause , $data_entery_name , $data_entery_date ){
	global $fp_handle;
	
	$n_state = @mysql_real_escape_string(strip_tags($state),$fp_handle); 
	$n_warranty_organization = (int)$warranty_organization;
	$n_first_name  = @mysql_real_escape_string(strip_tags($first_name),$fp_handle);
	$n_meddle_name  = @mysql_real_escape_string(strip_tags($meddle_name),$fp_handle);
	$n_last_name  = @mysql_real_escape_string(strip_tags($last_name),$fp_handle);
	$n_last_4th_name  = @mysql_real_escape_string(strip_tags($last_4th_name),$fp_handle);
	$n_birth_date  = @mysql_real_escape_string(strip_tags($birth_date),$fp_handle);
	$n_sex = @mysql_real_escape_string(strip_tags($sex),$fp_handle);
	$n_mother_first_name  = @mysql_real_escape_string(strip_tags($mother_first_name),$fp_handle);
	$n_mother_middle_name  = @mysql_real_escape_string(strip_tags($mother_middle_name),$fp_handle);
	$n_mother_last_name = @mysql_real_escape_string(strip_tags($mother_last_name),$fp_handle);
	$n_mother_4th_name = @mysql_real_escape_string(strip_tags($mother_4th_name),$fp_handle);
	$n_mother_Birth_date = @mysql_real_escape_string(strip_tags($mother_Birth_date),$fp_handle);
	$n_mother_state = @mysql_real_escape_string(strip_tags($mother_state),$fp_handle);
	$n_father_dead_date = @mysql_real_escape_string(strip_tags($father_dead_date),$fp_handle);
	$n_father_dead_cause = @mysql_real_escape_string(strip_tags($father_dead_cause),$fp_handle);
    $n_father_work = @mysql_real_escape_string(strip_tags($father_work),$fp_handle);
	$n_residence_state = @mysql_real_escape_string(strip_tags($residence_state),$fp_handle);
	$n_city = @mysql_real_escape_string(strip_tags($city),$fp_handle);
	$n_District = @mysql_real_escape_string(strip_tags($District),$fp_handle);
	$n_section  = (int)$section;
	$n_house_no  = (int)$house_no;
	$n_phone1  = (int)$phone1;
	$n_phone2  = (int)$phone2;
	$n_studing_state =@mysql_real_escape_string(strip_tags($studing_state),$fp_handle);
	$n_nonstuding_cause =@mysql_real_escape_string(strip_tags($nonstuding_cause),$fp_handle);
	$n_school_name=@mysql_real_escape_string(strip_tags($school_name),$fp_handle);
	$n_level  = (int)$level;
	$n_year  = (int)$year;
	$n_quran_parts  = (int)$quran_parts;
	$n_health_state =@mysql_real_escape_string(strip_tags($health_state),$fp_handle);
	$n_ill_cause =@mysql_real_escape_string(strip_tags($ill_cause),$fp_handle);
	$n_data_entery_name =@mysql_real_escape_string(strip_tags($data_entery_name),$fp_handle);
	$n_data_entery_date=@mysql_real_escape_string(strip_tags($data_entery_date),$fp_handle);
	
	$query = ("INSERT INTO `orphan` (id, `state`	 , `warranty_organization` , `first_name` , `meddle_name` , `last_name` , `last_4th_name` , `birth_date` , `sex` , `mother_first_name` , `mother_middle_name` , `mother_last_name` , `mother_4th_name` , `mother_Birth_date` , `mother_state` ,`father_dead_date` , `father_dead_cause` , `father_work` , `residence_state` , `city`, `District` , `section`,  `house_no` , `phone1` , `phone2` , `sibling` `studing_state` ,`nonstuding_cause`, `school_name` , `level` , `year` , `quran_parts` , `health_state` , `ill_cause` , `data_entery_name` , `data_entery_date` )
				VALUE(NULL , '$n_state' , '$n_warranty_organization' , '$n_first_name' , '$n_meddle_name' , '$n_last_name' , '$n_last_4th_name' , '$n_birth_date' , '$n_sex' , '$n_mother_first_name' , '$n_mother_middle_name' , '$n_mother_last_name' , '$n_mother_4th_name' , '$n_mother_Birth_date' , '$n_mother_state' ,'$n_father_dead_date' , '$n_father_dead_cause' , '$n_father_work' , '$n_residence_state' , '$n_city' , '$n_District' , '$n_section','$n_house_no' , '$n_phone1' , '$n_phone2' ,1, '$n_studing_state' ,'$n_nonstuding_cause', '$n_school_name' , '$n_level' , '$n_year' , '$n_quran_parts' , '$n_health_state' , '$n_ill_cause' , '$n_data_entery_name' , '$n_data_entery_date' )");
	
	echo $query;
	$qresult = mysql_query($query);
	if(!$qresult) return false ;
	
	return true ;
	}
	
	
	// UPDATE
function fp_orphan_update($id ,  $state = Null , $warranty_organization = Null , $first_name = Null , $meddle_name = Null  , $last_name = Null  , $last_4th_name = Null , $birth_date = Null , $sex = Null  , $mother_first_name = Null , $mother_middle_name = Null  , $mother_last_name = Null , $mother_4th_name = Null , $mother_Birth_date = Null , $mother_state = Null ,$father_dead_date = Null  , $father_dead_cause = Null  , $father_work = Null  , $residence_state = Null , $city = Null , $District = Null  , $section = Null ,$house_no = Null  , $phone1 = Null , $phone2 = Null  , $sisters_no = Null , $brothers_no = Null , $sibiling= Null  , $studing_state= Null  ,$nonstuding_cause = Null , $school_name = Null , $level= Null  , $year = Null , $quran_parts= Null  , $health_state = Null , $ill_cause = Null , $data_entery_name = Null , $data_entery_date= Null  , $head_dep_name = Null , $head_dep_date= Null  ){
	global $fp_handle ;
	$uid = (int)$id;
	if($uid == 0) return false ;
	$orphan = fp_orphan_get_by_id($uid);
	
	if(!$orphan)  return false ;
	
	
	$fields = array();
	$query = "UPDATE `orphan` SET ";
	if(!empty($state)){
		$n_state    = @mysql_real_escape_string(strip_tags($state),$fp_handle);
		$fields[@count($fields)] = " `state` = '$n_state' ";
		}
	if(!empty($warranty_organization)){
		$n_warranty_organization    = @mysql_real_escape_string(strip_tags($warranty_organization),$fp_handle);
		$fields[@count($fields)] = " `warranty_organization` = '$n_warranty_organization' ";
		}
	if(!empty($first_name)){
		$n_first_name   = mysql_real_escape_string(strip_tags($first_name),$fp_handle);
		$fields[@count($fields)] = " `first_name` = '$n_first_name' ";
		}	
	if(!empty($meddle_name)){
		$n_meddle_name   = mysql_real_escape_string(strip_tags($meddle_name),$fp_handle);
		$fields[@count($fields)] = " `meddle_name` = '$n_meddle_name' ";
		}
	
	if(!empty($last_name)){
		$n_last_name  = mysql_real_escape_string(strip_tags($last_name),$fp_handle);
		$fields[@count($fields)] = " `last_name` = '$n_last_name' ";
		}
	if(!empty($last_4th_name)){
		$n_last_4th_name  = mysql_real_escape_string(strip_tags($last_4th_name),$fp_handle);
		$fields[@count($fields)] = " `last_4th_name` = '$n_last_4th_name' ";
		}
	if(!empty($birth_date)){
		$n_birth_date  = mysql_real_escape_string(strip_tags($birth_date),$fp_handle);
		$fields[@count($fields)] = " `birth_date` = '$n_birth_date' ";
		}
	if(!empty($sex)){
		$n_sex   = mysql_real_escape_string(strip_tags($sex),$fp_handle);
		$fields[@count($fields)] = " `sex` = '$n_sex' ";
		}
	if(!empty($mother_first_name)){
		$n_mother_first_name   = mysql_real_escape_string(strip_tags($mother_first_name),$fp_handle);
		$fields[@count($fields)] = " `mother_first_name` = '$n_mother_first_name' ";
		}
	if(!empty($mother_middle_name)){
		$n_mother_middle_name   = mysql_real_escape_string(strip_tags($mother_middle_name),$fp_handle);
		$fields[@count($fields)] = " `mother_middle_name` = '$n_mother_middle_name' ";
		}
	if(!empty($mother_last_name)){
		$n_mother_last_name   = mysql_real_escape_string(strip_tags($mother_last_name),$fp_handle);
		$fields[@count($fields)] = " `mother_last_name` = '$n_mother_last_name' ";
		}
	if(!empty($mother_4th_name)){
		$n_mother_4th_name   = mysql_real_escape_string(strip_tags($mother_4th_name),$fp_handle);
		$fields[@count($fields)] = " `mother_4th_name` = '$n_mother_4th_name' ";
		}
	if(!empty($mother_Birth_date)){
		$n_mother_Birth_date   = mysql_real_escape_string(strip_tags($mother_Birth_date),$fp_handle);
		$fields[@count($fields)] = " `mother_Birth_date` = '$n_mother_Birth_date' ";
		}
	if(!empty($mother_state)){
		$n_mother_state  = mysql_real_escape_string(strip_tags($mother_state),$fp_handle);
		$fields[@count($fields)] = " `mother_state` = '$n_mother_state' ";
		}
	if(!empty($father_dead_date)){
		$n_father_dead_date   = mysql_real_escape_string(strip_tags($father_dead_date),$fp_handle);
		$fields[@count($fields)] = " `father_dead_date` = '$n_father_dead_date' ";
		}
	if(!empty($father_dead_cause)){
		$n_father_dead_cause   = mysql_real_escape_string(strip_tags($father_dead_cause),$fp_handle);
		$fields[@count($fields)] = " `father_dead_cause` = '$n_father_dead_cause' ";
		}
	if(!empty($father_work)){
		$n_father_work   = mysql_real_escape_string(strip_tags($father_work),$fp_handle);
		$fields[@count($fields)] = " `father_work` = '$n_father_work' ";
		}
	if(!empty($residence_state)){
		$n_residence_state   = mysql_real_escape_string(strip_tags($residence_state),$fp_handle);
		$fields[@count($fields)] = " `residence_state` = '$n_residence_state' ";
		}
	if(!empty($city)){
		$n_city  = mysql_real_escape_string(strip_tags($city),$fp_handle);
		$fields[@count($fields)] = " `city` = '$n_city' ";
		}
	if(!empty($District)){
		$n_District   = mysql_real_escape_string(strip_tags($District),$fp_handle);
		$fields[@count($fields)] = " `District` = '$n_District' ";
		}
	if(!empty($section)){
		$n_section   = (int)$section ;
		$fields[@count($fields)] = " `section` = '$n_section' ";
		}
	if(!empty($house_no)){
		$n_house_no   = (int)$house_no ;
		$fields[@count($fields)] = " `house_no` = '$n_house_no' ";
		}
	if(!empty($phone1)){
		$n_phone1   = (int)$phone1 ;
		$fields[@count($fields)] = " `phone1` = '$n_phone1' ";
		}
	if(!empty($phone2)){
		$n_phone2   = (int)$phone2 ;
		$fields[@count($fields)] = " `phone2` = '$n_phone2' ";
		}
	if(!empty($sisters_no)){
		$n_sisters_no   = (int)$sisters_no ;
		$fields[@count($fields)] = " `sisters_no` = '$n_sisters_no' ";
		}
	if(!empty($brothers_no)){
		$n_brothers_no   = (int)$brothers_no ;
		$fields[@count($fields)] = " `brothers_no` = '$n_brothers_no' ";
		}
	if(!empty($sibiling)){
		$n_sibiling   =(int)$sibiling ;
		$fields[@count($fields)] = " `sibiling` = '$n_sibiling' ";
		}
	if(!empty($studing_state)){
		$n_studing_state   = mysql_real_escape_string(strip_tags($studing_state),$fp_handle);
		$fields[@count($fields)] = " `studing_state` = '$n_studing_state' ";
		}
	if(!empty($nonstuding_cause)){
		$n_nonstuding_cause   = mysql_real_escape_string(strip_tags($nonstuding_cause),$fp_handle);
		$fields[@count($fields)] = " `nonstuding_cause` = '$n_nonstuding_cause' ";
		}
	if(!empty($school_name)){
		$n_school_name   = mysql_real_escape_string(strip_tags($school_name),$fp_handle);
		$fields[@count($fields)] = " `school_name` = '$n_school_name' ";
		}
	if(!empty($level)){
		$n_level   = (int)$level;
		$fields[@count($fields)] = " `level` = '$n_level' ";
		}
	if(!empty($year)){
		$n_year  = (int)$year;
		$fields[@count($fields)] = " `year` = '$n_year' ";
		}
	if(!empty($quran_parts)){
		$n_quran_parts   = (int)$quran_parts ;
		$fields[@count($fields)] = " `quran_parts` = '$n_quran_parts' ";
		}
	if(!empty($health_state)){
		$n_health_state   = mysql_real_escape_string(strip_tags($health_state),$fp_handle);
		$fields[@count($fields)] = " `health_state` = '$n_health_state' ";
		}
	if(!empty($ill_cause)){
		$n_ill_cause  = mysql_real_escape_string(strip_tags($ill_cause),$fp_handle);
		$fields[@count($fields)] = " `ill_cause` = '$n_ill_cause' ";
		}
	if(!empty($data_entery_name)){
		$n_data_entery_name   = mysql_real_escape_string(strip_tags($data_entery_name),$fp_handle);
		$fields[@count($fields)] = " `data_entery_name` = '$n_data_entery_name' ";
		}
	if(!empty($data_entery_date)){
		$n_data_entery_date   = mysql_real_escape_string(strip_tags($data_entery_date),$fp_handle);
		$fields[@count($fields)] = " `data_entery_date` = '$n_data_entery_date' ";
		}
	if(!empty($head_dep_name)){
		$n_head_dep_name   = mysql_real_escape_string(strip_tags($head_dep_name),$fp_handle);
		$fields[@count($fields)] = " `head_dep_name` = '$n_head_dep_name' ";
		}
	if(!empty($head_dep_date)){
		$n_head_dep_date   = mysql_real_escape_string(strip_tags($head_dep_date),$fp_handle);
		$fields[@count($fields)] = " `head_dep_date` = '$n_head_dep_date' ";
		}
	$fields[@count($fields)] = " `id` = '$orphan->id' ";
	
	$fcount = @count($fields);
	
	if($fcount == 1){
		$query .= $fields[0].' WHERE `id` = '.$uid;
		$qresult = @mysql_query($query);
		if(!$qresult) return false ;
		else return true ;
		}
	for($i = 0 ; $i < $fcount ; $i++){
		$query .= $fields[$i];
		if($i != ($fcount - 1 ))
		$query .= ' , ';
		}
	$query .= ' WHERE `id` = '.$uid; echo $query;
	$qresult = @mysql_query($query);
		if(!$qresult) return false ;
		else return true ;
	
	}
	
	// DELETE
function fp_orphan_delete($id){
	$uid = (int)$id;
	if($uid == 0) return false ;
	$query = sprintf("DELETE FROM `orphan` WHERE `id` = %d",$uid);
	$qresult = @mysql_query($query);
	if(!$qresult) return false ;
	
	return true ;
	}
	//-------------------------------------sibilingAPI----------------------------------------------
	
	
		fp_sibiling_delete(1);
		
				
		// INSERT	
	function fp_sibiling_add($name , $sex , $birth_date , $state){
		global $fp_handle;
	
		$n_name    = @mysql_real_escape_string(strip_tags($name),$fp_handle);
		$n_sex    = @mysql_real_escape_string(strip_tags($sex),$fp_handle);
		$n_birth_date  = @mysql_real_escape_string(strip_tags($birth_date),$fp_handle);
		$n_state = @mysql_real_escape_string(strip_tags($state),$fp_handle);
		
		$query = ("INSERT INTO `sibiling` VALUE(NULL,'$n_name','$n_sex','$n_birth_date','$n_state')");
		echo $query ;
		
		$qresult = mysql_query($query);
		if(!$qresult) return false ;
		
		return true ;
		}	
	
	
	
		// show all
	function fp_sibiling_get($extra = ''){
		global $fp_handle ;
		$query = sprintf("SELECT * FROM `sibiling` %s",$extra);
	
		$qresult = @mysql_query($query);
		
		if(!$qresult) return NULL ; 
		
		$rcount = mysql_num_rows($qresult);
		if($rcount == 0 )  return NULL ;
		
		$sibiling = array();
		
		for($i = 0 ; $i < $rcount ; $i++)
			$sibiling[@count($sibiling)] = @mysql_fetch_object($qresult);
			
		@mysql_free_result($qresult);
		
		return $sibiling ; 
		}
			
		// DELETE
	function fp_sibiling_delete($id){
		$uid = (int)$id;
		if($uid == 0) return false ;
		$query = sprintf("DELETE FROM `sibiling` WHERE `id` = %d",$uid);
		$qresult = @mysql_query($query);
		if(!$qresult) return false ;
		
		return true ;
		}		
?>