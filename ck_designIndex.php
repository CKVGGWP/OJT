<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/head/head.php'); ?>
</head>

<body>

    <header class="text-primary text-center border border-primary m-3">
        <?php include('views/header/header.php'); ?>
    </header>

    <main class="d-flex vh-100 mx-3">
        <?php include('views/body/section.php'); ?>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Display the div when the button is clicked
    $('#navbarButton').click(function() {
        if ($(window).width() < 990) {
            $('.mobile-view-nav').toggle();
        } else {
            $('.mobile-view-nav').hide();
        }
    });
</script>

</html>