<?php
/*
 * This file is part of Caviar.
 *
 * (c) 2014 Christoffer Niska
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace crisu83\yii_caviar\generators;

use crisu83\yii_caviar\Exception;
use crisu83\yii_caviar\File;

abstract class Generator extends \CModel
{
    // constants
    const COMPONENT = 'component';
    const CONFIG = 'config';
    const CONTROLLER = 'controller';
    const CRUD = 'crud';
    const LAYOUT = 'layout';
    const MODEL = 'model';
    const VIEW = 'view';
    const WEBAPP = 'webapp';

    /**
     * @var string name for the item that will be generated.
     */
    public $subject;

    /**
     * @var string name of this generator.
     */
    protected $name = 'base';

    /**
     * @var string short description of what this generator does.
     */
    protected $description = 'Abstract base class for code generation.';

    /**
     * @var string name of the application in which the item will generated.
     */
    protected $context = 'app';

    /**
     * @var array generator configurations.
     */
    protected static $generators = array();

    /**
     * @var array available templates.
     */
    protected static $templates = array();

    /**
     * @var string base path for all generated files.
     */
    protected static $basePath;

    /**
     * Generates all necessary files.
     *
     * @return File[] list of files to generate.
     */
    abstract public function generate();

    /**
     * Initializes this generator.
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        // todo: add the rest of the rules, including those in other generators.
        return array(
            array('subject', 'required'),
            array('description, context', 'safe'),
        );
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return array(
            'subject' => "Name for the item that will be generated.",
        );
    }

    /**
     * @inheritDoc
     */
    public function attributeNames()
    {
        $names = array();

        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $names[] = $property->name;
        }

        return $names;
    }

    /**
     * Displays the help for this generator.
     */
    public function renderHelp()
    {
        echo strtoupper("\n{$this->name} generator\n");
        echo "  $this->description\n";

        echo "\nUsage:";
        echo "\n  generator [context:]subject [--option=value ...]\n";

        $attributes = $this->attributeNames();
        $labels = $this->attributeLabels();

        echo "\nOptions:";
        foreach ($attributes as $name) {
            $offset = $this->calculateHelpLabelOffset($name);
            echo "\n  " . $name . str_repeat(' ', $offset) . (isset($labels[$name]) ? $labels[$name] : '');
        }
        echo "\n\n";
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Creates a new generator.
     *
     * @param string $name name of the generator.
     * @param array $config generator configuration.
     * @return Generator the created generator.
     * @throws \crisu83\yii_caviar\Exception if the generator is not found.
     */
    public static function create($name, array $config = array())
    {
        if (!isset(self::$generators[$name])) {
            throw new Exception("Unknown generator '$name'.");
        }

        $generator = \Yii::createComponent(\CMap::mergeArray(self::$generators[$name], $config));
        $generator->init();

        return $generator;
    }

    /**
     * Creates a generator and renders its help.
     *
     * @param string $name name of the generator.
     */
    public static function help($name)
    {
        self::create($name)->renderHelp();
    }

    /**
     * Creates and runs a specific generator.
     *
     * @param string $name name of the generator.
     * @param array $config generator configuration.
     * @return \crisu83\yii_caviar\File[] list of files to generate.
     * @throws \crisu83\yii_caviar\Exception if the generator validation fails.
     */
    public static function run($name, array $config = array())
    {
        $generator = self::create($name, $config);

        // todo: is this the best place to run validation logic
        if (!$generator->validate()) {
            throw new Exception("Generator validation failed.");
        }

        return $generator->generate();
    }

    /**
     * Calculates the offset between the label and the description in the help output.
     *
     * @param string $label label text.
     * @return int offset.
     */
    public static function calculateHelpLabelOffset($label)
    {
        return ($len = 20 - strlen($label)) > 0 ? $len : 0;
    }

    /**
     * @param array $generators
     */
    public static function setGenerators($generators)
    {
        self::$generators = $generators;
    }

    /**
     * @param array $templates
     */
    public static function setTemplates($templates)
    {
        self::$templates = $templates;
    }

    /**
     * @param string $basePath
     */
    public static function setBasePath($basePath)
    {
        self::$basePath = $basePath;
    }
}