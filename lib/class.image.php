<?php
ini_set("memory_limit", "256M");
class Image {
	var $image;
	var $image_type;
	function load($filename) {
		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
		if($this->image_type == IMAGETYPE_JPEG) {
			$this->image = imagecreatefromjpeg($filename);
		} elseif($this->image_type == IMAGETYPE_GIF) {
			$this->image = imagecreatefromgif($filename);
		} elseif($this->image_type == IMAGETYPE_PNG) {
			$this->image = imagecreatefrompng($filename);
		} else {
			echo "Tanımsız Format.";
		}
	}
	function save($filename, $compression=70) {
		if($this->image_type == IMAGETYPE_JPEG) {
			imagejpeg($this->image, $filename, $compression);
		} elseif($this->image_type == IMAGETYPE_GIF) {
			imagegif($this->image,$filename);
		} elseif($this->image_type == IMAGETYPE_PNG) {
			imagepng($this->image,$filename);
		}
	}
	function resizeW($width) {
		$ratio = $width / $this->getWidth();
		$height = $this->getheight() * $ratio;
		$this->resize($width, $height);
	}
	function resizeH($height) {
		$ratio = $height / $this->getHeight();
		$width = $this->getWidth() * $ratio;
		$this->resize($width, $height);
	}
	function resize($width, $height) {
		$new_image = imagecreatetruecolor($width, $height);
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;
	}
	function scale($scale) {
		$width = $this->getWidth() * ($scale / 100);
		$height = $this->getheight() * ($scale / 100);
		$this->resize($width, $height);
	}
	function contain($width, $height) {
		$yw = round($this->getHeight() / $this->getWidth() * $width);
		if($yw < $height) {
			$this->resizeW($width);
		} else {
			$this->resizeH($height);
		}
	}
	function cover($width, $height) {
		$yw = round($this->getHeight() / $this->getWidth() * $width);
		if($yw > $height) {
			$this->resizeW($width);
		} else {
			$this->resizeH($height);
		}
	}
	function getWidth() {
		return imagesx($this->image);
	}
	function getHeight() {
		return imagesy($this->image);
	}
}
?>
