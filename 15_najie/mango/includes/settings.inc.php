<?php
    //��ͨ����
    $group = 0;  //Ĭ��Ϊ0������ҳ
    $index_refer = 1; // pages of the webshop cannot be opened if this value is unset
    error_reporting(E_ALL ^ E_NOTICE);

    // file locations (leave default if shop is on same server as all the other files)
    $gfx_dir = "gfx";
    $product_dir = "prodgfx"; // cmod this folder to 777, because we will be uploading images to it
    $brands_dir = "cats";
    $orders_dir = "orders"; // chmod this folder to 777, because the shop needs to write in it
    $lang_dir = "langs";
    $themes_dir = "themes";

    // if this is a clean install, then YES there is a part missing at the end of this file.
    // But it will be added during installation
?>
