@extends('partners.layout')

@section('title', 'Partner Dashboard - Royeli Travel')

@section('content')
<style>
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--gradient);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .stat-card.gradient-card {
        background: var(--gradient);
        color: white;
    }

    .stat-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        margin-right: 1rem;
    }

    .stat-info h3 {
        font-size: 0.9rem;
        font-weight: 600;
        opacity: 0.8;
        margin-bottom: 0.25rem;
    }

    .stat-info p {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }

    /* Monthly Stats */
    .monthly-stats {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .monthly-stats h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .monthly-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .monthly-item {
        padding: 1.5rem;
        background: linear-gradient(135deg, #f5f7fa 0%, #fce4ec 100%);
        border-radius: 16px;
        border-left: 4px solid var(--color);
    }

    .monthly-item h4 {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .monthly-item p {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
    }

    .monthly-item small {
        font-size: 0.8rem;
        color: #999;
    }

    /* Tables */
    .data-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .data-section h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .view-all-link {
        font-size: 0.9rem;
        color: #f5576c;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .view-all-link:hover {
        transform: translateX(5px);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background: #f8f9fa;
    }

    .data-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #666;
        font-size: 0.9rem;
        border-bottom: 2px solid #e9ecef;
    }

    .data-table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        color: #333;
    }

    .data-table tr:hover {
        background: #f8f9fa;
    }

    .badge {
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-success {
        background: #d4edda;
        color: #155724;
    }

    .badge-warning {
        background: #fff3cd;
        color: #856404;
    }

    .badge-danger {
        background: #f8d7da;
        color: #721c24;
    }

    .badge-info {
        background: #d1ecf1;
        color: #0c5460;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #999;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .monthly-grid {
            grid-template-columns: 1fr;
        }

        .data-table {
            font-size: 0.85rem;
        }

        .data-table th,
        .data-table td {
            padding: 0.75rem 0.5rem;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Total Bookings -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <h3>Total Bookings</h3>
                    <p>{{ $stats['total_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3>Total Revenue</h3>
                    <p>₦{{ number_format($stats['total_revenue'], 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Commission -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="stat-info">
                    <h3>Total Commission</h3>
                    <p>₦{{ number_format($stats['total_commission'], 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Balance -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-info">
                    <h3>Pending Balance</h3>
                    <p>₦{{ number_format($stats['pending_balance'], 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Stats -->
    <div class="monthly-stats">
        <h2><i class="fas fa-chart-bar"></i> Monthly Performance</h2>
        <div class="monthly-grid">
            <div class="monthly-item" style="--color: #667eea;">
                <h4>This Month - Bookings</h4>
                <p>{{ $monthlyStats['current_month']['bookings'] }}</p>
                <small>Last month: {{ $monthlyStats['last_month']['bookings'] }}</small>
            </div>
            <div class="monthly-item" style="--color: #4facfe;">
                <h4>This Month - Revenue</h4>
                <p>₦{{ number_format($monthlyStats['current_month']['revenue'], 2) }}</p>
                <small>Last month: ₦{{ number_format($monthlyStats['last_month']['revenue'], 2) }}</small>
            </div>
            <div class="monthly-item" style="--color: #f5576c;">
                <h4>This Month - Commission</h4>
                <p>₦{{ number_format($monthlyStats['current_month']['commission'], 2) }}</p>
                <small>Last month: ₦{{ number_format($monthlyStats['last_month']['commission'], 2) }}</small>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="data-section">
        <h2>
            <span><i class="fas fa-calendar-check"></i> Recent Bookings</span>
            <a href="{{ route('partner.bookings') }}" class="view-all-link">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </h2>

        @if($recentBookings->count() > 0)
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentBookings as $booking)
                        <tr>
                            <td><strong>#{{ $booking->id }}</strong></td>
                            <td>{{ $booking->service_type ?? 'N/A' }}</td>
                            <td>₦{{ number_format($booking->amount ?? 0, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : 'info') }}">
                                    {{ ucfirst($booking->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <p>No bookings yet</p>
            </div>
        @endif
    </div>

    <!-- Recent Transactions -->
    <div class="data-section">
        <h2>
            <span><i class="fas fa-receipt"></i> Recent Transactions</span>
            <a href="{{ route('partner.transactions') }}" class="view-all-link">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </h2>

        @if($recentTransactions->count() > 0)
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentTransactions as $transaction)
                        <tr>
                            <td><strong>{{ $transaction->reference_number }}</strong></td>
                            <td>{{ ucfirst($transaction->transaction_type) }}</td>
                            <td>₦{{ number_format($transaction->amount, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ $transaction->status == 'completed' ? 'success' : ($transaction->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                            <td>{{ $transaction->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-receipt"></i>
                <p>No transactions yet</p>
            </div>
        @endif
    </div>
</div>
@endsection
