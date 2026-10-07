-- ====================================================
-- TUGAS PRAKTIKUM PERTEMUAN 3 - DDL (DATA DEFINITION LANGUAGE)
-- Database: akademik
-- ====================================================

-- 1. Membuat Database
CREATE DATABASE IF NOT EXISTS akademik
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE akademik;

-- 2. Membuat Tabel Mahasiswa
CREATE TABLE mahasiswa (
    nim VARCHAR(15) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    prodi VARCHAR(80) NOT NULL,
    angkatan YEAR NOT NULL,
    ipk DECIMAL(3,2) DEFAULT 0.00,
    CHECK (ipk BETWEEN 0.00 AND 4.00)
) ENGINE=InnoDB;

-- 3. Membuat Tabel Dosen
CREATE TABLE dosen (
    nidn VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE
) ENGINE=InnoDB;

-- 4. Membuat Tabel Mata Kuliah
CREATE TABLE mata_kuliah (
    kode_mk VARCHAR(12) PRIMARY KEY,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT UNSIGNED NOT NULL,
    nidn VARCHAR(20),
    CONSTRAINT fk_mk_dosen FOREIGN KEY (nidn)
        REFERENCES dosen (nidn)
        ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB;

-- 5. Membuat Tabel KRS
CREATE TABLE krs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15) NOT NULL,
    kode_mk VARCHAR(12) NOT NULL,
    semester TINYINT UNSIGNED NOT NULL,
    tahun_ajaran VARCHAR(9) NOT NULL,
    nilai_huruf CHAR(2) NULL,
    CONSTRAINT uq_krs UNIQUE (nim, kode_mk, semester, tahun_ajaran),
    CONSTRAINT fk_krs_mahasiswa FOREIGN KEY (nim)
        REFERENCES mahasiswa (nim)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_krs_mk FOREIGN KEY (kode_mk)
        REFERENCES mata_kuliah (kode_mk)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;