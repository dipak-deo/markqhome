<script src="{{url('admin/js/vendor.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/js/app.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js')}}"></script>
<script src="{{url('js/dropzone.min.js')}}"></script>


<script src="{{url('admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>


{{-- <script src="{{url('admin/js/demo/dashboard.js')}}" type="text/javascript"></script> --}}


	<script src="{{url('admin/plugins/datatables.net/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
	<script src="{{url('admin/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}" type="text/javascript"></script>
	<script src="{{url('admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
	<script src="{{url('admin/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}" type="text/javascript"></script>
	<script src="{{url('admin/js/demo/table-manage-default.demo.js')}}" type="text/javascript"></script>






	{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script>
		$(document).ready(function(){
			$('.close').on('click',function(){
				// $(this).hide();
				$('.alert').hide();
			})

			$('.select_two').select2();
		}) 
	</script>

  <script>
	$(".summernote").summernote({
	  placeholder: 'Write something here',
	  height: "300"
	});


  </script>
  {{-- const video = document.getElementById('myVideo'); --}}

  {{-- video.controlsList.add('nodownload'); --}}


  <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/ksd0qyv6r1bzgevl9btn764sb3fnj86o563w0ppmpz1x0l37/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


<script>
  tinymce.init({
    selector: '.summernote',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>


{{-- ----------------------------------- --}}
{{-- ----------------------------------- --}}
{{-- js clone special function start --}}
{{-- ----------------------------------- --}}
{{-- ----------------------------------- --}}
<script>
	function js_colum_colne(class_name, btn_add_class, btn_remove_class, sn_class) {
		$(document).ready(function() {
			// service include
			console.log('calling');
			console.log(class_name);
			$('.' + class_name).on('click', '.' + btn_add_class, function() {
				var $tbody = $(this).closest('table').find('tbody');
				var $clone = $tbody.find('tr:first').clone();
				if (sn_class != null) {
					var sn = parseInt($tbody.find('tr:last .' + sn_class).text()) + 1;
					$clone.find('.' + sn_class).text(sn);
					$clone.find('input').val(''); // clear input values
				}
  
				$tbody.append($clone);
				$tbody.find('tr:first .' + btn_remove_class + '-row').prop('disabled', false);
			});
  
			$('.' + class_name).on('click', '.' + btn_remove_class, function() {
				// $(this).closest('tr').remove();
				var $tbody = $(this).closest('tbody');
  
				if ($tbody.find('tr').length === 1) {
					$tbody.find('tr:first .' + btn_remove_class + '-row').prop('disabled',
					true); // Disable remove button for the first row
				} else {
					$(this).closest('tr').remove();
				}
				service_include_sn_num_upd();
			});
  
			function service_include_sn_num_upd() {
				$('.' + class_name + ' tbody tr').each(function(index) {
					$(this).find('.' + sn_class).text(index + 1);
				});
			}
		});
	}
  </script>
  {{-- ----------------------------------- --}}
  {{-- ----------------------------------- --}}
  {{-- js clone special function end --}}
  {{-- ----------------------------------- --}}
  {{-- ----------------------------------- --}}
  
  
  {{-- ************************************************* --}}
  {{-- ************************************************* --}}
  {{-- ******************DragDrop Start******************** --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script> --}}
  
  <script>
  function DragDrop(tableClass, attributeId, modalName) {
	$(document).ready(function() {
		$('.' + tableClass + ' tbody').sortable({
			update: function(event, ui) {
				var newOrder = $(this).sortable("toArray", {
					attribute: attributeId
				});
				var model = modalName;
				$.ajax({
					type: "POST",
					url: "{{-- route('update.order') --}}",
					data: {
						"_token": "{{ csrf_token() }}",
						order: newOrder,
						model: model
					},
					success: function(response) {
						console.log('success');
					},
					error: function(xhr) {
						console.log('error');
					}
				});
			}
		}).disableSelection();
	});
  }
  
  
  </script>
  
  {{-- ****************DragDropEnd******************* --}}
  {{-- ************************************************* --}}
  {{-- ************************************************* --}}

  @stack('scripts')