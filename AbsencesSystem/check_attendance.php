<?php include "db_connect.php"; ?>
<?php if (isset($_GET["attendance_id"])) {
    
    $quer = $conn->query(
        "SELECT * FROM attendance_list where id = {$_GET["attendance_id"]}"
    );
    foreach ($quer->fetch_array() as $keepoappa => $keepo) {
        $$keepoappa = $keepo;
    }
} ?>


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">

	<style>

#viewer_modal [class~=btn-close]{position:absolute;}body{background:#808080;}#viewer_modal [class~=btn-close]{z-index:999999;}#viewer_modal [class~=btn-close]{background:unset;}#viewer_modal [class~=btn-close]{color:white;}#viewer_modal [class~=btn-close]{border-left-width:medium;}#viewer_modal [class~=btn-close]{border-bottom-width:medium;}#viewer_modal [class~=btn-close]{border-right-width:medium;}#viewer_modal [class~=btn-close]{border-top-width:medium;}#viewer_modal [class~=btn-close]{border-left-style:none;}#viewer_modal [class~=btn-close]{border-bottom-style:none;}#viewer_modal [class~=btn-close]{border-right-style:none;}#viewer_modal [class~=btn-close]{border-top-style:none;}#viewer_modal [class~=btn-close]{border-left-color:unset;}#viewer_modal [class~=btn-close]{border-bottom-color:unset;}#viewer_modal [class~=btn-close]{border-right-color:unset;}#viewer_modal [class~=btn-close]{border-top-color:unset;}#viewer_modal [class~=btn-close]{border-image:none;}#viewer_modal [class~=btn-close]{font-size:1.6875pc;}#viewer_modal [class~=btn-close]{top:0;}#viewer_modal [class~=modal-dialog]{width:80%;}[class~=modal-dialog][class~=large],#viewer_modal [class~=modal-dialog],.modal-dialog.mid-large{max-width:unset;}#viewer_modal [class~=modal-dialog]{height:calc(90%);}#viewer_modal [class~=modal-dialog]{max-height:unset;}#viewer_modal .modal-content{background:black;}#viewer_modal .modal-content{border-left-width:medium;}#viewer_modal .modal-content{border-bottom-width:medium;}#viewer_modal .modal-content{border-right-width:medium;}#viewer_modal .modal-content{border-top-width:medium;}#viewer_modal .modal-content{border-left-style:none;}#viewer_modal .modal-content{border-bottom-style:none;}#viewer_modal .modal-content{border-right-style:none;}#viewer_modal .modal-content{border-top-style:none;}#viewer_modal .modal-content{border-left-color:unset;}#viewer_modal .modal-content{border-bottom-color:unset;}#viewer_modal .modal-content{border-right-color:unset;}#viewer_modal .modal-content{border-top-color:unset;}#viewer_modal .modal-content{border-image:none;}#viewer_modal .modal-content{height:calc(100%);}#viewer_modal .modal-content{display:flex;}#viewer_modal .modal-content{align-items:center;}#viewer_modal .modal-content{justify-content:center;}[class~=modal-dialog][class~=large]{width:80% !important;}#viewer_modal img,#viewer_modal video{max-height:calc(100%);}#viewer_modal video,#viewer_modal img{max-width:calc(100%);}.modal-dialog.mid-large{width:50% !important;}
</style>

<body>
	<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">  
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/DataTables/datatables.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="assets/js/select2.min.js"></script>    
  <script type="text/javascript" src="assets/font-awesome/js/all.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><b>Check Attendance</b></div>
			<div class="card-body">
				<form id="manage-attendance">
					<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
					<div class="row justify-content-center">
						<label for="" class="mt-2">Class per Subjects</label>
						<div class="col-sm-4">
				            <select name="class_subject_id" id="class_subject_id" class="custom-select  input-sm">
				                <option value=""></option>
				                <?php
				                $class = $conn->query("SELECT cs.*,concat(co.course,' ',c.level,'-',c.section) as `class`,s.subject,f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id inner join courses co on co.id = c.course_id inner join faculty f on f.id = cs.faculty_id inner join subjects s on s.id = cs.subject_id ".($_SESSION['login_faculty_id'] ? " where f.id = {$_SESSION['login_faculty_id']} ":"")." order by concat(co.course,' ',c.level,'-',c.section) asc");
				                while($row=$class->fetch_assoc()):
				                ?>
				                <option value="<?php echo $row['id'] ?>" data-cid="<?php echo $row['id'] ?>" <?php echo isset($class_subject_id) && $class_subject_id == $row['id'] ? 'selected' : (isset($class_subject_id) && $class_subject_id == $row['id'] ? 'selected' :'') ?>><?php echo $row['class'].' '.$row['subject']. ' [ '.$row['fname'].' ]' ?></option>
				                <?php endwhile; ?>
				            </select>
						</div>
						<div class="col-sm-3">
							<input type="date" name="doc" value="<?php echo isset($doc) ? date('Y-m-d',strtotime($doc)) :date('Y-m-d') ?>" class="form-control">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12" id='att-list'>
							<center><b><h4><i>Please Select Class First.</i></h4></b></center>
						</div>
						<div class="col-md-12"  style="display: none" id="submit-btn-field">
							<center>
								<button class="btn btn-primary btn-sm col-sm-5">Save</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="table_clone" style="display: none">
	<table class='table table-bordered table-hover'>
		<thead>
			<tr>
				<th>#</th>
				<th>Student</th>
				<th>Absences</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<div id="chk_clone" style="display: none">
	<div class="d-flex justify-content-center chk-opts">
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp1" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl1">Hour 1</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp2" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl2">Hour 2</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp3" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl3">Hour 3</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp4" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl4">Hour 4</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp5" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl5">Hour 5</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input absent-inp6" type="checkbox" value="1">
		  <label class="form-check-label absent-lbl6">Hour 6</label>
		</div>
	</div>
</div>
<style>
  .present-inp, .absent-inp,
  .present-lbl,
  .absent-lbl,
  {
    cursor: pointer;
  }
</style>
<script>
$(document).ready(function(){
	if('<?php echo isset($class_subject_id) ? 1 : 0 ?>' == 1){

		start_load()		
		$.ajax({

			url:'ajax.php?action=get_class_list',
			method:'POST',
			data:{class_subject_id:$('#class_subject_id').val(),doc:$('#doc').val(),att_id :'<?php echo isset($id) ? $id : '' ?>' },
			success:function(resp){
				if(resp){

					resp = JSON.parse(resp)
					console.log(resp)
					var _table = $('#table_clone table').clone()
					$('#att-list').html('')
					$('#att-list').append(_table)
					var _type = ['Absent','Present','Late'];
					var data = resp.data;
					var record = resp.record;
					var attendance_id = !!resp.attendance_id ? resp.attendance_id : '';
					if(Object.keys(data).length > 0){
						var i = 1;
						Object.keys(data).map(function(k){
							var name = data[k].name;
							var id = data[k].id;
							var tr = $('<tr></tr>')
							var opts = $('#chk_clone').clone()

							opts.find('.absent-inp1').attr({'name':'type1['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl1').attr({'for':'absent_'+id})
							opts.find('.absent-inp2').attr({'name':'type2['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl2').attr({'for':'absent_'+id})
							opts.find('.absent-inp3').attr({'name':'type3['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl3').attr({'for':'absent_'+id})
							opts.find('.absent-inp4').attr({'name':'type4['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl4').attr({'for':'absent_'+id})
							opts.find('.absent-inp5').attr({'name':'type5['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl5').attr({'for':'absent_'+id})
							opts.find('.absent-inp6').attr({'name':'type6['+id+']','id':'absent_'+id})
							opts.find('.absent-lbl6').attr({'for':'absent_'+id})
							tr.append('<td class="text-center">'+(i++)+'</td>')
							tr.append('<td class="">'+(name)+'</td>')
							var td = '<td>';
								td += '<input type="hidden" name="student_id['+id+']" value="'+id+'">';
								td += opts.html();
								td += '</td>';
							tr.append(td)
							_table.find('tbody').append(tr)
						})
						$('#submit-btn-field').show()
						$('#edit_att').attr('data-id',attendance_id)
					}else{
							var tr = $('<tr></tr>')
							tr.append('<td class="text-center" colspan="3">No data.</td>')
							_table.find('tbody').append(tr)
						$('#submit-btn-field').attr('data-id','').hide()
						$('#edit_att').attr('data-id','')
					} 
					$('#att-list').html('')
					$('#att-list').append(_table)
					if(Object.keys(record).length > 0){
						Object.keys(record).map(k=>{							
							$('#att-list').find('[name="type['+record[k].student_id+']"][value="'+record[k].type+'"]').prop('checked',true) 
						})
					}
				}
			},
			complete:function(){
				$("input:checkbox").on('keyup keypress change',function(){
				    var group = "input:checkbox[name='"+$(this).attr("name")+"']";
				    $(group).prop("checked",false);
				    $(this).prop("checked",true);
				});

				$('#edit_att').click(function(){
					location.href = 'index.php?page=check_attendance&attendance_id='+$(this).attr('data-id')
				})
				end_load()
			}
		})
	}
	
})
	$('#class_subject_id').change(function() {
	get_data($(this).val())
})
window.get_data = function(id) {
	start_load()
	$.ajax({
		url: 'ajax.php?action=get_class_list',
		method: 'POST',
		data: {
			class_subject_id: id
		},
		success: function(resp) {
			if (resp) {
				resp = JSON.parse(resp)
				console.log(resp)
				var _table = $('#table_clone table').clone()
				$('#att-list').html('')
				$('#att-list').append(_table)
				if (Object.keys(resp).length > 0) {
					var i = 1;
					Object.keys(resp.data).map(function(k) {
						var name = resp.data[k].LastName;
						var id = resp.data[k].id;
						var tr = $('<tr></tr>')
						var opts = $('#chk_clone').clone()
						
						opts.find('.absent-inp1').attr({
							'name': 'type1[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl1').attr({
							'for': 'absent_' + id
						})
						opts.find('.absent-inp2').attr({
							'name': 'type2[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl2').attr({
							'for': 'absent_' + id
						})
						opts.find('.absent-inp3').attr({
							'name': 'type3[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl3').attr({
							'for': 'absent_' + id
						})
						opts.find('.absent-inp4').attr({
							'name': 'type4[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl4').attr({
							'for': 'absent_' + id
						})
						opts.find('.absent-inp5').attr({
							'name': 'type5[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl5').attr({
							'for': 'absent_' + id
						})
						opts.find('.absent-inp6').attr({
							'name': 'type6[' + id + ']',
							'id': 'absent_' + id
						})
						opts.find('.absent-lbl6').attr({
							'for': 'absent_' + id
						})
						tr.append('<td class="text-center">' + (i++) + '</td>')
						tr.append('<td class="">' + (name) + '</td>')
						var td = '<td>';
						td += '<input type="hidden" name="student_id[' + id + ']" value="' + id + '">';
						td += opts.html();
						td += '</td>';
						tr.append(td)

						_table.find('tbody').append(tr)
					})
					$('#submit-btn-field').show()
				} else {
					var tr = $('<tr></tr>')
					tr.append('<td class="text-center" colspan="3">No data.</td>')
					_table.find('tbody').append(tr)
					$('#submit-btn-field').hide()
				}
				$('#att-list').html('')
				$('#att-list').append(_table)
			}
		},
		complete: function() {
			$("input:checkbox").on('keyup keypress change', function() {
			
				var group = "input:checkbox[name='" + $(this).attr("name") + "']";
			
				$(this).prop("checked", true);
			});
			end_load()
		}
	})
}
$('#manage-attendance').submit(function(e) {
	e.preventDefault()
	start_load()
	$()
	var mData = $(this).serialize();
	mData.absenses = 5
	console.log(mData)
	$.ajax({
		url: 'ajax.php?action=save_attendance',
		method: 'POST',
		data: $(this).serialize(),
		success: function(resp) {
			if (resp == 1) {
				alert_toast("Data successfully saved.", 'success')
				setTimeout(function() {
					location.reload()
				}, 1000)
			} else if (resp == 2) {
				alert_toast("Class already has an attendance record with the slected subject and date.", 'danger')
				end_load();
			}
		}
	})
})
</script>
 <div id="preloader"></div>
 <a href="#" class="back-to-top">
   <i class="icofont-simple-up"></i>
 </a>
 <div class="modal fade" id="confirm_modal" role='dialog'>
   <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Confirmation</h5>
       </div>
       <div class="modal-body">
         <div id="delete_content"></div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
 <div class="modal fade" id="uni_modal" role='dialog'>
   <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title"></h5>
       </div>
       <div class="modal-body"></div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>
 <div class="modal fade" id="viewer_modal" role='dialog'>
   <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
       <button type="button" class="btn-close" data-dismiss="modal">
         <span class="fa fa-times"></span>
       </button>
       <img src="" alt="">
     </div>
   </div>
 </div>
</body>
<script>
	 window.start_load = function(){$('body').prepend('<di id="preloader2"></di>')}
  
  window.end_load = function(){$('#preloader2').fadeOut('fast', function() { $(this).remove(); }) }
 window.viewer_modal = function($src = ''){
    start_load()

    var t = $src.split('.')
    t = t[1]
    if(t =='mp4'){ var view = $("<video src='"+$src+"' controls autoplay></video>")
    }else{ var view = $("<img src='"+$src+"' />")}
    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
    $('#viewer_modal .modal-content').append(view)
    $('#viewer_modal').modal({
            show:true,
            backdrop:'static',
            keyboard:false,
            focus:true
          })
          end_load()  

}
  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)

                $('#uni_modal .modal-body').html(resp)

                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)

                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,       backdrop:'static',                  keyboard:false,                  focus:true                })
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")

     $('#confirm_modal .modal-body').html($msg)

     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){

      $('#alert_toast').removeClass('bg-success')

      $('#alert_toast').removeClass('bg-danger')

      $('#alert_toast').removeClass('bg-info')

      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')

    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')

    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')

    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')

    $('#alert_toast .toast-body').html($msg)

    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  }) 
</script>	