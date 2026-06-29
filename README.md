# 📒 Phonebook — Contact Management Web App

A lightweight PHP-based web application for storing and managing personal and professional contacts with image support.

---

## ✨ Features

- ➕ Add new contacts with name, phone, email, and image
- ✏️ Edit or 🗑️ Delete existing contacts
- 📇 Store contact details in a JSON file (no database required)
- 🖼️ Supports profile images for each contact
- 🔍 Search and filter contacts instantly
- 📱 Responsive design — works on desktop and mobile

---

## 🛠 Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Storage:** JSON file (`contact.json`)

---

## 🚀 Getting Started

### Prerequisites

- PHP 8+
- Local server environment (XAMPP, WAMP, or LAMP)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/phonebook.git
cd phonebook
```

2. Place the project folder in your server's root directory (`htdocs` for XAMPP).
3. Ensure PHP is running and accessible via your local server.

### Running the App

Open your browser and go to:

```
http://localhost/phonebook
```

---

## 📖 Usage

1. Click **Add Contact** to create a new entry.
2. Fill in the name, phone number, email, and upload an image.
3. Use the search bar to find contacts by name or number.
4. Click a contact to **edit** or **delete** it.

---

## 📂 Project Structure

```
phonebook/
├── index.php       # Main entry point, displays contacts
├── create.php      # Form to add new contacts
├── delete.php      # Logic to remove contacts
├── contact.json    # Stores all contact data and images
└── README.md
```

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

---

## 📜 License

[MIT](LICENSE)
