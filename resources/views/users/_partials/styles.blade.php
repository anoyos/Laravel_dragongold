<script>
        var app = {
            csrfToken: 'U9Dfp3uSUKL68pof01A7jsGlneKEKhmHsaVmXwbP',
            wsURL: 'wss://wsvqw6ulh5.{{config('app.domain')}}',
            wsData: 'eyJ1IjoiZXlKcGRpSTZJbmhMUmpGYVZHMU1jbTFTUlhoY0wyZHFVRTU1V21KQlBUMGlMQ0oyWVd4MVpTSTZJbTV0TTBjNU4wTmtkM2wwUkZwdWN6SmNMMWRXU2poM1BUMGlMQ0p0WVdNaU9pSmxOemt5TkdZeVkyRm1aV1V6WWpabU5ESXdabUZoWkRJd1ptVmlNREE1WlRrMlpXTTVNekF3WTJWaE5tSXdOemRoTW1KaFpXTmtaamxsWkRBNFl6SmlJbjA9IiwidCI6ImV5SnBkaUk2SW5wU1JYQTNlV0p4UkRJeFJVWjFPV3hQVUZkeFZHYzlQU0lzSW5aaGJIVmxJam9pY0ZGV2EydHJjRXhQWVV0amJHUlBkbUZTZEdGR1kyNVBUMEpSWTIxamVGazFka05oT1VSVFluUnJObkZhZGxSS2VtWlBNWGR2ZFRoTU1ubFRUbWtySzFoY0wybFFSemhjTDBOb2QxTTVibGxrTTBkRWJsQjRPVlJXUW1oT1Z6WllZbTFETVRsM1RYZzNZMHRLWnowaUxDSnRZV01pT2lJM1pUWTJZekl6T0RSaFlqUTBZbVF4TURkaVpEVTRZVEl5TW1SaU16VmlaV0U0TXpKalpqUmlOelJoTldVMU16UmtNRFF3WkRNM05HRmlZVEppWTJFNUluMD0iLCJ1MiI6IjFiZDg4Y2QzNmUzM2RiNDAzYmY5MmI1MThlM2QyNjRlMzBlZmU3NDE5YzlkMWRhNzM2NjlhMTY2ZDM2MGMwZGUiLCJ0MiI6ImI2YTFhY2I4NzE4YzY0MWRiOGUxMjgzM2ZmOTcyYWFjYWJmOWViYzg1Zjc1MzMyZDU1NWNjNDViYTcxNmI0YjAifQ==',
            user: '{{Auth::id()}}'
         };
    </script>
    <script type="text/javascript">
    var Ziggy = {
        namedRoutes: {"api:office:payments.deposit.create":{"uri":"api\/deposit","methods":["POST"],"domain":"{{config('app.domain')}}"},"api:office:payments.withdraw.create":{"uri":"api\/withdraw","methods":["POST"],"domain":"{{config('app.domain')}}"},"api:office:payments.deposit.cancel":{"uri":"api\/deposit\/{id}\/cancel","methods":["POST"],"domain":"{{config('app.domain')}}"},"api:office:payments.deposit.list":{"uri":"api\/deposit\/list","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:payments.withdraw.list":{"uri":"api\/withdraw\/list","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:transactions.list":{"uri":"api\/transactions","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:support.tickets.list":{"uri":"api\/support\/tickets","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:support.tickets.create":{"uri":"api\/support\/tickets\/create","methods":["POST"],"domain":"{{config('app.domain')}}"},"api:office:affiliates.team.summary":{"uri":"api\/affiliates\/team\/summary\/{group}","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:affiliates.team.list":{"uri":"api\/affiliates\/team\/list\/{level}","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"},"api:office:statistics.trades_history":{"uri":"api\/statistics\/trades-history","methods":["GET","HEAD"],"domain":"{{config('app.domain')}}"}},
        baseUrl: '{{config("app.url")}}',
        baseProtocol: 'http',
        baseDomain: '{{config("app.domain")}}',
        basePort: false,
        defaultParameters: []
    };

    !function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define("route",[],t):"object"==typeof exports?exports.route=t():e.route=t()}(this,function(){return function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}return r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=0)}([function(e,t,r){"use strict";r.r(t);var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,r,n){return r&&e(t.prototype,r),n&&e(t,n),t}}(),o=function(){function e(t,r,n){if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.name=t,this.ziggy=n,this.route=this.ziggy.namedRoutes[this.name],void 0===this.name)throw new Error("Ziggy Error: You must provide a route name");if(void 0===this.route)throw new Error("Ziggy Error: route '"+this.name+"' is not found in the route list");this.absolute=void 0===r||r,this.domain=this.setDomain(),this.path=this.route.uri.replace(/^\//,"")}return n(e,[{key:"setDomain",value:function(){if(!this.absolute)return"/";if(!this.route.domain)return this.ziggy.baseUrl.replace(/\/?$/,"/");var e=(this.route.domain||this.ziggy.baseDomain).replace(/\/+$/,"");return this.ziggy.basePort&&e.replace(/\/+$/,"")===this.ziggy.baseDomain.replace(/\/+$/,"")&&(e=this.ziggy.baseDomain+":"+this.ziggy.basePort),this.ziggy.baseProtocol+"://"+e+"/"}},{key:"construct",value:function(){return this.domain+this.path}}]),e}();r.d(t,"default",function(){return c});var i=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,r,n){return r&&e(t.prototype,r),n&&e(t,n),t}}(),s=function(e){function t(e,r,n){var i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);var u=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return u.name=e,u.absolute=n,u.ziggy=i||Ziggy,u.template=u.name?new o(e,n,u.ziggy).construct():"",u.urlParams=u.normalizeParams(r),u.queryParams=u.normalizeParams(r),u}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,String),a(t,[{key:"normalizeParams",value:function(e){return void 0===e?{}:((e="object"!==(void 0===e?"undefined":u(e))?[e]:e).hasOwnProperty("id")&&-1==this.template.indexOf("{id}")&&(e=[e.id]),this.numericParamIndices=Array.isArray(e),i({},e))}},{key:"with",value:function(e){return this.urlParams=this.normalizeParams(e),this}},{key:"withQuery",value:function(e){return i(this.queryParams,e),this}},{key:"hydrateUrl",value:function(){var e=this,t=this.urlParams,r=0,n=this.template.match(/{([^}]+)}/gi),o=!1;return n&&n.length!=Object.keys(t).length&&(o=!0),this.template.replace(/{([^}]+)}/gi,function(n,i){var u=n.replace(/\{|\}/gi,"").replace(/\?$/,""),a=e.numericParamIndices?r:u,s=e.ziggy.defaultParameters[u];if(s&&o&&(e.numericParamIndices?(t=Object.values(t)).splice(a,0,s):t[a]=s),r++,void 0!==t[a])return delete e.queryParams[a],t[a].id||encodeURIComponent(t[a]);if(-1===n.indexOf("?"))throw new Error("Ziggy Error: '"+u+"' key is required for route '"+e.name+"'");return""})}},{key:"matchUrl",value:function(){this.urlParams;var e=window.location.hostname+(window.location.port?":"+window.location.port:"")+window.location.pathname,t=this.template.replace(/(\{[^\}]*\})/gi,"[^/?]+").split("://")[1],r=e.replace(/\/?$/,"/");return new RegExp("^"+t+"/$").test(r)}},{key:"constructQuery",value:function(){if(0===Object.keys(this.queryParams).length)return"";var e="?";return Object.keys(this.queryParams).forEach(function(t,r){void 0!==this.queryParams[t]&&null!==this.queryParams[t]&&(e=0===r?e:e+"&",e+=t+"="+encodeURIComponent(this.queryParams[t]))}.bind(this)),e}},{key:"current",value:function(){var e=this,r=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,n=Object.keys(this.ziggy.namedRoutes).filter(function(r){return-1!==e.ziggy.namedRoutes[r].methods.indexOf("GET")&&new t(r,void 0,void 0,e.ziggy).matchUrl()})[0];return r?new RegExp(r.replace("*",".*").replace(".","."),"i").test(n):n}},{key:"parse",value:function(){this.return=this.hydrateUrl()+this.constructQuery()}},{key:"url",value:function(){return this.parse(),this.return}},{key:"toString",value:function(){return this.url()}},{key:"valueOf",value:function(){return this.url()}}]),t}();function c(e,t,r,n){return new s(e,t,r,n)}}]).default});
</script>

{{-- <style type="text/css">
    .vue-simple-spinner{transition:all .3s linear}@keyframes vue-simple-spinner-spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}
</style> --}}
{{-- <style type="text/css">
    .vue-slider-dot{position:absolute;will-change:transform;-webkit-transition:all 0s;transition:all 0s;z-index:5}.vue-slider-dot-tooltip{position:absolute;visibility:hidden}.vue-slider-dot-tooltip-show{visibility:visible}.vue-slider-dot-tooltip-top{top:-10px;left:50%;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}.vue-slider-dot-tooltip-bottom{bottom:-10px;left:50%;-webkit-transform:translate(-50%,100%);transform:translate(-50%,100%)}.vue-slider-dot-tooltip-left{left:-10px;top:50%;-webkit-transform:translate(-100%,-50%);transform:translate(-100%,-50%)}.vue-slider-dot-tooltip-right{right:-10px;top:50%;-webkit-transform:translate(100%,-50%);transform:translate(100%,-50%)}</style><style type="text/css">.vue-slider-marks{position:relative;width:100%;height:100%}.vue-slider-mark{position:absolute;z-index:1}.vue-slider-ltr .vue-slider-mark,.vue-slider-rtl .vue-slider-mark{width:0;height:100%;top:50%}.vue-slider-ltr .vue-slider-mark-step,.vue-slider-rtl .vue-slider-mark-step{top:0}.vue-slider-ltr .vue-slider-mark-label,.vue-slider-rtl .vue-slider-mark-label{top:100%;margin-top:10px}.vue-slider-ltr .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ltr .vue-slider-mark-step{left:0}.vue-slider-ltr .vue-slider-mark-label{left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.vue-slider-rtl .vue-slider-mark{-webkit-transform:translate(50%,-50%);transform:translate(50%,-50%)}.vue-slider-rtl .vue-slider-mark-step{right:0}.vue-slider-rtl .vue-slider-mark-label{right:50%;-webkit-transform:translateX(50%);transform:translateX(50%)}.vue-slider-btt .vue-slider-mark,.vue-slider-ttb .vue-slider-mark{width:100%;height:0;left:50%}.vue-slider-btt .vue-slider-mark-step,.vue-slider-ttb .vue-slider-mark-step{left:0}.vue-slider-btt .vue-slider-mark-label,.vue-slider-ttb .vue-slider-mark-label{left:100%;margin-left:10px}.vue-slider-btt .vue-slider-mark{-webkit-transform:translate(-50%,50%);transform:translate(-50%,50%)}.vue-slider-btt .vue-slider-mark-step{top:0}.vue-slider-btt .vue-slider-mark-label{top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%)}.vue-slider-ttb .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ttb .vue-slider-mark-step{bottom:0}.vue-slider-ttb .vue-slider-mark-label{bottom:50%;-webkit-transform:translateY(50%);transform:translateY(50%)}.vue-slider-mark-label,.vue-slider-mark-step{position:absolute}</style><style type="text/css">.vue-slider{position:relative;-webkit-box-sizing:content-box;box-sizing:content-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;display:block;-ms-touch-action:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}.vue-slider-disabled{pointer-events:none}.vue-slider-rail{position:relative;width:100%;height:100%;-webkit-transition-property:width,height,left,right,top,bottom;transition-property:width,height,left,right,top,bottom}.vue-slider-process{position:absolute;z-index:1}.vue-slider-sr-only{clip:rect(1px,1px,1px,1px);height:1px;width:1px;overflow:hidden;position:absolute!important}</style><style type="text/css">@-webkit-keyframes player_marque-data-v-461c6fa3{0%{-webkit-transform:translate(0, 0);transform:translate(0, 0)}100%{-webkit-transform:translate(-100%, 0);transform:translate(-100%, 0)}}@keyframes player_marque-data-v-461c6fa3{0%{-webkit-transform:translate(0, 0);transform:translate(0, 0)}100%{-webkit-transform:translate(-100%, 0);transform:translate(-100%, 0)}}.audio_player[data-v-461c6fa3]{display:flex;position:relative;z-index:2;width:100%;font-size:11px;line-height:1;font-family:'Roboto-Light'}.audio_player-loading .audio_player-song .actions .next[data-v-461c6fa3],.audio_player-loading .audio_player-song .actions .prev[data-v-461c6fa3]{cursor:default}.audio_player-loading .audio_player-song .actions .next i[data-v-461c6fa3],.audio_player-loading .audio_player-song .actions .prev i[data-v-461c6fa3]{color:#ccd2da}.audio_player[data-v-461c6fa3] .vue-slider{padding:0 !important}.audio_player[data-v-461c6fa3] .vue-slider .vue-slider-rail{background-color:#a4b3c5;cursor:pointer;overflow:hidden}.audio_player[data-v-461c6fa3] .vue-slider .vue-slider-rail .vue-slider-process{background-color:#e50000;transition:width 1s linear}.audio_player[data-v-461c6fa3] .vue-slider .vue-slider-rail:hover .vue-slider-process{background-color:#e50000}.audio_player[data-v-461c6fa3] .vue-slider .vue-slider-rail .vue-slider-dot{display:none}.audio_player-song[data-v-461c6fa3]{display:flex;align-items:center;justify-content:space-between;width:100%;height:100%;padding:10px 0}.audio_player-song-info[data-v-461c6fa3]{display:block;position:relative;max-width:300px;min-width:300px;height:28px;width:100%}.audio_player-song-info .title-wrapper[data-v-461c6fa3]{position:absolute;left:45px;height:11px;width:calc(100% - 90px);overflow:hidden;color:#a4b3c5;white-space:nowrap}.audio_player-song-info .title-wrapper .title[data-v-461c6fa3]{position:absolute;display:flex;height:100%;padding-left:105%;-webkit-animation:player_marque-data-v-461c6fa3 10s infinite linear;animation:player_marque-data-v-461c6fa3 10s infinite linear}.audio_player-song-info .title-wrapper:hover .title[data-v-461c6fa3]{-webkit-animation-play-state:paused;animation-play-state:paused}.audio_player-song-info .timestamps[data-v-461c6fa3]{width:100%;min-height:11px;display:flex;justify-content:space-between;color:#a4b3c5}@media (max-width: 640px){.audio_player-song-info[data-v-461c6fa3]{max-width:100%;min-width:200px}}.audio_player-song .actions[data-v-461c6fa3]{display:flex;align-items:center;width:100%;padding-left:20px;padding-top:2px}.audio_player-song .actions .next[data-v-461c6fa3],.audio_player-song .actions .prev[data-v-461c6fa3]{cursor:pointer}.audio_player-song .actions .play[data-v-461c6fa3]{display:inline-block}.audio_player-song .actions i[data-v-461c6fa3]{font-size:18px;-webkit-transform:translateY(2px);transform:translateY(2px);color:#a4b3c5;transition:.1s}.audio_player-song .actions i[data-v-461c6fa3]:hover{color:#888}@media (max-width: 640px){.audio_player-song .actions[data-v-461c6fa3]{padding-left:0}}@media (max-width: 640px){.audio_player-song[data-v-461c6fa3]{flex-wrap:wrap;max-width:300px;margin:0 auto}}.audio_player .progress_slider_wrapper[data-v-461c6fa3]{position:relative;padding:5px 0}.audio_player .progress_slider_wrapper .progress_slider_block[data-v-461c6fa3]{height:100%;width:100%;position:absolute;top:0;left:0;z-index:10}.audio_player .progress_slider_wrapper[data-v-461c6fa3] .progress_slider{height:6px !important}.audio_player .progress_slider_wrapper[data-v-461c6fa3] .progress_slider .vue-slider-rail{border-radius:6px}.audio_player .progress_slider_wrapper[data-v-461c6fa3] .progress_slider .vue-slider-rail .vue-slider-process{border-radius:6px;transition:none !important}.audio_player .play_button[data-v-461c6fa3]{display:flex;align-items:center;justify-content:center;width:28px;height:28px;border-radius:50%;background-color:#e50000;overflow:hidden;position:relative;margin:0 10px;transition:background-color .1s}.audio_player .play_button[data-v-461c6fa3]:not(.play_button-loading):hover{cursor:pointer;background-color:#e50000}.audio_player .play_button.no-song[data-v-461c6fa3]{opacity:.6}.audio_player .play_button.no-song[data-v-461c6fa3]:hover{background-color:#e50000;cursor:default}.audio_player .play_button i[data-v-461c6fa3]{color:#fff;font-size:12px;display:block;-webkit-transform:none;transform:none;transition:none}.audio_player .play_button i[data-v-461c6fa3]:hover{color:#fff}.audio_player .play_button .icon-play[data-v-461c6fa3]{padding:0 0 0 3px}.audio_player-volume_wrapper[data-v-461c6fa3]{position:relative;width:100%;padding-left:30px;margin-left:20px}.audio_player-volume_wrapper .icon-box[data-v-461c6fa3]{cursor:pointer;position:absolute;left:5px;top:-5px;width:20px;line-height:0;font-size:18px;color:#a4b3c5}.audio_player-volume_wrapper[data-v-461c6fa3] .volume_slider{height:.5rem !important}.audio_player-volume_wrapper[data-v-461c6fa3] .volume_slider .vue-slider-rail{border-radius:.5rem}.audio_player-volume_wrapper[data-v-461c6fa3] .volume_slider .vue-slider-rail .vue-slider-process{border-radius:.5rem;transition:none !important}</style><style type="text/css"> @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } } .fadeIn { animation-name: fadeIn; } @keyframes fadeOut { from { opacity: 1; } to { opacity: 0; } } .fadeOut { animation-name: fadeOut; } .fade-move { transition: transform .3s ease-out; } </style><style type="text/css">.zoom-move { transition: transform .3s ease-out; } @keyframes zoomIn { from { opacity: 0; transform: scale3d(0.3, 0.3, 0.3); } 50% { opacity: 1; } } .zoomIn { animation-name: zoomIn; } @keyframes zoomOut { from { opacity: 1; } 50% { opacity: 0; transform: scale3d(0.3, 0.3, 0.3); } to { opacity: 0; } } .zoomOut { animation-name: zoomOut; } </style><style type="text/css">.zoom-move { transition: transform .3s ease-out; } @keyframes zoomInX { from { opacity: 0; transform: scaleX(0); } 50% { opacity: 1; } } .zoomInX { animation-name: zoomInX; } @keyframes zoomOutX { from { opacity: 1; } 50% { opacity: 0; transform: scaleX(0); } to { opacity: 0; } } .zoomOutX { animation-name: zoomOutX; } </style><style type="text/css">.zoom-move { transition: transform .3s ease-out; } @keyframes zoomInY { from { opacity: 0; transform: scaleY(0); } 50% { opacity: 1; tranform: scaleY(1); } } .zoomInY { animation-name: zoomInY; } @keyframes zoomOutY { from { opacity: 1; } 50% { opacity: 0; transform: scaleY(0); } to { opacity: 0; } } .zoomOutY { animation-name: zoomOutY; } </style><style type="text/css"> .collapse-move { transition: transform .3s ease-in-out; } </style><style type="text/css"> @keyframes scaleIn { from { opacity: 0; transform: scale(0) } to { opacity: 1; } } .scaleIn { animation-name: scaleIn; } @keyframes scaleOut { from { opacity: 1; } to { opacity: 0; transform: scale(0); } } .scaleOut { animation-name: scaleOut; } .scale-move { transition: transform .3s cubic-bezier(.25, .8, .50, 1); } </style><style type="text/css">.slide-move { transition: transform .3s; } @keyframes slideYIn { from { opacity: 0; transform: translateY(-15px); } to { opacity: 1; } } .slideYIn { animation-name: slideYIn; } @keyframes slideYOut { from { opacity: 1; } to { opacity: 0; transform: translateY(-15px); } } .slideYOut { animation-name: slideYOut; } </style><style type="text/css">.slide-move { transition: transform .3s; } @keyframes slideYDownIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; } } .slideYDownIn { animation-name: slideYDownIn; } @keyframes slideYDownOut { from { opacity: 1; } to { opacity: 0; transform: translateY(15px); } } .slideYDownOut { animation-name: slideYDownOut; } </style><style type="text/css">.slide-move { transition: transform .3s; } @keyframes slideXLeftIn { from { opacity: 0; transform: translateX(-15px); } to { opacity: 1; } } .slideXLeftIn { animation-name: slideXLeftIn; } @keyframes slideXLeftOut { from { opacity: 1; } to { opacity: 0; transform: translateX(-15px); } } .slideXLeftOut { animation-name: slideXLeftOut; } </style><style type="text/css">.slide-move { transition: transform .3s; } @keyframes slideXRightIn { from { opacity: 0; transform: translateX(15px); } to { opacity: 1; } } .slideXRightIn { animation-name: slideXRightIn; } @keyframes slideXRightOut { from { opacity: 1; } to { opacity: 0; transform: translateX(15px); } } .slideXRightOut { animation-name: slideXRightOut; } 
</style> --}}
{{-- <style type="text/css">
    /*
 * Container style
 */
.ps {
  overflow: hidden !important;
  overflow-anchor: none;
  -ms-overflow-style: none;
  touch-action: auto;
  -ms-touch-action: auto;
}
/*
 * Scrollbar rail styles
 */
.ps__rail-x {
  display: none;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
  -webkit-transition: background-color .2s linear, opacity .2s linear;
  height: 15px;
  /* there must be 'bottom' or 'top' for ps__rail-x */
  bottom: 0px;
  /* please don't change 'position' */
  position: absolute;
}
.ps__rail-y {
  display: none;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
  -webkit-transition: background-color .2s linear, opacity .2s linear;
  width: 15px;
  /* there must be 'right' or 'left' for ps__rail-y */
  right: 0;
  /* please don't change 'position' */
  position: absolute;
}
.ps--active-x > .ps__rail-x,
.ps--active-y > .ps__rail-y {
  display: block;
  background-color: transparent;
}
.ps:hover > .ps__rail-x,
.ps:hover > .ps__rail-y,
.ps--focus > .ps__rail-x,
.ps--focus > .ps__rail-y,
.ps--scrolling-x > .ps__rail-x,
.ps--scrolling-y > .ps__rail-y {
  opacity: 0.6;
}
.ps .ps__rail-x:hover,
.ps .ps__rail-y:hover,
.ps .ps__rail-x:focus,
.ps .ps__rail-y:focus,
.ps .ps__rail-x.ps--clicking,
.ps .ps__rail-y.ps--clicking {
  background-color: #eee;
  opacity: 0.9;
}
/*
 * Scrollbar thumb styles
 */
.ps__thumb-x {
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color .2s linear, height .2s ease-in-out;
  -webkit-transition: background-color .2s linear, height .2s ease-in-out;
  height: 6px;
  /* there must be 'bottom' for ps__thumb-x */
  bottom: 2px;
  /* please don't change 'position' */
  position: absolute;
}
.ps__thumb-y {
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color .2s linear, width .2s ease-in-out;
  -webkit-transition: background-color .2s linear, width .2s ease-in-out;
  width: 6px;
  /* there must be 'right' for ps__thumb-y */
  right: 2px;
  /* please don't change 'position' */
  position: absolute;
}
.ps__rail-x:hover > .ps__thumb-x,
.ps__rail-x:focus > .ps__thumb-x,
.ps__rail-x.ps--clicking .ps__thumb-x {
  background-color: #999;
  height: 11px;
}
.ps__rail-y:hover > .ps__thumb-y,
.ps__rail-y:focus > .ps__thumb-y,
.ps__rail-y.ps--clicking .ps__thumb-y {
  background-color: #999;
  width: 11px;
}
/* MS supports */
@supports (-ms-overflow-style: none) {
.ps {
    overflow: auto !important;
}
}
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
.ps {
    overflow: auto !important;
}
}
.ps {
    position: relative;
}</style> --}}

<link rel="stylesheet" href="{{ asset('user_assets/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/main.css') }}">

{{-- Navigation Style --}}
<style type="text/css">
    .active{
        color: #ffea00;
    }
</style>
@yield('stylesheet')