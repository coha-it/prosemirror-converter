<?php

namespace App\Http\Controllers;

class CustomImage extends \HtmlToProseMirror\Nodes\Image
{
    public function data()
    {
        return [
            'type' => 'image',
            'attrs' => [

                /*
                drive-id": "d5856ed9-1355-48e7-b254-df5d82a255c6",
                height": 400,
                width": 1200,
                file-type": "image/jpeg"
                */
                'height' => $this->DOMNode->hasAttribute('height') ? $this->DOMNode->getAttribute('height') : "400",
                'width' => $this->DOMNode->hasAttribute('width') ? $this->DOMNode->getAttribute('width') : "1200",
                'file-type' => $this->DOMNode->hasAttribute('file-type') ? $this->DOMNode->getAttribute('file-type') : "image/jpeg",
                'drive-id' => $this->DOMNode->hasAttribute('drive-id') ? $this->DOMNode->getAttribute('drive-id') : "",
                // 'drive-id' => $this->DOMNode->hasAttribute('src') ? $this->DOMNode->getAttribute('src') : "",

                'alt' => $this->DOMNode->hasAttribute('alt') ? $this->DOMNode->getAttribute('alt') : null,
                'src' => $this->DOMNode->hasAttribute('src') ? $this->DOMNode->getAttribute('src') : null,
                'title' => $this->DOMNode->hasAttribute('title') ? $this->DOMNode->getAttribute('title') : null,
            ],
        ];
    }
}

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
            CustomImage::class,
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
