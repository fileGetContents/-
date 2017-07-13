<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
    <link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<div class="modal">
        <table class="modal_form" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td class="item_title">发送账户:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_user_phone'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title">发送邮箱:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_user_email'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title">发送时间:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_time'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title">邮件标题:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_name'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title">邮件内容:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_content'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title">发送方式:</td>
                <td class="item_input">
                    <?php echo $email[0]['email_way'] ;?>
                </td>
            </tr>
            <tr>
                <td class="item_title"></td>
                <td class="item_submit item_fanhui">
                    <a href="javascript:history.back(-1)">返回</a>
                </td>
            </tr>
            </tbody>
        </table>
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
</body>
</html>