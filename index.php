<?php
$contactsfile = "contacts.json";
$contacts = file_exists($contactsfile) ? json_decode(file_get_contents($contactsfile), true) : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phonebook</title>
  <style>
    :root {
      --accent: #4CAF50;
      --muted-bg: #c4f5ff;
      --header-bg: #b8dfff;
    }

    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: var(--muted-bg);
      color: #111;
    }

    h1 {
      text-align: center;
      color: #b30000;
      background-color:#b8dfff;
      margin: 40px 40px;
      padding: 16px 0;
      border-radius: 8px;
    }

    .container {
      max-width: 95%;
      margin: 20px auto;
      padding: 0 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 6px;
      overflow: hidden;
    }

    th {
      background-color:#4CAF50;
      color: white;
      padding: 12px;
      text-align: center;
      font-weight: 600;
      border: none;
    }

    td {
      padding: 12px;
      border-bottom: 1px solid #eee;
      text-align: center;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    table img {
      max-width: 50px;
      height: auto;
      border-radius: 4px;
    }

    .empty-message {
      text-align: center;
      padding: 20px;
      color: #666;
      font-size: 16px;
    }

    .actions-btn {
      background-color: #ff6b6b;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      font-size: 13px;
      cursor: pointer;
    }

    .actions-btn:hover {
      background-color: #e63946;
    }

    .button-container {
      text-align: center;
      margin: 20px 0;
    }

    a#create {
      display: inline-block;
      border-radius: 6px;
      border: none;
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      font-size: 16px;
      text-decoration: none;
      cursor: pointer;
      font-weight: 600;
      transition: 0.2s;
    }

    a#create:hover {
      background-color: #3e8e41;
    }
  </style>
</head>

<body>
  <h1>My Phonebook</h1>
  <div class="container">
    <?php if (!empty($contacts)): ?>
      <table>
        <tr>
          <th>Serial No.</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Number</th>
          <th>Action</th>
        </tr>
        <?php foreach ($contacts as $index => $contact): ?>
          <tr>
            <td><?php echo htmlspecialchars($contact['id'] ?? ($index + 1)); ?></td>
            <td>
              <?php if (!empty($contact['image'])): ?>
                <img src="<?php echo htmlspecialchars($contact['image']); ?>" alt="Contact Image">
              <?php else: ?>
                &mdash;
              <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($contact['name'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($contact['email'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($contact['number'] ?? ''); ?></td>
            <td><a class="actions-btn" href="delete.php?id=<?php echo urlencode($contact['id'] ?? ($index + 1)); ?>">DELETE</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <div class="empty-message">No contacts saved yet.</div>
    <?php endif; ?>
  </div>
  <div class="button-container">
    <a id="create" href="create.php">+ Create New Contact</a>
  </div>
</body>

</html>