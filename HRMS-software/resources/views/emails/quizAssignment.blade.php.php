<!DOCTYPE html>
<html>
<head>
    <title>Quiz Assignment</title>
</head>
<body>
    <p>Dear {{ $candidateName }},</p>
    <p>You have been assigned a quiz. Please use the following credentials to log in and attempt the quiz:</p>
    <p>
        <strong>Link:</strong> <a href="{{ $link }}">{{ $link }}</a><br>
        <strong>Username:</strong> {{ $username }}<br>
        <strong>Password:</strong> {{ $password }}
    </p>
    <p>Best of luck!</p>
</body>
</html>
