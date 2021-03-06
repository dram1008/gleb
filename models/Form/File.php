<?php

namespace app\models\Form;

use app\models\NewsItem;
use app\models\User;
use app\services\GsssHtml;
use cs\services\Str;
use cs\services\Url;
use cs\services\VarDumper;
use Yii;
use yii\base\Model;
use cs\Widget\FileUpload2\FileUpload;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * ContactForm is the model behind the contact form.
 */
class File extends \cs\base\BaseForm
{
    const TABLE = 'rod_files';

    public $id;
    public $file;
    public $title;

    function __construct($fields = [])
    {
        static::$fields = [
            [
                'title',
                'Название',
                1,
                'string',
            ],
            [
                'file',
                'Файл',
                1,
                'default',
                'widget' => [
                    FileUpload::className(),
                    [
                        'options' => [
                            'small'    => [
                                200,
                                200,
                                \cs\Widget\FileUpload2\FileUpload::MODE_THUMBNAIL_CUT
                            ],
                        ]
                    ]
                ]
            ],
        ];
        parent::__construct($fields);
    }


}
