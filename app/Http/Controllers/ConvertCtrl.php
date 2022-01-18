<?php

namespace App\Http\Controllers;

class CustomBold extends \HtmlToProseMirror\Marks\Bold
{
    public function data()
    {
        return [
            'type' => 'strong',
        ];
    }
}

class CustomItalic extends \HtmlToProseMirror\Marks\Italic
{
    public function data()
    {
        return [
            'type' => 'em',
        ];
    }
}

class CustomStrike extends \HtmlToProseMirror\Marks\Strike
{
    public function data()
    {
        return [
            'type' => 'strikethrough',
        ];
    }
}

class ConvertCtrl extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function httpRequest() {
        // return $renderer->render('<p>Example Text</p>');
        // return $router->app->version();

        $renderer = (new \HtmlToProseMirror\Renderer);

        $renderer->withNodes([
            \HtmlToProseMirror\Nodes\Text::class,
            \HtmlToProseMirror\Nodes\Paragraph::class,
            \HtmlToProseMirror\Nodes\Blockquote::class,
            \HtmlToProseMirror\Nodes\BulletList::class,
            \HtmlToProseMirror\Nodes\CodeBlock::class,
            \HtmlToProseMirror\Nodes\HardBreak::class,
            \HtmlToProseMirror\Nodes\Heading::class,
            // \HtmlToProseMirror\Nodes\Image::class,
            \HtmlToProseMirror\Nodes\ListItem::class,
            \HtmlToProseMirror\Nodes\OrderedList::class,
            \HtmlToProseMirror\Nodes\Paragraph::class,
            \HtmlToProseMirror\Nodes\Table::class,
            \HtmlToProseMirror\Nodes\TableCell::class,
            \HtmlToProseMirror\Nodes\TableHeader::class,
            \HtmlToProseMirror\Nodes\TableRow::class,
            \HtmlToProseMirror\Nodes\User::class,
        ]);

        $renderer->withMarks([
            // \HtmlToProseMirror\Marks\Bold::class,
            CustomBold::class,
            \HtmlToProseMirror\Marks\Code::class,
            // \HtmlToProseMirror\Marks\Italic::class,
            CustomItalic::class,
            \HtmlToProseMirror\Marks\Link::class,
            // \HtmlToProseMirror\Marks\Strike::class,
            CustomStrike::class,
            \HtmlToProseMirror\Marks\Subscript::class,
            \HtmlToProseMirror\Marks\Superscript::class,
            \HtmlToProseMirror\Marks\Underline::class,
        ]);


        return $renderer->render(request()->data ?? '<span></span>');
    }
}
