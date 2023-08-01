<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">


    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.partials.navbar');
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.partials.mainsidebar');

        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        <div class="content-wrapper">
            {{ $slot }}
        </div>

        <!-- Control Sidebar -->
        @include('admin.partials.controlsidebar');

        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('admin.partials.footer');


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    

    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
            }

            window.addEventListener('hide-form', event => {
                $('#form').modal('hide');
                toastr.success(event.detail.message, 'Success!');
            })

            window.addEventListener('hide-delete-modal', event => {
                $('#confirmationModal').modal('hide');
                toastr.success(event.detail.message, 'Success!');
            })
        })
    </script>
    <script>
        window.addEventListener('show-form', event => {
            $('#form').modal('show');
        })

        window.addEventListener('show-delete-modal', event => {
            $('#confirmationModal').modal('show');
        })
    </script>
    <script>
        $(document).ready(function(){
            $('#appointmentDate').datetimepicker({
                format: 'L',
            });

            $('#appointmentDate').on("change.datetimepicker",function (e){
                let date = $(this).data('appointmentdate');
                eval(date).set('state.date',$('#appointmentDateInput').val());
            });

            $('#appointmentTime').datetimepicker({
                format: 'LT',
            });

            $('#appointmentTime').on("change.datetimepicker",function (e){
                let time = $(this).data('appointmenttime');
                eval(time).set('state.time',$('#appointmentTimeInput').val());
            });
        })
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#note' ) )
            .then( editor => {
                document.querySelector('#submit').addEventListener('click',() => {
                    let note = $('#note').data('note');
                    eval(note).set('state.note', editor.getData());
                });
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
    @livewireScripts
</body>

</html>
