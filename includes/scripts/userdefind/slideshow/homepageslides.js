! function(e, t) {
    function n(e) {
        var t = e.length,
            n = ct.type(e);
        return ct.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }

    function i(e) {
        var t = kt[e] = {};
        return ct.each(e.match(dt) || [], function(e, n) {
            t[n] = !0
        }), t
    }

    function r(e, n, i, r) {
        if (ct.acceptData(e)) {
            var o, a, s = ct.expando,
                u = e.nodeType,
                l = u ? ct.cache : e,
                c = u ? e[s] : e[s] && s;
            if (c && l[c] && (r || l[c].data) || i !== t || "string" != typeof n) return c || (c = u ? e[s] = tt.pop() || ct.guid++ : s), l[c] || (l[c] = u ? {} : {
                toJSON: ct.noop
            }), ("object" == typeof n || "function" == typeof n) && (r ? l[c] = ct.extend(l[c], n) : l[c].data = ct.extend(l[c].data, n)), a = l[c], r || (a.data || (a.data = {}), a = a.data), i !== t && (a[ct.camelCase(n)] = i), "string" == typeof n ? (o = a[n], null == o && (o = a[ct.camelCase(n)])) : o = a, o
        }
    }

    function o(e, t, n) {
        if (ct.acceptData(e)) {
            var i, r, o = e.nodeType,
                a = o ? ct.cache : e,
                u = o ? e[ct.expando] : ct.expando;
            if (a[u]) {
                if (t && (i = n ? a[u] : a[u].data)) {
                    ct.isArray(t) ? t = t.concat(ct.map(t, ct.camelCase)) : t in i ? t = [t] : (t = ct.camelCase(t), t = t in i ? [t] : t.split(" ")), r = t.length;
                    for (; r--;) delete i[t[r]];
                    if (n ? !s(i) : !ct.isEmptyObject(i)) return
                }(n || (delete a[u].data, s(a[u]))) && (o ? ct.cleanData([e], !0) : ct.support.deleteExpando || a != a.window ? delete a[u] : a[u] = null)
            }
        }
    }

    function a(e, n, i) {
        if (i === t && 1 === e.nodeType) {
            var r = "data-" + n.replace(Et, "-$1").toLowerCase();
            if (i = e.getAttribute(r), "string" == typeof i) {
                try {
                    i = "true" === i ? !0 : "false" === i ? !1 : "null" === i ? null : +i + "" === i ? +i : St.test(i) ? ct.parseJSON(i) : i
                } catch (o) {}
                ct.data(e, n, i)
            } else i = t
        }
        return i
    }

    function s(e) {
        var t;
        for (t in e)
            if (("data" !== t || !ct.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
        return !0
    }

    function u() {
        return !0
    }

    function l() {
        return !1
    }

    function c() {
        try {
            return Q.activeElement
        } catch (e) {}
    }

    function h(e, t) {
        do e = e[t]; while (e && 1 !== e.nodeType);
        return e
    }

    function d(e, t, n) {
        if (ct.isFunction(t)) return ct.grep(e, function(e, i) {
            return !!t.call(e, i, e) !== n
        });
        if (t.nodeType) return ct.grep(e, function(e) {
            return e === t !== n
        });
        if ("string" == typeof t) {
            if (qt.test(t)) return ct.filter(t, e, n);
            t = ct.filter(t, e)
        }
        return ct.grep(e, function(e) {
            return ct.inArray(e, t) >= 0 !== n
        })
    }

    function f(e) {
        var t = Ut.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement)
            for (; t.length;) n.createElement(t.pop());
        return n
    }

    function p(e, t) {
        return ct.nodeName(e, "table") && ct.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }

    function m(e) {
        return e.type = (null !== ct.find.attr(e, "type")) + "/" + e.type, e
    }

    function g(e) {
        var t = on.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function v(e, t) {
        for (var n, i = 0; null != (n = e[i]); i++) ct._data(n, "globalEval", !t || ct._data(t[i], "globalEval"))
    }

    function y(e, t) {
        if (1 === t.nodeType && ct.hasData(e)) {
            var n, i, r, o = ct._data(e),
                a = ct._data(t, o),
                s = o.events;
            if (s) {
                delete a.handle, a.events = {};
                for (n in s)
                    for (i = 0, r = s[n].length; r > i; i++) ct.event.add(t, n, s[n][i])
            }
            a.data && (a.data = ct.extend({}, a.data))
        }
    }

    function b(e, t) {
        var n, i, r;
        if (1 === t.nodeType) {
            if (n = t.nodeName.toLowerCase(), !ct.support.noCloneEvent && t[ct.expando]) {
                r = ct._data(t);
                for (i in r.events) ct.removeEvent(t, i, r.handle);
                t.removeAttribute(ct.expando)
            }
            "script" === n && t.text !== e.text ? (m(t).text = e.text, g(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), ct.support.html5Clone && e.innerHTML && !ct.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && tn.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
        }
    }

    function w(e, n) {
        var i, r, o = 0,
            a = typeof e.getElementsByTagName !== X ? e.getElementsByTagName(n || "*") : typeof e.querySelectorAll !== X ? e.querySelectorAll(n || "*") : t;
        if (!a)
            for (a = [], i = e.childNodes || e; null != (r = i[o]); o++) !n || ct.nodeName(r, n) ? a.push(r) : ct.merge(a, w(r, n));
        return n === t || n && ct.nodeName(e, n) ? ct.merge([e], a) : a
    }

    function x(e) {
        tn.test(e.type) && (e.defaultChecked = e.checked)
    }

    function _(e, t) {
        if (t in e) return t;
        for (var n = t.charAt(0).toUpperCase() + t.slice(1), i = t, r = kn.length; r--;)
            if (t = kn[r] + n, t in e) return t;
        return i
    }

    function T(e, t) {
        return e = t || e, "none" === ct.css(e, "display") || !ct.contains(e.ownerDocument, e)
    }

    function C(e, t) {
        for (var n, i, r, o = [], a = 0, s = e.length; s > a; a++) i = e[a], i.style && (o[a] = ct._data(i, "olddisplay"), n = i.style.display, t ? (o[a] || "none" !== n || (i.style.display = ""), "" === i.style.display && T(i) && (o[a] = ct._data(i, "olddisplay", F(i.nodeName)))) : o[a] || (r = T(i), (n && "none" !== n || !r) && ct._data(i, "olddisplay", r ? n : ct.css(i, "display"))));
        for (a = 0; s > a; a++) i = e[a], i.style && (t && "none" !== i.style.display && "" !== i.style.display || (i.style.display = t ? o[a] || "" : "none"));
        return e
    }

    function k(e, t, n) {
        var i = yn.exec(t);
        return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t
    }

    function S(e, t, n, i, r) {
        for (var o = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0, a = 0; 4 > o; o += 2) "margin" === n && (a += ct.css(e, n + Cn[o], !0, r)), i ? ("content" === n && (a -= ct.css(e, "padding" + Cn[o], !0, r)), "margin" !== n && (a -= ct.css(e, "border" + Cn[o] + "Width", !0, r))) : (a += ct.css(e, "padding" + Cn[o], !0, r), "padding" !== n && (a += ct.css(e, "border" + Cn[o] + "Width", !0, r)));
        return a
    }

    function E(e, t, n) {
        var i = !0,
            r = "width" === t ? e.offsetWidth : e.offsetHeight,
            o = hn(e),
            a = ct.support.boxSizing && "border-box" === ct.css(e, "boxSizing", !1, o);
        if (0 >= r || null == r) {
            if (r = dn(e, t, o), (0 > r || null == r) && (r = e.style[t]), bn.test(r)) return r;
            i = a && (ct.support.boxSizingReliable || r === e.style[t]), r = parseFloat(r) || 0
        }
        return r + S(e, t, n || (a ? "border" : "content"), i, o) + "px"
    }

    function F(e) {
        var t = Q,
            n = xn[e];
        return n || (n = A(e, t), "none" !== n && n || (cn = (cn || ct("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (cn[0].contentWindow || cn[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = A(e, t), cn.detach()), xn[e] = n), n
    }

    function A(e, t) {
        var n = ct(t.createElement(e)).appendTo(t.body),
            i = ct.css(n[0], "display");
        return n.remove(), i
    }

    function D(e, t, n, i) {
        var r;
        if (ct.isArray(t)) ct.each(t, function(t, r) {
            n || En.test(e) ? i(e, r) : D(e + "[" + ("object" == typeof r ? t : "") + "]", r, n, i)
        });
        else if (n || "object" !== ct.type(t)) i(e, t);
        else
            for (r in t) D(e + "[" + r + "]", t[r], n, i)
    }

    function $(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var i, r = 0,
                o = t.toLowerCase().match(dt) || [];
            if (ct.isFunction(n))
                for (; i = o[r++];) "+" === i[0] ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
        }
    }

    function N(e, t, n, i) {
        function r(s) {
            var u;
            return o[s] = !0, ct.each(e[s] || [], function(e, s) {
                var l = s(t, n, i);
                return "string" != typeof l || a || o[l] ? a ? !(u = l) : void 0 : (t.dataTypes.unshift(l), r(l), !1)
            }), u
        }
        var o = {},
            a = e === Bn;
        return r(t.dataTypes[0]) || !o["*"] && r("*")
    }

    function L(e, n) {
        var i, r, o = ct.ajaxSettings.flatOptions || {};
        for (r in n) n[r] !== t && ((o[r] ? e : i || (i = {}))[r] = n[r]);
        return i && ct.extend(!0, e, i), e
    }

    function M(e, n, i) {
        for (var r, o, a, s, u = e.contents, l = e.dataTypes;
            "*" === l[0];) l.shift(), o === t && (o = e.mimeType || n.getResponseHeader("Content-Type"));
        if (o)
            for (s in u)
                if (u[s] && u[s].test(o)) {
                    l.unshift(s);
                    break
                }
        if (l[0] in i) a = l[0];
        else {
            for (s in i) {
                if (!l[0] || e.converters[s + " " + l[0]]) {
                    a = s;
                    break
                }
                r || (r = s)
            }
            a = a || r
        }
        return a ? (a !== l[0] && l.unshift(a), i[a]) : void 0
    }

    function j(e, t, n, i) {
        var r, o, a, s, u, l = {},
            c = e.dataTypes.slice();
        if (c[1])
            for (a in e.converters) l[a.toLowerCase()] = e.converters[a];
        for (o = c.shift(); o;)
            if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c.shift())
                if ("*" === o) o = u;
                else if ("*" !== u && u !== o) {
            if (a = l[u + " " + o] || l["* " + o], !a)
                for (r in l)
                    if (s = r.split(" "), s[1] === o && (a = l[u + " " + s[0]] || l["* " + s[0]])) {
                        a === !0 ? a = l[r] : l[r] !== !0 && (o = s[0], c.unshift(s[1]));
                        break
                    }
            if (a !== !0)
                if (a && e["throws"]) t = a(t);
                else try {
                    t = a(t)
                } catch (h) {
                    return {
                        state: "parsererror",
                        error: a ? h : "No conversion from " + u + " to " + o
                    }
                }
        }
        return {
            state: "success",
            data: t
        }
    }

    function P() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function I() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }

    function O() {
        return setTimeout(function() {
            Jn = t
        }), Jn = ct.now()
    }

    function H(e, t, n) {
        for (var i, r = (oi[t] || []).concat(oi["*"]), o = 0, a = r.length; a > o; o++)
            if (i = r[o].call(n, t, e)) return i
    }

    function z(e, t, n) {
        var i, r, o = 0,
            a = ri.length,
            s = ct.Deferred().always(function() {
                delete u.elem
            }),
            u = function() {
                if (r) return !1;
                for (var t = Jn || O(), n = Math.max(0, l.startTime + l.duration - t), i = n / l.duration || 0, o = 1 - i, a = 0, u = l.tweens.length; u > a; a++) l.tweens[a].run(o);
                return s.notifyWith(e, [l, o, n]), 1 > o && u ? n : (s.resolveWith(e, [l]), !1)
            },
            l = s.promise({
                elem: e,
                props: ct.extend({}, t),
                opts: ct.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: Jn || O(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var i = ct.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                    return l.tweens.push(i), i
                },
                stop: function(t) {
                    var n = 0,
                        i = t ? l.tweens.length : 0;
                    if (r) return this;
                    for (r = !0; i > n; n++) l.tweens[n].run(1);
                    return t ? s.resolveWith(e, [l, t]) : s.rejectWith(e, [l, t]), this
                }
            }),
            c = l.props;
        for (R(c, l.opts.specialEasing); a > o; o++)
            if (i = ri[o].call(l, e, c, l.opts)) return i;
        return ct.map(c, H, l), ct.isFunction(l.opts.start) && l.opts.start.call(e, l), ct.fx.timer(ct.extend(u, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always)
    }

    function R(e, t) {
        var n, i, r, o, a;
        for (n in e)
            if (i = ct.camelCase(n), r = t[i], o = e[n], ct.isArray(o) && (r = o[1], o = e[n] = o[0]), n !== i && (e[i] = o, delete e[n]), a = ct.cssHooks[i], a && "expand" in a) {
                o = a.expand(o), delete e[i];
                for (n in o) n in e || (e[n] = o[n], t[n] = r)
            } else t[i] = r
    }

    function q(e, t, n) {
        var i, r, o, a, s, u, l = this,
            c = {},
            h = e.style,
            d = e.nodeType && T(e),
            f = ct._data(e, "fxshow");
        n.queue || (s = ct._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, u = s.empty.fire, s.empty.fire = function() {
            s.unqueued || u()
        }), s.unqueued++, l.always(function() {
            l.always(function() {
                s.unqueued--, ct.queue(e, "fx").length || s.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [h.overflow, h.overflowX, h.overflowY], "inline" === ct.css(e, "display") && "none" === ct.css(e, "float") && (ct.support.inlineBlockNeedsLayout && "inline" !== F(e.nodeName) ? h.zoom = 1 : h.display = "inline-block")), n.overflow && (h.overflow = "hidden", ct.support.shrinkWrapBlocks || l.always(function() {
            h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
        }));
        for (i in t)
            if (r = t[i], ti.exec(r)) {
                if (delete t[i], o = o || "toggle" === r, r === (d ? "hide" : "show")) continue;
                c[i] = f && f[i] || ct.style(e, i)
            }
        if (!ct.isEmptyObject(c)) {
            f ? "hidden" in f && (d = f.hidden) : f = ct._data(e, "fxshow", {}), o && (f.hidden = !d), d ? ct(e).show() : l.done(function() {
                ct(e).hide()
            }), l.done(function() {
                var t;
                ct._removeData(e, "fxshow");
                for (t in c) ct.style(e, t, c[t])
            });
            for (i in c) a = H(d ? f[i] : 0, i, l), i in f || (f[i] = a.start, d && (a.end = a.start, a.start = "width" === i || "height" === i ? 1 : 0))
        }
    }

    function W(e, t, n, i, r) {
        return new W.prototype.init(e, t, n, i, r)
    }

    function B(e, t) {
        var n, i = {
                height: e
            },
            r = 0;
        for (t = t ? 1 : 0; 4 > r; r += 2 - t) n = Cn[r], i["margin" + n] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e), i
    }

    function Y(e) {
        return ct.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
    }
    var U, V, X = typeof t,
        G = e.location,
        Q = e.document,
        K = Q.documentElement,
        Z = e.jQuery,
        J = e.$,
        et = {},
        tt = [],
        nt = "1.10.2",
        it = tt.concat,
        rt = tt.push,
        ot = tt.slice,
        at = tt.indexOf,
        st = et.toString,
        ut = et.hasOwnProperty,
        lt = nt.trim,
        ct = function(e, t) {
            return new ct.fn.init(e, t, V)
        },
        ht = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        dt = /\S+/g,
        ft = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        pt = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        mt = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        gt = /^[\],:{}\s]*$/,
        vt = /(?:^|:|,)(?:\s*\[)+/g,
        yt = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        bt = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
        wt = /^-ms-/,
        xt = /-([\da-z])/gi,
        _t = function(e, t) {
            return t.toUpperCase()
        },
        Tt = function(e) {
            (Q.addEventListener || "load" === e.type || "complete" === Q.readyState) && (Ct(), ct.ready())
        },
        Ct = function() {
            Q.addEventListener ? (Q.removeEventListener("DOMContentLoaded", Tt, !1), e.removeEventListener("load", Tt, !1)) : (Q.detachEvent("onreadystatechange", Tt), e.detachEvent("onload", Tt))
        };
    ct.fn = ct.prototype = {
            jquery: nt,
            constructor: ct,
            init: function(e, n, i) {
                var r, o;
                if (!e) return this;
                if ("string" == typeof e) {
                    if (r = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : pt.exec(e), !r || !r[1] && n) return !n || n.jquery ? (n || i).find(e) : this.constructor(n).find(e);
                    if (r[1]) {
                        if (n = n instanceof ct ? n[0] : n, ct.merge(this, ct.parseHTML(r[1], n && n.nodeType ? n.ownerDocument || n : Q, !0)), mt.test(r[1]) && ct.isPlainObject(n))
                            for (r in n) ct.isFunction(this[r]) ? this[r](n[r]) : this.attr(r, n[r]);
                        return this
                    }
                    if (o = Q.getElementById(r[2]), o && o.parentNode) {
                        if (o.id !== r[2]) return i.find(e);
                        this.length = 1, this[0] = o
                    }
                    return this.context = Q, this.selector = e, this
                }
                return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : ct.isFunction(e) ? i.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), ct.makeArray(e, this))
            },
            selector: "",
            length: 0,
            toArray: function() {
                return ot.call(this)
            },
            get: function(e) {
                return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
            },
            pushStack: function(e) {
                var t = ct.merge(this.constructor(), e);
                return t.prevObject = this, t.context = this.context, t
            },
            each: function(e, t) {
                return ct.each(this, e, t)
            },
            ready: function(e) {
                return ct.ready.promise().done(e), this
            },
            slice: function() {
                return this.pushStack(ot.apply(this, arguments))
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            eq: function(e) {
                var t = this.length,
                    n = +e + (0 > e ? t : 0);
                return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
            },
            map: function(e) {
                return this.pushStack(ct.map(this, function(t, n) {
                    return e.call(t, n, t)
                }))
            },
            end: function() {
                return this.prevObject || this.constructor(null)
            },
            push: rt,
            sort: [].sort,
            splice: [].splice
        }, ct.fn.init.prototype = ct.fn, ct.extend = ct.fn.extend = function() {
            var e, n, i, r, o, a, s = arguments[0] || {},
                u = 1,
                l = arguments.length,
                c = !1;
            for ("boolean" == typeof s && (c = s, s = arguments[1] || {}, u = 2), "object" == typeof s || ct.isFunction(s) || (s = {}), l === u && (s = this, --u); l > u; u++)
                if (null != (o = arguments[u]))
                    for (r in o) e = s[r], i = o[r], s !== i && (c && i && (ct.isPlainObject(i) || (n = ct.isArray(i))) ? (n ? (n = !1, a = e && ct.isArray(e) ? e : []) : a = e && ct.isPlainObject(e) ? e : {}, s[r] = ct.extend(c, a, i)) : i !== t && (s[r] = i));
            return s
        }, ct.extend({
            expando: "jQuery" + (nt + Math.random()).replace(/\D/g, ""),
            noConflict: function(t) {
                return e.$ === ct && (e.$ = J), t && e.jQuery === ct && (e.jQuery = Z), ct
            },
            isReady: !1,
            readyWait: 1,
            holdReady: function(e) {
                e ? ct.readyWait++ : ct.ready(!0)
            },
            ready: function(e) {
                if (e === !0 ? !--ct.readyWait : !ct.isReady) {
                    if (!Q.body) return setTimeout(ct.ready);
                    ct.isReady = !0, e !== !0 && --ct.readyWait > 0 || (U.resolveWith(Q, [ct]), ct.fn.trigger && ct(Q).trigger("ready").off("ready"))
                }
            },
            isFunction: function(e) {
                return "function" === ct.type(e)
            },
            isArray: Array.isArray || function(e) {
                return "array" === ct.type(e)
            },
            isWindow: function(e) {
                return null != e && e == e.window
            },
            isNumeric: function(e) {
                return !isNaN(parseFloat(e)) && isFinite(e)
            },
            type: function(e) {
                return null == e ? String(e) : "object" == typeof e || "function" == typeof e ? et[st.call(e)] || "object" : typeof e
            },
            isPlainObject: function(e) {
                var n;
                if (!e || "object" !== ct.type(e) || e.nodeType || ct.isWindow(e)) return !1;
                try {
                    if (e.constructor && !ut.call(e, "constructor") && !ut.call(e.constructor.prototype, "isPrototypeOf")) return !1
                } catch (i) {
                    return !1
                }
                if (ct.support.ownLast)
                    for (n in e) return ut.call(e, n);
                for (n in e);
                return n === t || ut.call(e, n)
            },
            isEmptyObject: function(e) {
                var t;
                for (t in e) return !1;
                return !0
            },
            error: function(e) {
                throw new Error(e)
            },
            parseHTML: function(e, t, n) {
                if (!e || "string" != typeof e) return null;
                "boolean" == typeof t && (n = t, t = !1), t = t || Q;
                var i = mt.exec(e),
                    r = !n && [];
                return i ? [t.createElement(i[1])] : (i = ct.buildFragment([e], t, r), r && ct(r).remove(), ct.merge([], i.childNodes))
            },
            parseJSON: function(t) {
                return e.JSON && e.JSON.parse ? e.JSON.parse(t) : null === t ? t : "string" == typeof t && (t = ct.trim(t), t && gt.test(t.replace(yt, "@").replace(bt, "]").replace(vt, ""))) ? new Function("return " + t)() : void ct.error("Invalid JSON: " + t)
            },
            parseXML: function(n) {
                var i, r;
                if (!n || "string" != typeof n) return null;
                try {
                    e.DOMParser ? (r = new DOMParser, i = r.parseFromString(n, "text/xml")) : (i = new ActiveXObject("Microsoft.XMLDOM"), i.async = "false", i.loadXML(n))
                } catch (o) {
                    i = t
                }
                return i && i.documentElement && !i.getElementsByTagName("parsererror").length || ct.error("Invalid XML: " + n), i
            },
            noop: function() {},
            globalEval: function(t) {
                t && ct.trim(t) && (e.execScript || function(t) {
                    e.eval.call(e, t)
                })(t)
            },
            camelCase: function(e) {
                return e.replace(wt, "ms-").replace(xt, _t)
            },
            nodeName: function(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
            },
            each: function(e, t, i) {
                var r, o = 0,
                    a = e.length,
                    s = n(e);
                if (i) {
                    if (s)
                        for (; a > o && (r = t.apply(e[o], i), r !== !1); o++);
                    else
                        for (o in e)
                            if (r = t.apply(e[o], i), r === !1) break
                } else if (s)
                    for (; a > o && (r = t.call(e[o], o, e[o]), r !== !1); o++);
                else
                    for (o in e)
                        if (r = t.call(e[o], o, e[o]), r === !1) break; return e
            },
            trim: lt && !lt.call("\ufeff\xa0") ? function(e) {
                return null == e ? "" : lt.call(e)
            } : function(e) {
                return null == e ? "" : (e + "").replace(ft, "")
            },
            makeArray: function(e, t) {
                var i = t || [];
                return null != e && (n(Object(e)) ? ct.merge(i, "string" == typeof e ? [e] : e) : rt.call(i, e)), i
            },
            inArray: function(e, t, n) {
                var i;
                if (t) {
                    if (at) return at.call(t, e, n);
                    for (i = t.length, n = n ? 0 > n ? Math.max(0, i + n) : n : 0; i > n; n++)
                        if (n in t && t[n] === e) return n
                }
                return -1
            },
            merge: function(e, n) {
                var i = n.length,
                    r = e.length,
                    o = 0;
                if ("number" == typeof i)
                    for (; i > o; o++) e[r++] = n[o];
                else
                    for (; n[o] !== t;) e[r++] = n[o++];
                return e.length = r, e
            },
            grep: function(e, t, n) {
                var i, r = [],
                    o = 0,
                    a = e.length;
                for (n = !!n; a > o; o++) i = !!t(e[o], o), n !== i && r.push(e[o]);
                return r
            },
            map: function(e, t, i) {
                var r, o = 0,
                    a = e.length,
                    s = n(e),
                    u = [];
                if (s)
                    for (; a > o; o++) r = t(e[o], o, i), null != r && (u[u.length] = r);
                else
                    for (o in e) r = t(e[o], o, i), null != r && (u[u.length] = r);
                return it.apply([], u)
            },
            guid: 1,
            proxy: function(e, n) {
                var i, r, o;
                return "string" == typeof n && (o = e[n], n = e, e = o), ct.isFunction(e) ? (i = ot.call(arguments, 2), r = function() {
                    return e.apply(n || this, i.concat(ot.call(arguments)))
                }, r.guid = e.guid = e.guid || ct.guid++, r) : t
            },
            access: function(e, n, i, r, o, a, s) {
                var u = 0,
                    l = e.length,
                    c = null == i;
                if ("object" === ct.type(i)) {
                    o = !0;
                    for (u in i) ct.access(e, n, u, i[u], !0, a, s)
                } else if (r !== t && (o = !0, ct.isFunction(r) || (s = !0), c && (s ? (n.call(e, r), n = null) : (c = n, n = function(e, t, n) {
                        return c.call(ct(e), n)
                    })), n))
                    for (; l > u; u++) n(e[u], i, s ? r : r.call(e[u], u, n(e[u], i)));
                return o ? e : c ? n.call(e) : l ? n(e[0], i) : a
            },
            now: function() {
                return (new Date).getTime()
            },
            swap: function(e, t, n, i) {
                var r, o, a = {};
                for (o in t) a[o] = e.style[o], e.style[o] = t[o];
                r = n.apply(e, i || []);
                for (o in t) e.style[o] = a[o];
                return r
            }
        }), ct.ready.promise = function(t) {
            if (!U)
                if (U = ct.Deferred(), "complete" === Q.readyState) setTimeout(ct.ready);
                else if (Q.addEventListener) Q.addEventListener("DOMContentLoaded", Tt, !1), e.addEventListener("load", Tt, !1);
            else {
                Q.attachEvent("onreadystatechange", Tt), e.attachEvent("onload", Tt);
                var n = !1;
                try {
                    n = null == e.frameElement && Q.documentElement
                } catch (i) {}
                n && n.doScroll && ! function r() {
                    if (!ct.isReady) {
                        try {
                            n.doScroll("left")
                        } catch (e) {
                            return setTimeout(r, 50)
                        }
                        Ct(), ct.ready()
                    }
                }()
            }
            return U.promise(t)
        }, ct.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
            et["[object " + t + "]"] = t.toLowerCase()
        }), V = ct(Q),
        function(e, t) {
            function n(e, t, n, i) {
                var r, o, a, s, u, l, c, h, p, m;
                if ((t ? t.ownerDocument || t : z) !== N && $(t), t = t || N, n = n || [], !e || "string" != typeof e) return n;
                if (1 !== (s = t.nodeType) && 9 !== s) return [];
                if (M && !i) {
                    if (r = bt.exec(e))
                        if (a = r[1]) {
                            if (9 === s) {
                                if (o = t.getElementById(a), !o || !o.parentNode) return n;
                                if (o.id === a) return n.push(o), n
                            } else if (t.ownerDocument && (o = t.ownerDocument.getElementById(a)) && O(t, o) && o.id === a) return n.push(o), n
                        } else {
                            if (r[2]) return et.apply(n, t.getElementsByTagName(e)), n;
                            if ((a = r[3]) && T.getElementsByClassName && t.getElementsByClassName) return et.apply(n, t.getElementsByClassName(a)), n
                        }
                    if (T.qsa && (!j || !j.test(e))) {
                        if (h = c = H, p = t, m = 9 === s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
                            for (l = d(e), (c = t.getAttribute("id")) ? h = c.replace(_t, "\\$&") : t.setAttribute("id", h), h = "[id='" + h + "'] ", u = l.length; u--;) l[u] = h + f(l[u]);
                            p = ft.test(e) && t.parentNode || t, m = l.join(",")
                        }
                        if (m) try {
                            return et.apply(n, p.querySelectorAll(m)), n
                        } catch (g) {} finally {
                            c || t.removeAttribute("id")
                        }
                    }
                }
                return x(e.replace(lt, "$1"), t, n, i)
            }

            function i() {
                function e(n, i) {
                    return t.push(n += " ") > k.cacheLength && delete e[t.shift()], e[n] = i
                }
                var t = [];
                return e
            }

            function r(e) {
                return e[H] = !0, e
            }

            function o(e) {
                var t = N.createElement("div");
                try {
                    return !!e(t)
                } catch (n) {
                    return !1
                } finally {
                    t.parentNode && t.parentNode.removeChild(t), t = null
                }
            }

            function a(e, t) {
                for (var n = e.split("|"), i = e.length; i--;) k.attrHandle[n[i]] = t
            }

            function s(e, t) {
                var n = t && e,
                    i = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || G) - (~e.sourceIndex || G);
                if (i) return i;
                if (n)
                    for (; n = n.nextSibling;)
                        if (n === t) return -1;
                return e ? 1 : -1
            }

            function u(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return "input" === n && t.type === e
                }
            }

            function l(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e
                }
            }

            function c(e) {
                return r(function(t) {
                    return t = +t, r(function(n, i) {
                        for (var r, o = e([], n.length, t), a = o.length; a--;) n[r = o[a]] && (n[r] = !(i[r] = n[r]))
                    })
                })
            }

            function h() {}

            function d(e, t) {
                var i, r, o, a, s, u, l, c = B[e + " "];
                if (c) return t ? 0 : c.slice(0);
                for (s = e, u = [], l = k.preFilter; s;) {
                    (!i || (r = ht.exec(s))) && (r && (s = s.slice(r[0].length) || s), u.push(o = [])), i = !1, (r = dt.exec(s)) && (i = r.shift(), o.push({
                        value: i,
                        type: r[0].replace(lt, " ")
                    }), s = s.slice(i.length));
                    for (a in k.filter) !(r = vt[a].exec(s)) || l[a] && !(r = l[a](r)) || (i = r.shift(), o.push({
                        value: i,
                        type: a,
                        matches: r
                    }), s = s.slice(i.length));
                    if (!i) break
                }
                return t ? s.length : s ? n.error(e) : B(e, u).slice(0)
            }

            function f(e) {
                for (var t = 0, n = e.length, i = ""; n > t; t++) i += e[t].value;
                return i
            }

            function p(e, t, n) {
                var i = t.dir,
                    r = n && "parentNode" === i,
                    o = q++;
                return t.first ? function(t, n, o) {
                    for (; t = t[i];)
                        if (1 === t.nodeType || r) return e(t, n, o)
                } : function(t, n, a) {
                    var s, u, l, c = R + " " + o;
                    if (a) {
                        for (; t = t[i];)
                            if ((1 === t.nodeType || r) && e(t, n, a)) return !0
                    } else
                        for (; t = t[i];)
                            if (1 === t.nodeType || r)
                                if (l = t[H] || (t[H] = {}), (u = l[i]) && u[0] === c) {
                                    if ((s = u[1]) === !0 || s === C) return s === !0
                                } else if (u = l[i] = [c], u[1] = e(t, n, a) || C, u[1] === !0) return !0
                }
            }

            function m(e) {
                return e.length > 1 ? function(t, n, i) {
                    for (var r = e.length; r--;)
                        if (!e[r](t, n, i)) return !1;
                    return !0
                } : e[0]
            }

            function g(e, t, n, i, r) {
                for (var o, a = [], s = 0, u = e.length, l = null != t; u > s; s++)(o = e[s]) && (!n || n(o, i, r)) && (a.push(o), l && t.push(s));
                return a
            }

            function v(e, t, n, i, o, a) {
                return i && !i[H] && (i = v(i)), o && !o[H] && (o = v(o, a)), r(function(r, a, s, u) {
                    var l, c, h, d = [],
                        f = [],
                        p = a.length,
                        m = r || w(t || "*", s.nodeType ? [s] : s, []),
                        v = !e || !r && t ? m : g(m, d, e, s, u),
                        y = n ? o || (r ? e : p || i) ? [] : a : v;
                    if (n && n(v, y, s, u), i)
                        for (l = g(y, f), i(l, [], s, u), c = l.length; c--;)(h = l[c]) && (y[f[c]] = !(v[f[c]] = h));
                    if (r) {
                        if (o || e) {
                            if (o) {
                                for (l = [], c = y.length; c--;)(h = y[c]) && l.push(v[c] = h);
                                o(null, y = [], l, u)
                            }
                            for (c = y.length; c--;)(h = y[c]) && (l = o ? nt.call(r, h) : d[c]) > -1 && (r[l] = !(a[l] = h))
                        }
                    } else y = g(y === a ? y.splice(p, y.length) : y), o ? o(null, a, y, u) : et.apply(a, y)
                })
            }

            function y(e) {
                for (var t, n, i, r = e.length, o = k.relative[e[0].type], a = o || k.relative[" "], s = o ? 1 : 0, u = p(function(e) {
                        return e === t
                    }, a, !0), l = p(function(e) {
                        return nt.call(t, e) > -1
                    }, a, !0), c = [function(e, n, i) {
                        return !o && (i || n !== A) || ((t = n).nodeType ? u(e, n, i) : l(e, n, i))
                    }]; r > s; s++)
                    if (n = k.relative[e[s].type]) c = [p(m(c), n)];
                    else {
                        if (n = k.filter[e[s].type].apply(null, e[s].matches), n[H]) {
                            for (i = ++s; r > i && !k.relative[e[i].type]; i++);
                            return v(s > 1 && m(c), s > 1 && f(e.slice(0, s - 1).concat({
                                value: " " === e[s - 2].type ? "*" : ""
                            })).replace(lt, "$1"), n, i > s && y(e.slice(s, i)), r > i && y(e = e.slice(i)), r > i && f(e))
                        }
                        c.push(n)
                    }
                return m(c)
            }

            function b(e, t) {
                var i = 0,
                    o = t.length > 0,
                    a = e.length > 0,
                    s = function(r, s, u, l, c) {
                        var h, d, f, p = [],
                            m = 0,
                            v = "0",
                            y = r && [],
                            b = null != c,
                            w = A,
                            x = r || a && k.find.TAG("*", c && s.parentNode || s),
                            _ = R += null == w ? 1 : Math.random() || .1;
                        for (b && (A = s !== N && s, C = i); null != (h = x[v]); v++) {
                            if (a && h) {
                                for (d = 0; f = e[d++];)
                                    if (f(h, s, u)) {
                                        l.push(h);
                                        break
                                    }
                                b && (R = _, C = ++i)
                            }
                            o && ((h = !f && h) && m--, r && y.push(h))
                        }
                        if (m += v, o && v !== m) {
                            for (d = 0; f = t[d++];) f(y, p, s, u);
                            if (r) {
                                if (m > 0)
                                    for (; v--;) y[v] || p[v] || (p[v] = Z.call(l));
                                p = g(p)
                            }
                            et.apply(l, p), b && !r && p.length > 0 && m + t.length > 1 && n.uniqueSort(l)
                        }
                        return b && (R = _, A = w), y
                    };
                return o ? r(s) : s
            }

            function w(e, t, i) {
                for (var r = 0, o = t.length; o > r; r++) n(e, t[r], i);
                return i
            }

            function x(e, t, n, i) {
                var r, o, a, s, u, l = d(e);
                if (!i && 1 === l.length) {
                    if (o = l[0] = l[0].slice(0), o.length > 2 && "ID" === (a = o[0]).type && T.getById && 9 === t.nodeType && M && k.relative[o[1].type]) {
                        if (t = (k.find.ID(a.matches[0].replace(Tt, Ct), t) || [])[0], !t) return n;
                        e = e.slice(o.shift().value.length)
                    }
                    for (r = vt.needsContext.test(e) ? 0 : o.length; r-- && (a = o[r], !k.relative[s = a.type]);)
                        if ((u = k.find[s]) && (i = u(a.matches[0].replace(Tt, Ct), ft.test(o[0].type) && t.parentNode || t))) {
                            if (o.splice(r, 1), e = i.length && f(o), !e) return et.apply(n, i), n;
                            break
                        }
                }
                return F(e, l)(i, t, !M, n, ft.test(e)), n
            }
            var _, T, C, k, S, E, F, A, D, $, N, L, M, j, P, I, O, H = "sizzle" + -new Date,
                z = e.document,
                R = 0,
                q = 0,
                W = i(),
                B = i(),
                Y = i(),
                U = !1,
                V = function(e, t) {
                    return e === t ? (U = !0, 0) : 0
                },
                X = typeof t,
                G = 1 << 31,
                Q = {}.hasOwnProperty,
                K = [],
                Z = K.pop,
                J = K.push,
                et = K.push,
                tt = K.slice,
                nt = K.indexOf || function(e) {
                    for (var t = 0, n = this.length; n > t; t++)
                        if (this[t] === e) return t;
                    return -1
                },
                it = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                rt = "[\\x20\\t\\r\\n\\f]",
                ot = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                at = ot.replace("w", "w#"),
                st = "\\[" + rt + "*(" + ot + ")" + rt + "*(?:([*^$|!~]?=)" + rt + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + at + ")|)|)" + rt + "*\\]",
                ut = ":(" + ot + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + st.replace(3, 8) + ")*)|.*)\\)|)",
                lt = new RegExp("^" + rt + "+|((?:^|[^\\\\])(?:\\\\.)*)" + rt + "+$", "g"),
                ht = new RegExp("^" + rt + "*," + rt + "*"),
                dt = new RegExp("^" + rt + "*([>+~]|" + rt + ")" + rt + "*"),
                ft = new RegExp(rt + "*[+~]"),
                pt = new RegExp("=" + rt + "*([^\\]'\"]*)" + rt + "*\\]", "g"),
                mt = new RegExp(ut),
                gt = new RegExp("^" + at + "$"),
                vt = {
                    ID: new RegExp("^#(" + ot + ")"),
                    CLASS: new RegExp("^\\.(" + ot + ")"),
                    TAG: new RegExp("^(" + ot.replace("w", "w*") + ")"),
                    ATTR: new RegExp("^" + st),
                    PSEUDO: new RegExp("^" + ut),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + rt + "*(even|odd|(([+-]|)(\\d*)n|)" + rt + "*(?:([+-]|)" + rt + "*(\\d+)|))" + rt + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + it + ")$", "i"),
                    needsContext: new RegExp("^" + rt + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + rt + "*((?:-\\d)?\\d*)" + rt + "*\\)|)(?=[^-]|$)", "i")
                },
                yt = /^[^{]+\{\s*\[native \w/,
                bt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                wt = /^(?:input|select|textarea|button)$/i,
                xt = /^h\d$/i,
                _t = /'|\\/g,
                Tt = new RegExp("\\\\([\\da-f]{1,6}" + rt + "?|(" + rt + ")|.)", "ig"),
                Ct = function(e, t, n) {
                    var i = "0x" + t - 65536;
                    return i !== i || n ? t : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
                };
            try {
                et.apply(K = tt.call(z.childNodes), z.childNodes), K[z.childNodes.length].nodeType
            } catch (kt) {
                et = {
                    apply: K.length ? function(e, t) {
                        J.apply(e, tt.call(t))
                    } : function(e, t) {
                        for (var n = e.length, i = 0; e[n++] = t[i++];);
                        e.length = n - 1
                    }
                }
            }
            E = n.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? "HTML" !== t.nodeName : !1
            }, T = n.support = {}, $ = n.setDocument = function(e) {
                var t = e ? e.ownerDocument || e : z,
                    n = t.defaultView;
                return t !== N && 9 === t.nodeType && t.documentElement ? (N = t, L = t.documentElement, M = !E(t), n && n.attachEvent && n !== n.top && n.attachEvent("onbeforeunload", function() {
                    $()
                }), T.attributes = o(function(e) {
                    return e.className = "i", !e.getAttribute("className")
                }), T.getElementsByTagName = o(function(e) {
                    return e.appendChild(t.createComment("")), !e.getElementsByTagName("*").length
                }), T.getElementsByClassName = o(function(e) {
                    return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
                }), T.getById = o(function(e) {
                    return L.appendChild(e).id = H, !t.getElementsByName || !t.getElementsByName(H).length
                }), T.getById ? (k.find.ID = function(e, t) {
                    if (typeof t.getElementById !== X && M) {
                        var n = t.getElementById(e);
                        return n && n.parentNode ? [n] : []
                    }
                }, k.filter.ID = function(e) {
                    var t = e.replace(Tt, Ct);
                    return function(e) {
                        return e.getAttribute("id") === t
                    }
                }) : (delete k.find.ID, k.filter.ID = function(e) {
                    var t = e.replace(Tt, Ct);
                    return function(e) {
                        var n = typeof e.getAttributeNode !== X && e.getAttributeNode("id");
                        return n && n.value === t
                    }
                }), k.find.TAG = T.getElementsByTagName ? function(e, t) {
                    return typeof t.getElementsByTagName !== X ? t.getElementsByTagName(e) : void 0
                } : function(e, t) {
                    var n, i = [],
                        r = 0,
                        o = t.getElementsByTagName(e);
                    if ("*" === e) {
                        for (; n = o[r++];) 1 === n.nodeType && i.push(n);
                        return i
                    }
                    return o
                }, k.find.CLASS = T.getElementsByClassName && function(e, t) {
                    return typeof t.getElementsByClassName !== X && M ? t.getElementsByClassName(e) : void 0
                }, P = [], j = [], (T.qsa = yt.test(t.querySelectorAll)) && (o(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || j.push("\\[" + rt + "*(?:value|" + it + ")"), e.querySelectorAll(":checked").length || j.push(":checked")
                }), o(function(e) {
                    var n = t.createElement("input");
                    n.setAttribute("type", "hidden"), e.appendChild(n).setAttribute("t", ""), e.querySelectorAll("[t^='']").length && j.push("[*^$]=" + rt + "*(?:''|\"\")"), e.querySelectorAll(":enabled").length || j.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), j.push(",.*:")
                })), (T.matchesSelector = yt.test(I = L.webkitMatchesSelector || L.mozMatchesSelector || L.oMatchesSelector || L.msMatchesSelector)) && o(function(e) {
                    T.disconnectedMatch = I.call(e, "div"), I.call(e, "[s!='']:x"), P.push("!=", ut)
                }), j = j.length && new RegExp(j.join("|")), P = P.length && new RegExp(P.join("|")), O = yt.test(L.contains) || L.compareDocumentPosition ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        i = t && t.parentNode;
                    return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
                } : function(e, t) {
                    if (t)
                        for (; t = t.parentNode;)
                            if (t === e) return !0;
                    return !1
                }, V = L.compareDocumentPosition ? function(e, n) {
                    if (e === n) return U = !0, 0;
                    var i = n.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(n);
                    return i ? 1 & i || !T.sortDetached && n.compareDocumentPosition(e) === i ? e === t || O(z, e) ? -1 : n === t || O(z, n) ? 1 : D ? nt.call(D, e) - nt.call(D, n) : 0 : 4 & i ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
                } : function(e, n) {
                    var i, r = 0,
                        o = e.parentNode,
                        a = n.parentNode,
                        u = [e],
                        l = [n];
                    if (e === n) return U = !0, 0;
                    if (!o || !a) return e === t ? -1 : n === t ? 1 : o ? -1 : a ? 1 : D ? nt.call(D, e) - nt.call(D, n) : 0;
                    if (o === a) return s(e, n);
                    for (i = e; i = i.parentNode;) u.unshift(i);
                    for (i = n; i = i.parentNode;) l.unshift(i);
                    for (; u[r] === l[r];) r++;
                    return r ? s(u[r], l[r]) : u[r] === z ? -1 : l[r] === z ? 1 : 0
                }, t) : N
            }, n.matches = function(e, t) {
                return n(e, null, null, t)
            }, n.matchesSelector = function(e, t) {
                if ((e.ownerDocument || e) !== N && $(e), t = t.replace(pt, "='$1']"), !(!T.matchesSelector || !M || P && P.test(t) || j && j.test(t))) try {
                    var i = I.call(e, t);
                    if (i || T.disconnectedMatch || e.document && 11 !== e.document.nodeType) return i
                } catch (r) {}
                return n(t, N, null, [e]).length > 0
            }, n.contains = function(e, t) {
                return (e.ownerDocument || e) !== N && $(e), O(e, t)
            }, n.attr = function(e, n) {
                (e.ownerDocument || e) !== N && $(e);
                var i = k.attrHandle[n.toLowerCase()],
                    r = i && Q.call(k.attrHandle, n.toLowerCase()) ? i(e, n, !M) : t;
                return r === t ? T.attributes || !M ? e.getAttribute(n) : (r = e.getAttributeNode(n)) && r.specified ? r.value : null : r
            }, n.error = function(e) {
                throw new Error("Syntax error, unrecognized expression: " + e)
            }, n.uniqueSort = function(e) {
                var t, n = [],
                    i = 0,
                    r = 0;
                if (U = !T.detectDuplicates, D = !T.sortStable && e.slice(0), e.sort(V), U) {
                    for (; t = e[r++];) t === e[r] && (i = n.push(r));
                    for (; i--;) e.splice(n[i], 1)
                }
                return e
            }, S = n.getText = function(e) {
                var t, n = "",
                    i = 0,
                    r = e.nodeType;
                if (r) {
                    if (1 === r || 9 === r || 11 === r) {
                        if ("string" == typeof e.textContent) return e.textContent;
                        for (e = e.firstChild; e; e = e.nextSibling) n += S(e)
                    } else if (3 === r || 4 === r) return e.nodeValue
                } else
                    for (; t = e[i]; i++) n += S(t);
                return n
            }, k = n.selectors = {
                cacheLength: 50,
                createPseudo: r,
                match: vt,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace(Tt, Ct), e[3] = (e[4] || e[5] || "").replace(Tt, Ct), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || n.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && n.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var n, i = !e[5] && e[2];
                        return vt.CHILD.test(e[0]) ? null : (e[3] && e[4] !== t ? e[2] = e[4] : i && mt.test(i) && (n = d(i, !0)) && (n = i.indexOf(")", i.length - n) - i.length) && (e[0] = e[0].slice(0, n), e[2] = i.slice(0, n)), e.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(e) {
                        var t = e.replace(Tt, Ct).toLowerCase();
                        return "*" === e ? function() {
                            return !0
                        } : function(e) {
                            return e.nodeName && e.nodeName.toLowerCase() === t
                        }
                    },
                    CLASS: function(e) {
                        var t = W[e + " "];
                        return t || (t = new RegExp("(^|" + rt + ")" + e + "(" + rt + "|$)")) && W(e, function(e) {
                            return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== X && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, i) {
                        return function(r) {
                            var o = n.attr(r, e);
                            return null == o ? "!=" === t : t ? (o += "", "=" === t ? o === i : "!=" === t ? o !== i : "^=" === t ? i && 0 === o.indexOf(i) : "*=" === t ? i && o.indexOf(i) > -1 : "$=" === t ? i && o.slice(-i.length) === i : "~=" === t ? (" " + o + " ").indexOf(i) > -1 : "|=" === t ? o === i || o.slice(0, i.length + 1) === i + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, i, r) {
                        var o = "nth" !== e.slice(0, 3),
                            a = "last" !== e.slice(-4),
                            s = "of-type" === t;
                        return 1 === i && 0 === r ? function(e) {
                            return !!e.parentNode
                        } : function(t, n, u) {
                            var l, c, h, d, f, p, m = o !== a ? "nextSibling" : "previousSibling",
                                g = t.parentNode,
                                v = s && t.nodeName.toLowerCase(),
                                y = !u && !s;
                            if (g) {
                                if (o) {
                                    for (; m;) {
                                        for (h = t; h = h[m];)
                                            if (s ? h.nodeName.toLowerCase() === v : 1 === h.nodeType) return !1;
                                        p = m = "only" === e && !p && "nextSibling"
                                    }
                                    return !0
                                }
                                if (p = [a ? g.firstChild : g.lastChild], a && y) {
                                    for (c = g[H] || (g[H] = {}), l = c[e] || [], f = l[0] === R && l[1], d = l[0] === R && l[2], h = f && g.childNodes[f]; h = ++f && h && h[m] || (d = f = 0) || p.pop();)
                                        if (1 === h.nodeType && ++d && h === t) {
                                            c[e] = [R, f, d];
                                            break
                                        }
                                } else if (y && (l = (t[H] || (t[H] = {}))[e]) && l[0] === R) d = l[1];
                                else
                                    for (;
                                        (h = ++f && h && h[m] || (d = f = 0) || p.pop()) && ((s ? h.nodeName.toLowerCase() !== v : 1 !== h.nodeType) || !++d || (y && ((h[H] || (h[H] = {}))[e] = [R, d]), h !== t)););
                                return d -= r, d === i || d % i === 0 && d / i >= 0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var i, o = k.pseudos[e] || k.setFilters[e.toLowerCase()] || n.error("unsupported pseudo: " + e);
                        return o[H] ? o(t) : o.length > 1 ? (i = [e, e, "", t], k.setFilters.hasOwnProperty(e.toLowerCase()) ? r(function(e, n) {
                            for (var i, r = o(e, t), a = r.length; a--;) i = nt.call(e, r[a]), e[i] = !(n[i] = r[a])
                        }) : function(e) {
                            return o(e, 0, i)
                        }) : o
                    }
                },
                pseudos: {
                    not: r(function(e) {
                        var t = [],
                            n = [],
                            i = F(e.replace(lt, "$1"));
                        return i[H] ? r(function(e, t, n, r) {
                            for (var o, a = i(e, null, r, []), s = e.length; s--;)(o = a[s]) && (e[s] = !(t[s] = o))
                        }) : function(e, r, o) {
                            return t[0] = e, i(t, null, o, n), !n.pop()
                        }
                    }),
                    has: r(function(e) {
                        return function(t) {
                            return n(e, t).length > 0
                        }
                    }),
                    contains: r(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || S(t)).indexOf(e) > -1
                        }
                    }),
                    lang: r(function(e) {
                        return gt.test(e || "") || n.error("unsupported lang: " + e), e = e.replace(Tt, Ct).toLowerCase(),
                            function(t) {
                                var n;
                                do
                                    if (n = M ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
                                while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                    }),
                    target: function(t) {
                        var n = e.location && e.location.hash;
                        return n && n.slice(1) === t.id
                    },
                    root: function(e) {
                        return e === L
                    },
                    focus: function(e) {
                        return e === N.activeElement && (!N.hasFocus || N.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && !!e.checked || "option" === t && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    empty: function(e) {
                        for (e = e.firstChild; e; e = e.nextSibling)
                            if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) return !1;
                        return !0
                    },
                    parent: function(e) {
                        return !k.pseudos.empty(e)
                    },
                    header: function(e) {
                        return xt.test(e.nodeName)
                    },
                    input: function(e) {
                        return wt.test(e.nodeName)
                    },
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && "button" === e.type || "button" === t
                    },
                    text: function(e) {
                        var t;
                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type)
                    },
                    first: c(function() {
                        return [0]
                    }),
                    last: c(function(e, t) {
                        return [t - 1]
                    }),
                    eq: c(function(e, t, n) {
                        return [0 > n ? n + t : n]
                    }),
                    even: c(function(e, t) {
                        for (var n = 0; t > n; n += 2) e.push(n);
                        return e
                    }),
                    odd: c(function(e, t) {
                        for (var n = 1; t > n; n += 2) e.push(n);
                        return e
                    }),
                    lt: c(function(e, t, n) {
                        for (var i = 0 > n ? n + t : n; --i >= 0;) e.push(i);
                        return e
                    }),
                    gt: c(function(e, t, n) {
                        for (var i = 0 > n ? n + t : n; ++i < t;) e.push(i);
                        return e
                    })
                }
            }, k.pseudos.nth = k.pseudos.eq;
            for (_ in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) k.pseudos[_] = u(_);
            for (_ in {
                    submit: !0,
                    reset: !0
                }) k.pseudos[_] = l(_);
            h.prototype = k.filters = k.pseudos, k.setFilters = new h, F = n.compile = function(e, t) {
                var n, i = [],
                    r = [],
                    o = Y[e + " "];
                if (!o) {
                    for (t || (t = d(e)), n = t.length; n--;) o = y(t[n]), o[H] ? i.push(o) : r.push(o);
                    o = Y(e, b(r, i))
                }
                return o
            }, T.sortStable = H.split("").sort(V).join("") === H, T.detectDuplicates = U, $(), T.sortDetached = o(function(e) {
                return 1 & e.compareDocumentPosition(N.createElement("div"))
            }), o(function(e) {
                return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
            }) || a("type|href|height|width", function(e, t, n) {
                return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
            }), T.attributes && o(function(e) {
                return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
            }) || a("value", function(e, t, n) {
                return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
            }), o(function(e) {
                return null == e.getAttribute("disabled")
            }) || a(it, function(e, t, n) {
                var i;
                return n ? void 0 : (i = e.getAttributeNode(t)) && i.specified ? i.value : e[t] === !0 ? t.toLowerCase() : null
            }), ct.find = n, ct.expr = n.selectors, ct.expr[":"] = ct.expr.pseudos, ct.unique = n.uniqueSort, ct.text = n.getText, ct.isXMLDoc = n.isXML, ct.contains = n.contains
        }(e);
    var kt = {};
    ct.Callbacks = function(e) {
        e = "string" == typeof e ? kt[e] || i(e) : ct.extend({}, e);
        var n, r, o, a, s, u, l = [],
            c = !e.once && [],
            h = function(t) {
                for (r = e.memory && t, o = !0, s = u || 0, u = 0, a = l.length, n = !0; l && a > s; s++)
                    if (l[s].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        r = !1;
                        break
                    }
                n = !1, l && (c ? c.length && h(c.shift()) : r ? l = [] : d.disable())
            },
            d = {
                add: function() {
                    if (l) {
                        var t = l.length;
                        ! function i(t) {
                            ct.each(t, function(t, n) {
                                var r = ct.type(n);
                                "function" === r ? e.unique && d.has(n) || l.push(n) : n && n.length && "string" !== r && i(n)
                            })
                        }(arguments), n ? a = l.length : r && (u = t, h(r))
                    }
                    return this
                },
                remove: function() {
                    return l && ct.each(arguments, function(e, t) {
                        for (var i;
                            (i = ct.inArray(t, l, i)) > -1;) l.splice(i, 1), n && (a >= i && a--, s >= i && s--)
                    }), this
                },
                has: function(e) {
                    return e ? ct.inArray(e, l) > -1 : !(!l || !l.length)
                },
                empty: function() {
                    return l = [], a = 0, this
                },
                disable: function() {
                    return l = c = r = t, this
                },
                disabled: function() {
                    return !l
                },
                lock: function() {
                    return c = t, r || d.disable(), this
                },
                locked: function() {
                    return !c
                },
                fireWith: function(e, t) {
                    return !l || o && !c || (t = t || [], t = [e, t.slice ? t.slice() : t], n ? c.push(t) : h(t)), this
                },
                fire: function() {
                    return d.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!o
                }
            };
        return d
    }, ct.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", ct.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", ct.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", ct.Callbacks("memory")]
                ],
                n = "pending",
                i = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return r.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return ct.Deferred(function(n) {
                            ct.each(t, function(t, o) {
                                var a = o[0],
                                    s = ct.isFunction(e[t]) && e[t];
                                r[o[1]](function() {
                                    var e = s && s.apply(this, arguments);
                                    e && ct.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[a + "With"](this === i ? n.promise() : this, s ? [e] : arguments)
                                })
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? ct.extend(e, i) : i
                    }
                },
                r = {};
            return i.pipe = i.then, ct.each(t, function(e, o) {
                var a = o[2],
                    s = o[3];
                i[o[1]] = a.add, s && a.add(function() {
                    n = s
                }, t[1 ^ e][2].disable, t[2][2].lock), r[o[0]] = function() {
                    return r[o[0] + "With"](this === r ? i : this, arguments), this
                }, r[o[0] + "With"] = a.fireWith
            }), i.promise(r), e && e.call(r, r), r
        },
        when: function(e) {
            var t, n, i, r = 0,
                o = ot.call(arguments),
                a = o.length,
                s = 1 !== a || e && ct.isFunction(e.promise) ? a : 0,
                u = 1 === s ? e : ct.Deferred(),
                l = function(e, n, i) {
                    return function(r) {
                        n[e] = this, i[e] = arguments.length > 1 ? ot.call(arguments) : r, i === t ? u.notifyWith(n, i) : --s || u.resolveWith(n, i)
                    }
                };
            if (a > 1)
                for (t = new Array(a), n = new Array(a), i = new Array(a); a > r; r++) o[r] && ct.isFunction(o[r].promise) ? o[r].promise().done(l(r, i, o)).fail(u.reject).progress(l(r, n, t)) : --s;
            return s || u.resolveWith(i, o), u.promise()
        }
    }), ct.support = function(t) {
        var n, i, r, o, a, s, u, l, c, h = Q.createElement("div");
        if (h.setAttribute("className", "t"), h.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = h.getElementsByTagName("*") || [], i = h.getElementsByTagName("a")[0], !i || !i.style || !n.length) return t;
        o = Q.createElement("select"), s = o.appendChild(Q.createElement("option")), r = h.getElementsByTagName("input")[0], i.style.cssText = "top:1px;float:left;opacity:.5", t.getSetAttribute = "t" !== h.className, t.leadingWhitespace = 3 === h.firstChild.nodeType, t.tbody = !h.getElementsByTagName("tbody").length, t.htmlSerialize = !!h.getElementsByTagName("link").length, t.style = /top/.test(i.getAttribute("style")), t.hrefNormalized = "/a" === i.getAttribute("href"), t.opacity = /^0.5/.test(i.style.opacity), t.cssFloat = !!i.style.cssFloat, t.checkOn = !!r.value, t.optSelected = s.selected, t.enctype = !!Q.createElement("form").enctype, t.html5Clone = "<:nav></:nav>" !== Q.createElement("nav").cloneNode(!0).outerHTML, t.inlineBlockNeedsLayout = !1, t.shrinkWrapBlocks = !1, t.pixelPosition = !1, t.deleteExpando = !0, t.noCloneEvent = !0, t.reliableMarginRight = !0, t.boxSizingReliable = !0, r.checked = !0, t.noCloneChecked = r.cloneNode(!0).checked, o.disabled = !0, t.optDisabled = !s.disabled;
        try {
            delete h.test
        } catch (d) {
            t.deleteExpando = !1
        }
        r = Q.createElement("input"), r.setAttribute("value", ""), t.input = "" === r.getAttribute("value"), r.value = "t", r.setAttribute("type", "radio"), t.radioValue = "t" === r.value, r.setAttribute("checked", "t"), r.setAttribute("name", "t"), a = Q.createDocumentFragment(), a.appendChild(r), t.appendChecked = r.checked, t.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, h.attachEvent && (h.attachEvent("onclick", function() {
            t.noCloneEvent = !1
        }), h.cloneNode(!0).click());
        for (c in {
                submit: !0,
                change: !0,
                focusin: !0
            }) h.setAttribute(u = "on" + c, "t"), t[c + "Bubbles"] = u in e || h.attributes[u].expando === !1;
        h.style.backgroundClip = "content-box", h.cloneNode(!0).style.backgroundClip = "", t.clearCloneStyle = "content-box" === h.style.backgroundClip;
        for (c in ct(t)) break;
        return t.ownLast = "0" !== c, ct(function() {
            var n, i, r, o = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                a = Q.getElementsByTagName("body")[0];
            a && (n = Q.createElement("div"), n.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", a.appendChild(n).appendChild(h), h.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", r = h.getElementsByTagName("td"), r[0].style.cssText = "padding:0;margin:0;border:0;display:none", l = 0 === r[0].offsetHeight, r[0].style.display = "", r[1].style.display = "none", t.reliableHiddenOffsets = l && 0 === r[0].offsetHeight, h.innerHTML = "", h.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", ct.swap(a, null != a.style.zoom ? {
                zoom: 1
            } : {}, function() {
                t.boxSizing = 4 === h.offsetWidth
            }), e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(h, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(h, null) || {
                width: "4px"
            }).width, i = h.appendChild(Q.createElement("div")), i.style.cssText = h.style.cssText = o, i.style.marginRight = i.style.width = "0", h.style.width = "1px", t.reliableMarginRight = !parseFloat((e.getComputedStyle(i, null) || {}).marginRight)), typeof h.style.zoom !== X && (h.innerHTML = "", h.style.cssText = o + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === h.offsetWidth, h.style.display = "block", h.innerHTML = "<div></div>", h.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== h.offsetWidth, t.inlineBlockNeedsLayout && (a.style.zoom = 1)), a.removeChild(n), n = h = r = i = null)
        }), n = o = a = s = i = r = null, t
    }({});
    var St = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        Et = /([A-Z])/g;
    ct.extend({
        cache: {},
        noData: {
            applet: !0,
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function(e) {
            return e = e.nodeType ? ct.cache[e[ct.expando]] : e[ct.expando], !!e && !s(e)
        },
        data: function(e, t, n) {
            return r(e, t, n)
        },
        removeData: function(e, t) {
            return o(e, t)
        },
        _data: function(e, t, n) {
            return r(e, t, n, !0)
        },
        _removeData: function(e, t) {
            return o(e, t, !0)
        },
        acceptData: function(e) {
            if (e.nodeType && 1 !== e.nodeType && 9 !== e.nodeType) return !1;
            var t = e.nodeName && ct.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), ct.fn.extend({
        data: function(e, n) {
            var i, r, o = null,
                s = 0,
                u = this[0];
            if (e === t) {
                if (this.length && (o = ct.data(u), 1 === u.nodeType && !ct._data(u, "parsedAttrs"))) {
                    for (i = u.attributes; s < i.length; s++) r = i[s].name, 0 === r.indexOf("data-") && (r = ct.camelCase(r.slice(5)), a(u, r, o[r]));
                    ct._data(u, "parsedAttrs", !0)
                }
                return o
            }
            return "object" == typeof e ? this.each(function() {
                ct.data(this, e)
            }) : arguments.length > 1 ? this.each(function() {
                ct.data(this, e, n)
            }) : u ? a(u, e, ct.data(u, e)) : null
        },
        removeData: function(e) {
            return this.each(function() {
                ct.removeData(this, e)
            })
        }
    }), ct.extend({
        queue: function(e, t, n) {
            var i;
            return e ? (t = (t || "fx") + "queue", i = ct._data(e, t), n && (!i || ct.isArray(n) ? i = ct._data(e, t, ct.makeArray(n)) : i.push(n)), i || []) : void 0
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = ct.queue(e, t),
                i = n.length,
                r = n.shift(),
                o = ct._queueHooks(e, t),
                a = function() {
                    ct.dequeue(e, t)
                };
            "inprogress" === r && (r = n.shift(), i--), r && ("fx" === t && n.unshift("inprogress"), delete o.stop, r.call(e, a, o)), !i && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return ct._data(e, n) || ct._data(e, n, {
                empty: ct.Callbacks("once memory").add(function() {
                    ct._removeData(e, t + "queue"), ct._removeData(e, n)
                })
            })
        }
    }), ct.fn.extend({
        queue: function(e, n) {
            var i = 2;
            return "string" != typeof e && (n = e, e = "fx", i--), arguments.length < i ? ct.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = ct.queue(this, e, n);
                ct._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && ct.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                ct.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = ct.fx ? ct.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var i = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(i)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var i, r = 1,
                o = ct.Deferred(),
                a = this,
                s = this.length,
                u = function() {
                    --r || o.resolveWith(a, [a])
                };
            for ("string" != typeof e && (n = e, e = t), e = e || "fx"; s--;) i = ct._data(a[s], e + "queueHooks"), i && i.empty && (r++, i.empty.add(u));
            return u(), o.promise(n)
        }
    });
    var Ft, At, Dt = /[\t\r\n\f]/g,
        $t = /\r/g,
        Nt = /^(?:input|select|textarea|button|object)$/i,
        Lt = /^(?:a|area)$/i,
        Mt = /^(?:checked|selected)$/i,
        jt = ct.support.getSetAttribute,
        Pt = ct.support.input;
    ct.fn.extend({
        attr: function(e, t) {
            return ct.access(this, ct.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                ct.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return ct.access(this, ct.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = ct.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, i, r, o, a = 0,
                s = this.length,
                u = "string" == typeof e && e;
            if (ct.isFunction(e)) return this.each(function(t) {
                ct(this).addClass(e.call(this, t, this.className))
            });
            if (u)
                for (t = (e || "").match(dt) || []; s > a; a++)
                    if (n = this[a], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(Dt, " ") : " ")) {
                        for (o = 0; r = t[o++];) i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                        n.className = ct.trim(i)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, i, r, o, a = 0,
                s = this.length,
                u = 0 === arguments.length || "string" == typeof e && e;
            if (ct.isFunction(e)) return this.each(function(t) {
                ct(this).removeClass(e.call(this, t, this.className))
            });
            if (u)
                for (t = (e || "").match(dt) || []; s > a; a++)
                    if (n = this[a], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(Dt, " ") : "")) {
                        for (o = 0; r = t[o++];)
                            for (; i.indexOf(" " + r + " ") >= 0;) i = i.replace(" " + r + " ", " ");
                        n.className = e ? ct.trim(i) : ""
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e;
            return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : this.each(ct.isFunction(e) ? function(n) {
                ct(this).toggleClass(e.call(this, n, this.className, t), t)
            } : function() {
                if ("string" === n)
                    for (var t, i = 0, r = ct(this), o = e.match(dt) || []; t = o[i++];) r.hasClass(t) ? r.removeClass(t) : r.addClass(t);
                else(n === X || "boolean" === n) && (this.className && ct._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : ct._data(this, "__className__") || "")
            })
        },
        hasClass: function(e) {
            for (var t = " " + e + " ", n = 0, i = this.length; i > n; n++)
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(Dt, " ").indexOf(t) >= 0) return !0;
            return !1
        },
        val: function(e) {
            var n, i, r, o = this[0]; {
                if (arguments.length) return r = ct.isFunction(e), this.each(function(n) {
                    var o;
                    1 === this.nodeType && (o = r ? e.call(this, n, ct(this).val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : ct.isArray(o) && (o = ct.map(o, function(e) {
                        return null == e ? "" : e + ""
                    })), i = ct.valHooks[this.type] || ct.valHooks[this.nodeName.toLowerCase()], i && "set" in i && i.set(this, o, "value") !== t || (this.value = o))
                });
                if (o) return i = ct.valHooks[o.type] || ct.valHooks[o.nodeName.toLowerCase()], i && "get" in i && (n = i.get(o, "value")) !== t ? n : (n = o.value, "string" == typeof n ? n.replace($t, "") : null == n ? "" : n)
            }
        }
    }), ct.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = ct.find.attr(e, "value");
                    return null != t ? t : e.text
                }
            },
            select: {
                get: function(e) {
                    for (var t, n, i = e.options, r = e.selectedIndex, o = "select-one" === e.type || 0 > r, a = o ? null : [], s = o ? r + 1 : i.length, u = 0 > r ? s : o ? r : 0; s > u; u++)
                        if (n = i[u], !(!n.selected && u !== r || (ct.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && ct.nodeName(n.parentNode, "optgroup"))) {
                            if (t = ct(n).val(), o) return t;
                            a.push(t)
                        }
                    return a
                },
                set: function(e, t) {
                    for (var n, i, r = e.options, o = ct.makeArray(t), a = r.length; a--;) i = r[a], (i.selected = ct.inArray(ct(i).val(), o) >= 0) && (n = !0);
                    return n || (e.selectedIndex = -1), o
                }
            }
        },
        attr: function(e, n, i) {
            var r, o, a = e.nodeType;
            if (e && 3 !== a && 8 !== a && 2 !== a) return typeof e.getAttribute === X ? ct.prop(e, n, i) : (1 === a && ct.isXMLDoc(e) || (n = n.toLowerCase(), r = ct.attrHooks[n] || (ct.expr.match.bool.test(n) ? At : Ft)), i === t ? r && "get" in r && null !== (o = r.get(e, n)) ? o : (o = ct.find.attr(e, n), null == o ? t : o) : null !== i ? r && "set" in r && (o = r.set(e, i, n)) !== t ? o : (e.setAttribute(n, i + ""), i) : void ct.removeAttr(e, n))
        },
        removeAttr: function(e, t) {
            var n, i, r = 0,
                o = t && t.match(dt);
            if (o && 1 === e.nodeType)
                for (; n = o[r++];) i = ct.propFix[n] || n, ct.expr.match.bool.test(n) ? Pt && jt || !Mt.test(n) ? e[i] = !1 : e[ct.camelCase("default-" + n)] = e[i] = !1 : ct.attr(e, n, ""), e.removeAttribute(jt ? n : i)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!ct.support.radioValue && "radio" === t && ct.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function(e, n, i) {
            var r, o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) return a = 1 !== s || !ct.isXMLDoc(e), a && (n = ct.propFix[n] || n, o = ct.propHooks[n]), i !== t ? o && "set" in o && (r = o.set(e, i, n)) !== t ? r : e[n] = i : o && "get" in o && null !== (r = o.get(e, n)) ? r : e[n]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = ct.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : Nt.test(e.nodeName) || Lt.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        }
    }), At = {
        set: function(e, t, n) {
            return t === !1 ? ct.removeAttr(e, n) : Pt && jt || !Mt.test(n) ? e.setAttribute(!jt && ct.propFix[n] || n, n) : e[ct.camelCase("default-" + n)] = e[n] = !0, n
        }
    }, ct.each(ct.expr.match.bool.source.match(/\w+/g), function(e, n) {
        var i = ct.expr.attrHandle[n] || ct.find.attr;
        ct.expr.attrHandle[n] = Pt && jt || !Mt.test(n) ? function(e, n, r) {
            var o = ct.expr.attrHandle[n],
                a = r ? t : (ct.expr.attrHandle[n] = t) != i(e, n, r) ? n.toLowerCase() : null;
            return ct.expr.attrHandle[n] = o, a
        } : function(e, n, i) {
            return i ? t : e[ct.camelCase("default-" + n)] ? n.toLowerCase() : null
        }
    }), Pt && jt || (ct.attrHooks.value = {
        set: function(e, t, n) {
            return ct.nodeName(e, "input") ? void(e.defaultValue = t) : Ft && Ft.set(e, t, n)
        }
    }), jt || (Ft = {
        set: function(e, n, i) {
            var r = e.getAttributeNode(i);
            return r || e.setAttributeNode(r = e.ownerDocument.createAttribute(i)), r.value = n += "", "value" === i || n === e.getAttribute(i) ? n : t
        }
    }, ct.expr.attrHandle.id = ct.expr.attrHandle.name = ct.expr.attrHandle.coords = function(e, n, i) {
        var r;
        return i ? t : (r = e.getAttributeNode(n)) && "" !== r.value ? r.value : null
    }, ct.valHooks.button = {
        get: function(e, n) {
            var i = e.getAttributeNode(n);
            return i && i.specified ? i.value : t
        },
        set: Ft.set
    }, ct.attrHooks.contenteditable = {
        set: function(e, t, n) {
            Ft.set(e, "" === t ? !1 : t, n)
        }
    }, ct.each(["width", "height"], function(e, t) {
        ct.attrHooks[t] = {
            set: function(e, n) {
                return "" === n ? (e.setAttribute(t, "auto"), n) : void 0
            }
        }
    })), ct.support.hrefNormalized || ct.each(["href", "src"], function(e, t) {
        ct.propHooks[t] = {
            get: function(e) {
                return e.getAttribute(t, 4)
            }
        }
    }), ct.support.style || (ct.attrHooks.style = {
        get: function(e) {
            return e.style.cssText || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), ct.support.optSelected || (ct.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    }), ct.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        ct.propFix[this.toLowerCase()] = this
    }), ct.support.enctype || (ct.propFix.enctype = "encoding"), ct.each(["radio", "checkbox"], function() {
        ct.valHooks[this] = {
            set: function(e, t) {
                return ct.isArray(t) ? e.checked = ct.inArray(ct(e).val(), t) >= 0 : void 0
            }
        }, ct.support.checkOn || (ct.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    });
    var It = /^(?:input|select|textarea)$/i,
        Ot = /^key/,
        Ht = /^(?:mouse|contextmenu)|click/,
        zt = /^(?:focusinfocus|focusoutblur)$/,
        Rt = /^([^.]*)(?:\.(.+)|)$/;
    ct.event = {
        global: {},
        add: function(e, n, i, r, o) {
            var a, s, u, l, c, h, d, f, p, m, g, v = ct._data(e);
            if (v) {
                for (i.handler && (l = i, i = l.handler, o = l.selector), i.guid || (i.guid = ct.guid++), (s = v.events) || (s = v.events = {}), (h = v.handle) || (h = v.handle = function(e) {
                        return typeof ct === X || e && ct.event.triggered === e.type ? t : ct.event.dispatch.apply(h.elem, arguments)
                    }, h.elem = e), n = (n || "").match(dt) || [""], u = n.length; u--;) a = Rt.exec(n[u]) || [], p = g = a[1], m = (a[2] || "").split(".").sort(), p && (c = ct.event.special[p] || {}, p = (o ? c.delegateType : c.bindType) || p, c = ct.event.special[p] || {}, d = ct.extend({
                    type: p,
                    origType: g,
                    data: r,
                    handler: i,
                    guid: i.guid,
                    selector: o,
                    needsContext: o && ct.expr.match.needsContext.test(o),
                    namespace: m.join(".")
                }, l), (f = s[p]) || (f = s[p] = [], f.delegateCount = 0, c.setup && c.setup.call(e, r, m, h) !== !1 || (e.addEventListener ? e.addEventListener(p, h, !1) : e.attachEvent && e.attachEvent("on" + p, h))), c.add && (c.add.call(e, d), d.handler.guid || (d.handler.guid = i.guid)), o ? f.splice(f.delegateCount++, 0, d) : f.push(d), ct.event.global[p] = !0);
                e = null
            }
        },
        remove: function(e, t, n, i, r) {
            var o, a, s, u, l, c, h, d, f, p, m, g = ct.hasData(e) && ct._data(e);
            if (g && (c = g.events)) {
                for (t = (t || "").match(dt) || [""], l = t.length; l--;)
                    if (s = Rt.exec(t[l]) || [], f = m = s[1], p = (s[2] || "").split(".").sort(), f) {
                        for (h = ct.event.special[f] || {}, f = (i ? h.delegateType : h.bindType) || f, d = c[f] || [], s = s[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), u = o = d.length; o--;) a = d[o], !r && m !== a.origType || n && n.guid !== a.guid || s && !s.test(a.namespace) || i && i !== a.selector && ("**" !== i || !a.selector) || (d.splice(o, 1), a.selector && d.delegateCount--, h.remove && h.remove.call(e, a));
                        u && !d.length && (h.teardown && h.teardown.call(e, p, g.handle) !== !1 || ct.removeEvent(e, f, g.handle), delete c[f])
                    } else
                        for (f in c) ct.event.remove(e, f + t[l], n, i, !0);
                ct.isEmptyObject(c) && (delete g.handle, ct._removeData(e, "events"))
            }
        },
        trigger: function(n, i, r, o) {
            var a, s, u, l, c, h, d, f = [r || Q],
                p = ut.call(n, "type") ? n.type : n,
                m = ut.call(n, "namespace") ? n.namespace.split(".") : [];
            if (u = h = r = r || Q, 3 !== r.nodeType && 8 !== r.nodeType && !zt.test(p + ct.event.triggered) && (p.indexOf(".") >= 0 && (m = p.split("."), p = m.shift(), m.sort()), s = p.indexOf(":") < 0 && "on" + p, n = n[ct.expando] ? n : new ct.Event(p, "object" == typeof n && n), n.isTrigger = o ? 2 : 3, n.namespace = m.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, n.result = t, n.target || (n.target = r), i = null == i ? [n] : ct.makeArray(i, [n]), c = ct.event.special[p] || {}, o || !c.trigger || c.trigger.apply(r, i) !== !1)) {
                if (!o && !c.noBubble && !ct.isWindow(r)) {
                    for (l = c.delegateType || p, zt.test(l + p) || (u = u.parentNode); u; u = u.parentNode) f.push(u), h = u;
                    h === (r.ownerDocument || Q) && f.push(h.defaultView || h.parentWindow || e)
                }
                for (d = 0;
                    (u = f[d++]) && !n.isPropagationStopped();) n.type = d > 1 ? l : c.bindType || p, a = (ct._data(u, "events") || {})[n.type] && ct._data(u, "handle"), a && a.apply(u, i), a = s && u[s], a && ct.acceptData(u) && a.apply && a.apply(u, i) === !1 && n.preventDefault();
                if (n.type = p, !o && !n.isDefaultPrevented() && (!c._default || c._default.apply(f.pop(), i) === !1) && ct.acceptData(r) && s && r[p] && !ct.isWindow(r)) {
                    h = r[s], h && (r[s] = null), ct.event.triggered = p;
                    try {
                        r[p]()
                    } catch (g) {}
                    ct.event.triggered = t, h && (r[s] = h)
                }
                return n.result
            }
        },
        dispatch: function(e) {
            e = ct.event.fix(e);
            var n, i, r, o, a, s = [],
                u = ot.call(arguments),
                l = (ct._data(this, "events") || {})[e.type] || [],
                c = ct.event.special[e.type] || {};
            if (u[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
                for (s = ct.event.handlers.call(this, e, l), n = 0;
                    (o = s[n++]) && !e.isPropagationStopped();)
                    for (e.currentTarget = o.elem, a = 0;
                        (r = o.handlers[a++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(r.namespace)) && (e.handleObj = r, e.data = r.data, i = ((ct.event.special[r.origType] || {}).handle || r.handler).apply(o.elem, u), i !== t && (e.result = i) === !1 && (e.preventDefault(), e.stopPropagation()));
                return c.postDispatch && c.postDispatch.call(this, e), e.result
            }
        },
        handlers: function(e, n) {
            var i, r, o, a, s = [],
                u = n.delegateCount,
                l = e.target;
            if (u && l.nodeType && (!e.button || "click" !== e.type))
                for (; l != this; l = l.parentNode || this)
                    if (1 === l.nodeType && (l.disabled !== !0 || "click" !== e.type)) {
                        for (o = [], a = 0; u > a; a++) r = n[a], i = r.selector + " ", o[i] === t && (o[i] = r.needsContext ? ct(i, this).index(l) >= 0 : ct.find(i, this, null, [l]).length), o[i] && o.push(r);
                        o.length && s.push({
                            elem: l,
                            handlers: o
                        })
                    }
            return u < n.length && s.push({
                elem: this,
                handlers: n.slice(u)
            }), s
        },
        fix: function(e) {
            if (e[ct.expando]) return e;
            var t, n, i, r = e.type,
                o = e,
                a = this.fixHooks[r];
            for (a || (this.fixHooks[r] = a = Ht.test(r) ? this.mouseHooks : Ot.test(r) ? this.keyHooks : {}), i = a.props ? this.props.concat(a.props) : this.props, e = new ct.Event(o), t = i.length; t--;) n = i[t], e[n] = o[n];
            return e.target || (e.target = o.srcElement || Q), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, a.filter ? a.filter(e, o) : e
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, n) {
                var i, r, o, a = n.button,
                    s = n.fromElement;
                return null == e.pageX && null != n.clientX && (r = e.target.ownerDocument || Q, o = r.documentElement, i = r.body, e.pageX = n.clientX + (o && o.scrollLeft || i && i.scrollLeft || 0) - (o && o.clientLeft || i && i.clientLeft || 0), e.pageY = n.clientY + (o && o.scrollTop || i && i.scrollTop || 0) - (o && o.clientTop || i && i.clientTop || 0)), !e.relatedTarget && s && (e.relatedTarget = s === e.target ? n.toElement : s), e.which || a === t || (e.which = 1 & a ? 1 : 2 & a ? 3 : 4 & a ? 2 : 0), e
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== c() && this.focus) try {
                        return this.focus(), !1
                    } catch (e) {}
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === c() && this.blur ? (this.blur(), !1) : void 0
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return ct.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                },
                _default: function(e) {
                    return ct.nodeName(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    e.result !== t && (e.originalEvent.returnValue = e.result)
                }
            }
        },
        simulate: function(e, t, n, i) {
            var r = ct.extend(new ct.Event, n, {
                type: e,
                isSimulated: !0,
                originalEvent: {}
            });
            i ? ct.event.trigger(r, null, t) : ct.event.dispatch.call(t, r), r.isDefaultPrevented() && n.preventDefault()
        }
    }, ct.removeEvent = Q.removeEventListener ? function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    } : function(e, t, n) {
        var i = "on" + t;
        e.detachEvent && (typeof e[i] === X && (e[i] = null), e.detachEvent(i, n))
    }, ct.Event = function(e, t) {
        return this instanceof ct.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? u : l) : this.type = e, t && ct.extend(this, t), this.timeStamp = e && e.timeStamp || ct.now(), void(this[ct.expando] = !0)) : new ct.Event(e, t)
    }, ct.Event.prototype = {
        isDefaultPrevented: l,
        isPropagationStopped: l,
        isImmediatePropagationStopped: l,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = u, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = u, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = u, this.stopPropagation()
        }
    }, ct.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function(e, t) {
        ct.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, i = this,
                    r = e.relatedTarget,
                    o = e.handleObj;
                return (!r || r !== i && !ct.contains(i, r)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
            }
        }
    }), ct.support.submitBubbles || (ct.event.special.submit = {
        setup: function() {
            return ct.nodeName(this, "form") ? !1 : void ct.event.add(this, "click._submit keypress._submit", function(e) {
                var n = e.target,
                    i = ct.nodeName(n, "input") || ct.nodeName(n, "button") ? n.form : t;
                i && !ct._data(i, "submitBubbles") && (ct.event.add(i, "submit._submit", function(e) {
                    e._submit_bubble = !0
                }), ct._data(i, "submitBubbles", !0))
            })
        },
        postDispatch: function(e) {
            e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && ct.event.simulate("submit", this.parentNode, e, !0))
        },
        teardown: function() {
            return ct.nodeName(this, "form") ? !1 : void ct.event.remove(this, "._submit")
        }
    }), ct.support.changeBubbles || (ct.event.special.change = {
        setup: function() {
            return It.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (ct.event.add(this, "propertychange._change", function(e) {
                "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
            }), ct.event.add(this, "click._change", function(e) {
                this._just_changed && !e.isTrigger && (this._just_changed = !1), ct.event.simulate("change", this, e, !0)
            })), !1) : void ct.event.add(this, "beforeactivate._change", function(e) {
                var t = e.target;
                It.test(t.nodeName) && !ct._data(t, "changeBubbles") && (ct.event.add(t, "change._change", function(e) {
                    !this.parentNode || e.isSimulated || e.isTrigger || ct.event.simulate("change", this.parentNode, e, !0)
                }), ct._data(t, "changeBubbles", !0))
            })
        },
        handle: function(e) {
            var t = e.target;
            return this !== t || e.isSimulated || e.isTrigger || "radio" !== t.type && "checkbox" !== t.type ? e.handleObj.handler.apply(this, arguments) : void 0
        },
        teardown: function() {
            return ct.event.remove(this, "._change"), !It.test(this.nodeName)
        }
    }), ct.support.focusinBubbles || ct.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = 0,
            i = function(e) {
                ct.event.simulate(t, e.target, ct.event.fix(e), !0)
            };
        ct.event.special[t] = {
            setup: function() {
                0 === n++ && Q.addEventListener(e, i, !0)
            },
            teardown: function() {
                0 === --n && Q.removeEventListener(e, i, !0)
            }
        }
    }), ct.fn.extend({
        on: function(e, n, i, r, o) {
            var a, s;
            if ("object" == typeof e) {
                "string" != typeof n && (i = i || n, n = t);
                for (a in e) this.on(a, n, i, e[a], o);
                return this
            }
            if (null == i && null == r ? (r = n, i = n = t) : null == r && ("string" == typeof n ? (r = i, i = t) : (r = i, i = n, n = t)), r === !1) r = l;
            else if (!r) return this;
            return 1 === o && (s = r, r = function(e) {
                return ct().off(e), s.apply(this, arguments)
            }, r.guid = s.guid || (s.guid = ct.guid++)), this.each(function() {
                ct.event.add(this, e, r, i, n)
            })
        },
        one: function(e, t, n, i) {
            return this.on(e, t, n, i, 1)
        },
        off: function(e, n, i) {
            var r, o;
            if (e && e.preventDefault && e.handleObj) return r = e.handleObj, ct(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
            if ("object" == typeof e) {
                for (o in e) this.off(o, n, e[o]);
                return this
            }
            return (n === !1 || "function" == typeof n) && (i = n, n = t), i === !1 && (i = l), this.each(function() {
                ct.event.remove(this, e, i, n)
            })
        },
        trigger: function(e, t) {
            return this.each(function() {
                ct.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            return n ? ct.event.trigger(e, t, n, !0) : void 0
        }
    });
    var qt = /^.[^:#\[\.,]*$/,
        Wt = /^(?:parents|prev(?:Until|All))/,
        Bt = ct.expr.match.needsContext,
        Yt = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    ct.fn.extend({
        find: function(e) {
            var t, n = [],
                i = this,
                r = i.length;
            if ("string" != typeof e) return this.pushStack(ct(e).filter(function() {
                for (t = 0; r > t; t++)
                    if (ct.contains(i[t], this)) return !0
            }));
            for (t = 0; r > t; t++) ct.find(e, i[t], n);
            return n = this.pushStack(r > 1 ? ct.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n
        },
        has: function(e) {
            var t, n = ct(e, this),
                i = n.length;
            return this.filter(function() {
                for (t = 0; i > t; t++)
                    if (ct.contains(this, n[t])) return !0
            })
        },
        not: function(e) {
            return this.pushStack(d(this, e || [], !0))
        },
        filter: function(e) {
            return this.pushStack(d(this, e || [], !1))
        },
        is: function(e) {
            return !!d(this, "string" == typeof e && Bt.test(e) ? ct(e) : e || [], !1).length
        },
        closest: function(e, t) {
            for (var n, i = 0, r = this.length, o = [], a = Bt.test(e) || "string" != typeof e ? ct(e, t || this.context) : 0; r > i; i++)
                for (n = this[i]; n && n !== t; n = n.parentNode)
                    if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && ct.find.matchesSelector(n, e))) {
                        n = o.push(n);
                        break
                    }
            return this.pushStack(o.length > 1 ? ct.unique(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? ct.inArray(this[0], ct(e)) : ct.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            var n = "string" == typeof e ? ct(e, t) : ct.makeArray(e && e.nodeType ? [e] : e),
                i = ct.merge(this.get(), n);
            return this.pushStack(ct.unique(i))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }), ct.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return ct.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return ct.dir(e, "parentNode", n)
        },
        next: function(e) {
            return h(e, "nextSibling")
        },
        prev: function(e) {
            return h(e, "previousSibling")
        },
        nextAll: function(e) {
            return ct.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return ct.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return ct.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return ct.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return ct.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return ct.sibling(e.firstChild)
        },
        contents: function(e) {
            return ct.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : ct.merge([], e.childNodes)
        }
    }, function(e, t) {
        ct.fn[e] = function(n, i) {
            var r = ct.map(this, t, n);
            return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (r = ct.filter(i, r)), this.length > 1 && (Yt[e] || (r = ct.unique(r)), Wt.test(e) && (r = r.reverse())), this.pushStack(r)
        }
    }), ct.extend({
        filter: function(e, t, n) {
            var i = t[0];
            return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? ct.find.matchesSelector(i, e) ? [i] : [] : ct.find.matches(e, ct.grep(t, function(e) {
                return 1 === e.nodeType
            }))
        },
        dir: function(e, n, i) {
            for (var r = [], o = e[n]; o && 9 !== o.nodeType && (i === t || 1 !== o.nodeType || !ct(o).is(i));) 1 === o.nodeType && r.push(o), o = o[n];
            return r
        },
        sibling: function(e, t) {
            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n
        }
    });
    var Ut = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        Vt = / jQuery\d+="(?:null|\d+)"/g,
        Xt = new RegExp("<(?:" + Ut + ")[\\s/>]", "i"),
        Gt = /^\s+/,
        Qt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        Kt = /<([\w:]+)/,
        Zt = /<tbody/i,
        Jt = /<|&#?\w+;/,
        en = /<(?:script|style|link)/i,
        tn = /^(?:checkbox|radio)$/i,
        nn = /checked\s*(?:[^=]|=\s*.checked.)/i,
        rn = /^$|\/(?:java|ecma)script/i,
        on = /^true\/(.*)/,
        an = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        sn = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: ct.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
        },
        un = f(Q),
        ln = un.appendChild(Q.createElement("div"));
    sn.optgroup = sn.option, sn.tbody = sn.tfoot = sn.colgroup = sn.caption = sn.thead, sn.th = sn.td, ct.fn.extend({
        text: function(e) {
            return ct.access(this, function(e) {
                return e === t ? ct.text(this) : this.empty().append((this[0] && this[0].ownerDocument || Q).createTextNode(e))
            }, null, e, arguments.length)
        },
        append: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = p(this, e);
                    t.appendChild(e)
                }
            })
        },
        prepend: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = p(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        remove: function(e, t) {
            for (var n, i = e ? ct.filter(e, this) : this, r = 0; null != (n = i[r]); r++) t || 1 !== n.nodeType || ct.cleanData(w(n)), n.parentNode && (t && ct.contains(n.ownerDocument, n) && v(w(n, "script")), n.parentNode.removeChild(n));
            return this
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++) {
                for (1 === e.nodeType && ct.cleanData(w(e, !1)); e.firstChild;) e.removeChild(e.firstChild);
                e.options && ct.nodeName(e, "select") && (e.options.length = 0)
            }
            return this
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                return ct.clone(this, e, t)
            })
        },
        html: function(e) {
            return ct.access(this, function(e) {
                var n = this[0] || {},
                    i = 0,
                    r = this.length;
                if (e === t) return 1 === n.nodeType ? n.innerHTML.replace(Vt, "") : t;
                if (!("string" != typeof e || en.test(e) || !ct.support.htmlSerialize && Xt.test(e) || !ct.support.leadingWhitespace && Gt.test(e) || sn[(Kt.exec(e) || ["", ""])[1].toLowerCase()])) {
                    e = e.replace(Qt, "<$1></$2>");
                    try {
                        for (; r > i; i++) n = this[i] || {}, 1 === n.nodeType && (ct.cleanData(w(n, !1)), n.innerHTML = e);
                        n = 0
                    } catch (o) {}
                }
                n && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = ct.map(this, function(e) {
                    return [e.nextSibling, e.parentNode]
                }),
                t = 0;
            return this.domManip(arguments, function(n) {
                var i = e[t++],
                    r = e[t++];
                r && (i && i.parentNode !== r && (i = this.nextSibling), ct(this).remove(), r.insertBefore(n, i))
            }, !0), t ? this : this.remove()
        },
        detach: function(e) {
            return this.remove(e, !0)
        },
        domManip: function(e, t, n) {
            e = it.apply([], e);
            var i, r, o, a, s, u, l = 0,
                c = this.length,
                h = this,
                d = c - 1,
                f = e[0],
                p = ct.isFunction(f);
            if (p || !(1 >= c || "string" != typeof f || ct.support.checkClone) && nn.test(f)) return this.each(function(i) {
                var r = h.eq(i);
                p && (e[0] = f.call(this, i, r.html())), r.domManip(e, t, n)
            });
            if (c && (u = ct.buildFragment(e, this[0].ownerDocument, !1, !n && this), i = u.firstChild, 1 === u.childNodes.length && (u = i), i)) {
                for (a = ct.map(w(u, "script"), m), o = a.length; c > l; l++) r = u, l !== d && (r = ct.clone(r, !0, !0), o && ct.merge(a, w(r, "script"))), t.call(this[l], r, l);
                if (o)
                    for (s = a[a.length - 1].ownerDocument, ct.map(a, g), l = 0; o > l; l++) r = a[l], rn.test(r.type || "") && !ct._data(r, "globalEval") && ct.contains(s, r) && (r.src ? ct._evalUrl(r.src) : ct.globalEval((r.text || r.textContent || r.innerHTML || "").replace(an, "")));
                u = i = null
            }
            return this
        }
    }), ct.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        ct.fn[e] = function(e) {
            for (var n, i = 0, r = [], o = ct(e), a = o.length - 1; a >= i; i++) n = i === a ? this : this.clone(!0), ct(o[i])[t](n), rt.apply(r, n.get());
            return this.pushStack(r)
        }
    }), ct.extend({
        clone: function(e, t, n) {
            var i, r, o, a, s, u = ct.contains(e.ownerDocument, e);
            if (ct.support.html5Clone || ct.isXMLDoc(e) || !Xt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (ln.innerHTML = e.outerHTML, ln.removeChild(o = ln.firstChild)), !(ct.support.noCloneEvent && ct.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || ct.isXMLDoc(e)))
                for (i = w(o), s = w(e), a = 0; null != (r = s[a]); ++a) i[a] && b(r, i[a]);
            if (t)
                if (n)
                    for (s = s || w(e), i = i || w(o), a = 0; null != (r = s[a]); a++) y(r, i[a]);
                else y(e, o);
            return i = w(o, "script"), i.length > 0 && v(i, !u && w(e, "script")), i = s = r = null, o
        },
        buildFragment: function(e, t, n, i) {
            for (var r, o, a, s, u, l, c, h = e.length, d = f(t), p = [], m = 0; h > m; m++)
                if (o = e[m], o || 0 === o)
                    if ("object" === ct.type(o)) ct.merge(p, o.nodeType ? [o] : o);
                    else if (Jt.test(o)) {
                for (s = s || d.appendChild(t.createElement("div")), u = (Kt.exec(o) || ["", ""])[1].toLowerCase(), c = sn[u] || sn._default, s.innerHTML = c[1] + o.replace(Qt, "<$1></$2>") + c[2], r = c[0]; r--;) s = s.lastChild;
                if (!ct.support.leadingWhitespace && Gt.test(o) && p.push(t.createTextNode(Gt.exec(o)[0])), !ct.support.tbody)
                    for (o = "table" !== u || Zt.test(o) ? "<table>" !== c[1] || Zt.test(o) ? 0 : s : s.firstChild, r = o && o.childNodes.length; r--;) ct.nodeName(l = o.childNodes[r], "tbody") && !l.childNodes.length && o.removeChild(l);
                for (ct.merge(p, s.childNodes), s.textContent = ""; s.firstChild;) s.removeChild(s.firstChild);
                s = d.lastChild
            } else p.push(t.createTextNode(o));
            for (s && d.removeChild(s), ct.support.appendChecked || ct.grep(w(p, "input"), x), m = 0; o = p[m++];)
                if ((!i || -1 === ct.inArray(o, i)) && (a = ct.contains(o.ownerDocument, o), s = w(d.appendChild(o), "script"), a && v(s), n))
                    for (r = 0; o = s[r++];) rn.test(o.type || "") && n.push(o);
            return s = null, d
        },
        cleanData: function(e, t) {
            for (var n, i, r, o, a = 0, s = ct.expando, u = ct.cache, l = ct.support.deleteExpando, c = ct.event.special; null != (n = e[a]); a++)
                if ((t || ct.acceptData(n)) && (r = n[s], o = r && u[r])) {
                    if (o.events)
                        for (i in o.events) c[i] ? ct.event.remove(n, i) : ct.removeEvent(n, i, o.handle);
                    u[r] && (delete u[r], l ? delete n[s] : typeof n.removeAttribute !== X ? n.removeAttribute(s) : n[s] = null, tt.push(r))
                }
        },
        _evalUrl: function(e) {
            return ct.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                "throws": !0
            })
        }
    }), ct.fn.extend({
        wrapAll: function(e) {
            if (ct.isFunction(e)) return this.each(function(t) {
                ct(this).wrapAll(e.call(this, t))
            });
            if (this[0]) {
                var t = ct(e, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                    for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;) e = e.firstChild;
                    return e
                }).append(this)
            }
            return this
        },
        wrapInner: function(e) {
            return this.each(ct.isFunction(e) ? function(t) {
                ct(this).wrapInner(e.call(this, t))
            } : function() {
                var t = ct(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = ct.isFunction(e);
            return this.each(function(n) {
                ct(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                ct.nodeName(this, "body") || ct(this).replaceWith(this.childNodes)
            }).end()
        }
    });
    var cn, hn, dn, fn = /alpha\([^)]*\)/i,
        pn = /opacity\s*=\s*([^)]*)/,
        mn = /^(top|right|bottom|left)$/,
        gn = /^(none|table(?!-c[ea]).+)/,
        vn = /^margin/,
        yn = new RegExp("^(" + ht + ")(.*)$", "i"),
        bn = new RegExp("^(" + ht + ")(?!px)[a-z%]+$", "i"),
        wn = new RegExp("^([+-])=(" + ht + ")", "i"),
        xn = {
            BODY: "block"
        },
        _n = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Tn = {
            letterSpacing: 0,
            fontWeight: 400
        },
        Cn = ["Top", "Right", "Bottom", "Left"],
        kn = ["Webkit", "O", "Moz", "ms"];
    ct.fn.extend({
        css: function(e, n) {
            return ct.access(this, function(e, n, i) {
                var r, o, a = {},
                    s = 0;
                if (ct.isArray(n)) {
                    for (o = hn(e), r = n.length; r > s; s++) a[n[s]] = ct.css(e, n[s], !1, o);
                    return a
                }
                return i !== t ? ct.style(e, n, i) : ct.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return C(this, !0)
        },
        hide: function() {
            return C(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                T(this) ? ct(this).show() : ct(this).hide()
            })
        }
    }), ct.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = dn(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": ct.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, i, r) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o, a, s, u = ct.camelCase(n),
                    l = e.style;
                if (n = ct.cssProps[u] || (ct.cssProps[u] = _(l, u)), s = ct.cssHooks[n] || ct.cssHooks[u], i === t) return s && "get" in s && (o = s.get(e, !1, r)) !== t ? o : l[n];
                if (a = typeof i, "string" === a && (o = wn.exec(i)) && (i = (o[1] + 1) * o[2] + parseFloat(ct.css(e, n)), a = "number"), !(null == i || "number" === a && isNaN(i) || ("number" !== a || ct.cssNumber[u] || (i += "px"), ct.support.clearCloneStyle || "" !== i || 0 !== n.indexOf("background") || (l[n] = "inherit"), s && "set" in s && (i = s.set(e, i, r)) === t))) try {
                    l[n] = i
                } catch (c) {}
            }
        },
        css: function(e, n, i, r) {
            var o, a, s, u = ct.camelCase(n);
            return n = ct.cssProps[u] || (ct.cssProps[u] = _(e.style, u)), s = ct.cssHooks[n] || ct.cssHooks[u], s && "get" in s && (a = s.get(e, !0, i)), a === t && (a = dn(e, n, r)), "normal" === a && n in Tn && (a = Tn[n]), "" === i || i ? (o = parseFloat(a), i === !0 || ct.isNumeric(o) ? o || 0 : a) : a
        }
    }), e.getComputedStyle ? (hn = function(t) {
        return e.getComputedStyle(t, null)
    }, dn = function(e, n, i) {
        var r, o, a, s = i || hn(e),
            u = s ? s.getPropertyValue(n) || s[n] : t,
            l = e.style;
        return s && ("" !== u || ct.contains(e.ownerDocument, e) || (u = ct.style(e, n)), bn.test(u) && vn.test(n) && (r = l.width, o = l.minWidth, a = l.maxWidth, l.minWidth = l.maxWidth = l.width = u, u = s.width, l.width = r, l.minWidth = o, l.maxWidth = a)), u
    }) : Q.documentElement.currentStyle && (hn = function(e) {
        return e.currentStyle
    }, dn = function(e, n, i) {
        var r, o, a, s = i || hn(e),
            u = s ? s[n] : t,
            l = e.style;
        return null == u && l && l[n] && (u = l[n]), bn.test(u) && !mn.test(n) && (r = l.left, o = e.runtimeStyle, a = o && o.left, a && (o.left = e.currentStyle.left), l.left = "fontSize" === n ? "1em" : u, u = l.pixelLeft + "px", l.left = r, a && (o.left = a)), "" === u ? "auto" : u
    }), ct.each(["height", "width"], function(e, t) {
        ct.cssHooks[t] = {
            get: function(e, n, i) {
                return n ? 0 === e.offsetWidth && gn.test(ct.css(e, "display")) ? ct.swap(e, _n, function() {
                    return E(e, t, i)
                }) : E(e, t, i) : void 0
            },
            set: function(e, n, i) {
                var r = i && hn(e);
                return k(e, n, i ? S(e, t, i, ct.support.boxSizing && "border-box" === ct.css(e, "boxSizing", !1, r), r) : 0)
            }
        }
    }), ct.support.opacity || (ct.cssHooks.opacity = {
        get: function(e, t) {
            return pn.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                i = e.currentStyle,
                r = ct.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                o = i && i.filter || n.filter || "";
            n.zoom = 1, (t >= 1 || "" === t) && "" === ct.trim(o.replace(fn, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || i && !i.filter) || (n.filter = fn.test(o) ? o.replace(fn, r) : o + " " + r)
        }
    }), ct(function() {
        ct.support.reliableMarginRight || (ct.cssHooks.marginRight = {
            get: function(e, t) {
                return t ? ct.swap(e, {
                    display: "inline-block"
                }, dn, [e, "marginRight"]) : void 0
            }
        }), !ct.support.pixelPosition && ct.fn.position && ct.each(["top", "left"], function(e, t) {
            ct.cssHooks[t] = {
                get: function(e, n) {
                    return n ? (n = dn(e, t), bn.test(n) ? ct(e).position()[t] + "px" : n) : void 0
                }
            }
        })
    }), ct.expr && ct.expr.filters && (ct.expr.filters.hidden = function(e) {
        return e.offsetWidth <= 0 && e.offsetHeight <= 0 || !ct.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || ct.css(e, "display"))
    }, ct.expr.filters.visible = function(e) {
        return !ct.expr.filters.hidden(e)
    }), ct.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        ct.cssHooks[e + t] = {
            expand: function(n) {
                for (var i = 0, r = {}, o = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++) r[e + Cn[i] + t] = o[i] || o[i - 2] || o[0];
                return r
            }
        }, vn.test(e) || (ct.cssHooks[e + t].set = k)
    });
    var Sn = /%20/g,
        En = /\[\]$/,
        Fn = /\r?\n/g,
        An = /^(?:submit|button|image|reset|file)$/i,
        Dn = /^(?:input|select|textarea|keygen)/i;
    ct.fn.extend({
        serialize: function() {
            return ct.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = ct.prop(this, "elements");
                return e ? ct.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !ct(this).is(":disabled") && Dn.test(this.nodeName) && !An.test(e) && (this.checked || !tn.test(e))
            }).map(function(e, t) {
                var n = ct(this).val();
                return null == n ? null : ct.isArray(n) ? ct.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(Fn, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(Fn, "\r\n")
                }
            }).get()
        }
    }), ct.param = function(e, n) {
        var i, r = [],
            o = function(e, t) {
                t = ct.isFunction(t) ? t() : null == t ? "" : t, r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        if (n === t && (n = ct.ajaxSettings && ct.ajaxSettings.traditional), ct.isArray(e) || e.jquery && !ct.isPlainObject(e)) ct.each(e, function() {
            o(this.name, this.value)
        });
        else
            for (i in e) D(i, e[i], n, o);
        return r.join("&").replace(Sn, "+")
    }, ct.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        ct.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }), ct.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        },
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, i) {
            return this.on(t, e, n, i)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    });
    var $n, Nn, Ln = ct.now(),
        Mn = /\?/,
        jn = /#.*$/,
        Pn = /([?&])_=[^&]*/,
        In = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        On = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Hn = /^(?:GET|HEAD)$/,
        zn = /^\/\//,
        Rn = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        qn = ct.fn.load,
        Wn = {},
        Bn = {},
        Yn = "*/".concat("*");
    try {
        Nn = G.href
    } catch (Un) {
        Nn = Q.createElement("a"), Nn.href = "", Nn = Nn.href
    }
    $n = Rn.exec(Nn.toLowerCase()) || [], ct.fn.load = function(e, n, i) {
        if ("string" != typeof e && qn) return qn.apply(this, arguments);
        var r, o, a, s = this,
            u = e.indexOf(" ");
        return u >= 0 && (r = e.slice(u, e.length), e = e.slice(0, u)), ct.isFunction(n) ? (i = n, n = t) : n && "object" == typeof n && (a = "POST"), s.length > 0 && ct.ajax({
            url: e,
            type: a,
            dataType: "html",
            data: n
        }).done(function(e) {
            o = arguments, s.html(r ? ct("<div>").append(ct.parseHTML(e)).find(r) : e)
        }).complete(i && function(e, t) {
            s.each(i, o || [e.responseText, t, e])
        }), this
    }, ct.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        ct.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), ct.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Nn,
            type: "GET",
            isLocal: On.test($n[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Yn,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": ct.parseJSON,
                "text xml": ct.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? L(L(e, ct.ajaxSettings), t) : L(ct.ajaxSettings, e)
        },
        ajaxPrefilter: $(Wn),
        ajaxTransport: $(Bn),
        ajax: function(e, n) {
            function i(e, n, i, r) {
                var o, h, y, b, x, T = n;
                2 !== w && (w = 2, u && clearTimeout(u), c = t, s = r || "", _.readyState = e > 0 ? 4 : 0, o = e >= 200 && 300 > e || 304 === e, i && (b = M(d, _, i)), b = j(d, b, _, o), o ? (d.ifModified && (x = _.getResponseHeader("Last-Modified"), x && (ct.lastModified[a] = x), x = _.getResponseHeader("etag"), x && (ct.etag[a] = x)), 204 === e || "HEAD" === d.type ? T = "nocontent" : 304 === e ? T = "notmodified" : (T = b.state, h = b.data, y = b.error, o = !y)) : (y = T, (e || !T) && (T = "error", 0 > e && (e = 0))), _.status = e, _.statusText = (n || T) + "", o ? m.resolveWith(f, [h, T, _]) : m.rejectWith(f, [_, T, y]), _.statusCode(v), v = t, l && p.trigger(o ? "ajaxSuccess" : "ajaxError", [_, d, o ? h : y]), g.fireWith(f, [_, T]), l && (p.trigger("ajaxComplete", [_, d]), --ct.active || ct.event.trigger("ajaxStop")))
            }
            "object" == typeof e && (n = e, e = t), n = n || {};
            var r, o, a, s, u, l, c, h, d = ct.ajaxSetup({}, n),
                f = d.context || d,
                p = d.context && (f.nodeType || f.jquery) ? ct(f) : ct.event,
                m = ct.Deferred(),
                g = ct.Callbacks("once memory"),
                v = d.statusCode || {},
                y = {},
                b = {},
                w = 0,
                x = "canceled",
                _ = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === w) {
                            if (!h)
                                for (h = {}; t = In.exec(s);) h[t[1].toLowerCase()] = t[2];
                            t = h[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return 2 === w ? s : null
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return w || (e = b[n] = b[n] || e, y[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return w || (d.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e)
                            if (2 > w)
                                for (t in e) v[t] = [v[t], e[t]];
                            else _.always(e[_.status]);
                        return this
                    },
                    abort: function(e) {
                        var t = e || x;
                        return c && c.abort(t), i(0, t), this
                    }
                };
            if (m.promise(_).complete = g.add, _.success = _.done, _.error = _.fail, d.url = ((e || d.url || Nn) + "").replace(jn, "").replace(zn, $n[1] + "//"), d.type = n.method || n.type || d.method || d.type, d.dataTypes = ct.trim(d.dataType || "*").toLowerCase().match(dt) || [""], null == d.crossDomain && (r = Rn.exec(d.url.toLowerCase()), d.crossDomain = !(!r || r[1] === $n[1] && r[2] === $n[2] && (r[3] || ("http:" === r[1] ? "80" : "443")) === ($n[3] || ("http:" === $n[1] ? "80" : "443")))), d.data && d.processData && "string" != typeof d.data && (d.data = ct.param(d.data, d.traditional)), N(Wn, d, n, _), 2 === w) return _;
            l = d.global, l && 0 === ct.active++ && ct.event.trigger("ajaxStart"), d.type = d.type.toUpperCase(), d.hasContent = !Hn.test(d.type), a = d.url, d.hasContent || (d.data && (a = d.url += (Mn.test(a) ? "&" : "?") + d.data, delete d.data), d.cache === !1 && (d.url = Pn.test(a) ? a.replace(Pn, "$1_=" + Ln++) : a + (Mn.test(a) ? "&" : "?") + "_=" + Ln++)), d.ifModified && (ct.lastModified[a] && _.setRequestHeader("If-Modified-Since", ct.lastModified[a]), ct.etag[a] && _.setRequestHeader("If-None-Match", ct.etag[a])), (d.data && d.hasContent && d.contentType !== !1 || n.contentType) && _.setRequestHeader("Content-Type", d.contentType), _.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Yn + "; q=0.01" : "") : d.accepts["*"]);
            for (o in d.headers) _.setRequestHeader(o, d.headers[o]);
            if (d.beforeSend && (d.beforeSend.call(f, _, d) === !1 || 2 === w)) return _.abort();
            x = "abort";
            for (o in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) _[o](d[o]);
            if (c = N(Bn, d, n, _)) {
                _.readyState = 1, l && p.trigger("ajaxSend", [_, d]), d.async && d.timeout > 0 && (u = setTimeout(function() {
                    _.abort("timeout")
                }, d.timeout));
                try {
                    w = 1, c.send(y, i)
                } catch (T) {
                    if (!(2 > w)) throw T;
                    i(-1, T)
                }
            } else i(-1, "No Transport");
            return _
        },
        getJSON: function(e, t, n) {
            return ct.get(e, t, n, "json")
        },
        getScript: function(e, n) {
            return ct.get(e, t, n, "script")
        }
    }), ct.each(["get", "post"], function(e, n) {
        ct[n] = function(e, i, r, o) {
            return ct.isFunction(i) && (o = o || r, r = i, i = t), ct.ajax({
                url: e,
                type: n,
                dataType: o,
                data: i,
                success: r
            })
        }
    }), ct.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return ct.globalEval(e), e
            }
        }
    }), ct.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), ct.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, i = Q.head || ct("head")[0] || Q.documentElement;
            return {
                send: function(t, r) {
                    n = Q.createElement("script"), n.async = !0, e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, t) {
                        (t || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, n.parentNode && n.parentNode.removeChild(n), n = null, t || r(200, "success"))
                    }, i.insertBefore(n, i.firstChild)
                },
                abort: function() {
                    n && n.onload(t, !0)
                }
            }
        }
    });
    var Vn = [],
        Xn = /(=)\?(?=&|$)|\?\?/;
    ct.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Vn.pop() || ct.expando + "_" + Ln++;
            return this[e] = !0, e
        }
    }), ct.ajaxPrefilter("json jsonp", function(n, i, r) {
        var o, a, s, u = n.jsonp !== !1 && (Xn.test(n.url) ? "url" : "string" == typeof n.data && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Xn.test(n.data) && "data");
        return u || "jsonp" === n.dataTypes[0] ? (o = n.jsonpCallback = ct.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, u ? n[u] = n[u].replace(Xn, "$1" + o) : n.jsonp !== !1 && (n.url += (Mn.test(n.url) ? "&" : "?") + n.jsonp + "=" + o), n.converters["script json"] = function() {
            return s || ct.error(o + " was not called"), s[0]
        }, n.dataTypes[0] = "json", a = e[o], e[o] = function() {
            s = arguments
        }, r.always(function() {
            e[o] = a, n[o] && (n.jsonpCallback = i.jsonpCallback, Vn.push(o)), s && ct.isFunction(a) && a(s[0]), s = a = t
        }), "script") : void 0
    });
    var Gn, Qn, Kn = 0,
        Zn = e.ActiveXObject && function() {
            var e;
            for (e in Gn) Gn[e](t, !0)
        };
    ct.ajaxSettings.xhr = e.ActiveXObject ? function() {
        return !this.isLocal && P() || I()
    } : P, Qn = ct.ajaxSettings.xhr(), ct.support.cors = !!Qn && "withCredentials" in Qn, Qn = ct.support.ajax = !!Qn, Qn && ct.ajaxTransport(function(n) {
        if (!n.crossDomain || ct.support.cors) {
            var i;
            return {
                send: function(r, o) {
                    var a, s, u = n.xhr();
                    if (n.username ? u.open(n.type, n.url, n.async, n.username, n.password) : u.open(n.type, n.url, n.async), n.xhrFields)
                        for (s in n.xhrFields) u[s] = n.xhrFields[s];
                    n.mimeType && u.overrideMimeType && u.overrideMimeType(n.mimeType), n.crossDomain || r["X-Requested-With"] || (r["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (s in r) u.setRequestHeader(s, r[s])
                    } catch (l) {}
                    u.send(n.hasContent && n.data || null), i = function(e, r) {
                        var s, l, c, h;
                        try {
                            if (i && (r || 4 === u.readyState))
                                if (i = t, a && (u.onreadystatechange = ct.noop, Zn && delete Gn[a]), r) 4 !== u.readyState && u.abort();
                                else {
                                    h = {}, s = u.status, l = u.getAllResponseHeaders(), "string" == typeof u.responseText && (h.text = u.responseText);
                                    try {
                                        c = u.statusText
                                    } catch (d) {
                                        c = ""
                                    }
                                    s || !n.isLocal || n.crossDomain ? 1223 === s && (s = 204) : s = h.text ? 200 : 404
                                }
                        } catch (f) {
                            r || o(-1, f)
                        }
                        h && o(s, c, h, l)
                    }, n.async ? 4 === u.readyState ? setTimeout(i) : (a = ++Kn, Zn && (Gn || (Gn = {}, ct(e).unload(Zn)), Gn[a] = i), u.onreadystatechange = i) : i()
                },
                abort: function() {
                    i && i(t, !0)
                }
            }
        }
    });
    
    
}(window),
function(e) {
    function t(t, i, r) {
        var o = this;
        return this.on("click.pjax", t, function(t) {
            var a = e.extend({}, m(i, r));
            a.container || (a.container = e(this).attr("data-pjax") || o), n(t, a)
        })
    }

    function n(t, n, i) {
        i = m(n, i);
        var o = t.currentTarget;
        if ("A" !== o.tagName.toUpperCase()) throw "$.fn.pjax or $.pjax.click requires an anchor element";
        if (!(t.which > 1 || t.metaKey || t.ctrlKey || t.shiftKey || t.altKey || location.protocol !== o.protocol || location.hostname !== o.hostname || o.href.indexOf("#") > -1 && p(o) == p(location) || t.isDefaultPrevented())) {
            var a = {
                    url: o.href,
                    container: e(o).attr("data-pjax"),
                    target: o
                },
                s = e.extend({}, a, i),
                u = e.Event("pjax:click");
            e(o).trigger(u, [s]), u.isDefaultPrevented() || (r(s), t.preventDefault(), e(o).trigger("pjax:clicked", [s]))
        }
    }

    function i(t, n, i) {
        i = m(n, i);
        var o = t.currentTarget;
        if ("FORM" !== o.tagName.toUpperCase()) throw "$.pjax.submit requires a form element";
        var a = {
            type: o.method.toUpperCase(),
            url: o.action,
            container: e(o).attr("data-pjax"),
            target: o
        };
        if ("GET" !== a.type && void 0 !== window.FormData) a.data = new FormData(o), a.processData = !1, a.contentType = !1;
        else {
            if (e(o).find(":file").length) return;
            a.data = e(o).serializeArray()
        }
        r(e.extend({}, a, i)), t.preventDefault()
    }

    function r(t) {
        function n(t, n, r) {
            r || (r = {}), r.relatedTarget = i;
            var o = e.Event(t, r);
            return s.trigger(o, n), !o.isDefaultPrevented()
        }
        t = e.extend(!0, {}, e.ajaxSettings, r.defaults, t), e.isFunction(t.url) && (t.url = t.url());
        var i = t.target,
            o = f(t.url).hash,
            s = t.context = g(t.container);
        t.data || (t.data = {}), e.isArray(t.data) ? t.data.push({
            name: "_pjax",
            value: s.selector
        }) : t.data._pjax = s.selector;
        var u;
        t.beforeSend = function(e, i) {
            if ("GET" !== i.type && (i.timeout = 0), e.setRequestHeader("X-PJAX", "true"), e.setRequestHeader("X-PJAX-Container", s.selector), !n("pjax:beforeSend", [e, i])) return !1;
            i.timeout > 0 && (u = setTimeout(function() {
                n("pjax:timeout", [e, t]) && e.abort("timeout")
            }, i.timeout), i.timeout = 0);
            var r = f(i.url);
            o && (r.hash = o), t.requestUrl = d(r)
        }, t.complete = function(e, i) {
            u && clearTimeout(u), n("pjax:complete", [e, i, t]), n("pjax:end", [e, t])
        }, t.error = function(e, i, r) {
            var o = b("", e, t),
                s = n("pjax:error", [e, i, r, t]);
            "GET" == t.type && "abort" !== i && s && a(o.url)
        }, t.success = function(i, u, l) {
            var h = r.state,
                d = "function" == typeof e.pjax.defaults.version ? e.pjax.defaults.version() : e.pjax.defaults.version,
                p = l.getResponseHeader("X-PJAX-Version"),
                m = b(i, l, t),
                g = f(m.url);
            if (o && (g.hash = o, m.url = g.href), d && p && d !== p) return void a(m.url);
            if (!m.contents) return void a(m.url);
            r.state = {
                id: t.id || c(),
                url: m.url,
                title: m.title,
                container: s.selector,
                fragment: t.fragment,
                timeout: t.timeout
            }, (t.push || t.replace) && window.history.replaceState(r.state, m.title, m.url);
            try {
                document.activeElement.blur()
            } catch (v) {}
            m.title && (document.title = m.title), n("pjax:beforeReplace", [m.contents, t], {
                state: r.state,
                previousState: h
            }), s.html(m.contents);
            var y = s.find("input[autofocus], textarea[autofocus]").last()[0];
            y && document.activeElement !== y && y.focus(), w(m.scripts);
            var x = t.scrollTo;
            if (o) {
                var _ = decodeURIComponent(o.slice(1)),
                    T = document.getElementById(_) || document.getElementsByName(_)[0];
                T && (x = e(T).offset().top)
            }
            "number" == typeof x && e(window).scrollTop(x), n("pjax:success", [i, u, l, t])
        }, r.state || (r.state = {
            id: c(),
            url: window.location.href,
            title: document.title,
            container: s.selector,
            fragment: t.fragment,
            timeout: t.timeout
        }, window.history.replaceState(r.state, document.title)), l(r.xhr), r.options = t;
        var p = r.xhr = e.ajax(t);
        return p.readyState > 0 && (t.push && !t.replace && (x(r.state.id, h(s)), window.history.pushState(null, "", t.requestUrl)), n("pjax:start", [p, t]), n("pjax:send", [p, t])), r.xhr
    }

    function o(t, n) {
        var i = {
            url: window.location.href,
            push: !1,
            replace: !0,
            scrollTo: !1
        };
        return r(e.extend(i, m(t, n)))
    }

    function a(e) {
        window.history.replaceState(null, "", r.state.url), window.location.replace(e)
    }

    function s(t) {
        E || l(r.xhr);
        var n, i = r.state,
            o = t.state;
        if (o && o.container) {
            if (E && F == o.url) return;
            if (i) {
                if (i.id === o.id) return;
                n = i.id < o.id ? "forward" : "back"
            }
            var s = D[o.id] || [],
                u = e(s[0] || o.container),
                c = s[1];
            if (u.length) {
                i && _(n, i.id, h(u));
                var d = e.Event("pjax:popstate", {
                    state: o,
                    direction: n
                });
                u.trigger(d);
                var f = {
                    id: o.id,
                    url: o.url,
                    container: u,
                    push: !1,
                    fragment: o.fragment,
                    timeout: o.timeout,
                    scrollTo: !1
                };
                if (c) {
                    u.trigger("pjax:start", [null, f]), r.state = o, o.title && (document.title = o.title);
                    var p = e.Event("pjax:beforeReplace", {
                        state: o,
                        previousState: i
                    });
                    u.trigger(p, [c, f]), u.html(c), u.trigger("pjax:end", [null, f])
                } else r(f);
                u[0].offsetHeight
            } else a(location.href)
        }
        E = !1
    }

    function u(t) {
        var n = e.isFunction(t.url) ? t.url() : t.url,
            i = t.type ? t.type.toUpperCase() : "GET",
            r = e("<form>", {
                method: "GET" === i ? "GET" : "POST",
                action: n,
                style: "display:none"
            });
        "GET" !== i && "POST" !== i && r.append(e("<input>", {
            type: "hidden",
            name: "_method",
            value: i.toLowerCase()
        }));
        var o = t.data;
        if ("string" == typeof o) e.each(o.split("&"), function(t, n) {
            var i = n.split("=");
            r.append(e("<input>", {
                type: "hidden",
                name: i[0],
                value: i[1]
            }))
        });
        else if (e.isArray(o)) e.each(o, function(t, n) {
            r.append(e("<input>", {
                type: "hidden",
                name: n.name,
                value: n.value
            }))
        });
        else if ("object" == typeof o) {
            var a;
            for (a in o) r.append(e("<input>", {
                type: "hidden",
                name: a,
                value: o[a]
            }))
        }
        e(document.body).append(r), r.submit()
    }

    function l(t) {
        t && t.readyState < 4 && (t.onreadystatechange = e.noop, t.abort())
    }

    function c() {
        return (new Date).getTime()
    }

    function h(e) {
        var t = e.clone();
        return t.find("script").each(function() {
            this.src || jQuery._data(this, "globalEval", !1)
        }), [e.selector, t.contents()]
    }

    function d(e) {
        return e.search = e.search.replace(/([?&])(_pjax|_)=[^&]*/g, ""), e.href.replace(/\?($|#)/, "$1")
    }

    function f(e) {
        var t = document.createElement("a");
        return t.href = e, t
    }

    function p(e) {
        return e.href.replace(/#.*/, "")
    }

    function m(t, n) {
        return t && n ? n.container = t : n = e.isPlainObject(t) ? t : {
            container: t
        }, n.container && (n.container = g(n.container)), n
    }

    function g(t) {
        if (t = e(t), t.length) {
            if ("" !== t.selector && t.context === document) return t;
            if (t.attr("id")) return e("#" + t.attr("id"));
            throw "cant get selector for pjax container!"
        }
        throw "no pjax container for " + t.selector
    }

    function v(e, t) {
        return e.filter(t).add(e.find(t))
    }

    function y(t) {
        return e.parseHTML(t, document, !0)
    }

    function b(t, n, i) {
        var r = {},
            o = /<html/i.test(t),
            a = n.getResponseHeader("X-PJAX-URL");
        if (r.url = a ? d(f(a)) : i.requestUrl, o) var s = e(y(t.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0])),
            u = e(y(t.match(/<body[^>]*>([\s\S.]*)<\/body>/i)[0]));
        else var s = u = e(y(t));
        if (0 === u.length) return r;
        if (r.title = v(s, "title").last().text(), i.fragment) {
            if ("body" === i.fragment) var l = u;
            else var l = v(u, i.fragment).first();
            l.length && (r.contents = "body" === i.fragment ? l : l.contents(), r.title || (r.title = l.attr("title") || l.data("title")))
        } else o || (r.contents = u);
        return r.contents && (r.contents = r.contents.not(function() {
            return e(this).is("title")
        }), r.contents.find("title").remove(), r.scripts = v(r.contents, "script[src]").remove(), r.contents = r.contents.not(r.scripts)), r.title && (r.title = e.trim(r.title)), r
    }

    function w(t) {
        if (t) {
            var n = e("script[src]");
            t.each(function() {
                var t = this.src,
                    i = n.filter(function() {
                        return this.src === t
                    });
                if (!i.length) {
                    var r = document.createElement("script"),
                        o = e(this).attr("type");
                    o && (r.type = o), r.src = e(this).attr("src"), document.head.appendChild(r)
                }
            })
        }
    }

    function x(e, t) {
        D[e] = t, N.push(e), T($, 0), T(N, r.defaults.maxCacheLength)
    }

    function _(e, t, n) {
        var i, o;
        D[t] = n, "forward" === e ? (i = N, o = $) : (i = $, o = N), i.push(t), (t = o.pop()) && delete D[t], T(i, r.defaults.maxCacheLength)
    }

    function T(e, t) {
        for (; e.length > t;) delete D[e.shift()]
    }

    function C() {
        return e("meta").filter(function() {
            var t = e(this).attr("http-equiv");
            return t && "X-PJAX-VERSION" === t.toUpperCase()
        }).attr("content")
    }

    function k() {
        e.fn.pjax = t, e.pjax = r, e.pjax.enable = e.noop, e.pjax.disable = S, e.pjax.click = n, e.pjax.submit = i, e.pjax.reload = o, e.pjax.defaults = {
            timeout: 650,
            push: !0,
            replace: !1,
            type: "GET",
            dataType: "html",
            scrollTo: 0,
            maxCacheLength: 20,
            version: C
        }, e(window).on("popstate.pjax", s)
    }

    function S() {
        e.fn.pjax = function() {
            return this
        }, e.pjax = u, e.pjax.enable = k, e.pjax.disable = e.noop, e.pjax.click = e.noop, e.pjax.submit = e.noop, e.pjax.reload = function() {
            window.location.reload()
        }, e(window).off("popstate.pjax", s)
    }
    var E = !0,
        F = window.location.href,
        A = window.history.state;
    A && A.container && (r.state = A), "state" in window.history && (E = !1);
    var D = {},
        $ = [],
        N = [];
    e.inArray("state", e.event.props) < 0 && e.event.props.push("state"), e.support.pjax = window.history && window.history.pushState && window.history.replaceState && !navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]\D|WebApps\/.+CFNetwork)/), e.support.pjax ? k() : S()
}(jQuery),
function(e, t) {
    e.rails !== t && e.error("jquery-ujs has already been loaded!");
    var n, i = e(document);
    e.rails = n = {
        linkClickSelector: "a[data-confirm], a[data-method], a[data-remote], a[data-disable-with]",
        buttonClickSelector: "button[data-remote]",
        inputChangeSelector: "select[data-remote], input[data-remote], textarea[data-remote]",
        formSubmitSelector: "form",
        formInputClickSelector: "form input[type=submit], form input[type=image], form button[type=submit], form button:not([type])",
        disableSelector: "input[data-disable-with], button[data-disable-with], textarea[data-disable-with]",
        enableSelector: "input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled",
        requiredInputSelector: "input[name][required]:not([disabled]),textarea[name][required]:not([disabled])",
        fileInputSelector: "input[type=file]",
        linkDisableSelector: "a[data-disable-with]",
        CSRFProtection: function(t) {
            var n = e('meta[name="csrf-token"]').attr("content");
            n && t.setRequestHeader("X-CSRF-Token", n)
        },
        fire: function(t, n, i) {
            var r = e.Event(n);
            return t.trigger(r, i), r.result !== !1
        },
        confirm: function(e) {
            return confirm(e)
        },
        ajax: function(t) {
            return e.ajax(t)
        },
        href: function(e) {
            return e.attr("href")
        },
        handleRemote: function(i) {
            var r, o, a, s, u, l, c, h;
            if (n.fire(i, "ajax:before")) {
                if (s = i.data("cross-domain"), u = s === t ? null : s, l = i.data("with-credentials") || null, c = i.data("type") || e.ajaxSettings && e.ajaxSettings.dataType, i.is("form")) {
                    r = i.attr("method"), o = i.attr("action"), a = i.serializeArray();
                    var d = i.data("ujs:submit-button");
                    d && (a.push(d), i.data("ujs:submit-button", null))
                } else i.is(n.inputChangeSelector) ? (r = i.data("method"), o = i.data("url"), a = i.serialize(), i.data("params") && (a = a + "&" + i.data("params"))) : i.is(n.buttonClickSelector) ? (r = i.data("method") || "get", o = i.data("url"), a = i.serialize(), i.data("params") && (a = a + "&" + i.data("params"))) : (r = i.data("method"), o = n.href(i), a = i.data("params") || null);
                h = {
                    type: r || "GET",
                    data: a,
                    dataType: c,
                    beforeSend: function(e, r) {
                        return r.dataType === t && e.setRequestHeader("accept", "*/*;q=0.5, " + r.accepts.script), n.fire(i, "ajax:beforeSend", [e, r])
                    },
                    success: function(e, t, n) {
                        i.trigger("ajax:success", [e, t, n])
                    },
                    complete: function(e, t) {
                        i.trigger("ajax:complete", [e, t])
                    },
                    error: function(e, t, n) {
                        i.trigger("ajax:error", [e, t, n])
                    },
                    crossDomain: u
                }, l && (h.xhrFields = {
                    withCredentials: l
                }), o && (h.url = o);
                var f = n.ajax(h);
                return i.trigger("ajax:send", f), f
            }
            return !1
        },
        handleMethod: function(i) {
            var r = n.href(i),
                o = i.data("method"),
                a = i.attr("target"),
                s = e("meta[name=csrf-token]").attr("content"),
                u = e("meta[name=csrf-param]").attr("content"),
                l = e('<form method="post" action="' + r + '"></form>'),
                c = '<input name="_method" value="' + o + '" type="hidden" />';
            u !== t && s !== t && (c += '<input name="' + u + '" value="' + s + '" type="hidden" />'), a && l.attr("target", a), l.hide().append(c).appendTo("body"), l.submit()
        },
        disableFormElements: function(t) {
            t.find(n.disableSelector).each(function() {
                var t = e(this),
                    n = t.is("button") ? "html" : "val";
                t.data("ujs:enable-with", t[n]()), t[n](t.data("disable-with")), t.prop("disabled", !0)
            })
        },
        enableFormElements: function(t) {
            t.find(n.enableSelector).each(function() {
                var t = e(this),
                    n = t.is("button") ? "html" : "val";
                t.data("ujs:enable-with") && t[n](t.data("ujs:enable-with")), t.prop("disabled", !1)
            })
        },
        allowAction: function(e) {
            var t, i = e.data("confirm"),
                r = !1;
            return i ? (n.fire(e, "confirm") && (r = n.confirm(i), t = n.fire(e, "confirm:complete", [r])), r && t) : !0
        },
        blankInputs: function(t, n, i) {
            var r, o, a = e(),
                s = n || "input,textarea",
                u = t.find(s);
            return u.each(function() {
                if (r = e(this), o = r.is("input[type=checkbox],input[type=radio]") ? r.is(":checked") : r.val(), !o == !i) {
                    if (r.is("input[type=radio]") && u.filter('input[type=radio]:checked[name="' + r.attr("name") + '"]').length) return !0;
                    a = a.add(r)
                }
            }), a.length ? a : !1
        },
        nonBlankInputs: function(e, t) {
            return n.blankInputs(e, t, !0)
        },
        stopEverything: function(t) {
            return e(t.target).trigger("ujs:everythingStopped"), t.stopImmediatePropagation(), !1
        },
        disableElement: function(e) {
            e.data("ujs:enable-with", e.html()), e.html(e.data("disable-with")), e.bind("click.railsDisable", function(e) {
                return n.stopEverything(e)
            })
        },
        enableElement: function(e) {
            e.data("ujs:enable-with") !== t && (e.html(e.data("ujs:enable-with")), e.removeData("ujs:enable-with")), e.unbind("click.railsDisable")
        }
    }, n.fire(i, "rails:attachBindings") && (e.ajaxPrefilter(function(e, t, i) {
        e.crossDomain || n.CSRFProtection(i)
    }), i.delegate(n.linkDisableSelector, "ajax:complete", function() {
        n.enableElement(e(this))
    }), i.delegate(n.linkClickSelector, "click.rails", function(i) {
        var r = e(this),
            o = r.data("method"),
            a = r.data("params");
        if (!n.allowAction(r)) return n.stopEverything(i);
        if (r.is(n.linkDisableSelector) && n.disableElement(r), r.data("remote") !== t) {
            if (!(!i.metaKey && !i.ctrlKey || o && "GET" !== o || a)) return !0;
            var s = n.handleRemote(r);
            return s === !1 ? n.enableElement(r) : s.error(function() {
                n.enableElement(r)
            }), !1
        }
        return r.data("method") ? (n.handleMethod(r), !1) : void 0
    }), i.delegate(n.buttonClickSelector, "click.rails", function(t) {
        var i = e(this);
        return n.allowAction(i) ? (n.handleRemote(i), !1) : n.stopEverything(t)
    }), i.delegate(n.inputChangeSelector, "change.rails", function(t) {
        var i = e(this);
        return n.allowAction(i) ? (n.handleRemote(i), !1) : n.stopEverything(t)
    }), i.delegate(n.formSubmitSelector, "submit.rails", function(i) {
        var r = e(this),
            o = r.data("remote") !== t,
            a = n.blankInputs(r, n.requiredInputSelector),
            s = n.nonBlankInputs(r, n.fileInputSelector);
        if (!n.allowAction(r)) return n.stopEverything(i);
        if (a && r.attr("novalidate") == t && n.fire(r, "ajax:aborted:required", [a])) return n.stopEverything(i);
        if (o) {
            if (s) {
                setTimeout(function() {
                    n.disableFormElements(r)
                }, 13);
                var u = n.fire(r, "ajax:aborted:file", [s]);
                return u || setTimeout(function() {
                    n.enableFormElements(r)
                }, 13), u
            }
            return n.handleRemote(r), !1
        }
        setTimeout(function() {
            n.disableFormElements(r)
        }, 13)
    }), i.delegate(n.formInputClickSelector, "click.rails", function(t) {
        var i = e(this);
        if (!n.allowAction(i)) return n.stopEverything(t);
        var r = i.attr("name"),
            o = r ? {
                name: r,
                value: i.val()
            } : null;
        i.closest("form").data("ujs:submit-button", o)
    }), i.delegate(n.formSubmitSelector, "ajax:beforeSend.rails", function(t) {
        this == t.target && n.disableFormElements(e(this))
    }), i.delegate(n.formSubmitSelector, "ajax:complete.rails", function(t) {
        this == t.target && n.enableFormElements(e(this))
    }), e(function() {
        var t = e("meta[name=csrf-token]").attr("content"),
            n = e("meta[name=csrf-param]").attr("content");
        e('form input[name="' + n + '"]').val(t)
    }))
}(jQuery),
function(e, t, n) {
    "use strict";
    e.fn.backstretch = function(i, o) {
        return (i === n || 0 === i.length) && e.error("No images were supplied for Backstretch"), 0 === e(t).scrollTop() && t.scrollTo(0, 0), this.each(function() {
            var t = e(this),
                n = t.data("backstretch");
            if (n) {
                if ("string" == typeof i && "function" == typeof n[i]) return void n[i](o);
                o = e.extend(n.options, o), n.destroy(!0)
            }
            n = new r(this, i, o), t.data("backstretch", n)
        })
    }, e.backstretch = function(t, n) {
        return e("body").backstretch(t, n).data("backstretch")
    }, e.expr[":"].backstretch = function(t) {
        return e(t).data("backstretch") !== n
    }, e.fn.backstretch.defaults = {
        centeredX: !0,
        centeredY: !0,
        duration: 5e3,
        fade: 0
    };
    var i = {
            wrap: {
                left: 0,
                top: 0,
                overflow: "hidden",
                margin: 0,
                padding: 0,
                height: "100%",
                width: "100%",
                zIndex: -999999
            },
            img: {
                position: "absolute",
                display: "none",
                margin: 0,
                padding: 0,
                border: "none",
                width: "auto",
                height: "auto",
                maxHeight: "none",
                maxWidth: "none",
                zIndex: -999999
            }
        },
        r = function(n, r, a) {
            this.options = e.extend({}, e.fn.backstretch.defaults, a || {}), this.images = e.isArray(r) ? r : [r], e.each(this.images, function() {
                e("<img />")[0].src = this
            }), this.isBody = n === document.body, this.$container = e(n), this.$root = this.isBody ? e(o ? t : document) : this.$container;
            var s = this.$container.children(".backstretch").first();
            if (this.$wrap = s.length ? s : e('<div class="backstretch"></div>').css(i.wrap).appendTo(this.$container), !this.isBody) {
                var u = this.$container.css("position"),
                    l = this.$container.css("zIndex");
                this.$container.css({
                    position: "static" === u ? "relative" : u,
                    zIndex: "auto" === l ? 0 : l,
                    background: "none"
                }), this.$wrap.css({
                    zIndex: -999998
                })
            }
            this.$wrap.css({
                position: this.isBody && o ? "fixed" : "absolute"
            }), this.index = 0, this.show(this.index), e(t).on("resize.backstretch", e.proxy(this.resize, this)).on("orientationchange.backstretch", e.proxy(function() {
                this.isBody && 0 === t.pageYOffset && (t.scrollTo(0, 1), this.resize())
            }, this))
        };
    r.prototype = {
        resize: function() {
            try {
                var e, n = {},
                    i = this.isBody ? this.$root.width() : this.$root.innerWidth(),
                    r = i,
                    o = this.isBody ? t.innerHeight ? t.innerHeight : this.$root.height() : this.$root.innerHeight(),
                    a = r / this.$img.data("ratio");
                this.options.leftX && (n.left = 0), this.options.rightX && (n.right = 0), this.options.topY && (n.top = 0), this.options.bottomY && (n.bottom = 0), a >= o ? (e = (a - o) / 2, this.options.centeredY && (n.top = "-" + e + "px")) : (a = o, r = a * this.$img.data("ratio"), e = (r - i) / 2, this.options.centeredX && (n.left = "-" + e + "px")), this.$wrap.css({
                    width: i,
                    height: o
                }).find("img:not(.deleteable)").css({
                    width: r,
                    height: a
                }).css(n)
            } catch (s) {}
            return this
        },
        show: function(t) {
            if (!(Math.abs(t) > this.images.length - 1)) {
                var n = this,
                    r = n.$wrap.find("img").addClass("deleteable"),
                    o = {
                        relatedTarget: n.$container[0]
                    };
                return n.$container.trigger(e.Event("backstretch.before", o), [n, t]), this.index = t, clearInterval(n.interval), n.$img = e("<img />").css(i.img).bind("load", function(i) {
                    var a = this.width || e(i.target).width(),
                        s = this.height || e(i.target).height();
                    e(this).data("ratio", a / s), e(this).fadeIn(n.options.speed || n.options.fade, function() {
                        r.remove(), n.paused || n.cycle(), e(["after", "show"]).each(function() {
                            n.$container.trigger(e.Event("backstretch." + this, o), [n, t])
                        })
                    }), n.resize()
                }).appendTo(n.$wrap), n.$img.attr("src", n.images[t]), n
            }
        },
        next: function() {
            return this.show(this.index < this.images.length - 1 ? this.index + 1 : 0)
        },
        prev: function() {
            return this.show(0 === this.index ? this.images.length - 1 : this.index - 1)
        },
        pause: function() {
            return this.paused = !0, this
        },
        resume: function() {
            return this.paused = !1, this.next(), this
        },
        cycle: function() {
            return this.images.length > 1 && (clearInterval(this.interval), this.interval = setInterval(e.proxy(function() {
                this.paused || this.next()
            }, this), this.options.duration)), this
        },
        destroy: function(n) {
            e(t).off("resize.backstretch orientationchange.backstretch"), clearInterval(this.interval), n || this.$wrap.remove(), this.$container.removeData("backstretch")
        }
    };
    var o = function() {
        var e = navigator.userAgent,
            n = navigator.platform,
            i = e.match(/AppleWebKit\/([0-9]+)/),
            r = !!i && i[1],
            o = e.match(/Fennec\/([0-9]+)/),
            a = !!o && o[1],
            s = e.match(/Opera Mobi\/([0-9]+)/),
            u = !!s && s[1],
            l = e.match(/MSIE ([0-9]+)/),
            c = !!l && l[1];
        return !((n.indexOf("iPhone") > -1 || n.indexOf("iPad") > -1 || n.indexOf("iPod") > -1) && r && 534 > r || t.operamini && "[object OperaMini]" === {}.toString.call(t.operamini) || s && 7458 > u || e.indexOf("Android") > -1 && r && 533 > r || a && 6 > a || "palmGetResource" in t && r && 534 > r || e.indexOf("MeeGo") > -1 && e.indexOf("NokiaBrowser/8.5.0") > -1 || c && 6 >= c)
    }()
}(jQuery, window),
function(e) {
    "use strict";

    function t(e, t, n) {
        function i(i, r) {
            a(), e.data("hasActiveHover") || (i ? (r && e.data("forcedOpen", !0), n.showTip(e)) : (c.popOpenImminent = !0, s = setTimeout(function() {
                s = null, o(e)
            }, t.intentPollInterval)))
        }

        function r(i) {
            a(), e.data("hasActiveHover") && (c.popOpenImminent = !1, e.data("forcedOpen", !1), i ? n.hideTip(e) : s = setTimeout(function() {
                s = null, n.hideTip(e)
            }, t.closeDelay))
        }

        function o() {
            var r = Math.abs(c.previousX - c.currentX),
                o = Math.abs(c.previousY - c.currentY),
                a = r + o;
            a < t.intentSensitivity ? n.showTip(e) : (c.previousX = c.currentX, c.previousY = c.currentY, i())
        }

        function a() {
            s = clearTimeout(s)
        }
        var s = null;
        return {
            show: i,
            hide: r,
            cancel: a
        }
    }

    function n(t) {
        function n(e) {
            e.data("hasActiveHover", !0), g.queue(function(t) {
                i(e), t()
            })
        }

        function i(n) {
            if (n.data("hasActiveHover")) {
                if (c.isPopOpen) return c.isClosing || r(c.activeHover), void g.delay(100).queue(function(e) {
                    i(n), e()
                });
                n.trigger("powerTipPreRender");
                var o = n.data("powertip"),
                    a = n.data("powertiptarget"),
                    u = n.data("powertipjq"),
                    l = a ? e("#" + a) : [];
                if (o) g.html(o);
                else if (u && u.length > 0) g.empty(), u.clone(!0, !0).appendTo(g);
                else {
                    if (!(l && l.length > 0)) return;
                    g.html(e("#" + a).html())
                }
                n.trigger("powerTipRender"), s.on("closePowerTip", function() {
                    n.data("displayController").hide(!0)
                }), c.activeHover = n, c.isPopOpen = !0, g.data("followMouse", t.followMouse), g.data("mouseOnToPopup", t.mouseOnToPopup), t.followMouse ? d() : (f(n), c.isFixedPopOpen = !0), g.fadeIn(t.fadeInTime, function() {
                    c.desyncTimeout || (c.desyncTimeout = setInterval(h, 500)), n.trigger("powerTipOpen")
                })
            }
        }

        function r(e) {
            c.isClosing = !0, e.data("hasActiveHover", !1), e.data("forcedOpen", !1), c.activeHover = null, c.isPopOpen = !1, c.desyncTimeout = clearInterval(c.desyncTimeout), s.off("closePowerTip"), g.fadeOut(t.fadeOutTime, function() {
                c.isClosing = !1, c.isFixedPopOpen = !1, g.removeClass(), m(c.currentX + t.offset, c.currentY + t.offset), e.trigger("powerTipClose")
            })
        }

        function h() {
            if (c.isPopOpen && !c.isClosing) {
                var e = !1;
                c.activeHover.data("hasActiveHover") === !1 ? e = !0 : o(c.activeHover) || c.activeHover.is(":focus") || c.activeHover.data("forcedOpen") || (g.data("mouseOnToPopup") ? o(g) || (e = !0) : e = !0), e && r(c.activeHover)
            }
        }

        function d() {
            if (c.isPopOpen && !c.isFixedPopOpen || c.popOpenImminent && !c.isFixedPopOpen && g.data("hasMouseMove")) {
                var e = u.scrollTop(),
                    n = u.width(),
                    i = u.height(),
                    r = g.outerWidth(),
                    o = g.outerHeight(),
                    a = 0,
                    s = 0;
                a = r + c.currentX + t.offset < n ? c.currentX + t.offset : n - r, s = o + c.currentY + t.offset < e + i ? c.currentY + t.offset : e + i - o, m(a, s)
            }
        }

        function f(n) {
            var i, r, o, s, u = g.outerWidth(),
                l = g.outerHeight();
            t.smartPlacement ? (i = e.fn.powerTip.smartPlacementLists[t.placement], e.each(i, function(e, t) {
                return r = p(n, t, u, l), o = t, s = a(r, u, l), 0 === s.length ? !1 : void 0
            })) : (r = p(n, t.placement, u, l), o = t.placement), g.addClass(o), m(r.x, r.y)
        }

        function p(e, n, i, r) {
            var o = e.offset(),
                a = e.outerWidth(),
                s = e.outerHeight(),
                u = 0,
                l = 0;
            switch (n) {
                case "n":
                    u = o.left + a / 2 - i / 2, l = o.top - r - t.offset;
                    break;
                case "e":
                    u = o.left + a + t.offset, l = o.top + s / 2 - r / 2;
                    break;
                case "s":
                    u = o.left + a / 2 - i / 2, l = o.top + s + t.offset;
                    break;
                case "w":
                    u = o.left - i - t.offset, l = o.top + s / 2 - r / 2;
                    break;
                case "nw":
                    u = o.left - i + 20, l = o.top - r - t.offset;
                    break;
                case "ne":
                    u = o.left + a - 20, l = o.top - r - t.offset;
                    break;
                case "sw":
                    u = o.left - i + 20, l = o.top + s + t.offset;
                    break;
                case "se":
                    u = o.left + a - 20, l = o.top + s + t.offset
            }
            return {
                x: Math.round(u),
                y: Math.round(l)
            }
        }

        function m(e, t) {
            g.css("left", e + "px"), g.css("top", t + "px")
        }
        var g = e("#" + t.popupId);
        return 0 === g.length && (g = e("<div></div>", {
            id: t.popupId
        }), 0 === l.length && (l = e("body")), l.append(g)), t.followMouse && (g.data("hasMouseMove") || s.on({
            mousemove: d,
            scroll: d
        }), g.data("hasMouseMove", !0)), (t.followMouse || t.mouseOnToPopup) && g.on({
            mouseenter: function() {
                (g.data("followMouse") || g.data("mouseOnToPopup")) && c.activeHover && c.activeHover.data("displayController").cancel()
            },
            mouseleave: function() {
                g.data("mouseOnToPopup") && c.activeHover && c.activeHover.data("displayController").hide()
            }
        }), {
            showTip: n,
            hideTip: r
        }
    }

    function i() {
        var t = 0,
            n = 0;
        c.mouseTrackingActive || (c.mouseTrackingActive = !0, e(function() {
            t = s.scrollLeft(), n = s.scrollTop()
        }), s.on({
            mousemove: r,
            scroll: function() {
                var e = s.scrollLeft(),
                    i = s.scrollTop();
                e !== t && (c.currentX += e - t, t = e), i !== n && (c.currentY += i - n, n = i)
            }
        }))
    }

    function r(e) {
        c.currentX = e.pageX, c.currentY = e.pageY
    }

    function o(e) {
        var t = e.offset();
        return c.currentX >= t.left && c.currentX <= t.left + e.outerWidth() && c.currentY >= t.top && c.currentY <= t.top + e.outerHeight()
    }

    function a(e, t, n) {
        var i = u.scrollLeft(),
            r = u.scrollTop(),
            o = u.width(),
            a = u.height(),
            s = [];
        return e.y < r && s.push("top"), e.y + n > r + a && s.push("bottom"), e.x < i && s.push("left"), e.x + t > i + o && s.push("right"), s
    }
    var s = e(document),
        u = e(window),
        l = e("body"),
        c = {
            isPopOpen: !1,
            isFixedPopOpen: !1,
            isClosing: !1,
            popOpenImminent: !1,
            activeHover: null,
            currentX: 0,
            currentY: 0,
            previousX: 0,
            previousY: 0,
            desyncTimeout: null,
            mouseTrackingActive: !1
        };
    e.fn.powerTip = function(a) {
        if (!this.length) return this;
        var s = e.extend({}, e.fn.powerTip.defaults, a),
            u = new n(s);
        return i(), this.each(function() {
            var n = e(this),
                i = n.data("powertip"),
                r = n.data("powertipjq"),
                o = n.data("powertiptarget"),
                a = n.attr("title");
            i || o || r || !a || (n.data("powertip", a), n.removeAttr("title")), n.data("displayController", new t(n, s, u))
        }), this.on({
            mouseenter: function(t) {
                r(t), c.previousX = t.pageX, c.previousY = t.pageY, e(this).data("displayController").show()
            },
            mouseleave: function() {
                e(this).data("displayController").hide()
            },
            focus: function() {
                var t = e(this);
                o(t) || t.data("displayController").show(!0)
            },
            blur: function() {
                e(this).data("displayController").hide(!0)
            }
        })
    }, e.fn.powerTip.defaults = {
        fadeInTime: 200,
        fadeOutTime: 100,
        followMouse: !1,
        popupId: "powerTip",
        intentSensitivity: 7,
        intentPollInterval: 100,
        closeDelay: 100,
        placement: "n",
        smartPlacement: !1,
        offset: 10,
        mouseOnToPopup: !1
    }, e.fn.powerTip.smartPlacementLists = {
        n: ["n", "ne", "nw", "s"],
        e: ["e", "ne", "se", "w", "nw", "sw", "n", "s", "e"],
        s: ["s", "se", "sw", "n"],
        w: ["w", "nw", "sw", "e", "ne", "se", "n", "s", "w"],
        nw: ["nw", "w", "sw", "n", "s", "se", "nw"],
        ne: ["ne", "e", "se", "n", "s", "sw", "ne"],
        sw: ["sw", "w", "nw", "s", "n", "ne", "sw"],
        se: ["se", "e", "ne", "s", "n", "nw", "se"]
    }, e.powerTip = {
        showTip: function(t) {
            e.powerTip.closeTip(), t = t.first(), o(t) || t.data("displayController").show(!0, !0)
        },
        closeTip: function() {
            s.triggerHandler("closePowerTip")
        }
    }
}(jQuery),
function(e) {
    e.extend(e.fn, {
        validate: function(t) {
            if (!this.length) return void(t && t.debug && window.console && console.warn("nothing selected, can't validate, returning nothing"));
            var n = e.data(this[0], "validator");
            return n ? n : (this.attr("novalidate", "novalidate"), n = new e.validator(t, this[0]), e.data(this[0], "validator", n), n.settings.onsubmit && (this.validateDelegate(":submit", "click", function(t) {
                n.settings.submitHandler && (n.submitButton = t.target), e(t.target).hasClass("cancel") && (n.cancelSubmit = !0)
            }), this.submit(function(t) {
                function i() {
                    var i;
                    return n.settings.submitHandler ? (n.submitButton && (i = e("<input type='hidden'/>").attr("name", n.submitButton.name).val(n.submitButton.value).appendTo(n.currentForm)), n.settings.submitHandler.call(n, n.currentForm, t), n.submitButton && i.remove(), !1) : !0
                }
                return n.settings.debug && t.preventDefault(), n.cancelSubmit ? (n.cancelSubmit = !1, i()) : n.form() ? n.pendingRequest ? (n.formSubmitted = !0, !1) : i() : (n.focusInvalid(), !1)
            })), n)
        },
        valid: function() {
            if (e(this[0]).is("form")) return this.validate().form();
            var t = !0,
                n = e(this[0].form).validate();
            return this.each(function() {
                t &= n.element(this)
            }), t
        },
        removeAttrs: function(t) {
            var n = {},
                i = this;
            return e.each(t.split(/\s/), function(e, t) {
                n[t] = i.attr(t), i.removeAttr(t)
            }), n
        },
        rules: function(t, n) {
            var i = this[0];
            if (t) {
                var r = e.data(i.form, "validator").settings,
                    o = r.rules,
                    a = e.validator.staticRules(i);
                switch (t) {
                    case "add":
                        e.extend(a, e.validator.normalizeRule(n)), o[i.name] = a, n.messages && (r.messages[i.name] = e.extend(r.messages[i.name], n.messages));
                        break;
                    case "remove":
                        if (!n) return delete o[i.name], a;
                        var s = {};
                        return e.each(n.split(/\s/), function(e, t) {
                            s[t] = a[t], delete a[t]
                        }), s
                }
            }
            var u = e.validator.normalizeRules(e.extend({}, e.validator.classRules(i), e.validator.attributeRules(i), e.validator.dataRules(i), e.validator.staticRules(i)), i);
            if (u.required) {
                var l = u.required;
                delete u.required, u = e.extend({
                    required: l
                }, u)
            }
            return u
        }
    }), e.extend(e.expr[":"], {
        blank: function(t) {
            return !e.trim("" + t.value)
        },
        filled: function(t) {
            return !!e.trim("" + t.value)
        },
        unchecked: function(e) {
            return !e.checked
        }
    }), e.validator = function(t, n) {
        this.settings = e.extend(!0, {}, e.validator.defaults, t), this.currentForm = n, this.init()
    }, e.validator.format = function(t, n) {
        return 1 === arguments.length ? function() {
            var n = e.makeArray(arguments);
            return n.unshift(t), e.validator.format.apply(this, n)
        } : (arguments.length > 2 && n.constructor !== Array && (n = e.makeArray(arguments).slice(1)), n.constructor !== Array && (n = [n]), e.each(n, function(e, n) {
            t = t.replace(new RegExp("\\{" + e + "\\}", "g"), n)
        }), t)
    }, e.extend(e.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusInvalid: !0,
            errorContainer: e([]),
            errorLabelContainer: e([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function(e) {
                this.lastActive = e, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, e, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(e)).hide())
            },
            onfocusout: function(e) {
                this.checkable(e) || !(e.name in this.submitted) && this.optional(e) || this.element(e)
            },
            onkeyup: function(e, t) {
                (9 !== t.which || "" !== this.elementValue(e)) && (e.name in this.submitted || e === this.lastElement) && this.element(e)
            },
            onclick: function(e) {
                e.name in this.submitted ? this.element(e) : e.parentNode.name in this.submitted && this.element(e.parentNode)
            },
            highlight: function(t, n, i) {
                "radio" === t.type ? this.findByName(t.name).addClass(n).removeClass(i) : e(t).addClass(n).removeClass(i)
            },
            unhighlight: function(t, n, i) {
                "radio" === t.type ? this.findByName(t.name).removeClass(n).addClass(i) : e(t).removeClass(n).addClass(i)
            }
        },
        setDefaults: function(t) {
            e.extend(e.validator.defaults, t)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            maxlength: e.validator.format("Please enter no more than {0} characters."),
            minlength: e.validator.format("Please enter at least {0} characters."),
            rangelength: e.validator.format("Please enter a value between {0} and {1} characters long."),
            range: e.validator.format("Please enter a value between {0} and {1}."),
            max: e.validator.format("Please enter a value less than or equal to {0}."),
            min: e.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function() {
                function t(t) {
                    var n = e.data(this[0].form, "validator"),
                        i = "on" + t.type.replace(/^validate/, "");
                    n.settings[i] && n.settings[i].call(n, this[0], t)
                }
                this.labelContainer = e(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || e(this.currentForm), this.containers = e(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                var n = this.groups = {};
                e.each(this.settings.groups, function(t, i) {
                    e.each(i.split(/\s/), function(e, i) {
                        n[i] = t
                    })
                });
                var i = this.settings.rules;
                e.each(i, function(t, n) {
                    i[t] = e.validator.normalizeRule(n)
                }), e(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", t).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", t), this.settings.invalidHandler && e(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler)
            },
            form: function() {
                return this.checkForm(), e.extend(this.submitted, this.errorMap), this.invalid = e.extend({}, this.errorMap), this.valid() || e(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            },
            checkForm: function() {
                this.prepareForm();
                for (var e = 0, t = this.currentElements = this.elements(); t[e]; e++) this.check(t[e]);
                return this.valid()
            },
            element: function(t) {
                t = this.validationTargetFor(this.clean(t)), this.lastElement = t, this.prepareElement(t), this.currentElements = e(t);
                var n = this.check(t) !== !1;
                return n ? delete this.invalid[t.name] : this.invalid[t.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), n
            },
            showErrors: function(t) {
                if (t) {
                    e.extend(this.errorMap, t), this.errorList = [];
                    for (var n in t) this.errorList.push({
                        message: t[n],
                        element: this.findByName(n)[0]
                    });
                    this.successList = e.grep(this.successList, function(e) {
                        return !(e.name in t)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function() {
                e.fn.resetForm && e(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue")
            },
            numberOfInvalids: function() {
                return this.objectLength(this.invalid)
            },
            objectLength: function(e) {
                var t = 0;
                for (var n in e) t++;
                return t
            },
            hideErrors: function() {
                this.addWrapper(this.toHide).hide()
            },
            valid: function() {
                return 0 === this.size()
            },
            size: function() {
                return this.errorList.length
            },
            focusInvalid: function() {
                if (this.settings.focusInvalid) try {
                    e(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (t) {}
            },
            findLastActive: function() {
                var t = this.lastActive;
                return t && 1 === e.grep(this.errorList, function(e) {
                    return e.element.name === t.name
                }).length && t
            },
            elements: function() {
                var t = this,
                    n = {};
                return e(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function() {
                    return !this.name && t.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in n || !t.objectLength(e(this).rules()) ? !1 : (n[this.name] = !0, !0)
                })
            },
            clean: function(t) {
                return e(t)[0]
            },
            errors: function() {
                var t = this.settings.errorClass.replace(" ", ".");
                return e(this.settings.errorElement + "." + t, this.errorContext)
            },
            reset: function() {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = e([]), this.toHide = e([]), this.currentElements = e([])
            },
            prepareForm: function() {
                this.reset(), this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function(e) {
                this.reset(), this.toHide = this.errorsFor(e)
            },
            elementValue: function(t) {
                var n = e(t).attr("type"),
                    i = e(t).val();
                return "radio" === n || "checkbox" === n ? e('input[name="' + e(t).attr("name") + '"]:checked').val() : "string" == typeof i ? i.replace(/\r/g, "") : i
            },
            check: function(t) {
                t = this.validationTargetFor(this.clean(t));
                var n, i = e(t).rules(),
                    r = !1,
                    o = this.elementValue(t);
                for (var a in i) {
                    var s = {
                        method: a,
                        parameters: i[a]
                    };
                    try {
                        if (n = e.validator.methods[a].call(this, o, t, s.parameters), "dependency-mismatch" === n) {
                            r = !0;
                            continue
                        }
                        if (r = !1, "pending" === n) return void(this.toHide = this.toHide.not(this.errorsFor(t)));
                        if (!n) return this.formatAndAdd(t, s), !1
                    } catch (u) {
                        throw this.settings.debug && window.console && console.log("exception occured when checking element " + t.id + ", check the '" + s.method + "' method", u), u
                    }
                }
                return r ? void 0 : (this.objectLength(i) && this.successList.push(t), !0)
            },
            customDataMessage: function(t, n) {
                return e(t).data("msg-" + n.toLowerCase()) || t.attributes && e(t).attr("data-msg-" + n.toLowerCase())
            },
            customMessage: function(e, t) {
                var n = this.settings.messages[e];
                return n && (n.constructor === String ? n : n[t])
            },
            findDefined: function() {
                for (var e = 0; e < arguments.length; e++)
                    if (void 0 !== arguments[e]) return arguments[e];
                return void 0
            },
            defaultMessage: function(t, n) {
                return this.findDefined(this.customMessage(t.name, n), this.customDataMessage(t, n), !this.settings.ignoreTitle && t.title || void 0, e.validator.messages[n], "<strong>Warning: No message defined for " + t.name + "</strong>")
            },
            formatAndAdd: function(t, n) {
                var i = this.defaultMessage(t, n.method),
                    r = /\$?\{(\d+)\}/g;
                "function" == typeof i ? i = i.call(this, n.parameters, t) : r.test(i) && (i = e.validator.format(i.replace(r, "{$1}"), n.parameters)), this.errorList.push({
                    message: i,
                    element: t
                }), this.errorMap[t.name] = i, this.submitted[t.name] = i
            },
            addWrapper: function(e) {
                return this.settings.wrapper && (e = e.add(e.parent(this.settings.wrapper))), e
            },
            defaultShowErrors: function() {
                var e, t;
                for (e = 0; this.errorList[e]; e++) {
                    var n = this.errorList[e];
                    this.settings.highlight && this.settings.highlight.call(this, n.element, this.settings.errorClass, this.settings.validClass), this.showLabel(n.element, n.message)
                }
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)
                    for (e = 0; this.successList[e]; e++) this.showLabel(this.successList[e]);
                if (this.settings.unhighlight)
                    for (e = 0, t = this.validElements(); t[e]; e++) this.settings.unhighlight.call(this, t[e], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            },
            validElements: function() {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function() {
                return e(this.errorList).map(function() {
                    return this.element
                })
            },
            showLabel: function(t, n) {
                var i = this.errorsFor(t);
                i.length ? (i.removeClass(this.settings.validClass).addClass(this.settings.errorClass), i.attr("generated") && i.html(n)) : (i = e("<" + this.settings.errorElement + "/>").attr({
                    "for": this.idOrName(t),
                    generated: !0
                }).addClass(this.settings.errorClass).html(n || ""), this.settings.wrapper && (i = i.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(i).length || (this.settings.errorPlacement ? this.settings.errorPlacement(i, e(t)) : i.insertAfter(t))), !n && this.settings.success && (i.text(""), "string" == typeof this.settings.success ? i.addClass(this.settings.success) : this.settings.success(i, t)), this.toShow = this.toShow.add(i)
            },
            errorsFor: function(t) {
                var n = this.idOrName(t);
                return this.errors().filter(function() {
                    return e(this).attr("for") === n
                })
            },
            idOrName: function(e) {
                return this.groups[e.name] || (this.checkable(e) ? e.name : e.id || e.name)
            },
            validationTargetFor: function(e) {
                return this.checkable(e) && (e = this.findByName(e.name).not(this.settings.ignore)[0]), e
            },
            checkable: function(e) {
                return /radio|checkbox/i.test(e.type)
            },
            findByName: function(t) {
                return e(this.currentForm).find('[name="' + t + '"]')
            },
            getLength: function(t, n) {
                switch (n.nodeName.toLowerCase()) {
                    case "select":
                        return e("option:selected", n).length;
                    case "input":
                        if (this.checkable(n)) return this.findByName(n.name).filter(":checked").length
                }
                return t.length
            },
            depend: function(e, t) {
                return this.dependTypes[typeof e] ? this.dependTypes[typeof e](e, t) : !0
            },
            dependTypes: {
                "boolean": function(e) {
                    return e
                },
                string: function(t, n) {
                    return !!e(t, n.form).length
                },
                "function": function(e, t) {
                    return e(t)
                }
            },
            optional: function(t) {
                var n = this.elementValue(t);
                return !e.validator.methods.required.call(this, n, t) && "dependency-mismatch"
            },
            startRequest: function(e) {
                this.pending[e.name] || (this.pendingRequest++, this.pending[e.name] = !0)
            },
            stopRequest: function(t, n) {
                this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[t.name], n && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (e(this.currentForm).submit(), this.formSubmitted = !1) : !n && 0 === this.pendingRequest && this.formSubmitted && (e(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
            },
            previousValue: function(t) {
                return e.data(t, "previousValue") || e.data(t, "previousValue", {
                    old: null,
                    valid: !0,
                    message: this.defaultMessage(t, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: !0
            },
            email: {
                email: !0
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            dateISO: {
                dateISO: !0
            },
            number: {
                number: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            }
        },
        addClassRules: function(t, n) {
            t.constructor === String ? this.classRuleSettings[t] = n : e.extend(this.classRuleSettings, t)
        },
        classRules: function(t) {
            var n = {},
                i = e(t).attr("class");
            return i && e.each(i.split(" "), function() {
                this in e.validator.classRuleSettings && e.extend(n, e.validator.classRuleSettings[this])
            }), n
        },
        attributeRules: function(t) {
            var n = {},
                i = e(t);
            for (var r in e.validator.methods) {
                var o;
                "required" === r ? (o = i.get(0).getAttribute(r), "" === o && (o = !0), o = !!o) : o = i.attr(r), o ? n[r] = o : i[0].getAttribute("type") === r && (n[r] = !0)
            }
            return n.maxlength && /-1|2147483647|524288/.test(n.maxlength) && delete n.maxlength, n
        },
        dataRules: function(t) {
            var n, i, r = {},
                o = e(t);
            for (n in e.validator.methods) i = o.data("rule-" + n.toLowerCase()), void 0 !== i && (r[n] = i);
            return r
        },
        staticRules: function(t) {
            var n = {},
                i = e.data(t.form, "validator");
            return i.settings.rules && (n = e.validator.normalizeRule(i.settings.rules[t.name]) || {}), n
        },
        normalizeRules: function(t, n) {
            return e.each(t, function(i, r) {
                if (r === !1) return void delete t[i];
                if (r.param || r.depends) {
                    var o = !0;
                    switch (typeof r.depends) {
                        case "string":
                            o = !!e(r.depends, n.form).length;
                            break;
                        case "function":
                            o = r.depends.call(n, n)
                    }
                    o ? t[i] = void 0 !== r.param ? r.param : !0 : delete t[i]
                }
            }), e.each(t, function(i, r) {
                t[i] = e.isFunction(r) ? r(n) : r
            }), e.each(["minlength", "maxlength", "min", "max"], function() {
                t[this] && (t[this] = Number(t[this]))
            }), e.each(["rangelength", "range"], function() {
                var n;
                t[this] && (e.isArray(t[this]) ? t[this] = [Number(t[this][0]), Number(t[this][1])] : "string" == typeof t[this] && (n = t[this].split(/[\s,]+/), t[this] = [Number(n[0]), Number(n[1])]))
            }), e.validator.autoCreateRanges && (t.min && t.max && (t.range = [t.min, t.max], delete t.min, delete t.max), t.minlength && t.maxlength && (t.rangelength = [t.minlength, t.maxlength], delete t.minlength, delete t.maxlength)), t
        },
        normalizeRule: function(t) {
            if ("string" == typeof t) {
                var n = {};
                e.each(t.split(/\s/), function() {
                    n[this] = !0
                }), t = n
            }
            return t
        },
        addMethod: function(t, n, i) {
            e.validator.methods[t] = n, e.validator.messages[t] = void 0 !== i ? i : e.validator.messages[t], n.length < 3 && e.validator.addClassRules(t, e.validator.normalizeRule(t))
        },
        methods: {
            required: function(t, n, i) {
                if (!this.depend(i, n)) return "dependency-mismatch";
                if ("select" === n.nodeName.toLowerCase()) {
                    var r = e(n).val();
                    return r && r.length > 0
                }
                return this.checkable(n) ? this.getLength(t, n) > 0 : e.trim(t).length > 0
            },
            remote: function(t, n, i) {
                if (this.optional(n)) return "dependency-mismatch";
                var r = this.previousValue(n);
                if (this.settings.messages[n.name] || (this.settings.messages[n.name] = {}), r.originalMessage = this.settings.messages[n.name].remote, this.settings.messages[n.name].remote = r.message, i = "string" == typeof i && {
                        url: i
                    } || i, r.old === t) return r.valid;
                r.old = t;
                var o = this;
                this.startRequest(n);
                var a = {};
                return a[n.name] = t, e.ajax(e.extend(!0, {
                    url: i,
                    mode: "abort",
                    port: "validate" + n.name,
                    dataType: "json",
                    data: a,
                    success: function(i) {
                        o.settings.messages[n.name].remote = r.originalMessage;
                        var a = i === !0 || "true" === i;
                        if (a) {
                            var s = o.formSubmitted;
                            o.prepareElement(n), o.formSubmitted = s, o.successList.push(n), delete o.invalid[n.name], o.showErrors()
                        } else {
                            var u = {},
                                l = i || o.defaultMessage(n, "remote");
                            u[n.name] = r.message = e.isFunction(l) ? l(t) : l, o.invalid[n.name] = !0, o.showErrors(u)
                        }
                        r.valid = a, o.stopRequest(n, a)
                    }
                }, i)), "pending"
            },
            minlength: function(t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                return this.optional(n) || r >= i
            },
            maxlength: function(t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                return this.optional(n) || i >= r
            },
            rangelength: function(t, n, i) {
                var r = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                return this.optional(n) || r >= i[0] && r <= i[1]
            },
            min: function(e, t, n) {
                return this.optional(t) || e >= n
            },
            max: function(e, t, n) {
                return this.optional(t) || n >= e
            },
            range: function(e, t, n) {
                return this.optional(t) || e >= n[0] && e <= n[1]
            },
            email: function(e, t) {
                return this.optional(t) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(e)
            },
            url: function(e, t) {
                return this.optional(t) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e)
            },
            date: function(e, t) {
                return this.optional(t) || !/Invalid|NaN/.test(new Date(e).toString())
            },
            dateISO: function(e, t) {
                return this.optional(t) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(e)
            },
            number: function(e, t) {
                return this.optional(t) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e)
            },
            digits: function(e, t) {
                return this.optional(t) || /^\d+$/.test(e)
            },
            creditcard: function(e, t) {
                if (this.optional(t)) return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(e)) return !1;
                var n = 0,
                    i = 0,
                    r = !1;
                e = e.replace(/\D/g, "");
                for (var o = e.length - 1; o >= 0; o--) {
                    var a = e.charAt(o);
                    i = parseInt(a, 10), r && (i *= 2) > 9 && (i -= 9), n += i, r = !r
                }
                return n % 10 === 0
            },
            equalTo: function(t, n, i) {
                var r = e(i);
                return this.settings.onfocusout && r.unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                    e(n).valid()
                }), t === r.val()
            }
        }
    }), e.format = e.validator.format
}(jQuery),
function(e) {
    var t = {};
    if (e.ajaxPrefilter) e.ajaxPrefilter(function(e, n, i) {
        var r = e.port;
        "abort" === e.mode && (t[r] && t[r].abort(), t[r] = i)
    });
    else {
        var n = e.ajax;
        e.ajax = function(i) {
            var r = ("mode" in i ? i : e.ajaxSettings).mode,
                o = ("port" in i ? i : e.ajaxSettings).port;
            return "abort" === r ? (t[o] && t[o].abort(), t[o] = n.apply(this, arguments)) : n.apply(this, arguments)
        }
    }
}(jQuery),
function(e) {
    e.extend(e.fn, {
        validateDelegate: function(t, n, i) {
            return this.bind(n, function(n) {
                var r = e(n.target);
                return r.is(t) ? i.apply(r, arguments) : void 0
            })
        }
    })
}(jQuery),
function(e, t, n) {
    function i(n, i, r) {
        var o = t.createElement(n);
        return i && (o.id = J + i), r && (o.style.cssText = r), e(o)
    }

    function r() {
        return n.innerHeight ? n.innerHeight : e(n).height()
    }

    function o(t, n) {
        n !== Object(n) && (n = {}), this.cache = {}, this.el = t, this.value = function(t) {
            var i;
            return void 0 === this.cache[t] && (i = e(this.el).attr("data-cbox-" + t), void 0 !== i ? this.cache[t] = i : void 0 !== n[t] ? this.cache[t] = n[t] : void 0 !== K[t] && (this.cache[t] = K[t])), this.cache[t]
        }, this.get = function(t) {
            var n = this.value(t);
            return e.isFunction(n) ? n.call(this.el, this) : n
        }
    }

    function a(e) {
        var t = S.length,
            n = (W + e) % t;
        return 0 > n ? t + n : n
    }

    function s(e, t) {
        return Math.round((/%/.test(e) ? ("x" === t ? E.width() : r()) / 100 : 1) * parseInt(e, 10))
    }

    function u(e, t) {
        return e.get("photo") || e.get("photoRegex").test(t)
    }

    function l(e, t) {
        return e.get("retinaUrl") && n.devicePixelRatio > 1 ? t.replace(e.get("photoRegex"), e.get("retinaSuffix")) : t
    }

    function c(e) {
        "contains" in b[0] && !b[0].contains(e.target) && e.target !== y[0] && (e.stopPropagation(), b.focus())
    }

    function h(e) {
        h.str !== e && (b.add(y).removeClass(h.str).addClass(e), h.str = e)
    }

    function d(t) {
        W = 0, t && t !== !1 && "nofollow" !== t ? (S = e("." + et).filter(function() {
            var n = e.data(this, Z),
                i = new o(this, n);
            return i.get("rel") === t
        }), W = S.index(O.el), -1 === W && (S = S.add(O.el), W = S.length - 1)) : S = e(O.el)
    }

    function f(n) {
        e(t).trigger(n), st.triggerHandler(n)
    }

    function p(n) {
        var r;
        if (!V) {
            if (r = e(n).data(Z), O = new o(n, r), d(O.get("rel")), !Y) {
                Y = U = !0, h(O.get("className")), b.css({
                    visibility: "hidden",
                    display: "block",
                    opacity: ""
                }), F = i(ut, "LoadedContent", "width:0; height:0; overflow:hidden; visibility:hidden"), x.css({
                    width: "",
                    height: ""
                }).append(F), H = _.height() + k.height() + x.outerHeight(!0) - x.height(), z = T.width() + C.width() + x.outerWidth(!0) - x.width(), R = F.outerHeight(!0), q = F.outerWidth(!0);
                var a = s(O.get("initialWidth"), "x"),
                    u = s(O.get("initialHeight"), "y"),
                    l = O.get("maxWidth"),
                    p = O.get("maxHeight");
                O.w = (l !== !1 ? Math.min(a, s(l, "x")) : a) - q - z, O.h = (p !== !1 ? Math.min(u, s(p, "y")) : u) - R - H, F.css({
                    width: "",
                    height: O.h
                }), G.position(), f(tt), O.get("onOpen"), I.add($).hide(), b.focus(), O.get("trapFocus") && t.addEventListener && (t.addEventListener("focus", c, !0), st.one(ot, function() {
                    t.removeEventListener("focus", c, !0)
                })), O.get("returnFocus") && st.one(ot, function() {
                    e(O.el).focus()
                })
            }
            var m = parseFloat(O.get("opacity"));
            y.css({
                opacity: m === m ? m : "",
                cursor: O.get("overlayClose") ? "pointer" : "",
                visibility: "visible"
            }).show(), O.get("closeButton") ? P.html(O.get("close")).appendTo(x) : P.appendTo("<div/>"), v()
        }
    }

    function m() {
        b || (Q = !1, E = e(n), b = i(ut).attr({
            id: Z,
            "class": e.support.opacity === !1 ? J + "IE" : "",
            role: "dialog",
            tabindex: "-1"
        }).hide(), y = i(ut, "Overlay").hide(), D = e([i(ut, "LoadingOverlay")[0], i(ut, "LoadingGraphic")[0]]), w = i(ut, "Wrapper"), x = i(ut, "Content").append($ = i(ut, "Title"), N = i(ut, "Current"), j = e('<button type="button"/>').attr({
            id: J + "Previous"
        }), M = e('<button type="button"/>').attr({
            id: J + "Next"
        }), L = i("button", "Slideshow"), D), P = e('<button type="button"/>').attr({
            id: J + "Close"
        }), w.append(i(ut).append(i(ut, "TopLeft"), _ = i(ut, "TopCenter"), i(ut, "TopRight")), i(ut, !1, "clear:left").append(T = i(ut, "MiddleLeft"), x, C = i(ut, "MiddleRight")), i(ut, !1, "clear:left").append(i(ut, "BottomLeft"), k = i(ut, "BottomCenter"), i(ut, "BottomRight"))).find("div div").css({
            "float": "left"
        }), A = i(ut, !1, "position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;"), I = M.add(j).add(N).add(L)), t.body && !b.parent().length && e(t.body).append(y, b.append(w, A))
    }

    function g() {
        function n(e) {
            e.which > 1 || e.shiftKey || e.altKey || e.metaKey || e.ctrlKey || (e.preventDefault(), p(this))
        }
        return b ? (Q || (Q = !0, M.click(function() {
            G.next()
        }), j.click(function() {
            G.prev()
        }), P.click(function() {
            G.close()
        }), y.click(function() {
            O.get("overlayClose") && G.close()
        }), e(t).bind("keydown." + J, function(e) {
            var t = e.keyCode;
            Y && O.get("escKey") && 27 === t && (e.preventDefault(), G.close()), Y && O.get("arrowKey") && S[1] && !e.altKey && (37 === t ? (e.preventDefault(), j.click()) : 39 === t && (e.preventDefault(), M.click()))
        }), e.isFunction(e.fn.on) ? e(t).on("click." + J, "." + et, n) : e("." + et).live("click." + J, n)), !0) : !1
    }

    function v() {
        var t, r, o, a = G.prep,
            c = ++lt;
        if (U = !0, B = !1, f(at), f(nt), O.get("onLoad"), O.h = O.get("height") ? s(O.get("height"), "y") - R - H : O.get("innerHeight") && s(O.get("innerHeight"), "y"), O.w = O.get("width") ? s(O.get("width"), "x") - q - z : O.get("innerWidth") && s(O.get("innerWidth"), "x"), O.mw = O.w, O.mh = O.h, O.get("maxWidth") && (O.mw = s(O.get("maxWidth"), "x") - q - z, O.mw = O.w && O.w < O.mw ? O.w : O.mw), O.get("maxHeight") && (O.mh = s(O.get("maxHeight"), "y") - R - H, O.mh = O.h && O.h < O.mh ? O.h : O.mh), t = O.get("href"), X = setTimeout(function() {
                D.show()
            }, 100), O.get("inline")) {
            var h = e(t);
            o = e("<div>").hide().insertBefore(h), st.one(at, function() {
                o.replaceWith(h)
            }), a(h)
        } else O.get("iframe") ? a(" ") : O.get("html") ? a(O.get("html")) : u(O, t) ? (t = l(O, t), B = O.get("createImg"), e(B).addClass(J + "Photo").bind("error." + J, function() {
            a(i(ut, "Error").html(O.get("imgError")))
        }).one("load", function() {
            c === lt && setTimeout(function() {
                var t;
                O.get("retinaImage") && n.devicePixelRatio > 1 && (B.height = B.height / n.devicePixelRatio, B.width = B.width / n.devicePixelRatio), O.get("scalePhotos") && (r = function() {
                    B.height -= B.height * t, B.width -= B.width * t
                }, O.mw && B.width > O.mw && (t = (B.width - O.mw) / B.width, r()), O.mh && B.height > O.mh && (t = (B.height - O.mh) / B.height, r())), O.h && (B.style.marginTop = Math.max(O.mh - B.height, 0) / 2 + "px"), S[1] && (O.get("loop") || S[W + 1]) && (B.style.cursor = "pointer", e(B).bind("click." + J, function() {
                    G.next()
                })), B.style.width = B.width + "px", B.style.height = B.height + "px", a(B)
            }, 1)
        }), B.src = t) : t && A.load(t, O.get("data"), function(t, n) {
            c === lt && a("error" === n ? i(ut, "Error").html(O.get("xhrError")) : e(this).contents())
        })
    }
    var y, b, w, x, _, T, C, k, S, E, F, A, D, $, N, L, M, j, P, I, O, H, z, R, q, W, B, Y, U, V, X, G, Q, K = {
            html: !1,
            photo: !1,
            iframe: !1,
            inline: !1,
            transition: "elastic",
            speed: 300,
            fadeOut: 300,
            width: !1,
            initialWidth: "600",
            innerWidth: !1,
            maxWidth: !1,
            height: !1,
            initialHeight: "450",
            innerHeight: !1,
            maxHeight: !1,
            scalePhotos: !0,
            scrolling: !0,
            opacity: .9,
            preloading: !0,
            className: !1,
            overlayClose: !0,
            escKey: !0,
            arrowKey: !0,
            top: !1,
            bottom: !1,
            left: !1,
            right: !1,
            fixed: !1,
            data: void 0,
            closeButton: !0,
            fastIframe: !0,
            open: !1,
            reposition: !0,
            loop: !0,
            slideshow: !1,
            slideshowAuto: !0,
            slideshowSpeed: 2500,
            slideshowStart: "start slideshow",
            slideshowStop: "stop slideshow",
            photoRegex: /\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,
            retinaImage: !1,
            retinaUrl: !1,
            retinaSuffix: "@2x.$1",
            current: "image {current} of {total}",
            previous: "previous",
            next: "next",
            close: "close",
            xhrError: "This content failed to load.",
            imgError: "This image failed to load.",
            returnFocus: !0,
            trapFocus: !0,
            onOpen: !1,
            onLoad: !1,
            onComplete: !1,
            onCleanup: !1,
            onClosed: !1,
            rel: function() {
                return this.rel
            },
            href: function() {
                return e(this).attr("href")
            },
            title: function() {
                return this.title
            },
            createImg: function() {
                var t = new Image,
                    n = e(this).data("cbox-img-attrs");
                return "object" == typeof n && e.each(n, function(e, n) {
                    t[e] = n
                }), t
            },
            createIframe: function() {
                var n = t.createElement("iframe"),
                    i = e(this).data("cbox-iframe-attrs");
                return "object" == typeof i && e.each(i, function(e, t) {
                    n[e] = t
                }), "frameBorder" in n && (n.frameBorder = 0), "allowTransparency" in n && (n.allowTransparency = "true"), n.name = (new Date).getTime(), n.allowFullScreen = !0, n
            }
        },
        Z = "colorbox",
        J = "cbox",
        et = J + "Element",
        tt = J + "_open",
        nt = J + "_load",
        it = J + "_complete",
        rt = J + "_cleanup",
        ot = J + "_closed",
        at = J + "_purge",
        st = e("<a/>"),
        ut = "div",
        lt = 0,
        ct = {},
        ht = function() {
            function e() {
                clearTimeout(a)
            }

            function t() {
                (O.get("loop") || S[W + 1]) && (e(), a = setTimeout(G.next, O.get("slideshowSpeed")))
            }

            function n() {
                L.html(O.get("slideshowStop")).unbind(u).one(u, i), st.bind(it, t).bind(nt, e), b.removeClass(s + "off").addClass(s + "on")
            }

            function i() {
                e(), st.unbind(it, t).unbind(nt, e), L.html(O.get("slideshowStart")).unbind(u).one(u, function() {
                    G.next(), n()
                }), b.removeClass(s + "on").addClass(s + "off")
            }

            function r() {
                o = !1, L.hide(), e(), st.unbind(it, t).unbind(nt, e), b.removeClass(s + "off " + s + "on")
            }
            var o, a, s = J + "Slideshow_",
                u = "click." + J;
            return function() {
                o ? O.get("slideshow") || (st.unbind(rt, r), r()) : O.get("slideshow") && S[1] && (o = !0, st.one(rt, r), O.get("slideshowAuto") ? n() : i(), L.show())
            }
        }();
    e[Z] || (e(m), G = e.fn[Z] = e[Z] = function(t, n) {
        var i, r = this;
        return t = t || {}, e.isFunction(r) && (r = e("<a/>"), t.open = !0), r[0] ? (m(), g() && (n && (t.onComplete = n), r.each(function() {
            var n = e.data(this, Z) || {};
            e.data(this, Z, e.extend(n, t))
        }).addClass(et), i = new o(r[0], t), i.get("open") && p(r[0])), r) : r
    }, G.position = function(t, n) {
        function i() {
            _[0].style.width = k[0].style.width = x[0].style.width = parseInt(b[0].style.width, 10) - z + "px", x[0].style.height = T[0].style.height = C[0].style.height = parseInt(b[0].style.height, 10) - H + "px"
        }
        var o, a, u, l = 0,
            c = 0,
            h = b.offset();
        if (E.unbind("resize." + J), b.css({
                top: -9e4,
                left: -9e4
            }), a = E.scrollTop(), u = E.scrollLeft(), O.get("fixed") ? (h.top -= a, h.left -= u, b.css({
                position: "fixed"
            })) : (l = a, c = u, b.css({
                position: "absolute"
            })), c += O.get("right") !== !1 ? Math.max(E.width() - O.w - q - z - s(O.get("right"), "x"), 0) : O.get("left") !== !1 ? s(O.get("left"), "x") : Math.round(Math.max(E.width() - O.w - q - z, 0) / 2), l += O.get("bottom") !== !1 ? Math.max(r() - O.h - R - H - s(O.get("bottom"), "y"), 0) : O.get("top") !== !1 ? s(O.get("top"), "y") : Math.round(Math.max(r() - O.h - R - H, 0) / 2), b.css({
                top: h.top,
                left: h.left,
                visibility: "visible"
            }), w[0].style.width = w[0].style.height = "9999px", o = {
                width: O.w + q + z,
                height: O.h + R + H,
                top: l,
                left: c
            }, t) {
            var d = 0;
            e.each(o, function(e) {
                return o[e] !== ct[e] ? void(d = t) : void 0
            }), t = d
        }
        ct = o, t || b.css(o), b.dequeue().animate(o, {
            duration: t || 0,
            complete: function() {
                i(), U = !1, w[0].style.width = O.w + q + z + "px", w[0].style.height = O.h + R + H + "px", O.get("reposition") && setTimeout(function() {
                    E.bind("resize." + J, G.position)
                }, 1), e.isFunction(n) && n()
            },
            step: i
        })
    }, G.resize = function(e) {
        var t;
        Y && (e = e || {}, e.width && (O.w = s(e.width, "x") - q - z), e.innerWidth && (O.w = s(e.innerWidth, "x")), F.css({
            width: O.w
        }), e.height && (O.h = s(e.height, "y") - R - H), e.innerHeight && (O.h = s(e.innerHeight, "y")), e.innerHeight || e.height || (t = F.scrollTop(), F.css({
            height: "auto"
        }), O.h = F.height()), F.css({
            height: O.h
        }), t && F.scrollTop(t), G.position("none" === O.get("transition") ? 0 : O.get("speed")))
    }, G.prep = function(n) {
        function r() {
            return O.w = O.w || F.width(), O.w = O.mw && O.mw < O.w ? O.mw : O.w, O.w
        }

        function s() {
            return O.h = O.h || F.height(), O.h = O.mh && O.mh < O.h ? O.mh : O.h, O.h
        }
        if (Y) {
            var c, d = "none" === O.get("transition") ? 0 : O.get("speed");
            F.remove(), F = i(ut, "LoadedContent").append(n), F.hide().appendTo(A.show()).css({
                width: r(),
                overflow: O.get("scrolling") ? "auto" : "hidden"
            }).css({
                height: s()
            }).prependTo(x), A.hide(), e(B).css({
                "float": "none"
            }), h(O.get("className")), c = function() {
                function n() {
                    e.support.opacity === !1 && b[0].style.removeAttribute("filter")
                }
                var i, r, s = S.length;
                Y && (r = function() {
                    clearTimeout(X), D.hide(), f(it), O.get("onComplete")
                }, $.html(O.get("title")).show(), F.show(), s > 1 ? ("string" == typeof O.get("current") && N.html(O.get("current").replace("{current}", W + 1).replace("{total}", s)).show(), M[O.get("loop") || s - 1 > W ? "show" : "hide"]().html(O.get("next")), j[O.get("loop") || W ? "show" : "hide"]().html(O.get("previous")), ht(), O.get("preloading") && e.each([a(-1), a(1)], function() {
                    var n, i = S[this],
                        r = new o(i, e.data(i, Z)),
                        a = r.get("href");
                    a && u(r, a) && (a = l(r, a), n = t.createElement("img"), n.src = a)
                })) : I.hide(), O.get("iframe") ? (i = O.get("createIframe"), O.get("scrolling") || (i.scrolling = "no"), e(i).attr({
                    src: O.get("href"),
                    "class": J + "Iframe"
                }).one("load", r).appendTo(F), st.one(at, function() {
                    i.src = "//about:blank"
                }), O.get("fastIframe") && e(i).trigger("load")) : r(), "fade" === O.get("transition") ? b.fadeTo(d, 1, n) : n())
            }, "fade" === O.get("transition") ? b.fadeTo(d, 0, function() {
                G.position(0, c)
            }) : G.position(d, c)
        }
    }, G.next = function() {
        !U && S[1] && (O.get("loop") || S[W + 1]) && (W = a(1), p(S[W]))
    }, G.prev = function() {
        !U && S[1] && (O.get("loop") || W) && (W = a(-1), p(S[W]))
    }, G.close = function() {
        Y && !V && (V = !0, Y = !1, f(rt), O.get("onCleanup"), E.unbind("." + J), y.fadeTo(O.get("fadeOut") || 0, 0), b.stop().fadeTo(O.get("fadeOut") || 0, 0, function() {
            b.hide(), y.hide(), f(at), F.remove(), setTimeout(function() {
                V = !1, f(ot), O.get("onClosed")
            }, 1)
        }))
    }, G.remove = function() {
        b && (b.stop(), e[Z].close(), b.stop(!1, !0).remove(), y.remove(), V = !1, b = null, e("." + et).removeData(Z).removeClass(et), e(t).unbind("click." + J).unbind("keydown." + J))
    }, G.element = function() {
        return e(O.el)
    }, G.settings = K)
}(jQuery, document, window),
function(e) {
    var t = e.fn.ready;
    e.fn.ready = function(n) {
        t(void 0 === this.context ? n : this.selector ? e.proxy(function() {
            e(this.selector, this.context).each(n)
        }, this) : e.proxy(function() {
            e(this).each(n)
        }, this))
    }
}(jQuery),
function() {
    function e() {}

    function t(e, t) {
        for (var n = e.length; n--;)
            if (e[n].listener === t) return n;
        return -1
    }

    function n(e) {
        return function() {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        o = r.EventEmitter;
    i.getListeners = function(e) {
        var t, n, i = this._getEvents();
        if ("object" == typeof e) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function(e) {
        var t, n = [];
        for (t = 0; t < e.length; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function(e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && (t = {}, t[e] = n), t || n
    }, i.addListener = function(e, n) {
        var i, r = this.getListenersAsObject(e),
            o = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function(e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function(e) {
        return this.getListeners(e), this
    }, i.defineEvents = function(e) {
        for (var t = 0; t < e.length; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function(e, n) {
        var i, r, o = this.getListenersAsObject(e);
        for (r in o) o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1));
        return this
    }, i.off = n("removeListener"), i.addListeners = function(e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function(e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function(e, t, n) {
        var i, r, o = e ? this.removeListener : this.addListener,
            a = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp)
            for (i = n.length; i--;) o.call(this, t, n[i]);
        else
            for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : a.call(this, i, r));
        return this
    }, i.removeEvent = function(e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if ("object" === n)
            for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function(e, t) {
        var n, i, r, o, a = this.getListenersAsObject(e);
        for (r in a)
            if (a.hasOwnProperty(r))
                for (i = a[r].length; i--;) n = a[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function(e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, i._getEvents = function() {
        return this._events || (this._events = {})
    }, e.noConflict = function() {
        return r.EventEmitter = o, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}.call(this),
    function(e) {
        function t(t) {
            var n = e.event;
            return n.target = n.target || n.srcElement || t, n
        }
        var n = document.documentElement,
            i = function() {};
        n.addEventListener ? i = function(e, t, n) {
            e.addEventListener(t, n, !1)
        } : n.attachEvent && (i = function(e, n, i) {
            e[n + i] = i.handleEvent ? function() {
                var n = t(e);
                i.handleEvent.call(i, n)
            } : function() {
                var n = t(e);
                i.call(e, n)
            }, e.attachEvent("on" + n, e[n + i])
        });
        var r = function() {};
        n.removeEventListener ? r = function(e, t, n) {
            e.removeEventListener(t, n, !1)
        } : n.detachEvent && (r = function(e, t, n) {
            e.detachEvent("on" + t, e[t + n]);
            try {
                delete e[t + n]
            } catch (i) {
                e[t + n] = void 0
            }
        });
        var o = {
            bind: i,
            unbind: r
        };
        "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
    }(this),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function(n, i) {
            return t(e, n, i)
        }) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
    }(window, function(e, t, n) {
        function i(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function r(e) {
            return "[object Array]" === d.call(e)
        }

        function o(e) {
            var t = [];
            if (r(e)) t = e;
            else if ("number" == typeof e.length)
                for (var n = 0, i = e.length; i > n; n++) t.push(e[n]);
            else t.push(e);
            return t
        }

        function a(e, t, n) {
            if (!(this instanceof a)) return new a(e, t);
            "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), l && (this.jqDeferred = new l.Deferred);
            var r = this;
            setTimeout(function() {
                r.check()
            })
        }

        function s(e) {
            this.img = e
        }

        function u(e) {
            this.src = e, f[e] = this
        }
        var l = e.jQuery,
            c = e.console,
            h = "undefined" != typeof c,
            d = Object.prototype.toString;
        a.prototype = new t, a.prototype.options = {}, a.prototype.getImages = function() {
            this.images = [];
            for (var e = 0, t = this.elements.length; t > e; e++) {
                var n = this.elements[e];
                "IMG" === n.nodeName && this.addImage(n);
                var i = n.nodeType;
                if (i && (1 === i || 9 === i || 11 === i))
                    for (var r = n.querySelectorAll("img"), o = 0, a = r.length; a > o; o++) {
                        var s = r[o];
                        this.addImage(s)
                    }
            }
        }, a.prototype.addImage = function(e) {
            var t = new s(e);
            this.images.push(t)
        }, a.prototype.check = function() {
            function e(e, r) {
                return t.options.debug && h && c.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0
            }
            var t = this,
                n = 0,
                i = this.images.length;
            if (this.hasAnyBroken = !1, !i) return void this.complete();
            for (var r = 0; i > r; r++) {
                var o = this.images[r];
                o.on("confirm", e), o.check()
            }
        }, a.prototype.progress = function(e) {
            this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
            var t = this;
            setTimeout(function() {
                t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
            })
        }, a.prototype.complete = function() {
            var e = this.hasAnyBroken ? "fail" : "done";
            this.isComplete = !0;
            var t = this;
            setTimeout(function() {
                if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
                    var n = t.hasAnyBroken ? "reject" : "resolve";
                    t.jqDeferred[n](t)
                }
            })
        }, l && (l.fn.imagesLoaded = function(e, t) {
            var n = new a(this, e, t);
            return n.jqDeferred.promise(l(this))
        }), s.prototype = new t, s.prototype.check = function() {
            var e = f[this.img.src] || new u(this.img.src);
            if (e.isConfirmed) return void this.confirm(e.isLoaded, "cached was confirmed");
            if (this.img.complete && void 0 !== this.img.naturalWidth) return void this.confirm(0 !== this.img.naturalWidth, "naturalWidth");
            var t = this;
            e.on("confirm", function(e, n) {
                return t.confirm(e.isLoaded, n), !0
            }), e.check()
        }, s.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("confirm", this, t)
        };
        var f = {};
        return u.prototype = new t, u.prototype.check = function() {
            if (!this.isChecked) {
                var e = new Image;
                n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
            }
        }, u.prototype.handleEvent = function(e) {
            var t = "on" + e.type;
            this[t] && this[t](e)
        }, u.prototype.onload = function(e) {
            this.confirm(!0, "onload"), this.unbindProxyEvents(e)
        }, u.prototype.onerror = function(e) {
            this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
        }, u.prototype.confirm = function(e, t) {
            this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
        }, u.prototype.unbindProxyEvents = function(e) {
            n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
        }, a
    }),
    function() {
        this.BackgroundImage = function() {
            function e(e, t, n) {
                var i;
                null == n && (n = {}), this.thumbnail = e, this.source = t, this.horizontal = n.horizontal, this.vertical = n.vertical, this.scaling = n.scaling, this.container = null != (i = n.container) ? i : "body"
            }
            return e.prototype.loadBackground = function() {
                var e, t, n, i, r, o, a, s, u, l;
                return Modernizr.backgroundsize ? (e = $("" + this.container).children(".backdrop"), l = e.length ? e : (u = $('<div class="backdrop"></div>'), "body" !== this.container ? u.css({
                    position: "static"
                }) : void 0, u.appendTo(this.container)), o = e.find(".background"), a = $('<div class="background backdrop-thumbnail backdrop-' + this.scaling + '"></div>').css({
                    opacity: "1",
                    "background-image": "url(" + this.thumbnail + ")",
                    "background-position": this.vertical + " " + this.horizontal
                }).appendTo(l), t = $('<div class="background backdrop-full backdrop-' + this.scaling + '"></div>').css({
                    "background-position": this.vertical + " " + this.horizontal
                }).appendTo(l), n = $("<img />")[0], n.src = this.source, $(n).imagesLoaded(function() {
                    return t.css({
                        opacity: "1",
                        "background-image": "url(" + n.src + ")"
                    }), o.css({
                        opacity: 0
                    }).remove()
                })) : ($(".backdrop").hide(), i = Alignment.horizontalAlignmentOptions(this.horizontal), s = Alignment.verticalAlignmentOptions(this.vertical), r = $.extend({
                    fade: 400,
                    duration: 0
                }, s, i), $.backstretch([this.thumbnail, this.source], r), $(window).on("backstretch.show", function(e, t) {
                    return t.index === t.images.length - 1 ? t.pause() : void 0
                }))
            }, e
        }(), this.Alignment = {
            verticalAlignmentOptions: function(e) {
                var t;
                switch (t = {}, e) {
                    case "top":
                        t.topY = !0, t.centeredY = !1, t.bottomY = !1;
                        break;
                    case "center":
                        t.topY = !1, t.centeredY = !0, t.bottomY = !1;
                        break;
                    case "bottom":
                        t.topY = !1, t.centeredY = !1, t.bottomY = !0
                }
                return t
            },
            horizontalAlignmentOptions: function(e) {
                var t;
                switch (t = {}, e) {
                    case "left":
                        t.leftX = !0, t.centeredX = !1, t.rightX = !1;
                        break;
                    case "center":
                        t.leftX = !1, t.centeredX = !0, t.rightX = !1;
                        break;
                    case "right":
                        t.leftX = !1, t.centeredX = !1, t.rightX = !0
                }
                return t
            }
        }
    }.call(this),
    function(e, t) {
        "object" == typeof exports ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.Spinner = t()
    }(this, function() {
        "use strict";

        function e(e, t) {
            var n, i = document.createElement(e || "div");
            for (n in t) i[n] = t[n];
            return i
        }

        function t(e) {
            for (var t = 1, n = arguments.length; n > t; t++) e.appendChild(arguments[t]);
            return e
        }

        function n(e, t, n, i) {
            var r = ["opacity", t, ~~(100 * e), n, i].join("-"),
                o = .01 + n / i * 100,
                a = Math.max(1 - (1 - e) / t * (100 - o), e),
                s = l.substring(0, l.indexOf("Animation")).toLowerCase(),
                u = s && "-" + s + "-" || "";
            return d[r] || (c.insertRule("@" + u + "keyframes " + r + "{0%{opacity:" + a + "}" + o + "%{opacity:" + e + "}" + (o + .01) + "%{opacity:1}" + (o + t) % 100 + "%{opacity:" + e + "}100%{opacity:" + a + "}}", c.cssRules.length), d[r] = 1), r
        }

        function i(e, t) {
            var n, i, r = e.style;
            for (t = t.charAt(0).toUpperCase() + t.slice(1), i = 0; i < h.length; i++)
                if (n = h[i] + t, void 0 !== r[n]) return n;
            return void 0 !== r[t] ? t : void 0
        }

        function r(e, t) {
            for (var n in t) e.style[i(e, n) || n] = t[n];
            return e
        }

        function o(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var i in n) void 0 === e[i] && (e[i] = n[i])
            }
            return e
        }

        function a(e, t) {
            return "string" == typeof e ? e : e[t % e.length]
        }

        function s(e) {
            this.opts = o(e || {}, s.defaults, f)
        }

        function u() {
            function n(t, n) {
                return e("<" + t + ' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">', n)
            }
            c.addRule(".spin-vml", "behavior:url(#default#VML)"), s.prototype.lines = function(e, i) {
                function o() {
                    return r(n("group", {
                        coordsize: c + " " + c,
                        coordorigin: -l + " " + -l
                    }), {
                        width: c,
                        height: c
                    })
                }

                function s(e, s, u) {
                    t(d, t(r(o(), {
                        rotation: 360 / i.lines * e + "deg",
                        left: ~~s
                    }), t(r(n("roundrect", {
                        arcsize: i.corners
                    }), {
                        width: l,
                        height: i.scale * i.width,
                        left: i.scale * i.radius,
                        top: -i.scale * i.width >> 1,
                        filter: u
                    }), n("fill", {
                        color: a(i.color, e),
                        opacity: i.opacity
                    }), n("stroke", {
                        opacity: 0
                    }))))
                }
                var u, l = i.scale * (i.length + i.width),
                    c = 2 * i.scale * l,
                    h = -(i.width + i.length) * i.scale * 2 + "px",
                    d = r(o(), {
                        position: "absolute",
                        top: h,
                        left: h
                    });
                if (i.shadow)
                    for (u = 1; u <= i.lines; u++) s(u, -2, "progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");
                for (u = 1; u <= i.lines; u++) s(u);
                return t(e, d)
            }, s.prototype.opacity = function(e, t, n, i) {
                var r = e.firstChild;
                i = i.shadow && i.lines || 0, r && t + i < r.childNodes.length && (r = r.childNodes[t + i], r = r && r.firstChild, r = r && r.firstChild, r && (r.opacity = n))
            }
        }
        var l, c, h = ["webkit", "Moz", "ms", "O"],
            d = {},
            f = {
                lines: 12,
                length: 7,
                width: 5,
                radius: 10,
                scale: 1,
                rotate: 0,
                corners: 1,
                color: "#000",
                direction: 1,
                speed: 1,
                trail: 100,
                opacity: .25,
                fps: 20,
                zIndex: 2e9,
                className: "spinner",
                top: "50%",
                left: "50%",
                position: "absolute"
            };
        if (s.defaults = {}, o(s.prototype, {
                spin: function(t) {
                    this.stop();
                    var n = this,
                        i = n.opts,
                        o = n.el = r(e(0, {
                            className: i.className
                        }), {
                            position: i.position,
                            width: 0,
                            zIndex: i.zIndex
                        });
                    if (r(o, {
                            left: i.left,
                            top: i.top
                        }), t && t.insertBefore(o, t.firstChild || null), o.setAttribute("role", "progressbar"), n.lines(o, n.opts), !l) {
                        var a, s = 0,
                            u = (i.lines - 1) * (1 - i.direction) / 2,
                            c = i.fps,
                            h = c / i.speed,
                            d = (1 - i.opacity) / (h * i.trail / 100),
                            f = h / i.lines;
                        ! function p() {
                            s++;
                            for (var e = 0; e < i.lines; e++) a = Math.max(1 - (s + (i.lines - e) * f) % h * d, i.opacity), n.opacity(o, e * i.direction + u, a, i);
                            n.timeout = n.el && setTimeout(p, ~~(1e3 / c))
                        }()
                    }
                    return n
                },
                stop: function() {
                    var e = this.el;
                    return e && (clearTimeout(this.timeout), e.parentNode && e.parentNode.removeChild(e), this.el = void 0), this
                },
                lines: function(i, o) {
                    function s(t, n) {
                        return r(e(), {
                            position: "absolute",
                            width: o.scale * (o.length + o.width) + "px",
                            height: o.scale * o.width + "px",
                            background: t,
                            boxShadow: n,
                            transformOrigin: "left",
                            transform: "rotate(" + ~~(360 / o.lines * c + o.rotate) + "deg) translate(" + o.scale * o.radius + "px,0)",
                            borderRadius: (o.corners * o.scale * o.width >> 1) + "px"
                        })
                    }
                    for (var u, c = 0, h = (o.lines - 1) * (1 - o.direction) / 2; c < o.lines; c++) u = r(e(), {
                        position: "absolute",
                        top: 1 + ~(o.scale * o.width / 2) + "px",
                        transform: o.hwaccel ? "translate3d(0,0,0)" : "",
                        opacity: o.opacity,
                        animation: l && n(o.opacity, o.trail, h + c * o.direction, o.lines) + " " + 1 / o.speed + "s linear infinite"
                    }), o.shadow && t(u, r(s("#000", "0 0 4px #000"), {
                        top: "2px"
                    })), t(i, t(u, s(a(o.color, c), "0 0 1px rgba(0,0,0,.1)")));
                    return i
                },
                opacity: function(e, t, n) {
                    t < e.childNodes.length && (e.childNodes[t].style.opacity = n)
                }
            }), "undefined" != typeof document) {
            c = function() {
                var n = e("style", {
                    type: "text/css"
                });
                return t(document.getElementsByTagName("head")[0], n), n.sheet || n.styleSheet
            }();
            var p = r(e("group"), {
                behavior: "url(#default#VML)"
            });
            !i(p, "transform") && p.adj ? u() : l = i(p, "animation")
        }
        return s
    }),
    function(e) {
        if ("object" == typeof exports) e(require("jquery"), require("spin.js"));
        else if ("function" == typeof define && define.amd) define(["jquery", "spin"], e);
        else {
            if (!window.Spinner) throw new Error("Spin.js not present");
            e(window.jQuery, window.Spinner)
        }
    }(function(e, t) {
        e.fn.spin = function(n, i) {
            return this.each(function() {
                var r = e(this),
                    o = r.data();
                o.spinner && (o.spinner.stop(), delete o.spinner), n !== !1 && (n = e.extend({
                    color: i || r.css("color")
                }, e.fn.spin.presets[n] || n), o.spinner = new t(n).spin(this))
            })
        }, e.fn.spin.presets = {
            tiny: {
                lines: 8,
                length: 2,
                width: 2,
                radius: 3
            },
            small: {
                lines: 8,
                length: 4,
                width: 3,
                radius: 5
            },
            large: {
                lines: 10,
                length: 8,
                width: 4,
                radius: 8
            }
        }
    }),
    function(e, t, n, i) {
        var r = t.document,
            o = e(r),
            a = e(t),
            s = Array.prototype,
            u = 1.35,
            l = !0,
            c = 3e4,
            h = !1,
            d = navigator.userAgent.toLowerCase(),
            f = t.location.hash.replace(/#\//, ""),
            p = t.location.protocol,
            m = Math,
            g = function() {},
            v = function() {
                return !1
            },
            y = function() {
                var e = 3,
                    t = r.createElement("div"),
                    n = t.getElementsByTagName("i");
                do t.innerHTML = "<!--[if gt IE " + ++e + "]><i></i><![endif]-->"; while (n[0]);
                return e > 4 ? e : r.documentMode || i
            }(),
            b = function() {
                return {
                    html: r.documentElement,
                    body: r.body,
                    head: r.getElementsByTagName("head")[0],
                    title: r.title
                }
            },
            w = t.parent !== t.self,
            x = "data ready thumbnail loadstart loadfinish image play pause progress fullscreen_enter fullscreen_exit idle_enter idle_exit rescale lightbox_open lightbox_close lightbox_image",
            _ = function() {
                var t = [];
                return e.each(x.split(" "), function(e, n) {
                    t.push(n), /_/.test(n) && t.push(n.replace(/_/g, ""))
                }), t
            }(),
            T = function(t) {
                var n;
                return "object" != typeof t ? t : (e.each(t, function(i, r) {
                    /^[a-z]+_/.test(i) && (n = "", e.each(i.split("_"), function(e, t) {
                        n += e > 0 ? t.substr(0, 1).toUpperCase() + t.substr(1) : t
                    }), t[n] = r, delete t[i])
                }), t)
            },
            C = function(t) {
                return e.inArray(t, _) > -1 ? n[t.toUpperCase()] : t
            },
            k = {
                youtube: {
                    reg: /https?:\/\/(?:[a-zA_Z]{2,3}.)?(?:youtube\.com\/watch\?)((?:[\w\d\-\_\=]+&amp;(?:amp;)?)*v(?:&lt;[A-Z]+&gt;)?=([0-9a-zA-Z\-\_]+))/i,
                    embed: function() {
                        return "http://www.youtube.com/embed/" + this.id
                    },
                    getUrl: function() {
                        return p + "//gdata.youtube.com/feeds/api/videos/" + this.id + "?v=2&alt=json-in-script&callback=?"
                    },
                    get_thumb: function(e) {
                        return e.entry.media$group.media$thumbnail[2].url
                    },
                    get_image: function(e) {
                        return e.entry.yt$hd ? p + "//img.youtube.com/vi/" + this.id + "/maxresdefault.jpg" : e.entry.media$group.media$thumbnail[3].url
                    }
                },
                vimeo: {
                    reg: /https?:\/\/(?:www\.)?(vimeo\.com)\/(?:hd#)?([0-9]+)/i,
                    embed: function() {
                        return "http://player.vimeo.com/video/" + this.id
                    },
                    getUrl: function() {
                        return p + "//vimeo.com/api/v2/video/" + this.id + ".json?callback=?"
                    },
                    get_thumb: function(e) {
                        return e[0].thumbnail_medium
                    },
                    get_image: function(e) {
                        return e[0].thumbnail_large
                    }
                },
                dailymotion: {
                    reg: /https?:\/\/(?:www\.)?(dailymotion\.com)\/video\/([^_]+)/,
                    embed: function() {
                        return p + "//www.dailymotion.com/embed/video/" + this.id
                    },
                    getUrl: function() {
                        return "https://api.dailymotion.com/video/" + this.id + "?fields=thumbnail_240_url,thumbnail_720_url&callback=?"
                    },
                    get_thumb: function(e) {
                        return e.thumbnail_240_url
                    },
                    get_image: function(e) {
                        return e.thumbnail_720_url
                    }
                },
                _inst: []
            },
            S = function(t, n) {
                for (var i = 0; i < k._inst.length; i++)
                    if (k._inst[i].id === n && k._inst[i].type == t) return k._inst[i];
                this.type = t, this.id = n, this.readys = [], k._inst.push(this);
                var r = this;
                e.extend(this, k[t]), e.getJSON(this.getUrl(), function(t) {
                    r.data = t, e.each(r.readys, function(e, t) {
                        t(r.data)
                    }), r.readys = []
                }), this.getMedia = function(e, t, n) {
                    n = n || g;
                    var i = this,
                        r = function(n) {
                            t(i["get_" + e](n))
                        };
                    try {
                        i.data ? r(i.data) : i.readys.push(r)
                    } catch (o) {
                        n()
                    }
                }
            },
            E = function(e) {
                var t;
                for (var n in k)
                    if (t = e && k[n].reg && e.match(k[n].reg), t && t.length) return {
                        id: t[2],
                        provider: n
                    };
                return !1
            },
            F = {
                support: function() {
                    var e = b().html;
                    return !w && (e.requestFullscreen || e.mozRequestFullScreen || e.webkitRequestFullScreen)
                }(),
                callback: g,
                enter: function(e, t, n) {
                    this.instance = e, this.callback = t || g, n = n || b().html, n.requestFullscreen ? n.requestFullscreen() : n.mozRequestFullScreen ? n.mozRequestFullScreen() : n.webkitRequestFullScreen && n.webkitRequestFullScreen()
                },
                exit: function(e) {
                    this.callback = e || g, r.exitFullscreen ? r.exitFullscreen() : r.mozCancelFullScreen ? r.mozCancelFullScreen() : r.webkitCancelFullScreen && r.webkitCancelFullScreen()
                },
                instance: null,
                listen: function() {
                    if (this.support) {
                        var e = function() {
                            if (F.instance) {
                                var e = F.instance._fullscreen;
                                r.fullscreen || r.mozFullScreen || r.webkitIsFullScreen ? e._enter(F.callback) : e._exit(F.callback)
                            }
                        };
                        r.addEventListener("fullscreenchange", e, !1), r.addEventListener("mozfullscreenchange", e, !1), r.addEventListener("webkitfullscreenchange", e, !1)
                    }
                }
            },
            A = [],
            D = [],
            $ = !1,
            N = !1,
            L = [],
            M = function(t) {
                n.theme = t, e.each(L, function(e, t) {
                    t._initialized || t._init.call(t)
                }), L = []
            },
            j = function() {
                return {
                    clearTimer: function(t) {
                        e.each(n.get(), function() {
                            this.clearTimer(t)
                        })
                    },
                    addTimer: function(t) {
                        e.each(n.get(), function() {
                            this.addTimer(t)
                        })
                    },
                    array: function(e) {
                        return s.slice.call(e, 0)
                    },
                    create: function(e, t) {
                        t = t || "div";
                        var n = r.createElement(t);
                        return n.className = e, n
                    },
                    removeFromArray: function(t, n) {
                        return e.each(t, function(e, i) {
                            return i == n ? (t.splice(e, 1), !1) : void 0
                        }), t
                    },
                    getScriptPath: function(t) {
                        t = t || e("script:last").attr("src");
                        var n = t.split("/");
                        return 1 == n.length ? "" : (n.pop(), n.join("/") + "/")
                    },
                    animate: function() {
                        var i, o, a, s, u, l, c, h = function(e) {
                                var n, i = "transition WebkitTransition MozTransition OTransition".split(" ");
                                if (t.opera) return !1;
                                for (n = 0; i[n]; n++)
                                    if ("undefined" != typeof e[i[n]]) return i[n];
                                return !1
                            }((r.body || r.documentElement).style),
                            d = {
                                MozTransition: "transitionend",
                                OTransition: "oTransitionEnd",
                                WebkitTransition: "webkitTransitionEnd",
                                transition: "transitionend"
                            }[h],
                            f = {
                                _default: [.25, .1, .25, 1],
                                galleria: [.645, .045, .355, 1],
                                galleriaIn: [.55, .085, .68, .53],
                                galleriaOut: [.25, .46, .45, .94],
                                ease: [.25, 0, .25, 1],
                                linear: [.25, .25, .75, .75],
                                "ease-in": [.42, 0, 1, 1],
                                "ease-out": [0, 0, .58, 1],
                                "ease-in-out": [.42, 0, .58, 1]
                            },
                            p = function(t, n, i) {
                                var r = {};
                                i = i || "transition", e.each("webkit moz ms o".split(" "), function() {
                                    r["-" + this + "-" + i] = n
                                }), t.css(r)
                            },
                            m = function(e) {
                                p(e, "none", "transition"), n.WEBKIT && n.TOUCH && (p(e, "translate3d(0,0,0)", "transform"), e.data("revert") && (e.css(e.data("revert")), e.data("revert", null)))
                            };
                        return function(r, v, y) {
                            return y = e.extend({
                                duration: 400,
                                complete: g,
                                stop: !1
                            }, y), r = e(r), y.duration ? h ? (y.stop && (r.off(d), m(r)), i = !1, e.each(v, function(e, t) {
                                c = r.css(e), j.parseValue(c) != j.parseValue(t) && (i = !0), r.css(e, c)
                            }), i ? (o = [], a = y.easing in f ? f[y.easing] : f._default, s = " " + y.duration + "ms cubic-bezier(" + a.join(",") + ")", void t.setTimeout(function(t, i, r, a) {
                                return function() {
                                    t.one(i, function(e) {
                                        return function() {
                                            m(e), y.complete.call(e[0])
                                        }
                                    }(t)), n.WEBKIT && n.TOUCH && (u = {}, l = [0, 0, 0], e.each(["left", "top"], function(e, n) {
                                        n in r && (l[e] = j.parseValue(r[n]) - j.parseValue(t.css(n)) + "px", u[n] = r[n], delete r[n])
                                    }), (l[0] || l[1]) && (t.data("revert", u), o.push("-webkit-transform" + a), p(t, "translate3d(" + l.join(",") + ")", "transform"))), e.each(r, function(e) {
                                        o.push(e + a)
                                    }), p(t, o.join(",")), t.css(r)
                                }
                            }(r, d, v, s), 2)) : void t.setTimeout(function() {
                                y.complete.call(r[0])
                            }, y.duration)) : void r.animate(v, y) : (r.css(v), void y.complete.call(r[0]))
                        }
                    }(),
                    removeAlpha: function(e) {
                        if (e instanceof jQuery && (e = e[0]), 9 > y && e) {
                            var t = e.style,
                                n = e.currentStyle,
                                i = n && n.filter || t.filter || "";
                            /alpha/.test(i) && (t.filter = i.replace(/alpha\([^)]*\)/i, ""))
                        }
                    },
                    forceStyles: function(t, n) {
                        t = e(t), t.attr("style") && t.data("styles", t.attr("style")).removeAttr("style"), t.css(n)
                    },
                    revertStyles: function() {
                        e.each(j.array(arguments), function(t, n) {
                            n = e(n), n.removeAttr("style"), n.attr("style", ""), n.data("styles") && n.attr("style", n.data("styles")).data("styles", null)
                        })
                    },
                    moveOut: function(e) {
                        j.forceStyles(e, {
                            position: "absolute",
                            left: -1e4
                        })
                    },
                    moveIn: function() {
                        j.revertStyles.apply(j, j.array(arguments))
                    },
                    hide: function(t, n, i) {
                        i = i || g;
                        var r = e(t);
                        t = r[0], r.data("opacity") || r.data("opacity", r.css("opacity"));
                        var o = {
                            opacity: 0
                        };
                        if (n) {
                            var a = 9 > y && t ? function() {
                                j.removeAlpha(t), t.style.visibility = "hidden", i.call(t)
                            } : i;
                            j.animate(t, o, {
                                duration: n,
                                complete: a,
                                stop: !0
                            })
                        } else 9 > y && t ? (j.removeAlpha(t), t.style.visibility = "hidden") : r.css(o)
                    },
                    show: function(t, n, i) {
                        i = i || g;
                        var r = e(t);
                        t = r[0];
                        var o = parseFloat(r.data("opacity")) || 1,
                            a = {
                                opacity: o
                            };
                        if (n) {
                            9 > y && (r.css("opacity", 0), t.style.visibility = "visible");
                            var s = 9 > y && t ? function() {
                                1 == a.opacity && j.removeAlpha(t), i.call(t)
                            } : i;
                            j.animate(t, a, {
                                duration: n,
                                complete: s,
                                stop: !0
                            })
                        } else 9 > y && 1 == a.opacity && t ? (j.removeAlpha(t), t.style.visibility = "visible") : r.css(a)
                    },
                    wait: function(i) {
                        n._waiters = n._waiters || [], i = e.extend({
                            until: v,
                            success: g,
                            error: function() {
                                n.raise("Could not complete wait function.")
                            },
                            timeout: 3e3
                        }, i);
                        var r, o, a, s = j.timestamp(),
                            u = function() {
                                return o = j.timestamp(), r = o - s, j.removeFromArray(n._waiters, a), i.until(r) ? (i.success(), !1) : "number" == typeof i.timeout && o >= s + i.timeout ? (i.error(), !1) : void n._waiters.push(a = t.setTimeout(u, 10))
                            };
                        n._waiters.push(a = t.setTimeout(u, 10))
                    },
                    toggleQuality: function(e, t) {
                        7 !== y && 8 !== y || !e || "IMG" != e.nodeName.toUpperCase() || ("undefined" == typeof t && (t = "nearest-neighbor" === e.style.msInterpolationMode), e.style.msInterpolationMode = t ? "bicubic" : "nearest-neighbor")
                    },
                    insertStyleTag: function(t, n) {
                        if (!n || !e("#" + n).length) {
                            var i = r.createElement("style");
                            if (n && (i.id = n), b().head.appendChild(i), i.styleSheet) i.styleSheet.cssText = t;
                            else {
                                var o = r.createTextNode(t);
                                i.appendChild(o)
                            }
                        }
                    },
                    loadScript: function(t, n) {
                        var i = !1,
                            r = e("<script>").attr({
                                src: t,
                                async: !0
                            }).get(0);
                        r.onload = r.onreadystatechange = function() {
                            i || this.readyState && "loaded" !== this.readyState && "complete" !== this.readyState || (i = !0, r.onload = r.onreadystatechange = null, "function" == typeof n && n.call(this, this))
                        }, b().head.appendChild(r)
                    },
                    parseValue: function(e) {
                        if ("number" == typeof e) return e;
                        if ("string" == typeof e) {
                            var t = e.match(/\-?\d|\./g);
                            return t && t.constructor === Array ? 1 * t.join("") : 0
                        }
                        return 0
                    },
                    timestamp: function() {
                        return (new Date).getTime()
                    },
                    loadCSS: function(t, o, a) {
                        var s, u;
                        if (e("link[rel=stylesheet]").each(function() {
                                return new RegExp(t).test(this.href) ? (s = this, !1) : void 0
                            }), "function" == typeof o && (a = o, o = i), a = a || g, s) return a.call(s, s), s;
                        if (u = r.styleSheets.length, e("#" + o).length) e("#" + o).attr("href", t), u--;
                        else {
                            s = e("<link>").attr({
                                rel: "stylesheet",
                                href: t,
                                id: o
                            }).get(0);
                            var l = e('link[rel="stylesheet"], style');
                            if (l.length ? l.get(0).parentNode.insertBefore(s, l[0]) : b().head.appendChild(s), y && u >= 31) return void n.raise("You have reached the browser stylesheet limit (31)", !0)
                        }
                        if ("function" == typeof a) {
                            var c = e("<s>").attr("id", "galleria-loader").hide().appendTo(b().body);
                            j.wait({
                                until: function() {
                                    return 1 == c.height()
                                },
                                success: function() {
                                    c.remove(), a.call(s, s)
                                },
                                error: function() {
                                    c.remove(), n.raise("Theme CSS could not load after 20 sec. " + (n.QUIRK ? "Your browser is in Quirks Mode, please add a correct doctype." : "Please download the latest theme at http://galleria.io/customer/."), !0)
                                },
                                timeout: 5e3
                            })
                        }
                        return s
                    }
                }
            }(),
            P = function(t) {
                var n = ".galleria-videoicon{width:60px;height:60px;position:absolute;top:50%;left:50%;z-index:1;margin:-30px 0 0 -30px;cursor:pointer;background:#000;background:rgba(0,0,0,.8);border-radius:3px;-webkit-transition:all 150ms}.galleria-videoicon i{width:0px;height:0px;border-style:solid;border-width:10px 0 10px 16px;display:block;border-color:transparent transparent transparent #ffffff;margin:20px 0 0 22px}.galleria-image:hover .galleria-videoicon{background:#000}";
                return j.insertStyleTag(n, "galleria-videoicon"), e(j.create("galleria-videoicon")).html("<i></i>").appendTo(t).click(function() {
                    e(this).siblings("img").mouseup()
                })
            },
            I = function() {
                var t = function(t, n, i, r) {
                    var o = this.getOptions("easing"),
                        a = this.getStageWidth(),
                        s = {
                            left: a * (t.rewind ? -1 : 1)
                        },
                        u = {
                            left: 0
                        };
                    i ? (s.opacity = 0, u.opacity = 1) : s.opacity = 1, e(t.next).css(s), j.animate(t.next, u, {
                        duration: t.speed,
                        complete: function(e) {
                            return function() {
                                n(), e.css({
                                    left: 0
                                })
                            }
                        }(e(t.next).add(t.prev)),
                        queue: !1,
                        easing: o
                    }), r && (t.rewind = !t.rewind), t.prev && (s = {
                        left: 0
                    }, u = {
                        left: a * (t.rewind ? 1 : -1)
                    }, i && (s.opacity = 1, u.opacity = 0), e(t.prev).css(s), j.animate(t.prev, u, {
                        duration: t.speed,
                        queue: !1,
                        easing: o,
                        complete: function() {
                            e(this).css("opacity", 0)
                        }
                    }))
                };
                return {
                    active: !1,
                    init: function(e, t, n) {
                        I.effects.hasOwnProperty(e) && I.effects[e].call(this, t, n)
                    },
                    effects: {
                        fade: function(t, n) {
                            e(t.next).css({
                                opacity: 0,
                                left: 0
                            }), j.animate(t.next, {
                                opacity: 1
                            }, {
                                duration: t.speed,
                                complete: n
                            }), t.prev && (e(t.prev).css("opacity", 1).show(), j.animate(t.prev, {
                                opacity: 0
                            }, {
                                duration: t.speed
                            }))
                        },
                        flash: function(t, n) {
                            e(t.next).css({
                                opacity: 0,
                                left: 0
                            }), t.prev ? j.animate(t.prev, {
                                opacity: 0
                            }, {
                                duration: t.speed / 2,
                                complete: function() {
                                    j.animate(t.next, {
                                        opacity: 1
                                    }, {
                                        duration: t.speed,
                                        complete: n
                                    })
                                }
                            }) : j.animate(t.next, {
                                opacity: 1
                            }, {
                                duration: t.speed,
                                complete: n
                            })
                        },
                        pulse: function(t, n) {
                            t.prev && e(t.prev).hide(), e(t.next).css({
                                opacity: 0,
                                left: 0
                            }).show(), j.animate(t.next, {
                                opacity: 1
                            }, {
                                duration: t.speed,
                                complete: n
                            })
                        },
                        slide: function() {
                            t.apply(this, j.array(arguments))
                        },
                        fadeslide: function() {
                            t.apply(this, j.array(arguments).concat([!0]))
                        },
                        doorslide: function() {
                            t.apply(this, j.array(arguments).concat([!1, !0]))
                        }
                    }
                }
            }();
        F.listen(), e.event.special["click:fast"] = {
            propagate: !0,
            add: function(t) {
                this.propagate;
                n.TOUCH ? e(this).on("touchstart.fast", function(n) {
                    var i, r, o = n.originalEvent,
                        a = 0;
                    1 == o.touches.length && (i = o.touches[0].pageX, r = o.touches[0].pageY, e(this).on("touchmove.fast", function(e) {
                        var t = e.originalEvent.touches;
                        1 == t.length && (a = m.max(m.abs(i - t[0].pageX), m.abs(r - t[0].pageY)))
                    }), e(this).on("touchend.fast", function() {
                        return a > 4 ? e(this).off("touchend.fast touchmove.fast") : (t.handler.call(this, n), void e(this).off("touchend.fast touchmove.fast"))
                    }))
                }) : e(this).on("click.fast", t.handler)
            },
            remove: function(t) {
                n.TOUCH ? e(this).off("touchstart.fast touchmove.fast touchend.fast") : e(this).off("click.fast", t.handler)
            }
        }, a.on("orientationchange", function() {
            e(this).resize()
        }), n = function() {
            var s = this;
            this._options = {}, this._playing = !1, this._playtime = 5e3, this._active = null, this._queue = {
                length: 0
            }, this._data = [], this._dom = {}, this._thumbnails = [], this._layers = [], this._initialized = !1, this._firstrun = !1, this._stageWidth = 0, this._stageHeight = 0, this._target = i, this._binds = [], this._id = parseInt(1e4 * m.random(), 10);
            var u = "container stage images image-nav image-nav-left image-nav-right info info-text info-title info-description thumbnails thumbnails-list thumbnails-container thumb-nav-left thumb-nav-right loader counter tooltip",
                l = "current total";
            e.each(u.split(" "), function(e, t) {
                s._dom[t] = j.create("galleria-" + t)
            }), e.each(l.split(" "), function(e, t) {
                s._dom[t] = j.create("galleria-" + t, "span")
            });
            var c = this._keyboard = {
                    keys: {
                        UP: 38,
                        DOWN: 40,
                        LEFT: 37,
                        RIGHT: 39,
                        RETURN: 13,
                        ESCAPE: 27,
                        BACKSPACE: 8,
                        SPACE: 32
                    },
                    map: {},
                    bound: !1,
                    press: function(e) {
                        var t = e.keyCode || e.which;
                        t in c.map && "function" == typeof c.map[t] && c.map[t].call(s, e)
                    },
                    attach: function(e) {
                        var t, n;
                        for (t in e) e.hasOwnProperty(t) && (n = t.toUpperCase(), n in c.keys ? c.map[c.keys[n]] = e[t] : c.map[n] = e[t]);
                        c.bound || (c.bound = !0, o.on("keydown", c.press))
                    },
                    detach: function() {
                        c.bound = !1, c.map = {}, o.off("keydown", c.press)
                    }
                },
                h = this._controls = {
                    0: i,
                    1: i,
                    active: 0,
                    swap: function() {
                        h.active = h.active ? 0 : 1
                    },
                    getActive: function() {
                        return s._options.swipe ? h.slides[s._active] : h[h.active]
                    },
                    getNext: function() {
                        return s._options.swipe ? h.slides[s.getNext(s._active)] : h[1 - h.active]
                    },
                    slides: [],
                    frames: [],
                    layers: []
                },
                f = this._carousel = {
                    next: s.$("thumb-nav-right"),
                    prev: s.$("thumb-nav-left"),
                    width: 0,
                    current: 0,
                    max: 0,
                    hooks: [],
                    update: function() {
                        var t = 0,
                            n = 0,
                            i = [0];
                        e.each(s._thumbnails, function(r, o) {
                            if (o.ready) {
                                t += o.outerWidth || e(o.container).outerWidth(!0);
                                var a = e(o.container).width();
                                t += a - m.floor(a), i[r + 1] = t, n = m.max(n, o.outerHeight || e(o.container).outerHeight(!0))
                            }
                        }), s.$("thumbnails").css({
                            width: t,
                            height: n
                        }), f.max = t, f.hooks = i, f.width = s.$("thumbnails-list").width(), f.setClasses(), s.$("thumbnails-container").toggleClass("galleria-carousel", t > f.width), f.width = s.$("thumbnails-list").width()
                    },
                    bindControls: function() {
                        var e;
                        f.next.on("click:fast", function(t) {
                            if (t.preventDefault(), "auto" === s._options.carouselSteps) {
                                for (e = f.current; e < f.hooks.length; e++)
                                    if (f.hooks[e] - f.hooks[f.current] > f.width) {
                                        f.set(e - 2);
                                        break
                                    }
                            } else f.set(f.current + s._options.carouselSteps)
                        }), f.prev.on("click:fast", function(t) {
                            if (t.preventDefault(), "auto" === s._options.carouselSteps)
                                for (e = f.current; e >= 0; e--) {
                                    if (f.hooks[f.current] - f.hooks[e] > f.width) {
                                        f.set(e + 2);
                                        break
                                    }
                                    if (0 === e) {
                                        f.set(0);
                                        break
                                    }
                                } else f.set(f.current - s._options.carouselSteps)
                        })
                    },
                    set: function(e) {
                        for (e = m.max(e, 0); f.hooks[e - 1] + f.width >= f.max && e >= 0;) e--;
                        f.current = e, f.animate()
                    },
                    getLast: function(e) {
                        return (e || f.current) - 1
                    },
                    follow: function(e) {
                        if (0 === e || e === f.hooks.length - 2) return void f.set(e);
                        for (var t = f.current; f.hooks[t] - f.hooks[f.current] < f.width && t <= f.hooks.length;) t++;
                        e - 1 < f.current ? f.set(e - 1) : e + 2 > t && f.set(e - t + f.current + 2)
                    },
                    setClasses: function() {
                        f.prev.toggleClass("disabled", !f.current), f.next.toggleClass("disabled", f.hooks[f.current] + f.width >= f.max)
                    },
                    animate: function() {
                        f.setClasses();
                        var t = -1 * f.hooks[f.current];
                        isNaN(t) || (s.$("thumbnails").css("left", function() {
                            return e(this).css("left")
                        }), j.animate(s.get("thumbnails"), {
                            left: t
                        }, {
                            duration: s._options.carouselSpeed,
                            easing: s._options.easing,
                            queue: !1
                        }))
                    }
                },
                p = this._tooltip = {
                    initialized: !1,
                    open: !1,
                    timer: "tooltip" + s._id,
                    swapTimer: "swap" + s._id,
                    init: function() {
                        p.initialized = !0;
                        var e = ".galleria-tooltip{padding:3px 8px;max-width:50%;background:#ffe;color:#000;z-index:3;position:absolute;font-size:11px;line-height:1.3;opacity:0;box-shadow:0 0 2px rgba(0,0,0,.4);-moz-box-shadow:0 0 2px rgba(0,0,0,.4);-webkit-box-shadow:0 0 2px rgba(0,0,0,.4);}";
                        j.insertStyleTag(e, "galleria-tooltip"), s.$("tooltip").css({
                            opacity: .8,
                            visibility: "visible",
                            display: "none"
                        })
                    },
                    move: function(e) {
                        var t = s.getMousePosition(e).x,
                            n = s.getMousePosition(e).y,
                            i = s.$("tooltip"),
                            r = t,
                            o = n,
                            a = i.outerHeight(!0) + 1,
                            u = i.outerWidth(!0),
                            l = a + 15,
                            c = s.$("container").width() - u - 2,
                            h = s.$("container").height() - a - 2;
                        isNaN(r) || isNaN(o) || (r += 10, o -= a + 8, r = m.max(0, m.min(c, r)), o = m.max(0, m.min(h, o)), l > n && (o = l), i.css({
                            left: r,
                            top: o
                        }))
                    },
                    bind: function(t, i) {
                        if (!n.TOUCH) {
                            p.initialized || p.init();
                            var r = function() {
                                    s.$("container").off("mousemove", p.move), s.clearTimer(p.timer), s.$("tooltip").stop().animate({
                                        opacity: 0
                                    }, 200, function() {
                                        s.$("tooltip").hide(), s.addTimer(p.swapTimer, function() {
                                            p.open = !1
                                        }, 1e3)
                                    })
                                },
                                o = function(t, n) {
                                    p.define(t, n), e(t).hover(function() {
                                        s.clearTimer(p.swapTimer), s.$("container").off("mousemove", p.move).on("mousemove", p.move).trigger("mousemove"), p.show(t), s.addTimer(p.timer, function() {
                                            s.$("tooltip").stop().show().animate({
                                                opacity: 1
                                            }), p.open = !0
                                        }, p.open ? 0 : 500)
                                    }, r).click(r)
                                };
                            "string" == typeof i ? o(t in s._dom ? s.get(t) : t, i) : e.each(t, function(e, t) {
                                o(s.get(e), t)
                            })
                        }
                    },
                    show: function(n) {
                        n = e(n in s._dom ? s.get(n) : n);
                        var i = n.data("tt"),
                            r = function(e) {
                                t.setTimeout(function(e) {
                                    return function() {
                                        p.move(e)
                                    }
                                }(e), 10), n.off("mouseup", r)
                            };
                        i = "function" == typeof i ? i() : i, i && (s.$("tooltip").html(i.replace(/\s/, "&#160;")), n.on("mouseup", r))
                    },
                    define: function(t, n) {
                        if ("function" != typeof n) {
                            var i = n;
                            n = function() {
                                return i
                            }
                        }
                        t = e(t in s._dom ? s.get(t) : t).data("tt", n), p.show(t)
                    }
                },
                g = this._fullscreen = {
                    scrolled: 0,
                    crop: i,
                    active: !1,
                    prev: e(),
                    beforeEnter: function(e) {
                        e()
                    },
                    beforeExit: function(e) {
                        e()
                    },
                    keymap: s._keyboard.map,
                    parseCallback: function(t, n) {
                        return I.active ? function() {
                            "function" == typeof t && t.call(s);
                            var i = s._controls.getActive(),
                                r = s._controls.getNext();
                            s._scaleImage(r), s._scaleImage(i), n && s._options.trueFullscreen && e(i.container).add(r.container).trigger("transitionend")
                        } : t
                    },
                    enter: function(e) {
                        g.beforeEnter(function() {
                            e = g.parseCallback(e, !0), s._options.trueFullscreen && F.support ? (g.active = !0, j.forceStyles(s.get("container"), {
                                width: "100%",
                                height: "100%"
                            }), s.rescale(), n.MAC ? n.SAFARI && /version\/[1-5]/.test(d) ? (s.$("stage").css("opacity", 0), t.setTimeout(function() {
                                g.scale(), s.$("stage").css("opacity", 1)
                            }, 4)) : (s.$("container").css("opacity", 0).addClass("fullscreen"), t.setTimeout(function() {
                                g.scale(), s.$("container").css("opacity", 1)
                            }, 50)) : s.$("container").addClass("fullscreen"), a.resize(g.scale), F.enter(s, e, s.get("container"))) : (g.scrolled = a.scrollTop(), n.TOUCH || t.scrollTo(0, 0), g._enter(e))
                        })
                    },
                    _enter: function(o) {
                        g.active = !0, w && (g.iframe = function() {
                            var i, o = r.referrer,
                                a = r.createElement("a"),
                                s = t.location;
                            return a.href = o, a.protocol != s.protocol || a.hostname != s.hostname || a.port != s.port ? (n.raise("Parent fullscreen not available. Iframe protocol, domains and ports must match."), !1) : (g.pd = t.parent.document, e(g.pd).find("iframe").each(function() {
                                var e = this.contentDocument || this.contentWindow.document;
                                return e === r ? (i = this, !1) : void 0
                            }), i)
                        }()), j.hide(s.getActiveImage()), w && g.iframe && (g.iframe.scrolled = e(t.parent).scrollTop(), t.parent.scrollTo(0, 0));
                        var u = s.getData(),
                            l = s._options,
                            c = !s._options.trueFullscreen || !F.support,
                            h = {
                                height: "100%",
                                overflow: "hidden",
                                margin: 0,
                                padding: 0
                            };
                        if (c && (s.$("container").addClass("fullscreen"), g.prev = s.$("container").prev(), g.prev.length || (g.parent = s.$("container").parent()), s.$("container").appendTo("body"), j.forceStyles(s.get("container"), {
                                position: n.TOUCH ? "absolute" : "fixed",
                                top: 0,
                                left: 0,
                                width: "100%",
                                height: "100%",
                                zIndex: 1e4
                            }), j.forceStyles(b().html, h), j.forceStyles(b().body, h)), w && g.iframe && (j.forceStyles(g.pd.documentElement, h), j.forceStyles(g.pd.body, h), j.forceStyles(g.iframe, e.extend(h, {
                                width: "100%",
                                height: "100%",
                                top: 0,
                                left: 0,
                                position: "fixed",
                                zIndex: 1e4,
                                border: "none"
                            }))), g.keymap = e.extend({}, s._keyboard.map), s.attachKeyboard({
                                escape: s.exitFullscreen,
                                right: s.next,
                                left: s.prev
                            }), g.crop = l.imageCrop, l.fullscreenCrop != i && (l.imageCrop = l.fullscreenCrop), u && u.big && u.image !== u.big) {
                            var d = new n.Picture,
                                f = d.isCached(u.big),
                                p = s.getIndex(),
                                m = s._thumbnails[p];
                            s.trigger({
                                type: n.LOADSTART,
                                cached: f,
                                rewind: !1,
                                index: p,
                                imageTarget: s.getActiveImage(),
                                thumbTarget: m,
                                galleriaData: u
                            }), d.load(u.big, function(t) {
                                s._scaleImage(t, {
                                    complete: function(t) {
                                        s.trigger({
                                            type: n.LOADFINISH,
                                            cached: f,
                                            index: p,
                                            rewind: !1,
                                            imageTarget: t.image,
                                            thumbTarget: m
                                        });
                                        var i = s._controls.getActive().image;
                                        i && e(i).width(t.image.width).height(t.image.height).attr("style", e(t.image).attr("style")).attr("src", t.image.src)
                                    }
                                })
                            });
                            var v = s.getNext(p),
                                y = new n.Picture,
                                x = s.getData(v);
                            y.preload(s.isFullscreen() && x.big ? x.big : x.image)
                        }
                        s.rescale(function() {
                            s.addTimer(!1, function() {
                                c && j.show(s.getActiveImage()), "function" == typeof o && o.call(s), s.rescale()
                            }, 100), s.trigger(n.FULLSCREEN_ENTER)
                        }), c ? a.resize(g.scale) : j.show(s.getActiveImage())
                    },
                    scale: function() {
                        s.rescale()
                    },
                    exit: function(e) {
                        g.beforeExit(function() {
                            e = g.parseCallback(e), s._options.trueFullscreen && F.support ? F.exit(e) : g._exit(e)
                        })
                    },
                    _exit: function(e) {
                        g.active = !1;
                        var i = !s._options.trueFullscreen || !F.support,
                            r = s.$("container").removeClass("fullscreen");
                        if (g.parent ? g.parent.prepend(r) : r.insertAfter(g.prev), i) {
                            j.hide(s.getActiveImage()), j.revertStyles(s.get("container"), b().html, b().body), n.TOUCH || t.scrollTo(0, g.scrolled);
                            var o = s._controls.frames[s._controls.active];
                            o && o.image && (o.image.src = o.image.src)
                        }
                        w && g.iframe && (j.revertStyles(g.pd.documentElement, g.pd.body, g.iframe), g.iframe.scrolled && t.parent.scrollTo(0, g.iframe.scrolled)), s.detachKeyboard(), s.attachKeyboard(g.keymap), s._options.imageCrop = g.crop;
                        var u = s.getData().big,
                            l = s._controls.getActive().image;
                        !s.getData().iframe && l && u && u == l.src && t.setTimeout(function(e) {
                            return function() {
                                l.src = e
                            }
                        }(s.getData().image), 1), s.rescale(function() {
                            s.addTimer(!1, function() {
                                i && j.show(s.getActiveImage()), "function" == typeof e && e.call(s), a.trigger("resize")
                            }, 50), s.trigger(n.FULLSCREEN_EXIT)
                        }), a.off("resize", g.scale)
                    }
                },
                v = this._idle = {
                    trunk: [],
                    bound: !1,
                    active: !1,
                    add: function(t, i, r, o) {
                        if (t && !n.TOUCH) {
                            v.bound || v.addEvent(), t = e(t), "boolean" == typeof r && (o = r, r = {}), r = r || {};
                            var a, s = {};
                            for (a in i) i.hasOwnProperty(a) && (s[a] = t.css(a));
                            t.data("idle", {
                                from: e.extend(s, r),
                                to: i,
                                complete: !0,
                                busy: !1
                            }), o ? t.css(i) : v.addTimer(), v.trunk.push(t)
                        }
                    },
                    remove: function(t) {
                        t = e(t), e.each(v.trunk, function(e, n) {
                            n && n.length && !n.not(t).length && (t.css(t.data("idle").from), v.trunk.splice(e, 1))
                        }), v.trunk.length || (v.removeEvent(), s.clearTimer(v.timer))
                    },
                    addEvent: function() {
                        v.bound = !0, s.$("container").on("mousemove click", v.showAll), "hover" == s._options.idleMode && s.$("container").on("mouseleave", v.hide)
                    },
                    removeEvent: function() {
                        v.bound = !1, s.$("container").on("mousemove click", v.showAll), "hover" == s._options.idleMode && s.$("container").off("mouseleave", v.hide)
                    },
                    addTimer: function() {
                        "hover" != s._options.idleMode && s.addTimer("idle", function() {
                            v.hide()
                        }, s._options.idleTime)
                    },
                    hide: function() {
                        if (s._options.idleMode && s.getIndex() !== !1) {
                            s.trigger(n.IDLE_ENTER);
                            var t = v.trunk.length;
                            e.each(v.trunk, function(e, n) {
                                var i = n.data("idle");
                                i && (n.data("idle").complete = !1, j.animate(n, i.to, {
                                    duration: s._options.idleSpeed,
                                    complete: function() {
                                        e == t - 1 && (v.active = !1)
                                    }
                                }))
                            })
                        }
                    },
                    showAll: function() {
                        s.clearTimer("idle"), e.each(v.trunk, function(e, t) {
                            v.show(t)
                        })
                    },
                    show: function(t) {
                        var i = t.data("idle");
                        v.active && (i.busy || i.complete) || (i.busy = !0, s.trigger(n.IDLE_EXIT), s.clearTimer("idle"), j.animate(t, i.from, {
                            duration: s._options.idleSpeed / 2,
                            complete: function() {
                                v.active = !0, e(t).data("idle").busy = !1, e(t).data("idle").complete = !0
                            }
                        })), v.addTimer()
                    }
                },
                x = this._lightbox = {
                    width: 0,
                    height: 0,
                    initialized: !1,
                    active: null,
                    image: null,
                    elems: {},
                    keymap: !1,
                    init: function() {
                        if (!x.initialized) {
                            x.initialized = !0;
                            var t = "overlay box content shadow title info close prevholder prev nextholder next counter image",
                                i = {},
                                r = s._options,
                                o = "",
                                a = "position:absolute;",
                                u = "lightbox-",
                                l = {
                                    overlay: "position:fixed;display:none;opacity:" + r.overlayOpacity + ";filter:alpha(opacity=" + 100 * r.overlayOpacity + ");top:0;left:0;width:100%;height:100%;background:" + r.overlayBackground + ";z-index:99990",
                                    box: "position:fixed;display:none;width:400px;height:400px;top:50%;left:50%;margin-top:-200px;margin-left:-200px;z-index:99991",
                                    shadow: a + "background:#000;width:100%;height:100%;",
                                    content: a + "background-color:#fff;top:10px;left:10px;right:10px;bottom:10px;overflow:hidden",
                                    info: a + "bottom:10px;left:10px;right:10px;color:#444;font:11px/13px arial,sans-serif;height:13px",
                                    close: a + "top:10px;right:10px;height:20px;width:20px;background:#fff;text-align:center;cursor:pointer;color:#444;font:16px/22px arial,sans-serif;z-index:99999",
                                    image: a + "top:10px;left:10px;right:10px;bottom:30px;overflow:hidden;display:block;",
                                    prevholder: a + "width:50%;top:0;bottom:40px;cursor:pointer;",
                                    nextholder: a + "width:50%;top:0;bottom:40px;right:-1px;cursor:pointer;",
                                    prev: a + "top:50%;margin-top:-20px;height:40px;width:30px;background:#fff;left:20px;display:none;text-align:center;color:#000;font:bold 16px/36px arial,sans-serif",
                                    next: a + "top:50%;margin-top:-20px;height:40px;width:30px;background:#fff;right:20px;left:auto;display:none;font:bold 16px/36px arial,sans-serif;text-align:center;color:#000",
                                    title: "float:left",
                                    counter: "float:right;margin-left:8px;"
                                },
                                c = function(t) {
                                    return t.hover(function() {
                                        e(this).css("color", "#bbb")
                                    }, function() {
                                        e(this).css("color", "#444")
                                    })
                                },
                                h = {},
                                d = "";
                            d = y > 7 ? 9 > y ? "background:#000;filter:alpha(opacity=0);" : "background:rgba(0,0,0,0);" : "z-index:99999", l.nextholder += d, l.prevholder += d, e.each(l, function(e, t) {
                                o += ".galleria-" + u + e + "{" + t + "}"
                            }), o += ".galleria-" + u + "box.iframe .galleria-" + u + "prevholder,.galleria-" + u + "box.iframe .galleria-" + u + "nextholder{width:100px;height:100px;top:50%;margin-top:-70px}", j.insertStyleTag(o, "galleria-lightbox"), e.each(t.split(" "), function(e, t) {
                                s.addElement("lightbox-" + t), i[t] = x.elems[t] = s.get("lightbox-" + t)
                            }), x.image = new n.Picture, e.each({
                                box: "shadow content close prevholder nextholder",
                                info: "title counter",
                                content: "info image",
                                prevholder: "prev",
                                nextholder: "next"
                            }, function(t, n) {
                                var i = [];
                                e.each(n.split(" "), function(e, t) {
                                    i.push(u + t)
                                }), h[u + t] = i
                            }), s.append(h), e(i.image).append(x.image.container), e(b().body).append(i.overlay, i.box), c(e(i.close).on("click:fast", x.hide).html("&#215;")), e.each(["Prev", "Next"], function(t, r) {
                                var o = e(i[r.toLowerCase()]).html(/v/.test(r) ? "&#8249;&#160;" : "&#160;&#8250;"),
                                    a = e(i[r.toLowerCase() + "holder"]);
                                return a.on("click:fast", function() {
                                    x["show" + r]()
                                }), 8 > y || n.TOUCH ? void o.show() : void a.hover(function() {
                                    o.show()
                                }, function() {
                                    o.stop().fadeOut(200)
                                })
                            }), e(i.overlay).on("click:fast", x.hide), n.IPAD && (s._options.lightboxTransitionSpeed = 0)
                        }
                    },
                    rescale: function(t) {
                        var i = m.min(a.width() - 40, x.width),
                            r = m.min(a.height() - 60, x.height),
                            o = m.min(i / x.width, r / x.height),
                            u = m.round(x.width * o) + 40,
                            l = m.round(x.height * o) + 60,
                            c = {
                                width: u,
                                height: l,
                                "margin-top": -1 * m.ceil(l / 2),
                                "margin-left": -1 * m.ceil(u / 2)
                            };
                        t ? e(x.elems.box).css(c) : e(x.elems.box).animate(c, {
                            duration: s._options.lightboxTransitionSpeed,
                            easing: s._options.easing,
                            complete: function() {
                                var t = x.image,
                                    i = s._options.lightboxFadeSpeed;
                                s.trigger({
                                    type: n.LIGHTBOX_IMAGE,
                                    imageTarget: t.image
                                }), e(t.container).show(), e(t.image).animate({
                                    opacity: 1
                                }, i), j.show(x.elems.info, i)
                            }
                        })
                    },
                    hide: function() {
                        x.image.image = null, a.off("resize", x.rescale), e(x.elems.box).hide().find("iframe").remove(), j.hide(x.elems.info), s.detachKeyboard(), s.attachKeyboard(x.keymap), x.keymap = !1, j.hide(x.elems.overlay, 200, function() {
                            e(this).hide().css("opacity", s._options.overlayOpacity), s.trigger(n.LIGHTBOX_CLOSE)
                        })
                    },
                    showNext: function() {
                        x.show(s.getNext(x.active))
                    },
                    showPrev: function() {
                        x.show(s.getPrev(x.active))
                    },
                    show: function(i) {
                        x.active = i = "number" == typeof i ? i : s.getIndex() || 0, x.initialized || x.init(), s.trigger(n.LIGHTBOX_OPEN), x.keymap || (x.keymap = e.extend({}, s._keyboard.map), s.attachKeyboard({
                            escape: x.hide,
                            right: x.showNext,
                            left: x.showPrev
                        })), a.off("resize", x.rescale);
                        var r, o, u, l = s.getData(i),
                            c = s.getDataLength(),
                            h = s.getNext(i);
                        j.hide(x.elems.info);
                        try {
                            for (u = s._options.preload; u > 0; u--) o = new n.Picture, r = s.getData(h), o.preload(r.big ? r.big : r.image), h = s.getNext(h)
                        } catch (d) {}
                        x.image.isIframe = l.iframe && !l.image, e(x.elems.box).toggleClass("iframe", x.image.isIframe), e(x.image.container).find(".galleria-videoicon").remove(), x.image.load(l.big || l.image || l.iframe, function(n) {
                            if (n.isIframe) {
                                var r = e(t).width(),
                                    o = e(t).height();
                                if (n.video && s._options.maxVideoSize) {
                                    var u = m.min(s._options.maxVideoSize / r, s._options.maxVideoSize / o);
                                    1 > u && (r *= u, o *= u)
                                }
                                x.width = r, x.height = o
                            } else x.width = n.original.width, x.height = n.original.height;
                            if (e(n.image).css({
                                    width: n.isIframe ? "100%" : "100.1%",
                                    height: n.isIframe ? "100%" : "100.1%",
                                    top: 0,
                                    bottom: 0,
                                    zIndex: 99998,
                                    opacity: 0,
                                    visibility: "visible"
                                }).parent().height("100%"), x.elems.title.innerHTML = l.title || "", x.elems.counter.innerHTML = i + 1 + " / " + c, a.resize(x.rescale), x.rescale(), l.image && l.iframe) {
                                if (e(x.elems.box).addClass("iframe"), l.video) {
                                    var h = P(n.container).hide();
                                    t.setTimeout(function() {
                                        h.fadeIn(200)
                                    }, 200)
                                }
                                e(n.image).css("cursor", "pointer").mouseup(function(t, n) {
                                    return function(i) {
                                        e(x.image.container).find(".galleria-videoicon").remove(), i.preventDefault(), n.isIframe = !0, n.load(t.iframe + (t.video ? "&autoplay=1" : ""), {
                                            width: "100%",
                                            height: 8 > y ? e(x.image.container).height() : "100%"
                                        })
                                    }
                                }(l, n))
                            }
                        }), e(x.elems.overlay).show().css("visibility", "visible"), e(x.elems.box).show()
                    }
                },
                _ = this._timer = {
                    trunk: {},
                    add: function(e, n, i, r) {
                        if (e = e || (new Date).getTime(), r = r || !1, this.clear(e), r) {
                            var o = n;
                            n = function() {
                                o(), _.add(e, n, i)
                            }
                        }
                        this.trunk[e] = t.setTimeout(n, i)
                    },
                    clear: function(e) {
                        var n, i = function(e) {
                            t.clearTimeout(this.trunk[e]), delete this.trunk[e]
                        };
                        if (e && e in this.trunk) i.call(this, e);
                        else if ("undefined" == typeof e)
                            for (n in this.trunk) this.trunk.hasOwnProperty(n) && i.call(this, n)
                    }
                };
            return this
        }, n.prototype = {
            constructor: n,
            init: function(t, r) {
                return r = T(r), this._original = {
                    target: t,
                    options: r,
                    data: null
                }, this._target = this._dom.target = t.nodeName ? t : e(t).get(0), this._original.html = this._target.innerHTML, D.push(this), this._target ? (this._options = {
                    autoplay: !1,
                    carousel: !0,
                    carouselFollow: !0,
                    carouselSpeed: 400,
                    carouselSteps: "auto",
                    clicknext: !1,
                    dailymotion: {
                        foreground: "%23EEEEEE",
                        highlight: "%235BCEC5",
                        background: "%23222222",
                        logo: 0,
                        hideInfos: 1
                    },
                    dataConfig: function() {
                        return {}
                    },
                    dataSelector: "img",
                    dataSort: !1,
                    dataSource: this._target,
                    debug: i,
                    dummy: i,
                    easing: "galleria",
                    extend: function() {},
                    fullscreenCrop: i,
                    fullscreenDoubleTap: !0,
                    fullscreenTransition: i,
                    height: 0,
                    idleMode: !0,
                    idleTime: 3e3,
                    idleSpeed: 200,
                    imageCrop: !1,
                    imageMargin: 0,
                    imagePan: !1,
                    imagePanSmoothness: 12,
                    imagePosition: "50%",
                    imageTimeout: i,
                    initialTransition: i,
                    keepSource: !1,
                    layerFollow: !0,
                    lightbox: !1,
                    lightboxFadeSpeed: 200,
                    lightboxTransitionSpeed: 200,
                    linkSourceImages: !0,
                    maxScaleRatio: i,
                    maxVideoSize: i,
                    minScaleRatio: i,
                    overlayOpacity: .85,
                    overlayBackground: "#0b0b0b",
                    pauseOnInteraction: !0,
                    popupLinks: !1,
                    preload: 2,
                    queue: !0,
                    responsive: !0,
                    show: 0,
                    showInfo: !0,
                    showCounter: !0,
                    showImagenav: !0,
                    swipe: "auto",
                    thumbCrop: !0,
                    thumbEventType: "click:fast",
                    thumbMargin: 0,
                    thumbQuality: "auto",
                    thumbDisplayOrder: !0,
                    thumbPosition: "50%",
                    thumbnails: !0,
                    touchTransition: i,
                    transition: "fade",
                    transitionInitial: i,
                    transitionSpeed: 400,
                    trueFullscreen: !0,
                    useCanvas: !1,
                    variation: "",
                    videoPoster: !0,
                    vimeo: {
                        title: 0,
                        byline: 0,
                        portrait: 0,
                        color: "aaaaaa"
                    },
                    wait: 5e3,
                    width: "auto",
                    youtube: {
                        modestbranding: 1,
                        autohide: 1,
                        color: "white",
                        hd: 1,
                        rel: 0,
                        showinfo: 0
                    }
                }, this._options.initialTransition = this._options.initialTransition || this._options.transitionInitial, r && r.debug === !1 && (l = !1), r && "number" == typeof r.imageTimeout && (c = r.imageTimeout), r && "string" == typeof r.dummy && (h = r.dummy), e(this._target).children().hide(), n.QUIRK && n.raise("Your page is in Quirks mode, Galleria may not render correctly. Please validate your HTML and add a correct doctype."), "object" == typeof n.theme ? this._init() : L.push(this), this) : void n.raise("Target not found", !0)
            },
            _init: function() {
                var o = this,
                    s = this._options;
                if (this._initialized) return n.raise("Init failed: Gallery instance already initialized."), this;
                if (this._initialized = !0, !n.theme) return n.raise("Init failed: No theme found.", !0), this;
                if (e.extend(!0, s, n.theme.defaults, this._original.options, n.configure.options), s.swipe = function(e) {
                        return "enforced" == e ? !0 : e === !1 || "disabled" == e ? !1 : !!n.TOUCH
                    }(s.swipe), s.swipe && (s.clicknext = !1, s.imagePan = !1), function(e) {
                        return "getContext" in e ? void(N = N || {
                            elem: e,
                            context: e.getContext("2d"),
                            cache: {},
                            length: 0
                        }) : void(e = null)
                    }(r.createElement("canvas")), this.bind(n.DATA, function() {
                        t.screen && t.screen.width && Array.prototype.forEach && this._data.forEach(function(e) {
                            var n = "devicePixelRatio" in t ? t.devicePixelRatio : 1,
                                i = m.max(t.screen.width, t.screen.height);
                            1024 > i * n && (e.big = e.image)
                        }), this._original.data = this._data, this.get("total").innerHTML = this.getDataLength();
                        var e = this.$("container");
                        o._options.height < 2 && (o._userRatio = o._ratio = o._options.height);
                        var i = {
                                width: 0,
                                height: 0
                            },
                            r = function() {
                                return o.$("stage").height()
                            };
                        j.wait({
                            until: function() {
                                return i = o._getWH(), e.width(i.width).height(i.height), r() && i.width && i.height > 50
                            },
                            success: function() {
                                o._width = i.width, o._height = i.height, o._ratio = o._ratio || i.height / i.width, n.WEBKIT ? t.setTimeout(function() {
                                    o._run()
                                }, 1) : o._run()
                            },
                            error: function() {
                                r() ? n.raise("Could not extract sufficient width/height of the gallery container. Traced measures: width:" + i.width + "px, height: " + i.height + "px.", !0) : n.raise("Could not extract a stage height from the CSS. Traced height: " + r() + "px.", !0)
                            },
                            timeout: "number" == typeof this._options.wait ? this._options.wait : !1
                        })
                    }), this.append({
                        "info-text": ["info-title", "info-description"],
                        info: ["info-text"],
                        "image-nav": ["image-nav-right", "image-nav-left"],
                        stage: ["images", "loader", "counter", "image-nav"],
                        "thumbnails-list": ["thumbnails"],
                        "thumbnails-container": ["thumb-nav-left", "thumbnails-list", "thumb-nav-right"],
                        container: ["stage", "thumbnails-container", "info", "tooltip"]
                    }), j.hide(this.$("counter").append(this.get("current"), r.createTextNode(" / "), this.get("total"))), this.setCounter("&#8211;"), j.hide(o.get("tooltip")), this.$("container").addClass((n.TOUCH ? "touch" : "notouch") + " " + this._options.variation), this._options.swipe || e.each(new Array(2), function(t) {
                        var i = new n.Picture;
                        e(i.container).css({
                            position: "absolute",
                            top: 0,
                            left: 0
                        }).prepend(o._layers[t] = e(j.create("galleria-layer")).css({
                            position: "absolute",
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            zIndex: 2
                        })[0]), o.$("images").append(i.container), o._controls[t] = i;
                        var r = new n.Picture;
                        r.isIframe = !0, e(r.container).attr("class", "galleria-frame").css({
                            position: "absolute",
                            top: 0,
                            left: 0,
                            zIndex: 4,
                            background: "#000",
                            display: "none"
                        }).appendTo(i.container), o._controls.frames[t] = r
                    }), this.$("images").css({
                        position: "relative",
                        top: 0,
                        left: 0,
                        width: "100%",
                        height: "100%"
                    }), s.swipe && (this.$("images").css({
                        position: "absolute",
                        top: 0,
                        left: 0,
                        width: 0,
                        height: "100%"
                    }), this.finger = new n.Finger(this.get("stage"), {
                        onchange: function(e) {
                            o.pause().show(e)
                        },
                        oncomplete: function(t) {
                            var n = m.max(0, m.min(parseInt(t, 10), o.getDataLength() - 1)),
                                i = o.getData(n);
                            e(o._thumbnails[n].container).addClass("active").siblings(".active").removeClass("active"), i && (o.$("images").find("iframe").remove(), o.$("images").find(".galleria-frame").css("opacity", 0).hide(), o._options.carousel && o._options.carouselFollow && o._carousel.follow(n))
                        }
                    }), this.bind(n.RESCALE, function() {
                        this.finger.setup()
                    }), this.$("stage").on("click", function() {
                        var n = o.getData();
                        if (n) {
                            if (n.iframe) {
                                o.isPlaying() && o.pause();
                                var r = o._controls.frames[o._active],
                                    a = o._stageWidth,
                                    s = o._stageHeight;
                                if (e(r.container).find("iframe").length) return;
                                return e(r.container).css({
                                    width: a,
                                    height: s,
                                    opacity: 0
                                }).show().animate({
                                    opacity: 1
                                }, 200), void t.setTimeout(function() {
                                    r.load(n.iframe + (n.video ? "&autoplay=1" : ""), {
                                        width: a,
                                        height: s
                                    }, function(e) {
                                        o.$("container").addClass("videoplay"), e.scale({
                                            width: o._stageWidth,
                                            height: o._stageHeight,
                                            iframelimit: n.video ? o._options.maxVideoSize : i
                                        })
                                    })
                                }, 100)
                            }
                            if (n.link)
                                if (o._options.popupLinks) {
                                    t.open(n.link, "_blank")
                                } else t.location.href = n.link;
                            else;
                        }
                    }), this.bind(n.IMAGE, function(t) {
                        o.setCounter(t.index), o.setInfo(t.index);
                        var n = this.getNext(),
                            i = this.getPrev(),
                            r = [i, n];
                        r.push(this.getNext(n), this.getPrev(i), o._controls.slides.length - 1);
                        var a = [];
                        e.each(r, function(t, n) {
                            -1 == e.inArray(n, a) && a.push(n)
                        }), e.each(a, function(t, n) {
                            var i = o.getData(n),
                                r = o._controls.slides[n],
                                a = o.isFullscreen() && i.big ? i.big : i.image || i.iframe;
                            i.iframe && !i.image && (r.isIframe = !0), r.ready || o._controls.slides[n].load(a, function(t) {
                                t.isIframe || e(t.image).css("visibility", "hidden"), o._scaleImage(t, {
                                    complete: function(t) {
                                        t.isIframe || e(t.image).css({
                                            opacity: 0,
                                            visibility: "visible"
                                        }).animate({
                                            opacity: 1
                                        }, 200)
                                    }
                                })
                            })
                        })
                    })), this.$("thumbnails, thumbnails-list").css({
                        overflow: "hidden",
                        position: "relative"
                    }), this.$("image-nav-right, image-nav-left").on("click:fast", function() {
                        s.pauseOnInteraction && o.pause();
                        var e = /right/.test(this.className) ? "next" : "prev";
                        o[e]()
                    }).on("click", function(e) {
                        e.preventDefault(), (s.clicknext || s.swipe) && e.stopPropagation()
                    }), e.each(["info", "counter", "image-nav"], function(e, t) {
                        s["show" + t.substr(0, 1).toUpperCase() + t.substr(1).replace(/-/, "")] === !1 && j.moveOut(o.get(t.toLowerCase()))
                    }), this.load(), s.keepSource || y || (this._target.innerHTML = ""), this.get("errors") && this.appendChild("target", "errors"), this.appendChild("target", "container"), s.carousel) {
                    var u = 0,
                        l = s.show;
                    this.bind(n.THUMBNAIL, function() {
                        this.updateCarousel(), ++u == this.getDataLength() && "number" == typeof l && l > 0 && this._carousel.follow(l)
                    })
                }
                return s.responsive && a.on("resize", function() {
                    o.isFullscreen() || o.resize()
                }), s.fullscreenDoubleTap && this.$("stage").on("touchstart", function() {
                    var e, t, n, i, r, a, s = function(e) {
                        return e.originalEvent.touches ? e.originalEvent.touches[0] : e
                    };
                    return o.$("stage").on("touchmove", function() {
                            e = 0
                        }),
                        function(u) {
                            if (!/(-left|-right)/.test(u.target.className)) {
                                if (a = j.timestamp(), t = s(u).pageX, n = s(u).pageY, u.originalEvent.touches.length < 2 && 300 > a - e && 20 > t - i && 20 > n - r) return o.toggleFullscreen(), void u.preventDefault();
                                e = a, i = t, r = n
                            }
                        }
                }()), e.each(n.on.binds, function(t, n) {
                    -1 == e.inArray(n.hash, o._binds) && o.bind(n.type, n.callback)
                }), this
            },
            addTimer: function() {
                return this._timer.add.apply(this._timer, j.array(arguments)), this
            },
            clearTimer: function() {
                return this._timer.clear.apply(this._timer, j.array(arguments)), this
            },
            _getWH: function() {
                var t, n = this.$("container"),
                    i = this.$("target"),
                    r = this,
                    o = {};
                return e.each(["width", "height"], function(e, a) {
                    r._options[a] && "number" == typeof r._options[a] ? o[a] = r._options[a] : (t = [j.parseValue(n.css(a)), j.parseValue(i.css(a)), n[a](), i[a]()], r["_" + a] || t.splice(t.length, j.parseValue(n.css("min-" + a)), j.parseValue(i.css("min-" + a))), o[a] = m.max.apply(m, t))
                }), r._userRatio && (o.height = o.width * r._userRatio), o
            },
            _createThumbnails: function(i) {
                this.get("total").innerHTML = this.getDataLength();
                var o, a, s, u, l = this,
                    c = this._options,
                    h = i ? this._data.length - i.length : 0,
                    d = h,
                    f = [],
                    p = 0,
                    m = 8 > y ? "http://upload.wikimedia.org/wikipedia/commons/c/c0/Blank.gif" : "data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw%3D%3D",
                    g = function() {
                        var e = l.$("thumbnails").find(".active");
                        return e.length ? e.find("img").attr("src") : !1
                    }(),
                    v = "string" == typeof c.thumbnails ? c.thumbnails.toLowerCase() : null,
                    b = function(e) {
                        return r.defaultView && r.defaultView.getComputedStyle ? r.defaultView.getComputedStyle(a.container, null)[e] : u.css(e)
                    },
                    w = function(t, i, r) {
                        return function() {
                            e(r).append(t), l.trigger({
                                type: n.THUMBNAIL,
                                thumbTarget: t,
                                index: i,
                                galleriaData: l.getData(i)
                            })
                        }
                    },
                    x = function(t) {
                        c.pauseOnInteraction && l.pause();
                        var n = e(t.currentTarget).data("index");
                        l.getIndex() !== n && l.show(n), t.preventDefault()
                    },
                    _ = function(t, i) {
                        e(t.container).css("visibility", "visible"), l.trigger({
                            type: n.THUMBNAIL,
                            thumbTarget: t.image,
                            index: t.data.order,
                            galleriaData: l.getData(t.data.order)
                        }), "function" == typeof i && i.call(l, t)
                    },
                    T = function(t, n) {
                        t.scale({
                            width: t.data.width,
                            height: t.data.height,
                            crop: c.thumbCrop,
                            margin: c.thumbMargin,
                            canvas: c.useCanvas,
                            position: c.thumbPosition,
                            complete: function(t) {
                                {
                                    var i, r, o = ["left", "top"],
                                        a = ["Width", "Height"];
                                    l.getData(t.index)
                                }
                                e.each(a, function(n, a) {
                                    i = a.toLowerCase(), (c.thumbCrop !== !0 || c.thumbCrop === i) && (r = {}, r[i] = t[i], e(t.container).css(r), r = {}, r[o[n]] = 0, e(t.image).css(r)), t["outer" + a] = e(t.container)["outer" + a](!0)
                                }), j.toggleQuality(t.image, c.thumbQuality === !0 || "auto" === c.thumbQuality && t.original.width < 3 * t.width), c.thumbDisplayOrder && !t.lazy ? e.each(f, function(e, t) {
                                    return e === p && t.ready && !t.displayed ? (p++, t.displayed = !0, void _(t, n)) : void 0
                                }) : _(t, n)
                            }
                        })
                    };
                for (i || (this._thumbnails = [], this.$("thumbnails").empty()); this._data[h]; h++) s = this._data[h], o = s.thumb || s.image, c.thumbnails !== !0 && "lazy" != v || !s.thumb && !s.image ? s.iframe || "empty" === v || "numbers" === v ? (a = {
                    container: j.create("galleria-image"),
                    image: j.create("img", "span"),
                    ready: !0,
                    data: {
                        order: h
                    }
                }, "numbers" === v && e(a.image).text(h + 1), s.iframe && e(a.image).addClass("iframe"), this.$("thumbnails").append(a.container), t.setTimeout(w(a.image, h, a.container), 50 + 20 * h)) : a = {
                    container: null,
                    image: null
                } : (a = new n.Picture(h), a.index = h, a.displayed = !1, a.lazy = !1, a.video = !1, this.$("thumbnails").append(a.container), u = e(a.container), u.css("visibility", "hidden"), a.data = {
                    width: j.parseValue(b("width")),
                    height: j.parseValue(b("height")),
                    order: h,
                    src: o
                }, u.css(c.thumbCrop !== !0 ? {
                    width: "auto",
                    height: "auto"
                } : {
                    width: a.data.width,
                    height: a.data.height
                }), "lazy" == v ? (u.addClass("lazy"), a.lazy = !0, a.load(m, {
                    height: a.data.height,
                    width: a.data.width
                })) : a.load(o, T), "all" === c.preload && a.preload(s.image)), e(a.container).add(c.keepSource && c.linkSourceImages ? s.original : null).data("index", h).on(c.thumbEventType, x).data("thumbload", T), g === o && e(a.container).addClass("active"), this._thumbnails.push(a);
                return f = this._thumbnails.slice(d), this
            },
            lazyLoad: function(t, n) {
                var i = t.constructor == Array ? t : [t],
                    r = this,
                    o = 0;
                return e.each(i, function(t, a) {
                    if (!(a > r._thumbnails.length - 1)) {
                        var s = r._thumbnails[a],
                            u = s.data,
                            l = function() {
                                ++o == i.length && "function" == typeof n && n.call(r)
                            },
                            c = e(s.container).data("thumbload");
                        s.video ? c.call(r, s, l) : s.load(u.src, function(e) {
                            c.call(r, e, l)
                        })
                    }
                }), this
            },
            lazyLoadChunks: function(e, n) {
                var i = this.getDataLength(),
                    r = 0,
                    o = 0,
                    a = [],
                    s = [],
                    u = this;
                for (n = n || 0; i > r; r++) s.push(r), (++o == e || r == i - 1) && (a.push(s), o = 0, s = []);
                var l = function(e) {
                    var i = a.shift();
                    i && t.setTimeout(function() {
                        u.lazyLoad(i, function() {
                            l(!0)
                        })
                    }, n && e ? n : 0)
                };
                return l(!1), this
            },
            _run: function() {
                var r = this;
                r._createThumbnails(), j.wait({
                    timeout: 1e4,
                    until: function() {
                        return n.OPERA && r.$("stage").css("display", "inline-block"), r._stageWidth = r.$("stage").width(), r._stageHeight = r.$("stage").height(), r._stageWidth && r._stageHeight > 50
                    },
                    success: function() {
                        if (A.push(r), r._options.swipe) {
                            var o = r.$("images").width(r.getDataLength() * r._stageWidth);
                            e.each(new Array(r.getDataLength()), function(t) {
                                var i = new n.Picture,
                                    a = r.getData(t);
                                e(i.container).css({
                                    position: "absolute",
                                    top: 0,
                                    left: r._stageWidth * t
                                }).prepend(r._layers[t] = e(j.create("galleria-layer")).css({
                                    position: "absolute",
                                    top: 0,
                                    left: 0,
                                    right: 0,
                                    bottom: 0,
                                    zIndex: 2
                                })[0]).appendTo(o), a.video && P(i.container), r._controls.slides.push(i);
                                var s = new n.Picture;
                                s.isIframe = !0, e(s.container).attr("class", "galleria-frame").css({
                                    position: "absolute",
                                    top: 0,
                                    left: 0,
                                    zIndex: 4,
                                    background: "#000",
                                    display: "none"
                                }).appendTo(i.container), r._controls.frames.push(s)
                            }), r.finger.setup()
                        }
                        return j.show(r.get("counter")), r._options.carousel && r._carousel.bindControls(), r._options.autoplay && (r.pause(), "number" == typeof r._options.autoplay && (r._playtime = r._options.autoplay), r._playing = !0), r._firstrun ? (r._options.autoplay && r.trigger(n.PLAY), void("number" == typeof r._options.show && r.show(r._options.show))) : (r._firstrun = !0, n.History && n.History.change(function(e) {
                            isNaN(e) ? t.history.go(-1) : r.show(e, i, !0)
                        }), r.trigger(n.READY), n.theme.init.call(r, r._options), e.each(n.ready.callbacks, function(e, t) {
                            "function" == typeof t && t.call(r, r._options)
                        }), r._options.extend.call(r, r._options), /^[0-9]{1,4}$/.test(f) && n.History ? r.show(f, i, !0) : r._data[r._options.show] && r.show(r._options.show), void(r._options.autoplay && r.trigger(n.PLAY)))
                    },
                    error: function() {
                        n.raise("Stage width or height is too small to show the gallery. Traced measures: width:" + r._stageWidth + "px, height: " + r._stageHeight + "px.", !0)
                    }
                })
            },
            load: function(t, i, r) {
                var o = this,
                    a = this._options;
                return this._data = [], this._thumbnails = [], this.$("thumbnails").empty(), "function" == typeof i && (r = i, i = null), t = t || a.dataSource, i = i || a.dataSelector, r = r || a.dataConfig, e.isPlainObject(t) && (t = [t]), e.isArray(t) ? this.validate(t) ? this._data = t : n.raise("Load failed: JSON Array not valid.") : (i += ",.video,.iframe", e(t).find(i).each(function(t, n) {
                    n = e(n);
                    var i = {},
                        a = n.parent(),
                        s = a.attr("href"),
                        u = a.attr("rel");
                    s && ("IMG" == n[0].nodeName || n.hasClass("video")) && E(s) ? i.video = s : s && n.hasClass("iframe") ? i.iframe = s : i.image = i.big = s, u && (i.big = u), e.each("big title description link layer image".split(" "), function(e, t) {
                        n.data(t) && (i[t] = n.data(t).toString())
                    }), i.big || (i.big = i.image), o._data.push(e.extend({
                        title: n.attr("title") || "",
                        thumb: n.attr("src"),
                        image: n.attr("src"),
                        big: n.attr("src"),
                        description: n.attr("alt") || "",
                        link: n.attr("longdesc"),
                        original: n.get(0)
                    }, i, r(n)))
                })), "function" == typeof a.dataSort ? s.sort.call(this._data, a.dataSort) : "random" == a.dataSort && this._data.sort(function() {
                    return m.round(m.random()) - .5
                }), this.getDataLength() && this._parseData(function() {
                    this.trigger(n.DATA)
                }), this
            },
            _parseData: function(t) {
                var n, r = this,
                    o = !1,
                    a = function() {
                        var n = !0;
                        e.each(r._data, function(e, t) {
                            return t.loading ? (n = !1, !1) : void 0
                        }), n && !o && (o = !0, t.call(r))
                    };
                return e.each(this._data, function(t, o) {
                    if (n = r._data[t], "thumb" in o == !1 && (n.thumb = o.image), o.big || (n.big = o.image), "video" in o) {
                        var s = E(o.video);
                        s && (n.iframe = new S(s.provider, s.id).embed() + function() {
                            if ("object" == typeof r._options[s.provider]) {
                                var t = "?",
                                    n = [];
                                return e.each(r._options[s.provider], function(e, t) {
                                    n.push(e + "=" + t)
                                }), "youtube" == s.provider && (n = ["wmode=opaque"].concat(n)), t + n.join("&")
                            }
                            return ""
                        }(), n.thumb && n.image || e.each(["thumb", "image"], function(e, t) {
                            if ("image" == t && !r._options.videoPoster) return void(n.image = i);
                            var o = new S(s.provider, s.id);
                            n[t] || (n.loading = !0, o.getMedia(t, function(e, t) {
                                return function(n) {
                                    e[t] = n, "image" != t || e.big || (e.big = e.image), delete e.loading, a()
                                }
                            }(n, t)))
                        }))
                    }
                }), a(), this
            },
            destroy: function() {
                return this.$("target").data("galleria", null), this.$("container").off("galleria"), this.get("target").innerHTML = this._original.html, this.clearTimer(), j.removeFromArray(D, this), j.removeFromArray(A, this), n._waiters.length && e.each(n._waiters, function(e, n) {
                    n && t.clearTimeout(n)
                }), this
            },
            splice: function() {
                var e = this,
                    n = j.array(arguments);
                return t.setTimeout(function() {
                    s.splice.apply(e._data, n), e._parseData(function() {
                        e._createThumbnails()
                    })
                }, 2), e
            },
            push: function() {
                var e = this,
                    n = j.array(arguments);
                return 1 == n.length && n[0].constructor == Array && (n = n[0]), t.setTimeout(function() {
                    s.push.apply(e._data, n), e._parseData(function() {
                        e._createThumbnails(n)
                    })
                }, 2), e
            },
            _getActive: function() {
                return this._controls.getActive()
            },
            validate: function() {
                return !0
            },
            bind: function(e, t) {
                return e = C(e), this.$("container").on(e, this.proxy(t)), this
            },
            unbind: function(e) {
                return e = C(e), this.$("container").off(e), this
            },
            trigger: function(t) {
                return t = "object" == typeof t ? e.extend(t, {
                    scope: this
                }) : {
                    type: C(t),
                    scope: this
                }, this.$("container").trigger(t), this
            },
            addIdleState: function() {
                return this._idle.add.apply(this._idle, j.array(arguments)), this
            },
            removeIdleState: function() {
                return this._idle.remove.apply(this._idle, j.array(arguments)), this
            },
            enterIdleMode: function() {
                return this._idle.hide(), this
            },
            exitIdleMode: function() {
                return this._idle.showAll(), this
            },
            enterFullscreen: function() {
                return this._fullscreen.enter.apply(this, j.array(arguments)), this
            },
            exitFullscreen: function() {
                return this._fullscreen.exit.apply(this, j.array(arguments)), this
            },
            toggleFullscreen: function() {
                return this._fullscreen[this.isFullscreen() ? "exit" : "enter"].apply(this, j.array(arguments)), this
            },
            bindTooltip: function() {
                return this._tooltip.bind.apply(this._tooltip, j.array(arguments)), this
            },
            defineTooltip: function() {
                return this._tooltip.define.apply(this._tooltip, j.array(arguments)), this
            },
            refreshTooltip: function() {
                return this._tooltip.show.apply(this._tooltip, j.array(arguments)), this
            },
            openLightbox: function() {
                return this._lightbox.show.apply(this._lightbox, j.array(arguments)), this
            },
            closeLightbox: function() {
                return this._lightbox.hide.apply(this._lightbox, j.array(arguments)), this
            },
            hasVariation: function(t) {
                return e.inArray(t, this._options.variation.split(/\s+/)) > -1
            },
            getActiveImage: function() {
                var e = this._getActive();
                return e ? e.image : i
            },
            getActiveThumb: function() {
                return this._thumbnails[this._active].image || i
            },
            getMousePosition: function(e) {
                return {
                    x: e.pageX - this.$("container").offset().left,
                    y: e.pageY - this.$("container").offset().top
                }
            },
            addPan: function(t) {
                if (this._options.imageCrop !== !1) {
                    t = e(t || this.getActiveImage());
                    var n = this,
                        i = t.width() / 2,
                        r = t.height() / 2,
                        o = parseInt(t.css("left"), 10),
                        a = parseInt(t.css("top"), 10),
                        s = o || 0,
                        u = a || 0,
                        l = 0,
                        c = 0,
                        h = !1,
                        d = j.timestamp(),
                        f = 0,
                        p = 0,
                        g = function(e, n, i) {
                            if (e > 0 && (p = m.round(m.max(-1 * e, m.min(0, n))), f !== p))
                                if (f = p, 8 === y) t.parent()["scroll" + i](-1 * p);
                                else {
                                    var r = {};
                                    r[i.toLowerCase()] = p, t.css(r)
                                }
                        },
                        v = function(e) {
                            j.timestamp() - d < 50 || (h = !0, i = n.getMousePosition(e).x, r = n.getMousePosition(e).y)
                        },
                        b = function() {
                            h && (l = t.width() - n._stageWidth, c = t.height() - n._stageHeight, o = i / n._stageWidth * l * -1, a = r / n._stageHeight * c * -1, s += (o - s) / n._options.imagePanSmoothness, u += (a - u) / n._options.imagePanSmoothness, g(c, u, "Top"), g(l, s, "Left"))
                        };
                    return 8 === y && (t.parent().scrollTop(-1 * u).scrollLeft(-1 * s), t.css({
                        top: 0,
                        left: 0
                    })), this.$("stage").off("mousemove", v).on("mousemove", v), this.addTimer("pan" + n._id, b, 50, !0), this
                }
            },
            proxy: function(e, t) {
                return "function" != typeof e ? g : (t = t || this, function() {
                    return e.apply(t, j.array(arguments))
                })
            },
            removePan: function() {
                return this.$("stage").off("mousemove"), this.clearTimer("pan" + this._id), this
            },
            addElement: function() {
                var t = this._dom;
                return e.each(j.array(arguments), function(e, n) {
                    t[n] = j.create("galleria-" + n)
                }), this
            },
            attachKeyboard: function() {
                return this._keyboard.attach.apply(this._keyboard, j.array(arguments)), this
            },
            detachKeyboard: function() {
                return this._keyboard.detach.apply(this._keyboard, j.array(arguments)), this
            },
            appendChild: function(e, t) {
                return this.$(e).append(this.get(t) || t), this
            },
            prependChild: function(e, t) {
                return this.$(e).prepend(this.get(t) || t), this
            },
            remove: function() {
                return this.$(j.array(arguments).join(",")).remove(), this
            },
            append: function(e) {
                var t, n;
                for (t in e)
                    if (e.hasOwnProperty(t))
                        if (e[t].constructor === Array)
                            for (n = 0; e[t][n]; n++) this.appendChild(t, e[t][n]);
                        else this.appendChild(t, e[t]);
                return this
            },
            _scaleImage: function(t, n) {
                if (t = t || this._controls.getActive()) {
                    var i, r = function(t) {
                        e(t.container).children(":first").css({
                            top: m.max(0, j.parseValue(t.image.style.top)),
                            left: m.max(0, j.parseValue(t.image.style.left)),
                            width: j.parseValue(t.image.width),
                            height: j.parseValue(t.image.height)
                        })
                    };
                    return n = e.extend({
                        width: this._stageWidth,
                        height: this._stageHeight,
                        crop: this._options.imageCrop,
                        max: this._options.maxScaleRatio,
                        min: this._options.minScaleRatio,
                        margin: this._options.imageMargin,
                        position: this._options.imagePosition,
                        iframelimit: this._options.maxVideoSize
                    }, n), this._options.layerFollow && this._options.imageCrop !== !0 ? "function" == typeof n.complete ? (i = n.complete, n.complete = function() {
                        i.call(t, t), r(t)
                    }) : n.complete = r : e(t.container).children(":first").css({
                        top: 0,
                        left: 0
                    }), t.scale(n), this
                }
            },
            updateCarousel: function() {
                return this._carousel.update(), this
            },
            resize: function(t, n) {
                "function" == typeof t && (n = t, t = i), t = e.extend({
                    width: 0,
                    height: 0
                }, t);
                var r = this,
                    o = this.$("container");
                return e.each(t, function(e, n) {
                    n || (o[e]("auto"), t[e] = r._getWH()[e])
                }), e.each(t, function(e, t) {
                    o[e](t)
                }), this.rescale(n)
            },
            rescale: function(t, r, o) {
                var a = this;
                "function" == typeof t && (o = t, t = i);
                var s = function() {
                    a._stageWidth = t || a.$("stage").width(), a._stageHeight = r || a.$("stage").height(), a._options.swipe ? (e.each(a._controls.slides, function(t, n) {
                        a._scaleImage(n), e(n.container).css("left", a._stageWidth * t)
                    }), a.$("images").css("width", a._stageWidth * a.getDataLength())) : a._scaleImage(), a._options.carousel && a.updateCarousel();
                    var i = a._controls.frames[a._controls.active];
                    i && a._controls.frames[a._controls.active].scale({
                        width: a._stageWidth,
                        height: a._stageHeight,
                        iframelimit: a._options.maxVideoSize
                    }), a.trigger(n.RESCALE), "function" == typeof o && o.call(a)
                };
                return s.call(a), this
            },
            refreshImage: function() {
                return this._scaleImage(), this._options.imagePan && this.addPan(), this
            },
            _preload: function() {
                if (this._options.preload) {
                    var e, t, i, r = this.getNext();
                    try {
                        for (t = this._options.preload; t > 0; t--) e = new n.Picture, i = this.getData(r), e.preload(this.isFullscreen() && i.big ? i.big : i.image), r = this.getNext(r)
                    } catch (o) {}
                }
            },
            show: function(i, r, o) {
                var a = this._options.swipe;
                if (a || !(this._queue.length > 3 || i === !1 || !this._options.queue && this._queue.stalled)) {
                    if (i = m.max(0, m.min(parseInt(i, 10), this.getDataLength() - 1)), r = "undefined" != typeof r ? !!r : i < this.getIndex(), o = o || !1, !o && n.History) return void n.History.set(i.toString());
                    if (this.finger && i !== this._active && (this.finger.to = -(i * this.finger.width), this.finger.index = i), this._active = i, a) {
                        var u = this.getData(i),
                            l = this;
                        if (!u) return;
                        var c = this.isFullscreen() && u.big ? u.big : u.image || u.iframe,
                            h = this._controls.slides[i],
                            d = h.isCached(c),
                            f = this._thumbnails[i],
                            p = {
                                cached: d,
                                index: i,
                                rewind: r,
                                imageTarget: h.image,
                                thumbTarget: f.image,
                                galleriaData: u
                            };
                        this.trigger(e.extend(p, {
                            type: n.LOADSTART
                        })), l.$("container").removeClass("videoplay");
                        var g = function() {
                            l._layers[i].innerHTML = l.getData().layer || "", l.trigger(e.extend(p, {
                                type: n.LOADFINISH
                            })), l._playCheck()
                        };
                        l._preload(), t.setTimeout(function() {
                            h.ready && e(h.image).attr("src") == c ? (l.trigger(e.extend(p, {
                                type: n.IMAGE
                            })), g()) : (u.iframe && !u.image && (h.isIframe = !0), h.load(c, function(t) {
                                l._scaleImage(t, g).trigger(e.extend(p, {
                                    type: n.IMAGE
                                })), g()
                            }))
                        }, 100)
                    } else s.push.call(this._queue, {
                        index: i,
                        rewind: r
                    }), this._queue.stalled || this._show();
                    return this
                }
            },
            _show: function() {
                var r = this,
                    o = this._queue[0],
                    a = this.getData(o.index);
                if (a) {
                    var u = this.isFullscreen() && a.big ? a.big : a.image || a.iframe,
                        l = this._controls.getActive(),
                        c = this._controls.getNext(),
                        h = c.isCached(u),
                        d = this._thumbnails[o.index],
                        f = function() {
                            e(c.image).trigger("mouseup")
                        };
                    r.$("container").toggleClass("iframe", !!a.isIframe).removeClass("videoplay");
                    var p = function(o, a, u, l, c) {
                        return function() {
                            var h;
                            I.active = !1, j.toggleQuality(a.image, r._options.imageQuality), r._layers[r._controls.active].innerHTML = "", e(u.container).css({
                                zIndex: 0,
                                opacity: 0
                            }).show(), e(u.container).find("iframe, .galleria-videoicon").remove(), e(r._controls.frames[r._controls.active].container).hide(), e(a.container).css({
                                zIndex: 1,
                                left: 0,
                                top: 0
                            }).show(), r._controls.swap(), r._options.imagePan && r.addPan(a.image), (o.iframe && o.image || o.link || r._options.lightbox || r._options.clicknext) && e(a.image).css({
                                cursor: "pointer"
                            }).on("mouseup", function(a) {
                                if (!("number" == typeof a.which && a.which > 1)) {
                                    if (o.iframe) {
                                        r.isPlaying() && r.pause();
                                        var s = r._controls.frames[r._controls.active],
                                            u = r._stageWidth,
                                            l = r._stageHeight;
                                        return e(s.container).css({
                                            width: u,
                                            height: l,
                                            opacity: 0
                                        }).show().animate({
                                            opacity: 1
                                        }, 200), void t.setTimeout(function() {
                                            s.load(o.iframe + (o.video ? "&autoplay=1" : ""), {
                                                width: u,
                                                height: l
                                            }, function(e) {
                                                r.$("container").addClass("videoplay"), e.scale({
                                                    width: r._stageWidth,
                                                    height: r._stageHeight,
                                                    iframelimit: o.video ? r._options.maxVideoSize : i
                                                })
                                            })
                                        }, 100)
                                    }
                                    return r._options.clicknext && !n.TOUCH ? (r._options.pauseOnInteraction && r.pause(), void r.next()) : o.link ? void(r._options.popupLinks ? h = t.open(o.link, "_blank") : t.location.href = o.link) : void(r._options.lightbox && r.openLightbox())
                                }
                            }), r._playCheck(), r.trigger({
                                type: n.IMAGE,
                                index: l.index,
                                imageTarget: a.image,
                                thumbTarget: c.image,
                                galleriaData: o
                            }), s.shift.call(r._queue), r._queue.stalled = !1, r._queue.length && r._show()
                        }
                    }(a, c, l, o, d);
                    this._options.carousel && this._options.carouselFollow && this._carousel.follow(o.index), r._preload(), j.show(c.container), c.isIframe = a.iframe && !a.image, e(r._thumbnails[o.index].container).addClass("active").siblings(".active").removeClass("active"), r.trigger({
                        type: n.LOADSTART,
                        cached: h,
                        index: o.index,
                        rewind: o.rewind,
                        imageTarget: c.image,
                        thumbTarget: d.image,
                        galleriaData: a
                    }), r._queue.stalled = !0, c.load(u, function(t) {
                        var s = e(r._layers[1 - r._controls.active]).html(a.layer || "").hide();
                        r._scaleImage(t, {
                            complete: function(t) {
                                "image" in l && j.toggleQuality(l.image, !1), j.toggleQuality(t.image, !1), r.removePan(), r.setInfo(o.index), r.setCounter(o.index), a.layer && (s.show(), (a.iframe && a.image || a.link || r._options.lightbox || r._options.clicknext) && s.css("cursor", "pointer").off("mouseup").mouseup(f)), a.video && a.image && P(t.container);
                                var u = r._options.transition;
                                if (e.each({
                                        initial: null === l.image,
                                        touch: n.TOUCH,
                                        fullscreen: r.isFullscreen()
                                    }, function(e, t) {
                                        return t && r._options[e + "Transition"] !== i ? (u = r._options[e + "Transition"], !1) : void 0
                                    }), u in I.effects == !1) p();
                                else {
                                    var c = {
                                        prev: l.container,
                                        next: t.container,
                                        rewind: o.rewind,
                                        speed: r._options.transitionSpeed || 400
                                    };
                                    I.active = !0, I.init.call(r, u, c, p)
                                }
                                r.trigger({
                                    type: n.LOADFINISH,
                                    cached: h,
                                    index: o.index,
                                    rewind: o.rewind,
                                    imageTarget: t.image,
                                    thumbTarget: r._thumbnails[o.index].image,
                                    galleriaData: r.getData(o.index)
                                })
                            }
                        })
                    })
                }
            },
            getNext: function(e) {
                return e = "number" == typeof e ? e : this.getIndex(), e === this.getDataLength() - 1 ? 0 : e + 1
            },
            getPrev: function(e) {
                return e = "number" == typeof e ? e : this.getIndex(), 0 === e ? this.getDataLength() - 1 : e - 1
            },
            next: function() {
                return this.getDataLength() > 1 && this.show(this.getNext(), !1), this
            },
            prev: function() {
                return this.getDataLength() > 1 && this.show(this.getPrev(), !0), this
            },
            get: function(e) {
                return e in this._dom ? this._dom[e] : null
            },
            getData: function(e) {
                return e in this._data ? this._data[e] : this._data[this._active]
            },
            getDataLength: function() {
                return this._data.length
            },
            getIndex: function() {
                return "number" == typeof this._active ? this._active : !1
            },
            getStageHeight: function() {
                return this._stageHeight
            },
            getStageWidth: function() {
                return this._stageWidth
            },
            getOptions: function(e) {
                return "undefined" == typeof e ? this._options : this._options[e]
            },
            setOptions: function(t, n) {
                return "object" == typeof t ? e.extend(this._options, t) : this._options[t] = n, this
            },
            play: function(e) {
                return this._playing = !0, this._playtime = e || this._playtime, this._playCheck(), this.trigger(n.PLAY), this
            },
            pause: function() {
                return this._playing = !1, this.trigger(n.PAUSE), this
            },
            playToggle: function(e) {
                return this._playing ? this.pause() : this.play(e)
            },
            isPlaying: function() {
                return this._playing
            },
            isFullscreen: function() {
                return this._fullscreen.active
            },
            _playCheck: function() {
                var e = this,
                    t = 0,
                    i = 20,
                    r = j.timestamp(),
                    o = "play" + this._id;
                if (this._playing) {
                    this.clearTimer(o);
                    var a = function() {
                        return t = j.timestamp() - r, t >= e._playtime && e._playing ? (e.clearTimer(o), void e.next()) : void(e._playing && (e.trigger({
                            type: n.PROGRESS,
                            percent: m.ceil(t / e._playtime * 100),
                            seconds: m.floor(t / 1e3),
                            milliseconds: t
                        }), e.addTimer(o, a, i)))
                    };
                    e.addTimer(o, a, i)
                }
            },
            setPlaytime: function(e) {
                return this._playtime = e, this
            },
            setIndex: function(e) {
                return this._active = e, this
            },
            setCounter: function(e) {
                if ("number" == typeof e ? e++ : "undefined" == typeof e && (e = this.getIndex() + 1), this.get("current").innerHTML = e, y) {
                    var t = this.$("counter"),
                        n = t.css("opacity");
                    1 === parseInt(n, 10) ? j.removeAlpha(t[0]) : this.$("counter").css("opacity", n)
                }
                return this
            },
            setInfo: function(t) {
                var n = this,
                    i = this.getData(t);
                return e.each(["title", "description"], function(e, t) {
                    var r = n.$("info-" + t);
                    i[t] ? r[i[t].length ? "show" : "hide"]().html(i[t]) : r.empty().hide()
                }), this
            },
            hasInfo: function(e) {
                var t, n = "title description".split(" ");
                for (t = 0; n[t]; t++)
                    if (this.getData(e)[n[t]]) return !0;
                return !1
            },
            jQuery: function(t) {
                var n = this,
                    i = [];
                e.each(t.split(","), function(t, r) {
                    r = e.trim(r), n.get(r) && i.push(r)
                });
                var r = e(n.get(i.shift()));
                return e.each(i, function(e, t) {
                    r = r.add(n.get(t))
                }), r
            },
            $: function() {
                return this.jQuery.apply(this, j.array(arguments))
            }
        }, e.each(_, function(e, t) {
            var i = /_/.test(t) ? t.replace(/_/g, "") : t;
            n[t.toUpperCase()] = "galleria." + i
        }), e.extend(n, {
            IE9: 9 === y,
            IE8: 8 === y,
            IE7: 7 === y,
            IE6: 6 === y,
            IE: y,
            WEBKIT: /webkit/.test(d),
            CHROME: /chrome/.test(d),
            SAFARI: /safari/.test(d) && !/chrome/.test(d),
            QUIRK: y && r.compatMode && "BackCompat" === r.compatMode,
            MAC: /mac/.test(navigator.platform.toLowerCase()),
            OPERA: !!t.opera,
            IPHONE: /iphone/.test(d),
            IPAD: /ipad/.test(d),
            ANDROID: /android/.test(d),
            TOUCH: "ontouchstart" in r
        }), n.addTheme = function(i) {
            i.name || n.raise("No theme name specified"), i.defaults = "object" != typeof i.defaults ? {} : T(i.defaults);
            var r, o = !1;
            return "string" == typeof i.css ? (e("link").each(function(e, t) {
                return r = new RegExp(i.css), r.test(t.href) ? (o = !0, M(i), !1) : void 0
            }), o || e(function() {
                var a = 0,
                    s = function() {
                        e("script").each(function(e, n) {
                            r = new RegExp("galleria\\." + i.name.toLowerCase() + "\\."), r.test(n.src) && (o = n.src.replace(/[^\/]*$/, "") + i.css, t.setTimeout(function() {
                                j.loadCSS(o, "galleria-theme", function() {
                                    M(i)
                                })
                            }, 1))
                        }), o || (a++ > 5 ? n.raise("No theme CSS loaded") : t.setTimeout(s, 500))
                    };
                s()
            })) : M(i), i
        }, n.loadTheme = function(i) {
            if (!e("script").filter(function() {
                    return e(this).attr("src") == i
                }).length) {
                var r, o = !1;
                return e(t).load(function() {
                    o || (r = t.setTimeout(function() {
                        o || n.theme || n.raise("Galleria had problems loading theme at " + i + ". Please check theme path or load manually.", !0)
                    }, 2e4))
                }), n.unloadTheme(), j.loadScript(i, function() {
                    o = !0, t.clearTimeout(r)
                }), n
            }
        }, n.unloadTheme = function() {
            return "object" == typeof n.theme && (e("script").each(function(t, i) {
                new RegExp("galleria\\." + n.theme.name + "\\.").test(i.src) && e(i).remove()
            }), n.theme = i), n
        }, n.get = function(e) {
            return D[e] ? D[e] : "number" != typeof e ? D : void n.raise("Gallery index " + e + " not found")
        }, n.configure = function(t, i) {
            var r = {};
            return "string" == typeof t && i ? (r[t] = i, t = r) : e.extend(r, t), n.configure.options = r, e.each(n.get(), function(e, t) {
                t.setOptions(r)
            }), n
        }, n.configure.options = {}, n.on = function(t, i) {
            if (t) {
                i = i || g;
                var r = t + i.toString().replace(/\s/g, "") + j.timestamp();
                return e.each(n.get(), function(e, n) {
                    n._binds.push(r), n.bind(t, i)
                }), n.on.binds.push({
                    type: t,
                    callback: i,
                    hash: r
                }), n
            }
        }, n.on.binds = [], n.run = function(t, i) {
            return e.isFunction(i) && (i = {
                extend: i
            }), e(t || "#galleria").galleria(i), n
        }, n.addTransition = function(e, t) {
            return I.effects[e] = t, n
        }, n.utils = j, n.log = function() {
            var n = j.array(arguments);
            if (!("console" in t && "log" in t.console)) return t.alert(n.join("<br>"));
            try {
                return t.console.log.apply(t.console, n)
            } catch (i) {
                e.each(n, function() {
                    t.console.log(this)
                })
            }
        }, n.ready = function(t) {
            return "function" != typeof t ? n : (e.each(A, function(e, n) {
                t.call(n, n._options)
            }), n.ready.callbacks.push(t), n)
        }, n.ready.callbacks = [], n.raise = function(t, n) {
            var i = n ? "Fatal error" : "Error",
                r = {
                    color: "#fff",
                    position: "absolute",
                    top: 0,
                    left: 0,
                    zIndex: 1e5
                },
                o = function(t) {
                    var o = '<div style="padding:4px;margin:0 0 2px;background:#' + (n ? "811" : "222") + ';">' + (n ? "<strong>" + i + ": </strong>" : "") + t + "</div>";
                    e.each(D, function() {
                        var e = this.$("errors"),
                            t = this.$("target");
                        e.length || (t.css("position", "relative"), e = this.addElement("errors").appendChild("target", "errors").$("errors").css(r)), e.append(o)
                    }), D.length || e("<div>").css(e.extend(r, {
                        position: "fixed"
                    })).append(o).appendTo(b().body)
                };
            if (l) {
                if (o(t), n) throw new Error(i + ": " + t)
            } else if (n) {
                if ($) return;
                $ = !0, n = !1, o("Gallery could not load.")
            }
        }, n.version = u, n.requires = function(e, t) {
            return t = t || "You need to upgrade Galleria to version " + e + " to use one or more components.", n.version < e && n.raise(t, !0), n
        }, n.Picture = function(t) {
            this.id = t || null, this.image = null, this.container = j.create("galleria-image"), e(this.container).css({
                overflow: "hidden",
                position: "relative"
            }), this.original = {
                width: 0,
                height: 0
            }, this.ready = !1, this.isIframe = !1
        }, n.Picture.prototype = {
            cache: {},
            show: function() {
                j.show(this.image)
            },
            hide: function() {
                j.moveOut(this.image)
            },
            clear: function() {
                this.image = null
            },
            isCached: function(e) {
                return !!this.cache[e]
            },
            preload: function(t) {
                e(new Image).load(function(e, t) {
                    return function() {
                        t[e] = e
                    }
                }(t, this.cache)).attr("src", t)
            },
            load: function(i, r, o) {
                if ("function" == typeof r && (o = r, r = null), this.isIframe) {
                    var a = "if" + (new Date).getTime(),
                        s = this.image = e("<iframe>", {
                            src: i,
                            frameborder: 0,
                            id: a,
                            allowfullscreen: !0,
                            css: {
                                visibility: "hidden"
                            }
                        })[0];
                    return r && e(s).css(r), e(this.container).find("iframe,img").remove(), this.container.appendChild(this.image), e("#" + a).load(function(n, i) {
                        return function() {
                            t.setTimeout(function() {
                                e(n.image).css("visibility", "visible"), "function" == typeof i && i.call(n, n)
                            }, 10)
                        }
                    }(this, o)), this.container
                }
                this.image = new Image, n.IE8 && e(this.image).css("filter", "inherit");
                var u = !1,
                    l = !1,
                    c = e(this.container),
                    d = e(this.image),
                    f = function() {
                        u ? h ? e(this).attr("src", h) : n.raise("Image not found: " + i) : (u = !0, t.setTimeout(function(e, t) {
                            return function() {
                                e.attr("src", t + (t.indexOf("?") > -1 ? "&" : "?") + j.timestamp())
                            }
                        }(e(this), i), 50))
                    },
                    p = function(i, o, a) {
                        return function() {
                            var s = function() {
                                e(this).off("load"), i.original = r || {
                                    height: this.height,
                                    width: this.width
                                }, n.HAS3D && (this.style.MozTransform = this.style.webkitTransform = "translate3d(0,0,0)"), c.append(this), i.cache[a] = a, "function" == typeof o && t.setTimeout(function() {
                                    o.call(i, i)
                                }, 1)
                            };
                            this.width && this.height ? s.call(this) : ! function(t) {
                                j.wait({
                                    until: function() {
                                        return t.width && t.height
                                    },
                                    success: function() {
                                        s.call(t)
                                    },
                                    error: function() {
                                        l ? n.raise("Could not extract width/height from image: " + t.src + ". Traced measures: width:" + t.width + "px, height: " + t.height + "px.") : (e(new Image).load(p).attr("src", t.src), l = !0)
                                    },
                                    timeout: 100
                                })
                            }(this)
                        }
                    }(this, o, i);
                return c.find("iframe,img").remove(), d.css("display", "block"), j.hide(this.image), e.each("minWidth minHeight maxWidth maxHeight".split(" "), function(e, t) {
                    d.css(t, /min/.test(t) ? "0" : "none")
                }), d.load(p).on("error", f).attr("src", i), this.container
            },
            scale: function(t) {
                var r = this;
                if (t = e.extend({
                        width: 0,
                        height: 0,
                        min: i,
                        max: i,
                        margin: 0,
                        complete: g,
                        position: "center",
                        crop: !1,
                        canvas: !1,
                        iframelimit: i
                    }, t), this.isIframe) {
                    var o, a, s = t.width,
                        u = t.height;
                    if (t.iframelimit) {
                        var l = m.min(t.iframelimit / s, t.iframelimit / u);
                        1 > l ? (o = s * l, a = u * l, e(this.image).css({
                            top: u / 2 - a / 2,
                            left: s / 2 - o / 2,
                            position: "absolute"
                        })) : e(this.image).css({
                            top: 0,
                            left: 0
                        })
                    }
                    e(this.image).width(o || s).height(a || u).removeAttr("width").removeAttr("height"), e(this.container).width(s).height(u), t.complete.call(r, r);
                    try {
                        this.image.contentWindow && e(this.image.contentWindow).trigger("resize")
                    } catch (c) {}
                    return this.container
                }
                if (!this.image) return this.container;
                var h, d, f, p = e(r.container);
                return j.wait({
                    until: function() {
                        return h = t.width || p.width() || j.parseValue(p.css("width")), d = t.height || p.height() || j.parseValue(p.css("height")), h && d
                    },
                    success: function() {
                        var n = (h - 2 * t.margin) / r.original.width,
                            i = (d - 2 * t.margin) / r.original.height,
                            o = m.min(n, i),
                            a = m.max(n, i),
                            s = {
                                "true": a,
                                width: n,
                                height: i,
                                "false": o,
                                landscape: r.original.width > r.original.height ? a : o,
                                portrait: r.original.width < r.original.height ? a : o
                            },
                            u = s[t.crop.toString()],
                            l = "";
                        t.max && (u = m.min(t.max, u)), t.min && (u = m.max(t.min, u)), e.each(["width", "height"], function(t, n) {
                            e(r.image)[n](r[n] = r.image[n] = m.round(r.original[n] * u))
                        }), e(r.container).width(h).height(d), t.canvas && N && (N.elem.width = r.width, N.elem.height = r.height, l = r.image.src + ":" + r.width + "x" + r.height, r.image.src = N.cache[l] || function(e) {
                            N.context.drawImage(r.image, 0, 0, r.original.width * u, r.original.height * u);
                            try {
                                return f = N.elem.toDataURL(), N.length += f.length, N.cache[e] = f, f
                            } catch (t) {
                                return r.image.src
                            }
                        }(l));
                        var c = {},
                            p = {},
                            g = function(t, n, i) {
                                var o = 0;
                                if (/\%/.test(t)) {
                                    var a = parseInt(t, 10) / 100,
                                        s = r.image[n] || e(r.image)[n]();
                                    o = m.ceil(-1 * s * a + i * a)
                                } else o = j.parseValue(t);
                                return o
                            },
                            v = {
                                top: {
                                    top: 0
                                },
                                left: {
                                    left: 0
                                },
                                right: {
                                    left: "100%"
                                },
                                bottom: {
                                    top: "100%"
                                }
                            };
                        e.each(t.position.toLowerCase().split(" "), function(e, t) {
                            "center" === t && (t = "50%"), c[e ? "top" : "left"] = t
                        }), e.each(c, function(t, n) {
                            v.hasOwnProperty(n) && e.extend(p, v[n])
                        }), c = c.top ? e.extend(c, p) : p, c = e.extend({
                            top: "50%",
                            left: "50%"
                        }, c), e(r.image).css({
                            position: "absolute",
                            top: g(c.top, "height", d),
                            left: g(c.left, "width", h)
                        }), r.show(), r.ready = !0, t.complete.call(r, r)
                    },
                    error: function() {
                        n.raise("Could not scale image: " + r.image.src)
                    },
                    timeout: 1e3
                }), this
            }
        }, e.extend(e.easing, {
            galleria: function(e, t, n, i, r) {
                return (t /= r / 2) < 1 ? i / 2 * t * t * t + n : i / 2 * ((t -= 2) * t * t + 2) + n
            },
            galleriaIn: function(e, t, n, i, r) {
                return i * (t /= r) * t + n
            },
            galleriaOut: function(e, t, n, i, r) {
                return -i * (t /= r) * (t - 2) + n
            }
        }), n.Finger = function() {
            var i = (m.abs, n.HAS3D = function() {
                    var t, n, i = r.createElement("p"),
                        o = ["webkit", "O", "ms", "Moz", ""],
                        a = 0,
                        s = "transform";
                    for (b().html.insertBefore(i, null); o[a]; a++) n = o[a] ? o[a] + "Transform" : s, void 0 !== i.style[n] && (i.style[n] = "translate3d(1px,1px,1px)", t = e(i).css(o[a] ? "-" + o[a].toLowerCase() + "-" + s : s));
                    return b().html.removeChild(i), void 0 !== t && t.length > 0 && "none" !== t
                }()),
                a = function() {
                    var e = "RequestAnimationFrame";
                    return t.requestAnimationFrame || t["webkit" + e] || t["moz" + e] || t["o" + e] || t["ms" + e] || function(e) {
                        t.setTimeout(e, 1e3 / 60)
                    }
                }(),
                s = function(n, r) {
                    if (this.config = {
                            start: 0,
                            duration: 500,
                            onchange: function() {},
                            oncomplete: function() {},
                            easing: function(e, t, n, i, r) {
                                return -i * ((t = t / r - 1) * t * t * t - 1) + n
                            }
                        }, this.easeout = function(e, t, n, i, r) {
                            return i * ((t = t / r - 1) * t * t * t * t + 1) + n
                        }, n.children.length) {
                        var o = this;
                        e.extend(this.config, r), this.elem = n, this.child = n.children[0], this.to = this.pos = 0, this.touching = !1, this.start = {}, this.index = this.config.start, this.anim = 0, this.easing = this.config.easing, i || (this.child.style.position = "absolute", this.elem.style.position = "relative"), e.each(["ontouchstart", "ontouchmove", "ontouchend", "setup"], function(e, t) {
                                o[t] = function(e) {
                                    return function() {
                                        e.apply(o, arguments)
                                    }
                                }(o[t])
                            }), this.setX = function() {
                                var e = o.child.style;
                                return i ? void(e.MozTransform = e.webkitTransform = "translate3d(" + o.pos + "px,0,0)") : void(e.left = o.pos + "px")
                            }, e(n).on("touchstart", this.ontouchstart), e(t).on("resize", this.setup), e(t).on("orientationchange", this.setup), this.setup(),
                            function s() {
                                a(s), o.loop.call(o)
                            }()
                    }
                };
            return s.prototype = {
                constructor: s,
                setup: function() {
                    this.width = e(this.elem).width(), this.length = m.ceil(e(this.child).width() / this.width), 0 !== this.index && (this.index = m.max(0, m.min(this.index, this.length - 1)), this.pos = this.to = -this.width * this.index)
                },
                setPosition: function(e) {
                    this.pos = e, this.to = e
                },
                ontouchstart: function(e) {
                    var t = e.originalEvent.touches;
                    this.start = {
                        pageX: t[0].pageX,
                        pageY: t[0].pageY,
                        time: +new Date
                    }, this.isScrolling = null, this.touching = !0, this.deltaX = 0, o.on("touchmove", this.ontouchmove), o.on("touchend", this.ontouchend)
                },
                ontouchmove: function(e) {
                    var t = e.originalEvent.touches;
                    t && t.length > 1 || e.scale && 1 !== e.scale || (this.deltaX = t[0].pageX - this.start.pageX, null === this.isScrolling && (this.isScrolling = !!(this.isScrolling || m.abs(this.deltaX) < m.abs(t[0].pageY - this.start.pageY))), this.isScrolling || (e.preventDefault(), this.deltaX /= !this.index && this.deltaX > 0 || this.index == this.length - 1 && this.deltaX < 0 ? m.abs(this.deltaX) / this.width + 1.8 : 1, this.to = this.deltaX - this.index * this.width), e.stopPropagation())
                },
                ontouchend: function() {
                    this.touching = !1;
                    var e = +new Date - this.start.time < 250 && m.abs(this.deltaX) > 40 || m.abs(this.deltaX) > this.width / 2,
                        t = !this.index && this.deltaX > 0 || this.index == this.length - 1 && this.deltaX < 0;
                    this.isScrolling || this.show(this.index + (e && !t ? this.deltaX < 0 ? 1 : -1 : 0)), o.off("touchmove", this.ontouchmove), o.off("touchend", this.ontouchend)
                },
                show: function(e) {
                    e != this.index ? this.config.onchange.call(this, e) : this.to = -(e * this.width)
                },
                moveTo: function(e) {
                    e != this.index && (this.pos = this.to = -(e * this.width), this.index = e)
                },
                loop: function() {
                    var e = this.to - this.pos,
                        t = 1;
                    if (this.width && e && (t = m.max(.5, m.min(1.5, m.abs(e / this.width)))), this.touching || m.abs(e) <= 1) this.pos = this.to, e = 0, this.anim && !this.touching && this.config.oncomplete(this.index), this.anim = 0, this.easing = this.config.easing;
                    else {
                        this.anim || (this.anim = {
                            start: this.pos,
                            time: +new Date,
                            distance: e,
                            factor: t,
                            destination: this.to
                        });
                        var n = +new Date - this.anim.time,
                            i = this.config.duration * this.anim.factor;
                        if (n > i || this.anim.destination != this.to) return this.anim = 0, void(this.easing = this.easeout);
                        this.pos = this.easing(null, n, this.anim.start, this.anim.distance, i)
                    }
                    this.setX()
                }
            }, s
        }(), e.fn.galleria = function(t) {
            var i = this.selector;
            return e(this).length ? this.each(function() {
                e.data(this, "galleria") && (e.data(this, "galleria").destroy(), e(this).find("*").hide()), e.data(this, "galleria", (new n).init(this, t))
            }) : (e(function() {
                e(i).length ? e(i).galleria(t) : n.utils.wait({
                    until: function() {
                        return e(i).length
                    },
                    success: function() {
                        e(i).galleria(t)
                    },
                    error: function() {
                        n.raise('Init failed: Galleria could not find the element "' + i + '".')
                    },
                    timeout: 5e3
                })
            }), this)
        }, "object" == typeof module && module && "object" == typeof module.exports ? module.exports = n : (t.Galleria = n, "function" == typeof define && define.amd && define("galleria", ["jquery"], function() {
            return n
        }))
    }(jQuery, this), ! function(e) {
        Galleria.addTheme({
            name: "azur",
            author: "Galleria",
            defaults: {
                transition: "fade",
                transitionSpeed: 500,
                imageCrop: !1,
                thumbCrop: "height",
                idleMode: "hover",
                idleSpeed: 500,
                fullscreenTransition: !1,
                autoplay: Galleria.TOUCH ? !1 : 4e3,
                _locale: {
                    show_captions: "Show captions",
                    hide_captions: "Hide captions",
                    play: "Play slideshow",
                    pause: "Pause slideshow",
                    enter_fullscreen: "Enter fullscreen",
                    exit_fullscreen: "Exit fullscreen",
                    next: "Next image",
                    prev: "Previous image",
                    showing_image: "Showing image %s of %s"
                },
                _toggleCaption: !1,
                _showCaption: !0,
                _showTooltip: !0
            },
            init: function(t) {
                Galleria.requires(1.33, "This version of Azur theme requires Galleria version 1.3.3 or later"), this.addElement("bar", "fullscreen", "play", "progress").append({
                    stage: "progress",
                    container: "bar",
                    bar: ["fullscreen", "play", "thumbnails-container"]
                }).prependChild("stage", "info").appendChild("container", "tooltip");
                var n = this,
                    i = window.document,
                    r = t._locale,
                    o = "getContext" in i.createElement("canvas");
                ! function() {
                    if (!o) {
                        n.addElement("progressbar").appendChild("progress", "progressbar"), n.$("progress").addClass("nocanvas");
                        var t = n.$("progress").width();
                        return void n.bind("progress", function(e) {
                            n.$("progressbar").width(e.percent / 100 * t)
                        })
                    }
                    var r = 24,
                        a = i.createElement("canvas"),
                        s = a.getContext("2d"),
                        u = function(e) {
                            return e * (Math.PI / 180)
                        },
                        l = function(e, t) {
                            s.strokeStyle = t || "#000", s.lineWidth = 3, s.clearRect(0, 0, r, r), s.beginPath(), s.arc(r / 2, r / 2, r / 2 - 2, u(-90), u(e - 90), !1), s.stroke(), s.closePath()
                        };
                    a.width = r, a.height = r, e(a).css({
                        zIndex: 1e4,
                        position: "absolute",
                        right: 10,
                        top: 10
                    }).appendTo(n.get("container")), n.bind("progress", function(t) {
                        e(a).fadeIn(200), l(3.6 * t.percent, "rgba(255,255,255,.7)")
                    }), n.bind("pause", function() {
                        e(a).fadeOut(200, function() {
                            s.clearRect(0, 0, r, r)
                        })
                    })
                }(), ! function() {
                    var t = function() {
                        var e = "RequestAnimationFrame";
                        return window.requestAnimationFrame || window["webkit" + e] || window["moz" + e] || window["o" + e] || window["ms" + e] || function(e) {
                            window.setTimeout(e, 1e3 / 60)
                        }
                    }();
                    if (!o) return void n.$("loader").addClass("nocanvas");
                    var r = i.createElement("canvas"),
                        a = r.getContext("2d"),
                        s = Math,
                        u = function(e, t, n) {
                            var i = n ? -2 : 2;
                            e.translate(t / i, t / i)
                        },
                        l = 28;
                    e(r).hide().appendTo(n.get("loader")).fadeIn(500);
                    var c = function(e, t) {
                        var n, i = 48,
                            r = 28;
                        e.clearRect(0, 0, i, i), e.lineWidth = 1.5;
                        for (var o = 0; r > o; o++) n = o + t >= r ? o - r + t : o + t, e.strokeStyle = "rgba(255,255,255," + s.max(0, n / r) + ")", e.lineWidth = 1, e.beginPath(), e.moveTo(i / 2, i / 2 - 16), e.lineTo(i / 2, 0), e.stroke(), u(e, i, !1), e.rotate(360 / r * s.PI / 180), u(e, i, !0);
                        e.save(), u(e, i, !1), e.rotate(-1 * (360 / r / 8) * s.PI / 180), u(e, i, !0)
                    };
                    ! function h() {
                        t(h), c(a, l), l = 0 === l ? 28 : l - 1
                    }()
                }();
                var a = Galleria.IE < 9 ? {
                        bottom: -100
                    } : {
                        bottom: -50,
                        opacity: 0
                    },
                    s = Galleria.IE < 9 ? {
                        top: -20
                    } : {
                        opacity: 0,
                        top: -20
                    };
                this.bind("play", function() {
                    this.$("play").addClass("pause"), o || this.$("progress").show()
                }).bind("pause", function() {
                    this.$("play").removeClass("pause"), o || this.$("progress").hide()
                }).bind("loadstart", function(e) {
                    e.cached || this.$("loader").show()
                }).bind("loadfinish", function() {
                    o ? this.$("loader").fadeOut(100) : this.$("loader").hide()
                }), this.removeIdleState(this.get("info"), a, Galleria.IE < 9 ? {} : {
                    opacity: 1
                }, !0).addIdleState(this.get("image-nav-left"), {
                    opacity: 0,
                    left: 0
                }, {
                    opacity: 1
                }, !0).addIdleState(this.get("image-nav-right"), {
                    opacity: 0,
                    right: 0
                }, {
                    opacity: 1
                }, !0).addIdleState(this.get("counter"), s, Galleria.IE < 9 ? {} : {
                    opacity: .9
                }, !0), this.$("fullscreen").on("click:fast", function(e) {
                    e.preventDefault(), n.toggleFullscreen()
                }), this.$("play").on("click:fast", function(e) {
                    e.preventDefault(), n.playToggle()
                }), t._toggleCaption && (this.$("info").addClass("toggler"), this.addElement("captionopen").appendChild("stage", "captionopen"), this.addElement("captionclose").appendChild("info", "captionclose"), this.$("captionopen").on("click:fast", function() {
                    n.$("info").addClass("open"), e(this).hide()
                }).html(r.show_captions), this.bind("loadstart", function() {
                    this.$("captionopen").toggle(!n.$("info").hasClass("open") && this.hasInfo())
                }), this.$("captionclose").on("click:fast", function() {
                    n.$("info").removeClass("open"), n.hasInfo() && n.$("captionopen").show()
                }).html("&#215;"), t._showCaption && this.$("captionopen").trigger("click:fast")), t._showTooltip && this.bindTooltip({
                    fullscreen: function() {
                        return n.isFullscreen() ? r.exit_fullscreen : r.enter_fullscreen
                    },
                    play: function() {
                        return n.isPlaying() ? r.pause : r.play
                    },
                    captionclose: r.hide_captions,
                    "image-nav-right": r.next,
                    "image-nav-left": r.prev,
                    counter: function() {
                        return r.showing_image.replace(/\%s/, n.getIndex() + 1).replace(/\%s/, n.getDataLength())
                    }
                })
            }
        })
    }(jQuery), 
    function() {
        $.support.pjax && ($.pjax.defaults.timeout = 2e3), $(document).on("pjax:start", function() {
            return $.colorbox.remove(), $("#content").animate({
                opacity: .5
            }, 200)
        }).on("pjax:end", function() {
            return window._gaq && _gaq.push(["_trackPageview", window.location.href]), "/" === window.location.pathname ? ($("#content").hide(), $("#about_message").fadeIn(200)) : ($("#content:hidden").show(), $("#about_message").not(":hidden").fadeOut(200)), 0 === $("#content").html().trim().length && $("#content").hide(), $("#content").animate({
                opacity: 1
            }, 100)
        }).on("pjax:click", function(e) {
            return $("#navigation_links li.active").removeClass(), $(e.target).parent().addClass("active")
        }).on("ready", function() {
            return $(document).pjax("a[data-pjax]", "[data-pjax-container]")
        }).on("ready pjax:success", function() {
					$("#photos").ready(function() {
                return $("ul.grid li a.photo").colorbox({
                    rel: "gallery",
                    transition: "none",
                    width: "80%",
                    height: "80%",
                    opacity: .7,
                    escKey: !0,
                    returnFocus: !1,
                    current: "{current} of {total}",
                    close: "x",
                    onOpen: function() {
                        var e;
                        return e = new Spinner({
                            lines: 10,
                            length: 5,
                            width: 3,
                            radius: 5,
                            speed: 2,
                            color: "#fff"
                        }).spin(), $("#cboxLoadingGraphic").append(e.el)
                    }
                }), 0 !== $("#galleria").length ? (Galleria.ready(function() {
                    return $("#galleria").removeClass()
                }), Galleria.run("#galleria")) : void 0
            })
        }), $(window).load(function() {
            return $("body").data("stickyLinks") && !Modernizr.touch ? new Waypoint.Sticky({
                element: $("#navi")
            }) : void 0
        })
    }.call(this);