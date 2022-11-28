<?php
	include("include/header.php");
?>

<section>
<div class="container">

<div class="col-lg-12  mb-5 mb-lg-1">
<center>
<br>
<h3> FEED BACK FORM </h3>
<b> Answer the following questions for our systems feedback ,
<br>
where 1 is the least satisfied to 5 - being the most satisfied
</b>
</center>
<br>
<form method="post" action="controller/survey.php">
<input type="hidden" value="<?php echo $_GET['id'];?>" name="user_id">
<table class="table" id="customers">
  <tr>
    <th></th>
    <th></th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
  </tr>
  <tr>
    <td>01</td>
    <td>Is the easy to familiarize?</td>
    <td><input type="radio" name="survey1" value="1"></td>
    <td><input type="radio" name="survey1" value="2"></td>
    <td><input type="radio" name="survey1" value="3"></td>
    <td><input type="radio" name="survey1" value="4"></td>
    <td><input type="radio" name="survey1" value="5"></td>
  </tr>
  <tr>
    <td>02</td>
    <td>Was your ticket easily addressed? </td>
    <td><input type="radio" name="survey2" value="1"></td>
    <td><input type="radio" name="survey2" value="2"></td>
    <td><input type="radio" name="survey2" value="3"></td>
    <td><input type="radio" name="survey2" value="4"></td>
    <td><input type="radio" name="survey2" value="5"></td>
  </tr>
  <tr>
    <td>03</td>
    <td>Is the ticketing easily understood?</td>
    <td><input type="radio" name="survey3" value="1"></td>
    <td><input type="radio" name="survey3" value="2"></td>
    <td><input type="radio" name="survey3" value="3"></td>
    <td><input type="radio" name="survey3" value="4"></td>
    <td><input type="radio" name="survey3" value="5"></td>
  </tr>
  <tr>
    <td>04</td>
    <td>Is the button easily to navigate?</td>
    <td><input type="radio" name="survey4" value="1"></td>
    <td><input type="radio" name="survey4" value="2"></td>
    <td><input type="radio" name="survey4" value="3"></td>
    <td><input type="radio" name="survey4" value="4"></td>
    <td><input type="radio" name="survey4" value="5"></td>
  </tr>
  <tr>
    <td>05</td>
    <td>Is the system helpful to you?</td>
    <td><input type="radio" name="survey5" value="1"></td>
    <td><input type="radio" name="survey5" value="2"></td>
    <td><input type="radio" name="survey5" value="3"></td>
    <td><input type="radio" name="survey5" value="4"></td>
    <td><input type="radio" name="survey5" value="5"></td>
  </tr>
 
</table>
How will the system improve more ? Please comment down below
<textarea class="form-control" rows="5" name="improve"> </textarea>
<br>
<center><button type="submit" class="btn btn-info"> SUBMIT </button></center>
	</div>
	</div>
	</div>
</form>
</section>
<?php
	include("include/footer.php");
?>