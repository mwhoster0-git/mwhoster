<?php
/* Template Name: Starter Offer
 * Template Post Type: post, page
 */
?>
<?php get_header(); ?>

<style>
#mw-starter-offer{--mw-ink:#101d39;--mw-muted:#58657b;--mw-blue:#155dff;--mw-navy:#061d4e;--mw-orange:#ff9b38;--mw-line:#dfe6f0;--mw-soft:#f3f6fb;--mw-white:#fff;font-family:Inter,"Segoe UI",Arial,sans-serif;font-size:16px;line-height:1.6;color:var(--mw-ink);background:#fff;text-align:left;isolation:isolate;width:100%;overflow:clip;-webkit-font-smoothing:antialiased}
#mw-starter-offer *,#mw-starter-offer *::before,#mw-starter-offer *::after{box-sizing:border-box}
#mw-starter-offer :where(h1,h2,h3,p,ul,ol,figure,dl,dd){margin:0;padding:0}
#mw-starter-offer :where(h1,h2,h3){font-family:inherit;font-weight:750;line-height:1.12;letter-spacing:-.035em;color:inherit}
#mw-starter-offer h1{font-size:clamp(42px,4.6vw,66px);max-width:660px}
#mw-starter-offer h2{font-size:clamp(30px,3.25vw,45px)}
#mw-starter-offer h3{font-size:23px;letter-spacing:-.025em}
#mw-starter-offer a{color:inherit;text-decoration:none}
#mw-starter-offer button{font:inherit;cursor:pointer;appearance:none;text-transform:none;letter-spacing:normal;margin:0}
#mw-starter-offer svg{display:block;max-width:100%;height:auto}
#mw-starter-offer .mw-wrap{width:min(1180px,calc(100% - 80px));margin-inline:auto}
#mw-starter-offer .mw-section{padding-block:88px}
#mw-starter-offer .mw-eyebrow{font-size:12px;line-height:1.5;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--mw-blue);display:block;margin-bottom:16px}
#mw-starter-offer .mw-lead{font-size:18px;line-height:1.7;color:var(--mw-muted);max-width:620px;margin-top:20px}
#mw-starter-offer .mw-btn{display:inline-flex;justify-content:center;align-items:center;gap:22px;min-height:56px;padding:15px 25px;border:1px solid transparent;border-radius:9px;background:var(--mw-orange);color:#15213c;font-weight:800;font-size:16px;line-height:1.35;transition:background .2s,transform .2s,box-shadow .2s;box-shadow:0 8px 28px #00112c26}
#mw-starter-offer .mw-btn:hover{background:#ffb465;transform:translateY(-2px);box-shadow:0 12px 32px #00112c36}
#mw-starter-offer .mw-btn svg{width:19px;height:19px;flex:0 0 19px}
#mw-starter-offer :where(a,button,summary):focus-visible{outline:3px solid #f0a127;outline-offset:5px}
#mw-starter-offer .mw-link{font-weight:700;border-bottom:1px solid currentColor;padding-bottom:3px;font-size:14px}
#mw-starter-offer .mw-icon{width:24px;height:24px;flex:0 0 24px;stroke:currentColor;stroke-width:1.7;fill:none;stroke-linecap:round;stroke-linejoin:round}
#mw-starter-offer .mw-sr{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
#mw-starter-offer .mw-hero{position:relative;background:radial-gradient(ellipse at 80% 30%,#1649a3 0%,transparent 46%),linear-gradient(115deg,#051939,#08295f);color:#fff;padding:65px 0 0}
#mw-starter-offer .mw-hero::before{content:"";position:absolute;inset:0;opacity:.13;background-image:linear-gradient(#729bd944 1px,transparent 1px),linear-gradient(90deg,#729bd944 1px,transparent 1px);background-size:64px 64px;mask-image:linear-gradient(90deg,transparent,#000)}
#mw-starter-offer .mw-hero-grid{position:relative;display:grid;grid-template-columns:1.1fr 1fr;gap:35px;align-items:center;padding-bottom:48px}
#mw-starter-offer .mw-pill{display:inline-flex;align-items:center;gap:9px;font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:#c4d7ff;background:#153467;border:1px solid #4268a0;border-radius:30px;padding:7px 12px;margin-bottom:24px}
#mw-starter-offer .mw-pill i{width:6px;height:6px;border-radius:50%;background:var(--mw-orange)}
#mw-starter-offer .mw-hero h1 em{font-style:normal;color:#87b2ff}
#mw-starter-offer .mw-hero-copy{color:#c5d4ed;font-size:17px;max-width:540px;margin:22px 0 25px;line-height:1.65}
#mw-starter-offer .mw-price-row{display:flex;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:4px}
#mw-starter-offer .mw-price{display:flex;align-items:baseline;gap:9px;line-height:1}
#mw-starter-offer .mw-price small{font-size:16px;font-weight:700;color:#c5d4ed;align-self:flex-start;padding-top:13px}
#mw-starter-offer .mw-price strong{font-size:78px;font-weight:800;letter-spacing:-.065em}
#mw-starter-offer .mw-price-note{line-height:1.4;font-size:13px;color:#d1dff4}
#mw-starter-offer .mw-price-note b{display:block;color:#fff;font-size:14px}
#mw-starter-offer .mw-save{font-size:13px;color:#b6c8e5;margin:8px 0 17px}
#mw-starter-offer .mw-save span{display:inline-block;white-space:nowrap;color:#ffb76a;margin-left:7px;font-weight:700}
#mw-starter-offer .mw-coupon{display:flex;align-items:center;flex-wrap:wrap;gap:11px;margin:17px 0 21px;font-size:13px;color:#d3dff3}
#mw-starter-offer .mw-copy{display:inline-flex;align-items:center;gap:12px;background:#123365;border:1px dashed #6585b6;color:#fff;padding:8px 12px;border-radius:6px;min-height:42px}
#mw-starter-offer .mw-copy strong{letter-spacing:.1em;font-size:13px}
#mw-starter-offer .mw-copy .mw-icon{width:16px;height:16px;flex-basis:16px}
#mw-starter-offer .mw-copy-label{font-size:11px;color:#c4d7f2;min-width:31px}
#mw-starter-offer .mw-renewal{color:#c8d8f0;font-size:12px;line-height:1.65;margin-top:13px}
#mw-starter-offer .mw-renewal b{color:#fff;font-weight:600}
#mw-starter-offer .mw-hero-art{position:relative;min-width:0;align-self:center}
#mw-starter-offer .mw-cloud-art{width:100%;filter:drop-shadow(0 28px 40px #00072c45)}
#mw-starter-offer .mw-art-caption{text-align:center;color:#bbd0ef;font-size:11px;letter-spacing:.09em;text-transform:uppercase;position:relative;margin-top:-8px}
#mw-starter-offer .mw-art-caption b{color:#fff;font-weight:700}
#mw-starter-offer .mw-trust{position:relative;border-top:1px solid #5471a344;display:grid;grid-template-columns:repeat(3,1fr);padding:23px 0;gap:20px}
#mw-starter-offer .mw-trust-item{display:flex;align-items:center;justify-content:center;gap:12px;font-size:13px;font-weight:600;color:#e1eafa}
#mw-starter-offer .mw-trust-item+.mw-trust-item{border-left:1px solid #5471a344}
#mw-starter-offer .mw-trust .mw-icon{color:#88b5ff;width:22px;height:22px;flex-basis:22px}
#mw-starter-offer .mw-spec-strip{background:#f3f6fb;border-bottom:1px solid var(--mw-line)}
#mw-starter-offer .mw-spec-grid{display:grid;grid-template-columns:repeat(4,1fr);padding:30px 0}
#mw-starter-offer .mw-mini-spec{padding:0 30px;border-right:1px solid var(--mw-line)}
#mw-starter-offer .mw-mini-spec:first-child{padding-left:0}
#mw-starter-offer .mw-mini-spec:last-child{border:0}
#mw-starter-offer .mw-mini-spec strong{display:block;font-size:26px;letter-spacing:-.04em;font-weight:750;line-height:1.3}
#mw-starter-offer .mw-mini-spec span{display:block;font-size:12px;color:var(--mw-muted);margin-top:4px}
#mw-starter-offer .mw-section-top{display:flex;justify-content:space-between;align-items:flex-end;gap:50px;margin-bottom:36px}
#mw-starter-offer .mw-section-top h2{max-width:620px}
#mw-starter-offer .mw-section-top p{max-width:360px;color:var(--mw-muted);font-size:15px;line-height:1.75}
#mw-starter-offer .mw-bento{display:grid;grid-template-columns:1.2fr 1fr 1fr;gap:20px}
#mw-starter-offer .mw-feature{border:1px solid var(--mw-line);border-radius:15px;padding:28px;min-width:0;background:#fff}
#mw-starter-offer .mw-feature p{color:var(--mw-muted);font-size:14px;line-height:1.75;margin-top:12px}
#mw-starter-offer .mw-feature h3{font-size:21px}
#mw-starter-offer .mw-feature .mw-feature-icon{width:44px;height:44px;border-radius:12px;display:grid;place-items:center;color:#185be0;background:#edf3ff;margin-bottom:22px}
#mw-starter-offer .mw-feature.mw-scaling{grid-row:span 2;background:linear-gradient(145deg,#0d3f9d,#071e4d);color:#fff;border:0;padding:32px;display:flex;flex-direction:column}
#mw-starter-offer .mw-scaling p{color:#cad8f1}
#mw-starter-offer .mw-scaling h3{font-size:29px;line-height:1.18}
#mw-starter-offer .mw-scaling .mw-eyebrow{color:#91baff;font-size:10px;margin-bottom:18px}
#mw-starter-offer .mw-scale-diagram{position:relative;margin:30px 0 27px;padding:0 6px}
#mw-starter-offer .mw-request{border:1px solid #668acb;background:#2457a9;border-radius:10px;padding:13px 10px;font-size:12px;font-weight:650;text-align:center;color:#e6efff}
#mw-starter-offer .mw-branches{position:relative;height:45px;width:72%;margin:auto;border-top:0}
#mw-starter-offer .mw-branches::before{content:"";position:absolute;height:45px;left:50%;top:0;border-left:1px solid #759edc}
#mw-starter-offer .mw-branches::after{content:"";position:absolute;left:0;right:0;top:21px;bottom:0;border:1px solid #759edc;border-bottom:0;border-radius:7px 7px 0 0}
#mw-starter-offer .mw-server-nodes{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
#mw-starter-offer .mw-node{border:1px solid #6389c6;border-radius:9px;background:#ffffff0a;padding:14px 5px;display:grid;place-items:center}
#mw-starter-offer .mw-node .mw-icon{width:31px;height:31px;color:#b3ceff}
#mw-starter-offer .mw-scale-caption{font-size:11px;color:#c4d7f6;text-align:center;margin-top:14px}
#mw-starter-offer .mw-scaling .mw-feature-fine{margin-top:auto;padding-top:20px;border-top:1px solid #6887b650;color:#a7bee1;font-size:11px;line-height:1.65}
#mw-starter-offer .mw-feature-tags{display:flex;flex-wrap:wrap;gap:6px;margin-top:18px}
#mw-starter-offer .mw-feature-tags span{border:1px solid #dfe8f6;border-radius:5px;font-size:10px;padding:3px 7px;font-weight:600;color:#526581}
#mw-starter-offer .mw-platform{background:var(--mw-soft)}
#mw-starter-offer .mw-platform-grid{display:grid;grid-template-columns:1fr 1.05fr;gap:70px;align-items:center}
#mw-starter-offer .mw-check-list{list-style:none;display:grid;gap:15px;margin-top:25px}
#mw-starter-offer .mw-check-list li{display:flex;align-items:flex-start;gap:11px;font-size:14px;color:var(--mw-muted)}
#mw-starter-offer .mw-check-list .mw-icon{width:19px;height:19px;flex-basis:19px;color:#13784d;margin-top:2px}
#mw-starter-offer .mw-check-list b{font-weight:700;color:var(--mw-ink)}
#mw-starter-offer .mw-app-deck{position:relative;padding:26px;background:linear-gradient(135deg,#dbe7ff,#edf2fd);border-radius:19px;border:1px solid #d2dff5}
#mw-starter-offer .mw-wp-card{background:#fff;border:1px solid #d5e1f2;border-radius:13px;padding:30px;box-shadow:0 17px 40px #24467513}
#mw-starter-offer .mw-app-heading{display:flex;gap:15px;align-items:center}
#mw-starter-offer .mw-wp-mark{border:2px solid #1e5480;border-radius:50%;width:57px;height:57px;flex:0 0 57px;display:grid;place-items:center;font-family:Georgia,serif;font-size:40px;line-height:1;color:#1e5480;font-weight:700}
#mw-starter-offer .mw-app-heading h3{font-size:23px}
#mw-starter-offer .mw-app-heading p{font-size:12px;color:var(--mw-muted);margin-top:3px}
#mw-starter-offer .mw-wp-card>p{font-size:14px;color:var(--mw-muted);margin-top:21px;line-height:1.75}
#mw-starter-offer .mw-app-bar{border-top:1px solid var(--mw-line);display:flex;align-items:center;gap:8px;margin-top:22px;padding-top:18px;font-size:11px;color:#146e4c;font-weight:700}
#mw-starter-offer .mw-app-bar .mw-icon{width:17px;height:17px;flex-basis:17px}
#mw-starter-offer .mw-app-options{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;margin-top:14px}
#mw-starter-offer .mw-app-option{background:#ffffffb8;border:1px solid #d1dff3;border-radius:10px;padding:17px 16px}
#mw-starter-offer .mw-app-option strong{font-size:14px;display:block}
#mw-starter-offer .mw-app-option span{font-size:11px;color:#65738a;display:block;margin-top:3px}
#mw-starter-offer .mw-compatibility{font-size:12px;color:#566984;margin-top:20px;line-height:1.7}
#mw-starter-offer .mw-compatibility summary{cursor:pointer;font-weight:700;color:#274b87;list-style:none;display:flex;align-items:center;gap:10px;min-height:32px}
#mw-starter-offer .mw-compatibility summary::before{content:"+";font-size:19px;line-height:1}
#mw-starter-offer .mw-compatibility[open] summary::before{content:"−"}
#mw-starter-offer .mw-compatibility p{margin-top:10px}
#mw-starter-offer .mw-plan-section{background:#fff}
#mw-starter-offer .mw-center{text-align:center;max-width:740px;margin:0 auto 36px}
#mw-starter-offer .mw-center .mw-lead{margin-inline:auto;font-size:16px}
#mw-starter-offer .mw-plan{display:grid;grid-template-columns:1fr 1.35fr;border:1px solid #c9d8f1;border-radius:18px;overflow:hidden;box-shadow:0 18px 60px #223a6a0c}
#mw-starter-offer .mw-plan-price{background:#eef4ff;padding:35px;border-right:1px solid #d8e3f4}
#mw-starter-offer .mw-plan-name{display:flex;align-items:center;gap:10px;margin-bottom:8px}
#mw-starter-offer .mw-plan-name .mw-icon{color:var(--mw-blue);width:27px;height:27px}
#mw-starter-offer .mw-plan-name h3{font-size:25px}
#mw-starter-offer .mw-plan-price>p{font-size:13px;color:var(--mw-muted)}
#mw-starter-offer .mw-plan-price .mw-price{margin-top:28px}
#mw-starter-offer .mw-plan-price .mw-price strong{font-size:65px;color:#113b8d}
#mw-starter-offer .mw-plan-price .mw-price small{color:#4c638a}
#mw-starter-offer .mw-year-label{font-weight:700;font-size:14px;color:#315281;margin-top:8px}
#mw-starter-offer .mw-receipt{margin:24px 0 22px;padding:17px 0;border-block:1px solid #cddcf2;font-size:12px;color:#516580}
#mw-starter-offer .mw-receipt div{display:flex;justify-content:space-between;gap:20px;margin:6px 0}
#mw-starter-offer .mw-receipt div>span:last-child{white-space:nowrap}
#mw-starter-offer .mw-receipt .mw-discount{color:#13734e;font-weight:700}
#mw-starter-offer .mw-receipt .mw-total{font-weight:800;font-size:15px;color:#132c55;padding-top:8px}
#mw-starter-offer .mw-plan-price .mw-btn{width:100%;font-size:15px}
#mw-starter-offer .mw-plan-price .mw-renewal{color:#50688e;text-align:center}
#mw-starter-offer .mw-plan-price .mw-renewal b{color:#254779}
#mw-starter-offer .mw-plan-detail{padding:35px 38px}
#mw-starter-offer .mw-plan-detail h3{font-size:20px}
#mw-starter-offer .mw-inclusions{display:grid;grid-template-columns:1fr 1fr;column-gap:28px;margin:12px 0 20px}
#mw-starter-offer .mw-inclusion{padding:15px 0;border-bottom:1px solid #e9edf4;display:flex;align-items:flex-start;gap:11px;font-size:12px;color:var(--mw-muted)}
#mw-starter-offer .mw-inclusion .mw-icon{width:19px;height:19px;flex-basis:19px;color:#2f68ce;margin-top:2px}
#mw-starter-offer .mw-inclusion strong{display:block;color:#1d3152;font-size:14px;font-weight:700;margin-bottom:2px}
#mw-starter-offer .mw-plan-note{background:#f7f9fc;border-radius:7px;padding:13px 16px;font-size:12px;color:#57677d;line-height:1.6}
#mw-starter-offer .mw-plan-note b{color:#2a3d5a}
#mw-starter-offer .mw-migration{background:#eef4ff;padding:57px 0}
#mw-starter-offer .mw-migrate-grid{display:grid;grid-template-columns:.95fr 1.15fr;gap:65px;align-items:center}
#mw-starter-offer .mw-migrate-grid h2{font-size:35px}
#mw-starter-offer .mw-migrate-grid p{font-size:14px;color:var(--mw-muted);margin:17px 0 20px}
#mw-starter-offer .mw-steps{list-style:none;display:grid;gap:21px}
#mw-starter-offer .mw-steps li{display:flex;gap:17px;align-items:flex-start}
#mw-starter-offer .mw-step-no{display:grid;place-items:center;width:34px;height:34px;flex:0 0 34px;background:#fff;color:#225dcc;border:1px solid #cbdcf7;border-radius:50%;font-size:12px;font-weight:800}
#mw-starter-offer .mw-steps strong{display:block;font-size:15px;font-weight:700}
#mw-starter-offer .mw-steps p{font-size:12px;margin:4px 0 0;line-height:1.7}
#mw-starter-offer .mw-faq-grid{display:grid;grid-template-columns:.75fr 1.25fr;gap:70px;align-items:start}
#mw-starter-offer .mw-faq-intro{position:sticky;top:100px}
#mw-starter-offer .mw-faq-intro .mw-lead{font-size:15px;margin-bottom:24px}
#mw-starter-offer .mw-faq-item{border-bottom:1px solid var(--mw-line)}
#mw-starter-offer .mw-faq-item:first-child{border-top:1px solid var(--mw-line)}
#mw-starter-offer .mw-faq-item summary{list-style:none;cursor:pointer;font-size:15px;font-weight:700;display:flex;align-items:center;justify-content:space-between;gap:22px;padding:22px 0;color:#243854}
#mw-starter-offer summary::-webkit-details-marker{display:none}
#mw-starter-offer .mw-faq-item summary::after{content:"+";font-size:22px;font-weight:400;color:#4371bd;line-height:1;flex:0 0 18px;text-align:center}
#mw-starter-offer .mw-faq-item[open] summary::after{content:"−"}
#mw-starter-offer .mw-faq-item p{font-size:14px;line-height:1.8;color:var(--mw-muted);padding:0 28px 22px 0}
#mw-starter-offer .mw-faq-item p a{text-decoration:underline;text-underline-offset:3px}
#mw-starter-offer .mw-closing{padding:0 0 72px}
#mw-starter-offer .mw-closing-box{position:relative;border-radius:18px;background:radial-gradient(ellipse at 90% 0,#255eb2,transparent 60%),#092657;color:#fff;padding:45px 48px;display:flex;align-items:center;justify-content:space-between;gap:38px;overflow:hidden}
#mw-starter-offer .mw-closing h2{font-size:34px;max-width:550px}
#mw-starter-offer .mw-closing p{color:#c5d7f4;font-size:14px;margin-top:13px}
#mw-starter-offer .mw-closing p b{color:#fff}
#mw-starter-offer .mw-closing-action{flex:0 0 auto;text-align:center}
#mw-starter-offer .mw-closing-action>p{font-size:11px;margin-top:10px}
#mw-starter-offer .mw-offer-terms{font-size:11px;color:#69778d;text-align:center;max-width:850px;margin:22px auto 0;line-height:1.8}
#mw-starter-offer .mw-offer-terms a{text-decoration:underline;text-underline-offset:3px}
@media(min-width:1500px){#mw-starter-offer .mw-wrap{width:min(1240px,calc(100% - 100px))}}
@media(max-width:1020px){#mw-starter-offer .mw-wrap{width:calc(100% - 48px)}#mw-starter-offer h1{font-size:49px}#mw-starter-offer .mw-hero-grid{gap:8px;grid-template-columns:1.15fr .9fr}#mw-starter-offer .mw-hero-copy{font-size:15px}#mw-starter-offer .mw-price strong{font-size:65px}#mw-starter-offer .mw-bento{grid-template-columns:1fr 1fr}#mw-starter-offer .mw-feature.mw-scaling{grid-column:span 2;display:grid;grid-template-columns:1fr 1fr;gap:0 35px}#mw-starter-offer .mw-scaling .mw-feature-fine{grid-column:span 2;margin-top:18px}#mw-starter-offer .mw-scale-diagram{margin:0}#mw-starter-offer .mw-platform-grid,#mw-starter-offer .mw-migrate-grid,#mw-starter-offer .mw-faq-grid{gap:36px}#mw-starter-offer .mw-plan-price,#mw-starter-offer .mw-plan-detail{padding:28px}#mw-starter-offer .mw-plan{grid-template-columns:1fr 1.2fr}#mw-starter-offer .mw-inclusions{column-gap:17px}#mw-starter-offer .mw-closing-box{padding:35px}}
@media(max-width:760px){#mw-starter-offer .mw-wrap{width:calc(100% - 40px)}#mw-starter-offer .mw-section{padding-block:58px}#mw-starter-offer .mw-hero{padding-top:36px}#mw-starter-offer .mw-hero-grid{grid-template-columns:1fr;gap:0;padding-bottom:21px}#mw-starter-offer h1{font-size:clamp(39px,8.5vw,56px);max-width:600px}#mw-starter-offer .mw-pill{margin-bottom:21px;font-size:10px}#mw-starter-offer .mw-hero-copy{max-width:550px;margin:18px 0 22px;font-size:15px}#mw-starter-offer .mw-price strong{font-size:68px}#mw-starter-offer .mw-price-row{gap:20px}#mw-starter-offer .mw-price-note{font-size:12px}#mw-starter-offer .mw-hero-art{max-width:430px;width:100%;margin:13px auto 0}#mw-starter-offer .mw-cloud-art{max-height:320px}#mw-starter-offer .mw-art-caption{font-size:9px;margin-top:-8px}#mw-starter-offer .mw-coupon{margin:13px 0 18px}#mw-starter-offer .mw-hero .mw-btn{width:100%}#mw-starter-offer .mw-hero .mw-renewal{text-align:center;font-size:11px}#mw-starter-offer .mw-trust{gap:12px;padding:21px 0;grid-template-columns:1fr 1fr 1fr}#mw-starter-offer .mw-trust-item{gap:7px;flex-direction:column;text-align:center;font-size:10px;line-height:1.4}#mw-starter-offer .mw-trust-item+.mw-trust-item{border-left:0}#mw-starter-offer .mw-spec-grid{grid-template-columns:1fr 1fr;gap:20px 0;padding:25px 0}#mw-starter-offer .mw-mini-spec{padding:0 0 0 23px}#mw-starter-offer .mw-mini-spec:nth-child(odd){padding-left:0}#mw-starter-offer .mw-mini-spec:nth-child(even){border:0}#mw-starter-offer .mw-mini-spec strong{font-size:25px}#mw-starter-offer .mw-mini-spec span{font-size:11px}#mw-starter-offer .mw-section-top{display:block;margin-bottom:27px}#mw-starter-offer .mw-section-top p{margin-top:18px;max-width:600px;font-size:14px}#mw-starter-offer .mw-eyebrow{font-size:10px;margin-bottom:12px}#mw-starter-offer .mw-bento{gap:14px}#mw-starter-offer .mw-feature{padding:23px}#mw-starter-offer .mw-feature h3{font-size:20px}#mw-starter-offer .mw-feature p{font-size:13px}#mw-starter-offer .mw-feature.mw-scaling{padding:27px;display:block}#mw-starter-offer .mw-scaling h3{font-size:28px;max-width:350px}#mw-starter-offer .mw-scale-diagram{max-width:330px;margin:25px auto}#mw-starter-offer .mw-platform-grid,#mw-starter-offer .mw-migrate-grid,#mw-starter-offer .mw-faq-grid{grid-template-columns:1fr;gap:30px}#mw-starter-offer .mw-app-deck{padding:18px}#mw-starter-offer .mw-wp-card{padding:24px}#mw-starter-offer .mw-lead{font-size:16px}#mw-starter-offer .mw-plan{grid-template-columns:1fr}#mw-starter-offer .mw-plan-price{border-right:0;border-bottom:1px solid #d8e3f4;padding:28px}#mw-starter-offer .mw-plan-detail{padding:28px 24px}#mw-starter-offer .mw-center{text-align:left;margin-bottom:27px}#mw-starter-offer .mw-plan-price .mw-price{margin-top:22px}#mw-starter-offer .mw-plan-name h3{font-size:26px}#mw-starter-offer .mw-inclusion strong{font-size:13px}#mw-starter-offer .mw-inclusion{font-size:11px;gap:8px}#mw-starter-offer .mw-inclusion .mw-icon{width:17px;height:17px;flex-basis:17px}#mw-starter-offer .mw-migration{padding:48px 0}#mw-starter-offer .mw-migrate-grid h2{font-size:31px}#mw-starter-offer .mw-faq-intro{position:static}#mw-starter-offer .mw-faq-intro .mw-lead{margin:15px 0 20px}#mw-starter-offer .mw-faq-item summary{font-size:14px;padding:20px 0}#mw-starter-offer .mw-faq-item p{font-size:13px}#mw-starter-offer .mw-closing{padding-bottom:40px}#mw-starter-offer .mw-closing-box{display:block;padding:30px 25px;border-radius:13px}#mw-starter-offer .mw-closing h2{font-size:30px}#mw-starter-offer .mw-closing-action{margin-top:25px}#mw-starter-offer .mw-closing-action .mw-btn{width:100%}#mw-starter-offer .mw-offer-terms{text-align:left;font-size:10px}#mw-starter-offer .mw-closing p{font-size:13px}}
@media(max-width:450px){#mw-starter-offer h1{font-size:clamp(29px,8.6vw,36px)}#mw-starter-offer .mw-bento{grid-template-columns:1fr}#mw-starter-offer .mw-feature.mw-scaling{grid-column:auto}#mw-starter-offer .mw-feature{padding:25px}#mw-starter-offer .mw-feature .mw-feature-icon{margin-bottom:17px}#mw-starter-offer .mw-feature-tags{margin-top:14px}#mw-starter-offer .mw-price strong{font-size:65px}#mw-starter-offer .mw-price-row{gap:14px}#mw-starter-offer .mw-price small{font-size:13px;padding-top:11px}#mw-starter-offer .mw-app-option{padding:14px 11px}#mw-starter-offer .mw-app-option strong{font-size:12px}}
@media(max-width:360px){#mw-starter-offer .mw-price strong{font-size:54px}#mw-starter-offer .mw-price small{font-size:11px}#mw-starter-offer .mw-price-row{gap:9px}#mw-starter-offer .mw-price-note{font-size:10px}#mw-starter-offer .mw-price-note b{font-size:11px}#mw-starter-offer .mw-coupon{gap:7px;font-size:12px}#mw-starter-offer .mw-copy{gap:9px;padding-inline:9px}#mw-starter-offer .mw-receipt{font-size:11px}#mw-starter-offer .mw-receipt .mw-total{font-size:12px}#mw-starter-offer .mw-plan-price{padding:24px}}
@media(prefers-reduced-motion:reduce){#mw-starter-offer *,#mw-starter-offer *::before,#mw-starter-offer *::after{transition:none!important;animation:none!important;scroll-behavior:auto!important}}

#mw-starter-offer [hidden]{display:none!important}
#mw-starter-offer .mw-countdown{margin-top:22px;padding:17px 20px;max-width:410px;background:#061b3f80;border:1px solid #426da366;border-radius:10px}
#mw-starter-offer .mw-clock-top{display:flex;align-items:center;justify-content:space-between;gap:15px;margin-bottom:11px}
#mw-starter-offer .mw-clock-heading{font-size:10px;letter-spacing:.1em;text-transform:uppercase;font-weight:800;color:#fbbb7a}
#mw-starter-offer .mw-clock-duration{font-size:10px;color:#b3c9eb}
#mw-starter-offer .mw-clock{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;max-width:300px}
#mw-starter-offer .mw-clock-unit{display:flex;align-items:baseline;gap:5px;line-height:1.25}
#mw-starter-offer .mw-clock-unit strong{font-size:25px;font-weight:750;letter-spacing:-.025em;font-variant-numeric:tabular-nums;color:#fff}
#mw-starter-offer .mw-clock-unit span{font-size:10px;color:#becfe8}
#mw-starter-offer .mw-clock-deadline{font-size:10px;color:#b7cae7;margin-top:11px;line-height:1.5}
#mw-starter-offer .mw-clock-message{font-size:12px;line-height:1.6;margin-top:11px;color:#f4d2b3}
#mw-starter-offer .mw-clock-message a{text-decoration:underline;text-underline-offset:3px}
#mw-starter-offer .mw-order[aria-disabled="true"]{opacity:.6;cursor:not-allowed;transform:none;box-shadow:none;pointer-events:none}
#mw-starter-offer .mw-copy:disabled{opacity:.55;cursor:not-allowed}
#mw-starter-offer[data-mw-offer-state="expired"] .mw-countdown{border-color:#d08f54}
@media(max-width:760px){#mw-starter-offer .mw-countdown{max-width:none;margin-top:20px;padding:15px 16px}#mw-starter-offer .mw-clock{max-width:340px;gap:8px}#mw-starter-offer .mw-clock-unit strong{font-size:24px}}
@media(max-width:360px){#mw-starter-offer .mw-clock-unit{display:block}#mw-starter-offer .mw-clock-unit span{display:block;margin-top:2px}#mw-starter-offer .mw-clock-top{gap:8px}}

/* Focused technology and urgency update: existing page sections and checkout retained. */
#mw-starter-offer .mw-brand-logo{width:31px;height:31px;flex:0 0 31px;fill:currentColor;stroke:none}
#mw-starter-offer .mw-hero-technologies{max-width:440px;margin:24px auto 0;padding:20px 22px;border:1px solid #4976ba70;border-radius:13px;background:#09255770}
#mw-starter-offer .mw-hero-technologies>p{font-size:10px;text-align:center;letter-spacing:.1em;text-transform:uppercase;color:#a8c5f1;margin-bottom:16px;font-weight:700}
#mw-starter-offer .mw-hero-logo-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px 12px}
#mw-starter-offer .mw-hero-logo-grid>span{display:flex;align-items:center;gap:7px;color:#e0ecff}
#mw-starter-offer .mw-hero-logo-grid .mw-brand-logo{width:23px;height:23px;flex-basis:23px}
#mw-starter-offer .mw-hero-logo-grid b{font-size:11px;font-weight:650;letter-spacing:-.01em}
#mw-starter-offer .mw-hero-technologies>a{display:block;color:#a8c5f1;text-align:center;font-size:10px;margin-top:17px;text-decoration:underline;text-underline-offset:4px}
#mw-starter-offer .mw-stack-line{display:flex;align-items:center;gap:9px;flex-wrap:wrap;margin-top:27px;padding-top:22px;border-top:1px solid #d5dfef;color:#526982;font-size:12px}
#mw-starter-offer .mw-stack-line .mw-brand-logo{width:24px;height:24px;flex-basis:24px;color:#376395}
#mw-starter-offer .mw-stack-line>span{color:#90a1b9;margin:0 5px}
#mw-starter-offer .mw-app-deck-title{font-size:12px;font-weight:750;color:#36557e;margin-bottom:17px}
#mw-starter-offer .mw-technology-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
#mw-starter-offer .mw-technology-card{display:flex;align-items:center;gap:12px;padding:18px 15px;min-height:89px;background:#fff;border:1px solid #d4e0f2;border-radius:10px;box-shadow:0 3px 12px #28457905}
#mw-starter-offer .mw-technology-card .mw-brand-logo{color:var(--mw-brand)}
#mw-starter-offer .mw-technology-card strong{display:block;font-size:14px;color:#243a5b;letter-spacing:-.02em}
#mw-starter-offer .mw-technology-card span{display:block;font-size:10px;line-height:1.5;color:#667992;margin-top:3px}
#mw-starter-offer .mw-tech-note{font-size:11px;color:#5b6e88;line-height:1.7;margin-top:17px}
#mw-starter-offer .mw-tech-note b{font-weight:650}
#mw-starter-offer .mw-logo-credit{font-size:10px;border-top:1px solid #ced9e9;padding-top:10px}
#mw-starter-offer .mw-logo-credit a{text-decoration:underline;text-underline-offset:3px}
#mw-starter-offer .mw-countdown{border-color:#d89b546b;background:linear-gradient(110deg,#69401e22,#0a285666);margin:15px 0 17px;max-width:410px}
#mw-starter-offer .mw-clock-top{flex-wrap:wrap;gap:8px}
#mw-starter-offer .mw-clock-heading{color:#ffc487;font-size:11px}
#mw-starter-offer .mw-clock-duration{color:#ffc487;font-weight:750;font-size:9px;letter-spacing:.04em;padding:2px 6px;border:1px solid #cd934e66;border-radius:4px}
#mw-starter-offer .mw-deal-note{font-size:11px;color:#d4e1f5;line-height:1.6;margin-top:11px;max-width:330px}
#mw-starter-offer .mw-clock-deadline{margin-top:7px}
#mw-starter-offer[data-mw-offer-state="expired"] .mw-deal-note,#mw-starter-offer[data-mw-offer-state="invalid"] .mw-deal-note{display:none}
@media(max-width:1020px) and (min-width:761px){#mw-starter-offer .mw-hero-logo-grid{grid-template-columns:repeat(2,1fr)}#mw-starter-offer .mw-technology-card{flex-direction:column;align-items:flex-start;gap:9px;padding:16px 12px}}
@media(max-width:760px){#mw-starter-offer .mw-hero-technologies{margin-top:18px;padding:18px 15px}#mw-starter-offer .mw-hero-logo-grid{gap:17px 8px}#mw-starter-offer .mw-hero-logo-grid>span{gap:5px}#mw-starter-offer .mw-hero-logo-grid b{font-size:10px}#mw-starter-offer .mw-hero-logo-grid .mw-brand-logo{width:20px;height:20px;flex-basis:20px}#mw-starter-offer .mw-technology-grid{gap:10px}#mw-starter-offer .mw-technology-card{padding:16px 12px;min-height:108px;flex-direction:column;align-items:flex-start;gap:10px}#mw-starter-offer .mw-technology-card .mw-brand-logo{width:29px;height:29px;flex-basis:29px}#mw-starter-offer .mw-technology-card strong{font-size:13px}#mw-starter-offer .mw-tech-note{font-size:10px}#mw-starter-offer .mw-countdown{max-width:none;margin:14px 0 17px}#mw-starter-offer .mw-deal-note{font-size:10px}}
@media(max-width:360px){#mw-starter-offer .mw-hero-logo-grid{grid-template-columns:repeat(2,1fr)}#mw-starter-offer .mw-stack-line{gap:7px;font-size:11px}#mw-starter-offer .mw-stack-line>span{margin:0 1px}#mw-starter-offer .mw-stack-line .mw-brand-logo{width:21px;height:21px;flex-basis:21px}}
/* Approved banner hierarchy: WordPress benefit, cloud value, Linux platform. */
#mw-starter-offer .mw-hero-positioning{display:flex;align-items:center;flex-wrap:wrap;gap:12px 17px;margin-bottom:25px}
#mw-starter-offer .mw-wordpress-badge{display:inline-flex;align-items:center;gap:9px;padding:8px 12px;border:1px solid #749ac575;border-radius:30px;background:#15396b;color:#f2f7ff;font-size:12px;font-weight:750;line-height:1.4;white-space:nowrap}
#mw-starter-offer .mw-wordpress-badge .mw-brand-logo{width:22px;height:22px;flex-basis:22px;color:#c8dfff}
#mw-starter-offer .mw-linux-label{font-size:10px;font-weight:650;letter-spacing:.07em;text-transform:uppercase;color:#aec7ed}
#mw-starter-offer .mw-offer-label{display:flex;align-items:center;gap:7px;color:#ffc184;font-size:10px;line-height:1.5;font-weight:750;letter-spacing:.1em;text-transform:uppercase;margin:0 0 12px}
#mw-starter-offer .mw-offer-label>span{width:5px;height:5px;flex:0 0 5px;border-radius:50%;background:#ffac51}
#mw-starter-offer .mw-hero{padding-top:48px}
#mw-starter-offer .mw-hero h1{font-size:clamp(44px,4.35vw,62px);line-height:1.08;max-width:620px}
#mw-starter-offer .mw-hero-copy{font-size:16px;line-height:1.65;margin:20px 0 23px}
#mw-starter-offer .mw-hero .mw-coupon{margin:13px 0 15px}
#mw-starter-offer .mw-hero .mw-countdown{padding:14px 18px}
@media(max-width:1020px) and (min-width:761px){#mw-starter-offer .mw-hero h1{font-size:clamp(34px,4.55vw,46px)}#mw-starter-offer .mw-hero-positioning{gap:10px 13px}#mw-starter-offer .mw-hero-copy{font-size:14px}}
@media(max-width:760px){#mw-starter-offer .mw-hero{padding-top:32px}#mw-starter-offer .mw-hero h1{font-size:clamp(32px,8.7vw,54px);line-height:1.1}#mw-starter-offer .mw-hero-positioning{gap:10px 12px;margin-bottom:22px}#mw-starter-offer .mw-wordpress-badge{font-size:11px;padding:7px 10px;gap:7px}#mw-starter-offer .mw-wordpress-badge .mw-brand-logo{width:20px;height:20px;flex-basis:20px}#mw-starter-offer .mw-linux-label{font-size:9px;letter-spacing:.025em}#mw-starter-offer .mw-hero-copy{font-size:14px;line-height:1.65;margin:17px 0 22px}#mw-starter-offer .mw-offer-label{font-size:9px;margin-bottom:10px}}
@media(max-width:360px){#mw-starter-offer .mw-hero .mw-btn{font-size:14px;padding-inline:16px;gap:12px}#mw-starter-offer .mw-clock-heading{font-size:9px;letter-spacing:.07em}#mw-starter-offer .mw-clock-duration{font-size:8px;padding:2px 4px}#mw-starter-offer .mw-hero .mw-save span{display:block;margin:3px 0 0}}
</style>

<div id="mw-starter-offer" data-mw-offer-start="2026-10-29T14:59:40+05:00">
  <svg width="0" height="0" aria-hidden="true" style="position:absolute;overflow:hidden"><defs>
    <symbol id="mw-i-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 5l7 7-7 7"/></symbol>
    <symbol id="mw-i-check" viewBox="0 0 24 24"><path d="m5 12 4 4 10-10"/></symbol>
    <symbol id="mw-i-copy" viewBox="0 0 24 24"><rect x="8" y="8" width="12" height="13" rx="2"/><path d="M16 8V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h4"/></symbol>
    <symbol id="mw-i-cloud" viewBox="0 0 24 24"><path d="M6 18a5 5 0 1 1 1-9.9A6 6 0 0 1 18.6 9 4.5 4.5 0 1 1 0 9H6Z"/></symbol>
    <symbol id="mw-i-server" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="7" rx="2"/><rect x="3" y="14" width="18" height="7" rx="2"/><path d="M7 6.5h.01M7 17.5h.01M12 6.5h5M12 17.5h5"/></symbol>
    <symbol id="mw-i-shield" viewBox="0 0 24 24"><path d="M12 2 3 6v6c0 5 9 10 9 10s9-5 9-10V6l-9-4Z"/><path d="m8 12 3 3 5-6"/></symbol>
    <symbol id="mw-i-speed" viewBox="0 0 24 24"><path d="M4 18a10 10 0 1 1 16 0H4ZM12 13l5-5M6 11l1 1M11 5v2"/><circle cx="12" cy="13" r="1.5"/></symbol>
    <symbol id="mw-i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18M5 6h14M5 18h14"/></symbol>
    <symbol id="mw-i-mail" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="m3 6 9 7 9-7"/></symbol>
    <symbol id="mw-i-move" viewBox="0 0 24 24"><path d="M3 7h17M16 3l4 4-4 4M21 17H4M8 13l-4 4 4 4"/></symbol>
    <symbol id="mw-i-support" viewBox="0 0 24 24"><path d="M4 14v-3a8 8 0 0 1 16 0v6c0 3-4 4-8 4"/><rect x="2" y="10" width="4" height="8" rx="2"/><rect x="18" y="10" width="4" height="8" rx="2"/></symbol>
    <symbol id="mw-i-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 4 18 4 18 0V5M3 12c0 4 18 4 18 0"/></symbol>
    <symbol id="mw-i-panel" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="18" rx="3"/><path d="M2 9h20M8 9v12M5 6h.01M8 6h.01"/></symbol>
    <symbol id="mw-i-lock" viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3M12 14v3"/></symbol>
    <symbol id="mw-i-branch" viewBox="0 0 24 24"><rect x="9" y="2" width="6" height="5" rx="1"/><rect x="2" y="17" width="6" height="5" rx="1"/><rect x="16" y="17" width="6" height="5" rx="1"/><path d="M12 7v5M5 17v-5h14v5"/></symbol>

    <!-- Brand silhouettes: Simple Icons 13.21.0 (CC0), embedded to avoid external requests.
      https://github.com/simple-icons/simple-icons/tree/13.21.0
      PHP logo: Colin Viebrock, CC BY-SA 4.0; https://www.php.net/download-logos.php
      https://creativecommons.org/licenses/by-sa/4.0/ . Marks identify software, not endorsements. -->
    <symbol id="mw-brand-wordpress" viewBox="0 0 24 24"><path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"/></symbol>
    <symbol id="mw-brand-php" viewBox="0 0 24 24"><path d="M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .97-.105 1.242-.314.272-.21.455-.559.55-1.049.092-.47.05-.802-.124-.995-.175-.193-.523-.29-1.047-.29zM12 5.688C5.373 5.688 0 8.514 0 12s5.373 6.313 12 6.313S24 15.486 24 12c0-3.486-5.373-6.312-12-6.312zm-3.26 7.451c-.261.25-.575.438-.917.551-.336.108-.765.164-1.285.164H5.357l-.327 1.681H3.652l1.23-6.326h2.65c.797 0 1.378.209 1.744.628.366.418.476 1.002.33 1.752a2.836 2.836 0 0 1-.305.847c-.143.255-.33.49-.561.703zm4.024.715l.543-2.799c.063-.318.039-.536-.068-.651-.107-.116-.336-.174-.687-.174H11.46l-.704 3.625H9.388l1.23-6.327h1.367l-.327 1.682h1.218c.767 0 1.295.134 1.586.401s.378.7.263 1.299l-.572 2.944h-1.389zm7.597-2.265a2.782 2.782 0 0 1-.305.847c-.143.255-.33.49-.561.703a2.44 2.44 0 0 1-.917.551c-.336.108-.765.164-1.286.164h-1.18l-.327 1.682h-1.378l1.23-6.326h2.649c.797 0 1.378.209 1.744.628.366.417.477 1.001.331 1.751zM17.766 10.207h-.943l-.516 2.648h.838c.557 0 .971-.105 1.242-.314.272-.21.455-.559.551-1.049.092-.47.049-.802-.125-.995s-.524-.29-1.047-.29z"/></symbol>
    <symbol id="mw-brand-laravel" viewBox="0 0 24 24"><path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033l.038.027c.013.014.02.03.033.045.008.011.02.021.025.033.01.02.017.038.024.058.003.011.01.021.013.032.01.031.014.064.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.012-.015.021-.03.033-.043.012-.012.025-.02.037-.028.014-.01.026-.023.041-.032h.001l4.513-2.598a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.042.031.012.01.025.018.036.028.013.014.022.03.034.044.008.012.019.021.024.033.011.02.018.04.024.06.006.01.012.021.015.032zm-.74 5.032V6.179l-1.578.908-2.182 1.256v4.283zm-4.51 7.75v-4.287l-2.147 1.225-6.126 3.498v4.325zM1.093 3.624v14.588l8.273 4.761v-4.325l-4.322-2.445-.002-.003H5.04c-.014-.01-.025-.021-.04-.031-.011-.01-.024-.018-.035-.027l-.001-.002c-.013-.012-.021-.025-.031-.04-.01-.011-.021-.022-.028-.036h-.002c-.008-.014-.013-.031-.02-.047-.006-.016-.014-.027-.018-.043a.49.49 0 01-.008-.057c-.002-.014-.006-.027-.006-.041V5.789l-2.18-1.257zM5.23.81L1.47 2.974l3.76 2.164 3.758-2.164zm1.956 13.505l2.182-1.256V3.624l-1.58.91-2.182 1.255v9.435zm11.581-10.95l-3.76 2.163 3.76 2.163 3.759-2.164zm-.376 4.978L16.21 7.087 14.63 6.18v4.283l2.182 1.256 1.58.908zm-8.65 9.654l5.514-3.148 2.756-1.572-3.757-2.163-4.323 2.489-3.941 2.27z"/></symbol>
    <symbol id="mw-brand-joomla" viewBox="0 0 24 24"><path d="M16.719 14.759L14.22 17.26l-2.37 2.37-.462.466c-1.368 1.365-3.297 1.83-5.047 1.397-.327 1.424-1.604 2.49-3.13 2.49C1.438 23.983 0 22.547 0 20.772c0-1.518 1.055-2.789 2.469-3.123-.446-1.76.016-3.705 1.396-5.08l.179-.18 2.37 2.37-.184.181c-.769.779-.769 2.024 0 2.789.771.78 2.022.78 2.787 0l.465-.465 2.367-2.371 2.502-2.506 2.368 2.372zm.924 6.652c-1.822.563-3.885.12-5.328-1.318l-.18-.185 2.365-2.369.18.184c.771.768 2.018.768 2.787 0 .765-.765.769-2.01-.004-2.781l-.466-.465-2.365-2.37-2.502-2.503 2.37-2.369 2.499 2.505 2.367 2.37.464.464c1.365 1.36 1.846 3.278 1.411 5.021 1.56.224 2.759 1.56 2.759 3.18 0 1.784-1.439 3.21-3.209 3.21-1.545 0-2.851-1.096-3.135-2.565l-.013-.009zM6.975 9.461l2.508-2.505 2.37-2.369.462-.461C13.74 2.7 15.772 2.251 17.58 2.79c.212-1.561 1.555-2.775 3.179-2.775 1.772 0 3.211 1.437 3.211 3.209 0 1.631-1.216 2.978-2.79 3.186.519 1.799.068 3.816-1.35 5.234l-.182.184-2.369-2.369.184-.184c.769-.77.769-2.016 0-2.783-.766-.766-2.011-.768-2.781.003l-.462.461-2.37 2.369-2.505 2.502-2.37-2.366zm-2.653 2.647l-.461-.462C2.43 10.215 1.986 8.17 2.529 6.358 1.1 6.029.03 4.754.03 3.224.03 1.454 1.47.015 3.24.015c1.596 0 2.92 1.166 3.17 2.691 1.73-.405 3.626.065 4.979 1.415l.184.185-2.37 2.37-.183-.181c-.77-.765-2.016-.765-2.785 0-.771.781-.77 2.025-.005 2.79l.465.466 2.37 2.369 2.505 2.505-2.367 2.37-2.51-2.505-2.371-2.37v-.012z"/></symbol>
    <symbol id="mw-brand-drupal" viewBox="0 0 24 24"><path d="M15.78 5.113C14.09 3.425 12.48 1.815 11.998 0c-.48 1.815-2.09 3.425-3.778 5.113-2.534 2.53-5.405 5.4-5.405 9.702a9.184 9.185 0 1018.368 0c0-4.303-2.871-7.171-5.405-9.702M6.72 16.954c-.563-.019-2.64-3.6 1.215-7.416l2.55 2.788a.218.218 0 01-.016.325c-.61.625-3.204 3.227-3.527 4.126-.066.186-.164.18-.222.177M12 21.677a3.158 3.158 0 01-3.158-3.159 3.291 3.291 0 01.787-2.087c.57-.696 2.37-2.655 2.37-2.655s1.774 1.988 2.367 2.649a3.09 3.09 0 01.792 2.093A3.158 3.158 0 0112 21.677m6.046-5.123c-.068.15-.223.398-.431.405-.371.014-.411-.177-.686-.583-.604-.892-5.864-6.39-6.848-7.455-.866-.935-.122-1.595.223-1.94C10.736 6.547 12 5.285 12 5.285s3.766 3.574 5.336 6.016c1.57 2.443 1.029 4.556.71 5.253"/></symbol>
    <symbol id="mw-brand-magento" viewBox="0 0 24 24"><path d="M12 24l-4.455-2.572v-12l2.97-1.715v12.001l1.485.902 1.485-.902V7.713l2.971 1.715v12L12 24zM22.391 6v12l-2.969 1.714V7.713L12 3.43 4.574 7.713v12.001L1.609 18V6L12 0l10.391 6z"/></symbol>
    <symbol id="mw-brand-mysql" viewBox="0 0 24 24"><path d="M16.405 5.501c-.115 0-.193.014-.274.033v.013h.014c.054.104.146.18.214.273.054.107.1.214.154.32l.014-.015c.094-.066.14-.172.14-.333-.04-.047-.046-.094-.08-.14-.04-.067-.126-.1-.18-.153zM5.77 18.695h-.927a50.854 50.854 0 00-.27-4.41h-.008l-1.41 4.41H2.45l-1.4-4.41h-.01a72.892 72.892 0 00-.195 4.41H0c.055-1.966.192-3.81.41-5.53h1.15l1.335 4.064h.008l1.347-4.064h1.095c.242 2.015.384 3.86.428 5.53zm4.017-4.08c-.378 2.045-.876 3.533-1.492 4.46-.482.716-1.01 1.073-1.583 1.073-.153 0-.34-.046-.566-.138v-.494c.11.017.24.026.386.026.268 0 .483-.075.647-.222.197-.18.295-.382.295-.605 0-.155-.077-.47-.23-.944L6.23 14.615h.91l.727 2.36c.164.536.233.91.205 1.123.4-1.064.678-2.227.835-3.483zm12.325 4.08h-2.63v-5.53h.885v4.85h1.745zm-3.32.135l-1.016-.5c.09-.076.177-.158.255-.25.433-.506.648-1.258.648-2.253 0-1.83-.718-2.746-2.155-2.746-.704 0-1.254.232-1.65.697-.43.508-.646 1.256-.646 2.245 0 .972.19 1.686.574 2.14.35.41.877.615 1.583.615.264 0 .506-.033.725-.098l1.325.772.36-.622zM15.5 17.588c-.225-.36-.337-.94-.337-1.736 0-1.393.424-2.09 1.27-2.09.443 0 .77.167.977.5.224.362.336.936.336 1.723 0 1.404-.424 2.108-1.27 2.108-.445 0-.77-.167-.978-.5zm-1.658-.425c0 .47-.172.856-.516 1.156-.344.3-.803.45-1.384.45-.543 0-1.064-.172-1.573-.515l.237-.476c.438.22.833.328 1.19.328.332 0 .593-.073.783-.22a.754.754 0 00.3-.615c0-.33-.23-.61-.648-.845-.388-.213-1.163-.657-1.163-.657-.422-.307-.632-.636-.632-1.177 0-.45.157-.81.47-1.085.315-.278.72-.415 1.22-.415.512 0 .98.136 1.4.41l-.213.476a2.726 2.726 0 00-1.064-.23c-.283 0-.502.068-.654.206a.685.685 0 00-.248.524c0 .328.234.61.666.85.393.215 1.187.67 1.187.67.433.305.648.63.648 1.168zm9.382-5.852c-.535-.014-.95.04-1.297.188-.1.04-.26.04-.274.167.055.053.063.14.11.214.08.134.218.313.346.407.14.11.28.216.427.31.26.16.555.255.81.416.145.094.293.213.44.313.073.05.12.14.214.172v-.02c-.046-.06-.06-.147-.105-.214-.067-.067-.134-.127-.2-.193a3.223 3.223 0 00-.695-.675c-.214-.146-.682-.35-.77-.595l-.013-.014c.146-.013.32-.066.46-.106.227-.06.435-.047.67-.106.106-.027.213-.06.32-.094v-.06c-.12-.12-.21-.283-.334-.395a8.867 8.867 0 00-1.104-.823c-.21-.134-.476-.22-.697-.334-.08-.04-.214-.06-.26-.127-.12-.146-.19-.34-.275-.514a17.69 17.69 0 01-.547-1.163c-.12-.262-.193-.523-.34-.763-.69-1.137-1.437-1.826-2.586-2.5-.247-.14-.543-.2-.856-.274-.167-.008-.334-.02-.5-.027-.11-.047-.216-.174-.31-.235-.38-.24-1.364-.76-1.644-.072-.18.434.267.862.422 1.082.115.153.26.328.34.5.047.116.06.235.107.356.106.294.207.622.347.897.073.14.153.287.247.413.054.073.146.107.167.227-.094.136-.1.334-.154.5-.24.757-.146 1.693.194 2.25.107.166.362.534.703.393.3-.12.234-.5.32-.835.02-.08.007-.133.048-.187v.015c.094.188.188.367.274.555.206.328.566.668.867.895.16.12.287.328.487.402v-.02h-.015c-.043-.058-.1-.086-.154-.133a3.445 3.445 0 01-.35-.4 8.76 8.76 0 01-.747-1.218c-.11-.21-.202-.436-.29-.643-.04-.08-.04-.2-.107-.24-.1.146-.247.273-.32.453-.127.288-.14.642-.188 1.01-.027.007-.014 0-.027.014-.214-.052-.287-.274-.367-.46-.2-.475-.233-1.238-.06-1.785.047-.14.247-.582.167-.716-.042-.127-.174-.2-.247-.303a2.478 2.478 0 01-.24-.427c-.16-.374-.24-.788-.414-1.162-.08-.173-.22-.354-.334-.513-.127-.18-.267-.307-.368-.52-.033-.073-.08-.194-.027-.274.014-.054.042-.075.094-.09.088-.072.335.022.422.062.247.1.455.194.662.334.094.066.195.193.315.226h.14c.214.047.455.014.655.073.355.114.675.28.962.46a5.953 5.953 0 012.085 2.286c.08.154.115.295.188.455.14.33.313.663.455.982.14.315.275.636.476.897.1.14.502.213.682.286.133.06.34.115.46.188.23.14.454.3.67.454.11.076.443.243.463.378z"/></symbol>
    <symbol id="mw-brand-linux" viewBox="0 0 24 24"><path d="M12.504 0c-.155 0-.315.008-.48.021-4.226.333-3.105 4.807-3.17 6.298-.076 1.092-.3 1.953-1.05 3.02-.885 1.051-2.127 2.75-2.716 4.521-.278.832-.41 1.684-.287 2.489a.424.424 0 00-.11.135c-.26.268-.45.6-.663.839-.199.199-.485.267-.797.4-.313.136-.658.269-.864.68-.09.189-.136.394-.132.602 0 .199.027.4.055.536.058.399.116.728.04.97-.249.68-.28 1.145-.106 1.484.174.334.535.47.94.601.81.2 1.91.135 2.774.6.926.466 1.866.67 2.616.47.526-.116.97-.464 1.208-.946.587-.003 1.23-.269 2.26-.334.699-.058 1.574.267 2.577.2.025.134.063.198.114.333l.003.003c.391.778 1.113 1.132 1.884 1.071.771-.06 1.592-.536 2.257-1.306.631-.765 1.683-1.084 2.378-1.503.348-.199.629-.469.649-.853.023-.4-.2-.811-.714-1.376v-.097l-.003-.003c-.17-.2-.25-.535-.338-.926-.085-.401-.182-.786-.492-1.046h-.003c-.059-.054-.123-.067-.188-.135a.357.357 0 00-.19-.064c.431-1.278.264-2.55-.173-3.694-.533-1.41-1.465-2.638-2.175-3.483-.796-1.005-1.576-1.957-1.56-3.368.026-2.152.236-6.133-3.544-6.139zm.529 3.405h.013c.213 0 .396.062.584.198.19.135.33.332.438.533.105.259.158.459.166.724 0-.02.006-.04.006-.06v.105a.086.086 0 01-.004-.021l-.004-.024a1.807 1.807 0 01-.15.706.953.953 0 01-.213.335.71.71 0 00-.088-.042c-.104-.045-.198-.064-.284-.133a1.312 1.312 0 00-.22-.066c.05-.06.146-.133.183-.198.053-.128.082-.264.088-.402v-.02a1.21 1.21 0 00-.061-.4c-.045-.134-.101-.2-.183-.333-.084-.066-.167-.132-.267-.132h-.016c-.093 0-.176.03-.262.132a.8.8 0 00-.205.334 1.18 1.18 0 00-.09.4v.019c.002.089.008.179.02.267-.193-.067-.438-.135-.607-.202a1.635 1.635 0 01-.018-.2v-.02a1.772 1.772 0 01.15-.768c.082-.22.232-.406.43-.533a.985.985 0 01.594-.2zm-2.962.059h.036c.142 0 .27.048.399.135.146.129.264.288.344.465.09.199.14.4.153.667v.004c.007.134.006.2-.002.266v.08c-.03.007-.056.018-.083.024-.152.055-.274.135-.393.2.012-.09.013-.18.003-.267v-.015c-.012-.133-.04-.2-.082-.333a.613.613 0 00-.166-.267.248.248 0 00-.183-.064h-.021c-.071.006-.13.04-.186.132a.552.552 0 00-.12.27.944.944 0 00-.023.33v.015c.012.135.037.2.08.334.046.134.098.2.166.268.01.009.02.018.034.024-.07.057-.117.07-.176.136a.304.304 0 01-.131.068 2.62 2.62 0 01-.275-.402 1.772 1.772 0 01-.155-.667 1.759 1.759 0 01.08-.668 1.43 1.43 0 01.283-.535c.128-.133.26-.2.418-.2zm1.37 1.706c.332 0 .733.065 1.216.399.293.2.523.269 1.052.468h.003c.255.136.405.266.478.399v-.131a.571.571 0 01.016.47c-.123.31-.516.643-1.063.842v.002c-.268.135-.501.333-.775.465-.276.135-.588.292-1.012.267a1.139 1.139 0 01-.448-.067 3.566 3.566 0 01-.322-.198c-.195-.135-.363-.332-.612-.465v-.005h-.005c-.4-.246-.616-.512-.686-.71-.07-.268-.005-.47.193-.6.224-.135.38-.271.483-.336.104-.074.143-.102.176-.131h.002v-.003c.169-.202.436-.47.839-.601.139-.036.294-.065.466-.065zm2.8 2.142c.358 1.417 1.196 3.475 1.735 4.473.286.534.855 1.659 1.102 3.024.156-.005.33.018.513.064.646-1.671-.546-3.467-1.089-3.966-.22-.2-.232-.335-.123-.335.59.534 1.365 1.572 1.646 2.757.13.535.16 1.104.021 1.67.067.028.135.06.205.067 1.032.534 1.413.938 1.23 1.537v-.043c-.06-.003-.12 0-.18 0h-.016c.151-.467-.182-.825-1.065-1.224-.915-.4-1.646-.336-1.77.465-.008.043-.013.066-.018.135-.068.023-.139.053-.209.064-.43.268-.662.669-.793 1.187-.13.533-.17 1.156-.205 1.869v.003c-.02.334-.17.838-.319 1.35-1.5 1.072-3.58 1.538-5.348.334a2.645 2.645 0 00-.402-.533 1.45 1.45 0 00-.275-.333c.182 0 .338-.03.465-.067a.615.615 0 00.314-.334c.108-.267 0-.697-.345-1.163-.345-.467-.931-.995-1.788-1.521-.63-.4-.986-.87-1.15-1.396-.165-.534-.143-1.085-.015-1.645.245-1.07.873-2.11 1.274-2.763.107-.065.037.135-.408.974-.396.751-1.14 2.497-.122 3.854a8.123 8.123 0 01.647-2.876c.564-1.278 1.743-3.504 1.836-5.268.048.036.217.135.289.202.218.133.38.333.59.465.21.201.477.335.876.335.039.003.075.006.11.006.412 0 .73-.134.997-.268.29-.134.52-.334.74-.4h.005c.467-.135.835-.402 1.044-.7zm2.185 8.958c.037.6.343 1.245.882 1.377.588.134 1.434-.333 1.791-.765l.211-.01c.315-.007.577.01.847.268l.003.003c.208.199.305.53.391.876.085.4.154.78.409 1.066.486.527.645.906.636 1.14l.003-.007v.018l-.003-.012c-.015.262-.185.396-.498.595-.63.401-1.746.712-2.457 1.57-.618.737-1.37 1.14-2.036 1.191-.664.053-1.237-.2-1.574-.898l-.005-.003c-.21-.4-.12-1.025.056-1.69.176-.668.428-1.344.463-1.897.037-.714.076-1.335.195-1.814.12-.465.308-.797.641-.984l.045-.022zm-10.814.049h.01c.053 0 .105.005.157.014.376.055.706.333 1.023.752l.91 1.664.003.003c.243.533.754 1.064 1.189 1.637.434.598.77 1.131.729 1.57v.006c-.057.744-.48 1.148-1.125 1.294-.645.135-1.52.002-2.395-.464-.968-.536-2.118-.469-2.857-.602-.369-.066-.61-.2-.723-.4-.11-.2-.113-.602.123-1.23v-.004l.002-.003c.117-.334.03-.752-.027-1.118-.055-.401-.083-.71.043-.94.16-.334.396-.4.69-.533.294-.135.64-.202.915-.47h.002v-.002c.256-.268.445-.601.668-.838.19-.201.38-.336.663-.336zm7.159-9.074c-.435.201-.945.535-1.488.535-.542 0-.97-.267-1.28-.466-.154-.134-.28-.268-.373-.335-.164-.134-.144-.333-.074-.333.109.016.129.134.199.2.096.066.215.2.36.333.292.2.68.467 1.167.467.485 0 1.053-.267 1.398-.466.195-.135.445-.334.648-.467.156-.136.149-.267.279-.267.128.016.034.134-.147.332a8.097 8.097 0 01-.69.468zm-1.082-1.583V5.64c-.006-.02.013-.042.029-.05.074-.043.18-.027.26.004.063 0 .16.067.15.135-.006.049-.085.066-.135.066-.055 0-.092-.043-.141-.068-.052-.018-.146-.008-.163-.065zm-.551 0c-.02.058-.113.049-.166.066-.047.025-.086.068-.14.068-.05 0-.13-.02-.136-.068-.01-.066.088-.133.15-.133.08-.031.184-.047.259-.005.019.009.036.03.03.05v.02h.003z"/></symbol>
    <symbol id="mw-brand-woocommerce" viewBox="0 9.3 8.2 5.4" overflow="hidden"><path d="M.754 9.58a.754.754 0 00-.754.758v2.525c0 .42.339.758.758.758h3.135l1.431.799-.326-.799h2.373a.757.757 0 00.758-.758v-2.525a.757.757 0 00-.758-.758H.754zm2.709.445h.03c.065.001.124.023.179.067a.26.26 0 01.103.19.29.29 0 01-.033.16c-.13.239-.236.64-.322 1.199-.083.541-.114.965-.094 1.267a.392.392 0 01-.039.219.213.213 0 01-.176.12c-.086.006-.177-.034-.263-.124-.31-.316-.555-.788-.735-1.416-.216.425-.375.744-.478.957-.196.376-.363.568-.502.578-.09.007-.166-.069-.233-.228-.17-.436-.352-1.277-.548-2.524a.297.297 0 01.054-.222c.047-.064.116-.095.21-.102.169-.013.265.065.288.238.103.695.217 1.284.336 1.766l.727-1.387c.066-.126.15-.192.25-.199.146-.01.237.083.273.28.083.441.188.817.315 1.136.086-.844.233-1.453.44-1.828a.255.255 0 01.218-.147zm1.293.36c.056 0 .116.006.18.02.232.05.411.177.53.386.107.18.161.395.161.654 0 .343-.087.654-.26.94-.2.332-.459.5-.781.5a.88.88 0 01-.18-.022.763.763 0 01-.531-.384 1.287 1.287 0 01-.158-.659c0-.342.085-.655.258-.937.202-.333.462-.498.78-.498zm2.084 0c.056 0 .116.006.18.02.236.05.411.177.53.386.107.18.16.395.16.654 0 .343-.086.654-.259.94-.2.332-.459.5-.781.5a.88.88 0 01-.18-.022.763.763 0 01-.531-.384 1.287 1.287 0 01-.16-.659c0-.342.087-.655.26-.937.202-.333.462-.498.78-.498zm4.437.047c-.305 0-.546.102-.718.304-.173.203-.256.49-.256.856 0 .395.086.697.256.906.17.21.418.316.744.316.315 0 .559-.107.728-.316.17-.21.256-.504.256-.883s-.087-.673-.26-.879c-.176-.202-.424-.304-.75-.304zm-1.466.002a1.13 1.13 0 00-.84.326c-.223.22-.332.499-.332.838 0 .362.108.658.328.88.22.223.505.336.861.336.103 0 .22-.016.346-.052v-.54c-.117.034-.216.051-.303.051a.545.545 0 01-.422-.177c-.106-.12-.16-.278-.16-.48 0-.19.053-.348.156-.468a.498.498 0 01.397-.181c.103 0 .212.015.332.049v-.537a1.394 1.394 0 00-.363-.045zm12.414 0a1.135 1.135 0 00-.84.326c-.223.22-.332.499-.332.838 0 .362.108.658.328.88.22.223.506.336.861.336.103 0 .22-.016.346-.052v-.54c-.116.034-.216.051-.303.051a.545.545 0 01-.422-.177c-.106-.12-.16-.278-.16-.48 0-.19.053-.348.156-.468a.498.498 0 01.397-.181c.103 0 .212.015.332.049v-.537a1.394 1.394 0 00-.363-.045zm-9.598.06l-.29 2.264h.579l.156-1.559.395 1.559h.412l.379-1.555.164 1.555h.603l-.304-2.264h-.791l-.12.508c-.03.13-.06.264-.087.4l-.067.352a29.97 29.97 0 00-.258-1.26h-.771zm2.768 0l-.29 2.264h.579l.156-1.559.396 1.559h.412l.375-1.555.165 1.555h.603l-.305-2.264h-.789l-.119.508c-.03.13-.06.264-.086.4l-.066.352c-.063-.352-.15-.771-.26-1.26h-.771zm3.988 0v2.264h.611v-1.031h.012l.494 1.03h.645l-.489-1.019a.61.61 0 00.37-.552.598.598 0 00-.25-.506c-.167-.123-.394-.186-.68-.186h-.713zm3.377 0v2.264H24v-.483h-.63v-.414h.54v-.468h-.54v-.416h.626v-.483H22.76zm-4.793.004v2.264h1.24v-.483h-.627v-.416h.541v-.468h-.54v-.415h.622v-.482h-1.236zm2.025.432c.146.003.25.025.313.072.063.046.091.12.091.227 0 .156-.135.236-.404.24v-.54zm-15.22.011c-.104 0-.205.069-.301.211a1.078 1.078 0 00-.2.639c0 .096.02.2.06.303.049.13.117.198.196.215.083.016.173-.02.27-.106.123-.11.205-.273.252-.492.016-.077.023-.16.023-.246 0-.097-.02-.2-.06-.303-.05-.13-.116-.198-.196-.215a.246.246 0 00-.045-.006zm2.083 0c-.103 0-.204.069-.3.211a1.078 1.078 0 00-.2.639c0 .096.02.2.06.303.049.13.117.198.196.215.083.016.173-.02.27-.106.123-.11.205-.273.252-.492.013-.077.023-.16.023-.246 0-.097-.02-.2-.06-.303-.05-.13-.116-.198-.196-.215a.246.246 0 00-.045-.006zm4.428.006c.233 0 .354.218.354.66-.004.273-.038.46-.098.553a.293.293 0 01-.262.139.266.266 0 01-.242-.139c-.056-.093-.084-.28-.084-.562 0-.436.11-.65.332-.65Z"/></symbol>
  </defs></svg>

  <section class="mw-hero" aria-labelledby="mw-offer-title">
    <div class="mw-wrap">
      <div class="mw-hero-grid">
        <div>
          <div class="mw-hero-positioning"><span class="mw-wordpress-badge"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-wordpress"/></svg>Best for WordPress</span><span class="mw-linux-label">Linux Cloud Hosting</span></div>
          <h1 id="mw-offer-title">Big Cloud Power.<br><em>Small First-Year Price.</em></h1>
          <p class="mw-hero-copy">Give your WordPress website room to grow with autoscaling CPU &amp; RAM, fast NVMe storage and free SSL. Launch your first site or bring your existing website with free migration assistance.</p>
          <p class="mw-offer-label"><span aria-hidden="true"></span>6-day hosting offer</p>
          <div class="mw-price-row">
            <div class="mw-price"><small>PKR</small><strong>999</strong></div>
            <div class="mw-price-note"><b>for your first year</b>12 months of hosting</div>
          </div>
          <p class="mw-save">Regular annual price <s>PKR 2,999</s><span>Save PKR 2000</span></p>
          <div class="mw-coupon"><span>Use coupon</span><button class="mw-copy" type="button" data-mw-copy aria-label="Copy coupon GOSTARTER"><strong>GOSTARTER</strong><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-copy"/></svg><span class="mw-copy-label">Copy</span></button></div>
          <div class="mw-countdown" aria-label="Six-day hosting offer countdown">
            <div class="mw-clock-top"><span class="mw-clock-heading" data-mw-clock-heading>Your saving ends in</span><span class="mw-clock-duration">6 DAYS ONLY</span></div>
            <div class="mw-clock" data-mw-clock role="timer" aria-live="off" aria-label="Time remaining in days, hours, minutes and seconds" hidden>
              <div class="mw-clock-unit"><strong data-mw-days>00</strong><span>days</span></div>
              <div class="mw-clock-unit"><strong data-mw-hours>00</strong><span>hrs</span></div>
              <div class="mw-clock-unit"><strong data-mw-minutes>00</strong><span>min</span></div>
              <div class="mw-clock-unit"><strong data-mw-seconds>00</strong><span>sec</span></div>
            </div>
            <p class="mw-deal-note">Claim your PKR 2000 first-year discount before this window closes.</p>
            <p class="mw-clock-deadline">Ends <time data-mw-offer-end datetime="2026-11-04T14:59:40+05:00">4 Nov 2026, 02:59 PM PKT</time></p>
            <p class="mw-clock-message" data-mw-clock-message role="status" aria-live="polite" hidden></p>
          </div>
          <a class="mw-btn mw-order" href="https://www.mwhoster.com/clientarea/index.php/store/shared-linux-hosting/shared-starter?currency=2&billingcycle=annually&promocode=GOSTARTER">Claim This Hosting Offer <svg class="mw-icon" aria-hidden="true"><use href="#mw-i-arrow"/></svg></a>
          <p class="mw-renewal">One-time first-year discount. <b>Renews at PKR 2,999/year.</b><br>Hosting plan only · Domain and website design are separate.</p>

        </div>
        <div class="mw-hero-art">
          <svg class="mw-cloud-art" viewBox="0 0 570 510" role="img" aria-labelledby="mw-cloud-title mw-cloud-desc">
            <title id="mw-cloud-title">Linux cloud hosting for CMS websites, stores and PHP applications</title>
            <desc id="mw-cloud-desc">Illustration of layered cloud servers with NVMe storage, SSL security and autoscaling compute.</desc>
            <defs>
              <linearGradient id="mw-surface" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#b6d4ff"/><stop offset=".5" stop-color="#669bff"/><stop offset="1" stop-color="#3d70e8"/></linearGradient>
              <linearGradient id="mw-face" x1="0" y1="0" x2="0" y2="1"><stop stop-color="#2867df"/><stop offset="1" stop-color="#1049af"/></linearGradient>
              <linearGradient id="mw-top" x1="0" y1="0" x2="0" y2="1"><stop stop-color="#eff7ff"/><stop offset="1" stop-color="#9cbfff"/></linearGradient>
              <linearGradient id="mw-orange-g" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#ffc36c"/><stop offset="1" stop-color="#f58b27"/></linearGradient>
              <radialGradient id="mw-glow"><stop stop-color="#4289ff" stop-opacity=".45"/><stop offset="1" stop-color="#4289ff" stop-opacity="0"/></radialGradient>
            </defs>
            <ellipse cx="289" cy="296" rx="274" ry="206" fill="url(#mw-glow)"/>
            <g fill="none" stroke="#6ea3ff" opacity=".25"><ellipse cx="291" cy="346" rx="247" ry="123"/><ellipse cx="291" cy="346" rx="204" ry="100"/><path d="M43 346h496M291 224v246"/></g>
            <path d="M282 430 95 330v-22l187 99 190-99v22Z" fill="#0c3375" stroke="#3769b8"/>
            <path d="m95 308 187-100 190 100-190 99Z" fill="#123b7e" stroke="#4a7fca"/>
            <g>
              <path d="m124 272 158-83 158 83-158 84Z" fill="url(#mw-surface)" stroke="#9dc1ff"/>
              <path d="M124 272v44l158 84v-44Z" fill="url(#mw-face)" stroke="#367ae7"/>
              <path d="m282 356 158-84v44l-158 84Z" fill="#0c3a90" stroke="#367ae7"/>
              <path d="m147 296 55 29M147 304l55 29M147 312l55 29" stroke="#89b6ff" stroke-width="2" opacity=".8"/>
              <g fill="#7effd5"><ellipse cx="235" cy="350" rx="3" ry="4"/><ellipse cx="248" cy="357" rx="3" ry="4"/></g>
              <path d="m313 359 92-49" stroke="#427bd4" stroke-width="5"/>
            </g>
            <g>
              <path d="m124 211 158-83 158 83-158 84Z" fill="url(#mw-surface)" stroke="#b4d0ff"/>
              <path d="M124 211v44l158 84v-44Z" fill="url(#mw-face)" stroke="#4b87f0"/>
              <path d="m282 295 158-84v44l-158 84Z" fill="#12489f" stroke="#467fe0"/>
              <path d="m147 235 55 29M147 243l55 29M147 251l55 29" stroke="#98bfff" stroke-width="2"/>
              <g fill="#7effd5"><ellipse cx="235" cy="289" rx="3" ry="4"/><ellipse cx="248" cy="296" rx="3" ry="4"/></g>
              <path d="m313 299 92-49" stroke="#528fe9" stroke-width="5"/>
            </g>
            <g>
              <path d="m124 151 158-83 158 83-158 84Z" fill="url(#mw-top)" stroke="#d5e6ff"/>
              <path d="M124 151v44l158 84v-44Z" fill="#4485ee" stroke="#6ca5ff"/>
              <path d="m282 235 158-84v44l-158 84Z" fill="#225dbe" stroke="#75a5f4"/>
              <path d="m147 175 55 29M147 183l55 29M147 191l55 29" stroke="#c4dcff" stroke-width="2"/>
              <g fill="#a9ffe5"><ellipse cx="235" cy="229" rx="3" ry="4"/><ellipse cx="248" cy="236" rx="3" ry="4"/></g>
              <path d="m313 239 92-49" stroke="#81b0f7" stroke-width="5"/>
              <path d="m219 152 64-34 64 34-64 34Z" fill="#2268dc" stroke="#fff" stroke-width="2"/>
              <path d="m238 152 45-24 45 24-45 24Z" fill="#578ff0"/>
              <path d="M256 153c-8-4-6-11 3-14 6-12 29-12 38-2 14-1 21 11 11 16l-22 12Z" fill="#e3f1ff"/>
            </g>
            <g stroke="#87b6ff" fill="none" stroke-width="1.5" stroke-dasharray="5 6" opacity=".7"><path d="M122 174 66 145V98M439 197l59-35v-38M319 405l66 35h74"/></g>
            <g transform="translate(10 44)">
              <rect width="158" height="66" rx="13" fill="#173f7e" stroke="#5888c8"/>
              <circle cx="34" cy="33" r="21" fill="#f0f6ff"/>
              <svg x="21" y="20" width="26" height="26" fill="#1c4f86" aria-hidden="true"><use href="#mw-brand-wordpress"/></svg>
              <text x="65" y="29" font-family="Arial,sans-serif" font-size="13" font-weight="bold" fill="#fff">WordPress</text>
              <text x="65" y="47" font-family="Arial,sans-serif" font-size="10" fill="#c0d5f4">Best for WordPress</text>
            </g>
            <g transform="translate(417 64)">
              <rect width="140" height="65" rx="13" fill="#173f7e" stroke="#5888c8"/>
              <rect x="15" y="18" width="28" height="29" rx="6" fill="#173560" stroke="#86b4ff"/>
              <path d="M22 25h14M22 32h14M22 39h8" stroke="#a9cdff" stroke-width="2"/>
              <text x="55" y="30" font-family="Arial,sans-serif" font-size="13" font-weight="bold" fill="#fff">NVMe SSD</text>
              <text x="55" y="47" font-family="Arial,sans-serif" font-size="10" fill="#c0d5f4">Fast storage</text>
            </g>
            <g transform="translate(380 341)">
              <path d="M0 20 47 0l47 20v43c0 30-47 53-47 53S0 93 0 63Z" fill="url(#mw-orange-g)" stroke="#ffcc81" stroke-width="2"/>
              <path d="m25 56 16 15 28-33" stroke="#714114" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
              <text x="47" y="92" text-anchor="middle" font-family="Arial,sans-serif" font-size="12" font-weight="bold" fill="#603714">FREE SSL</text>
            </g>
            <g transform="translate(26 366)">
              <rect width="177" height="64" rx="12" fill="#153d79" stroke="#5383c4"/>
              <path d="m17 39 10-10 9 5 13-17M41 17h8v8" stroke="#8fc3ff" stroke-width="2" fill="none"/>
              <text x="63" y="28" font-family="Arial,sans-serif" font-size="12" font-weight="bold" fill="#fff">CPU + RAM</text>
              <text x="63" y="46" font-family="Arial,sans-serif" font-size="11" fill="#bad1f2">Autoscaling cloud</text>
            </g>
            <g fill="#9fc5ff"><circle cx="201" cy="38" r="3"/><circle cx="503" cy="274" r="3"/><circle cx="74" cy="255" r="2"/></g>
          </svg>
          <p class="mw-art-caption"><b>Linux platform</b> &nbsp; · &nbsp; PHP + MySQL</p>
          <div class="mw-hero-technologies" aria-label="Other website technologies"><p>Also built for your PHP websites</p><div class="mw-hero-logo-grid"><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-php"/></svg><b>PHP</b></span><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-laravel"/></svg><b>Laravel</b></span><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-joomla"/></svg><b>Joomla</b></span><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-drupal"/></svg><b>Drupal</b></span><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-woocommerce"/></svg><b>WooCommerce</b></span><span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-mysql"/></svg><b>MySQL</b></span></div><a href="#mw-app-title">Explore technologies &amp; compatibility <span aria-hidden="true">↓</span></a></div>
        </div>
      </div>
      <div class="mw-trust">
        <div class="mw-trust-item"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-shield"/></svg><span>30-day money-back guarantee*</span></div>
        <div class="mw-trust-item"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-move"/></svg><span>Free migration assistance</span></div>
        <div class="mw-trust-item"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-support"/></svg><span>24/7 technical support</span></div>
      </div>
    </div>
  </section>

  <section class="mw-spec-strip" aria-label="Starter Cloud at a glance"><div class="mw-wrap mw-spec-grid">
    <div class="mw-mini-spec"><strong>5 GB NVMe</strong><span>Fast SSD storage for your site</span></div>
    <div class="mw-mini-spec"><strong>2 websites</strong><span>One plan, two web projects</span></div>
    <div class="mw-mini-spec"><strong>20 GB</strong><span>Bandwidth included</span></div>
    <div class="mw-mini-spec"><strong>5 mailboxes</strong><span>Email on your own domain</span></div>
  </div></section>

  <section class="mw-section" aria-labelledby="mw-power-title"><div class="mw-wrap">
    <div class="mw-section-top"><div><span class="mw-eyebrow">The hosting behind the offer</span><h2 id="mw-power-title">Small first-year price.<br>Serious cloud foundations.</h2></div><p>A website needs more than disk space. Starter Cloud brings together compute, fast storage, security and tools that make everyday hosting easier.</p></div>
    <div class="mw-bento">
      <article class="mw-feature mw-scaling"><div><span class="mw-eyebrow">Cloud infrastructure</span><h3>CPU &amp; RAM that scale with demand.</h3><p>Your site runs on an autoscaling, load-balanced platform. Requests are distributed across healthy servers, with no fixed account-wide CloudLinux LVE quota.</p></div><div class="mw-scale-diagram" aria-label="Illustration of load balancing across cloud servers"><div class="mw-request">Your website’s incoming requests</div><div class="mw-branches" aria-hidden="true"></div><div class="mw-server-nodes"><div class="mw-node"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-server"/></svg></div><div class="mw-node"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-server"/></svg></div><div class="mw-node"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-server"/></svg></div></div><div class="mw-scale-caption">Load-balanced cloud · Autoscaling compute</div></div><p class="mw-feature-fine">Storage and bandwidth remain within your plan. Per-script PHP limits and acceptable-use conditions still apply.</p></article>
      <article class="mw-feature"><div class="mw-feature-icon"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-speed"/></svg></div><h3>A faster foundation.</h3><p>NVMe SSD storage serves your files, while PHP-FPM and OPcache reduce repeated PHP processing for WordPress and other PHP applications.</p><div class="mw-feature-tags"><span>NVMe SSD</span><span>PHP-FPM</span><span>OPcache</span></div></article>
      <article class="mw-feature"><div class="mw-feature-icon"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-shield"/></svg></div><h3>Security, built in.</h3><p>Free SSL encrypts visitor connections. DDoS protection helps absorb traffic floods, and automatic malware scanning flags suspicious files.</p><div class="mw-feature-tags"><span>Free SSL</span><span>DDoS protection</span></div></article>
      <article class="mw-feature"><div class="mw-feature-icon"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-globe"/></svg></div><h3>Lighter pages. Closer delivery.</h3><p>CDN delivery brings eligible cached content closer to visitors. Image optimisation and CSS/JavaScript minification tools help reduce page weight.</p><div class="mw-feature-tags"><span>CDN</span><span>Image optimisation</span></div></article>
      <article class="mw-feature"><div class="mw-feature-icon"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-panel"/></svg></div><h3>Your website, under control.</h3><p>Manage files, databases and domain email from one hosting control panel. Get help with setup, domain connections and troubleshooting, 24/7.</p><div class="mw-feature-tags"><span>Control panel</span><span>Business email</span></div></article>
    </div>
  </div></section>

  <section class="mw-section mw-platform" aria-labelledby="mw-app-title"><div class="mw-wrap mw-platform-grid">
    <div><span class="mw-eyebrow">Your stack. Your website.</span><h2 id="mw-app-title">One Linux platform.<br>More ways to build.</h2><p class="mw-lead">A home for WordPress, Joomla, Drupal and your own PHP websites. Build a business presence, launch a small store or deploy a compatible web application.</p><ul class="mw-check-list">
      <li><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-check"/></svg><span><b>Choose the CMS you know.</b><br>WordPress, Joomla and Drupal for blogs, business websites and content portals.</span></li>
      <li><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-check"/></svg><span><b>Build beyond a brochure website.</b><br>Run a suitable WooCommerce store, Laravel project or custom PHP/MySQL application.</span></li>
      <li><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-check"/></svg><span><b>Keep your hosting essentials together.</b><br>Manage website files, databases, domain email and SSL from your control panel.</span></li>
    </ul><div class="mw-stack-line"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-linux"/></svg><strong>Linux</strong><span>+</span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-php"/></svg><strong>PHP</strong><span>+</span><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-mysql"/></svg><strong>MySQL</strong></div></div>
    <div class="mw-app-deck"><p class="mw-app-deck-title">Popular technologies for your next project</p><div class="mw-technology-grid"><div class="mw-technology-card" style="--mw-brand:#21759b"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-wordpress"/></svg><div><strong>WordPress</strong><span>Blogs &amp; business sites</span></div></div><div class="mw-technology-card" style="--mw-brand:#777bb4"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-php"/></svg><div><strong>PHP</strong><span>Your own PHP websites</span></div></div><div class="mw-technology-card" style="--mw-brand:#2256a3"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-joomla"/></svg><div><strong>Joomla</strong><span>CMS &amp; content portals</span></div></div><div class="mw-technology-card" style="--mw-brand:#0678be"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-drupal"/></svg><div><strong>Drupal</strong><span>Structured content sites</span></div></div><div class="mw-technology-card" style="--mw-brand:#96588a"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-woocommerce"/></svg><div><strong>WooCommerce</strong><span>Small online stores</span></div></div><div class="mw-technology-card" style="--mw-brand:#4479a1"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-mysql"/></svg><div><strong>MySQL</strong><span>Database-backed projects</span></div></div><div class="mw-technology-card" style="--mw-brand:#ff2d20"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-laravel"/></svg><div><strong>Laravel*</strong><span>Custom web applications</span></div></div><div class="mw-technology-card" style="--mw-brand:#ee672f"><svg class="mw-brand-logo" aria-hidden="true"><use href="#mw-brand-magento"/></svg><div><strong>Magento*</strong><span>Ask us for a suitable plan</span></div></div></div><p class="mw-tech-note">Applications must fit the plan’s storage, bandwidth, database and software requirements. <b>Magento needs a compatibility check and may require a different hosting plan.</b></p><details class="mw-compatibility"><summary>Check Laravel, Magento &amp; app requirements</summary><p><b>Laravel:</b> check your application’s PHP version, extensions, public folder setup and any queue or scheduler requirements with support.</p><p><b>Magento:</b> modern installations need additional services, including a supported search engine. Ask for a suitable hosting recommendation before ordering Starter Cloud.</p><p><b>CMS sites and stores:</b> choose a supported application version, and keep site size, traffic, extensions and plugins within your package’s allowances.</p><p class="mw-logo-credit">Logos identify their respective projects, without implying endorsement. Icons via <a href="https://simpleicons.org/">Simple Icons</a>. PHP logo by Colin Viebrock, <a href="https://creativecommons.org/licenses/by-sa/4.0/">CC BY-SA 4.0</a>.</p></details></div>
  </div></section>

  <section class="mw-section mw-plan-section" id="mw-starter-plan" aria-labelledby="mw-plan-title"><div class="mw-wrap">
    <div class="mw-center"><span class="mw-eyebrow">One plan. Everything clearly listed.</span><h2 id="mw-plan-title">Meet your Starter Cloud plan.</h2><p class="mw-lead">For your own website, a client project or a move from another host.</p></div>
    <div class="mw-plan">
      <div class="mw-plan-price"><div class="mw-plan-name"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-cloud"/></svg><h3>Starter Cloud</h3></div><p>Linux cloud hosting · Annual plan</p><div class="mw-price"><small>PKR</small><strong>999</strong></div><div class="mw-year-label">for the first 12 months</div><div class="mw-receipt"><div><span>Regular annual hosting</span><span>PKR 2,999</span></div><div class="mw-discount"><span>GOSTARTER discount</span><span>− PKR 2000</span></div><div class="mw-total"><span>First-year hosting total</span><span>PKR 999</span></div></div><a class="mw-btn mw-order" href="https://www.mwhoster.com/clientarea/index.php/store/shared-linux-hosting/shared-starter?currency=2&billingcycle=annually&promocode=GOSTARTER">Claim Starter Cloud <svg class="mw-icon" aria-hidden="true"><use href="#mw-i-arrow"/></svg></a><p class="mw-renewal"><b>Renews at PKR 2,999/year.</b><br>Use GOSTARTER at checkout.</p></div>
      <div class="mw-plan-detail"><h3>Your package includes</h3><div class="mw-inclusions">
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-server"/></svg><div><strong>5 GB NVMe SSD</strong>Website and hosting storage</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-globe"/></svg><div><strong>20 GB bandwidth</strong>Data transfer allowance</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-panel"/></svg><div><strong>2 websites</strong>Host two web projects</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-mail"/></svg><div><strong>5 email accounts</strong>Email using your domain</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-branch"/></svg><div><strong>5 subdomains</strong>Organise your web presence</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-database"/></svg><div><strong>5 MySQL databases</strong>Up to 1 GB per database</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-lock"/></svg><div><strong>Free SSL</strong>Encrypted HTTPS connections</div></div>
        <div class="mw-inclusion"><svg class="mw-icon" aria-hidden="true"><use href="#mw-i-support"/></svg><div><strong>24/7 technical support</strong>Help with your hosting</div></div>
      </div><div class="mw-plan-note"><b>Already have a domain?</b> Connect it to your new hosting. Domain registration, website design and ongoing website management are separate from this offer.</div></div>
    </div>
  </div></section>

  <section class="mw-migration" aria-labelledby="mw-move-title"><div class="mw-wrap mw-migrate-grid"><div><span class="mw-eyebrow">Already hosted somewhere else?</span><h2 id="mw-move-title">Bring your website.<br>We’ll help with the move.</h2><p>Free migration assistance for your website files, databases and email. Our team can guide moves from cPanel, Plesk and DirectAdmin, and review other setups with you.</p><a class="mw-link" href="https://www.mwhoster.com/contact/">Discuss your migration <span aria-hidden="true">↗</span></a></div><ol class="mw-steps"><li><span class="mw-step-no">01</span><div><strong>Choose Starter Cloud</strong><p>Select annual billing and apply GOSTARTER for the first-year offer.</p></div></li><li><span class="mw-step-no">02</span><div><strong>Plan the move with our team</strong><p>Tell support about your current hosting and what you need transferred.</p></div></li><li><span class="mw-step-no">03</span><div><strong>Check your site, then connect your domain</strong><p>Review the migrated website before updating your domain’s nameservers.</p></div></li></ol></div></section>

  <section class="mw-section" aria-labelledby="mw-faq-title"><div class="mw-wrap mw-faq-grid"><div class="mw-faq-intro"><span class="mw-eyebrow">Before you get started</span><h2 id="mw-faq-title">Clear answers.<br>No guesswork.</h2><p class="mw-lead">Know what you’re buying, how the coupon works and what happens next year.</p><a class="mw-link" href="https://www.mwhoster.com/contact/">Ask a hosting question <span aria-hidden="true">↗</span></a></div><div>
    <details class="mw-faq-item" open><summary>How does the GOSTARTER offer work?</summary><p>Choose the Starter Cloud annual plan and use <b>GOSTARTER</b> at checkout. The one-time coupon reduces your first 12 months of hosting from PKR 2,999 to <b>PKR 999</b>. Check that the discount appears before paying. The discount applies to hosting, not domain purchases or other services.</p></details>
    <details class="mw-faq-item"><summary>What will I pay when my hosting renews?</summary><p>The annual renewal price for this offer is <b>PKR 2,999/year</b>. GOSTARTER discounts the first year only; it is not a recurring or lifetime discount.</p></details>
    <details class="mw-faq-item"><summary>Is a domain or a complete website included?</summary><p>This is a hosting plan. A domain name, custom website design, content creation and ongoing website management are not included. You can connect an existing domain or purchase a domain separately, then install WordPress or upload your website.</p></details>
    <details class="mw-faq-item"><summary>Can I move my current website to this plan?</summary><p>Yes—free migration assistance is available for website files, databases and email. Contact support to confirm that your current site’s size, software and requirements fit Starter Cloud before arranging the transfer.</p></details>
    <details class="mw-faq-item"><summary>Which website technologies can I use?</summary><p>Starter Cloud is Linux web hosting for compatible PHP/MySQL websites, including WordPress, Joomla, Drupal, small WooCommerce stores and suitable custom PHP or Laravel applications. Your application version, extensions and resource needs must fit the plan. Modern Magento requires additional services: contact support to confirm a suitable hosting plan before ordering.</p></details>
    <details class="mw-faq-item"><summary>What if the hosting isn’t right for me?</summary><p>Hosting is covered by a <a href="https://www.mwhoster.com/terms-conditions/">30-day money-back guarantee</a>, subject to the published terms. Refunds cover the hosting amount paid; domain charges and other excluded services are not refundable under this guarantee. Request assistance through a support ticket.</p></details>
    <details class="mw-faq-item"><summary>Can I upgrade when I need more space?</summary><p>Yes. Contact support when you need more storage, websites, mailboxes, databases or bandwidth. CPU and RAM autoscaling is already part of the shared cloud platform; your package’s other allocations still apply.</p></details>
  </div></div></section>

  <section class="mw-closing" aria-labelledby="mw-ready-title"><div class="mw-wrap"><div class="mw-closing-box"><div><span class="mw-eyebrow" style="color:#a3c5ff">A six-day window. A full year of hosting.</span><h2 id="mw-ready-title">Don’t miss your PKR 2000<br>Affordable Pricing</h2><p>Claim Starter Cloud for <b>PKR 999</b> with <b>GOSTARTER</b> before the offer closes.</p></div><div class="mw-closing-action"><a class="mw-btn mw-order" href="https://www.mwhoster.com/clientarea/index.php/store/shared-linux-hosting/shared-starter?currency=2&billingcycle=annually&promocode=GOSTARTER">Claim Starter Cloud <svg class="mw-icon" aria-hidden="true"><use href="#mw-i-arrow"/></svg></a><p>Then PKR 2,999/year on renewal.</p></div></div><p class="mw-offer-terms">Offer applies to the first 12 months of Starter Cloud annual hosting with GOSTARTER. Domain registration and additional services are separate. Plan allowances and acceptable-use conditions apply. *30-day hosting money-back guarantee subject to <a href="https://www.mwhoster.com/terms-conditions/">terms and conditions</a>.</p></div></section>
  <span class="mw-sr" data-mw-copy-status role="status" aria-live="polite"></span>
</div>

<script>
(function(){
  'use strict';
  var root=document.getElementById('mw-starter-offer');
  if(!root || root.dataset.mwReady==='true') return;
  root.dataset.mwReady='true';
  var copyButton=root.querySelector('[data-mw-copy]');
  var status=root.querySelector('[data-mw-copy-status]');
  // Change data-mw-offer-start on the root element to your actual launch time.
  // A fixed timestamp + six days is shared by all visitors; it never resets.
  var campaignStart=Date.parse(root.getAttribute('data-mw-offer-start'));
  var campaignEnd=campaignStart+6*24*60*60*1000;
  var clock=root.querySelector('[data-mw-clock]');
  var clockHeading=root.querySelector('[data-mw-clock-heading]');
  var clockMessage=root.querySelector('[data-mw-clock-message]');
  var endTime=root.querySelector('[data-mw-offer-end]');
  var units=['days','hours','minutes','seconds'].map(function(unit){return root.querySelector('[data-mw-'+unit+']');});
  var orderLinks=Array.from(root.querySelectorAll('.mw-order')).map(function(link){return {element:link,href:link.getAttribute('href'),html:link.innerHTML};});
  var lastPhase='';
  function localDate(timestamp){
    return new Intl.DateTimeFormat('en-GB',{timeZone:'Asia/Karachi',day:'numeric',month:'short',year:'numeric',hour:'numeric',minute:'2-digit',hour12:true}).format(new Date(timestamp))+' PKT';
  }
  function setPhase(phase){
    if(phase===lastPhase)return;
    lastPhase=phase;root.setAttribute('data-mw-offer-state',phase);
    var active=phase==='active';
    orderLinks.forEach(function(item){
      var link=item.element;
      if(active){link.setAttribute('href',item.href);link.removeAttribute('aria-disabled');link.removeAttribute('tabindex');link.innerHTML=item.html;}
      else{link.removeAttribute('href');link.setAttribute('aria-disabled','true');link.setAttribute('tabindex','-1');link.textContent=phase==='upcoming'?'Offer starts soon':'Offer unavailable';if(phase==='expired')link.textContent='Offer ended';}
    });
    copyButton.disabled=!active;
    clockMessage.hidden=active;
    if(active){clockHeading.textContent='Your saving ends in';clockMessage.textContent='';}
    else if(phase==='upcoming'){clockHeading.textContent='Offer starts in';clockMessage.textContent='This six-day offer starts '+localDate(campaignStart)+'.';}
    else if(phase==='expired'){clockHeading.textContent='Offer ended';clockMessage.textContent='This six-day offer has ended. ';var link=document.createElement('a');link.href='https://www.mwhoster.com/shared-web-hosting/';link.textContent='View regular hosting plans';clockMessage.appendChild(link);}
    else{clockHeading.textContent='Offer timing unavailable';clockMessage.textContent='Please contact MW Hoster to confirm offer availability.';}
  }
  function renderCountdown(){
    if(!Number.isFinite(campaignStart)){setPhase('invalid');clock.hidden=true;return;}
    var now=Date.now();
    var phase=now<campaignStart?'upcoming':now>=campaignEnd?'expired':'active';
    var target=phase==='upcoming'?campaignStart:campaignEnd;
    var remaining=Math.max(0,Math.ceil((target-now)/1000));
    var values=[Math.floor(remaining/86400),Math.floor(remaining/3600)%24,Math.floor(remaining/60)%60,remaining%60];
    units.forEach(function(unit,i){unit.textContent=String(values[i]).padStart(2,'0');});
    clock.hidden=false;setPhase(phase);
  }
  if(Number.isFinite(campaignStart)){endTime.dateTime=new Date(campaignEnd).toISOString();endTime.textContent=localDate(campaignEnd);}
  renderCountdown();
  var countdownInterval=window.setInterval(function(){if(!root.isConnected){window.clearInterval(countdownInterval);return;}renderCountdown();},1000);
  document.addEventListener('visibilitychange',function(){if(!document.hidden)renderCountdown();});

  copyButton.addEventListener('click',async function(){
    var copied=false;
    try{
      if(navigator.clipboard && window.isSecureContext){await navigator.clipboard.writeText('GOSTARTER');copied=true;}
    }catch(error){copied=false;}
    if(!copied){
      var area=document.createElement('textarea');
      area.value='GOSTARTER';area.setAttribute('readonly','');area.setAttribute('aria-label','Coupon code');
      area.style.cssText='position:fixed;top:0;left:0;opacity:0;pointer-events:none';
      root.appendChild(area);area.select();
      try{copied=document.execCommand('copy');}catch(error){copied=false;}
      area.remove();copyButton.focus();
    }
    copyButton.querySelector('.mw-copy-label').textContent=copied?'Copied':'Select';
    status.textContent=copied?'Coupon GOSTARTER copied. Use it at checkout.':'Select and copy the code GOSTARTER manually.';
    if(!copied){var range=document.createRange();range.selectNodeContents(copyButton.querySelector('strong'));var sel=window.getSelection();if(sel){sel.removeAllRanges();sel.addRange(range);}}
  });
})();
</script>
<?php get_footer(); ?>  