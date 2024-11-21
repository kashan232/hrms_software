@include('admin_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin_panel.include.navbar_include')


    @include('admin_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Revenue</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-revenue') }}" style="color: white;">
                                        <i class="las la-plus"></i>Add New </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                            <div class="alert alert-danger solid alert-square">
                                <strong>Success!</strong> {{ session('delete-message') }}.
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Tax</th>
                                            <th>Total paid</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_revenue as $revenue)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $revenue->date }}</td>
                                            <td>{{ $revenue->description }}</td>
                                            <td>{{ $revenue->Customer }}</td>
                                            <td>{{ $revenue->amount }}</td>
                                            <td>{{ $revenue->tax }}</td>
                                            <td>{{ $revenue->total_paid }}</td>
                                            <td>{{ $revenue->status }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <a href="{{ route('edit-revenue', ['id' => $revenue->id]) }}" style="color: white;">
                                                            <i class="la la-pencil"></i> </a>
                                                    </button>
                                                    <!-- Form for Revenue Deletion -->
                                                    <form id="deleteForm-{{ $revenue->id }}" action="{{ route('delete-revenue', ['id' => $revenue->id]) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <!-- To simulate DELETE request -->
                                                        <button type="button" class="btn btn-danger btn-sm" title="Delete Revenue" onclick="confirmDelete({{ $revenue->id }})">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')

<script>
    function confirmDelete(revenueId) {
        const confirmation = confirm("Are you sure you want to delete this revenue?");

        if (confirmation) {
            // If user confirms, submit the form
            document.getElementById('deleteForm-' + revenueId).submit();
        }
    }
</script>