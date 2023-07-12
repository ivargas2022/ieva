<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

   public function htmlLoad() {
        $css = [
             ['href' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/fontawesome-free/css/all.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/jqvmap/jqvmap.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/dist/css/adminlte.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/daterangepicker/daterangepicker.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/summernote/summernote-bs4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['href' => '/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/daterangepicker/daterangepicker.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/select2/css/select2.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/bs-stepper/css/bs-stepper.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/dropzone/min/dropzone.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
			 ['href' => '/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
             'rel' => 'stylesheet',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
         ];
 
         $js = [
             ['src' => '/assets/plugins/jquery/jquery.min.js',
             'integrity' => '',
             'crossorigin' => 'anonymous'],
             ['src' => '/assets/plugins/jquery-ui/jquery-ui.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/chart.js/Chart.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/sparklines/sparkline.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/jqvmap/jquery.vmap.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/jqvmap/maps/jquery.vmap.usa.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/jquery-knob/jquery.knob.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/moment/moment.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/daterangepicker/daterangepicker.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/summernote/summernote-bs4.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/dist/js/adminlte.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/dist/js/demo.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/dist/js/pages/dashboard.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables/jquery.dataTables.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/jszip/jszip.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/pdfmake/pdfmake.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/pdfmake/vfs_fonts.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-buttons/js/buttons.html5.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-buttons/js/buttons.print.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
              ['src' => '/assets/plugins/datatables-buttons/js/buttons.colVis.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/select2/js/select2.full.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/inputmask/jquery.inputmask.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/daterangepicker/daterangepicker.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/bs-stepper/js/bs-stepper.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/dropzone/min/dropzone.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			 ['src' => '/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
			  ['src' => '/assets/plugins/select2/js/select2.full.min.js',
              'integrity' => '',
              'crossorigin' => 'anonymous'],
         ];
 
 
         return $data=[
             'css'=> $css, // Capitalize the first letter
             'js'=>$js,
         ]; 
     }



}
