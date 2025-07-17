<?php
include 'conn.php'; // Include your DB connection

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
        body {
            font-family: Arial, sans-serif;
        }
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
            border: 1px solid #000;
            background-color: white;
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

<!-- Color Label -->
<p><strong>Color:</strong> <span id="selectedMaterialLabel">Silver</span></p>

<!-- MATERIAL COLOR SELECT -->
<div id="materialColors">
    <div class="color-swatch color-gold" data-material="gold" style="background-color: #d4af37;"></div>
    <div class="color-swatch color-silver" data-material="silver" style="background-color: #c0c0c0;"></div>
    <div class="color-swatch color-platinum" data-material="platinum" style="background-color: #e5e4e2;"></div>
</div>

<!-- SIZE DISPLAY -->
<p><strong>Size:</strong> S</p>

<!-- KARAT SELECT -->
<div id="karatSection" class="karat-buttons" style="display:none;">
    <p id="karatMaterialLabel" style="font-weight: bold;">Material: Gold</p>
    <p><strong>Select Karat:</strong></p>
    <p id="selectedKaratLabel"><strong>Selected Karat:</strong> 10K</p>
    <button data-karat="10k">10K</button>
    <button data-karat="14k">14K</button>
    <button data-karat="18k">18K</button>
</div>

<!-- JS SCRIPT -->
<script>
const prices = <?= json_encode($prices) ?>;

let selectedMaterial = "silver";
let selectedKarat = null;

const priceDisplay = document.getElementById('priceDisplay');
const selectedMaterialLabel = document.getElementById('selectedMaterialLabel');
const karatSection = document.getElementById('karatSection');
const karatMaterialLabel = document.getElementById('karatMaterialLabel');
const selectedKaratLabel = document.getElementById('selectedKaratLabel');

const colorSwatches = document.querySelectorAll('.color-swatch');
const karatButtons = document.querySelectorAll('#karatSection button');

function updatePrice() {
    let key = selectedMaterial;
    if (selectedMaterial === 'gold' && selectedKarat) {
        key = `${selectedKarat}_gold`;
    }

    if (prices[key]) {
        priceDisplay.innerText = `Price: ₹${prices[key]}`;
    } else {
        priceDisplay.innerText = "Price not available.";
    }
}

// Handle material selection
colorSwatches.forEach(swatch => {
    swatch.addEventListener('click', () => {
        selectedMaterial = swatch.getAttribute('data-material');
        selectedMaterialLabel.innerText = capitalize(selectedMaterial);
        selectedKarat = "10k"; // default karat

        colorSwatches.forEach(s => s.classList.remove('color-selected'));
        swatch.classList.add('color-selected');

        if (selectedMaterial === 'gold') {
            karatSection.style.display = 'block';
            karatMaterialLabel.innerText = "Material: Gold";
            selectedKaratLabel.innerHTML = `<strong>Selected Karat:</strong> 10K`;

            // Set 10k button as selected
            karatButtons.forEach(b => {
                if (b.getAttribute('data-karat') === "10k") {
                    b.classList.add('karat-selected');
                } else {
                    b.classList.remove('karat-selected');
                }
            });

        } else {
            karatSection.style.display = 'none';
            karatMaterialLabel.innerText = "";
            selectedKaratLabel.innerText = "";
            karatButtons.forEach(b => b.classList.remove('karat-selected'));
        }

        updatePrice();
    });
});

// Handle karat selection
karatButtons.forEach(button => {
    button.addEventListener('click', () => {
        selectedKarat = button.getAttribute('data-karat');

        karatButtons.forEach(b => b.classList.remove('karat-selected'));
        button.classList.add('karat-selected');

        selectedKaratLabel.innerHTML = `<strong>Selected Karat:</strong> ${selectedKarat.toUpperCase()}`;

        updatePrice();
    });
});

// Initial load
window.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.color-silver').classList.add('color-selected');
    selectedMaterial = 'silver';
    selectedMaterialLabel.innerText = "Silver";
    updatePrice();
});

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
</script>

</body>
</html>
