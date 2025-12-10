<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Register - Royeli Travel Portal</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/user-modern.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            position: relative;
            overflow: hidden;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite;
        }

        .particle:nth-child(1) { left: 15%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 25%; animation-delay: 2s; }
        .particle:nth-child(3) { left: 35%; animation-delay: 4s; }
        .particle:nth-child(4) { left: 45%; animation-delay: 1s; }
        .particle:nth-child(5) { left: 55%; animation-delay: 3s; }
        .particle:nth-child(6) { left: 65%; animation-delay: 5s; }
        .particle:nth-child(7) { left: 75%; animation-delay: 2.5s; }
        .particle:nth-child(8) { left: 85%; animation-delay: 4.5s; }

        .register-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 3rem 2.5rem;
            animation: fadeIn 0.6s ease-out;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-section img {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
            animation: scaleIn 0.5s ease-out;
        }

        .logo-section h1 {
            color: white;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .logo-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            color: white;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        .error-messages {
            background: rgba(245, 87, 108, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 87, 108, 0.4);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .error-messages p {
            margin: 0.25rem 0;
            font-size: 0.9rem;
        }

        .btn-register {
            width: 100%;
            padding: 1rem;
            background: white;
            color: #f5576c;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: white;
            font-size: 0.95rem;
        }

        .login-link a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 2rem 1.5rem;
            }

            .logo-section h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="register-container">
        <div class="register-card">
            <div class="logo-section">
                <img src="https://royelimytravel.com/assets/web/images/logo.png" alt="Royeli Travel Logo">
                <h1>Create Account</h1>
                <p>Join Royeli Travel B2B Portal</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="error-messages">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            value="<?php echo e(old('name')); ?>"
                            required 
                            autofocus
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-input" 
                            placeholder="Enter your email"
                            value="<?php echo e(old('email')); ?>"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-input" 
                            placeholder="Create a password"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="form-input" 
                            placeholder="Confirm your password"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    Create Account
                </button>

                <div class="login-link">
                    Already have an account? <a href="<?php echo e(route('login')); ?>">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/auth/register.blade.php ENDPATH**/ ?>