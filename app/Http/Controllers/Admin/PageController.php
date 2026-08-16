<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', ['pages' => Page::orderBy('id')->get()]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|max:190',
            'heading' => 'nullable|max:500',
            'subheading' => 'nullable|max:2000',
            'seo_title' => 'nullable|max:190',
            'seo_description' => 'nullable|max:500',
        ]);

        $content = $page->content ?? [];
        foreach ($this->contentKeys($page->key) as $key) {
            if ($request->has($key)) {
                $content[$key] = (string) $request->input($key, '');
            }
        }

        $page->update([
            'title' => $request->title,
            'heading' => $request->heading ?: null,
            'subheading' => $request->subheading ?: null,
            'content' => $content,
            'seo_title' => $request->seo_title ?: null,
            'seo_description' => $request->seo_description ?: null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Page content updated.');
    }

    public function destroy(Page $page)
    {
        $title = $page->title;
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', $title.' CMS record deleted. The public route will use its safe fallback content until the page is seeded again.');
    }

    private function contentKeys(string $key): array
    {
        return match ($key) {
            'home' => [
                'eyebrow','hero_badge','hero_primary_label','hero_secondary_label',
                'intro_kicker','intro_heading','intro_text',
                'intro_point_1_heading','intro_point_1_text','intro_point_2_heading','intro_point_2_text',
                'categories_heading','categories_subheading','category_link_label','why_section_heading',
                'why_1_heading','why_1_text','why_2_heading','why_2_text','why_3_heading','why_3_text','why_4_heading','why_4_text',
                'partner_heading','partner_text','partner_button_label',
            ],
            'about' => [
                'page_kicker','section_kicker','section_heading','body',
                'buyer_1_heading','buyer_1_text','buyer_2_heading','buyer_2_text','buyer_3_heading','buyer_3_text','buyer_4_heading','buyer_4_text',
                'supply_kicker','supply_heading','supply_1','supply_2','supply_3','supply_4',
            ],
            'contact' => [
                'page_kicker','choice_kicker','choice_heading','choice_text',
                'quote_heading','quote_text','quote_button','inquiry_heading','inquiry_text','inquiry_button',
            ],
            'products' => [
                'page_kicker','sidebar_kicker','sidebar_heading','all_products_label','toolbar_text',
                'search_placeholder','search_button','view_product_label','empty_heading','empty_text','empty_button',
            ],
            'inquiry', 'quote' => [
                'page_kicker','guide_kicker','guide_heading',
                'step_1_title','step_1_text','step_2_title','step_2_text','step_3_title','step_3_text','step_4_title','step_4_text',
                'form_kicker','form_heading','form_text','submit_label','submit_note',
            ],
            default => ['body'],
        };
    }
}
