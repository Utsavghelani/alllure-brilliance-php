<?php
include 'conn.php'; // Database connection

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

$stmt = $conn->prepare("SELECT material_type, price FROM product_prices WHERE product_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

$prices = [];
while ($row = $result->fetch_assoc()) {
    $prices[$row['material_type']] = $row['price'];
}

$productName = "Elegant Diamond Ring";
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
            border: 1px solid #ccc;
            background: #fff;
        }
        .karat-selected {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>

<h2><?= htmlspecialchars($productName) ?></h2>
<h3 id="priceDisplay">Loading price...</h3>

<!-- Selected Material Text -->
<p id="selectedMaterialText"><strong>Color:</strong> Silver</p>

<!-- Material Swatches -->
<div id="materialColors">
    <div class="color-swatch color-gold" data-material="gold" style="background-color: #d4af37;"></div>
    <div class="color-swatch color-silver" data-material="silver" style="background-color: #c0c0c0;"></div>
    <div class="color-swatch color-platinum" data-material="platinum" style="background-color: #e5e4e2;"></div>
</div>

<!-- Karat Buttons -->
<div id="karatSection" class="karat-buttons" style="display: none;">
    <p><strong>Select Karat:</strong></p>
    <button data-karat="10k">10K</button>
    <button data-karat="14k">14K</button>
    <button data-karat="18k">18K</button>
</div>

<script>
const prices = <?= json_encode($prices) ?>;

let selectedMaterial = "silver";
let selectedKarat = "10k";

const priceDisplay = document.getElementById('priceDisplay');
const karatSection = document.getElementById('karatSection');
const colorSwatches = document.querySelectorAll('.color-swatch');
const karatButtons = document.querySelectorAll('#karatSection button');
const selectedMaterialText = document.getElementById('selectedMaterialText');

// Capitalize helper
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function updatePrice() {
    let key = selectedMaterial;
    if (selectedMaterial === 'gold') {
        key = `${selectedKarat}_gold`;
    }

    if (prices[key]) {
        priceDisplay.innerText = `Price: ₹${parseFloat(prices[key]).toFixed(2)}`;
    } else {
        priceDisplay.innerText = "Price not available.";
    }
}

// Handle material (color) selection
colorSwatches.forEach(swatch => {
    swatch.addEventListener('click', () => {
        selectedMaterial = swatch.getAttribute('data-material');
        selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalizeFirstLetter(selectedMaterial)}`;

        // Highlight selected
        colorSwatches.forEach(s => s.classList.remove('color-selected'));
        swatch.classList.add('color-selected');

        if (selectedMaterial === 'gold') {
            karatSection.style.display = 'block';
            selectedKarat = "10k";
            karatButtons.forEach(b => b.classList.remove('karat-selected'));
            karatButtons[0].classList.add('karat-selected');
        } else {
            karatSection.style.display = 'none';
            selectedKarat = null;
        }

        updatePrice();
    });
});

// Handle karat button selection
karatButtons.forEach(button => {
    button.addEventListener('click', () => {
        selectedKarat = button.getAttribute('data-karat');
        karatButtons.forEach(b => b.classList.remove('karat-selected'));
        button.classList.add('karat-selected');
        updatePrice();
    });
});

// On load default to silver and 10k if gold is selected
window.addEventListener('DOMContentLoaded', () => {
    const silverSwatch = document.querySelector('.color-silver');
    silverSwatch.classList.add('color-selected');
    selectedMaterialText.innerHTML = `<strong>Color:</strong> Silver`;
    updatePrice();
});
</script>

</body>
</html>
