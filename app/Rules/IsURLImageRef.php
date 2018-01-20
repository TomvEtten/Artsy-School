<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsURLImageRef implements Rule {

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return $this->isImage($value);
    }

    private function isImage($url) {
        $params = array('http' => array(
                'method' => 'HEAD'
        ));
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if (!$fp)
            return false;  // Problem with url

        $meta = stream_get_meta_data($fp);
        if ($meta === false) {
            fclose($fp);
            return false;  // Problem reading data from url
        }

        $wrapper_data = $meta["wrapper_data"];
        if (is_array($wrapper_data)) {
            foreach (array_keys($wrapper_data) as $hh) {
                if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image") { // strlen("Content-Type: image") == 19 
                    fclose($fp);
                    return true;
                }
            }
        }

        fclose($fp);
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Provided Image URL cannot be used/found by Artsy.';
    }

}
