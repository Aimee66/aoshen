<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/new.css"/>
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
				<p class="p1">资讯</p>
				<p class="p2">您当前所在的位置：首页>资讯中心</p>
		</div>
		<div class="new-consult">
			<span>新闻资讯</span>
		</div>
		<div class="container">
			
			<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=16 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,3");
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
				<div class="row">
				<div class="new-top">
					<div class="col-lg-3 col-lg-3">	
						<div class="new-left">
							<img src="<?php echo $row['picurl']; ?>" />
						</div>			
					</div>
				    <div class="col-lg-9 col-lg-9">
						<div class="new-right">
							<ul>
								<li class="li1"><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></li>
								<li><time><time>时间：2017-3-28</time></time></li>
								<li><a href="#"><?php echo $row['description']; ?></a></li>
							</ul>
						</div>
				    </div>
				</div></div>
				<?php 
				}
				?>
			
		</div>
<!--end 新闻资讯 -->
<?php require_once('footer.php'); ?>
</html>
