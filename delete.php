<?php
if (isset($_GET["id"])) {
    $contactsfile = 'contacts.json';
    $contacts = file_exists($contactsfile) ? json_decode(file_get_contents($contactsfile), true) : [];

    $id = (int) $_GET['id'];

    $contacts = array_filter($contacts, fn($c) => $c['id'] !== $id);

    file_put_contents($contactsfile, json_encode(array_values($contacts), JSON_PRETTY_PRINT));

    $message = "Contact Deleted Successfully!";
    $status = "success";
} else {
    $message = "No ID provided.";
    $status = "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Contact</title>
    <style>
        :root {
            --accent: #4CAF50;
            --error: #e63946;
            --muted-bg: #c4f5ff;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--muted-bg);
            color: #111;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message-container {
            max-width: 500px;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .message-container.success {
            background-color: #d4edda;
            border: 2px solid var(--accent);
        }

        .message-container.error {
            background-color: #f8d7da;
            border: 2px solid var(--error);
        }

        .message-container h2 {
            margin: 0 0 16px 0;
            font-size: 24px;
        }

        .message-container.success h2 {
            color: #155724;
        }

        .message-container.error h2 {
            color: #721c24;
        }

        .message-text {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .message-container.success .message-text {
            color: #155724;
        }

        .message-container.error .message-text {
            color: #721c24;
        }

        .back-link {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: background-color 0.2s;
        }

        .message-container.success .back-link {
            background-color: var(--accent);
            color: white;
        }

        .message-container.success .back-link:hover {
            background-color: #3e8e41;
        }

        .message-container.error .back-link {
            background-color: var(--error);
            color: white;
        }

        .message-container.error .back-link:hover {
            background-color: #c1121f;
        }
    </style>
</head>

<body>
    <div class="message-container <?php echo $status; ?>">
        <h2><?php echo ($status === 'success') ? '✓ Success' : '✗ Error'; ?></h2>
        <div class="message-text"><?php echo htmlspecialchars($message); ?></div>
        <a class="back-link" href="index.php">← Back to Phonebook</a>
    </div>
</body>

</html>