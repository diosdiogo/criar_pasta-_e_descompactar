<?php

$file_emp = 'empresa';//empresa

//
$conteudoConf = '

<?php

$producao = false;

$estabelecimento = "'.$file_emp.'";

$urlBaseImg = "https://zmsys.com.br/";

if($producao == true){
    $urlBase = "https://zmsys.com.br/";
    $urlAssets = "https://zmsys.com.br/'.$file_emp.'/pediucerto/";
    $api = "https://zmsys.com.br/pediucerto/api/";
}
else if($producao == false){
    $api = "http://localhost/zmpro/pediucerto/api/";
    $urlBase = "http://localhost/zmpro/";
    $urlAssets = "http://localhost/zmpro/'.$file_emp.'/pediucerto/";
}

';

$arquivo_zipado ='./arquivos.zip';
$local_descompactar = './'.$file_emp . '/pediucerto/';

if(!is_dir($file_emp)){//verifica se não existe pasta
    //caso não exista criar
    mkdir($file_emp . '/pediucerto/confg', 0777, true);
    file_put_contents($file_emp . '/pediucerto/confg/conf.php', $conteudoConf);

    UnzipFile($arquivo_zipado, $local_descompactar);//função para descompactar um arquivo zipado
}else{
    
}

function UnzipFile($file_path, $extract_path)
{
    $zip = new ZipArchive;
    $res = $zip->open($file_path);
    if ($res === true) {
        $zip->extractTo($extract_path);
        $zip->close();
        return true;
    } else {
        return false;
    }
}

UnzipFile(
    'c:/caminho/completo/do/arquivo.zip',
    'c:/caminho/completo/do/diretorio/onde/quer/extrair/'
);