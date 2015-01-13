<?php
// src/Deb/TopicsBundle/Form/Type/CreateTopicType.php

namespace Deb\TopicsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class CreateTopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $topic = $builder->getData();
        $builder->add('name', 'text', ['label' => 'topic.create.name', 'translation_domain' => 'DebTopicsBundle']);
        $builder->add('description', 'textarea', ['label' => 'topic.create.description', 'translation_domain' => 'DebTopicsBundle']);  
        $builder->add('processing_time', 'choice', ['label' => 'topic.create.time_options', 'translation_domain' => 'DebTopicsBundle', 'invalid_message' => 'topic.form_create.time_options', 'choices' => $topic->getProcessingTimeOptions()]);  
    }

    public function getName()
    {
        return 'deb_topic_create';
    }
}