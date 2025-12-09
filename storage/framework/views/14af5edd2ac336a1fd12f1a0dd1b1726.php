<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Royeli Travel Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
        <div class="flex items-center justify-center mb-6">
            <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-10 mr-2">
            <span class="text-2xl font-bold text-blue-700">Admin Login</span>
        </div>
        <?php if(session('error')): ?>
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i> <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('admin.login')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required autofocus>
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 font-semibold">Sign In</button>
        </form>
    </div>
</body>
</html> <?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/login.blade.php ENDPATH**/ ?>