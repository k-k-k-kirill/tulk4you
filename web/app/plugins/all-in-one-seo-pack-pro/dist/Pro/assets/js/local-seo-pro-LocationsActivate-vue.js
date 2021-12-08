(window["aioseopjsonp"]=window["aioseopjsonp"]||[]).push([["local-seo-pro-LocationsActivate-vue","local-seo-OpeningHours-vue","local-seo-pro-LocalSeoCta-vue"],{"2d4e":function(t,s,e){"use strict";e.r(s);var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",[e("core-card",{attrs:{slug:"localBusinessInfo","header-text":t.strings.businessInfo}},[e("core-blur",[e("core-settings-row",{staticClass:"info-name-row",attrs:{name:t.strings.name,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[e("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[e("base-input",{attrs:{type:"text",size:"medium"}}),e("span",{staticClass:"field-description"},[t._v(t._s(t.strings.nameDesc))])],1)]},proxy:!0}])}),e("core-settings-row",{staticClass:"info-business-image",attrs:{name:t.strings.image},scopedSlots:t._u([{key:"content",fn:function(){return[e("div",{staticClass:"image-upload"},[e("base-input",{attrs:{size:"medium",placeholder:t.strings.pasteYourImageUrl}}),e("base-button",{staticClass:"insert-image",attrs:{size:"medium",type:"black"}},[e("svg-circle-plus"),t._v(" "+t._s(t.strings.uploadOrSelectImage)+" ")],1),e("base-button",{staticClass:"remove-image",attrs:{size:"medium",type:"gray"}},[t._v(" "+t._s(t.strings.remove)+" ")])],1),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.minimumSize)+" ")])]},proxy:!0}])}),e("core-settings-row",{staticClass:"info-business-type",attrs:{name:t.strings.businessType,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-select",{attrs:{size:"large",options:t.businessTypes,value:"default"}})]},proxy:!0}])}),e("core-settings-row",{staticClass:"info-urls-row",attrs:{name:t.strings.urls,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[e("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[e("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[e("span",{staticClass:"field-description"},[t._v(t._s(t.strings.websiteDesc))]),e("base-input",{attrs:{type:"text",size:"medium"}})],1),e("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[e("span",{staticClass:"field-description mt-8"},[t._v(t._s(t.strings.aboutDesc))]),e("base-input",{attrs:{type:"text",size:"medium"}})],1),e("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[e("span",{staticClass:"field-description mt-8"},[t._v(t._s(t.strings.contactDesc))]),e("base-input",{attrs:{type:"text",size:"medium"}})],1)])]},proxy:!0}])})],1),e("local-seo-cta")],1)],1)},a=[],n=e("734c"),o={components:{LocalSeoCta:n["default"]},data:function(){return{strings:{businessInfo:this.$t.__("Business Info",this.$td),name:this.$t.__("name",this.$td),nameDesc:this.$t.__("Your name or company name.",this.$td),businessType:this.$t.__("Type",this.$td),urls:this.$t.__("URLs",this.$td),image:this.$t.__("Image",this.$td),uploadOrSelectImage:this.$t.__("Upload or Select Image",this.$td),pasteYourImageUrl:this.$t.__("Paste your image URL or select a new image",this.$td),minimumSize:this.$t.__("Minimum size: 112px x 112px, The image must be in JPG, PNG, GIF, SVG, or WEBP format.",this.$td),remove:this.$t.__("Remove",this.$td),websiteDesc:this.$t.__("Website URL:",this.$td),aboutDesc:this.$t.__("About Page URL:",this.$td),contactDesc:this.$t.__("Contact Page URL:",this.$td)},businessTypes:[{label:this.$t.__("default",this.$td),value:"LocalBusiness"},{label:this.$t.__("Animal Shelter",this.$td),value:"Animal Shelter"}]}}},r=o,c=e("2877"),l=Object(c["a"])(r,i,a,!1,null,null,null);s["default"]=l.exports},"734c":function(t,s,e){"use strict";e.r(s);var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("cta",{attrs:{"cta-button-visible":t.$addons.userCanInstallOrActivate("aioseo-local-business"),"cta-button-visible-warning":t.strings.permissionWarning,"cta-link":t.$aioseo.urls.aio.featureManager+"&aioseo-activate=aioseo-local-business","cta-button-action":"","cta-button-loading":t.activationLoading,"same-tab":"","button-text":t.strings.ctaButtonText,"learn-more-link":t.$links.getDocUrl("localSeo"),"feature-list":[t.strings.businessType,t.strings.businessContact,t.strings.paymentInfo,t.strings.image,t.strings.showOpeningHours,t.strings.googleMaps]},on:{"cta-button-click":t.activateAddon},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.locationSeoHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[t.failed?e("core-alert",{attrs:{type:"red"}},[t._v(" "+t._s(t.strings.activateError)+" ")]):t._e(),t._v(" "+t._s(t.strings.ctaDescription)+" ")]},proxy:!0},{key:"learn-more-text",fn:function(){return[t._v(" "+t._s(t.strings.learnMoreText)+" ")]},proxy:!0}])})},a=[],n=e("5530"),o=(e("7db0"),e("2f62")),r={data:function(){return{failed:!1,activationLoading:!1,strings:{locationSeoHeader:this.$t.__("Enable Local SEO on your Site",this.$tdPro),ctaDescription:this.$t.__("The Local SEO module is a premium feature that enables businesses to tell Google about their business, including their business name, address and phone number, opening hours and price range.  This information may be displayed as a Knowledge Graph card or business carousel in the search engine sidebar.",this.$tdPro),ctaButtonText:this.$t.__("Activate Local SEO",this.$tdPro),learnMoreText:this.$t.__("Learn more about Local SEO",this.$tdPro),showOpeningHours:this.$t.__("Show Opening Hours",this.$td),selectTimeZoneCTA:this.$t.__("Select your timezone",this.$td),googleMaps:this.$t.__("Google Maps",this.$td),businessType:this.$t.__("Type",this.$td),businessContact:this.$t.__("Contact Info",this.$td),paymentInfo:this.$t.__("Payment Info",this.$td),image:this.$t.__("Image",this.$td),activateError:this.$t.__("An error occurred while activating the addon. Please upload it manually or contact support for more information.",this.$td),permissionWarning:this.$t.__("You currently don't have permission to activate this addon. Please ask a site administrator to activate first.",this.$td)}}},computed:Object(n["a"])({},Object(o["e"])(["addons"])),methods:Object(n["a"])(Object(n["a"])(Object(n["a"])({},Object(o["b"])(["installPlugins"])),Object(o["d"])(["updateAddon"])),{},{activateAddon:function(){var t=this;this.failed=!1,this.activationLoading=!0;var s=this.addons.find((function(t){return"aioseo-local-business"===t.sku}));this.installPlugins([{plugin:s.basename}]).then((function(s){t.activationLoading=!1,s.body.failed.length?t.failed=!0:window.location.reload()})).catch((function(){t.activationLoading=!1}))}})},c=r,l=e("2877"),u=Object(l["a"])(c,i,a,!1,null,null,null);s["default"]=u.exports}}]);