<?php
namespace Lorenum\Ionian\Factories;

use Lorenum\Ionian\Request\Request;
use Lorenum\Ionian\Response\ResponseInterface;

/**
 * Class ControllerFactory
 * This class is responsible for creating a controller and injecting all its dependencies before handing it back as an
 * instance to operate on.
 * In this class you might add a base namespace that ALL instantiated controllers have to be contained within.
 *
 * @package Lorenum\Ionian\Factories
 */
class ControllerFactory extends Factory{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @param string $namespace the namespace will be defaulted to \Project\Controllers if you do not specify otherwise
     */
    function __construct($namespace = "\\Project\\Controllers\\"){
        parent::__construct($namespace);
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request) {
        $this->request = $request;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response) {
        $this->response = $response;
    }

    /**
     * @return ModelFactory
     */
    public function getModelFactory() {
        return $this->modelFactory;
    }

    /**
     * @param ModelFactory $modelFactory
     */
    public function setModelFactory(ModelFactory $modelFactory) {
        $this->modelFactory = $modelFactory;
    }

    /**
     * Get an instance of the desired class if it exists.
     * Action is an optional parameter that returns a class instance if both the class AND the action exists within
     *
     * @param $class
     * @param null $action
     * @return false|mixed False if the class is not found or is not a subclass of Lorenum\Ionian\Core\Controller
     */
    public function get($class, $action = null){
        $controller = parent::get($class, $action);
        if($controller !== false){

            if(!is_subclass_of($controller, "\\Lorenum\\Ionian\\Core\\Controller"))
                return false;

            $controller->setRequest($this->getRequest());
            $controller->setModels($this->getModelFactory());
            $controller->setResponse($this->getResponse());
        }

        return $controller;
    }
}