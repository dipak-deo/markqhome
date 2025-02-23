@if(Session()->has('success_message'))
<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>success!</strong>
   {{Session()->get('success_message')}}
</div>
@endif



@if(Session()->has('error_message'))
<div class="alert alert-danger" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Failled!</strong>
   {{Session()->get('error_message')}}
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.js"></script>
<script type="text/javascript">
//  	Swal.fire({
//   position: 'center',
//   icon: 'success',
//   title: 'Your work has been saved',
//  text: 'Something went wrong!',
//   showConfirmButton: false,
//   timer: 2000
// })

//  	Swal.fire({
//   icon: 'success',
//   title: 'Oops...',
//   text: 'Something went wrong!',
//   // footer: '<a href="">Why do I have this issue?</a>',
//   timer: 1700
// })
</script>
 @if(Session()->has('success_message'))
<script type="text/javascript">
       Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{Session()->get('success_message')}}",
        // footer: '<a href="">Why do I have this issue?</a>',
        timer: 2700
      })
</script>
@endif
@if(Session()->has('error_message'))
<script type="text/javascript">
       Swal.fire({
        icon: 'error',
        title: 'Failled',
        text: "{{Session()->get('error_message')}}",
        // footer: '<a href="">Why do I have this issue?</a>',
        timer: 2700
      })
</script>
@endif



{{-- delete confirm --}}

<script>
   function confirmDelete(routeUrl, itemType) {
     Swal.fire({
       title: "Are you sure?",
       text: "Do you really want to delete this " + itemType + "? This action cannot be undone.",
       icon: "warning",
       showCancelButton: true,
       confirmButtonText: "Yes, delete it!",
       cancelButtonText: "No, cancel!",
       reverseButtons: true
     }).then((result) => {
       if (result.isConfirmed) {
         // Redirect to the delete route if confirmed
         window.location.href = routeUrl;
       } else if (result.dismiss === Swal.DismissReason.cancel) {
         Swal.fire({
         title: "Cancelled",
         text: "Your " + itemType + " is safe :)",
         icon: "info",
         timer: 3000,  
         showConfirmButton: true  
         });
       }
     });
   }
 </script>
