!function t(e,n,r){function i(o,s){if(!n[o]){if(!e[o]){var l="function"==typeof require&&require;if(!s&&l)return l(o,!0);if(u)return u(o,!0);var a=new Error("Cannot find module '"+o+"'");throw a.code="MODULE_NOT_FOUND",a}var f=n[o]={exports:{}};e[o][0].call(f.exports,function(t){var n=e[o][1][t];return i(n?n:t)},f,f.exports,t,e,n,r)}return n[o].exports}for(var u="function"==typeof require&&require,o=0;o<r.length;o++)i(r[o]);return i}({1:[function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var u=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),o=t("./vendor/simplemde"),s=r(o),l=function(){function t(){i(this,t)}return u(t,[{key:"markdown",value:function(){var t=(0,s["default"])("textarea");if(t.size()>0){var e=new s["default"]({element:t[0],toolbar:["bold","italic","heading","|","quote","unordered-list","ordered-list","|","link","image","|","preview","guide"]});e.render()}return this}}]),t}();(new l).markdown()},{"./vendor/simplemde":3}],2:[function(t,e,n){"use strict";var r=window.Platform;r.extend("app","storycms",{data:function(){return{content:null,sluggable:!0,title:"",slug:""}},ready:function(){this.sluggable=!this.$get("content.id")>0,this.title=this.$get("content.title"),this.slug=this.slugify(this.$get("content.slug")||"","-")},methods:{slugify:function(t){var e=arguments.length<=1||void 0===arguments[1]?"-":arguments[1];return""==t?t:t.toLowerCase().replace(/^(_post_\/|_page_\/)/g,"").replace(/[^\w\.]+/g,e).replace(/\s+/g,e)},updateFromTitle:function(){""!=this.slug&&1!=this.sluggable||(this.slug=this.slugify(this.title,"-"))},updateFromSlug:function(){""==this.slug?this.slug=this.slugify(this.title,"-"):this.slug=this.slugify(this.slug,"-"),this.sluggable=!1}}}),t("./bootstrap")},{"./bootstrap":1}],3:[function(t,e,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n["default"]=SimpleMDE},{}]},{},[2]);