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
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<a href="#"><?php echo ($public_info["public_name"]); ?><b class="pl_5 fa fa-sort-down"></b></a>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('publicid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/public/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/publiclink/*'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Public/lists');?>">公众号列表</a></li>
                                <li><a href="<?php echo U ('Home/Public/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>5))); } ?>
<div id="main-container" class="container" style="position:relative">
    <div class="no_side_main_body">
        
<div class="wrap">
<section id="contents">
  <div class="tab-content" style="margin:30px auto;"> 
    
    <!-- 表单 -->
    <form class="form-horizontal bind_step_form" method="post" action="<?php echo U('Home/Public/add', array('from'=>7));?>" id="form" style="overflow:hidden; zoom:1">
      <!-- 基础文档模型 -->
      <div class="tab-pane in tab1" id="tab1">
        <div class="item_wrap">
          <h3 style="padding-bottom:30px; text-align:center">初始化账号信息</h3>              
          <div class="form-item cf">
            <label class="item-label"> 上传网站LOGO </label>
            <div class="controls uploadrow2" title="点击修改图片" rel="website_logo">
              <input type="file" id="upload_picture_website_logo">
              <input type="hidden" name="website_logo" id="cover_id_website_logo" value="<?php echo ($info["website_logo"]); ?>"/>
              <div class="upload-img-box">
                <?php if(!empty($info[website_logo])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($info[website_logo])); ?>"/></div>
                  <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
              </div>
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 管理员头像 </label>
            <div class="controls uploadrow2" title="点击修改图片" rel="headface_url">
              <input type="file" id="upload_picture_headface_url">
              <input type="hidden" name="headface_url" id="cover_id_headface_url" value="<?php echo ($info["headface_url"]); ?>"/>
              <div class="upload-img-box">
                <?php if(!empty($info[headface_url])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($info[headface_url])); ?>"/></div>
                  <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
              </div>
            </div>
          </div>
          <div class="form-item cf toggle-copy_right">
            <label class="item-label"> 版权信息 <span class="check-tips">(例如:XXX版权所有，圆梦云制作) </span></label>
            <div class="controls">
              <input type="text" value="<?php echo ($info["copy_right"]); ?>" name="copy_right" class="text input-large">
            </div>
          </div>
          <!--        <div class="form-item cf toggle-GammaAppId">
          <label class="item-label"> GammaAppId <span class="check-tips"> （由摇电视平台提供的GammaAppId） </span></label>
          <div class="controls">
            <input type="text" value="<?php echo ($info["GammaAppId"]); ?>" name="GammaAppId" class="text input-large">
          </div>
        </div>
        <div class="form-item cf toggle-GammaSecret">
          <label class="item-label"> GammaSecret <span class="check-tips"> （由摇电视平台提供的GammaSecret） </span></label>
          <div class="controls">
            <input type="text" value="<?php echo ($info["GammaSecret"]); ?>" name="GammaSecret" class="text input-large">
          </div>
        </div>-->
          
          <div class="form-item cf toggle-tongji_code">
            <label class="item-label"> 第三方统计代码 <span class="check-tips"></span></label>
            <div class="controls">
              <textarea  name="tongji_code" class="textarea input-large"><?php echo ($info["tongji_code"]); ?></textarea>
            </div>
          </div>
<!--          <div class="form-item cf toggle-tips_url" style="display:none">
            <label class="item-label">提示关注公众号的文章地址 <span class="check-tips"> </span></label>
            <div class="controls">
              <input type="text" value="<?php echo ($info["tips_url"]); ?>" name="tips_url" class="text input-large">
            </div>
          </div>
        </div>-->
        <div class="form-item cf mt_10 bind_step_form_next_item">
          <input type="hidden" name="id" value="<?php echo (intval($id)); ?>">
          <button target-form="form-horizontal" type="submit" id="submit" class="btn submit-btn ajax-post">提 交</button>
          <br/>
          <p style="padding:20px 0;">配置信息遇到问题？<a href="<?php echo U('Home/index/lead');?>" target="_blank">点击查看接入指引</a></p>
        </div>
      </div>
    </form>
  </div>
  
  <!--帮助消息
  <div class="help_content">
      <h3>帮助信息</h3>
      <p>以上消息可以从公众平台里找到，如下图</p>
      <p><img src="<?php echo SITE_URL;?>/Public/Home/images/help01.png" width="800"></p>
      <a name="setting"></a>
       <p>配置域名授权：在开发者中心，功能列表里配置，配置授权域名如下图</p>
      <p><img src="<?php echo SITE_URL;?>/Public/Home/images/help05.png" width="800"></p>
       <p>配置JS接口安全域名，在公众号设置-功能配置里面配置，配置JS安全域名如下图</p>
      <p><img src="<?php echo SITE_URL;?>/Public/Home/images/help06.png" width="800"></p>
  </div>
  --> 
</section>

    </div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

  <link href="/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <?php if(C('COLOR_STYLE')=='blue_color') echo '
    <link href="/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
  <script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
	 initUploadImg();
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });	
    showTab();
});
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>