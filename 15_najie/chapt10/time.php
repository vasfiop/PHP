<?php
//<-------����ͨ��GET�����ύ�ı���;��ʼ-------->
if($HTTP_GET_VARS[y]=="")
{
    $HTTP_GET_VARS[y]=date("Y");
}
if($HTTP_GET_VARS[m]=="")
{
    $HTTP_GET_VARS[m]=date("n");
}
$m=$HTTP_GET_VARS[m];
if ($m<10 and strlen($m)==1){
	$m="0".$m;
}
$y=$HTTP_GET_VARS[y];
//<-------����ͨ��GET�����ύ�ı���;����-------->
if($y<2000)
{
    echo "����!";
    echo "<BR>";
    echo "<a href=$HTTP_SERVER_VARS[PHP_SELF]>Back</a>";
    exit();
}
?>
<table width="200" border="1" cellspacing="0" cellpadding="0" bordercolor="#E7E7E7" style="font-size:12px;" align="center">
<tr align="center"><td height="10" colspan="2">
<?php 
//<-------���·ݳ���1��12ʱ�Ĵ���;��ʼ------->
if($m<1)
{
    $m=12;
    $y-=1;
}
if($m>12)
{
    $m=1;
    $y+=1;
}
//<-------���·ݳ���1��12ʱ�Ĵ���;����------->
//***************************************
//<---------��һ��,��һ��,����,���µ����Ӵ������;��ʼ--------->
echo "<a href=$HTTP_SERVER_VARS[PHP_SELF]?y=".($y-1)."&m=".$m."&user_id=".$user_id."&type_id=".$type_id.">&lt;&lt;</a>��<a href=$HTTP_SERVER_VARS[PHP_SELF]?y=".($y+1)."&m=".$m."&user_id=".$user_id."&type_id=".$type_id.">&gt;&gt;</a>";
?>
</td>
<td height="10" colspan="3"><?php echo $y."��".$m."��";?></td>
<td height="10" colspan="2">
<?php 
$m_pre=$m-1;
$m_next=$m+1;
if ($m_pre<=9){
	$m_pre="0".$m_pre;
}
if ($m_next<=9){
	$m_next="0".$m_next;
}
if ($m_next==13){
	$m_next="01";
}
echo "<a href=$HTTP_SERVER_VARS[PHP_SELF]?m=".$m_pre."&y=".$y."&user_id=".$user_id."&type_id=".$type_id.">&lt;&lt;</a>��<a href=$HTTP_SERVER_VARS[PHP_SELF]?m=".$m_next."&y=".$y."&user_id=".$user_id."&type_id=".$type_id.">&gt;&gt;</a>";
//<--------��һ��,��һ��,����,���µ����Ӵ������;����--------->
   ?></td>
</tr>
 <tr align=center><td><font color="red">��</font> </td><td>һ</td><td>��</td><td>��
 <td>��</td><td>��</td><td>��</tr><tr>
<?php
$d=date("d");
$FirstDay=date("w",mktime(0,0,0,$m,1,$y));//ȡ���κ�һ���µ�һ�������ڼ�,���ڼ���һ�����ɱ��ĵڼ���ʼ
$bgtoday=date("d");
function font_color($m,$today,$y)//���ڼ����������������ɫ
{
    $sunday=date("w",mktime(0,0,0,$m,$today,$y));
    if($sunday=="0")
    {
        $FontColor="green";
    }
    else
    {
        $FontColor="black";
    }
    return $FontColor;
}
function bgcolor($m,$bgtoday,$today_i,$y)//���ڼ��㵱�յı�����ɫ
{
    $show_today=date("d",mktime(0,0,0,$m,$today_i,$y));
    $sys_today=date("d",mktime(0,0,0,$m,$bgtoday,$y));
    if($show_today==$sys_today)
    {
        $bgcolor="bgcolor=#6699FF";
    }
    else
    {
        $bgcolor="";
    }
    return $bgcolor;
}
function font_style($m,$today,$y)//���ڼ����������������
{
    $sunday=date("w",mktime(0,0,0,$m,$today,$y));
    if($sunday=="0")
    {
        $FontStyle="<strong>";
    }
    else
    {
        $FontStyle="";
    }
    return $FontStyle;
}
function log_check($today){
$user_id=$_GET["user_id"];
$folie=new mysql;
$folie->link("");
	$tag=0;
	$query="select * from blog_info where user_id='$user_id' and add_time like '$today%'";
	$rst=$folie->excu($query);
	if (mysql_num_rows($rst)>0){
		$tag=1;
	}
return $tag;
}
///////////////////
for($i=0;$i<=$FirstDay;$i++)//��for�������ĳ���µ�һ��λ��
{
    for($i;$i<$FirstDay;$i++)
    {
        echo "<td align=center height=10>&nbsp;</td>\n";
    }
    if($i==$FirstDay)
    {
	$today=$y."-".$m."-01";
       if (log_check($today)==1){
	   echo "<td align=center ".bgcolor($m,$bgtoday,1,$y)."height=10><font color=".font_color($m,1,$y)."><a href=day_blog.php?day=".$today."&user_id=".$user_id."&type_id=".$type_id.">".font_style($m,1,$y)."1</a></font></td>\n";
	   }else{
	    echo "<td align=center ".bgcolor($m,$bgtoday,1,$y)."height=10><font color=".font_color($m,1,$y).">".font_style($m,1,$y)."1</font></td>\n";
	   }
	   
        if($FirstDay==6)//�ж�1���Ƿ�������
        {
            echo "</tr>";
        }
    }
}
$countMonth=date("t",mktime(0,0,0,$m,1,$y));//ĳ�µ�������
for($i=2;$i<=$countMonth;$i++)//�����1�Ŷ�λ,���2��ֱ����β�����к���
{
	$today=$y."-".$m;
if ($i<=9){
	$today.="-0".$i;
}else{
	$today.="-".$i;
}
//echo $today;
    if (log_check($today)==1){
	echo "<td align=center ".bgcolor($m,$bgtoday,$i,$y)." height=10><font color=".font_color($m,$i,$y)."><a href=day_blog.php?day=".$today."&user_id=".$user_id."&type_id=".$type_id.">".font_style($m,$i,$y)."$i</a></font></td>\n";
	}else{
	echo "<td align=center ".bgcolor($m,$bgtoday,$i,$y)." height=10><font color=".font_color($m,$i,$y).">".font_style($m,$i,$y)."$i</font></td>\n";	
	}
    
    if(date("w",mktime(0,0,0,$m,$i,$y))==6)//�жϸ����Ƿ�������
    {
    echo "</tr>\n";
    }
}
?>
</table>