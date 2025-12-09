<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Royeli Travel Portal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            text-align: center;
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 2rem;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }
        .subtitle {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .nav-link {
            background: #667eea;
            color: white;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .nav-link:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .status {
            margin-top: 2rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            color: #28a745;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌍 Royeli Travel Portal</h1>
        <p class="subtitle">Your gateway to amazing travel experiences</p>
        
        <div class="nav-links">
            <a href="/visas" class="nav-link">🛂 Visa Services</a>
            <a href="/tours" class="nav-link">🗺️ Tours</a>
            <a href="/hotels" class="nav-link">🏨 Hotels</a>
        </div>
        
        <div class="status">
            ✅ Laravel application is running successfully!
        </div>
    </div>
</body>
</html><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/welcome.blade.php ENDPATH**/ ?>