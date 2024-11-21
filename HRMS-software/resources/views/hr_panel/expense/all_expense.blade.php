@include('hr_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('hr_panel.include.navbar_include')


    @include('hr_panel.include.sidebar_include')
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
                            <h4 class="card-title">All Expense</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-expense') }}" style="color: white;">
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

                            {{-- <div class="alert alert-dark solid alert-square"><strong>Error!</strong>
                                 You successfully read this important alert message.</div> --}}

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th>Tax</th>
                                            <th>Total paid</th>
                                            <th>Status</th>
                                            <th>Expense By</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_expense as $expense)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>{{ $expense->vendor }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->tax }}</td>
                                            <td>{{ $expense->total_paid }}</td>
                                            <td>{{ $expense->status }}</td>
                                            <td>{{ $expense->usertype }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <a href="{{ route('edit-expense', ['id' => $expense->id]) }}"  style="color: white;">
                                                        <i class="la la-pencil"></i> </a>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <a href="{{ route('delete-expense', ['id' => $expense->id]) }}"  style="color: white;">
                                                        <i class="la la-trash"></i> </a>
                                                    </button>

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

@include('hr_panel.include.footer_include')