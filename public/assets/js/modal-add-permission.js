/**
 * Add Permission Modal JS
 */

'use strict';

// Add permission form validation
document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });

  (function () {
    FormValidation.formValidation(document.getElementById('addPermissionForm'), {
      fields: {
        modalPermissionName: {
          validators: {
            notEmpty: {
              message: 'Please enter permission name'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // Get form data
      var n = $('#addPermissionForm').serialize();
      console.log(n);

      $.ajax({
        data: $('#addPermissionForm').serialize(),
        url: ''.concat(baseUrl, 'access-permission'),
        type: 'POST',
        success: function success(status) {
          $('#addPermissionModal').modal('hide');
          $('#addPermissionForm')[0].reset();

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Permission '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          $('#addPermissionModal').modal('hide');

          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your Permission should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();
});
