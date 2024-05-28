<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancellation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Cancellation</div>
                    <div class="card-body text-center">
                        <h1>Your payment was not completed.</h1>
                        <p>We noticed you cancelled the payment process.</p>
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
                window.location.href = '/';
            }
        }, 1000);
    </script>
</body>
</html>