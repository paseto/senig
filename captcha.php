<html>
<head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</head>
<body>
<?php
print_r($_POST);
?>
<form id='demo-form' action="?" method="POST">
    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

    <input type="text" name="bu"/>
    <input type="submit"/>

    <br/>
</form>
</body>
</html>