
    </div>
    </div>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>
    <script src="assets/js/moment.js"></script>
	<link rel="stylesheet" media="print" href="app.css" />
    <script src="assets/js/fullcalendar.js"></script>
	<script src="assets/js/main.js"></script>

	
   
	<script>
	$(document).ready(function() {
		
            $('#table1').DataTable({
                responsive: false,
                pageLength: 25
            }); 
			
		
     });	

	 function printDiv() {
            var divContents = document.getElementById("resourcestep2").innerHTML;
            var a = window.open('', '_blank');
            a.document.write('<html>');
			a.document.write('<head><title>Released Resources</title></head>');
            a.document.write('<body style="font-family: sans-serif; background-color: #f0ecd2"> <h1 style="color: #cca934; ">Receive Resources </h1>');
            a.document.write('<div style="line-height:150%; color: #6c757d; font-weight: 500">');
			a.document.write(divContents);
			a.document.write('</div>');
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
	
	</script>

	 <script>
        $('#summernote').summernote({
            tabsize: 4,
            height: 220,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

    </script>
	
</body>
<div class="modal" id="calendarmodal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Calendar Details</h5>
              
              </div>
              <div class="modal-body">
				<form method="POST" action="controller/add-activities.php">							
						 <div id="title"></div>
						 <div id="chapter"></div>
						 <div id="description"></div>
						 <div id="starts1"></div>
						 <div id="status"></div>
						 <div id="link"></div>
						 <br>
						 <label> Activites :  </label>
						 <input type="hidden" id="advocacy_id" name="id">
						 <textarea class="form-control" id="activities" name="activity"></textarea>
											
              </div>
			   <div class="modal-footer bg-whitesmoke br">
			    <?php if($_SESSION['position'] ==2){?>
					<button type="submit" class="btn btn-info">Update</button>
				<?php } ?>
                <button type="button" class="btn btn-secondary" id="closecalendar" data-dismiss="modal">Close</button>
			</form>
              </div>
            </div>
          </div>
        </div>
</html>