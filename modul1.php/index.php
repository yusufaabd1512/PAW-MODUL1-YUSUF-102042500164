<?php
$produk = [
    ["nama" => "Laptop Productivity", "kategori" => "Laptop", "harga" => 8500000, "stok" => 3],
    ["nama" => "Monitor 24 Inch", "kategori" => "Monitor", "harga" => 1800000, "stok" => 4],
    ["nama" => "Webcam 1080p", "kategori" => "Kamera", "harga" => 1200000, "stok" => 0],
    ["nama" => "Keyboard Mechanical", "kategori" => "Aksesoris", "harga" => 600000, "stok" => 0],
    ["nama" => "Headset Gaming", "kategori" => "Audio", "harga" => 450000, "stok" => 5],
    ["nama" => "Mouse Wireless", "kategori" => "Aksesoris", "harga" => 150000, "stok" => 10]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background-color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }
        header h2 { margin: 0; }
        .hero {
            background-color: #222;
            color: white;
            padding: 50px 20px;
            text-align: center;
            margin: 20px;
        }
        .container {
            padding: 0 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .katalog-header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding-bottom: 40px;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .card h4 { margin-top: 0; margin-bottom: 5px; font-size: 18px; }
        .old-price {
            color: #888;
            text-decoration: line-through;
            margin: 5px 0;
        }
        .buy-button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            margin-top: 15px;
        }
        .disabled-button {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #ddd;
        }
        @media (max-width: 900px) {
            .product-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .product-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
        <h2>Cia Store</h2>
        <nav>
            <span style="margin-right: 15px;">Home</span>
            <span>Products</span>
        </nav>
    </header>
    
    <div class="hero">
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
    </div>

    <div class="container">
        <div class="katalog-header">
            <h3>Katalog Produk</h3>
            <p>Total Produk: <?= count($produk) ?></p>
        </div>

        <div class="product-grid">
            <?php foreach ($produk as $item): ?>
                <div class="card">
                    <h4><?= $item["nama"] ?></h4>
                    <p style="color: #666; margin-top: 0;"><?= $item["kategori"] ?></p>

                    <?php if ($item["harga"] >= 1000000): ?>
                        <?php 
                        $diskon = $item["harga"] * 0.10; 
                        $harga_baru = $item["harga"] - $diskon; 
                        ?>
                        <span style="background-color: red; color: white; padding: 3px 8px; font-size: 12px;">DISKON 10%</span>
                        <p class="old-price">Rp<?= number_format($item["harga"], 0, ',', '.') ?></p>
                        <p style="font-size: 18px; font-weight: bold; margin: 5px 0;">Rp<?= number_format($harga_baru, 0, ',', '.') ?></p>
                    <?php else: ?>
                        <p style="font-size: 18px; font-weight: bold; margin: 5px 0;">Rp<?= number_format($item["harga"], 0, ',', '.') ?></p>
                    <?php endif; ?>

                    <p>Stok: <?= $item["stok"] ?></p>

                    <?php if ($item["stok"] > 0): ?>
                        <p style="color: green;">Status: Tersedia</p>
                        <button class="buy-button">Beli Sekarang</button>
                    <?php else: ?>
                        <p style="color: red;">Status: Stok Habis</p>
                        <button class="buy-button disabled-button" disabled>Beli Sekarang</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Cia Store - Praktikum PAW | Dibuat oleh Yusuf</p>
    </footer>
</body>
</html>