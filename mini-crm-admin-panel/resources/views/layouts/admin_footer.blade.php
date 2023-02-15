
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>@auth {{Auth::User()->name}} @endauth</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Popup modal for logout start -->
    <div class="modal fade" id="logoutModel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure to logout ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="{{route('admin.logout')}}" class="btn btn-danger btn_loader">Logout</a>
            </div>
        </div>
      </div>
    </div>
    <!-- Popup modal for logout end -->
    <!-- Popup modal for Delete start -->
    <div class="modal fade" id="deleteModel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Are You sure ?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    Are you sure to Delete User?
                </div>
                <form method="post" action="#" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" class="page_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger form_submit btn_loader">Delete</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
      <!-- Popup modal for Delete end -->

  <!-- Vendor JS Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('build/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>

  
  
  <!-- Template Main JS File -->
  <script src="{{asset('build/assets/js/main.js')}}"></script>
  <script src="{{asset('js/jquery_validation.js')}}"></script>
    <script type="text/javascript">
    $(document).on('click','.delete_button',function(){
        $('#deleteModel').modal('show');
        $('.page_id').val($(this).attr('data-id'));
    })
    $(document).on('click','.form_submit',function(){
        $('#form_delete').submit();
    })
    $("#company_create").validate({
            ignore: "not:hidden",
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                "name": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true,
                    emailCheck: true,
                },
                "website": {
                    required: true,
                },
                "logo_picture": {
                    extension: true
                },
                "status": {
                    required: true,
                },
            },
            messages: {
                "name": {
                    required: 'Please enter Name',
                },
                "email": {
                    required: 'Please enter Email address',
                    email: 'Please enter valid Email address',
                    emailCheck: 'Please enter valid Email address',
                },
                "website": {
                    required: 'Please enter website url',
                },
                "logo_picture": {
                    required: 'Please select logo',
                },
                "status": {
                    required: 'Please select Status',
                },
            },
            submitHandler: function(form) {
                var $this = $('.loader_class');
                var loadingText =
                    '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
                $('.loader_class').prop("disabled", true);
                $this.html(loadingText);
                form.submit();
            }
        });

        $("#edit_create").validate({
            ignore: "not:hidden",
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                "name": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true,
                    emailCheck: true,
                },
                "website": {
                    required: true,
                },
                "logo_picture": {
                    extension: true
                },
                "status": {
                    required: true,
                },
            },
            messages: {
                "name": {
                    required: 'Please enter Name',
                },
                "email": {
                    required: 'Please enter Email address',
                    email: 'Please enter valid Email address',
                    emailCheck: 'Please enter valid Email address',
                },
                "website": {
                    required: 'Please enter website url',
                },
                "logo_picture": {
                    required: 'Please select logo',
                },
                "status": {
                    required: 'Please select Status',
                },
            },
            submitHandler: function(form) {
                var $this = $('.loader_class');
                var loadingText =
                    '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
                $('.loader_class').prop("disabled", true);
                $this.html(loadingText);
                form.submit();
            }
        });

        $("#employee_create").validate({
            ignore: "not:hidden",
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                "first_name": {
                    required: true,
                },
                "last_name": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true,
                    emailCheck: true,
                },
                "phone_number": {
                    required: true,
                },
                "status": {
                    required: true,
                },
            },
            messages: {
                "first_name": {
                    required: 'Please enter First Name',
                },
                "last_name": {
                    required: 'Please enter First Name',
                },
                "email": {
                    required: 'Please enter Email address',
                    email: 'Please enter valid Email address',
                    emailCheck: 'Please enter valid Email address',
                },
                "phone_number": {
                    required: 'Please enter website url',
                },
                "status": {
                    required: 'Please select Status',
                },
            },
            submitHandler: function(form) {
                var $this = $('.loader_class');
                var loadingText =
                    '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
                $('.loader_class').prop("disabled", true);
                $this.html(loadingText);
                form.submit();
            }
        });

        $("#employee_edit").validate({
                ignore: "not:hidden",
                onfocusout: function(element) {
                    this.element(element);
                },
                rules: {
                    "first_name": {
                        required: true,
                    },
                    "last_name": {
                        required: true,
                    },
                    "email": {
                        required: true,
                        email: true,
                        emailCheck: true,
                    },
                    "phone_number": {
                        required: true,
                    },
                    "status": {
                        required: true,
                    },
                },
                messages: {
                    "first_name": {
                        required: 'Please enter First Name',
                    },
                    "last_name": {
                        required: 'Please enter First Name',
                    },
                    "email": {
                        required: 'Please enter Email address',
                        email: 'Please enter valid Email address',
                        emailCheck: 'Please enter valid Email address',
                    },
                    "phone_number": {
                        required: 'Please enter website url',
                    },
                    "status": {
                        required: 'Please select Status',
                    },
                },
                submitHandler: function(form) {
                    var $this = $('.loader_class');
                    var loadingText =
                        '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
                    $('.loader_class').prop("disabled", true);
                    $this.html(loadingText);
                    form.submit();
                }
            });
</script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/switchery/switchery.min.css') }}">
    <script src="{{ asset('js/switchery/switchery.min.js') }}"></script>

    <script type="text/javascript">
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch-employee'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
        $(document).ready(function() {
            $('.js-switch-employee').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let employee_id = $(this).data('id');
                var token = "{{ csrf_token() }}";
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('admin.employee.employee_status_update') }}",
                    data: {
                        'status': status,
                        'employee_id': employee_id,
                        _token: token
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
 <script type="text/javascript">
        let elems1 = Array.prototype.slice.call(document.querySelectorAll('.js-switch-company'));
        elems1.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
        $(document).ready(function() {
            $('.js-switch-company').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let company_id = $(this).data('id');
                var token = "{{ csrf_token() }}";
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('admin.company.company_status_update') }}",
                    data: {
                        'status': status,
                        'company_id': company_id,
                        _token: token
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
</script>
</body>
</html>