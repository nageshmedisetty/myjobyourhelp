
<div style="text-align:right;width:100%;">
<a id="myBtn" class="ml-1" style="cursor:pointer;">
    <img src="<?=base_url('public')?>/assets/images/filterIcon.png" alt="" />
</a>
<a href="javascript:getReportType(3, '<?=$repId?>')">
    <img src="<?=base_url('public')?>/assets/images/printIcon.png" alt="" />
</a>
<a href="javascript:getReportType(2, '<?=$repId?>')">
    <img src="<?=base_url('public')?>/assets/images/ic_excel.png" alt="" />
</a>
</div>

    

<!-- The Modal -->
<div id="myModal" class="modal">
    <?php
        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'form_report', 'enctype'=>"multipart/form-data");
        echo form_open_multipart($controller."/reporttype", $attrib)
    ?>   
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
        <h3>Report Filter</h3>
        </div>
        <div class="modal-body">
        <div class="row">        
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-name">From Date</label>
                    <input class="form-control form-control-rounded" value="<?=$from_date?>" id="fromdt" name="fromdt" type="date">
                </div>
            </div>         
                <div class="col-12 col-sm-6">
                <div class="form-group">
                <label for="email">To Date</label>
                <input class="form-control form-control-rounded" id="todt"  value="<?php echo $to_date;?>" name="todt" type="date" >
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" value="<?=$repId?>" id="repId" name="repId" />
            <input type="hidden" value="4" id="type" name="type" />
            <button class="btn btn-danger" onclick="close_pop()">Close</button>
            <button class="btn btn-primary" onclick="getReportType(4,'<?=$repId?>')">Get Report</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script>
$(document).ready(function() {
     // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }
});

function close_pop(){
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
function getReportType(type){
      var repId = $('#repId').val();
      var fromdt = $('#fromdt').val();
      var todt = $('#todt').val();
      $('#type').val(type);
      $('#repId').val(repId);
      $('#from_date').val(fromdt);
      $('#to_date').val(todt);
      $('#form_report').submit();

    }
</script>