@include('admin_panel.include.header_include')

<div id="main-wrapper">
    @include('admin_panel.include.navbar_include')
    @include('admin_panel.include.sidebar_include')

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Quiz</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="department">Select Department:</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="" disabled>Select One</option>
                                            @foreach($Departments as $department)
                                                <option value="{{ $department->department }}" 
                                                    {{ $quiz->department == $department->department ? 'selected' : '' }}>
                                                    {{ $department->department }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="designation">Select Designation:</label>
                                        <input type="text" name="designation" value="{{ $quiz->designation }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_title">Job Title:</label>
                                        <input type="text" name="job_title" value="{{ $quiz->job_title }}" class="form-control">
                                    </div>
                                </div>
                                
                                <hr>
                                <div id="questionsContainer">
                                    <div class="question form-group">
                                        <label for="question">Question:</label>
                                        <input type="text" name="questions[0][question]" class="form-control" value="{{ $quiz->question }}">

                                        <div class="options">
                                            <label>Options:</label>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="A" class="form-check-input"
                                                {{ $quiz->right_option == 'A' ? 'checked' : '' }}>
                                                <input type="text" name="questions[0][options][]" class="form-control" value="{{ $quiz->option_a }}">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="B" class="form-check-input"
                                                {{ $quiz->right_option == 'B' ? 'checked' : '' }}>
                                                <input type="text" name="questions[0][options][]" class="form-control" value="{{ $quiz->option_b }}">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="C" class="form-check-input"
                                                {{ $quiz->right_option == 'C' ? 'checked' : '' }}>
                                                <input type="text" name="questions[0][options][]" class="form-control" value="{{ $quiz->option_c }}">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="D" class="form-check-input"
                                                {{ $quiz->right_option == 'D' ? 'checked' : '' }}>
                                                <input type="text" name="questions[0][options][]" class="form-control" value="{{ $quiz->option_d }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="button-group">
                                    <button type="submit" class="btn btn-success">Update Quiz</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin_panel.include.footer_include')
