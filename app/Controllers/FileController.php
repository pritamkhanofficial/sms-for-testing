<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileController extends BaseController
{
    public function getFile($filename = NULL)
    {
        if(empty($filename)){
            $path = ROOTPATH . 'public/';
            $fullpath = $path . 'default.png';
            if(is_file($fullpath)){
                $file = new \CodeIgniter\Files\File($fullpath, true);
                $binary = readfile($fullpath);
                return $this->response
                        ->setHeader('Content-Type', $file->getMimeType())
                        ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
                        ->setStatusCode(200)
                        ->setBody($binary);
            }
        }else{
            $path = WRITEPATH . 'uploads/';
            $fullpath = $path . $filename;
            if(is_file($fullpath)){
                $file = new \CodeIgniter\Files\File($fullpath, true);
                $binary = readfile($fullpath);
                return $this->response
                        ->setHeader('Content-Type', $file->getMimeType())
                        ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
                        ->setStatusCode(200)
                        ->setBody($binary);
            }else{
                // getPrint([]);
                $path = ROOTPATH . 'public/';
                $fullpath = $path . $filename;
                if(is_file($fullpath)){
                    $file = new \CodeIgniter\Files\File($fullpath, true);
                    $binary = readfile($fullpath);
                    return $this->response
                            ->setHeader('Content-Type', $file->getMimeType())
                            ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
                            ->setStatusCode(200)
                            ->setBody($binary);
                }else{
                    $path = ROOTPATH . 'public/';
                    $fullpath = $path . 'default.png';
                    if(is_file($fullpath)){
                        $file = new \CodeIgniter\Files\File($fullpath, true);
                        $binary = readfile($fullpath);
                        return $this->response
                                ->setHeader('Content-Type', $file->getMimeType())
                                ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
                                ->setStatusCode(200)
                                ->setBody($binary);
                    }
                }
            }
        }
    }
}
