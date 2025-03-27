# Technical Design Document: Smart Library with AI

## 1. Introduction
Implementasi Smart Library dengan sistem AI. Website ini berfokus pada pengembangan backend menggunakan Laravel dan pengembangan frontend menggunakan Nuxt.js dan Tailwind CSS.

## 2. Technology Stack
- **Backend**: Laravel (PHP Framework)
- **Frontend**: Nuxt.js (Vue.js Framework)
- **Styling**: Tailwind CSS, ShadcN, lucide-vue-next
- **Database**: MySQL
- **AI Services**: Google Cloud AI, JINA Embedding
- **API**: RESTful API
- **Control Version**: Github

## 3. System Architecture
Sistem akan mengikuti arsitektur berlapis:

- **Presentation Layer**: Nuxt.js dengan Tailwind CSS (Frontend)
- **Application Layer**: Laravel (Backend) - Menangani logika bisnis dan API endpoints
- **Data Layer**: MySQL (Database) - Menyimpan data perpustakaan
- **AI Services Layer**: AI APIs Eksternal - Menyediakan fungsionalitas AI

## 4. Backend Design (Laravel)
### 4.1. API Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| /api/login | POST | Autentikasi pengguna untuk mendapatkan token |
| /api/register | POST | Pembuatan akun pengguna baru |
| /api/profile | GET | Mendapatkan data pengguna saat login |
| /api/profile/update | PATCH | Update profil pengguna |
| /api/logout | POST | Logout dan hapus token |
| /api/books | GET | Mendapatkan semua data buku |
| /api/books/{id} | GET | Mendapatkan data buku berdasarkan ID |
| /api/books | POST | Tambah buku baru (admin) |
| /api/books/update/{id} | PATCH | Update data buku |
| /api/books/delete/{id} | DELETE | Hapus buku |
| /api/search?q={query} | GET | Pencarian buku dengan AI |
| /api/search/recommendation | GET | Rekomendasi buku berdasarkan riwayat pengguna |
| /api/catalog | POST | Upload gambar buku untuk katalogisasi otomatis |
| /api/catalog/scan | POST | Pendeteksian informasi buku berdasarkan barcode |
| /api/chatbot/ask | POST | Mengirim pertanyaan ke chatbot |
| /api/chatbot/history | GET | Mendapatkan riwayat chat pengguna |
| /api/admin/users | GET | Mendapatkan daftar pengguna dan admin |
| /api/admin/users/{id} | PATCH | Edit admin atau pengguna |
| /api/admin/users/{id} | DELETE | Hapus admin atau pengguna |

### 4.2. Models
- **Book**: Representasi informasi buku.
- **User**: Representasi informasi pengguna.
- **Admin**: Representasi informasi admin.
- **Catalog**: Representasi data katalog.
- **ChatBot**: Representasi data prompt chatbot.
- **Recommendation**: Representasi rekomendasi buku.

### 4.3. Controllers
- **Book Controller**: Menangani operasi buku.
- **User Controller**: Menangani operasi pengguna.
- **Admin Controller**: Menangani operasi admin.
- **Recommendation Controller**: Menangani rekomendasi.
- **Chatbot Controller**: Menangani chatbot.

### 4.4. AI Integration
- NLP dan text analysis untuk chatbot.
- Rekomendasi berbasis riwayat aktivitas pengguna.

## 5. Frontend Design (Nuxt.js + Tailwind CSS)
### 5.1. Pages
- **Landing Page**: Halaman awal.
- **Login Page**: Halaman login.
- **Register Page**: Halaman pendaftaran.
- **History Page**: Riwayat peminjaman.
- **DetailBooksPage**: Detail buku.
- **Library Page**: Daftar buku.
- **Favorite Page**: Buku favorit pengguna.

### 5.2. Components
- Search Bar
- Resource List
- Card
- Recommendation List
- Chatbot Interface
- Modal
- Navbar

### 5.3. Styling
- Menggunakan Tailwind CSS untuk desain responsif.
- Membuat komponen UI yang dapat digunakan kembali.
- Integrasi ShadcN untuk komponen UI yang lebih interaktif.

## 6. Database Design (MySQL)
### 6.1. Tables
#### **books**
```sql
CREATE TABLE book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    isbn VARCHAR(20) UNIQUE NOT NULL,
    category VARCHAR(100),
    published_year YEAR,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
#### **users**
```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    address TEXT,
    bod DATE NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
#### **admin**
```sql
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
#### **catalogs**
```sql
CREATE TABLE catalog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    isbn VARCHAR(20) UNIQUE,
    category VARCHAR(255),
    description TEXT,
    tags TEXT,
    ai_generated BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);
```
#### **recommendations**
```sql
CREATE TABLE rekomendasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    prompt TEXT,
    score FLOAT NOT NULL DEFAULT 0.0,
    algoritma VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES book(id) ON DELETE CASCADE
);
```

### 6.2. Relationships
- User memiliki banyak rekomendasi (One-to-Many: User → Rekomendasi).
- Setiap buku memiliki satu katalogisasi otomatis (One-to-One: Book → Catalog).
- Buku bisa direkomendasikan ke banyak user (One-to-Many: Book → Rekomendasi).
- Admin bisa membuat banyak user (One-to-Many: Admin → User).

## 7. Non-Functional Requirements Implementation
- **Performance**: Optimisasi query, caching, dan lazy loading.
- **Security**: Authentication & authorization.
- **Scalability**: Mampu menangani peningkatan data dan pengguna.
- **Usability**: UI yang user-friendly.
- **Reliability**: Error handling, logging, dan monitoring.

