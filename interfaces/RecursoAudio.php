<?php
    require_once 'IRecursoBibliografico.php';
    require_once 'BaseRecursoBibliografico.php';

    class RecursoAudio
        extends BaseRecursoBibliografico
        implements IRecursoBibliografico{
        protected string $disco;
        public function __construct(
            string $name,
            string $author,
            string $dewey,
            string $barcode,
            string $disco
        )
        {
            parent::__construct(
                $name,
                $author,
                $dewey,
                $barcode,
                "audio"
            );
            $this->disco = $disco;
        }
        public function getNormalArray()
        {
            $normalArray = parent::getNormalArray();
            $normalArray["disco"] = $this->disco;
            return $normalArray;
        }
        public function getNormalJSONString()
        {
            return json_encode($this->getNormalArray());
        }
        public function getMarcArray()
        {
            $arrMarc = parent::getMarcArray();
            $arrMarc["t.a0.1"]= $this->disco;
            return $arrMarc;
        }
        public function getMarcString()
        {
            $strMarc = parent::getMarcString();
            $arrMarc .= sprintf("%s:%s|","t.a0.1", $this->disco);
            return $strMarc;
        }
        public static function validateEntry(array $entry){
            $errors = parent::validateEntry($entry);
            if(!key_exists("disco",$entry))$errors = true;
            return $errors;
        }
    }
?>