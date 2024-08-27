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
                            <h4 class="card-title">All Offer Letters</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Name <br> Job Title</th>
                                            <th>Date</th>
                                            <th>Salary</th>
                                            <th>Description</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($OfferLetters as $OfferLetter)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $OfferLetter->department }} </td>
                                            <td>{{ $OfferLetter->designation }} </td>
                                            <td>{{ $OfferLetter->candidateName }} <br> {{ $OfferLetter->jobTitle }} </td>
                                            <td>{{ $OfferLetter->startDate }}</td>
                                            <td>{{ $OfferLetter->salary }} </td>
                                            <td>{{ $OfferLetter->jobDescription }} </td>
                                            <td>{{ $OfferLetter->additionalNotes }} </td>
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