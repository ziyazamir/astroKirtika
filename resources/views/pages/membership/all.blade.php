@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                @section('content')
                  
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features <a href="{{ route('membership.create') }}" style="float: right" class="btn btn-primary">Add New</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="table-responsive">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Validity in days</th>
                                            <th>Price</th>
                                            {{-- <th>Profile Image</th> --}}
                                            <th>description</th>
                                            <th>Actions</th>
                                            {{-- <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    {{-- {{ $membership }} --}}
                                    <tbody>
                                        @foreach ($membership as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->validity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->description }}</td>
                                                {{-- <td>{{ $astrologer->membership }}</td> --}}
                                                <td><a href="{{ url('membership/delete/'.$item->id) }}" class="btn btn-Danger">
                                                        Delete
                                                    </a><a  href="{{ url('membership/edit/'.$item->id) }}" class="ms-2 btn btn-success">
                                                        Edit
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Validity in days</th>
                                            <th>Price</th>
                                            {{-- <th>Profile Image</th> --}}
                                            <th>description</th>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>







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
