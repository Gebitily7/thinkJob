<?php if (!defined('THINK_PATH')) exit(); if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i; if(($current) == $cate['id']): ?><li class="active">
			<a href="<?php echo U('Article/lists?category='.$cate['name']);?>">
				<i class="icon-chevron-right"></i><?php echo ($cate["title"]); ?>
			</a>
		</li>
	<?php else: ?>
		<li>
			<a href="<?php echo U('Article/lists?category='.$cate['name']);?>">
				<i class="icon-chevron-right"></i><?php echo ($cate["title"]); ?>
			</a>
		</li><?php endif; ?>
	<?php if(!empty($cate['_'])): if(is_array($cate['_'])): $i = 0; $__LIST__ = $cate['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li>
				<a href="<?php echo U('Article/lists?category='.$cate['name']);?>">
					<i class="icon-chevron-right"></i><?php echo ($cate["title"]); ?>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>