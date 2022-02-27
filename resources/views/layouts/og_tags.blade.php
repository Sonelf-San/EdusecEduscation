<meta property="og:title" content="{{ $title or 'DEFAULT PAGE TITLE' }}">
<meta property="og:image" content="{{ $image or 'default.png' }}">
<meta property="og:url" content="{{ isset($url) ? $url : str_replace('http://', 'https://', Request::url()) }}">

<!-- Open Graph Markup -->
    <meta property="og:url" content="http://www.edusec.biz" />
    <meta property="og:type" content="Education" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
<!-- Open Graph Markup -->