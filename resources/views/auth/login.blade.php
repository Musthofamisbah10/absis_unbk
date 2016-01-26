<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login UNBK SMAN 3 Semarang</title>

<link rel="stylesheet" media="screen" href="assets/css/reset.css" />
<link rel="stylesheet" media="screen" href="assets/css/style.css" />
<link rel="stylesheet" media="screen" href="assets/css/messages.css" />
<link rel="stylesheet" media="screen" href="assets/css/forms.css" />
<link rel="stylesheet" media="screen" href="assets/css/tables.css" />

<style type="text/css">
    
    .login-hd-sub{
        text-align: center;
        color: white;
        margin-bottom: 10px;
        font-size: 140%;
    }

</style>

<!-- jquerytools -->
<script src="http://minites.puspendik.org/ujian/themes/xtremadmin/js/jquery.tools.min.js"></script>


<script>
$(document).ready(function(){
    $("#form").validator({
        position: 'top',
        offset: [25, 10],
        messageClass:'form-error',
        message: '<div><em/></div>' // em element is the arrow
    });
});
</script>

<script src="http://minites.puspendik.org/ujian/3rdparty/timezone/jstz.min.js "></script>
<script type="text/javascript">
    $(document).ready(function(){
        var tz = jstz.determine(); // Determines the time zone of the browser client
        var timezone = tz.name(); //'Asia/Kolhata' for Indian Time.
        $.post("http://minites.puspendik.org/ujian/index.php/welcome/ajax_time", {tz: timezone}, function(data) {

        });
    });
</script>

</head>
<body class="login">
    <div class="login-box">
        <div class="login-box-top">
            <div class="login-logo">&nbsp;</div>        
            <div class="login-hd">Login Tryout Ujian Nasional</div>
            <div class="login-hd-sub">SMAN 3 SEMARANG</div>
            <div class="message info">Masukan nama pengguna dan kata sandi anda : </div>
            <form role="form" method="POST" action="{{ url('/login') }}">
                <p>
                    <label for="username">Nama Pengguna: *</label><br/>
                    <input type="type" class="form-control full" name="username" value="{{ old('username') }}">
                </p>
                <p>
                    <label for="password">Sandi: *</label><br/>
                    <input type="password" class="form-control full" name="password">
                </p>
                <div class="pesan-error">
                    {!! csrf_field() !!}

                    @if ($errors->has('username'))
                        <span>
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif

                    @if ($errors->has('password'))
                        <span>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <br/>
                </div>
                <p>
                    <button class="button button-gray" type="submit">Masuk</button>
                </p>
            </form>
            <div id="linebreak"></div>
            <ul><li><strong>Bantuan:</strong><span>Silahkan hubungi admin sekolah anda</span> </li></ul>
        </div>
    </div>
</body>
</html>
