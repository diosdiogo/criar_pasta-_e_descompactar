<?php

$file_emp = 'empresa_nome';//nome da empresa

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
$local_descompactar = './'.$file_emp . '/pediucerto/'; // local a ser descompactado

if(!is_dir($file_emp)){//verifica se não existe pasta
    //caso não exista criar
    mkdir($file_emp . '/pediucerto/confg', 0777, true);//cria pasta da empresa já com a pasta config
    //se precisar criar outras pastas fazer outro mkdir com o caminho da pasta, não esquecer o $file_emp
    
}else{
    //condição se já existir a pasta da empresa
    mkdir($file_emp . '-2/pediucerto/confg', 0777, true);
}

file_put_contents($file_emp . '/pediucerto/confg/conf.php', $conteudoConf); //cria arquivo conf.php, dentro da pasta conf.php, e grava o conteúdo lá dentro

UnzipFile($arquivo_zipado, $local_descompactar);//função para descompactar um arquivo zipado

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