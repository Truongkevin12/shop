<div class="all_lienhe_left">
    <a style="left: 30px;bottom: 80px;" class="btn-dienthoai btn-phone btn-frame text-decoration-none"
        href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">
        <div style="border-color: #db261b;" class="animation-phone animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i style="background-color: #fff;"><svg style="fill: #db261b; width:32px; height:38px;"
                xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none"
                viewBox="0 0 1408 1896.0833" class="" fill="#000">
                <path
                    d="M1408 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-52.5-3.5T959 1520t-47.5-14.5T856 1485t-49-18q-98-35-175-83-128-79-264.5-215.5T152 904q-48-77-83-175-3-9-18-49t-20.5-55.5T16 577 3.5 519.5 0 467q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z">
                </path>
            </svg></i>
        <div class="hotline_text"><span><?= $optsetting['hotline'] ?></span></div>
    </a>
</div>
<div class="all_lienhe_left">
    <a style="left: 30px;bottom: 155px;" class="zalo btn-phone btn-frame text-decoration-none"
        href="http://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>" target="_blank">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><b>Zalo</b></i>
    </a>
</div>
<div class="all_lienhe_left">
    <a style="left: 30px;bottom: 230px;" class="btn-sms-ne sms btn-phone btn-frame text-decoration-none"
        href="<?= $optsetting['fanpage'] ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i style="background-color: #fff;font-size: 30px;" class="fab fa-facebook-messenger"></i>

    </a>
</div>
<div class="all_lienhe_left">
    <a href="sms:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>" style="left: 30px;bottom: 310px;" class="btn-mess call-now btn-phone btn-frame text-decoration-none" rel="nofollow">

        <i class="fab fa-whatsapp"></i>

        <div class="animated infinite zoomIn kenit-alo-circle"></div>

        <div class="animated infinite pulse kenit-alo-circle-fill"></div>

    </a>
</div>
<style>
	@media(max-width: 500px){
		.btn-mess{
			display: none !important;
		}
		.hotline_text{
			display: none !important;
		}
		.btn-dienthoai{
			bottom: 230px !important;
			
		}
		.btn-dienthoai i svg{
			fill: white !important;
		}
		.btn-dienthoai i{
			background-color: green !important;
		}
		.btn-sms-ne{
			bottom: 80px !important;
		}
		.btn-dienthoai .animation-phone{
			border-color:green !important;
		}
		.
	}

</style>