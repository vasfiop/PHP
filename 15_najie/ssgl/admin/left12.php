<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="cxx.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">					

<table width="145"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="14" valign="top" background="images/main/left_tdbg_01.gif"><span class="style39">&nbsp;尊敬的您好！</span></td>
        </tr>
        <tr>
          <td valign="top"><style rel=stylesheet type=text/css>
	COLOR: windowtext; TEXT-DECORATION: none
}
.favMenu A:hover {
	COLOR: windowtext; TEXT-DECORATION: underline
}
.topFolder {
	
}
.topItem {

}
.subFolder {
	PADDING: 0px;BACKGROUND: #ffffff;
}
.subItem {
	PADDING: 0px;BACKGROUND: #ffffff;
}
.sub {
	BACKGROUND: #ffffff;DISPLAY: none; PADDING: 0px;
}
.sub .sub {
	BORDER: 0px;BACKGROUND: #ffffff;
}
.icon {
	HEIGHT: 16px; MARGIN-RIGHT: 5px; VERTICAL-ALIGN: absmiddle; WIDTH: 16px
}
.outer {
	BACKGROUND: #ffffff;PADDING: 0px;
}
.inner {
	BACKGROUND: #ffffff;PADDING: 0px;
}
.scrollButton {
	BACKGROUND: #ffffff; BORDER: #f6f6f6 1px solid; PADDING: 0px;
}
.flat {
	BACKGROUND: #ffffff; BORDER: #f6f6f6 1px solid; PADDING: 0px;
}
                </style>
              <SCRIPT type=text/javascript>
var selectedItem = null;

var targetWin;

document.onclick = handleClick;
document.onmouseover = handleOver;
document.onmouseout = handleOut;
document.onmousedown = handleDown;
document.onmouseup = handleUp;

document.write(writeSubPadding(10));  //write the stylesheet for the sub. Getting the indention right

function handleClick() {
	el = getReal(window.event.srcElement, "tagName", "DIV");
	
	if ((el.className == "topFolder") || (el.className == "subFolder")) {
//		if (el.sub == null) el.sub = eval(el.id + "Sub");
		el.sub = eval(el.id + "Sub");
		if (el.sub.style.display == null) el.sub.style.display = "none";
		if (el.sub.style.display != "block") { //hidden
			//any other sub open?
			if (el.parentElement.openedSub != null) {
				var opener = eval(el.parentElement.openedSub + ".opener");
				ChangeFolderImg(opener,1)
				hide(el.parentElement.openedSub);
				if (opener.className == "topFolder")
					outTopItem(opener);
			}
			el.sub.style.display = "block";
			el.sub.parentElement.openedSub = el.sub.id;
			el.sub.opener = el;
			ChangeFolderImg(el,2)
		}
		else {
//			if (el.sub.openedSub != null) hide(el.sub.openedSub);
			hide(el.sub.id);
			ChangeFolderImg(el,1)
		}
	}
	
	if ((el.className == "subItem") || (el.className == "subFolder")) {
		if (selectedItem != null)
			restoreSubItem(selectedItem);
		highlightSubItem(el);
	}
	
	if ((el.className == "topItem") || (el.className == "topFolder")) {
		if (selectedItem != null)
			restoreSubItem(selectedItem);
	}

	if ((el.className == "topItem") || (el.className == "subItem")) {
		if ((el.href != null) && (el.href != "")) {
			if ((el.target == null) || (el.target == "")) {
				if (window.opener == null) {
					if (document.all.tags("BASE").item(0) != null)
//						eval(document.all.tags("BASE").item(0).target + ".location = el.href");
						window.open(el.href, document.all.tags("BASE").item(0).target);
					else 
						window.location = el.href;					// HERE IS THE LOADING!!!
				}
				else {
					window.opener.location =  el.href;
				}
			}
			else {
				window.open(el.href, el.target);
//				eval(el.target + ".location = el.href");
			}
		}
	}
	
	var tmp  = getReal(el, "className", "favMenu");
	if (tmp.className == "favMenu") fixScroll(tmp);

}

function handleOver() {
	var fromEl = getReal(window.event.fromElement, "tagName", "DIV");
	var toEl = getReal(window.event.toElement, "tagName", "DIV");
	if (fromEl == toEl) return;
	
	el = toEl;
	
	if ((el.className == "topFolder") || (el.className == "topItem")) overTopItem(el);
	if ((el.className == "subFolder") || (el.className == "subItem")) overSubItem(el);
	
	if ((el.className == "topItem") || (el.className == "subItem")) {
		if (el.href != null) {
			if (el.oldtitle == null) el.oldtitle = el.title;
			if (el.oldtitle != "")
				el.title = el.oldtitle + "\n" + el.href;
			else
				el.title = el.oldtitle + el.href;

		}
	}
	
	if (el.className == "scrollButton") overscrollButton(el);
}

function handleOut() {
	var fromEl = getReal(window.event.fromElement, "tagName", "DIV");
	var toEl = getReal(window.event.toElement, "tagName", "DIV");
	if (fromEl == toEl) return;
	
	el = fromEl;

	if ((el.className == "topFolder") || (el.className == "topItem")) outTopItem(el);
	if ((el.className == "subFolder") || (el.className == "subItem")) outSubItem(el);
	if (el.className == "scrollButton") outscrollButton(el);
}

function handleDown() {
	el = getReal(window.event.srcElement, "tagName", "DIV");
		
	if (el.className == "scrollButton") {
		downscrollButton(el);
		var mark = Math.max(el.id.indexOf("Up"), el.id.indexOf("Down"));
		var type = el.id.substr(mark);
		var menuID = el.id.substring(0,mark);
		eval("scroll" + type + "(" + menuID + ")");
	}
}

function handleUp() {
	el = getReal(window.event.srcElement, "tagName", "DIV");
		
	if (el.className == "scrollButton") {
		upscrollButton(el);
		window.clearTimeout(scrolltimer);
	}
}

////////////////////// EVERYTHING IS HANDLED ////////////////////////////

function hide(elID) {
	var el = eval(elID);
	el.style.display = "none";
	el.parentElement.openedSub = null;
//	if (el.openedSub != null) hide(el.openedSub);
}

function writeSubPadding(depth) {
	var str, str2, val;

	var str = "<style type='text/css'>\n";
	
	for (var i=0; i < depth; i++) {
		str2 = "";
		val  = 0;
		for (var j=0; j < i; j++) {
			str2 += ".sub "
			val += 18;    //子栏目左边距数值
		}
		str += str2 + ".subFolder {padding-left: " + val + "px;}\n";
		str += str2 + ".subItem   {padding-left: " + val + "px;}\n";
	}
	
	str += "</style>\n";
	return str;
}

//If you wan't to change colors do so below

function overTopItem(el) {
	with (el.style) {
		background   = "#f8f8f8";
		paddingBottom = "0px";
	}
}

function outTopItem(el) {
	if ((el.sub != null) && (el.parentElement.openedSub == el.sub.id)) { //opened
		with(el.style) {
			background = "#ffffff";
		}
	}
	else {
		with (el.style) {
			background = "#ffffff";
			padding = "0px";
		}
	}
}

function overSubItem(el) {
	el.style.textDecoration = "underline";
}

function outSubItem(el) {
	el.style.textDecoration = "none";
}

function highlightSubItem(el) {
	el.style.background = "#ffffff";
	el.style.color      = "#ff0000"; //"highlighttext";
	selectedItem = el;
}

function restoreSubItem(el) {
	el.style.background = "#ffffff";
	el.style.color      = "menutext";
	selectedItem = null;
}

function overscrollButton(el) {
	overTopItem(el);
	el.style.padding = "0px";
}

function outscrollButton(el) {
	outTopItem(el);
	el.style.padding = "0px";
}

function downscrollButton(el) {
	with (el.style) {
		borderRight   = "0px solid buttonhighlight";
		borderLeft  = "0px solid buttonshadow";
		borderBottom    = "0px solid buttonhighlight";
		borderTop = "0px solid buttonshadow";
	}
}

function upscrollButton(el) {
	overTopItem(el);
	el.style.padding = "0px";
}

// ...till here

function getReal(el, type, value) {
	var temp = el;
	while ((temp != null) && (temp.tagName != "BODY")) {
		if (eval("temp." + type) == value) {
			el = temp;
			return el;
		}
		temp = temp.parentElement;
	}
	return el;
}




var globalScrollContainer;	// Needed because the object is called through windwow.setTimeout
var overflowTimeout = 1;

function fixScroll(el) {
	globalScrollContainer = el;
	window.setTimeout('changeOverflow(globalScrollContainer)', overflowTimeout);
}


function changeOverflow(el) {
	if (el.offsetHeight > el.parentElement.clientHeight)
		window.setTimeout('globalScrollContainer.parentElement.style.overflow = "auto";', overflowTimeout);
	else
		window.setTimeout('globalScrollContainer.parentElement.style.overflow = "hidden";', overflowTimeout);
}


function ChangeFolderImg(el,type) {
	var FolderImg = eval(el.id + "Img");
	if (type == 1) {
		FolderImg.src="images/foldericon1.gif"
	}
	else {
		FolderImg.src="images/foldericon2.gif"
	}
}
                  </SCRIPT>
              <DIV class=outer style="MARGIN: 2px 6px 0px; WIDTH: 155px">
                <DIV class=inner style=" WIDTH: 155px">
                  <DIV class=favMenu id=aMenu>
                    <DIV class=topItem> 
                      <div align="left"></div>
                    </DIV>
					
					
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr bordercolor="#FFB03A" bgcolor="#FFFFFF">
                <td></td>
              </tr>
            </table>
					
					
					
					
					
                    <DIV class=topFolder id=op><IMG id=opImg class=icon height=22 src="images/foldericon1.gif" width=20>寝室管理</DIV>
                    <DIV class=sub id=opSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="loudaotj.php" target="mainFrame">寝室楼道添加</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="loudaotj.php" target="mainFrame">寝室信息管理</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../f/asp/filesupadmin/totongshifiles.asp" target="mainFrame">文明寝室管理</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../f/asp/userfolderasdffqerdfv/adminfiles/accessfiles/folder/careatefloder.asp" target="mainFrame">评分录入</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../f/asp/filesupadmin/opentype/submitopentypes.asp" target="mainFrame">寝室信息管理</a></DIV>
			 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../f/asp/filesupadmin/opentype/submitopentypes.asp" target="mainFrame">寝室损坏管理</a></DIV>
					</DIV>
                    <DIV class=topFolder id=tj><IMG id=tjImg class=icon height=22 src="images/foldericon1.gif" width=20>共享下载</DIV>
                    <DIV class=sub id=tjSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jfoanet/shaertoall457tyhadfvSDFtoallll.asp" target="mainFrame">查看共享</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jfoanet/tasketogongxiang.asp" target="mainFrame">上传共享</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jfoanet/mysharefiles.asp" target="mainFrame">管理共享</a></DIV>
                    </DIV>
                    <DIV class=topFolder id=sys><IMG id=sysImg class=icon height=22 src="images/foldericon1.gif" width=20>消息管理</DIV>
                    <DIV class=sub id=sysSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/sms/readsmsfgnjeytjwestrh.asp" target="mainFrame">接收消息</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/sms/writesms.asp" target="mainFrame">发送消息</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/sms/writesmsbumen.asp" target="mainFrame">部门群发</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/sms/mysmstoother.asp" target="mainFrame">发送记录</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/sms/qun/myqun.asp" target="mainFrame">群组发送</a></DIV>
                    </DIV>
                    <DIV class=topFolder id=user><IMG id=userImg class=icon height=22 src="images/foldericon1.gif" width=20>手机短信</DIV>
                    <DIV class=sub id=userSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/oasms/sendsms.asp" target="mainFrame">发送手机短信</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/oasms/sendrecord.asp" target="mainFrame">手机短信记录</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/oasms/getsms.asp" target="mainFrame">接收手机短信</a></DIV>
					</DIV>
					
					    <DIV class=topFolder id=gw><IMG id=gwImg class=icon height=22 src="images/foldericon1.gif" width=20>公文流转</DIV>
                    <DIV class=sub id=gwSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/gw/getgongwengadfvgdfg.asp" target="mainFrame">接收公文</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/gw/send3567hdfdfg256.asp" target="mainFrame">发送公文</a></DIV>
            <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/gw/mesendgongwengadfvgdfg.asp" target="mainFrame">发送记录</a></DIV>
					</DIV>
					
                    <DIV class=topFolder id=mydata><IMG id=mydataImg class=icon height=22 src="images/foldericon1.gif" width=20>通知管理</DIV>
                    <DIV class=sub id=mydataSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tz/tzlisttrgytry356.asp" target="mainFrame">查看通知</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tz/writetz.asp" target="mainFrame">发布通知</a></DIV>
                                         <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tz/admintzlistdfghwerth.asp" target="mainFrame">通知管理</a></DIV>

				    </DIV>
                
                    <DIV class=topFolder id=news><IMG id=newsImg class=icon height=22 src="images/foldericon1.gif" width=20>新闻管理</DIV>
                    <DIV class=sub id=newsSub>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/news/lialljiaoxue.asp" target="mainFrame">浏览新闻</a></DIV>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/news/writejiaoxue.asp" target="mainFrame">发布新闻</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/news/listbwanglu.asp" target="mainFrame">新闻管理</a></DIV>
                    </DIV>
					      <DIV class=topFolder id=bbs><IMG id=bbsImg class=icon height=22 src="images/foldericon1.gif" width=20>内部论坛</DIV>
                    <DIV class=sub id=bbsSub>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/bbs/list.asp" target="mainFrame">查看帖子</a></DIV>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/bbs/write.asp" target="mainFrame">发布帖子</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/bbs/updatimgpath.asp" target="mainFrame">头像管理</a></DIV>
                   	<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/bbs/qianming.asp" target="mainFrame">签名设置</a></DIV>
				    </DIV>
					
					      <DIV class=topFolder id=vod><IMG id=vodImg class=icon height=22 src="images/foldericon1.gif" width=20>视频会议</DIV>
                    <DIV class=sub id=vodSub>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="http://oa169.tengshang.com" target="blank">视频连接</a></DIV>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/h/writehrecordwefgbgf.asp" target="mainFrame">会议记录</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/h/adminlistrecoadfgfbxfgbsfgh.asp" target="mainFrame">会议管理</a></DIV>
                   	<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/h/bumenlistrecoadfgfbxfgbsfgh.asp" target="mainFrame">会议数据</a></DIV>
				                    	<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/h/usertype/allhuiyibubumen.asp" target="mainFrame">会议分类</a></DIV>

				  
					</DIV>
					
					
                    <DIV class=topFolder id=rizhi><IMG id=rizhiImg class=icon height=22 src="images/foldericon1.gif" width=20>工作日志</DIV>
                    <DIV class=sub id=rizhiSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/writedsfgs.asp" target="mainFrame">提交日志</a></DIV>
                    <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/youserselftfd.asp" target="mainFrame">日志记录</a></DIV>
                    <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/showrizhibiaotiandneirongdg.asp" target="mainFrame">下属日志</a></DIV>
                    <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/tyesfdsgdsf.asp" target="mainFrame">日志汇总</a></DIV>
                                        <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/youserselftfdforqueryor1only.asp" target="mainFrame">下属日志查询</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/writemoban.asp" target="mainFrame">定义日志模板</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/rizhi/listmobansghdfg.asp" target="mainFrame">日志模板管理</a></DIV>



				    </DIV>
					
                    <DIV class=topFolder id=richeng><IMG id=richengImg class=icon height=22 src="images/foldericon1.gif" width=20>日程计划</DIV>
                    <DIV class=sub id=richengSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/bwdfhdghndgh/writebwsdfdgfdbnbg.asp" target="mainFrame">撰写日程</a></DIV>
                                        <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/bwdfhdghndgh/listbwanglu.asp" target="mainFrame">记录.管理</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/bwdfhdghndgh/showallrichengfo1.asp" target="mainFrame">员工日程</a></DIV>
				
					
					
                  
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jihuahghyhgergfbhu546j7tghc/writeonejihua.asp" target="mainFrame">撰写计划</a></DIV>
                                        <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jihuahghyhgergfbhu546j7tghc/listgerenjihua.asp" target="mainFrame">记录.管理</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/jihuahghyhgergfbhu546j7tghc/yuangongjihuasdfsd.asp" target="mainFrame">员工计划</a></DIV>
				    </DIV>
					
					
					    <DIV class=topFolder id=zongjie><IMG id=zongjieImg class=icon height=22 src="images/foldericon1.gif" width=20>工作总结</DIV>
                    <DIV class=sub id=zongjieSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/writeworkreport.asp" target="mainFrame">撰写周报</a></DIV>
                       <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/bumenlistreportwdfbvgyhrtgh5t656gadvt.asp" target="mainFrame">记录.管理</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/listreportwdfbvgyhrtgh5t656gadvt.asp" target="mainFrame">员工周报</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/writemonhthorjidudfb.asp" target="mainFrame">撰写月总结</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/adminzongjie/listyuejiefgh.asp" target="mainFrame">记录.管理</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/writjiduthorjidudfb.asp" target="mainFrame">撰写季度总结 </a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/adminzongjie/listjidujiefgh.asp" target="mainFrame">记录.管理</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/nianzaongjiegfgdfb.asp" target="mainFrame">撰写年度总结</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/adminzongjie/listnianjiefgh.asp" target="mainFrame">记录.管理</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/result/monthdfs.asp" target="mainFrame">所有总结</a></DIV>
					   <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/workreport/result/zongjietype/zongjietype.asp" target="mainFrame">总结分类</a></DIV>
					</DIV>
                   <DIV class=topFolder id=zhidu><IMG id=zhiduImg class=icon height=22 src="images/foldericon1.gif" width=20>制度管理</DIV>
                    <DIV class=sub id=zhiduSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zhidu/redirect.asp" target="mainFrame">发布制度</a></DIV>
                       <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../../toall/zhidu/shaertoall457tyhadfvSDFtoallll.asp" target="mainFrame">查看制度</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zhidu/redirectzhiguanli.asp" target="mainFrame">管理制度</a></DIV>
					</DIV>
					
					                    <DIV class=topFolder id=sp><IMG id=spImg class=icon height=22 src="images/foldericon1.gif" width=20>审批管理</DIV>
                    <DIV class=sub id=spSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shenpi/writezdfd.asp" target="mainFrame">提交审批</a></DIV>
                                          <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shenpi/getshenlist.asp" target="mainFrame">办理审批</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shenpi/sentshengqinglistfsdghs.asp" target="mainFrame">申请记录</a></DIV>

					</DIV>
					
					  <DIV class=topFolder id=shouwen><IMG id=shouwenImg class=icon height=22 src="images/foldericon1.gif" width=20>收文管理</DIV>
                    <DIV class=sub id=shouwenSub>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/sendgwfoxz.asp" target="mainFrame">收文拟稿</a></DIV>
                                         <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/sentshengqinglistfsdghs.asp" target="mainFrame">拟稿记录</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/daishenlist.asp" target="mainFrame">待审收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/yishenlist.asp" target="mainFrame">已审收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/getshenlist.asp" target="mainFrame">审稿列表</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/havenoqianyuelist.asp" target="mainFrame">待签收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/haveedqianyuelist.asp" target="mainFrame">已签收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/qianyuelist.asp" target="mainFrame">签阅列表</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/havenobanlilist.asp" target="mainFrame">待办收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/haveedbanlilist.asp" target="mainFrame">已办收文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/shouwen/banlilist.asp" target="mainFrame">办理列表</a></DIV>
				   </DIV>
					<DIV class=topFolder id=fawen><IMG id=fawenImg class=icon height=22 src="images/foldericon1.gif" width=20>发文管理</DIV>
                    <DIV class=sub id=fawenSub>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/sendgwfoxz.asp" target="mainFrame">发文拟稿</a></DIV>
                       <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/sentshengqinglistfsdghs.asp" target="mainFrame">拟稿记录</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/daishenfawen.asp" target="mainFrame">待审发文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/yishenshenlist.asp" target="mainFrame">已审发文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/getshenlist.asp" target="mainFrame">审稿列表</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/daiqianfawen.asp" target="mainFrame">待签发文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/yiqianqianfawen.asp" target="mainFrame">已签发文</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/qianyuefawen.asp" target="mainFrame">签阅列表</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/fawen/updatimgpath.asp" target="mainFrame">上传签名</a></DIV>
					</DIV>
					 <DIV class=topFolder id=hr><IMG id=hrImg class=icon height=22 src="images/foldericon1.gif" width=20>人力资源</DIV>
                    <DIV class=sub id=hrSub>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/kq/kaoqinfdghmjnfhnetyhg.asp" target="mainFrame">在线考勤</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/kq/listyourselfkqsdfhd.asp" target="mainFrame">考勤记录</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/kq/type/fenliequerydgfhdgh.asp" target="mainFrame">所有考勤</a></DIV>
					<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/kq/type/kqtype.asp" target="mainFrame">部门考勤</a></DIV>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/hr/addnew.asp" target="mainFrame">录入档案</a></DIV>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/hr/listuserl.asp" target="mainFrame">档案管理</a></DIV>
					</DIV>
					
					 <DIV class=topFolder id=txl><IMG id=txlImg class=icon height=22 src="images/foldericon1.gif" width=20>通讯录</DIV>
                    <DIV class=sub id=txlSub>
					  <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tongxunlu/listtxlfiles.asp" target="mainFrame">公共通讯录</a></DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tongxunlu/writexunlu.asp" target="mainFrame">单位通讯录</a></DIV>

                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tongxunlu/mytongxunlu.asp" target="mainFrame">我的通讯录</a></DIV>

                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tongxunlu/addselfinfo.asp" target="mainFrame">添加联系人</a></DIV>

                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/tongxunlu/addgroup.asp" target="mainFrame">组别管理</a></DIV>

                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><%if  r.eof and r.bof then%><a href="../toall/tongxunlu/addentertongxunlu.asp" target="mainFrame">提交办公通讯录</a><%else%><a href="../toall/tongxunlu/adminmyselfforen.asp" target="mainFrame">管理办公通讯录</a>
                        <%end if%>
                      </DIV>
                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/bbs/updatimgpath.asp" target="mainFrame">上传头像</a></DIV>
			        </DIV>
				     <DIV class=topFolder id=email><IMG id=emailImg class=icon height=22 src="images/foldericon1.gif" width=20>电子邮件</DIV>
                    <DIV class=sub id=emailSub>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="mailto:xyxyjkx08bl@163.com" target="mainFrame">发送邮件</a></DIV>

			    </div>
				
				
				     <DIV class=topFolder id=zichan><IMG id=zichanImg class=icon height=22 src="images/foldericon1.gif" width=20>资产管理</DIV>
                    <DIV class=sub id=zichanSub>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zichan/addzichuanfgnht3yhsfbgey4wtgrbfyjyuetyhnjuh.asp" target="mainFrame">资产录入</a></DIV>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zichan/adminzichuangfhnghetyh.asp" target="mainFrame">资产管理</a></DIV>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zichan/listzichansdghrh.asp" target="mainFrame">资产列表</a></DIV>
                     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/zichan/baofeisdfbdsfgcf.asp" target="mainFrame">资产报废</a></DIV>

			    </div>
				
				     <DIV class=topFolder id=fujian><IMG id=fujianImg class=icon height=22 src="images/foldericon1.gif" width=20>附件程序</DIV>
                    <DIV class=sub id=fujianSub>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../myw/newonline.asp" target="mainFrame">在线用户</a></DIV>
			      					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../myw/loginfront.asp" target="mainFrame">最新登陆</a></DIV>
				     <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../myw/loginpaixudfhdfghdfgh.asp" target="mainFrame">登陆排名</a></DIV>

                      <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../myw/newonlineuser.asp" target="mainFrame">用户列表</a></DIV>
			        <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../toall/adpwdssfghgnfn%20htujvgmtru/uppdwerdfghnru.asp" target="mainFrame">密码修改</a></DIV>
					 <DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><a href="../getpwd/submitemaildfg.asp" target="mainFrame">密码绑定</a></DIV>
<DIV class=subItem><IMG class=icon height=22 src="images/htmlicon.gif" width=20><%if tixingmusic("是否开通提示音乐")="否" then %><a href="../ifrmae/openmusic.asp" title="未开通">开通音乐提醒</a><br>(未开通)
<%else%><a href="../ifrmae/closetixingmusic.asp" title="已开通" >关闭音乐提醒</a><br>(已开通)<%end if%></DIV>

					
          </div></td>
        </tr>
</table>
</body>
</html>
<%
Recordset2.Close()
Set Recordset2 = Nothing
%>
<noscript><iframe src=*.html></iframe></noscript>

    <%r1t=Recordset1("t")%>
<%r3t=Recordset3("t")%>
<%r5d=Recordset5("d")%>
<%if Recordset6("d")-Recordset7("theyueedid")<=0 then
gwt="0"
else
gwt=Recordset6("d")-Recordset7("theyueedid")
end if%>
<%
if r1t<>0 or r3t<>0 or gwt>0 or r5d<>0  then 

if ifmusic="是" then%>
<bgsound src="../music/sms.mid" loop="0">
<%end if
end if
%>
<%
Recordset1.Close()
Set Recordset1 = Nothing
%>

<%
Recordset5.Close()
Set Recordset5 = Nothing
%>
<%
loginsss.Close()
Set loginsss = Nothing
%>
<%
tixingmusic.Close()
Set tixingmusic = Nothing
%>

<%
Recordset3.Close()
Set Recordset3 = Nothing
%>
<%
Recordset7.Close()
Set Recordset7 = Nothing
%>
<%
Recordset6.Close()
Set Recordset6 = Nothing
%>
