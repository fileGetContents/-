<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
    <link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<form action="<?php echo  site_url('Wanhuu_project/add_pro');?>"  enctype="multipart/form-data"  method="post" >

    <div class="menber-content">
        <div id="new_table">
            <table class="modal_form" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td class="item_title">项目名称:</td>
                    <td class="item_input">
                        <input type="text" name="project[]"  />
                    </td>
                </tr>
                <tr>
                    <td class="item_title" >项目类型:</td>
                    <td class="item_input">
                        <input type="text"  name="project[]" />
                    </td>
                </tr>
                <tr>
                    <td class="item_title">项目简介:</td>
                    <td class="item_input">
                        <div>
                            <script id="editor" name="project[]"  type="text/plain" style="width:1000px;"></script>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="item_title">项目方:</td>
                    <td class="item_input">
                        <div>
                            <script id="editor1" name="project[]"  type="text/plain" style="width:1000px;"> </script>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="item_title">风控保障:</td>
                    <td class="item_input">
                        <div>
                            <script id="editor2" name="project_control"  type="text/plain" style="width:1000px;"> </script>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="item_title">轮播图1:</td>
                    <td class="item_input">
                        <input   type="file"  name="images1"  />
                    </td>
                </tr>

                <tr>
                    <td class="item_title">轮播图2:</td>
                    <td class="item_input">
                        <input type="file"   name="images2"  />
                    </td>
                </tr>

                <tr>
                    <td class="item_title">轮播图3:</td>
                    <td class="item_input">
                        <input type="file"   readonly="readonly"  name="images3"   />
                    </td>
                </tr>


                <tr>
                    <td class="item_title">轮播图4:</td>
                    <td class="item_input">
                        <input type="file"  readonly="readonly"  name="images4"  />
                    </td>
                </tr>

                <tr>
                    <td class="item_title">轮播图5:</td>
                    <td class="item_input">
                        <input type="file"  readonly="readonly"  name="images5" />
                    </td>
                </tr>


                <tr>
                    <td class="item_title">首页/列表图:</td>
                    <td class="item_input">
                        <input type="file"  readonly="readonly"  name="images"  />
                    </td>
                </tr>

                <tr>
                    <td class="item_title">项目logo:</td>
                    <td class="item_input">
                        <input type="file"  readonly="readonly"  name="logo" />
                    </td>
                </tr>


                <tr>
                    <td class="item_title">项目开始时间:</td>
                    <td class="item_input">
                        <input name="project[]"  type="datetime-local" >
                    </td>
                </tr>
                <tr>
                    <td class="item_title">项目赎回时间:</td>
                    <td class="item_input">
                        <input name="project[]"  type="datetime-local" />
                    </td>
                </tr>
                <tr>
                    <td class="item_title">项目结束时间:</td>
                    <td class="item_input">
                        <input name="project[]"  type="datetime-local" />
                    </td>
                </tr>
                <tr>
                    <td class="item_title">项目周期:</td>
                    <td class="item_input">
                        <input type="text" name="project[]"  />
                    </td
                </tr>
                <tr>
                    <td class="item_title">目标总金额:</td>
                    <td class="item_input">
                        <input type="text" name="project[]" >
                    </td>
                </tr>
                <tr>
                    <td class="item_title">项目:</td>
                    <td>
                        <div id="add_project">
                                <div class="pjt_plan">
                                    <span>档位：</span>
                                    <select name="gear[]"  id="">
                                        <option value="3">3个月</option>
                                        <option value="6">6个月</option>
                                        <option value="9">9个月</option>
                                        <option value="12">12个月</option>
                                        <option value="18">18个月</option>
                                        <option value="24">24个月</option>
                                    </select>
                                    <span>金额：</span>
                                    <input type="text" name="gear[]"    />
                                    <span>年化：</span>
                                    <input type="text" name="gear[]"    />
                                    <span>每份金额：</span>
                                    <input type="text" name="gear[]"   />
                                    <span>方式：</span>
                                    <input type="text" name="gear[]"    readonly="readonly"  value="1"/>
                                    图片:  <input  type="file"  style="width:170px" name="way1"/>
                                    合同:  <input  style="width:170px" type="file" name="way1_pdf"/>
                                    <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                                </div>

                            <div class="pjt_plan">
                                <span>档位：</span>
                                <select name="gear[]"  id="">
                                    <option value="3">3个月</option>
                                    <option value="6">6个月</option>
                                    <option value="9">9个月</option>
                                    <option value="12">12个月</option>
                                    <option value="18">18个月</option>
                                    <option value="24">24个月</option>
                                </select>
                                <span>金额：</span>
                                <input type="text" name="gear[]"    />
                                <span>年化：</span>
                                <input type="text" name="gear[]"    />
                                <span>每份金额：</span>
                                <input type="text" name="gear[]"   />
                                <span>方式：</span>
                                <input type="text" name="gear[]"    readonly="readonly"  value="2"/>
                                图片： <input type="file" style="width:170px" name="way2"/>
                                合同： <input  style="width:170px" type="file" name="way2_pdf"/>
                                <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                            </div>
                            <div class="pjt_plan">
                                <span>档位：</span>
                                <select name="gear[]"  id="">
                                    <option value="3">3个月</option>
                                    <option value="6">6个月</option>
                                    <option value="9">9个月</option>
                                    <option value="12">12个月</option>
                                    <option value="18">18个月</option>
                                    <option value="24">24个月</option>
                                </select>
                                <span>金额：</span>
                                <input type="text" name="gear[]"    />
                                <span>年化：</span>
                                <input type="text" name="gear[]"    />
                                <span>每份金额：</span>
                                <input type="text" name="gear[]"   />
                                <span>方式：</span>
                                <input type="text" name="gear[]"    readonly="readonly"  value="3"/>
                               图片: <input  type="file"  style="width:170px" name="way3"/>
                               合同: <input  style="width:170px" type="file" name="way3_pdf"/>
                                <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                            </div>
                            <div class="pjt_plan">
                                <span>档位：</span>
                                <select name="gear[]"  id="">
                                    <option value="3">3个月</option>
                                    <option value="6">6个月</option>
                                    <option value="9">9个月</option>
                                    <option value="12">12个月</option>
                                    <option value="18">18个月</option>
                                    <option value="24">24个月</option>
                                </select>
                                <span>金额：</span>
                                <input type="text" name="gear[]"    />
                                <span>年化：</span>
                                <input type="text" name="gear[]"    />
                                <span>每份金额：</span>
                                <input type="text" name="gear[]"   />
                                <span>方式：</span>
                                <input type="text" name="gear[]"    readonly="readonly"  value="4"/>
                               图片： <input type="file" style="width:170px" name="way4"/>
                               合同： <input  style="width:170px" type="file" name="way4_pdf"/>
                                <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                            </div>
                            <div class="pjt_plan">
                                <span>档位：</span>
                                <select name="gear[]"  id="">
                                    <option value="3">3个月</option>
                                    <option value="6">6个月</option>
                                    <option value="9">9个月</option>
                                    <option value="12">12个月</option>
                                    <option value="18">18个月</option>
                                    <option value="24">24个月</option>
                                </select>
                                <span>金额：</span>
                                <input type="text" name="gear[]"    />
                                <span>年化：</span>
                                <input type="text" name="gear[]"    />
                                <span>每份金额：</span>
                                <input type="text" name="gear[]"   />
                                <span>方式：</span>
                                <input type="text" name="gear[]"    readonly="readonly"  value="5"/>
                                图片：<input  type="file" style="width:170px" name="way5"/>
                                合同： <input  style="width:170px" type="file" name="way5_pdf"/>
                                <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                            </div>
                            <div class="pjt_plan">
                                <span>档位：</span>
                                <select name="gear[]"  id="">
                                    <option value="3">3个月</option>
                                    <option value="6">6个月</option>
                                    <option value="9">9个月</option>
                                    <option value="12">12个月</option>
                                    <option value="18">18个月</option>
                                    <option value="24">24个月</option>
                                </select>
                                <span>金额：</span>
                                <input type="text" name="gear[]"    />
                                <span>年化：</span>
                                <input type="text" name="gear[]"    />
                                <span>每份金额：</span>
                                <input type="text" name="gear[]"   />
                                <span>方式：</span>
                                <input type="text" name="gear[]"    readonly="readonly"  value="6"/>
                                图片: <input  style="width:170px"  type="file" name="way6">
                                合同： <input  style="width:170px" type="file" name="way6_pdf"/>
                                <a href="javascript:void(0);" onclick="funct(this);">更多</a>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="item_title">项目状态:</td>
                    <td class="item_input">
                        <select name="project[]"  id="">
                            <option value="2">预约</option>
                            <option value="1">筹集中</option>
                            <option value="0">完成</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="item_title">预约金:</td>
                    <td class="item_input">
                        <input type="text" name="project[]"  value="10"><span>%</span>
                    </td>
                </tr>

                <tr>
                    <td class="item_title">签字开始页面:</td>
                    <td class="item_input">
                        <input type="text" name="sign_start" ><span></span>
                    </td>
                </tr>

                <tr>
                   <td>
                       项目合同:
                   </td>
                    <td>
                        <table>
                            <tr>
                                <td>名字:<input type="text" name="project_contract_name[]"></td>
                                <td><input type="file" name="contract_1"></td>
                                <td  class="morethan">更多</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="item_title"></td>
                    <td class="item_submit item_fanhui">
                        <input type="submit" class="button" value="新增">
                        <a onclick="history.back(-1)" target="menuFrame">返回列表</a>
                    </td>
                </tr>
                <!--				</tbody>-->
                <!--			</table>-->
                <!--		</div>-->
                <!--	</div>-->

</form>
</body>





<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript">
      $(function(){
          var  i=2;
         $(".morethan").click(function(){
            var  c="contract_"+i;
            var  b='<tr>' +
                '<td>名字: <input type="text" name="project_contract_name[]"></td>' +
                '<td><input type="file" name="'+c+'"></td>' +
                '</tr>';
             $(this).parent().parent().append(b);
             i++;
         })
       })

</script>

<!-- 插件 -->
<script type="text/javascript" charset="utf-8" src="<?php echo  base_url('admin/demo/ueditor.config.js'); ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo  base_url('admin/demo/ueditor.all.min.js'); ?>"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo  base_url('admin/demo/lang/zh-cn/zh-cn.js'); ?>"></script>
<script>

    // 添加档位
    function funct(dd){
        $(dd).parents().next().show();
        $(dd).hide();
    }
</script>
<!-- 插件 -->
<script>
    $(function(){
        // table 搜索
        $('#key').keyup(function(){
            $('#table tbody tr').hide().filter(":contains('" +($(this).val()) + "')").show();
        }).keyup();//DOM加载完时，绑定事件完成之后立即触发

        // table 全选
        $("#table input[name='select']").click(function(){
            //判断当前点击的复选框处于什么状态$(this).is(":checked") 返回的是布尔类型
            if($(this).is(":checked")){
                $("#table input[name='option']").prop("checked",true);
            }else{
                $("#table input[name='option']").prop("checked",false);
            }
        });
    });

    // 添加项目
    function add_project(odj){
        $("#add_project").append("<div class='pjt_plan'><span>等级：</span><input type='text'><span>金额：</span><input type='text'><span>年华：</span><input type='text'></div>");
    }
</script>


<!-- 图片上传 demo插件 -->
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    var ue= UE.getEditor('editor1');
    var ue= UE.getEditor('editor2');
    var ue= UE.getEditor('editor3');
    var ue= UE.getEditor('editor4');
    var ue= UE.getEditor('editor5');
    var ue= UE.getEditor('editor6');
    var ue= UE.getEditor('editor7');
    var ue= UE.getEditor('editor8');
    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
<!-- 图片上传 demo插件 -->


</html>