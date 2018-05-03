<?php

// copied/rewritten from tFPDF
define ('PDF_DELIMITERS', '()<>{}%#/');
// The root object is number 1; the pages collection is number 2; the resource dictionary is number 3
define  ('ROOT', 1);
define ('PAGES', 2);
define ('RESOURCES', 3);

class content{
    // a content stream in the making. Add content with $content->contents .= 'foo'
    // add items to the dictionary with $content->dict += array ('key' => 'value')
    // Create the stream with createStream($content);
    // set $content->n = appendObject(createStream...); to record the object number for future reference
    public $contents = '';
    public $dict = array();
    public $n = -1;
}

class pdfModel {
// create a PDF with empty pages
    // members
    protected $buffer = ''; // the PDF being created
    protected $pages = array();
    protected $objectOffsets = array(ROOT=>0,PAGES=>0,RESOURCES=>0); // the offsets will be updated later
    protected $bCompress = FALSE; // flag to gzip streams
    protected $pageSize = array(0,0,612,792); // letter paper size, in points

    // Public methods
    public function __construct(){
        $this->appendHeader('1.7');
    }
    public function output($name='bililitePDF'){
        foreach ($this->pages as &$page) $this->appendPage($page);
        $this->appendResources();
        $this->appendRoot();
        $this->appendTrailer();
        header('Content-Type: application/pdf');
        header('Content-Length: '.strlen($this->buffer));
        header("Content-Disposition: inline; filename=\"$name.pdf\"");
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        ini_set('zlib.output_compression','0');
        echo $this->buffer;
    }
    public function newpage(){
        $this->pages[] = new content();
    }
    // Protected methods
    // data creation methods; start with 'create' and return a string
    protected function createString($s){
        // Assumes $s is UTF8
        // use mb strings with explicit encodings to avoid problems with overloaded
        // regular string functions
        if (mb_strlen($s, 'UTF-8') == mb_strlen($s, '8bit')){
            // Ascii
            return '('.str_replace(array('\\', '(', ')',), array ('\\', '\(','\)'), $s).')';
        }else{
            $ret = '';
            $s = mb_convert_encoding ($s, 'UTF-16BE', 'UTF-8');
            foreach (str_split($s) as $char) $ret .= sprintf('%02X', ord($char)); // str_split should not be overloaded according to the manual
            return "<FEFF$ret>";
        }
    }
    protected function createName ($data){
        $ret = '/';
        foreach(str_split($data) as $c){
            $ord = ord($c);
            if ($ord == 0){
                // str_split will give nulls for empty strings; ignore them
            }elseif ($ord < 33 /* whitespace and control characters */ || $ord > 126 /* hi bit set */ || strpos(PDF_DELIMITERS, $c) !== FALSE){
                $ret .= sprintf('#%02X', $ord);
            }else{
                $ret .= $c;
            }
        }
        return $ret;
    }
    protected function createDictionary($arr){
        $ret = "<<\n";
        foreach($arr as $key=>$value) $ret .= $this->createName($key)." $value\n";
        return "$ret>>\n";
    }
    protected function createArray($arr){
        $ret = "[ ";
        foreach($arr as $value) $ret .= "$value ";
        return "$ret]\n";
    }
    protected function createStream($arr, $data=NULL){
        if (is_object($arr)){
            // can just pass a content stream
            $data = $arr->contents;
            $arr = $arr->dict;
        }
        if ($this->bCompress){ // assumes this is a flag set somewhere
            $data = gzcompress($data);
            $arr['Filter'] = $this->createName('FlateDecode');
        }
        $arr['Length'] = strlen($data);
        return $this->createDictionary($arr)."stream\n$data\nendstream";
    }
    protected function createReference($n){
        return "$n 0 R";
    }
    // specialized dictionaries
    protected function dictCatalog(){
        return array(
            'Type' => $this->createName('Catalog'),
            'Pages' => $this->createReference(PAGES),
            // set the open action to fit the first page to the screen
            'OpenAction' => $this->createArray(array(
                $this->createReference($this->pages[0]->n),
                $this->createName('Fit')
            ))
        );
    }
    protected function dictPages(){
        $ret = array(
            'Type' => $this->createName('Pages'),
            'Count' => count($this->pages)
        );
        $pageArr = array();
        foreach ($this->pages as $page) $pageArr[] = $this->createReference($page->n);
        $ret['Kids'] = $this->createArray($pageArr);
        return $ret;
    }
    protected function dictResources(){
        // we have no resources in this version
        return array();
    }
    // file assembly methods; appends text to the buffer. Start with 'append'
    protected function appendHeader($version){
        $this->buffer .= "%PDF-$version\n";
    }
    protected function appendObject($data, $objectNumber = NULL){
        if (is_null($objectNumber)) $objectNumber = count($this->objectOffsets)+1;
        $this->objectOffsets[$objectNumber] = strlen($this->buffer); // keep track of where this object starts in the final file
        $this->buffer .= "$objectNumber 0 obj\n$data endobj\n";
        return $objectNumber;
    }
    protected function appendPage(&$page){
        $contents = $this->appendObject($this->createStream(array(), $page->contents));
        $page->dict += array(
            'Type' => $this->createName('Page'),
            'Parent' => $this->createReference(PAGES),
            'Resources' => $this->createReference(RESOURCES),
            'Contents' => $this->createReference($contents),
            'MediaBox' => $this->createArray($this->pageSize)
        );
        $page->n = $this->appendObject($this->createDictionary($page->dict));
    }
    protected function appendResources(){
        // we have no resources in this version
    }
    protected function appendRoot(){
        $this->appendObject ($this->createDictionary($this->dictCatalog()), ROOT);
        $this->appendObject ($this->createDictionary($this->dictPages()), PAGES);
        $this->appendObject ($this->createDictionary($this->dictResources()), RESOURCES);
    }
    protected function appendTrailer(){
        $numObjects = count($this->objectOffsets) + 1; // include the magic object 0
        $xrefOffset = strlen($this->buffer);
        $this->buffer .= "xref\n";
        $this->buffer .= "0 $numObjects\n";
        $this->buffer .= "0000000000 65535 f \n"; // the magic object 0
        // output the offset, the generation number (always 0) and "n" for "in use"
        // use sprintf to make sure it has exactly the right number of bytes
        foreach ($this->objectOffsets as $offset) $this->buffer .= sprintf("%010d 00000 n \n",$offset);
        $this->buffer .= 'trailer '.$this->createDictionary(array(
                'Size' => $numObjects,
                'Root' => $this->createReference(ROOT)
            ));
        $this->buffer .= "startxref\n$xrefOffset\n%%EOF";
    }

    function streamfromimage($im){
        $pdfobj = new bililitePDF_3();

        $stream = $pdfobj->appendImage($im);
        return $stream;
    }

}

class bililitePDF_2 extends pdfModel{
    protected $currentPage = NULL;

    public function newpage(){
        parent::newpage();
        $this->currentPage = $this->pages[count($this->pages)-1];
    }
    public function moveto($x, $y){;
        $this->currentPage->contents .= "$x $y m\n";
    }
    public function lineto($x, $y){
        $this->currentPage->contents .= "$x $y l\n";
    }
    public function curveto($x1, $y1, $x2, $y2, $x3, $y3){
        // see http://processingjs.nihongoresources.com/bezierinfo/ for Bezier curve info
        $this->currentPage->contents .= "$x1 $y1 $x2 $y2 $x3 $y3 c\n";
    }
    public function rect ($x, $y, $w, $h){
        $this->currentPage->contents .= "$x $y $w $h re\n";
    }
    public function closepath(){
        $this->currentPage->contents .= "h\n";
    }
    public function linewidth($w){
        $this->currentPage->contents .= "$w w\n";
    }
    public function stroke ($r, $g, $b){
        $r /= 255; //  change to 0.0-1.0 range
        $g /= 255;
        $b /= 255;
        $this->currentPage->contents .= "$r $g $b RG S\n";
    }
    public function fill ($r, $g, $b){
        $r /= 255; //  change to 0.0-1.0 range
        $g /= 255;
        $b /= 255;
        $this->currentPage->contents .= "$r $g $b rg f\n";
    }
}

class image{
    public $w; // nominal width
    public $h; // nominal height
    public $subtype; // Form or Image
    public $n; // object number, to be set when the object is completed
    public function __construct ($w, $h, $subtype, $n=-1) {
        $this->w = $w;
        $this->h = $h;
        $this->subtype = $subtype;
        $this->n = $n;
    }
}

class bililitePDF_3 extends bililitePDF_2{
    protected $images = array();

    public function placeimage($name, $x, $y, $theta=0, $xscale=1, $yscale=NULL){
        // put an image (created with appendXform or appendImage)
        // centered at $x,$y and rotated around the center by angle
        // $theta, with width and height scaled by factors $xscale and $yscale
        if (is_null($yscale)) $yscale = $xscale;
        if (is_resource($name)) $name = (string) $name; // explicitly cast images
        $type = $this->images[$name]->subtype;
        $w = $this->images[$name]->w;
        $h = $this->images[$name]->h;
        $centerx = -$w/2; // to move the center to $x, $y rather than the lower left
        $centery = -$h/2;
        if ($type == 'Image'){
            // images are always plotted at 1 x 1
            // so rescale them to "natural" size
            $xscale *= $w;
            $yscale *= $h;
            $centerx = -0.5;
            $centery = -0.5;
        }
        $rotation = sprintf('%f %f %f %f', cos($theta), sin($theta), -sin($theta), cos($theta));
        // scale if needed; other adjustments if needed
        $this->currentPage->contents .= "
            q
            1 0 0 1 $x $y cm
            $rotation 0 0 cm
            $xscale 0 0 $yscale 0 0 cm
            1 0 0  1 $centerx $centery cm
            ";
        $this->currentPage->contents .= $this->createName($name)." Do Q\n";
    }
    public function newForm(){
        // Call before starting an XObject Form
        $this->currentPage = new content();
    }
    public function appendForm($name, $w, $h){
        // call after the XObject Form is complete, to create it with name $name, width $w, height $h
        $this->currentPage->dict += array(
            'Subtype' => $this->createName('Form'),
            'Resources' => $this->createReference(RESOURCES),
            'BBox' => $this->createArray(array(0, 0, $w, $h))
        );
        $n = $this->appendObject($this->createStream($this->currentPage));
        $this->images[$name] = new image($w, $h, 'Form', $n);
        $this->currentPage = $this->pages[count($this->pages)-1];
    }
    public function appendImage($im){
        // create an image XObject from PHP image resource $im
        // (such as created from imagecreatetruecolor)
        // and use it in the document with placeimage($im, $x, $y)
        // the name of the image will be (string) $im, which is
        // something like "Resource #1"
        $image = new content();
        $sx = imagesx($im);
        $sy = imagesy($im);
        $image->dict += array(
            'Subtype' => $this->createName('Image'),
            'Width' => $sx,
            'Height' => $sy,
            'ColorSpace' => $this->createName('DeviceRGB'),
            'BitsPerComponent' => 8
        );
        for ($row = 0; $row < $sy; ++$row) for ($col = 0; $col < $sx; ++$col){
            $colorindex = imagecolorat($im, $col, $row);
            $colors = imagecolorsforindex($im, $colorindex);
            $image->contents .= sprintf('%c%c%c', $colors['red'], $colors['green'], $colors['blue']);
        }
        $n = $this->appendObject($this->createStream($image));
        $this->images[(string) $im] = new image($sx, $sy, 'Image', $n);
        return $this->createStream($image);
    }
    protected function dictResources(){
        $dict = parent::dictResources();
        $imagelist = array();
        foreach ($this->images as $key=>$image) $imagelist[$key] = $this->createReference($image->n);
        $dict['XObject'] = $this->createDictionary($imagelist);
        return $dict;
    }
}