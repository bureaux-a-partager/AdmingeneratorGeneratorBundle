<?php

namespace Admingenerator\GeneratorBundle\DependencyInjection;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ModelType;

/**
 * This class contains the configuration information for the bundle
 *
 * @author clombardot
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('admingenerator_generator');

        $rootNode
            ->children()
            ->booleanNode('use_doctrine_orm')->defaultFalse()->end()
            ->booleanNode('use_doctrine_odm')->defaultFalse()->end()
            ->booleanNode('use_propel')->defaultFalse()->end()
            ->booleanNode('overwrite_if_exists')->defaultFalse()->end()
            ->scalarNode('base_admin_template')
            ->defaultValue("AdmingeneratorGeneratorBundle::base_admin.html.twig")
            ->end()
            ->scalarNode('dashboard_welcome_path')->defaultNull()->end()
            ->scalarNode('login_path')->defaultNull()->end()
            ->scalarNode('logout_path')->defaultNull()->end()
            ->scalarNode('exit_path')->defaultNull()->end()
            ->arrayNode('twig')
            ->addDefaultsIfNotSet()
            ->children()
            ->booleanNode('use_form_resources')->defaultTrue()->end()
            ->booleanNode('use_localized_date')->defaultFalse()->end()
            ->scalarNode('date_format')->defaultValue('Y-m-d')->end()
            ->scalarNode('datetime_format')->defaultValue('Y-m-d H:i:s')->end()
            ->scalarNode('localized_date_format')->defaultValue('medium')->end()
            ->scalarNode('localized_datetime_format')->defaultValue('medium')->end()
            ->arrayNode('number_format')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('decimal')->defaultValue(0)->end()
            ->scalarNode('decimal_point')->defaultValue('.')->end()
            ->scalarNode('thousand_separator')->defaultValue(',')->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('templates_dirs')
            ->useAttributeAsKey('key')
            ->prototype('scalar')->end()
            ->end()
            ->arrayNode('form_types')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('doctrine_orm')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('datetime')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('vardatetime')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('datetimetz')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('date')->defaultValue(DateTimeType::class)->end()
            // time types
            ->scalarNode('time')->defaultValue(TimeType::class)->end()
            // number types
            ->scalarNode('decimal')->defaultValue(NumberType::class)->end()
            ->scalarNode('float')->defaultValue(NumberType::class)->end()
            // integer types
            ->scalarNode('integer')->defaultValue(IntegerType::class)->end()
            ->scalarNode('bigint')->defaultValue(IntegerType::class)->end()
            ->scalarNode('smallint')->defaultValue(IntegerType::class)->end()
            // text types
            ->scalarNode('string')->defaultValue(TextType::class)->end()
            // textarea types
            ->scalarNode('text')->defaultValue(TextareaType::class)->end()
            // association types
            ->scalarNode('entity')->defaultValue(EntityType::class)->end()
            ->scalarNode('collection')->defaultValue(CollectionType::class)->end()
            // array types
            ->scalarNode('array')->defaultValue(CollectionType::class)->end()
            // boolean types
            ->scalarNode('boolean')->defaultValue(CheckboxType::class)->end()
            ->end()
            ->end()
            ->arrayNode('doctrine_odm')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('datetime')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('timestamp')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('vardatetime')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('datetimetz')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('date')->defaultValue(DateTimeType::class)->end()
            // time types
            ->scalarNode('time')->defaultValue(TimeType::class)->end()
            // number types
            ->scalarNode('decimal')->defaultValue(NumberType::class)->end()
            ->scalarNode('float')->defaultValue(NumberType::class)->end()
            // integer types
            ->scalarNode('int')->defaultValue(IntegerType::class)->end()
            ->scalarNode('integer')->defaultValue(IntegerType::class)->end()
            ->scalarNode('int_id')->defaultValue(IntegerType::class)->end()
            ->scalarNode('bigint')->defaultValue(IntegerType::class)->end()
            ->scalarNode('smallint')->defaultValue(IntegerType::class)->end()
            // text types
            ->scalarNode('id')->defaultValue(TextType::class)->end()
            ->scalarNode('custom_id')->defaultValue(TextType::class)->end()
            ->scalarNode('string')->defaultValue(TextType::class)->end()
            // textarea types
            ->scalarNode('text')->defaultValue(TextareaType::class)->end()
            // association types
            ->scalarNode('document')->defaultValue(FileType::class)->end()
            ->scalarNode('collection')->defaultValue(CollectionType::class)->end()
            // hash types
            ->scalarNode('hash')->defaultValue(CollectionType::class)->end()
            // boolean types
            ->scalarNode('boolean')->defaultValue(CheckboxType::class)->end()
            ->end()
            ->end()
            ->arrayNode('propel')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('TIMESTAMP')->defaultValue(DateTimeType::class)->end()
            ->scalarNode('BU_TIMESTAMP')->defaultValue(DateTimeType::class)->end()
            // date types
            ->scalarNode('DATE')->defaultValue(DateType::class)->end()
            ->scalarNode('BU_DATE')->defaultValue(DateType::class)->end()
            // time types
            ->scalarNode('time')->defaultValue(TimeType::class)->end()
            // number types
            ->scalarNode('FLOAT')->defaultValue(NumberType::class)->end()
            ->scalarNode('REAL')->defaultValue(NumberType::class)->end()
            ->scalarNode('DOUBLE')->defaultValue(NumberType::class)->end()
            ->scalarNode('DECIMAL')->defaultValue(NumberType::class)->end()
            // integer types
            ->scalarNode('TINYINT')->defaultValue(IntegerType::class)->end()
            ->scalarNode('SMALLINT')->defaultValue(IntegerType::class)->end()
            ->scalarNode('INTEGER')->defaultValue(IntegerType::class)->end()
            ->scalarNode('BIGINT')->defaultValue(IntegerType::class)->end()
            ->scalarNode('NUMERIC')->defaultValue(IntegerType::class)->end()
            // text types
            ->scalarNode('CHAR')->defaultValue(TextType::class)->end()
            ->scalarNode('VARCHAR')->defaultValue(TextType::class)->end()
            // textarea types
            ->scalarNode('LONGVARCHAR')->defaultValue(TextareaType::class)->end()
            ->scalarNode('BLOB')->defaultValue(TextareaType::class)->end()
            ->scalarNode('CLOB')->defaultValue(TextareaType::class)->end()
            ->scalarNode('CLOB_EMU')->defaultValue(TextareaType::class)->end()
            // association types
            ->scalarNode('model')->defaultValue(ModelType::class)->end()
            ->scalarNode('collection')->defaultValue(CollectionType::class)->end()
            // array types
            ->scalarNode('PHP_ARRAY')->defaultValue(CollectionType::class)->end()
            // choice types
            ->scalarNode('ENUM')->defaultValue(ChoiceType::class)->end()
            // boolean types
            ->scalarNode('BOOLEAN')->defaultValue(CheckboxType::class)->end()
            ->scalarNode('BOOLEAN_EMU')->defaultValue(CheckboxType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('filter_types')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('doctrine_orm')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('datetime')->end()
            ->scalarNode('vardatetime')->end()
            ->scalarNode('datetimetz')->end()
            ->scalarNode('date')->end()
            // time types
            ->scalarNode('time')->end()
            // number types
            ->scalarNode('decimal')->end()
            ->scalarNode('float')->end()
            // integer types
            ->scalarNode('integer')->end()
            ->scalarNode('bigint')->end()
            ->scalarNode('smallint')->end()
            // text types
            ->scalarNode('string')->end()
            // textarea types
            ->scalarNode('text')->defaultValue(TextType::class)->end()
            // association types
            ->scalarNode('entity')->end()
            ->scalarNode('collection')->defaultValue(EntityType::class)->end()
            // array types
            ->scalarNode('array')->end()
            // boolean types
            ->scalarNode('boolean')->defaultValue(ChoiceType::class)->end()
            ->end()
            ->end()
            ->arrayNode('doctrine_odm')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('datetime')->end()
            ->scalarNode('timestamp')->end()
            ->scalarNode('vardatetime')->end()
            ->scalarNode('datetimetz')->end()
            ->scalarNode('date')->end()
            // time types
            ->scalarNode('time')->end()
            // number types
            ->scalarNode('decimal')->end()
            ->scalarNode('float')->end()
            // integer types
            ->scalarNode('int')->end()
            ->scalarNode('integer')->end()
            ->scalarNode('int_id')->end()
            ->scalarNode('bigint')->end()
            ->scalarNode('smallint')->end()
            // text types
            ->scalarNode('id')->end()
            ->scalarNode('custom_id')->end()
            ->scalarNode('string')->end()
            // textarea types
            ->scalarNode('text')->defaultValue(TextType::class)->end()
            // association types
            ->scalarNode('document')->end()
            ->scalarNode('collection')->defaultValue(CollectionType::class)->end()
            // hash types
            ->scalarNode('hash')->defaultValue(TextType::class)->end()
            // boolean types
            ->scalarNode('boolean')->defaultValue(ChoiceType::class)->end()
            ->end()
            ->end()
            ->arrayNode('propel')
            ->addDefaultsIfNotSet()
            ->children()
            // datetime types
            ->scalarNode('TIMESTAMP')->end()
            ->scalarNode('BU_TIMESTAMP')->end()
            // date types
            ->scalarNode('DATE')->end()
            ->scalarNode('BU_DATE')->end()
            // time types
            ->scalarNode('time')->end()
            // number types
            ->scalarNode('FLOAT')->end()
            ->scalarNode('REAL')->end()
            ->scalarNode('DOUBLE')->end()
            ->scalarNode('DECIMAL')->end()
            // integer types
            ->scalarNode('TINYINT')->end()
            ->scalarNode('SMALLINT')->end()
            ->scalarNode('INTEGER')->end()
            ->scalarNode('BIGINT')->end()
            ->scalarNode('NUMERIC')->end()
            // text types
            ->scalarNode('CHAR')->end()
            ->scalarNode('VARCHAR')->end()
            // textarea types
            ->scalarNode('LONGVARCHAR')->defaultValue(TextType::class)->end()
            ->scalarNode('BLOB')->defaultValue(TextType::class)->end()
            ->scalarNode('CLOB')->defaultValue(TextType::class)->end()
            ->scalarNode('CLOB_EMU')->defaultValue(TextType::class)->end()
            // association types
            ->scalarNode('model')->defaultValue(ModelType::class)->end()
            ->scalarNode('collection')->defaultValue(CollectionType::class)->end()
            // array types
            ->scalarNode('PHP_ARRAY')->defaultValue(ChoiceType::class)->end()
            // choice types
            ->scalarNode('ENUM')->end()
            // boolean types
            ->scalarNode('BOOLEAN')->defaultValue(ChoiceType::class)->end()
            ->scalarNode('BOOLEAN_EMU')->defaultValue(ChoiceType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->append($this->getStylesheetNode())
            ->append($this->getJavascriptsNode())
            ->end();

        return $treeBuilder;
    }

    private function getStylesheetNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('stylesheets');

        $node
            ->prototype('array')
            ->fixXmlConfig('stylesheets')
            ->children()
            ->scalarNode('path')->end()
            ->scalarNode('media')->defaultValue('all')->end()
            ->end()
            ->end();

        return $node;
    }

    private function getJavascriptsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('javascripts');

        $node
            ->prototype('array')
            ->fixXmlConfig('javascripts')
            ->children()
            ->scalarNode('path')->end()
            ->scalarNode('route')->end()
            ->arrayNode('routeparams')
            ->useAttributeAsKey('key')
            ->prototype('scalar')
            ->end()
            ->end()
            ->end()
            ->end();

        return $node;
    }
}
