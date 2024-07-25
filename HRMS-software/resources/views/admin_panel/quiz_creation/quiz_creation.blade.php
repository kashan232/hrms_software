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
                            <h4 class="card-title">Quiz Creation</h4>
                        </div>
                        <div class="card-body">
                            <form id="quizForm">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="department">Select Department:</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach ($Departments as $department)
                                            <option value="{{ $department->department }}">{{ $department->department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="designation">Select Designation:</label>
                                        <select name="designation" id="designation" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_title">Select Job Title:</label>
                                        <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div id="questionsContainer">
                                    <div class="question form-group" id="questionTemplate">
                                        <label for="question">Question:</label>
                                        <input type="text" name="questions[][question]" class="form-control" placeholder="Enter the question">
                                        <div class="options">
                                            <label>Options:</label>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="A" class="form-check-input">
                                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option A">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="B" class="form-check-input">
                                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option B">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="C" class="form-check-input">
                                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option C">
                                            </div>
                                            <div class="option form-check">
                                                <input type="radio" name="questions[0][right_option]" value="D" class="form-check-input">
                                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option D">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <button type="button" id="addQuestion" class="btn btn-primary">Add Another Question</button>
                                    <button type="button" id="saveQuiz" class="btn btn-success">Save Quiz</button>
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

<script>
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route("get-designations") }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        let questionCount = 0;

        $('#addQuestion').click(function() {
            questionCount++;
            let newQuestionHtml = `
            <div class="question form-group">
                <label for="question">Question:</label>
                <input type="text" name="questions[${questionCount}][question]" class="form-control" placeholder="Enter the question">
                <div class="options">
                    <label>Options:</label>
                    <div class="option form-check">
                        <input type="radio" name="questions[${questionCount}][right_option]" value="A" class="form-check-input">
                        <input type="text" name="questions[${questionCount}][options][]" class="form-control" placeholder="Option A">
                    </div>
                    <div class="option form-check">
                        <input type="radio" name="questions[${questionCount}][right_option]" value="B" class="form-check-input">
                        <input type="text" name="questions[${questionCount}][options][]" class="form-control" placeholder="Option B">
                    </div>
                    <div class="option form-check">
                        <input type="radio" name="questions[${questionCount}][right_option]" value="C" class="form-check-input">
                        <input type="text" name="questions[${questionCount}][options][]" class="form-control" placeholder="Option C">
                    </div>
                    <div class="option form-check">
                        <input type="radio" name="questions[${questionCount}][right_option]" value="D" class="form-check-input">
                        <input type="text" name="questions[${questionCount}][options][]" class="form-control" placeholder="Option D">
                    </div>
                </div>
            </div>
        `;
            $('#questionsContainer').append(newQuestionHtml);
        });

        $('#saveQuiz').click(function() {
            let formData = $('#quizForm').serialize();
            $.ajax({
                url: '{{ route("Quiz-store") }}',
                method: 'get',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#questionsContainer').empty();
                    $('#quizForm')[0].reset();
                    questionCount = 0;
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error saving quiz. Please try again.');
                }
            });
        });
    });
</script>