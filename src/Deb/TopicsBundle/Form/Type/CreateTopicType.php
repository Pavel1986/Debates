<?php
// src/Deb/TopicsBundle/Form/Type/CreateTopicType.php

namespace Deb\TopicsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateTopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', ['label' => 'topic.create.name', 'translation_domain' => 'DebTopicsBundle']);
        $builder->add('description', 'textarea', ['label' => 'topic.create.description', 'translation_domain' => 'DebTopicsBundle']);  
    }

    public function getName()
    {
        return 'deb_topic_create';
    }
}