<?php
    require_once 'IRecursoBibliografico.php';
    class BaseRecursoBibliografico implements /*herencia de interface extends es para lo demas*/
    IRecursoBibliografico {
        protected string $title;
        protected string $author;
        protected string $dewey;
        protected string $barcode;
        protected string $type;

        public function __construct(
            string $title,
            string $author,
            string $dewey,
            string $barcode,
            string $type
        )
        {
            $this->title = $title;
            $this->author = $author;
            $this->dewey = $dewey;
            $this->barcode = $barcode;
            $this->type = $type;
        }
        public function getNormalArray()
        {
            $arrNormal = array(
                "title"=> $this->title,
                "author"=> $this->author,
                "dewey"=> $this->dewey,
                "barcode"=> $this->barcode,
                "type"=> $this->type
            );
            return $arrNormal;
        }
        public function getNormalJSONString()
        {
            return json_encode($this->getNormalArray());
        }
        public function get getMarcArray()
        {
            $arrMarc = array(
                "a.b1.2" => $this->title,
                "a.b1.4" => $this->author,
                "d.c0.1" => $this->dewey,
                "a.c0.1" => $this->barcode,
                "e.c0.1" => $this->type
            );
            return $arrMarc;
        }
        public function getMarcString()
        {
            $strMarc = "";
            $arrMarc = $this->getMarcArray();
            foreach($arrMarc as $llave =>$valor){
                $strMarc .= sprintf("%s:%s|",$llave, $valor);
            }
            return $strMarc;
        }      
    } 
?>