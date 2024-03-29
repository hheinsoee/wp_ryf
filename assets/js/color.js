/*! Fast Average Color | © 2021 Denis Seleznev | MIT License | https://github.com/fast-average-color/fast-average-color */
!function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).FastAverageColor = t()
}(this, function() {
    "use strict";
    function o(e, t) {
        for (var r = 0; r < t.length; r++) {
            var n = t[r];
            n.enumerable = n.enumerable || !1,
            n.configurable = !0,
            "value"in n && (n.writable = !0),
            Object.defineProperty(e, n.key, n)
        }
    }
    function t(e) {
        e = e.toString(16);
        return 1 === e.length ? "0" + e : e
    }
    function i(e) {
        return "#" + e.map(t).join("")
    }
    function C(e, t, r) {
        for (var n = 0; n < r.length; n++)
            if (function(e, t, r) {
                switch (r.length) {
                case 3:
                    if (function(e, t, r) {
                        return 255 !== e[t + 3] || e[t] === r[0] && e[t + 1] === r[1] && e[t + 2] === r[2]
                    }(e, t, r))
                        return !0;
                    break;
                case 4:
                    if (function(e, t, r) {
                        if (e[t + 3] && r[3])
                            return e[t] === r[0] && e[t + 1] === r[1] && e[t + 2] === r[2] && e[t + 3] === r[3];
                        return e[t + 3] === r[3]
                    }(e, t, r))
                        return !0;
                    break;
                case 5:
                    if (function(e, t, r) {
                        var n = r[0]
                          , o = r[1]
                          , i = r[2]
                          , a = r[3]
                          , s = r[4]
                          , u = e[t + 3]
                          , r = c(u, a, s);
                        if (!a)
                            return r;
                        if (!u && r)
                            return !0;
                        if (c(e[t], n, s) && c(e[t + 1], o, s) && c(e[t + 2], i, s) && r)
                            return !0;
                        return !1
                    }(e, t, r))
                        return !0;
                    break;
                default:
                    return !1
                }
            }(e, t, r[n]))
                return 1
    }
    function c(e, t, r) {
        return t - r <= e && e <= t + r
    }
    function a(e, t, r) {
        for (var n = {}, o = r.ignoredColor, i = r.step, a = [0, 0, 0, 0, 0], s = 0; s < t; s += i) {
            var u, c = e[s], h = e[s + 1], d = e[s + 2], l = e[s + 3];
            o && C(e, s, o) || (n[u = Math.round(c / 24) + "," + Math.round(h / 24) + "," + Math.round(d / 24)] ? n[u] = [n[u][0] + c * l, n[u][1] + h * l, n[u][2] + d * l, n[u][3] + l, n[u][4] + 1] : n[u] = [c * l, h * l, d * l, l, 1],
            a[4] < n[u][4] && (a = n[u]))
        }
        var f = a[0]
          , g = a[1]
          , v = a[2]
          , m = a[3]
          , p = a[4];
        return m ? [Math.round(f / m), Math.round(g / m), Math.round(v / m), Math.round(m / p)] : r.defaultColor
    }
    function s(e, t, r) {
        for (var n = 0, o = 0, i = 0, a = 0, s = 0, u = r.ignoredColor, c = r.step, h = 0; h < t; h += c) {
            var d = e[h + 3]
              , l = e[h] * d
              , f = e[h + 1] * d
              , g = e[h + 2] * d;
            u && C(e, h, u) || (n += l,
            o += f,
            i += g,
            a += d,
            s++)
        }
        return a ? [Math.round(n / a), Math.round(o / a), Math.round(i / a), Math.round(a / s)] : r.defaultColor
    }
    function u(e, t, r) {
        for (var n = 0, o = 0, i = 0, a = 0, s = 0, u = r.ignoredColor, c = r.step, h = 0; h < t; h += c) {
            var d = e[h]
              , l = e[h + 1]
              , f = e[h + 2]
              , g = e[h + 3];
            u && C(e, h, u) || (n += d * d * g,
            o += l * l * g,
            i += f * f * g,
            a += g,
            s++)
        }
        return a ? [Math.round(Math.sqrt(n / a)), Math.round(Math.sqrt(o / a)), Math.round(Math.sqrt(i / a)), Math.round(a / s)] : r.defaultColor
    }
    function l(e) {
        return f(e, "defaultColor", [0, 0, 0, 0])
    }
    function f(e, t, r) {
        return void 0 === e[t] ? r : e[t]
    }
    var n = "FastAverageColor: ";
    function g(e, t, r) {
        e.silent || (console.error(n + t),
        r && console.error(r))
    }
    function h(e) {
        return Error(n + e)
    }
    return function() {
        function e() {
            !function(e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        var t, r, n;
        return t = e,
        (r = [{
            key: "getColorAsync",
            value: function(e, t) {
                if (!e)
                    return Promise.reject(h("call .getColorAsync() without resource."));
                if ("string" == typeof e) {
                    var r = new Image;
                    return r.crossOrigin = "",
                    r.src = e,
                    this._bindImageEvents(r, t)
                }
                if (e instanceof Image && !e.complete)
                    return this._bindImageEvents(e, t);
                t = this.getColor(e, t);
                return t.error ? Promise.reject(t.error) : Promise.resolve(t)
            }
        }, {
            key: "getColor",
            value: function(t, r) {
                var e = l(r = r || {});
                if (!t)
                    return g(r, "call .getColor(null) without resource."),
                    this.prepareResult(e);
                var n, o, i, a, s, u, c, h = function(e) {
                    if (e instanceof HTMLImageElement) {
                        var t = e.naturalWidth
                          , r = e.naturalHeight;
                        return {
                            width: t = !e.naturalWidth && -1 !== e.src.search(/\.svg(\?|$)/i) ? r = 100 : t,
                            height: r
                        }
                    }
                    return e instanceof HTMLVideoElement ? {
                        width: e.videoWidth,
                        height: e.videoHeight
                    } : {
                        width: e.width,
                        height: e.height
                    }
                }(t), n = (n = h,
                a = f(o = r, "left", 0),
                s = f(o, "top", 0),
                u = f(o, "width", n.width),
                c = f(o, "height", n.height),
                h = u,
                n = c,
                "precision" === o.mode || (c < u ? (i = u / c,
                h = 100,
                n = Math.round(h / i)) : (i = c / u,
                n = 100,
                h = Math.round(n / i)),
                (u < h || c < n || h < 10 || n < 10) && (h = u,
                n = c)),
                {
                    srcLeft: a,
                    srcTop: s,
                    srcWidth: u,
                    srcHeight: c,
                    destWidth: h,
                    destHeight: n
                });
                if (!(n.srcWidth && n.srcHeight && n.destWidth && n.destHeight))
                    return g(r, 'incorrect sizes for resource "'.concat(t.src, '".')),
                    this.prepareResult(e);
                if (!this._ctx && (this._canvas = "undefined" == typeof window ? new OffscreenCanvas(1,1) : document.createElement("canvas"),
                this._ctx = this._canvas.getContext && this._canvas.getContext("2d"),
                !this._ctx))
                    return g(r, "Canvas Context 2D is not supported in this browser."),
                    this.prepareResult(e);
                this._canvas.width = n.destWidth,
                this._canvas.height = n.destHeight;
                try {
                    this._ctx.clearRect(0, 0, n.destWidth, n.destHeight),
                    this._ctx.drawImage(t, n.srcLeft, n.srcTop, n.srcWidth, n.srcHeight, 0, 0, n.destWidth, n.destHeight);
                    var d = this._ctx.getImageData(0, 0, n.destWidth, n.destHeight).data
                      , e = this.getColorFromArray4(d, r)
                } catch (e) {
                    g(r, "security error (CORS) for resource ".concat(t.src, ".\nDetails: https://developer.mozilla.org/en/docs/Web/HTML/CORS_enabled_image"), e)
                }
                return this.prepareResult(e)
            }
        }, {
            key: "getColorFromArray4",
            value: function(e, t) {
                var r = e.length
                  , n = l(t = t || {});
                if (r < 4)
                    return n;
                var o, i = r - r % 4, r = 4 * (t.step || 1);
                switch (t.algorithm || "sqrt") {
                case "simple":
                    o = s;
                    break;
                case "sqrt":
                    o = u;
                    break;
                case "dominant":
                    o = a;
                    break;
                default:
                    throw h("".concat(t.algorithm, " is unknown algorithm."))
                }
                return o(e, i, {
                    defaultColor: n,
                    ignoredColor: (n = t.ignoredColor) && (Array.isArray(n) ? "number" == typeof n[0] ? [n.slice()] : n : [n]),
                    step: r
                })
            }
        }, {
            key: "prepareResult",
            value: function(e) {
                var t = e.slice(0, 3)
                  , r = [].concat(t, e[3] / 255)
                  , n = (299 * e[0] + 587 * e[1] + 114 * e[2]) / 1e3 < 128;
                return {
                    value: e,
                    rgb: "rgb(" + t.join(",") + ")",
                    rgba: "rgba(" + r.join(",") + ")",
                    hex: i(t),
                    hexa: i(e),
                    isDark: n,
                    isLight: !n
                }
            }
        }, {
            key: "destroy",
            value: function() {
                delete this._canvas,
                delete this._ctx
            }
        }, {
            key: "_bindImageEvents",
            value: function(a, s) {
                var u = this;
                return new Promise(function(t, r) {
                    function n() {
                        a.removeEventListener("load", e),
                        a.removeEventListener("error", o),
                        a.removeEventListener("abort", i)
                    }
                    var e = function() {
                        n();
                        var e = u.getColor(a, s);
                        e.error ? r(e.error) : t(e)
                    }
                      , o = function() {
                        n(),
                        r(h('Error loading image "'.concat(a.src, '".')))
                    }
                      , i = function() {
                        n(),
                        r(h('Image "'.concat(a.src, '" loading aborted.')))
                    };
                    a.addEventListener("load", e),
                    a.addEventListener("error", o),
                    a.addEventListener("abort", i)
                }
                )
            }
        }]) && o(t.prototype, r),
        n && o(t, n),
        e
    }()
});



function hexToHSL(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    r = parseInt(result[1], 16);
    g = parseInt(result[2], 16);
    b = parseInt(result[3], 16);
    r /= 255, g /= 255, b /= 255;
    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2;
    if (max == min) {
        h = s = 0; // achromatic
    } else {
        var d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        switch (max) {
            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
            case g: h = (b - r) / d + 2; break;
            case b: h = (r - g) / d + 4; break;
        }
        h /= 6;
    }
    var HSL = new Object();
    HSL['h'] = h * 360;
    HSL['s'] = s;
    HSL['l'] = l;
    return HSL;
}
