<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
// echo $previewURL;
?>

<body>
    <!-- <img src=<?php echo $key; ?> /> -->

    <video class="video-player--video-player--HiAnq" id="playerId__41080142--101" preload="auto" controlslist="nodownload" src="<?= base_url('/AWSBucket/previewVideo?id=' . $key) ?>" style="padding-bottom: 0px;" type="video/mp4" controls></video>


</body>
<script>

</script>

</html>