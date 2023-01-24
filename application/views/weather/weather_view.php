<!DOCTYPE html>
<html>

<head>
    <title>Weather</title>
</head>

<body>
    <div>
        <h3>Temperature</h3>
        <p><?php echo $temperature; ?> Celsius</p>
    </div>
    <div>
        <h3>Weather condition</h3>
        <p>
            <?php
            if ($condition === 'Sunny') {
                echo '<img src="https://www.example.com/sunny.png">';
            } else if ($condition === 'Raining') {
                echo '<img src="https://www.example.com/clouds.png">';
            } else if ($condition === 'Snowing') {
                echo '<img src="https://www.example.com/snowflake.png">';
            }
            ?>
        </p>
    </div>
</body>
<script>
    setInterval(() => {
        location.reload();
    }, 300000); // 5 minutes in milliseconds
</script>

</html>