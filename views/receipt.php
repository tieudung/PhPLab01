
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SmartCafe | Billing Receipt</title>

    <style>
        body {
            margin: 0;
            padding: 36px 16px;
            background: #f3f1ec;
            color: #302d29;
            font-family: Arial, sans-serif;
        }

        .receipt {
            max-width: 540px;
            margin: 0 auto;
            padding: 28px;
            background: #ffffff;
            border: 1px dashed #918779;
            border-radius: 10px;
        }

        .brand {
            margin: 0;
            text-align: center;
            letter-spacing: 3px;
        }

        .subtitle {
            margin: 8px 0 24px;
            color: #82796d;
            text-align: center;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .section-title {
            margin-top: 24px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e8e2d9;
            font-size: 14px;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px 4px;
            border-bottom: 1px solid #eeeae4;
            font-size: 14px;
        }

        th {
            width: 48%;
            color: #776e63;
            text-align: left;
            font-weight: normal;
        }

        td {
            text-align: right;
            overflow-wrap: anywhere;
        }

        .total-row th,
        .total-row td {
            padding-top: 16px;
            border-top: 2px solid #918779;
            border-bottom: none;
            color: #29251f;
            font-weight: bold;
            font-size: 18px;
        }

        .ready {
            color: #187344;
            font-weight: bold;
        }

        .blocked {
            color: #b42323;
            font-weight: bold;
        }

        .status-panel {
            margin-top: 22px;
            padding: 16px;
            background: #f8f6f2;
            border-radius: 6px;
            font-size: 13px;
            line-height: 1.6;
        }

        .status-panel p {
            margin: 6px 0;
            overflow-wrap: anywhere;
        }

        .footer {
            margin: 26px 0 0;
            text-align: center;
            color: #82796d;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <main class="receipt">
        <h1 class="brand">SMARTCAFE</h1>
        <p class="subtitle">ORDER BILLING RECEIPT</p>

        <h2 class="section-title">ORDER INFORMATION</h2>

        <table>
            <tr>
                <th>Product</th>
                <td><?= $productName ?></td>
            </tr>

            <tr>
                <th>Unit Price</th>
                <td><?= $unitPrice ?> <?= CURRENCY ?></td>
            </tr>

            <tr>
                <th>Customer Status</th>
                <td><?= $customerStatus ?></td>
            </tr>

            <tr>
                <th>Raw Quantity</th>
                <td><?= $rawQuantity ?></td>
            </tr>

            <tr>
                <th>Raw Quantity Type</th>
                <td><?= $rawQuantityType ?></td>
            </tr>

            <tr>
                <th>Quantity After Casting</th>
                <td><?= $quantity ?></td>
            </tr>

            <tr>
                <th>Normalized Quantity Type</th>
                <td><?= $quantityType ?></td>
            </tr>
        </table>

        <h2 class="section-title">BILL DETAILS</h2>

        <table>
            <tr>
                <th>Subtotal</th>
                <td><?= $subtotal ?> <?= CURRENCY ?></td>
            </tr>

            <tr>
                <th>Discount Eligible</th>
                <td><?= $discountLabel ?></td>
            </tr>

            <tr>
                <th>Member Discount</th>
                <td>-<?= $discount ?> <?= CURRENCY ?></td>
            </tr>

            <tr>
                <th>Amount After Discount</th>
                <td><?= $afterDiscount ?> <?= CURRENCY ?></td>
            </tr>

            <tr>
                <th>Packaging Fee</th>
                <td>+<?= $packagingFee ?> <?= CURRENCY ?></td>
            </tr>

            <tr>
                <th>Service Fee</th>
                <td>+<?= $serviceFee ?> <?= CURRENCY ?></td>
            </tr>

            <tr class="total-row">
                <th>Total</th>
                <td><?= $total ?> <?= CURRENCY ?></td>
            </tr>
        </table>

        <section class="status-panel">
            <h2>CHECKOUT STATUS</h2>

            <p>
                <strong>Status:</strong>
                <span class="<?= $statusClass ?>">
                    <?= $statusText ?>
                </span>
            </p>

            <p>
                <strong>Quantity Check:</strong>
                <?= $quantityStatusLabel ?>
            </p>

            <p>
                <strong>Product Availability:</strong>
                <?= $productStatusLabel ?>
            </p>

            <p>
                <strong>Customer Status:</strong>
                <?= $customerStatusLabel ?>
            </p>

            <p>
                <strong>Reason:</strong>
                <?= $blockReason ?>
            </p>

            <p>
                <strong>Order Note:</strong>
                <?= $orderNoteLabel ?>
            </p>
        </section>

        <p class="footer">
            Thank you for choosing SmartCafe!
        </p>
    </main>
</body>
</html>
