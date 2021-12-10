<?php
include("db_conn.php");
?>

<title>学生宿舍管理系统</title>
<style type="text/css">
  <!--
  .STYLE8 {
    font-family: "新宋体";
    color: #333333;
    font-size: 14px;
  }

  .STYLE9 {
    color: #FF0000;
    font-size: 14px;
  }

  .STYLE11 {
    font-size: 14px;
    font-family: "楷体_GB2312";
    color: #000000;
  }

  body {
    background-color: #FFFFFF;
  }
  -->
</style>
<style type="text/css">
  <!--
  body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
  }

  .tabfont01 {
    font-family: "宋体";
    font-size: 9px;
    color: #555555;
    text-decoration: none;
    text-align: center;
  }

  .font051 {
    font-family: "宋体";
    font-size: 12px;
    color: #333333;
    text-decoration: none;
    line-height: 20px;
  }

  .font201 {
    font-family: "宋体";
    font-size: 12px;
    color: #FF0000;
    text-decoration: none;
  }

  .button {
    font-family: "宋体";
    font-size: 14px;
    height: 37px;
  }

  html {
    overflow-x: auto;
    overflow-y: auto;
    border: 0;
  }
  -->
</style>

<link href="../css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  <!--
  a:link {
    color: #333333;
    text-decoration: none;
  }

  a:visited {
    text-decoration: none;
    color: #FF3300;
  }

  a:hover {
    text-decoration: none;
  }

  a:active {
    text-decoration: none;
    color: #333333;
  }

  .STYLE14 {
    color: #333333;
    font-size: 14px;
  }

  .STYLE15 {
    font-size: 14px
  }

  h1 {
    color: #990000;
  }
</style>
<link href="kj.css" rel="stylesheet" type="text/css">
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body onUnload="window.alert(''''谢谢您的光临,诚邀加盟.请记住本站域名：

http://www.yz126.com/ 站长信箱：****@yahoo.com.cn 欢迎咨询'''')">

  <table width="1000" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1004" align="left" valign="top"><img src="tp/top.jpg" width="1000" height="150" /></td>
    </tr>
  </table>
  <table width="1000" height="20" bgcolor="#CCCCCC" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
    <tr>
      <td width="90">
        <div align="center"><span class="STYLE8">首页</span></div>
      </td>
      <td width="90">
        <div align="center"><a href="qs_xinx.php">寝室查询</a></div>
      </td>
      <td width="90">
        <div align="center"><span class="STYLE8">班级查询</span></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="#">文明寝室</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="shdj.php">寝室损坏</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="shdj.php">损坏登记</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="pfxinx.php">评分信息</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="#">个人资料</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="lyb.php">留言板</a></div>
      </td>
      <td width="90">
        <div align="center" class="STYLE8"><a href="zd.php">管理制度</a></div>
      </td>
      <td width="110">
        <div align="center" class="STYLE8"><a href="#">注销系统</a></div>
      </td>
    </tr>
  </table>
  <table width="1000" height="0" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#666666">
    <tr>
      <td width="1002" bgcolor="#FFFFFF">
        <div align="center"><img src="tp/xian.jpg" width="1000" height="3"></div>
      </td>
    </tr>
  </table>
  <?php
  $sql = "select * from gg";
  $result = mysql_query($sql);
  while ($row = mysql_fetch_array($result)) {
  ?>
    <table width="1000" height="20" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF6600">
      <tr>
        <td width="500" background="jip/1.jpg"><span class="STYLE9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站公告：
            <marquee direction='left' bgcolor="" class="font201">

              <?php echo $row["yy"]; ?><?php
                                    }
                                      ?>
            </marquee>
          </span></td>
        <td width="504" background="jip/1.jpg"><span class="STYLE9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前时间：
            <script language="javascript">
              setInterval("timer.innerHTML=new Date().toLocaleString()", 1000);
            </script>
            <span id="timer"></span>
          </span></td>
      </tr>
    </table>
    <table width="1000"" height=" 200" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#993399 solid 1px; border-right:#993399 solid 1px;width=" 1000>
      <tr>
        <td width="1001" height="200">
          <table width="1000" height="180" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="496" height="200" align="left" valign="top" bgcolor="#CCCCCC"><?
                                                                                        require("qsxinx.php")
                                                                                        ?>
              <td width="5" height="200" valign="top" bgcolor="#660000">&nbsp;</td>
              <td width="499" valign="top" bgcolor="#CCCCCC">
                <table width="495" height="200" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="500" valign="top"><?
                                                  require("wenmqs.php")
                                                  ?></td>
                  </tr>

                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table width="1000" height="2" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
      <tr>
        <td width="1004">
          <div align="center"><img src="tp/xian.jpg" width="900" height="5"></div>
        </td>
      </tr>
    </table>
    <table width="1000" height="260" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFFFF">
          <table width="1000" height="260" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="500" height="260" valign="top" bgcolor="#CCCCCC"><?
                                                                          require("banjxinx.php")
                                                                          ?></td>
              <td width="5" height="260" bgcolor="#330000">&nbsp;</td>
              <td width="495" height="260" valign="top" bgcolor="#CCCCCC"><?
                                                                          require("sunhdj.php")
                                                                          ?></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table width="1000" height="2" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
      <tr>
        <td>
          <div align="center"><img src="tp/xian.jpg" width="900" height="5"></div>
        </td>
      </tr>
    </table>
    <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?
            require("tp.php")
            ?></td>
      </tr>
    </table>
</body>

</html>