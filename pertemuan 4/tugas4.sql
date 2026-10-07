-- ====================================================
-- TUGAS PRAKTIKUM PERTEMUAN 4 - DML (DATA MANIPULATION LANGUAGE)
-- Database: akademik
-- ====================================================

USE akademik;

-- 1. INSERT DATA MAHASISWA
INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk) VALUES
('2026001', 'Andi Pratama', 'andi@kampus.ac.id', 'Teknik Informatika', 2026, 3.75),
('2026002', 'Siti Rahma', 'siti@kampus.ac.id', 'Sistem Informasi', 2026, 3.82),
('2025003', 'Budi Santoso', 'budi@kampus.ac.id', 'Teknik Informatika', 2025, 3.20);

-- 2. SELECT DENGAN FILTER IPK >= 3.50
SELECT nim, nama, prodi, ipk
FROM mahasiswa
WHERE ipk >= 3.50
ORDER BY ipk DESC, nama ASC
LIMIT 10;

-- 3. UPDATE IPK MAHASISWA
UPDATE mahasiswa
SET ipk = 3.40
WHERE nim = '2025003';

-- 4. REKAP JUMLAH MAHASISWA DAN RATA-RATA IPK PER PRODI
SELECT prodi, COUNT(*) AS jumlah, ROUND(AVG(ipk), 2) AS rata_ipk
FROM mahasiswa
GROUP BY prodi
ORDER BY jumlah DESC;

-- 5. DELETE DATA MAHASISWA
DELETE FROM mahasiswa WHERE nim = '2025003';