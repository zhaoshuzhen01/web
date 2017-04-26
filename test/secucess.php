<?php
header("Content-type:text/html;charset=utf-8");
$wuziling = $_COOKIE['mycookie']."<br/>";
echo $wuziling ;
/**
 * Created by PhpStorm.
 * User: ngw9
 * Date: 2017/3/7
 * Time: 17:39
 */
$mysql_database='test'; //改成自己的mysql数据库名
$showtime=date("Y-m-d H:i:s");
define("PI",3.14);
$r=3;
echo "面积为:".(PI*$r*$r)."<br />";
echo "周长为:".(2*PI*$r)."<br />";
$con = mysql_connect("localhost", "root","zszzb521");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}else{
    echo "数据库连接成功"."<br />";
    mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.

    mysql_select_db($mysql_database); //打开数据库

    $sql ="select * from mapping_session "; //SQL语句

    $result = mysql_query($sql,$con); //查询
    while($row = mysql_fetch_array($result))

    {

        echo "<div style=\"height:24px; line-height:24px; font-weight:bold;\">"; //排版代码

        echo $row['old_release'] . "<br/>";

        echo "</div>"; //排版代码
        $sql = "insert into mapping_session (old_db_name,new_db_name,old_release,new_release,old_assembly,new_assembly,created) values ('g','r','1','g','r','1','2017-03-08')";
//        $sql = "delete from mapping_session where mapping_session_id = 393";
        mysql_query($sql);

        mysql_close(); //关闭MySQL连接
    }
}
?>
//接口
<?php
interface I_userinfo    //定义接口
{
    function freezeidsubmit($uid); //定义接口的成员函数
    function freezeid($uid);   //定义接口的成员函数
    function freeid($uid);   //定义接口的成员函数

}
