<style type="text/css">
<!--
.STYLE1 {
	font-family: "楷体_GB2312";
	color: #990000;
	font-size: 16px;
}
-->
</style>
<table id="subtree1" style="DISPLAY: " width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 
              <tr>
                <td height="40" class="font42"><table width="500" border="0" cellpadding="4" cellspacing="1" bgcolor="" class="newfont03">
                  <tr class="CTitle" >
                    <td height="20" colspan="11" align="left" valign="top" background="jip/a.jpg" class="select_tr STYLE2 STYLE1"><a href="qsxinx.php"></a></td>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <td width="18%" height="20">寝室号</td>
                    <td width="18%" >类别</td>
                    <td width="18%">几栋</td>
                    <td width="18%">寝室电话</td>
                    <td width="18%">几人间</td>
                  </tr>
                  <?php
include("db_conn.php");

$sql="select * from chengji";
$query=mysql_query($sql);
mysql_query("set names 'GBK'");
while ($row = mysql_fetch_array($query)) {   
?>
                  <tr bgcolor="#FFFFFF">
                    <td height="20" bgcolor="#CCFFCC"><?php echo ($row["xh"]); ?></td>
                    <td bgcolor="#CCFFCC" ><?php echo ($row["yy"]); ?></td>
                    <td bgcolor="#CCFFCC"><?php echo ($row["c"]); ?></td>
                    <td bgcolor="#CCFFCC">&nbsp;</td>
                    <td colspan="2" bgcolor="#CCFFCC"><?php echo ($row["wl"]); ?></td>
                    <?php
}
?>
                  </tr>
                </table></td>
        </tr>
      </table>
          </td>
        </tr>
</table>
</body>
</html>
