<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title','Admin') | The Farm Care CMS</title>
    <link rel="icon" href="{{ !empty($siteSettings['logo']) ? \App\Support\MediaUrl::make($siteSettings['logo']) : asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>
<div class="admin-shell" id="adminShell">
    <aside class="side" id="adminSidebar">
        <a class="side-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ !empty($siteSettings['logo']) ? \App\Support\MediaUrl::make($siteSettings['logo']) : asset('assets/images/logo.png') }}" alt="The Farm Care">
            <div>
                <b>The Farm Care</b>
                <span>Website CMS</span>
            </div>
        </a>

        <div class="side-section-label">Manage</div>
        <nav class="side-nav">
            <a class="{{ request()->routeIs('admin.dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'dashboard'])</span><span>Overview</span></a>
            <a class="{{ request()->routeIs('admin.categories.*')?'active':'' }}" href="{{ route('admin.categories.index') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'categories'])</span><span>Categories</span></a>
            <a class="{{ request()->routeIs('admin.products.*')?'active':'' }}" href="{{ route('admin.products.index') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'products'])</span><span>Products</span></a>
            <a class="{{ request()->routeIs('admin.pages.*')?'active':'' }}" href="{{ route('admin.pages.index') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'pages'])</span><span>Website Pages</span></a>
            <a class="{{ request()->routeIs('admin.media.*')?'active':'' }}" href="{{ route('admin.media.index') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'media'])</span><span>Media Library</span></a>
            <a class="{{ request()->routeIs('admin.inquiries.*')?'active':'' }}" href="{{ route('admin.inquiries.index') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'messages'])</span><span>Inquiries & Quotes</span></a>
        </nav>

        <div class="side-section-label">Configuration</div>
        <nav class="side-nav">
            <a class="{{ request()->routeIs('admin.settings.*')?'active':'' }}" href="{{ route('admin.settings.edit') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'settings'])</span><span>Website Settings</span></a>
            <a class="{{ request()->routeIs('admin.profile')?'active':'' }}" href="{{ route('admin.profile') }}"><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'profile'])</span><span>Admin Profile</span></a>
        </nav>

        <div class="side-footer">
            <a class="side-view-site" href="{{ route('home') }}" target="_blank" rel="noopener"><span>View Website</span><span class="side-nav-icon">@include('admin.partials.icon',['name'=>'external'])</span></a>
        </div>
    </aside>

    <main class="main">
        <header class="top">
            <div class="top-left">
                <button class="admin-menu-toggle" id="adminMenuToggle" type="button" aria-label="Toggle admin menu">☰</button>
                @hasSection('back_url')
                    <a class="admin-back-btn" href="@yield('back_url')" aria-label="@yield('back_label','Back')"><span>@include('admin.partials.icon',['name'=>'back'])</span><b>@yield('back_label','Back')</b></a>
                @endif
                <div class="top-title-block">
                    <div class="top-eyebrow">The Farm Care CMS</div>
                    <h1>@yield('heading','CMS')</h1>
                </div>
            </div>
            <div class="top-actions">
                <a class="btn btn-outline btn-sm top-view-site" href="{{ route('home') }}" target="_blank" rel="noopener"><span class="btn-icon">@include('admin.partials.icon',['name'=>'external'])</span>View Site</a>
                <form method="post" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-soft btn-sm">Sign Out</button></form>
            </div>
        </header>

        <div class="content">
            @if(session('success'))<div class="alert"><strong>Success.</strong> {{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert error"><strong>Action needed.</strong> {{ session('error') }}</div>@endif
            @if($errors->any())
                <div class="alert error">
                    <strong>Please review the form.</strong>
                    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
<div class="admin-overlay" id="adminOverlay"></div>
<script>
(function(){
    const shell=document.getElementById('adminShell');
    const toggle=document.getElementById('adminMenuToggle');
    const overlay=document.getElementById('adminOverlay');
    function close(){shell?.classList.remove('sidebar-open');document.body.classList.remove('admin-no-scroll');}
    toggle?.addEventListener('click',()=>{shell?.classList.toggle('sidebar-open');document.body.classList.toggle('admin-no-scroll');});
    overlay?.addEventListener('click',close);
    document.querySelectorAll('#adminSidebar a').forEach(a=>a.addEventListener('click',()=>{if(window.innerWidth<=980)close();}));
    window.addEventListener('resize',()=>{if(window.innerWidth>980) close();});
})();
</script>
@stack('scripts')
</body>
</html>
