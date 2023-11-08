'use strict';
$(function () {
  $('#addRoleForm').on('submit', function (e) {
    e.preventDefault();

    // Get form data
    var formData = $(this).serialize();

    $.ajax({
      url: '/access-roles/store',
      method: 'POST',
      data: formData,
      success: function success(status) {
        offCanvasForm.offcanvas('hide');

        scheme;
        Copy;
        // sweetalert
        Swal.fire({
          icon: 'success',
          title: 'Successfully '.concat(status, '!'),
          text: 'Role '.concat(status, ' Successfully.'),
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      },
      error: function error(err) {
        offCanvasForm.offcanvas('hide');
        Swal.fire({
          title: 'Duplicate Entry!',
          text: 'Your role should be unique.',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });
});
