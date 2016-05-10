
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> الهيئة الخيرية الاسلامية للرعاية الاجتماعية</title>
<link href="../../style/pageStyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	direction: rtl;
}
</style>
</head>

<body>
<!-- Title -->
<div id="title">
<table width="90%" border="0" align="center">
  <tr>
    <td><img src="../../images/logo.png" /></td>
    <td><h1>الهيئة الخيرية الاسلامية للرعاية الاجتماعية</h1></td>
    <td><img src="../../images/logo.png" /></td>
  </tr>
  
</table>
</div>

<!-- menu -->
<div class="menu">
	<table align="center">
    <tr>
        <td>
            <div class="container" id="main" role="main" align="center" >
            <ul class="menu" >
                <li><a href="#">الأيتام</a>    
                    <ul class="submenu">
                        <li><a href="../finalOrphan/showOrphans.php">عرض الكل  </a></li>
                        <li><a href="../orphan/showOrphans.php"> بيانات غير معتمدة </a></li>
                        <li>
                            <form method="get" action="orphanInfo.php" >
                                <input dir="rtl" type="text" name="id" size="12"/> <input type="submit" size="5" value="بحث" id="o_serch"/>
                            </form>
                        </li>
                    </ul>
                </li>
                <li><a href="#">المستخدمين</a>    
                    <ul class="submenu">
                        <li><a href="../users/showUsers.php">عرض الكل  </a></li>
                        <li><a href="../users/addUser.php">اضافة مستخدم جديد</a></li>
                        
                    </ul>
                </li>
                <li><a href="#">الكفالات</a>    
                    <ul class="submenu">
                        <li><a href="../kafala/showKafala.php">عرض الكل  </a></li>
                        <li><a href="../kafala/addKafala.php">اضافة كفالة جديدة</a></li>
                        
                    </ul>
                </li>
                <li><a href="#">أخرى</a>    
                    <ul class="submenu">
                        <li><a href="../sponsor/showSponsor.php">عرض جهات الكفالة  </a></li>
                        <li><a href="../sponsor/addSponsor.php">اضافة جهة كفالة</a></li>
                        <li><a href="../states/showState.php">عرض الولايات  </a></li>
                        <li><a href="../states/addState.php">اضافة ولاية جديدة</a></li>
                        
                    </ul>
                </li>
                <li><a href="../../utils/logout.php">تسجيل خروج</a></li>
            </ul>
            
            
            </div>
        </td>
    </tr>
</table>
</div>


<!-- main -->
<div class="main">

<div class="login">
<h2 align="center">بيانات يتيم </h2>
<br />
<?php 
        include('../../utils/db.php');
	include('../../utils/orphanAPI.php');
        include('../../utils/siblingAPI.php');
        include('../../utils/sponsorAPI.php');
        include ('../../utils/error_handler.php');
	if(!isset($_GET['id']) || $_GET['id']=="" || (int)$_GET['id']==0){
            fp_err_show_record("اليتيم");
        }
        global $fp_handle;
	$id = @mysql_real_escape_string(strip_tags($_GET['id']),$fp_handle);
	$orphan = fp_orphan_get_by_phone1($id);
	if(!$orphan) fp_err_show_record("اليتيم");
        
        $sibilings = fp_sibiling_get($orphan->phone1);
        $siblings_male = fp_sibiling_get_for_gender($id," and sex = 1 ");
        $siblings_female = fp_sibiling_get_for_gender($id," and sex = 0 ");
        $male_count = @count($siblings_male);
        $female_count = @count($siblings_female);	
	$scount = @count($sibilings);
        include('../../utils/stateAPI.php');
	$states = fp_states_get();
	$scount = count($states);
        $curr_state  = fp_states_get_by_id($orphan->residence_state);
        
        
?>
<br />
<form action="saveOrphan.php" method="post" >
<table width="85%" border="0" align="center">

  <tr align="center">
    <td width="17%" align="right">
        <?php
        $sponsors = fp_sponsor_get();
        $spcount = @count($sponsors);
        $curr_sponsor = fp_sponsor_get_by_id($orphan->warranty_organization);
        ?>
        <select class="select" tabindex="1" name="sponsor" id="sponsor">
    <?php 
                echo "<option value='$curr_sponsor->id'>$curr_sponsor->name</option>";
                for($i = 0 ; $i < $spcount ; $i++){
		$sponsor = $sponsors[$i] ; ?>
      <option value="<?php echo $sponsor->id?>"><?php echo $sponsor->name?></option>
	<?php } ?>
    </select>
    </td>
    <td width="18%">جهة الكفالة</td>
    <td width="14%" align="right">
        <?php fp_select_status_get_by_id($orphan->state); ?>
    </td>
    <td width="20%" align="center">الحالة</td>
     <td align="right">
         
         <input class="textFiels" name="name3" type="text" disabled tabindex="4" id="id" size="10" maxlength="30"  value="<?php echo $orphan->id?>" /></td>
    
     <td width="20%" align="center">الرقم</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
	<td>&nbsp;</td>
        <td align="right"><input class="textFiels" name="name4" type="text" id="name4" tabindex="5" size="10" maxlength="30" value="<?php echo $orphan->last_4th_name?>" /></td>
    <td align="right"><input class="textFiels" name="name3" type="text" tabindex="4" id="name3" size="10" maxlength="30"  value="<?php echo $orphan->last_name?>" /></td>
    <td align="right"><input class="textFiels" name="name2" type="text" tabindex="3" id="name2" size="10" maxlength="30"  value="<?php echo $orphan->meddle_name?>" /></td>
    <td align="right"><input class="textFiels" name="name1" tabindex="2" type="text" id="name1" size="10" maxlength="30" value="<?php echo $orphan->first_name?>"  /></td>
    <td align="center">اسم اليتيم</td>
  </tr>
  
    <tr>
    <td>&nbsp;</td>
  </tr>
   
    <tr align="right">
	<td>
        </td>   
    <td align="right">
                <td align="center" dir="rtl" >
  	    ذكر<input type="radio" name="s_gender" value="1" id="male_gender" />
            &nbsp;&nbsp;
  	    أنثى<input type="radio" name="s_gender" value="0" id="female_gender" />
  	    
    </td>
        <script type="text/javascript" >
            var gender = <?php echo $orphan->sex?>;
            var male =document.getElementById("male_gender");
            var female =document.getElementById("female_gender");
            if(gender == 1)male.setAttribute("checked","checked");
            else
                if(gender == 0)female.setAttribute("checked","checked");
        </script>    
    </td>
  	<td align="center">الجنس</td>
    
        <td align="right">
            <?php fp_select_date_get_by_id(1990, null, $orphan->birth_date)?>
        
      </td>
    <td align="center">تاريخ الميلاد</td>
  </tr>
  

    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
	<td>&nbsp;</td>
  	<td align="right"><input class="textFiels" name="mname4" type="text" id="mname4" size="10" maxlength="30"  value="<?php echo $orphan->mother_4th_name?>" /></td>
    <td align="right"><input class="textFiels" name="mname3" type="text" id="mname3" size="10" maxlength="30"  value="<?php echo $orphan->mother_last_name?>" /></td>
    <td align="right"><input class="textFiels" name="mname2" type="text" id="mname2" size="10" maxlength="30"  value="<?php echo $orphan->mother_middle_name?>" /></td>
    <td align="right"><input class="textFiels" name="mname1" type="text" id="mname1" size="10" maxlength="30"  value="<?php echo $orphan->mother_first_name?>" /></td>
    <td align="center">اسم والدة اليتيم</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="right">
    <td align="right"></td>
    <td align="right">
      </td>
    <td>
        <?php fp_select_mother_status_get() ?>
    	</td>
  	<td align="right">حالتها الاجتماعية

  	  </td>
    
    <td align="right">
    <?php fp_select_date_get_by_id(1940, 'm', $orphan->mother_Birth_date)?>
    </td>
    <td align="center">تاريخ ميلادها</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
  	<td align="right"><input class="textFiels" name="lw" type="text" id="lw" size="10" maxlength="30" value="<?php echo $orphan->father_work?>" /></td>
    <td>عمله السابق</td>
    <td align="right"><input class="textFiels" name="dr" type="text" id="dr" size="10" maxlength="30" value="<?php echo $orphan->father_dead_cause?>" /></td>
    <td align="right">سبب الوفاة</td>
    <td align="right">
        <?php fp_select_date_get_by_id(1940, 'f', $orphan->father_dead_date)?>
    </td>
    <td align="center">تاريخ وفاة والد اليتيم</td>
  </tr>
    
</table>

<br />

<!--   Aderss   -->


<br />
<h2 align="center">العنوان</h2>
<br />
<table width="85%" border="0" align="center" id=" ">
  <tr align="center">
  	<td width="13%" align="right"><input class="textFiels" name="district" type="text" id="district" size="10" maxlength="30" value="<?php echo $orphan->District?>"/></td>
  	<td width="11%" align="right">الحي</td>
    <td width="22%" align="right"><input class="textFiels" name="city" type="text" id="city" size="20" maxlength="30"  value="<?php echo $orphan->city?>" /></td>
    <td width="13%" align="center">المدينة/القرية</td>

    <td width="13%" align="right">
    <select class="select" name="state" id="state">
    <?php 
    echo "<option value='$curr_state->id'>$curr_state->name</option>";
    for($i = 0 ; $i < $scount ; $i++){
		$state = $states[$i] ; ?>
      <option value="<?php echo $state->id?>"><?php echo $state->name?></option>
	<?php } ?>
    </select>
    
      </td>
    <td width="16%" align="center">الولاية</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
	<td>&nbsp;</td>
  	<td align="right"></td>
    <td align="right"><input class="textFiels" name="hno" type="text" id="hno" size="20" maxlength="30"  value="<?php echo $orphan->house_no?>"/></td>
    <td align="right">رقم المنزل/معلم بارز</td>
    <td align="right"><input class="textFiels" name="section" type="text" id="section" size="10" maxlength="30" value="<?php echo $orphan->section?>" /></td>
    <td align="center">المربع</td>
  </tr>
  
  
    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="right">
	<td>&nbsp;</td>
    <td>&nbsp;</td>
     <td align="right"><input class="textFiels" name="tel2" type="text" id="tel2" size="10" maxlength="30"  value="<?php echo $orphan->phone2?>"/></td>
    <td align="center">جوال 2</td>
    <td align="right"><input class="textFiels" name="tel1" type="text" id="tel1" size="10" maxlength="30" value="<?php echo $orphan->phone1?>" /></td>
    <td align="center">جوال 1</td>
  </tr>
  
  
</table>

<!--   Family   -->


<br />
<h2 align="center"><b><span dir="RTL" lang="AR-SA">عدد افراد الاسرة </span>
</b></h2>
<table width="60%" border="0" align="center" id=" ">
  <tr align="center">
      <td width="29%" align="right"><h2><?php echo $female_count?></h2></td>
  	<td width="11%" align="right">الاناث </td>
        <td width="16%" align="right"><h2><?php echo $male_count?></h2></td>
    <td width="15%" align="center"> الذكور</td>
    <td width="15%" align="right"><h2><?php echo $male_count+$female_count?></h2></td>
    <td width="14%" align="center">  عدد الاخوان  </td>
  </tr>
  
  
    <table class="table" width="70%" border="0" align="center">
   <br />
   <tr class="table_header">
       <td align="center" width="15%">حذف</td>
      <td align="center" width="15%">الحالة</td>
    <td align="center" width="15%">تاريخ الميلاد</td>
    <td align="center" width="25%">الجنس</td>
    <td align="center" width="20%">الإسم</td>
    <td align="center" width="10%">&nbsp;</td>
  </tr>
   <?php 
        $scount = @count($sibilings);
        for($i = 0 ; $i < $scount ; $i++){
		$one_sibling = $sibilings[$i];
  ?>
   <tr class="table_data<?php echo $i%2?>">
       <td onclick="delete_sibling_ajax(<?php echo $one_sibling->id?>)" align="center" >
        <img width="22px"   align="middle" alt="حذف" src="../../images/style images/delete_icon.png"   />
    </td>
    <td align="center"><?php fp_get_state($one_sibling->state)?></td>
    <td align="center"><?php echo $one_sibling->birth_date ?></td>
    <td align="center"><?php if($one_sibling->sex == 1) echo "ذكر"; else echo "أنثى";?></td>
    <td align="center"><?php echo $one_sibling->name ?></td>
    <td align="center"><?php echo $i+1 ?></td>
  </tr>
   <?php } ?>
   <tr class="table_data<?php echo $i%2?>">
       <td></td>
    <td align="center" >
        <select tabindex="0" class="select" name="status" id="s_status">
      <option value="1">مكفول</option>
      <option value="2">قيد التسويق</option>
      <option value="3">متوقف</option>
    </select>
    </td>
    <td align="center">
        <table width="60%" border="0">
      <tr>
        <td><select name="my" class="select" id="sy">
          <?php
	  for($i=1950 ; $i <= date("Y") ; $i++)
  	  echo "<option value='".$i."'>$i</option>'";
	  ?>
        </select></td>
        <td><select class="select" name="mm" id="sm">
          <?php
	  for($i=1 ; $i <= 12 ; $i++)
  	  echo "<option value='".$i."'>$i</option>'";
	  ?>
        </select></td>
        <td><select class="select" name="md" id="sd">
          <?php
	  for($i=1 ; $i <= 31 ; $i++)
  	  echo "<option value='".$i."'>$i</option>'";
	  ?>
        </select></td>
      </tr>
    </table>
    </td>
       <td align="center" dir="rtl" >
  	    ذكر<input type="radio" name="s_gender" value="1" id="sibling_male_gender" />
            &nbsp;&nbsp;
  	    أنثى<input type="radio" name="s_gender" value="0" id="sibling_female_gender" />
  	    
    </td>
    <td align="center"><input class="textFielsS" name="fbname" type="text" id="sibling_name" size="10" maxlength="30" /></td>
    <td></td>
  </tr>
  <tr >
  	
    <td align="center"><input type="button" name="login " id="login " onclick="get_s_str()" value="إضافة فرد" /></td>
   </tr>

</table>


</table>

<script type="text/javascript">
function get_s_str(){
       var s_str = "" ;
      var sname = document.getElementById('sibling_name');
      s_str+='sibling_name='+sname.value+'&';
      var s_bd = document.getElementById('sy').value+"-"+document.getElementById('sm').value+"-"+document.getElementById('sd').value;
      s_str+='s_bd='+s_bd+'&';
      var s_status = document.getElementById("s_status");
      s_str+='sibling_status='+s_status.value+'&';
      var s_gender_nodes = document.getElementsByName("s_gender");

      if(document.getElementById("sibling_male_gender").checked == true) s_gender_value = "1" ;
        else s_gender_value = "0" ;
      s_str+='s_gender='+s_gender_value+'&';
      s_str+='o_id='+<?php echo $orphan->phone1 ?>;
      sibling_ajax(s_str);
      }
  function sibling_ajax(s_str)
{	
        var ajax;
	var data ;
	filename = "saveSibiling.php";
	post = false ;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();//IE7+, Firefox, Chrome, Opera, Safari
    } 
    else if (ActiveXObject("Microsoft.XMLHTTP"))
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");//IE6/5
    }
    else if (ActiveXObject("Msxml2.XMLHTTP"))
    {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");//other
    }
    else
    {
        alert("Error: Your browser does not support AJAX.");
        return false;
    }
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4&&ajax.status==200)
        {
            alert(ajax.responseText);
            window.location.reload();
            //window.location.href = "orphanInfo.php?id="+<?php //echo $id?>
			//document.getElementById(elementID).innerHTML=ajax.responseText;
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename+"?"+s_str,true);
        s_str = '';
        ajax.send(null);
		
    }
    else 
    {
        ajax.open("POST",filename,true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(s_str);
        s_str = '';
    }
    return ajax;
	
}
function delete_sibling_ajax(id)
{	
        var ajax;
	var data ;
	filename = "deleteSibiling.php";
	post = false ;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();//IE7+, Firefox, Chrome, Opera, Safari
    } 
    else if (ActiveXObject("Microsoft.XMLHTTP"))
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");//IE6/5
    }
    else if (ActiveXObject("Msxml2.XMLHTTP"))
    {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");//other
    }
    else
    {
        alert("Error: Your browser does not support AJAX.");
        return false;
    }
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4&&ajax.status==200)
        {
            alert(ajax.responseText);
            window.location.reload();
            
            //window.location.href = "orphanInfo.php?id="+<?php //echo $id?>
			//document.getElementById(elementID).innerHTML=ajax.responseText;
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename+"?id="+id,true);
        s_str = '';
        ajax.send(null);
		
    }
    else 
    {
        ajax.open("POST",filename,true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(s_str);
        s_str = '';
    }
    return ajax;
	
}
</script>
<!--   Learning   -->


<br />
<h2 align="center" class="auto-style1">التعليم</h2>
<br />
<table width="85%" border="0" align="center" id=" ">
  <tr align="center">
  	<td width="11%"></td>
  	<td width="9%" align="right">&nbsp;</td>
  	<td width="41%" align="right"><input name="teachingr" type="text" readonly="readonly"  class="textFiels" id="teachingr" value="<?php echo $orphan->nonstuding_cause?>" size="10" maxlength="30" />
  	  </td>
	<td width="14%" align="center">السبب</td>
        <td width="14%" align="center">
        <select class="select" name="learning" id="learning">
      <option  value="1">يدرس</option>
      <option  value="0">لا يدرس</option>
    </select>
    </td>
        <td width="11%">الحالة الدراسية</td>
        
        
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
  	<td></td>
    <td></td>
  	
	<td width="41%" align="right"><input class="textFiels" name="illt" type="text" id="school" size="30" maxlength="30" value="<?php echo $orphan->school_name?>"  /></td>
        <td width="14%" align="center">اسم المدرسة</td>
        <td>&nbsp;</td>
  	<td style="height: 29px">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  </table>
  
  <table width="85%" border="0" align="center" id=" ">
    <tr align="center">
  	<td width="26%" align="right">جزء <input class="textFiels" name="class" type="text" id="quran" size="10" maxlength="10" value="<?php echo $orphan->quran_parts?>" /></td></td>
  	<td width="23%" align="right">مستوى حفظ القرآن</td>
  	<td width="13%" align="right"><input class="textFiels" name="class" type="text" id="class" size="10" maxlength="30" value="<?php echo $orphan->year?>" /></td>
	<td width="14%" align="center">الصف</td>
        <td width="13%" align="center"><input class="textFiels" name="level" type="text" id="level" size="10" maxlength="30" value="<?php echo $orphan->level?>"/></td>
        <td width="11%">المرحلة</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
</table>


<!-- health -->

<br />
<h2 align="center">الحالة الصحية</h2>
<br />

  <table width="80%" border="0" align="center" id=" ">

  <tr align="center">
  	<td width="0%"></td>
  	<td width="0%" align="right"></td>
  	<td width="35%" align="left"><input class="textFiels" name="illt" type="text" id="illt" size="30" maxlength="30" value="<?php echo $orphan->ill_cause?>"  /></td>
	<td width="20%" align="center" id="illLable">نوع المرض</td>
        <td width="20%" align="center" id="ill_container">
        
        </td>
        <td width="2%"> 
        <select class="select" name="illnessGood1" id="illness">
            <?php
            if($orphan->health_state == 1){
            echo '<option id="goodill"  value="1">جيدة</option>
            <option id="badill"   value="0">سيئة</option>';
            }
            else {
            echo '<option id="goodill"  value="1">جيدة</option>
            <option id="badill"   value="0">سيئة</option>';
            
            }
            ?>
        </select>
        </td>
        <td width="18%">الحالة الصحية  </td>

  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
</table>
<br />
<!-- Employee -->
<table width="50%" border="0" align="center" id=" ">
  <tr>
      <td>&nbsp;</td>
      
      <td align="center"><input class="textFiels" disabled name="level" type="text" id="user_d" size="10" maxlength="30" value="<?php echo $orphan->data_entery_date?>"/></td>
    <td align="center">التاريخ</td>
    <td align="center"><input class="textFiels" disabled name="level" type="text" id="user" size="10" maxlength="30" value="<?php echo $orphan->data_entery_name?>"/></td>
    <td align="center">مدخل البيانات   </td>
  </tr>
   
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"></td>    
    <td align="center"></td> 
    
    
   <tr>
        <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><button class="add_bt" name="add" type="button" onclick="del_ajax(<?php echo $orphan->phone1?>)" >الغاء البيانات<img align="right" src="../../images/style images/delete_icon.png" style="padding-left:5px" />  </button>
    <td>&nbsp;</td>
    <td align="center"><button class="add_bt" name="add" type="button" onclick="i3_get_str()" >اعتماد البيانات<img align="right" src="../../images/style images/update_icon.png" style="padding-left:5px" />  </button></td>
    <td>&nbsp;</td>
  </tr>

</table>


</div>
<div  style="margin: 0 auto; text-align: center ; width: 60%;" id="reponse">
</div>
<script type="text/javascript" >
        
function IsEmpty(){ 
        var text = document.getElementsByTagName('input');
        var empty_checker = 0 ;
        for(var i = 0 ; i< text.length ; i++){
           if(text[i].value == ''){
               text.item(i).style.color = "#ff0000" ;
               text.item(i).setAttribute("placeholder","هذا الحقل فارغ");
               empty_checker++;
           }
        }
        if(empty_checker > 0 )alert("هناك حقول يجب تعبئتها");
        else i3_get_str();
}

function i3_get_str(){
        
	var text = document.getElementsByTagName('input');
        var select = document.getElementsByTagName('select');
        var str = '';
        for(var i = 0 ; i< text.length ; i++){
           str += text[i].getAttribute('id')+'='+text[i].value+'&';
        }
        for(var i = 0 ; i< select.length ; i++){
           str += select[i].getAttribute('id')+'='+select[i].value+'&';
        }
        gender_value = 1 ;
        if(document.getElementById("male_gender").checked == true) gender_value = "1" ;
        else
            if(document.getElementById("female_gender").checked == true) gender_value = "0" ;
        else gender_value = "1" ;
        str+="gender="+gender_value;
        alert(str);
        //window.location.href = "updateOrphan.php?"+str;
        ajax(str);
}
function ajax(str)
{		
    var ajax;
	var data ;
	//var d_node = document.getElementById(elementID);
	elementID = "div";
	filename = "finalOrphan.php";
	post = false ;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();//IE7+, Firefox, Chrome, Opera, Safari
    }
    else if (ActiveXObject("Microsoft.XMLHTTP"))
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");//IE6/5
    }
    else if (ActiveXObject("Msxml2.XMLHTTP"))
    {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");//other
    }
    else
    {
        alert("Error: Your browser does not support AJAX.");
        return false;
    }
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4&&ajax.status==200)
        {
            document.getElementById("reponse").innerHTML=ajax.responseText;
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename+"?"+str,true);
        ajax.send(null);
		
    }
    else
    {
        ajax.open("POST",filename,true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(str);
    }
    return ajax;
	
}

function add_sibling (){
    var s_final_str = "";
    if(s_str_array.length != 0)
    for(var i =0 ; i < s_str_array.length ; i++){
        s_final_str+=s_str_array[i];
    }
     alert(document.getElementById("success_notice").getAttribute("name"));
}	

//*********************  DELETE
function del_ajax(ID)
{		
        var ajax;
	var data ;
        var str = "?id="+ID;
	alert(str);
        //var d_node = document.getElementById(elementID);
	elementID = "div";
	filename = "deleteOrphan.php";
	post = false ;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();//IE7+, Firefox, Chrome, Opera, Safari
    }
    else if (ActiveXObject("Microsoft.XMLHTTP"))
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");//IE6/5
    }
    else if (ActiveXObject("Msxml2.XMLHTTP"))
    {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");//other
    }
    else
    {
        alert("Error: Your browser does not support AJAX.");
        return false;
    }
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4&&ajax.status==200)
        {
            document.getElementById("reponse").innerHTML=ajax.responseText;
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename+str,true);
        ajax.send(null);
		
    }
    else
    {
        ajax.open("POST",filename,true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(str);
    }
    return ajax;
	
}

	
</script>
<div id="footer">
<p>جميع الحقوق محفوظة 2016 &copy;</div>
</div>
</body>
</html>
