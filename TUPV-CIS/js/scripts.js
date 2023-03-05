
// SIDEBAR
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
// SIDEBAR END

// Data Picker Initialization
$('.datepicker').datepicker({
    inline: true
  });


//   PASS CONTENTS TO MODAL
// DELETE

$(document).ready(function () {

    $('.deletebtn').on('click', function () {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

    });
});



