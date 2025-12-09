<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\VisaService;
use App\Models\TourPackage;
use App\Models\Hotel;
use App\Models\Cruise;
use App\Models\DocumentationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        // Example stats (implement as needed)
        $userCount = \App\Models\User::count();
        $paymentCount = \App\Models\Payment::count();
        $walletTxCount = \App\Models\WalletTransaction::count();
        $serviceCounts = [
            'tours' => \App\Models\TourPackage::count(),
            'visas' => \App\Models\VisaService::count(),
            'hotels' => \App\Models\Hotel::count(),
            'cruises' => \App\Models\Cruise::count(),
            'docs' => \App\Models\DocumentationService::count(),
        ];
        return view('admin.dashboard', compact('userCount', 'paymentCount', 'walletTxCount', 'serviceCounts'));
    }

    /**
     * Display user management page.
     */
    public function users(Request $request)
    {
        $query = User::query();

        // Apply filters
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('company_name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $users = $query->latest()->paginate(15);
        $roles = User::getRoles();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function createUser()
    {
        $roles = User::getRoles();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user.
     */
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,manager,agent,user',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->has('is_active');

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing a user.
     */
    public function editUser(User $user)
    {
        $roles = User::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user.
     */
    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,manager,agent,user',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_active'] = $request->has('is_active');

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user.
     */
    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete your own account!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    /**
     * Toggle user active status.
     */
    public function toggleUserStatus(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot deactivate your own account!');
        }

        $user->update(['is_active' => !$user->is_active]);

        $status = $user->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.users.index')
            ->with('success', "User {$status} successfully!");
    }

    /**
     * Display system settings page.
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * Update system settings.
     */
    public function updateSettings(Request $request)
    {
        // This would typically update configuration values
        // For now, we'll just redirect with a success message
        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully!');
    }

    /**
     * Display system logs.
     */
    public function logs()
    {
        // In a real application, you might want to read from actual log files
        // For now, we'll return a view with placeholder data
        return view('admin.logs');
    }

    /**
     * Display backup management.
     */
    public function backups()
    {
        return view('admin.backups');
    }

    /**
     * Create a new backup.
     */
    public function createBackup()
    {
        // This would typically trigger a backup process
        return redirect()->route('admin.backups')
            ->with('success', 'Backup created successfully!');
    }

    /**
     * Display system health.
     */
    public function health()
    {
        $health = [
            'database' => $this->checkDatabaseHealth(),
            'storage' => $this->checkStorageHealth(),
            'cache' => $this->checkCacheHealth(),
        ];

        return view('admin.health', compact('health'));
    }

    /**
     * Check database health.
     */
    private function checkDatabaseHealth()
    {
        try {
            DB::connection()->getPdo();
            return ['status' => 'healthy', 'message' => 'Database connection successful'];
        } catch (\Exception $e) {
            return ['status' => 'unhealthy', 'message' => 'Database connection failed'];
        }
    }

    /**
     * Check storage health.
     */
    private function checkStorageHealth()
    {
        $storagePath = storage_path();
        $freeSpace = disk_free_space($storagePath);
        $totalSpace = disk_total_space($storagePath);
        $usedSpace = $totalSpace - $freeSpace;
        $usagePercentage = ($usedSpace / $totalSpace) * 100;

        if ($usagePercentage > 90) {
            return ['status' => 'warning', 'message' => 'Storage usage is high: ' . round($usagePercentage, 1) . '%'];
        }

        return ['status' => 'healthy', 'message' => 'Storage usage: ' . round($usagePercentage, 1) . '%'];
    }

    /**
     * Check cache health.
     */
    private function checkCacheHealth()
    {
        try {
            \Cache::put('health_check', 'ok', 1);
            $value = \Cache::get('health_check');
            if ($value === 'ok') {
                return ['status' => 'healthy', 'message' => 'Cache is working properly'];
            }
        } catch (\Exception $e) {
            return ['status' => 'unhealthy', 'message' => 'Cache is not working'];
        }

        return ['status' => 'unhealthy', 'message' => 'Cache check failed'];
    }

    /**
     * All services (tabbed or filterable)
     */
    public function services()
    {
        $tours = \App\Models\TourPackage::all();
        $visas = \App\Models\VisaService::all();
        $hotels = \App\Models\Hotel::all();
        $cruises = \App\Models\Cruise::all();
        $docs = \App\Models\DocumentationService::all();
        return view('admin.services', compact('tours', 'visas', 'hotels', 'cruises', 'docs'));
    }

    /**
     * All payments
     */
    public function payments()
    {
        $payments = \App\Models\Payment::with('user')->latest()->paginate(20);
        return view('admin.payments', compact('payments'));
    }

    /**
     * All wallet transactions
     */
    public function walletTransactions()
    {
        $transactions = \App\Models\WalletTransaction::with('user')->latest()->paginate(20);
        return view('admin.wallet-transactions', compact('transactions'));
    }

    /**
     * Show fund user form
     */
    public function showFundUser(\App\Models\User $user)
    {
        return view('admin.users.fund', compact('user'));
    }

    /**
     * Fund user wallet
     */
    public function fundUser(\Illuminate\Http\Request $request, \App\Models\User $user)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);
        $user->increment('wallet_balance', $request->amount);
        \App\Models\WalletTransaction::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'type' => 'credit',
            'reference' => 'ADMIN-FUND-' . strtoupper(uniqid()),
            'status' => 'completed',
        ]);
        return redirect()->route('admin.users.index')->with('success', 'Wallet funded successfully!');
    }

    /**
     * Show send mail to user form
     */
    public function showMailUser(\App\Models\User $user)
    {
        return view('admin.users.mail', compact('user'));
    }

    /**
     * Send mail to user
     */
    public function mailUser(\Illuminate\Http\Request $request, \App\Models\User $user)
    {
        $request->validate(['subject' => 'required', 'message' => 'required']);
        \Mail::raw($request->message, function($mail) use ($user, $request) {
            $mail->to($user->email)
                ->subject($request->subject);
        });
        return redirect()->route('admin.users.index')->with('success', 'Mail sent to user!');
    }

    /**
     * Show send mail to all users form
     */
    public function showMailAll()
    {
        return view('admin.mail-all');
    }

    /**
     * Send mail to all users
     */
    public function mailAll(\Illuminate\Http\Request $request)
    {
        $request->validate(['subject' => 'required', 'message' => 'required']);
        $users = \App\Models\User::where('is_active', true)->get();
        foreach ($users as $user) {
            \Mail::raw($request->message, function($mail) use ($user, $request) {
                $mail->to($user->email)
                    ->subject($request->subject);
            });
        }
        return redirect()->route('admin.dashboard')->with('success', 'Mail sent to all users!');
    }
}
