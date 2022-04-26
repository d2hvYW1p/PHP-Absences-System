<?php include('db_connect.php');?>
<!-- Google Fonts -->	
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">	
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">	
 <!-- Vendor CSS Files -->	
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">	
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">	
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">	
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">	
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">	
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">	
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">	
  <link href="assets/DataTables/datatables.min.css" rel="stylesheet">	
  <link href="assets/css/jquery.datetimepicker.min.css" rel="stylesheet">	
  <link href="assets/css/select2.min.css" rel="stylesheet">	
  <!-- Template Main CSS File -->	
  <link href="assets/css/style.css" rel="stylesheet">	
  <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">	
  	
  <script src="assets/vendor/jquery/jquery.min.js"></script>	
  <script src="assets/DataTables/datatables.min.js"></script>	
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>	
  <script src="assets/vendor/php-email-form/validate.js"></script>	
  <script src="assets/vendor/venobox/venobox.min.js"></script>	
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>	
  <script src="assets/vendor/counterup/counterup.min.js"></script>	
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>	
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>	
    <script type="text/javascript" src="assets/js/select2.min.js"></script>	
    <script type="text/javascript" src="assets/js/jquery.datetimepicker.full.min.js"></script>	
    <script type="text/javascript" src="assets/font-awesome/js/all.min.js"></script>	
  <script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>	
</head>	
<style>	
	body{	
        background: #80808045;	
  }	
  .modal-dialog.large {	
    width: 80% !important;	
    max-width: unset;	
  }	
  .modal-dialog.mid-large {	
    width: 50% !important;	
    max-width: unset;	
  }	
  #viewer_modal .btn-close {	
    position: absolute;	
    z-index: 999999;	
    /*right: -4.5em;*/	
    background: unset;	
    color: white;	
    border: unset;	
    font-size: 27px;	
    top: 0;	
}	
#viewer_modal .modal-dialog {	
        width: 80%;	
    max-width: unset;	
    height: calc(90%);	
    max-height: unset;	
}	
  #viewer_modal .modal-content {	
       background: black;	
    border: unset;	
    height: calc(100%);	
    display: flex;	
    align-items: center;	
    justify-content: center;	
  }	
  #viewer_modal img,#viewer_modal video{	
    max-height: calc(100%);	
    max-width: calc(100%);	
  }	
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
<script>	
  $('#manage_my_account').click(function(){	
    uni_modal("Manage Account","manage_user.php?id=1&mtype=own")	
  })	
</script>		
<style>	
	.collapse a{	
		text-indent:10px;	
	}	
	nav#sidebar{	
		
	}	
</style>
<script>	
	$('.nav_collapse').click(function(){	
		console.log($(this).attr('href'))	
		$($(this).attr('href')).collapse()	
	})	
	$('.nav-class').addClass('active')	
</script>

<div class="container-fluid">	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-class">
				<div class="card">
					<div class="card-header">
						    Class Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div id="msg"></div>
							<select name="course_id" id="course_id" class="custom-select select2">
								<option value=""></option>
								<?php 
								$course = $conn->query("SELECT * FROM courses order by course asc");
								while($row=$course->fetch_assoc()):
								?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
							<?php endwhile; ?>
							</select>
							<div class="form-group">
								<label class="control-label">Level</label>
								<input type="text" class="form-control" name="level">
							</div>
							<div class="form-group">
								<label class="control-label">Section</label>
								<input type="text" class="form-control" name="section">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="reset"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->
			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Class List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">

							<thead>
								<tr>
									<th class="text-center" width="5%">#</th>
									<th class="text-center">Class</th>
									<th class="text-center" width="25%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
								while($row=$class->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['class'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_class" type="button" data-id="<?php echo $row['id'] ?>"  data-course_id="<?php echo $row['course_id'] ?>"  data-level="<?php echo $row['level'] ?>" data-section="<?php echo $row['section'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_class" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p {
	    margin: unset;
	}
</style>
<script>	
	$('#manage-class').on('reset',function(){
		$('#msg').html('')
		$('input:hidden').val('')
		$('.select2').val('').trigger('change')
	})
	$('#manage-class').submit(function(e){
		e.preventDefault()
		$('#msg').html('')
		start_load()
		$.ajax({
			url:'ajax.php?action=save_class',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}else if(resp == 2){
				$('#msg').html('<div class="alert alert-danger mx-2">Class already exist.</div>')
				end_load()
				}				
			}
		})
	})
	$('.edit_class').click(function(){
		start_load()
		var cat = $('#manage-class')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='course_id']").val($(this).attr('data-course_id')).trigger('change')
		cat.find("[name='level']").val($(this).attr('data-level'))
		cat.find("[name='section']").val($(this).attr('data-section'))
		end_load()
	})
	$('.delete_class').click(function(){
		_conf("Are you sure to delete this class?","delete_class",[$(this).attr('data-id')])
	})
	function delete_class($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_class',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }
 window.viewer_modal = function($src = ''){
    start_load()
    var t = $src.split('.')
    t = t[1]
    if(t =='mp4'){
      var view = $("<video src='"+$src+"' controls autoplay></video>")
    }else{
      var view = $("<img src='"+$src+"' />")
    }
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
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
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
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>	