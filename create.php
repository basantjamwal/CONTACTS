<?php
$uploadsDir = 'uploads/';
$contactsfile = 'contacts.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_NUMBER_INT);

    if ($name && $email && $number && isset($_FILES['image'])) {
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imagename = time() . "_" . basename($_FILES["image"]["name"]);
        $imagepath = $uploadsDir . $imagename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagepath)) {
            $contacts = file_exists($contactsfile)
                ? json_decode(file_get_contents($contactsfile), true)
                : [];

            $contacts[] = [
                "id" => rand(1000000, 2000000),
                "name" => $name,
                "email" => $email,
                "number" => $number,
                "image" => $imagepath
            ];

            file_put_contents($contactsfile, json_encode($contacts, JSON_PRETTY_PRINT));
            echo "Contact saved successfully! <a href='index.php'>Go back to phonebook</a>";
        } else {
            echo "Image upload failed.";
        }
    } else {
        echo "Invalid input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Contact</title>
    <style>
        :root {
            --max-width: 420px;
            --accent: #4CAF50;
            --muted-bg: #c4f5ff;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--muted-bg);
            color: #111;
        }

        h1 {
            text-align: center;
            color: #930000;
            background-color: #a8d5fa;
            margin: 24px 0;
            padding: 12px 0;
            border-radius: 6px;
        }

        /* Centered form container */
        .container {
            max-width: var(--max-width);
            margin: 20px auto;
            background: #fff;
            padding: 18px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #c02020;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #bbb;
            font-size: 15px;
            color: #0a3d78;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 14px;
            border-radius: 6px;
            border: none;
            font-size: 16px;
            background-color: var(--accent);
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-top: 6px;
        }

        .back-link {
            color: #c02020;
            text-decoration: none;
            font-weight: 600;
        }

        .note {
            font-size: 13px;
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Add New Contact</h1>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Full name" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <div>
                <label for="number">Number</label>
                <input type="text" id="number" name="number" placeholder="Phone number" required>
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="actions">
                <a class="back-link" href="index.php">&larr; Back to Phonebook</a>
                <div>
                    <button type="submit">Save Contact</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>