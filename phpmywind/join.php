<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/joinUs.css"/>
<link rel="stylesheet" href="css/common.css"/>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<body>
	<?php require_once('header.php'); ?>
	<div class="box-nav"></div>
		<div class="consult">
				<p class="p1">公司简介</p>
				<p class="p2">您当前所在的位置：<a href="#">首页</a>><a href="#">加入奥昇</a></p>
		</div>
		<div class="align">
			<div class="container">
					<div class="row">
					<?php $dosql->Execute("SELECT * FROM `#@__infolist`  WHERE classid=18 AND delstate='' AND checkinfo=true ORDER BY orderid asc LIMIT 0,1");
				while($row = $dosql->GetArray())
				{
					//??t???
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
				?>
							<div class="col-lg-12 col-md-12">
								<div class="prefac">
									<h3><?php echo $row['title']; ?></h3><br/>
									<span><?php echo $row['content']; ?></span>
									<div class="from">
										<form>
						  					<label for="male">请输入职位：</label>
						  					<input type="text" name="keyword" value="关键字"/>
						  					<input type="button" name="search" value="搜索" />
										</form>
								</div>
							</div>
							<?php 
							}
							?>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
					<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=18 AND delstate='' AND checkinfo=true ORDER BY orderid asc LIMIT 1,7");
				while($row = $dosql->GetArray())
				{
					//??t???
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
				?>
							<div class="col-lg-12 col-md-12">
								<div class="software" onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#C0C0C0'">
									<h3><a href="#"><?php echo $row['title']; ?></a></h3>
									<span><?php echo $row['content']; ?></span>
									<div class="from2">
										<form>
						  					<input type="button" name="keyword" value="发布时间:" class="time" />
						  					<time>2015-09-15</time>
						  					<input type="button" name="search" value="不限"  class="limit" />
										</form>
									</div>
							</div>
						</div>
						<?php
							}
							?>
					</div>
				</div>
<!--end 新闻资讯 -->
<?php require_once('footer.php'); ?>
</html>
