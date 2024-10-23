<!-- resources/views/admin_panel/quiz_listing.blade.php -->

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
    <div class="content-body">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quiz Listing</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Job Title</th>
                                            <th>Question</th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                            <th>Right Option</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quizzes as $quiz)
                                        <tr>
                                            <td>{{ $quiz->department }}</td>
                                            <td>{{ $quiz->designation }}</td>
                                            <td>{{ $quiz->job_title }}</td>
                                            <td>{{ $quiz->question }}</td>
                                            <td>{{ $quiz->option_a }}</td>
                                            <td>{{ $quiz->option_b }}</td>
                                            <td>{{ $quiz->option_c }}</td>
                                            <td>{{ $quiz->option_d }}</td>
                                            <td>{{ $quiz->right_option }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <!-- <button type="button" class="btn btn-danger btn-sm" data-question="Are you sure to delete this quiz?">
                                                        <i class="la la-trash"></i>
                                                    </button> -->
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

    @include('admin_panel.include.footer_include')
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->