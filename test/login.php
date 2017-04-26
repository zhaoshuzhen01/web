<?php
/**
 * Created by PhpStorm.
 * User: ngw9
 * Date: 2017/3/10
 * Time: 14:44
 */
//$output = array();
$postInfo = file_get_contents("php://input");
$arr = explode("&", $postInfo);
$arrlength = count($arr);
for ($x = 0; $x < $arrlength; $x++) {
    switch ($x) {
        case 0:
            $newArr['name'] = explode("=", $arr[$x])[1];
            break;
        case 1:
            $newArr['password'] = explode("=", $arr[$x])[1];
            break;
    }
}//{"name":"name=zhaoshuzhen","password":"password=123456"}
$con = mysql_connect("localhost", "root", "zszzb521");
if (!$con) {
    die('Could not connect: ' . mysql_error());
} else {  //数据库连接成功
  mysql_query("set names 'utf8'"); //数据库输出编码

    $open =   mysql_select_db("user_information"); //打开数据库
    if(!$open){
        $output = array("code" => 201, "msg" => "faler");
        echo json_encode($output);
    }else{ // 打开数据库成功
        $user_name = $newArr['name'];
        $user_pass = $newArr['password'];
        $sql = "select * from users";
        $query=mysql_query($sql);
        if(!$query){
            $output = array("code" => 203, "msg" => "faler");
            echo json_encode($output);
        }else{ // 查询数据库成功
            while($row = mysql_fetch_array($query)){
if($row['name']==$user_name&& $row['password']==$user_pass){
    $output = array("code" => 204, "msg" => "用户已注册");
    echo json_encode($output);
    return ;
}
//                echo $row['name'].'$user_name'.$row['password'].'$user_pass';
            }
            $sql = "insert into users (name,password) values ('$user_name','$user_pass')";
            $insert =   mysql_query($sql);
            if(!$insert){
//            echo $sql;
                $output = array("code" => 202, "msg" => "faler");
                echo json_encode($output);
            }else{  // 插入表成功
//            echo $sql;
                $output = array("code" => 200, "msg" => "注册成功");
                echo json_encode($output);
            }
        }
    }
        mysql_close(); //关闭MySQL连接
}
?>