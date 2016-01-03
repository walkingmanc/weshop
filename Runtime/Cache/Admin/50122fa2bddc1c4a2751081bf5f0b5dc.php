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
		<h2><?php echo ($meta_title); ?></h2>
	</div>
    <div class="cf">
		<div class="fl">
		<a href="<?php echo U('create', 'type='.$type);?>" class="btn">快速创建</a>
        <a href="<?php echo U('admin/AddonCategory/lists');?>" class="btn">分类管理</a>
        </div>

        <!-- 高级搜索 -->
		<div class="search-form fr cf">
            <div class="sleft">
                <select name="group">
                        <option value="<?php echo U('Admin/Addons/index',array('cate_id'=>0,'title'=>I('title')));?>" <?php if(($$cate_id) == "0"): ?>selected<?php endif; ?> >全部插件</option>
                        <option value="<?php echo U('Admin/Addons/index',array('cate_id'=>'-1','title'=>I('title')));?>" <?php if(($$cate_id) == "-1"): ?>selected<?php endif; ?> >无分类插件</option>
                    <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo U('Admin/Addons/index',array('cate_id'=>$vo['id'],'title'=>I('title')));?>" <?php if(($vo['id']) == $cate_id): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
<!--            <div class="sleft">
                    <input type="text" name="title" class="search-input" value="<?php echo I('title');?>" placeholder="请输入插件名">
                    <a class="sch-btn" href="javascript:;" id="search" url="<?php echo U('index',array('cate_id'=>$cate_id));?>"><i class="btn-search"></i></a>
            </div>-->
      </div>
    </div>
     <!-- 高级搜索 -->
		
	<!-- 数据列表 -->
	<div class="data-table table-striped">
		<table>
			<thead>
				<tr>
					<th width="50px">名称</th>
					<th width="50px">标识</th>
                    <th width="50px">分类</th>
					<th width="50">是否在前台导航显示</th>
					<th width="25px">状态</th>
					<th width="50px">作者</th>
					<th width="25px">版本</th>
					<th width="100px">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["title"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["cate_id"]); ?></td>
					<td><?php echo ($vo["is_show_text"]); ?></td>
					<td><?php echo ((isset($vo["status_text"]) && ($vo["status_text"] !== ""))?($vo["status_text"]):"未安装"); ?></td>
					<td><a target="_blank" href="<?php echo ((isset($vo["url"]) && ($vo["url"] !== ""))?($vo["url"]):'http://www.weiphp.cn'); ?>"><?php echo ($vo["author"]); ?></a></td>
					<td><?php echo ($vo["version"]); ?></td>
					<td>            
						<?php if(empty($vo["uninstall"])): ?><a href="<?php echo U('admin/AddonCategory/category',array('id'=>$vo['id']));?>">分类设置</a>
                    
							<?php if(($vo["is_show"]) == "0"): ?><a class="ajax-get" href="<?php echo U('set_show',array('id'=>$vo['id'],'val'=>1));?>">前台显示</a>
							<?php else: ?>
								<a class="ajax-get" href="<?php echo U('set_show',array('id'=>$vo['id'],'val'=>0));?>">前台不显示</a><?php endif; ?>                        
							<?php
 $class = get_addon_class($vo['name']); if(!class_exists($class)){ $has_config = 0; }else{ $addon = new $class(); $has_config = count($addon->getConfig()); } ?>
							<?php if ($has_config): ?>
								<a href="<?php echo U('config',array('id'=>$vo['id']));?>">设置</a>
							<?php endif ?>
						<?php if ($vo['status'] >=0): ?>
							<?php if(($vo["status"]) == "0"): ?><a class="ajax-get" href="<?php echo U('enable',array('id'=>$vo['id']));?>">启用</a>
							<?php else: ?>
								<a class="ajax-get" href="<?php echo U('disable',array('id'=>$vo['id']));?>">禁用</a><?php endif; ?>
						<?php endif ?>
							
								<a class="ajax-get" href="<?php echo U('uninstall?id='.$vo['id']);?>">卸载</a>
							
						<?php else: ?>
							<a class="ajax-get" href="<?php echo U('install?addon_name='.$vo['name']);?>">安装</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php else: ?>
				<td colspan="8" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
			</tbody>
		</table>
	</div>
	<!-- 分页 -->
    <div class="page">
        <?php echo ($_page); ?>
    </div>

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
    
	<script src="/Public/static/thinkbox/jquery.thinkbox.js?v=<?php echo SITE_VERSION;?>"></script>

	<script type="text/javascript">
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});
	//回车搜索
	$(".search-input").keyup(function(e){
		if(e.keyCode === 13){
			$("#search").click();
			return false;
		}
	});
	$('select[name=group]').change(function(){
		location.href = this.value;
	});	

	</script>

</body>
</html>