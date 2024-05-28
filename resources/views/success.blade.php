<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Success</div>
                    <div class="card-body text-center">
                        <h1>Thank you for your order!</h1>
                        <p>You have just completed your payment.</p>
                        <p id="countdown">You will be redirected to the home page in 10 seconds.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let seconds = 10;
        const countdownElement = document.getElementById('countdown');
        
        const interval = setInterval(function() {
            seconds--;
            countdownElement.textContent = 'You will be redirected to the home page in ' + seconds + ' seconds.';
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = '/home';
            }
        }, 1000);
    </script>
</body>
</html>