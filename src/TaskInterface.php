<?php

namespace EasyTranslate\RestApiClient;

interface TaskInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return \EasyTranslate\RestApiClient\ProjectInterface
     */
    public function getProject();

    /**
     * @return string|null
     */
    public function getTargetContent();

    /**
     * @return string
     */
    public function getTargetLanguage();
}
