<?php
$rawQuantityType = gettype($rawQuantity);
$quantity = (int) $rawQuantity;
$quantityType = gettype($quantity);
$subtotal = $unitPrice * $quantity;
$isMember = ($customerStatus === "MEMBER");
$isValidCustomerStatus =
    ($customerStatus === "MEMBER")
    || ($customerStatus === "GUEST");
$isDiscountEligible =
    $isMember
    && ($subtotal >= MEMBER_MIN);
if ($isDiscountEligible) {
    $discount = $subtotal * MEMBER_DISCOUNT_RATE;
} else {
    $discount = 0;
}
$afterDiscount = $subtotal - $discount;
$packagingFee =
    $quantity * PACKAGING_FEE_PER_ITEM;

$serviceFee =
    $afterDiscount * SERVICE_RATE;

$total = $afterDiscount;
$total += $packagingFee;
$total += $serviceFee;

$hasPositiveQuantity = ($quantity > 0);
$hasQuantityWithinLimit = ($quantity <= MAX_QTY);

$isValidQuantity =
    $hasPositiveQuantity
    && $hasQuantityWithinLimit;

$isProductAvailable = ($productAvailable === true);

$isReady =
    $isValidQuantity
    && $isProductAvailable
    && $isValidCustomerStatus;

$discountLabel = $isDiscountEligible ? "YES" : "NO";

$statusText = $isReady
    ? "READY TO ORDER"
    : "BLOCKED";

$statusClass = $isReady
    ? "ready"
    : "blocked";

$quantityStatusLabel = $isValidQuantity
    ? "PASS"
    : "FAIL";

$productStatusLabel = $isProductAvailable
    ? "AVAILABLE"
    : "UNAVAILABLE";

$customerStatusLabel = $isValidCustomerStatus
    ? "VALID"
    : "INVALID";

$orderNoteLabel = ($orderNote === null)
    ? "No special request"
    : $orderNote;

// EXPLAIN WHY CHECKOUT IS BLOCKED.
if (!$hasPositiveQuantity) {
    $blockReason = "Quantity must be greater than zero.";
} elseif (!$hasQuantityWithinLimit) {
    $blockReason = "Quantity exceeds the maximum of "
        . MAX_QTY
        . " items.";
} elseif (!$isProductAvailable) {
    $blockReason = "The product is currently unavailable.";
} elseif (!$isValidCustomerStatus) {
    $blockReason = "Customer status is invalid.";
} else {
    $blockReason = "None. All checkout conditions passed.";
}
