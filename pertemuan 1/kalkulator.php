<?php
// kalkulator.php dengan modifikasi styling dan operasi modulus
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        case '%': // Modifikasi: Tambah operasi Modulus
            if ($b == 0) {
                $pesan = 'Modulus dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a % $b;
            }
            break;
        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        .container { max-width: 400px; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        input, select, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #0056b3; }
        .result { font-weight: bold; color: #333; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator Sederhana</h1>
        <form method="post">
            <input type="number" step="any" name="a" placeholder="Angka Pertama" required>
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">% (Modulus)</option> <!-- Modifikasi -->
            </select>
            <input type="number" step="any" name="b" placeholder="Angka Kedua" required>
            <button type="submit">Hitung</button>
        </form>
        <?php if ($pesan): ?>
            <p style="color: red;"><?= htmlspecialchars($pesan) ?></p>
        <?php elseif ($hasil !== null): ?>
            <p class="result">Hasil: <?= htmlspecialchars((string)$hasil) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>