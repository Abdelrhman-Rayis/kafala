<?php
	include('../../utils/db.php');
	include('../../utils/usersAPI.php');
        include('../../utils/error_handler.php');
	
        $start=0;
    $limit=20;
    $total_results = fp_user_get_num_rows();
        $total=ceil($total_results/$limit);
    if(!isset($_GET['page']) || $_GET['page'] == '' || (int)$_GET['page'] == 0 || $_GET['page']>$total)
    {
    $page=1;
    }
    else{
    $page=$_GET['page'];
    $start=($page-1)*$limit;
    }
        $users = fp_users_get("LIMIT $start, $limit");
	fp_db_close();
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الهيئة الخيرية الاسلامية للرعاية الاجتماعية</title>
<link href="../../style/pageStyle.css" rel="stylesheet" type="text/css" />
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
<h1 align="center" class="adress"> بيانات المستخدمين </h1>
<br />

<?php
    if($users == 0 ||$users == -1 ) {
            fp_err_show_records("مستخدمين");
        }
        
	$ucount = @count($users);
?>

<table width="90%" align="center" class="table">

    <tr align="center" class="table_header">
 <td width="5%">حذف </td>
 
 <td width="5%">عرض </td>
    <td width="30%">نوع المستخدم</td>
    <td width="15%">اسم المستخدم</td>
    <td width="40%">الاسم كامل</td>
    <td width="5%">الرقم</td>
  </tr>
  <?php 
  	for($i = 0 ; $i < $ucount ; $i++){
		$user = $users[$i];
  ?>

    <tr align="center" class="table_data<?php echo $i%2?>"  >
        <td onclick="ajax(<?php echo $user->id?>)" >
        <img width="22px"   align="middle" alt="حذف" src="../../images/style images/delete_icon.png" style="padding-left:5px"  />
    </td>
        <td  onclick="window.location.href='user.php?id='+<?php echo $user->id?>"><img alt="عرض" align="middle" width="22px"  src="../../images/style images/show_icon.png" style="padding-left:5px" /></td>
    <td><?php
  fp_get_user_type($user->type);
	  ?></td>
    <td><?php echo $user->username?></td>
    <td><?php echo $user->name?></td>
    <td><?php echo $user->id?></td>
    
  </tr>
  <?php } ?>
    
  </table>

<br />
<div class="pagination">
    <ul class='page'>
  <?php
    
if($page>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?page=".($page-1)."' class='button'>السابق</a>";
}

//show all the page link with page number. When click on these numbers go to particular page.
        for($i=1;$i<=$total;$i++)
        {
            if($i==$page) { echo "<li class='current'>".$i."</li>"; }
             
            else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }
        }
   if($page!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?page=".($page+1)."' class='button'>التالي</a>";
} 

?>
</ul>
</div> 
<div id="footer">
  <p>جميع الحقوق محفوظة 2016 &copy;</p>
</div>
</div>
<script type="text/javascript">
function printt(){
    window.location.href = "print_users.php"
}
function show_confirm(id){
    var confirm = "<div  id='show_confirm' class='confirm' ><img src='../../images/style images/success.png'alt='yes' class='yes' onclick='ajax(id)'/><img src='../../images/style images/error.png' alt='no' class='yes' onclick'' /></div>";
    return confirm;
}
	//var del = document.getElementById("delete");
	
	//ajax("div","deleteuser.php","?id=7",false);
	
	function ajax(ID)
{
    var ajax;
	//var d_node = document.getElementById(elementID);
	elementID = "sucsses_notice";
	filename = "deleteuser.php";
	str = "?id="+ID;
	post = false ;
	conf = confirm("هل تريد مسح <?php echo $user->name?>");
	if(conf){
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
			window.location.href = "showUsers.php";
			//document.getElementById(elementID).innerHTML=ajax.responseText;
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
}

function printf()
{
    var ajax;
	//var d_node = document.getElementById(elementID);
	elementID = "sucsses_notice";
	filename = "print_users.php";
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
            printt(ajax.responseText);
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename,true);
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
</body>
</html>
