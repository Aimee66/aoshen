<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/case.css"/>
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
				<p class="p1">案例展示</p>
				<p class="p2">您当前所在的位置：首页>案例展示</p>
		</div>
		<div class="new-consult">
			<span>案例展示</span>
		</div>
		<div class="container">
			<div class="row">
				<div class="n-tupian">
				<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=17 AND delstate='' AND checkinfo=true ORDER BY orderid asc LIMIT 0,5");
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
					<div class="col-lg-4 col-md-4">
						<div class="n-tupian1">
							<a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""></a>
							<p><?php echo $row['title']; ?></p>
						</div>
					</div>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
<!--end 新闻资讯 -->
<?php require_once('footer.php'); ?>
</body>
</html>
