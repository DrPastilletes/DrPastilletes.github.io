<?php
require "../vendor/autoload.php";

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

echo "<br>";

function pujarImg ($file){

    $s3 =new S3Client([
        'version'   => 'latest',
        'region'    => 'us-east-1',
        'credentials' => [
            'key'       => 'ASIA5DQ4FBFD7NT7CRUN',
            'secret'    => 'b7CTEOuxkGx7UVsdXf3J2pfItbQWjK8y4Km9T/Q0',
            'token'     => 'FwoGZXIvYXdzEOr//////////wEaDLtFyYftpV82mg5cdSLKAT0j/oDo2MXkHrjxXhs/yIwfIC6pPcGQ6g+jhUA7MOPu3gDuIJ5VH+jnefxvgbF+bX0Lk5LP/dKLw5Wyy588SJOMBHVN0hTZ2ZSA0BWFelErdMa9DolUq/1kELyHxOwUFyoDBQDBhUgDSVJQU+oVSzQZWMYBpjQIYSG3Q2H5L3BD3hrvtgS2F1lC2s4Pf8/z6ruhI/Ouhsh6o5m112pn5Kfac8X7Rf7omas5LBk9+XIDTbPOKnSDZw1jf9EhCrSL/DUhBHhGB2bd1gso0LGogAYyLW0/WwqabJb0Om/rRbGOQ6mkiX7BDTq7H7fh9rpmjnKSH8nkgcmJvZW9er5Flw==',
        ],
    ]);

    $bucket = "macacos";
    $keyname = "my_object";

    try {
        //Upload data
        $result = $s3->putObject([
            'Bucket'    => $bucket,
            'Key'       => $file["name"],
            'Body'      => 'Hello, world!',
            'ContentType'   => $file["type"],
            'ACL'       => 'public-read',
            'StorageClass'  => 'REDUCED_REDUNDANCY',
            'SourceFile'    => $file["tmp_name"]
        ]);

        echo $result['ObjectURL'] . PHP_EOL;
        $array = [$result['ObjectURL'] . PHP_EOL,$file["name"]];
        var_dump($array);
        return $array;
    } catch (S3Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

?>