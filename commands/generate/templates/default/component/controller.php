<?php
/**
 * @var string $namespace
 * @var string $className
 * @var string $baseClass
 */

return <<<EOD
<?php

namespace $namespace;

class $className extends $baseClass
{
    /**
     * @var array context menu items.
     */
    public \$menu = array();

    /**
     * @var array the breadcrumbs of the current page.
     */
    public \$breadcrumbs = array();

    /**
     * Performs ajax validation on the given model.
     *
     * @param \CModel \$model the model to validate.
     * @param string \$formId the form id.
     */
    public function performAjaxValidation(\$model, \$formId)
    {
        if (isset(\$_POST['ajax']) && \$_POST['ajax'] === \$formId) {
            if (!is_array(\$model)) {
                \$model = array(\$model);
            }
            foreach (\$model as \$m) {
                echo \CActiveForm::validate(\$m);
            }
            \Yii::app()->end();
        }
    }

    /**
     * Triggers a 404 (Page Not Found) error.
     *
     * @throws \CHttpException when invoked.
     */
    public function pageNotFound()
    {
        throw new \CHttpException(404, t('error', 'Page not found.'));
    }

    /**
     * Triggers a 403 (Access Denied) error.
     *
     * @throws \CHttpException when invoked.
     */
    public function accessDenied()
    {
        throw new \CHttpException(403, t('error', 'Access denied.'));
    }

    /**
     * Triggers a 400 (Bad Request) error.
     *
     * @throws \CHttpException when invoked.
     */
    public function badRequest()
    {
        throw new \CHttpException(400, t('error', 'Invalid request.'));
    }
}
EOD;
