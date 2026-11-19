<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Planificador semanal</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Figtree:wght@400;500;600&display=swap">
<style>
:root{--ink:#1c2250;--panel:#252d63;--panel2:#313a78;--line:#434d90;--text:#eef0ff;--muted:#a9b0dd;--bg:#f2f3fa;--card:#fff;--cardtext:#1c2250;--accent:#47e0a0;--accent-ink:#06382a;--amber:#ffbe3d;--coral:#ff7a8a;--teal:#3cc9d9;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#10142e;--card:#1a2050;--cardtext:#eef0ff}}
:root[data-theme="dark"]{--bg:#10142e;--card:#1a2050;--cardtext:#eef0ff}
html{scroll-padding-top:env(safe-area-inset-top,0px)}
:root{--fs:1}:root[data-fs="sm"]{--fs:.9}:root[data-fs="lg"]{--fs:1.2}
:root[data-theme="dark"] .today{color:var(--accent)}:root[data-theme="dark"] .tl .h{color:var(--muted)}:root[data-theme="dark"] .err-msg{color:#ff8a98}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--cardtext);font-family:Figtree,system-ui,sans-serif;font-size:calc(15px*var(--fs))}
h1,h2,h3{font-family:Fraunces,Georgia,serif;margin:0}
button{font:inherit;cursor:pointer;border:0;color:inherit;background:none}
:focus-visible{outline:3px solid var(--amber);outline-offset:2px}
.app{display:grid;grid-template-columns:280px minmax(320px,1fr) 340px;grid-template-rows:84px 1fr;min-height:100vh}
.brand{background:var(--ink);color:var(--text);display:flex;align-items:center;justify-content:center;font-size:calc(22px*var(--fs));letter-spacing:.5px;text-transform:capitalize}
.top{display:flex;align-items:center;justify-content:space-between;padding:0 28px;grid-column:2/4}
.today{font-family:Fraunces,serif;font-size:calc(20px*var(--fs));color:#2a7f62;text-transform:capitalize}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .today{color:var(--accent)}}
.avatar{width:54px;height:54px;border-radius:50%;background:var(--panel2);color:var(--text);font-size:calc(13px*var(--fs));font-weight:600}
.pf{position:relative}.menu{position:absolute;right:0;top:64px;z-index:20;min-width:230px;background:var(--card);color:var(--cardtext);border-radius:14px;padding:14px;box-shadow:0 12px 32px rgba(10,14,40,.3);border:1px solid color-mix(in srgb,var(--cardtext) 15%,transparent)}.menu[hidden]{display:none}.who{display:flex;flex-direction:column;gap:2px;padding-bottom:12px;margin-bottom:12px;border-bottom:1px solid color-mix(in srgb,var(--cardtext) 15%,transparent)}.who small{opacity:.65}.who b{font-family:Fraunces,serif;font-size:calc(17px*var(--fs));overflow-wrap:anywhere}.out{width:100%;padding:10px;border-radius:10px;background:var(--coral);color:#3a0b14;font-weight:600}
.side{background:var(--panel);color:var(--text);padding:18px 16px 24px;display:flex;flex-direction:column;gap:18px}
.calnav{display:flex;align-items:center;justify-content:space-between}
.calnav button{width:30px;height:30px;border-radius:8px;background:var(--panel2)}
.calnav span{font-family:Fraunces,serif;text-transform:capitalize;font-size:calc(16px*var(--fs))}
.grid{display:grid;grid-template-columns:repeat(7,1fr);gap:5px;text-align:center}
.dow{font-weight:700;font-size:calc(12px*var(--fs));color:var(--muted);padding:4px 0}
.day{aspect-ratio:1;border-radius:9px;background:var(--panel2);color:var(--text);font-size:calc(13px*var(--fs));position:relative}
.day.out{opacity:.4}
.day.today{box-shadow:inset 0 0 0 2px var(--amber)}
.day.sel{background:var(--accent);color:var(--accent-ink);font-weight:700}
.day.has::after{content:"";position:absolute;bottom:4px;left:50%;width:5px;height:5px;margin-left:-2.5px;border-radius:50%;background:currentColor}
.side h3{font-size:calc(15px*var(--fs));color:var(--muted);font-weight:600}
.cats{display:flex;flex-direction:column;gap:8px}
.cat{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:10px;background:var(--panel2);text-align:left;width:100%}
.cat[aria-pressed="true"]{box-shadow:inset 0 0 0 2px var(--c)}
.dot{width:12px;height:12px;border-radius:50%;background:var(--c);flex:none}
.cat b{flex:1;font-weight:600;color:var(--c)}
.cat small{color:var(--muted)}
.catrow{display:flex;gap:6px}.catrow .cat{flex:1;min-width:0}.catdel{width:40px;flex:none;border-radius:10px;background:var(--panel2);color:var(--muted);font-size:calc(18px*var(--fs))}.catdel:hover:not(:disabled){background:var(--coral);color:#3a0b14}.catdel:disabled{opacity:.35;cursor:not-allowed}
.btn{display:flex;align-items:center;justify-content:center;gap:10px;background:var(--accent);color:var(--accent-ink);font-weight:600;border-radius:12px;padding:11px 14px;width:100%}
.btn i{font-style:normal;display:grid;place-items:center;width:24px;height:24px;border-radius:7px;background:var(--accent-ink);color:var(--accent);font-size:calc(18px*var(--fs));line-height:1}
.main{background:var(--panel);color:var(--text);padding:22px 22px 28px;margin:0 0 0 0;min-width:0}
.main h2{font-size:calc(20px*var(--fs))}
.main .sub{color:var(--muted);margin:4px 0 16px;text-transform:capitalize}
.tasks{list-style:none;margin:0 0 18px;padding:0;display:flex;flex-direction:column;gap:10px}
.task{display:grid;grid-template-columns:auto 1fr auto auto;gap:10px;align-items:center;background:var(--panel2);border-radius:12px;padding:10px 12px;border-left:5px solid var(--c)}
.task .t{font-weight:500;overflow-wrap:anywhere}
.task.done .t{text-decoration:line-through;opacity:.55}
.chip{font-size:calc(12px*var(--fs));font-weight:600;padding:3px 10px;border-radius:99px;background:color-mix(in srgb,var(--c) 22%,transparent);color:var(--c);white-space:nowrap}
.time{font-variant-numeric:tabular-nums;color:var(--muted);font-size:calc(13px*var(--fs))}
.ic{width:32px;height:32px;border-radius:9px;background:var(--line);display:grid;place-items:center;font-size:calc(14px*var(--fs))}
.check{width:28px;height:28px;border-radius:8px;border:2px solid var(--muted);display:grid;place-items:center;font-size:calc(15px*var(--fs));color:var(--accent-ink)}
.done .check{background:var(--accent);border-color:var(--accent)}
.row2{display:flex;gap:6px;align-items:center}
.empty{color:var(--muted);padding:22px 8px;text-align:center}
.view{padding:22px 22px 28px;min-width:0}
.view h3{font-size:calc(17px*var(--fs));margin-bottom:14px}
.tl{position:relative;margin:0;padding:0 0 0 20px;list-style:none;display:flex;flex-direction:column;gap:14px}
.tl::before{content:"";position:absolute;left:5px;top:6px;bottom:6px;width:2px;background:var(--line);opacity:.6}
.tl li{position:relative}
.tl li::before{content:"";position:absolute;left:-20px;top:4px;width:12px;height:12px;border-radius:50%;background:var(--c);border:3px solid var(--bg)}
.tl .h{font-size:calc(13px*var(--fs));font-weight:600;color:#5b64a8;margin-bottom:5px}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .tl .h{color:var(--muted)}}
.tl .box{background:var(--card);color:var(--cardtext);border:2px solid var(--c);border-radius:12px;padding:10px 12px;font-size:calc(14px*var(--fs));overflow-wrap:anywhere}
.tl .box.done{opacity:.5;text-decoration:line-through}
dialog{border:0;border-radius:18px;padding:0;width:min(420px,92vw);background:var(--card);color:var(--cardtext)}
dialog::backdrop{background:rgba(10,14,40,.6)}
dialog form{padding:22px;display:flex;flex-direction:column;gap:14px}
label{display:flex;flex-direction:column;gap:5px;font-weight:600;font-size:calc(13px*var(--fs))}
input,select{font:inherit;padding:10px 12px;border-radius:10px;border:2px solid #c9cdea;background:var(--card);color:var(--cardtext)}
.acts{display:flex;gap:10px;justify-content:flex-end;margin-top:4px}
.acts .btn{width:auto}
.ghost{padding:11px 16px;border-radius:12px;background:color-mix(in srgb,var(--cardtext) 10%,transparent)}
.day.past:not(.sel){opacity:.55}.day.out.past:not(.sel){opacity:.3}
#toasts{position:fixed;left:0;right:0;bottom:calc(18px + env(safe-area-inset-bottom,0px));z-index:100;display:flex;flex-direction:column;align-items:center;gap:8px;pointer-events:none;padding:0 14px}
.toast{pointer-events:auto;display:flex;align-items:center;gap:10px;max-width:460px;padding:12px 16px;border-radius:12px;font-weight:600;box-shadow:0 10px 28px rgba(10,14,40,.35);background:var(--accent);color:var(--accent-ink)}
.toast.err{background:var(--coral);color:#3a0b14}.toast.info{background:var(--amber);color:#3a2a00}.toast b{font-size:calc(18px*var(--fs));line-height:1}
[hidden]{display:none!important}
#toasts{inset:auto 0 calc(18px + env(safe-area-inset-bottom,0px)) 0;margin:0;width:auto;height:auto;border:0;background:none;overflow:visible;color:inherit}
.avatar{overflow:hidden;background-size:cover;background-position:center}.avatar.has-img{color:transparent}
.mi{display:block;width:100%;padding:10px 12px;border-radius:10px;text-align:left;font-weight:500;background:none}.mi:hover,.mi:focus-visible{background:color-mix(in srgb,var(--cardtext) 10%,transparent)}.mi.dg{color:#c8243c}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .mi.dg{color:#ff8a98}}:root[data-theme="dark"] .mi.dg{color:#ff8a98}
.sm{font-size:calc(13px*var(--fs));opacity:.7;margin:0}.who .sm{overflow-wrap:anywhere}
dialog.wide{width:min(520px,94vw);max-height:90vh;overflow:auto}
.sec{border-top:1px solid color-mix(in srgb,var(--cardtext) 15%,transparent);padding-top:14px;display:flex;flex-direction:column;gap:10px}.sec h3{font-size:calc(16px*var(--fs))}
.seg{display:flex;gap:6px;flex-wrap:wrap}.seg button{padding:8px 14px;border-radius:10px;background:color-mix(in srgb,var(--cardtext) 10%,transparent);font-weight:600}.seg button[aria-pressed="true"]{background:var(--accent);color:var(--accent-ink)}
.accs{display:flex;flex-direction:column;gap:8px}.accs .mi{background:color-mix(in srgb,var(--cardtext) 8%,transparent)}
.err-msg{color:#c8243c;font-size:calc(13px*var(--fs));font-weight:600;margin:-6px 0 0}.err-msg:empty{display:none}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .err-msg{color:#ff8a98}}
@media (max-width:980px){.app{grid-template-columns:1fr;grid-template-rows:auto}.top{grid-column:auto;padding:14px 18px}.brand{padding:16px}.main{order:3}.view{order:4}.side{order:2}.top{order:1}.brand{order:0}}
@media (prefers-reduced-motion:no-preference){.day,.cat,.btn{transition:background .15s,transform .15s}.btn:active{transform:scale(.98)}}
</style>
</head>
<body>
<div class="app">
  <div class="brand" id="mesAnio"></div>
  <header class="top"><div class="today" id="hoy"></div><div class="pf"><button class="avatar" id="pfBtn" aria-haspopup="true" aria-expanded="false">Perfil</button><div class="menu" id="pfMenu" hidden><div class="who"><small id="uSmall">Sin sesión iniciada</small><b id="uName">Invitado</b><span class="sm" id="uMail"></span></div><div id="menuItems"></div></div></div></header>

  <aside class="side">
    <div class="calnav"><button id="prev" aria-label="Mes anterior">‹</button><span id="calTitle"></span><button id="next" aria-label="Mes siguiente">›</button></div>
    <div class="grid" id="cal"></div>
    <h3>Mis categorías</h3>
    <div class="cats" id="cats"></div>
    <button class="btn" id="addCat"><i>+</i>Añadir categoría</button>
  </aside>

  <main class="main">
    <h2>Mis tareas del día</h2>
    <p class="sub" id="selLabel"></p>
    <ul class="tasks" id="tasks"></ul>
    <button class="btn" id="addTask"><i>+</i>Agregar nuevo evento</button>
  </main>

  <section class="view">
    <h3>Vista del día</h3>
    <ol class="tl" id="tl"></ol>
  </section>
</div>

<div id="toasts" aria-live="polite" popover="manual"></div>
<dialog id="dTask"><form method="dialog" id="fTask" novalidate>
  <h2 id="dTitle">Nuevo evento</h2>
  <label>Título<input id="fTitulo" required maxlength="120"></label>
  <label>Categoría<select id="fCat"></select></label>
  <label>Fecha<input id="fFecha" type="date" required></label>
  <label>Hora<input id="fHora" type="time" required value="09:00"></label>
  <p class="err-msg" id="fErr" role="alert"></p>
  <div class="acts"><button type="button" class="ghost" id="cTask">Cancelar</button><button type="button" class="ghost" id="delTask" hidden>Eliminar</button><button class="btn" value="ok">Guardar</button></div>
</form></dialog>

<dialog id="dCat"><form method="dialog" id="fCatForm" novalidate>
  <h2>Nueva categoría</h2>
  <label>Nombre<input id="cName" required maxlength="24"></label>
  <label>Color<input id="cColor" type="color" value="#a78bfa"></label>
  <p class="err-msg" id="cErr" role="alert"></p>
  <div class="acts"><button type="button" class="ghost" id="cCat">Cancelar</button><button class="btn">Guardar</button></div>
</form></dialog>

<dialog id="dAuth"><form method="dialog" id="fAuth" novalidate>
  <h2 id="aTitle">Iniciar sesión</h2>
  <label id="lName" hidden>Nombre<input id="aName" maxlength="40" autocomplete="name"></label>
  <label>Correo<input id="aMail" type="email" autocomplete="email"></label>
  <label>Contraseña<input id="aPass" type="password" autocomplete="current-password"></label>
  <label id="lPass2" hidden>Repetir contraseña<input id="aPass2" type="password" autocomplete="new-password"></label>
  <p class="err-msg" id="aErr" role="alert"></p>
  <div class="acts"><button type="button" class="ghost" id="aCancel">Cancelar</button><button class="btn" id="aGo">Entrar</button></div>
  <button type="button" class="ghost" id="aSwap"></button>
</form></dialog>

<dialog id="dAcc"><form method="dialog" id="fAcc" novalidate>
  <h2>Cambiar cuenta</h2><div class="accs" id="accList"></div>
  <div class="acts"><button type="button" class="ghost" id="accClose">Cerrar</button><button type="button" class="btn" id="accAdd">Agregar otra cuenta</button></div>
</form></dialog>

<dialog id="dSet" class="wide"><form method="dialog" id="fSet" novalidate>
  <h2>Configuración</h2>
  <div class="sec"><h3>Cambiar datos personales</h3><p class="sm" id="setHint"></p>
    <label>Nombre<input id="sName" maxlength="40"></label>
    <label>Correo<input id="sMail" type="email"></label>
    <p class="err-msg" id="sErr" role="alert"></p>
    <div class="acts"><button type="button" class="btn" id="sSave">Guardar datos</button></div></div>
  <div class="sec"><h3>Modo claro/oscuro</h3><div class="seg" id="segTheme"><button type="button" data-v="system">Automático</button><button type="button" data-v="light">Claro</button><button type="button" data-v="dark">Oscuro</button></div></div>
  <div class="sec"><h3>Tamaño de letra</h3><div class="seg" id="segFs"><button type="button" data-v="sm">Pequeño</button><button type="button" data-v="md">Normal</button><button type="button" data-v="lg">Grande</button></div></div>
  <div class="sec"><h3>Cambiar foto de perfil</h3><input id="sPhoto" type="file" accept="image/*"><div class="acts" style="justify-content:flex-start"><button type="button" class="ghost" id="sPhotoDel">Quitar foto</button></div></div>
  <div class="acts"><button type="button" class="btn" id="sClose">Listo</button></div>
</form></dialog>

<dialog id="dDel"><form method="dialog" id="fDel">
  <h2>Eliminar categoría</h2><p id="delMsg"></p>
  <div class="acts"><button type="button" class="ghost" id="cDel">Cancelar</button><button class="btn" style="background:var(--coral);color:#3a0b14">Eliminar</button></div>
</form></dialog>

<script>
const $=s=>document.querySelector(s);
const pad=n=>String(n).padStart(2,'0');
function toast(msg,type){
  const t=document.createElement('div');t.className='toast'+(type==='err'?' err':type==='info'?' info':'');
  const i=document.createElement('b');i.textContent=type==='err'?'!':type==='info'?'i':'✓';
  const s=document.createElement('span');s.textContent=msg;t.append(i,s);
  const box=$('#toasts');box.append(t);try{box.hidePopover()}catch(e){}try{box.showPopover()}catch(e){}
  while(box.children.length>3)box.firstChild.remove();
  setTimeout(()=>{t.remove();if(!box.children.length){try{box.hidePopover()}catch(e){}}},type==='err'?5000:3200);
}
const key=d=>d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate());
const parse=k=>{const [y,m,d]=k.split('-').map(Number);return new Date(y,m-1,d)};
const today=new Date(), todayK=key(today);
const MESES=['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
const fmt12=t=>{const [h,m]=t.split(':').map(Number);return (h%12||12)+':'+pad(m)+' '+(h<12?'a. m.':'p. m.')};

let UKEY='planificador_invitado';
let S;
const seed=()=>({cats:[{id:'ev',name:'Eventos',color:'#ffbe3d'},{id:'re',name:'Reuniones',color:'#ff7a8a'},{id:'tr',name:'Trabajos',color:'#3cc9d9'}],
 tasks:[
 {id:1,title:'Crear wireframe de la página principal para el planificador semanal.',cat:'tr',date:todayK,time:'12:00',done:false},
 {id:2,title:'Ir a una cita médica de control con el otorrinolaringólogo',cat:'ev',date:todayK,time:'14:00',done:false},
 {id:3,title:'Reunión con equipo para definir Sprint 2 del planificador de tareas',cat:'re',date:todayK,time:'18:00',done:false}],
 next:4});
const lsGet=(k,d)=>{try{const v=localStorage.getItem(k);return v?JSON.parse(v):d}catch(e){return d}};
const lsSet=(k,v)=>{try{localStorage.setItem(k,JSON.stringify(v));return true}catch(e){return false}};
function loadState(){S=lsGet(UKEY,null)||(UKEY==='planificador_invitado'?lsGet('planificador',null):null);if(!S||!S.cats)S=seed()}
let ACC=lsGet('planificador_cuentas',{users:[],current:null});
if(!ACC.users.some(u=>u.id===ACC.current))ACC.current=null;
UKEY=ACC.current?'planificador_'+ACC.current:'planificador_invitado';
loadState();
let saveWarned=false;
const save=()=>{try{localStorage.setItem(UKEY,JSON.stringify(S))}catch(e){if(!saveWarned){saveWarned=true;toast('No se pudieron guardar los cambios en este navegador.','err')}}};

let sel=todayK, view=new Date(today.getFullYear(),today.getMonth(),1), filter=null, editing=null;
const cat=id=>S.cats.find(c=>c.id===id)||{id:'',name:'Sin categoría',color:'#a9b0dd'};
const dayTasks=k=>S.tasks.filter(t=>t.date===k&&(!filter||t.cat===filter)).sort((a,b)=>a.time.localeCompare(b.time));

function renderCal(){
  $('#calTitle').textContent=MESES[view.getMonth()]+' '+view.getFullYear();
  $('#mesAnio').textContent=MESES[today.getMonth()]+' '+today.getFullYear();
  const g=$('#cal');g.innerHTML='';
  'DLMMJVS'.split('').forEach(l=>{const d=document.createElement('div');d.className='dow';d.textContent=l;g.append(d)});
  const start=new Date(view.getFullYear(),view.getMonth(),1-view.getDay());
  for(let i=0;i<42;i++){
    const d=new Date(start.getFullYear(),start.getMonth(),start.getDate()+i),k=key(d);
    const b=document.createElement('button');
    b.className='day'+(d.getMonth()!==view.getMonth()?' out':'')+(k===todayK?' today':'')+(k===sel?' sel':'')+(k<todayK?' past':'')+(S.tasks.some(t=>t.date===k)?' has':'');
    b.textContent=d.getDate();
    b.setAttribute('aria-label',d.getDate()+' de '+MESES[d.getMonth()]);
    b.onclick=()=>{sel=k;if(d.getMonth()!==view.getMonth())view=new Date(d.getFullYear(),d.getMonth(),1);renderAll()};
    g.append(b);
  }
}
function renderCats(){
  const c=$('#cats');c.innerHTML='';if(!S.cats.length)c.innerHTML='<p class="empty" style="padding:8px 0;text-align:left">Sin categorías. Agrega una nueva abajo.</p>';
  S.cats.forEach(x=>{
    const n=S.tasks.filter(t=>t.cat===x.id&&t.date===sel).length;
    const b=document.createElement('button');b.className='cat';b.style.setProperty('--c',x.color);
    b.setAttribute('aria-pressed',filter===x.id);
    b.innerHTML='<span class="dot"></span><b></b><small>'+n+'</small>';
    b.querySelector('b').textContent=x.name;
    b.title='Filtrar por '+x.name;
    b.onclick=()=>{filter=filter===x.id?null:x.id;renderAll()};
    const r=document.createElement('div');r.className='catrow';
    const del=document.createElement('button');del.className='catdel';del.textContent='×';del.setAttribute('aria-label','Eliminar categoría '+x.name);del.title='Eliminar categoría';
    del.onclick=()=>askDelCat(x);
    r.append(b,del);c.append(r);
  });
}
function renderTasks(){
  const d=parse(sel);
  $('#selLabel').textContent=d.toLocaleDateString('es-CO',{weekday:'long',day:'numeric',month:'long'})+(filter?' · '+cat(filter).name:'');
  const ul=$('#tasks');ul.innerHTML='';
  const list=dayTasks(sel);
  if(!list.length){ul.innerHTML='<li class="empty">No hay tareas para este día. Agrega la primera con el botón de abajo.</li>';return}
  list.forEach(t=>{
    const c=cat(t.cat),li=document.createElement('li');
    li.className='task'+(t.done?' done':'');li.style.setProperty('--c',c.color);
    li.innerHTML='<button class="check" aria-label="Marcar como hecha">'+(t.done?'✓':'')+'</button><div><div class="t"></div><div class="row2" style="margin-top:6px"><span class="chip"></span><span class="time"></span></div></div><span></span><button class="ic" aria-label="Editar">✎</button>';
    li.querySelector('.t').textContent=t.title;
    li.querySelector('.chip').textContent=c.name;
    li.querySelector('.time').textContent=fmt12(t.time);
    li.querySelector('.check').onclick=()=>{t.done=!t.done;save();renderAll();if(t.done)toast('¡Tarea completada!')};
    li.querySelector('.ic').onclick=()=>openTask(t);
    ul.append(li);
  });
}
function renderTl(){
  const o=$('#tl');o.innerHTML='';
  const list=dayTasks(sel);
  if(!list.length){o.innerHTML='<li class="empty" style="padding-left:0;list-style:none">Tu línea de tiempo está libre.</li>';return}
  list.forEach(t=>{
    const li=document.createElement('li');li.style.setProperty('--c',cat(t.cat).color);
    li.innerHTML='<div class="h"></div><div class="box'+(t.done?' done':'')+'"></div>';
    li.querySelector('.h').textContent=fmt12(t.time);
    li.querySelector('.box').textContent=t.title;
    o.append(li);
  });
}
function renderAll(){
  $('#hoy').textContent=today.toLocaleDateString('es-CO',{weekday:'long',day:'numeric',month:'long',year:'numeric'});
  renderCal();renderCats();renderTasks();renderTl();save();
}

function fillCats(v){$('#fCat').innerHTML='';if(!S.cats.length){$('#fCat').innerHTML='<option value="">Sin categoría</option>';return}S.cats.forEach(c=>{const o=document.createElement('option');o.value=c.id;o.textContent=c.name;$('#fCat').append(o)});if(v)$('#fCat').value=v}
function openTask(t){
  editing=t||null;fillCats(t?t.cat:(filter||(S.cats[0]&&S.cats[0].id)));
  $('#dTitle').textContent=t?'Editar evento':'Nuevo evento';
  $('#fTitulo').value=t?t.title:'';$('#fFecha').value=t?t.date:(sel<todayK?todayK:sel);$('#fHora').value=t?t.time:'09:00';
  $('#fFecha').min=(t&&t.date<todayK)?'':todayK;$('#fErr').textContent='';
  $('#delTask').hidden=!t;$('#dTask').showModal();$('#fTitulo').focus();
}
$('#addTask').onclick=()=>openTask(null);
$('#cTask').onclick=()=>$('#dTask').close();
$('#delTask').onclick=()=>{S.tasks=S.tasks.filter(x=>x!==editing);$('#dTask').close();renderAll();toast('Evento eliminado.')};
$('#fTask').addEventListener('submit',e=>{e.preventDefault();
  const data={title:$('#fTitulo').value.trim(),cat:$('#fCat').value,date:$('#fFecha').value,time:$('#fHora').value};
  const err=m=>{$('#fErr').textContent=m};
  if(!data.title)return err('Escribe un título para el evento.');
  if(!data.date||!data.time)return err('Elige la fecha y la hora del evento.');
  const changed=!editing||editing.date!==data.date||editing.time!==data.time;
  if(changed&&new Date(data.date+'T'+data.time)<new Date())return err(data.date<todayK?'No puedes crear eventos en fechas pasadas.':'Esa hora de hoy ya pasó. Elige una hora posterior.');
  const was=!!editing;if(editing)Object.assign(editing,data);else S.tasks.push({id:S.next++,done:false,...data});
  sel=data.date;view=new Date(parse(sel).getFullYear(),parse(sel).getMonth(),1);$('#dTask').close();toast(was?'Evento actualizado.':'Evento creado.');
  renderAll();
});
$('#addCat').onclick=()=>{$('#cName').value='';$('#cErr').textContent='';$('#dCat').showModal();$('#cName').focus()};
$('#cCat').onclick=()=>$('#dCat').close();
$('#fCatForm').addEventListener('submit',e=>{e.preventDefault();
  const n=$('#cName').value.trim(),err=m=>{$('#cErr').textContent=m};
  if(!n)return err('Escribe un nombre para la categoría.');
  if(S.cats.some(c=>c.name.toLowerCase()===n.toLowerCase()))return err('Ya existe una categoría con ese nombre.');
  S.cats.push({id:'c'+Date.now(),name:n,color:$('#cColor').value});$('#dCat').close();renderAll();toast('Categoría “'+n+'” creada.');
});
let delCat=null;
function askDelCat(c){
  delCat=c;const rest=S.cats.filter(x=>x.id!==c.id),n=S.tasks.filter(t=>t.cat===c.id).length;
  $('#delMsg').textContent='¿Eliminar la categoría “'+c.name+'”?'+(n?' Sus '+n+(n===1?' tarea pasará':' tareas pasarán')+(rest.length?' a “'+rest[0].name+'”.':' a “Sin categoría”.'):'');
  $('#dDel').showModal();
}
$('#cDel').onclick=()=>$('#dDel').close();
$('#fDel').addEventListener('submit',()=>{
  const rest=S.cats.filter(x=>x.id!==delCat.id);
  S.tasks.forEach(t=>{if(t.cat===delCat.id)t.cat=rest.length?rest[0].id:''});
  S.cats=rest;if(filter===delCat.id)filter=null;renderAll();toast('Categoría “'+delCat.name+'” eliminada.');
});
const pfBtn=$('#pfBtn'),pfMenu=$('#pfMenu');
const pfSet=o=>{pfMenu.hidden=!o;pfBtn.setAttribute('aria-expanded',o)};
pfBtn.onclick=e=>{e.stopPropagation();pfSet(pfMenu.hidden)};
document.addEventListener('click',e=>{if(!pfMenu.contains(e.target))pfSet(false)});
document.addEventListener('keydown',e=>{if(e.key==='Escape')pfSet(false)});

/* ---- Perfil y configuración ---- */
const PREFS=Object.assign({theme:'system',fs:'md'},lsGet('planificador_prefs',{}));
function applyPrefs(){
  const r=document.documentElement;
  if(PREFS.theme==='system')r.removeAttribute('data-theme');else r.setAttribute('data-theme',PREFS.theme);
  r.setAttribute('data-fs',PREFS.fs);
  document.querySelectorAll('#segTheme button').forEach(b=>b.setAttribute('aria-pressed',b.dataset.v===PREFS.theme));
  document.querySelectorAll('#segFs button').forEach(b=>b.setAttribute('aria-pressed',b.dataset.v===PREFS.fs));
}
const user=()=>ACC.users.find(u=>u.id===ACC.current)||null;
const saveAcc=()=>{if(!lsSet('planificador_cuentas',ACC))toast('No se pudieron guardar los cambios en este navegador.','err')};
const hash=async t=>{
  if(!(window.crypto&&crypto.subtle))return btoa(unescape(encodeURIComponent(t)));
  const b=await crypto.subtle.digest('SHA-256',new TextEncoder().encode(t));
  return [...new Uint8Array(b)].map(x=>x.toString(16).padStart(2,'0')).join('');
};
function switchTo(id){
  ACC.current=id;saveAcc();
  UKEY=id?'planificador_'+id:'planificador_invitado';
  loadState();filter=null;sel=todayK;view=new Date(today.getFullYear(),today.getMonth(),1);
  renderAll();renderMenu();
}
function logout(){switchTo(null);toast('Sesión cerrada correctamente.')}
function renderMenu(){
  const u=user(),b=$('#pfBtn'),m=$('#menuItems');
  $('#uSmall').textContent=u?'Sesión iniciada como':'Sin sesión iniciada';
  $('#uName').textContent=u?u.name:'Invitado';$('#uMail').textContent=u?u.email:'';
  b.classList.toggle('has-img',!!(u&&u.photo));
  b.style.backgroundImage=(u&&u.photo)?'url('+u.photo+')':'';
  b.textContent=u?(u.photo?'':u.name.trim().charAt(0).toUpperCase()):'Perfil';
  b.setAttribute('aria-label',u?'Perfil de '+u.name:'Perfil');
  m.innerHTML='';
  const items=u?[['Configuración',openSet],['Cambiar cuenta',openAcc],['Cerrar sesión',logout,1]]:[['Iniciar sesión',()=>openAuth('login')],['Registrarse',()=>openAuth('register')],['Cambiar cuenta',openAcc],['Configuración',openSet]];
  items.forEach(([t,fn,dg])=>{const x=document.createElement('button');x.className='mi'+(dg?' dg':'');x.textContent=t;x.onclick=()=>{pfSet(false);fn()};m.append(x)});
}
let aMode='login';
function openAuth(m){
  aMode=m;const reg=m==='register';
  $('#aTitle').textContent=reg?'Crear cuenta':'Iniciar sesión';
  $('#lName').hidden=!reg;$('#lPass2').hidden=!reg;
  $('#aGo').textContent=reg?'Registrarme':'Entrar';
  $('#aSwap').textContent=reg?'¿Ya tienes cuenta? Inicia sesión':'¿No tienes cuenta? Regístrate';
  $('#aPass').autocomplete=reg?'new-password':'current-password';
  ['#aName','#aMail','#aPass','#aPass2'].forEach(s=>$(s).value='');$('#aErr').textContent='';
  if(!$('#dAuth').open)$('#dAuth').showModal();
  $(reg?'#aName':'#aMail').focus();
}
$('#aSwap').onclick=()=>openAuth(aMode==='login'?'register':'login');
$('#aCancel').onclick=()=>$('#dAuth').close();
$('#fAuth').addEventListener('submit',async e=>{
  e.preventDefault();const err=m=>{$('#aErr').textContent=m};
  const name=$('#aName').value.trim(),mail=$('#aMail').value.trim().toLowerCase(),pass=$('#aPass').value;
  if(!/^\S+@\S+\.\S+$/.test(mail))return err('Escribe un correo válido.');
  if(aMode==='register'){
    if(!name)return err('Escribe tu nombre.');
    if(pass.length<6)return err('La contraseña debe tener al menos 6 caracteres.');
    if(pass!==$('#aPass2').value)return err('Las contraseñas no coinciden.');
    if(ACC.users.some(u=>u.email===mail))return err('Ya existe una cuenta con ese correo.');
    const id='u'+Date.now();
    ACC.users.push({id,name,email:mail,pass:await hash(id+':'+pass),photo:''});
    switchTo(id);$('#dAuth').close();toast('Cuenta creada. ¡Bienvenido, '+name+'!');
  }else{
    if(!pass)return err('Escribe tu contraseña.');
    const u=ACC.users.find(x=>x.email===mail);
    if(!u||u.pass!==await hash(u.id+':'+pass))return err('Correo o contraseña incorrectos.');
    switchTo(u.id);$('#dAuth').close();toast('Sesión iniciada. ¡Hola, '+u.name+'!');
  }
});
function openAcc(){
  const l=$('#accList');l.innerHTML='';
  if(!ACC.users.length)l.innerHTML='<p class="sm">Aún no hay cuentas guardadas en este navegador.</p>';
  ACC.users.forEach(u=>{
    const b=document.createElement('button');b.type='button';b.className='mi';
    b.textContent=u.name+' · '+u.email+(u.id===ACC.current?' (actual)':'');
    b.onclick=()=>{$('#dAcc').close();if(u.id!==ACC.current){switchTo(u.id);toast('Cambiaste a la cuenta de '+u.name+'.')}};
    l.append(b);
  });
  $('#dAcc').showModal();
}
$('#accClose').onclick=()=>$('#dAcc').close();
$('#accAdd').onclick=()=>{$('#dAcc').close();openAuth('login')};
$('#fAcc').addEventListener('submit',e=>e.preventDefault());
function openSet(){
  const u=user();
  ['#sName','#sMail','#sSave','#sPhoto','#sPhotoDel'].forEach(s=>{$(s).disabled=!u});
  $('#sName').value=u?u.name:'';$('#sMail').value=u?u.email:'';$('#sErr').textContent='';$('#sPhoto').value='';
  $('#setHint').textContent=u?'':'Inicia sesión para editar tus datos y tu foto. El modo y el tamaño de letra sí puedes cambiarlos ahora.';
  applyPrefs();$('#dSet').showModal();
}
$('#sClose').onclick=()=>$('#dSet').close();
$('#fSet').addEventListener('submit',e=>e.preventDefault());
$('#sSave').onclick=()=>{
  const u=user(),name=$('#sName').value.trim(),mail=$('#sMail').value.trim().toLowerCase(),err=m=>{$('#sErr').textContent=m};
  if(!name)return err('Escribe tu nombre.');
  if(!/^\S+@\S+\.\S+$/.test(mail))return err('Escribe un correo válido.');
  if(ACC.users.some(x=>x.id!==u.id&&x.email===mail))return err('Ese correo ya lo usa otra cuenta.');
  $('#sErr').textContent='';u.name=name;u.email=mail;saveAcc();renderMenu();toast('Datos actualizados.');
};
document.querySelectorAll('#segTheme button').forEach(b=>b.onclick=()=>{PREFS.theme=b.dataset.v;lsSet('planificador_prefs',PREFS);applyPrefs();toast('Modo '+b.textContent.toLowerCase()+' activado.')});
document.querySelectorAll('#segFs button').forEach(b=>b.onclick=()=>{PREFS.fs=b.dataset.v;lsSet('planificador_prefs',PREFS);applyPrefs();toast('Tamaño de letra: '+b.textContent.toLowerCase()+'.')});
$('#sPhoto').onchange=e=>{
  const f=e.target.files[0];if(!f)return;
  if(!f.type.startsWith('image/'))return toast('El archivo debe ser una imagen.','err');
  if(f.size>5*1024*1024)return toast('La imagen es muy pesada (máximo 5 MB).','err');
  const img=new Image(),url=URL.createObjectURL(f);
  img.onload=()=>{
    const c=document.createElement('canvas');c.width=c.height=160;const x=c.getContext('2d'),s=Math.min(img.width,img.height);
    x.drawImage(img,(img.width-s)/2,(img.height-s)/2,s,s,0,0,160,160);URL.revokeObjectURL(url);
    const u=user();u.photo=c.toDataURL('image/jpeg',.85);saveAcc();renderMenu();toast('Foto de perfil actualizada.');
  };
  img.onerror=()=>{URL.revokeObjectURL(url);toast('No se pudo leer la imagen.','err')};
  img.src=url;
};
$('#sPhotoDel').onclick=()=>{const u=user();if(!u.photo)return toast('No tienes una foto para quitar.','err');u.photo='';saveAcc();renderMenu();$('#sPhoto').value='';toast('Foto eliminada.')};
applyPrefs();renderMenu();
$('#prev').onclick=()=>{view=new Date(view.getFullYear(),view.getMonth()-1,1);renderCal()};
$('#next').onclick=()=>{view=new Date(view.getFullYear(),view.getMonth()+1,1);renderCal()};
renderAll();
</script>
</body>
</html>
