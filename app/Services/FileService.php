<?php
namespace App\Services;
class FileService {
    private function readTheFile(string $path)
    {
        $handle = fopen($path, 'r');
        while (!feof($handle)) {
            yield  trim(fgets($handle));
        }
        fclose($handle);
    }

    public function begin(string $path,int $length = 10) :array
    {
        $data = [];
        $endLine = $length -1;
        foreach($this->readTheFile($path) AS $lineNumber => $lineData){
            if($lineNumber <= $endLine){
                $data[++$lineNumber] = $lineData;
                continue;
            }
            break;
        }
        return $data;
    }

    public function next(string $path,int $startLine = 0,int $length = 10) :array
    {
        $data = [];
        $endLine = $startLine + $length -1;
        foreach($this->readTheFile($path) AS $lineNumber => $lineData){
            if($lineNumber >= $startLine && $lineNumber <= $endLine){
                $data[++$startLine] = $lineData;
            }
        }
        return $data;
    }

    public function previous(string $path,int $endLine = 0,int $length = 10) :array
    {
        $data = [];
        $endLine = ($endLine % 10  == 0)  ? $endLine : (floor($endLine / 10) * $length);
        $startLine = $endLine - $length;
        foreach($this->readTheFile($path) AS $lineNumber => $lineData){
            if($lineNumber >= $startLine && $lineNumber < $endLine){
                $data[++$startLine] = $lineData;
            }
        }
        return $data;
    }

    public function end(string $path,int $length = 10) :array
    {
        $data = [];
        $counter = 1;
        foreach($this->readTheFile($path) AS $lineNumber => $lineData){
            if($counter > $length){
                $counter = 1;
                $data = [];
                $data[++$lineNumber] = $lineData;
            }else{
                $data[++$lineNumber] = $lineData;
            }
            $counter++;
        }
        return $data;
    }
}
