// 1.由于下拉选择框是动态生成的，数量是不定的，所以要给他的父标签绑定事件，
$('#select_city').change(
    function (event){
        event.stopPropagation();//阻止事件冒泡
        // 2.然后在事件处理器里事件对象获取发生事件select元素
        var select = event.target;//事件对象的.target 它是DOM元素
        var value = select.value;//// 3.获取选中项的value
        $(select).nextAll().remove();//4.删除这个下拉选择框后面的所有的下一个兄弟节点
        if(value == '')return;//如果是选了请选择的话，下拉选择框的value就会为空，这样就不应该再获取下级。所以这里判断了一下，如果为空就返回,执行了return后，后面的代码就不会运行

        var url = AJAX_URL_CITY.replace(/CITY_ID_CITY_ID_CITY_ID/,value);
        //6.用ajax获取下级选项数据
        $.get(url,'',
            function (data,state){
                if(state == 'success'){
                    if(data.code != 'ok'){
                        alert(data.msg);
                        return;
                    }
                    if(data.data.length > 0){//如果返回的下级城市的数量为0就不执行里面添加选项的代码，
                        $(select).after('<select name="' +  $(select).attr('name') + '"><option value="">请选择</option></select>');//5.在下拉选择框后面增加一个下拉选择框
                        var lastSelect = $('#select_city select:last');
                        for(var i in data.data){//7.循环获取下级选项数据，添加到新的下拉选择框里
                            lastSelect.append('<option value="' + data.data[i]['id'] + '">' + data.data[i]['name'] + '</option>');
                            //怎么访问多维数组里面的元素 怎么循环多维数组里面的数组，这也是一个比较重点的，有空可以多练习
                        }
                    }
                }else{
                    alert('发生错误');
                }
            }
        ,'json');
    }
);