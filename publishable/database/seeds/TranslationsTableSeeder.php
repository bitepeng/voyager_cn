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
        $dtp = DataType::where($_fld, 'Post')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '文章');
        }
        $dtp = DataType::where($_fld, 'Page')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '单页');
        }
        $dtp = DataType::where($_fld, 'User')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '用户');
        }
        $dtp = DataType::where($_fld, 'Category')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '分类');
        }
        $dtp = DataType::where($_fld, 'Menu')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '菜单');
        }
        $dtp = DataType::where($_fld, 'Role')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '角色');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, 'Posts')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '文章');
        }
        $dtp = DataType::where($_fld, 'Pages')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '单页');
        }
        $dtp = DataType::where($_fld, 'Users')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '用户');
        }
        $dtp = DataType::where($_fld, 'Categories')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '分类');
        }
        $dtp = DataType::where($_fld, 'Menus')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '菜单');
        }
        $dtp = DataType::where($_fld, 'Roles')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $dtp->id), '角色');
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
            $this->trans('zh_CN', $_arr, 'ola-mundo');

            $_arr = $this->arr(['pages', 'body'], $page->id);
            $this->trans('zh_CN', $_arr, '<p>第一行内容</p>'
                                        ."\r\n".'<p>第二行内容</p>');
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
        $_item = $this->findMenuItem('Dashboard');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '控制面板');
        }

        $_item = $this->findMenuItem('Media');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '媒体');
        }

        $_item = $this->findMenuItem('Posts');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '文章');
        }

        $_item = $this->findMenuItem('Users');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '用户');
        }

        $_item = $this->findMenuItem('Categories');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '分类');
        }

        $_item = $this->findMenuItem('Pages');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '单页');
        }

        $_item = $this->findMenuItem('Roles');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '角色');
        }

        $_item = $this->findMenuItem('Tools');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '工具');
        }

        $_item = $this->findMenuItem('Menu Builder');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '菜单');
        }

        $_item = $this->findMenuItem('Database');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '数据库');
        }

        $_item = $this->findMenuItem('Settings');
        if ($_item->exists) {
            $this->trans('zh_CN', $this->arr($_tpl, $_item->id), '配置');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
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
