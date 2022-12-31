var site = {};
site.explode = function(t,o){return 2!=arguments.length||void 0===arguments[0]||void 0===o?null:''!==t&&!1!==t&&null!==t&&('function'==typeof t||'object'==typeof t||'function'==typeof o||'object'==typeof o?{0:''}:(!0===t&&(t='1'),o.toString().split(t.toString())))}
site.slug = site.explode("/", window.location.pathname.replace(/(^\/*|\/*$)/g, "")).filter(function(a){return a != ''});
if(!site.slug[1]){
    window.close();
}else{
    site.url = '';
    try{
        site.url = decodeURIComponent(atob(site.slug[1]));
    }catch(err){}
    console.log(site.url);
    if(site.url == ''){
        window.location.href = '/';
    }else{
        document.querySelector('#url').innerHTML = site.slug[1];
        setTimeout('window.location.href = "'+site.url+'"', 3000);
    }
}