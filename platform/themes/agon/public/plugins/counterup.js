

/*!
* jquery.counterup.js 1.0
*
* Copyright 2013, Benjamin Intal http://gambit.ph @bfintal
* Released under the GPL v2 License
*
* Date: Nov 26, 2013
*/ !function(t){"use strict";t.fn.counterUp=function(n){var u=t.extend({time:400,delay:10},n);return this.each(function(){var n=t(this),e=u,a=function(){var t=[],u=e.time/e.delay,a=n.text(),r=/[0-9]+,[0-9]+/.test(a);a=a.replace(/,/g,""),/^[0-9]+$/.test(a);for(var c=/^[0-9]+\.[0-9]+$/.test(a),o=c?(a.split(".")[1]||[]).length:0,i=u;i>=1;i--){var d=parseInt(a/u*i);if(c&&(d=parseFloat(a/u*i).toFixed(o)),r)for(;/(\d+)(\d{3})/.test(d.toString());)d=d.toString().replace(/(\d+)(\d{3})/,"$1,$2");t.unshift(d)}n.data("counterup-nums",t),n.text("0");var s=function(){Array.isArray(n.data("counterup-nums"))&&n.data("counterup-nums").length?(n.text(n.data("counterup-nums").shift()),setTimeout(n.data("counterup-func"),1)):(delete n.data("counterup-nums"),n.data("counterup-nums",null),n.data("counterup-func",null))};n.data("counterup-func",s),setTimeout(n.data("counterup-func"),1)};n.waypoint(a,{offset:"100%",triggerOnce:!0})})}}(jQuery);


