'use strict';

(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    var wizardValidationFormStep3=document.getElementById('demoShip')
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
    // fields: {
    //   quantity: {
    //     validators: {
    //       notEmpty: {
    //         message: 'quantity is required'
    //       }
    //     }
    //   },
    //   category: {
    //     validators: {
    //       notEmpty: {
    //         message: 'category is required'
    //       }
    //     }
    //   },
    //   price_for_wight: {
    //     validators: {
    //       notEmpty: {
    //         message: 'price is required'
    //       }
    //     }
    //   },
    //   total_wight: {
    //     validators: {
    //       notEmpty: {
    //         message: 'wight is required'
    //       }
    //     }
    //   },
    //   line_total_cost: {
    //     validators: {
    //       notEmpty: {
    //         message: 'cost is required'
    //       }
    //     }
    //   }
    // },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        // eleInvalidClass: '',
        eleValidClass: ''
      }),
      autoFocus: new FormValidation.plugins.AutoFocus(),
      submitButton: new FormValidation.plugins.SubmitButton()
    }
  }).on('click',function(){

  });
  var catt=document.getElementById('category_shipment')
  console.log(catt);

  $('#category_shipment').change(function () {
    var categoryID = $(this).val();

    $.ajax({
      url: ''.concat(baseUrl, 'get-category-details/') + categoryID,
      type: 'GET',
      success: function (data) {
        $('#category-detail').empty();
        $.each(data, function (index, detail) {
          $('#category-detail').append('<option value="' + detail.id + '">' + detail.type + '</option>');
        });
      }
    });
  });

  function attachChangeHandler() {
    $('.shipment-line').on('change', '#category-detail', function () {
      var categoryName = $(this).find(':selected').text();
      var row = $(this).closest('.shipment-line');
      $.ajax({
        type: 'POST',
        url: ''.concat(baseUrl, 'form/wizard-icons/price'),
        data: {
          categoryName: categoryName
        },
        success: function (response) {
          row.find('.price_for_wight').val(response.price);
          row.find('.total_wight').val(response.weight);

          calculateLineTotalCost(row);
        }
      });
    });
    $('.shipment-line').on('input', '.calculate-cost', function () {
    //   calculateLineTotalCost($(this).closest('.shipment-line'));
    });
  }
  attachChangeHandler();
})
();
