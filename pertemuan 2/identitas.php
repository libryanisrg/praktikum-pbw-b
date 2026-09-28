<?php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    protected float $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        // Modifikasi: Validasi dasar panjang NIM
        if (strlen($nim) < 5) {
            throw new InvalidArgumentException('NIM tidak valid, harus lebih dari 4 karakter.');
        }
        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return "NIM: " . $this->nim . " | Nama: " . $this->nama . " | IPK: " . $this->ipk;
    }
}

$mhs = new Mahasiswa('2026002', 'Libryan Isra Gunawan', 3.80);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Identitas OOP</title>
    <style>
        body { font-family: monospace; background-color: #282c34; color: #61dafb; padding: 20px; font-size: 16px;}
        .output { background: #21252b; padding: 15px; border-left: 4px solid #98c379; }
    </style>
</head>
<body>
    <div class="output">
        <?= htmlspecialchars($mhs->ringkasan()) ?>
    </div>
</body>
</html>