# 🕹️ GAMIFY_SYSTEM v3.0

A gamified learning and engagement platform built with a high-fidelity **90s Arcade & Cyberpunk aesthetic**. This project transforms standard application features like quizzes, leaderboards, and user profiles into an immersive digital experience.

---

## 🌟 Key Features

- **Retro-Future Dashboard**: A centralized hub for user stats and navigation with a dynamic CRT monitor effect.
- **Quest-based Quizzes**: Interactive learning modules designed with arcade-style feedback.
- **Dynamic Leaderboard**: Real-time operative rankings with "Hall of Fame" aesthetics.
- **Badge System**: Unlockable achievements displayed as high-contrast pixel assets.
- **Immersive Auth UI**: Custom "System Boot" sequences for Login and Registration with theme-shifting backgrounds (Matrix Green vs. Cyberpunk Magenta).

## 🛠️ Tech Stack & Tools

### Core Frameworks
- **[Laravel](https://laravel.com/)**: The robust PHP framework powering the backend logic and routing.
- **[Livewire](https://livewire.laravel.com/)**: Used for real-time reactive UI components (Stats, Quiz interactions).
- **[Tailwind CSS v4](https://tailwindcss.com/)**: The latest utility-first CSS framework, utilizing new v4 features like `@theme` and `@utility` for the custom design system.

### Frontend Tooling
- **[Vite](https://vitejs.dev/)**: Fast frontend build tool for bundling assets and hot-reloading.
- **Custom CSS Engine**: Hand-crafted `@keyframes` for Scanlines, CRT flickers, and Terminal-style typing effects.

### Development Utilities
- **PHP Artisan**: Laravel's powerful CLI for migrations, seeding, and building.
- **NPM/Node.js**: Managing frontend dependencies and build processes.

## 🚀 Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL or SQLite

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Havinoia/gamify.git
   cd gamify-laravel
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**:
   Update your `.env` file with your database credentials, then run:
   ```bash
   php artisan migrate --seed
   ```

5. **Launch Application**:
   ```bash
   # Terminal 1: Vite Dev Server
   npm run dev

   # Terminal 2: PHP Dev Server
   php artisan serve
   ```

## 🔒 Security System
- **CSRF Protection**: Integrated across all forms.
- **Bcrypt Hashing**: Secure operative credential storage.
- **Session-based Authentication**: State-persistent access control.

---

<p align="center">
  <i>"JOIN_THE_REBELLION. ACCESS_THE_SYSTEM."</i><br>
  <b>SECURE_SERVER_v3.0.42_ACTIVE</b>
</p>
