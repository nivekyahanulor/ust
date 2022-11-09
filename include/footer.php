
   <footer class="section-sm pb-1 border-top border-default">
      <div class="container">
         <div class="text-center">
            <p class="content">&copy; EARTH UST 2022</p>
         </div>
      </div>
   </footer>


   <!-- JS Plugins -->
   <script src="assets/plugins/jQuery/jquery.min.js"></script>
   <script src="assets/plugins/bootstrap/bootstrap.min.js" async></script>
   <script src="assets/plugins/slick/slick.min.js"></script>

   <!-- Main Script -->
   <script src="assets/js/script.js"></script>
   <script>
   $(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});
   </script>
</body>
</html>