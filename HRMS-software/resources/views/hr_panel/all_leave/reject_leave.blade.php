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
                            <h4 class="card-title">Rejected Leaves</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Sno</th>
                                            <th>Employee</th>
                                            <th>Department <br> Designation</th>
                                            <th>Leave Type</th>
                                            <th>Leave Start Date <br> Leave End Date</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reject_leaves as $leave)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $leave->Employee }}</td>
                                            <td>{{ $leave->department }} <br> {{ $leave->designation }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->leave_from_date }} <br> {{ $leave->leave_to_date }} </td>
                                            <td>{{ $leave->leave_reason }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger">
                                                    Rejected
                                                </button>
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
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div>
     <!--********************************** --}}
    {{-- Footer end
        ***********************************--}}


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('hr_panel.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('#addNewButton').click(function(){
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('.editleaveBtn').click(function(){
            $('#editbtn').modal('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
    // Edit category button click event
    $('.editleaveBtn').click(function() {
        // Extract department ID and name from data attributes
        var departmentId = $(this).data('department-id');
        var departmentName = $(this).data('department-name');
        // Set the extracted values in the modal fields
        $('#editleaveid').val(departmentId);
        $('#editleavetype').val(departmentName);
    });
});
</script>
