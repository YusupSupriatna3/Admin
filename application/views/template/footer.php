

	<!-- script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/datatables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/admin.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>

	<script>
		$('.dropdown-item-delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script>

	<script>
		$('.delete').on('click', function(){
			$('.modalBlock').modal('show');
		});
	</script>

	<script type="text/javascript">
		function cari(){
			var text = $("#search_text").val();
			var status = text.toUpperCase();
			$(".game").hide();
			$('.game:contains("'+status.toUpperCase()+'")').show();
		};
	</script>

	<script type="text/javascript">
 		CKEDITOR.replace('descriptions');
		$(document).ready(function(){
			var base_url = "<?php echo base_url(); ?>";
			$(".game").click(function() {
			    var row = $(this).closest("div");    // Find the row
			    var id = row.find('.hide').text();
			    $('#idStream').val(id);
			    $("#acti").attr("href","<?php echo base_url(); ?>stream/stream_delete/"+id);
			});
		});
		
	</script>

	<?php $url = $this->uri->segment(1); 
		if ($url == '') {?>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/chart.js"></script>
	<?php } ?>

	<script>
    function ubahhref(index) {
			    var $id = $('#'+index).val(); // Find the text
				console.log($id);

			    // $('#email').val($email);
			    // $('#status').val($text);
          // console.log();
          $("#depan").attr("href","<?php echo base_url(); ?>games/game_delete/"+$id);
    }
  </script>
  <script>
    		function streamsDel(index) {
			    var $id = $('#'+index).val(); // Find the text
			    console.log($id);
			    // $('#email').val($email);
			    // $('#status').val($text);
          	// console.log();
          	$("#streamDel").attr("href","<?php echo base_url(); ?>stream/stream_delete/"+$id);
    		}
  	</script>
  <script>
		$('.img-wrapper input[type=file]').change(function(){
			var id = $(this).attr("id");
			var newimage = new FileReader();
			newimage.readAsDataURL(this.files[0]);
			newimage.onload = function(e){
				$('.imgPrev.' + id ).attr('src', e.target.result);
			}
		});
	</script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgPrev').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#imgInp").change(function() {
			readURL(this);
		});
	</script>
	<script type="text/javascript">
	    pageSize = 4;
	    incremSlide = 5;
	    startPage = 0;
	    numberPage = 0;

	    var pageCount =  $(".line-content").length / pageSize;
	    var totalSlidepPage = Math.floor(pageCount / incremSlide);
	        
	    for(var i = 0 ; i<pageCount;i++){
	        $("#pagin").append('<li><a href="#">'+(i+1)+'</a></li> ');
	        if(i>pageSize){
	           $("#pagin li").eq(i).hide();
	        }
	    }

	    var prev = $("<li/>").addClass("prev").html("Prev").click(function(){
	       startPage-=5;
	       incremSlide-=5;
	       numberPage--;
	       slide();
	    });

	    prev.hide();

	    var next = $("<li/>").addClass("next").html("Next").click(function(){
	       startPage+=5;
	       incremSlide+=5;
	       numberPage++;
	       slide();
	    });

	    $("#pagin").prepend(prev).append(next);

	    $("#pagin li").first().find("a").addClass("current");

	    slide = function(sens){
	       $("#pagin li").hide();
	       
	       for(t=startPage;t<incremSlide;t++){
	         $("#pagin li").eq(t+1).show();
	       }
	       if(startPage == 0){
	         next.show();
	         prev.hide();
	       }else if(numberPage == totalSlidepPage ){
	         next.hide();
	         prev.show();
	       }else{
	         next.show();
	         prev.show();
	       }
	       
	        
	    }

	    showPage = function(page) {
	          $(".line-content").hide();
	          $(".line-content").each(function(n) {
	              if (n >= pageSize * (page - 1) && n < pageSize * page)
	                  $(this).show();
	          });        
	    }
	        
	    showPage(1);
	    $("#pagin li a").eq(0).addClass("current");

	    $("#pagin li a").click(function() {
	         $("#pagin li a").removeClass("current");
	         $(this).addClass("current");
	         showPage(parseInt($(this).text()));
	    });
	</script>

</body>
</html>