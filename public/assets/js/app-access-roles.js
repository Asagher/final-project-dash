/**
 * App user list
 */

'use strict';

// Datatable (jquery)
$(function () {
  var dtUserTable = $('.datatables-users'),
    statusObj = {
      1: { title: 'Pending', class: 'bg-label-warning' },
      2: { title: 'Active', class: 'bg-label-success' },
      3: { title: 'Inactive', class: 'bg-label-secondary' }
    };

  var userView = baseUrl + 'app/user/view/account';

  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
      ajax: assetsPath + 'json/user-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'full_name' },
        { data: 'role' },
        { data: 'current_plan' },
        { data: 'billing' },
        { data: 'status' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // User full name and email
          targets: 1,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full['full_name'],
              $email = full['email'],
              $image = full['avatar'];
            if ($image) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6) + 1;
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['full_name'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar avatar-sm me-3">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<a href="' +
              userView +
              '" class="text-body text-truncate"><span class="fw-medium">' +
              $name +
              '</span></a>' +
              '<small class="text-muted">@' +
              $email +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // User Role
          targets: 2,
          render: function (data, type, full, meta) {
            var $role = full['role'];
            var roleBadgeObj = {
              Subscriber:
                '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>',
              Author:
                '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>',
              Maintainer:
                '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>',
              Editor:
                '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="bx bx-edit bx-xs"></i></span>',
              Admin:
                '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span>'
            };
            return "<span class='text-truncate d-flex align-items-center'>" + roleBadgeObj[$role] + $role + '</span>';
          }
        },
        {
          // Plans
          targets: 3,
          render: function (data, type, full, meta) {
            var $plan = full['current_plan'];

            return '<span class="fw-medium">' + $plan + '</span>';
          }
        },
        {
          // User Status
          targets: 5,
          render: function (data, type, full, meta) {
            var $status = full['status'];

            return '<span class="badge ' + statusObj[$status].class + '">' + statusObj[$status].title + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          title: 'View',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            return '<a href="' + userView + '" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>';
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"row mx-2"' +
        '<"col-sm-12 col-md-4 col-lg-6" l>' +
        '<"col-sm-12 col-md-8 col-lg-6"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1"<"me-3"f><"user_role w-px-200 pb-3 pb-sm-0">>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: '_MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(2)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      }
    });
  }
  $('#addRoleModal').on('show.bs.modal', function () {
    $('#addRoleForm')[0].reset();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

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

/////////////////add role/////////////////////////
  (function () {
    FormValidation.formValidation(document.getElementById('addRoleForm'), {
      fields: {
        modalRoleName: {
          validators: {
            notEmpty: {
              message: 'please,enter role name'
            }
          }
        },

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
          $('#roles').load('/app/access-roles' +  ' #roles');
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
      const m=[data.permissions];
      console.log(m);
      let checkboxes = document.querySelectorAll('input[id="editCheckbox"]');
            let values = [];
            for (let j = 0; j < m[0].length; j++)
              { 
                values.push(m[0][j].name);
              }
            checkboxes.forEach(c => {
                if(values.includes(c.value))
                  c.checked=true;
                else
                  c.checked=false;
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
          $('#roles').load('/app/access-roles' +  ' #roles');
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
