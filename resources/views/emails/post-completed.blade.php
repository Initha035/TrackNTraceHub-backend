<!DOCTYPE html>
<html>

<head>
    <title>Your Post Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1 style="color: #007BFF;">Congratulations!</h1>

    <p>Your post has been marked as completed. Here are the details:</p>

    <strong>Post Title:</strong> {{ $posting->title }}<br>
    <strong>Description:</strong> {{ $posting->description }}<br>
    <strong>Type:</strong> {{ $posting->type }}<br>

    <p>Thank you for using our service. If you have any questions or need further assistance, please feel free to contact us.</p>

    <p>Best regards,<br> Your TrackNTrace Team</p>
</body>

</html>