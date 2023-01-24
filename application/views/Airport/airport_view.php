<!DOCTYPE html>
<html>

<head>
    <title>Airports</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <form>
        <label for="airport_search">Search for Airport:</label>
        <!-- <input type="text" id="airport_search" name="airport_search"> -->
        <input type="text" id="airport-search" placeholder="Search for an airport">
    </form>

    <script>
        $("#airport-search").autocomplete({
            minLength: 3,
            source: function(request, response) {
                $.ajax({
                    url: "airports?search=" + request.term,
                    success: function(data) {
                        response(data);
                    }
                });
            }
        });
        // $(document).ready(function() {
        //     $("#airport_search").autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        // url: "<?php #echo base_url() 
                    ?>airports/search",
        //                 dataType: "json",
        //                 data: {
        //                     term: request.term,
        //                 },
        //                 success: function(data) {
        //                     response(data);
        //                 }
        //             });
        //         },
        //         minLength: 3,
        //     });
        // });
    </script>
</body>

</html>