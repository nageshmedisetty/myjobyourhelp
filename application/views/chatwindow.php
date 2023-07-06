
                <script src="<?=$assets?>assets/js/jquery.min.js"></script>		
<!-- Bootstrap Core JS -->
<script src="<?=$assets?>assets/js/popper.min.js"></script>
<script src="<?=$assets?>assets/js/bootstrap.min.js"></script>		
<!-- Sticky Sidebar JS -->
<script src="<?=$assets?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?=$assets?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
<!-- Select2 JS -->
<script src="<?=$assets?>assets/plugins/select2/js/select2.min.js"></script>		
<!-- Dropzone JS -->
<script src="<?=$assets?>assets/plugins/dropzone/dropzone.min.js"></script>		
<!-- Bootstrap Tagsinput JS -->
<script src="<?=$assets?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>		
<!-- Profile Settings JS -->
<script src="<?=$assets?>assets/js/profile-settings.js"></script>		
<!-- Custom JS -->
<script src="<?=$assets?>assets/js/script.js"></script>
<script src="<?=$assets?>assets/js/dropzone.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js'></script><script src='<?=$assets?>assets/js/knockout-file-bindings.js'></script>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a class="chat-compose" style="cursor:pointer;" onclick="getAllUsers()">
											<i class="material-icons">control_point</i>
										</a>
									</div>
									<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fas fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search" onkeyup="getUsers(this.value)">
                                            <input type="hidden" value="<?=$userId?>" id="userId" name="userId" />
                                            <input type="hidden" value="1" id="chatusers" name="chatusers" />
										</div>
									</form>
									<div class="chat-users-list">
										<div class="chat-scroll" id="chatroomcontacts" style="display:block;">
                                            <?php
                                            $i=0;
                                                if($prevchat){
                                                    foreach($prevchat as $chat){
                                            ?>
                                                        <a class="media" style="cursor:pointer;">
                                                            <div class="media-img-wrap">
                                                            </div>
                                                            <div class="media-body" onclick="getchatWindowdata('<?=$chat->reciverId?>','<?=$chat->reciver?>')">
                                                                <div>
                                                                    <div class="user-name"><?=$chat->reciver?></div>
                                                                    <div class="user-last-chat"><?=$chat->message?></div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </a>
                                            <?php
                                                        if($i==0){
                                            ?>
                                                        <script>
                                                            $(document).ready(function() {
                                                                getchatWindowdata('<?=$chat->reciverId?>','<?=$chat->reciver?>');
                                                            });
                                                            
                                                        </script>
                                            <?php
                                                        }                                                        
                                            
                                            $i++;
                                                    }
                                                }
                                            ?>
											
											
										</div>
                                        <div class="chat-scroll" id="usercontacts" style="display:none">
                                            <?php
                                            $i=0;
                                                if($users){
                                                    foreach($users as $user){
                                            ?>
                                                        <a class="media" style="cursor:pointer;">
                                                            <div class="media-img-wrap">
                                                            </div>
                                                            <div class="media-body" onclick="getchatWindowdata('<?=$user->reciverId?>','<?=$user->reciver?>')">
                                                                <div>
                                                                    <div class="user-name"><?=$user->reciver?></div>
                                                                    <div class="user-last-chat"><?=($user->message ? $user->message : "No events")?></div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </a>
                                            <?php
                                                                                                  
                                            
                                            $i++;
                                                    }
                                                }
                                            ?>
											
											
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
							
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
											</div>
											<div class="media-body">
												<div class="user-name" id="chatheadusername"></div>
											</div>
										</div>
										<div class="chat-options">
                                            <div class="media-body">
												<div class="user-name" id="username" style="font-weight:bold;"><?=$username?></div>
											</div>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll" id="chatscrollroom">
											<ul class="list-unstyled" id="chatroom">
                                                
												
											</ul>
										</div>
									</div>
									<div class="chat-footer">
										<div class="input-group">
											<div class="input-group-prepend">
											</div>
											<input type="text" id="message" class="input-msg-send form-control" placeholder="Type something">
											<div class="input-group-append">
												<button type="button" class="btn msg-send-btn" onclick="sendMsg()"><i class="fab fa-telegram-plane"></i></button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

<script>

var intervalId = window.setInterval(function(){
  // call your function here
  var userId = $('#userId').val();
  var id = $('#reciverId').val();
  var name = $('#recivername').val();
//   console.log(userId);
    getchatWindowdata(id,name);
  console.log("id", id);
  console.log("Name",name);
}, 5000);

function getchatWindowdata(id,name){
	$('#chatheadusername').text(name);
    let userId = $('#userId').val();
    $.ajax({
		url : '<?php echo base_url('chat/getchatroom'); ?>/'+id,
		type: "GET",        
		dataType: "json",
		success: function(data)
		{
			console.log(data);	
            var out = '<input type="hidden" id="reciverId" name="reciverId" value="'+id+'" /><input type="hidden" id="recivername" name="recivername" value="'+name+'" />';
            $.each(data, function(index, element) {
                if(userId==element.userId){
                    if(element.read_msg==1){
                        var tick = '<i class="fa fa-check-double" style="color:green"></i>';
                    }else{
                        var tick = '<i class="fa fa-check"></i>';
                    }
                    out = out + '<li class="media sent"><div class="media-body"><div class="msg-box"><div>';
                    out = out + '<p>'+element.message+'</p>';
                    out = out + '<ul class="chat-msg-info"><li style="width:20%;text-align:right"><div class="chat-time"><span>'+tick+'</span></div></li><li><div class="chat-time"><span>'+element.time+'</span></div></li></ul>';
                    out = out + '</div></div></div></li>'; 
                }else{
                    
                    out = out + '<li class="media received"><div class="media-body"><div class="msg-box"><div>';
					out = out + '<p>'+element.message+'</p>';
					out = out + '<ul class="chat-msg-info"><li style="width:100%;"><div class="chat-time"><span>'+element.time+'</span></div></li></ul>';
					out = out + '</div></div></div></li>'; 
                }
                
                              
            });	
            $('#chatroom').html(out);
            scrollToBottom();
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error deleting data' + errorThrown);
		}
	});
    
    
    //
}

function sendMsg(){
    var userId = $('#userId').val();
    var reciverId = $('#reciverId').val();
    var message = $('#message').val();
    $.ajax({
		url : '<?php echo base_url('chat/postchat'); ?>',
		type: "POST",        
		dataType: "json",
        data: {userId: userId, reciverId: reciverId, message: message},
		success: function(data)
		{
			var out = '';
            out = out + '<li class="media sent"><div class="media-body"><div class="msg-box"><div>';
            out = out + '<p>'+message+'</p>';
            out = out + '<ul class="chat-msg-info"><li><div class="chat-time"><span>Just Now</span></div></li></ul>';
            out = out + '</div></div></div></li>'; 
            $('#message').val('');
            $('#chatroom').append(out);
            scrollToBottom();

        },
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error deleting data' + errorThrown);
		}
	});
    
    // alert(userId);
    // alert(reciverId);
}

$('#message').keypress(function(event){
	
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		sendMsg();
	}
	event.stopPropagation();
});
function scrollToBottom() {
    const messages = document.getElementById('chatscrollroom');
  messages.scrollTop = messages.scrollHeight;
}

function getAllUsers(){
    var chatusers = $('#chatusers').val();
    if(chatusers==1){
        $('#chatroomcontacts').hide('slow');
        $('#usercontacts').show('slow');        
        $('#chatusers').val(2)
    }else{
        $('#chatroomcontacts').show('slow');
        $('#usercontacts').hide('slow'); 
        $('#chatusers').val(1);
    }
}

function getUsers(src){
    if(src){
        $.ajax({
		url : '<?php echo base_url('chat/searchuser'); ?>',
		type: "POST",        
		dataType: "json",
        data: {query:src},
		success: function(data)
		{
			if(data){
                $('#chatroomcontacts').hide('slow');
                $('#usercontacts').show('slow');        
                $('#chatusers').val(2)
            }else{
                $('#chatroomcontacts').show('slow');
                $('#usercontacts').hide('slow'); 
                $('#chatusers').val(1);
            }
            var out = '';
            $.each(data, function(index, element) {
                out = out + '<a class="media" style="cursor:pointer;"><div class="media-img-wrap"></div>';
                out = out + '<div class="media-body" onclick="getchatWindowdata(\''+element.reciverId+'\',\''+element.reciver+'\')">';
                out = out + '<div><div class="user-name">'+element.reciver+'</div>';
                out = out + '<div class="user-last-chat">'+(element.message ? element.message : "No Events")+'</div>';
                out = out + '</div><div></div></div></a>';
            });	
            $('#usercontacts').html(out);
        },
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error deleting data' + errorThrown);
		}
	});
    }else{
        $('#chatroomcontacts').show('slow');
        $('#usercontacts').hide('slow'); 
        $('#chatusers').val(1);
    }
    
}
</script>