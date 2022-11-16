<?php
	include("include/header.php");
	include("controller/database.php");
	$announcement = $mysqli->query("SELECT * from announcement");

?>
 <style>
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
.box {
    border-radius: 3px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 10px 25px;
    text-align: right;
    display: block;
    margin-top: 60px;
}
.box-icon {
    background-color: #57a544;
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
.info h4 {
    font-size: 26px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.info > p {
    color: #717171;
    font-size: 16px;
    padding-top: 10px;
    text-align: justify;
}
.info > a {
    background-color: #03a9f4;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
.info > a:hover {
    background-color: #0288d1;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
 </style>
 <section>
	<div class="container">
	<div class="row">
	<div class="col-lg-12  mb-5 mb-lg-1">
	<br>
		<article class="row">
			<div class="col-12">
			<div style="height:10px;"></div>
			<div class="container">
			<img class="img-fluid" width="100px" src="assets/images/earth.png">
			<h1 class="form-signin-heading">CONTACT US</h1>
			<div style="height:10px;"></div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
					<div class="box">
					<a href="https://www.facebook.com/EARTHUST" target="_blank">
						<div class="box-icon" style="background-color:#1877f2 !important;">
							<span class="fa fa-4x fa-facebook"></span>
						</div>
						<div class="info">
							<br>
							<h5 class="text-center">EARTH-UST @earthust</h5>
						</div>
					</a>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="box">
					<a href="https://twitter.com/earthust" target="_blank">
						<div class="box-icon" style="background-color:#55acef !important;">
							<span class="fa fa-4x fa-twitter"></span>
						</div>
						<div class="info">
							<br>
							<h5 class="text-center">@earthust</h5>
						</div>
					</a>
					</div>
				</div> 
				</div> 
				<br><br>
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="box">
					<a href="https://www.instagram.com/earthust/" target="_blank">
						<div class="box-icon" style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%) !important;">
							<span class="fa fa-4x fa-instagram"></span>
						</div>
						<div class="info">
							<br>
							<h5 class="text-center">@earthust</h5>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="box">
					<a href="mailto:earth.uso@ust.edu.ph" target="_blank">
						<div class="box-icon" style="background-color:#BB001B !important;">
							<span class="fa fa-4x fa-google"></span>
						</div>
						<div class="info">
							<br>
							<h5 class="text-center">earth.uso@ust.edu.ph</h5>
						</div>
						
					</a>
					</div>
				</div>
			</div>
		</div>
			</div>
		</article>
	</div>
	</div>
	</div>
</section>
<div style="height:120px;"></div>
<?php
	include("include/footer.php");
?>