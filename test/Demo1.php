<?php
header("Content-type:text/html;charset=utf-8");
setcookie('mycookie','自灵---传值成功');
/**
 * Created by PhpStorm.
 * User: ngw9
 * Date: 2017/4/10
 * Time: 17:48
 */
require 'test.php';
$content = "

<head>
<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs
/jquery/1.4.0/jquery.min.js\"></script>
<link rel='stylesheet' href='demo1css.css' type='text/css'>
<script type='text/javascript' src='jsdemo.js'></script>
<title>chengg</title>
</head>
<body  onload='finishload()'>
<p>HTML5很火，准备开始学习。我之前接触过PHP5用以做小网站，不知道HTML5是否强大到能独立制作出动态网站。</p>
<div id='mydiv' >
姓名：<input type='text' name='username'>
<a href='secucess.php'><img src='imgs/logo.png' alt='logo' class='logo'/></a>
</div>
<div>
<ul>
<li onclick='abc(23)' onmouseover='set(1)' onmouseout='set(2)'>第一章</li>
<li>第二章</li>
<li>第三章</li>
<li>第四章</li>
</ul>
<select  id='sid' onchange='selectcity()'>
            <option>---请选择---</option>
            <option>湖南</option>
            <option>湖北</option>
            <option>浙江</option>
            <option>广东</option>
    </select>
    <select  id='ssid' >
    <option>---请选择---</option>
    </select>
 <input type='button' id='update' value='提交'>
 <button type='button'>Click me</button>
</div>

</body>
";
echo $content ;
?>
