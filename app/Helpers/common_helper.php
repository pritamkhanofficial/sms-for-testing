<?php 

use CodeIgniter\HTTP\RequestInterface;
use \Config\Database;
function generateFlash($alert = array())
{
    if(array_key_exists('type',$alert)){
        session()->setFlashdata('type', $alert['type']);
    }else{
        session()->setFlashdata('type', "success");
    }

    if(array_key_exists('title',$alert)){
        session()->setFlashdata('title', $alert['title']);
    }else{
        session()->setFlashdata('title', "Success");
    }
    if(array_key_exists('message',$alert)){
        session()->setFlashdata('message', $alert['message']);
    }else{
        session()->setFlashdata('message', NULL);
    }
}


function getQuery() {
    try {
        $db = Database::connect();
        echo  trim(preg_replace('/\s\s+/', ' ', $db->getLastQuery())); exit;
    } catch (\Throwable $th) {
        throw $th;
    }
}


function getDeviceInfo(){
    $request = \Config\Services::request();
    $agent = $request->getUserAgent();
    if ($agent->isBrowser()) {
        $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
    } elseif ($agent->isRobot()) {
        $currentAgent = $agent->getRobot();
    } elseif ($agent->isMobile()) {
        $currentAgent = $agent->getMobile();
    } else {
        $currentAgent = 'Unidentified User Agent';
    }
    return [
        'current_agent'=>$currentAgent,
        'current_platform'=>$agent->getPlatform(),
        'ip_address'=>$request->getIPAddress(),
    ];
}

function gDT(){
    return date('Y-m-d H:i:s');
}

function getPrint($data = NULL){
    echo "<pre>"; print_r($data); exit;
}
function getBUD(){
    $request = \Config\Services::request();
    if(isset($request->user)){
        $payload = $request->user;
        if(!is_null($payload)){
            /* $path = WRITEPATH . 'uploads/';
            $fullpath = $path . $payload->profile_pic;
            if(is_file($fullpath)){
                $profile_pic = base_url('get-file/' . $payload->profile_pic);
                $payload->user_profile_pic = $profile_pic;
            }else{ 
                $payload->user_profile_pic = base_url().$payload->profile_pic;
            } */
            $payload->user_profile_pic = base_url('get-file/' . $payload->profile_pic);
        }
    }
    return $payload;
}

function UploadFile(\CodeIgniter\HTTP\Files\UploadedFile $imageFile, $folder=NULL, $editFileName = NULL)
{
    try {
        if ($imageFile->hasMoved()) {
            return;
        }
        
        $upload_dir = UPLOAD_DIR;
        $upload_dir = empty($folder) ? $upload_dir : $upload_dir.$folder;
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $imageName = uniqid() . '.' . $imageFile->getExtension();
        if(!is_null($editFileName) && !empty($editFileName)){
            $path = $upload_dir .'/'. $editFileName;
            if(file_exists($path)){
                unlink($path);
            }
        }
        return $imageFile->move($upload_dir, $imageName) == true ? $imageName : null;
    } catch (\Throwable $th) {
        throw $th;
    }
}

function getHash($data){
    return password_hash($data,  PASSWORD_DEFAULT);
}

?>