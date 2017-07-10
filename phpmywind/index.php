<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/index.css"/>
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
	<div id="myCarousel" class="carousel slide">
		<!-- 轮播（Carousel）指标 -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>   
		<!-- 轮播（Carousel）项目 -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="image/banner1.jpg" alt="First slide">
			</div>
			<div class="item">
				<img src="image/banner2.jpg" alt="Second slide">
			</div>
			<div class="item">
				<img src="image/banner3.jpg" alt="Third slide">
			</div>
		</div>
		<!-- 轮播（Carousel）导航 -->
		<a class="carousel-control left" href="#myCarousel" 
		   data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" 
		   data-slide="next">&rsaquo;</a>
	</div> 
	<!--star 解决方案 -->
	<div class="among">
		<div class="solution">
			<div class="s-title">
			 	<a href="solution.php">解决方案/Solution More</a>
			</div>
			 <div class="s-wrap"></div>
			 <div class="container">
				<div class="row">
					<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=14 AND delstate='' AND checkinfo=true ORDER BY orderid asc LIMIT 0,3");
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
						<div class="s-tupian">
							<a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt=""></a>
							<p><?php echo $row['title']; ?></p>
						</div>
					</div>
					<?php 
					}
					?>
				<div>
			</div>
		</div>
	</div>
	<!--end 解决方案 -->
	<!--star 关于我们 -->
	<div class="about">
		<div class="s-title">
			<a href="aboutUs.php">关于我们/About Us More</a>
		</div>
		<div class="s-wrap"></div>
		<div class="container">
			<div class="row">
			<?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=15 AND flag='a' AND checkinfo=true ORDER BY orderid asc LIMIT 0,4");
				while($row = $dosql->GetArray())
				{
					//??t???
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'aboutUs.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'aboutUs-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					//???????
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
				<div class="col-lg-3 col-md-3">
					<div class="a-tupian">
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
	<!--end 关于我们 -->
	<!--star 新闻资讯 -->
	<div class="new">
		<div class="s-title">
			<a href="news.php">新闻资讯/NEWS More</a>
		</div>
		<div class="s-wrap"></div>
		<div class="container">
			<div class="row">
				<?php
				$row=$dosql->getOne("SELECT * FROM pmw_infolist WHERE classid=16 AND delstate='' AND checkinfo=true ORDER BY orderid asc LIMIT 0,1");

				?>
				<div class="col-lg-6 col-md-6">
					<div class="new-left">
						<a href="newsshow.php"><img src="<?php echo $row['picurl']; ?>" alt=""></a>
					</div>
					<div class="new-text">
						<span><?php echo $row['title']; ?></span>
					</div>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="new-right">
					<?php
					$row=$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=16 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 1,8");
					while($row = $dosql->GetArray())
				{
					//获取链接
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'productshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'productshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
				?>
						<ul>
							<li>
								<span></span><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a><time><?php echo GetDatetime($row['posttime']); ?></time>
							</li>
						<?php
						}
						 ?>
						</ul>

					</div>
				
				</div>
				
			</div>
		</div>
	</div>
</div>
<!--end 新闻资讯 -->
<?php require_once('footer.php'); ?>
</html>
