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
                            <h4 class="card-title">Approved Applications</h4>
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
                                            <th>Job</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approvedApplications as $approvedApplication)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($approvedApplication->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $approvedApplication->application_post }}</td>
                                            <td>{{ $approvedApplication->first_name }}</td>
                                            <td>{{ $approvedApplication->last_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationId('{{ $approvedApplication->id }}')">
                                                    Approved
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('view-applications', ['id' => $approvedApplication->id]) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-success asign_quiz btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationData(
        '{{ $approvedApplication->first_name }} {{ $approvedApplication->last_name }}',
        '{{ optional($approvedApplication->jobBoard)->department }}',
        '{{ optional($approvedApplication->jobBoard)->designation }}',
        '{{ optional($approvedApplication->jobBoard)->job_title }}',
        '{{ $approvedApplication->email }}'
    )">
                                                    Assign Quiz
                                                </button>
                                                <button type="button" class="btn btn-info btn-sm result-quiz" data-toggle="modal" data-target="#resultModal" onclick="setSelectedApplicationId('{{ $approvedApplication->id }}')">
                                                    Result
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
        <!-- Result Modal -->
        <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Quiz Result</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                  
                    <div class="modal-body">
                        <div id="quizResultContent">
                            <!-- Quiz results will be loaded here -->
                        </div>
                        <button type="button" class="btn btn-primary" id="markAsHiredButton">
                            Mark as Interview
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Assign Quiz Modal -->
        <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Quiz</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form id="assignQuizForm" action="{{ route('assign-quiz') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="candidateName">Candidate Name</label>
                                <input type="text" class="form-control" id="candidateName" name="candidate_name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="candidateEmail">Candidate Email</label>
                                <input type="email" name="email" class="form-control" id="candidateEmail" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jobTitle">Job Title</label>
                                    <input type="text" class="form-control" id="jobTitle" name="job_title" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quiz">Select Quiz</label>
                                <select class="form-control" id="quiz">
                                    <option selected disabled>Select Quiz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questions">Selected Questions</label>
                                <div id="questionsList">
                                    <!-- Selected questions will be appended here -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Send Email</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
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
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('.asign_quiz').click(function() {
            $('#cuModal').modal('show');
        });
    });

    $(document).ready(function() {
        $('.result-quiz').click(function() {
            $('#resultModal').modal('show');
        });
    });
</script>
<script>
    let selectedApplicationId = null;

    // Set the application ID in the hidden variable
    function setSelectedApplicationId(applicationId) {
        selectedApplicationId = applicationId;
        fetchQuizResult(applicationId);
    }

    function fetchQuizResult(applicationId) {
        fetch(`/quiz-results/${applicationId}`)
            .then(response => response.json())
            .then(data => {
                const resultContent = document.getElementById('quizResultContent');
                resultContent.innerHTML = '';

                if (data.length > 0) {
                    let resultHtml = '<ul class="list-group">';
                    let correctCount = 0;
                    let totalCount = data.length;

                    data.forEach(result => {
                        resultHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            Question ID: ${result.question}
                            <span class="badge badge-${result.is_correct == 1 ? 'success' : 'danger'}">${result.is_correct == 1 ? 'Correct' : 'Incorrect'}</span>
                        </li>`;

                        if (result.is_correct == 1) {
                            correctCount++;
                        }
                    });

                    resultHtml += `</ul>
                        <p>Total Questions: ${totalCount}</p>
                        <p>Correct Answers: ${correctCount}</p>
                        <p>Incorrect Answers: ${totalCount - correctCount}</p>`;

                    resultContent.innerHTML = resultHtml;
                } else {
                    resultContent.innerHTML = '<p>No quiz results found for this application.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching quiz results:', error);
                document.getElementById('quizResultContent').innerHTML = '<p>Error fetching quiz results.</p>';
            });
    }

    function markAsHired() {
        if (!selectedApplicationId) {
            alert('No application selected.');
            return;
        }

        fetch(`/hire-candidate/${selectedApplicationId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // include CSRF token for security
                },
                body: JSON.stringify({
                    hired: true
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Candidate marked as hired successfully.');
                    location.reload(); // reload the page to update the status
                } else {
                    alert('Failed to mark candidate as hired.');
                }
            })
            .catch(error => {
                console.error('Error marking candidate as hired:', error);
                alert('Error marking candidate as hired.');
            });
    }

    // Attach event listener to "Mark as Hired" button
    document.getElementById('markAsHiredButton').addEventListener('click', markAsHired);
</script>

</script>
<script>
    $(document).ready(function() {
        $('#quiz').change(function() {
            var selectedText = $(this).find('option:selected').text();
            var selectedValue = $(this).val();

            // Check if the question is already added
            if ($('#question' + selectedValue).length == 0) {
                var questionDiv = $('<div class="form-check"></div>');
                questionDiv.append('<input type="checkbox" class="form-check-input" id="question' + selectedValue + '" name="questions[]" value="' + selectedValue + '">');
                questionDiv.append('<label class="form-check-label" for="question' + selectedValue + '">' + selectedText + '</label>');
                $('#questionsList').append(questionDiv);
            }
        });

        $('#assignQuizForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    alert('Quiz assigned successfully');
                    $('#cuModal').modal('hide');
                },
                error: function(error) {
                    // Handle error response
                    console.log(error);
                    alert('An error occurred while assigning the quiz');
                }
            });
        });
    });
</script>
<script>
    function setApplicationData(candidateName, department, designation, jobTitle, email) {
        document.getElementById('candidateName').value = candidateName;
        document.getElementById('department').value = department;
        document.getElementById('designation').value = designation;
        document.getElementById('jobTitle').value = jobTitle;
        document.getElementById('candidateEmail').value = email; // Setting email in the modal

        // Fetch quizzes based on department, designation, and job title
        fetchQuizzes(department, designation, jobTitle);
    }

    function fetchQuizzes(department, designation, jobTitle) {
        $.ajax({
            url: '{{ route("get-quizzes") }}',
            type: 'GET',
            data: {
                department: department,
                designation: designation,
                jobTitle: jobTitle
            },
            success: function(response) {
                var quizSelect = $('#quiz');
                quizSelect.empty();
                quizSelect.append('<option selected disabled>Select Quiz</option>');

                response.forEach(function(quiz) {
                    quizSelect.append('<option value="' + quiz.id + '">' + quiz.question + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $(document).ready(function() {
        $('#quiz').change(function() {
            var selectedText = $(this).find('option:selected').text();
            var selectedValue = $(this).val();

            // Check if the question is already added
            if ($('#question' + selectedValue).length == 0) {
                var questionDiv = $('<div class="form-check"></div>');
                questionDiv.append('<input type="checkbox" class="form-check-input" id="question' + selectedValue + '" value="' + selectedValue + '">');
                questionDiv.append('<label class="form-check-label" for="question' + selectedValue + '">' + selectedText + '</label>');
                $('#questionsList').append(questionDiv);
            }
        });
    });
</script>
<script>
    // $(document).ready(function() {
    //     $('#quiz').change(function() {
    //         // Dummy data for quiz questions
    //         var questions = [{
    //                 question: 'Question 1'
    //             },
    //             {
    //                 question: 'Question 2'
    //             }
    //         ];

    //         var questionsListDiv = $('#questionsList');
    //         questionsListDiv.empty();

    //         questions.forEach(function(q, index) {
    //             var questionDiv = $('<div class="form-check"></div>');
    //             questionDiv.append('<input type="checkbox" class="form-check-input" id="question' + (index + 1) + '">');
    //             questionDiv.append('<label class="form-check-label" for="question' + (index + 1) + '">' + q.question + '</label>');
    //             questionsListDiv.append(questionDiv);
    //         });
    //     });

    //     $('#generateLink').click(function() {
    //         var link = 'http://example.com/quiz-link'; // Dummy link generation
    //         $('#generatedLink').val(link);
    //     });
    // });
</script>