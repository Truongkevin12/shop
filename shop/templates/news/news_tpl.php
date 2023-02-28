<div class="title"><?=(@$title_cat!='')?$title_cat:@$title_crumb?></div>

<div class="content-main w-clear">
    <?php if(count($news)>0) {?>
        <div class="content-main w-clear">
        <?php foreach($news as $k=>$v) { ?>
            <div class="news w-clear">
                <div class="pic-news scale-img">
                    <a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><img onerror="this.src='<?=THUMBS?>/320x240x1/assets/images/noimage.png';" src="<?=THUMBS?>/320x240x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>">
                </a>
                <p class="time-news"><span class="time-news-day"><?=date("d",$v['ngaytao'])?></span><span class="time-news-month"><?=date("m",$v['ngaytao'])?></span></p>
                </div>
                <div class="info-news">
                    <h3 class="name-news"><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></h3>
                    <div class="desc-news text-split"><?= htmlspecialchars_decode($v['mota'.$lang]) ?></div>
                    <a href="<?= $v[$sluglang] ?>" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Xem thêm</a>
                </div>
            </div>
        <?php }?>
        </div>
        <div class="clear"></div>
     <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    <?php } ?>
    
</div>
<?php if($noidung_page!=''){?>
<div class="noidung_page">
    <div class="meta-toc">
        <div class="box-readmore">
            <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
        </div>
    </div>
    <div id="toc-content"><?=htmlspecialchars_decode($noidung_page)?></div>
</div>
<?php }?>