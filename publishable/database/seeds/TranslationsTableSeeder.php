<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->categoriesTranslations();
        $this->pagesTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        foreach (__('voyager::seeders.data_types') as $k=>$v){
            $_langv=$v['singular'];
            $dtp = DataType::where($_fld, $_langv)->firstOrFail();
            if ($dtp->exists) {
                $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), $_langv);
            }
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        foreach (__('voyager::seeders.data_types') as $k=>$v){
            $_langv=$v['singular'];
            $dtp = DataType::where($_fld, $_langv)->firstOrFail();
            if ($dtp->exists) {
                $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), $_langv);
            }
        }
    }


    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        foreach (__('voyager::seeders.menu_items') as $k=>$v){
            $_item = MenuItem::where('title', $v)->firstOrFail();
            if ($_item->exists) {
                $this->trans('zh_CN', $this->arr($_tpl, $_item->id), $v);
            }
        }
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function categoriesTranslations()
    {
        // Adding translations for 'categories'
        //
        $cat = Category::where('slug', 'category-1')->firstOrFail();
        if ($cat->exists) {
            $this->trans('zh_CN', $this->arr(['categories', 'slug'], $cat->id), '分类-1');
            $this->trans('zh_CN', $this->arr(['categories', 'name'], $cat->id), '分类1');
        }
        $cat = Category::where('slug', 'category-2')->firstOrFail();
        if ($cat->exists) {
            $this->trans('zh_CN', $this->arr(['categories', 'slug'], $cat->id), '分类-2');
            $this->trans('zh_CN', $this->arr(['categories', 'name'], $cat->id), '分类2');
        }
    }


    /**
     * Auto generate Pages Translations.
     *
     * @return void
     */
    private function pagesTranslations()
    {
        $page = Page::where('slug', 'hello-world')->firstOrFail();
        if ($page->exists) {
            $_arr = $this->arr(['pages', 'title'], $page->id);
            $this->trans('zh_CN', $_arr, '你好，世界');
            /**
             * For configuring additional languages use it e.g.
             *
             * ```
             *   $this->trans('es', $_arr, 'hola-mundo');
             *   $this->trans('de', $_arr, 'hallo-welt');
             * ```
             */
            $_arr = $this->arr(['pages', 'slug'], $page->id);
            $this->trans('zh_CN', $_arr, 'hello-world');

            $_arr = $this->arr(['pages', 'body'], $page->id);
            $this->trans('zh_CN', $_arr, '<p>第一行内容</p>'
                ."\r\n".'<p>第二行内容</p>');
        }
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
