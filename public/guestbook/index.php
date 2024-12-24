<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Guestbook;
use App\Models\ProhibitedWords;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Check if the message contains any prohibited words
    $prohibitedWords = ProhibitedWords::all();
    foreach ($prohibitedWords as $record) {
        if (strpos($message, $record->word) !== false) {
            $errorMessage = "Prohibited word detected: " . $record->word;
            $prohibitedWordUsed = true;
            break;
        }
    }

    if ($prohibitedWordUsed) {
       return;
    }
    
    // Check if both fields are filled
    if (!empty($name) && !empty($message)) {

        // Save the message to the database
        Guestbook::create([
            'name' => $name,
            'message' => $message
        ]);
    } else {
        $errorMessage = "Both fields are required!";
    }
}

// Pull previous messages from the database
$messages = Guestbook::all();
?>

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
