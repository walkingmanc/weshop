<?php if (!defined('THINK_PATH')) exit();?>  <!-- 数据列表 -->
  <div class="data-table" id="data-table">
    <h4>3、升级包下载</h4>
    检测到有以下 <?php echo (count($_list)); ?> 个新的版本可以升级，请<span style="color: #F00">严格</span>按升级包版本号从小到大顺序下载升级包升级
    <div class="data-table table-striped">
      <table>
        <thead>
          <tr>
            <th>版本号</th>
            <th>升级包名</th>
            <th>描述</th>
            <th>发布时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
            <?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($vo["version"]); ?> </td>
              <td><?php echo ($vo["title"]); ?></td>
              <td><?php echo ($vo["description"]); ?></td>
              <td><?php echo (time_format($vo["create_date"])); ?></td>
              <td>
	   <?php if(0==$key) { $nowtitle=$vo['title']; ?>
         <a href="javascript:void(0)" onclick="downloadPackage('<?php echo ($vo["version"]); ?>')" class="btn_b">一键升级</a>&nbsp;&nbsp;&nbsp;<a href="http://www.weiphp.cn/index.php?s=/home/index/download_update_package.html&version=<?php echo ($vo["version"]); ?>">手工下载</a>
		<?php }else{ ?>
         <a href="javascript:void(0)" onclick="needUpateOther('<?php echo ($nowtitle); ?>')" class="btn_b">一键升级</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="needUpateOther('<?php echo ($nowtitle); ?>')" class="hand">手工下载</a>
		<?php }　 ?>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          <?php else: ?>
        <td colspan="5" class="text-center"> aOh! 你目前的版本已经是最新的! </td><?php endif; ?>
            </tbody>
      </table>
    </div>
  </div>