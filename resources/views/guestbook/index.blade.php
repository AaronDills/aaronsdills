<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <!-- Google Fonts for rounded fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="/resources/css/guestbook.css" rel="stylesheet">
</head>
<body>

<style>
    body {
        font-family: 'Poppins', sans-serif; /* Rounded font */
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        width: 100%;
        max-width: 700px;
        background-color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    h1 {
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 20px;
        font-weight: 500;
    }
    p {
        font-size: 1rem;
        color: #555;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    input[type="text"], textarea {
        padding: 14px;
        border-radius: 12px;
        border: 1px solid #ccc;
        font-size: 1rem;
        width: 100%;
        box-sizing: border-box;
        outline: none;
        transition: border 0.3s ease;
    }
    input[type="text"]:focus, textarea:focus {
        border: 1px solid #007bff;
    }
    input[type="submit"] {
        padding: 14px;
        font-size: 1.1rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .messages {
        margin-top: 30px;
        text-align: left;
    }
    .message {
        background-color: #f9f9f9;
        padding: 15px;
        margin: 10px 0;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 1.1rem;
    }
    .message span {
        display: block;
        font-size: 0.85rem;
        color: #777;
        margin-top: 10px;
    }
    .error {
        color: red;
        font-size: 1.2rem;
        margin-top: 20px;
    }
    .empty-msg {
        font-style: italic;
        color: #aaa;
    }
    footer {
        margin-top: 30px;
        font-size: 0.9rem;
        color: #888;
    }

</style>

<div class="container">
    <h1>Welcome to the Guestbook!</h1>

    <?php if (isset($errorMessage)): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form action="guestbook.php" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
        <input type="submit" value="Sign the Guestbook">
    </form>

    <div class="messages">
        <h2>Messages:</h2>
        
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <div class="message">
                    <?php echo nl2br($msg); ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty-msg">No messages yet. Be the first to leave a message!</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 aaronsdills.dev</p>
    </footer>
</div>

</body>
</html>
