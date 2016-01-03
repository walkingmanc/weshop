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
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/mobile/shop.js?v=<?php echo SITE_VERSION;?>"></script>
<body>
    <div class="container">
    <?php if(empty($lists)): ?><div class="cart_empty">
        <img src="<?php echo ADDON_PUBLIC_PATH;?>/mobile/cart.png"/>
    	<p>购物车还是空的</p>
    	<p><a href="<?php echo U('lists',array('shop_id'=>$shop_id));?>">去店里逛逛吧</a></p>
    	</div>
        
            <!-- 底部导航 -->
    <div class="bottom_menu"> 
<a class="home" href="<?php echo U('index', array('shop_id'=>$shop_id));?>">首页</a> 
<a class="cart" href="<?php echo U('cart', array('shop_id'=>$shop_id));?>">购物车<span class="count"><?php echo ($cart_count); ?></span></a> 
<a class="center" href="<?php echo U('user_center', array('shop_id'=>$shop_id));?>">个人中心</a> 
</div>
<p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>

    <?php else: ?>
    	<div class="cart_list_top">
        	<a class="fr orange" href="javascript:void(0);" onClick="deleteCartItem()">删除商品</a>
        </div>
        <form action="<?php echo addons_url('Shop://Wap/confirm_order');?>" method="post" onSubmit="return checkCartSubmit()">
        <div class="cart_list">
        	<ul>
                <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="cart_item">
                          <input class="custom_check" id="item_<?php echo ($vo["id"]); ?>" rel="<?php echo ($vo["id"]); ?>" name="goods_ids[]" type="checkbox" value="<?php echo ($vo["goods_id"]); ?>" checked="checked" />
                          <label for="item_<?php echo ($vo["id"]); ?>"><em>&nbsp;</em></label>
                          <div class="goods_item">
                          <a href="<?php echo U('detail',array('shop_id'=>$vo['shop_id'],'id'=>$vo['goods_id']));?>">
                            <img class="goods_img" src="<?php echo (get_cover_url($vo["goods_data"]["cover"])); ?>"/></a>
                              <div class="goods_desc">
                                  <a class="name" href="<?php echo U('detail',array('shop_id'=>$vo['shop_id'],'id'=>$vo['goods_id']));?>"><?php echo ($vo["goods_data"]["title"]); ?></a>
                                  <!--<p class="info"><span class="colorless">型号:</span>蓝色 23</p>-->
                                  <p class="info"><span class="colorless">单价:</span><span class="orange">￥<span class="singlePrice"><?php echo (wp_money_format($vo["goods_data"]["price"])); ?></span></span></p>
                                  <div class="buy_count">
                                      <a class="reduce" href="javascript:;">-</a>
                                      <input type="text" name="buyCount[<?php echo ($vo["goods_id"]); ?>]" value="<?php echo (intval($vo["num"])); ?>" rel="buyCount"/>
                                      <a class="add" href="javascript:;">+</a>
                                  </div>
                              </div>
                          </div>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <!-- cart_list end -->
        <div class="cartBottom">
        	<div class="check_all">
        	<input class="custom_check check_all" id="checkAll" name="checkAll" type="checkbox"  checked="checked"/>
            <label for="checkAll"><em>&nbsp;</em>全选</label>
            </div>
            <div class="total">
            	<p>总结：<span class="orange">￥<span id="totalPrice">00.00</span></span></p>
                <p class="count">(共<span id="totalCount">12</span>件。不含运费)</p>
            </div>
            <button class="settlement" type="submit">去结算</button>
        </div>
        </form><?php endif; ?>
    </div>	
    
</body>
</html>
<script type="text/javascript">
$(function(){
   updatePriceAndCount();	
});
//删除沟通车的商品
function deleteCartItem(){
	if($('input[name="goods_ids[]"]:checked').size()==0){
		$.Dialog.fail("请选择要删除的购物车物品");
	}else if(confirm('确认删除？')){
		var cartIds = "";
		$('input[name="goods_ids[]"]:checked').each(function(index, element) {
			cartIds += $(this).attr('rel')+",";
		});
		$.Dialog.loading();
		$.ajax({
			url:"<?php echo U('delCart',array('shop_id'=>$shop_id));?>",
			data:{ids:cartIds},
			dataType:"json",
			type:"post",
			success:function(data){
				window.location.reload();	
			}
		})
	}
}
</script>