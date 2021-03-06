<?php
include_once("./left.php");
Sqli\sqli_init();
if (isset($_POST['search']))
    $list = user\GetUserBySearch($_POST['search']);
else
    $list = user\GetUser();
?>
<script>
    <?php
    if (isset($_GET['msg'])) {
    ?>
        alert('<?php $_GET['msg'] ?>');
    <?php
    }
    ?>
</script>
<h3 class="text-center">
    用户列表
</h3>
<form class="form-inline" action="userList.php" method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="搜索" aria-label="Search" name="search" value="<?php echo isset($_POST['search']) ? "{$_POST['search']}" : ''; ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
</form>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>昵称</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>手机</th>
            <th>创建时间</th>
            <th>当前状态</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($list)) {
        ?>
            <tr>
                <td><a href="userEdit.php?uid=<?php echo $row['uid']; ?>"><?php echo $row['u_name']; ?></a></td>
                <td><?php echo $row['u_sex'] == '1' ? '男' : '女'; ?></td>
                <td><?php echo $row['u_email']; ?></td>
                <td><?php echo $row['u_telphone']; ?></td>
                <td><?php echo $row['u_createtime']; ?></td>
                <td><?php echo $row['u_mode'] ? '正常' : '<span class="badge badge-danger">被冻结</span>'; ?></td>
                <td>
                    <a type="button" class="btn btn-sm btn-outline-warning" href="doFrozen.php?uid=<?php echo $row['uid']; ?>" onclick="return confirm('你确定<?php echo $row['u_mode'] ? '冻结' : '解冻'; ?>该用户吗?')">
                        <?php
                        echo $row['u_mode'] ? '冻结' : '解冻';
                        ?>
                    </a>
                    <a type="button" class="btn btn-sm btn-outline-danger" href="doUserDelete.php?uid=<?php echo $row['uid']; ?>" onclick="return confirm('你确定删除该用户吗?')">
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
