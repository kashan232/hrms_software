<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Attempt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            width: 100%;
            display: flex;
            margin: 10px 0;
            align-items: center;
            justify-content: center;
            background: #5372F0;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        ::selection {
            color: #fff;
            background: #5372F0;
        }

        .wrapper {
            width: 100%;
            max-width: 80%;
            padding: 40px 30px 50px 30px;
            background: #fff;
            border-radius: 5px;
            text-align: center;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);
        }

        header {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #4ba064;
        }

        .content {
            text-align: left;
        }

        .question {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .question p {
            font-size: 18px;
            font-weight: bold;
        }

        .options {
            list-style: none;
            padding: 0;
        }

        .options li {
            margin-bottom: 10px;
        }

        .options input[type="radio"] {
            display: none;
        }

        .options label {
            display: block;
            padding: 10px;
            border-radius: 5px;
            background: #e9ecef;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
            position: relative;
        }

        .options label:hover {
            background: #dee2e6;
        }

        .options input[type="radio"]:checked+label {
            background: #4ba064;
            color: #fff;
        }

        .options input[type="radio"]:checked+label::before {
            content: '\f058';
            /* Font Awesome check icon */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            /* Ensure the icon uses the solid style */
            display: inline-block;
            position: absolute;
            left: 10px;
            font-size: 18px;
            color: #fff;
        }


        .options .label-text {
            padding-left: 45px;
            /* Space for the icon */
        }

        .btn-primary {
            background-color: #4ba064;
            border-color: #4ba064;
        }

        .btn-primary:hover {
            background-color: #3a8050;
            border-color: #3a8050;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>Quiz Attempt</header>
        <div class="content">
            <h5 class="text-center">Welcome, <span class="font-weight-bold">{{ $candidate->candidate_name }}</span></h5>
            <p class="text-center">You have been assigned the following quiz:</p>
            <form id="quiz-form">
                @csrf
                @foreach($questions as $question)
                <div class="question">
                    <p>{{ $question->question }}</p>
                    <ul class="options">
                        <li>
                            <input type="radio" id="q{{ $question->id }}a" name="answers[{{ $question->id }}]" value="A">
                            <label for="q{{ $question->id }}a" class="label-text">
                                A. {{ $question->option_a }}
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="q{{ $question->id }}b" name="answers[{{ $question->id }}]" value="B">
                            <label for="q{{ $question->id }}b" class="label-text">
                                B. {{ $question->option_b }}
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="q{{ $question->id }}c" name="answers[{{ $question->id }}]" value="C">
                            <label for="q{{ $question->id }}c" class="label-text">
                                C. {{ $question->option_c }}
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="q{{ $question->id }}d" name="answers[{{ $question->id }}]" value="D">
                            <label for="q{{ $question->id }}d" class="label-text">
                                D. {{ $question->option_d }}
                            </label>
                        </li>
                    </ul>
                </div>
                @endforeach
                <button type="button" id="submit-quiz" class="btn btn-primary btn-block">Submit Quiz</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="result-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="result-modal-label">Quiz Results</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Results will be injected here by AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submit-quiz').on('click', function(e) {
                e.preventDefault(); // Prevent form submission

                // Show loading indicator
                $('body').append('<div id="loading" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; display: flex; align-items: center; justify-content: center;"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');

                var formData = $('#quiz-form').serialize(); // Serialize form data

                $.ajax({
                    url: '{{ route("submit-quiz") }}', // Replace with your route
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Remove loading indicator
                        $('#loading').remove();

                        if (response.error) {
                            alert(response.error);
                            return;
                        }

                        var totalCorrect = response.totalCorrect;
                        var totalQuestions = response.totalQuestions;
                        var results = response.results;

                        var resultHtml = '<h5>Total Correct: ' + totalCorrect + '/' + totalQuestions + '</h5>';
                        resultHtml += '<div class="list-group">';
                        results.forEach(function(result) {
                            var questionText = result.question_text; // Get the question text
                            var isCorrectClass = result.is_correct ? 'list-group-item-success' : 'list-group-item-danger';
                            resultHtml += '<div class="list-group-item ' + isCorrectClass + '">';
                            resultHtml += '<h6>Question: ' + questionText + '</h6>';
                            resultHtml += '<p>Your Answer: ' + result.user_answer + '</p>';
                            resultHtml += '<p>Correct Answer: ' + result.correct_answer + '</p>';
                            resultHtml += '</div>';
                        });

                        resultHtml += '</div>';

                        $('#result-modal .modal-body').html(resultHtml); // Inject HTML content into the modal
                        $('#result-modal').modal('show'); // Show the modal

                        // Set up redirection after the modal is closed
                        $('#result-modal').on('hidden.bs.modal', function() {
                            // Show loading indicator
                            $('body').append('<div id="loading" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; display: flex; align-items: center; justify-content: center;"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');

                            // Perform logout via AJAX
                            $.ajax({
                                url: '{{ route("candidate-logout") }}',
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    // Redirect to the candidate login page after successful logout
                                    setTimeout(function() {
                                        window.location.href = '{{ route("quizze-atempt-login") }}'; // Replace with your candidate login page route
                                    }, 1000); // Delay for 1 second to show the loading spinner
                                },
                                error: function() {
                                    // Handle logout error (optional)
                                    alert('Error during logout. Please try again.');
                                    $('#loading').remove(); // Remove loading indicator if logout fails
                                }
                            });
                        });
                    },
                    error: function() {
                        // Remove loading indicator
                        $('#loading').remove();

                        alert('An error occurred while submitting the quiz. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>