(()=>{var e={489:()=>{var e;(e=jQuery)(window).load((function(){e(".loader").fadeOut(2e3)}))},794:()=>{function e(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,t){if(e){if("string"==typeof e)return n(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?n(e,t):void 0}}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var a=0,o=function(){};return{s:o,n:function(){return a>=e.length?{done:!0}:{done:!1,value:e[a++]}},e:function(e){throw e},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,u=!0,s=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return u=e.done,e},e:function(e){s=!0,i=e},f:function(){try{u||null==r.return||r.return()}finally{if(s)throw i}}}}function n(e,n){(null==n||n>e.length)&&(n=e.length);for(var t=0,r=new Array(n);t<n;t++)r[t]=e[t];return r}!function(){var n=document.getElementById("site-navigation"),t=document.querySelector(".onde-menu-container");if(window.innerWidth<1024&&(t.style.transition="all 0.4s ease-in-out"),n){var r=n.getElementsByTagName("i")[0];if(void 0!==r){var a=n.getElementsByTagName("ul")[0];if(void 0!==a){a.classList.contains("nav-menu")||a.classList.add("nav-menu"),r.addEventListener("click",(function(){n.classList.toggle("toggled"),"true"===r.getAttribute("aria-expanded")?r.setAttribute("aria-expanded","false"):r.setAttribute("aria-expanded","true")})),document.addEventListener("click",(function(e){n.contains(e.target)||(n.classList.remove("toggled"),r.setAttribute("aria-expanded","false"))}));var o,i=a.getElementsByTagName("a"),u=a.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a"),s=e(i);try{for(s.s();!(o=s.n()).done;){var c=o.value;c.addEventListener("focus",f,!0),c.addEventListener("blur",f,!0)}}catch(e){s.e(e)}finally{s.f()}var l,d=e(u);try{for(d.s();!(l=d.n()).done;)l.value.addEventListener("touchstart",f,!1)}catch(e){d.e(e)}finally{d.f()}window.addEventListener("resize",(function(e){t.style.transition="all 0.4s ease-in-out",window.innerWidth>1024&&(n.classList.remove("toggled"),t.style.transition="none")}))}else r.style.display="none"}}function f(){if("focus"===event.type||"blur"===event.type)for(var n=this;!n.classList.contains("nav-menu");)"li"===n.tagName.toLowerCase()&&n.classList.toggle("focus"),n=n.parentNode;if("touchstart"===event.type){var t=this.parentNode;event.preventDefault();var r,a=e(t.parentNode.children);try{for(a.s();!(r=a.n()).done;){var o=r.value;t!==o&&o.classList.remove("focus")}}catch(e){a.e(e)}finally{a.f()}t.classList.toggle("focus")}}}()}},n={};function t(r){var a=n[r];if(void 0!==a)return a.exports;var o=n[r]={exports:{}};return e[r](o,o.exports,t),o.exports}(()=>{"use strict";t(794),t(489);var e={update:null,begin:null,loopBegin:null,changeBegin:null,change:null,changeComplete:null,loopComplete:null,complete:null,loop:1,direction:"normal",autoplay:!0,timelineOffset:0},n={duration:1e3,delay:0,endDelay:0,easing:"easeOutElastic(1, .5)",round:0},r=["translateX","translateY","translateZ","rotate","rotateX","rotateY","rotateZ","scale","scaleX","scaleY","scaleZ","skew","skewX","skewY","perspective","matrix","matrix3d"],a={CSS:{},springs:{}};function o(e,n,t){return Math.min(Math.max(e,n),t)}function i(e,n){return e.indexOf(n)>-1}function u(e,n){return e.apply(null,n)}var s={arr:function(e){return Array.isArray(e)},obj:function(e){return i(Object.prototype.toString.call(e),"Object")},pth:function(e){return s.obj(e)&&e.hasOwnProperty("totalLength")},svg:function(e){return e instanceof SVGElement},inp:function(e){return e instanceof HTMLInputElement},dom:function(e){return e.nodeType||s.svg(e)},str:function(e){return"string"==typeof e},fnc:function(e){return"function"==typeof e},und:function(e){return void 0===e},nil:function(e){return s.und(e)||null===e},hex:function(e){return/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(e)},rgb:function(e){return/^rgb/.test(e)},hsl:function(e){return/^hsl/.test(e)},col:function(e){return s.hex(e)||s.rgb(e)||s.hsl(e)},key:function(t){return!e.hasOwnProperty(t)&&!n.hasOwnProperty(t)&&"targets"!==t&&"keyframes"!==t}};function c(e){var n=/\(([^)]+)\)/.exec(e);return n?n[1].split(",").map((function(e){return parseFloat(e)})):[]}function l(e,n){var t=c(e),r=o(s.und(t[0])?1:t[0],.1,100),i=o(s.und(t[1])?100:t[1],.1,100),u=o(s.und(t[2])?10:t[2],.1,100),l=o(s.und(t[3])?0:t[3],.1,100),d=Math.sqrt(i/r),f=u/(2*Math.sqrt(i*r)),p=f<1?d*Math.sqrt(1-f*f):0,g=f<1?(f*d-l)/p:-l+d;function v(e){var t=n?n*e/1e3:e;return t=f<1?Math.exp(-t*f*d)*(1*Math.cos(p*t)+g*Math.sin(p*t)):(1+g*t)*Math.exp(-t*d),0===e||1===e?e:1-t}return n?v:function(){var n=a.springs[e];if(n)return n;for(var t=1/6,r=0,o=0;;)if(1===v(r+=t)){if(++o>=16)break}else o=0;var i=r*t*1e3;return a.springs[e]=i,i}}function d(e){return void 0===e&&(e=10),function(n){return Math.ceil(o(n,1e-6,1)*e)*(1/e)}}var f,p,g=function(){var e=.1;function n(e,n){return 1-3*n+3*e}function t(e,n){return 3*n-6*e}function r(e){return 3*e}function a(e,a,o){return((n(a,o)*e+t(a,o))*e+r(a))*e}function o(e,a,o){return 3*n(a,o)*e*e+2*t(a,o)*e+r(a)}return function(n,t,r,i){if(0<=n&&n<=1&&0<=r&&r<=1){var u=new Float32Array(11);if(n!==t||r!==i)for(var s=0;s<11;++s)u[s]=a(s*e,n,r);return function(s){return n===t&&r===i||0===s||1===s?s:a(function(t){for(var i=0,s=1;10!==s&&u[s]<=t;++s)i+=e;--s;var c=i+(t-u[s])/(u[s+1]-u[s])*e,l=o(c,n,r);return l>=.001?function(e,n,t,r){for(var i=0;i<4;++i){var u=o(n,t,r);if(0===u)return n;n-=(a(n,t,r)-e)/u}return n}(t,c,n,r):0===l?c:function(e,n,t,r,o){var i,u,s=0;do{(i=a(u=n+(t-n)/2,r,o)-e)>0?t=u:n=u}while(Math.abs(i)>1e-7&&++s<10);return u}(t,i,i+e,n,r)}(s),t,i)}}}}(),v=(f={linear:function(){return function(e){return e}}},p={Sine:function(){return function(e){return 1-Math.cos(e*Math.PI/2)}},Circ:function(){return function(e){return 1-Math.sqrt(1-e*e)}},Back:function(){return function(e){return e*e*(3*e-2)}},Bounce:function(){return function(e){for(var n,t=4;e<((n=Math.pow(2,--t))-1)/11;);return 1/Math.pow(4,3-t)-7.5625*Math.pow((3*n-2)/22-e,2)}},Elastic:function(e,n){void 0===e&&(e=1),void 0===n&&(n=.5);var t=o(e,1,10),r=o(n,.1,2);return function(e){return 0===e||1===e?e:-t*Math.pow(2,10*(e-1))*Math.sin((e-1-r/(2*Math.PI)*Math.asin(1/t))*(2*Math.PI)/r)}}},["Quad","Cubic","Quart","Quint","Expo"].forEach((function(e,n){p[e]=function(){return function(e){return Math.pow(e,n+2)}}})),Object.keys(p).forEach((function(e){var n=p[e];f["easeIn"+e]=n,f["easeOut"+e]=function(e,t){return function(r){return 1-n(e,t)(1-r)}},f["easeInOut"+e]=function(e,t){return function(r){return r<.5?n(e,t)(2*r)/2:1-n(e,t)(-2*r+2)/2}},f["easeOutIn"+e]=function(e,t){return function(r){return r<.5?(1-n(e,t)(1-2*r))/2:(n(e,t)(2*r-1)+1)/2}}})),f);function h(e,n){if(s.fnc(e))return e;var t=e.split("(")[0],r=v[t],a=c(e);switch(t){case"spring":return l(e,n);case"cubicBezier":return u(g,a);case"steps":return u(d,a);default:return u(r,a)}}function m(e){try{return document.querySelectorAll(e)}catch(e){return}}function y(e,n){for(var t=e.length,r=arguments.length>=2?arguments[1]:void 0,a=[],o=0;o<t;o++)if(o in e){var i=e[o];n.call(r,i,o,e)&&a.push(i)}return a}function b(e){return e.reduce((function(e,n){return e.concat(s.arr(n)?b(n):n)}),[])}function _(e){return s.arr(e)?e:(s.str(e)&&(e=m(e)||e),e instanceof NodeList||e instanceof HTMLCollection?[].slice.call(e):[e])}function w(e,n){return e.some((function(e){return e===n}))}function x(e){var n={};for(var t in e)n[t]=e[t];return n}function M(e,n){var t=x(e);for(var r in e)t[r]=n.hasOwnProperty(r)?n[r]:e[r];return t}function S(e,n){var t=x(e);for(var r in n)t[r]=s.und(e[r])?n[r]:e[r];return t}function k(e){var n=/[+-]?\d*\.?\d+(?:\.\d+)?(?:[eE][+-]?\d+)?(%|px|pt|em|rem|in|cm|mm|ex|ch|pc|vw|vh|vmin|vmax|deg|rad|turn)?$/.exec(e);if(n)return n[1]}function L(e,n){return s.fnc(e)?e(n.target,n.id,n.total):e}function E(e,n){return e.getAttribute(n)}function O(e,n,t){if(w([t,"deg","rad","turn"],k(n)))return n;var r=a.CSS[n+t];if(!s.und(r))return r;var o=document.createElement(e.tagName),i=e.parentNode&&e.parentNode!==document?e.parentNode:document.body;i.appendChild(o),o.style.position="absolute",o.style.width=100+t;var u=100/o.offsetWidth;i.removeChild(o);var c=u*parseFloat(n);return a.CSS[n+t]=c,c}function C(e,n,t){if(n in e.style){var r=n.replace(/([a-z])([A-Z])/g,"$1-$2").toLowerCase(),a=e.style[n]||getComputedStyle(e).getPropertyValue(r)||"0";return t?O(e,a,t):a}}function I(e,n){return s.dom(e)&&!s.inp(e)&&(!s.nil(E(e,n))||s.svg(e)&&e[n])?"attribute":s.dom(e)&&w(r,n)?"transform":s.dom(e)&&"transform"!==n&&C(e,n)?"css":null!=e[n]?"object":void 0}function A(e){if(s.dom(e)){for(var n,t=e.style.transform||"",r=/(\w+)\(([^)]*)\)/g,a=new Map;n=r.exec(t);)a.set(n[1],n[2]);return a}}function B(e,n,t,r){switch(I(e,n)){case"transform":return function(e,n,t,r){var a=i(n,"scale")?1:0+function(e){return i(e,"translate")||"perspective"===e?"px":i(e,"rotate")||i(e,"skew")?"deg":void 0}(n),o=A(e).get(n)||a;return t&&(t.transforms.list.set(n,o),t.transforms.last=n),r?O(e,o,r):o}(e,n,r,t);case"css":return C(e,n,t);case"attribute":return E(e,n);default:return e[n]||0}}function T(e,n){var t=/^(\*=|\+=|-=)/.exec(e);if(!t)return e;var r=k(e)||0,a=parseFloat(n),o=parseFloat(e.replace(t[0],""));switch(t[0][0]){case"+":return a+o+r;case"-":return a-o+r;case"*":return a*o+r}}function q(e,n){if(s.col(e))return function(e){return s.rgb(e)?(t=/rgb\((\d+,\s*[\d]+,\s*[\d]+)\)/g.exec(n=e))?"rgba("+t[1]+",1)":n:s.hex(e)?function(e){var n=e.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i,(function(e,n,t,r){return n+n+t+t+r+r})),t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(n);return"rgba("+parseInt(t[1],16)+","+parseInt(t[2],16)+","+parseInt(t[3],16)+",1)"}(e):s.hsl(e)?function(e){var n,t,r,a=/hsl\((\d+),\s*([\d.]+)%,\s*([\d.]+)%\)/g.exec(e)||/hsla\((\d+),\s*([\d.]+)%,\s*([\d.]+)%,\s*([\d.]+)\)/g.exec(e),o=parseInt(a[1],10)/360,i=parseInt(a[2],10)/100,u=parseInt(a[3],10)/100,s=a[4]||1;function c(e,n,t){return t<0&&(t+=1),t>1&&(t-=1),t<1/6?e+6*(n-e)*t:t<.5?n:t<2/3?e+(n-e)*(2/3-t)*6:e}if(0==i)n=t=r=u;else{var l=u<.5?u*(1+i):u+i-u*i,d=2*u-l;n=c(d,l,o+1/3),t=c(d,l,o),r=c(d,l,o-1/3)}return"rgba("+255*n+","+255*t+","+255*r+","+s+")"}(e):void 0;var n,t}(e);if(/\s/g.test(e))return e;var t=k(e),r=t?e.substr(0,e.length-t.length):e;return n?r+n:r}function D(e,n){return Math.sqrt(Math.pow(n.x-e.x,2)+Math.pow(n.y-e.y,2))}function P(e){for(var n,t=e.points,r=0,a=0;a<t.numberOfItems;a++){var o=t.getItem(a);a>0&&(r+=D(n,o)),n=o}return r}function N(e){if(e.getTotalLength)return e.getTotalLength();switch(e.tagName.toLowerCase()){case"circle":return function(e){return 2*Math.PI*E(e,"r")}(e);case"rect":return function(e){return 2*E(e,"width")+2*E(e,"height")}(e);case"line":return function(e){return D({x:E(e,"x1"),y:E(e,"y1")},{x:E(e,"x2"),y:E(e,"y2")})}(e);case"polyline":return P(e);case"polygon":return function(e){var n=e.points;return P(e)+D(n.getItem(n.numberOfItems-1),n.getItem(0))}(e)}}function j(e,n){var t=n||{},r=t.el||function(e){for(var n=e.parentNode;s.svg(n)&&s.svg(n.parentNode);)n=n.parentNode;return n}(e),a=r.getBoundingClientRect(),o=E(r,"viewBox"),i=a.width,u=a.height,c=t.viewBox||(o?o.split(" "):[0,0,i,u]);return{el:r,viewBox:c,x:c[0]/1,y:c[1]/1,w:i,h:u,vW:c[2],vH:c[3]}}function F(e,n,t){function r(t){void 0===t&&(t=0);var r=n+t>=1?n+t:0;return e.el.getPointAtLength(r)}var a=j(e.el,e.svg),o=r(),i=r(-1),u=r(1),s=t?1:a.w/a.vW,c=t?1:a.h/a.vH;switch(e.property){case"x":return(o.x-a.x)*s;case"y":return(o.y-a.y)*c;case"angle":return 180*Math.atan2(u.y-i.y,u.x-i.x)/Math.PI}}function H(e,n){var t=/[+-]?\d*\.?\d+(?:\.\d+)?(?:[eE][+-]?\d+)?/g,r=q(s.pth(e)?e.totalLength:e,n)+"";return{original:r,numbers:r.match(t)?r.match(t).map(Number):[0],strings:s.str(e)||n?r.split(t):[]}}function W(e){return y(e?b(s.arr(e)?e.map(_):_(e)):[],(function(e,n,t){return t.indexOf(e)===n}))}function z(e){var n=W(e);return n.map((function(e,t){return{target:e,id:t,total:n.length,transforms:{list:A(e)}}}))}function $(e,n){var t=x(n);if(/^spring/.test(t.easing)&&(t.duration=l(t.easing)),s.arr(e)){var r=e.length;2!==r||s.obj(e[0])?s.fnc(n.duration)||(t.duration=n.duration/r):e={value:e}}var a=s.arr(e)?e:[e];return a.map((function(e,t){var r=s.obj(e)&&!s.pth(e)?e:{value:e};return s.und(r.delay)&&(r.delay=t?0:n.delay),s.und(r.endDelay)&&(r.endDelay=t===a.length-1?n.endDelay:0),r})).map((function(e){return S(e,t)}))}var Y={css:function(e,n,t){return e.style[n]=t},attribute:function(e,n,t){return e.setAttribute(n,t)},object:function(e,n,t){return e[n]=t},transform:function(e,n,t,r,a){if(r.list.set(n,t),n===r.last||a){var o="";r.list.forEach((function(e,n){o+=n+"("+e+") "})),e.style.transform=o}}};function V(e,n){z(e).forEach((function(e){for(var t in n){var r=L(n[t],e),a=e.target,o=k(r),i=B(a,t,o,e),u=T(q(r,o||k(i)),i),s=I(a,t);Y[s](a,t,u,e.transforms,!0)}}))}function X(e,n){return y(b(e.map((function(e){return n.map((function(n){return function(e,n){var t=I(e.target,n.name);if(t){var r=function(e,n){var t;return e.tweens.map((function(r){var a=function(e,n){var t={};for(var r in e){var a=L(e[r],n);s.arr(a)&&1===(a=a.map((function(e){return L(e,n)}))).length&&(a=a[0]),t[r]=a}return t.duration=parseFloat(t.duration),t.delay=parseFloat(t.delay),t}(r,n),o=a.value,i=s.arr(o)?o[1]:o,u=k(i),c=B(n.target,e.name,u,n),l=t?t.to.original:c,d=s.arr(o)?o[0]:l,f=k(d)||k(c),p=u||f;return s.und(i)&&(i=l),a.from=H(d,p),a.to=H(T(i,d),p),a.start=t?t.end:0,a.end=a.start+a.delay+a.duration+a.endDelay,a.easing=h(a.easing,a.duration),a.isPath=s.pth(o),a.isPathTargetInsideSVG=a.isPath&&s.svg(n.target),a.isColor=s.col(a.from.original),a.isColor&&(a.round=1),t=a,a}))}(n,e),a=r[r.length-1];return{type:t,property:n.name,animatable:e,tweens:r,duration:a.end,delay:r[0].delay,endDelay:a.endDelay}}}(e,n)}))}))),(function(e){return!s.und(e)}))}function Z(e,n){var t=e.length,r=function(e){return e.timelineOffset?e.timelineOffset:0},a={};return a.duration=t?Math.max.apply(Math,e.map((function(e){return r(e)+e.duration}))):n.duration,a.delay=t?Math.min.apply(Math,e.map((function(e){return r(e)+e.delay}))):n.delay,a.endDelay=t?a.duration-Math.max.apply(Math,e.map((function(e){return r(e)+e.duration-e.endDelay}))):n.endDelay,a}var Q=0,G=[],R=function(){var e;function n(t){for(var r=G.length,a=0;a<r;){var o=G[a];o.paused?(G.splice(a,1),r--):(o.tick(t),a++)}e=a>0?requestAnimationFrame(n):void 0}return"undefined"!=typeof document&&document.addEventListener("visibilitychange",(function(){J.suspendWhenDocumentHidden&&(U()?e=cancelAnimationFrame(e):(G.forEach((function(e){return e._onDocumentVisibility()})),R()))})),function(){e||U()&&J.suspendWhenDocumentHidden||!(G.length>0)||(e=requestAnimationFrame(n))}}();function U(){return!!document&&document.hidden}function J(t){void 0===t&&(t={});var r,a=0,i=0,u=0,c=0,l=null;function d(e){var n=window.Promise&&new Promise((function(e){return l=e}));return e.finished=n,n}var f=function(t){var r=M(e,t),a=M(n,t),o=function(e,n){var t=[],r=n.keyframes;for(var a in r&&(n=S(function(e){for(var n=y(b(e.map((function(e){return Object.keys(e)}))),(function(e){return s.key(e)})).reduce((function(e,n){return e.indexOf(n)<0&&e.push(n),e}),[]),t={},r=function(r){var a=n[r];t[a]=e.map((function(e){var n={};for(var t in e)s.key(t)?t==a&&(n.value=e[t]):n[t]=e[t];return n}))},a=0;a<n.length;a++)r(a);return t}(r),n)),n)s.key(a)&&t.push({name:a,tweens:$(n[a],e)});return t}(a,t),i=z(t.targets),u=X(i,o),c=Z(u,a),l=Q;return Q++,S(r,{id:l,children:[],animatables:i,animations:u,duration:c.duration,delay:c.delay,endDelay:c.endDelay})}(t);function p(){var e=f.direction;"alternate"!==e&&(f.direction="normal"!==e?"normal":"reverse"),f.reversed=!f.reversed,r.forEach((function(e){return e.reversed=f.reversed}))}function g(e){return f.reversed?f.duration-e:e}function v(){a=0,i=g(f.currentTime)*(1/J.speed)}function h(e,n){n&&n.seek(e-n.timelineOffset)}function m(e){for(var n=0,t=f.animations,r=t.length;n<r;){var a=t[n],i=a.animatable,u=a.tweens,s=u.length-1,c=u[s];s&&(c=y(u,(function(n){return e<n.end}))[0]||c);for(var l=o(e-c.start-c.delay,0,c.duration)/c.duration,d=isNaN(l)?1:c.easing(l),p=c.to.strings,g=c.round,v=[],h=c.to.numbers.length,m=void 0,b=0;b<h;b++){var _=void 0,w=c.to.numbers[b],x=c.from.numbers[b]||0;_=c.isPath?F(c.value,d*w,c.isPathTargetInsideSVG):x+d*(w-x),g&&(c.isColor&&b>2||(_=Math.round(_*g)/g)),v.push(_)}var M=p.length;if(M){m=p[0];for(var S=0;S<M;S++){p[S];var k=p[S+1],L=v[S];isNaN(L)||(m+=k?L+k:L+" ")}}else m=v[0];Y[a.type](i.target,a.property,m,i.transforms),a.currentValue=m,n++}}function _(e){f[e]&&!f.passThrough&&f[e](f)}function w(e){var n=f.duration,t=f.delay,s=n-f.endDelay,v=g(e);f.progress=o(v/n*100,0,100),f.reversePlayback=v<f.currentTime,r&&function(e){if(f.reversePlayback)for(var n=c;n--;)h(e,r[n]);else for(var t=0;t<c;t++)h(e,r[t])}(v),!f.began&&f.currentTime>0&&(f.began=!0,_("begin")),!f.loopBegan&&f.currentTime>0&&(f.loopBegan=!0,_("loopBegin")),v<=t&&0!==f.currentTime&&m(0),(v>=s&&f.currentTime!==n||!n)&&m(n),v>t&&v<s?(f.changeBegan||(f.changeBegan=!0,f.changeCompleted=!1,_("changeBegin")),_("change"),m(v)):f.changeBegan&&(f.changeCompleted=!0,f.changeBegan=!1,_("changeComplete")),f.currentTime=o(v,0,n),f.began&&_("update"),e>=n&&(i=0,f.remaining&&!0!==f.remaining&&f.remaining--,f.remaining?(a=u,_("loopComplete"),f.loopBegan=!1,"alternate"===f.direction&&p()):(f.paused=!0,f.completed||(f.completed=!0,_("loopComplete"),_("complete"),!f.passThrough&&"Promise"in window&&(l(),d(f)))))}return d(f),f.reset=function(){var e=f.direction;f.passThrough=!1,f.currentTime=0,f.progress=0,f.paused=!0,f.began=!1,f.loopBegan=!1,f.changeBegan=!1,f.completed=!1,f.changeCompleted=!1,f.reversePlayback=!1,f.reversed="reverse"===e,f.remaining=f.loop,r=f.children;for(var n=c=r.length;n--;)f.children[n].reset();(f.reversed&&!0!==f.loop||"alternate"===e&&1===f.loop)&&f.remaining++,m(f.reversed?f.duration:0)},f._onDocumentVisibility=v,f.set=function(e,n){return V(e,n),f},f.tick=function(e){u=e,a||(a=u),w((u+(i-a))*J.speed)},f.seek=function(e){w(g(e))},f.pause=function(){f.paused=!0,v()},f.play=function(){f.paused&&(f.completed&&f.reset(),f.paused=!1,G.push(f),v(),R())},f.reverse=function(){p(),f.completed=!f.reversed,v()},f.restart=function(){f.reset(),f.play()},f.remove=function(e){ee(W(e),f)},f.reset(),f.autoplay&&f.play(),f}function K(e,n){for(var t=n.length;t--;)w(e,n[t].animatable.target)&&n.splice(t,1)}function ee(e,n){var t=n.animations,r=n.children;K(e,t);for(var a=r.length;a--;){var o=r[a],i=o.animations;K(e,i),i.length||o.children.length||r.splice(a,1)}t.length||r.length||n.pause()}J.version="3.2.1",J.speed=1,J.suspendWhenDocumentHidden=!0,J.running=G,J.remove=function(e){for(var n=W(e),t=G.length;t--;)ee(n,G[t])},J.get=B,J.set=V,J.convertPx=O,J.path=function(e,n){var t=s.str(e)?m(e)[0]:e,r=n||100;return function(e){return{property:e,el:t,svg:j(t),totalLength:N(t)*(r/100)}}},J.setDashoffset=function(e){var n=N(e);return e.setAttribute("stroke-dasharray",n),n},J.stagger=function(e,n){void 0===n&&(n={});var t=n.direction||"normal",r=n.easing?h(n.easing):null,a=n.grid,o=n.axis,i=n.from||0,u="first"===i,c="center"===i,l="last"===i,d=s.arr(e),f=d?parseFloat(e[0]):parseFloat(e),p=d?parseFloat(e[1]):0,g=k(d?e[1]:e)||0,v=n.start||0+(d?f:0),m=[],y=0;return function(e,n,s){if(u&&(i=0),c&&(i=(s-1)/2),l&&(i=s-1),!m.length){for(var h=0;h<s;h++){if(a){var b=c?(a[0]-1)/2:i%a[0],_=c?(a[1]-1)/2:Math.floor(i/a[0]),w=b-h%a[0],x=_-Math.floor(h/a[0]),M=Math.sqrt(w*w+x*x);"x"===o&&(M=-w),"y"===o&&(M=-x),m.push(M)}else m.push(Math.abs(i-h));y=Math.max.apply(Math,m)}r&&(m=m.map((function(e){return r(e/y)*y}))),"reverse"===t&&(m=m.map((function(e){return o?e<0?-1*e:-e:Math.abs(y-e)})))}return v+(d?(p-f)/y:f)*(Math.round(100*m[n])/100)+g}},J.timeline=function(e){void 0===e&&(e={});var t=J(e);return t.duration=0,t.add=function(r,a){var o=G.indexOf(t),i=t.children;function u(e){e.passThrough=!0}o>-1&&G.splice(o,1);for(var c=0;c<i.length;c++)u(i[c]);var l=S(r,M(n,e));l.targets=l.targets||e.targets;var d=t.duration;l.autoplay=!1,l.direction=t.direction,l.timelineOffset=s.und(a)?d:T(a,d),u(t),t.seek(l.timelineOffset);var f=J(l);u(f),i.push(f);var p=Z(i,e);return t.delay=p.delay,t.endDelay=p.endDelay,t.duration=p.duration,t.seek(0),t.reset(),t.autoplay&&t.play(),t},t},J.easing=h,J.penner=v,J.random=function(e,n){return Math.floor(Math.random()*(n-e+1))+e};const ne=J;var te,re={onde_front_page_parallax_container:document.querySelector(".parallax-container"),onde_front_page_slides:document.querySelectorAll(".slide"),onde_front_page_content_post:document.querySelector("#front-page-content-post"),onde_navbar:document.querySelector("#site-navigation"),onde_site_branding:document.querySelector(".site-branding"),onde_topbar:document.querySelector(".top-bar"),onde_header_image:document.querySelector(".header-image"),onde_main_content_wrapper:document.querySelector(".main-content-wrapper"),onde_open_sidebar_btn:document.querySelector("#open-sidebar-btn"),onde_sticky_sidebar_trigger:document.querySelector(".widgets-icons"),onde_sidebar:document.querySelector(".sidebar"),onde_sidebar_close_btn:document.querySelector("#sidebar-close-btn"),onde_site_branding_animated_elements:document.querySelectorAll(".ml12"),onde_brakpoint_small:600,onde_breakpoint_medium:1024,onde_brakpoint_large:1400,onde_brakpoint_huge:2e3},ae=re.onde_navbar,oe=re.onde_site_branding,ie=re.onde_header_image,ue=re.onde_breakpoint_medium;function se(){var e=ae.getBoundingClientRect(),n=oe.getBoundingClientRect();ie.style.transition="height 0.6s ease",window.innerWidth>ue&&(e.top<0&&(ae.style.position="fixed",ae.style.top=window.scrollY,ie.style.transition="none"),n.bottom>0&&(ae.style.position="static"))}function ce(){var e=re.onde_front_page_content_post,n=re.onde_front_page_slides,t=re.onde_front_page_parallax_container,r={pos:{}};if(e){var a=e.offsetHeight,o=Math.ceil(a/3),i=0;t.style.height=a+"px",n.forEach((function(e,n){e.style.height=o+"px",e.style.top=i+"px",r.pos["slide".concat(n+1)]=i,r.slide_size=o,i+=o}))}return r}function le(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}(te=new(function(){function e(n){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e),this.state={nav_opened:!1,sidebar_opened:!1,app_window_size:{width:null,height:null},scrollY:0,is_mobile:!1,front_page_content_size:0,parallax_slide:{}},this.ui=n}var n,t;return n=e,t=[{key:"init",value:function(){this.sidebarInitListener()}},{key:"setState",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;if(!(e in this.state))throw new Error("Undefined key ".concat(e," in state property of ").concat(this.constructor.name," object"));this.state[e]=n}},{key:"sidebarInitListener",value:function(){var e=this,n=this.ui,t=n.onde_open_sidebar_btn,r=n.onde_sticky_sidebar_trigger,a=n.onde_sidebar,o=n.onde_sidebar_close_btn;t&&r&&a&&o&&(t.addEventListener("click",(function(){var n=e.state.sidebar_opened;r.classList.add("triggered"),e.setState("sidebar_opened",!n),e.state.sidebar_opened&&a.classList.add("sidebar-opened")})),o.addEventListener("click",(function(){var n=e.state.sidebar_opened;e.setState("sidebar_opened",!n),!1===e.state.sidebar_opened&&a.classList.remove("sidebar-opened"),r.classList.remove("triggered")})))}}],t&&le(n.prototype,t),e}())(re)).init(),document.addEventListener("DOMContentLoaded",(function(){console.log("DOM entièrement chargé et analysé"),te.setState("app_window_size",{width:window.innerWidth,height:window.innerHeight}),te.setState("parallax_slide",ce()),console.log(te),re.onde_site_branding_animated_elements.forEach((function(e){e.innerHTML=e.textContent.replace(/\S/g,"<span class='letter'>$&</span>")})),ne.timeline({loop:!1}).add({targets:"#front-page-content-post",opacity:[0,1],easing:"easeInExpo",duration:0,delay:function(e,n){return 100+30*n}}),ne.timeline({loop:!1}).add({targets:".site-logo",opacity:[0,1],easing:"easeInExpo",duration:0,delay:function(e,n){return 100+30*n}}).add({targets:".ml12 .letter",translateX:[40,0],translateZ:0,opacity:[0,1],easing:"easeOutExpo",duration:3e3,delay:function(e,n){return 500+30*n}}),se()})),document.addEventListener("scroll",(function(e){te.setState("scrollY",window.scrollY),se()})),window.onresize=function(e){te.setState("app_window_size",{width:window.innerWidth,height:window.innerHeight}),ce()}})()})();
//# sourceMappingURL=app.js.map