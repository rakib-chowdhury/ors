<?php

class ImageUpload {

    public function uploadInto($destinationFolderForMain, $maxImageSize = 500, $quality = 90, $destinationFolderForThumb = null, $thumbSize = null) {

        //Some Settings
        $ThumbSquareSize = $thumbSize;
        $BigImageMaxSize = $maxImageSize; //Image Maximum height or width
        $ThumbPrefix = "thumb_"; //Normal thumb Prefix
        $DestinationDirectory = $destinationFolderForMain;
        $Quality = $quality;
        //ini_set('memory_limit', '-1'); // maximum memory!

        $savedImg = array();
        foreach ($_FILES as $file) {
            // some information about image we need later.

            $ImageName = $file['name'];
            $ImageSize = $file['size'];
            $TempSrc = $file['tmp_name'];
            $ImageType = $file['type'];


            if (is_array($ImageName)) {

                $c = count($ImageName);



                for ($i = 0; $i < $c; $i++) {
                    $processImage = true;
                    $RandomNumber = rand(0, 9999999999);  // We need same random name for both files.

                    if (!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i])) {
                        //echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>, may be file too big!</div>'; //output error
                    } else {
                        //Validate file + create image from uploaded file.
                        switch (strtolower($ImageType[$i])) {
                            case 'image/png':
                                $CreatedImage = imagecreatefrompng($TempSrc[$i]);
                                break;
                            case 'image/gif':
                                $CreatedImage = imagecreatefromgif($TempSrc[$i]);
                                break;
                            case 'image/jpeg':
                            case 'image/pjpeg':
                                $CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
                                break;
                            default:
                                $processImage = false; //image format is not supported!
                        }
                        //get Image Size
                        list($CurWidth, $CurHeight) = getimagesize($TempSrc[$i]);

                        //Get file extension from Image name, this will be re-added after random name
                        $ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
                        $ImageExt = str_replace('.', '', $ImageExt);

                        //Construct a new image name (with random number added) for our new image.
                        $NewImageName = $RandomNumber . '.' . $ImageExt;

                        //Set the Destination Image path with Random Name
                        $thumb_DestRandImageName = $destinationFolderForThumb . $ThumbPrefix . $NewImageName; //Thumb name

                        $DestRandImageName = $DestinationDirectory . $NewImageName; //Name for Big Image
                        //Resize image to our Specified Size by calling resizeImage function.
                        if ($processImage && $this->resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                            if ($destinationFolderForThumb != null) {
                                //Create a square Thumbnail right after, this time we are using cropImage() function
                                if (!$this->cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                                    echo 'Error Creating thumbnail';
                                }
                                $thumbName=$ThumbPrefix . $NewImageName;
                            }
                            else
                                $thumbName=null;
                            /*
                              At this point we have succesfully resized and created thumbnail image
                              We can render image to user's browser or store information in the database
                              For demo, we are going to output results on browser.
                             */

                            //Get New Image Size
                            list($ResizedWidth, $ResizedHeight) = getimagesize($DestRandImageName);
                        } else {
                            //echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>! Please check if file is supported</div>'; //output error
                        }
                        $savedImg[$i] = array('main' => $NewImageName, 'thumb' => $thumbName); //$NewImageName;
                    }
                }
                return $savedImg;
            } else {
                //skib
                $processImage = true;
                $RandomNumber = rand(0, 9999999999);  // We need same random name for both files.

                if (!isset($ImageName) || !is_uploaded_file($TempSrc)) {
                    //echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>, may be file too big!</div>'; //output error
                } else {
                    //Validate file + create image from uploaded file.
                    switch (strtolower($ImageType)) {
                        case 'image/png':
                            $CreatedImage = imagecreatefrompng($TempSrc);
                            break;
                        case 'image/gif':
                            $CreatedImage = imagecreatefromgif($TempSrc);
                            break;
                        case 'image/jpeg':
                        case 'image/pjpeg':
                            $CreatedImage = imagecreatefromjpeg($TempSrc);
                            break;
                        default:
                            $processImage = false; //image format is not supported!
                    }
                    //get Image Size
                    list($CurWidth, $CurHeight) = getimagesize($TempSrc);

                    //Get file extension from Image name, this will be re-added after random name
                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);

                    //Construct a new image name (with random number added) for our new image.
                    $NewImageName = $RandomNumber . '.' . $ImageExt;

                    //Set the Destination Image path with Random Name
                    $thumb_DestRandImageName = $destinationFolderForThumb . $ThumbPrefix . $NewImageName; //Thumb name
                    $DestRandImageName = $DestinationDirectory . $NewImageName; //Name for Big Image
                    //Resize image to our Specified Size by calling resizeImage function.
                    if ($processImage && $this->resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType)) {
                        if ($destinationFolderForThumb != null) {
                            //Create a square Thumbnail right after, this time we are using cropImage() function
                            if (!$this->cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                                echo 'Error Creating thumbnail';
                            }
                            $thumbName=$ThumbPrefix . $NewImageName;
                        }
                        else
                                $thumbName=null;
                        /*
                          At this point we have succesfully resized and created thumbnail image
                          We can render image to user's browser or store information in the database
                          For demo, we are going to output results on browser.
                         */

                        //Get New Image Size
                        list($ResizedWidth, $ResizedHeight) = getimagesize($DestRandImageName);
                    } else {
                        //echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>! Please check if file is supported</div>'; //output error
                    }
                }
                return array('main' => $NewImageName, 'thumb' => $thumbName);
                ;
            }
        }
    }

    #####  This function will proportionally resize image ##### 

    function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality) {

        if ($image_width <= 0 || $image_height <= 0) {
            return false;
        } //return false if nothing to resize
        //do not resize if image is smaller than max size
        if ($image_width <= $max_size && $image_height <= $max_size) {
            if ($this->save_image($source, $destination, $image_type, $quality)) {
                return true;
            }
        }

        //Construct a proportional size of new image
        $image_scale = min($max_size / $image_width, $max_size / $image_height);
        $new_width = ceil($image_scale * $image_width);
        $new_height = ceil($image_scale * $image_height);

        $new_canvas = imagecreatetruecolor($new_width, $new_height); //Create a new true color image
        //Copy and resize part of an image with resampling
        if ($this->imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)) {
            $this->save_image($new_canvas, $destination, $image_type, $quality); //save resized image
        }

        return true;
    }

    // This function will proportionally resize image 
    function resizeImage($CurWidth, $CurHeight, $MaxSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        //Construct a proportional size of new image
        $ImageScale = min($MaxSize / $CurWidth, $MaxSize / $CurHeight);
        $NewWidth = ceil($ImageScale * $CurWidth);
        $NewHeight = ceil($ImageScale * $CurHeight);

        if ($CurWidth < $NewWidth || $CurHeight < $NewHeight) {
            $NewWidth = $CurWidth;
            $NewHeight = $CurHeight;
        }
        $NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);
        // Resize Image
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)) {
            switch (strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

    //This function corps image to create exact square images, no matter what its original size!
    function cropImage($CurWidth, $CurHeight, $iSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        if ($CurWidth > $CurHeight) {
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size = $CurWidth - ($x_offset * 2);
        } else {
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }

        $NewCanves = imagecreatetruecolor($iSize, $iSize);
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)) {
            switch (strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

}

?>
