<?php
session_start();
if (isset($_SESSION['khach_hang'])) {
    $id_khachhang = $_SESSION['khach_hang']['id'];
}
include "../model/pdo.php";
include "../model/binhluan.php";
include "../model/danhgia.php";
$id_phong = $_REQUEST['idpro'];
$show_binhluan = list_binhluan_phong($id_phong);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .comment-container {
            width: 1300px;
            margin: 0 auto;
        }

        #comment-form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            width: 50px;
            height: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 7px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .input {
            max-width: 300px;
            height: 50px;
            border-radius: 7px;
            border: 0;
            outline: auto grey;
            padding-inline: 15px;
            font-size: 16px;
            transform: all 200ms;
        }

        .input:focus {
            text-decoration: underline 6px;
            box-shadow: 0 0 50px rgb(255, 255, 255);
            border: 1px solid grey;
        }

        #comment {
            flex: 1;
            resize: vertical;
            /* Để không cho phép textarea quá ngắn */
        }

        .comment {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .bold {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="comment-container">
        <div id="binh_luan">
            <h3>Nội dung bình luận</h3>
            <?php
            $comment_count = 0; // Khởi tạo biến đếm bình luận
            foreach ($show_binhluan as $binhluan2) {
                extract($binhluan2);
                $ten_khachhang = lay_ten_khachhang($id_khachhang);
                if ($trang_thai == 0) {
                    echo "<div class='comment'>";
                    echo "<p class='no'>($ngay_bl)</p><p class='bold'>$ten_khachhang:</p>";
                    echo "<p>$noi_dung</p>";
                    echo "</div>";
                }
                $comment_count++; // Tăng biến đếm sau mỗi bình luận
            }
            if ($comment_count == 0) {
                echo "Sản phẩm chưa có bình luận.";
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['khach_hang'])) {
            echo '<form id="comment-form" action="' . $_SERVER['PHP_SELF'] . '" method="post">
            <input type="hidden" name="id_phong" value="' . $id_phong . '">
            <input type="hidden" name="id_khachhang" value="' . $id_khachhang . '">
            <div class="comment-form">
                <input class="input" id="comment" name="noidung" placeholder="Viết bình luận" required>
                <input type="submit" name="gui_binhluan" value="Gửi">
            </div>
        </form>';
        } else {
            echo 'Vui lòng <span style="color: blue; text-decoration: underline;"  data-bs-toggle="modal" data-bs-target="#loginModel">đăng nhập</span> để bình luận.';
        }
        ?>

    </div>
    <?php
    if (isset($_POST['gui_binhluan']) && ($_POST['gui_binhluan'])) {
        $noi_dung = $_POST['noidung'];
        $id_phong = $_POST['id_phong'];
        $id_khachhang = $_POST['id_khachhang'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_bl = date('H:i:s d/m/Y');
        them_binhluan($noi_dung, $id_phong, $id_khachhang, $ngay_bl);
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
    ?>
</body>

</html>