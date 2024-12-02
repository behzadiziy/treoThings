# TreoThings

TreoThings is an open-source, Trello-inspired task management platform built with **Laravel**, **Livewire**, **Tailwind CSS**, and modern web development tools. It offers powerful real-time collaboration and task organization features for teams and individuals.

## ✨ What's New in TreoThings

The following features were recently added to enhance the platform:
- Mark Tasks as Done: Users can now mark tasks as complete by checking them off, visually indicating progress on tasks.

---

## 🚀 Features

- **Board Management**: Create and manage boards to organize your projects.
- **Column and Card Management**: Add, edit, and reorder columns and cards with drag-and-drop functionality.
- **Real-Time Updates**: Collaborate in real-time using Livewire.
- **Friend System**: Add friends and share boards for seamless teamwork.
- **Role-Based Permissions**: Assign and manage user roles on shared boards.
- **Modern UI**: Built with Tailwind CSS for a sleek and responsive design.
- **Authentication**: Secure login and registration system powered by Laravel Breeze.

---

## 🛠️ Built With

- [Laravel](https://laravel.com/) - Backend framework
- [Livewire](https://livewire.dev/) - Real-time frontend framework
- [Tailwind CSS](https://tailwindcss.com/) - CSS framework for modern UI design
- [MySQL](https://www.mysql.com/) - Database
- [Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze) - Authentication starter kit
- [Blueprint](https://github.com/laravel-shift/blueprint) (optional) - Code generator for Laravel applications

---

## 🌀 Optional Feature: Blueprint Package

TreoThings leverages the **Blueprint** package to streamline the creation of Laravel components, such as:

- Models
- Migrations
- Controllers
- Policies
- Form Requests

Blueprint allows developers to define components in a concise **YAML-based DSL (Domain-Specific Language)** and auto-generate Laravel files, reducing boilerplate code and development time.

### How to Use Blueprint in TreoThings

1. **Install Blueprint** (if not already installed):
   ```bash
   composer require --dev laravel-shift/blueprint
   ```

2. **Define Components** in `draft.yaml`:
   Example `draft.yaml`:
   ```yaml
   models:
     Board:
       name: string
       description: text
       user_id: id
   ```

3. **Run Blueprint Commands**:
   Generate files:
   ```bash
   php artisan blueprint:build
   ```

4. Review and adjust the generated files to fit your specific use case.

---

## 🖥️ Demo

Provide a link to a live demo or screenshots if available.

---

## ⚙️ Installation

Follow these steps to set up TreoThings locally:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/behzadiziy/treoThings.git
   cd treoThings
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Set Environment Variables:**
   Copy `.env.example` to `.env` and configure the database and other settings:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

5. **Run the Application:**
   Start the development server:
   ```bash
   php artisan serve
   npm run dev
   ```

6. **Access the App:**
   Open your browser and visit:
   ```
   http://localhost:8000
   ```

---

## 🤝 Contributing

Contributions are welcome! Follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature-name`.
3. Commit your changes: `git commit -m 'Add feature'`.
4. Push to the branch: `git push origin feature-name`.
5. Submit a pull request.

---

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

## 📞 Contact
For any questions or feedback, feel free to contact me:
- ** Email **: behzada@gmail.com

---




### ⭐ Acknowledgments

- Thanks to the Laravel, Livewire, and Tailwind CSS communities for their amazing tools and support.
- Special mention to the **Blueprint** package for simplifying Laravel development.

### 🌟 Show Your Support

If you find this project helpful, please ⭐ it on GitHub!
