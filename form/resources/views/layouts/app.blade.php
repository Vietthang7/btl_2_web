<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Thông tin cá nhân')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .content-container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            transform: scale(1.05);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        /* Custom toast notification styles */
        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 15px 25px;
            min-width: 300px;
            transform: translateX(400px);
            transition: all 0.5s ease-in-out;
            opacity: 0;
        }
        
        .notification-toast.show {
            transform: translateX(0);
            opacity: 1;
        }
        
        .notification-toast.success {
            border-left: 5px solid #2ecc71;
        }
        
        .notification-toast.error {
            border-left: 5px solid #e74c3c;
        }
        
        .notification-toast .toast-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .notification-toast .toast-icon {
            margin-right: 12px;
            font-size: 20px;
        }
        
        .notification-toast .success-icon {
            color: #2ecc71;
        }
        
        .notification-toast .error-icon {
            color: #e74c3c;
        }
        
        .notification-toast .toast-title {
            font-weight: 600;
            font-size: 16px;
            color: #333;
        }
        
        .notification-toast .toast-message {
            font-size: 14px;
            color: #666;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container content-container">
        @yield('content')
    </div>

    <!-- Toast Notification Template -->
    <div class="notification-toast" id="notificationToast">
        <div class="toast-header">
            <div class="d-flex align-items-center">
                <div class="toast-icon success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="toast-title">Thành công</div>
            </div>
            <button type="button" class="btn-close" onclick="hideToast()"></button>
        </div>
        <div class="toast-message" id="toastMessage"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Function to show toast
        function showToast(message, type = 'success') {
            const toast = document.getElementById('notificationToast');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = document.querySelector('.toast-icon');
            
            // Set message
            toastMessage.textContent = message;
            
            // Set type
            toast.className = 'notification-toast';
            if (type === 'success') {
                toast.classList.add('success');
                toastIcon.className = 'toast-icon success-icon';
                toastIcon.innerHTML = '<i class="fas fa-check-circle"></i>';
                document.querySelector('.toast-title').textContent = 'Thành công';
            } else if (type === 'error') {
                toast.classList.add('error');
                toastIcon.className = 'toast-icon error-icon';
                toastIcon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
                document.querySelector('.toast-title').textContent = 'Lỗi';
            }
            
            // Show toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 10);
            
            // Hide after 1 second
            setTimeout(hideToast, 2000);
        }
        
        // Function to hide toast
        function hideToast() {
            const toast = document.getElementById('notificationToast');
            toast.classList.remove('show');
        }
        
        // Check for flash message and display toast if exists
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                showToast("{{ session('success') }}", 'success');
            @endif
            
            @if(session('error'))
                showToast("{{ session('error') }}", 'error');
            @endif
        });
    </script>
    @yield('scripts')
</body>
</html>