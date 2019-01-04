{{include file="common/header.php"}}

<div class="main left">
    <form id="fromID">
        <input type="hidden" name="id" value="{{$detail.id}}"/>
        <table class="content" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th class="left-txt">应用名称：</th>
                <td>
                    <input type="text" name="api_name" class="input-text" value="{{$detail.api_name}}">
                    <div class="w90" style="color:grey;">（长度不大于20个字符）</div>
                </td>
            </tr>
            <tr>
                <th class="left-txt">应用标识：</th>
                <td>
                    <input type="text" name="api_key" class="input-text" value="{{$detail.api_key}}">
                    <div class="w90" style="color:grey;">（字母、数字、下划线、存折号组成且长度不大于20个字符）</div>
                </td>
            </tr>
            <tr>
                <th class="left-txt">应用类型：</th>
                <td>
                    <select name="api_type" class="form-control">
                        <option {{if $detail.api_type == 'app' }}selected="selected"{{/if}} value="app">APP/M/PC 专用</option>
                        <option {{if $detail.api_type == 'activity'}}selected="selected"{{/if}} value="activity">活动专用</option>
                        <option {{if $detail.api_type == 'admin'}}selected="selected"{{/if}} value="admin">管理后台专用</option>
                    </selected>
                </td>
            </tr>
            <tr>
                <th class="left-txt">应用密钥：</th>
                <td>
                    <input type="text" name="api_secret" class="input-text" value="{{$detail.api_secret}}">
                    <div class="w90" style="color:grey;">(长度为32位的字符串,一般都是md5字符串)</div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <span><input class="btn btn-default" id="submitID" type="button" value="保存并提交"></span>
                </td>
            </tr>
        </table>
    </form>
</div>

<script type="text/javascript">
    //表单提交
    $(function (){
        $('#submitID').click(function () {
            var fromData = $('#fromID').serialize();
            $.ajax({
                type: 'post',
                data: fromData,
                dataType:'json',
                url: "{{'Api/edit'|url}}",
                success: function(rsp) {
                    if (rsp.code == 200) {
                        success(rsp.msg, 1, 'parent');
                    } else {
                        fail(rsp.msg, 3);
                    }
                }
            });
        });
    });
</script>

{{include file="common/footer.php"}}