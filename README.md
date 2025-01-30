📚 Book CRUD with Authentication


A simple Book Management System built with Laravel, Inertia.js, Vue.js, and SQLite, featuring full authentication and CRUD operations.

🚀 Features
✅ Authentication (Login, Register, Logout)
✅ Book Management (Create, Read, Update, Delete)
✅ Vue.js Frontend with Inertia.js
✅ SQLite Database for lightweight storage
✅ Laravel Breeze for authentication

📦 Tech Stack
Backend: Laravel 11.x
Frontend: Vue 3, Inertia.js
Database: SQLite
Authentication: Laravel Breeze

🔧 Installation
1️⃣ Clone the Repository
git clone https://github.com/yourusername/book-crud-laravel.git
cd book-crud-laravel

2️⃣ Install Dependencies
composer install
npm install

3️⃣ Set Up Environment
cp .env.example .env
php artisan key:generate

4️⃣ Configure Database (SQLite)
In your .env file, set up SQLite:

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
Create the SQLite file:

touch database/database.sqlite

5️⃣ Run Migrations & Seeders
php artisan migrate --seed

6️⃣ Run Vite & Start Server
npm run dev  # Start frontend
php artisan serve  # Start backend


📜 License
This project is open-source under the MIT License.

🙌 Contributing
Contributions are welcome! Feel free to submit a PR or open an issue.

📞 Contact
GitHub: kennedy93
Email: kennedyrodrick93@gmail.com
