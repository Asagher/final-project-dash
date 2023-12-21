/**
 * App user list
 */

'use strict';



// (function () {
//   // On edit role click, update text
//   var roleEditList = document.querySelectorAll('.role-edit-modal'),
//     roleAdd = document.querySelector('.add-new-role'),
//     roleTitle = document.querySelector('.role-title');

//   roleAdd.onclick = function () {
//     roleTitle.innerHTML = 'Add New Role'; // reset text
//   };
//   if (roleEditList) {
//     roleEditList.forEach(function (roleEditEl) {
//       roleEditEl.onclick = function () {
//         roleTitle.innerHTML = 'Edit Role'; // reset text
//       };
//     });
//   }
// })();


$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /////// Delete Record//////////
  $(document).on('click', '.delete-record', function () {
    var role_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // sweetalert for confirmation of delete
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      customClass: {
        confirmButton: 'btn btn-primary me-3',
        cancelButton: 'btn btn-label-secondary'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        // delete the data
        $.ajax({
          type: 'DELETE',
          url:  ''.concat(baseUrl, 'access-roles/').concat(role_id),
          success: function () {
            $('#roles').load('/app/access-roles' + ' #roles');
          },
          error: function (error) {
            console.log(error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'Deleted!',
          text: 'The user has been deleted!',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'The User is not deleted!',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });


  /////////////////add role/////////////////////////
  (function () {
    FormValidation.formValidation(document.getElementById('addRoleForm'), {
      fields: {
        modalRoleName: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الدور'
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
      $.ajax({
        data: $('#addRoleForm').serialize(),
        url: ''.concat(baseUrl, 'access-roles'),
        type: 'POST',
        success: function success(status) {
          $('#addRoleModal').modal('hide');
          $('#addRoleForm')[0].reset();
          $('#roles').load('/app/access-roles' + ' #roles');
          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Role '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          //window.location.reload();
        },
        error: function error(status) {
          $('#addRoleModal').modal('hide');

          Swal.fire({
            title: 'Duplicate Entry!'.concat(status.message, '!'),
            text: 'Role'.concat(status.message, ' Successfully.'),
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();

  /////////edit role/////////////

  $(document).on('click', '.role-edit-modal', function () {
    var role_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'access-roles/').concat(role_id, '/edit'), function (data) {
      $('#editRoleId').val(role_id);
      $('#editRoleName').val(data.name);
      const m = [data.permissions];
      console.log(m);
      let checkboxes = document.querySelectorAll('input[id="editCheckbox"]');
      let values = [];
      for (let j = 0; j < m[0].length; j++) {
        values.push(m[0][j].name);
      }
      checkboxes.forEach(c => {
        if (values.includes(c.value)) c.checked = true;
        else c.checked = false;
      });
    });
  });
  ////////update///////////
  (function () {
    FormValidation.formValidation(document.getElementById('editRoleForm'), {
      fields: {
        editRoleName: {
          validators: {
            notEmpty: {
              message: 'please,enter role name'
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
      var role_id = $('#editRoleId').val();
      $.ajax({
        data: $('#editRoleForm').serialize(),
        url: ''.concat(baseUrl, 'access-roles/').concat(role_id),
        method: 'PUT',
        success: function success(status) {
          $('#editRoleModal').modal('hide');
          $('#editRoleForm')[0].reset();
          $('#roles').load('/app/access-roles' + ' #roles');
          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Role '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          //window.location.reload();
        },
        error: function error(err) {
          $('#editRoleModal').modal('hide');

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
  })();


});
