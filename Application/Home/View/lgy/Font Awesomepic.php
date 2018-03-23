<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>font-awesome图标</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
    }
    
    body {
        font-size: 14px;
        padding: 15px;
    }
    
    li {
        list-style: none;
    }
    
    .page-header {
        padding-bottom: 9px;
        margin: 20px 0 30px;
        border-bottom: 1px solid #eee;
    }
    
    .the-icons li {
        line-height: 32px;
        height: 32px;
        padding-left: 12px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
    }
    
    .row {
        zoom: 1;
        overflow: hidden;
    }
    
    .row:after {
        clear: both;
    }
    
    .row:after {
        display: block;
        clear: both;
        visibility: hidden;
        height: 0;
        content: '';
    }
    
    section {
        padding-top: 40px;
    }
    
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    nav,
    section {
        display: block;
    }
    
    .span3 {
        width: 23%;
    }
    
    [class*="span"] {
        float: left;
        min-height: 1px;
        margin-left: 20px;
    }
    </style>
</head>

<body>
    <ul>
        <li><a href="#icons-new">使用方法</a></li>
        <li><a href="#icons-new">3.0 版本中新增的图标</a></li>
        <li><a href="#icons-web-app">适合 Web 应用的图标</a></li>
        <li><a href="#icons-text-editor">文本编辑器图标</a></li>
        <li><a href="#icons-directional">指示方向的图标</a></li>
        <li><a href="#icons-video-player">视频播放器图标</a></li>
        <li><a href="#icons-social">SNS图标</a></li>
        <li><a href="#icons-medical">医疗图标</a></li>
    </ul>
    <section id="icons-new" class="row">
        <h2 class="page-header">Font Awesome图标使用方法</h2>
        <ol>
            <li>下载font-awesome的样式文件（font-awesome.min.css或font-awesome.css）和字体文件（FontAwesome.otf，fontawesome-webfont.eot，fontawesome-webfont.svg，fontawesome-webfont.ttf，fontawesome-webfont.woff）；</li>
            <li>把样式文件和字体文件放到项目里，字体文件放在font目录，样式文件放到跟font目录同级的另一个目录；</li>
            <li>在项目需要使用font-awesome图标的页面引用font-awesome的样式文件</li>
            <li>在页面需要使用font-awesome图标的地方加入大概这样的代码：&lt;i class="icon-caret-down"&gt;&lt;/i&gt;</li>
            <li>例：</li>
            <li>&lt;i class="icon-caret-down"&gt;&lt;/i&gt;</li>
            <li>&lt;i class="icon-caret-down my-class"&gt;&lt;/i&gt;</li>
            <li>&lt;span class="icon-caret-down"&gt;&lt;/span&gt;</li>
            <li>测试图标：&lt;span class="icon-github-sign"&gt;&lt;/span&gt; 右边会显示一个图标</li>
        </ol>
    </section>
    <section id="icons-new" class="row">
        <h2 class="page-header">3.0 版本中新增的图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-cloud-download"></i> icon-cloud-download</li>
                <li><i class="icon-cloud-upload"></i> icon-cloud-upload</li>
                <li><i class="icon-lightbulb"></i> icon-lightbulb</li>
                <li><i class="icon-exchange"></i> icon-exchange</li>
                <li><i class="icon-bell-alt"></i> icon-bell-alt</li>
                <li><i class="icon-file-alt"></i> icon-file-alt</li>
                <li><i class="icon-beer"></i> icon-beer</li>
                <li><i class="icon-coffee"></i> icon-coffee</li>
                <li><i class="icon-food"></i> icon-food</li>
                <li><i class="icon-fighter-jet"></i> icon-fighter-jet</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-user-md"></i> icon-user-md</li>
                <li><i class="icon-stethoscope"></i> icon-stethoscope</li>
                <li><i class="icon-suitcase"></i> icon-suitcase</li>
                <li><i class="icon-building"></i> icon-building</li>
                <li><i class="icon-hospital"></i> icon-hospital</li>
                <li><i class="icon-ambulance"></i> icon-ambulance</li>
                <li><i class="icon-medkit"></i> icon-medkit</li>
                <li><i class="icon-h-sign"></i> icon-h-sign</li>
                <li><i class="icon-plus-sign-alt"></i> icon-plus-sign-alt</li>
                <li><i class="icon-spinner"></i> icon-spinner</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-angle-left"></i> icon-angle-left</li>
                <li><i class="icon-angle-right"></i> icon-angle-right</li>
                <li><i class="icon-angle-up"></i> icon-angle-up</li>
                <li><i class="icon-angle-down"></i> icon-angle-down</li>
                <li><i class="icon-double-angle-left"></i> icon-double-angle-left</li>
                <li><i class="icon-double-angle-right"></i> icon-double-angle-right</li>
                <li><i class="icon-double-angle-up"></i> icon-double-angle-up</li>
                <li><i class="icon-double-angle-down"></i> icon-double-angle-down</li>
                <li><i class="icon-circle-blank"></i> icon-circle-blank</li>
                <li><i class="icon-circle"></i> icon-circle</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-desktop"></i> icon-desktop</li>
                <li><i class="icon-laptop"></i> icon-laptop</li>
                <li><i class="icon-tablet"></i> icon-tablet</li>
                <li><i class="icon-mobile-phone"></i> icon-mobile-phone</li>
                <li><i class="icon-quote-left"></i> icon-quote-left</li>
                <li><i class="icon-quote-right"></i> icon-quote-right</li>
                <li><i class="icon-reply"></i> icon-reply</li>
                <li><i class="icon-github-alt"></i> icon-github-alt</li>
                <li><i class="icon-folder-close-alt"></i> icon-folder-close-alt</li>
                <li><i class="icon-folder-open-alt"></i> icon-folder-open-alt</li>
            </ul>
        </div>
    </section>
    <section id="icons-web-app" class="row">
        <h2 class="page-header">适合 Web 应用的图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-adjust"></i> icon-adjust</li>
                <li><i class="icon-asterisk"></i> icon-asterisk</li>
                <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
                <li><i class="icon-bar-chart"></i> icon-bar-chart</li>
                <li><i class="icon-barcode"></i> icon-barcode</li>
                <li><i class="icon-beaker"></i> icon-beaker</li>
                <li><i class="icon-beer"></i> icon-beer</li>
                <li><i class="icon-bell"></i> icon-bell</li>
                <li><i class="icon-bell-alt"></i> icon-bell-alt</li>
                <li><i class="icon-bolt"></i> icon-bolt</li>
                <li><i class="icon-book"></i> icon-book</li>
                <li><i class="icon-bookmark"></i> icon-bookmark</li>
                <li><i class="icon-bookmark-empty"></i> icon-bookmark-empty</li>
                <li><i class="icon-briefcase"></i> icon-briefcase</li>
                <li><i class="icon-bullhorn"></i> icon-bullhorn</li>
                <li><i class="icon-calendar"></i> icon-calendar</li>
                <li><i class="icon-camera"></i> icon-camera</li>
                <li><i class="icon-camera-retro"></i> icon-camera-retro</li>
                <li><i class="icon-certificate"></i> icon-certificate</li>
                <li><i class="icon-check"></i> icon-check</li>
                <li><i class="icon-check-empty"></i> icon-check-empty</li>
                <li><i class="icon-circle"></i> icon-circle</li>
                <li><i class="icon-circle-blank"></i> icon-circle-blank</li>
                <li><i class="icon-cloud"></i> icon-cloud</li>
                <li><i class="icon-cloud-download"></i> icon-cloud-download</li>
                <li><i class="icon-cloud-upload"></i> icon-cloud-upload</li>
                <li><i class="icon-coffee"></i> icon-coffee</li>
                <li><i class="icon-cog"></i> icon-cog</li>
                <li><i class="icon-cogs"></i> icon-cogs</li>
                <li><i class="icon-comment"></i> icon-comment</li>
                <li><i class="icon-comment-alt"></i> icon-comment-alt</li>
                <li><i class="icon-comments"></i> icon-comments</li>
                <li><i class="icon-comments-alt"></i> icon-comments-alt</li>
                <li><i class="icon-credit-card"></i> icon-credit-card</li>
                <li><i class="icon-dashboard"></i> icon-dashboard</li>
                <li><i class="icon-desktop"></i> icon-desktop</li>
                <li><i class="icon-download"></i> icon-download</li>
                <li><i class="icon-download-alt"></i> icon-download-alt</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-edit"></i> icon-edit</li>
                <li><i class="icon-envelope"></i> icon-envelope</li>
                <li><i class="icon-envelope-alt"></i> icon-envelope-alt</li>
                <li><i class="icon-exchange"></i> icon-exchange</li>
                <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
                <li><i class="icon-external-link"></i> icon-external-link</li>
                <li><i class="icon-eye-close"></i> icon-eye-close</li>
                <li><i class="icon-eye-open"></i> icon-eye-open</li>
                <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
                <li><i class="icon-fighter-jet"></i> icon-fighter-jet</li>
                <li><i class="icon-film"></i> icon-film</li>
                <li><i class="icon-filter"></i> icon-filter</li>
                <li><i class="icon-fire"></i> icon-fire</li>
                <li><i class="icon-flag"></i> icon-flag</li>
                <li><i class="icon-folder-close"></i> icon-folder-close</li>
                <li><i class="icon-folder-open"></i> icon-folder-open</li>
                <li><i class="icon-folder-close-alt"></i> icon-folder-close-alt</li>
                <li><i class="icon-folder-open-alt"></i> icon-folder-open-alt</li>
                <li><i class="icon-food"></i> icon-food</li>
                <li><i class="icon-gift"></i> icon-gift</li>
                <li><i class="icon-glass"></i> icon-glass</li>
                <li><i class="icon-globe"></i> icon-globe</li>
                <li><i class="icon-group"></i> icon-group</li>
                <li><i class="icon-hdd"></i> icon-hdd</li>
                <li><i class="icon-headphones"></i> icon-headphones</li>
                <li><i class="icon-heart"></i> icon-heart</li>
                <li><i class="icon-heart-empty"></i> icon-heart-empty</li>
                <li><i class="icon-home"></i> icon-home</li>
                <li><i class="icon-inbox"></i> icon-inbox</li>
                <li><i class="icon-info-sign"></i> icon-info-sign</li>
                <li><i class="icon-key"></i> icon-key</li>
                <li><i class="icon-leaf"></i> icon-leaf</li>
                <li><i class="icon-laptop"></i> icon-laptop</li>
                <li><i class="icon-legal"></i> icon-legal</li>
                <li><i class="icon-lemon"></i> icon-lemon</li>
                <li><i class="icon-lightbulb"></i> icon-lightbulb</li>
                <li><i class="icon-lock"></i> icon-lock</li>
                <li><i class="icon-unlock"></i> icon-unlock</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-magic"></i> icon-magic</li>
                <li><i class="icon-magnet"></i> icon-magnet</li>
                <li><i class="icon-map-marker"></i> icon-map-marker</li>
                <li><i class="icon-minus"></i> icon-minus</li>
                <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
                <li><i class="icon-mobile-phone"></i> icon-mobile-phone</li>
                <li><i class="icon-money"></i> icon-money</li>
                <li><i class="icon-move"></i> icon-move</li>
                <li><i class="icon-music"></i> icon-music</li>
                <li><i class="icon-off"></i> icon-off</li>
                <li><i class="icon-ok"></i> icon-ok</li>
                <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
                <li><i class="icon-ok-sign"></i> icon-ok-sign</li>
                <li><i class="icon-pencil"></i> icon-pencil</li>
                <li><i class="icon-picture"></i> icon-picture</li>
                <li><i class="icon-plane"></i> icon-plane</li>
                <li><i class="icon-plus"></i> icon-plus</li>
                <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
                <li><i class="icon-print"></i> icon-print</li>
                <li><i class="icon-pushpin"></i> icon-pushpin</li>
                <li><i class="icon-qrcode"></i> icon-qrcode</li>
                <li><i class="icon-question-sign"></i> icon-question-sign</li>
                <li><i class="icon-quote-left"></i> icon-quote-left</li>
                <li><i class="icon-quote-right"></i> icon-quote-right</li>
                <li><i class="icon-random"></i> icon-random</li>
                <li><i class="icon-refresh"></i> icon-refresh</li>
                <li><i class="icon-remove"></i> icon-remove</li>
                <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
                <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
                <li><i class="icon-reorder"></i> icon-reorder</li>
                <li><i class="icon-reply"></i> icon-reply</li>
                <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
                <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
                <li><i class="icon-retweet"></i> icon-retweet</li>
                <li><i class="icon-road"></i> icon-road</li>
                <li><i class="icon-rss"></i> icon-rss</li>
                <li><i class="icon-screenshot"></i> icon-screenshot</li>
                <li><i class="icon-search"></i> icon-search</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-share"></i> icon-share</li>
                <li><i class="icon-share-alt"></i> icon-share-alt</li>
                <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
                <li><i class="icon-signal"></i> icon-signal</li>
                <li><i class="icon-signin"></i> icon-signin</li>
                <li><i class="icon-signout"></i> icon-signout</li>
                <li><i class="icon-sitemap"></i> icon-sitemap</li>
                <li><i class="icon-sort"></i> icon-sort</li>
                <li><i class="icon-sort-down"></i> icon-sort-down</li>
                <li><i class="icon-sort-up"></i> icon-sort-up</li>
                <li><i class="icon-spinner"></i> icon-spinner</li>
                <li><i class="icon-star"></i> icon-star</li>
                <li><i class="icon-star-empty"></i> icon-star-empty</li>
                <li><i class="icon-star-half"></i> icon-star-half</li>
                <li><i class="icon-tablet"></i> icon-tablet</li>
                <li><i class="icon-tag"></i> icon-tag</li>
                <li><i class="icon-tags"></i> icon-tags</li>
                <li><i class="icon-tasks"></i> icon-tasks</li>
                <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                <li><i class="icon-time"></i> icon-time</li>
                <li><i class="icon-tint"></i> icon-tint</li>
                <li><i class="icon-trash"></i> icon-trash</li>
                <li><i class="icon-trophy"></i> icon-trophy</li>
                <li><i class="icon-truck"></i> icon-truck</li>
                <li><i class="icon-umbrella"></i> icon-umbrella</li>
                <li><i class="icon-upload"></i> icon-upload</li>
                <li><i class="icon-upload-alt"></i> icon-upload-alt</li>
                <li><i class="icon-user"></i> icon-user</li>
                <li><i class="icon-user-md"></i> icon-user-md</li>
                <li><i class="icon-volume-off"></i> icon-volume-off</li>
                <li><i class="icon-volume-down"></i> icon-volume-down</li>
                <li><i class="icon-volume-up"></i> icon-volume-up</li>
                <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
                <li><i class="icon-wrench"></i> icon-wrench</li>
                <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
                <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
            </ul>
        </div>
    </section>
    <section id="icons-text-editor" class="row">
        <h2 class="page-header">文本编辑器图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-file"></i> icon-file</li>
                <li><i class="icon-file-alt"></i> icon-file-alt</li>
                <li><i class="icon-cut"></i> icon-cut</li>
                <li><i class="icon-copy"></i> icon-copy</li>
                <li><i class="icon-paste"></i> icon-paste</li>
                <li><i class="icon-save"></i> icon-save</li>
                <li><i class="icon-undo"></i> icon-undo</li>
                <li><i class="icon-repeat"></i> icon-repeat</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-text-height"></i> icon-text-height</li>
                <li><i class="icon-text-width"></i> icon-text-width</li>
                <li><i class="icon-align-left"></i> icon-align-left</li>
                <li><i class="icon-align-center"></i> icon-align-center</li>
                <li><i class="icon-align-right"></i> icon-align-right</li>
                <li><i class="icon-align-justify"></i> icon-align-justify</li>
                <li><i class="icon-indent-left"></i> icon-indent-left</li>
                <li><i class="icon-indent-right"></i> icon-indent-right</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-font"></i> icon-font</li>
                <li><i class="icon-bold"></i> icon-bold</li>
                <li><i class="icon-italic"></i> icon-italic</li>
                <li><i class="icon-strikethrough"></i> icon-strikethrough</li>
                <li><i class="icon-underline"></i> icon-underline</li>
                <li><i class="icon-link"></i> icon-link</li>
                <li><i class="icon-paper-clip"></i> icon-paper-clip</li>
                <li><i class="icon-columns"></i> icon-columns</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-table"></i> icon-table</li>
                <li><i class="icon-th-large"></i> icon-th-large</li>
                <li><i class="icon-th"></i> icon-th</li>
                <li><i class="icon-th-list"></i> icon-th-list</li>
                <li><i class="icon-list"></i> icon-list</li>
                <li><i class="icon-list-ol"></i> icon-list-ol</li>
                <li><i class="icon-list-ul"></i> icon-list-ul</li>
                <li><i class="icon-list-alt"></i> icon-list-alt</li>
            </ul>
        </div>
    </section>
    <section id="icons-directional" class="row">
        <h2 class="page-header">指示方向的图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-angle-left"></i> icon-angle-left</li>
                <li><i class="icon-angle-right"></i> icon-angle-right</li>
                <li><i class="icon-angle-up"></i> icon-angle-up</li>
                <li><i class="icon-angle-down"></i> icon-angle-down</li>
                <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
                <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
                <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
                <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-caret-down"></i> icon-caret-down</li>
                <li><i class="icon-caret-left"></i> icon-caret-left</li>
                <li><i class="icon-caret-right"></i> icon-caret-right</li>
                <li><i class="icon-caret-up"></i> icon-caret-up</li>
                <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
                <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
                <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
                <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
                <li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
                <li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
                <li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
                <li><i class="icon-double-angle-left"></i> icon-double-angle-left</li>
                <li><i class="icon-double-angle-right"></i> icon-double-angle-right</li>
                <li><i class="icon-double-angle-up"></i> icon-double-angle-up</li>
                <li><i class="icon-double-angle-down"></i> icon-double-angle-down</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-hand-down"></i> icon-hand-down</li>
                <li><i class="icon-hand-left"></i> icon-hand-left</li>
                <li><i class="icon-hand-right"></i> icon-hand-right</li>
                <li><i class="icon-hand-up"></i> icon-hand-up</li>
                <li><i class="icon-circle"></i> icon-circle</li>
                <li><i class="icon-circle-blank"></i> icon-circle-blank</li>
            </ul>
        </div>
    </section>
    <section id="icons-video-player" class="row">
        <h2 class="page-header">视频播放器图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-play-circle"></i> icon-play-circle</li>
                <li><i class="icon-play"></i> icon-play</li>
                <li><i class="icon-pause"></i> icon-pause</li>
                <li><i class="icon-stop"></i> icon-stop</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-step-backward"></i> icon-step-backward</li>
                <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                <li><i class="icon-backward"></i> icon-backward</li>
                <li><i class="icon-forward"></i> icon-forward</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                <li><i class="icon-step-forward"></i> icon-step-forward</li>
                <li><i class="icon-eject"></i> icon-eject</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
                <li><i class="icon-resize-full"></i> icon-resize-full</li>
                <li><i class="icon-resize-small"></i> icon-resize-small</li>
            </ul>
        </div>
    </section>
    <section id="icons-social" class="row">
        <h2 class="page-header">SNS图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-phone"></i> icon-phone</li>
                <li><i class="icon-phone-sign"></i> icon-phone-sign</li>
                <li><i class="icon-facebook"></i> icon-facebook</li>
                <li><i class="icon-facebook-sign"></i> icon-facebook-sign</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-twitter"></i> icon-twitter</li>
                <li><i class="icon-twitter-sign"></i> icon-twitter-sign</li>
                <li><i class="icon-github"></i> icon-github</li>
                <li><i class="icon-github-alt"></i> icon-github-alt</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-github-sign"></i> icon-github-sign</li>
                <li><i class="icon-linkedin"></i> icon-linkedin</li>
                <li><i class="icon-linkedin-sign"></i> icon-linkedin-sign</li>
                <li><i class="icon-pinterest"></i> icon-pinterest</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-pinterest-sign"></i> icon-pinterest-sign</li>
                <li><i class="icon-google-plus"></i> icon-google-plus</li>
                <li><i class="icon-google-plus-sign"></i> icon-google-plus-sign</li>
                <li><i class="icon-sign-blank"></i> icon-sign-blank</li>
            </ul>
        </div>
    </section>
    <section id="icons-medical" class="row">
        <h2 class="page-header">医疗图标</h2>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-ambulance"></i> icon-ambulance</li>
                <li><i class="icon-beaker"></i> icon-beaker</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-h-sign"></i> icon-h-sign</li>
                <li><i class="icon-hospital"></i> icon-hospital</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-medkit"></i> icon-medkit</li>
                <li><i class="icon-plus-sign-alt"></i> icon-plus-sign-alt</li>
            </ul>
        </div>
        <div class="span3">
            <ul class="the-icons">
                <li><i class="icon-stethoscope"></i> icon-stethoscope</li>
                <li><i class="icon-user-md"></i> icon-user-md</li>
            </ul>
        </div>
    </section>
</body>

</html>
