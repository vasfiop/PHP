
<?php
//mb_internal_encoding('utf-8');
//mysql_query("set names utf8");
class mysql
{
    //���ӷ����������ݿ��Լ�ִ��SQL�������
    public $database;
    public $server_username;
    public $server_userpassword;
    function mysql()
    {  //���캯����ʼ����Ҫ���ӵ����ݿ�
        $this->server_username = "root";
        $this->server_userpassword = "1234";
    } //end mysql()
    function link($database)
    {  //���ӷ����������ݿ�

        if ($database == "") {
            $this->database = "blog_db";
        } else {
            $this->database = $database;
        }
        //���ӷ����������ݿ�
        if ($id = mysql_connect('localhost', $this->server_username, $this->server_userpassword)) {
            mysql_query("SET CHARACTER SET gb2312");
            if (!mysql_select_db($this->database, $id)) {
                echo "���ݿ����Ӵ��󣡣���";
                exit;
            }
        } else {
            echo "����������ά���У����Ժ����ԣ�����";
            exit;
        }
        mysql_query("SET CHARACTER SET gb2312");
        //����������룬���Դ����������
    } //end link($database)
    function excu($query)
    {     //ִ��SQL���
        if ($result = mysql_query($query)) {
            return $result;
        } else {
            echo mysql_error();
            echo "sql���ִ�д��󣡣���������!!!";
            exit;
        }
    } //end  exec($query)
} //end class mysql
?>
