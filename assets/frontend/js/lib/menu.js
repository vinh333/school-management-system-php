!function(a){a.extend({browserSelector:function(){!function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))}(navigator.userAgent||navigator.vendor||window.opera);var b=navigator.userAgent,d=b.toLowerCase(),e=function(a){return d.indexOf(a)>-1},f="gecko",g="webkit",h="safari",i="opera",j=document.documentElement,k=[!/opera|webtv/i.test(d)&&/msie\s(\d)/.test(d)?"ie ie"+parseFloat(navigator.appVersion.split("MSIE")[1]):e("firefox/2")?f+" ff2":e("firefox/3.5")?f+" ff3 ff3_5":e("firefox/3")?f+" ff3":e("gecko/")?f:e("opera")?i+(/version\/(\d+)/.test(d)?" "+i+RegExp.jQuery1:/opera(\s|\/)(\d+)/.test(d)?" "+i+RegExp.jQuery2:""):e("konqueror")?"konqueror":e("chrome")?g+" chrome":e("iron")?g+" iron":e("applewebkit/")?g+" "+h+(/version\/(\d+)/.test(d)?" "+h+RegExp.jQuery1:""):e("mozilla/")?f:"",e("j2me")?"mobile":e("iphone")?"iphone":e("ipod")?"ipod":e("mac")?"mac":e("darwin")?"mac":e("webtv")?"webtv":e("win")?"win":e("freebsd")?"freebsd":e("x11")||e("linux")?"linux":"","js"];c=k.join(" "),a.browser.mobile&&(c+=" mobile"),j.className+=" "+c;var l=!window.ActiveXObject&&"ActiveXObject"in window;return l?void a("html").removeClass("gecko").addClass("ie ie11"):(a("body").hasClass("dark")&&a("html").addClass("dark"),void(a("body").hasClass("boxed")&&a("html").addClass("boxed")))}}),a.browserSelector()}(jQuery),function(a){var b="waitForImages";a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"]},a.expr[":"].uncached=function(b){if(!a(b).is('img[src][src!=""]'))return!1;var c=new Image;return c.src=b.src,!c.complete},a.fn.waitForImages=function(c,d,e){var f=0,g=0;if(a.isPlainObject(arguments[0])&&(e=arguments[0].waitForAll,d=arguments[0].each,c=arguments[0].finished),c=c||a.noop,d=d||a.noop,e=!!e,!a.isFunction(c)||!a.isFunction(d))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var h=a(this),i=[],j=a.waitForImages.hasImageProperties||[],k=/url\(\s*(['"]?)(.*?)\1\s*\)/g;e?h.find("*").addBack().each(function(){var b=a(this);b.is("img:uncached")&&i.push({src:b.attr("src"),element:b[0]}),a.each(j,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=k.exec(e);)i.push({src:d[2],element:b[0]})})}):h.find("img:uncached").each(function(){i.push({src:this.src,element:this})}),f=i.length,g=0,0===f&&c.call(h[0]),a.each(i,function(e,i){var j=new Image,k="load."+b+" error."+b;a(j).on(k,function l(b){return g++,d.call(i.element,g,f,"load"==b.type),a(this).off(k,l),g==f?(c.call(h[0]),!1):void 0}),j.src=i.src})})}}(jQuery),function(a){function b(a,b){return a.toFixed(b.decimals)}a.fn.countTo=function(b){return b=b||{},a(this).each(function(){function c(){k+=g,j++,d(k),"function"==typeof e.onUpdate&&e.onUpdate.call(h,k),j>=f&&(i.removeData("countTo"),clearInterval(l.interval),k=e.to,"function"==typeof e.onComplete&&e.onComplete.call(h,k))}function d(a){var b=e.formatter.call(h,a,e);i.html(b)}var e=a.extend({},a.fn.countTo.defaults,{from:a(this).data("from"),to:a(this).data("to"),speed:a(this).data("speed"),refreshInterval:a(this).data("refresh-interval"),decimals:a(this).data("decimals")},b),f=Math.ceil(e.speed/e.refreshInterval),g=(e.to-e.from)/f,h=this,i=a(this),j=0,k=e.from,l=i.data("countTo")||{};i.data("countTo",l),l.interval&&clearInterval(l.interval),l.interval=setInterval(c,e.refreshInterval),d(k)})},a.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:b,onUpdate:null,onComplete:null}}(jQuery),function(a){"use strict";var b,c={action:function(){},runOnLoad:!1,duration:500},d=c,e=!1,f={};f.init=function(){for(var b=0;b<=arguments.length;b++){var c=arguments[b];switch(typeof c){case"function":d.action=c;break;case"boolean":d.runOnLoad=c;break;case"number":d.duration=c}}return this.each(function(){d.runOnLoad&&d.action(),a(this).resize(function(){f.timedAction.call(this)})})},f.timedAction=function(a,c){var f=function(){var a=d.duration;if(e){var c=new Date-b;if(a=d.duration-c,0>=a)return clearTimeout(e),e=!1,void d.action()}g(a)},g=function(a){e=setTimeout(f,a)};b=new Date,"number"==typeof c&&(d.duration=c),"function"==typeof a&&(d.action=a),e||f()},a.fn.afterResize=function(a){return f[a]?f[a].apply(this,Array.prototype.slice.call(arguments,1)):f.init.apply(this,arguments)}}(jQuery),function(a){a.extend({smoothScroll:function(){function a(){var a=!1;if(document.URL.indexOf("google.com/reader/view")>-1&&(a=!0),t.excluded){var b=t.excluded.split(/[,\n] ?/);b.push("mail.google.com");for(var c=b.length;c--;)if(document.URL.indexOf(b[c])>-1){r&&r.disconnect(),j("mousewheel",d),a=!0,u=!0;break}}a&&j("keydown",e),t.keyboardSupport&&!a&&i("keydown",e)}function b(){if(document.body){var b=document.body,c=document.documentElement,d=window.innerHeight,e=b.scrollHeight;if(y=document.compatMode.indexOf("CSS")>=0?c:b,q=b,a(),x=!0,top!=self)v=!0;else if(e>d&&(b.offsetHeight<=d||c.offsetHeight<=d)){var f=!1,g=function(){f||c.scrollHeight==document.height||(f=!0,setTimeout(function(){c.style.height=document.height+"px",f=!1},500))};c.style.height="auto",setTimeout(g,10);var h={attributes:!0,childList:!0,characterData:!1};if(r=new I(g),r.observe(b,h),y.offsetHeight<=d){var i=document.createElement("div");i.style.clear="both",b.appendChild(i)}}if(document.URL.indexOf("mail.google.com")>-1){var j=document.createElement("style");j.innerHTML=".iu { visibility: hidden }",(document.getElementsByTagName("head")[0]||c).appendChild(j)}else if(document.URL.indexOf("www.facebook.com")>-1){var k=document.getElementById("home_stream");k&&(k.style.webkitTransform="translateZ(0)")}t.fixedBackground||u||(b.style.backgroundAttachment="scroll",c.style.backgroundAttachment="scroll")}}function c(a,b,c,d){if(d||(d=1e3),l(b,c),1!=t.accelerationMax){var e=+new Date,f=e-D;if(f<t.accelerationDelta){var g=(1+30/f)/2;g>1&&(g=Math.min(g,t.accelerationMax),b*=g,c*=g)}D=+new Date}if(B.push({x:b,y:c,lastX:0>b?.99:-.99,lastY:0>c?.99:-.99,start:+new Date}),!C){var h=a===document.body,i=function(){for(var e=+new Date,f=0,g=0,j=0;j<B.length;j++){var k=B[j],l=e-k.start,m=l>=t.animationTime,n=m?1:l/t.animationTime;t.pulseAlgorithm&&(n=p(n));var o=k.x*n-k.lastX>>0,q=k.y*n-k.lastY>>0;f+=o,g+=q,k.lastX+=o,k.lastY+=q,m&&(B.splice(j,1),j--)}h?window.scrollBy(f,g):(f&&(a.scrollLeft+=f),g&&(a.scrollTop+=g)),b||c||(B=[]),B.length?H(i,a,d/t.frameRate+1):C=!1};H(i,a,0),C=!0}}function d(a){x||b();var d=a.target,e=h(d);if(!e||a.defaultPrevented||k(q,"embed")||k(d,"embed")&&/\.pdf/i.test(d.src))return!0;var f=a.wheelDeltaX||0,g=a.wheelDeltaY||0;return f||g||(g=a.wheelDelta||0),!t.touchpadSupport&&m(g)?!0:(Math.abs(f)>1.2&&(f*=t.stepSize/120),Math.abs(g)>1.2&&(g*=t.stepSize/120),c(e,-f,-g))}function e(a){var b=a.target,d=a.ctrlKey||a.altKey||a.metaKey||a.shiftKey&&a.keyCode!==A.spacebar;if(/input|textarea|select|embed/i.test(b.nodeName)||b.isContentEditable||a.defaultPrevented||d)return!0;if(k(b,"button")&&a.keyCode===A.spacebar)return!0;var e,f=0,g=0,i=h(q),j=i.clientHeight;switch(i==document.body&&(j=window.innerHeight),a.keyCode){case A.up:g=-t.arrowScroll;break;case A.down:g=t.arrowScroll;break;case A.spacebar:e=a.shiftKey?1:-1,g=-e*j*.9;break;case A.pageup:g=.9*-j;break;case A.pagedown:g=.9*j;break;case A.home:g=-i.scrollTop;break;case A.end:var l=i.scrollHeight-i.scrollTop-j;g=l>0?l+10:0;break;case A.left:f=-t.arrowScroll;break;case A.right:f=t.arrowScroll;break;default:return!0}c(i,f,g),a.preventDefault()}function f(a){q=a.target}function g(a,b){for(var c=a.length;c--;)E[G(a[c])]=b;return b}function h(a){var b=[],c=y.scrollHeight;do{var d=E[G(a)];if(d)return g(b,d);if(b.push(a),c===a.scrollHeight){if(!v||y.clientHeight+10<c)return g(b,document.body)}else if(a.clientHeight+10<a.scrollHeight&&(overflow=getComputedStyle(a,"").getPropertyValue("overflow-y"),"scroll"===overflow||"auto"===overflow))return g(b,a)}while(a=a.parentNode)}function i(a,b,c){window.addEventListener(a,b,c||!1)}function j(a,b,c){window.removeEventListener(a,b,c||!1)}function k(a,b){return(a.nodeName||"").toLowerCase()===b.toLowerCase()}function l(a,b){a=a>0?1:-1,b=b>0?1:-1,(w.x!==a||w.y!==b)&&(w.x=a,w.y=b,B=[],D=0)}function m(a){if(a){a=Math.abs(a),z.push(a),z.shift(),clearTimeout(F);var b=z[0]==z[1]&&z[1]==z[2],c=n(z[0],120)&&n(z[1],120)&&n(z[2],120);return!(b||c)}}function n(a,b){return Math.floor(a/b)==a/b}function o(a){var b,c,d;return a*=t.pulseScale,1>a?b=a-(1-Math.exp(-a)):(c=Math.exp(-1),a-=1,d=1-Math.exp(-a),b=c+d*(1-c)),b*t.pulseNormalize}function p(a){return a>=1?1:0>=a?0:(1==t.pulseNormalize&&(t.pulseNormalize/=o(1)),o(a))}var q,r,s={frameRate:60,animationTime:700,stepSize:120,pulseAlgorithm:!0,pulseScale:10,pulseNormalize:1,accelerationDelta:20,accelerationMax:1,keyboardSupport:!0,arrowScroll:50,touchpadSupport:!0,fixedBackground:!0,excluded:""},t=s,u=!1,v=!1,w={x:0,y:0},x=!1,y=document.documentElement,z=[120,120,120],A={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36},B=[],C=!1,D=+new Date,E={};setInterval(function(){E={}},1e4);var F,G=function(){var a=0;return function(b){return b.uniqueID||(b.uniqueID=a++)}}(),H=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||function(a,b,c){window.setTimeout(a,c||1e3/60)}}(),I=window.MutationObserver||window.WebKitMutationObserver;i("mousedown",f),i("mousewheel",d),i("load",b)}}),navigator.userAgent.toLowerCase().indexOf("chrome")>-1&&a.smoothScroll()}(jQuery);
// Theme
window.theme = {};

// Menu
(function(theme, $) {

	theme = theme || {};

	var initialized = false;

	$.extend(theme, {

		Nav: {

			defaults: {
				wrapper: $('#mainMenu'),
				mobileMenuScroll: true,
				fixParentItems: true,
				scrollDelay: 600,
				scrollAnimation: 'easeOutQuad'
			},

			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}

				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, this.$wrapper.data('plugin-options'));

				return this;
			},

			build: function() {
				// Responsive Menu Events
				this.responsiveNavFixes();

				// Mega Menu
				this.megaMenu();

				// Scroll to Current Item
				this.mobileMenuScroll();

				// Withput Submenu
				this.fixParentItems();

				return this;
			},

			events: function() {
				var self = this;

				// Mobile Redirect - (Avoid the Dropdown from Bootstrap)
				$('.mobile-redirect').on('click', function() {
					if ($(window).width() < 991) {
						self.location = $(this).attr('href');
					}
				});

				// Anchors Position
				$('[data-hash]').on('click', function(e) {
					e.preventDefault();

					$('body').addClass('scrolling');
					var target = $(this).attr('href')
						delay = 0;

					if($(document).scrollTop() == 0) {
						$(document).scrollTop($('#header').height());
						delay = 200;
					}

					setTimeout(function() {

						if ($(window).width() < 991 && $('.nav-main-collapse').hasClass('in')) {
							$('.nav-main-collapse').collapse('hide');
							self.scrollToTarget(target);
							return this;
						}

						self.scrollToTarget(target);

					}, 200);

					return this;
				});

				return this;
			},

			scrollToTarget: function(target) {
				var self = this,
					header = $('#header'),
					headerHeight = header.height(),
					topGap = headerHeight;

				$('html, body').animate({
					scrollTop: $(target).offset().top - topGap
				}, self.options.scrollDelay, self.options.scrollAnimation, function() {
					$('body').removeClass('scrolling');
				});

				return this;
			},

			responsiveNavFixes: function() {
				var self = this,
					addActiveClass = false;

				self.$wrapper.find('.dropdown-toggle[href]:not([href=#])').each(function() {
					$(this)
						.addClass('disabled')
						.parent()
						.prepend(
							$('<a />')
								.addClass('dropdown-toggle extra')
								.attr('href', '#')
								.append(
									$('<i />')
										.addClass('fa fa-caret-down')
								)
						);
				});

				self.$wrapper.find('li.dropdown > a:not(.disabled), li.dropdown-submenu > a:not(.disabled)').on('click', function(e) {

					e.preventDefault();

					if ($(window).width() > 991) {
						return this;
					}

					addActiveClass = $(this).parent().hasClass('resp-active');

					self.$wrapper.find('.resp-active').removeClass('resp-active');

					if (!addActiveClass) {
						$(this).parents('li').addClass('resp-active');
					}

					return this;

				});
			},

			megaMenu: function() {
				$(document).on('click', '.mega-menu .dropdown-menu', function(e) {
					e.stopPropagation()
				});
			},

			mobileMenuScroll: function() {
				var self = this;

				this.$wrapper.find('> li > a:not(.disabled)').on('click', function() {
					if ($(window).width() < 991 && self.options.mobileMenuScroll && !$('body').hasClass('sticky-menu-active') && !$('#header').hasClass('fixed')) {
						$('html, body').animate({
							scrollTop: $(this).offset().top
						}, 600, 'easeOutQuad');
					}
				});
			},

			fixParentItems: function() {
				if (!this.options.fixParentItems) {
					return this;
				}

				this.$wrapper.find('> li.dropdown').each(function() {
					if (!$(this).find('ul').get(0)) {
						$(this).removeClass('dropdown');
						$(this).find('.dropdown-toggle').removeClass('dropdown-toggle');
					}
				});
			}

		}

	});

}).apply(this, [window.theme, jQuery]);


// Sticky Menu
(function(theme, $) {

	theme = theme || {};

	var initialized = false;

	$.extend(theme, {

		StickyMenu: {

			defaults: {
				wrapper: $('#header'),
				stickyEnabled: true,
				stickyEnableOnBoxed: true,
				stickyEnableOnMobile: true,
				stickyWithGap: true,
				stickyChangeLogoSize: true,
				stickyBodyPadding: true,
				menuAfterHeader: false,
				alwaysStickyEnabled: false,
				logoPaddingTop: 28,
				logoSmallWidth: 82,
				logoSmallHeight: 40
			},

			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}

				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, this.$wrapper.data('plugin-options'));

				return this;
			},

			build: function() {
				if (!this.options.stickyEnableOnBoxed && $('body').hasClass('boxed') || !this.options.stickyEnabled) {
					return this;
				}

				var self = this,
					$body = $('body'),
					$header = self.$wrapper,
					$headerContainer = $header.parent(),
					$headerNavItems = $header.find('ul.nav-main > li > a'),
					$logoWrapper = $header.find('.logo'),
					$logo = $logoWrapper.find('img'),
					logoWidth = $logo.attr('width'),
					logoHeight = $logo.attr('height'),
					logoPaddingTop = parseInt($logo.attr('data-sticky-padding') ? $logo.attr('data-sticky-padding') : self.options.logoPaddingTop),
					logoSmallWidth = parseInt($logo.attr('data-sticky-width') ? $logo.attr('data-sticky-width') : self.options.logoSmallWidth),
					logoSmallHeight = parseInt($logo.attr('data-sticky-height') ? $logo.attr('data-sticky-height') : self.options.logoSmallHeight),
					headerHeight = $header.height(),
					stickyGap = 0;

				if (this.options.menuAfterHeader) {
					$headerContainer.css('min-height', $header.height());
				}

				$(window).afterResize(function() {
					$headerContainer.css('min-height', $header.height());
				});

				self.checkStickyMenu = function() {

					if ((!self.options.stickyEnableOnBoxed && $body.hasClass('boxed')) || ($(window).width() < 991 && !self.options.stickyEnableOnMobile)) {
						self.stickyMenuDeactivate();
						$header.removeClass('fixed')
						return false;
					}

					if (self.options.stickyWithGap) {
						stickyGap = ((headerHeight - 15) - logoSmallHeight);
					} else {
						stickyGap = 0;
					}

					// Menu After Header
					if (!this.options.menuAfterHeader) {

						if ($(window).scrollTop() > stickyGap) {
							self.stickyMenuActivate();
						} else {
							self.stickyMenuDeactivate();
						}

					} else {

						if ($(window).scrollTop() > $headerContainer.offset().top) {
							$header.addClass('fixed');
						} else {
							$header.removeClass('fixed');
						}

					}

				}

				self.stickyMenuActivate = function() {

					if ($body.hasClass('sticky-menu-active')) {
						return false;
					}

					$logo.stop(true, true);

					$body.addClass('sticky-menu-active').removeClass('sticky-menu-deactive');

					if (self.options.stickyBodyPadding) {
						$body.css('padding-top', headerHeight);
					}

					// Flat Menu Items
					if ($header.hasClass('flat-menu')) {
						$headerNavItems.addClass('sticky-menu-active');
					}

					if (self.options.stickyChangeLogoSize) {

						$logoWrapper.addClass('logo-sticky-active');

						$logo.animate({
							width: logoSmallWidth,
							height: logoSmallHeight,
							top: logoPaddingTop + 'px'
						}, 200, function() {
							$.event.trigger({
								type: "stickyMenu.active"
							});
						});

					}

				}

				self.stickyMenuDeactivate = function() {

					if ($body.hasClass('sticky-menu-active')) {

						$body.removeClass('sticky-menu-active').addClass('sticky-menu-deactive');

						if (self.options.stickyBodyPadding) {
							$body.css('padding-top', 0);


						}

						// Flat Menu Items
						if ($header.hasClass('flat-menu')) {
							$headerNavItems.removeClass('sticky-menu-active');
						}

						if (self.options.stickyChangeLogoSize) {

							$logoWrapper.removeClass('logo-sticky-active');

							$logo.animate({
								width: logoWidth,
								height: logoHeight,
								top: '0px'
							}, 200, function() {
								$.event.trigger({
									type: "stickyMenu.deactive"
								});
							});

						}

					}

				}

				if (!self.options.alwaysStickyEnabled) {

					$body.addClass('sticky-menu-deactive');

					self.checkStickyMenu();

				} else {

					$body.addClass('sticky-menu-active always-sticky').removeClass('sticky-menu-deactive');

					if (self.options.stickyBodyPadding) {
						$body.css('padding-top', headerHeight);
					}

				}

				return this;
			},

			events: function() {
				var self = this;

				if (!this.options.stickyEnableOnBoxed && $('body').hasClass('boxed') || !this.options.stickyEnabled) {
					return this;
				}

				if (!self.options.alwaysStickyEnabled) {
					$(window).on('scroll resize', function() {
						self.checkStickyMenu();
					});
				}

				return this;
			}

		}

	});

}).apply(this, [window.theme, jQuery]);


// Account
(function(theme, $) {

	theme = theme || {};

	var initialized = false;

	$.extend(theme, {

		Account: {

			defaults: {
				wrapper: $('#headerAccount')
			},

			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}

				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);

				this
					.setOptions(opts)
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, this.$wrapper.data('plugin-options'));

				return this;
			},

			events: function() {
				var self = this;

				self.$wrapper.find('input').on('focus', function() {
					self.$wrapper.addClass('open');

					$(document).mouseup(function(e) {
						if (!self.$wrapper.is(e.target) && self.$wrapper.has(e.target).length === 0) {
							self.$wrapper.removeClass('open');
						}
					});
				});

				$('#headerSignUp').on('click', function(e) {
					e.preventDefault();
					self.$wrapper.addClass('signup').removeClass('signin').removeClass('recover');
					self.$wrapper.find('.signup-form input:first').focus();
				});

				$('#headerSignIn').on('click', function(e) {
					e.preventDefault();
					self.$wrapper.addClass('signin').removeClass('signup').removeClass('recover');
					self.$wrapper.find('.signin-form input:first').focus();
				});

				$('#headerRecover').on('click', function(e) {
					e.preventDefault();
					self.$wrapper.addClass('recover').removeClass('signup').removeClass('signin');
					self.$wrapper.find('.recover-form input:first').focus();
				});

				$('#headerRecoverCancel').on('click', function(e) {
					e.preventDefault();
					self.$wrapper.addClass('signin').removeClass('signup').removeClass('recover');
					self.$wrapper.find('.signin-form input:first').focus();
				});
			}

		}

	});

}).apply(this, [window.theme, jQuery]);


// Commom Partials
(function($) {

	'use strict';

	// Sticky Menu
	if (typeof theme.StickyMenu !== 'undefined') {
		theme.StickyMenu.initialize();
	}

	// Nav Menu
	if (typeof theme.Nav !== 'undefined') {
		theme.Nav.initialize();
	}

		// Account
	if (typeof theme.Account !== 'undefined') {
		theme.Account.initialize();
	}

}).apply(this, [jQuery]);



/* Active Class for Menu */
$(function() {
	 var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
	 $("#header nav ul li a").each(function(){
		  if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
			  $(this).addClass("active");
			  var parent = $(this).parents('.dropdown');
			  $("#header nav ul li").removeClass('active');
			  $(parent).addClass('active');
		  }
	 })
});
