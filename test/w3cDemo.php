<?php
/**
 * Created by PhpStorm.
 * User: ngw9
 * Date: 2017/4/24
 * Time: 10:51
 */
header("Content-type:text/html;charset=utf-8");
$content_html = "
<head>
<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs
/jquery/1.4.0/jquery.min.js\"></script>
<link type='text/css' rel='stylesheet' href='demo1css.css'>
<script type='text/javascript' src='jsdemo.js'></script>
<h1 class='title'>W3C</h1>
</head>
<body onload='finishload()'>
<div>
<ul>
<li class='lname'>
<p>第一章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第二章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第三章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第四章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第五章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第六章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
<li class='lname'>
<p>第七章</p>
<img src='imgs/xuanzhong.png' class='line_img'>
</li>
</ul>
</div>
<div class='content_img_div content_img'>
<img src='imgs/cc.png' class='content_img'>
</div>
<div class='content_toplist'>
<ul>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第wu 节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
<li>
<ul class='content_ul'>
<li class='vli'>第一节</li>
<li class='vli'>第二节</li>
<li class='vli'>第三节</li>
</ul>
</li>
</ul>
</div>
<div class='plantdiv'>

<img src='imgs/plant.jpg' class='plant'>
</div>

</body>
";
echo $content_html;
?>
