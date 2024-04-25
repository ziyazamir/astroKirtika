@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                @section('content')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently Added Astrologers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="table-responsive">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Fees</th>
                                            <th>Total Experience</th>
                                            <th>Languages</th>
                                            {{-- <th>Profile Image</th> --}}
                                            <th>Membership</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($astrologers as $astrologer)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $astrologer->name }}</td>
                                                <td>{{ $astrologer->email }}</td>
                                                <td>{{ $astrologer->number }}</td>
                                                <td>{{ $astrologer->country }}</td>
                                                <td>{{ $astrologer->fees }}</td>
                                                <td>{{ $astrologer->total_experience }}</td>
                                                <td>{{ $astrologer->languages }}</td>
                                                {{-- <td>{{$astrologer->profile_image}}</td> --}}
                                                <td>{{ $astrologer->title }}</td>
                                                <td><button id="toggleButton" class="btn btn-success"
                                                        data-item-id="{{ $astrologer->id }}"
                                                        data-status="{{ $astrologer->status }}">
                                                        {{ $astrologer->status == 'active' ? 'Active' : 'Inactive' }}
                                                    </button></td>
                                                <td>
                                                    <a href="{{ url('/astrologer/details/' . $astrologer->id) }}"
                                                        class="btn btn-primary">view</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Fees</th>
                                            <th>Total Experience</th>
                                            <th>Languages</th>
                                            {{-- <th>Profile Image</th> --}}
                                            <th>Membership</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endsection
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>







<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });

    // $(document).ready(function() {

    // $("#example1").dataTable({
    //     "bProcessing": true,
    //     "lengthMenu": [[10, 25, 50,100, 400,500,1000,1500], [10, 25, 50,100,400,500,1000,1500]],
    //     dom: 'Blfrtip',
    //     buttons: [
    //       'csv','excel'
    //     ]
    //   });
    //     });
</script>
<script>
    $(document).ready(function() {
        $('#toggleButton').click(function() {
            var itemId = $(this).data('item-id');
            var currentStatus = $(this).data('status');
            var newStatus = (currentStatus === 'active') ? 'inactive' : 'active';
            console.log(itemId);
            $.ajax({
                url: '{{ route('update.status.astro') }}',
                type: 'POST',
                data: {
                    item_id: itemId,
                    status: newStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#toggleButton').text(newStatus === 'active' ? 'Active' :
                            'Inactive').toggleClass('btn-success btn-secondary');
                        $('#toggleButton').data('status', newStatus);
                        alert("Status changed");
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
