<?php
	



	// SELSECT ALL
function fp_kafala_get($extra = ''){
	global $fp_handle ;
	$query = sprintf("SELECT * FROM `sponsorship` %s",$extra);

	$qresult = @mysql_query($query);
	
	if(!$qresult) return -1 ; 
	
	$rcount = mysql_num_rows($qresult);
	if($rcount == 0 )  return 0 ;
	
	$kafala = array();
	
	for($i = 0 ; $i < $rcount ; $i++)
		$kafala[@count($kafala)] = @mysql_fetch_object($qresult);
		
	@mysql_free_result($qresult);
	
	return $kafala ; 
	}


	// SELECT BY ID
function fp_kafala_get_by_id($id){
	$oid = (int)$id;
	if($oid == 0) return NULL ;
	
	$kafalas = fp_kafala_get("WHERE `id` = ".$oid);
	if($kafalas == NULL) return NULL ;
	$kafala = $kafalas[0];
	return $kafala ;
	}	


	// INSERT	
function fp_kafala_add( $amount , $saving ,$date ,$sponsor ,$month_no,$sponsored){
	global $fp_handle;
	if( (empty($amount)) || (empty($saving)) || (empty($date)) || (empty($sponsor)) || (empty($month_no)) ) 
	return false;
	$n_amount    = (int)$amount ;
	$n_saving    = (int)$saving;
	$n_date    = @mysql_real_escape_string(strip_tags($date),$fp_handle);
	$n_sponsor = (int)$sponsor;
	$n_month_no = (int)$month_no;
	$n_sponsored = (int)$sponsored;
	$query = ("INSERT INTO `sponsorship` (`id`,`amount` , `saving` , `date` ,`sponsor`, `month_no` ,`sponsored`) VALUE(NULL, $n_amount, $n_saving, '$n_date' ,$n_sponsor , $month_no , $n_sponsored)");
	
        $qresult = mysql_query($query);
	if(!$qresult) return false ;
        fp_kafala_insert_sponsorships();
        return true ;
	}

function fp_kafala_insert_sponsorships(){
        
        $last_id = mysql_insert_id();
        $sponsored_name = fp_kafala_get_table_name($sponsored);
        echo $sponsored_name;
        //if($sponsored_name) echo "OK"; else echo "err";
       
	//$sponsorships_query = ("INSERT INTO `sponsorships` (`sponsorship`,`sponsored`) VALUE($last_id,$sponsored_name)");
        //echo $sponsorships_query;
}
function fp_kafala_get_table_name($no){
    switch ($no){
        case 1 : return; '';
            return $orphans;
            break;
        case 2 : return "`student`";
            break;
        case 3 : return; "`preacher`";
            break;
        case 4 : return "`family`";
        
    }
} 

	
	// DELETE
function fp_kafala_delete($id){
	
	$kid = (int)$id;
	if($kid == 0) return false ;
	$query = sprintf("DELETE FROM `sponsorship` WHERE `id` = %d",$kid);
	$qresult = @mysql_query($query);
	if(!$qresult) return false ;
	
	return true ;
	}

	 	
		
?>