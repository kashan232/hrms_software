@include('admin_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                        @if (session()->has('Revenue-updt'))
                            <div class="alert alert-success solid alert-square">
                                <strong>Success!</strong> {{ session('Revenue-updt') }}.
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Edit Revenue</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('update-revenue',['id'=> $Revenue->id ]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ $Revenue->date }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control" value="{{ $Revenue->description }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Customer</label>
                                            <input type="text" name="Customer" class="form-control" value="{{ $Revenue->Customer }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control" id="amount" oninput="calculateTotal()" value="{{ $Revenue->amount }}">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Tax</label>
                                            <input type="number" name="tax" class="form-control" id="tax" oninput="calculateTotal()" value="{{ $Revenue->tax }}">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Total Paid</label>
                                            <input type="number" name="total_paid" class="form-control" id="total_paid" value="{{ $Revenue->total_paid }}" readonly>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control" value="{{ $Revenue->status }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK
                    Technologies</a>
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
