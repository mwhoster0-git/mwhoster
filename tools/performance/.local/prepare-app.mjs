// Reviewable, deterministic transformation of the existing child application.
import fs from 'node:fs/promises';
let source=await fs.readFile('.local/before-theme/assets/js/app.js','utf8');
source=source.replace('(function ($) {','jQuery(function ($) {').replace('})(jQuery); // JQuery end','}); // WordPress jQuery, noConflict-compatible DOM-ready callback.');
for(const [selector,plugin] of [['.js-mega-menu','HSMegaMenu'],['.clients-carousel','owlCarousel'],['.custom-indicator-slider','owlCarousel'],['.popup-youtube, .popup-vimeo, .popup-gmaps','magnificPopup'],['.client-testimonial-1','owlCarousel'],['.client-testimonial-2','owlCarousel'],['.hero-slider-one','owlCarousel']]) {
  const needle=`  $("${selector}").${plugin}({`;
  const start=source.indexOf(needle);
  if(start<0)throw Error('Missing initializer '+selector);
  const end=source.indexOf('\n  });',start)+6;
  const call=source.slice(start,end);
  source=source.slice(0,start)+`  if ($("${selector}").length && typeof $.fn.${plugin} === "function") {\n`+call.split('\n').map(l=>'  '+l).join('\n')+'\n  }'+source.slice(end);
}
const scrollStart=source.indexOf('  $(window).on("scroll", function () {');
const scrollEnd=source.indexOf('\n  });',scrollStart)+6;
source=source.slice(0,scrollStart)+`  var scrollPending = false;
  var previousAffix = null;
  var previousTop = null;
  function updateScrollState() {
    var y = window.scrollY || window.pageYOffset;
    var affix = y > 0;
    var top = y > 500;
    if (affix !== previousAffix) $(".main-header-menu-wrap").toggleClass("affix", affix);
    if (top !== previousTop) $(".scroll-to-target").toggleClass("open", top);
    previousAffix = affix;
    previousTop = top;
    scrollPending = false;
  }
  window.addEventListener("scroll", function () {
    if (!scrollPending) {
      scrollPending = true;
      window.requestAnimationFrame(updateScrollState);
    }
  }, { passive: true });
  updateScrollState();`+source.slice(scrollEnd);
source=source.replace(`  $(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('.custom-map-location li span').tooltip('show');
  });`.replaceAll('\n','\r\n'),`  if (window.bootstrap && window.bootstrap.Tooltip) {
    document.querySelectorAll('[data-bs-toggle="tooltip"], .custom-map-location li span').forEach(function (element) {
      var tooltip = window.bootstrap.Tooltip.getOrCreateInstance(element);
      if (element.matches('.custom-map-location li span')) tooltip.show();
    });
  }`);
source=source.replace('  countDown();','  if ($(".counter-days, .counter-hours, .counter-minutes, .counter-seconds").length) countDown();');
source=source.replace('if ($("#contactForm").length) {','if ($("#contactForm").length && typeof $.fn.validator === "function") {');
source=source.replace('if (cPlan.length) {','if (cPlan.length && typeof $.fn.slider === "function") {');
const themeStart=source.indexOf('  //  theme switcher');
const themeEnd=source.lastIndexOf('}); // WordPress');
source=source.slice(0,themeStart)+'  if ($(".theme-setting").length) {\n'+source.slice(themeStart,themeEnd)+'  }\n'+source.slice(themeEnd);
if(source.includes(".tooltip();") || source.includes(".tooltip('show')"))throw Error('Old tooltip initialization was not replaced');
await fs.writeFile('.local/app-after.js',source);
