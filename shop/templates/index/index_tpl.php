<div class="wrap_gioithieu background-gt">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-6">
                <div class="title_gt">VỀ CHÚNG TÔI</div>
                <div class="name_gt"><?=$gioithieu['ten'.$lang]?></div>
                <div class="gt_noidung text-gt"><?=htmlspecialchars_decode($gioithieu['mota'.$lang])?></div>
                <div class="xemgt"><a href="gioi-thieu">Xem Thêm</a></div>
            </div>
            <div class="col-md-6">
                <div class="img_gt">
                    <a class="text-decoration-none" href="gioi-thieu" title="<?=$gioithieu['ten'.$lang]?>">
                        <img onerror="this.src='<?=THUMBS?>/80x80x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/630x440x1/<?=UPLOAD_NEWS_L.$gioithieu['photo']?>"
                            alt="<?=$gioithieu['ten'.$lang]?>">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="background-dv" id="background-tieuchi">
    <div class="fixwidth">
        <div class="title">
            Dịch Vụ
            <p>Hãy liên hệ với chúng tôi khi bạn cần trợ giúp về sản phẩm, dịch vụ</p>
        </div>
        <div class="owl-carousel owl-theme owl-dv">
            <?php foreach($duan as $k=>$v){ ?>
            <div class="boxproduct_item">
                <a class="boxproduct_img" href="<?=$v['tenkhongdauvi']?>"><span><img
                            onerror="this.src='<?=THUMBS?>/380x270x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/380x270x1/<?=UPLOAD_NEWS_L.$v['photo']?>"
                            alt="<?=$v['ten'.$lang]?>" /></span></a>
                <div class="boxproduct_info">
                    <div class="boxproduct_name"><a href="<?=$v['tenkhongdauvi']?>"
                            title="<?=$v['tenvi']?>"><?=$v['ten'.$lang]?></a></div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php if($pronb_list['numb']>0){?>
<div class="wrap_product">
    <div class="wrap_product_index">
        <div class="fixwidth">
            <div class="title">
                Sản Phẩm Tiêu Biểu
                <p>Hãy liên hệ với chúng tôi khi bạn cần trợ giúp về sản phẩm, dịch vụ</p>
            </div>
            <div class="paging-product-index" id="load_pro_0" data-id="0"></div>
        </div>
    </div>
</div>
<?php }?>

<div class="wrap_lydo background-gt">
    <div class="fixwidth">
        <div class="title"><?=$lydo['ten'.$lang] ?></div>
        <div class="gt_noidung" style="text-align: center;"><?=htmlspecialchars_decode($lydo['mota'.$lang])?></div>
    </div>
</div>

<!-- Máy thở thuê -->

<div class="wrap_gioithieu" id="background-maytho-thue">
    <div class="fixwidth" style="width: 80%; margin: auto;">
        <div class="title_maytho">
            <h2 class="title">Báo Giá</h2>
        </div>
        <div class="row justify-content-between">
            <?php foreach($baogia as $k=>$v){ ?>
            <div class="col-md-3 item_dv w-clear">
                <div class="pic-news">
                    <a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><img
                            onerror="this.src='<?=THUMBS?>/80x80x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/150x150x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>">
                    </a>
                </div>
                <div class="info-news">
                    <h3 class="name-news"><a class="text-decoration-none" href="<?=$v[$sluglang]?>"
                            title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></h3>
                    <div class="desc-news"><?=htmlspecialchars_decode($v['mota'.$lang])?></div>
                </div>
                <p class="text-btn"><a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">Hotline:
                        <?= $optsetting['hotline'] ?></a></p>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="wrap_bottom">
    <div class="fixwidth">

        <div class="d-flex justify-content-between flex-wrap">
            <div class="left_bottom">
                <div class="title_bottom">AMBUM HÌNH ẢNH</div>
                <div class="owl-carousel owl-theme auto_video">
                    <?php foreach($hinhanh as $k=>$v){?>
                        <a data-fancybox="album2" href="<?=THUMBS?>/580x320x1/<?=UPLOAD_PHOTO_L.$v['photo']?>">
                                <img onerror="this.src='<?=THUMBS?>/80x80x2/assets/images/noimage.png';"
                                    src="<?=THUMBS?>/580x320x1/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>">
                            </a>
                    <?php }?>
                </div>
                <!-- <div class="xemgt xem_tintucvideo"><a href="tin-tuc">Xem Thêm</a></div> -->
            </div>
            <div class="right_bottom">
                <div class="title_bottom">VIDEO - CLIP</div>
                <div class="owl-carousel owl-theme auto_video">
                    <?php foreach($video as $k=>$v){?>
                    <a data-fancybox="video" class="tailvideo_item_owl" data-src="<?=$v['video']?>"
                        data-name="<?=$v['ten'.$lang]?>" title="<?=$v['ten'.$lang]?>"
                        style="background:url(https://img.youtube.com/vi/<?=$func->getYoutube($v['video'])?>/hqdefault.jpg) no-repeat center; background-size:cover;">
                    </a>
                    <?php }?>
                </div>
                <div class="xemgt xem_tintucvideo"><a href="video">Xem Thêm</a></div>
            </div>
        </div>
    </div>
</div>