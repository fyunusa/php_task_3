<!DOCTYPE html>

<head>
    <title> Analytic View</title>
</head>

<body>
    <h3>Number of Click Widget: <?= $count; ?></h3>
    <form method="post" action="">
        <input class="analyt_widget" type="button" name="widget" value="Click me">
    </form>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.analyt_widget').click(function() {
            $.ajax({
                type: 'POST',
                url: 'http://localhost:9020/analytic/receive/',
                data: {
                    widget: $(this).val()
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    })
</script>