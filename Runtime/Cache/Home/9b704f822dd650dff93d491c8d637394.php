<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/Public/Home/images";
var  STATIC = "/Public/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body id="login_body">
	
	<!-- 主体 -->
	
<!-- 头部 -->
<div class="login_header">
    <div class="log_wrap">
        <a href="/" title="乐摇"><img class="logo" src="/Public/Home/images/logo.png"/></a>
        <!--
        <div class="nav_r">
            已有WeiPHP账号？<a href="<?php echo U('User/login');?>">登录</a>
        </div>
        -->
    </div>
</div>

<section class="reg_box log_wrap">
	<form class="login-form fl" action="/index.php?s=/Home/User/register.html" method="post">
    	<h3>注册账号</h3>
      
       <div class="form_body">
       	  <div class="control-group">
            <label class="control-label" for="username">用户名</label>
            <div class="controls">
              <input type="text" id="username" class="span3" placeholder="请输入用户名"  ajaxurl="/user/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
              <span class="tips">该用户名将用于登录系统</span>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
              <span class="tips">填写6位数以上的登录密码</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="repassword">确认密码</label>
            <div class="controls">
              <input type="password" id="repassword" class="span3" placeholder="请再次输入密码" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputMobile">手机号码</label>
            <div class="controls">
              <input type="text" id="inputMobile" class="span3" placeholder="请输入手机号码" errormsg="请填写正确格式的手机号码" nullmsg="请填写手机号码" value=""  name="mobile">
              <span class="tips">用于工作人员联系确认信息</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="truename">联系人</label>
            <div class="controls">
              <input type="text" id="truename" class="span3" placeholder="请输入联系人姓名"   errormsg="请填写1-16位联系人姓名" nullmsg="请填写联系人姓名"  value="" name="truename">
              <span class="tips">用于工作人员联系确认信息</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputEmail">邮箱</label>
            <div class="controls">
              <input type="text" id="inputEmail" class="span3" placeholder="请输入电子邮件"  ajaxurl="/user/checkUserEmailUnique.html" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" datatype="e" value="" name="email">
              <span class="tips">用于发送相关资料</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="verify">验证码</label>
            <div class="controls">
              <div>	
              <input type="text" id="verify" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
              <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
              </div>
              <div class="Validform_checktip text-warning"></div>
            </div>
          </div>
          
          
          <div class="control-group">
          	<label class="control-label">&nbsp;</label>
            <div class="controls">
              <button type="button" id="submitBtn" class="btn">提 交</button>
            </div>
          </div>
      </div>
    </form>
    <div class="fr reg_r">
    	 已有账号？<a href="<?php echo U('User/login');?>">登录</a> 
    </div>
</section>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:none">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

	<!-- /底部 -->
    
	<script type="text/javascript">
		 $(document)		   
	    	.ajaxStart(function(){
	    		$("button").addClass("disabled");
	    	})
	    	.ajaxStop(function(){
	    		$("button").removeClass("disabled");
	    	});
    	 $("#submitBtn").click(function(){
			//console.log('a');
    		var self = $('form');
    		$.post(self.attr("action"), self.serialize(), success, "json");
    		return false;

    		function success(data){
    			if(data.status){
					window.location.href = data.url;							
    			} else {
    				self.find(".Validform_checktip").text(data.info);
    				//刷新验证码
    				$(".reloadverify").click();
    			}
    		}
    	});

		$(function(){
			var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
		});
	</script>

</body>
</html>