<?php
// PHPLab01 - SmartCafe Billing
// Basic version: inspect types, calculate the bill, and print a receipt.

// 1. Business configuration
const CURRENCY = "VND";
const MEMBER_DISCOUNT_RATE = 0.10; // 10%
const MEMBER_MIN = 100000;
const PACKAGING_FEE_PER_ITEM = 5000;
const SERVICE_RATE = 0.05; // 5%
const MAX_QTY = 50;

// 2. Sample order data
$productName = "Salt Coffee";
$unitPrice = 45000;
$rawQuantity = "3";
$customerStatus = "MEMBER";
$productAvailable = true;
$orderNote = null;

// 3. Inspect raw data types BEFORE casting
echo "=== TYPE BOUNDARY: BEFORE CASTING ===" . PHP_EOL;

var_dump($productName);
var_dump($unitPrice);
var_dump($rawQuantity);
var_dump($customerStatus);
var_dump($productAvailable);
var_dump($orderNote);

$rawQuantityType = gettype($rawQuantity);

echo "Raw quantity type: "
    . $rawQuantityType
    . PHP_EOL;

// 4. Explicit casting: string -> integer
$quantity = (int) $rawQuantity;

// 5. Inspect data types AFTER casting
echo PHP_EOL;
echo "=== TYPE BOUNDARY: AFTER CASTING ===" . PHP_EOL;

var_dump($quantity);

$quantityType = gettype($quantity);

echo "Normalized quantity type: "
    . $quantityType
    . PHP_EOL;

// 6. Calculate subtotal
$subtotal = $unitPrice * $quantity;

// 7. Check customer status
// Strict equality checks both value and data type.
$isMember = ($customerStatus === "MEMBER");

$isValidCustomerStatus =
    ($customerStatus === "MEMBER")
    || ($customerStatus === "GUEST");

// 8. Determine discount eligibility
$isDiscountEligible =
    $isMember
    && ($subtotal >= MEMBER_MIN);

if ($isDiscountEligible) {
    $discount = $subtotal * MEMBER_DISCOUNT_RATE;
} else {
    $discount = 0;
}

// 9. Calculate intermediate values
$afterDiscount = $subtotal - $discount;

$packagingFee =
    $quantity * PACKAGING_FEE_PER_ITEM;

$serviceFee =
    $afterDiscount * SERVICE_RATE;

// 10. Calculate total using assignment operators
$total = $afterDiscount;
$total += $packagingFee;
$total += $serviceFee;

// 11. Checkout gate
$hasPositiveQuantity = ($quantity > 0);

$hasQuantityWithinLimit =
    ($quantity <= MAX_QTY);

$isValidQuantity =
    $hasPositiveQuantity
    && $hasQuantityWithinLimit;

$isProductAvailable =
    ($productAvailable === true);

$isReady =
    $isValidQuantity
    && $isProductAvailable
    && $isValidCustomerStatus;

// 12. Prepare output labels
$discountLabel = $isDiscountEligible ? "YES" : "NO";

$statusText = $isReady
    ? "READY TO ORDER"
    : "BLOCKED";

$orderNoteLabel = ($orderNote === null)
    ? "No special request"
    : $orderNote;

// 13. Build the text receipt using concatenation
$receipt = "=== SMARTCAFE BILLING ===" . PHP_EOL;

$receipt .= "Product: " . $productName . PHP_EOL;
$receipt .= "Customer: " . $customerStatus . PHP_EOL;
$receipt .= "Unit price: " . $unitPrice . " " . CURRENCY . PHP_EOL;
$receipt .= "Raw quantity: " . $rawQuantity . PHP_EOL;
$receipt .= "Quantity: " . $quantity . PHP_EOL;
$receipt .= "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;
$receipt .= "Discount eligible: " . $discountLabel . PHP_EOL;
$receipt .= "Discount: " . $discount . " " . CURRENCY . PHP_EOL;
$receipt .= "After discount: " . $afterDiscount . " " . CURRENCY . PHP_EOL;
$receipt .= "Packaging fee: " . $packagingFee . " " . CURRENCY . PHP_EOL;
$receipt .= "Service fee: " . $serviceFee . " " . CURRENCY . PHP_EOL;
$receipt .= "Order note: " . $orderNoteLabel . PHP_EOL;
$receipt .= "TOTAL: " . $total . " " . CURRENCY . PHP_EOL;
$receipt .= "Status: " . $statusText . PHP_EOL;

echo PHP_EOL . $receipt;