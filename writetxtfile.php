<?php 
/*
    2023-03-29
    file 수정 필수 체크 항목 :     파일의 권한을 확인해야 합니다.
                                로컬에서 테스트 진행시, 파일을 읽고 쓰는 것에는 문제가 없었다.
                                linux (apache)서버에 올려서 확인해보니, 파일을 읽을 때 400 권한으로는 진행되지 않는다.
                                ***** 적용시 755으로 진행하였으니, 각자 맞게 적용하도록 한다. (755 == 소유자는 모두 가능하고 그 외의 사용자는 읽기, 실행하기 가능) => chmod
*/

print_r("\ndir_check\n");

$dir_check = './txt_test';

if(!$dir_check){
    print_r("\ndir_check?\n");
    mkdir($dir_check);
    chmod($dir_check, 0777);
}

$new = 'new.txt';
$t_content = "Testtest";

print_r("\nfile_check\n");

$file_check = $dir_check.$new;

if(!$file_check){
    print_r("\nfile_check?\n");
    // fopen -> fwrite -> fclose
    $file = fopen($new, "w") or die("error");
    fwrite($file, $t_content);
    fclose($file);
    chmod($file, 0700);
}




