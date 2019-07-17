<?php

require_once( dirname(__FILE__) . '/mgik.class.php' );

use Itb\Mpgu\Form\mgik\mgd\MgdTrait;

class MgikMgd2019 extends FormMgik
{
    use MgdTrait;

    /** @var int Минимальный возраст */
    const MIN_AGE = 18;

    /** @var string Дата начала выборов */
    const START_DATE = '08.09.2019';

    protected $form_id = 'mgd2019';
    protected $reg_form_id = 'mgd2019';
    protected $form_name = 'Включение в список избирателей для электронного дистанционного голосования на выборах депутатов Московской городской Думы';
    protected $service_target_title = 'Включение в список избирателей для электронного дистанционного голосования на выборах депутатов Московской городской Думы';
    protected $extra_status_send = true;

    public function onShowInList(&$appInfo, $throughSoapService = false) {
        parent::onShowInList($appInfo);

        if (isset($appInfo['STATUS_CODE']) && ($appInfo['STATUS_CODE'] == '1075')){
            $appInfo['ACTIONS'][] = [
                'data' => [
                    'url' => "{$this->mainHost}/ru/application/{$this->org_id}/mgd-golosovanie/",
                    'text' => 'Голосовать',
                    'btn_class' => self::ELK_BTN_GREEN_CLASS
                ],
                'type' => 'link'
            ];
        }
    }

}