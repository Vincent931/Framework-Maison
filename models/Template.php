<?php
namespace models;

class Template {
    
    private $header;
    private $bodyUp;
    private $body;
    private $bodyBottom;
    private $footer;
    private $js;
    private $linkedInJs;
    private $template;
    
    /**
     * @return string $this->header
     */
    public function getHeader(): string
    {
        return $this->header;
    }
    /**
     * @params string $header
     */
    public function setHeader(string $header) : void
    {
        $this->header = $header;
    }
    /**
     * @return string $this->bodyUp
     */
    public function getBodyUp() : string
    {
        return $this->bodyUp;
    }
     /**
     * @params string $bodyup
     */
    public function setBodyUp(string $bodyUp) :void 
    {
        $this->bodyUp = $bodyUp;
    }
    /**
     * @return string $this->body
     */
    public function getBody() :string
    {
        return $this->body;
    }
     /**
     * @params string $body
     */
    public function setBody(string $body) :void
    {
        $this->body = $body;
    }
    /**
     * @return string $this->bodyBottom
     */
    public function getBodyBottom() :string
    {
        return $this->bodyBottom;
    }
     /**
     * @params string $bodyBottom
     */
    public function setBodyBottom(string $bodyBottom) :void{
        $this->bodyBottom = $bodyBottom;
    }
    /**
     * @params string $js
     */
    public function addJs(string $js) :void
    {
        $this->js .= $js;
    }
    /**
     * @return string $this->js
     */
    public function getJs() :string
    {
        return $this->js;
    }
    /**
     * @return string $this->linkedInJs
     */
    public function getLinkedInJs() :string
    {
        return $this->linkedInJs = "<script src=\"https://platform.linkedin.com/in.js\" type=\"text/javascript\">lang: en_US</script>
			<script type=\"IN/Share\" data-url=\"https://vincent-dev-web.fr\"></script>";
    }
    /**
     * @return string $this->template
     */
     public function getTemplate() : string
     {
        return $this->template;
    }
     /**
     * @params $header string
     * @params $bodyUp string
     * @params $body string
     * @params $bodyBottom string
     * @params $footer string
     */
    public function setTemplate(string $header, string $bodyUp, string $body, string $bodyBottom, string $footer): void
    {
         $this->template = $header.$bodyUp.$body.$bodyBottom.$footer;
    }
}