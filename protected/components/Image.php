<?php

/* 
 *图片类
 */
class Image{
    
    /*
     * 图片裁切
     */
    public static function ImageCropper($source_path,$source_x,$source_y,$target_width, $target_height){
        header('Content-Type: image/jpeg');
        $cropped_image = imagecreatetruecolor($target_width, $target_height);
        $source_info   = getimagesize($source_path);
	$source_mime   = $source_info['mime'];

	switch ($source_mime){
            case 'image/gif':
                    $source_image = imagecreatefromgif($source_path);
                    break;
            case 'image/jpeg':
                    $source_image = imagecreatefromjpeg($source_path);
                    break;
            case 'image/png':
                    $source_image = imagecreatefrompng($source_path);
                    break;
            default:
                    return false;
                    break;
	}
	// 裁剪
	imagecopy($cropped_image, $source_image, 0, 0, $source_x, $source_y, $target_width, $target_height); 

        imagejpeg($cropped_image,$source_path);
	imagedestroy($source_image);
	imagedestroy($cropped_image);
    }
}
