<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?php echo e($booking->reference_number); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .company-info {
            color: #6c757d;
            font-size: 14px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-info, .customer-info {
            flex: 1;
        }
        .invoice-title {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .info-row {
            margin-bottom: 5px;
            font-size: 14px;
        }
        .label {
            font-weight: bold;
            color: #495057;
        }
        .value {
            color: #6c757d;
        }
        .service-details {
            margin-bottom: 30px;
        }
        .service-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .service-table th, .service-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        .service-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }
        .amount-section {
            text-align: right;
            margin-top: 20px;
        }
        .total-amount {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            color: #6c757d;
            font-size: 12px;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-confirmed { background-color: #d1ecf1; color: #0c5460; }
        .status-completed { background-color: #d4edda; color: #155724; }
        .status-cancelled { background-color: #f8d7da; color: #721c24; }
        @media print {
            body { background-color: white; }
            .invoice-container { box-shadow: none; }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <div class="company-name">Royeli Tours & Travel</div>
            <div class="company-info">
                B2B Travel Portal<br>
                Email: info@royelitours.com<br>
                Phone: +234 123 456 7890
            </div>
        </div>

        <!-- Invoice Details -->
        <div class="invoice-details">
            <div class="invoice-info">
                <div class="invoice-title">INVOICE</div>
                <div class="info-row">
                    <span class="label">Invoice #:</span>
                    <span class="value"><?php echo e($booking->reference_number); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Date:</span>
                    <span class="value"><?php echo e($booking->created_at->format('F d, Y')); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Status:</span>
                    <span class="value">
                        <span class="status-badge status-<?php echo e($booking->status); ?>">
                            <?php echo e(ucfirst($booking->status)); ?>

                        </span>
                    </span>
                </div>
            </div>
            <div class="customer-info">
                <div class="invoice-title">CUSTOMER</div>
                <div class="info-row">
                    <span class="label">Name:</span>
                    <span class="value"><?php echo e($booking->user->name); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Email:</span>
                    <span class="value"><?php echo e($booking->user->email); ?></span>
                </div>
                <?php if($booking->user->phone): ?>
                <div class="info-row">
                    <span class="label">Phone:</span>
                    <span class="value"><?php echo e($booking->user->phone); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Service Details -->
        <div class="service-details">
            <div class="invoice-title">SERVICE DETAILS</div>
            <table class="service-table">
                <thead>
                    <tr>
                        <th>Service Type</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo e(ucfirst($booking->booking_type)); ?></td>
                        <td><?php echo e($booking->service_name); ?></td>
                        <td><?php echo e(Str::limit($booking->description, 100)); ?></td>
                        <td><?php echo e($booking->currency); ?> <?php echo e(number_format($booking->amount, 2)); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Travel Information -->
        <?php if($booking->travel_date || $booking->return_date || $booking->passengers): ?>
        <div class="service-details">
            <div class="invoice-title">TRAVEL INFORMATION</div>
            <table class="service-table">
                <tbody>
                    <?php if($booking->travel_date): ?>
                    <tr>
                        <td><strong>Travel Date:</strong></td>
                        <td><?php echo e($booking->travel_date->format('F d, Y')); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if($booking->return_date): ?>
                    <tr>
                        <td><strong>Return Date:</strong></td>
                        <td><?php echo e($booking->return_date->format('F d, Y')); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if($booking->passengers): ?>
                    <tr>
                        <td><strong>Number of Passengers:</strong></td>
                        <td><?php echo e($booking->passengers); ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <!-- Special Requirements -->
        <?php if($booking->special_requirements): ?>
        <div class="service-details">
            <div class="invoice-title">SPECIAL REQUIREMENTS</div>
            <p style="color: #6c757d; margin: 10px 0;"><?php echo e($booking->special_requirements); ?></p>
        </div>
        <?php endif; ?>

        <!-- Amount Section -->
        <div class="amount-section">
            <div class="total-amount">
                Total Amount: <?php echo e($booking->currency); ?> <?php echo e(number_format($booking->amount, 2)); ?>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for choosing Royeli Tours & Travel!</p>
            <p>This is a computer-generated invoice. No signature required.</p>
            <p>Generated on <?php echo e(now()->format('F d, Y \a\t g:i A')); ?></p>
        </div>
    </div>

    <script>
        // Auto-print when page loads (optional)
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html> <?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/bookings/invoice.blade.php ENDPATH**/ ?>