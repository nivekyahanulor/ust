<?php
	include("include/header.php");
	include("controller/database.php");
	$donation = $mysqli->query("SELECT * from donation");
?>
<style>
        @import url('https://fonts.googleapis.com/css?family=Oswald|Poppins');
        body {
            /* font-family: 'Oswald', sans-serif; */
            font-family: 'Poppins', sans-serif;
        }

        .card-box {
            background: #FAFAFA;
            min-height: 300px;
            position: relative;
            padding: 30px 30px 20px;
            margin-bottom: 20px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            position: relative;
            cursor: pointer;
        }

        .card-box:hover {
            background: linear-gradient(to right, #1fa2ff17 0%, #12d8fa2b 51%, #1fa2ff36 100%);
        }

        .card-box:after {
            display: block;
            background: #2196F3;
            border-top: 2px solid #2196F3;
            content: '';
            width: 100%;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
        }

        .card-title h2 {
            margin: 0;
            padding-top: 5%;
            color: #2196F3;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            font-size: 24px;
            line-height: 1;
            margin-bottom: 15px;
        }

        .card-title p {
            margin: 0;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .card-link a {
            text-decoration: none;
            font-family: 'Oswald', sans-serif;
            color: #FF5722;
            font-size: 15px;
        }

</style>
 <section>
  <div class="container">
  <div class="widget justify-content-center">
		  <img class="img-fluid" width="100px" src="assets/images/earth.png">
		  <h1 class="form-signin-heading">DONATION</h1>
		  <h4>Here are some stores and shops where you can donate your recycled materials and buy your essential needs that are eco-friendly. Note that EARTH-UST does not accept any monetary donations and other forms of donations.</h4>
	   </div>
        <div class="row">
		<?php while ($val = $donation->fetch_object()) { ?>
            <div class="col-md-3">
			<a href="<?php echo $val->link_url;?>" target="_blank">
                <div class="card-box">
                    <div class="card-title">
                        <h2><?php echo $val->title;?></h2>
                        <p><img src="accounts/assets/donation/<?php echo $val->image;?>" width="200px" height="150px"> </p>
                    </div>
                   
                </div>
			</a>
            </div>
        <?php } ?>
          
        </div>
    </div>
</section>
<?php
	include("include/footer.php");
?>