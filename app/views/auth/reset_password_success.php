<?php
include __DIR__ . '/../header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="formContainers">
            <div style="text-align: center">
                <h2 class="text-center">Password successfully reset! </h2>
                <h2 class="text-center">Redirecting to login in 5 seconds...</h2>
                <script type="text/javascript">
                    // Redirect to another page after 5 seconds
                    setTimeout(function(){
                        window.location.href = '/auth';
                    }, 5000); // 5000 milliseconds = 5 seconds
                </script>
                <p>Not automatically moved? <a href="/auth">Login</a>...</p>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>