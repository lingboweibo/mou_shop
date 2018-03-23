<?php
function my_dump($s,$f = 'p'){//断点显示调试数据$s ,第二个参数表示用什么函数来显示传来的数据，默认=p就会用print_r
    ob_end_clean();//清除前面的输出的内容
    header('Content-type: text/plain');
    if($f == 'p')$f = 'print_r';
    if($f == 'v')$f = 'var_export';
    if($f == 'd')$f = 'var_dump';
    $f($s);
    exit;//表示退出PHP程序的运行，不执行后面的代码
}
function _sql($m = ''){//断点显示传来的$m模型的最后执行的SQL
    if($m == '')$m = M();
    $sql = $m->_sql();//getLastSql();
    ob_end_clean();
    header('Content-type: text/plain');
    echo $sql;
    exit;
}
function mylog($word) {//在根目录写调试信息，文件名:log_file_fun
    $fp = fopen('LOG_FILE_FUN', 'a');
    flock($fp, LOCK_EX);
    fwrite($fp, date('Y-m-d H:i:s',time()) . ':' . $word . PHP_EOL);
    flock($fp, LOCK_UN);
    fclose($fp);
}
function getJobData(){
    //先读取缓存里的职业数据赋值给一个变量
    $data = F('jobData');
    //判断$data有没有数据，如果没有数据的话，就说明这个职业数据缓存没有保存到，或者被删除了
    if($data == false){
        //如果缓存里没有职业数据，那就从数据库里读取职业数据
        $data = M('Job')->field('id,name')->order('order_no')->select();
        //从数据库里读取到职业数据之后，赋值给一个变量，还要再保存到缓存里，这样下次调用这个函数或获取这个缓存时就能获取到
        F('jobData',$data);
    }
    return $data;
}
function getCityData($pid = 0){//返回传来的城市ID的下级城市，如果不传或传的是0就会返回一级城市
    //因为城市数据是分开用不同的键保存的，所以对这个城市缓存的读取或保存时要先得到 键
    //键的格是： city_城市ID 
    $key = 'city_' . $pid;
    $data = F($key);
    if($data == false){
        $data = M('City')->field('id,name')->where(array('pid' => $pid,'is_del' => '0'))->order('order_no')->select();//首读取城市表的数据（条件是pid字段== 传来的$pid）
        F($key,$data);
    }
    return $data;
}
//传来的是一级城市ID，返回它的所有上级城市ID数组，就会是空
function getParentCityId($id){//根据城市ID返回它的所有上级城市ID数组
    $idArr[0] = substr($id,0,2);//取出1级地区编号部分
    $idArr[1] = substr($id,2,2);//取出2级地区编号部分
    $idArr[2] = substr($id,4,2);//取出3级地区编号部分
    $idArr[3] = substr($id,6,3);//取出4级地区编号部分

    $reArr = array();
    $temp = $idArr[0] . '00' . '00' . '000';//取得这个传来的城市ID的1级城市ID
    if($id != $temp){//不等于就说明传来的id不是一级地区
        $reArr[] = $temp;//给$reArr这个数组增加第1个元素，值是 传来的城市ID的1级城市ID
        $temp = $idArr[0] . $idArr[1] . '00' . '000';//取得这个传来的城市ID的2级城市ID
        if($id != $temp){//不等于就说明传来的id不是二级地区
            $reArr[] = $temp;//给$reArr这个数组增加第2个元素，值是 传来的城市ID的2级城市ID
            $temp = $idArr[0] . $idArr[1] . $idArr[2] . '000';//取得这个传来的城市ID的3级城市ID
        }
        //判断传来的城市id 是不是不等于 这个城市ID的所在3级城市的ID
        if($id != $temp)$reArr[] = $temp;//给$reArr这个数组增加第3个元素，值是 传来的城市ID的3级城市ID
    }
    return $reArr;
}
// 如果传的城市ID是四级城市，那么就返回 他上级城市ID数组（它所在的一级城市ID，它所在的2级城市ID，它所在的3级城市ID）
// 如果传的城市ID是三级城市，那么就返回 他上级城市ID数组（它所在的一级城市ID，它所在的2级城市ID）
// 如果传的城市ID是二级城市，那么就返回 他上级城市ID数组（它所在的一级城市ID）
// 如果传的城市ID是一级城市，那么就返回 一个空数组
// 
function cityIdToName($id){//根据城市id返回城市名称的函数
    // 1、获取这个 城市id 的 所有上级城市ID数组 例如传来的天河区的ID 会取到 广东省，广州市ID
    $parArr = getParentCityId($id);

    // 2、从它的所有上级城市ID数组当中取出它的父城市ID 会得到 广州市的ID
    if($parArr == false){
        $parId = 0;//判断 所有上级城市ID数组 是不是为空，为空的话，父城市ID就用0
    }else{
        $parId = $parArr[count($parArr) - 1];
    }

    // 3、根据这个父城市ID获到它的所有下级城市数组 会得到 广州市的所有下级城市ID (这一步可以直接用现有的函数，这个函数内部会先优先使用缓存的数据，返回结果会包含ID和NAME)
    $data = getCityData($parId);

    foreach ($data as $value) {// 4、循环它的所有下级城市{
        //4.1、在循环体内判断 循环到的城市id是否跟传来的城市id相等，如果相等就返回 这个循环到的城市名称
        if($value['id'] == $id)return $value['name'];
    }
}
function get_all_city_name($id){//根据传来城市ID，返回它和它的的所有上传城市的名称
    $parArr   = getParentCityId($id);
    $parArr[] = $id;
    $city     = '';
    foreach ($parArr as $val) {
        $city .= cityIdToName($val);
    }
    return $city;
}

function jobIdToName($id){//根据职业ID返回职业名称
    $arr = getJobData();//获取所有职业的ID和NAME
    foreach ($arr as $value) {
        if($value['id'] == $id)return $value['name'];
    }
}

function getParentCategoryId($id){//根据分类ID返回所有父级分类ID数组(父级，爷爷级，太爷爷级……)
    //商品分类的缓存用整表缓存（因为分类一般也就几十个或几百个）
    $data = M('Category')->cache('categoryData')->order('order_no')->select();//查询分类表整表数据，但如果有缓存就会用缓存的，不会去查数据库
    $pidArr = array();//将要返回的所有父级分类ID数组，这里相当于声明一个空数组
    $tid = $id;//临时id =传来的id
    //假设传的id是孙，
    for ($i=0; $i < 9; $i++) {
        $tid = getParentCategoryOneId($tid,$data);//临时id = 临时id的父id
        //经过上面一行之后，$tid = 父亲的ID ，第二次循环时 $tid = 爷爷的ID
        if($tid == false || $tid == 0)break;
        $pidArr[] = $tid;//把临时id加入到 将要返回的所有父级分类ID数组 里
        //上面代码把 父亲的ID 加到数组里了 第二次循环时 把 爷爷的ID 加到数组里了
    }
    $pidArr = array_reverse($pidArr);//以相反的元素顺序返回数组。
    return $pidArr;
}
function getParentCategoryOneId($id,$data){//根据分类ID返回父级分类ID
    foreach ($data as $value) {
        if($id == $value['id'])return $value['pid'];
    }
    return false;
}
function categoryIdToName($id){//根据分类ID返回分类名称
    $data = M('Category')->cache('categoryData')->order('order_no')->select();//查询分类表整表数据，但如果有缓存就会用缓存的，不会去查数据库
    foreach ($data as $value) {
        if($id == $value['id'])return $value['name'];
    }
}
function getCategoryData($pid = 0,$order = '普通排序'){//返回传来的分类ID的下级分类记录集，如果不传或传的是0就会返回一级分类记录集 主要是下拉选择框用的
    $arr = array();//声明一个最后要返回的数组
    $data = M('Category')->cache('categoryData')->order('order_no')->select();//查询分类表整表数据，但如果有缓存就会用缓存的，不会去查数据库
    foreach ($data as $value) {//在循环里把符合条件的记录加入到要返回的数组里
        if($pid == $value['pid'] && $value['is_del'] == 0)$arr[] = $value;//父id == 传来的ID就是符合条件的(并且is_del = 0)
    }
    if($order == '首页排序'){
        array_multisort(array_column($arr,'order_index'),SORT_ASC,$arr);
        //array_column(多维数组,数组中的某个键名)  从多维数组中取出某个键名的一列  返回一个一维数组；详见 http://php.net/manual/zh/function.array-column.php
        //array_multisort(数组(一维数组),排序方式(SOTR_ASC,SOTR_DESC),其他数组(可以是二维的))
        //array_multisort 作用是 对多个数组或多维数组进行排序 详见 http://php.net/manual/zh/function.array-multisort.php
    }
    return $arr;//返回$arr这个数组
}

//递归
function getCategoryAllSun($id,&$arr = array()){//获取传来的分类ID的所有下级分类ID数组返回（包括儿子级，孙子级，孙子的儿子……）
    $d = getCategoryData($id);//获取传来的ID的儿子级的记录集数据
    //echo '传来的id=' , $id , "<br>";
    //if($d == false)echo $id , "没有儿子<br>";
    foreach ($d as $value) {
        $arr[] = $value['id'];//把本次获取的儿子级的ID增加到数组里

        //echo '把本次获取的儿子级的ID增加到数组里,id=' , $value['id'] , "<br>";
        //echo '再传本次的儿子ID:' , $value['id'] , '调用此函数<br>';

        getCategoryAllSun($value['id'],$arr);//循环获取儿子的所有下级分类. 
        //此函数要增加是一个数组参数，每被调用一次就把获取到的儿子和孙子级，孙子的儿子……的ID都加入到这个数组里
        //如果数组参数是普通参数的话，下一次此函数被调用时前一次的参数就会消失，解决方法让这个数组参数使用传址方式（传值相关于传复印件，传址就相当于传原件）
    }
    return $arr;
}
function selectHtml($arr){//根据传来的数据参数返回显示下拉菜单的HTML
    //该参数是一个二维数组，有下面的键
    //$data      选项数据，是一个二维数组，结构跟TP模型的select返回的数组一样，是一个像记录集的二维数组
    //$value     预选值       这个键可以没有,没有的将会使用空字符串
    //$name      select的name
    //attribute  附加属性     这个键可以没有,没有的将会用默认值
    //allClass   附加样式     这个键可以没有,没有的将会用默认值
    //addValue   附加选项值   这个键可以没有,没有的将不会显示
    //addText    附加选项文字 这个键可以没有,如果没有这个键但有附加选值那么文字将会和选项值一样。

    //$valueField  如果这个字段名的值跟value相同就让该下拉框被选中  这个键可以没有,默认值为id
    //$textField   显示在下拉框里的文字的数据字段  这个键可以没有,默认值为name

    //有些属性是可以为空就用默认值
    //要判断传来的数组有没有某个键如果没有就给他赋默认值
    if(! array_key_exists('value'      ,$arr))$arr['value'      ] = '';//预选值   默认值为空字符串
    if(! array_key_exists('attribute'  ,$arr))$arr['attribute'  ] = '';//附加属性 默认值为空字符串
    if(! array_key_exists('allClass'   ,$arr))$arr['allClass'   ] = '';//附加样式 默认值为空字符串
    if(! array_key_exists('valueField' ,$arr))$arr['valueField' ] = 'id';
    if(! array_key_exists('textField'  ,$arr))$arr['textField'  ] = 'name';

    $html = '<select ' . $arr['attribute'] . ' name="' . $arr['name'] . '">' . PHP_EOL;
    if(array_key_exists('addValue' ,$arr)){
        if(! array_key_exists('addText' ,$arr))$arr['addText'] = $arr['value'];
        $html .= '    <option value="' . $arr['addValue'] . '">' . $arr['addText'] . '</option>' . PHP_EOL;
    }
    $field     = $arr['valueField'];
    $textField = $arr['textField'];
    foreach ($arr['data'] as $rs){
        if($rs[$field] == $arr['value'] && strlen($rs[$field]) == strlen($arr['value'])){
            $html .= '<option value="' . $rs[$field] . '" selected>' . $rs[$textField] . '</option>' . PHP_EOL;
        }else{
            $html .= '<option value="' . $rs[$field] . '">' . $rs[$textField] . '</option>' . PHP_EOL;
        }
    }
    $html .= '</select>' . PHP_EOL;
    return $html;
}
function myPassword($password){//返回加密的密码
    $password = $password . 'KR5.59X46' . $password . '@UV#(&';//经过这行代码处理之后，这样的密码就很复杂
    return md5($password);//以前一般用md5加密是可以的，但是现在有很多在线网站提供了md5解密的功能，md5本来是解密不了的
    //md5解密的网站或程序是用预先把常用的密码或字符串的组合先算出md5加密的结果，保存起来
    //如果一个密码常用的密码的话，比如是：1234567，他们就可以查询他们有没有保存到这个常用的密码的加密码结果
    //据说他们这些在线解密是预先保存16位或32位所有常用字符串的组合的md5结果
    //echo md5('1234567KR5.59X461234567@UV#(&');//这样复杂的组的密码没有在解密网站的数据库里的常用密码范围内，所以他们查询不出来
    //这个函数的作用其实就是将密码的复杂度增加，让改复杂之后的密码不在破解网站的密码库
}
function rand_str($len)
{//生成随机字符
    $arr = explode(' ','0 1 2 3 4 5 6 7 8 9 a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z');
    $temp = '';
    $arr_count = count($arr);
    for($i = 0;$i < $len;$i++){
        $temp .= $arr[rand(0,$arr_count-1)];
    }
    return $temp;
}
function ipToCity($ip = ''){//根据IP返回城市
    if($ip == '')return '';
    $temp = substr($ip,0,3);
    if($temp == '192' || $temp == '127' || $temp == '0.0')return '局域网';
    $city = F('ip_to_city_' . $ip);//从缓存读取这个IP的所在地区
    if($city)return $city;//如果能读取就返回读取到的城市名
    //如果上面的从缓存读取不到就会执行下面的代码从第三方接口获取IP转地区JSON数据
    $json_str = myCurl('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip);
    if(strlen($json_str) < 20){
        F('ip_to_city_' . $ip,'获取失败');
        return '获取失败';
    }
    $json = json_decode($json_str,true);
    if(! $json)return '';//如果解析JSON失败就返回空值
    $re_arr = array();
    //下面的代码实现如果是正常的就从数组中取出省名 连接上 城市名 然后先缓存起来(用上面说的键)然后再返回
    if(array_key_exists('country',$json)){//判断是否有国家名
        if($json['country'] != '中国'){//如果不是中国的国名也取出存入数组里
            $re_arr[] = $json['country'];
        }
    }
    if(array_key_exists('province',$json)){//判断是否有省名
        $re_arr[] = $json['province'];//取出省名存入数组里
    }
    if(array_key_exists('city',$json)){//判断是否有市名
        $re_arr[] = $json['city'];//取出市名存入数组里
    }
    if(array_key_exists('district"',$json)){//判断是否有区名
        $re_arr[] = $json['district"'];//取出区名
    }
    $area_str = implode(' ',$re_arr);//把前面取出存入数组的国名，省名，市名，区名 连接起来
    F('ip_to_city_' . $ip,$area_str);//把结果缓存
    return $area_str;//返回结果
}

function myCurl($url,$post=array()) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//获取页面内容，不直接输出到页面
    if(count($post) > 0){
        curl_setopt($ch, CURLOPT_POST, 1);
        $post_str = '';
        foreach ($post as $key => $one) {
            $post_str .= $key . '=' . $one . '&';
        }
        $post_str = rtrim($post_str,'&');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
    }
    $re_str = curl_exec($ch);
    curl_close($ch);
    return $re_str;
}
function getLastPid($name = 'pid'){//获取最后一个不为空的同名的表单项的值 主要用是来获取最后一个不为空的父id
    //接收一个参数name 是表单项的名称,默认值是pid
    $arr = I('post.' . $name);
    $pid = $arr[count($arr) - 1];//先获取最后一个 name = 传来的$name 的表单项的value
    if($pid == '' && count($arr) > 1) $pid = $arr[count($arr) - 2];//如果最后一个为空就获取倒数第二个的
    if($pid != ''){
        return $pid;
    }else{
        return 0;
    }
}