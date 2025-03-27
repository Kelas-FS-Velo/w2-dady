# Test Plan: Smart Library with AI

## 1. Introduction
Test plan ini bertujuan untuk menguji sistem Smart Library yang dikembangkan dengan Laravel untuk backend dan Nuxt.js untuk frontend. Pengujian mencakup aspek fungsional, non-fungsional, API, dan integrasi AI guna memastikan sistem berjalan sesuai dengan spesifikasi dalam **Technical Design Document**.

## 2. Scope of Testing
- Backend API Testing (Laravel)
- Frontend UI Testing (Nuxt.js, Tailwind CSS)
- AI Services Testing (Google Cloud AI, JINA Embedding)
- Database Testing (MySQL)
- Performance Testing

## 3. Test Approach
Pendekatan pengujian mencakup:
- **Manual Testing**: Untuk UI/UX dan API menggunakan Postman.
- **Automated Testing**: Menggunakan PHPUnit untuk Laravel, Jest untuk Nuxt.js.
- **Integration Testing**: Menguji konektivitas antara frontend dan backend.

## 4. Test Cases
### 4.1 Authentication & Authorization
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Login dengan kredensial valid | Memverifikasi login berhasil dengan token | User mendapatkan token autentikasi |
| Login dengan kredensial tidak valid | Memverifikasi respon sistem terhadap login gagal | Error message ‘Invalid Credentials’ |
| Register user baru | Memverifikasi user dapat mendaftar | User terdaftar dan mendapat token |
| Logout | Memverifikasi token dihapus setelah logout | User tidak bisa mengakses API kecuali login ulang |

### 4.2 Books Management
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Tambah buku baru (Admin) | Admin dapat menambahkan buku | Buku tersimpan dalam database |
| Update data buku | Admin dapat mengubah informasi buku | Buku diperbarui di database |
| Hapus buku | Admin dapat menghapus buku | Buku dihapus dari database |
| Cari buku berdasarkan ID | Sistem mengambil buku berdasarkan ID | Buku yang dicari ditampilkan |
| Cari buku dengan query AI | Sistem menampilkan hasil pencarian berbasis AI | Buku relevan ditampilkan |

### 4.3 User Profile
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Update profil pengguna | User dapat memperbarui profilnya | Data user diperbarui |
| Ambil data profil user | User dapat melihat profilnya | Data profil ditampilkan |

### 4.4 AI Features
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Rekomendasi buku berdasarkan riwayat | AI memberikan rekomendasi buku sesuai riwayat user | Buku relevan ditampilkan |
| Pengenalan katalog dengan gambar | Sistem mendeteksi informasi buku dari gambar | Informasi buku berhasil dikenali |
| Chatbot menjawab pertanyaan | Chatbot memberikan jawaban terkait perpustakaan | Jawaban chatbot sesuai konteks |

### 4.5 Database Testing
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Integritas data buku | Memverifikasi data tersimpan dengan benar | Data tidak korup dan sesuai input |
| Hubungan antara tabel user dan rekomendasi | Memastikan relasi sesuai skema database | Relasi one-to-many bekerja dengan benar |

### 4.6 Performance Testing
| Test Case | Description | Expected Result |
|-----------|------------|----------------|
| Load Testing | Menguji beban pada 1000 request API bersamaan | API tetap responsif |
| Response Time | Mengukur waktu respon API < 1 detik | API merespon dalam < 1 detik |

## 5. Test Environment
| Component | Details |
|-----------|---------|
| Backend | Laravel 10, PHP 8 |
| Frontend | Nuxt.js 3, Tailwind CSS, ShadcN |
| Database | MySQL 8 |
| AI Services | Google Cloud AI, JINA Embedding |
| API Testing Tool | Postman |

## 6. Test Execution
- **Unit Testing**: Dilakukan pada setiap modul oleh developer.
- **Integration Testing**: Menguji interaksi antara frontend dan backend.
- **System Testing**: Memastikan keseluruhan sistem bekerja dengan baik.
- **User Acceptance Testing (UAT)**: Pengujian oleh end-user sebelum deploy.

## 7. Exit Criteria
- Semua test case harus berhasil.
- Tidak ada bug kritis atau blocker.


---
Dokumen ini akan diperbarui sesuai kebutuhan proyek. Semua pengujian akan dicatat dalam bug tracking system dan hasil pengujian akan dianalisis sebelum deployment.