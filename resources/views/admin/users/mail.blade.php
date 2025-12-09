@extends('admin.layouts.app')

@section('title', 'Send Email to User - Admin Dashboard')
@section('page-title', 'Send Email')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Send Email to User</h1>
            <p class="text-gray-400 mt-1">Send a direct email to {{ $user->name }}</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Users
        </a>
    </div>
</div>

<!-- User Info Card -->
<div class="glass-card p-6 mb-6">
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white font-bold text-2xl">
            {{ substr($user->name, 0, 1) }}
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-200">{{ $user->name }}</h2>
            <p class="text-gray-400">
                <i class="fas fa-envelope mr-2"></i>{{ $user->email }}
            </p>
        </div>
    </div>
</div>

<!-- Email Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.users.mail', $user) }}" class="space-y-6">
        @csrf

        <!-- Subject -->
        <div>
            <label for="subject" class="block text-sm font-medium text-gray-300 mb-2">
                Subject <span class="text-red-400">*</span>
            </label>
            <input 
                type="text" 
                name="subject" 
                id="subject" 
                value="{{ old('subject') }}"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                placeholder="Enter email subject"
                required
                autofocus
            >
            @error('subject')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Message -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-300 mb-2">
                Message <span class="text-red-400">*</span>
            </label>
            <textarea 
                name="message" 
                id="message" 
                rows="10"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none"
                placeholder="Enter your message here..."
                required
            >{{ old('message') }}</textarea>
            @error('message')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-gray-400">
                <i class="fas fa-info-circle mr-1"></i>
                Compose your message to be sent to the user
            </p>
        </div>

        <!-- Quick Templates -->
        <div>
            <p class="text-sm font-medium text-gray-300 mb-3">Quick Templates</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <button 
                    type="button" 
                    onclick="setTemplate('Welcome to B2BR', 'Dear {{ $user->name }},\n\nWelcome to B2BR! We are excited to have you on board.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-hand-wave mr-2"></i>Welcome Message
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Account Update', 'Dear {{ $user->name }},\n\nYour account has been updated.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-bell mr-2"></i>Account Update
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Payment Confirmation', 'Dear {{ $user->name }},\n\nYour payment has been received and confirmed.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-check-circle mr-2"></i>Payment Confirmation
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Important Notice', 'Dear {{ $user->name }},\n\nWe have an important update regarding your account.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-exclamation-circle mr-2"></i>Important Notice
                </button>
            </div>
        </div>

        <!-- Info Notice -->
        <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <i class="fas fa-info-circle text-blue-400 mt-1"></i>
                <div>
                    <h4 class="text-blue-400 font-semibold mb-1">Email Information</h4>
                    <p class="text-sm text-gray-300">
                        This email will be sent directly to <strong>{{ $user->email }}</strong>. 
                        Make sure to review your message before sending.
                    </p>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
                onclick="return confirm('Are you sure you want to send this email to {{ $user->name }}?')"
            >
                <i class="fas fa-paper-plane mr-2"></i>Send Email
            </button>
            <a 
                href="{{ route('admin.users.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function setTemplate(subject, message) {
    document.getElementById('subject').value = subject;
    document.getElementById('message').value = message;
}
</script>
@endsection
