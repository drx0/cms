var site = {
  'int': {},
  'onload': {}
};


// FUNCTIONS
site.randomInteger = function(min, max) {rand = min + Math.random() * (max + 1 - min);return Math.floor(rand);}
site.time = function(){return Math.floor(new Date().getTime() / 1000);}
site.array_search = function(a,b,c){var c=!!c;for(var d in b)if(c&&b[d]===a||!c&&b[d]==a)return d;return!1}
site.explode = function(r,t){r=r.split(''),b=[];for(let e=n=0;e<t.length;e++)b[n]||(b[n]=''),!1!==site.array_search(t[e],r)?n++:b[n]+=t[e];return b}
site.implode = function(n,i){return i instanceof Array?i.join(n):i}
site.basename = function(path){parts = path.split('/');return parts[parts.length-1];}

site.getDate = function(t,e){if(e){var a=parseInt(e);if(a!=e)return!1;date=new Date(1e3*a)}else date=new Date;if(t.replace("d","")!=t){let e=date.getDate()+"";1==e.length&&(e="0"+e),t=t.replace(/d/g,e)}if(t.replace("m","")!=t){let e=date.getMonth()+1+"";1==e.length&&(e="0"+e),t=t.replace(/m/g,e)}if(t.replace("Y","")!=t&&(t=t.replace(/Y/g,date.getFullYear())),t.replace("H","")!=t){let e=date.getHours()+"";1==e.length&&(e="0"+e),t=t.replace(/H/g,e)}if(t.replace("i","")!=t){let e=date.getMinutes()+"";1==e.length&&(e="0"+e),t=t.replace(/i/g,e)}if(t.replace("s","")!=t){let e=date.getSeconds()+"";1==e.length&&(e="0"+e),t=t.replace(/s/g,e)}return t};

site.uasort = function(t,s){var i,p=[],h="",r=0,n={};for(h in"string"==typeof s?s=this[s]:"[object Array]"===Object.prototype.toString.call(s)&&(s=this[s[0]][s[1]]),this.php_js=this.php_js||{},this.php_js.ini=this.php_js.ini||{},n=(i=this.php_js.ini["phpjs.strictForIn"]&&this.php_js.ini["phpjs.strictForIn"].local_value&&"off"!==this.php_js.ini["phpjs.strictForIn"].local_value)?t:n,t)t.hasOwnProperty(h)&&(p.push([h,t[h]]),i&&delete t[h]);for(p.sort(function(t,i){return s(t[1],i[1])}),r=0;r<p.length;r++)n[p[r][0]]=p[r][1];return i||n}


// VARITABLES
site.months_names = ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'];
site.months_abr = ['Янв','Фев','Мар','Апр','Мая','Июнь','Июль','Авг','Сеня','Окт','Нояб','Дек'];
site.days_week = {'Mon':'Пн','Tue':'Вт','Wed':'Ср','Thu':'Чт','Fri':'Пт','Sat':'Сб','Sun':'Вс'};

site.slug = site.explode('/', window.location.pathname.replace(/(^\/*|\/*$)/g, '')).filter(a => a != '');
site.host = window.location.hostname;
site.protocol = window.location.protocol;
site.domain = site.protocol+"//"+site.host;
site.url_request = site.domain+'/post.php';
site.body = document.querySelector('body');


// text varitables
site.tmplIE = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 555.085 555.085" xml:space="preserve"><g><g><path d="M202.878,235.62h142.596v-62.424v-0.612c0-9.792-1.938-18.972-5.812-27.54 s-9.078-16.014-15.606-22.338c-6.525-6.324-14.074-11.322-22.644-14.994s-17.748-5.508-27.54-5.508s-18.972,1.836-27.54,5.508 s-16.116,8.772-22.644,15.3s-11.628,14.076-15.3,22.644s-5.508,17.748-5.508,27.54L202.878,235.62L202.878,235.62z  M511.939,235.62c5.304,0,9.791,1.836,13.464,5.508c3.672,3.672,5.508,8.16,5.508,13.464v281.521 c0,5.304-1.836,9.792-5.508,13.464c-3.673,3.672-8.16,5.508-13.464,5.508H43.146c-5.304,0-9.792-1.836-13.464-5.508 s-5.508-8.16-5.508-13.464V254.591c0-5.304,1.836-9.792,5.508-13.464s8.16-5.508,13.464-5.508h26.928h31.212v-62.423 c0-23.664,4.59-46.104,13.77-67.32s21.522-39.576,37.026-55.08s33.762-27.846,54.774-37.026S250.206,0,273.87,0 s46.104,4.59,67.32,13.77s39.573,21.522,55.077,37.026c15.507,15.504,27.849,33.864,37.026,55.08s13.771,43.656,13.771,67.32 v0.612v61.812h37.941L511.939,235.62L511.939,235.62z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
site.tmplIS = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.837 17.837" xml:space="preserve"><g><path d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27 c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0 L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';

site.msg_1 = 'Обновите страницу и повторите попытку';

site.fa_list_ul = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="596 -596 1792 1792" style="enable-background:new 596 -596 1792 1792;"><path d="M924,676c-37.3-37.3-82.7-56-136-56s-98.7,18.7-136,56c-37.3,37.3-56,82.7-56,136s18.7,98.7,56,136s82.7,56,136,56s98.7-18.7,136-56c37.3-37.3,56-82.7,56-136S961.3,713.3,924,676z M924,164c-37.3-37.3-82.7-56-136-56s-98.7,18.7-136,56s-56,82.7-56,136s18.7,98.7,56,136s82.7,56,136,56s98.7-18.7,136-56c37.3-37.3,56-82.7,56-136S961.3,201.3,924,164z M2378.5,693.5c-6.3-6.3-13.8-9.5-22.5-9.5H1140c-8.7,0-16.2,3.2-22.5,9.5c-6.3,6.3-9.5,13.8-9.5,22.5v192c0,8.7,3.2,16.2,9.5,22.5c6.3,6.3,13.8,9.5,22.5,9.5h1216c8.7,0,16.2-3.2,22.5-9.5c6.3-6.3,9.5-13.8,9.5-22.5V716C2388,707.3,2384.8,699.8,2378.5,693.5zM924-348c-37.3-37.3-82.7-56-136-56s-98.7,18.7-136,56s-56,82.7-56,136s18.7,98.7,56,136c37.3,37.3,82.7,56,136,56s98.7-18.7,136-56c37.3-37.3,56-82.7,56-136S961.3-310.7,924-348z M2378.5,181.5c-6.3-6.3-13.8-9.5-22.5-9.5H1140c-8.7,0-16.2,3.2-22.5,9.5c-6.3,6.3-9.5,13.8-9.5,22.5v192c0,8.7,3.2,16.2,9.5,22.5c6.3,6.3,13.8,9.5,22.5,9.5h1216c8.7,0,16.2-3.2,22.5-9.5c6.3-6.3,9.5-13.8,9.5-22.5V204C2388,195.3,2384.8,187.8,2378.5,181.5z M2378.5-330.5c-6.3-6.3-13.8-9.5-22.5-9.5H1140c-8.7,0-16.2,3.2-22.5,9.5c-6.3,6.3-9.5,13.8-9.5,22.5v192c0,8.7,3.2,16.2,9.5,22.5c6.3,6.3,13.8,9.5,22.5,9.5h1216c8.7,0,16.2-3.2,22.5-9.5c6.3-6.3,9.5-13.8,9.5-22.5v-192C2388-316.7,2384.8-324.2,2378.5-330.5z"/></svg>';
site.fa_angle_down = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="596 -596 1792 1792" style="enable-background:new 596 -596 1792 1792;"><path d="M1981,69l-50-50c-6.7-6.7-14.3-10-23-10c-8.7,0-16.3,3.3-23,10l-393,393L1099,19c-6.7-6.7-14.3-10-23-10s-16.3,3.3-23,10l-50,50c-6.7,6.7-10,14.3-10,23s3.3,16.3,10,23l466,466c6.7,6.7,14.3,10,23,10c8.7,0,16.3-3.3,23-10l466-466c6.7-6.7,10-14.3,10-23 S1987.7,75.7,1981,69z"/></svg>';


// FUNCTIONS
site.rus_to_latin = function(str){
    var ru = {"а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ё":"yo","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"shch","ы":"y","э":"ye","ю":"yu","я":"ya"},
        n_str = [];
    str = str.trim().toLowerCase().replace(/[ъь]+/g, '').replace(/\s{2,}/g, ' ').replace(/[!@#\$%\^&\*\(\)\\\/\.,><?"';:№\-—+]/g, '').replace(/\s/g, '-');
    for(i=0;i<str.length;i++){
        n_str.push(ru[str[i]] || ru[str[i]] == undefined && str[i] || ru[str[i]]);
    }
    return n_str.join('');
}


// DES NUMBER
site.des_number = function(num, r){
  num = (num+'').split('');
  c = 0;
  for(let i=num.length;i>=0;i--){
    if(c == 3 && i>0){
      c = 0;
      num[i] = ' '+num[i];
    }
    c++;
  }
  return site.implode('', num)+(r ? ' руб.' : '');
}


// n to br
site.n_to_br = function(str){
  if(!str){
    return '';
  }
  return str.replace("\n", '<br/>');
}


// LINK
site.link = {
  'init': function(){
    site.body.insertAdjacentHTML('beforeend', '<a href="" target="_blank" class="noll" id="to_link_a"></a>');
    site.link.a = document.querySelector('#to_link_a');
    return true;
  },
  'to': function(link){
    site.link.a.setAttribute('href', link);
    site.link.a.click();
  }
};


// IF HOLYDAYS
site.if_holidays = function(val){
  let ex = site.explode('-', val),
		date_this_text = new Date(val)+'',
		day_week = site.explode(' ', date_this_text)[0],
		holiday_key = 'events_weekday';
	if(site.array_search(day_week, ['Sat','Sun']) !== false){
		holiday_key = 'events_weekends';
	}else{
		let bb, aa, key, holiday;
		for ([key, holiday] of Object.entries(window.allHolidays)){
			bb = site.explode('-', holiday['before']);
			aa = site.explode('-', holiday['after']);

      // if date
      let ex_bb = false,
          ex_aa = false;

      if(bb[0] < aa[0]){
          if(ex[1] == bb[1]){
              if(ex[2] >= bb[2]){
                  ex_bb = true;
              }
          }else if(ex[1] < bb[1]){
              ex_bb = true;
          }
          if(ex[1] == aa[1]){
              if(ex[2] <= aa[2]){
                  ex_aa = true;
              }
          }else if(ex[1] < aa[1]){
              ex_aa = true;
          }else if(ex_bb){
              if(ex[1] == bb[1]){
                  if(ex[2] >= bb[2]){
                    ex_aa = true;
                  }
              }else if(ex[1] > bb[1]){
                  ex_aa = true;
              }
          }
      }else{
          if(ex[1] == bb[1]){
              if(ex[2] >= bb[2]){
                  ex_bb = true;
              }
          }else if(ex[1] > bb[1]){
              ex_bb = true;
          }
          if(ex[1] == aa[1]){
              if(ex[2] <= aa[2]){
                  ex_aa = true;
              }
          }else if(ex[1] < aa[1]){
              ex_aa = true;
          }
      }
      if(ex_bb && ex_aa){
        holiday_key = 'events_weekends';
      }
      // end if date

		}
	}

	return holiday_key;
}


// CLASS
site.class = {
    'add': function(el, cl){
        el.setAttribute('class', site.class.clear(el, cl)+' '+cl);
        return 0;
    },
    'remove': function(el, cl){
        el.setAttribute('class', site.class.clear(el, cl));
        return 0;
    },
    'clear': function(el, cl){
        var a = el.getAttribute('class');
        if(!a){
            return '';
        }
        var reg = new RegExp('\s*'+cl+'\s*');
        return el.getAttribute('class').replace(reg, '').replace(/\s\s/g, ' ').trim();
    }
};


// VALUE
site.val = function(el, val){
    el.setAttribute('value', val);
    el.value = val;
}


// COOKIES
site.cookies = {
    'get': function(cookiename = false){
        if(cookiename){
            return site.cookies.get()[cookiename];
        }else{
            var arr = {},
            cookies = site.explode(';', document.cookie), i, z;
            for(i=0;i<cookies.length;i++){
                z = site.explode('=', cookies[i].trim());
                arr[z[0]] = z[1];
            }
            return arr;
        }
    },
    'delete': function(name){
        document.cookie = name+'=0;path=/;domain=.'+site.host+';expires=Thu, 01 Jan 1970 00:00:01 GMT';
        return 0;
    },
    'set': function(name, value, t = 86400*30){
        site.cookies.delete(name);
        var date = new Date(Date.now() + (t*1000)).toUTCString();
        document.cookie = name+'='+value+';path=/;domain='+site.host+';expires='+date;
        return 0;
    }
};


// EVENTS
site.events = {
    'data': [],
  // 'input', 'keypress', 'keydown', 'keyup', 'resize', 'scroll', 'cut', 'copy', 'paste', 'mousedown', 'mouseup', 'mouseleave', 'mousemove', 'mouseout'
    'list': ['submit', 'click', 'keyup', 'change', 'input', 'cut', 'copy', 'paste', 'mousemove'],
    'init': function(){
      for(let i=0;i<site.events.list.length;i++) {
        site.events.data[site.events.list[i]] = [];
        site.body.addEventListener(site.events.list[i], function(e){
          var i2, s, reserve, find, i3, q, i4, search, ex, i5, func;
          for(let i2=0;i2<site.events.data[site.events.list[i]].length;i2++){
            s = site.explode(' ', site.events.data[site.events.list[i]][i2][0]);
            reserve = e['path'].length-1;
            find = 0;
            for(let i3=0;i3<s.length;i3++){
              q = document.querySelectorAll(s[i3]);
              for(let i4=reserve;i4>=0;i4--){
                reserve = i4;
                search = site.array_search(e['path'][i4], q);
                if(search !== false){
                  find++;
                  break;
                }
              }
            }
            //  && reserve == 0
            if(s.length == find){
              ex = site.explode('/', site.events.data[site.events.list[i]][i2][1]);
              func = window;
              for(i5=0;i5<ex.length;i5++){
                func = func[ex[i5]];
                if(!func){
                  break;
                }
              }
              if(func){
                func(e['path'][reserve], e);
              }
            }
          }
          if('submit' == site.events.list[i]){
            e.preventDefault();
          }
        });
      }
      return true;
    }
};
// site.events.data.submit.push(['a[href*="#"]', 'site/scroll/click']);


// GET PARAMS
site.get_params = {
    'data': {},
    'arr': site.explode('&', window.location.search.replace(/^\?/, '').trim()),
    'init': function(){
        site.get_params.reverse(0);
        return true;
    },
    'reverse': function(i){
        if(i < site.get_params.arr.length){
            var a = site.explode('=', site.get_params.arr[i]);
            site.get_params.data[a[0].trim()] = a[1].trim();
            site.get_params.reverse(i+1);
        }else{
            site.get_params.arr = null;
        }
        return 0;
    }
};


// REQUEST
site.request = {
    'data': [],
    'power': false,
    'run': function(){
        if(site.request.power || site.request.data.length == 0){
          return false;
        }
        site.request.power = true;
        
        // Method, Form, Type, Callback
        var Data = site.request.data[0];
        
        if(Data[2] == 'FORM'){
            var type = 'multipart/form-data';
            var formData = new FormData(Data[1]);
        }else{
            var type = 'application/x-www-form-urlencoded';
            var formData = new URLSearchParams(Data[1]).toString();
        }
        var request = new XMLHttpRequest();
        request.open(Data[0], site.url_request, true);
        request.setRequestHeader('Content-type', type);
        request.send(formData);
        request.addEventListener('readystatechange', function(){
            if(request.readyState === 4){
                if(request.status === 200){
                    Data[3](request.response);
                }else{
                    Data[3]('error-load');
                }
                site.request.data.splice(0, 1);
                site.request.power = false;
                site.request.run();
            }
        });
    }
};
// site.request.data.push(['POST', File, Form, Type, function(result){}]);
// site.request.run();


// Forms
site.form_request = {
  'init': function(){
    site.events.data.submit.push(['form.Request', 'site/form_request/send']);
    return true;
  },
  'send': function(el, e){
    site.form_request.btn = el.querySelector('[type="submit"]');
    site.form_request.btn.disabled = true;
    site.form_request.callback = el.getAttribute('data-callback');
    site.request.data.push(['POST', el, 'FORM', function(result){
        site[site.form_request.callback](result);
        setTimeout('site.form_request.btn.disabled = false;', 2000);
        delete(result);
    }]);
    site.request.run();
  },
  'btn': false,
  'callback': false
};



// Modal
site.modal = {
  'init': function(){
    site.body.insertAdjacentHTML('beforeend', '<div class="modal1" id="Modal">\
      <div class="modal2 ModalClose"></div>\
      <div class="modal3">\
        <button class="modal4 ModalClose" type="button">×</button>\
        <div class="modal5" id="Content"></div>\
      </div>\
    </div>');
    site.events.data.click.push(['.openModal', 'site/modal/open']);
    site.events.data.click.push(['.ModalClose', 'site/modal/close']);
    site.modal.el = document.querySelector('#Modal');
    return true;
  },
  'el': false,
  'open': function(el, e){
    // modal
    var modal_type = el.getAttribute('data-type');
    if(modal_type == null){
      return false;
    }
    var modal_el = document.querySelector('#Modal');
    if(modal_el == null){
      return false;
    }
    // content
    var in_content_el = document.querySelector('.ModalContents[data-type="'+modal_type+'"]');
    if(in_content_el == null){
      return false;
    }
    var modal_content_el = modal_el.querySelector('#Content');
    if(modal_content_el == null){
      return false;
    }
    modal_el.querySelector('#Content').innerHTML = in_content_el.innerHTML;
    // width
    var modal_width = in_content_el.getAttribute('data-max-width');
    modal_width = parseInt(modal_width);
    var modal_3 = modal_el.querySelector('.modal3');
    modal_3.setAttribute('style', 'max-width: '+modal_width+'px;');
    // func
    modal_func = site['modal-func-'+modal_type];
    if(typeof modal_func == 'function'){
      modal_func(el, modal_content_el);
    }
    // animate
    modal_el.style.display = 'block';
    setTimeout(function(){
      modal_el.style.opacity = '1';
    }, 10);
  },
  'close': function(el, e){
    delete(el, e);
    site.modal.el.style.opacity = '0';
    setTimeout("site.modal.el.style.display = 'none';", 400);
  }
};




// Notify
site.notify = {
  'open': function(type, msg){
    // data
    al = document.querySelector('.notify36');
    site.class.add(al, type);
    elI = document.querySelector('.notify37');
    if(type == 'error'){
      elI.innerHTML = site.tmplIE;
      t = 'Ошибка';
      site.class.remove(al, 'success');
    }else{
      elI.innerHTML = site.tmplIS;
      t = 'Успешно';
      site.class.remove(al, 'error');
    }
    b = document.querySelector('#notifyC');
    if(type == '' || type == 'text') site.class.add(al, 'none');
    else site.class.remove(al, 'none');
    if(type == ''){
      site.class.remove(al, 'error');
      site.class.remove(al, 'success');
      b.innerHTML = msg;
    }else{
      b.innerHTML = '<p class="notify38">'+msg+'</p>';
    }
    document.querySelector('.notify36 p').innerHTML = t;
    // animate
    el = document.querySelector('.notify');
    el.style.display = 'block';
    setTimeout("el.style.opacity = '1';", 10);
  },
  'init': function(){
    site.body.insertAdjacentHTML('beforeend', '<div class="notify32 notify">\
        <div class="notify33"></div>\
        <div class="notify34">\
            <button class="notify35 notifyClose" type="button">×</button>\
            <div class="notify36 error">\
                <div class="notify37"></div>\
                <p></p>\
            </div>\
            <div id="notifyC"></div>\
            <div class="notify39">\
                <button class="notifyClose" type="button">Закрыть</button>\
            </div>\
        </div>\
    </div>');
    site.notify.el = document.querySelector('.notify');
    site.events.data.click.push(['.notifyClose', 'site/notify/close']);
    return true;
  },
  'close': function(el, e){
    delete(el, e);
    site.notify.el.style.opacity = '0';
    setTimeout("site.notify.el.style.display = 'none';", 400);
  },
  'el': false
};
// site.notify.open('success', '')
// site.notify.open('error', '')


site.block_click = {
  'el': document.querySelector('#blockClick'),
  'on': function(){
    site.class.remove(window.blockClick, 'none');
    return false;
  },
  'off': function(){
    site.class.add(window.blockClick, 'none');
    return false;
  }
};


// Callback Login
site.callback_login = function(result){
    var type = 'error', text;
    if(result == 'success'){
      type = result;
      text = 'Авторизация успешно пройдена, перенаправление...';
      setTimeout('window.location.href = "/'+site.slug[0]+'";', 1500);
    }else if(result == 'access'){
      text = 'Неверный логин или пароль';
    }else{
      text = 'Ошибка авторизации. '+site.msg_1;
    }
    delete(result);
    site.notify.open(type, text);
    return false;
}

// Callback RecoverySend
site.callback_recovery_send = function(result){
    var type = 'error', text;
    try{
        var obj = JSON.parse(result);
        delete(result);
        if(obj['result'] == 'success'){
            type = 'success';
            text = 'Письмо успешно отправлено. Перенаправление...';
            setTimeout('window.location.href = "/'+site.slug[0]+'";', 1500);
        }else if(obj['result'] == 'format-email'){
            text = 'Неверный формат E-mail (почты)';
        }else if(obj['result'] == 'not-email'){
            text = 'E-mail (почта) не зарегистрирована';
        }else if(obj['result'] == 'error-time'){
            text = 'Вы уже недавно запрашивали письмо. Повторное письмо доступно через: '+obj['time'];
        }else{
            text = 'Письмо не отправлено. '+site.msg_1;
        }
    }catch(err){
        text = 'Письмо не отправлено. '+site.msg_1;
    }
    site.notify.open(type, text);
    return false;
}







// onLoad
site.onload_functions = ['link', 'events', 'get_params', 'form_request', 'modal', 'notify'];
site.int.load = setInterval(function(){
  if(document.readyState == 'complete'){
    clearInterval(site.int.load);
    let name;
    for(let i=0;i<site.onload_functions.length;i++){
      name = site.onload_functions[i];
      site.onload[name] = site[name].init();
    }
    delete(name);
  }
}, 250);