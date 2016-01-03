<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|WeiPHP管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css?v=<?php echo SITE_VERSION;?>" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/store.css?v=<?php echo SITE_VERSION;?>" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css?v=<?php echo SITE_VERSION;?>" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION;?>"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo" <?php if(C('SYSTEM_LOGO')) { ?> style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo C('SYSTEM_LOGO');?>') no-repeat " <?php } ?>></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo (get_nickname($mid)); ?>"><?php echo (get_nickname($mid)); ?></em></li>
                <li><a href="<?php echo U('Home/Index/index');?>">返回前台</a></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
  <!-- 标题栏 -->
  
  <div class="main-title">
    <h2>在线升级</h2>
  </div>
  <h4>1、升级操作教程</h4>
  <p>第一步：备份服务器文件，为了安全和方便如果升级失败能恢复原样，请一定要把你的整个网站的文件进行备份</p>
  <p>第二步：备份数据库，把数据库导出成SQL文件进行备份</p>
  <p>第三步：下载升级包，如果有多个升级包，一定要注意按升级包的版本号从小到大顺序下载升级，否则会导致系统异常</p>
  <p>第四步：解压升级包，查看里面的readem.txt升级说明，如果里面有升级操作说明，优先按里面的说明进行升级操作</p>
  <p>第五步：把升级包里的文件上传到你的网站，并覆盖旧文件。覆盖前请确认已经做好备份，如果你的网站文件有修改过，请覆盖前用文件对比工具进行对比，确认是否可以覆盖。</p>
  <p>第六步：如果升级包的根目录下有update_db_tool.php，说明需要升级数据库，请使用下面的数据库升级工具进行升级</p>
  <p>第七步：清空缓存，把 Runtime 目录下的目录和文件全部删除即可，至此升级完毕</p>
  <p>&nbsp;</p>
  <?php if(!empty($noWritable)) { ?>
  建议设置目录：
  <?php if(is_array($noWritable)): $i = 0; $__LIST__ = $noWritable;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
  的可写权限来开启一键升级这个简单而高效的功能
  <?php } ?>
  <p>&nbsp;</p>
  <div> </div>
  <div>
    <h4>2、数据库升级工具</h4>
    <p>此工具可用于执行升级包里的数据库升级文件：update_db_tool.php，请先确认此升级文件已经放到网站根目录，然后点击下面的升级按钮升级即可。升级完后要及时把update_db_tool.php文件删除，以防重复升级导致数据库数据错乱</p>
    <a class="btn" href="<?php echo U('admin/Update/deal_sql');?>">升级数据库</a>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

  <div id="showInfomation"></div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
                <div class="fr">V<?php echo C('SYSTEM_UPDATRE_VERSION');?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
	var  IMG_PATH = "/Public/Admin/images";
	var  STATIC = "/Public/static";
	var  ROOT = "";
	var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
	var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
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
    <script type="text/javascript" src="/Public/static/think.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
<script type="text/javascript">
function showMsg(msg){
	$('#data-table').hide();
    $('#showInfomation').html('<div id="listInfo"><div class="content"><h3 class="center"><img src="/Public/Admin/images/loading_icon.gif" class="mr10"/>'+msg+'...</h3></div></div>');
}
function needUpateOther(title){
	updateAlert('您需要先升级 ' + title + ' 这个升级包后才能更新此升级包');
	setTimeout(function(){
		$('#top-alert').find('button').click();
		$(that).removeClass('disabled').prop('disabled',false);
	},3000);
}
function checkVersion(){
    showMsg('更新版本查询中');
    var postURL = "<?php echo U('admin/Update/step01_checkVersionByAjax');?>";
	$.post(postURL, {id:1}, function(res){
	    $('#showInfomation').html(res);
	});
}
function downloadPackage(version){
	showMsg('下载更新包中...请稍等');    
    var postURL = "<?php echo U('admin/Update/step02_download');?>";
	$.post(postURL, {version:version}, function(res){
	    if(res==0){
		   $('#showInfomation').html('<div id="listInfo"><div class="content"><h3 class="center">更新包下载失败，请检查你的网络连接是否正常</h3></div></div>');
		}else{
		   window.location.href="<?php echo U('admin/Update/index');?>&step=unzipPackage&version=" + version;
		}
	});
}
function unzipPackage(){
    showMsg('更新包解压中');
    var version = "<?php echo $_GET['version']|t;?>";
	var postURL = "<?php echo U('admin/Update/step03_unzipPackage');?>&version=" + version;
	$.post(postURL, {id:1}, function(res){
	    if(res!=1){
		   $('#showInfomation').html(res);
		}else{
		   window.location.href="<?php echo U('admin/Update/index');?>&step=checkFileIsWritable&version=" + version;
		}
	});	
}
function checkFileIsWritable(){
    showMsg('判断系统文件的可写权限');
	var packageName = "<?php echo $_GET['packageName']|t;?>";
	var postURL = "<?php echo U('admin/Update/step04_checkFileIsWritable');?>&packageName=" + packageName;
	$.post(postURL, {id:1}, function(res){
         if(res!=1){
		   $('#showInfomation').html(res);
		}else{
		   window.location.href="<?php echo U('admin/Update/index');?>&step=copyFileToProject";
		}
	});	
}
function copyFileToProject(){
    showMsg('更新系统文件中');    
	var postURL = "<?php echo U('admin/Update/step06_overWritten');?>";
	$.post(postURL, {id:1}, function(res){
         if(res!=1){
		   $('#showInfomation').html(res);
		}else{
		   window.location.href="<?php echo U('admin/Update/index');?>&step=dealsql";
		}
	});	
}

function dealsql(){
    showMsg('更新数据库数据中');    
	var postURL = "<?php echo U('admin/Update/step07_dealSQL');?>";
	$.post(postURL, {id:1}, function(res){
	    window.location.href="<?php echo U('admin/Update/index');?>&step=finishUpate";
	});	
}

function finishUpate(){
    showMsg('正在完成升级操作');    
	var postURL = "<?php echo U('admin/Update/step08_finishUpate');?>";
	$.post(postURL, {id:1}, function(res){
	    if(res==1){
		   window.location.href="<?php echo U('admin/Update/upateAll');?>";
		}else{
		   window.location.href="<?php echo U('admin/Update/index');?>";
		}
	});
}
var step = "<?php echo $_GET['step']|t;?>";

if(step=='unzipPackage'){
    unzipPackage();
}else if(step=='checkFileIsWritable'){
    checkFileIsWritable();
}else if(step=='copyFileToProject'){
    copyFileToProject();
}else if(step=='dealsql'){
    dealsql();
}else if(step=='finishUpate'){
    finishUpate();	
}else{
    checkVersion();
}
$(function(){
	 //导航高亮
    highlight_subnav('<?php echo U('index');?>');
});
</script>

</body>
</html>