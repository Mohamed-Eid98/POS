<!-- JAVASCRIPT -->
<script src="{{ asset('build/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ asset('assets/js/table-data.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- يمين -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>

<!-- شمال -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>
<!-- App js -->


{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    // alert('as');
    var firebaseConfig = {
    apiKey: "AIzaSyCEBiaUSZGdRZFI2gyCKPxJ9qdJBawxRVA",
    authDomain: "final-dashboard-bd1ed.firebaseapp.com",
    projectId: "final-dashboard-bd1ed",
    storageBucket: "final-dashboard-bd1ed.appspot.com",
    messagingSenderId: "523255190089",
    appId: "1:523255190089:web:d84198d816ae43142c6598",
    measurementId: "G-R0ZMM23HX2"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        messaging
        .requestPermission()
        .then(function () {
            return messaging.getToken()
        })
        .then(function (response) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("store.token") }}',
                type: 'POST',
                data: {
                    token: response
                },
                dataType: 'JSON',
                success: function (response) {
                    alert('Token stored.');
                },
                error: function (error) {
                    alert(error);
                },
            });
        }).catch(function (error) {
            alert(error);
        });
    }
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
    alert('as');
</script> --}}





<script>
    < script >
        $('#change-password').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            var current_password = $('#current-password').val();
            var password = $('#password').val();
            var password_confirm = $('#password-confirm').val();
            $('#current_passwordError').text('');
            $('#passwordError').text('');
            $('#password_confirmError').text('');
            $.ajax({
                url: "{{ url('update-password') }}" + "/" + Id,
                type: "POST",
                data: {
                    "current_password": current_password,
                    "password": password,
                    "password_confirmation": password_confirm,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#current_passwordError').text('');
                    $('#passwordError').text('');
                    $('#password_confirmError').text('');
                    if (response.isSuccess == false) {
                        $('#current_passwordError').text(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.href = "{{ route('root') }}";
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#current_passwordError').text(response.responseJSON.errors.current_password);
                    $('#passwordError').text(response.responseJSON.errors.password);
                    $('#password_confirmError').text(response.responseJSON.errors
                        .password_confirmation);
                }
            });
        });
</script>



@yield('script')

<!-- App js -->
<script src="{{ asset('build/js/app.js') }}"></script>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const totalInput = document.getElementById('total');

    function updateTotal() {
        let sum = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const value = parseInt(checkbox.value);
                if (typeof value === 'number' && !isNaN(value)) {
                    sum += value;
                }
            }
        });

        totalInput.value = sum;
    }

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateTotal);
    });

    updateTotal();
</script>

@yield('script-bottom')
