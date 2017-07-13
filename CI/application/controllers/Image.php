<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/28
 * Time: 16:02
 */
header("Content-type:text/html;charset=utf-8");
defined('BASEPATH') OR exit('No direct script access allowed');
class  Image  extends CI_Controller{

    public function  index(){

        $this->load->library('image_lib');
        $config['source_image'] = "./static/images/2222.png";
        $config['new_image'] = "./static/images/333.png";
        $config['wm_text'] = "庾志超";
        $config['wm_type'] = 'text';
        $config['dynamic_output'] = false;
        $config["file_permissions"]=0777;
        //$config['wm_font_path'] = './fonts/1.TTF';
        $config['wm_font_size'] = '20';
        $config['wm_font_color'] = '000000';
        $config['wm_vrt_alignment'] = 'center';//X
        $config['wm_hor_alignment'] = 'center';//Y
        $config['wm_padding'] = '10';
        //$config['wm_vrt_offset'] = '10';
        $this->image_lib->initialize($config);
        echo $this->image_lib->display_errors();
        if($this->image_lib->watermark())
        {
            echo " water ok";
        }
        else
        {
            echo "water error";
        }


    }

    //文字水印
  public  function watermark(){
        $this->load->library('image_lib');
        $config['image_library'] = 'GD';//(必须)设置图像库
        $config['source_image'] = 'static/images/2222.png';//(必须)设置原图像的名字和路径. 路径必须是相对或绝对路径，但不能是URL.
        $config['dynamic_output'] = FALSE;//TRUE 动态的存在(直接向浏览器中以输出图像),FALSE 写入硬盘
        $config['quality'] = '90%';//设置图像的品质。品质越高，图像文件越大
        $config['new_image'] = 'static/images/333.png';//设置图像的目标名/路径。
        $config['wm_type'] = 'text';//(必须)设置想要使用的水印处理类型(text, overlay)
        $config['wm_padding'] = '10';//图像相对位置(单位像素)
        $config['wm_vrt_alignment'] = 'middle';//竖轴位置 top, middle, bottom
        $config['wm_hor_alignment'] = 'center';//横轴位置 left, center, right
        $config['wm_vrt_offset'] = '0';//指定一个垂直偏移量（以像素为单位）
        $config['wm_hor_offset'] = '0';//指定一个横向偏移量（以像素为单位）
        $config['wm_text'] = '庾志成';//(必须)水印的文字内容
        $config['wm_font_path'] = 'fonts/1.TTF';//字体名字和路径
        $config['wm_font_size'] = '16';//(必须)文字大小
        $config['wm_font_color'] = 'FF0000';//(必须)文字颜色，十六进制数
        $config['wm_shadow_color'] = 'FF0000';//投影颜色，十六进制数
        $config['wm_shadow_distance'] = '0';//字体和投影距离（单位像素）。
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
        var_dump( $this->image_lib->initialize($config));
    }

    //图像水印
    function watermark2(){
        $config['image_library'] = 'gd2';//(必须)设置图像库
        $config['source_image'] = 'ptjsite/upload/003.jpg';//(必须)设置原图像的名字和路径. 路径必须是相对或绝对路径，但不能是URL.
        $config['dynamic_output'] = FALSE;//TRUE 动态的存在(直接向浏览器中以输出图像),FALSE 写入硬盘
        $config['quality'] = '90%';//设置图像的品质。品质越高，图像文件越大
        $config['new_image'] = 'ptjsite/upload/crop004.gif';//设置图像的目标名/路径。
        $config['wm_type'] = 'overlay';//(必须)设置想要使用的水印处理类型(text, overlay)
        $config['wm_padding'] = '5';//图像相对位置(单位像素)
        $config['wm_vrt_alignment'] = 'middle';//竖轴位置 top, middle, bottom
        $config['wm_hor_alignment'] = 'center';//横轴位置 left, center, right
        $config['wm_vrt_offset'] = '0';//指定一个垂直偏移量（以像素为单位）
        $config['wm_hor_offset'] = '0';//指定一个横向偏移量（以像素为单位）
        $config['wm_overlay_path'] = 'ptjsite/upload/overlay.png';//水印图像的名字和路径
        $config['wm_opacity'] = '50';//水印图像的透明度
        $config['wm_x_transp'] = '4';//水印图像通道
        $config['wm_y_transp'] = '4';//水印图像通道
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
    }



    //图片上传
    public function filed(){

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }


        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

// header("HTTP/1.0 500 Internal Server Error");
// exit;


// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
        usleep(5000);

// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'upload_tmp/'.date("Ymd");
        $uploadDir = $targetDir;

        $cleanupTargetDir = true; // Remove old files   //删除旧文件
        $maxFileAge = 5 * 3600; // Temp file age in seconds  年龄在几秒钟内临时文件


// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

// Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

// Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $md5File = $md5File ? $md5File : array();

        if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


// Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


// Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

// Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');



    }
}