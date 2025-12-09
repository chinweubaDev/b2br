@extends('admin.layouts.app')

@section('title', 'Send Email to All Users - Admin Dashboard')
@section('page-title', 'Send Email to All')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Send Email to All Users</h1>
            <p class="text-gray-400 mt-1">Broadcast a message to all active users</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
        </a>
    </div>
</div>

<!-- Warning Notice -->
<div class="bg-yellow-500/10 border border-yellow-500/30 rounded-lg p-6 mb-6">
    <div class="flex items-start gap-3">
        <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mt-1"></i>
        <div>
            <h4 class="text-yellow-400 font-semibold text-lg mb-2">Important Warning</h4>
            <p class="text-gray-300 mb-2">
                This action will send an email to <strong>ALL ACTIVE USERS</strong> in the system. 
                Please ensure your message is appropriate and necessary before proceeding.
            </p>
            <p class="text-sm text-gray-400">
                Only users with active accounts will receive this email.
            </p>
        </div>
    </div>
</div>

<!-- Email Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.mail.sendAll') }}" class="space-y-6">
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
                rows="12"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none"
                placeholder="Enter your message here..."
                required
            >{{ old('message') }}</textarea>
            @error('message')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-gray-400">
                <i class="fas fa-info-circle mr-1"></i>
                Compose your broadcast message carefully
            </p>
        </div>

        <!-- Quick Templates -->
        <div>
            <p class="text-sm font-medium text-gray-300 mb-3">Quick Templates</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <button 
                    type="button" 
                    onclick="setTemplate('Important System Update', 'Dear Valued Users,\n\nWe have an important system update to share with you.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-bell mr-2 text-blue-400"></i>
                    <strong>System Update</strong>
                    <p class="text-xs text-gray-400 mt-1">Notify about platform updates</p>
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Special Promotion', 'Dear Valued Users,\n\nWe are excited to announce a special promotion just for you!\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-gift mr-2 text-green-400"></i>
                    <strong>Promotion</strong>
                    <p class="text-xs text-gray-400 mt-1">Announce special offers</p>
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Scheduled Maintenance', 'Dear Valued Users,\n\nWe will be performing scheduled maintenance on [DATE]. The platform may be temporarily unavailable.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-tools mr-2 text-yellow-400"></i>
                    <strong>Maintenance Notice</strong>
                    <p class="text-xs text-gray-400 mt-1">Inform about downtime</p>
                </button>
                <button 
                    type="button" 
                    onclick="setTemplate('Newsletter', 'Dear Valued Users,\n\nHere are the latest updates and news from B2BR.\n\nBest regards,\nB2BR Team')"
                    class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition text-left"
                >
                    <i class="fas fa-newspaper mr-2 text-purple-400"></i>
                    <strong>Newsletter</strong>
                    <p class="text-xs text-gray-400 mt-1">Send regular updates</p>
                </button>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="bg-gray-800/30 border border-gray-700 rounded-lg p-4">
            <h4 class="text-sm font-semibold text-gray-300 mb-3 flex items-center">
                <i class="fas fa-eye mr-2"></i>Email Preview
            </h4>
            <div class="bg-white rounded p-4">
                <p class="text-sm text-gray-600 mb-2"><strong>Subject:</strong> <span id="preview-subject" class="text-gray-800">Your subject will appear here</span></p>
                <hr class="my-3">
                <div id="preview-message" class="text-gray-800 whitespace-pre-wrap text-sm">Your message will appear here</div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg hover:shadow-lg transition font-medium"
                onclick="return confirm('⚠️ WARNING: This will send an email to ALL ACTIVE USERS. Are you absolutely sure you want to proceed?')"
            >
                <i class="fas fa-paper-plane mr-2"></i>Send to All Users
            </button>
            <a 
                href="{{ route('admin.dashboard') }}"
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
    updatePreview();
}

// Update preview in real-time
document.getElementById('subject').addEventListener('input', updatePreview);
document.getElementById('message').addEventListener('input', updatePreview);

function updatePreview() {
    const subject = document.getElementById('subject').value || 'Your subject will appear here';
    const message = document.getElementById('message').value || 'Your message will appear here';
    
    document.getElementById('preview-subject').textContent = subject;
    document.getElementById('preview-message').textContent = message;
}
</script>
@endsection
