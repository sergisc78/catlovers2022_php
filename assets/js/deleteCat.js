window.onload = function () {


  $(document).ready(function () {
    $(".deleteButton").click(function (e) {
      e.preventDefault();
      if (confirm("Are you sure you want to delete")) {



        // VARIABLE ID

        var id = $(this).attr('data-id');

        $.ajax({
          type: "POST",
          url: "deleteCat.php",


          success: function (response) {
            if (response) {
              alert("yes");
              window.location.reload();

            } else {
              alert("no");
              window.location.reload();
            }
          }
        });
      }

    });
  });


  /* document.querySelectorAll(".deleteButton").addEventListener("click",function(e){
     

    //function deleteCat () {  

    // e.preventDefault();
     
         swal({
             title: "Are you sure you want to delete this cat?",
             
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
               swal("Cat has been deleted!", {
                 icon: "success",
               });
             } else {
               swal("Error ! Cat hasn't been deleted");
             }
           });
          
         });  */



}