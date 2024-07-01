<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #f0f2f5;
            padding: 20px;
            font-family: "Poppins", sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-section h3 {
            margin-bottom: 20px;
            color: #343a40;
            font-weight: bold;
            border-bottom: 2px solid #6c757d;
            padding-bottom: 10px;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h2 {
            color: #343a40;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Job Application Form</h2>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            <!-- Application Post -->
            <div class="form-group">
                <label for="application_post">Application Post</label>
                <input type="text" class="form-control" id="application_post" name="application_post" required>
            </div>

            <!-- Personal Information -->
            <div class="form-section">
                <h3>Personal Information</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="linkedin">LinkedIn Profile Link</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="form-section">
                <h3>Education</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="degree">Latest Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="degree_start_date">Start Date</label>
                        <input type="date" class="form-control" id="degree_start_date" name="degree_start_date" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="institution_city">City</label>
                        <input type="text" class="form-control" id="institution_city" name="institution_city" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cgpa">CGPA</label>
                    <input type="text" class="form-control" id="cgpa" name="cgpa" required>
                </div>
            </div>

            <!-- Previous Experience -->
            <div class="form-section">
                <h3>Previous Experience</h3>
                <div class="form-group">
                    <label for="latest_employer">Latest Employer</label>
                    <input type="text" class="form-control" id="latest_employer" name="latest_employer" required>
                </div>
                <div class="form-group">
                    <label for="business_industry">Employee Business Industry</label>
                    <input type="text" class="form-control" id="business_industry" name="business_industry" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="experience_start_date">Start Date</label>
                        <input type="date" class="form-control" id="experience_start_date" name="experience_start_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="responsibilities">Responsibilities</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <input type="text" class="form-control" id="skills" name="skills" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="latest_salary">Latest Salary</label>
                        <input type="text" class="form-control" id="latest_salary" name="latest_salary" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="expected_salary">Expected Salary</label>
                        <input type="text" class="form-control" id="expected_salary" name="expected_salary" required>
                    </div>
                </div>
            </div>

            <!-- Upload Resume -->
            <div class="form-section">
                <h3>Upload Resume</h3>
                <div class="form-group">
                    <label for="resume">Upload Resume</label>
                    <input type="file" class="form-control-file" id="resume" name="resume" required>
                </div>
            </div>
            <button type="submit" class="btn text-white btn-submit" style="background-color: #1f2b7bcc;">Submit Application</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
