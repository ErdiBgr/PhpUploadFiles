<?php
function uploadFiles($files=NULL,$mime_type=NULL,$path=NULL,$mb=3){
	if (!$files == NULL || $mime_type == NULL || $path == NULL) {
		$name = $files["name"];
		$type = $files["type"];
		$tmp_name = $files["tmp_name"];
		$error= $files["error"];
		$size = $files["size"];
		$mb = (1024*1024*$mb);
		$extension = ".".pathinfo($name)["extension"];
		if ($error == 4) {
			return "empty_err";
		}else{
			if (is_uploaded_file($tmp_name)) {
				if (in_array($type, $mime_type)) {
					if ($size <= $mb) {
						$save = move_uploaded_file($tmp_name, $path.$extension);
						if ($save) {
							return True;
						}else{
							return "upload_err";
						}
					}else{
						return "size_err";
					}
				}else{
					return "type_err";
				}
			}else{
				return "unkown_err";
			}
		}
	}else{
		return "argument_err";
	}
}
?>
