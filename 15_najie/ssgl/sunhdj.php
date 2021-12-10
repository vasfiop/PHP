<table id="subtree1" style="DISPLAY: " width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 
              <tr>
                <td height="40" class="font42"><table width="500" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999" class="newfont03">
                  <tr class="CTitle" >
                    <td height="20" colspan="11" align="left" valign="top" background="jip/D.jpg" class="select_tr STYLE2" style="font-size:16px">&nbsp;</td>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <td width="18%" height="20" bgcolor="#CCFFCC">寝室号</td>
                    <td width="18%" bgcolor="#CCFFCC" >类别</td>
                    <td width="18%" bgcolor="#CCFFCC">几栋</td>
                    <td width="18%" bgcolor="#CCFFCC">类容</td>
                    <td width="18%" bgcolor="#CCFFCC">登记时间</td>
                  </tr>
<?php
include("db_conn.php");

$sql="select * from shdj";
$query=mysql_query($sql);
mysql_query("set names 'GBK'");
while ($row = mysql_fetch_array($query)) {   
?>
                  <tr bgcolor="#FFFFFF">
                    <td height="20" bgcolor="#CCFFCC"><?php echo ($row["qsh"]); ?></td>
                    <td bgcolor="#CCFFCC" ><?php echo ($row["lb"]); ?></td>
                    <td bgcolor="#CCFFCC"><?php echo ($row["jd"]); ?></td>
                    <td bgcolor="#CCFFCC"><?php echo ($row["yy"]); ?></td>
                    <td colspan="2" bgcolor="#CCFFCC"><?php echo ($row["c"]); ?></td>
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
