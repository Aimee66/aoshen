<?php require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 15 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/aboutUs.css"/>
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
				<p class="p2">您当前所在的位置：首页>关于我们>公司简介</p>
		</div>
		<div class="new-consult">
			<span>公司简介</span>
		</div>
		<div class="new">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3">
					<div class="new-us">
						<div class="new-about">
							<span>关于我们/About Us</span>
						</div>
						<div class="new-left">
							<ul>
							<?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=15 AND flag='' AND checkinfo=true ORDER BY orderid asc LIMIT 1,7");
				while($row = $dosql->GetArray())
				{
					if($cfg_isreurl=='Y')
						$gourl='aboutUs.php?cid='.$cid.'&id='.$row['id'];
					else
						$gourl='aboutUs.php?cid='.$cid.'&tid='.$row['id'];
				?>
						<li><a href="<?php echo $gourl ?>"><?php echo $row['title']; ?></a></li>	
						<?php
						}
						?>
						</ul>

						</div>
						
					</div>
				</div>
			</div>
				<div class="col-lg-9 col-md-9">
				<?php
					if(empty($tid)){
						$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15");
					}else{
						$row=$dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=15 and id=$tid");
					}
				?>
					<div class="new-right">
						<span><?php echo $row['content']; ?></span>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>	
<!--end 新闻资讯 -->
<?php require_once('footer.php'); ?>
</body>
</html>
