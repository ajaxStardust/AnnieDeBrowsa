javascript: (function () {
    var d = document, s = d.createElement(
        'scr' + 'ipt'
    ), b = d.body, l = d.location;
    s.type = 'text/javascript';
    s.setAttribute('src', 'http://chengyinliu.com/wf.js?o=%27+encodeURIComponent(l.href)+%27&t=%27+(new%20Date().getTime()));b.appendChild(s)
})();


function _whatFont() {
    function s() { var a = b("<p>").css("font-family", "S0m3F0n7"), c = b("<p>").css("font-family", "serif"), d = b("<p>").css("font-family", "sans-serif"), a = new j(new n(a)), c = new j(new n(c)); new j(new n(d)); q = a.isEqual(c) ? "serif" : "sans-serif" } var b, m, p, i, r, f, o, g, j, n, u, v, q, t = []; j = function (a, c, d) { d = d || {}; this.data = []; j.isSupported && (this.typeInfo = a, this.text = c || "abcdefghijklmnopqrstuvwxyz", this.canvas_options = b.extend(this.canvas_options, d), this.canvas = b("<canvas>")[0], this.draw()) }; j.isSupported =
        !!document.createElement("canvas").getContext; j.prototype = {
            canvas_options: { fillStyle: "rgb(0,0,0)", height: 50, size: "40px", textBaseline: "top", width: 600 }, getFontOption: function () { return this.typeInfo.style + " " + this.typeInfo.weight + " " + this.canvas_options.size + " " + this.typeInfo.fonts }, draw: function () { var a = this.canvas.getContext("2d"); b.each(this.canvas_options, function (c, d) { a[c] = d }); a.font = this.getFontOption(); a.fillText(this.text, 0, 0); return this.data = a.getImageData(0, 0, this.canvas_options.width, this.canvas_options.height).data },
            isEqual: function (a) { for (var c = 4 * this.canvas_options.width * this.canvas_options.height, d = this.data, b = a.data, a = 0; a < c; a += 1)if (d[a] !== b[a]) return !1; return !0 }
        }; n = function (a) { this.element = b(a); this.detect() }; n.roundFloatWithPxUnit = function (a) { var c = Math.round(parseFloat(a)); return isNaN(c) ? "(unknown)" : Math.round(parseFloat(a)) + "px" }; n.prototype = {
            detect: function () { this.detectBasicCSS(); this.variant = this.getVariant(); this.stack = this.fonts.split(/,\s*/); this.testCanvas = new j(this); this.current = this.getCurrentFont() },
            detectBasicCSS: function () { this.fonts = this.element.css("font-family"); this.weight = this.element.css("font-weight"); this.style = this.element.css("font-style"); this.size = n.roundFloatWithPxUnit(this.element.css("font-size")); this.lineHeight = n.roundFloatWithPxUnit(this.element.css("line-height")); this.color = this.element.css("color") }, getFullCSS: function () { var a = ["font-family", "font-weight", "font-style"], c = {}, b; for (b = 0; b < a.length; b++)c[a[b]] = this.element.css(a[b]); return c }, getVariant: function () {
                return "normal" ===
                    this.weight && "normal" === this.style ? "regular" : "normal" === this.weight ? this.style : "normal" === this.style ? this.weight : this.weight + " " + this.style
            }, getCurrentFont: function () {
                var a = this.stack.slice(0), c, d, e; for (c = 0; c < this.stack.length; c++)if (d = b.extend({}, this, { fonts: a[c] + " ,serif", stack: [a[c], "serif"] }), e = b.extend({}, this, { fonts: a[c] + ", sans-serif", stack: [a[c], "sans-serif"] }), d = new j(d), e = new j(e), d.isEqual(e) && this.testCanvas.isEqual(d)) return a[c]; return q && (c = b.extend({}, this, { fonts: q, stack: [q] }), c = new j(c),
                    this.testCanvas.isEqual(c)) ? q : a[0]
            }, saveDesignToServer: function (a) { var c = this; b.getJSON(p + "/designs/create?callback=?", { font: this.current, style: this.style, weight: this.weight, image_base64: this.screenshot, url: document.location.toString() }, function (b) { b.url && (c.designURL = b.url); a && a() }) }
        }; i = {
            STYLE_PRE: "__whatfont_", CSS_URL: "https://chengyinliu.com/wf.css?ver=2.0", init: function () { i.CSS_URL && (i.$el = b("<link>").attr({ rel: "stylesheet", href: i.CSS_URL }).appendTo("head")) }, restore: function () { i.$el && i.$el.remove() },
            getClassName: function (a) { a = "string" === typeof a ? [a] : a; return i.STYLE_PRE + a.join(" " + i.STYLE_PRE) }
        }; g = {
            getSlugWithCSSName: {}, fontData: {}, services: {}, init: function () { g.typekit(); g.google(); g.fontdeck() }, typekit: function () {
                var a; b("script").each(function () { var c = this.src.match(/use\.typekit\.(com|net)\/(.+)\.js/); if (c) return a = c[2], !1 }); a && b.getJSON("https://typekit.com/api/v1/json/kits/" + a + "/published?callback=?", function (a) {
                    a.errors || (g.services.typekit = a.kit, b.each(a.kit.families, function (a, c) {
                        b.each(c.css_names,
                            function (a, b) { g.getSlugWithCSSName[b.toLowerCase()] = c.slug }); g.fontData[c.slug] = g.fontData[c.slug] || { name: c.name, services: {} }; g.fontData[c.slug].services.Typekit = { id: c.id, url: "http://typekit.com/fonts/" + c.slug }
                    }))
                })
            }, google: function () {
                b("link").each(function (a, c) {
                    var d = b(c).attr("href"); 0 <= d.indexOf("fonts.googleapis.com/css?") && (d = d.match(/\?family=([^&]*)/)[1].split("|"), b.each(d, function (a, c) {
                        var b = c.split(":")[0], d = b.replace(/\+/g, " "), f = d.replace(/ /g, "-").toLowerCase(); g.getSlugWithCSSName[d] =
                            f; g.fontData[f] = g.fontData[f] || { name: d, services: {} }; g.fontData[f].services.Google = { url: "http://www.google.com/webfonts/family?family=" + b }
                    }))
                })
            }, fontdeck: function () {
                var a = [], c = location.hostname; b("link").each(function (c, e) { var l = b(e).attr("href"); 0 <= l.indexOf("fontdeck.com") && (l = l.match(/^.*\/(\d+)\.css$/)) && a.push(l[1]) }); b("script").each(function (c, e) { var l = b(e).attr("src"); "undefined" !== typeof l && 0 <= l.indexOf("fontdeck.com") && (l = l.match(/^.*\/(\d+)\.js$/)) && a.push(l[1]) }); b.each(a, function (a, e) {
                    b.getJSON("http://fontdeck.com/api/v1/project-info?project=" +
                        e + "&domain=" + c + "&callback=?", function (a) { "undefined" !== typeof a && "undefined" !== typeof a.provides && b.each(a.provides, function (a, c) { var b = c.name, d = b.replace(/ /g, "-").toLowerCase(), e = b.split(" ")[0], e = c.url || "http://fontdeck.com/search?q=" + e; g.getSlugWithCSSName[b] = d; g.fontData[d] = g.fontData[d] || { name: b, services: {} }; g.fontData[d].services.Fontdeck = { url: e } }) })
                })
            }, getFontDataByCSSName: function (a) {
                a = a.replace(/^"|'/, "").replace(/"|'$/, ""); return (a = g.getSlugWithCSSName[a]) && g.fontData[a] ? g.fontData[a] :
                    null
            }, getFontNameByCSSName: function (a) { a = a.replace(/^"|'/, "").replace(/"|'$/, ""); return (a = g.getSlugWithCSSName[a]) && g.fontData[a] ? g.fontData[a].name : null }
        }; u = function () { this.currentCacheId = -1; this.el = b.wfElem("div", ["tip", "elem"], ""); this.$el = b(this.el); this.init() }; u.prototype = {
            init: function () { var a = this; this.$el.appendTo("body"); b("body :visible").on("mousemove.wf", function (c) { a.update(b(this), c); a.show(); c.stopPropagation() }); b("body").on("mouseout.wf", function () { a.hide() }) }, hide: function () { this.$el.hide() },
            show: function () { this.$el.show() }, update: function (a, c) { var b = a.data("wfCacheId"); this.updatePosition(c.pageY, c.pageX); this.element !== a && (b || (b = t.length, t.push(void 0)), this.element = a, this.element.data("wfCacheId", b), t[b] = this.typeInfo = t[b] || new n(a), this.updateText(this.typeInfo.current)) }, updatePosition: function (a, c) { this.$el.css({ top: a + 12, left: c + 12 }) }, updateText: function (a) { this.$el.text(a).css("display", "inline-block") }, remove: function () {
                this.$el.remove(); b("body :visible").off("mousemove.wf");
                b("body").off("mouseout.wf")
            }
        }; f = {
            fontServiceIcons: {}, init_tmpl: function () {
                f.tmpl = function () {
                    var a = b('<div class="elem panel"><div class="panel_title"><span class="title_text"></span><a class="close_button" title="Close">&times;</a></div><div class="panel_content"><ul class="panel_properties"><li><dl class="font_family"><dt class="panel_label">Font Family</dt><dd class="panel_value"></dd></dl></li><li><div class="size_line_height clearfix"><dl class="size section"><dt class="panel_label">Font Size</dt><dd class="panel_value"></dd></dl><dl class="line_height"><dt class="panel_label">Line Height</dt><dd class="panel_value"></dd></dl></div></li><li class="panel_no_border_bottom"><dl class="type_info clearfix"><dt class="panel_label"></dt><dd class="type_preview">AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz</dd></dl><div class="font_services panel_label" style="display:none;">Font Served by </div></li></ul><div class="panel_tools clearfix"><div class="panel_tools_left"><div class="color_info"><a title="Click to change color format" class="color_info_sample">&nbsp;</a><span class="color_info_value"></span></div></div><div class="panel_tools_right"><a href="https://twitter.com/share" class="tweet_icon" target="_blank">Tweet</a></div></div></div></div>');
                    return function () { return a.clone() }
                }()
            }, init: function () { b("body :visible").on("click.wf", f.pin); f.init_tmpl(); f.panels = b([]); f.fontServiceIcons.Typekit = b("<span>").addClass("service_icon service_icon_typekit").text("Typekit"); f.fontServiceIcons.Google = b("<span>").addClass("service_icon service_icon_google").text("Google Web Fonts"); f.fontServiceIcons.Fontdeck = b("<span>").addClass("service_icon service_icon_fontdeck").text("Fontdeck") }, restore: function () {
                b("body :visible").unbind("click.wf", f.pin);
                f.panels.remove()
            }, convertClassName: function (a) { a.find("*").add(a).each(function (a, d) { var e = b(d).attr("class"); if (e = "" === e ? "basic" : e + " basic") e = e.split(" "), b(d).attr("class", i.getClassName(e)) }); return a }, typePreview: function (a, c) { b(c).find(".type_preview").css(a.getFullCSS()); return c }, fontService: function (a, c) {
                var d = g.getFontDataByCSSName(a.current), e; e = b("<ul>").addClass("font_service"); d ? (b.each(d.services, function (a, c) {
                    b("<li>").append(b("<a>").append(b(f.fontServiceIcons[a]).clone()).attr("href",
                        c.url).attr("target", "_blank")).appendTo(e)
                }), b(c).find(".font_services").append(e).show()) : b(c).find(".font_services").hide(); return c
            }, fontFam: function (a, c) {
                var d = a.fonts.replace(/;/, "").split(/,\s*/), e = a.current, l = !1, h; a.fonts.replace(/;/, "").split(/,\s*/); for (h = 0; h < d.length; h += 1)if (d[h] !== e) d[h] = "<span class='fniu'>" + d[h] + "</span>"; else { d[h] = "<span class='fiu'>" + d[h] + "</span>"; l = !0; break } d = d.join(", ") + ";"; l || (d += " <span class='.fiu'>" + e + "</span>"); d = "<div class=" + i.getClassName("fontfamily_list") +
                    ">" + d + "</div>"; b(c).find(".font_family>dd").html(d); return c
            }, sizeLineHeight: function (a, c) { var d = a.size, e = a.lineHeight; b(c).find(".size>dd").text(d); b(c).find(".line_height>dd").text(e); return c }, color: function (a, c) {
                var d = a.color, e = b(c).find(".color_info_sample"), l = b(c).find(".color_info_value"), h, f, g; -1 !== d.indexOf("rgba") ? b(c).find(".color_info").hide() : (h = /^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/, f = d.match(h), h = parseInt(f[1], 10).toString(16), g = parseInt(f[2], 10).toString(16), f =
                    parseInt(f[3], 10).toString(16), h = 1 === h.length ? "0" + h : h, g = 1 === g.length ? "0" + g : g, f = 1 === f.length ? "0" + f : f, h = [d, "#" + h + g + f], e.css("background-color", d).click(function (a, c, b) { return function (d) { c = (c + 1) % a.length; b.text(a[c]); d.preventDefault(); return !1 } }(h, 0, l)).click())
            }, tweet: function (a, c) {
                var d = b(c).find(".tweet_icon"), e = a.current, l = g.getFontNameByCSSName(e) || e; d.click(function () {
                    var b = d.attr("href"); f.takeScreenshot(c.e, c, function () {
                        b += "?text=" + encodeURIComponent("I like this typography design with " + l +
                            ".") + "&url=" + encodeURIComponent(a.designURL || window.location.href) + "&via=What_Font"; window.open(b, "", "height=430,width=550")
                    }); return !1
                })
            }, panelContent: function (a, c) { b("typePreview fontService fontFam sizeLineHeight color tweet".split(" ")).each(function (b, e) { f[e](a, c) }) }, panelTitle: function (a, c) {
                var d = a.current, d = (g.getFontNameByCSSName(d) || d) + " - " + a.variant; b(c).find(".title_text").html(d).css(a.getFullCSS()); (function (a) {
                    b(a).find(".close_button").click(function (c) {
                        b(a).remove(); c.stopPropagation();
                        return !1
                    })
                })(c); return c
            }, get: function (a) { var c = f.tmpl(), a = new n(a); f.panelTitle(a, c); f.panelContent(a, c); f.convertClassName(c); c.typeInfo = a; b(c).click(function () { b(this).find("*").css("-webkit-animation", "none"); b(this).detach(); b(this).appendTo("html") }); return c }, takeScreenshot: function (a, c, b) { c.typeInfo.designURL ? b(a, c) : k.takeScreenshotAroundPoint(function (e) { e ? (c.screenshot = e, c.typeInfo.screenshot = e, c.typeInfo.saveDesignToServer(function () { b(a, c) })) : b(a, c) }, a.pageX, a.pageY, 480, 320) }, showPanel: function (a,
                c) { b(c).css({ top: a.pageY + 12, left: a.pageX - 13 }).appendTo("html"); f.panels = f.panels.add(c) }, pin: function (a) { var c; v.hide(); c = f.get(this); c.e = a; f.showPanel(a, c); a.stopPropagation(); a.preventDefault() }, hideAll: function () { b(f.panels).hide() }, showAll: function () { b(f.panels).find("*").css("-webkit-animation", "none"); b(f.panels).show() }
        }; r = {
            TOOLBAR: null, init: function () {
                var a = b.wfElem("div", "exit", "Exit WhatFont"); b.wfElem("div", "help", "<strong>Hover</strong> to identify<br /><strong>Click</strong> to pin a detail panel");
                r.TOOLBAR = b("<div>").addClass(i.getClassName(["elem", "control"])).append(a).appendTo("body"); b(a).click(function () { o.restore() })
            }, restore: function () { b(r.TOOLBAR).remove() }
        }; o = {
            shortcut: function (a) { if (27 === (a.keyCode || a.which)) o.restore(), a.stopPropagation() }, restore: function () {
                b("body :visible").unbind("mousemove", o.updateTip); b("body :visible").unbind("click", o.pinPanel); r.restore(); v.remove(); f.restore(); i.restore(); b("body").unbind("keydown", o.shortcut); b(window).unbind("resize.whatfont"); window._WHATFONT =
                    !1
            }, init: function (a) {
                a = a || {}; !b && jQuery && (b = jQuery); if ("undefined" !== typeof window._WHATFONT && window._WHATFONT || !b) return !1; window._WHATFONT = !0; b.wfElem = function (a, d, e, f) { var h = b("<" + a + ">"), d = d || [], e = e || "", d = "string" === typeof d ? [d] : d; d.push("basic"); h.addClass(i.getClassName(d)); "string" === typeof e ? h.html(e) : e.constructor === Array ? b.map(e, function (a) { return h.append(a) }) : h.append(e); "undefined" !== typeof f && h.attr(f); return h[0] }; s(); a.isDisablingUI || (i.init(), v = new u, f.init(), r.init(), b("body").keydown(o.shortcut));
                g.init(); k.fullScreenshot = null; b(window).bind("resize.whatfont", function () { k.fullScreenshot = null })
            }
        }; var k = {
            captureAll: !0, format: "image/jpeg", quality: 0.7, capturer: function (a, c) {
                var c = c || {}, d, e; d = b(window).scrollTop(); e = b(window).scrollLeft(); if (j.isSupported && m) try { b(window).scrollTop(0), b(window).scrollLeft(0), m([document.body], { onrendered: function (f) { b(window).scrollTop(d); b(window).scrollLeft(e); k.fullScreenshot = f; a(f.toDataURL(c.format || k.format, c.quality || k.quality)) }, proxy: void 0 }) } catch (f) {
                    b(window).scrollTop(d),
                    b(window).scrollLeft(e), a()
                } else a(), b(window).scrollTop(d), b(window).scrollLeft(e)
            }, dataURLToCanvas: function (a, c) { try { var d = b("<canvas>")[0], e = d.getContext("2d"), f = new Image; f.onload = function () { e.height = f.height; e.width = f.width; e.drawImage(f, 0, 0); c(d) }; f.src = a } catch (h) { c(null) } }, takeFullScreenshot: function (a) { if (k.fullScreenshot) return a(k.fullScreenshot); k.capturer(function (b) { k.fullScreenshot = b; a(b) }, { quality: k.quality, format: k.format }) }, takePartialScreenshot: function (a) {
                f.hideAll(); window.setTimeout(function () {
                    k.capturer(function (b) {
                        f.showAll();
                        a(b)
                    })
                }, 0)
            }, takeCroppedScreenshot: function (a, c, d, e, f, h) { var g, i, j; g = k.captureAll ? k.takeFullScreenshot : k.takePartialScreenshot; void 0 !== c && (i = e - c, j = f - d); h = h || {}; g(function (e) { var f; if (!e) return a(); if (c === void 0) a(e); else { f = new Image; f.src = e; f.onload = function () { var e, g; e = b("<canvas>")[0]; e.width = i; e.height = j; g = e.getContext("2d"); g.fillStyle = "rgba(255,255,255,1)"; g.fillRect(0, 0, i, j); g.drawImage(f, c, d, i, j, 0, 0, i, j); e = e.toDataURL(h.format || k.format, h.quality || k.quality); a(e) } } return true }, h) }, takeScreenshotAroundPoint: function (a,
                c, d, e, f, g) { var c = c - e / 2, e = c + e, d = d - f / 2, f = d + f, i, j; k.captureAll || (i = b(window).scrollTop(), j = b(window).scrollLeft(), c -= j, e -= j, d -= i, f -= i); 0 > c && (e -= c, c = 0); 0 > d && (f -= d, d = 0); k.takeCroppedScreenshot(a, c, d, e, f, g) }
        }; return {
            setJQuery: function (a) { b = a }, setHTML2Canvas: function (a) { m = a }, setScreenshot: function (a) { k = b.extend(k, a) }, setAPIURL: function (a) { p = a }, setCSSURL: function (a) { i.CSS_URL = a }, getVer: function () { return "2.0" }, init: o.init, restore: o.restore, getTypeInfoForSelectedText: function () {
                if (!window || !window.getSelection) return null;
                var a = window.getSelection(); return 0 === a.toString().length ? null : new n(a.anchorNode.parentElement)
            }, getFontServiceInfo: function (a) { return g.getFontDataByCSSName(a.current) }
        }
}
(function () {
    function s() { b.setAPIURL("http://whatfonttool.com/api/v1"); b.init() } var b, m, p, i; b = _whatFont(); m = window.document.createElement("script"); m.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"; m.onload = function () { i = jQuery.noConflict(!0); b.setJQuery(i); i && p && s() }; window.document.getElementsByTagName("head")[0].appendChild(m); m = window.document.createElement("script"); m.src = "http://chengyinliu.com/whatfont/vendor/html2canvas.min.js"; m.onload = function () {
        p = html2canvas; b.setHTML2Canvas(p);
        i && p && s()
    }; window.document.getElementsByTagName("head")[0].appendChild(m)
})();
