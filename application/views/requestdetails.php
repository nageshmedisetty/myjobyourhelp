<style>
.congrats {
	position: absolute;
	/* top: 140px;
	width: 550px;
	height: 100px; */
	/* padding: 20px 10px; */
	text-align: center;
	margin: 0 auto;
	left: 0;
	right: 0;
}

h1 {
	transform-origin: 50% 50%;
	font-size: 20px;
	font-family: 'Sigmar One', cursive;
	cursor: pointer;
    color: #ff0000;
    font-weight:bold;
	z-index: 2;
	position: absolute;
	top: 0;
	text-align: center;
	width: 100%;
}

.blob {
	height: 50px;
	width: 50px;
	color: #ffcc00;
	position: absolute;
	top: 45%;
	left: 45%;
	z-index: 1;
	font-size: 30px;
	display: none;	
}
</style>
<div class="col-md-12">
<div class="card">
    <div class="card-body pt-0">
						
        <!-- Tab Menu -->
        <nav class="user-tabs mb-4">
            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                </li>
            </ul>
        </nav>
        <!-- /Tab Menu -->
							
        <!-- Tab Content -->
        <div class="tab-content pt-0">							
            <!-- Overview Content -->
            <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    
                        <!-- About Details -->
                        <div class="widget about-widget">
                            <h4 class="widget-title">Brif Description :</h4><p><?=$row->request_brief_description?></p>
                            <h4 class="widget-title">Request Details:</h4><p><?=$row->request_details?></p>
                        </div>
                        <!-- /About Details -->
                    
                        
                        
                        <!-- Services List -->
                        <div class="service-list">
                            <h4>Technologies:</h4>
                            <ul class="clearfix">
                                <?php
                                    $techs = $row->request_technologies;
                                    if($techs){
                                        $tech_arr = explode (",", $techs); 
                                        if(count($tech_arr) > 0){
                                            for($i=0;$i<count($tech_arr);$i++){
                                                echo '<li>'.$tech_arr[$i].'</li>';
                                            }
                                        }
                                    }
                                ?>
                                <!-- <li>JAVA</li>
                                <li>C</li>	
                                <li>Oracle </li>	
                                <li>Mechine Learning</li>	
                                <li>Anguler</li>	
                                <li>Python</li>	 -->
                            </ul>
                        </div>
                        <!-- /Services List -->
                        <div  id="div_intrest"  class="congrats" style="width:100%;color:#ff0000;text-align:center;font-weight:bold;display:<?=($applay ? 'block': 'none')?>"><h1>You are already intrested!</h1></div>
                        <?php
							if($status){
								if($status->status_id==2){
									?>
										<div><button  class="btn btn-danger btn-block btn-lg login-btn" type="button">This Request Closed. </button></div>
									<?php
								}else{
							?>
									<div id="div_button"  style="display:<?=($applay ? 'none': 'block')?>"><button  class="btn btn-primary btn-block btn-lg login-btn" type="submit" onclick="sendInterst(<?=$reqId?>)">Click here to inform Help Requester that you are interested to help </button></div>
							<?php
								}
							}else{
								?>
									<div id="div_button"  style="display:<?=($applay ? 'none': 'block')?>"><button  class="btn btn-primary btn-block btn-lg login-btn" type="submit" onclick="sendInterst(<?=$reqId?>)">Click here to inform Help Requester that you are interested to help </button></div>
								<?php
							}
						
						?>
                        
                           
                        

                    </div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                </div>
            </div>									
        </div>
                   
    </div>
</div>
</div>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- TweenMax JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
<!-- Underscore JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js'></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(function() {
	var numberOfStars = 20;
	
	for (var i = 0; i < numberOfStars; i++) {
	  $('.congrats').append('<div class="blob fa fa-star ' + i + '"></div>');
	}	

	animateText();
	
	animateBlobs();
});

$('.congrats').click(function() {
	reset();
	
	animateText();
	
	animateBlobs();
});

function reset() {
	$.each($('.blob'), function(i) {
		TweenMax.set($(this), { x: 0, y: 0, opacity: 1 });
	});
	
	TweenMax.set($('h1'), { scale: 1, opacity: 1, rotation: 0 });
}

function animateText() {
		TweenMax.from($('h1'), 0.8, {
		scale: 0.4,
		opacity: 0,
		rotation: 15,
		ease: Back.easeOut.config(4),
	});
}
	
function animateBlobs() {
	
	var xSeed = _.random(350, 380);
	var ySeed = _.random(120, 170);
	
	$.each($('.blob'), function(i) {
		var $blob = $(this);
		var speed = _.random(1, 5);
		var rotation = _.random(5, 100);
		var scale = _.random(0.8, 1.5);
		var x = _.random(-xSeed, xSeed);
		var y = _.random(-ySeed, ySeed);

		TweenMax.to($blob, speed, {
			x: x,
			y: y,
			ease: Power1.easeOut,
			opacity: 0,
			rotation: rotation,
			scale: scale,
			onStartParams: [$blob],
			onStart: function($element) {
				$element.css('display', 'block');
			},
			onCompleteParams: [$blob],
			onComplete: function($element) {
				$element.css('display', 'none');
			}
		});
	});
}

function sendInterst(id){
    swal({
	title: "Are you sure?",
	text: "Are you intersted this post!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
	if (willDelete) {
		$.ajax({
		url : '<?php echo base_url('Newrequest/intrestrequest'); ?>/'+id,
		type: "GET",        
		dataType: "html",
		success: function(data)
		{
			if(data){
				$('#div_intrest').show();
				$('#div_button').hide();
				swal("Poof! Your Interst Applied!", {
					icon: "success",
				});
			}else{
				swal("Sorry! There is a problem with appling. Please Try agine!");
			}
			console.log(data);
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error deleting data' + errorThrown);
		}
	});
		
	} else {
		swal("Your imaginary file is safe!");
	}
	});
}

</script>