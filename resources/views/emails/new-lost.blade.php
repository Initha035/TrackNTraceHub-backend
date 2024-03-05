<!DOCTYPE html>
<html>

<head>
    <title>New Lost Item Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #007BFF;
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
    <h1>New Lost Item Alert</h1>

    <p>Dear Volunteer,</p>

    <p>We are writing to inform you about a new lost item that has been posted:</p>

    <strong>Item Title:</strong> {{ $posting->title }}<br>
    <strong>Description:</strong> {{ $posting->description }}<br>
    <strong>Type:</strong> {{ $posting->type }}<br>

    <p>Please consider helping us in reuniting this lost item with its owner.</p>

    <p>Thank you for your dedication and support in our TrackNTrace community.</p>

    <p>Best regards,<br> Your TrackNTrace Team</p>
</body>

</html>