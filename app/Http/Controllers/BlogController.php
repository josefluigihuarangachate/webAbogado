<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
// Agregar 
use Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View; // Nuevo
use Illuminate\Support\Facades\File; // Nuevo

include 'tools/string.php';
include 'tools/table.php';
include 'tools/function.php'; // Si funciona
include 'tools/json.php'; // Si funciona
// Fin Agregar

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogView($nameFolder, $namePage, $value) {
        return view('pages/' . $nameFolder . '/' . $namePage, ['val' => $value]);
    }

    public function getFolders(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $data = DB::table(table('pagina'))
                ->select('*')
                ->get();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function saveNameFolder(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $nameFolder = htmlspecialchars(trim($request->input('nameFolder')));
        $rutaFolder = htmlspecialchars(trim($request->input('ruta')));

        session(['nameFolder' => $nameFolder]);

        // SELECCIONO LA RUTA POR EL NOMBRE DE CARPETA
        //$data = DB::table(table('pagina'))
        //        ->select('ruta')
        //        ->where('carpeta', '=', $nameFolder)
        //        ->first();
        //$data = objectToArray($data);
        //if ($data) {
        session(['linkBlog' => $rutaFolder . 'yes']);
        //} else {
        //    session(['linkBlog' => '']);
        //}
    }

    public function verDemo(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(intval(trim($request->input('idFolder'))));

        $data = DB::table(table('pagina'))
                ->select('ruta')
                ->where('id', '=', $id)
                ->first();
        $data = objectToArray($data);

        if ($data) {
            $json = json('ok', strings('success_login'), '');
            $json['html'] = @$data['ruta'];
        } else {
            $json = json('error', strings('error_login'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $data = DB::table(table('pagina'))
                ->select('*')
                ->get();

        if ($data) {
            $json = json('ok', strings('success_login'), $data);
        } else {
            $json = json('error', strings('error_login'), '');
        }
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        // CREAR CARPETA EN views
        // https://stackoverflow.com/a/62811930
        // scandir a la carpeta resources\views\pages
        //$ficheros1 = scandir('.\\pages\\');
        //print_r($ficheros1);
        //die();

        $folder = htmlspecialchars(ucwords(trim($request->input('folder'))));
        $folderTemp = $folder;
        $max = htmlspecialchars(intval(trim($request->input('max')))); // CANTIDAD
        $status = 'Error';

        $html = "";
        $nameFilesUpload = ""; // sirve para concatenar los nombres de los archivos que se subieron
        // dd($request->all());
        // VERIFICO SI EXISTE LA CARPETA

        if (!is_dir(FOLDER_PAGES . $folder)) {

            // CREO LA CARPETA
            mkdir(FOLDER_PAGES . $folder, 0777, true);

            // EXTENSIONES - OBTENER ICONO
            $ext = array(
                'asf' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'avi' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'mp4' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'mov' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'mpeg' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'mpg' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'wmv' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'm4v' => '<i class="fas fa-file-video" style="color: #e04a3a;"></i>',
                'mp3' => '<i class="fas fa-file-audio" style="color: #1083cc;"></i>',
                'wav' => '<i class="fas fa-file-audio" style="color: #1083cc;"></i>',
                'wma' => '<i class="fas fa-file-audio" style="color: #1083cc;"></i>',
                'ogg' => '<i class="fas fa-file-audio" style="color: #1083cc;"></i>',
                'docx' => '<i class="fas fa-file-word" style="color: #2a5492;"></i>',
                'csv' => '<i class="fas fa-file-csv" style="color: #16aa59;"></i>',
                'pdf' => '<i class="fas fa-file-pdf" style="color: #f72015;"></i>',
                'xlsx' => '<i class="fas fa-file-excel" style="color: #007938;"></i>',
                'ppt' => '<i class="fas fa-file-powerpoint" style="color: #cb4424;"></i>',
                'pptx' => '<i class="fas fa-file-powerpoint" style="color: #cb4424;"></i>',
                'png' => '<i class="fas fa-file-image" style="color: #4167c3;"></i>',
                'jpg' => '<i class="fas fa-file-image" style="color: #4167c3;"></i>',
                'jpeg' => '<i class="fas fa-file-image" style="color: #4167c3;"></i>',
                'gif' => '<i class="fas fa-file-image" style="color: #4167c3;"></i>',
                'txt' => '<i class="fas fa-file-alt" style="color: #c2dce5;"></i>',
                'zip' => '<i class="fas fa-file-archive" style="color: #48aadc;"></i>',
                'rar' => '<i class="fas fa-file-archive" style="color: #9743a9;"></i>',
                'otro' => '<i class="fas fa-file-upload" style="color: #e39706;"></i>',
            );


            $head = '<meta name="viewport" content="width=device-width, user-scalable=no">';
            $head .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">' . PHP_EOL;
            $head .= '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">' . PHP_EOL;
            $head .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">' . PHP_EOL;
            $head .= '<style>
                        .colorFont{
                          color: #ffffff !important;
                        }
                        .testimonial-group > .row {
                          display: block;
                          overflow-x: auto;
                          white-space: nowrap;
                        }
                        .testimonial-group > .row > .col-4 {
                          display: inline-block;
                        }

                        .col-4 { color: #fff; font-size: 48px; padding-bottom: 20px; padding-top: 18px; }
                        .col-4:nth-child(3n+1) { background: #c69; }
                        .col-4:nth-child(3n+2) { background: #9c6; }
                        .col-4:nth-child(3n+3) { background: #69c; }
                      </style>' . PHP_EOL;

            $head .= '<style>body{ background-color: #282828 !important; } .btn{ width: 100% !important; capitalize: uppercase !important; }</style>' . PHP_EOL;
            $head .= '<style>
                        .row-cols-2{                        
                        text-align:center !important;
                        }

                        .row-cols-2 .col{
                        padding: 26px !important;
                        border: 0.1em solid #0a0a0a !important;
						background-color: #191919 !important;
                        }

                        .row-cols-2 .col img{
                        width: 100px !important;
                        border-radius: 50px !important;
                        margin-bottom: 10px !important;

                        }

                        .row-cols-2 .col label{
                        color: #fff !important;
                        padding: 10px;
                        }

                        .btn-outline-warning{
                        background-color: transparent !important;
                        border: 2px solid #e39706 !important;
                        color: #e39706 !important;
                        border-radius: 50px !important;
                        }
                      </style>' . PHP_EOL;

            $head .= '<br>
                      <div class="container">
                              <button class="btn btn-danger" onclick="goBack();" style="width: 50px !important;float: right;">
                                      <i class="fas fa-chevron-left"></i>
                              </button>
                      </div>
                      <br>' . PHP_EOL;

            $script = '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>' . PHP_EOL;
            $script .= '<script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>' . PHP_EOL;



            // ESTADO PARA EL ALERT
            $status = 'Ok';

            for ($i = 0; $i <= $max; $i++) {
                @$namepage = @htmlspecialchars(strtolower(trim(@$request->input('namepage' . $i))));
                @$titulo = @htmlspecialchars(ucwords(trim(@$request->input('title' . $i))));
                @$subtitle = @htmlspecialchars(ucwords(trim(@$request->input('subtitle' . $i))));
                @$describe = @htmlspecialchars(trim(@$request->input('descripcion' . $i)));
                @$links = @$request->input('link' . $i); // ARRAY DE LINKS - RECORRER CON FOR
                @$linktitle = @$request->input('linktitle' . $i); // ARRAY DE TITLE LINKS - RECORRER CON FOR
                @$files = @$request->file('image' . $i); // ARRAY DE IMAGES, ARCHIVOS,DOCUMENTOS.ETC - RECORRER CON FOR

                if (
                        !empty(@$namepage)
                ) {

                    $html .= '<div class="container">' . PHP_EOL;

                    // SI HAY UN TITULO
                    if (!empty(@$titulo)) {
                        $html .= '<br>' . PHP_EOL;
                        $html .= '<h1 class="colorFont"><center>' . ucwords(@$titulo) . '</center></h1>' . PHP_EOL;
                    }

                    // SI HAY UN SUBTITULO LO INGRESO
                    if (!empty(@$subtitle)) {
                        $html .= '<br>' . PHP_EOL;
                        $html .= '<small class="colorFont"><center>' . ucwords(@$subtitle) . '</center></small>' . PHP_EOL;
                    }
                    $html .= '<br>' . PHP_EOL;

                    // DESCRIPCION
                    if (!empty(@$describe)) {
                        $html .= '<p class="colorFont">' . PHP_EOL;
                        $html .= @$describe . PHP_EOL;
                        $html .= '</p>' . PHP_EOL;
                    }

                    // PARA LOS ARCHIVOS QUE SUBE
                    if (!empty(@$files)) {

                        $html .= '@if (@$val == "yes")' . PHP_EOL;
                        $html .= '<div class="container testimonial-group">' . PHP_EOL;
                        $html .= '<div class="row text-center">' . PHP_EOL;

                        foreach (@$files as $file) {
                            $name = session('id') . time() . '.' . @$file->extension();
                            $nameFilesUpload .= $name . " ";
                            $nameFile = @$file->getClientOriginalName(); // SIRVE PARA SABER EL NOMBRE DEL ARCHIVO AL SUBIRLO

                            $icon = @$ext[$file->extension()];
                            if (empty($icon)) {
                                $icon = @$ext['otro'];
                            }

                            @$file->move(FOLDER_FILES_BLOG, $name);
                            $html .= '<div class="col-4">' . PHP_EOL;
                            $html .= '<div style="width: 100%; padding: 8px;"></div>' . PHP_EOL;
                            $html .= '<a href="' . FOLDER_FILES_BLOG . $name . '" class="colorFont" download>' . PHP_EOL;
                            $html .= $icon . PHP_EOL;
                            $html .= '</a>' . PHP_EOL;
                            $html .= '<div style="width: 100%; padding: 5px;"></div>' . PHP_EOL;
                            $html .= "<center><label style='font-size: 10px;width: 100%;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;'>" . @$nameFile . "</label></center>" . PHP_EOL;
                            $html .= '</div>' . PHP_EOL;
                        }
                        $html .= '</div>' . PHP_EOL;
                        $html .= '</div>' . PHP_EOL;

                        $html .= '@endif' . PHP_EOL;
                    }

                    // PARA LOS LINKS
                    if (!empty(@$links)) {
                        // FALTA PONER UN NOMBRE PARA EL LINK
                        $html .= '<br>' . PHP_EOL;
                        $html .= '<div class="row row-cols-2">' . PHP_EOL;
                        for ($l = 0; $l < count(@$links); $l++) {
                            $html .= '<div class="col">' . PHP_EOL;
                            $html .= '<img src="https://thumbs.dreamstime.com/b/icono-de-documento-los-varios-archivos-logo-design-element-122728126.jpg">';
                            $html .= '<br>' . PHP_EOL;
                            $html .= '<label>' . @$linktitle[$l] . '</label>' . PHP_EOL;
                            $html .= '<br>' . PHP_EOL;

                            $varLink = "/blogView/" . $folder . '/' . @$links[$l] . '/<?php echo strtolower($val); ?>';

                            if (find_word_in_string(@$links[$l], "#")) {
                                $varLink = "#" . @$links[$l];
                            }

                            $html .= '<a href="' . $varLink . '" class="btn btn-outline-warning">Ver Información</a>' . PHP_EOL;
                            $html .= '</div>' . PHP_EOL;
                            continue;
                        }
                        $html .= '</div>' . PHP_EOL;
                    }

                    $html .= '</div>' . PHP_EOL;

                    $myfile = fopen(FOLDER_PAGES . $folderTemp . "/" . @$namepage . ".blade.php", "w");
                    fwrite($myfile, $head);
                    fwrite($myfile, $html);
                    fwrite($myfile, $script);
                    fclose($myfile);

                    // LIMPIO EL HTML
                    $html = "";
                }
                continue;
            }
        }

        try {
            // Registro los datos
            $id = DB::table(table('pagina'))->insertGetId(
                    [
                        'carpeta' => $folderTemp,
                        'ruta' => '/blogView/' . $folder . '/index/',
                        'all_files' => trim($nameFilesUpload),
                        'estado' => 'activo'
                    ]
            );

            if ($id) {
                $status = 'Ok';
            } else {
                $status = 'Error';
            }
        } catch (Exception $e) {
            // $e->getMessage()
            $status = 'Error';
        }

        return view::make('admin.nuevapublicacion', ['status' => $status, 'folder' => FOLDER_PAGES]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(intval(trim($request->input('idFolder'))));
        $carpeta = htmlspecialchars(trim($request->input('nameFolder')));

        $files = DB::table(table('pagina'))
                ->select('all_files')
                ->first();
        $files = objectToArray($files);

        try {
            $affected = DB::table(table('pagina'))->where('id', '=', $id)->delete();
            if ($affected) {
                delete_files(FOLDER_PAGES . $carpeta); // SIRVE PARA ELIMIANR LA CARPETA CON SUS ARCHIVOS

                if (@$files['all_files']) {
                    @$files = explode(" ", @$files['all_files']);

                    for ($fd = 0; $fd < count(@$files); $fd++) {
                        @unlink(FOLDER_FILES_BLOG . @$files[@$fd]);
                    }
                }
                $json = json('ok', strings('success_delete'), '');
            } else {
                $json = json('ok', strings('error_delete'), '');
            }
        } catch (Throwable $t) {
            $json = json('ok', strings('error_delete'), '');
        }
        //}

        return jsonPrint($json, $cmd);
    }

}
