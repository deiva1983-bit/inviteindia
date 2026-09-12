<?php

	error_reporting(0);

	function encrypt($plainText, $key)
	{
		$secretKey = hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$plainPad = pkcs5_pad($plainText, 16);
		$encryptedText = openssl_encrypt($plainPad, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
		if ($encryptedText === false) {
			return '';
		}
		return bin2hex($encryptedText);
	}

	function decrypt($encryptedText, $key)
	{
		$secretKey = hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText = hextobin($encryptedText);
		$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
		if ($decryptedText === false) {
			return '';
		}
		return pkcs5_unpad($decryptedText);
	}

	function pkcs5_pad($plainText, $blockSize)
	{
		$pad = $blockSize - (strlen($plainText) % $blockSize);
		return $plainText . str_repeat(chr($pad), $pad);
	}

	function pkcs5_unpad($data)
	{
		$pad = ord($data[strlen($data) - 1]);
		if ($pad < 1 || $pad > 16) {
			return $data;
		}
		if (substr($data, -$pad) !== str_repeat(chr($pad), $pad)) {
			return $data;
		}
		return substr($data, 0, -$pad);
	}

	function hextobin($hexString)
	{
		$length = strlen($hexString);
		$binString = '';
		$count = 0;
		while ($count < $length) {
			$subString = substr($hexString, $count, 2);
			$binString .= pack('H*', $subString);
			$count += 2;
		}
		return $binString;
	}
