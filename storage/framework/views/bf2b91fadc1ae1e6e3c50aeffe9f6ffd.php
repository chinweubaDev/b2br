<?php $__env->startSection('title', 'Transaction History'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .history-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Breadcrumb */
    .breadcrumb-nav {
        margin-bottom: 2rem;
        font-size: 0.9rem;
        color: #718096;
    }

    .breadcrumb-nav a {
        color: #4a5568;
        text-decoration: none;
        transition: color 0.2s;
    }

    .breadcrumb-nav a:hover {
        color: #4facfe;
    }

    .breadcrumb-nav i {
        margin: 0 0.5rem;
        font-size: 0.7rem;
        color: #cbd5e0;
    }

    /* Header */
    .page-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
    }

    .page-header h1 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-header h1::before {
        content: '';
        width: 4px;
        height: 32px;
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    .page-header p {
        color: #718096;
        font-size: 0.95rem;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
        overflow: hidden;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
    }

    thead th {
        padding: 1.25rem 1.5rem;
        text-align: left;
        font-size: 0.8rem;
        font-weight: 700;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s ease;
    }

    tbody tr:hover {
        background: #f7fafc;
    }

    tbody tr:last-child {
        border-bottom: none;
    }

    tbody td {
        padding: 1.25rem 1.5rem;
        color: #4a5568;
        font-size: 0.95rem;
    }

    .service-cell {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .service-type {
        font-weight: 700;
        color: #2d3748;
    }

    .service-name {
        font-size: 0.85rem;
        color: #718096;
    }

    .amount-cell {
        font-weight: 700;
        color: #48bb78;
        font-size: 1.05rem;
    }

    .method-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        background: #f7fafc;
        color: #4a5568;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .status-badge.pending {
        background: rgba(237, 137, 54, 0.1);
        color: #ed8936;
    }

    .status-badge.completed {
        background: rgba(72, 187, 120, 0.1);
        color: #48bb78;
    }

    .status-badge.failed {
        background: rgba(245, 87, 108, 0.1);
        color: #f5576c;
    }

    .view-details-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: var(--primary-gradient);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(79, 172, 254, 0.3);
    }

    .view-details-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 172, 254, 0.4);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: #f7fafc;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .empty-icon i {
        font-size: 2rem;
        color: #cbd5e0;
    }

    .empty-state h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #718096;
    }

    /* Pagination */
    .pagination-wrapper {
        padding: 1.5rem;
        border-top: 1px solid #f0f0f0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .history-wrapper {
            padding: 1rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .page-header h1 {
            font-size: 1.4rem;
        }

        thead th,
        tbody td {
            padding: 1rem;
            font-size: 0.85rem;
        }

        .service-cell {
            min-width: 150px;
        }
    }
</style>

<div class="history-wrapper">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        <i class="fas fa-chevron-right"></i>
        <span style="color: #a0aec0; font-weight: 500;">Transaction History</span>
    </nav>

    <!-- Header -->
    <div class="page-header">
        <h1>Transaction History</h1>
        <p>View all your payment transactions and booking history</p>
    </div>

    <!-- Table -->
    <div class="table-container">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td style="white-space: nowrap;"><?php echo e($payment->created_at->format('d M Y, H:i')); ?></td>
                            <td>
                                <div class="service-cell">
                                    <span class="service-type"><?php echo e(ucfirst($payment->service_type)); ?></span>
                                    <span class="service-name"><?php echo e($payment->service_name); ?></span>
                                </div>
                            </td>
                            <td class="amount-cell"><?php echo e($payment->formatted_amount); ?></td>
                            <td>
                                <span class="method-badge">
                                    <i class="<?php echo e($payment->payment_method_icon); ?>"></i>
                                    <?php echo e($payment->payment_method_display); ?>

                                </span>
                            </td>
                            <td>
                                <span class="status-badge <?php echo e(strtolower($payment->payment_status)); ?>">
                                    <?php echo e(ucfirst($payment->payment_status)); ?>

                                </span>
                            </td>
                            <td style="text-align: right;">
                                <a href="<?php echo e(route('payment.details', $payment)); ?>" class="view-details-btn">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <h3>No Transactions Yet</h3>
                                    <p>Your payment history will appear here once you make your first booking.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($payments->hasPages()): ?>
            <div class="pagination-wrapper">
                <?php echo e($payments->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/payments/history.blade.php ENDPATH**/ ?>