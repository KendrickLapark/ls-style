<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <!--[if gte mso 9]>
 <xml>
  <o:OfficeDocumentSettings>
  <o:AllowPNG/>
  <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
 </xml>
 <![endif]-->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,500,700|Ubuntu:400,400i,500,500i,700,700i"
        rel="stylesheet" />
    <!--<![endif]-->
    <title>Email Template</title>
    <!--[if gte mso 9]>
 <style type="text/css" media="all">
  sup { font-size: 100% !important; }
 </style>
 <![endif]-->


    <style type="text/css" media="screen">
        /* Linked Styles */
        body {
            padding: 0 !important;
            margin: 0 !important;
            display: block !important;
            min-width: 100% !important;
            width: 100% !important;
            background: #064b98;
            -webkit-text-size-adjust: none
        }

        a {
            color: #000001;
            text-decoration: none
        }

        p {
            padding: 0 !important;
            margin: 0 !important
        }

        img {
            -ms-interpolation-mode: bicubic;
            /* Allow smoother rendering of resized image in Internet Explorer */
        }

        .mcnPreviewText {
            display: none !important;
        }

        /* Mobile styles */
        @media only screen and (max-device-width: 480px),
        only screen and (max-width: 480px) {
            .mobile-shell {
                width: 100% !important;
                min-width: 100% !important;
            }

            .m-center {
                text-align: center !important;
            }

            .text3,
            .text-footer,
            .text-header {
                text-align: center !important;
            }

            .center {
                margin: 0 auto !important;
            }

            .td {
                width: 100% !important;
                min-width: 100% !important;
            }

            .m-br-15 {
                height: 15px !important;
            }

            .p30-15 {
                padding: 30px 15px !important;
            }

            .p30-15-0 {
                padding: 30px 15px 0px 15px !important;
            }

            .p40 {
                padding-bottom: 30px !important;
            }

            .box,
            .footer,
            .p15 {
                padding: 15px !important;
            }

            .h2-white {
                font-size: 40px !important;
                line-height: 44px !important;
                text-align: center !important;
            }

            .h2 {
                font-size: 42px !important;
                line-height: 50px !important;
            }

            .m-td,
            .m-hide {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
                font-size: 0 !important;
                line-height: 0 !important;
                min-height: 0 !important;
            }

            .m-block {
                display: block !important;
            }

            .container {
                padding: 0px !important;
            }

            .separator {
                padding-top: 30px !important;
            }

            .fluid-img img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
            }

            .column,
            .column-top,
            .column-dir,
            .column-empty,
            .column-empty2,
            .column-bottom,
            .column-dir-top,
            .column-dir-bottom {
                float: left !important;
                width: 100% !important;
                display: block !important;
            }

            .column-empty {
                padding-bottom: 10px !important;
            }

            .column-empty2 {
                padding-bottom: 30px !important;
            }

            .content-spacing {
                width: 15px !important;
            }
        }
    </style>
</head>

<body class="body"
    style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#064b98; -webkit-text-size-adjust:none;">
    <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#064b98">
        <tr>
            <td align="center" valign="top" class="container" style="padding:50px 10px;">
                <!-- Container -->
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            <table width="650" cellspacing="0" cellpadding="0" class="mobile-shell">
                                <tr>
                                    <td class="td" bgcolor="#ffffff"
                                        style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                        <!-- Header -->
                                        <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tr>
                                                <td class="p30-15-0" style="padding: 40px 30px 0px 30px;">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <th class="column"
                                                                style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="img m-center"
                                                                            style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <?php
                                                                            $path = 'images/logoNegSmall.jpg';
                                                                            $type = pathinfo($path, PATHINFO_EXTENSION);
                                                                            $data = file_get_contents($path);
                                                                            $logoMail = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                                            ?>
                                                                            <img src="<?php echo $logoMail; ?>"
                                                                                style="width:200px;" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                            <th class="column-empty" width="1"
                                                                style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                            </th>
                                                            <th class="column" width="120"
                                                                style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                <table width="100%" cellspacing="0" cellpadding="0"
                                                                    style="width:300px;">
                                                                    <tr>
                                                                        <td class="text-header right"
                                                                            style="color:#000000; font-family:'Lato', Arial,sans-serif; font-size:12px; line-height:16px; text-align:right;">
                                                                            <span class="link"
                                                                                style="color:#000001; text-decoration:none;width:500px;">
                                                                                <span class="textoMarcado">Fundación
                                                                                    Magtel</span>
                                                                                <br />
                                                                                C/ Gabriel Ramos Bejarano 114
                                                                                <br />
                                                                                (Polígono Industrial “Las Quemadas”),
                                                                                14014 Córdoba
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="separator"
                                                                style="padding-top: 40px; border-bottom:4px solid #000000; font-size:0pt; line-height:0pt;">
                                                                &nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Header -->

                                        <!-- Intro -->
                                        <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tr>
                                                <td class="p30-15" style="padding: 30px 30px 70px 30px;">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="fluid-img pb40"
                                                                style="font-size:0pt; line-height:0pt; text-align:left; padding-bottom:40px;">
                                                                <?php
                                                                    $path = 'images/mailHeader.jpg';
                                                                    $type = pathinfo($path, PATHINFO_EXTENSION);
                                                                    $data = file_get_contents($path);
                                                                    $headerMail = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                                ?>
                                                                <img src="<?php echo $headerMail; ?>" width="590" height="300" alt="mailHeader" />      
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="h2 center pb10"
                                                                style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:30px; line-height:60px; text-align:center; padding-bottom:10px;">
                                                                {{ $mailMessage->saludo }}
                                                                <br />
                                                                <strong>
                                                                    {{ $mailMessage->body }}
                                                                </strong>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="h5 center blue pb30"
                                                                style="font-family:'Ubuntu', Arial,sans-serif; font-size:20px; line-height:26px; text-align:center; color:#064b98; padding-bottom:30px;">
                                                                {{ $mailMessage->dato }}
                                                            </td>
                                                        </tr>

                                                        <!-- Button -->
                                                        <tr>
                                                            <td align="center">
                                                                <table width="220" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tr>
                                                                        <td class="text-button"
                                                                            style="background:#01b6ed; color:#ffffff; font-family:'Lato', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px;">
                                                                            <a href="{{ route('home') }}"
                                                                                target="_blank" class="link-white"
                                                                                style="color:#ffffff; text-decoration:none;">
                                                                                <span class="link-white"
                                                                                    style="color:#ffffff; text-decoration:none;">
                                                                                    Acceder a la web
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!-- END Button -->
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fluid-img img-center pb70"
                                                    style="font-size:0pt; line-height:0pt; text-align:center;"><img
                                                        src="images/separator.jpg" width="590" height="1"
                                                        alt="separator" /></td>
                                            </tr>
                                        </table>
                                        <!-- END Intro -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-footer"
                                        style="padding-top: 30px; color:#9fadd4; font-family:'Lato', Arial,sans-serif; font-size:12px; line-height:22px; text-align:center;">
                                        Magtel &copy; All rights reserved
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- END Container -->
            </td>
        </tr>
    </table>
</body>

</html>
