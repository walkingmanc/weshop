<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var IMG_PATH = "/Public/Home/images";
		var STATIC_PATH = "/Public/static";
		var SITE_URL = "<?php echo SITE_URL;?>";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="http://yaotv.qq.com/shake_tv/include/js/lib/zepto.1.1.4.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/Public/Home/js/prefixfree.min.js,/Public/Home/js/m/dialog.js,/Public/Home/js/m/flipsnap.min.js,/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/mobile/common.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
    <div class="container">
    	<form action="<?php echo U('add_address');?>" method="post" onSubmit="return tgSubmit()">
            <div class="address_form">
            	<div class="addressItem tb">
                    <label for="truename" class="flex_1">收货人</label>
                    <div class="right flex_1">
                        <input type="text" name="truename" id="truename" value="<?php echo ($info["truename"]); ?>"/>
                    </div>
                </div>
                <div class="addressItem tb">
                    <label for="mobile" class="flex_1">手机号码</label>
                    <div class="right flex_1">
                        <input type="text" name="mobile" id="mobile" value="<?php echo ($info["mobile"]); ?>"/>
                    </div>
                </div>
                <div class="addressItem tb">
                    <label for="address" class="flex_1">收货地址</label>
                    <div class="right flex_1 ">
                        <div id="cascade_city"></div>
                       <?php echo hook('cascade', array('name'=>'city','value'=>$info['city'],'extra'=>'module=city'));?>
                       
                        <input type="text" name="address" id="address" value="<?php echo ($info["address"]); ?>" />
                    </div>
                </div>
                <div class="addressItem tb">
                    <label for="is_use" class="flex_1">设置为默认地址</label>
                    <div class="right flex_1">
                        <label class="radio"><input type="radio" value="0" name="is_use" <?php if(($info[is_use]) == "0"): ?>checked="checked"<?php endif; ?> />否 </label>
                        <label class="radio"><input type="radio" value="1" name="is_use" <?php if(($info[is_use]) == "1"): ?>checked="checked"<?php endif; ?> />是 </label>
                    </div>
                </div>                
            </div>
   			<div class="m_15" style="position:static">
                <?php if(!empty($info["id"])): ?><input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" /><?php endif; ?>
                <input type="hidden" name="from" value="<?php echo I('from');?>"/>
                <button class="btn" type="submit">保存</button>
            </div>
        </form>
    </div>	
<script type="text/javascript">
function tgSubmit() {      
	var userName = $('#truename').val();
	if ($.trim(userName) == "") {
		$.Dialog.fail('请填写姓名');
		return false;
	}
	var userPhone = $("#mobile").val();
	if ($.trim(userPhone) == "") {
		$.Dialog.fail('请填写您的手机号码');
		return false;
	}                   
	var patrn = /^0?(13[0-9]|15[0123456789]|18[0123456789]|14[0123456789])[0-9]{8}$/;
	if (!patrn.exec($.trim(userPhone))) {
		$.Dialog.fail('手机号格式错误');
		return false;
	}
	return true;
}
</script>
</body>
</html>