<?php
include 'conn.php'; // Database connection file

// Get product_id from URL or default to 1
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Fetch product name
$stmtName = $conn->prepare("SELECT name FROM products WHERE id = ?");
$stmtName->bind_param("i", $product_id);
$stmtName->execute();
$resultName = $stmtName->get_result();
$productName = $resultName->fetch_assoc()['name'] ?? "Product";
$stmtName->close();

// Fetch product prices (gold with karat & sub_material, silver/platinum plain)
$stmtPrice = $conn->prepare("SELECT material, karat, sub_material, price FROM product_prices_1 WHERE product_id = ?");
$stmtPrice->bind_param("i", $product_id);
$stmtPrice->execute();
$resultPrice = $stmtPrice->get_result();

$prices = [];
while ($row = $resultPrice->fetch_assoc()) {
    if ($row['material'] === 'gold') {
        $key = strtolower($row['karat'] . '_' . $row['sub_material'] . '_gold');
    } else {
        $key = strtolower($row['material']);
    }
    $prices[$key] = $row['price'];
}
$stmtPrice->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($productName) ?> - Select Options</title>
  <style>
    .color-swatch { width: 30px; height: 30px; border-radius: 50%; display: inline-block; cursor: pointer; margin: 5px; border: 2px solid transparent; }
    .color-selected { border-color: #000; }
    .karat-buttons button, .gold-type-btn { margin: 5px; padding: 8px 12px; cursor: pointer; }
    .karat-selected { background: #000; color: #fff; }
  </style>
</head>
<body>
<h2><?= htmlspecialchars($productName) ?></h2>
<div id="selectedMaterialText"><strong>Color:</strong> Silver</div>

<!-- Material Selection -->
<div id="materialColors">
  <div class="color-swatch color-gold" data-material="gold" style="background:#d4af37;"></div>
  <div class="color-swatch color-silver" data-material="silver" style="background:#c0c0c0;"></div>
  <div class="color-swatch color-platinum" data-material="platinum" style="background:#e5e4e2;"></div>
</div>

<!-- Gold Type Selection -->
<div id="goldTypeSection" style="display:none;">
  <p><strong>Select Gold Type:</strong></p>
  <button class="gold-type-btn" data-gold-type="rose">Rose Gold</button>
  <button class="gold-type-btn" data-gold-type="yellow">Yellow Gold</button>
  <button class="gold-type-btn" data-gold-type="white">White Gold</button>
</div>

<!-- Karat Selection -->
<div id="karatSection" class="karat-buttons" style="display:none;">
  <p><strong>Select Karat:</strong></p>
  <button data-karat="10k" class="karat-selected">10K</button>
  <button data-karat="14k">14K</button>
  <button data-karat="18k">18K</button>
</div>

<h3 id="priceDisplay">Loading price...</h3>

<script>
const prices = <?= json_encode($prices) ?>;

let selectedMaterial = "silver";
let selectedGoldType = null;
let selectedKarat = "10k";

const priceDisplay = document.getElementById('priceDisplay');
const karatSection = document.getElementById('karatSection');
const goldTypeSection = document.getElementById('goldTypeSection');
const selectedMaterialText = document.getElementById('selectedMaterialText');

const colorSwatches = document.querySelectorAll('.color-swatch');
const karatButtons = document.querySelectorAll('#karatSection button');
const goldTypeButtons = document.querySelectorAll('.gold-type-btn');

function capitalize(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

function updatePrice() {
  let key = selectedMaterial;
  if (selectedMaterial === 'gold') {
    if (!selectedGoldType || !selectedKarat) {
      priceDisplay.innerText = 'Please select gold type and karat.';
      return;
    }
    key = `${selectedKarat}_${selectedGoldType}_gold`;
  }

  if (prices[key]) {
    priceDisplay.innerText = `Price: ₹${prices[key]}`;
  } else {
    priceDisplay.innerText = 'Price not available';
  }
}

// Material selection
colorSwatches.forEach(swatch => {
  swatch.addEventListener('click', () => {
    selectedMaterial = swatch.dataset.material;
    selectedGoldType = null;
    selectedKarat = null;

    colorSwatches.forEach(s => s.classList.remove('color-selected'));
    swatch.classList.add('color-selected');

    if (selectedMaterial === 'gold') {
      goldTypeSection.style.display = 'block';
      karatSection.style.display = 'none';
      selectedMaterialText.innerHTML = `<strong>Color:</strong> Gold`;
      priceDisplay.innerText = "Please select gold type.";
    } else {
      goldTypeSection.style.display = 'none';
      karatSection.style.display = 'none';
      selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalize(selectedMaterial)}`;
      updatePrice();
    }
  });
});

// Gold type selection
goldTypeButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    selectedGoldType = btn.dataset.goldType;
    goldTypeButtons.forEach(b => b.classList.remove('karat-selected'));
    btn.classList.add('karat-selected');

    karatSection.style.display = 'block';
    selectedKarat = "10k";
    karatButtons.forEach(b => b.classList.remove('karat-selected'));
    karatButtons[0].classList.add('karat-selected');

    selectedMaterialText.innerHTML = `<strong>Color:</strong> ${capitalize(selectedGoldType)} Gold`;
    updatePrice();
  });
});

// Karat selection
karatButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    selectedKarat = btn.dataset.karat;
    karatButtons.forEach(b => b.classList.remove('karat-selected'));
    btn.classList.add('karat-selected');
    updatePrice();
  });
});

window.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.color-silver').classList.add('color-selected');
  updatePrice();
});
</script>
</body>
</html>
