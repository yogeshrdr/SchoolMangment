!function(){
    var config={Url:"https://voguepay.com/"},
        eventMethod=window.addEventListener?"addEventListener":"attachEvent",
        eventer=window[eventMethod],loadComplete=0,timeout=0,spindiv,error=0,
        messageEvent="attachEvent"==eventMethod?"onmessage":"message";
    function generateId(){
        var formID='vp_', characters="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for(var i=0;i<8;i++)
            formID+=characters.charAt(Math.floor(Math.random()*characters.length));
        return formID;
    }
    function isArray(value){return value.constructor===Array}
    function isInteger(number){var int=parseInt(number);return int==number && number >=0 }
    function isBoolean(val){ return typeof val === "boolean" }
    function isFunction(func){if(!func)return 0;var getType={};return func && "[object Function]" === getType.toString.call(func)}
    function hasData(script){var result=!1,list=script.attributes;list=Array.prototype.slice.call(list);for(key in list){var element=list[key].nodeName;element&&element.indexOf("data")>-1&&(result=!0)}return result}
    function parseBoolean(string) {  return (string.length==0)? null : ((string.toLowerCase()=='true')? true : false) }
    function parseObject(string){ try{return JSON.parse(string)}catch(err){return string}}
    function parseFunction(string){try{return eval(string)}catch(err){return string}}
    function setupSpinner(){
        var spin=config.Url+'css/voguepay.css', head=document.head,link=document.createElement('link');
        spindiv = document.createElement('div')
        for (var spinnercssloaded=0,ss = document.styleSheets,i = 0, max = ss.length; i < max; i++) {
            if (ss[i].href == spin)
                spinnercssloaded=1;
        }
        if(!spinnercssloaded) {
            link.type = "text/css"
            link.rel = "stylesheet",
                link.href = spin,
                head.appendChild(link);
        }
    }
    function loadSpinner(text)
    {
        if(text == void 0)text='Loading payment interface ... Please Wait ...';
        if(document.getElementById('vp-fading-circle') == void  0) {
            spindiv.id='vp-fading-circle';
            spindiv.innerHTML = '<div id="loader" class="loader loader-default is-active" data-text="'+text+'"></div>';
            document.body.appendChild(spindiv);
        }
        else
            document.getElementById('vp-fading-circle').innerHTML='<div id="loader" class="loader loader-default is-active" data-text="'+text+'"></div>';
 }
    function buildParamUrl(obj) {
      return Object.keys(obj).map(function (k) {
            return encodeURIComponent(k) + "=" + encodeURIComponent(obj[k])
        }).join("&")
    }
   function parseForm(formID)
    {
      form=document.getElementById(formID);
      if(!form) throw new Error("Cannot locate payment form");
      const formToJSON=elements=>[].reduce.call(elements,(data,element)=>
        {
            data[element.name]=element.value;
            return data;
        },{});
        var obj=formToJSON(form.elements);
        obj.form=formID;
        if(obj.recurrent)obj.recurrent=parseBoolean(obj.recurrent);
        if(obj.closed)obj.closed=parseFunction(obj.closed);
        if(obj.success)obj.success=parseFunction(obj.success);
        if(obj.failed)obj.failed=parseFunction(obj.failed);
        return obj;
    }
   function _payrequest(params){
        this.iframeLoaded=0,
        this.iframeOpen=0,
        this.params=params
        setupSpinner()
         if(!config.error){
          if(params.form === void 0) this.buildFrame()
         else this.handleFormSubmit(params.form);
       }
    }
    _payrequest.prototype.handleFormSubmit=function(formID){
        const SubmitEvent = event =>
        {
            event.preventDefault();
            this.params=parseForm(formID);
            this.params.id=generateId();
            this.params.webload=this.params.id;
            delete this.params['form'];
            this.buildFrame()
        }
        form=document.getElementById(formID);
        form.addEventListener('submit',SubmitEvent);


    }
   _payrequest.prototype.buildFrame=function(){
        loadSpinner(this.params.loadText)
        for(var elems=document.getElementsByTagName('div'),highest=0,i=0;i<elems.length;i++){
            var zindex=document.defaultView.getComputedStyle(elems[i],null).getPropertyValue("z-index");
            zindex>highest&&"auto"!=zindex&&(highest=zindex)
        }
        this.params.items == void 0?'':this.params.items=JSON.stringify(this.params.items);
        var arg=this.params, obj = JSON.parse(JSON.stringify(arg));
        var ignore=['loadText','form','success','failed','closed'];
        for (var i = 0; i < ignore.length; i++) delete obj[ignore[i]];
        var _url=(this.params.url)? this.params.url+'/id/'+this.params.id+'/webload/'+this.params.id: config.Url+"?p=pay&"+buildParamUrl(obj);
        this.iframe=document.createElement("iframe");
        this.iframe.setAttribute("frameBorder","0"),
            this.iframe.setAttribute("allowtransparency","true"),
            this.iframe.style.cssText="z-index: "+Math.max((10*parseInt(highest)),999999)+";display: none;background: transparent;background: rgba(0,0,0,0.005);border: 0px none transparent;overflow-x: hidden;overflow-y: hidden;visibility: hidden;margin: 0;padding: 0;n-webkit-tap-highlight-color: transparent;-webkit-touch-callout: none; position: fixed;left: 0;top: 0;width: 100%;height: 100%;",
            this.iframe.id=this.iframe.name=this.params.id,
            this.iframe.src=_url,
            this.iframe.onerror=function(){
            },
           document.body.appendChild(this.iframe),this.EventListen();
           window.setTimeout(function () {
               if(!config.loadComplete)
               {
                   var elems = document.getElementById("vp-fading-circle");
                   elems==void 0?'':elems.innerHTML='';
                   config.timeout=1;
               }
           },60000);
    },
        _payrequest.prototype.EventListen=function(){
            var pay=this;
            eventer(messageEvent,function(e){
                var data=e.data||e.message;
                if(data&&("string"==typeof data||data instanceof String)){
                    var data=JSON.parse(data);
                    if(data.id == void 0 || data.id!=pay.params.id) return false;
                    if("loaded"==data.action && !config.timeout) {
                        var elems = document.getElementById("vp-fading-circle");
                        elems==void 0?'':elems.innerHTML='';
                        var iframe = document.getElementById(pay.params.id);
                        iframe.style.display = "block",
                            iframe.style.visibility = "visible",
                            document.body.style.overflow = "hidden",
                            pay.iframeOpen = 1;
                            config.loadComplete=1;
                    }
                    if("closed"==data.action)pay.closeSignal(),pay.closeIframe()
                    if("success"==data.action&&pay.params.success) pay.params.success.call(this,data.reference);
                    if("failed"==data.action&&pay.params.failed) pay.params.failed.call(this,data.reference);
                }
            },0)
        },
    _payrequest.prototype.closeSignal=function(){ var pay=this; pay.params.closed&&pay.params.closed.call()};
    _payrequest.prototype.closeIframe=function() {
        if (this.iframeOpen) {
            var iframe = document.getElementById(this.params.id);
            iframe.style.display = "none",
                iframe.style.visibility = "hidden",
                this.iframeOpen = 0,
                document.body.style.overflow = ""
        }
     } ;
    var payWindow=function(){
        return{
            init:function(args){
                if(args.form!==void 0) args=parseForm(args.form);
                var frameid=generateId(),params={id:frameid,webload:frameid,loadText:args.loadText||'Loading payment interface ... Please Wait ...',v_merchant_id:args.v_merchant_id||"",phone:args.phone||"",email:args.email||"",total:args.total||0,notify_url:args.notify_url||"",cur:args.cur||"",merchant_ref:args.merchant_ref||"",memo:args.memo||"",recurrent:args.recurrent||null,frequency:args.frequency||0,developer_code:args.developer_code||"",store_id:args.store_id||"",items:args.items||{},success:args.success||null,failed:args.failed||null,closed:args.closed||null };
                if(args.form!==void 0) params.form=args.form;
                if(args.items !== void(0)&&!isArray(params.items)) {config.error=!0;alert("Items should be an array"); }
                if(args.success!=void 0&&!isFunction(params.success)) {config.error=!0;alert("Success function is invalid"); }
                if(args.failed!=void 0&&!isFunction(params.failed)) {config.error=!0;alert("Failed function is invalid"); }
                if(args.closed!=void 0&&!isFunction(params.closed)) {config.error=!0;alert("Closed function is invalid"); }
                if(params.items && !config.error)
                {
                    try {
                        count = 0;
                        params.items.forEach(function (element) {
                            count++;
                            params['item_' + count] = element.name;
                            params['description_' + count] = element.description;
                            params['price_' + count] = element.price;
                        });
                    }catch(err) {}
                    delete params['items'];
                }
               if(params.form&&!config.error)
               {
                    Object.keys(args).forEach(function(key) {
                       if (key.match(/^item.*$/)||key.match(/^description.*$/)||key.match(/^price.*$/)) params[key]=args[key];
                   });
               }
                <!--Browser compatible check -->
                var _tframe=document.createElement("iframe"),loadCall="onload" in _tframe;
                if(!loadCall){config.error=!0;alert("Iframe is not supported in this browser");}
                return new _payrequest(params)
               },
            link:function(param){
                param.id=generateId();
                param.webload=param.id;
                if(param.success!=void 0&&!isFunction(param.success)) {config.error=!0;alert("Success function is invalid"); }
                if(param.failed!=void 0&&!isFunction(param.failed)) {config.error=!0;alert("Failed function is invalid"); }
                if(param.closed!=void 0&&!isFunction(param.closed)) {config.error=!0;alert("Closed function is invalid"); }
                if(param.loadText==void 0) param.loadText='Loading payment interface ... Please Wait ...';
              <!--Browser compatible check -->
                var _tframe=document.createElement("iframe"),loadCall="onload" in _tframe;
                if(!loadCall){config.error=!0;alert("Iframe is not supported in this browser");}
                return new _payrequest(param)
            }

        }
    }(); window.Voguepay=payWindow;
    var source=document.currentScript||function(){var scripts=document.getElementsByTagName("script");return scripts[scripts.length-1]}();
    hasData(source)&&payWindow.init({v_merchant_id:source.getAttribute("data-v_merchant_id"),phone:source.getAttribute("data-phone"),email:source.getAttribute("data-email"),loadText:source.getAttribute("data-loadText"),total:source.getAttribute("data-total"),notify_url:source.getAttribute("data-notify_url"),cur:source.getAttribute("data-cur"),merchant_ref:source.getAttribute("data-merchant_ref"),memo:source.getAttribute("data-memo"),recurrent:parseBoolean(source.getAttribute("data-recurrent")),frequency:source.getAttribute("data-frequency"),developer_code:source.getAttribute("data-developer_code"),store_id:source.getAttribute("data-store_id"),items:parseObject(source.getAttribute("data-items")),closed:parseFunction(source.getAttribute("data-closed")),success:parseFunction(source.getAttribute("data-success")),failed:parseFunction(source.getAttribute("data-failed")) })
}();
