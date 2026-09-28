<?php
interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }
    public function getNama(): string
    {
        return $this->nama;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(string $nama, float $harga, private float $diskon)
    {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

// Modifikasi: Mengganti data produk menjadi plugin musik
$daftar = [
    new Produk('Impact Soundworks Guitar Plugin', 1800000),
    new ProdukDiskon('Heavyocity Choir Plugin', 2500000, 15),
    new ProdukDiskon('ML Sound Lab Amp', 900000, 10)
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Hitung Diskon OOP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        table { width: 100%; border-collapse: collapse; max-width: 600px;}
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Harga Plugin Musik</h2>
    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga Akhir</th>
        </tr>
        <?php foreach ($daftar as $produk): ?>
        <tr>
            <td><?= htmlspecialchars($produk->getNama()) ?></td>
            <td>Rp <?= number_format($produk->hargaAkhir(), 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>