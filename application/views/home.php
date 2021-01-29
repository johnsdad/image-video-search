<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Divik Prakash">
		<title>Search Image Or Video</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
	</head>
	<body>

		<section style="background-color: #d7e5f3;">
            <div class="container">
                <div class="row">
                	<div class="col-sm-1 col-md-1 col-lg-1"> </div>
                    <div class="col-sm-10 col-md-10 col-lg-10 mt-5 mb-5 rounded" style="background-color: #FFF; min-height: 450px;">
                    	<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center p-5">
                            	<h3 class="text-center pb-4">Search Image Or Video Here!</h3>
                            	<div class="rounded border pb-2">
	                                <div class="input-group p-4">
									  	<input type="search" class="form-control rounded col-8" placeholder="Search" aria-label="Search"aria-describedby="search-addon" id="search"  maxlength="100"/> 
									  	<button type="button" onclick="get_content($('#search').val(), $('input[name=type]:checked').val())" class="btn btn-primary col-4 ml-1">Search <i class="fa fa-search"></i></button>				
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="type" id="type1" value="image" checked>
									  <label class="form-check-label" for="type1">Image</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="type" id="type2" value="video">
									  <label class="form-check-label" for="type2">Video</label>
									</div>
								</div>
                            </div>                            
                        </div>
                        <div class="m-3" id="result">
                        	                    	
                        </div>
                    </div>
                	<div class="col-sm-1 col-md-1 col-lg-1"> </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer bg-light">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12 h-100 text-center my-auto">
		            	<p class="text-info m-2"> Developed by Divik Prakash</p>		                
		            </div>
		        </div>
		    </div>
		</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
	<script type="text/javascript">
		var page = 1;
		var word = '';

		function get_content(keyword, type) {
			$("#result").html('');
			if(keyword == '' || type == '') {
				alert('Enter a vaild string and select a valid type.');
				return;
			}else if(type == 'image') {
				word = keyword;
				load_image(keyword, 1);
			}else if(type == 'video') {
				word = keyword;
				load_video(keyword, 1);
			}else{
				return;
			}
		}

		function more_image(objct){
			load_image(word, page);
			$(objct).parent().hide();
		}

		function more_video(objct){
			load_video(word, page);
			$(objct).parent().hide();
		}

		function load_image(word, pag) {
			$.ajax({
		        url: 'photo-search',
		        type: 'POST',
		        data: ({keyword : word, page : pag}),
		        success: function (response) {
		            $("#result").append(response);
		            $(".fancybox").fancybox();
		            page = pag + 1;
		        }
		    });
		}

		function load_video(word, pag) {
			$.ajax({
		        url: 'video-search',
		        type: 'POST',
		        data: ({keyword : word, page : pag}),
		        success: function (response) {
		            $("#result").append(response);
		            page = pag + 1;
		        }
			});
		}
	</script>
	</body>
</html>