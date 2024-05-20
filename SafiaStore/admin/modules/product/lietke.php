<?php
if (isset($_GET['pagenumber'])) {
    $page = $_GET['pagenumber'];
} else {
    $page = '1';
}


if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 10) - 10;
}

$sql_category = "SELECT * FROM category";
$query_category = mysqli_query($mysqli, $sql_category);

if (isset($_GET['category_id'])) {
    $sql_product_list = "SELECT * FROM product where product_category = '".$_GET['category_id']."' ORDER BY product_id DESC LIMIT $begin,10";
} else {
    $sql_product_list = "SELECT * FROM product ORDER BY product_id DESC LIMIT $begin,10";
}



$query_product_list = mysqli_query($mysqli, $sql_product_list);
?>
<style>
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 4px;
    height: 20px;
    width: 20px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input~.checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked~.checkmark {
    background-color: #2196f3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked~.checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 8px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.button {
    display: inline-block;
    background-color: none;
    border: none;
    text-decoration: none;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 5px;
}

.button-light {
    background-color: #f4f5f7;
    color: #121212;
}

.button-light:hover {
    color: #121212;
    background-color: #d9dcdd;
}

.button-dark {
    background-color: #1f3bb3;
    color: #f0f0f0;
}

.button-dark:hover {
    color: #f0f0f0;
    background-color: #1a2e8b;
}

.card-title {
    font-size: 20px;
    font-weight: 600;
}

.d-flex {
    display: flex;
}

.p-relative {
    position: relative;
}

.mg-t-16 {
    margin-top: 16px;
}

.mg-l-16 {
    margin-left: 16px;
}

.p-absolute {
    position: absolute;
}

.space-between {
    justify-content: space-between;
}

.flex-1 {
    flex: 1;
}

.text-center {
    text-align: center;
}

.text-left {
    text-align: left;
}

.text-right {
    text-align: right;
}

.align-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.object-fit-cover {
    object-fit: cover;
}

.cursor-pointer {
    cursor: pointer;
}

input[type="checkbox"] {
    cursor: pointer;
}

.w-100 {
    width: 100%;
}

.h-100 {
    height: 100%;
}

.ratio-1 {
    aspect-ratio: 1;
}

.icon-search {
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
}

.input__search {
    max-width: 250px;
    width: 100%;
}

.dialog__control {
    display: none;
}

.dialog__control.active {
    display: block;
}

.main-pane-top {
    margin-bottom: 20px;
}

.control__box {
    position: fixed;
    left: 50%;
    bottom: 20px;
    text-align: center;
    border-radius: 8px;
    padding: 16px;
    background-color: #ffffff;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.button__control {
    padding: 3px 12px;
    margin: 0 10px;
    color: #121212;
    border: solid 1px #ccc;
    background-color: #ffffff;
    display: inline-block;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

.btn__wanning:hover {
    color: #f32121;
}

.btn_change:hover {
    color: #2196f3;
}

.product__status {
    display: inline-block;
    border-radius: 12px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
}

.product__status--active {
    background-color: #a1edd0;
}

.product__status--pause {
    background-color: #ffcece;
}

.show-status {
    display: inline-block;
    padding: 2px 8px;
    font-size: 12px;
    line-height: 16px;
}

.product_image {
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
}

.product__image {
    padding: 0 30px 30px 30px;
}

thead {
    color: #1f3bb3;
}

.card .card-body {
    padding: 20px 1px !important;
}

table tfoot {
    border-top: solid 1px #e4e4e4;
}

/* checkout */

.checkout .col+.col {
    border-left: solid 1px #d0d0d0;
}

.checkout__title {
    font-size: 16px;
    font-weight: 400;
    letter-spacing: 0.02em;
    padding-top: 10px;
    padding-bottom: 20px;
}

.checkout__infomation {
    border: solid 1px #d0d0d0;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.info__item+.info__item {
    border-top: solid 1px #d0d0d0;
}

.info__item {
    padding: 20px 0;
}

.info__title {
    width: 120px;
    font-size: 14px;
    color: #000;
    opacity: 0.75;
    display: inline-block;
}

.info__input {
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 0.03em;
    border: none;
    outline: none;
}

.mg-t-20 {
    margin-top: 20px;
}

.anchor {
    text-decoration: none;
    color: #000;
    opacity: 0.75;
}

.checkout__cart {
    padding: 10px;
}

.checkout__cart table {
    margin-bottom: 10px;
}

.table-col {
    padding: 10px 0;
    opacity: 0.7;
}

.checkout__items {}

.checkout__item {
    padding: 15px 0;
    border-bottom: solid 1px #dfdfdf67;
}

.checkout__image {
    width: 60px;
    height: 60px;
}

.checkout__image img {
    border-radius: 4px;
}

.product-quantity {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    top: -8px;
    right: -8px;
    color: white;
    background-color: var(--color-bg-1);
}

.checkout__name {
    margin: 0;
    padding: 0 10px;
}

.checkout__price {}

.checkout__bottom {
    margin-top: 10px;
    border-top: solid 1px var(--color-gray-dark);
}

.checkout__image {
    width: 60px;
    height: 60px;
}

.checkout__image img {
    border-radius: 4px;
}

.product-quantity {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    top: -8px;
    right: -8px;
    color: white;
    background-color: #464646;
}

.over-flow-hidden {
    overflow: hidden;
}

.quantity-number {
    font-size: 13px;
    font-weight: 400;
}

.checkout__name {
    margin: 0;
    padding: 0 10px;
    font-size: 13px;
    font-weight: 300;
}

.checkout__price {
    font-size: 13px;
    font-weight: 400;
}

.checkout__bottom {
    padding-top: 20px;
    border-top: solid 1px #d0d0d0;
}

.checkout__total {
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 0.04em;
}

.dropdown__item .btn {
    height: 34px;
    display: flex;
    align-items: center;
    border: 1px solid #dee2e6;
    color: #121212;
}

.table-action {
    position: relative;
}

.table-action th:first-child,
.table-action td:first-child {
    position: sticky;
    padding: 0;
    left: 0px;
    padding: 0 10px;
    background-color: #fefefe;
}

.table-action th:nth-child(2),
.table-action td:nth-child(2) {
    position: sticky;
    padding: 0;
    left: 20px;
    padding-left: 10px;
    background-color: #fefefe;
}

.icon-edit {
    width: 20px;
    height: 20px;
    padding: 2px;
    border-radius: 50%;
    opacity: 0.6;
}

.icon-edit img {
    display: none;
}

.icon-edit:hover {
    background-color: #ccc;
}

.table-action tr:hover .icon-edit img {
    display: block;
}

/* === dialog input === */
.dialog__input {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.24);
    z-index: 9999;
    display: none;
}

.dialog__input.open {
    display: block;
}

.dialog__input .form-group {
    margin: 0;
}

.dialog__container {
    z-index: 10000;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-width: 300px;
    min-height: 150px;
    background-color: #fff;
}

.dialog__header {
    padding: 10px;
    border-bottom: solid 1px #ccc;
}

.dialog__header h6 {
    margin: 0;
}

.input__box {
    padding: 10px;
}

.close__btn {
    cursor: pointer;
    width: 20px;
    height: 20px;
    border-radius: 50%;
}

.btn__sale {
    text-align: right;
    margin-top: 10px;
}

.receipt__info {
    margin: 20px 0;
    padding: 10px;
    border-radius: 10px;
    border: solid 1px #e4e4e4;
}

.receipt__info td {}

.receipt__table {
    border-top: solid 1px #e4e4e4;
}

.receipt__table thead th {
    border: solid 1px #e4e4e4;
}

.receipt__table tbody td {
    border: solid 1px #e4e4e4;
}

.receipt__info--input {
    border: none;
}

/* === home === */
.box-title {
    font-size: 16px;
}

.box-number {
    display: block;
    padding: 10px 0;
    font-size: 24px;
    font-weight: 600;
}

.color-t-red {
    color: #fa7642;
}

.color-t-yellow {
    color: #faee42;
}

.color-t-blue {
    color: #42a7fa;
}

.color-t-green {
    color: #61fa42;
}

.color-t-orange {
    color: #fab042;
}

.col-span {
    padding: 2px 8px;
    border-radius: 20px;
    font-weight: 600;
}

.color-bg-red {
    color: #a52f00;
    background-color: #ff330073;
}

.color-bg-yellow {
    color: #a89d00;
    background-color: #ffee002a;
}

.color-bg-orange {
    color: #834e00;
    background-color: #ff990027;
}

.color-bg-blue {
    color: #1963a0;
    background-color: #008cff3b;
}

.color-bg-green {
    color: #126b00;
    background-color: #2bff0046;
}

/* === pagination === */
.pagination {
    margin-top: 20px;
    padding: 10px 0;
}

.pagination__items {
    gap: 10px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.pagination__item .pagination__anchor.active {
    color: #f0f0f0;
    background-color: #3752b2;
}

.pagination__item .pagination__anchor {
    display: inline-block;
    padding: 5px 12px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    color: #121212;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.pagination__anchor {
    text-decoration: none;
}

.chosen-container {
    max-width: 100%;
}

/* doash board */
.metric__item {
    padding: 20px 10px;
    border-radius: 10px;
    font-size: 20px;
}

.metric__sales {
    color: #fa4242;
}

.metric__order {
    color: #6dfa42;
}

.metric__quantity {
    color: #faee42;
}

/* .btn-submit-form {
    bottom: 20px;
  } */

.rating-star {
    width: 16px;
    min-width: 16px;
    height: 16px;
    display: block;
    margin-right: 3px;
    background-color: #ffbc59;
    -webkit-mask-image: url(https://asset.vuahanghieu.com/assets/images/rating-star.svg);
    mask-image: url(https://asset.vuahanghieu.com/assets/images/rating-star.svg);
    -webkit-mask-size: contain;
    mask-size: contain;
}

.rating-star.rating-off {
    background-color: #d6dadf;
}

.header__list {
    margin-bottom: 10px;
}

.card-content {
    padding-inline: 20px;
}

/* === dialog import === */
.dialog__import {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #12121270;
    z-index: 999999;
    display: none;
}

.dialog__import.open {
    display: block;
}

.import-container {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f0f0f0;
    min-width: 300px;
    min-height: 150px;
    border-radius: 10px;
    overflow: hidden;
}

.import__header {
    padding: 10px;
    background-color: #3752b2;
    color: #f0f0f0;
}

.import__header h3 {
    margin: 0;
}

.import__content {
    padding: 10px;
}

.import__input {
    margin-bottom: 30px;
    margin-top: 20px;
}

.form-group.invalid .form-control {
    border-color: #f33a58;
}

.form-group.invalid .form-message {
    color: #f33a58;
}

.form-message {
    font-size: 12px;
    line-height: 16px;
    padding: 4px 0 0;
}

/* upload preview photo  */
.image-box {
    background-color: #ffffff;
}

.image-container {
    margin: 0 auto 30px auto;
}

.image-container img {
    display: block;
    position: relative;
    max-width: 100%;
    max-height: 400px;
    margin: auto;
}

figcaption {
    margin: 20px 0 30px 0;
    text-align: center;
    color: #2a292a;
}

.d-none {
    display: none;
}

.label-for-image {
    display: block;
    position: relative;
    background-color: #1f3bb3;
    color: #ffffff;
    font-size: 18px;
    text-align: center;
    max-width: 250px;
    padding: 10px 0;
    border-radius: 5px;
    margin: auto;
    cursor: pointer;
}

.tanhinh {
    display: none;
}

.scent-list {
    padding-bottom: 6px;
    display: flex;
    gap: 16px;
}

.scent-item {
    display: flex;
    align-items: center;
    gap: 5px;
}

.scent-title {
    font-size: 0.812rem;
}

.btn-add-scent {
    display: inline-block;
    font-size: 0.8rem;
    text-decoration: none;
    padding: 3px 6px;
    background-color: #515151;
    color: #ffffff;
    border-radius: 4px;
}
</style>
<div class="dialog__import">
    <div class="import-container p-absolute">
        <div class="import__header d-flex space-between align-center">
            <h3 class="card-title">Chọn file import</h3>
            <span class="icon-close cursor-pointer" id="btnClose"></span>
        </div>
        <div class="import__content">
            <form action="modules/product/import.php" method="POST" enctype="multipart/form-data">
                <input class="import__input" type="file" name="file_import" accept=".xlsx">
                <br>
                <div class="w-100 text-right">
                    <button class="button button-light" id="btnCancel" type="button">Hủy</button>
                    <button type="submit" name="import_product" class="button button-dark">Tải lên</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh sách sản phẩm</h3>
            <div class="action_group">
                <a href="modules/product/export.php" class="button button-light">Export</a>
                <button class="button button-light" id="btnImport">Import</button>

                <a href="?action=product&query=product_add" class="button button-dark">Thêm sản phẩm</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center justify-center">
                    <div class="dropdown dropdown__item">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuSizeButton2"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                            <a class="dropdown-item" href="index.php?action=product&query=product_list">Tất cả</a>
                            <?php 
                            while($category = mysqli_fetch_array($query_category)) {    
                            ?>
                            <a class="dropdown-item"
                                href="index.php?action=product&query=product_list&category_id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
                            <?php
                            } 
                            ?>
                        </div>
                    </div>
                    <div class="input__search p-relative">
                        <form class="search-form" action="?action=product&query=product_search" method="POST">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" title="Nhập vào tên sản phẩm để tìm kiếm"
                                name="product_search" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll" title="Chọn tất cả">
                                </th>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Đánh giá</th>
                                <th>Tình trạng</th>
                                <th>Giá bán sản phẩm</th>
                                <th>Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_product_list)) {
                                $i++;
                            ?>
                            <tr>
                                <td>
                                    <a
                                        href="?action=product&query=product_edit&product_id=<?php echo $row['product_id'] ?>">
                                        <div class="icon-edit" title="Sửa sản phẩm">
                                            <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <input type="checkbox" class="checkbox" title="Chọn sản phẩm"
                                        onclick="testChecked(); getCheckedCheckboxes();"
                                        id="<?php echo $row['product_id'] ?>">
                                </td>
                                <td><img src="modules/product/uploads/<?php echo $row['product_image'] ?>"
                                        class="product_image" alt="image"></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>
                                    <span class="review-star-list d-flex">
                                        <?php
                                            $query_evaluate_rating = mysqli_query($mysqli, "SELECT * FROM evaluate WHERE product_id='" . $row['product_id'] . "' AND evaluate_status = 1");

                                            $rate1 = 0;
                                            $rate2 = 0;
                                            $rate3 = 0;
                                            $rate4 = 0;
                                            $rate5 = 0;

                                            while ($evaluate_rating = mysqli_fetch_array($query_evaluate_rating)) {
                                                $rate = $evaluate_rating['evaluate_rate'];

                                                if ($rate == 1) {
                                                    $rate1++;
                                                } elseif ($rate == 2) {
                                                    $rate2++;
                                                } elseif ($rate == 3) {
                                                    $rate3++;
                                                } elseif ($rate == 4) {
                                                    $rate4++;
                                                } elseif ($rate == 5) {
                                                    $rate5++;
                                                }
                                            }

                                            $total_rate = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
                                            if ($total_rate != 0) {
                                                $rate_avg =  ($rate1 * 1 + $rate2 * 2 + $rate3 * 3 + $rate4 * 4 + $rate5 * 5) / $total_rate;
                                                $rate_avg = round($rate_avg, 1);
                                            } else {
                                                $rate_avg = 0;
                                            }

                                            for ($i = 0; $i < 5; $i++) {
                                                if ($i < $rate_avg) {
                                            ?>
                                        <div class="rating-star"></div>
                                        <?php
                                                } else {
                                                ?>
                                        <div class="rating-star rating-off"></div>
                                        <?php
                                                }
                                            }
                                            ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($row['product_status'] == 1) {
                                        ?>
                                    <div class="product__status product__status--active">
                                        <span class="show-status">Đang bán</span>
                                    </div>
                                    <?php
                                        } else {
                                        ?>
                                    <div class="product__status product__status--pause">
                                        <span class="show-status">Dừng bán</span>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </td>
                                <td class="<?php if ($row['product_price'] < $row['product_price_import']) {
                                                    echo "text-danger";
                                                } ?>"><?php echo number_format($row['product_price']) . ' ₫' ?></td>
                                <td><?php echo $row['product_sale'] ?>%</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination d-flex justify-center">
                    <?php
                    if (isset($_GET['category_id'])) {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product_category = '" . $_GET['category_id'] . "' ORDER BY product_id DESC");
                    } else {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product ORDER BY product_id DESC");
                    }
                    $row_count = mysqli_num_rows($query_pages);
                    $totalpage = ceil($row_count / 10);
                    $currentLink = $_SERVER['REQUEST_URI'];
                    ?>
                    <ul class="pagination__items d-flex align-center justify-center">
                        <?php if ($page != 1) {
                        ?>
                        <li class="pagination__item">
                            <a class="d-flex align-center"
                                href="<?php echo $currentLink ?>&pagenumber=<?php echo $i - 1 ?>">
                                <img src="images/arrow-left.svg" alt="">
                            </a>
                        </li>
                        <?php
                        } ?>

                        <?php

                        for ($i = 1; $i <= $totalpage; $i++) {
                        ?>
                        <li class="pagination__item">
                            <a class="pagination__anchor <?php if ($page == $i) {
                                                                    echo "active";
                                                                } ?>"
                                href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($page != $totalpage) {
                        ?>
                        <li class="pagination__item">
                            <a class="d-flex align-center"
                                href="<?php echo $currentLink ?>&pagenumber=<?php echo $i + 1 ?>">
                                <img src="images/icon-nextlink.svg" alt="">
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control C" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không?')"
            id="btnDelete">Xóa</a>
        <button class="button__control btn_change" id="btnSale">Giảm giá</button>
    </div>
</div>
<div class="dialog__input">
    <div class="dialog__container">
        <div class="dialog__header d-flex align-center space-between">
            <h6>Thiết lập giảm giá cho sản phẩm</h6>
            <div class="close__btn d-flex align-center justify-center">
                <i class="icon-close"></i>
            </div>
        </div>
        <div class="input__box form-group">
            <label class="d-block" for="input_sale">Giảm giá (%)</label>
            <input class="form-control" type="number" id="input_sale" placeholder="Giảm giá theo phần trăm">
            <div class="w-100 btn__sale"><a href="#" id="sale_btn" class="btn btn-outline-dark btn-fw"
                    onclick="return confirm('Xác nhận giảm giá cho các sản phẩm?')">Giảm giá</a></div>
        </div>
    </div>
</div>

<script>
var dialogImport = document.querySelector('.dialog__import');
var btnImport = document.querySelector('#btnImport');
var btnCancel = document.querySelector('#btnCancel');
var btnClose = document.querySelector('#btnClose');

btnImport.addEventListener('click', function() {
    dialogImport.classList.add('open');
});

btnClose.addEventListener('click', function() {
    dialogImport.classList.remove('open');
});

btnCancel.addEventListener('click', function() {
    dialogImport.classList.remove('open');
});
</script>

<script>
var url;
var dialogInput = document.querySelector(".dialog__input");
var btnSale = document.getElementById("btnSale");
var saleBtn = document.querySelector('#sale_btn')
var btnClose = document.querySelector(".close__btn");
var btnDelete = document.getElementById("btnDelete");
var checkAll = document.getElementById("checkAll");
var checkboxes = document.getElementsByClassName("checkbox");
var dialogControl = document.querySelector('.dialog__control');
// Thêm sự kiện click cho checkbox checkAll
checkAll.addEventListener("click", function() {
    // Nếu checkbox checkAll được chọn
    if (checkAll.checked) {
        // Đặt thuộc tính "checked" cho tất cả các checkbox còn lại
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    } else {
        // Bỏ thuộc tính "checked" cho tất cả các checkbox còn lại
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }
    testChecked();
    getCheckedCheckboxes();
});

function testChecked() {
    var count = 0;
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count++;
        }
    }
    if (count > 0) {
        dialogControl.classList.add('active');
    } else {
        dialogControl.classList.remove('active');
        checkAll.checked = false;
    }
}

btnSale.addEventListener('click', function() {
    dialogInput.classList.add("open");
})

btnClose.addEventListener('click', function() {
    dialogInput.classList.remove("open");
})

var linklist = '';

function getCheckedCheckboxes() {
    var checkeds = document.querySelectorAll('.checkbox:checked');
    var checkedIds = [];
    for (var i = 0; i < checkeds.length; i++) {
        checkedIds.push(checkeds[i].id);
    }
    linklist = "modules/product/xuly.php?data=" + JSON.stringify(checkedIds);
    btnDelete.href = "modules/product/xuly.php?data=" + JSON.stringify(checkedIds);
}
// truyền giá trị sale vào thẻ a
var inputSale = document.querySelector('#input_sale');
inputSale.addEventListener("input", function() {
    saleBtn.href = linklist + "&product_sale=" + inputSale.value;
})
</script>

<script>
function showErrorToast() {
    toast({
        title: "Success",
        message: "Cập nhật thành công",
        type: "success",
        duration: 0,
    });
}
</script>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $message = $_GET['message'];
    echo '<script>';
    echo '   showErrorToast();';
    echo '</script>';
}
?>
<script>
window.history.pushState(null, "", "index.php?action=product&query=product_list");
</script>