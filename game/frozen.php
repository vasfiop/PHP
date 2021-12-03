<?php
include_once("./left.php");
Sqli\sqli_init();
if (isset($_POST['search']))
    $list = frozen\GetFrozenBySearch($_POST['search']);
else
    $list = frozen\GetFrozen();
?>

<h3 class="text-center">
    留言
</h3>
<form class="form-inline" action="frozen.php" method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="搜索" aria-label="Search" name="search" value="<?php echo isset($_POST['search']) ? "{$_POST['search']}" : ''; ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
</form>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>用户昵称</th>
            <th>冻结时间</th>
            <th>操作者</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($list)) {
        ?>
            <tr>
                <td><a href="userEdit.php?uid=<?php echo $row['uid']; ?>"><?php echo $row['u_name']; ?></a></td>
                <td><?php echo $row['createtime']; ?></td>
                <td><?php echo $row['a_name']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include_once("./right.php");
