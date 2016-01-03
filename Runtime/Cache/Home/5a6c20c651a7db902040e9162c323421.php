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
<link href="<?php echo CUSTOM_TEMPLATE_PATH;?>Public/shop.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body class="withFoot">
    <div class="container">
    	<form class="search_form" action="<?php echo U('lists',array('shop_id'=>$shop_id));?>" method="get">
        	<a href="javascript:void(0);" class="cate_icon" onClick="showPopCategory()">&nbsp;</a>
            <input type="text" placeholder="输入关键字搜索商品" value="<?php echo I('search_key');?>" name="search_key"/>
            <button type="button" id="search" url="<?php echo U('lists',array('shop_id'=>$shop_id));?>">搜索</button>
        </form>
        <!-- banner -->
        <div class="banner">
        	<ul>
            <?php if(is_array($slideshow_list)): $i = 0; $__LIST__ = $slideshow_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo (get_cover_url($vo["img"])); ?>"/></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <span class="identify">
            	
            <?php if(is_array($slideshow_list)): $i = 0; $__LIST__ = $slideshow_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><em></em><?php endforeach; endif; else: echo "" ;endif; ?>
            </span>
        </div>
        <!-- 店标和名称 -->
        <div class="shop_row">
        	<?php if(!empty($shop["logo"])): ?><img src="<?php echo (get_cover_url($shop["logo"])); ?>"/><?php endif; ?>
            <?php echo ($shop["title"]); ?>
        </div>
        <div class="index_nav">
        	<a href="<?php echo U('lists',array('shop_id'=>$shop_id));?>">全部商品</a>
            <span class="line"></span>
            <a href="javascript:;" onClick="showPopCategory()">商品分类</a>
            <span class="line"></span>
            <a href="<?php echo U('shop_intro',array('shop_id'=>$shop_id));?>">店铺简介</a>
            <span class="line"></span>
            <a href="<?php echo U('contact',array('shop_id'=>$shop_id));?>">联系卖家</a>
        </div>
        <!-- 推荐类目 -->
        <?php if(!empty($recommend_cate)): ?><div class="recommend_cate">
           <?php if(is_array($recommend_cate)): $i = 0; $__LIST__ = $recommend_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><a href="<?php echo U('lists',array('shop_id'=>$shop_id,'cid0'=>$cate[pid],'cid1'=>$cate[id]));?>"><img src="<?php echo (get_cover_url($cate["icon"])); ?>"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>
        
        <!-- 推荐商品 -->
        <?php if(!empty($recommend_list)): ?><div class="recommend_list">
        	<h6 class="cate_title">商城推荐</h6>
            <div class="product_list">
                <ul>
                    <?php if(is_array($recommend_list)): $i = 0; $__LIST__ = $recommend_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('detail',array('shop_id'=>$shop_id,'id'=>$vo['id']));?>">
                            <img src="<?php echo (get_cover_url($vo["cover"])); ?>"/>
                            <div class="desc">
                            	<p class="name"><?php echo ($vo["title"]); ?></p>
                            	<p class="price">￥<?php echo (wp_money_format($vo["price"])); ?></p>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div><?php endif; ?>
        
        <!-- 推荐商品 -->
        <div class="all_list">
        	<h6 class="cate_title">所有商品</h6>
            <div class="product_list">
                <ul>
                    <?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('detail',array('shop_id'=>$shop_id,'id'=>$vo['id']));?>">
                            <img src="<?php echo (get_cover_url($vo["cover"])); ?>"/>
                            <div class="desc">
                            	<p class="name"><?php echo ($vo["title"]); ?></p>
                            	<p class="price">￥<?php echo (wp_money_format($vo["price"])); ?></p>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <a class="list_bottom_btn" href="<?php echo U('lists',array('shop_id'=>$shop_id));?>">查看所有商品&gt;</a>
        </div>
        
    </div>	
    <!-- 分类目录 -->
    <section class="pop_category" style="display:none">
  <div class="pop_category_head"> <a href="javascript:;" onClick="hidePopCategory()">取消</a> </div>
  <ul>
    <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('goodsListsByCategory',array('shop_id'=>$shop_id,'cid0'=>$cate[id]));?>"><?php echo ($cate["title"]); ?></a></li>
        <?php if(!empty($cate["child"])): ?><ul>
            <?php if(is_array($cate["child"])): $i = 0; $__LIST__ = $cate["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists',array('shop_id'=>$shop_id,'cid0'=>$cate[id],'cid1'=>$cd[id]));?>"><?php echo ($cd["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</section>
<script type="text/javascript">
function showPopCategory(){
	$('body').addClass('noscroll');
	$('.pop_category').addClass('show_category').show();
}
function hidePopCategory(){
	$('body').removeClass('noscroll');
	$('.pop_category').removeClass('show_category').hide();	
}
</script> 
    
    <!-- 底部导航 -->
   <div class="bottom_menu"> 
<a class="home" href="<?php echo U('index', array('shop_id'=>$shop_id));?>">首页</a> 
<a class="cart" href="<?php echo U('cart', array('shop_id'=>$shop_id));?>">购物车<span class="count"><?php echo ($cart_count); ?></span></a> 
<a class="center" href="<?php echo U('user_center', array('shop_id'=>$shop_id));?>">个人中心</a> 
</div>
<p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>

   
<script type="text/javascript">
$(function(){
	//通用banner 滑动
	$.WeiPHP.initBanner(true,5000);
	
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search_form').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});	
})
</script>    
</body>
</html>