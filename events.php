<?php
	include("include/header.php");
	include("controller/database.php");
	$announcement = $mysqli->query("SELECT * from announcement");

?>

 <section>
	<div class="container">
	<div class="row">
	<div class="col-lg-12  mb-5 mb-lg-1">
	<br>
		<article class="row">
			<div class="col-12">
				<div class="post-slider">
				<?php while ($val = $announcement->fetch_object()) { ?>
				 <div class="justify-content-center">
					<div class="row ">
						<div class="col-lg-5">
							<p>
							 <center>
							  <h1 class="form-signin-heading"><?php echo $val->title;?></h1>
							 </center>
							 <br>
							  <h3 class="text-center"> <?php echo $val->description;?> </h3>
							</p>
						</div>
						<div class="col-lg-7">
							<img loading="lazy" src="<?php echo 'accounts/assets/announcement/' . $val->image; ?>" width="550px" height="600px"alt="post-thumb">
						</div>
					</div>
				</div>
				<?php } ?>
								
				</div>
			</div>
		</article>
	</div>
	</div>
	</div>
</section>
<?php
	include("include/footer.php");
?>