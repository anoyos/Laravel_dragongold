{{-- Vendor Scripts --}}
<script src="{{ asset('admin_assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendors/js/ui/prism.min.js')}}"></script>

<!-- Theme Scripts -->
<script src="{{ asset('admin_assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin_assets/js/core/app.js') }}"></script>

<!-- Page Scripts -->

{{-- Admin Navigation script --}}
<script type="text/javascript">
	$('body').on('click', '#notification', function(){
		var user_id = {{ auth()->id() }}
		var notificationId = $(this).data('note');
		var c_url = "{{ route('api.notification.mark') }}";
		$.ajax({
			url: c_url,
			type: 'post',
			dataType: 'json',
			data: {'id' : notificationId, 'user_id' : user_id, '_token' : $('meta[name="csrf-token"]').attr('content')},
			success: function(data){
				if(data){
					console.log(data);
					switch(data.data['type']){
                     case 'withdraw':
                      var head = "Withdraw Notification!";
                      var type = 'success';
                      var headColor = 'bg-success';
                      var btnColor = 'btn-success';
                      break;
                     case 'deposit':
                      var head = "Deposit Notification!";
                      var type = 'success';
                      var headColor = 'bg-success';
                      var btnColor = 'btn-success';
                      break;
                     case 'error':
                      var head = "Error!";
                      var type = 'danger';
                      var headColor = 'bg-danger';
                      var btnColor = 'btn-danger';
                      break;
                     default:
                      var head = 'New Notification!';
                      var type = 'primary';
                      var headColor = 'bg-primary';
                      var btnColor = 'btn-primary';
                    }
                    $('#note_modal .modal-header').addClass(headColor);
                    $('#note_modal .dismiss').addClass(btnColor);
					$('#note_modal .modal-title').text(head);
					$('#note_modal .modal-body').text(data.data['message']);

					$('#note_modal').modal('show');
				}else{
					alert('Error');
				}
			}

		});
	});

$(".chgPwd").click(function (e) {
        e.preventDefault();
        try{
            var d = $(this).data('admin');

            $("#chgPwd [name='admin_id']").val(d);                           
            $("#chgPwd").modal('show');
        }
        catch(err){
            alert(err);
        }
    });
</script>