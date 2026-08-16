@extends('admin.layout')
@section('heading','Edit '.$page->title)
@section('back_url', route('admin.pages.index'))
@section('back_label','Website Pages')
@section('content')
@php($content = $page->content ?? [])
<form class="panel" method="post" action="{{ route('admin.pages.update',$page) }}">
    @csrf @method('PUT')

    <div class="panel-head"><h2>Page Basics</h2></div>
    <div class="grid2">
        <div class="field"><label>Page Title</label><input name="title" value="{{ old('title',$page->title) }}" required></div>
        <div class="field"><label>Main Heading</label><input name="heading" value="{{ old('heading',$page->heading) }}"></div>
        <div class="field full"><label>Subheading / Introduction</label><textarea name="subheading">{{ old('subheading',$page->subheading) }}</textarea></div>

        @if($page->key === 'home')
            <div class="field"><label>Hero Eyebrow</label><input name="eyebrow" value="{{ old('eyebrow',$content['eyebrow'] ?? '') }}"></div>
            <div class="field"><label>Hero Image Badge</label><input name="hero_badge" value="{{ old('hero_badge',$content['hero_badge'] ?? '') }}"></div>
            <div class="field"><label>Hero Primary Button</label><input name="hero_primary_label" value="{{ old('hero_primary_label',$content['hero_primary_label'] ?? '') }}"></div>
            <div class="field"><label>Hero Secondary Button</label><input name="hero_secondary_label" value="{{ old('hero_secondary_label',$content['hero_secondary_label'] ?? '') }}"></div>

            <div class="field full"><hr><strong>About / Company Intro Section</strong></div>
            <div class="field"><label>Intro Kicker</label><input name="intro_kicker" value="{{ old('intro_kicker',$content['intro_kicker'] ?? '') }}"></div>
            <div class="field"><label>Intro Heading</label><input name="intro_heading" value="{{ old('intro_heading',$content['intro_heading'] ?? '') }}"></div>
            <div class="field full"><label>Intro Text</label><textarea name="intro_text">{{ old('intro_text',$content['intro_text'] ?? '') }}</textarea></div>
            @for($i=1;$i<=2;$i++)
                <div class="field"><label>Intro Point {{ $i }} Heading</label><input name="intro_point_{{ $i }}_heading" value="{{ old('intro_point_'.$i.'_heading',$content['intro_point_'.$i.'_heading'] ?? '') }}"></div>
                <div class="field"><label>Intro Point {{ $i }} Text</label><textarea name="intro_point_{{ $i }}_text" style="min-height:80px">{{ old('intro_point_'.$i.'_text',$content['intro_point_'.$i.'_text'] ?? '') }}</textarea></div>
            @endfor

            <div class="field full"><hr><strong>Category Section</strong></div>
            <div class="field"><label>Categories Heading</label><input name="categories_heading" value="{{ old('categories_heading',$content['categories_heading'] ?? '') }}"></div>
            <div class="field"><label>Category Link Label</label><input name="category_link_label" value="{{ old('category_link_label',$content['category_link_label'] ?? '') }}"></div>
            <div class="field full"><label>Categories Subheading</label><textarea name="categories_subheading">{{ old('categories_subheading',$content['categories_subheading'] ?? '') }}</textarea></div>

            <div class="field full"><hr><strong>Why Choose Us</strong></div>
            <div class="field full"><label>Why Choose Section Heading</label><input name="why_section_heading" value="{{ old('why_section_heading',$content['why_section_heading'] ?? '') }}"></div>
            @for($i=1;$i<=4;$i++)
                <div class="field"><label>Why Choose Card {{ $i }} Heading</label><input name="why_{{ $i }}_heading" value="{{ old('why_'.$i.'_heading',$content['why_'.$i.'_heading'] ?? '') }}"></div>
                <div class="field"><label>Why Choose Card {{ $i }} Text</label><textarea name="why_{{ $i }}_text" style="min-height:80px">{{ old('why_'.$i.'_text',$content['why_'.$i.'_text'] ?? '') }}</textarea></div>
            @endfor

            <div class="field full"><hr><strong>Business / Partner Section</strong></div>
            <div class="field"><label>Partner Section Heading</label><input name="partner_heading" value="{{ old('partner_heading',$content['partner_heading'] ?? '') }}"></div>
            <div class="field"><label>Partner Button Label</label><input name="partner_button_label" value="{{ old('partner_button_label',$content['partner_button_label'] ?? '') }}"></div>
            <div class="field full"><label>Partner Section Text</label><textarea name="partner_text">{{ old('partner_text',$content['partner_text'] ?? '') }}</textarea></div>

        @elseif($page->key === 'about')
            <div class="field"><label>Page Kicker</label><input name="page_kicker" value="{{ old('page_kicker',$content['page_kicker'] ?? '') }}"></div>
            <div class="field"><label>Main Content Kicker</label><input name="section_kicker" value="{{ old('section_kicker',$content['section_kicker'] ?? '') }}"></div>
            <div class="field full"><label>Main Content Heading</label><input name="section_heading" value="{{ old('section_heading',$content['section_heading'] ?? '') }}"></div>
            <div class="field full"><label>About Body</label><textarea name="body" style="min-height:220px">{{ old('body',$content['body'] ?? '') }}</textarea></div>
            @for($i=1;$i<=4;$i++)
                <div class="field"><label>Audience Card {{ $i }} Heading</label><input name="buyer_{{ $i }}_heading" value="{{ old('buyer_'.$i.'_heading',$content['buyer_'.$i.'_heading'] ?? '') }}"></div>
                <div class="field"><label>Audience Card {{ $i }} Text</label><textarea name="buyer_{{ $i }}_text" style="min-height:80px">{{ old('buyer_'.$i.'_text',$content['buyer_'.$i.'_text'] ?? '') }}</textarea></div>
            @endfor
            <div class="field"><label>Supply Section Kicker</label><input name="supply_kicker" value="{{ old('supply_kicker',$content['supply_kicker'] ?? '') }}"></div>
            <div class="field"><label>Supply Section Heading</label><input name="supply_heading" value="{{ old('supply_heading',$content['supply_heading'] ?? '') }}"></div>
            @for($i=1;$i<=4;$i++)
                <div class="field full"><label>Supply Point {{ $i }}</label><input name="supply_{{ $i }}" value="{{ old('supply_'.$i,$content['supply_'.$i] ?? '') }}"></div>
            @endfor

        @elseif($page->key === 'contact')
            <div class="field"><label>Page Kicker</label><input name="page_kicker" value="{{ old('page_kicker',$content['page_kicker'] ?? '') }}"></div>
            <div class="field"><label>Choice Section Kicker</label><input name="choice_kicker" value="{{ old('choice_kicker',$content['choice_kicker'] ?? '') }}"></div>
            <div class="field"><label>Choice Section Heading</label><input name="choice_heading" value="{{ old('choice_heading',$content['choice_heading'] ?? '') }}"></div>
            <div class="field full"><label>Choice Section Text</label><textarea name="choice_text">{{ old('choice_text',$content['choice_text'] ?? '') }}</textarea></div>
            <div class="field"><label>Quote Card Heading</label><input name="quote_heading" value="{{ old('quote_heading',$content['quote_heading'] ?? '') }}"></div>
            <div class="field"><label>Quote Card Button</label><input name="quote_button" value="{{ old('quote_button',$content['quote_button'] ?? '') }}"></div>
            <div class="field full"><label>Quote Card Text</label><textarea name="quote_text">{{ old('quote_text',$content['quote_text'] ?? '') }}</textarea></div>
            <div class="field"><label>Inquiry Card Heading</label><input name="inquiry_heading" value="{{ old('inquiry_heading',$content['inquiry_heading'] ?? '') }}"></div>
            <div class="field"><label>Inquiry Card Button</label><input name="inquiry_button" value="{{ old('inquiry_button',$content['inquiry_button'] ?? '') }}"></div>
            <div class="field full"><label>Inquiry Card Text</label><textarea name="inquiry_text">{{ old('inquiry_text',$content['inquiry_text'] ?? '') }}</textarea></div>

        @elseif($page->key === 'products')
            <div class="field"><label>Catalog Kicker</label><input name="page_kicker" value="{{ old('page_kicker',$content['page_kicker'] ?? '') }}"></div>
            <div class="field"><label>Sidebar Kicker</label><input name="sidebar_kicker" value="{{ old('sidebar_kicker',$content['sidebar_kicker'] ?? '') }}"></div>
            <div class="field"><label>Sidebar Heading</label><input name="sidebar_heading" value="{{ old('sidebar_heading',$content['sidebar_heading'] ?? '') }}"></div>
            <div class="field"><label>All Products Label</label><input name="all_products_label" value="{{ old('all_products_label',$content['all_products_label'] ?? '') }}"></div>
            <div class="field full"><label>Catalog Toolbar Text</label><textarea name="toolbar_text">{{ old('toolbar_text',$content['toolbar_text'] ?? '') }}</textarea></div>
            <div class="field"><label>Search Placeholder</label><input name="search_placeholder" value="{{ old('search_placeholder',$content['search_placeholder'] ?? '') }}"></div>
            <div class="field"><label>Search Button</label><input name="search_button" value="{{ old('search_button',$content['search_button'] ?? '') }}"></div>
            <div class="field"><label>View Product Button</label><input name="view_product_label" value="{{ old('view_product_label',$content['view_product_label'] ?? '') }}"></div>
            <div class="field"><label>Empty Results Heading</label><input name="empty_heading" value="{{ old('empty_heading',$content['empty_heading'] ?? '') }}"></div>
            <div class="field full"><label>Empty Results Text</label><textarea name="empty_text">{{ old('empty_text',$content['empty_text'] ?? '') }}</textarea></div>
            <div class="field"><label>Empty Results Button</label><input name="empty_button" value="{{ old('empty_button',$content['empty_button'] ?? '') }}"></div>

        @elseif(in_array($page->key, ['inquiry','quote']))
            <div class="field"><label>Page Kicker</label><input name="page_kicker" value="{{ old('page_kicker',$content['page_kicker'] ?? '') }}"></div>
            <div class="field"><label>Guide Kicker</label><input name="guide_kicker" value="{{ old('guide_kicker',$content['guide_kicker'] ?? '') }}"></div>
            <div class="field full"><label>Guide Heading</label><input name="guide_heading" value="{{ old('guide_heading',$content['guide_heading'] ?? '') }}"></div>
            @for($i=1;$i<=4;$i++)
                <div class="field"><label>Guide Step {{ $i }} Title</label><input name="step_{{ $i }}_title" value="{{ old('step_'.$i.'_title',$content['step_'.$i.'_title'] ?? '') }}"></div>
                <div class="field"><label>Guide Step {{ $i }} Text</label><textarea name="step_{{ $i }}_text" style="min-height:80px">{{ old('step_'.$i.'_text',$content['step_'.$i.'_text'] ?? '') }}</textarea></div>
            @endfor
            <div class="field"><label>Form Kicker</label><input name="form_kicker" value="{{ old('form_kicker',$content['form_kicker'] ?? '') }}"></div>
            <div class="field"><label>Form Heading</label><input name="form_heading" value="{{ old('form_heading',$content['form_heading'] ?? '') }}"></div>
            <div class="field full"><label>Form Introduction</label><textarea name="form_text">{{ old('form_text',$content['form_text'] ?? '') }}</textarea></div>
            <div class="field"><label>Submit Button Label</label><input name="submit_label" value="{{ old('submit_label',$content['submit_label'] ?? '') }}"></div>
            <div class="field"><label>Submit Note</label><input name="submit_note" value="{{ old('submit_note',$content['submit_note'] ?? '') }}"></div>
        @endif

        <div class="field"><label>SEO Title</label><input name="seo_title" value="{{ old('seo_title',$page->seo_title) }}"></div>
        <div class="field"><label>SEO Description</label><textarea name="seo_description">{{ old('seo_description',$page->seo_description) }}</textarea></div>
        <div class="field full"><label><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$page->is_active))> Active</label></div>
        <div class="field full"><button class="btn btn-primary">Save Page</button></div>
    </div>
</form>
<div class="panel danger-zone"><div><strong>Delete CMS Page Record</strong><p>The public route will use safe fallback content until the page record is seeded again.</p></div><form method="post" action="{{ route('admin.pages.destroy',$page) }}" onsubmit="return confirm('Delete this CMS page record?')">@csrf @method('DELETE')<button class="btn btn-danger">Delete Page Record</button></form></div>
@endsection
