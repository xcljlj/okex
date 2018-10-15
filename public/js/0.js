webpackJsonp([0],{

/***/ 340:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue__ = __webpack_require__(341);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue__);
/* harmony namespace reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue__) if(["default","default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_13_7_3_vue_loader_lib_template_compiler_index_id_data_v_b02a4202_hasScoped_true_buble_transforms_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_template_index_0_register_vue__ = __webpack_require__(343);
var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(344)
}
var normalizeComponent = __webpack_require__(119)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-b02a4202"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_script_index_0_register_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_13_7_3_vue_loader_lib_template_compiler_index_id_data_v_b02a4202_hasScoped_true_buble_transforms_node_modules_vue_loader_13_7_3_vue_loader_lib_selector_type_template_index_0_register_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/html5/register.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b02a4202", Component.options)
  } else {
    hotAPI.reload("data-v-b02a4202", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 341:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

exports.default = {
    name: "Register"
};

/***/ }),

/***/ 342:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(68)();
// imports


// module
exports.push([module.i, "\n.van-cell-group[data-v-b02a4202] {\n}\n.van-button[data-v-b02a4202] {\n    height: 48px;\n    background-color: #9b8a30;\n}\n", ""]);

// exports


/***/ }),

/***/ 343:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "van-cell-group",
    [
      _c("van-nav-bar", {
        attrs: {
          title: "用户注册",
          "left-text": "返回",
          "right-text": "...",
          "left-arrow": ""
        },
        on: {
          "click-left": function($event) {},
          "click-right": function($event) {}
        }
      }),
      _vm._v(" "),
      _c("van-field", {
        attrs: {
          required: "",
          clearable: "",
          label: "用户名",
          icon: "question",
          placeholder: "请输入用户名"
        },
        on: {
          "click-icon": function($event) {
            _vm.$toast("question")
          }
        },
        model: {
          value: _vm.username,
          callback: function($$v) {
            _vm.username = $$v
          },
          expression: "username"
        }
      }),
      _vm._v(" "),
      _c("van-field", {
        attrs: {
          type: "password",
          label: "密码",
          placeholder: "请输入密码",
          required: ""
        },
        model: {
          value: _vm.password,
          callback: function($$v) {
            _vm.password = $$v
          },
          expression: "password"
        }
      }),
      _vm._v(" "),
      _c("van-field", {
        attrs: {
          type: "password",
          label: "重复密码",
          placeholder: "请输入密码",
          required: ""
        },
        model: {
          value: _vm.password,
          callback: function($$v) {
            _vm.password = $$v
          },
          expression: "password"
        }
      }),
      _vm._v(" "),
      _c(
        "van-field",
        {
          attrs: {
            required: "",
            center: "",
            clearable: "",
            label: "短信验证码",
            placeholder: "请输入短信验证码"
          },
          model: {
            value: _vm.smsCode,
            callback: function($$v) {
              _vm.smsCode = $$v
            },
            expression: "smsCode"
          }
        },
        [
          _c(
            "van-button",
            {
              attrs: { slot: "button", size: "small", type: "primary" },
              slot: "button"
            },
            [_vm._v("发送验证码")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("van-button", { attrs: { block: "", round: "", size: "large" } }, [
        _vm._v("注册")
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-b02a4202", esExports)
  }
}

/***/ }),

/***/ 344:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(342);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(286)("5ed496a9", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/_css-loader@0.25.0@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.3@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-b02a4202\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_vue-loader@13.7.3@vue-loader/lib/selector.js?type=styles&index=0!./register.vue", function() {
     var newContent = require("!!../../../../../node_modules/_css-loader@0.25.0@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.3@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-b02a4202\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_vue-loader@13.7.3@vue-loader/lib/selector.js?type=styles&index=0!./register.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ })

});