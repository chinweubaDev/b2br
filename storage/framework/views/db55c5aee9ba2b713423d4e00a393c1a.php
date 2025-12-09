<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Royeli Tours & Travel</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin.css')); ?>">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            padding: 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #8B5CF6 0%, #3B82F6 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
        }

        .login-logo i {
            font-size: 2rem;
            color: white;
        }

        .login-title {
            font-size: 1.875rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FFFFFF 0%, #E0E7FF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: #94A3B8;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #CBD5E1;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            color: #F1F5F9;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #8B5CF6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            background: rgba(15, 23, 42, 0.7);
        }

        .form-input::placeholder {
            color: #64748B;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .form-checkbox label {
            color: #CBD5E1;
            font-size: 0.875rem;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #8B5CF6 0%, #3B82F6 100%);
            color: white;
            font-weight: 600;
            font-size: 0.9375rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(139, 92, 246, 0.5);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            padding: 0.875rem 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #FCA5A5;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6EE7B7;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: rgba(148, 163, 184, 0.2);
        }

        .divider-text {
            color: #64748B;
            font-size: 0.875rem;
        }

        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(148, 163, 184, 0.1);
        }

        .login-footer a {
            color: #8B5CF6;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #A78BFA;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #CBD5E1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <a href="<?php echo e(route('login')); ?>" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Back to User Login
        </a>

        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h1 class="login-title">Admin Portal</h1>
                <p class="login-subtitle">Sign in to access the admin dashboard</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="admin@royelitravel.com"
                        value="<?php echo e(old('email')); ?>"
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In to Admin Portal
                </button>
            </form>

            <div class="login-footer">
                <p style="color: #64748B; font-size: 0.75rem; margin-top: 1rem;">
                    <i class="fas fa-lock"></i>
                    Secure admin access only
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <p style="color: #64748B; font-size: 0.875rem;">
                © <?php echo e(date('Y')); ?> Royeli Tours & Travel. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>