<?php
// ===================================================================
// ЦЕНТР УПРАВЛЕНИЯ — Boostore.pro
// ===================================================================

// Read all configs to extract domain lists
$articlesSites = [];
$pagesSites = [];
$blocksSites = [];

$articlesCfg = __DIR__ . '/_setting_articles.inc';
$pagesCfg = __DIR__ . '/_setting_pages.inc';
$blocksCfg = __DIR__ . '/_setting_blocks.inc';

if (file_exists($articlesCfg)) {
    $SITES = [];
    require $articlesCfg;
    if (isset($SITES)) $articlesSites = $SITES;
}
if (file_exists($pagesCfg)) {
    $SITES = [];
    require $pagesCfg;
    if (isset($SITES)) $pagesSites = $SITES;
}
if (file_exists($blocksCfg)) {
    $SITES = [];
    require $blocksCfg;
    if (isset($SITES)) $blocksSites = $SITES;
}
?><!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Центр управления — Boostore.pro</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:linear-gradient(135deg,#0a0e1a 0%,#1a1a2e 50%,#16213e 100%);color:#e0e0e0;font-family:'Segoe UI',system-ui,sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
.wrap{max-width:960px;width:100%}
.header{text-align:center;margin-bottom:40px}
.header h1{font-size:32px;color:#00d4ff;font-weight:700;letter-spacing:-0.5px;margin-bottom:8px}
.header p{color:#888;font-size:14px}
.header .badge{display:inline-block;background:#0f3460;color:#4dc9f6;padding:4px 14px;border-radius:20px;font-size:12px;margin-top:10px}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:32px}
.card{background:#16213e;border:1px solid #0f3460;border-radius:16px;padding:28px;transition:all .3s;position:relative;overflow:hidden}
.card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;transition:all .3s}
.card.articles::before{background:linear-gradient(90deg,#00d4ff,#4dc9f6)}
.card.pages::before{background:linear-gradient(90deg,#ff9800,#ffb74d)}
.card:hover{border-color:#00d4ff;transform:translateY(-4px);box-shadow:0 12px 40px rgba(0,0,0,.4)}
.card.pages:hover{border-color:#ff9800}
.card-icon{font-size:48px;margin-bottom:12px}
.card h2{font-size:22px;margin-bottom:8px;font-weight:600}
.card.articles h2{color:#00d4ff}
.card.pages h2{color:#ff9800}
.card p{color:#888;font-size:13px;margin-bottom:16px;line-height:1.5}
.card .btn{display:inline-flex;align-items:center;gap:8px;padding:12px 28px;border:none;border-radius:8px;font-size:15px;font-weight:600;cursor:pointer;text-decoration:none;transition:all .2s}
.card.articles .btn{background:#00d4ff;color:#0a0e1a}
.card.articles .btn:hover{background:#4dc9f6;box-shadow:0 4px 16px rgba(0,212,255,.3);transform:translateY(-2px)}
.card.pages .btn{background:#ff9800;color:#0a0e1a}
.card.pages .btn:hover{background:#ffb74d;box-shadow:0 4px 16px rgba(255,152,0,.3);transform:translateY(-2px)}
.card .btn .arrow{font-size:18px}
.sites-section{background:#16213e;border:1px solid #0f3460;border-radius:12px;padding:24px;margin-top:8px}
.sites-section h3{font-size:16px;color:#888;margin-bottom:16px;font-weight:500}
.sites-section h3 span{color:#e0e0e0}
.sites-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.site-group{background:#0d1b2a;border:1px solid #0f3460;border-radius:10px;padding:16px;transition:border-color .2s}
.site-group:hover{border-color:#00d4ff}
.site-group h4{font-size:13px;margin-bottom:10px;display:flex;align-items:center;gap:6px}
.site-group h4 .label{font-weight:400}
.site-group h4.articles-label{color:#00d4ff}
.site-group h4.pages-label{color:#ff9800}
.site-list{list-style:none;padding:0}
.site-list li{display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px solid #0f3460;font-size:13px}
.site-list li:last-child{border-bottom:none}
.site-list li .domain{color:#e0e0e0;font-family:'Consolas',monospace;font-size:12px;word-break:break-all}
.site-list li .key-status{font-size:11px;padding:2px 8px;border-radius:10px}
.site-list li .key-status.ok{background:#1b5e20;color:#81c784}
.site-list li .key-status.missing{background:#3e2723;color:#ef9a9a}
.empty-msg{color:#555;font-size:13px;font-style:italic;padding:4px 0}
.footer{text-align:center;padding:20px;color:#444;font-size:12px;margin-top:16px}
.footer a{color:#00d4ff;text-decoration:none}
@media(max-width:640px){.grid{grid-template-columns:1fr}.sites-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="wrap">
<div class="header">
<h1>⚙ Центр управления</h1>
<p>Импорт и экспорт данных через API Boostore.pro</p>
<span class="badge">📡 Commerce API v2.0</span>
</div>

<div class="grid">
<div class="card articles">
<div class="card-icon">📝</div>
<h2>Статьи блога</h2>
<p>Управление статьями блога: импорт с API, экспорт на сервер,<br>многоязычность, категории, фильтрация</p>
<a href="blog.php?site=<?=htmlspecialchars(array_key_first($articlesSites) ?: 'site.boostore.pro')?>" class="btn">
📥 Перейти <span class="arrow">→</span>
</a>
</div>

<div class="card pages">
<div class="card-icon">📄</div>
<h2>Страницы</h2>
<p>Управление страницами сайта: импорт с API, экспорт на сервер,<br>многоязычность, гибкие настройки дат</p>
<a href="pages.php?site=<?=htmlspecialchars(array_key_first($pagesSites) ?: 'site.boostore.pro')?>" class="btn">
📥 Перейти <span class="arrow">→</span>
</a>
</div>

<div class="card pages" style="--card-accent:#9c27b0;">
<div class="card-icon">🧩</div>
<h2 style="color:#ce93d8;">Блоки/Меню</h2>
<p>Управление блоками и меню сайта: импорт с API,<br>экспорт на сервер, позиции, видимость</p>
<a href="blocks.php?site=<?=htmlspecialchars(array_key_first($blocksSites) ?: 'site.boostore.pro')?>" class="btn" style="background:#9c27b0;color:#fff;">
📥 Перейти <span class="arrow">→</span>
</a>
</div>
</div>

<div class="sites-section">
<h3>🔗 Подключенные сайты <span>(домены)</span></h3>
<div class="sites-grid">
<div class="site-group">
<h4 class="articles-label"><span class="label">📝 Статьи</span></h4>
<?php if (empty($articlesSites)): ?>
<p class="empty-msg">Нет настроенных сайтов</p>
<?php else: ?>
<ul class="site-list">
<?php foreach ($articlesSites as $domain => $cfg): ?>
<li>
<span class="domain"><?=htmlspecialchars($domain)?></span>
<span class="key-status <?=empty($cfg['key'])?'missing':'ok'?>"><?=empty($cfg['key'])?'✕ нет ключа':'✓ ключ есть'?></span>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>

<div class="site-group">
<h4 class="pages-label"><span class="label">📄 Страницы</span></h4>
<?php if (empty($pagesSites)): ?>
<p class="empty-msg">Нет настроенных сайтов</p>
<?php else: ?>
<ul class="site-list">
<?php foreach ($pagesSites as $domain => $cfg): ?>
<li>
<span class="domain"><?=htmlspecialchars($domain)?></span>
<span class="key-status <?=empty($cfg['key'])?'missing':'ok'?>"><?=empty($cfg['key'])?'✕ нет ключа':'✓ ключ есть'?></span>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>

<div class="site-group">
<h4 class="pages-label" style="color:#ce93d8;"><span class="label">🧩 Блоки/Меню</span></h4>
<?php if (empty($blocksSites)): ?>
<p class="empty-msg">Нет настроенных сайтов</p>
<?php else: ?>
<ul class="site-list">
<?php foreach ($blocksSites as $domain => $cfg): ?>
<li>
<span class="domain"><?=htmlspecialchars($domain)?></span>
<span class="key-status <?=empty($cfg['key'])?'missing':'ok'?>"><?=empty($cfg['key'])?'✕ нет ключа':'✓ ключ есть'?></span>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>
</div>
</div>

<div class="footer">
<strong>Boostore.pro</strong> — <?=date('Y-m-d H:i:s')?> &nbsp;|&nbsp; <a href="https://boostore.pro/ru/docs/api-integration/#hotengine-CommerceAPI" target="_blank">Документация API</a>
</div>
</div>
</body>
</html>
