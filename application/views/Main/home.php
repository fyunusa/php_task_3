<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </script>
    <style>
        .box {
            background-color: #f5f5f5;
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
        }

        .cont-1,
        .cont-2,
        .cont-3,
        .cont-4 {
            padding: 5px;
        }

        #results,
        #coin-result {
            max-height: 200px;
            overflow-y: scroll;
        }
    </style>

</head>


<div class="container overflow-hidden">
    <div class="row">

        <!-- #--------------------------------------- -->

        <div class="col-md-3 cont-1">
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Temperature
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="../application/assets/img/<?= $img ?>" alt="<?= $img ?>">

                        <h3 class="card-text"><?= $weather_temperature ?>&#8451;</h3>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        No. of Clicks
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $clicks ?></h5>
                        <p class="card-text">Number of Clicks</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Export Xml
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary"><a href="http://localhost:9020/analytic/export_xml/" class="text-light">Export as XML</a></button>
                        <p class="card-text"></p>

                    </div>
                </div>
            </div>

        </div>
        <!-- #--------------------------------------- -->

        <!-- #--------------------------------------- -->
        <div class="col-md-3 cont-2">
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Airport Search
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="search" placeholder="Search for airports">
                                <div>
                                    <ul class="list-group" id="results"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Map
                    </div>
                    <div class="card-body" id="show">
                        <a class="skiplink" href="#map">Go to map</a>
                        <div id="map" class="map" tabindex="0"></div>
                        <button id="zoom-out">Zoom out</button>
                        <button id="zoom-in">Zoom in</button>
                    </div>

                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Arctic Distance
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- #--------------------------------------- -->
        <!-- #--------------------------------------- -->

        <div class="col-md-3 cont-3">
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Nigeria Time
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $time['nigeria_time'] ?></h3>
                        <p class="card-text">Local Time</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Pakistan Time
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $time['pakistan_time'] ?></h3>
                        <p class="card-text">Local Time</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        Reddit
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($reddit_post as $post) { ?>
                            <h6>Posted By: <?= $post['data']['author_fullname'] ?></h6>
                            <h5><?= $post['data']['title'] ?></h5>
                            <h6><?= $post['data']['permalink'] ?></h6>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- #--------------------------------------- -->
    <!-- #--------------------------------------- -->

    <div class="col-md-3 cont-4">
        <div class="box">
            <div class="card">
                <div class="card-header">
                    London Time
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= $time['london_time'] ?></h3>
                    <p class="card-text">Local Time</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="card">
                <div class="card-header">
                    EST Time
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= $time['est_time'] ?></h3>
                    <p class="card-text">Local Time</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="card">
                <div class="card-header">
                    Coin Calculator
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="coin-inp" placeholder="Input a Value">
                            <div>
                                <ul class="list-group" id="coin-result"></ul>
                            </div>
                            <button type="button" class="btn btn-primary" id="coin-calc">Calculate Coin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="card">
                <div class="card-header">
                    Image Upload
                </div>
                <div class="card-body">
                    <h6>Recent Img:<?= ((array)$last_image['last_image'])['img_name'] ?></h6>
                    <b><?php if (isset($img_upload_status)) echo $img_upload_status; ?></b>
                    <form method='post' action='<?php echo 'http://localhost:9020/'; ?>' enctype='multipart/form-data'>
                        <input type='file' class="form-control-file" name='file'> <br /><br />
                        <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #--------------------------------------- -->
    <!-- #----------------Modal----------------------- -->

    <div class="modal" data-backdrop="static" id="2faModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">2FA Verification</h5>
                    <button type="button" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="2faForm">
                        <div class="form-group">
                            <label for="2faCode">2FA Code:</label>
                            <input type="text" class="form-control" id="2faCode" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="verify2faBtn">Verify</button>
                </div>
            </div>
        </div>
    </div>
    <!-- #------------------Modal--------------------- -->
</div>
</div>

<script>
    $("#search").keyup(function() {
        let searchValue = $("#search").val();
        if (searchValue.length >= 3) {
            $.ajax({
                url: `http://localhost:9020/airports/search?search`,
                type: 'GET',
                data: {
                    search: searchValue
                },
                success: function(data) {
                    $("#results").empty();
                    for (let i = 0; i < data.length; i++) {
                        $("#results").append('<li class="list-group-item">' + data[i] + "</li>");
                    }
                }
            });
        }
    });

    $(document).ready(function() {
        $('#2faModal').modal();
    })
    // calculate coins
    // $("#coin-calc").click(function() {
    //     let searchValue = $("#coin-inp").val();
    //     // console.log(searchValue)
    //     if (searchValue.length > 0) {
    //         $.ajax({
    //             url: `http://localhost:9020/coin/?amount`,
    //             type: 'GET',
    //             data: {
    //                 amount: searchValue
    //             },
    //             success: function(data) {
    //                 // console.log(data)
    //                 $("#coin-result").empty();
    //                 $("#coin-result").append('<li class="list-group-item">' + '1 Bill:' + data[1] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '5 Bill:' + data[5] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '10 Bill:' + data[10] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '20 Bill:' + data[20] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '0.25 Cent:' + data[0.25] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '0.1 Cent:' + data[0.1] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '0.05 Cent:' + data[0.05] + "</li>");
    //                 $("#coin-result").append('<li class="list-group-item">' + '0.01 Cent:' + data[0.01] + "</li>");

    //             }
    //         });
    //     }
    // });

    // Export Xml
    // $("#xml-btn").click(function() {
    //     // let xmlval = $(this).val();
    //     $.ajax({
    //         url: `localhost:9020/analytic/export_xml/`,
    //         type: 'GET',
    //         success: function(data) {}
    //     });

    // });


    $('#coin-calc').click((e) => {

        var change = CoinCalc(parseInt($('#coin-inp').val()))
        // console.log(change)
        Object.keys(change).forEach(key => {
            // console.log(key, obj[key]);

            $('#coin-result').append('<li class="list-group-item">' + key + ': ' + change[key] + '</li>')


        })

    })

    function CoinCalc(money) {
        bills = [0.01, 0.05, 5, 20]
        if (bills[0] < bills[1]) bills.reverse();
        const change = {}
        bills.forEach(b => {
            change[b] = Math.floor(money / b)
            money = money - (b * change[b])
        })
        return change
    }


    $(document).ready(function() {
        $('#verify2faBtn').click(function() {
            var code = $('#2faCode').val();

            $.ajax({
                type: 'POST',
                url: 'http://localhost:9020/',
                data: {
                    code: code
                },
                success: function(response) {
                    var newResponse = JSON.parse(response)
                    // console.log(newResponse['success'])
                    if (newResponse.success) {
                        $('#2faModal').modal('hide');
                    } else {
                        // Handle error
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('bad request')

                }
            });
        });
    });
</script>