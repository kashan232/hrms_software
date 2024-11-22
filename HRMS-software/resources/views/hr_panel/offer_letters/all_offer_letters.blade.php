@include('hr_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<style>
    .action-btn {
        width: 80px;
        /* Adjust width as needed */
        padding: 5px;
        margin: 1px 0;
        font-size: 14px;
    }
</style>

<div id="main-wrapper">

    @include('hr_panel.include.navbar_include')


    @include('hr_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <!-- Update Modal -->
    <div class="modal fade" id="updateOfferLetterModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateOfferLetterForm" method="POST" action="{{ route('offer-letters.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="offerLetterId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Offer Letter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div class="mb-3">
                            <label for="jobDescription" class="form-label">Job Description</label>
                            <textarea class="form-control" id="jobDescription" name="jobDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="additionalNotes" class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                            <th>Action</th>
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
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Actions" style="gap:1px;">
                                                    <!-- Edit Button -->
                                                    <button type="button" class="btn btn-primary btn-sm action-btn px-2 py-1 d-flex align-items-center justify-content-center"
                                                        onclick="showEditModal({{ json_encode($OfferLetter) }})"
                                                        title="Edit">
                                                        <i class="la la-pencil"></i>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-danger btn-sm action-btn px-2 py-1 d-flex align-items-center justify-content-center"
                                                        onclick="confirmDelete({{ $OfferLetter->id }})"
                                                        title="Delete">
                                                        <i class="la la-trash"></i>
                                                    </button>

                                                    <!-- Print Button -->
                                                    <button type="button" class="btn btn-info btn-sm action-btn px-2 py-1 d-flex align-items-center justify-content-center"
                                                        onclick="printOfferLetter({{ json_encode($OfferLetter) }})"
                                                        title="Print">
                                                        <i class="la la-print"></i>
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

<script>
    function showEditModal(offerLetter) {
        // Populate form fields with data
        document.getElementById('offerLetterId').value = offerLetter.id;
        document.getElementById('startDate').value = offerLetter.startDate;
        document.getElementById('salary').value = offerLetter.salary;
        document.getElementById('jobDescription').value = offerLetter.jobDescription;
        document.getElementById('additionalNotes').value = offerLetter.additionalNotes;

        // Show modal
        new bootstrap.Modal(document.getElementById('updateOfferLetterModal')).show();
    }
</script>
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this offer letter?")) {
            // Send delete request via AJAX
            fetch(`/offer-letters/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Offer letter deleted successfully!");
                        location.reload(); // Refresh to see updated list
                    } else {
                        alert("Error deleting offer letter.");
                    }
                });
        }
    }
</script>
<script>
    function printOfferLetter(offerLetter) {
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
        <html>
        <head>
            <title>Print Offer Letter</title>
            <style>
                /* Print styling */
                body { 
                    font-family: 'Georgia', serif; 
                    margin: 40px; 
                    color: #333; 
                    background-color: #f9f9f9; 
                }
                h1, h2 { 
                    text-align: center; 
                    color: #004d00; 
                }
                .content { 
                    margin-top: 20px; 
                    background-color: #fff; 
                    padding: 20px; 
                    border: 1px solid #ccc; 
                    border-radius: 8px; 
                }
                .section { 
                    margin-bottom: 20px; 
                    padding: 10px; 
                    border-bottom: 1px solid #eee; 
                }
                .label { 
                    font-weight: bold; 
                    color: #0056b3; 
                }
                .footer { 
                    margin-top: 30px; 
                    text-align: center; 
                    font-size: 12px; 
                    color: #666; 
                }
                ul {
                    margin: 0; 
                    padding: 0 0 0 20px; 
                }
            </style>
        </head>
        <body>
            <h1>Offer Letter</h1>
            <h2>${offerLetter.candidateName}</h2>
            <div class="content">
                <div class="section">
                    <p><span class="label">Department:</span> ${offerLetter.department}</p>
                    <p><span class="label">Designation:</span> ${offerLetter.designation}</p>
                    <p><span class="label">Job Title:</span> ${offerLetter.jobTitle}</p>
                </div>
                <div class="section">
                    <p><span class="label">Start Date:</span> ${offerLetter.startDate}</p>
                    <p><span class="label">Salary:</span> ${offerLetter.salary}</p>
                </div>
                <div class="section">
                    <p><span class="label">Job Description:</span></p>
                    <ul>
                        ${offerLetter.jobDescription.split('\n').map(item => `<li>${item}</li>`).join('')}
                    </ul>
                    <p><span class="label">Additional Notes:</span></p>
                    <ul>
                        ${offerLetter.additionalNotes.split('\n').map(item => `<li>${item}</li>`).join('')}
                    </ul>
                </div>
            </div>
            <div class="footer">
                <p>Thank you for considering this offer. We look forward to welcoming you to our team!</p>
                <p>[Your Company Name]</p>
                <p>[Your Company Contact Information]</p>
            </div>
        </body>
        </html>
    `);
        printWindow.document.close();
        printWindow.print();
    }
</script>