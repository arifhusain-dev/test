<?php
//phpinfo();
$conn = ssh2_connect('dresschef.com', 22);
/*$conn = ssh2_connect('example.com', 22);
ssh2_auth_pubkey_file(
    $conn,
    'username',
    '/home/username/.ssh/id_rsa.pub',
    '/home/username/.ssh/id_rsa'
);*/
# connection
ssh2_auth_password($conn, 'dresschef', 'Husain@2019');
#using scp
$sftp = ssh2_sftp($conn);
ssh2_scp_send($conn, '/local/filename', '/remote/filename', 0644);
#using sftp
$localFile='/files/myfile.zip';
$remoteFile='/filesDir/myfile.zip';
$stream = fopen("ssh2.sftp://$sftp$remoteFile", 'w');
$file = file_get_contents($localFile);
fwrite($stream, $file);
fclose($stream);