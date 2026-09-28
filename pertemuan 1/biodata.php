<?php
// biodata.php dengan modifikasi field data dan styling
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '2026002', // Menggunakan NIM Genap
    'nama' => 'Libryan Isra Gunawan',
    'prodi' => 'Teknik Informatika',
    'fokus_magang' => 'UI/UX Design', // Modifikasi: Field baru
    'hobi' => 'Membuat Musik Pop', // Modifikasi: Field baru
    'semester' => 6,
    'ipk' => 3.75
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #eceff1; padding: 40px; }
        .card { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 500px; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px 0; border-bottom: 1px solid #eee; }
        .predikat { font-weight: bold; color: #2e7d32; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Biodata Mahasiswa</h1>
        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li><strong><?= ucfirst(str_replace('_', ' ', $kunci)) ?>:</strong> <?= htmlspecialchars((string)$nilai) ?></li>
            <?php endforeach; ?>
        </ul>
        <p class="predikat">Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
    </div>
</body>
</html>