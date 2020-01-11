<?php

if(!file_exists('database/tmp/schema.xml')) {
    echo 'No existe el archivo de esquema temporal';
    return false;
}

if(!file_exists('database/schema.xml')) {
    copy('database/tmp/schema.xml', "database/schema.xml");
    echo 'database/schema.xml creado';
    return false;
}

// files
$schemaTmp = simplexml_load_file("database/tmp/schema.xml");
if(!$schemaTmp) {
    echo 'schemaTmp error al cargar';
    return false;
}

$schemaDb = simplexml_load_file("database/schema.xml");
if(!$schemaDb) {
    echo 'schemaDb error al cargar';
    return false;
}
//Guardar behaviors existentes
$saved = array();
foreach ($schemaDb as $table){
    foreach ($table->children() as $thing){
        if($thing->getName()=="behavior"){
            $parentTable = $thing->xpath("..")[0]->attributes()['name']->__toString();
            $arr = array($parentTable => $thing);
            array_push($saved,$arr);
        }
    }
}
//var_dump($thing);

//Retirar behaviors para comparacion
$schemaDbComp = preg_split("/\s{4}<behavior>\X+<\/behavior>\n/", $schemaDb->asXML());
$schemaDbComp = implode($schemaDbComp);
//var_dump($schemaDbComp);

if($schemaTmp->asXML()==$schemaDbComp) {
    echo "sin cambios\n";
    //return true;
}

//Agrega los behaviors al nuevo schema (temp)
foreach ($schemaTmp as $table){
    foreach ($saved as $beh){
        if(array_key_exists("".$table->attributes()['name']->__toString(), $beh)){
            //var_dump($beh[$table->attributes()["name"]->__toString()]["name"]->__toString());
            $child = $table->addChild("behavior");
            $child->addAttribute("name", $beh[$table->attributes()["name"]->__toString()]["name"]->__toString());
            //$table->addChild("behavior", $beh[$table->attributes()['name']->__toString()]); //TODO Ajustar el salto de página y los espacios
            //$element->addAttribute("name",$beh[$table->attributes()['name']->__toString()]."");
        }
    }
}
//var_dump($beh);
//

$myfile = fopen('database/schema.xml', "w") or die("Unable to open file!");
fwrite($myfile, $schemaTmp->asXML());
fclose($myfile);

echo "!\n";

//--- Construir las clases para el modelo
function getAbr(String $word){
    $temp = substr($word,0,3);
    if($temp == "tbl" || $temp == "cat"){
        return substr($word, strlen($word)-6, strlen($word));
    }else {
        $fst = substr($word, "0", 1);
        $lst = substr($word, 1, strlen($word));
        $lst = str_replace("a", "", "".$lst);
        $lst = str_replace("e", "", "".$lst);
        $lst = str_replace("i", "", "".$lst);
        $lst = str_replace("o", "", "".$lst);
        $lst = str_replace("u", "", "".$lst);
        $lst = $fst.substr($lst."",0,2);
        while(strlen($lst)<3){
            $lst.="x";
        }
        return $lst;
    }
}
// MAIN
foreach ($schemaTmp as $table){
//    $table = $schemaTmp->xpath("//table[@name='catentcls']")[0]; //<-- TODO quitar este por foreach
    $nameTbl = $table->attributes()['name']->__toString();
    if($nameTbl == 'migrations' || $nameTbl == 'password_resets' || $nameTbl == 'failed_jobs') continue;
    $phpNameTbl = strtoupper(substr($nameTbl,0,1)).substr($nameTbl,1, strlen($nameTbl));

    $conn = mysqli_connect("localhost", "root", "", "cero");
    $result = $conn->query("show full columns from ".$nameTbl."");
    $camposNulos = array();
    $camposComments = array();
    $primaryPos = null;
    $uuidPos = null;
    $i=0;
    while($row = $result->fetch_row()){
        array_push($camposNulos, $row[3]);
        array_push($camposComments, $row[8]);
        if($row[4]=="PRI"){
            $primaryPos = $i;
        }
        if($row[4]=="UNI"){
            $uuidPos = $i;
        }
        $i++;
    }
    if(is_null($primaryPos)){
        echo "There isn't a primary key field in table ".$nameTbl.".\nExit\n";
        return;
    }
    if(is_null($uuidPos)){
        echo "There isn't a uuid field in table ".$nameTbl.".\n";
        return;
    }
    //var_dump($primaryPos);
    mysqli_close($conn);

    $tipoTbl = substr($nameTbl,0,3);
    if($tipoTbl == "tbl" || $tipoTbl == "cat"){
        $sixletters = substr($nameTbl, strlen($nameTbl)-6, strlen($nameTbl));
    }else {
        $sixletters = $nameTbl;
    }
    $abrTblName = getAbr($nameTbl);
    $camposName = array();
    $camposPhpName = array();
    $foraneas = array();
    $foraneasPhpName = array();

    $campoType = array();
    $campoSize = array();
    foreach ($table->children() as $element){
        if($element->getName()=="column"){
            $elName = $element->attributes()['name']->__toString();
            $elPhpName = $element->attributes()['phpName']->__toString();
            $elType = $element->attributes()['type']->__toString();
            array_push($camposName, $elName);
            array_push($camposPhpName, $elPhpName);
            array_push($campoType, $elType);
            if(!is_null($element->attributes()['size'])) {
                $elSize = $element->attributes()['size']->__toString();
                array_push($campoSize, $elSize);
            }
            else
                array_push($campoSize, 0);
        }
        if($element->getName()=="foreign-key"){
            //$foreignTbl = $element->attributes()['foreignTable']->__toString();
            //$refs = array();
            foreach ($element->children() as $ref){
                //$foreign = $ref->attributes()['foreign']->__toString();
                $local = $ref->attributes()['local']->__toString();
                //$temparr = array("".$);
                array_push($foraneas, $local);
                $foreign = $table->xpath("//column[@name='$local']")[0]->attributes()['phpName']->__toString();
                array_push($foraneasPhpName, $foreign);
            }
        }
    }

    //Obtener version corta de variables
    $abrCampos = array();
    for ($i=0;$i<count($camposPhpName);$i++){
        $abrCampo = getAbr($camposPhpName[$i]);
        $abrCampo = strtolower($abrCampo);
        array_push($abrCampos, $abrCampo);
        //print_r($i." : ".$camposPhpName[$i]." | ".$abrCampo." - ".$abrCampos[$i]."\n");
    }
    // Revisar si no hay repeticion de variables
    for($j=0; $j<count($abrCampos); $j++){
        for($i=0; $i<count($abrCampos); $i++){
            if($j!=$i){
                if($abrCampos[$j]==$abrCampos[$i]){
                    $abrCampos[$i] = $abrCampos[$i]."x";
                }
            }
        }
    }

    //Modelo
    $modelCode =
"<?php

use Base\\".$phpNameTbl." as Base".$phpNameTbl.";

class ".$phpNameTbl." extends Base".$phpNameTbl."
{
    public static function crt".$sixletters."(array \$data , \Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        \$".$abrTblName." = new \\".$phpNameTbl."();
        try{
            ";
            for($i=0; $i<count($camposName); $i++){
                if($i!=$primaryPos){
                    if($camposNulos[$i]=="YES"){
                        $modelCode.=
                            "if(array_key_exists('".$camposName[$i]."', \$data)){
                if(!is_null(\$data['".$camposName[$i]."'])){
                    \$".$abrTblName."->set".$camposPhpName[$i]."(\$data['".$camposName[$i]."']);
                }
            }
            ";
                    }else{
                        $modelCode.=
                            "if(array_key_exists('".$camposName[$i]."', \$data)){
                if(!is_null(\$data['".$camposName[$i]."'])){
                    \$".$abrTblName."->set".$camposPhpName[$i]."(\$data['".$camposName[$i]."']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('".$camposName[$i]." cannot be null');
                }
            }
            ";
                    }
                }
            }
            $modelCode .=
            "\$".$abrTblName."->save(\$connection);
        } catch (\Propel\Runtime\Exception\PropelException \$e) {
            Illuminate\Support\Facades\Log::debug(\$e);
            return false;
        }
        return \$".$abrTblName.";
    }

    public static function rmv".$sixletters."($".$camposName[0].", "
        ."\Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        $".$abrTblName." = \\".$phpNameTbl."Query::create()
            ->filterBy".$camposPhpName[0]."($".$camposName[0].")
            ->findOne(\$connection);

        if(!$".$abrTblName.") return false;

        try {
            $".$abrTblName."->delete(\$connection);
        } catch (\Propel\Runtime\Exception\PropelException \$e) {
            Illuminate\Support\Facades\Log::debug(\$e);
            return false;
        }

        return true;
    }

    public static function upd".$sixletters."(array \$data , \Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        $".$abrTblName." = \\".$phpNameTbl."Query::create()
            ->filterBy".$camposPhpName[$primaryPos]."(\$data['".$camposName[$primaryPos]."'])
            ->findOne(\$connection);

        if(!$".$abrTblName.") return false;

        try{
            ";
            for($i=0; $i<count($camposName); $i++){
                if($i!=$primaryPos){
                    if($camposNulos[$i]=="YES"){
                        $modelCode.=
            "\$".$abrTblName."->set".$camposPhpName[$i]."(array_key_exists('".$camposName[$i]."', \$data) ? \$data['".$camposName[$i]."'] : null);
            ";
                    }else{
                        $modelCode.=
            "if(array_key_exists('".$camposName[$i]."', \$data)){
                if(!is_null(\$data['".$camposName[$i]."'])){
                    \$".$abrTblName."->set".$camposPhpName[$i]."(\$data['".$camposName[$i]."']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('".$camposName[$i]." cannot be null');
                }
            }
            ";
                    }
                }
            }
            $modelCode .=
            "\$".$abrTblName."->save(\$connection);
        } catch (\Propel\Runtime\Exception\PropelException \$e) {
            Illuminate\Support\Facades\Log::debug(\$e);
            return false;
        }
            return $".$abrTblName.";
    }

    public static function dsp".$sixletters."(";
    for ($i=0; $i<count($foraneas); $i++){
        $modelCode .= "\$fil".$foraneas[$i].", ";
    }
    $modelCode .= "\Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        \$all".$abrTblName." = \\".$phpNameTbl."Query::create();";
        for ($i=0; $i<count($foraneas); $i++){
            $modelCode .= "if(\$fil".$foraneas[$i]." != 0){
            \$all".$abrTblName." = \$all".$abrTblName."->filterBy".$foraneasPhpName[$i]."(\$fil".$foraneas[$i].");
        }";
        }
        $modelCode .= "

        \$all".$abrTblName." = \$all".$abrTblName."->find();

        if(!\$all".$abrTblName.") return false;

        return \$all".$abrTblName.";
    }

    public static function fno".$sixletters."($".$camposName[0].", ";
    $modelCode .= "\Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        $".$abrTblName." = \\".$phpNameTbl."Query::create()
            ->filterBy".$camposPhpName[0]."($".$camposName[0].")
            ->findOne(\$connection);

        if(!$".$abrTblName.") return false;

        return $".$abrTblName.";
    }

    public static function fnu".$sixletters."(\$uuid,";
    $modelCode .= "\Propel\Runtime\Connection\ConnectionInterface \$connection = null)
    {
        $".$abrTblName." = \\".$phpNameTbl."Query::create()
            ->filterByUuid(\$uuid)
            ->findOne(\$connection);

        if(!$".$abrTblName.") return false;

        return $".$abrTblName.";
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
";


    if(file_exists('database/generated-classes/'.$phpNameTbl.".php")){
        //TODO salvar el codigo personalizado
        $archivo = fopen('database/generated-classes/'.$phpNameTbl.".php", "r") or die("Unable to open file!");
        $oldcode = "";
        while(($buffer = fgets($archivo)) !== false){
            $oldcode .= $buffer;
        }
        $oldcode = preg_split("/\/\/TODO \*CRUD Generator control separator line\*\X+\)\n/", $oldcode);

        $modelCode .= $oldcode[1];
        //var_dump($modelCode);
    }else{
        $modelCode .= "}";
    }

    $archivo = fopen('database/generated-classes/'.$phpNameTbl.".php", "w") or die("Unable to open file!");
    fwrite($archivo, $modelCode);
    fclose($archivo);

    // Controlador
    $controllerCode =
"<?php

namespace App\\Http\\Controllers;

use App\\ReturnHandler;
use App\\TransactionHandler;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Validator;

class ".$phpNameTbl."Controller extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.".$phpNameTbl.".main');
    }

    // store (C)
    public function create(Request \$request)
    {
        // 1.- Validacion del request TODO *Modificar*
        \$rules = [\n";
        for($i=0; $i<count($camposPhpName); $i++){
            if($camposComments[$i] == 'Internal') continue;
            if($camposPhpName[$i] == 'Uuid'){
                $controllerCode .= "\t\t\t'".$camposPhpName[$i]."' => 'required|uuid|size:36',\n";
            }
            $nullable = $camposNulos[$i] == 'YES' ? "nullable" : "required";
            if($i!=$primaryPos && $i!=$uuidPos){
                switch($campoType[$i]) {
                    case 'SMALLINT':
                    case 'BIGINT':
                    case 'INTEGER':
                        $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|integer|min:0|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                        break;
                    case 'DOUBLE':
                        $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|numeric|min:0|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                        break;
                    case 'CLOB':
                    case 'LONGVARCHAR':
                    case 'CHAR':
                    case 'VARCHAR':
                        $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                        break;
                    case 'DATE':
                    case 'TIMESTAMP':
                        $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|date_format:\"Y-m-d\TH:i:sO\"',\n";
                    break;
                    case 'BOOLEAN':
                        $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|boolean',\n";
                        break;
                    default:
                        $controllerCode .= "\t\t\t'".$camposPhpName[$i]."' => '".$nullable."',\n";
                        break;
                }
            }
        }
    $controllerCode.= "\t\t];

        \$msgs = [ // TODO *Customizable*\n";
    for($i=0; $i<count($camposPhpName); $i++){
        if($i==$primaryPos) continue;
        if($camposComments[$i] == 'Internal') continue;

        if($camposNulos[$i] == 'YES')
            $controllerCode .= "\t\t\t'".$camposComments[$i].".nullable' => 'Validacion fallada en ".$camposComments[$i].".nullable',\n";
        else
            $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";

        if($camposPhpName[$i] == 'Uuid'){
            $controllerCode .= "\t\t\t'".$camposPhpName[$i].".uuid' => 'Uuid no válido',\n";
            $controllerCode .= "\t\t\t'".$camposPhpName[$i].".size' => 'Uuid no válido',\n";
        }

        if($i!=$primaryPos && $i!=$uuidPos){
            switch($campoType[$i]) {
                case 'SMALLINT':
                case 'BIGINT':
                case 'INTEGER':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".integer' => 'Validacion fallada en ".$camposComments[$i].".integer',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".min' => 'Validacion fallada en ".$camposComments[$i].".min',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                break;
                case 'DOUBLE':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".numeric' => 'Validacion fallada en ".$camposComments[$i].".numeric',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".min' => 'Validacion fallada en ".$camposComments[$i].".min',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                    break;
                case 'CLOB':
                case 'LONGVARCHAR':
                case 'CHAR':
                case 'VARCHAR':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".string' => 'Validacion fallada en ".$camposComments[$i].".string',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                    break;
                case 'DATE':
                case 'TIMESTAMP':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".date_format' => 'Validacion fallada en ".$camposComments[$i].".date_format',\n";
                    break;
                case 'BOOLEAN':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".boolean' => 'Validacion fallada en ".$camposComments[$i].".boolean',\n";
                    break;
                default:
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => 'required',\n";
                    break;
            }

        }
    }

    $controllerCode.="\t\t];

        \$validator = Validator::make(\$request->toArray(), \$rules, \$msgs)->errors()->all();

        if(!empty(\$validator)){
            return ReturnHandler::rtrerrjsn(\$validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        \$data = [
";
    for ($i=0;$i<count($abrCampos);$i++){
        if($camposComments[$i] == 'Internal') continue;
        if($i!=$primaryPos){
            $controllerCode.="\t\t\t'".$camposName[$i]."' => request('".$camposComments[$i]."'),\n";
        }
    }
    $controllerCode.=
"        ];

        // 3.- Iniciar transaccion
        \$trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        \$result = \\".$phpNameTbl."::crt".$sixletters."(\$data, \$trncnn);

        // 6.- Commit y return
        if(!\$result){
            TransactionHandler::rollback(\$trncnn);
            return ReturnHandler::rtrerrjsn('');
        }

        TransactionHandler::commit(\$trncnn);
        return ReturnHandler::rtrsccjsn('Guardado correctamente');
    }

    // destroy (R)
    public function destroy(Request \$request)
    {
        // 1.- Validacion del request
        \$rules = [
            'Uuid' => 'required|uuid|size:36',
        ];

        \$msgs = [ // TODO *Customizable*
            'Uuid.required' => 'Objeto no válido',
            'Uuid.uuid' => 'Objeto no válido',
            'Uuid.size' => 'Objeto no válido',
        ];

        \$validator = Validator::make(\$request->toArray(), \$rules, \$msgs)->errors()->all();

        if(!empty(\$validator)){
            return ReturnHandler::rtrerrjsn(\$validator[0]);
        }

        // 2.- Request a variables
        \$uuid = request('Uuid');

        // 3.- Iniciar Transaccion
        \$trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        \$".$sixletters." = \\".$phpNameTbl."::fnu".$sixletters."(\$uuid, \$trncnn);
        if(!\$".$sixletters." instanceof \\".$phpNameTbl."){
            TransactionHandler::rollback(\$trncnn);
            return ReturnHandler::rtrerrjsn('\$".$sixletters." false');
        }

        \$result = \\".$phpNameTbl."::rmv".$sixletters."(\$".$sixletters."->get".$camposPhpName[$primaryPos]."(), \$trncnn);

        // 6.- Commit & return
        if(!\$result){
            TransactionHandler::rollback(\$trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un inesperado');
        }

        TransactionHandler::commit(\$trncnn);
        return ReturnHandler::rtrsccjsn('Eliminado correctamente');

    }

    // update (U)
    public function update(Request \$request)
    {
        // 1.- Validacion del request TODO *Modificar*
        \$rules = [\n";
    for($i=0; $i<count($camposPhpName); $i++){
        if($camposComments[$i] == 'Internal') continue;
        if($camposPhpName[$i] == 'Uuid'){
            $controllerCode .= "\t\t\t'".$camposPhpName[$i]."' => 'required|uuid|size:36',\n";
        }
        $nullable = $camposNulos[$i] == 'YES' ? "nullable" : "required";
        if($i!=$primaryPos && $i!=$uuidPos){
            switch($campoType[$i]) {
                case 'SMALLINT':
                case 'BIGINT':
                case 'INTEGER':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|integer|min:0|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                    break;
                case 'DOUBLE':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|numeric|min:0|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                    break;
                case 'CLOB':
                case 'LONGVARCHAR':
                case 'CHAR':
                case 'VARCHAR':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|max:".str_pad("9",$campoSize[$i],"9")."',\n";
                    break;
                case 'DATE':
                case 'TIMESTAMP':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|date_format:\"Y-m-d\TH:i:sO\"',\n";
                    break;
                case 'BOOLEAN':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => '".$nullable."|boolean',\n";
                    break;
                default:
                    $controllerCode .= "\t\t\t'".$camposPhpName[$i]."' => '".$nullable."',\n";
                    break;
            }
        }
    }
    $controllerCode.= "\t\t];

        \$msgs = [ // TODO *Customizable*\n";
    for($i=0; $i<count($camposPhpName); $i++){
        if($camposComments[$i] == 'Internal') continue;
        if($camposPhpName[$i] == 'Uuid'){
            $controllerCode .= "\t\t\t'".$camposPhpName[$i]."' => 'required|uuid|size:36',\n";
        }
        if($i!=$primaryPos && $i!=$uuidPos){
            switch($campoType[$i]) {
                case 'SMALLINT':
                case 'BIGINT':
                case 'INTEGER':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".integer' => 'Validacion fallada en ".$camposComments[$i].".integer',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".min' => 'Validacion fallada en ".$camposComments[$i].".min',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                    break;
                case 'DOUBLE':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".numeric' => 'Validacion fallada en ".$camposComments[$i].".numeric',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".min' => 'Validacion fallada en ".$camposComments[$i].".min',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                    break;
                case 'CLOB':
                case 'LONGVARCHAR':
                case 'CHAR':
                case 'VARCHAR':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".string' => 'Validacion fallada en ".$camposComments[$i].".string',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".max' => 'Validacion fallada en ".$camposComments[$i].".max',\n";
                    break;
                case 'DATE':
                case 'TIMESTAMP':
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".date_format' => 'Validacion fallada en ".$camposComments[$i].".date_format',\n";
                    break;
                case 'BOOLEAN':
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => 'required|boolean',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".required' => 'Validacion fallada en ".$camposComments[$i].".required',\n";
                    $controllerCode .= "\t\t\t'".$camposComments[$i].".boolean' => 'Validacion fallada en ".$camposComments[$i].".boolean',\n";
                    break;
                default:
                    $controllerCode .= "\t\t\t'".$camposComments[$i]."' => 'required',\n";
                    break;
            }
            if($camposNulos[$i] == 'YES')
                $controllerCode .= "\t\t\t'".$camposComments[$i].".nullable' => 'Validacion fallada en ".$camposComments[$i].".nullable',\n";


        }
    }

    $controllerCode.= "
        ];

        \$validator = Validator::make(\$request->toArray(), \$rules, \$msgs)->errors()->all();

        if(!empty(\$validator)){
            return ReturnHandler::rtrerrjsn(\$validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        \$".$abrCampos[$uuidPos].$sixletters." = request('".$camposPhpName[$uuidPos]."');
";
    $controllerCode.=
        "\t\t\$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        \$trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        \$".$sixletters." = \\".$phpNameTbl."::fnu".$sixletters."(\$".$abrCampos[$uuidPos].$sixletters.", \$trncnn);
        if(!\$".$sixletters." instanceof \\".$phpNameTbl."){
            TransactionHandler::rollback(\$trncnn);
            return ReturnHandler::rtrerrjsn('\$".$sixletters." false');
        }

        \$data = [
";
        for ($i=0;$i<count($abrCampos);$i++){
            if($camposComments[$i] == 'Internal') continue;
            if($i==$primaryPos){
                $controllerCode.="\t\t\t'".$camposName[$i]."' => $".$sixletters."->get".$camposPhpName[$primaryPos]."(),\n";
            }else if($i==$uuidPos){
                $controllerCode.="\t\t\t'".$camposName[$i]."' => $".$sixletters."->getUuid(),\n";
            }else{
                $controllerCode.="\t\t\t'".$camposName[$i]."' => request('".$camposComments[$i]."'),\n";
            }
        }
        $controllerCode.=
"        ];

        \$result = \\".$phpNameTbl."::upd".$sixletters."(\$data, \$trncnn);

        // 6.- Commit & return
        if(!\$result){
            TransactionHandler::rollback(\$trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        TransactionHandler::commit(\$trncnn);
        return ReturnHandler::rtrsccjsn('Actualizado correctamente');
    }

// Views

    // Show table(D)
    public function table(Request \$request)
    {

    }

    // Display one(D)
    public function edit(Request \$request)
    {

    }


";


    $controllerCode.="
    //TODO *CRUD Generator control separator line* (Don't remove this line!)
";

    if(file_exists('app/Http/Controllers/'.$phpNameTbl."Controller.php")){
        //TODO salvar el codigo personalizado
        $archivo = fopen('app/Http/Controllers/'.$phpNameTbl."Controller.php", "r") or die("Unable to open file!");
        $oldcode = "";
        while(($buffer = fgets($archivo)) !== false){
            $oldcode .= $buffer;
        }
        $oldcode = preg_split("/\/\/TODO \*CRUD Generator control separator line\*\X+\)\n/", $oldcode);

        $controllerCode .= $oldcode[1];
    }else{
        $controllerCode .= "}";
    }

    $archivo = fopen('app/Http/Controllers/'.$phpNameTbl."Controller.php", "w") or die("Unable to open file!");
    fwrite($archivo, $controllerCode);
    fclose($archivo);

    //Policies
    $policiesCode = "";
    $policiesCode .=
"<?php

namespace App\\Policies;

use App\\User;
use ".$phpNameTbl.";
use Illuminate\\Auth\\Access\\HandlesAuthorization;

class ".$phpNameTbl."Policy
{
    use HandlesAuthorization;

    public function view(User \$user, ".$phpNameTbl." \$".$nameTbl.")
    {
        // Update \$user authorization to view \$viehicle here.
        return true;
    }

    public function create(User \$user, ".$phpNameTbl." \$".$nameTbl.")
    {
        // Update \$user authorization to view \$viehicle here.
        return true;
    }

    public function update(User \$user, ".$phpNameTbl." \$".$nameTbl.")
    {
        // Update \$user authorization to view \$viehicle here.
        return true;
    }

    public function delete(User \$user, ".$phpNameTbl." \$".$nameTbl.")
    {
        // Update \$user authorization to view \$viehicle here.
        return true;
    }
}";

$archivo = fopen('app/Policies/'.$phpNameTbl."Policy.php", "w") or die("Unable to open file!");
fwrite($archivo, $policiesCode);
fclose($archivo);

//Testing

$unitTestingCode = "";
$unitTestingCode .=
"<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class ".$phpNameTbl."UnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_".$phpNameTbl."()
    {
//CREATE
        \$faker = Faker\Factory::create();
        \$trncnn = TransactionHandler::begin();

        \$data = [\n";
for ($i=0;$i<count($camposName);$i++) {
    if($i!=$primaryPos){ // Evitar la llave primaria autoincrementable
        $unitTestingCode.="\t\t\t'".$camposName[$i]."' => \$faker->";
        switch($campoType[$i]) {
            case 'SMALLINT':
            case 'BIGINT':
            case 'INTEGER':
                $unitTestingCode .= "numberBetween(0, ".str_pad("9",$campoSize[$i],"9").")";
                break;
            case 'DOUBLE':
                $unitTestingCode .= "randomFloat()";
                break;
            case 'CLOB':
            case 'LONGVARCHAR':
            case 'VARCHAR':
                $unitTestingCode .= "text(".$campoSize[$i].")";
                break;
            case 'CHAR':
                $unitTestingCode .= "text(".$campoSize[$i].")";
                break;
            case 'DATE':
            case 'TIMESTAMP':
                $unitTestingCode .= "iso8601()";
                break;
            case 'BOOLEAN':
                $unitTestingCode .= "boolean()";
                break;
        }
        $unitTestingCode .= ",\n";
    }
}
$unitTestingCode.=
    "\t\t];
        \$result = \\".$phpNameTbl."::crt".$sixletters."(\$data, \$trncnn);
        self::assertInstanceOf(\\".$phpNameTbl."::class, \$result);\n";
for ($i=0;$i<count($camposName);$i++) {
    if($i!=$primaryPos){
        if($campoType[$i] == "TIMESTAMP") {
            $unitTestingCode .=
                "       try {\n";
            $unitTestingCode .= "\t\t\tself::assertEquals(\$data['" . $camposName[$i] . "'], \$result->get" . $camposPhpName[$i];
            $unitTestingCode .= "(DATE_ISO8601), 'Valor inserción no concuerda en ".$camposName[$i]."');\n";
            $unitTestingCode .=
"       } catch(PropelException \$e) {
            Log::debug(\$e);
            self::assertTrue(false, 'Formato inserción no concuerda: ".$camposName[$i]."');
       }\n";
        }
        else {
            $unitTestingCode .= "\t\tself::assertEquals(\$data['".$camposName[$i]."'], \$result->get".$camposPhpName[$i];
            $unitTestingCode .= "(), 'Valor inserción no concuerda en ".$camposName[$i]."');\n";
        }
    }
}
$unitTestingCode.=
"
// UPDATE
        \$update = [\n";
for ($i=0;$i<count($camposName);$i++){
    if($i!=$primaryPos){ // Evitar la llave primaria autoincrementable
        if($camposNulos[$i] == 'NO') {
            $unitTestingCode.="\t\t\t'".$camposName[$i]."' => \$faker->";
            switch ($campoType[$i]) {
                case 'SMALLINT':
                case 'BIGINT':
                case 'INTEGER':
                    $unitTestingCode .= "numberBetween(0, " . str_pad("9", $campoSize[$i], "9") . ")";
                    break;
                case 'DOUBLE':
                    $unitTestingCode .= "randomFloat()";
                    break;
                case 'CLOB':
                case 'LONGVARCHAR':
                case 'VARCHAR':
                    $unitTestingCode .= "text(" . $campoSize[$i] . ")";
                    break;
                case 'CHAR':
                    $unitTestingCode .= "text(" . $campoSize[$i] . ")";
                    break;
                case 'DATE':
                case 'TIMESTAMP':
                    $unitTestingCode .= "iso8601()";
                    break;
                case 'BOOLEAN':
                    $unitTestingCode .= "boolean()";
                    break;
            }
        } else {
            $unitTestingCode.="\t\t\t'".$camposName[$i]."' => null";
        }
        $unitTestingCode .= ",\n";
    } else {
        $unitTestingCode.="\t\t\t'".$camposName[$i]."' => \$result->get".$camposPhpName[$i]."(),\n";
    }
}
$unitTestingCode.=
        "\t\t];
        \$updated = \\".$phpNameTbl."::upd".$sixletters."(\$update, \$trncnn);
        self::assertInstanceOf(\\".$phpNameTbl."::class, \$updated);\n";
for ($i=0;$i<count($camposName);$i++) {
    $updatedVal = "\$update['" . $camposName[$i] . "']";
    if($camposNulos[$i] == 'YES') $updatedVal = 'null';
    if($i!=$primaryPos){
        if($campoType[$i] == "TIMESTAMP") {
            $unitTestingCode .=
                "\t\ttry {\n";
            $unitTestingCode .= "\t\t\tself::assertEquals(".$updatedVal.", \$updated->get" . $camposPhpName[$i];
            $unitTestingCode .= "(DATE_ISO8601), 'Valor actualización no concuerda en ".$camposName[$i]."');\n";
            $unitTestingCode .=
                "\t\t} catch(PropelException \$e) {
            Log::debug(\$e);
            self::assertTrue(false, 'Formato actualización no concuerda: ".$camposName[$i]."');
        }\n";
        }
        else {
            $unitTestingCode .= "\t\tself::assertEquals(".$updatedVal.", \$updated->get".$camposPhpName[$i];
            $unitTestingCode .= "(), 'Valor actualización no concuerda en ".$camposName[$i]."');\n";
        }
    } else {
        $unitTestingCode.="\t\tself::assertEquals(\$result->get".$camposPhpName[$i]."(),"."\$updated->get".$camposPhpName[$i]."(), 'Llaves actualización no concuerdan');\n";
    }
}

$unitTestingCode.=
"
//DISPLAY ONE CVE\n";

$unitTestingCode.="\t\t\$found = \\".$phpNameTbl."::fno".$sixletters."(\$updated->get".$camposPhpName[$primaryPos]."(),\$trncnn);
\t\tself::assertInstanceOf(\\".$phpNameTbl."::class, \$found);\n";
    for ($i=0;$i<count($camposName);$i++) {
        if($i!=$primaryPos){
            if($campoType[$i] == "TIMESTAMP") {
                $unitTestingCode .=
                    "\t\ttry {\n";
                $unitTestingCode .= "\t\t\tself::assertEquals(\$update['" . $camposName[$i] . "'], \$found->get" . $camposPhpName[$i];
                $unitTestingCode .= "(DATE_ISO8601), 'Valor búsqueda no concuerda en ".$camposName[$i]."');\n";
                $unitTestingCode .=
                    "\t\t} catch(PropelException \$e) {
            Log::debug(\$e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: ".$camposName[$i]."');
        }\n";
            }
            else {
                $unitTestingCode .= "\t\tself::assertEquals(\$update['".$camposName[$i]."'], \$found->get".$camposPhpName[$i];
                $unitTestingCode .= "(), 'Valor búsqueda no concuerda en ".$camposName[$i]."');\n";
            }
        } else {
            $unitTestingCode.="\t\tself::assertEquals(\$result->get".$camposPhpName[$i]."(),"."\$found->get".$camposPhpName[$i]."(), 'Llaves búsqueda no concuerdan');\n";
        }
    }
$unitTestingCode.=
"
//DISPLAY ONE UUID\n";

$unitTestingCode.="\t\t\$foundU = \\".$phpNameTbl."::fnu".$sixletters."(\$updated->getUuid(),\$trncnn);
\t\tself::assertInstanceOf(\\".$phpNameTbl."::class, \$foundU);\n";
    for ($i=0;$i<count($camposName);$i++) {
        if($i!=$primaryPos){
            if($campoType[$i] == "TIMESTAMP") {
                $unitTestingCode .=
                    "\t\ttry {\n";
                $unitTestingCode .= "\t\t\tself::assertEquals(\$update['" . $camposName[$i] . "'], \$foundU->get" . $camposPhpName[$i];
                $unitTestingCode .= "(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en ".$camposName[$i]."');\n";
                $unitTestingCode .=
                    "\t\t} catch(PropelException \$e) {
            Log::debug(\$e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: ".$camposName[$i]."');
        }\n";
            }
            else {
                $unitTestingCode .= "\t\tself::assertEquals(\$update['".$camposName[$i]."'], \$foundU->get".$camposPhpName[$i];
                $unitTestingCode .= "(), 'Valor búsqueda uuid no concuerda en ".$camposName[$i]."');\n";
            }
        } else {
            $unitTestingCode.="\t\tself::assertEquals(\$result->get".$camposPhpName[$i]."(),"."\$foundU->get".$camposPhpName[$i]."(), 'Llaves búsqueda uuid no concuerdan');\n";
        }
    }

$unitTestingCode.=
        "
//DISPLAY ALL\n";

    $unitTestingCode.="\t\t\$all = \\".$phpNameTbl."::dsp".$sixletters."(\$trncnn);\n".
    "\t\tself::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, \$all);\n".
    "\t\tself::assertTrue(\$all->count() > 0);\n";

$unitTestingCode.=
        "
//REMOVE ONE\n".
    "\t\t\$destroyed = \\".$phpNameTbl."::rmv".$sixletters."(\$result->get".$camposName[$primaryPos]."(),\$trncnn);\n".
    "\t\tself::assertTrue(\$destroyed);\n";

$unitTestingCode.=
"        TransactionHandler::rollback(\$trncnn);
    }
}";

if(!file_exists('tests/Unit/Models'))
    mkdir('tests/Unit/Models');

$archivo = fopen('tests/Unit/Models/'.$phpNameTbl."Test.php", "w") or die("Unable to open file!");
fwrite($archivo, $unitTestingCode);
fclose($archivo);

$controllerTestingCode = "";
$controllerTestingCode.=
    "<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class ".$phpNameTbl."FeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_".$phpNameTbl."() {\n
    //CREATE
        \$faker = Faker\Factory::create();
        \$trncnn = TransactionHandler::begin();

        \$data = [\n";
    for ($i=0;$i<count($camposName);$i++) {
        if($i!=$primaryPos){ // Evitar la llave primaria autoincrementable
            if($camposPhpName[$i] == 'Uuid'){
                $controllerTestingCode .= "\t\t\t'".$camposPhpName[$i]."' => \$faker->uuid,\n";
                continue;
            }
            $controllerTestingCode.="\t\t\t'".$camposComments[$i]."' => \$faker->";
            switch($campoType[$i]) {
                case 'SMALLINT':
                case 'BIGINT':
                case 'INTEGER':
                    $controllerTestingCode .= "numberBetween(0, ".str_pad("9",$campoSize[$i],"9").")";
                    break;
                case 'DOUBLE':
                    $controllerTestingCode .= "randomFloat()";
                    break;
                case 'CLOB':
                case 'LONGVARCHAR':
                case 'VARCHAR':
                    $controllerTestingCode .= "text(".$campoSize[$i].")";
                    break;
                case 'CHAR':
                    $controllerTestingCode .= "text(".$campoSize[$i].")";
                    break;
                case 'DATE':
                case 'TIMESTAMP':
                    $controllerTestingCode .= "iso8601()";
                    break;
                case 'BOOLEAN':
                    $controllerTestingCode .= "boolean()";
                    break;
            }
            $controllerTestingCode .= ",\n";
        }
    }
    $controllerTestingCode.="\t\t];
\t\t\$this
\t\t\t->post(route('".$phpNameTbl.".submit'), \$data)\n".
"\t\t\t->assertStatus(200)\n".
"\t\t\t->assertSee('\"success\":true');\n";

    $controllerTestingCode.=
        "
// UPDATE
        \$update = [\n";
    for ($i=0;$i<count($camposName);$i++){
        if($camposPhpName[$i] == 'Uuid'){
            $controllerTestingCode .= "\t\t\t'".$camposPhpName[$i]."' => \$data['Uuid'],\n";
            continue;
        }
        if($i!=$primaryPos){ // Evitar la llave primaria autoincrementable
            if($camposNulos[$i] == 'NO') {
                $controllerTestingCode.="\t\t\t'".$camposComments[$i]."' => \$faker->";
                switch ($campoType[$i]) {
                    case 'SMALLINT':
                    case 'BIGINT':
                    case 'INTEGER':
                    $controllerTestingCode .= "numberBetween(0, " . str_pad("9", $campoSize[$i], "9") . ")";
                        break;
                    case 'DOUBLE':
                        $controllerTestingCode .= "randomFloat()";
                        break;
                    case 'CLOB':
                    case 'LONGVARCHAR':
                    case 'VARCHAR':
                    $controllerTestingCode .= "text(" . $campoSize[$i] . ")";
                        break;
                    case 'CHAR':
                        $controllerTestingCode .= "text(" . $campoSize[$i] . ")";
                        break;
                    case 'DATE':
                    case 'TIMESTAMP':
                    $controllerTestingCode .= "iso8601()";
                        break;
                    case 'BOOLEAN':
                        $controllerTestingCode .= "boolean()";
                        break;
                }
            } else {
                $controllerTestingCode.="\t\t\t'".$camposName[$i]."' => null";
            }
            $controllerTestingCode .= ",\n";
        }
    }
    $controllerTestingCode.=
        "\t\t];
\t\t\$this
\t\t\t->post(route('".$phpNameTbl.".modify'), \$update)\n".
"\t\t\t->assertStatus(200)\n".
"\t\t\t->assertSee('\"success\":true');\n\n";

    $controllerTestingCode.="\n\n//DELETE
\t\t\$this
\t\t\t->post(route('".$phpNameTbl.".remove'), \$update)\n".
        "\t\t\t->assertStatus(200)\n".
        "\t\t\t->assertSee('\"success\":true');\n";

    $controllerTestingCode .=
"\t}
}";

if(!file_exists('tests/Feature/Controllers'))
    mkdir('tests/Feature/Controllers');

$archivo = fopen('tests/Feature/Controllers/'.$phpNameTbl."ControllerTest.php", "w") or die("Unable to open file!");
fwrite($archivo, $controllerTestingCode);
fclose($archivo);



// Vistas
@mkdir("resources/views/app/".$phpNameTbl);
$mainViewCode =
"@extends('layouts.app')

@section('content')
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-3\">
                <b-card
                    title=\"Filtros ".$phpNameTbl."\"
                    class=\"mb-2\"
                >
                    {{--<!--@include('app.".$phpNameTbl.".filter')--}}
                </b-card>
            </div>
            <div class=\"col-md-9\">
                <b-card
                    title=\"Tabla ".$phpNameTbl."\"
                    class=\"mb-2\"
                >
                    @include('app.".$phpNameTbl.".table')
                </b-card>
            </div>
        </div>
    </div>
@endsection";

@mkdir('resources/views/app');
@mkdir('resources/views/app/'.$phpNameTbl);
$archivo = fopen('resources/views/app/'.$phpNameTbl."/main.blade.php", "w") or die("Unable to open file!");
fwrite($archivo, $mainViewCode);
fclose($archivo);

$tableViewCode =
"<b-table :items=\"items\" :fields=\"fields\" striped responsive=\"sm\">
    <template v-slot:cell(acciones)=\"row\">
        <b-button size=\"sm\" @click=\"onModify\" class=\"mr-2\">
            Modificar
        </b-button>
        <b-button size=\"sm\" @click=\"onRemove\" class=\"mr-2\" variant=\"danger\">
            Borrar
        </b-button>
    </template>
</b-table>

@push('scripts')
    <script type=\"module\">
        let mixDataTable = {
            data() {
                return {
                    fields: ['first_name', 'acciones'],
                    items: [
                        {first_name: 'Dickerson'},
                        {first_name: 'Larsen'}
                    ]
                }
            },
        };

        window.pageMix.push(mixDataTable);
    </script>

@endpush
";

$archivo = fopen('resources/views/app/'.$phpNameTbl."/table.blade.php", "w") or die("Unable to open file!");
fwrite($archivo, $tableViewCode);
fclose($archivo);

echo $phpNameTbl.PHP_EOL;
// END MAIN
}

//Rutas
$codeRoutes =
"<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the \"web\" middleware group. Now create something great!
|
*/

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function () {
    return view('welcome');
});

";

$tbls = $schemaTmp->xpath("//table");
foreach ($tbls as $key => $table) {
    $nameTbl = $table->attributes()['name']->__toString();
    if($nameTbl == 'migrations' || $nameTbl == 'password_resets' || $nameTbl == 'failed_jobs') continue;
    $phpNameTbl = strtoupper(substr($nameTbl,0,1)).substr($nameTbl,1, strlen($nameTbl));
    $codeRoutes .= //Todo: CAMBIAR EL NOMBRE PHP POR NOMBRE NATURAL DE LA TABLA
"//".$phpNameTbl." Route
Route::get('/".$phpNameTbl."', '".$phpNameTbl."Controller@index')->name('".$phpNameTbl.".main');
Route::post('/".$phpNameTbl."/fetch', '".$phpNameTbl."Controller@loadtable')->name('".$phpNameTbl.".fetch');
Route::post('/".$phpNameTbl."/submit', '".$phpNameTbl."Controller@create')->name('".$phpNameTbl.".submit');
Route::post('/".$phpNameTbl."/modify', '".$phpNameTbl."Controller@update')->name('".$phpNameTbl.".modify');
Route::post('/".$phpNameTbl."/remove', '".$phpNameTbl."Controller@destroy')->name('".$phpNameTbl.".remove');

";
    //Route::group(['prefix' => '".$nameTbl."', 'middleware' => 'App\Http\Middleware\PermissionsMiddleware'], function() {
    //});
}
$codeRoutes .=
"//TODO *CRUD Generator control separator line* (Don't remove this line!)

";
//print_r($codeRoutes);
$archivo = fopen('routes/web.php', "w") or die("Unable to open file!");
fwrite($archivo, $codeRoutes);
fclose($archivo);
