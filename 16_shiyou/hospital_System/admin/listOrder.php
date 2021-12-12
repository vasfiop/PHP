<?php 
require_once '../include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

@$paystatue = $_REQUEST['paystatue'];
if ($paystatue && $paystatue != "所有订单") {
    $sql="select * from booksystem.order where paystatue='{$paystatue}'";    
} else {
    $sql="select * from booksystem.order";
}

$totalRows=getResultNum($sql, $link);//结果集个数
$pageSize=5;//每页显示个数
$totalPage=ceil($totalRows/$pageSize);//总页数
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if ($page>$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;//取值初始位置
if ($paystatue && $paystatue != "所有订单") {
    $sql="select * from booksystem.order where paystatue='{$paystatue}' limit $offset,$pageSize";
} else {
    $sql="select * from booksystem.order limit $offset,$pageSize";
}

@$rows=fetchAll($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="../styles/backstage.css">
</head>
<body>
<div class="">
    <!--右侧内容-->
    <div class="details">
        <div class="details_operation clearfix">
            <div class="">
                <select name="disId" id="searchSelect">	
                <?php 
                $options=['所有订单','未缴费','已缴费','已受理'];
                foreach ($options as $opt){
                    if ($opt==$paystatue){
                ?>	        
		                <option value="<?php echo $opt;?>" selected><?php echo $opt;?></option>
		      <?php }else{ ?>
		                <option value="<?php echo $opt;?>"><?php echo $opt;?></option>
		      <?php      }
                }?>
		        </select>
                <input type="button" value="搜索" class="add" onclick="Getvaule()";>
            </div>            
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>订单编号</th>
                    <th>医师</th>
                    <th>用户</th>
                    <th>专科名称</th>
                    <th>就诊日期</th>
                    <th>预约费用</th>
                    <th>状态</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($rows){
                    foreach ($rows as $row){                                              
                ?>
                <tr>
                    <!--这里的id和for里面的c1 需要循环出来-->
                    <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                    <td><?php echo $row['docname'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['docDepartment'];?></td>
                    <td><?php echo $row['bookdate']." ".$row['timeFrame'];?></td>
                    <td><?php echo $row['cost'];?></td>
                    <td><?php echo $row['paystatue'];?></td>             
                </tr>
                <?php 
                    }
                }else {
                      echo "<tr><td colspan='8'>没有数据!</td></tr>";
                }
                mysqli_close($link);
                if (count($rows)>$pageSize)
                ?>
                <tr>
                	<td colspan='8'><?php 
                	if ($paystatue) {
                	    echo showPage($page,$totalPage,$where="paystatue={$paystatue}",$step="&nbsp");
                	} else {
                	    echo showPage($page,$totalPage,$where=null,$step="&nbsp");
                	}               	
                	?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
function Getvaule(){
	var url = window.location.href;
	var index = url.indexOf("?", 0);
	if(index>0) {
		url = url.substring(0, index);
	}
	var obj = document.getElementById('searchSelect');
	var val=obj.options[obj.options.selectedIndex].value;

	window.location=url+"?paystatue="+val+"&page=1";
}
function addAdmin(){
	window.location="addAdmin.php";
}
function editAdmin(id){
	window.location="editAdmin.php?id="+id;
}
function delAdmin(id){
	if(confirm("确定要删除吗!")){
	     window.location="doAdminAction.php?act=delAdmin&&id="+id;
	}
}
</script>
</html>
