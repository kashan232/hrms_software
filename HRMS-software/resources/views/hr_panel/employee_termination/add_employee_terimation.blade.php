@include('hr_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div id="main-wrapper">
    @include('hr_panel.include.navbar_include')
    @include('hr_panel.include.sidebar_include')

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('termination-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('termination-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Terminate Employee</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-hr-emp-termination') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Select Employee</label>
                                            <select name="employee_name" id="single-select" onchange="updateCurrentPosition()">
                                                <option value="" selected disabled>Select Employee</option>
                                                @foreach($Employees as $Employee)
                                                <option value="{{ $Employee->first_name . ' ' . $Employee->last_name }}" data-position="{{ $Employee->designation }}">
                                                    {{ $Employee->first_name }} {{ $Employee->last_name }}
                                                </option>

                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="curent_position">Current Position</label>
                                            <input type="text" class="form-control" id="curent_position" name="curent_position" placeholder="Current Position" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="termination_reason">Reason for Termination</label>
                                            <textarea class="form-control" id="termination_reason" name="termination_reason" rows="4" placeholder="Enter reason for termination" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="termination_date">Termination Date</label>
                                            <input type="date" class="form-control" id="termination_date" name="termination_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="severance_package">Severance Package (if any)</label>
                                            <input type="text" class="form-control" id="severance_package" name="severance_package" placeholder="Enter severance details">
                                        </div>
                                        <div class="form-group">
                                            <label for="final_comments">Final Comments</label>
                                            <textarea class="form-control" id="final_comments" name="final_comments" rows="3" placeholder="Enter any additional comments"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Submit Termination</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('hr_panel.include.footer_include')

<script src="https://jobie.dexignzone.com/laravel/demo/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://jobie.dexignzone.com/laravel/demo/js/plugins-init/select2-init.js" type="text/javascript"></script>


<script>
    function updateCurrentPosition() {
        var selectedEmployee = document.getElementById('single-select');
        var currentPosition = selectedEmployee.options[selectedEmployee.selectedIndex].getAttribute('data-position');
        document.getElementById('curent_position').value = currentPosition;
    }
</script>