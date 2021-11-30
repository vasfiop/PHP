<?php
include_once("./left.php");
Sqli\sqli_init();
if (isset($_POST['search']))
    $list = commodity\GetCommodityBySearch($_POST['search']);
else
    $list = commodity\GetCommodity();
?>
<!-- TODO 查看商品列表 -->
<h3 class="text-center">
    商品列表
</h3>
<form class="form-inline" action="CommodityList.php" method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="搜索" aria-label="Search" name="search" value="<?php echo isset($_POST['search']) ? "{$_POST['search']}" : ''; ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
</form>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>名称</th>
            <th>商品类型</th>
            <th>介绍</th>
            <th>图片</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($list)) {
        ?>
            <tr>
                <!-- TODO 商品列表修改 -->
                <td><a href="CommodityEdit.php?cid=<?php echo $row['cid']; ?>"><?php echo $row['c_name'] ?></a></td>
                <td><?php echo $row['t_name'] ?></td>
                <td><?php echo $row['c_area'] ?></td>
                <td><img src="<?php echo COMMIMG . $row['c_pic']; ?>" width="160"></td>
                <td>
                    <!-- TODO 删除商品 -->
                    <a type="button" class="btn btn-sm btn-outline-danger" href="doTypeDelete?tid=<?php echo $row['tid']; ?>" onclick="return confirm('你确定删除该类型吗?')">
                        删除
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
include_once("./right.php");
