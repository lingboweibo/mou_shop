<?php
$a = '<div style="color:red">fasdf</div><script>alert(1);</script>';
//$a = htmlspecialchars($a);//编码了HTML，让HTML变成不是HTMl，不会被浏览解析执行。
//如果内容不编码就直接echo到浏览器，那浏览器就会解析执行它。
//这样如果里面有恶意的，或者病毒木马代码也会被执行
//所以TP为了防止这些恶意代码被执行，I方法默认采用htmlspecialchars将输入变量进行编码
echo $a;