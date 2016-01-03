<?php if (!defined('THINK_PATH')) exit();?><input type="hidden" name="<?php echo ($name); ?>" id="data_<?php echo ($name); ?>" value="<?php echo ($value); ?>" />
<script type="text/javascript" src="/Public/static/json2select.js" ></script>
<script>
$("#cascade_<?php echo ($name); ?>").json2select(<?php echo ($json); ?>,[<?php echo ($default_value); ?>],'<?php echo ($name); ?>');
</script>