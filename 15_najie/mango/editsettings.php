<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php
    //判断是否是管理员的身份
    if (IsAdmin() == false) {
	  PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
	  exit(include("includes/exit.inc.php"));
    }
   	//获取action的值即操作
    if (!empty($_POST['action'])) { $action = $_POST['action']; }
    //定义变量
    $show = "2";
    if (!empty($_GET['show'])) { $show = $_GET['show']; }

    if ($action == "save") {
	    // theme
        if (!empty($_POST['theme'])) { $theme = $_POST['theme']; }

	    // 获取当前的订单设置
	    if (!empty($_POST['send_default_country'])) { $send_default_country = $_POST['send_default_country']; }  else { $send_default_country = ""; }
	    if (!empty($_POST['sendcosts_default_country'])) { $sendcosts_default_country = $_POST['sendcosts_default_country']; } else { $sendcosts_default_country = 0; }
	    if (!empty($_POST['sendcosts_other_country'])) { $sendcosts_other_country = $_POST['sendcosts_other_country']; } else { $sendcosts_other_country = 0; }
	    if (!empty($_POST['rembours_costs'])) { $rembours_costs = $_POST['rembours_costs']; } else { $rembours_costs = ""; }
	    if (!empty($_POST['currency'])) { $currency = $_POST['currency'] ; } else { $currency = ""; }
	    if (!empty($_POST['currency_symbol'])) {$currency_symbol = $_POST['currency_symbol'] ; } else { $cuurency_symbol = ""; }
	    if (!empty($_POST['paymentdays'])) {$paymentdays = $_POST['paymentdays']; } else { $paymentdays = 0; }
	    if (!empty($_POST['vat'])) {$vat = $_POST['vat']; } else { $vat = 0; }
	    if (!empty($_POST['show_vat'])) {$show_vat = $_POST['show_vat']; } else { $show_vat = ""; }
	    $db_prices_including_vat = CheckBox($_POST['db_prices_including_vat']);

	    // 获取当前的商场设置
	    if (!empty($_POST['sales_mail'])) {$sales_mail = $_POST['sales_mail']; } else { $sales_mail = ""; }
	    if (!empty($_POST['shopname'])) {$shopname = $_POST['shopname']; } else { $shopname = ""; }
	    if (!empty($_POST['shopurl'])) {$shopurl = $_POST['shopurl']; } else { $shopurl = ""; }
	    if (!empty($_POST['default_lang'])) {$default_lang = $_POST['default_lang']  ; } else { $default_lang = ""; }
	    if (!empty($_POST['order_prefix'])) {$order_prefix = $_POST['order_prefix']; } else { $order_prefix = ""; }
	    if (!empty($_POST['order_suffix'])) {$order_suffix = $_POST['order_suffix']; } else { $order_suffix = ""; }
	    $stock_enabled = CheckBox($_POST['stock_enabled']);
	    $ordering_enabled = CheckBox($_POST['ordering_enabled']);
	    $shop_disabled = CheckBox($_POST['shop_disabled']);
	    if (!empty($_POST['shop_disabled_title'])) {$shop_disabled_title = $_POST['shop_disabled_title']; } else { $shop_disabled_title = ""; }
	    if (!empty($_POST['shop_disabled_reason'])) {$shop_disabled_reason = $_POST['shop_disabled_reason']; } else { $shop_disabled_reason = ""; }

	    // 获取当前的联系信息
	    if (!empty($_POST['webmaster_mail'])) {$webmaster_mail = $_POST['webmaster_mail']; } else { $webmaster_mail = ""; }
	    if (!empty($_POST['shoptel'])) {$shoptel = $_POST['shoptel']; } else { $shoptel = ""; }
	    if (!empty($_POST['shopfax'])) {$shopfax = $_POST['shopfax']; } else { $shopfax = ""; }

	    // 获取银行的详细信息
	    if (!empty($_POST['bankaccount'])) {$bankaccount = $_POST['bankaccount']; } else { $bankaccount = ""; }
	    if (!empty($_POST['bankaccountowner'])) {$bankaccountowner = $_POST['bankaccountowner']; } else { $bankaccountowner = ""; }
	    if (!empty($_POST['bankcity'])) {$bankcity = $_POST['bankcity']; } else { $bankcity = ""; }
	    if (!empty($_POST['bankcountry'])) {$bankcountry = $_POST['bankcountry']; } else { $bankcountry = ""; }
	    if (!empty($_POST['bankname'])) {$bankname = $_POST['bankname']; } else { $bankname = ""; }
	    if (!empty($_POST['bankiban'])) {$bankiban = $_POST['bankiban']; } else { $bankiban = ""; }
	    if (!empty($_POST['bankbic'])) {$bankbic = $_POST['bankbic']; } else { $bankbic = ""; }
	    if (!empty($_POST['start_year'])) {$start_year = $_POST['start_year']; } else { $start_year = 2006; }

	    // 商城图片
	    if (!empty($_POST['shop_logo'])) {$shop_logo = $_POST['shop_logo']; } else { $shop_logo = ""; }
//	    if (!empty($_POST['background'])) {$background = $_POST['background']; } else { $backgound = ""; }

	    //系统的头文件和底文件的信息
	    if (!empty($_POST['slogan'])) {$slogan = $_POST['slogan']; } else { $slogan = ""; }
	    if (!empty($_POST['page_title'])) {$page_title = $_POST['page_title']; } else { $page_title = ""; }
	    if (!empty($_POST['page_footer'])) {$page_footer = $_POST['page_footer']; } else { $page_footer = ""; }

	    //提货方式
	    $shipping_postal = CheckBox($_POST['shipping_postal']);
	    $shipping_atstore = CheckBox($_POST['shipping_atstore']);
	    //$shipping_unused = CheckBox($_POST['shipping_unused']);

	    if (!empty($_POST['number_format'])) {$number_format = $_POST['number_format']; } else { $number_format = ""; }
	    if (!empty($_POST['max_description'])) {$max_description = $_POST['max_description']; } else { $max_description = 0; }
	    $no_vat = CheckBox($_POST['no_vat']);
	    if (!empty($_POST['pricelist_format'])) {$pricelist_format = $_POST['pricelist_format']; } else { $pricelist_format = 0; }
	    if (!empty($_POST['date_format'])) {$date_format = $_POST['date_format']; } else { $date_format = ""; }
	    $search_prodgfx = CheckBox($_POST['search_prodgfx']);
	    $use_prodgfx = CheckBox($_POST['use_prodgfx']);

	    //付款方式
	    $pay_bank = CheckBox($_POST['pay_bank']);
	    $pay_atstore = CheckBox($_POST['pay_atstore']);
	    $pay_paypal = CheckBox($_POST['pay_paypal']);
	    $pay_onreceive = CheckBox($_POST['pay_onreceive']);
	    //$pay_unused = CheckBox($_POST['pay_unused']);
	    if (!empty($_POST['paypal_email'])) {$paypal_email = $_POST['paypal_email']; } else { $paypal_email = ""; }
	    if (!empty($_POST['paypal_currency'])) {$paypal_currency = $_POST['paypal_currency']; } else { $paypal_currency = ""; }

	    // new in 2.1
  	    $thumbs_in_pricelist = CheckBox($_POST['thumbs_in_pricelist']);
	    if (!empty($_POST['keywords'])) {$keywords = $_POST['keywords']; } else { $keywords = ""; }
	    if (!empty($_POST['charset'])) {$charset = $_POST['charset']; } else { $charset = ""; }
  	    $conditions_page = CheckBox($_POST['conditions_page']);
  	    $guarantee_page = CheckBox($_POST['guarantee_page']);
  	    $shipping_page = CheckBox($_POST['shipping_page']);

  	    // new in 2.2
	    if (!empty($_POST['pictureid'])) {$pictureid = $_POST['pictureid']; } else { $pictureid = 0; }
  	    $aboutus_page = CheckBox($_POST['aboutus_page']);
  	    $live_news = CheckBox($_POST['live_news']);
	    if (!empty($_POST['pricelist_thumb_width'])) {$pricelist_thumb_width = $_POST['pricelist_thumb_width']; } else { $pricelist_thumb_width = 0; }
	    if (!empty($_POST['pricelist_thumb_height'])) {$pricelist_thumb_height = $_POST['pricelist_thumb_height']; } else { $pricelist_thumb_height = 0; }
	    if (!empty($_POST['category_thumb_width'])) {$category_thumb_width = $_POST['category_thumb_width']; } else { $category_thumb_width = 0; }
	    if (!empty($_POST['category_thumb_height'])) {$category_thumb_height = $_POST['category_thumb_height']; } else { $category_thumb_height = 0; }
	    if (!empty($_POST['product_max_width'])) {$product_max_width = $_POST['product_max_width']; } else { $product_max_width = 9999; }
	    if (!empty($_POST['product_max_height'])) {$product_max_height = $_POST['product_max_height']; } else { $product_max_height = 9999; }

	    //更新数据库
	    $query = "UPDATE `settings` SET ";

	    if ($show == "1" || $show == "all") {
		    $query = $query.
		    "`currency` = '".$currency."', ".
		    "`currency_symbol` = '".$currency_symbol."', ".
		    "`paymentdays` = ".$paymentdays.", ".
		    "`no_vat` = ".$no_vat.", ".
		    "`vat` = ".$vat.", ".
		    "`show_vat` = '".$show_vat."', ".
		    "`db_prices_including_vat` = ".$db_prices_including_vat.", ".
		    "`order_prefix` = '".$order_prefix."', ".
		    "`order_suffix` = '".$order_suffix."', ".
		    "`number_format` = '".$number_format."', ".
		    "`date_format` = '".$date_format."'";
	    }
	    if ($show == "all") { $query = $query . ", "; }

	    if ($show == "2" || $show == "all") {
		    $query = $query.
		    "`sales_mail` = '".$sales_mail."', ".
		    "`shopname` = '".$shopname."', ".
		    "`shopurl` = '".$shopurl."', ".
		    "`default_lang` = '".$default_lang."', ".
		    "`send_default_country` = '".$send_default_country."', ".
		    "`stock_enabled` = ".$stock_enabled.", ".
		    "`ordering_enabled` = ".$ordering_enabled.", ".
		    "`shop_disabled` = ".$shop_disabled.", ".
		    "`shop_disabled_title` = '".$shop_disabled_title."', ".
		    "`shop_disabled_reason` = '".$shop_disabled_reason."', ".
		    "`webmaster_mail` = '".$webmaster_mail."', ".
		    "`shoptel` = '".$shoptel."', ".
		    "`shopfax` = '".$shopfax."', ".
		    "`start_year` = ".$start_year.", ".
		    "`keywords` = '".$keywords."', ".
		    "`pictureid` = ".$pictureid."";
	    }
	    if ($show == "all") { $query = $query . ", "; }

	    if ($show == "3" || $show == "all") {
		    $query = $query.
		    "`bankaccount` = '".$bankaccount."', ".
		    "`bankaccountowner` = '".$bankaccountowner."', ".
		    "`bankname` = '".$bankname."', ".
		    "`bankcity` = '".$bankcity."', ".
		    "`bankcountry` = '".$bankcountry."', ".
		    "`bankiban` = '".$bankiban."', ".
		    "`bankbic` = '".$bankbic."'";
	    }
	    if ($show == "all") { $query = $query . ", "; }

	    if ($show == "4" || $show == "all") {
		    $query = $query.
     	    "`theme` = '".$theme."', ".
		    "`shop_logo` = '".$shop_logo."', ".
//		    "`background` = '".$background."', ".
		    "`slogan` = '".$slogan."', ".
		    "`page_title` = '".$page_title."', ".
		    "`page_footer` = '".$page_footer."', ".
		    //"`shipping_unused` = ".$shipping_pay_atstore.", ".
		    "`max_description` = ".$max_description.", ".
		    "`pricelist_format` = ".$pricelist_format.", ".
		    "`search_prodgfx` = ".$search_prodgfx.", ".
		    "`use_prodgfx` = ".$use_prodgfx.", ".
		    "`thumbs_in_pricelist` = ".$thumbs_in_pricelist.", ".
		    "`charset` = '".$charset."', ".
		    "`conditions_page` = ".$conditions_page.", ".
		    "`guarantee_page` = ".$guarantee_page.", ".
		    "`shipping_page` = ".$shipping_page.", ".
		    "`aboutus_page` = ".$aboutus_page.", ".
		    "`live_news` = ".$live_news.", ".
		    "`pricelist_thumb_width` = ".$pricelist_thumb_width.", ".
		    "`pricelist_thumb_height` = ".$pricelist_thumb_height.", ".
		    "`category_thumb_width` = ".$category_thumb_width.", ".
		    "`category_thumb_height` = ".$category_thumb_height.", ".
		    "`product_max_width` = ".$product_max_width.", ".
		    "`product_max_height` = ".$product_max_height."";
	    }

	    $sql = mysql_query($query) or die(mysql_error());
        PutWindow ($txt['general13'],$txt['editsettings44'], "notify.gif", "50");
     }
?>
            <h4>
            <a href="index.php?page=editsettings&show=2"><?php echo $txt['editsettings47']; ?></a> |
            <a href="index.php?page=editsettings&show=4"><?php echo $txt['editsettings46']; ?></a> |
            <a href="index.php?page=editsettings&show=all"><?php echo $txt['editsettings86']; ?></a>
            </h4>
            <br /><br />
	        <table width="80%" class="datatable">
	          <caption><?php echo $txt['editsettings1']; ?></caption>
             <tr><td>
                 <table width="100%" class="borderless">
                      <form method="POST" action="index.php?page=editsettings&show=<?php echo $show; ?>">
                      <input type="hidden" name="action" value="save">

        	      <?php
				  //商场设置
                  if ($show == "2" || $show == "all") {
	              ?>

        	      <tr><td colspan="2"><h6><?php echo $txt['editsettings47'] ?></h6>
        	      <br />
        	      </td></tr>
	              <tr><td><?php echo $txt['editsettings14'] ?></td>
	                  <td><input type="text" name="sales_mail" size="30" maxlength="50" value="<?php echo $sales_mail ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings15'] ?></td>
	                  <td><input type="text" name="shopname" size="30" maxlength="100" value="<?php echo $shopname ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings16'] ?></td>
	                  <td><input type="text" name="shopurl" size="30" maxlength="100" value="<?php echo $shopurl ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings17'] ?></td>
	                  <td>
                        <SELECT NAME="default_lang">
                          <OPTION VALUE="<?php echo $default_lang ?>" SELECTED><?php echo $default_lang ?>
        	            </SELECT>
        	          </td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings25'] ?></td>
	                  <td><input type="text" name="webmaster_mail" size="30" maxlength="50" value="<?php echo $webmaster_mail ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings26'] ?></td>
	                  <td><input type="text" name="shoptel" size="30" maxlength="50" value="<?php echo $shoptel ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings27'] ?></td>
	                  <td><input type="text" name="shopfax" size="30" maxlength="50" value="<?php echo $shopfax ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings34'] ?></td>
	                  <td><input type="text" name="start_year" size="4" maxlength="4" value="<?php echo $start_year ?>"></td>
        	      </tr>

        	      <?php
    	          }
				  //主题设置
                  if ($show == "4" || $show == "all") {
	              ?>

        	      <tr><td colspan="2"><h6><?php echo $txt['editsettings46'] ?></h6>
        	      <br />
        	      </td></tr>
	              <tr><td><?php echo $txt['editsettings35'] ?></td>
	                  <td><input type="text" name="shop_logo" size="30" maxlength="50" value="<?php echo $shop_logo ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings37'] ?></td>
	                  <td><input type="text" name="slogan" size="30" maxlength="200" value="<?php echo $slogan ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings38'] ?></td>
	                  <td><input type="text" name="page_title" size="30" maxlength="200" value="<?php echo $page_title ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings39'] ?></td>
	                  <td><input type="text" name="page_footer" size="30" maxlength="100" value="<?php echo $page_footer ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings50'] ?></td>
	                  <td><input type="text" name="max_description" size="2" maxlength="2" value="<?php echo $max_description ?>"></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings59'] ?></td>
	                  <td><input type="checkbox" name="use_prodgfx" <?php if ($use_prodgfx == 1) { echo "checked"; } ?>></td>
        	      </tr>
	              <tr><td><?php echo $txt['editsettings71'] ?></td>
	                  <td><input type="text" name="charset" size="10" maxlength="20" value="<?php echo $charset ?>"></td>
        	      </tr>

        	      <?php
    	          }
	              ?>

        	      <tr><td colspan=2><div style="text-align:center;"><br /><br /><input type=submit value="<?php echo $txt['editsettings2'] ?>"></div></td></tr>
                 </form>
                </td>
               </tr>
              </table>
             </tr>
            </table>
