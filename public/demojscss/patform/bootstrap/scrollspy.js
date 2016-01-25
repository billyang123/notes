define("bootstrap/scrollspy",[],function(a,b,c){function d(a,b){this.$body=$(document.body),this.$scrollElement=$(a).is(document.body)?$(window):$(a),this.options=$.extend({},d.DEFAULTS,b),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",$.proxy(this.process,this)),this.refresh(),this.process()}function e(a){return this.each(function(){var b=$(this),c=b.data("bs.scrollspy"),e="object"==typeof a&&a;c||b.data("bs.scrollspy",c=new d(this,e)),"string"==typeof a&&c[a]()})}d.VERSION="3.3.5",d.DEFAULTS={offset:10},d.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},d.prototype.refresh=function(){var a=this,b="offset",c=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),$.isWindow(this.$scrollElement[0])||(b="position",c=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var a=$(this),d=a.data("target")||a.attr("href"),e=/^#./.test(d)&&$(d);return e&&e.length&&e.is(":visible")&&[[e[b]().top+c,d]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){a.offsets.push(this[0]),a.targets.push(this[1])})},d.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},d.prototype.activate=function(a){this.activeTarget=a,this.clear();var b=this.selector+'[data-target="'+a+'"],'+this.selector+'[href="'+a+'"]',c=$(b).parents("li").addClass("active");c.parent(".dropdown-menu").length&&(c=c.closest("li.dropdown").addClass("active")),c.trigger("activate.bs.scrollspy")},d.prototype.clear=function(){$(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var f=$.fn.scrollspy;$.fn.scrollspy=e,$.fn.scrollspy.Constructor=d,$.fn.scrollspy.noConflict=function(){return $.fn.scrollspy=f,this},$(window).on("load.bs.scrollspy.data-api",function(){$('[data-spy="scroll"]').each(function(){var a=$(this);e.call(a,a.data())})})});