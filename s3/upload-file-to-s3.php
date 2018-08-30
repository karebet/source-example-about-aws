<?php
	if(isset($_FILES['image'])){
		$file_name = $_FILES['image']['name'];   
		$temp_file_location = $_FILES['image']['tmp_name']; 

		require 'vendor/autoload.php';
		$bucket = "-- nama bucket  --";
		$key = "-- access key id --";
		$secret = "-- secret access key --";
		$s3 = new Aws\S3\S3Client([
			'region'  => 'us-east-1',
			'version' => 'latest',
			'credentials' => [
				'key'    => $key,
				'secret' => $secret,
			]
		]);		
		$result = $s3->putObject([
			'Bucket' => $bucket,
			'Key'    => $file_name,
			'SourceFile' => $temp_file_location			
		]);
		var_dump($result);
	}
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">         
	<input type="file" name="image" />
	<input type="submit"/>
</form> 
