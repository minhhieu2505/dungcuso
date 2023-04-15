<HTML>

<HEAD>
    <TITLE>:: Thông Báo ::</TITLE>
    <base href="<?= $basehref ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="REFRESH" content="4.5; url=<?= $basehref . ADMIN . "/" . $page_transfer ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noodp,noindex,nofollow" />
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome611/all.css" />

    <style type="text/css">
        body {
            background: #eee
        }

        #alert {
            background: #fff;
            padding: 20px;
            margin: 30px auto;
            border-radius: 3px;
            -webkit-box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.3);
            -moz-box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.3);
            box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.3);
            margin-top: 100px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        #alert .fas {
            font-size: 60px;
        }

        #alert .rlink {
            margin: 10px 0px;
        }

        #alert .title {
            text-transform: uppercase;
            font-weight: bold;
            margin: 10px;
        }

        .fasuccess {
            color: #5cb85c;
        }

        .fadanger {
            color: #D9534F;
        }

        #process-bar {
            width: 0%;
            -webkit-transition: all 0.3s !important;
            transition: all 0.3s !important;
        }
    </style>
</HEAD>

<BODY>
    <div id="alert">
    <i class=""></i>
        <i class="<?= ($numb) ? 'fa-solid fa-badge-check fasuccess' : 'fa-exclamation-triangle fadanger' ?>"></i>
        <div class="title">Thông báo</div>
        <div class="message alert <?= ($numb) ? 'alert-success' : 'alert-danger' ?>"><?= @$showtext ?></div>
        <div class="rlink">(<a href="<?= ADMIN . "/" . $page_transfer ?>" >Click vào đây nếu không muốn đợi lâu</a>)</div>
        <div class="progress"><div id="process-bar" class="progress-bar progress-bar-striped progress-bar-<?= ($numb) ? 'success' : 'danger' ?> active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
    </div>
    <script type="text/javascript">
        var elem = document.getElementById("process-bar");
        var pos = 0;
        setInterval(function () {
            pos += 1;
            elem.style.width = pos + '%';
        }, 40);
    </script>
</BODY>

</HTML>