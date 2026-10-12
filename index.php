<?php
// 1. Load business configuration
require_once __DIR__ . '/config/constants.php';
// 2. Load sample order data
require_once __DIR__ . '/data/smartcafe-data.php';
// 3. Execute business calculations
require_once __DIR__ . '/src/smartcafe.php';
// 4. Render the receipt
require_once __DIR__ . '/views/receipt.php';