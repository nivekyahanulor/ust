<?php
	include("include/header.php");
	include("controller/database.php");
	$faq = $mysqli->query("SELECT * from faq");

?>
 <style>

    .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #fff;
        background-color: #7eae1e;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
		color:#ffff;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }


	.demo {
		padding-top: 60px;
		padding-bottom: 60px;
	}
 </style>
 <section>
	<div class="container">
	<div class="row">
	<div class="col-lg-12  mb-5 mb-lg-1">
	<br>
		<article class="row">
			<div class="col-12">
			<div style="height:110px;"></div>

			
			<div class="container">
			<center>

			<h1 class="form-signin-heading">Frequently Asked Questions</h1>
						
			
			<div class="container demo">

				
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php while ($val = $faq->fetch_object()) { ?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $val->faq_id;?>" aria-expanded="true" aria-controls="collapseOne">
									<?php echo $val->title;?>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $val->faq_id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php echo $val->content;?>		
							</div>
						</div>
					</div>
					<?php } ?>
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