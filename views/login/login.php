<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fuerza Motriz S.A.C. — ERP</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
    /* Estilos originales preservados */
    ,::before,*::after{box-sizing:border-box;margin:0;padding:0}
    :root{
      --red:#d42b2b;--blue:#1a3a7c;--blue2:#2650a8;
      --white:#ffffff;--light:#eef1f8;
      --border:rgba(26,58,124,0.1);--text:#0f1f45;--muted:#6b7fa3;
    }
    html,body{height:100%;font-family:'Inter',sans-serif;background:var(--light);overflow:hidden}
    .bg{position:fixed;inset:0;z-index:0;background:linear-gradient(135deg,#e4e9f5 0%,#eef1f8 50%,#e8ecf6 100%)}
    .bg::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(-45deg,transparent,transparent 60px,rgba(26,58,124,0.02) 60px,rgba(26,58,124,0.02) 61px)}
    .gears-bg{position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden}
    .gear{position:absolute;opacity:0.13}
    @keyframes gear-cw{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
    @keyframes gear-ccw{from{transform:rotate(0deg)}to{transform:rotate(-360deg)}}
    .g1{bottom:-80px;left:-80px} .g1 svg{animation:gear-cw 24s linear infinite;display:block}
    .g2{bottom:40px;left:160px} .g2 svg{animation:gear-ccw 15s linear infinite;display:block}
    .g3{top:-90px;right:-90px} .g3 svg{animation:gear-cw 32s linear infinite;display:block}
    .g4{top:60px;right:200px} .g4 svg{animation:gear-ccw 19s linear infinite;display:block}
    .g5{top:calc(50% - 110px);left:-60px} .g5 svg{animation:gear-cw 26s linear infinite;display:block}
    .g6{top:calc(44% - 85px);right:-50px} .g6 svg{animation:gear-ccw 21s linear infinite;display:block}
    .g7{bottom:130px;left:43%} .g7 svg{animation:gear-cw 17s linear infinite;display:block}
    .g8{top:80px;left:40%} .g8 svg{animation:gear-ccw 29s linear infinite;display:block}
    .page{position:relative;z-index:1;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
    .card{width:100%;max-width:920px;display:flex;border-radius:24px;overflow:hidden;box-shadow:0 4px 6px rgba(26,58,124,0.04),0 20px 60px rgba(26,58,124,0.16),0 40px 100px rgba(26,58,124,0.1);animation:cardIn .8s cubic-bezier(.22,1,.36,1) both;min-height:580px;}
    @keyframes cardIn{from{opacity:0;transform:translateY(30px) scale(.97)}to{opacity:1;transform:none}}
    .left{flex:1;position:relative;background:linear-gradient(160deg,#0f1f45 0%,#1a3a7c 45%,#6b1515 100%);display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 36px;overflow:hidden;}
    .left::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;border:1px solid rgba(255,255,255,0.05);top:-120px;left:-120px}
    .left::after{content:'';position:absolute;width:300px;height:300px;border-radius:50%;border:1px solid rgba(255,255,255,0.04);bottom:-80px;right:-80px}
    .left-noise{position:absolute;inset:0;background:repeating-linear-gradient(-55deg,transparent,transparent 30px,rgba(255,255,255,0.015) 30px,rgba(255,255,255,0.015) 31px)}
    .left-glow{position:absolute;top:-60px;right:-60px;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(212,43,43,0.25) 0%,transparent 65%)}
    .left-glow2{position:absolute;bottom:-80px;left:-40px;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(26,58,124,0.4) 0%,transparent 65%)}
    .tribar{position:absolute;left:0;top:0;bottom:0;width:5px;background:linear-gradient(to bottom,var(--red) 33%,rgba(255,255,255,0.15) 33%,rgba(255,255,255,0.15) 66%,#2650a8 66%)}
    .logo-panel{position:relative;z-index:1;display:flex;flex-direction:column;align-items:center;gap:22px;text-align:center}
    .logo-box{background:#fff;border-radius:18px;padding:22px 28px;box-shadow:0 8px 32px rgba(0,0,0,0.25),0 2px 8px rgba(0,0,0,0.15);display:flex;align-items:center;justify-content:center;}
    .logo-box img{width:200px;height:auto;display:block;animation:logoIn .7s .2s cubic-bezier(.22,1,.36,1) both;}
    @keyframes logoIn{from{opacity:0;transform:scale(.88) translateY(10px)}to{opacity:1;transform:none}}
    .left-divider{width:44px;height:2px;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent);border-radius:2px}
    .left-tagline{font-family:'Rajdhani',sans-serif;font-size:12px;font-weight:600;color:rgba(255,255,255,0.55);letter-spacing:.18em;text-transform:uppercase;line-height:2}
    .left-tagline span{display:block}
    .left-badges{display:flex;flex-direction:column;gap:9px;width:100%}
    .badge{display:flex;align-items:center;gap:10px;background:rgba(255,255,255,0.09);border:1px solid rgba(255,255,255,0.12);border-radius:11px;padding:10px 14px;backdrop-filter:blur(6px)}
    .badge-icon{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
    .bi-red{background:rgba(212,43,43,0.25)}
    .bi-blue{background:rgba(255,255,255,0.12)}
    .bi-green{background:rgba(34,197,94,0.18)}
    .badge-text{font-size:11px;color:rgba(255,255,255,0.55);line-height:1.4}
    .badge-text strong{display:block;font-size:12px;color:rgba(255,255,255,0.9);font-weight:600}
    .pulse-dot{width:6px;height:6px;border-radius:50%;background:#22c55e;box-shadow:0 0 0 0 rgba(34,197,94,.5);animation:pulse 2s ease infinite;display:inline-block;margin-right:5px;vertical-align:middle}
    @keyframes pulse{0%{box-shadow:0 0 0 0 rgba(34,197,94,.5)}70%{box-shadow:0 0 0 7px rgba(34,197,94,0)}100%{box-shadow:0 0 0 0 rgba(34,197,94,0))}}
    .right{width:400px;flex-shrink:0;background:#fff;display:flex;flex-direction:column;animation:slideRight .7s .1s cubic-bezier(.22,1,.36,1) both}
    @keyframes slideRight{from{opacity:0;transform:translateX(20px)}to{opacity:1;transform:none}}
    .topbar{height:4px;background:linear-gradient(90deg,var(--red) 33%,#fff 33%,#fff 66%,var(--blue) 66%)}
    .right-body{flex:1;padding:36px 32px 24px;display:flex;flex-direction:column;justify-content:center}
    .right-title{font-family:'Rajdhani',sans-serif;font-size:22px;font-weight:700;color:var(--text);letter-spacing:.02em;margin-bottom:3px;animation:fadeUp .4s .4s ease both}
    .right-sub{font-size:12px;color:var(--muted);margin-bottom:26px;animation:fadeUp .4s .47s ease both}
    .tabs{display:flex;margin-bottom:22px;background:#f0f3fa;border-radius:10px;padding:4px;animation:fadeUp .4s .37s ease both}
    .tab{flex:1;padding:9px 6px;border:none;background:none;cursor:pointer;font-family:'Rajdhani',sans-serif;font-size:13px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:var(--muted);border-radius:7px;transition:all .22s}
    .tab.active{background:#fff;color:var(--blue);box-shadow:0 2px 8px rgba(26,58,124,0.1)}
    .panel{display:none}.panel.active{display:block}
    .field{margin-bottom:13px}
    .field label{display:block;font-size:10px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);margin-bottom:5px}
    .inp-wrap{position:relative;border:1.5px solid var(--border);border-radius:10px;background:#f8faff;transition:border-color .2s,box-shadow .2s,background .2s}
    .inp-wrap:focus-within{border-color:var(--blue2);background:#fff;box-shadow:0 0 0 4px rgba(38,80,168,.09)}
    .inp-wrap input{width:100%;background:none;border:none;outline:none;color:var(--text);font-family:'Inter',sans-serif;font-size:13.5px;padding:12px 40px 12px 14px}
    .inp-wrap input::placeholder{color:#b8c4d8}
    .iico{position:absolute;right:13px;top:50%;transform:translateY(-50%);color:#b8c4d8;pointer-events:none;transition:color .2s}
    .inp-wrap:focus-within .iico{color:var(--blue2)}
    .eye{position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#b8c4d8;padding:4px;display:flex;transition:color .2s}
    .eye:hover{color:var(--blue)}
    .g2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
    .extras{display:flex;justify-content:space-between;align-items:center;margin:4px 0 18px}
    .chk-label{display:flex;align-items:center;gap:7px;cursor:pointer;font-size:12px;color:var(--muted)}
    .chk-label input{display:none}
    .chkbox{width:15px;height:15px;border:1.5px solid var(--border);border-radius:4px;background:#f0f3fa;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s}
    .chk-label input:checked~.chkbox{background:var(--blue);border-color:var(--blue)}
    .chk-label input:checked~.chkbox::after{content:'';width:7px;height:4px;border-left:2px solid #fff;border-bottom:2px solid #fff;transform:rotate(-45deg) translateY(-1px)}
    .forgot{font-size:12px;color:var(--blue2);text-decoration:none;font-weight:500;transition:opacity .2s}
    .forgot:hover{opacity:.7}
    .btn{width:100%;padding:13px;border:none;border-radius:11px;cursor:pointer;position:relative;overflow:hidden;font-family:'Rajdhani',sans-serif;font-size:15px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;transition:transform .15s,box-shadow .2s}
    .btn-main{background:linear-gradient(135deg,#0f1f45 0%,#1a3a7c 50%,#2650a8 100%);color:#fff}
    .btn-main:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(26,58,124,.3)}
    .btn-shine{position:absolute;top:0;left:-100%;width:50%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.18),transparent);transform:skewX(-20deg);transition:left .55s}
    .btn:hover .btn-shine{left:160%}
    .btn-txt{position:relative;z-index:1}
    .spinner{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:17px;height:17px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;opacity:0;animation:spin .7s linear infinite}
    .btn.loading .btn-txt{opacity:0}.btn.loading .spinner{opacity:1}
    @keyframes spin{to{transform:translate(-50%,-50%) rotate(360deg)}}
    .right-foot{padding:12px 32px 15px;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;background:#fafbff}
    .foot-item{font-size:9px;color:var(--muted);letter-spacing:.06em}
    .foot-item strong{color:var(--blue);font-weight:600}
    .toast{position:fixed;bottom:22px;right:22px;background:#fff;border:1.5px solid;color:var(--text);padding:11px 16px;border-radius:11px;font-size:12px;box-shadow:0 8px 28px rgba(0,0,0,.1);transform:translateY(60px);opacity:0;transition:all .3s cubic-bezier(.34,1.56,.64,1);z-index:999;display:flex;align-items:center;gap:9px;max-width:280px}
    .toast.show{transform:translateY(0);opacity:1}
    .toast.err{border-color:#f87171}.toast.ok{border-color:#4ade80}
    .toast.err svg{color:#f87171}.toast.ok svg{color:#4ade80}
    @keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
    @media(max-width:720px){.left{display:none}.right{width:100%}.card{max-width:440px}}
    @media(max-width:480px){.right-body{padding:28px 20px}.right-foot{padding:12px 20px}.g2{grid-template-columns:1fr}}
  </style>
</head>
<body>
<div class="bg"></div>

<div class="gears-bg">
  <div class="gear g1"><svg width="300" height="300" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#1a3a7c" stroke-width="6" fill="#1a3a7c" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#1a3a7c" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#1a3a7c" stroke-width="4" fill="#1a3a7c" fill-opacity="0.4"/></svg></div>
  <div class="gear g2"><svg width="150" height="150" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#d42b2b" stroke-width="6" fill="#d42b2b" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#d42b2b" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#d42b2b" stroke-width="4" fill="#d42b2b" fill-opacity="0.4"/></svg></div>
  <div class="gear g3"><svg width="340" height="340" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#1a3a7c" stroke-width="6" fill="#1a3a7c" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#1a3a7c" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#1a3a7c" stroke-width="4" fill="#1a3a7c" fill-opacity="0.4"/></svg></div>
  <div class="gear g4"><svg width="190" height="190" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#d42b2b" stroke-width="6" fill="#d42b2b" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#d42b2b" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#d42b2b" stroke-width="4" fill="#d42b2b" fill-opacity="0.4"/></svg></div>
  <div class="gear g5"><svg width="220" height="220" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#1a3a7c" stroke-width="6" fill="#1a3a7c" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#1a3a7c" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#1a3a7c" stroke-width="4" fill="#1a3a7c" fill-opacity="0.4"/></svg></div>
  <div class="gear g6"><svg width="170" height="170" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#d42b2b" stroke-width="6" fill="#d42b2b" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#d42b2b" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#d42b2b" stroke-width="4" fill="#d42b2b" fill-opacity="0.4"/></svg></div>
  <div class="gear g7"><svg width="130" height="130" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#1a3a7c" stroke-width="6" fill="#1a3a7c" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#1a3a7c" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#1a3a7c" stroke-width="4" fill="#1a3a7c" fill-opacity="0.4"/></svg></div>
  <div class="gear g8"><svg width="110" height="110" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M82 4h36l5 20a82 82 0 0 1 16.6 6.9l18-11.8 25.4 25.4-11.8 18A82 82 0 0 1 162 79l20 5v36l-20 5a82 82 0 0 1-6.4 15.4l11.8 18-25.4 25.4-18-11.8A82 82 0 0 1 108 178l-5 20H67l-5-20a82 82 0 0 1-16.6-6.9l-18 11.8L2 157.5l11.8-18A82 82 0 0 1 7.3 124l-20-5V83l20-5a82 82 0 0 1 6.4-15.4L2 44.6 27.4 19.2l18 11.8A82 82 0 0 1 62 24l5-20z" stroke="#d42b2b" stroke-width="6" fill="#d42b2b" fill-opacity="0.12"/><circle cx="100" cy="100" r="35" stroke="#d42b2b" stroke-width="5" fill="none"/><circle cx="100" cy="100" r="12" stroke="#d42b2b" stroke-width="4" fill="#d42b2b" fill-opacity="0.4"/></svg></div>
</div>

<div class="page">
  <div class="card">

    <div class="left">
      <div class="tribar"></div>
      <div class="left-noise"></div>
      <div class="left-glow"></div>
      <div class="left-glow2"></div>

      <div class="logo-panel">
        <div class="logo-box">
          <img src="/Software_de_Empresa/views/login/LOGO.png">
        </div>
        <div class="left-divider"></div>
        <div class="left-tagline">
          <span>Óleo-Hidráulica</span>
          <span>Lubricación · Automatización</span>
        </div>
        <div class="left-badges">
          <div class="badge">
            <div class="badge-icon bi-red">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#080808" stroke-width="1.8">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="m9 12 2 2 4-4" stroke="#ff6b6b" stroke-width="2.2"/>
              </svg>
            </div>
            <div class="badge-text"><strong>Empresa Homologada</strong>Bureau Veritas · Certificada</div>
          </div>
          <div class="badge">
            <div class="badge-icon bi-blue">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.8">
                <circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/>
              </svg>
            </div>
            <div class="badge-text"><strong>+15 años de experiencia</strong>Parker · Danfoss · Rexroth</div>
          </div>
          <div class="badge">
            <div class="badge-icon bi-green">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.8">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                <path d="m9 11 3 3L22 4"/>
              </svg>
            </div>
            <div class="badge-text"><strong><span class="pulse-dot"></span>Sistema activo</strong>Puente Piedra, Lima · Perú</div>
          </div>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="topbar"></div>
      <div class="right-body">
        <div class="right-title">Bienvenido</div>
        <div class="right-sub">Ingresa tus credenciales para acceder al sistema</div>

        <div class="tabs">
          <button class="tab active" onclick="switchTab('login',this)">Iniciar Sesión</button>
          <button class="tab" onclick="switchTab('register',this)">Registrarse</button>
        </div>

        <div class="panel active" id="panel-login">
          <div class="field">
            <label for="l-email">Correo electrónico</label>
            <div class="inp-wrap">
              <input type="email" id="l-email" placeholder="usuario@fuerzamotriz.com.pe" autocomplete="email"/>
              <span class="iico"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="m2 7 10 7 10-7"/></svg></span>
            </div>
          </div>
          <div class="field">
            <label for="l-pass">Contraseña</label>
            <div class="inp-wrap">
              <input type="password" id="l-pass" placeholder="••••••••••" autocomplete="current-password"/>
              <button class="eye" onclick="toggleEye('l-pass',this)" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </div>
          </div>
          <div class="extras">
            <label class="chk-label">
              <input type="checkbox" id="remember"/>
              <span class="chkbox"></span>Recordar sesión
            </label>
            <a href="#" class="forgot">¿Olvidaste tu clave?</a>
          </div>
          <button class="btn btn-main" onclick="handleLogin(this)">
            <span class="btn-txt">Ingresar al Sistema</span>
            <div class="btn-shine"></div><div class="spinner"></div>
          </button>
        </div>

        <div class="panel" id="panel-register">
          <div class="g2">
            <div class="field"><label for="r-name">Nombre</label><div class="inp-wrap"><input type="text" id="r-name" placeholder="César"/></div></div>
            <div class="field"><label for="r-last">Apellido</label><div class="inp-wrap"><input type="text" id="r-last" placeholder="Juárez"/></div></div>
          </div>
          <div class="field">
            <label for="r-email">Correo electrónico</label>
            <div class="inp-wrap">
              <input type="email" id="r-email" placeholder="usuario@fuerzamotriz.com.pe"/>
              <span class="iico"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="m2 7 10 7 10-7"/></svg></span>
            </div>
          </div>
          <div class="field">
            <label for="r-pass">Contraseña</label>
            <div class="inp-wrap">
              <input type="password" id="r-pass" placeholder="Mín. 8 caracteres"/>
              <button class="eye" onclick="toggleEye('r-pass',this)" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </div>
          </div>
          <div class="field" style="margin-bottom:18px">
            <label for="r-cargo">Cargo / Área</label>
            <div class="inp-wrap">
              <input type="text" id="r-cargo" placeholder="Ej. Técnico Hidráulico…"/>
              <span class="iico"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg></span>
            </div>
          </div>
          <button class="btn btn-main" onclick="handleRegister(this)">
            <span class="btn-txt">Crear Cuenta</span>
            <div class="btn-shine"></div><div class="spinner"></div>
          </button>
        </div>
      </div>

      <div class="right-foot">
        <div class="foot-item">RUC <strong>20607926345</strong></div>
        <div class="foot-item">Lima, <strong>Perú</strong></div>
        <div class="foot-item">v2.4 · <strong>ERP</strong></div>
      </div>
    </div>

  </div>
</div>

<div class="toast" id="toast">
  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/>
    <circle cx="12" cy="16" r=".5" fill="currentColor"/>
  </svg>
  <span id="toast-msg"></span>
</div>

<script>
  function switchTab(name,btn){document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));document.querySelectorAll('.panel').forEach(p=>p.classList.remove('active'));btn.classList.add('active');document.getElementById('panel-'+name).classList.add('active')}
  function toggleEye(id,btn){const inp=document.getElementById(id);const isText=inp.type==='text';inp.type=isText?'password':'text';btn.querySelector('svg').innerHTML=isText?'<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>':'<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>'}
  function showToast(msg,type='err'){const t=document.getElementById('toast');document.getElementById('toast-msg').textContent=msg;t.className='toast '+type;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),3400)}

  async function handleLogin(btn){
    const email=document.getElementById('l-email').value.trim();
    const pass=document.getElementById('l-pass').value;
    if(!email||!pass){showToast('Completa todos los campos');return}
    if(!email.includes('@')){showToast('Correo inválido');return}
    btn.classList.add('loading');btn.disabled=true;
    try{
      /* CORRECCIÓN 1 y 4: URL absoluta y Template Literals en el body */
      const res=await fetch('/Software_de_Empresa/index.php?action=autenticar',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(pass)}`
      });
      const data=await res.json();
      if(data.success){
        showToast('¡Bienvenido '+data.nombre+'! Redirigiendo…','ok');
        setTimeout(()=>{window.location.href='?action=dashboard'},1800);
      } else {
        showToast(data.message||'Credenciales incorrectas');
        btn.classList.remove('loading');btn.disabled=false;
      }
    } catch(e){
      showToast('Error de conexión con el servidor');
      btn.classList.remove('loading');btn.disabled=false;
    }
  }

  async function handleRegister(btn){
    const name=document.getElementById('r-name').value.trim();
    const last=document.getElementById('r-last').value.trim();
    const email=document.getElementById('r-email').value.trim();
    const pass=document.getElementById('r-pass').value;
    const cargo=document.getElementById('r-cargo').value.trim();
    if(!name||!last||!email||!pass||!cargo){showToast('Completa todos los campos');return}
    if(!email.includes('@')){showToast('Correo inválido');return}
    if(pass.length<8){showToast('Contraseña: mínimo 8 caracteres');return}
    btn.classList.add('loading');btn.disabled=true;
    try{
      /* CORRECCIÓN 1 y 4: URL absoluta y Template Literals en el body */
      const res=await fetch('/Software_de_Empresa/index.php?action=registro',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body: `nombre=${encodeURIComponent(name+' '+last)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(pass)}&cargo=${encodeURIComponent(cargo)}`
      });
      const data=await res.json();
      if(data.success){
        showToast('Cuenta creada exitosamente ✅','ok');
        setTimeout(()=>switchTab('login',document.querySelector('.tab')),1800);
      } else {
        showToast(data.message||'Error al registrar');
      }
    } catch(e){
      showToast('Error de conexión con el servidor');
    }
    btn.classList.remove('loading');btn.disabled=false;
  }

  document.addEventListener('keydown',e=>{if(e.key!=='Enter')return;const loginActive=document.getElementById('panel-login').classList.contains('active');if(loginActive){const b=document.querySelector('#panel-login .btn');if(!b.disabled)handleLogin(b);}else{const b=document.querySelector('#panel-register .btn');if(!b.disabled)handleRegister(b);}});
</script>
</body>
</html>