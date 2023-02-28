<div class="boxfooter_container " id="background-footer">
    <div class="row fixwidth">
        <div class="col-md-6">
            <?= htmlspecialchars_decode($footer['noidung'.$lang]) ?>
        </div>
        <div class="col-md-3">
            <div class="footer_title">Chính sách</div>
            <div class="allchinhsach">
                <?php foreach($chinhsach as $v) {?>
                    <p>- <?= $v['ten'.$lang] ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3">
        <div class="footer_title">fanpage</div>
        <iframe src="https://www.facebook.com/plugins/page.php?href=<?=$optsetting['fanpage'] ?>&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>
<div class="boxfooter_bottom">
    <div class="fixwidth d-flex justify-content-between flex-wrap">
        <p style="margin: 0;"><?= $optsetting['copyright'] ?></p>
        <div>Online: <?= $online ?> | Hôm nay: <?= $counter['today']?> | Tổng: <?= $counter['total'] ?></div>
    </div>
</div>
<div class="bottom-contact1"><?=htmlspecialchars_decode($optsetting['toado_iframe'])?></div>