<?php
include_once("./left.php");
Sqli\sqli_init();
if (isset($_POST['search']))
    $list = type\GetTypeBySearch($_POST['search']);
else
    $list = type\GetType();
?>
<script>
    <?php
    if (isset($_GET['success']))
        echo "alert(\"删除失败！请联系作者！\");";
    ?>
</script>
<h3 class="text-center">
    商品类型列表
</h3>
<form class="form-inline" action="typeList.php" method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="搜索" aria-label="Search" name="search" value="<?php echo isset($_POST['search']) ? "{$_POST['search']}" : ''; ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
</form>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>名称</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($list)) {
        ?>
            <tr>
                <td><?php echo $row['t_name']; ?></td>
                <td>
                    <a type="button" class="btn btn-sm btn-outline-primary" href="typeEdit.php?tid=<?php echo $row['tid']; ?>">
                        修改
                    </a>
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
