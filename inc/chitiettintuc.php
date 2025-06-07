<!DOCTYPE html>
<html>

<head>
    <title>RamBoHotel</title>
    <!-- CSS only -->
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


</head>


<body>

    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Tin Tức</h2>
        <div class="container mx-auto">
            <?php if (!empty($listchitiet_tintuc)) :
                extract($listchitiet_tintuc);
            ?>
                <div><?php echo $listchitiet_tintuc['noi_dung']; ?></div>
            <?php else : ?>
                <p>chưa có bài viết!</p>
            <?php endif; ?>
        </div>
    </div>