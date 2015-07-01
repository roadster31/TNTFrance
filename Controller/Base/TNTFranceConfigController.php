<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace TNTFrance\Controller\Base;

use TNTFrance\TNTFrance;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Form\Exception\FormValidationException;
use TNTFrance\Model\Config\TNTFranceConfigValue;

/**
 * Class TNTFranceConfigController
 * @package TNTFrance\Controller\Base
 * @author TheliaStudio
 */
class TNTFranceConfigController extends BaseAdminController
{
    public function defaultAction()
    {
        return $this->render("tntfrance-configuration");
    }

    public function saveAction()
    {
        $baseForm = $this->createForm("tntfrance.configuration");

        $errorMessage = null;

        try {
            $form = $this->validateForm($baseForm);
            $data = $form->getData();

            TNTFrance::setConfigValue(TNTFranceConfigValue::ENABLED, is_bool($data["enabled"]) ? (int) ($data["enabled"]) : $data["enabled"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::MODE_PRODUCTION, is_bool($data["mode_production"]) ? (int) ($data["mode_production"]) : $data["mode_production"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::ACCOUNT_NUMBER, is_bool($data["account_number"]) ? (int) ($data["account_number"]) : $data["account_number"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::USERNAME, is_bool($data["username"]) ? (int) ($data["username"]) : $data["username"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::PASSWORD, is_bool($data["password"]) ? (int) ($data["password"]) : $data["password"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::USE_INDIVIDUAL, is_bool($data["use_individual"]) ? (int) ($data["use_individual"]) : $data["use_individual"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::USE_ENTERPRISE, is_bool($data["use_enterprise"]) ? (int) ($data["use_enterprise"]) : $data["use_enterprise"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::USE_DEPOT, is_bool($data["use_depot"]) ? (int) ($data["use_depot"]) : $data["use_depot"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::USE_DROPOFFPOINT, is_bool($data["use_dropoffpoint"]) ? (int) ($data["use_dropoffpoint"]) : $data["use_dropoffpoint"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::PRODUCTS_ENABLED, is_bool($data["products_enabled"]) ? (int) ($data["products_enabled"]) : $data["products_enabled"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::OPTIONS_ENABLED, is_bool($data["options_enabled"]) ? (int) ($data["options_enabled"]) : $data["options_enabled"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::REGULAR_PICKUP, is_bool($data["regular_pickup"]) ? (int) ($data["regular_pickup"]) : $data["regular_pickup"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::SENDER_NAME, is_bool($data["sender_name"]) ? (int) ($data["sender_name"]) : $data["sender_name"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::SENDER_ADDRESS1, is_bool($data["sender_address1"]) ? (int) ($data["sender_address1"]) : $data["sender_address1"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::SENDER_ADDRESS2, is_bool($data["sender_address2"]) ? (int) ($data["sender_address2"]) : $data["sender_address2"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::SENDER_ZIP_CODE, is_bool($data["sender_zip_code"]) ? (int) ($data["sender_zip_code"]) : $data["sender_zip_code"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::SENDER_CITY, is_bool($data["sender_city"]) ? (int) ($data["sender_city"]) : $data["sender_city"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::CONTACT_LASTNAME, is_bool($data["contact_lastname"]) ? (int) ($data["contact_lastname"]) : $data["contact_lastname"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::CONTACT_FIRSTNAME, is_bool($data["contact_firstname"]) ? (int) ($data["contact_firstname"]) : $data["contact_firstname"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::CONTACT_EMAIL, is_bool($data["contact_email"]) ? (int) ($data["contact_email"]) : $data["contact_email"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::CONTACT_PHONE, is_bool($data["contact_phone"]) ? (int) ($data["contact_phone"]) : $data["contact_phone"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::NOTIFICATION_EMAILS, is_bool($data["notification_emails"]) ? (int) ($data["notification_emails"]) : $data["notification_emails"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::NOTIFICATION_SUCCESS, is_bool($data["notification_success"]) ? (int) ($data["notification_success"]) : $data["notification_success"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::LABEL_FORMAT, is_bool($data["label_format"]) ? (int) ($data["label_format"]) : $data["label_format"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::FREE_SHIPPING, is_bool($data["free_shipping"]) ? (int) ($data["free_shipping"]) : $data["free_shipping"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::MAX_WEIGHT_PACKAGE, is_bool($data["max_weight_package"]) ? (int) ($data["max_weight_package"]) : $data["max_weight_package"]);
            TNTFrance::setConfigValue(TNTFranceConfigValue::TRACKING_URL, is_bool($data["tracking_url"]) ? (int) ($data["tracking_url"]) : $data["tracking_url"]);
        } catch (FormValidationException $ex) {
            // Invalid data entered
            $errorMessage = $this->createStandardFormValidationErrorMessage($ex);
        } catch (\Exception $ex) {
            // Any other error
            $errorMessage = $this->getTranslator()->trans('Sorry, an error occurred: %err', ['%err' => $ex->getMessage()], [], TNTFrance::MESSAGE_DOMAIN);
        }

        if (null !== $errorMessage) {
            // Mark the form as with error
            $baseForm->setErrorMessage($errorMessage);

            // Send the form and the error to the parser
            $this->getParserContext()
                ->addForm($baseForm)
                ->setGeneralError($errorMessage)
            ;
        } else {
            $this->getParserContext()
                ->set("success", true)
            ;
        }

        return $this->defaultAction();
    }
}
