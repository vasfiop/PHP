[<a href="input.php">�������</a>]
<?php
//������PHP����
$sql = "SELECT * FROM `list`"; //��Ҫִ�е�SQL���(������������ݹ���)
require('conn.php');               //����conn.php�ļ���ִ�����ݿ����
?>

<!---����HTML���룬����һ�����--->
<table width="100%" border="1">
        <tr>
                <th width="13%" bgcolor="#CCCCCC" scope="col">����</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">�Ա�</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">�ֻ�</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">����</th>
                <th width="29%" bgcolor="#CCCCCC" scope="col">��ַ</th>

                <th width="19%" bgcolor="#CCCCCC" scope="col">����</th>

        </tr>


        <?php
        //������PHP����
        //�ж��Ա�
        while ($row = mysql_fetch_row($result)) //ѭ����ʼ
        {
                if ($row[2] == 0) {
                        $sex = 'Ůʿ';
                } else {
                        $sex = '����';
                }
        ?>

                <!---��ѭ����HTML����д���PHP����--->
                <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $sex;      ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>

                        <td>
                                <div align="center">
                                        [<a href="edit.php?id=<?php echo $row[0]; ?>">�༭</a>]
                                        [<a href="del.php?id=<?php echo $row[0]; ?>">ɾ��</a>]
                                </div>
                        </td>

                </tr>


        <?php
        }
        ?>

</table>