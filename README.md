# Guest Management System – PHP & MySQL

A simple and responsive Guest Management System built using PHP, MySQL, HTML, CSS, and Bootstrap 5. This project allows users to manage guest records with basic CRUD operations and additional features like image upload, search, pagination, and multiple record deletion.

## 🚀 Features

- **Add Guest:** Add new guest records using a form.
- **View Guests:** Display all guest records in a table.
- **Edit Guest:** Update existing guest information.
- **Delete Guest:** Delete individual guest records.
- **Multiple Delete:** Select and delete multiple guest records at once using checkboxes.
- **Image Upload:** Upload and store guest images in the uploads folder.
- **Image Management:** Delete uploaded images along with their guest records.
- **Search:** Search guest records by first name or last name.
- **Pagination:** Display 5 records per page for better record management.
- **Course Selection:** Select a course from the dropdown list.
- **Gender & Hobbies:** Store guest gender and multiple hobbies.

## 🛠️ Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- XAMPP

## 📂 Project Structure

```text
guest_lab/
│
├── db.php
├── index.php
├── view.php
├── edit.php
├── delete.php
│
└── uploads/
```

## ⚙️ Installation & Setup

1. Install and open **XAMPP**.
2. Start Apache and MySQL.
3. Copy the project folder into:

   `C:\xampp\htdocs\`

4. Open phpMyAdmin:

   `http://localhost/phpmyadmin`

5. Create a database named `guest_lab`.
6. Create a table named `guests` with the required columns:

   - id
   - firstname
   - lastname
   - email
   - comment
   - gender
   - hobbies
   - course
   - image

7. Update the database connection in `db.php` if required.
8. Create an `uploads` folder inside the project directory.
9. Open the project in your browser:

   `http://localhost/guest_lab/`

## 📸 Project Modules

| Module | Description |
|---|---|
| Create | Add new guest details |
| Read | Display all guest records |
| Update | Edit existing guest details |
| Delete | Remove individual guest records |
| Image Upload | Upload and display guest images |
| Search | Find guests by name |
| Pagination | Display 5 records per page |
| Multiple Delete | Delete multiple selected records |

## 🎯 Project Objective

The main objective of this project is to understand PHP fundamentals, MySQL database connectivity, CRUD operations, form handling, file uploading, searching, and pagination through practical implementation.

## 👩‍💻 Developer

**Janvi Jain**

- GitHub: [janvi-jain](https://github.com/janvi-jain)
- LinkedIn: [Janvi Jain](https://www.linkedin.com/in/janvi-jain-86111a374/)

---

⭐ If you find this project useful, feel free to explore the repository!
