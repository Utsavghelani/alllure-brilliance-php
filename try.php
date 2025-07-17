<?php
include 'conn.php'; // 🔗 Include your DB connection file

// Get product_id from URL or default to 1
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Prepare and execute query using $conn (MySQLi)
$stmt = $conn->prepare("SELECT material_type, price FROM product_prices WHERE product_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch prices as associative array
$prices = [];
while ($row = $result->fetch_assoc()) {
    $prices[$row['material_type']] = $row['price'];
}

// (Optional) Fetch product name if needed
$productName = "Product #" . $product_id;
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($productName) ?> - Select Options</title>
    <style>
        .color-swatch {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: 5px;
            display: inline-block;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .color-selected {
            border: 2px solid #000;
        }
        .karat-buttons button {
            padding: 8px 16px;
            margin: 5px;
            cursor: pointer;
        }
        .karat-selected {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>

<h2><?= htmlspecialchars($productName) ?></h2>

<!-- MATERIAL COLOR SELECT -->
<p><strong>Select Material:</strong></p>
<div id="materialColors">
    <div class="color-swatch color-gold" data-material="gold" style="background-color: #d4af37;"></div>
    <div class="color-swatch color-silver" data-material="silver" style="background-color: #c0c0c0;"></div>
    <div class="color-swatch color-platinum" data-material="platinum" style="background-color: #e5e4e2;"></div>
</div>

<!-- KARAT SELECT (only for gold) -->
<div id="karatSection" class="karat-buttons" style="display:none;">
    <p><strong>Select Karat:</strong></p>
    <button data-karat="10k">10K</button>
    <button data-karat="14k">14K</button>
    <button data-karat="18k">18K</button>
</div>

<!-- PRICE -->
<h3 id="priceDisplay">Loading price...</h3>

<script>
const prices = <?= json_encode($prices) ?>;

let selectedMaterial = "silver";
let selectedKarat = null;

const priceDisplay = document.getElementById('priceDisplay');
const karatSection = document.getElementById('karatSection');
const colorSwatches = document.querySelectorAll('.color-swatch');
const karatButtons = document.querySelectorAll('#karatSection button');

function updatePrice() {
    let key = selectedMaterial;
    if (selectedMaterial === 'gold' && selectedKarat) {
        key = `${selectedKarat}_gold`;
    }

    if (prices[key]) {
        priceDisplay.innerText = `Price: $${prices[key]}`;
    } else {
        priceDisplay.innerText = "Price not available.";
    }
}

// Handle material selection
colorSwatches.forEach(swatch => {
    swatch.addEventListener('click', () => {
        selectedMaterial = swatch.getAttribute('data-material');
        selectedKarat = null;

        colorSwatches.forEach(s => s.classList.remove('color-selected'));
        swatch.classList.add('color-selected');

        karatSection.style.display = selectedMaterial === 'gold' ? 'block' : 'none';

        updatePrice();
    });
});

// Handle karat selection
karatButtons.forEach(button => {
    button.addEventListener('click', () => {
        selectedKarat = button.getAttribute('data-karat');

        karatButtons.forEach(b => b.classList.remove('karat-selected'));
        button.classList.add('karat-selected');

        updatePrice();
    });
});

// Initial price load
window.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.color-silver').classList.add('color-selected');
    updatePrice();
});
</script>

</body>
</html>
