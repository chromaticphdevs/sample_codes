<?php
    /**
     * USE HELPERS
     */

    function get_upload_asset()
    {
        return BASE_DIR.DS.'public'.DS.'assets';
    }

    function get_upload_base()
    {
        return BASE_DIR.DS.'public'.DS.'uploads';
    }

    /**
     * @param fileName $_FILES global name
     * dir path
     */
    function upload_multiple($fileName , $uploadPath = null)
    {
        if(is_null($uploadPath))
            $uploadPath = get_upload_base();

        /**
         * Upload Process
         *  */
        $arrNames    = [];
        $arrNamesOld = [];
        $hasWarnings = [];

        /*CHECK IF FILE UPLOAD IS EMPTY*/

        if($_FILES[$fileName]['name'][0] == '')
        {
            return [
                'status' => 'failed' ,
                'result' => [
                    'arrNames' => [],
                    'arrNamesOld' => [],
                    'names' => '',
                    'namesold' => ''
                ]
            ];
        }

        foreach($_FILES[$fileName]['name'] as $name => $value)
        {
			$uploadedName = $_FILES[$fileName]['name'][$name];

			$file_ext = explode('.' , $uploadedName);

			$allowed_ext = array('jpeg' , 'jpg' , 'png' , 'bitmap','csv' , 'xls' ,'xlsx' , 'csv' ,'pdf','docx');

			if(in_array($file_ext[1] , $allowed_ext))
			{
				$new_name = md5(rand()).'.'.$file_ext[1];
				$sourcePath = $_FILES[$fileName]['tmp_name'][$name];
				$targetPath = $uploadPath.DS.$new_name;


				if(!file_exists($uploadPath)){
					mkdir($uploadPath);
				}

				if(move_uploaded_file($sourcePath, $targetPath)){

					array_push($arrNames, $new_name);
					array_push($arrNamesOld, $uploadedName);
				}
			}else{
				$hasWarnings[] = "file '{$uploadedName}' not been uploaded invalid extension '{$file_ext[1]}'";
			}
        }

        if(!empty($hasWarnings))
        {
            return [
                'status' => 'failed' ,
                'result' => [
                    'err' => $hasWarnings,
                    'images'  => $arrNamesOld
                ]
            ];
        }else {
            return [
                'status' => 'success' ,
                'result' => [
                    'arrNames'    => $arrNames,
                    'arrNamesOld' => $arrNamesOld,
                    'names'       => arr_to_str($arrNames),
                    'namesold'    => arr_to_str($arrNamesOld)
                ]
            ];
        }
    }

    function upload_image($filename , $uploadPath , $fileName = null)
    {
        $uploaderImage = new UploaderImage();

        $uploaderImage->setImage($filename)
        ->setName($fileName)
        ->setPath($uploadPath)
        ->upload();

        if(!empty($uploaderImage->getErrors()))
            return [
                'status' => 'failed' ,
                'result' => [
                    'err'  => $uploaderImage->getErrors(),
                    'name' => $uploaderImage->getName()
                ]
            ];

        return [
            'status' => 'success',
            'result' => [
                'name' => $uploaderImage->getName() ,
                'oldname' => $uploaderImage->getNameOld(),
                'extension' => $uploaderImage->getExtension(),
                'path'   => $uploaderImage->getPath()
            ]
        ];
    }

    function upload_document($filename , $uploadPath)
    {
        $uploaderDocument = new UploaderDocument();

        $uploaderDocument->setDocument($filename)
        ->setPath($uploadPath)
        ->upload();

        if(!empty($uploaderDocument->getErrors()))
            return [
                'status' => 'failed' ,
                'result' => [
                    'err'  => $uploaderDocument->getErrors(),
                    'name' => $uploaderDocument->getName()
                ]
            ];

        return [
            'status' => 'success',
            'result' => [
                'name' => $uploaderDocument->getName() ,
                'oldname' => $uploaderDocument->getNameOld(),
                'extension' => $uploaderDocument->getExtension(),
                'path'   => $uploaderDocument->getPath()
            ]
        ];
    }

    function upload_file()
    {

    }
