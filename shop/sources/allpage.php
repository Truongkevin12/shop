<?php
    if(!defined('SOURCES')) die("Error");
    /* Query allpage */
    $favicon = $d->rawQueryOne("select photo from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('favicon','photo_static'));
    $logo = $d->rawQueryOne("select id, photo from #_photo where type = ? and act = ? limit 0,1",array('logo','photo_static'));

    $baner = $d->rawQueryOne("select id, photo from #_photo where type = ? and act = ? limit 0,1",array('baner','photo_static'));

    $splistmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_product_list where type = ? and hienthi > 0 order by stt,id desc",array('san-pham'));
    $ctlistmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_news_list where type = ? and hienthi > 0 order by stt,id desc",array('dich-vu'));
    $dichvumenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_news_list where type = ? and hienthi > 0 and noibat > 0 order by stt,id desc",array('dich-vu'));
	$chinhsachmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_news where type = ? and hienthi > 0 and noibat > 0 order by stt,id desc",array('chinh-sach'));
	$huongdanmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_news where type = ? and hienthi > 0 and noibat > 0 order by stt,id desc",array('huong-dan'));
   
 
    $footer = $d->rawQueryOne("select ten$lang, noidung$lang from #_static where type = ? limit 0,1",array('footer'));
    $lienhe = $d->rawQueryOne("select ten$lang, noidung$lang from #_static where type = ? limit 0,1",array('lien-he'));
    $social1 = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('mxh'));
    $chinhsach = $d->rawQuery("select ten$lang, photo, link,mota$lang from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('chinh-sach'));

    $cs = $d->rawQuery("select ten$lang, tenkhongdau$lang from #_news where type = ? and hienthi > 0 order by stt,id desc ",array('chinh-sach'));

    //$tagsProduct = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_tags where type = ? and noibat > 0 order by stt,id desc",array('san-pham'));

    /* Get statistic */
    $counter = $statistic->getCounter();
    $online = $statistic->getOnline();

    /* Newsletter */
    if(isset($_POST['submit-newsletter'])){
        $responseCaptcha = $_POST['recaptcha_response_newsletter'];
        $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
        $scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
        $actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
        $testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

        if(($scoreCaptcha >= 0.1 && $actionCaptcha == 'Newsletter') || $testCaptcha == true){
            $data = array();
            $data['ten'] = (isset($_REQUEST['name-newsletter']) && $_REQUEST['name-newsletter'] != '') ? htmlspecialchars($_REQUEST['name-newsletter']) : '';
            $data['dienthoai'] = (isset($_REQUEST['phone-newsletter']) && $_REQUEST['phone-newsletter'] != '') ? htmlspecialchars($_REQUEST['phone-newsletter']) : '';
            $data['email'] = (isset($_REQUEST['email-newsletter']) && $_REQUEST['email-newsletter'] != '') ? htmlspecialchars($_REQUEST['email-newsletter']) : '';
            $data['diachi'] = (isset($_REQUEST['diachi-newsletter']) && $_REQUEST['diachi-newsletter'] != '') ? htmlspecialchars($_REQUEST['diachi-newsletter']) : '';
            $data['noidung'] = (isset($_REQUEST['noidung-newsletter']) && $_REQUEST['noidung-newsletter'] != '') ? htmlspecialchars($_REQUEST['noidung-newsletter']) : '';
            $data['ngaytao'] = time();
            $data['type'] = 'baogia';
            $d->insert('newsletter',$data);

            /* G??n gi?? tr??? g???i email */
            $strThongtin = '';
            $emailer->setEmail('tennguoigui',$data['ten']);
            $emailer->setEmail('emailnguoigui',$data['email']);
            $emailer->setEmail('dienthoainguoigui',$data['dienthoai']);
            $emailer->setEmail('diachinguoigui',$data['diachi']);
            $emailer->setEmail('tieudelienhe','Th?? ????ng k??');
            $emailer->setEmail('noidunglienhe',$data['noidung']);
            if($emailer->getEmail('tennguoigui')){
                $strThongtin .= '<span style="text-transform:capitalize">'.$emailer->getEmail('tennguoigui').'</span><br>';
            }
            if($emailer->getEmail('emailnguoigui')){
                $strThongtin .= '<a href="mailto:'.$emailer->getEmail('emailnguoigui').'" target="_blank">'.$emailer->getEmail('emailnguoigui').'</a><br>';
            }            
            if($emailer->getEmail('dienthoainguoigui')){
                $strThongtin .= 'Tel: '.$emailer->getEmail('dienthoainguoigui').'';
            }
            if($emailer->getEmail('diachinguoigui')){
                $strThongtin .= '?????a ch???: '.$emailer->getEmail('diachinguoigui').'';
            }
            $emailer->setEmail('thongtin',$strThongtin);

            /* N???i dung g???i email cho admin */
            $contentAdmin = '
            <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
                <tbody>
                    <tr>
                        <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                                <tbody>
                                    <tr>
                                        <td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
                                            <table cellpadding="0" cellspacing="0" style="border-bottom:3px solid '.$emailer->getEmail('color').';padding-bottom:10px;background-color:#fff" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
                                                            <div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
                                                            <table style="width:100%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="'.$emailer->getEmail('home').'" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">'.$emailer->getEmail('logo').'</a>
                                                                        </td>
                                                                        <td style="padding:15px 20px 0 0;text-align:right">'.$emailer->getEmail('social').'</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="background:#fff">
                                        <td align="left" height="auto" style="padding:15px" width="600">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">K??nh ch??o</h1>
                                                            <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">B???n nh???n ???????c th?? li??n h??? t??? kh??ch h??ng <span style="text-transform:capitalize">'.$emailer->getEmail('tennguoigui').'</span> t???i website '.$emailer->getEmail('company:website').'.</p>
                                                            <h3 style="font-size:13px;font-weight:bold;color:'.$emailer->getEmail('color').';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">Th??ng tin li??n h??? <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Ng??y '.date('d',$emailer->getEmail('datesend')).' th??ng '.date('m',$emailer->getEmail('datesend')).' n??m '.date('Y H:i:s',$emailer->getEmail('datesend')).')</span></h3>
                                                        </td>
                                                    </tr>
                                                <tr>
                                                <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">'.$emailer->getEmail('thongtin').'</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">&nbsp;
                                                            <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:0"><strong>Ti??u ?????: </strong> '.$emailer->getEmail('tieudelienhe').'<br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>'.$emailer->getEmail('noidunglienhe').'</i></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;
                                                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px '.$emailer->getEmail('color').' dashed;padding:10px;list-style-type:none">B???n c???n ???????c h??? tr??? ngay? Ch??? c???n g???i mail v??? <a href="mailto:'.$emailer->getEmail('company:email').'" style="color:'.$emailer->getEmail('color').';text-decoration:none" target="_blank"> <strong>'.$emailer->getEmail('company:email').'</strong> </a>, ho???c g???i v??? hotline <strong style="color:'.$emailer->getEmail('color').'">'.$emailer->getEmail('company:hotline').'</strong> '.$emailer->getEmail('company:worktime').'. '.$emailer->getEmail('company:website').' lu??n s???n s??ng h??? tr??? b???n b???t k?? l??c n??o.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;
                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">M???t l???n n???a '.$emailer->getEmail('company:website').' c???m ??n qu?? kh??ch.</p>
                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="'.$emailer->getEmail('home').'" style="color:'.$emailer->getEmail('color').';text-decoration:none;font-size:14px" target="_blank">'.$emailer->getEmail('company').'</a> </strong></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                        <table width="600">
                            <tbody>
                                <tr>
                                    <td>
                                    <p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">Qu?? kh??ch nh???n ???????c email n??y v?? ???? li??n h??? t???i '.$emailer->getEmail('company:website').'.<br>
                                    ????? ch???c ch???n lu??n nh???n ???????c email th??ng b??o, ph???n h???i t??? '.$emailer->getEmail('company:website').', qu?? kh??ch vui l??ng th??m ?????a ch??? <strong><a href="mailto:'.$emailer->getEmail('email').'" target="_blank">'.$emailer->getEmail('email').'</a></strong> v??o s??? ?????a ch??? (Address Book, Contacts) c???a h???p email.<br>
                                    <b>?????a ch???:</b> '.$emailer->getEmail('company:address').'</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                </tbody>
            </table>';

            /* Send email admin */
            $arrayEmail = null;
            $subject = "Th?? li??n h??? t??? ".$setting['ten'.$lang];
            $message = $contentAdmin;
            $file = 'file';

            if($config['website']['sendmail'] == true) {
                if($emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file))
                {
                    /* Send email customer */
                    /*$arrayEmail = array(
                        "dataEmail" => array(
                            "name" => $emailer->getEmail('tennguoigui'),
                            "email" => $emailer->getEmail('emailnguoigui')
                        )
                    );
                    $subject = "Th?? li??n h??? t??? ".$setting['ten'.$lang];
                    $message = $contentCustomer;
                    $file = 'file';
                    if($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) */
                    $func->transfer("????ng k?? nh???n tin th??nh c??ng!",$config_base);
                }
                else
                {
                    $func->transfer("????ng k?? nh???n tin th???t b???i. Vui l??ng th??? l???i sau.",$config_base, false);
                }
            }else{
                $func->transfer("????ng k?? nh???n tin th??nh c??ng!",$config_base);
            }
        }
        else
        {
            $func->transfer("????ng k?? nh???n tin th???t b???i. Vui l??ng th??? l???i sau.",$config_base, false);
        }
    }
?>