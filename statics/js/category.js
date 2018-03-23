// 1.由于下拉选择框是动态生成的，数量是不定的，所以要给他的父标签绑定事件，
$('#select_category').change(
    function (event){
        event.stopPropagation();//阻止事件冒泡 给父标签绑定事件，但实际上要处理的是子标签的事件，这种叫“事件委托”
        // 2.然后在事件处理器里事件对象获取发生事件select元素
        var select = event.target;//事件对象的.target 它是DOM元素
        var value = select.value;//// 3.获取选中项的value
        $(select).nextAll().remove();//4.删除这个下拉选择框后面的所有的下一个兄弟节点
        if(value == ''){//如果是选了请选择的话，下拉选择框的value就会为空，这样就不应该再获取下级。所以这里判断了一下，
            lastSelect = $('#select_category select:last');
            var orderSelect = $('.order_no_td select');
            orderSelect.html(lastSelect.html());
            orderSelect.children('[value=""]').remove();//把value为空的元素，也就是把【请选择】删除掉
            orderSelect.val($('.order_no_td select option:last').val());//让最后一个option被选中，因为默认排序是排到同级的最后一个元素后面
            var size = orderSelect.children().length/2;
            if(size > 8)size = 8;
            orderSelect.attr('size',size);
            return;//如果为空就返回,执行了return后，后面的代码就不会运行
        }

        var url = AJAX_URL_CATEGORY.replace(/CITY_ID_CITY_ID_CITY_ID/,value);
        //6.用ajax获取下级选项数据
        $.get(url,'',
            function (data,state){
                if(state == 'success'){
                    if(data.code != 'ok'){
                        alert(data.msg);
                        return;
                    }
                    if(data.data.length > 0){//如果返回的下级城市的数量为0就不执行里面添加选项的代码，
                        $(select).after('<select name="' + $(select).attr('name') + '"><option value="">请选择</option></select>');//5.在下拉选择框后面增加一个下拉选择框
                        var lastSelect = $('#select_category select:last');
                        for(var i in data.data){//7.循环获取下级选项数据，添加到新的下拉选择框里
                            lastSelect.append('<option value="' + data.data[i]['id'] + '">' + data.data[i]['name'] + '</option>');
                        }
                    }
                }else{
                    alert('获取下级选项数据时发生错误');
                }
                lastSelect = $('#select_category select:last');//获取最后一个上级分类选择框
                var orderSelect = $('.order_no_td select');//获取普通排序选择框 和首页排序选择框
                if(lastSelect.val() == ''){//判断 最后一个上级分类选择框 的value 是不是为空 如果为空就说明这个 最后一个上级分类选择框的选中项是请选择
                    orderSelect.html(lastSelect.html());//给 普通排序选择框 和首页排序选择框 的HTML设置为 跟 最后一个上级分类选择框 里的HTML一样
                    orderSelect.children('[value=""]').remove();//把value为空的元素，也就是把【请选择】删除掉
                    orderSelect.val($('.order_no_td select option:last').val());//让最后一个option被选中，因为默认排序是排到同级的最后一个元素后面
                }else{//如果 最后一个上级分类选择框 选中项不是【请选择】那说明这个分类没有下级分类
                    orderSelect.html('<option value="">' + lastSelect.children(':selected').text() + '没有下级分类 添加它的下级分类就会排第一</option>');
                }
                var size = orderSelect.children().length/2;
                if(size > 8)size = 8;
                orderSelect.attr('size',size);
            }
        ,'json');
    }
);

$('input[name="ico"]').change(
    function (event){
        if(this.files.length > 0){
            var file = this.files[0];
            if(!/image\/\w+/.test(file.type)){  
                alert('请选择一个图片文件，不要选择其它格式的文件');
                return false;  
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);//将文件读取为DataURL
            reader.addEventListener('load',
                function (){
                    var img = new Image();//创建一个图片元素,跟 var img = document.createElement('img'); 的效果一样
                    img.src = this.result;

                    //给图片绑定载入完成事件
                    img.addEventListener('load',
                        function (){
                            var c = document.getElementById('myCanvas1');
                            var ctx = c.getContext('2d');

                            var whrIn = this.width / this.height;//原图宽高比 （这里说的原图是指用户选择的要上传的图片）
                            var whrOk = c.width / c.height;//最佳宽高比 画布的大小按设计图的最佳比例做好

                            if(whrIn > whrOk){
                                //如果 原图宽高比 比 最佳宽高比 大，说明原图的宽度比例太大，需要截掉宽度
                                //需要截掉的宽度应该 = (当前图片的宽度 - 当前图片高度下的最佳宽度) / 2;
                                //想一怎么获取 当前图片高度下的最佳宽度
                                //当前图片高度下的最佳宽度 = 原图高度 * 最佳宽度 / 最佳高度
                                var okWidth = this.height * c.width / c.height;//B * C = A * D 所以 A = B*C/D
                                var needChp = (this.width - okWidth) / 2;
                                ctx.drawImage(this,needChp,0,okWidth,this.height,0,0,c.width,c.height);
                            }else{
                                //如果 原图宽高比 比 最佳宽高比 小，则是高度太大需要截掉高度
                                //需要截掉的高度应该 = (当前图片的高度 - 当前图片宽度下的最佳高度) / 2;
                                //最佳高度 = 原图宽度 * 最佳高度 / 最佳宽度
                                var okHeight = this.width * c.height / c.width;
                                var needChp = (this.height - okHeight) / 2;
                                ctx.drawImage(this,0,needChp,this.width,okHeight,0,0,c.width,c.height);
                            }
                        }
                    );
                }
            );
        }
    }
);